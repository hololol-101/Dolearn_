<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class ManageLectureController extends Controller {

    public function getThumbnail(Request $request) {
        $idx = $request->post('lecture_idx');

        try {
            // 강좌 썸네일, 제목 조회
            $lectureInfo = DB::select('SELECT save_thumbnail, title FROM lecture WHERE idx = '.$idx);
            $lectureInfo = $lectureInfo[0];
            $result['lectureInfo'] = json_encode($lectureInfo);

            // 미해결된 질문 수 조회
            $notSolutionCnt = DB::select('SELECT count(*) cnt FROM my_question WHERE lecture_idx = '.$idx.' AND solution_yn = "N"');
            $result['notSolutionCnt'] = $notSolutionCnt[0]->cnt;

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function lectureInfo(Request $request) {
        $idx = $request->get('idx', '');
        $countVideo = 0;

        // 강좌 정보 조회
        $lectureInfo = DB::select('SELECT lec.*, bc.bcate_name, sc.scate_name FROM lecture lec, b_category bc, s_category sc WHERE lec.bcate_id = bc.bcate_id AND lec.scate_id = sc.scate_id AND lec.idx ='.$idx);

        if (count($lectureInfo) > 0) {
            $lectureInfo = $lectureInfo[0];
        }

        // 임시 저장된 추가 주제 목록 조회 후 배열로 저장
        if ( !empty($lectureInfo->tags) ) {
            $lectureTagList = explode('|', $lectureInfo->tags);
        } else $lectureTagList = array();

        // 강좌 영상 수 조회
        $countVideo = DB::select('SELECT count(*) cnt FROM curriculum WHERE lecture_idx ='.$idx.' AND status = "active"');
        $countVideo = $countVideo[0]->cnt;

        // 수강 완료한 수강자 수 조회
        $countLearningComplete = DB::select('SELECT count(*) cnt FROM my_lecture WHERE lecture_idx='.$idx.' AND status = "complete"');
        $countLearningComplete = $countLearningComplete[0]->cnt;

        return view('manage.lecture.lecture_info', compact('lectureInfo', 'lectureTagList', 'countVideo', 'countLearningComplete'));
    }

    public function lectureInfoModify(Request $request) {
        $idx = $request->get('idx', '');
        $existMainSCategoryList = [];
        $existMainPSubjectList = [];
        $existSubSCategoryList = [];
        $existSubPSubjectList = [];

        // 대분류 카테고리 목록 조회
        $bcategoryList = DB::select('SELECT * FROM b_category');

        // 강좌 정보 조회
        $lectureInfo = DB::select('SELECT * FROM lecture WHERE idx = '.$idx);

        if (count($lectureInfo) > 0) {
            $lectureInfo = $lectureInfo[0];
        }

        // 필수 소분류 카테고리 목록 조회
        if ($lectureInfo->bcate_id != '') {
            $existMainSCategoryList = DB::select('SELECT * FROM s_category WHERE bcate_id="'.$lectureInfo->bcate_id.'"');
        }

        // 필수 인기 주제 목록 조회
        // if ($lectureInfo->scate_id != '') {
        //     $existMainPSubjectList = DB::select('SELECT * FROM popular_subject WHERE bcate_id="'.$lectureInfo->bcate_id.'" AND scate_id="'.$lectureInfo->scate_id.'"');
        // }

        // 서브 소분류 카테고리 목록 조회
        if ($lectureInfo->bcate_id != '') {
            $existSubSCategoryList = DB::select('SELECT * FROM s_category WHERE bcate_id="'.$lectureInfo->sub_bcate_id.'"');
        }

        // 서브 인기 주제 목록 조회
        // if ($lectureInfo->scate_id != '') {
        //     $existSubPSubjectList = DB::select('SELECT * FROM popular_subject WHERE bcate_id="'.$lectureInfo->bcate_id.'" AND scate_id="'.$lectureInfo->scate_id.'"');
        // }

        // 주제 목록 조회 후 배열로 저장
        $lectureTags = $lectureInfo->tags;
        $lectureTagList = explode('|', $lectureTags);

        return view('manage.lecture.lecture_info_modify', compact('bcategoryList', 'lectureInfo', 'existMainSCategoryList', 'existMainPSubjectList', 'existSubSCategoryList', 'existSubPSubjectList', 'lectureTagList'));
    }

    public function saveLectureInfo(Request $request) {
        $idx = $request->post('lecture_idx', '');
        $title = $request->post('title');
        $description = $request->post('description');
        $saveThumbnail = $request->post('save_thumbnail');
        $level = $request->post('level');
        $freeYN = $request->post('free_yn');

        // 유료 강좌일 경우에만 가격과 수강 기간 설정 가능
        if ($freeYN == 'N') {
            $price = $request->post('price');
            $duration = $request->post('duration');
        } else {
            $price = NULL;
            $duration = NULL;
        }

        $mainBCateId = $request->post('main_bcate_id');
        $mainSCateId = $request->post('main_scate_id');
        $subBCateId = $request->post('sub_bcate_id');
        $subSCateId = $request->post('sub_scate_id');
        $category1 = $request->post('main_subject');
        $category2 = $request->post('sub_subject');
        $tags = $request->post('lecture_tags');
        $addInfo1 = $request->post('add_info_1');
        $addInfo2 = $request->post('add_info_2');
        $addInfo3 = $request->post('add_info_3');
        $introduction = $request->post('introduction');

        try {
            // 강좌 정보 업데이트
            DB::table('lecture')->where('idx', $idx)->update(array(
                'bcate_id' => $mainBCateId,
                'scate_id' => $mainSCateId,
                'sub_bcate_id' => $subBCateId,
                'sub_scate_id' => $subSCateId,
                'title' => $title,
                'description' => $description,
                'save_thumbnail' => $saveThumbnail,
                'level' => $level,
                'free_yn' => $freeYN,
                'price' => $price,
                'duration' => $duration,
                'category_1' => $category1,
                'category_2' => $category2,
                'tags' => $tags,
                'add_info_1' => $addInfo1,
                'add_info_2' => $addInfo2,
                'add_info_3' => $addInfo3,
                'introduction' => $introduction,
                'updated_at' => now()
            ));

            // 대/소분류 카테고리 변경으로 인한 대단원 업데이트
            DB::table('b_chapter')->where('lecture_idx', $idx)->update(array(
                'bcate_id' => $mainBCateId,
                'scate_id' => $mainSCateId,
                'updated_at' => now()
            ));

            // 대/소분류 카테고리 변경으로 인한 소단원 업데이트
            DB::table('s_chapter')->where('lecture_idx', $idx)->update(array(
                'bcate_id' => $mainBCateId,
                'scate_id' => $mainSCateId,
                'updated_at' => now()
            ));

            // 대/소분류 카테고리 변경으로 인한 커리큘럼 업데이트
            DB::table('curriculum')->where('lecture_idx', $idx)->update(array(
                'bcate_id' => $mainBCateId,
                'scate_id' => $mainSCateId,
                'updated_at' => now()
            ));

            createNotification('lecture', Auth::user()->email, $title,'강좌가 업데이트 되었습니다.','/manage/lecture/lecture_info?idx='.$idx);
            // 강좌 수정 알림 추가

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function lectureSettings(Request $request) {
        $idx = $request->get('idx', '');

        // 강좌 정보 조회
        $lectureInfo = DB::select('SELECT idx, secret_question_yn, certificate_yn, progress_rate FROM lecture WHERE idx = '.$idx);

        if (count($lectureInfo) > 0) {
            $lectureInfo = $lectureInfo[0];
        }

        return view('manage.lecture.lecture_settings', compact('lectureInfo'));
    }

    public function saveLectureSettings(Request $request) {
        $idx = $request->post('lecture_idx');
        $secretQuestionYn = $request->post('secret_question_yn');
        $certificateYn = $request->post('certificate_yn');
        $progressRate = $request->post('progress_rate');

        try {
            // 강좌 설정 업데이트
            DB::table('lecture')->where('idx', $idx)->update(array(
                'secret_question_yn' => $secretQuestionYn,
                'certificate_yn' => $certificateYn,
                'progress_rate' => $progressRate,
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

    public function curriculum(Request $request) {
        $idx = $request->get('idx', '');

        // 강좌 정보 조회
        $lectureInfo = DB::select('SELECT * FROM lecture WHERE idx = '.$idx);

        if (count($lectureInfo) > 0) {
            $lectureInfo = $lectureInfo[0];
        }

        // 기존에 등록된 커리큘럼 조회
        $curriculumResult = DB::table('curriculum')->where('lecture_idx', $idx)->get();

        if (count($curriculumResult) > 0) {
            $bchapterList = DB::table('b_chapter')->where('lecture_idx', $idx)->where('status', 'active')->orderBy('order')->get();
            $schapterList = DB::table('s_chapter')->where('lecture_idx', $idx)->where('status', 'active')->orderBy('order')->get();
            $videoInfoList = DB::select('SELECT curri.bchap_id, curri.schap_id, curri.preview_yn, curri.new_video_title,video.uid FROM curriculum curri, _youtube_fulldata_temp video WHERE curri.video_id = video.uid AND curri.lecture_idx = "'.$idx.'" AND curri.status = "active"');
            // $videoInfoList = DB::select('SELECT curri.bchap_id, curri.schap_id, curri.preview_yn, curri.new_video_title, video.analysis_yn, video.uid FROM curriculum curri, _youtube_fulldata_temp video WHERE curri.video_id = video.uid AND curri.lecture_idx = "'.$idx.'" AND curri.status = "active"');
        }

        return view('manage.lecture.curriculum', compact('lectureInfo', 'bchapterList', 'schapterList', 'videoInfoList'));
    }

    public function getCurriculumInfo(Request $request) {
        $lectureIdx = $request->post('lecture_idx', '');
        $videoId = $request->post('video_id', '');

        try {
            // 커리큘럼(영상ID, 영상 제목, 미리보기 여부, 강사 한마디) 조회
            $curriculumInfo = DB::select('SELECT video.uid, curri.new_video_title, curri.preview_yn, curri.comment FROM curriculum curri, _youtube_fulldata_temp video WHERE curri.video_id = video.uid AND curri.lecture_idx = "'.$lectureIdx.'" AND curri.video_id = "'.$videoId.'" AND curri.status = "active"');

            if (count($curriculumInfo) > 0) {
                $curriculumInfo = $curriculumInfo[0];
            }

            $result['status'] = 'success';
            $result['curriculumInfo'] = json_encode($curriculumInfo);

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function saveComment(Request $request) {
        $lectureIdx = $request->post('lecture_idx', '');
        $videoId = $request->post('video_id', '');
        $comment = $request->post('comment', '');

        try {
            // 강사 한 마디 저장
            DB::update('UPDATE curriculum SET comment = \''.$comment.'\', updated_at = now() WHERE lecture_idx = '.$lectureIdx.' AND video_id = "'.$videoId.'" AND status="active"');

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function curriculumModify(Request $request) {
        $idx = $request->get('idx', '');
        $isFree = $request->get('is_free', '');
        $where = '';
        $where2 = '';
        $orderBy = '';

        // 기존에 저장된 데이터가 있는지 확인
        $lectureInfo = DB::select('SELECT * FROM lecture WHERE idx = '.$idx);

        if (count($lectureInfo) > 0) {
            $lectureInfo = $lectureInfo[0];
        }

        // 기존에 등록된 커리큘럼 조회
        $curriculumInfo = DB::table('curriculum')->where('lecture_idx', $idx)->where('status', 'active')->get();

        if (count($curriculumInfo) > 0) {
            $curriculumInfo = $curriculumInfo[0];
            $bchapterList = DB::table('b_chapter')->where('lecture_idx', $idx)->where('status', 'active')->orderBy('order')->get();
            $schapterList = DB::table('s_chapter')->where('lecture_idx', $idx)->where('status', 'active')->orderBy('order')->get();
            // $videoInfoList = DB::select('SELECT curri.bchap_id, curri.schap_id, curri.preview_yn, video.analysis_yn, video.uid, curri.new_video_title FROM curriculum curri, _youtube_fulldata_temp video WHERE curri.video_id = video.uid AND curri.lecture_idx = "'.$idx.'" AND curri.status = "active"');
            $videoInfoList = DB::select('SELECT curri.bchap_id, curri.schap_id, curri.preview_yn, video.uid, curri.new_video_title FROM curriculum curri, _youtube_fulldata_temp video WHERE curri.video_id = video.uid AND curri.lecture_idx = "'.$idx.'" AND curri.status = "active"');

            // 유료 강좌일 경우 추천 영상 목록 조회 안함
            if ($isFree == 'Y') {
                $where = ' WHERE uid IN (SELECT uid FROM _youtube_fulldata_category WHERE bcate="'.$curriculumInfo->bcate_id.'" AND scate="'.$curriculumInfo->scate_id.'")';
                $orderBy = ' ORDER BY idx desc';

                // 해당 강좌의 대/소분류 카테고리 적용한 영상 목록 조회
                $videoList = DB::select('SELECT * FROM _youtube_fulldata_temp'.$where.$orderBy.' limit 8');

                // 영상 태그 조회
                $where2 = ' AND category.bcate = "'.$curriculumInfo->bcate_id.'" AND category.scate = "'.$curriculumInfo->scate_id.'"';

                $videoTagArr = DB::select('SELECT distinct tag, hashtag.idx, score FROM _youtube_fulldata_category category, _youtube_fulldata_hashtag hashtag WHERE category.uid = hashtag.uid'.$where2.' limit 20');

                return view('manage.lecture.curriculum_modify', compact('lectureInfo', 'videoList', 'videoTagArr', 'bchapterList', 'schapterList', 'videoInfoList'));
            } else {
                return view('manage.lecture.curriculum_modify', compact('lectureInfo', 'bchapterList', 'schapterList', 'videoInfoList'));
            }
        }
    }

    public function saveCurriculum(Request $request) {
        $lectureIdx = $request->post('lecture_idx');
        $mainVideoId = $request->post('main_video_id');
        $bcateId = $request->post('bcate_id');
        $scateId = $request->post('scate_id');
        $bchapList = json_decode($request->post('bchap_list'));
        $schapList = json_decode($request->post('schap_list'));
        $videoList = json_decode($request->post('video_list'));

        try {
            // 기존 저장된 커리큘럼 업데이트(status = ready/active -> delete)
            DB::table('curriculum')->where('lecture_idx', $lectureIdx)->update(['status' => 'delete', 'deleted_at' => now()]);
            DB::table('s_chapter')->where('lecture_idx', $lectureIdx)->update(['status' => 'delete', 'deleted_at' => now()]);
            DB::table('b_chapter')->where('lecture_idx', $lectureIdx)->update(['status' => 'delete', 'deleted_at' => now()]);

            // 수정된 대표 동영상 업데이트
            DB::table('lecture')->where('idx', $lectureIdx)->update(array(
                'main_video_id' => $mainVideoId,
                'updated_at' => now()
            ));

            // 수정된 대단원 저장
            foreach($bchapList as $key => $bchap) {
                DB::table('b_chapter')
                    ->where('lecture_idx', $lectureIdx)
                    ->insert(array(
                        'lecture_idx' => $lectureIdx,
                        'bcate_id' => $bcateId,
                        'scate_id' => $scateId,
                        'bchap_id' => $bchap->bchapId,
                        'bchap_name' => $bchap->bchapName,
                        'order' => $key,
                        'created_at' => now()
                    ));
            }

            // 수정된 소단원 저장
            foreach($schapList as $key => $schap) {
                DB::table('s_chapter')
                    ->where('lecture_idx', $lectureIdx)
                    ->insert(array(
                        'lecture_idx' => $lectureIdx,
                        'bcate_id' => $bcateId,
                        'scate_id' => $scateId,
                        'bchap_id' => $schap->bchapId,
                        'schap_id' => $schap->schapId,
                        'schap_name' => $schap->schapName,
                        'order' => $key,
                        'created_at' => now()
                    ));
            }

            // 기존에 등록되지 않은 분석이 필요한 영상 정보 저장
            // foreach($videoList as $video) {
            //     if ($video->analysisYn == 'N')
            //     DB::table('_youtube_fulldata_temp')->insert(array(
            //         'uid' => $video->videoId,
            //         'subject' => $video->videoTitle,
            //         'analysis_yn' => $video->analysisYn
            //     ));
            // }

            // 수정된 커리큘럼 저장
            foreach($videoList as $video) {
                $videoIdx = DB::table('_youtube_fulldata_temp')->select('idx', 'subject')->where('uid', $video->videoId)->get();

                DB::table('curriculum')
                    ->where('lecture_idx', $lectureIdx)
                    ->insert(array(
                        'lecture_idx' => $lectureIdx,
                        'bcate_id' => $bcateId,
                        'scate_id' => $scateId,
                        'bchap_id' => $video->bchapId,
                        'schap_id' => $video->schapId,
                        'video_id' => $video->videoId,
                        'ori_video_title' => $videoIdx[0]->subject,
                        'new_video_title' => $video->videoTitle,
                        'preview_yn' => $video->previewYn,
                        'created_at' => now()
                    ));
            }
            $title = DB::select('select title from lecture where idx = ?', [$lectureIdx])[0]->title;
            createNotification('lecture', Auth::user()->email, $title,'강좌가 업데이트되었습니다.', $lectureIdx);
            // 강좌 수정 알림 추가


            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function questionManagement() {
        return view('manage.lecture.question_management');
    }

    public function addNewQuestion() {
        return view('manage.lecture.add_new_question');
    }

    public function modifyQuestion() {
        return view('manage.lecture.question_modify');
    }

    public function examTaskManagement() {
        return view('manage.lecture.exam_task_management');
    }

    public function addNewExamTask() {
        return view('manage.lecture.add_new_exam_task');
    }

    public function modifyExamTask() {
        return view('manage.lecture.exam_task_modify');
    }

    public function submissionStatus() {
        return view('manage.lecture.submission_status');
    }

    public function studentManagement(Request $request) {
        $where = '';
        $groupBy = '';
        $orderBy = '';
        $query = '';
        $resData = '';

        // GET
        if ($request->isMethod('get')) {
            $lectureIdx = $request->get('idx', '');
            $orderBy = ' ORDER BY created_at DESC';

        // POST
        } else {
            $lectureIdx = $request->post('lecture_idx', '');
            $type = $request->post('type', '');
            $sortType = $request->post('sort_type', '');
            $selectType = $request->post('select_type', '');

            if ($selectType != '') {
                $where = ' AND mylec.status = "'.$selectType.'"';
                $orderBy = ' ORDER BY created_at DESC';

            } else {
                $orderBy = ' ORDER BY '.$type.' '.$sortType;
            }
        }

        $groupBy = ' GROUP BY curri.lecture_idx, user.email';

        $query = 'SELECT user.nickname, user.email, user.last_conn_at, mylec.status, count(CASE WHEN curri.status = "complete" THEN 1 END) AS complete_cnt, count(curri.idx) AS total_cnt
                    FROM users user, my_lecture mylec, my_curriculum curri
                    WHERE user.email = curri.user_id
                        AND mylec.lecture_idx = curri.lecture_idx
                        AND mylec.user_id = curri.user_id
                        AND curri.lecture_idx = "'.$lectureIdx.'"
                '.$where.$groupBy.$orderBy;

        // 수강자 정보 조회
        $studentInfoList = DB::select($query);

        // GET
        if ($request->isMethod('get')) {
            return view('manage.lecture.student_management', compact('studentInfoList'));

        // POST
        } else {
            try {
                foreach($studentInfoList as $studentInfo) {
                    $resData .= '<tr class="item">';
                    $resData .=     '<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>';
                    $resData .=     '<td>'.$studentInfo->nickname.'</td>';
                    $resData .=     '<td>'.$studentInfo->email.'</td>';
                    $resData .=     '<td>'.date('Y/m/d H:i:s', strtotime($studentInfo->last_conn_at)).'</td>';

                    $totalCnt = $studentInfo->total_cnt;  // 전체 강의 수
                    $completeCnt = $studentInfo->complete_cnt;  // 수강 완료한 강의 수

                    if ($studentInfo->status == 'ready') {
                        $resData .= '<td class="tal">인증 대기중</td>';

                    } else if ($studentInfo->status == 'complete') {
                        $resData .= '<td class="tal">수강 완료</td>';

                    } else {
                        $resData .= '<td class="tal">수강중 : '.$completeCnt.'개 강의 수강 <em class="em">'.round(($completeCnt / $totalCnt) * 100, 1).'%</em></td>';
                    }

                    $resData .=     '<td>';
                    $resData .=         '<button type="button" class="b2 button small secondary del">삭제</button>';
                    $resData .=     '</td>';
                    $resData .= '</tr>';
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

    public function qnaList(Request $request) {
        $where = '';
        $orderBy = '';
        $query = '';
        $resData = '';

        // GET
        if ($request->isMethod('get')) {
            $lectureIdx = $request->get('idx', '');
            $page = $request->get('page', 1);
            $orderBy = ' ORDER BY writed_at DESC';

        // POST
        } else {
            $lectureIdx = $request->post('lecture_idx', '');
            $type = $request->post('type', '');
            $page = $request->post('page', 1);
            $sortType = $request->post('sort_type', '');
            $orderBy = ' ORDER BY '.$type.' '.$sortType;
        }

        //페이지 구현
        $startNum    = ($page-1)*10;
        // 페이지 내 첫 게시글 번호
        $writeList    = 10;
        // 한 페이지당 표시될 글 갯수
        $pageNumList = 10;
        // 전체 페이지 중 표시될 페이지 갯수
        $totalCount  = DB::select('select count(*) count from my_question where lecture_idx = '.$lectureIdx.$where)[0]->count;
        // 전체 알림 갯수

        $where = ' AND solution_yn = "N"';

        $query = 'SELECT * FROM my_question WHERE lecture_idx = '.$lectureIdx.$where.$orderBy;
        $limit=" limit ".$startNum.", ".$writeList." ";

        // 미해결 된 질문 목록 조회
        $qnaList = DB::select($query.$limit);

        $pageIndex = getPageIndex($totalCount, $pageNumList, $writeList, $page);
        // 게시판 page nav

        // GET
        if ($request->isMethod('get')) {
            return view('manage.lecture.qna_list', compact('qnaList', 'pageIndex'));

        // POST
        } else {
            try {
                foreach($qnaList as $qna) {
                    $resData .= '<tr class="item">';
                    $resData .=     '<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>';

                    if ($qna->public_yn == 'Y') {
                        $resData .=     '<td>공개</td>';
                    } else {
                        $resData .=     '<td>비공개</td>';
                    }

                    $resData .=     '<td><a href="'.route('manage.lecture.qna_detail', ['idx' => $qna->lecture_idx, 'qna_idx' => $qna->idx]).'">'.$qna->title.'</a></td>';
                    $resData .=     '<td>'.$qna->writer_name.'<span class="dpib">('.$qna->writer_id.')</span></td>';
                    $resData .=     '<td>'.date('Y-m-d H:i', strtotime($qna->writed_at)).'</td>';
                    $resData .= '</tr>';
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

    public function qnaDetail(Request $request) {
        $lectureIdx = $request->get('idx', '');
        $questionIdx = $request->get('qna_idx', '');
        $permission = 'Y';
        //댓글 고정 권한

        // 질문 상세 정보 조회(연관된 강의 영상 정보 포함)
        $qnaInfo = DB::select('SELECT myq.*, curri.video_id, curri.new_video_title FROM my_question myq, my_curriculum curri WHERE myq.video_id = curri.video_id AND myq.writer_id = curri.user_id AND myq.idx = '.$questionIdx);

        if (count($qnaInfo) > 0) {
            $qnaInfo = $qnaInfo[0];
        }

        return view('manage.lecture.qna_detail', compact('qnaInfo', 'permission'));
    }

    public function reviewList(Request $request) {
        $orderBy = '';
        $query = '';
        $resData = '';

        // GET
        if ($request->isMethod('get')) {
            $lectureIdx = $request->get('idx', '');
            $page = $request->get('page', 1);
            $orderBy = ' ORDER BY writed_at DESC';
        // POST
        } else {
            $lectureIdx = $request->post('lecture_idx', '');
            $type = $request->post('type', '');
            $sortType = $request->post('sort_type', '');
            $page = $request->post('page', 1);
            $orderBy = ' ORDER BY '.$type.' '.$sortType;
        }

        //Pagenation
        $startNum    = ($page-1)*10;
        // 페이지 내 첫 게시글 번호
        $writeList    = 10;
        // 한 페이지당 표시될 글 갯수
        $pageNumList = 10;
        // 전체 페이지 중 표시될 페이지 갯수
        $totalCount  = DB::select('select count(*) count from lecture_review where lecture_idx = '.$lectureIdx.$orderBy)[0]->count;
        // 전체 알림 갯수
        $pageIndex = getPageIndex($totalCount, $pageNumList, $writeList, $page);


        $query = 'SELECT * FROM lecture_review WHERE lecture_idx = '.$lectureIdx.$orderBy;
        $limit=" limit ".$startNum.", ".$writeList." ";
        $reviewList = DB::select($query.$limit);

        // GET
        if ($request->isMethod('get')) {
            return view('manage.lecture.review_list', compact('reviewList', 'pageIndex'));

        // POST
        } else {
            try {
                foreach($reviewList as $review) {
                    $resData .= '<tr class="item">';
                    $resData .=     '<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>';
                    $resData .=     '<td>'.$review->rating.'</td>';
                    $resData .=     '<td>'.$review->content.'</td>';
                    $resData .=     '<td>'.$review->writer_name.'<span class="dpib">('.$review->writer_id.')</span></td>';
                    $resData .=     '<td>'.$review->writed_at.'</td>';
                    $resData .= '</tr>';
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
}
