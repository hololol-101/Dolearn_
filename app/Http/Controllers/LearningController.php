<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class LearningController extends Controller{
    public function main(Request $request) {
        $userId = Auth::user()->email;
        $lectureIdx = $request->get('idx', '');

        $lectureDetail = DB::select('SELECT cur.idx, cur.new_video_title, vid.channel, vid.like_cnt, cur.video_id, cur.comment FROM lecture lec, curriculum cur, _youtube_fulldata_temp vid WHERE lec.idx = cur.lecture_idx AND cur.video_id = vid.uid AND lec.idx = '.$lectureIdx.' AND cur.status="active" ORDER BY cur.idx LIMIT 1');

        if (count($lectureDetail) > 0) {
            $lectureDetail = $lectureDetail[0];
        }

        // 해당 강좌 최근 학습일 업데이트
        DB::table('my_lecture')->where('user_id', $userId)->where('lecture_idx', $lectureIdx)->update(['recent_learned_at' => now()]);

        // 커리큘럼(강의 영상) 최근 학습일 업데이트
        DB::table('my_curriculum')->where('user_id', $userId)->where('lecture_idx', $lectureIdx)->where('video_id', $lectureDetail->video_id)->update(['recent_learned_at' => now()]);

        // 해당 영상을 기존에 시청한 기록이 있는지 조회
        $existHistory = DB::select('SELECT * FROM video_history WHERE video_id = "'.$lectureDetail->video_id.'" AND user_id = "'.$userId.'"');

        if (count($existHistory) > 0) {
            // 마지막 시청 시간 업데이트
            DB::table('video_history')->where('video_id', $lectureDetail->video_id)->where('user_id', $userId)->update(array(
                'recent_watched_at' => now()
            ));

        } else {
            // 해당 영상 시청 기록 저장
            DB::table('video_history')->insert(array(
                'video_id' => $lectureDetail->video_id,
                'user_id' => $userId,
                'recent_watched_at' => now()
            ));
        }

        return view('learning.learning_main', compact('lectureDetail'));
    }

    public function index(Request $request) {
        $userId = Auth::user()->email;

        $idx = $request->get('idx', '');
        $bchapterList = DB::select('SELECT * FROM b_chapter WHERE lecture_idx='.$idx.' AND status="active"');
        $schapterList = DB::select('SELECT * FROM s_chapter WHERE lecture_idx='.$idx.' AND status="active"');
        $curriSchapterList = array();
        $curriVideoList = array();
        $totalVideoCnt = 0;
        $completeVideoCnt = 0;

        foreach ($bchapterList as $bchapter) {
            $schapList = DB::select('SELECT * FROM s_chapter WHERE lecture_idx='.$idx.' AND bchap_id="'.$bchapter->bchap_id.'" AND status="active"');
            array_push($curriSchapterList, $schapList);
        }

        foreach ($schapterList as $schapter) {
            $videoList = DB::select('SELECT vid.*, mycur.new_video_title, mycur.status FROM _youtube_fulldata_temp vid, my_curriculum mycur WHERE vid.uid = mycur.video_id AND mycur.user_id = "'.$userId.'" AND mycur.lecture_idx='.$idx.' AND mycur.schap_id="'.$schapter->schap_id.'"');
            array_push($curriVideoList, $videoList);

            // 소단원 별 강의(영상) 합계 -> 강좌의 총 강의(영상) 수
            $totalVideoCnt += count($videoList);
        }

        // 수강 완료한 강의 영상 수 조회
        $completeVideoCnt = DB::select('SELECT count(*) AS complete_video_cnt FROM my_curriculum WHERE user_id = "'.$userId.'" AND lecture_idx = '.$idx.' AND status = "complete"');
        $completeVideoCnt = $completeVideoCnt[0]->complete_video_cnt;

        return view('learning.learning_index', compact('bchapterList', 'curriSchapterList', 'curriVideoList', 'totalVideoCnt', 'completeVideoCnt'));
    }

    public function watchVideo(Request $request) {
        $userId = Auth::user()->email;
        $idx = $request->get('idx', '');
        $videoId = $request->get('video_id', '');
        $where2 = '';

        if ($videoId != '') {
            $where2 = ' AND vid.uid = "'.$videoId.'"';
        }

        // 강의 영상 상세 정보 조회
        $lectureDetail = DB::select('SELECT cur.idx, vid.subject, vid.content, vid.channel, vid.subscribers, vid.like_cnt, vid.hit_cnt, cur.video_id, cur.comment FROM lecture lec, curriculum cur, _youtube_fulldata_temp vid WHERE lec.idx = cur.lecture_idx AND cur.video_id = vid.uid AND lec.idx = '.$idx.$where2.' AND cur.status="active" ORDER BY cur.idx');

        // 커리큘럼(강의 영상) 최근 학습일 업데이트
        DB::table('my_curriculum')->where('user_id', $userId)->where('lecture_idx', $idx)->where('video_id', $videoId)->update(['recent_learned_at' => now()]);

        // 해당 영상을 기존에 시청한 기록이 있는지 조회
        $existHistory = DB::select('SELECT * FROM video_history WHERE video_id = "'.$lectureDetail[0]->video_id.'" AND user_id = "'.$userId.'"');

        if (count($existHistory) > 0) {
            // 마지막 시청 시간 업데이트
            DB::table('video_history')->where('video_id', $lectureDetail[0]->video_id)->where('user_id', $userId)->update(array(
                'recent_watched_at' => now()
            ));

        } else {
            // 해당 영상 시청 기록 저장
            DB::table('video_history')->insert(array(
                'video_id' => $lectureDetail[0]->video_id,
                'user_id' => $userId,
                'recent_watched_at' => now()
            ));
        }

        if (count($lectureDetail) > 0) {
            $lectureDetail = $lectureDetail[0];
        }

        return view('learning.learning_watch_video', compact('lectureDetail'));
    }

    public function moveNextVideo(Request $request) {
        $userId = Auth::user()->email;
        $lectureIdx = $request->get('idx', '');
        $step = $request->get('step', '');
        $curVideoId = $request->get('cur_video_id', '');

        if ($curVideoId != '') {
            $curIdx = DB::table('my_curriculum')->select('idx')->where('user_id', $userId)->where('lecture_idx', $lectureIdx)->where('video_id', $curVideoId)->get();
            $curIdx = (int)$curIdx[0]->idx;

            // 이전 강의로 이동
            if ($step == 'prev') {
                $nextVideoId = DB::select('SELECT video_id FROM my_curriculum WHERE user_id = "'.$userId.'" AND lecture_idx = "'.$lectureIdx.'" AND idx < '.$curIdx.' ORDER BY idx DESC LIMIT 1');

                // 이전 강의가 없을 경우
                if (count($nextVideoId) == 0) {
                    return redirect()->route('learning.watch_video', ['idx' => $lectureIdx])->with('alert', '첫 번째 강의입니다.');
                }

            // 다음 강의로 이동
            } else {
                $nextVideoId = DB::select('SELECT video_id FROM my_curriculum WHERE user_id = "'.$userId.'" AND lecture_idx = "'.$lectureIdx.'" AND idx > '.$curIdx.' ORDER BY idx LIMIT 1');

                // 다음 강의가 없을 경우
                if (count($nextVideoId) == 0) {
                    return redirect()->route('learning.watch_video', ['idx' => $lectureIdx, 'video_id' => $curVideoId])->with('alert', '마지막 강의입니다.');
                }
            }
        }

        // 다음 강의 영상 상세 정보 조회
        $lectureDetail = DB::select('SELECT vid.subject, vid.channel, vid.subscribers, vid.content, vid.like_cnt, vid.hit_cnt, cur.video_id, cur.comment FROM lecture lec, curriculum cur, _youtube_fulldata_temp vid WHERE lec.idx = cur.lecture_idx AND cur.video_id = vid.uid AND lec.idx = '.$lectureIdx.' AND  vid.uid = "'.$nextVideoId[0]->video_id.'"');

        // 커리큘럼(강의 영상) 최근 학습일 업데이트
        DB::table('my_curriculum')->where('user_id', $userId)->where('lecture_idx', $lectureIdx)->where('video_id', $nextVideoId[0]->video_id)->update(['recent_learned_at' => now()]);

        // 해당 영상을 기존에 시청한 기록이 있는지 조회
        $existHistory = DB::select('SELECT * FROM video_history WHERE video_id = "'.$nextVideoId[0]->video_id.'" AND user_id = "'.$userId.'"');

        if (count($existHistory) > 0) {
            // 마지막 시청 시간 업데이트
            DB::table('video_history')->where('video_id', $nextVideoId[0]->video_id)->where('user_id', $userId)->update(array(
                'recent_watched_at' => now()
            ));

        } else {
            // 해당 영상 시청 기록 저장
            DB::table('video_history')->insert(array(
                'video_id' => $nextVideoId[0]->video_id,
                'user_id' => $userId,
                'recent_watched_at' => now()
            ));
        }

        if (count($lectureDetail) > 0) {
            $lectureDetail = $lectureDetail[0];
        }

        return view('learning.learning_watch_video', compact('lectureDetail'));
    }

    public function caption(Request $request) {
        $videoId = $request->get('uid', '');

        $captionList = DB::select('SELECT * FROM _youtube_fulldata_timestamp WHERE uid = "'.$videoId.'" ORDER BY paragraph_idx');

        return view('learning.learning_caption', compact('captionList'));
    }

    public function downloadCaption(Request $request) {
        $videoId = $request->get('uid', '');

        $fileName = $_SERVER['DOCUMENT_ROOT'].'/captions/'.$videoId.'_'.time().'.txt';
        $txt = fopen($fileName, "wb") or die("Unable to open file!");

        // 자막 데이터 조회
        $captionList = DB::select('SELECT paragraph_text, timestamp FROM _youtube_fulldata_timestamp WHERE uid = "'.$videoId.'" ORDER BY paragraph_idx');

        foreach ($captionList as $caption) {

            // 자막 시간 표시 변환
            if (round($caption->timestamp) > 3600) {
                $time = gmdate("H:i:s", round($caption->timestamp));
            } else {
                $time = gmdate("i:s", round($caption->timestamp));
            }
            fwrite($txt, $time.' '.$caption->paragraph_text.chr(13).chr(10));
        }
        fclose($txt);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.basename($fileName));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: '.filesize($fileName));
        header("Content-Type: text/plain");
        readfile($fileName);
    }

    public function aiqna() {
        // TODO: 2차
        return view('learning.learning_aiqna');
    }

    public function search(Request $request) {
        $videoId = $request->post('uid', '');

        // 인기 검색어 조회
        // TODO: --> 사용자들이 많이 검색한 키워드?? 영상에서 사용 빈도 높은 단어&주제와의 관련도??
        $popKeywordList = DB::select('SELECT * FROM _youtube_fulldata_hashtag WHERE uid = "'.$videoId.'" ORDER BY score desc limit 5');

        return view('learning.learning_search', compact('popKeywordList'));
    }

    public function searchResult(Request $request) {
        $videoId = $request->post('uid', '');
        $keyword = $request->post('keyword', '');
        $resData = '';

        try {
            // 검색어가 포함된 자막 데이터 조회
            $captionList = DB::select('SELECT paragraph_text, timestamp FROM _youtube_fulldata_timestamp WHERE uid = "'.$videoId.'" AND paragraph_text LIKE "%'.$keyword.'%" ORDER BY paragraph_idx');

            foreach ($captionList as $caption) {
                if (round($caption->timestamp) > 3600) {
                    $time = gmdate("H:i:s", round($caption->timestamp));
                } else {
                    $time = gmdate("i:s", round($caption->timestamp));
                }

                $resData .= '<li class="li1">';
                $resData .=      '<a href="javascript:void(0);" class="a1" onclick="onClickCaptionList(\''.$videoId.'\', '.$caption->timestamp.')">';
                $resData .=          '<div class="tg1">';
                $resData .=              '<span class="t1">'.$time.'</span>';
                $resData .=          '</div>';
                $resData .=          '<div class="tg2">';
                $resData .=              '<div class="t2">'.str_replace($keyword, '<mark class="mark">'.$keyword.'</mark>', $caption->paragraph_text).'</div>';
                $resData .=          '</div>';
                $resData .=      '</a>';
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

    public function note(Request $request) {
        $lectureIdx = $request->get('idx', '');
        $videoId = $request->get('uid', '');

        $userId = Auth::user()->email;

        $videoNoteList = DB::select('SELECT * FROM video_note WHERE writer_id = "'.$userId.'" AND (lecture_idx = '.$lectureIdx.' OR lecture_idx = 0) AND video_id = "'.$videoId.'" AND status="active" ORDER BY writed_at DESC');

        return view('learning.learning_note', compact('videoNoteList'));
    }

    public function qna(Request $request) {
        $lectureIdx = $request->get('idx', '');
        $videoId = $request->get('uid', '');

        $userId = Auth::user()->email;

        // 해당 강좌의 강의에 등록한 질문 조회
        // 타인의 비공개 질문 제외, 본인의 비공개 질문 포함
        $query = 'SELECT *
                    FROM my_question
                    WHERE lecture_idx = '.$lectureIdx.'
                        AND video_id = "'.$videoId.'"
                        AND public_yn = "Y"
                        OR idx IN (
                            SELECT idx
                            FROM my_question
                            WHERE lecture_idx = '.$lectureIdx.'
                                AND writer_id = "'.$userId.'"
                                AND video_id = "'.$videoId.'"
                                AND public_yn = "N"
                                AND status = "active"
                        )
                        AND status = "active"
                    ORDER BY writed_at DESC';

        $questionList = DB::select($query);

        return view('learning.learning_qna', compact('questionList'));
    }

    public function qnaSearch(Request $request) {
        $userId = Auth::user()->email;
        $lectureIdx = $request->post('lecture_idx', '');
        $videoId = $request->post('video_id', '');
        $keyword = trim($request->post('search_keyword', ''));
        $query = '';
        $resData = '';

        // 해당 강좌의 강의에 등록한 질문 조회
        // 타인의 비공개 질문 제외, 본인의 비공개 질문 포함
        $query = 'SELECT *
                    FROM my_question
                    WHERE lecture_idx = '.$lectureIdx.'
                        AND video_id = "'.$videoId.'"
                        AND public_yn = "Y"
                        AND (title LIKE "%'.$keyword.'%" OR content LIKE "%'.$keyword.'%")
                        AND status = "active"
                        OR idx IN (
                            SELECT idx
                            FROM my_question
                            WHERE lecture_idx = '.$lectureIdx.'
                                AND writer_id = "'.$userId.'"
                                AND video_id = "'.$videoId.'"
                                AND public_yn = "N"
                                AND (title LIKE "%'.$keyword.'%" OR content LIKE "%'.$keyword.'%")
                                AND status = "active"
                        )
                    ORDER BY writed_at DESC';

        try {
            $questionList = DB::select($query);

            // 쿼리 확인용
            $result['query'] = $query;

            if (count($questionList) > 0) {
                foreach($questionList as $question) {
                    $resData .= '<li class="li1">';
                    $resData .=     '<a href="javascript:void(0);" class="a1" onclick="showQnaDetail(\''.$question->idx.'\')">';
                    $resData .=         '<div class="tg1">';
                    $resData .=             '<span class="t1">';

                    if ($question->public_yn == 'N') {
                        $resData .=             '<i class="t1ic1 private"></i>';
                    }

                    $resData .=                 '<span class="t1t1">Q. '.$question->title.'</span>';
                    $resData .=             '</span>';

                    if ($question->solution_yn == 'N') {
                        $resData .=         '<span class="st1 s1">#미해결</span>';
                    } else {
                        $resData .=         '<span class="st1 s2">#해결</span>';
                    }

                    $resData .=         '</div>';
                    $resData .=         '<div class="tg2">';
                    $resData .=             '<span class="t2">'.$question->writer_name.'</span>';
                    $resData .=             '<div class="eg1">';
                                                // TODO: 댓글 수
                    $resData .=                 '<span class="t3">댓글 3</span>';
                    $resData .=                 '<span class="t3">좋아요 '.$question->like_cnt.'</span>';
                    $resData .=             '</div>';
                    $resData .=         '</div>';
                    $resData .=     '</a>';
                    $resData .= '</li>';
                }

            } else {
                $resData = '<span>등록된 질문이 없습니다.</span>';
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

    public function qnaWrite(Request $request) {
        $lectureIdx = $request->get('idx', '');

        // 비공개 질문 작성 가능 여부 조회
        $secretQuestionYn = DB::select('SELECT secret_question_yn FROM lecture WHERE idx = '.$lectureIdx);

        if (count($secretQuestionYn) == 1) {
            $secretQuestionYn = $secretQuestionYn[0];
        }

        return view('learning.learning_qna_write', compact('secretQuestionYn'));
    }

    public function saveQna(Request $request) {
        $userId = Auth::user()->email;
        $userName = Auth::user()->nickname;
        $lectureIdx = $request->post('lecture_idx', '');
        $videoId = $request->post('video_id', '');
        $qnaTitle = $request->post('qna_title', '');
        $qnaContent = $request->post('qna_content', '');
        $publicYn = $request->post('public_yn', '');

        try {
            // 질문 등록
            DB::table('my_question')->insert(array(
                'lecture_idx' => $lectureIdx,
                'video_id' => $videoId,
                'writer_id' => $userId,
                'writer_name' => $userName,
                'title' => $qnaTitle,
                'content' => $qnaContent,
                'public_yn' => $publicYn,
                'writed_at' => now()
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

    public function qnaDetail(Request $request) {
        $questionIdx = $request->get('idx', '');
        $videoId = $request->get('uid', '');

        $myQuestionInfo = DB::select('SELECT * FROM my_question WHERE idx = '.$questionIdx.' AND video_id ="'.$videoId.'"');

        if ($myQuestionInfo > 0) {
            $myQuestionInfo = $myQuestionInfo[0];
        }

        return view('learning.learning_qna_detail', compact('myQuestionInfo'));
    }

    public function recommand(Request $request) {
        $videoId = $request->get('uid', '');

        // 해당 영상의 태그 조회
        $videoDetail = DB::select('SELECT uid, hashtag FROM _youtube_fulldata_temp WHERE uid = "'.$videoId.'"');

        if (count($videoDetail) == 1) {
            $videoDetail = $videoDetail[0];
        }

        // 해당 영상의 태그 목록
        $myVideoTagList = explode('|', $videoDetail->hashtag, 4);

        // 태그 목록 slicing (앞의 3개만 가져옴) -> 다른 유튜버의 유사한 영상 검색어(태그)로도 사용
        $myVideoTagList = array_slice($myVideoTagList, 0, 3);

        // 태그 목록 reserialize
        $myVideoTag = '';
        foreach ($myVideoTagList as $tag) {
            $myVideoTag .= $tag.'|';
        }
        $myVideoTag = substr($myVideoTag, 0, -1);

        $where = '';
        if ($myVideoTag != '') {
            $where = ' AND hashtag REGEXP "'.$myVideoTag.'"';
        }

        // 추천 영상 목록 조회
        // --> 본 영상의 소분류 카테고리 내에서 동일한 태그를 많이 가진 순
        $query = 'SELECT uid, subject, channel, hit_cnt
                    FROM _youtube_fulldata_temp
                    WHERE uid != "'.$videoDetail->uid.'"
                    '.$where.'
                    ORDER BY idx DESC
                    LIMIT 10';

        $recommandVideoList = DB::select($query);

        return view('learning.learning_recommand', compact('recommandVideoList'));
    }

    public function purchase() {
        return view('learning.learning_purchase');
    }

    public function task() {
        return view('learning.learning_task');
    }

    // 시작, 문제 풀이(한 문제 씩 or 전체 문제로 분기), 채점 후로 분기
    public function exam(Request $request) {
        $step = $request->get('step', '');
        $is_one = $request->get('is_one', '');

        if ($step == '' || $step == 'start') {
            return view('learning.learning_exam_start');

        } else if ($step == 'ing') {
            if ($is_one == '' || $is_one == 'yes') {
                return view('learning.learning_exam_ing_one');

            } else if ($is_one == 'no') {
                return view('learning.learning_exam_ing_all');
            }

        } else if ($step == 'result') {
            return view('learning.learning_exam_result');

        } else {
            return redirect('/learning/exam');
        }
    }

    public function saveReview(Request $request) {
        $lectureIdx = $request->post('lecture_idx');
        $rating = $request->post('rating');
        $reviewContent = $request->post('review_content');

        $userId = Auth::user()->email;
        $userName = Auth::user()->nickname;

        try {

            // 기존에 작성된 후기가 있는지 조회
            $existReview = DB::select('SELECT * FROM lecture_review WHERE writer_id = "'.$userId.'" AND lecture_idx = '.$lectureIdx);

            if (count($existReview) > 0) {
                $result['status'] = 'exist';

            } else {
                // 후기 저장
                DB::table('lecture_review')->insert([
                    'lecture_idx'=> $lectureIdx,
                    'writer_id'=> $userId,
                    'writer_name'=> $userName,
                    'content'=> $reviewContent,
                    'rating'=> $rating,
                    'writed_at'=> now(),
                ]);

                $result['status'] = 'success';
            }

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }
}
