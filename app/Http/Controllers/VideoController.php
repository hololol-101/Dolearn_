<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class VideoController extends Controller{
    public function videoList(Request $request) {
        $bcateId = $request->get('bcate_id', '');
        $scateId = $request->get('scate_id', '');
        $keyword = $request->get('keyword', '');
        $order = $request->get('order', '');
        $tags = $request->get('tags', '');
        $where = '';
        $where2 = '';
        $where3 = '';
        $orderBy = '';
        $bcateName = '';
        $scateName = '';

        // 대분류 카테고리 목록 조회
        $bcateList = DB::select('SELECT bcate_id, bcate_name FROM b_category');

        // 화면에 표시될 대분류 카테고리 명 조회
        if ($bcateId != '') {
            $scateList = DB::select('SELECT bcate_id, scate_id, scate_name FROM s_category WHERE bcate_id="'.$bcateId.'"');
            $bcateName = DB::select('SELECT bcate_name FROM b_category WHERE bcate_id="'.$bcateId.'"');
            $bcateName = $bcateName[0]->bcate_name;
        } else {
            $bcateName = 'ALL';
        }

        // 소분류 카테고리 목록 및 화면에 표시될 소분류 카테고리 명 조회
        if ($scateId != '') {
            $scateName = DB::select('SELECT scate_name FROM s_category WHERE scate_id="'.$scateId.'"');
            $scateName = $scateName[0]->scate_name;
        } else {
            $scateName = 'ALL';
        }

        // 대분류, 소분류 카테고리 둘 다 선택했을 경우
        if ($bcateId != '' && $scateId != '') {
            $where = ' WHERE uid IN (SELECT uid FROM _youtube_fulldata_category WHERE bcate="'.$bcateId.'" AND scate="'.$scateId.'")';

        // 대분류만 선택한 경우
        } else if ($bcateId != '' && $scateId == '') {
            $where = ' WHERE uid IN (SELECT uid FROM _youtube_fulldata_category WHERE bcate="'.$bcateId.'")';
        }

        $orderBy = ' ORDER BY idx desc';

        if ($order == 'like') {
            $orderBy = ' ORDER BY like_cnt desc';

        } else if ($order == 'hit') {
            $orderBy = ' ORDER BY hit_cnt desc';
        }

        // 키워드 조건부 강좌 목록 조회 쿼리
        if ($keyword != '') {
            if ($where == '') {
                $where2 = ' WHERE (subject LIKE "%'.$keyword.'%" or content LIKE "%'.$keyword.'%")';
            } else {
                $where2 = ' AND (subject LIKE "%'.$keyword.'%" or content LIKE "%'.$keyword.'%")';

            }
        }
        $videoList = DB::select('SELECT idx, uid, subject, hit_cnt, channel FROM _youtube_fulldata_temp'.$where.$where2.$orderBy.' limit 12');
        //영상 수
        $videoCount =  DB::select('SELECT count(*) count FROM _youtube_fulldata_temp'.$where.$where2.$orderBy)[0]->count;

        // 영상 태그 조회
        // 대분류, 소분류 카테고리 둘 다 선택했을 경우
        if ($bcateId != '' && $scateId != '') {
            $where3 = ' AND category.bcate = "'.$bcateId.'" AND category.scate = "'.$scateId.'"';

        // 대분류만 선택한 경우
        } else if ($bcateId != '' && $scateId == '') {
            $where3 = ' AND category.bcate = "'.$bcateId.'"';
        }

        $videoTagArr = DB::select('SELECT hashtag.tag, hashtag.idx, score FROM _youtube_fulldata_category category, _youtube_fulldata_hashtag hashtag WHERE category.uid = hashtag.uid'.$where3.' GROUP BY tag ORDER BY score desc limit 20');

        // TODO: 임시 태그 조회
        // // 대분류, 소분류 카테고리 둘 다 선택했을 경우
        // if ($bcateId != '' && $scateId != '') {
        //     $where3 = ' WHERE bcate = "'.$bcateId.'" AND scate = "'.$scateId.'"';

        // // 대분류만 선택한 경우
        // } else if ($bcateId != '' && $scateId == '') {
        //     $where3 = ' WHERE bcate = "'.$bcateId.'"';
        // }

        // $videoTagArr = DB::select('SELECT * FROM _youtube_fulldata_showtag'.$where3.' ORDER BY idx limit 20');

        return view('sub.video.video_list', compact('videoList', 'videoCount', 'videoTagArr', 'bcateList', 'scateList', 'bcateName', 'scateName'));
    }

    public function getVideoData(Request $request) {
        $tagNameList = $request->post('tag_name_list', '');
        $bcateId = $request->post('bcate_id', '');
        $scateId = $request->post('scate_id', '');
        $keyword = $request->post('keyword', '');
        $order = $request->post('order', '');
        $pageNum = $request->post('pageNum', 1);
        $where = '';
        $where2 = '';
        $where3 = '';
        $where4 = '';
        $orderBy = '';
        $query = '';
        $resData = '';
        $tagNames = '';

        // 선택한 태그가 있을 경우 태그명을 배열 형태의 문자열로 재구성
        if ($tagNameList != '') {
            $tagNames = empty($tagNameList) ? 'NULL' : "'".join("','", $tagNameList)."'";
        }

        $orderBy = ' ORDER BY idx desc ';

        if ($order == 'like') {
            $orderBy = ' ORDER BY like_cnt desc ';

        } else if ($order == 'hit') {
            $orderBy = ' ORDER BY hit_cnt desc ';
        }

        //가져올 데이터 범위
        $limit = ' limit '.(($pageNum-1)*12).', '.(12);
        $result['lval'] = $limit;
        // 선택한 태그가 없을 경우
        if ($tagNames == '') {

            // 대분류, 소분류 카테고리 둘 다 선택했을 경우
            if ($bcateId != '' && $scateId != '') {
                $where = ' WHERE uid IN (SELECT uid FROM _youtube_fulldata_category WHERE bcate = "'.$bcateId.'" AND scate = "'.$scateId.'")';

            // 대분류만 선택한 경우
            } else if ($bcateId != '' && $scateId == '') {
                $where = ' WHERE uid IN (SELECT uid FROM _youtube_fulldata_category WHERE bcate = "'.$bcateId.'")';
            }


            // 검색 키워드가 있을 경우
            if ($keyword != '') {
                if ($where == '' && $where2 == '') {
                    $where3 = '  WHERE (subject LIKE "%'.$keyword.'%" or content LIKE "%'.$keyword.'%")';
                } else {
                    $where3 = ' AND (subject LIKE "%'.$keyword.'%" or content LIKE "%'.$keyword.'%") ';
                }
            }

            $query = 'SELECT idx, uid, subject, hit_cnt, channel FROM _youtube_fulldata_temp'.$where.$where2.$where3.$orderBy.$limit;
            $totalcount = DB::select('SELECT count(*) count FROM _youtube_fulldata_temp'.$where.$where2.$where3)[0]->count;

        // 선택한 태그가 있을 경우
        } else {

            // 대분류, 소분류 카테고리 둘 다 선택했을 경우
            if ($bcateId != '' && $scateId != '') {
                $where = ' AND temp.uid IN (SELECT uid FROM _youtube_fulldata_category WHERE bcate = "'.$bcateId.'" AND scate = "'.$scateId.'")';

            // 대분류 카테고리만 선택한 경우
            } else if ($bcateId != '' && $scateId == '') {
                $where = ' AND temp.uid IN (SELECT uid FROM _youtube_fulldata_category WHERE bcate = "'.$bcateId.'")';
            }

            $where2 = ' AND hashtag.tag IN ('.$tagNames.')';

            // 검색 키워드가 있을 경우
            if ($keyword != '') {
                $where4 = ' AND temp.subject LIKE "%'.$keyword.'%"';
            }

            $query = 'SELECT distinct temp.uid, temp.idx, temp.subject, temp.hit_cnt, temp.channel FROM _youtube_fulldata_temp temp, _youtube_fulldata_hashtag hashtag WHERE temp.uid = hashtag.uid'.$where.$where2.$where3.$where4.$orderBy.$limit;
            $totalcount = DB::select('SELECT count(*) count FROM _youtube_fulldata_temp temp, _youtube_fulldata_hashtag hashtag WHERE temp.uid = hashtag.uid'.$where.$where2.$where3.$where4)[0]->count;

        }

        try {
            $videoList = DB::select($query);


            // 쿼리 확인용
            $result['query'] = $query;
            // 조회된 영상 수
            $result['count'] = count($videoList);
            $result['totalcount'] = $totalcount;

            foreach($videoList as $video) {
                $resData .= '<div class="item column">';
                $resData .=     '<div class="w1">';
                $resData .=         '<a href="'.route('sub.video.video_detail', ['uid' => $video->uid]).'" class="a1" video_idx="'.$video->idx.'">';
                $resData .=             '<div class="f1">';
                $resData .=                 '<span class="f1p1">';
                $resData .=                     '<img src="https://img.youtube.com/vi/'.$video->uid.'/mqdefault.jpg" alt="'.$video->subject.'">';
                $resData .=                 '</span>';
                $resData .=                 '<i class="ic1 play">Play</i>';
                $resData .=             '</div>';
                $resData .=             '<div class="tg1">';
                $resData .=                 '<strong class="t1">'.$video->subject.'</strong>';
                $resData .=                 '<input type="hidden" class="video_id" value="'.$video->uid.'">';
                $resData .=             '</div>';
                $resData .=             '<div class="tg2">';
                $resData .=                 '<span class="t2">'.$video->channel.' · 조회수 '.$video->hit_cnt.'회</span>';
                $resData .=             '</div>';
                $resData .=         '</a>';
                $resData .=     '</div>';
                $resData .= '</div>';
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

    public function getMoreTags(Request $request) {
        $bcateId = $request->post('bcate_id', '');
        $scateId = $request->post('scate_id', '');
        $lastTagIdx = $request->post('last_tag_idx', '');

        $where = '';
        $where2 = '';
        $groupBy = '';
        $orderBy = '';
        $query = '';
        $resData = '';

        // 영상 태그 조회
        if ($bcateId != '' && $scateId != '') {
            $where = ' AND category.bcate = "'.$bcateId.'" AND category.scate = "'.$scateId.'"';
        } else if ($bcateId != '' && $scateId == '') {
            $where = ' AND category.bcate = "'.$bcateId.'"';
        }

        $where2 = ' AND hashtag.idx > '.$lastTagIdx;
        $groupBy = ' GROUP BY tag';
        $orderBy = ' ORDER BY score desc';

        $query = 'SELECT hashtag.tag, hashtag.idx, score FROM _youtube_fulldata_category category, _youtube_fulldata_hashtag hashtag WHERE category.uid = hashtag.uid'.$where.$where2.$groupBy.$orderBy.' limit 20';

        try {
            $tagList = DB::select($query);

            // 쿼리 확인용
            $result['query'] = $query;

            // 조회된 태그 수
            $result['count'] = count($tagList);

            // 조회된 태그 수에 따라 버튼 숨김 여부 판단
            if (count($tagList) >= 20) {
                $result['isShowMore'] = true;
            } else {
                $result['isShowMore'] = false;
            }

            foreach($tagList as $tag) {
                $resData .= '<a href="javascript:void(0);" class="a1" tag_idx="'.$tag->idx.'">#'.$tag->tag.'</a>';
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

    public function videoDetail(Request $request) {
        $uid = $request->get('uid', '');
        $youtubeTagList = array();

        // 영상 상세 정보 조회
        $videoDetail = DB::select('SELECT * FROM _youtube_fulldata_temp WHERE uid = "'.$uid.'"');

        // 해시태그 조회(두런)
        $dolearnTagList = DB::select('SELECT * FROM _youtube_fulldata_hashtag WHERE uid = "'.$uid.'" GROUP BY tag ORDER BY score DESC LIMIT 8');

        if (count($videoDetail) == 1) {
            $videoDetail = $videoDetail[0];
        }

        // 해시태그 조회(유튜브)
        $youtubeTagStr = $videoDetail->tag;
        $youtubeTagStr = trim($youtubeTagStr);
        $youtubeTagStr = ltrim($youtubeTagStr, '[');
        $youtubeTagStr = rtrim($youtubeTagStr, ']');
        $youtubeTagStr = str_replace(array('\r\n', '\r', '\n'), '', $youtubeTagStr);
        $youtubeTagArr = array_map('trim', explode(',', $youtubeTagStr));

        foreach ($youtubeTagArr as $key => $youtubeTag) {
            $youtubeTag = trim($youtubeTag);
            $youtubeTag = ltrim($youtubeTag, '\'');
            $youtubeTag = rtrim($youtubeTag, '\'');
            $youtubeTag = str_replace(array('\r\n', '\r', '\n'), '', $youtubeTag);

            if ($key < 8) {
                array_push($youtubeTagList, $youtubeTag);
            } else {
                break;
            }
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

        // 다른 유튜버의 유사한 영상
        // --> 추천 영상(태그 포함)
        $query1 = 'SELECT uid, subject, channel, hit_cnt
                    FROM _youtube_fulldata_temp
                    WHERE uid != "'.$videoDetail->uid.'" AND channel != "'.$videoDetail->channel.'"'.$where.'
                    ORDER BY idx DESC
                    LIMIT 10';

        $similarVideoList = DB::select($query1);

        // 연관강좌
        // --> 본 영상이 적용된 강좌들 중 1)수강자수 2)완강률 3)평점
        $query2 = 'SELECT lec.idx, lec.title, lec.save_thumbnail, lec.free_yn, lec.owner_name, lec.rating, lec.student_cnt
                    FROM lecture lec, curriculum curri
                    WHERE lec.idx = curri.lecture_idx
                        AND curri.video_id = "'.$uid.'"
                    GROUP BY lec.idx
                    ORDER BY lec.student_cnt DESC, lec.rating DESC';

        $relationLectureList = DB::select($query2);

        return view('sub.video.video_detail', compact('videoDetail', 'dolearnTagList', 'youtubeTagList', 'similarVideoList', 'myVideoTagList', 'relationLectureList'));
    }

    public function videoPlayHistory(Request $request) {
        $type = $request->get('type', '');
        $userId = Auth::user()->email;

        $where = '';
        $query = '';
        $todayHistoryList = array();
        $otherHistoryList = array();

        // 좋아요 누른 영상 조회
        if ($type != '') {
            $where = ' AND his.like_yn = "Y"';
        }

        // 시청 기록 목록 조회
        $query = 'SELECT his.*, vid.subject, vid.channel, vid.like_cnt
                    FROM video_history his, _youtube_fulldata_temp vid
                    WHERE his.video_id = vid.uid AND user_id = "'.$userId.'"'.$where.'
                    ORDER BY his.recent_watched_at DESC';

        $videoHistoryList = DB::select($query);
        foreach($videoHistoryList as $videoHistory) {
            // 오늘 시청 목록 배열 생성
            if (date('Y-m-d', strtotime($videoHistory->recent_watched_at)) == date('Y-m-d', time())) {
                array_push($todayHistoryList, $videoHistory);

            // 그 외 시청 목록 배열 생성
            } else {
                array_push($otherHistoryList, $videoHistory);

                if (count($otherHistoryList) == 8) {
                    break;
                }
            }
        }

        return view('sub.video.video_play_history', compact('todayHistoryList', 'otherHistoryList'));
    }

    public function getMoreVideoHistory(Request $request) {
        $lastHistoryIdx = $request->post('last_history_idx', '');
        $type = $request->post('type', '');
        $userId = Auth::user()->email;

        $where = '';
        $query = '';
        $resData = '';

        // 좋아요 누른 영상 조회
        if ($type != '') {
            $where = ' AND his.like_yn = "Y"';
        }

        // 시청 기록 목록 조회
        $query = 'SELECT his.*, vid.subject, vid.channel, vid.like_cnt
                    FROM video_history his, _youtube_fulldata_temp vid
                    WHERE his.video_id = vid.uid AND user_id = "'.$userId.'" AND his.idx < '.$lastHistoryIdx.$where.'
                    ORDER BY his.recent_watched_at DESC
                    LIMIT 8';

        try {
            $videoHistoryList = DB::select($query);

            foreach($videoHistoryList as $videoHistory) {
                $resData .= '<div class="item column">';
                $resData .=     '<div class="w1">';
                $resData .=         '<a href="'.route('sub.video.video_detail', ['uid' => $videoHistory->video_id]).'" class="a1" history_idx="'.$videoHistory->idx.'">';
                $resData .=             '<div class="f1">';
                $resData .=                 '<span class="f1p1">';
                $resData .=                     '<img src="https://img.youtube.com/vi/'.$videoHistory->video_id.'/mqdefault.jpg" alt="'.$videoHistory->subject.'">';
                $resData .=                 '</span>';
                $resData .=                 '<i class="ic1 play">Play</i>';
                $resData .=             '</div>';
                $resData .=             '<div class="tg1">';
                $resData .=                 '<strong class="t1">'.$videoHistory->subject.'</strong>';
                $resData .=             '</div>';
                $resData .=             '<div class="tg2">';
                $resData .=                 '<span class="t2">'.$videoHistory->channel.'</span>';
                $resData .=                 '<span class="t3">조회수 '.$videoHistory->like_cnt.'회</span>';
                $resData .=             '</div>';
                $resData .=         '</a>';
                $resData .=     '</div>';
                $resData .= '</div>';
            }

            $result['status'] = 'success';

            // 쿼리 확인
            $result['query'] = $query;

            // 조회된 영상 수
            $result['count'] = count($videoHistoryList);

            // 조회된 영상 수에 따라 버튼 숨김 여부 판단
            if (count($videoHistoryList) >= 8) {
                $result['isShowMore'] = true;
            } else {
                $result['isShowMore'] = false;
            }

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            $result['resData'] = $resData;

            return response()->json($result);
        }
    }

    public function videoNoteList(Request $request) {
        $userId = Auth::user()->email;

        // 강좌의 영상 노트(lecture_idx = ?)와 스마트 학습 영상 노트(lecture_idx = 0) union 쿼리
        $query = 'SELECT note_idx, uid, subject, recent_learned_at, COUNT(note_idx) AS note_cnt
                    FROM (
                        (SELECT note.idx AS note_idx, vid.uid, vid.subject, note.content, mycur.lecture_idx AS mycur_lec_idx, note.lecture_idx AS note_lec_idx, mycur.recent_learned_at
                        FROM my_curriculum mycur, video_note note, _youtube_fulldata_temp vid
                        WHERE mycur.video_id = note.video_id
                            AND note.video_id = vid.uid
                            AND mycur.user_id = note.writer_id
                            AND mycur.lecture_idx = note.lecture_idx
                            AND note.writer_id = "'.$userId.'"
                            AND note.status = "active")
                        UNION ALL
                        (SELECT note.idx AS note_idx, vid.uid, vid.subject, note.content, mycur.lecture_idx AS mycur_lec_idx, note.lecture_idx AS note_lec_idx, mycur.recent_learned_at
                        FROM my_curriculum mycur, video_note note, _youtube_fulldata_temp vid
                        WHERE mycur.video_id = note.video_id
                            AND note.video_id = vid.uid
                            AND mycur.user_id = note.writer_id
                            AND note.lecture_idx = 0
                            AND note.writer_id = "'.$userId.'"
                            AND note.status = "active"
                        GROUP BY note.idx)
                    ) AS t
                GROUP BY uid
                ORDER BY recent_learned_at DESC';

        // 영상 정보, 영상 별 노트 개수 조회
        $videoNoteList = DB::select($query);

        return view('sub.video.video_note_list', compact('videoNoteList'));
    }

    public function videoNoteDetail(Request $request) {
        $videoId = $request->get('video_id', '');
        $userId = Auth::user()->email;

        // 강좌의 영상 노트(lecture_idx = ?)와 스마트 학습 영상 노트(lecture_idx = 0) union 쿼리
        $query = 'SELECT note_idx, video_id, subject, video_time, lecture_idx, title, content
                    FROM (
                        (SELECT note.idx AS note_idx, note.video_id, vid.subject, note.video_time, lec.idx AS lecture_idx, lec.title, note.content, note.writed_at
                            FROM video_note note, lecture lec, _youtube_fulldata_temp vid
                            WHERE note.video_id = vid.uid
                            AND note.video_id = vid.uid
                            AND note.lecture_idx = lec.idx
                            AND note.writer_id = "'.$userId.'"
                                AND note.video_id = "'.$videoId.'"
                            AND note.status = "active")
                        UNION
                        (SELECT  note.idx AS note_idx, note.video_id, vid.subject, note.video_time, NULL, NULL, note.content, note.writed_at
                            FROM video_note note, _youtube_fulldata_temp vid
                            WHERE note.video_id = vid.uid
                                AND note.lecture_idx = 0
                            AND note.writer_id = "'.$userId.'"
                                AND note.video_id = "'.$videoId.'"
                            AND note.status = "active"
                            GROUP BY note.idx)
                    ) AS t
                ORDER BY writed_at DESC';

        // 해당 영상의 노트 목록, 상세 정보 조회
        $videoNoteList = DB::select($query);

        return view('sub.video.video_note_detail', compact('videoNoteList'));
    }

    public function videoPlaylist() {
        $userId = Auth::user()->email;

        // 재생목록 디렉터리 목록 조회(추가된 영상이 있는 재생목록과 없는 재생목록 union)
        $query = 'SELECT *, SUM(video_cnt) AS video_sum
                    FROM (
                        (SELECT dir.*, COUNT(dir.idx) AS video_cnt
                        FROM playlist_directory dir, playlist_video vid
                        WHERE dir.idx = vid.directory_idx
                            AND dir.user_id = vid.user_id
                            AND dir.user_id = "'.$userId.'"
                            AND vid.status = "active"
                        GROUP BY dir.idx)
                        UNION ALL
                        (SELECT *, 0 AS video_cnt
                        FROM playlist_directory
                        WHERE user_id = "'.$userId.'"
                            AND status = "active")) AS t
                    GROUP BY idx
                    ORDER BY created_at DESC';

        $playlistDirectoryList = DB::select($query);

        return view('sub.video.video_playlist', compact('playlistDirectoryList'));
    }

    public function addPlaylistDirectory(Request $request) {
        $directoryTitle = $request->post('directory_title', '');
        $userId = Auth::user()->email;

        try {
            // 새 재생목록 디렉터리 생성
            DB::table('playlist_directory')->insert([
                'user_id' => $userId,
                'title' => $directoryTitle,
                'created_at' => now()
            ]);

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function modifyPlaylistDirectory(Request $request) {
        $directoryIdx = $request->post('directory_idx', '');
        $directoryTitle = $request->post('directory_title', '');

        try {
            // 재생목록 디렉터리 업데이트
            DB::table('playlist_directory')->where('idx', $directoryIdx)->update([
                'title' => $directoryTitle,
                'updated_at' => now()
            ]);

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function deletePlaylistDirectory(Request $request) {
        $directoryIdx = $request->post('directory_idx', '');

        try {
            // 재생목록 디렉터리 삭제
            DB::table('playlist_directory')->where('idx', $directoryIdx)->update(['status' => 'delete', 'deleted_at' => now()]);

            // 해당 재생목록에 추가된 영상 정보 삭제
            DB::table('playlist_video')->where('directory_idx', $directoryIdx)->update(['status' => 'delete', 'deleted_at' => now()]);

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function videoPlaylistDetail(Request $request) {
        $directoryIdx = $request->get('idx', '');
        $userId = Auth::user()->email;

        // 재생목록 제목, 추가된 영상 수 조회
        $query = 'SELECT dir.*, COUNT(dir.idx) AS video_cnt
                    FROM playlist_directory dir, playlist_video vid
                    WHERE dir.idx = vid.directory_idx
                        AND dir.user_id = vid.user_id
                        AND dir.user_id = "'.$userId.'" AND dir.idx = '.$directoryIdx.'
                        AND vid.status = "active"
                    ORDER BY dir.created_at DESC';

        $playlistDirectoryInfo = DB::select($query);

        if (count($playlistDirectoryInfo) == 1) {
            $playlistDirectoryInfo = $playlistDirectoryInfo[0];
        }

        // 목록 이동을 위한 재생목록 디렉터리 목록 조회
        $query2 = 'SELECT * FROM playlist_directory WHERE user_id = "'.$userId.'" AND idx != '.$directoryIdx.' AND status = "active" ORDER BY created_at DESC';

        $playlistDirectoryList = DB::select($query2);

        // 해당 재생목록에 추가된 영상 목록 조회
        $query3 = 'SELECT pl.idx, pl.directory_idx, vid.uid, vid.subject, vid.channel, vid.hit_cnt, pl.order
                    FROM playlist_video pl, _youtube_fulldata_temp vid
                    WHERE pl.video_id = vid.uid
                        AND pl.status = "active"
                        AND pl.directory_idx = '.$directoryIdx.'
                    GROUP BY vid.uid
                    ORDER BY pl.idx';

        // 노트 수 삭제로 인한 쿼리 변경
        // $query3 = 'SELECT *, SUM(note_cnt) AS note_sum
        //             FROM (
        //                 (SELECT pl.directory_idx, vid.uid, vid.subject, vid.channel, vid.hit_cnt, pl.order, COUNT(note.idx) AS note_cnt
        //                 FROM playlist_video pl, _youtube_fulldata_temp vid, video_note note
        //                 WHERE pl.video_id = vid.uid
        //                     AND pl.video_id = note.video_id
        //                     AND pl.user_id = note.writer_id
        //                     AND pl.status = "active"
        //                 GROUP BY vid.uid)
        //                 UNION ALL
        //                 (SELECT pl.directory_idx, vid.uid, vid.subject, vid.channel, vid.hit_cnt, pl.order, 0 AS note_cnt
        //                 FROM playlist_video pl, _youtube_fulldata_temp vid
        //                 WHERE pl.video_id = vid.uid
        //                     AND pl.status = "active")) AS t
        //             WHERE directory_idx = '.$directoryIdx.'
        //             GROUP BY uid
        //             ORDER BY `order`';

        $playlistVideoList = DB::select($query3);

        return view('sub.video.video_playlist_detail', compact('playlistDirectoryInfo', 'playlistDirectoryList', 'playlistVideoList'));
    }

    public function deletePlaylistVideo(Request $request) {
        $directoryIdx = $request->post('playlist_video_idx', '');

        try {
            // 해당 재생목록에 추가된 영상 정보 삭제
            DB::table('playlist_video')->where('idx', $directoryIdx)->update(['status' => 'delete', 'deleted_at' => now()]);

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function movePlaylist(Request $request) {
        $playlistVideoIdx = $request->post('playlist_video_idx', '');
        $checkedPlaylistIdx = $request->post('checked_playlist_idx', '');

        try {
            // 재생 목록 업데이트
            DB::table('playlist_video')->where('idx', $playlistVideoIdx)->update(['directory_idx' => $checkedPlaylistIdx, 'updated_at' => now()]);

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
