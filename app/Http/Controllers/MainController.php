<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class MainController extends Controller
{
    public function main(Request $reqeust) {

        if (Auth::user()) {
            $userId = Auth::user()->email;
            $userName = Auth::user()->nickname;
            $role = Auth::user()->role;

            // 현재 수강 중인 강좌 조회
            // --> 가장 최근에 학습한 순
            $query = 'SELECT lec.idx, lec.scate_id, lec.title, lec.save_thumbnail, lec.tags,
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
                    GROUP BY mylec.lecture_idx
                    ORDER BY mylec.recent_learned_at DESC';

            $learningLectureList = DB::select($query);


            if (count($learningLectureList) > 0) {

                // 가장 최근에 학습한 강좌의 주제 목록
                $myLearningLecTagList = explode('|', $learningLectureList[0]->tags, 4);

                // 주제 목록 slicing (앞의 3개만 가져옴)
                $myLearningLecTagList = array_slice($myLearningLecTagList, 0, 3);

                // 주제 목록 reserialize
                $myLearningLecTag = '';
                foreach($myLearningLecTagList as $tag) {
                    $myLearningLecTag .= $tag.'|';
                }
                $myLearningLecTag = substr($myLearningLecTag, 0, -1);

                $where = '';
                if ($myLearningLecTag != '') {
                    $where = ' AND tags REGEXP "'.$myLearningLecTag.'"';
                }

                $query = 'SELECT idx, title, save_thumbnail, owner_name, rating, student_cnt
                            FROM lecture
                            WHERE idx != '.$learningLectureList[0]->idx.'
                                AND scate_id = "'.$learningLectureList[0]->scate_id.'"
                                '.$where.'
                                AND public_yn ="Y"
                            ORDER BY registed_at DESC
                            LIMIT 10';

                // 내가 수강 중인 강좌와 비슷한 강좌 조회
                // --> 가장 최근에 학습한 강좌의 소분류 카테고리 내에서 동일한 주제가 많은 순
                $similarLectureList = DB::select($query);
            }

            if ($role == 'instructor') {

                // 현재 운영 중인 강좌 조회(강사)
                // --> 가장 최근에 개설 또는 수정한 순
                $operatingLectureList = DB::select('SELECT idx, scate_id, title, save_thumbnail, tags, student_cnt FROM lecture WHERE owner_id = "'.$userId.'" ORDER BY updated_at DESC, registed_at DESC');

                if (count($operatingLectureList) > 0) {

                    // 가장 최근에 개설(또는 수정)한 강좌의 주제 목록
                    $myOperatingLecTagList = explode('|', $operatingLectureList[0]->tags, 4);

                    // 주제 목록 slicing (앞의 3개만 가져옴)
                    $myOperatingLecTagList = array_slice($myOperatingLecTagList, 0, 3);

                    // 주제 목록 reserialize
                    $myOperatingLecTag = '';
                    foreach ($myOperatingLecTagList as $tag) {
                        $myOperatingLecTag .= $tag.'|';
                    }
                    $myOperatingLecTag = substr($myOperatingLecTag, 0, -1);

                    $where = '';
                    if ($myOperatingLecTag != '') {
                        $where = ' AND tags REGEXP "'.$myOperatingLecTag.'"';
                    }

                    // 현재 운영 중인 강좌의 index 목록
                    $operatingLecIdxList = '';
                    foreach($operatingLectureList as $operatingLecture) {
                        $operatingLecIdxList .= $operatingLecture->idx.',';
                    }
                    $operatingLecIdxList = substr($operatingLecIdxList, 0, -1);

                    // 내가 운영 중인 강좌와 비슷한 강좌 조회(강사)
                    // --> 가장 최근에 개설(또는 수정)한 강좌의 소분류 카테고리 내에서 동일한 주제가 많은 순
                    $similarOperLecList = DB::select('SELECT idx, title, save_thumbnail, owner_name, rating, student_cnt FROM lecture WHERE idx NOT IN ('.$operatingLecIdxList.') AND scate_id = "'.$operatingLectureList[0]->scate_id.'"'.$where.' AND public_yn = "Y" ORDER BY registed_at DESC LIMIT 10');
                }

            } else if ($role == 'youtuber') {
                // 최근 추가된 내 영상 조회(유튜버)
                // --> 가장 최근에 강좌에 적용된 순
                $addRecentVideoList = DB::select('SELECT vid.uid, vid.subject, vid.channel, vid.hit_cnt, curri.lecture_idx FROM _youtube_fulldata_temp vid, curriculum curri WHERE vid.uid = curri.video_id AND `channel` = "'.$userName.'" ORDER BY created_at DESC LIMIT 10');
            }

            //내관심 분야
            $interest_json = DB::select('select interest from users where email = ? and role = ?', [Auth::user()->email, $role])[0]->interest;
            $interest =  json_decode($interest_json, true);
            $scate = DB::select('select scate_id, scate_name from s_category');

            $aiRecommand = array(
                'DP010000'=>[660, 47, 263, 798, 173, 11, 198, 267, 85, 124],
                'DP020000'=>[59, 15, 140, 13, 272, 138, 130, 17, 138, 68],
                'DP030000'=>[64, 799, 661, 241, 252, 21, 16, 122, 72, 237],
                'DS010000'=>[378, 69, 112, 118, 300, 219, 5, 88, 391, 277],
                'DS020000'=>[111, 127, 3, 1, 268, 82, 57, 390, 117, 37],
                'DS030000'=>[98, 194, 33, 271, 35, 8, 255],
                'ES010000'=>[719, 755, 739, 770, 740, 783, 768, 795, 753, 748],
                'ES020000'=>[485, 554, 429, 455, 476, 490, 722, 499, 568, 576],
                'SI010000'=>[800, 327, 285, 346, 330, 179, 383, 680, 301, 295],
                'SI020000'=>[800, 786, 785, 743, 26, 359, 745, 308, 777, 309]
            );

            $interest_arr = array();

            if(isset($interest)){
                foreach($scate as $item ){
                    if(array_key_exists($item->scate_id, $interest)){
                        $interest_arr[$item->scate_name] = ['score'=>(int)$interest[$item->scate_id]*20, 'scate_id'=>$item->scate_id];
                    }
                }
                array_multisort(array_column($interest_arr, 'score'), SORT_DESC, array_column($interest_arr, 'scate_id'), SORT_ASC, $interest_arr);

                arsort($interest);

                $firstId = key($interest);

                $where = 'WHERE scate_id = "'.$firstId.'" ';

                $idxRange = $aiRecommand[$firstId][0];
                for($i=1; $i<count($aiRecommand[$firstId]); $i++){
                    $idxRange.=', '.$aiRecommand[$firstId][$i];
                }

                if($where!=''){
                    $idxQuery=' AND idx IN ('.$idxRange.') ORDER BY FIELD(idx, '.$idxRange.') ';
                }else{
                    $idxQuery = ' WHERE idx IN ('.$idxRange.') ORDER BY FIELD(idx, '.$idxRange.') ';
                }

                // TODO: 인기 강좌, 신규 강좌, AI 추천 강좌 소분류 카테고리 선택 시 비동기 조회 처리
                // -------------------------------------------------------------------------------------------
                // 인기 강좌
                // TODO: --> 해당 소분류 카테고리 내에서 1순위) 수강자 많은 순, 2순위) 완강률
                $popularLecList1 = DB::select('SELECT * FROM lecture '.$where.' ORDER BY student_cnt desc limit 10');
                // 신규 강좌
                // TODO: --> 해당 소분류 카테고리 내에서 1순위) 최근 순, 2순위) 수강자 많은 순
                $newLecList1 = DB::select('SELECT * FROM lecture '.$where.'ORDER BY idx desc, student_cnt desc limit 10');
                // AI 추천 강좌
                $aiLecList1 = DB::select('SELECT * FROM lecture '.$where.$idxQuery.' limit 10');
            }
        }


        // 지금 뜨는 강사 TOP10
        // --> 1) 수강자수(랭킹 기본값), 2) 응답률, 3)강좌 평점
        $query = 'SELECT usr.id, usr.email, usr.nickname, usr.save_profile_image, COUNT(lec.idx) AS lecture_cnt, SUM(lec.student_cnt) AS total_student, lec.rating
                    FROM users usr, lecture lec
                    WHERE usr.email = lec.owner_id
                        AND usr.role = "instructor"
                    GROUP BY usr.email
                    ORDER BY total_student DESC, rating DESC
                    LIMIT 10';

        $hotInstructorList = DB::select($query);

        // 지금 핫한 강좌 TOP10
        // --> 1) 수강자수(랭킹 기본값), 2) 완강률, 3)평점

        // TODO: 임시 선정 10개
        $hotLecList = DB::select('SELECT idx, title, save_thumbnail, category_1, owner_name, rating, student_cnt FROM lecture WHERE idx IN (777, 800, 743, 301, 786, 799, 327, 285, 346, 330)');

        // $hotLecList = DB::select('SELECT idx, title, save_thumbnail, category_1, owner_name, rating, student_cnt FROM lecture ORDER BY student_cnt DESC, rating DESC LIMIT 10');
        // $hotLecList = DB::select('SELECT lec.idx, lec.title, lec.save_thumbnail, lec.student_cnt, lec.owner_name, lec.rating, scate.scate_name FROM lecture lec, s_category scate WHERE lec.scate_id = scate.scate_id ORDER BY student_cnt DESC, rating DESC LIMIT 10');

        // 최신 트렌드 AI 분석
        // --> TODO: 임의 지정
        $analysisVideoList = DB::select('SELECT uid, subject, channel, hit_cnt FROM _youtube_fulldata_temp WHERE uid IN ("CeoSIpP_BTI", "qkEd_HVrAxg", "4hsV1Dwlu_s", "KjlHiudGO-Q", "UeEaqgMOZdQ", "8RKajv7vxao", "HqjvgzFJEBc", "7vK9233jbvs", "CIKuHBzup2I", "oj0UucSa0Fw")');

        return view('index', compact('learningLectureList', 'similarLectureList', 'addRecentVideoList', 'operatingLectureList', 'similarOperLecList', 'interest_arr', 'popularLecList1', 'newLecList1', 'aiLecList1', 'hotInstructorList', 'hotLecList', 'analysisVideoList'));
    }

}


