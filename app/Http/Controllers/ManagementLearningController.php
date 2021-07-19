<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class ManagementLearningController extends Controller{
    public function learningLectureList(Request $reqeust) {
        $recent = $reqeust->get('recent', '');
        $status = $reqeust->get('status', '');
        $where = '';
        $groupBy = '';
        $orderBy = '';
        $query = '';

        $userId = Auth::user()->email;

        // selectbox 값 조건부 강좌 목록 조회 쿼리
        if ($status != '') {
            $where = ' AND mylec.status="'.$status.'"';
        }

        $groupBy = ' GROUP BY mylec.lecture_idx';
        $orderBy = ' ORDER BY mylec.recent_learned_at desc';

        if ($recent == 'application') {
            $orderBy = ' ORDER BY mylec.applicated_at desc';
        }

        $query = 'SELECT lec.idx, lec.title, lec.save_thumbnail,
                        count(vid.uid) AS video_cnt,
                        count(CASE WHEN curri.status = "complete" THEN 1 END) AS complete_video_cnt,
                        SEC_TO_TIME(SUM(TIME_TO_SEC(vid.video_len))) AS total_video_len,
                        SEC_TO_TIME(SUM(TIME_TO_SEC(curri.current_video_time))) AS current_video_time
                    FROM lecture lec, my_lecture mylec, _youtube_fulldata_temp vid, my_curriculum curri
                    WHERE lec.idx = mylec.lecture_idx
                        AND vid.uid = curri.video_id
                        AND mylec.lecture_idx = curri.lecture_idx
                        AND mylec.user_id = curri.user_id
                        AND mylec.user_id = "'.$userId.'"
                        '.$where.$groupBy.$orderBy;

        $myLectureList = DB::select($query);

        return view('sub.management.learning_lecture_list', compact('myLectureList'));
    }

    public function videoNoteList() {
        return view('sub.management.lecture_note_list');
    }

    public function videoNoteDetail() {
        return view('sub.management.lecture_note_detail');
    }

    public function myQuestionList(Request $request) {
        $userId = Auth::user()->email;

        // GET
        if ($request->isMethod('get')) {
            // 수강 강좌 목록 조회
            $myLectureList = DB::select('SELECT lec.idx, lec.title FROM my_lecture mylec, lecture lec WHERE mylec.lecture_idx = lec.idx AND user_id = "'.$userId.'" ORDER BY applicated_at DESC');

            // 내 질문 목록 조회
            $myQuestionList = DB::select('SELECT m.*, IFNULL(c.count, 0) AS comment_cnt FROM my_question m LEFT OUTER JOIN (
                SELECT post_id, COUNT(*) count FROM comment  where is_reply = "N" GROUP BY post_id
            ) AS c
            ON m.idx = c.post_id WHERE  m.writer_id = "'.$userId.'" AND m.status="active" group by m.idx ORDER BY m.writed_at DESC');

            return view('sub.management.my_question_list', compact('myLectureList', 'myQuestionList'));

        // POST
        } else {
            $lectureIdx = $request->post('lecture_idx', '');
            $solutionYn = $request->post('solution_yn', '');
            $resData = '';
            $where = '';
            $where2 = '';
            $orderBy = '';
            $query = '';

            try {
                // 강좌 선택
                if ($lectureIdx != '') {
                    $where = ' AND lecture_idx ='.$lectureIdx;
                }

                // 해결 or 미해결
                if ($solutionYn != '') {
                    $where2 = ' AND solution_yn = "'.$solutionYn.'"';
                }

                $orderBy = ' ORDER BY writed_at DESC';

                $query = 'SELECT m.*, IFNULL(c.count, 0) AS comment_cnt FROM my_question m LEFT OUTER JOIN (
                    SELECT post_id, COUNT(*) count FROM comment  where is_reply = "N" GROUP BY post_id
                ) AS c
                ON m.idx = c.post_id
                WHERE m.writer_id = "'.$userId.'"'.$where.$where2.$orderBy;

                $myQuestionList = DB::select($query);
                if(count($myQuestionList)==0){
                    $resData = " <span>질문 내역이 없습니다.</span>";
                }
                foreach($myQuestionList as $myQuestion) {
                    $resData .= '<li class="li1">';
                    $resData .=     '<a href="'.route('sub.management.my_question_detail', ['idx' => $myQuestion->idx]).'" class="w1 a1">';
                    $resData .=         '<div class="w1w1">';
                    $resData .=             '<div class="f1">';
                    $resData .=                 '<span class="f1p1">';
                    $resData .=                     '<img src="'.asset('storage/uploads/profile/'.Auth::user()->save_profile_image).'" alt="'.Auth::user()->save_profile_image.'" />';
                    $resData .=                 '</span>';
                    $resData .=             '</div>';
                    $resData .=         '</div>';
                    $resData .=         '<div class="w1w2">';
                    $resData .=             '<div class="tt1">';
                    $resData .=                 'Q. '.$myQuestion->title;
                    $resData .=             '</div>';

                    if ($myQuestion->solution_yn == 'N') {
                        $resData .=         '<span class="st1 s1">#미해결</span>';
                    } else {
                        $resData .=         '<span class="st1 s2">#해결</span>';
                    }

                    $resData .=             '<div class="tg1">';
                    $resData .=                 '<span class="t1">'.$myQuestion->writer_name.'</span>';
                    $resData .=                 '<span class="t2">'.format_date($myQuestion->writed_at).'</span>';
                    $resData .=             '</div>';
                    $resData .=             '<div class="tg2">';
                    // TODO: 댓글
                    $resData .=                 '<span class="t4">댓글 '.$myQuestion->comment_cnt.'개</span>';
                    $resData .=             '</div>';
                    $resData .=         '</div>';
                    $resData .=     '</a>';
                    $resData .=     '<div class="eg1">';
                    $resData .=         '<a href="javascript:void(0);" class="cp2like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">'.$myQuestion->like_cnt.'</span></a>';
                    $resData .=     '</div>';
                    $resData .= '</li>';
                }

                $result['status'] = 'success';

            } catch(Exception $e) {
                $result['status'] = 'fail';
                $result['msg'] = $e->getMessage();
                $result['code'] = $e->getCode();

            } finally {
                $result['resData'] = $resData;

                return response()->json($result);
            }
        }
    }

    public function myQuestionDetail(Request $request) {
        $questionIdx = $request->get('idx', '');

        // 질문 상세 정보 조회(연관된 강의 영상 정보 포함)
        $myQuestionInfo = DB::select('SELECT myq.*, curri.video_id, curri.new_video_title FROM my_question myq, my_curriculum curri WHERE myq.video_id = curri.video_id AND myq.writer_id = curri.user_id AND myq.idx = '.$questionIdx);

        if (count($myQuestionInfo) > 0) {
            $myQuestionInfo = $myQuestionInfo[0];
        }

        return view('sub.management.my_question_detail', compact('myQuestionInfo'));
    }

    public function checkSolution(Request $request) {
        $questionIdx = $request->post('question_idx', '');
        $solutionYn = $request->post('solution_yn', '');

        try {
            // 질문 해결/미해결 여부 업데이트
            DB::table('my_question')->where('idx', $questionIdx)->update(array(
                'solution_yn' => $solutionYn,
                'updated_at' => now()
            ));

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function modifyQuestion(Request $request) {
        $questionIdx = $request->post('question_idx', '');
        $questionTitle = $request->post('question_title', '');
        $questionContent = $request->post('question_content', '');

        try {
            // 질문 업데이트
            DB::table('my_question')->where('idx', $questionIdx)->update(array(
                'title' => $questionTitle,
                'content' => $questionContent,
                'updated_at' => now()
            ));

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function deleteQuestion(Request $request) {
        $questionIdx = $request->post('question_idx', '');

        try {
            // 질문 삭제
            DB::table('my_question')->where('idx', $questionIdx)->update(array(
                'deleted_at' => now(),
                'status' => 'delete'
            ));

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }
}
