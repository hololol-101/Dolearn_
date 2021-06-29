<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class LectureController extends Controller{

    public function lectureList(Request $request) {
        $bcateId = $request->get('bcate_id', '');
        $scateId = $request->get('scate_id', '');
        $keyword = $request->get('keyword', '');
        $level = $request->get('level', '');
        $isFree = $request->get('is_free', '');
        $order = $request->get('order', '');
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

        // 대/소분류 카테고리 조건부 강좌 목록 조회 쿼리
        if ($bcateId != '' && $scateId != '') {
            $where = ' WHERE bcate_id="'.$bcateId.'" AND scate_id="'.$scateId.'"';
        } else if ($bcateId != '' && $scateId == '') {
            $where = ' WHERE bcate_id="'.$bcateId.'"';
        }

        // selectbox 값 조건부 강좌 목록 조회 쿼리
        if ($level != '') {
            if ($where == '') {
                $where = ' WHERE level="'.$level.'"';
            } else {
                $where2 .= ' AND level="'.$level.'"';
            }
        }
        if ($isFree != '') {
            if ($where == '') {
                $where = ' WHERE free_yn="'.$isFree.'"';
            } else {
                $where2 .= ' AND free_yn="'.$isFree.'"';
            }
        }

        // 키워드 조건부 강좌 목록 조회 쿼리
        if ($keyword != '') {
            if ($where == '') {
                $where = ' WHERE (title LIKE "%'.$keyword.'%" or description LIKE"%'.$keyword.'%")';
            } else {
                $where2 .= ' AND (title LIKE "%'.$keyword.'%"  or description LIKE"%'.$keyword.'%")';
            }
        }

        if ($where == '' && $where2 == '') {
            $where3 = ' WHERE public_yn = "Y"';
        } else {
            $where3 = ' AND public_yn = "Y"';
        }

        $orderBy = ' ORDER BY idx desc';
        if ($order == 'students') {
            $orderBy = "ORDER BY student_cnt desc";
        } else if ($order == 'rating') {
            $orderBy = ' ORDER BY rating desc';

        } else if ($order == 'complete') {
            // TODO: 완강률 높은순 정렬 쿼리
        }

        $lectureList = DB::select('SELECT idx, title, save_thumbnail, rating, student_cnt, tags, owner_name, free_yn FROM lecture'.$where.$where2.$where3.$orderBy.' limit 12');
        //총 강좌수
        $lectureCount = DB::select('SELECT count(*) count FROM lecture'.$where.$where2.$where3.$orderBy)[0]->count;
        // 강좌 태그 조회 후 배열로 재구성
        // $lectureTagArr = [];
        // foreach($lectureList as $lecture) {
        //     $lectureTagArr = array_merge($lectureTagArr, explode('|', trim($lecture->tags)));
        // }

        // 배열 내 원소 중복 제거
        // $lectureTagArr = array_unique($lectureTagArr);

        // 배열 내 원소 해당 개수만큼 자르기
        // $lectureTagArr = array_slice($lectureTagArr, 0, 20);


        // TODO: 강좌 태그(주제) 조회 -> 임시 테스트
        $where4 = '';

        if ($bcateId != '' && $scateId != '') {
            $where4 = ' WHERE bcate = "'.$bcateId.'" AND scate = "'.$scateId.'"';
        } else if ($bcateId != '' && $scateId == '') {
            $where4 = ' WHERE bcate = "'.$bcateId.'"';
        }

        $lectureTagArr = DB::select('SELECT * FROM _youtube_fulldata_showtag'.$where4.' ORDER BY idx LIMIT 20');

        return view('sub.lecture.lecture_list', compact('lectureList', 'lectureCount', 'lectureTagArr', 'bcateList', 'scateList', 'bcateName', 'scateName'));
    }

    public function getLectureData(Request $request) {
        $tagNameList = $request->post('tag_name_list', '');
        $bcateId = $request->post('bcate_id', '');
        $scateId = $request->post('scate_id', '');
        $keyword = $request->post('keyword', '');
        $level = $request->post('level', '');
        $isFree = $request->post('is_free', '');
        $order = $request->post('order', '');
        $pageNum = $request->post('pageNum', 1);
        $limit = ' limit '.(($pageNum-1)*12).', '.(12);
        $where = '';
        $where2 = '';
        $where3 = '';
        $where4 = '';
        $where5 = '';
        $orderBy = '';
        $query = '';
        $resData = '';
        $tagNames = '';

        // 선택한 주제가 있을 경우 주제명을 재구성
        if ($tagNameList != '') {
            foreach($tagNameList as $tagName) {
                $tagNames .= $tagName.'|';
            }
            $tagNames = substr($tagNames, 0, -1);
        }

        // 대분류, 소분류 카테고리 둘 다 선택했을 경우
        if ($bcateId != '' && $scateId != '') {
            $where = ' WHERE bcate_id="'.$bcateId.'" AND scate_id="'.$scateId.'"';

        // 대분류 카테고리만 선택한 경우
        } else if ($bcateId != '' && $scateId == '') {
            $where = ' WHERE bcate_id="'.$bcateId.'"';
        }

        // 키워드 조건부 강좌 목록 조회 쿼리
        if ($keyword != '') {
            if ($where == '') {
                $where = ' WHERE (title LIKE "%'.$keyword.'%" or description LIKE"%'.$keyword.'%")';
            } else {
                $where2 .= ' AND (title LIKE "%'.$keyword.'%"  or description LIKE"%'.$keyword.'%")';
            }
        }

        // selectbox 값 조건부 강좌 목록 조회 쿼리
        if ($level != '') {
            if ($where == '') {
                $where = ' WHERE level="'.$level.'"';
            } else {
                $where2 .= ' AND level="'.$level.'"';
            }
        }
        if ($isFree != '') {
            if ($where == '') {
                $where = ' WHERE free_yn="'.$isFree.'"';
            } else {
                $where2 .= ' AND free_yn="'.$isFree.'"';
            }
        }

        // 선택한 주제가 있을 경우
        if ($tagNames != '') {
            if ($where == '' && $where2 == '') {
                $where3 = ' WHERE tags REGEXP ("'.$tagNames.'")';
            } else {
                $where3 = ' AND tags REGEXP ("'.$tagNames.'")';
            }
        }

        // 검색 키워드가 있을 경우
        if ($keyword != '') {
            if ($where == '' && $where2 == '' && $where3 == '') {
                $where4 =  ' WHERE (title LIKE "%'.$keyword.'%" or description LIKE"%'.$keyword.'%")';
            } else {
                $where4 = ' AND (title LIKE "%'.$keyword.'%"  or description LIKE"%'.$keyword.'%")';
            }
        }

        // 공개 강좌일 경우만 조회
        if ($where == '' && $where2 == '' && $where3 == '' && $where4 == '') {
            $where5 = ' WHERE public_yn = "Y"';
        } else {
            $where5 = ' AND public_yn = "Y"';
        }

        $orderBy = ' ORDER BY idx desc';
        if ($order == 'students') {
            $orderBy = "ORDER BY student_cnt desc";
        } else if ($order == 'rating') {
            $orderBy = ' ORDER BY rating desc';

        } else if ($order == 'complete') {
            // TODO: 완강률 높은순 정렬 쿼리
        }

        $query = 'SELECT idx, title, save_thumbnail, rating, student_cnt, tags, owner_name, free_yn FROM lecture'.$where.$where2.$where3.$where4.$where5.$orderBy.$limit;

        try {
            $lectureList = DB::select($query);
            $totalcount = DB::select('SELECT count(*) count FROM lecture'.$where.$where2.$where3.$where4.$where5.$orderBy)[0]->count;

            // 쿼리 확인용
            $result['query'] = $query;

            // 조회된 영상 수
            $result['count'] = count($lectureList);
            $result['totalcount'] = $totalcount;

            // 조회된 영상 수에 따라 버튼 숨김 여부 판단
            if (count($lectureList) >= 8) {
                $result['isShowMore'] = true;
            } else {
                $result['isShowMore'] = false;
            }

            foreach($lectureList as $lecture) {
                $resData .= '<div class="item column">';
                $resData .=     '<div class="w1">';
                $resData .=         '<a href="'.route('sub.lecture.lecture_detail', ['idx' => $lecture->idx]).'" class="a1" lecture_idx="'.$lecture->idx.'">';
                $resData .=             '<div class="f1">';
                $resData .=                 '<span class="f1p1">';

                if ($lecture->save_thumbnail != '') {
                    $resData .=                 '<img src="'.asset('storage/uploads/thumbnail/'.$lecture->save_thumbnail).'" alt="'.$lecture->title.'" />';
                } else {
                    $resData .=                 '<img src="'.asset('assets/images/lib/noimg1.png').'" alt="'.$lecture->title.'" />';
                }

                $resData .=                 '</span>';
                $resData .=             '</div>';
                $resData .=             '<div class="tg1">';
                $resData .=                 '<strong class="t1">'.$lecture->title.'</strong>';
                $resData .=             '</div>';
                $resData .=             '<div class="ratings">';
                $resData .=                 '<strong class="t1 blind">별점</strong>';
                $resData .=                 '<i class="star5rating1">';
                $resData .=                     '<i class="st-on" style="width:'.round($lecture->rating * 20, 1).'%;"><i class="ic1"></i></i>';
                $resData .=                     '<i class="st-off" style="width:100%;"><i class="ic2"></i></i>';
                $resData .=                 '</i>';
                $resData .=                 '<span class="t2">';
                $resData .=                     '<span class="t2t1">평점</span>';
                $resData .=                     '<span class="t2t2">'.$lecture->rating.'</span>';
                $resData .=                     '<span class="t2t3">· 수강생 '.$lecture->student_cnt.'명</span>';
                $resData .=                 '</span>';
                $resData .=             '</div>';
                $resData .=             '<div class="tg2">';
                $resData .=                 '<span class="t2">';
                $resData .=                     '<span class="t2t1">'.$lecture->owner_name.'</span>';
                $resData .=                 '</span>';
                $resData .=                 '<span class="t3">';

                $freeYn = ($lecture->free_yn == 'Y') ? '무료' : '유료';

                $resData .=                     '<span class="t3t1">'.$freeYn.'</span>';
                $resData .=                 '</span>';
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
        $orderBy = '';
        $query = '';
        $resData = '';

        // 영상 태그 조회
        if ($bcateId != '' && $scateId != '') {
            $where = ' AND bcate = "'.$bcateId.'" AND scate = "'.$scateId.'"';
        } else if ($bcateId != '' && $scateId == '') {
            $where = ' AND bcate = "'.$bcateId.'"';
        }

        $orderBy = ' ORDER BY idx';

        $query = 'SELECT * FROM _youtube_fulldata_showtag WHERE idx > '.$lastTagIdx.$where.$orderBy.' LIMIT 20';

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
                $resData .= '<a href="javascript:void(0);" class="a1" tag_idx="'.$tag->idx.'">'.$tag->tag.'</a>';
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

    public function lectureDetail(Request $request) {
        $userId = Auth::user()->email;
        $idx = $request->get('idx', '');
        $countVideo = 0;
        $totalTime = '0000-00-00 00:00:00';
        $format = '';
        $isApplicatedLecture = false;

        // 기존 수강 신청한 강좌인지 확인
        $existLectureInfo = DB::table('my_lecture')->where('user_id', $userId)->where('lecture_idx', $idx)->get();

        if (count($existLectureInfo) > 0) {
            $isApplicatedLecture = true;
        }

        // 강좌 상세 정보 조회
        $lectureDetail = DB::select('SELECT lec.*, vid.uid, vid.channel, vid.video_len, SUM(TIME_TO_SEC(vid.video_len)) AS total_video_len FROM lecture lec, curriculum cur, _youtube_fulldata_temp vid WHERE lec.idx = cur.lecture_idx AND cur.video_id = vid.uid AND lec.idx = '.$idx.'');

        if (count($lectureDetail) > 0) {
            $lectureDetail = $lectureDetail[0];
        }

        // 해당 강좌의 강사 정보 조회
        $instructorInfo = DB::select('SELECT id, email, nickname, role, introduction, save_profile_image FROM users WHERE email = "'.$lectureDetail->owner_id.'"');

        if (count($instructorInfo) > 0) {
            $instructorInfo = $instructorInfo[0];
        }

        // 가장 최근에 학습한 강좌의 주제 목록
        $operationLecTagList = explode('|', $lectureDetail->tags, 4);

        // 주제 목록 slicing (앞의 3개만 가져옴)
        $operationLecTagList = array_slice($operationLecTagList, 0, 3);

        // 주제 목록 reserialize
        $operationLecTag = '';
        foreach($operationLecTagList as $tag) {
            $operationLecTag .= $tag.'|';
        }
        $operationLecTag = substr($operationLecTag, 0, -1);

        $where = '';
        if ($operationLecTag != '') {
            $where = ' AND tags REGEXP "'.$operationLecTag.'"';
        }

        $query = 'SELECT idx, title, save_thumbnail, student_cnt
                    FROM lecture
                    WHERE owner_id = "'.$lectureDetail->owner_id.'"
                        AND idx != "'.$idx.'"
                        '.$where.'
                        AND public_yn = "Y"
                    ORDER BY registed_at DESC
                    LIMIT 10';

        // 해당 강좌의 강사가 운영 중인 다른 강좌 정보 조회
        // --> 본 강좌와 동일한 주제를 많이 가진 순(연관도 높은 순)
        $operationLectureList = DB::select($query);

        if (count($operationLectureList) == 0) {
            $operationLectureList = DB::select('SELECT idx, title, save_thumbnail, student_cnt FROM lecture WHERE owner_id = "'.$lectureDetail->owner_id.'" AND idx != "'.$idx.'" AND public_yn = "Y" ORDER BY registed_at DESC LIMIT 10');
        }

        $bchapterList = DB::select('SELECT * FROM b_chapter WHERE lecture_idx='.$idx.' AND status="active" ORDER BY `order`');
        $schapterList = DB::select('SELECT * FROM s_chapter WHERE lecture_idx='.$idx.' AND status="active" ORDER BY `order`');
        $curriSchapterList = array();
        $curriVideoList = array();

        foreach ($bchapterList as $bchapter) {
            $schapList = DB::select('SELECT * FROM s_chapter WHERE lecture_idx='.$idx.' AND bchap_id="'.$bchapter->bchap_id.'" AND status="active" ORDER BY `order`');
            array_push($curriSchapterList, $schapList);
        }

        foreach ($schapterList as $schapter) {
            // $videoList = DB::select('SELECT idx, uid, subject, channel, video_len FROM _youtube_fulldata_temp WHERE uid IN (SELECT video_id FROM curriculum WHERE lecture_idx='.$idx.' AND schap_id="'.$schapter->schap_id.'")');

            // sub query -> join
            $videoList = DB::select('SELECT vid.uid, curri.new_video_title, vid.channel, vid.video_len FROM _youtube_fulldata_temp vid, curriculum curri WHERE vid.uid = curri.video_id AND curri.lecture_idx='.$idx.' AND curri.schap_id="'.$schapter->schap_id.'" AND curri.status="active"');
            array_push($curriVideoList, $videoList);

            // 소단원 별 강의(영상) 합계 -> 강좌의 총 강의(영상) 수
            $countVideo += count($videoList);

            // 소단원 별 강의(영상) 시간 합계 -> 강좌의 총 강의(영상) 시간
            foreach ($videoList as $video) {
                if (date("H", strtotime($video->video_len)) >= 1) {
                    $format = 'H시간 i분 s초';
                } else {
                    $format = 'i분 s초';
                }
                $totalTime = date($format, strtotime($video->video_len));
            }
        }

        // 해당 강좌에 포함된 강의 영상의 유튜버 정보 조회
        // TODO: --> 본 강좌에 포함된 영상 수가 많은 유튜버 순
        $youtuberInfoList = DB::select('SELECT id, email, nickname, role, introduction, save_profile_image FROM users WHERE role = "youtuber"');

        // 수강 후기 목록 전체 조회
        $reviewAllList = DB::select('SELECT rev.*, usr.save_profile_image FROM lecture_review rev, users usr WHERE rev.writer_id = usr.email AND lecture_idx = '.$idx);

        // 수강 후기 목록 조회(3개)
        $reviewList = DB::select('SELECT rev.*, usr.save_profile_image FROM lecture_review rev, users usr WHERE rev.writer_id = usr.email AND lecture_idx = '.$idx.' ORDER BY writed_at DESC LIMIT 3');

        // 평점 별 카운팅
        $ratingArr = array();
        $ratingSum = 0;
        $rating1pCnt = 0;
        $rating2pCnt = 0;
        $rating3pCnt = 0;
        $rating4pCnt = 0;
        $rating5pCnt = 0;

        foreach ($reviewAllList as $key => $review) {
            $ratingSum += $review->rating;

            if ($review->rating == 5) {
                $rating5pCnt++;
            } else if ($review->rating == 4) {
                $rating4pCnt++;
            } else if ($review->rating == 3) {
                $rating3pCnt++;
            } else if ($review->rating == 2) {
                $rating2pCnt++;
            } else if ($review->rating == 1) {
                $rating1pCnt++;
            }
        }

        $ratingCntArr = [
            5 => $rating5pCnt,
            4 => $rating4pCnt,
            3 => $rating3pCnt,
            2 => $rating2pCnt,
            1 => $rating1pCnt,
        ];

        // 해당 강좌의 전체 후기 수
        $reviewAllCnt = count($reviewAllList);

        return view('sub.lecture.lecture_detail', compact('isApplicatedLecture', 'lectureDetail', 'bchapterList', 'curriSchapterList', 'curriVideoList', 'countVideo', 'operationLectureList', 'instructorInfo', 'youtuberInfoList', 'reviewList', 'ratingSum', 'ratingCntArr', 'reviewAllCnt'));
    }

    public function getMoreReview(Request $request) {
        $lectureIdx = $request->post('lecture_idx', '');
        $lastReviewIdx = $request->post('last_review_idx', '');
        $query = '';
        $resData = '';

        try {
            // 수강 후기 조회
            $query = 'SELECT rev.*, usr.save_profile_image FROM lecture_review rev, users usr WHERE rev.writer_id = usr.email AND lecture_idx = '.$lectureIdx.' AND rev.idx < '.$lastReviewIdx.' ORDER BY rev.writed_at DESC LIMIT 3';

            $reviewList = DB::select($query);

            // 쿼리 확인용
            $result['query'] = $query;

            // 조회된 후기 수
            $result['count'] = count($reviewList);

            // 조회된 후기 수에 따라 버튼 숨김 여부 판단
            if (count($reviewList) >= 3) {
                $result['isShowMore'] = true;
            } else {
                $result['isShowMore'] = false;
            }

            foreach($reviewList as $review) {
                $resData .= '<div class="w1 item" review_idx='.$review->idx.'>';
                $resData .=     '<div class="w1w1">';
                $resData .=         '<div class="f1">';
                $resData .=             '<span class="f1p1">';

                if ($review->save_profile_image == '') {
                    $resData .=             '<img src="'.asset('assets/images/lib/noimg1face1.png').'" alt="이미지 없음" />';
                } else {
                    $resData .=             '<img src="'.asset('assets/images/lib/'.$review->save_profile_image).'" alt="'.$review->save_profile_image.'" />';
                }

                $resData .=             '</span>';
                $resData .=         '</div>';
                $resData .=     '</div>';
                $resData .=     '<div class="w1w2">';
                $resData .=         '<div class="tg1">';
                $resData .=             '<i class="star5rating1">';
                $resData .=                 '<i class="st-on" style="width:'.($review->rating * 20).'%;"><i class="ic1"></i></i>';
                $resData .=                 '<i class="st-off" style="width:100%;"><i class="ic2"></i></i>';
                $resData .=             '</i>';
                $resData .=             '<span class="t1">'.$review->writer_name.'</span>';

                // 지난 시간 계산
                $resultTime = '';
                $t = time() - strtotime($review->writed_at);
                $f = array(
                    '31536000'=>'년',
                    '2592000'=>'개월',
                    '604800'=>'주',
                    '86400'=>'일',
                    '3600'=>'시간',
                    '60'=>'분',
                    '1'=>'초'
                );
                foreach ($f as $k=>$v)    {
                    if (0 != $c = floor($t / (int)$k)) {
                        $resultTime =  $c.$v.' 전';
                        break;
                    }
                }

                $resData .=             '<span class="t2">'.$resultTime.'</span>';
                $resData .=         '</div>';
                $resData .=         '<div class="tg2">'.$review->content.'</div>';
                $resData .=         '<div class="eg1">';
                $resData .=             '<a href="javascript:void(0);" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">'.$review->like_cnt.'</span></a>';
                $resData .=             '<div class="cp1menu1 toggle1s1">';
                $resData .=                 '<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>';
                $resData .=                 '<div class="cp1menu1c toggle-c">';
                $resData .=                     '<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>';
                $resData .=                 '</div>';
                $resData .=             '</div>';
                $resData .=         '</div>';
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

    public function courseApplication(Request $request) {
        $idx = $request->post('lecture_idx', '');
        $lectureName = $request->post('lecture_name', '');
        $userId = Auth::user()->email;

        try {
            // 기존에 신청한 강의인지 확인
            $existLectureInfo = DB::table('my_lecture')->where('user_id', $userId)->where('lecture_idx', $idx)->get();

            if (count($existLectureInfo) > 0) {
                $result['status'] = 'exist';
                return response()->json($result);
            }

            // 기존 생성된 커리큘럼 정보 조회
            $curriculumList = DB::table('curriculum')->where('lecture_idx', $idx)->where('status', 'active')->get();

            // 수강 신청한 커리큘럼 정보 테이블에 저장
            foreach($curriculumList as $curriculum) {
                DB::table('my_curriculum')->insert(array(
                    'user_id' => $userId,
                    'lecture_idx' => $curriculum->lecture_idx,
                    'bcate_id' => $curriculum->bcate_id,
                    'scate_id' => $curriculum->scate_id,
                    'bchap_id' => $curriculum->bchap_id,
                    'schap_id' => $curriculum->schap_id,
                    'video_id' => $curriculum->video_id,
                    'ori_video_title' => $curriculum->ori_video_title,
                    'new_video_title' => $curriculum->new_video_title,
                    'preview_yn' => $curriculum->preview_yn,
                    'comment' => $curriculum->comment,
                    'applicated_host' => $_SERVER['REMOTE_ADDR'],
                    'applicated_at' => now()
                ));
            }

            // 수강 신청한 강좌 정보 테이블에 저장
            DB::table('my_lecture')->insert(array(
                'user_id' => $userId,
                'lecture_idx' => $idx,
                'applicated_host' => $_SERVER['REMOTE_ADDR'],
                'applicated_at' => now()
            ));

            // 강좌 테이블에 수강자 +1
            DB::update('UPDATE lecture SET student_cnt = IFNULL(student_cnt, 0) + 1 WHERE idx = ?', [$idx]);

            createNotification('learning', $userId, $lectureName,'새로운 강의가 추가되었습니다.', '/learning/main?idx='.$idx);
            // 알림 추가

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function addNewLecture(Request $request) {
        $step = $request->get('step', '');

        session_start();
        $sessionId = session_id();
        session_destroy();

        $userId = Auth::user()->email;

        // 대분류 카테고리 목록 조회
        $bcategoryList = DB::select('SELECT * FROM b_category');

        // 기존에 임시 저장된 데이터가 있는지 확인
        $tempInfoResult = DB::select('SELECT * FROM tempsave_add_lecture WHERE session_id="'.$sessionId.'" AND user_id="'.$userId.'"');

        if (count($tempInfoResult) > 0) {
            $tempInfo = $tempInfoResult[0];
        }

        // 기본 정보
        if ($step == '' || $step == 'basic_info') {
            if (count($tempInfoResult) > 0) {

                // 임시 저장된 필수 소분류 카테고리 목록 조회
                if ($tempInfo->main_bcate_id != '') {
                    $existMainSCategoryList = DB::select('SELECT * FROM s_category WHERE bcate_id="'.$tempInfo->main_bcate_id.'"');
                } else {
                    $existMainSCategoryList = [];
                }

                // 임시 저장된 필수 인기 주제 목록 조회
                // if ($tempInfo->main_scate_id != '') {
                //     $existMainPSubjectList = DB::select('SELECT * FROM popular_subject WHERE bcate_id="'.$tempInfo->main_bcate_id.'" AND scate_id="'.$tempInfo->main_scate_id.'"');
                // } else {
                //     $existMainPSubjectList = [];
                // }

                // 임시 저장된 서브 소분류 카테고리 목록 조회
                if ($tempInfo->sub_bcate_id != '') {
                    $existSubSCategoryList = DB::select('SELECT * FROM s_category WHERE bcate_id="'.$tempInfo->sub_bcate_id.'"');
                } else {
                    $existSubSCategoryList = [];
                }

                // 임시 저장된 서브 인기 주제 목록 조회
                // if ($tempInfo->sub_scate_id != '') {
                //     $existSubPSubjectList = DB::select('SELECT * FROM popular_subject WHERE bcate_id="'.$tempInfo->sub_bcate_id.'" AND scate_id="'.$tempInfo->sub_scate_id.'"');
                // } else {
                //     $existSubPSubjectList = [];
                // }

                // 임시 저장된 추가 주제 목록 조회 후 배열로 저장
                $lectureTags = $tempInfo->lecture_tags;
                $lectureTagList = explode('|', $lectureTags);

                // return view('sub.lecture.add_new_lecture_basic_info', compact('bcategoryList', 'tempInfo', 'existMainSCategoryList', 'existMainPSubjectList', 'existSubSCategoryList', 'existSubPSubjectList', 'lectureTagList'));
                return view('sub.lecture.add_new_lecture_basic_info', compact('bcategoryList', 'tempInfo', 'existMainSCategoryList', 'existSubSCategoryList', 'lectureTagList'));

            } else {
                return view('sub.lecture.add_new_lecture_basic_info', compact('bcategoryList'));
            }

        // 강좌 소개
        } else if ($step == 'introduce') {
            return view('sub.lecture.add_new_lecture_introduce', compact('tempInfo'));

        // 커리큘럼
        } else if ($step == 'curriculum') {

            // 기존에 임시 저장된 데이터가 있는지 확인
            $tempCurriculumResult = DB::table('tempsave_curriculum')->where('session_id', $sessionId)->where('user_id', $userId)->get();

            if (count($tempCurriculumResult) > 0) {
                $bchapterList = DB::table('tempsave_b_chapter')->where('session_id', $sessionId)->where('user_id', $userId)->orderBy('order')->get();
                $schapterList = DB::table('tempsave_s_chapter')->where('session_id', $sessionId)->where('user_id', $userId)->orderBy('order')->get();
                $videoInfoList = DB::select('SELECT curri.bchap_id, curri.schap_id, curri.preview_yn, curri.new_video_title, video.analysis_yn, video.uid FROM tempsave_curriculum curri, tempsave_video video WHERE curri.video_id = video.uid AND curri.session_id = "'.$sessionId.'" AND curri.user_id = "'.$userId.'"');
            }

            // 유료 강좌일 경우 추천 영상 목록 조회 안함
            if (count($tempInfoResult) > 0 && ($tempInfo->free_yn == 'Y')) {
                $where = ' WHERE uid IN (SELECT uid FROM _youtube_fulldata_category WHERE bcate="'.$tempInfo->main_bcate_id.'" AND scate="'.$tempInfo->main_scate_id.'")';
                $orderBy = ' ORDER BY idx desc';

                // 해당 강좌의 대/소분류 카테고리 적용한 영상 목록 조회
                $videoList = DB::select('SELECT * FROM _youtube_fulldata_temp'.$where.$orderBy.' limit 8');

                // 영상 태그 조회
                $where2 = ' AND category.bcate = "'.$tempInfo->main_bcate_id.'" AND category.scate = "'.$tempInfo->main_scate_id.'"';

                $videoTagArr = DB::select('SELECT distinct tag, hashtag.idx, score FROM _youtube_fulldata_category category, _youtube_fulldata_hashtag hashtag WHERE category.uid = hashtag.uid'.$where2.' limit 20');

                return view('sub.lecture.add_new_lecture_curriculum', compact('tempInfo', 'videoList', 'videoTagArr', 'bchapterList', 'schapterList', 'videoInfoList'));

            } else {
                return view('sub.lecture.add_new_lecture_curriculum', compact('tempInfo', 'bchapterList', 'schapterList', 'videoInfoList'));
            }

        // 미리보기
        } else if ($step == 'preview') {

            // 임시 저장된 추가 주제 목록 조회 후 배열로 저장
            $lectureTags = $tempInfo->lecture_tags;
            $lectureTagList = explode('|', $lectureTags);

            // 임시 저장된 해당 강좌의 총 강의 수 조회
            $countVideo = DB::select('SELECT COUNT(*) AS cnt FROM tempsave_curriculum WHERE session_id="'.$sessionId.'" AND user_id="'.$userId.'"');
            $countVideo = $countVideo[0];

            return view('sub.lecture.add_new_lecture_preview', compact('tempInfo', 'lectureTagList', 'countVideo'));

        } else {
            return view('index');
        }
    }

    public function getCategoryData(Request $request) {
        $bcateId = $request->post('bcate_id');
        $scateId = $request->post('scate_id');

        // 소분류 선택 -> 인기 주제 목록 조회
        if ($scateId != '') {
            try {
                $psubjectList = DB::select('SELECT * FROM popular_subject WHERE bcate_id="'.$bcateId.'" AND scate_id="'.$scateId.'"');

                $result['status'] = 'success';
                $result['psubjectList'] = json_encode($psubjectList);

            } catch(Exception $e) {
                $result['status'] = 'fail';
                $result['msg'] = $e->getMessage();
                $result['code'] = $e->getCode();

            } finally {
                return response()->json($result);
            }

        // 대분류 선택 -> 소분류 목록 조회
        } else {
            try {
                $scategoryList = DB::select('SELECT * FROM s_category WHERE bcate_id="'.$bcateId.'"');

                $result['status'] = 'success';
                $result['scategoryList'] = json_encode($scategoryList);

            } catch(Exception $e) {
                $result['status'] = 'fail';
                $result['msg'] = $e->getMessage();
                $result['code'] = $e->getCode();

            } finally {
                return response()->json($result);
            }
        }
    }

    public function tempsaveAddLecture(Request $request) {
        $step = $request->post('step');

        session_start();
        $sessionId = session_id();
        session_destroy();

        $userId = Auth::user()->email;

        // 기존에 임시 저장된 데이터가 있는지 확인
        $checkExistData = DB::select('SELECT * FROM tempsave_add_lecture WHERE session_id="'.$sessionId.'" AND user_id="'.$userId.'"');
        // $checkExistCurriculum = DB::select('SELECT * FROM tempsave_curriculum WHERE session_id="'.$sessionId.'" AND user_id="'.$userId.'"');

        // 기본 정보 임시 저장
        if ($step == '' || $step == 'basic_info') {
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
            $mainSubject = $request->post('main_subject');
            $subBCateId = $request->post('sub_bcate_id');
            $subSCateId = $request->post('sub_scate_id');
            $subSubject = $request->post('sub_subject');
            $lectureTags = $request->post('lecture_tags');

            try {
                if (count($checkExistData) > 0) {
                    DB::table('tempsave_add_lecture')->where('session_id', $sessionId)->update(array(
                        'title' => $title,
                        'description' => $description,
                        'save_thumbnail' => $saveThumbnail,
                        'level' => $level,
                        'free_yn' => $freeYN,
                        'price' => $price,
                        'duration' => $duration,
                        'main_bcate_id' => $mainBCateId,
                        'main_scate_id' => $mainSCateId,
                        'main_subject' => $mainSubject,
                        'sub_bcate_id' => $subBCateId,
                        'sub_scate_id' => $subSCateId,
                        'sub_subject' => $subSubject,
                        'lecture_tags' => $lectureTags,
                        'saved_at' => now()
                    ));

                } else {
                    DB::table('tempsave_add_lecture')->insert(array(
                        'session_id' => $sessionId,
                        'user_id' => $userId,
                        'title' => $title,
                        'description' => $description,
                        'save_thumbnail' => $saveThumbnail,
                        'level' => $level,
                        'free_yn' => $freeYN,
                        'price' => $price,
                        'duration' => $duration,
                        'main_bcate_id' => $mainBCateId,
                        'main_scate_id' => $mainSCateId,
                        'main_subject' => $mainSubject,
                        'sub_bcate_id' => $subBCateId,
                        'sub_scate_id' => $subSCateId,
                        'sub_subject' => $subSubject,
                        'lecture_tags' => $lectureTags,
                        'saved_at' => now()
                    ));
                }
                $result['status'] = 'success';

            } catch(Exception $e) {
                $result['status'] = 'fail';
                $result['msg'] = $e->getMessage();
                $result['code'] = $e->getCode();

            } finally {
                return response()->json($result);
            }

        // 강좌 소개 임시 저장
        } else if ($step == 'introduce') {
            $addInfo1 = $request->post('add_info_1');
            $addInfo2 = $request->post('add_info_2');
            $addInfo3 = $request->post('add_info_3');
            $introduction = $request->post('introduction');

            try {
                if (count($checkExistData) > 0) {
                    DB::table('tempsave_add_lecture')->where('session_id', $sessionId)->update(array(
                        'add_info_1' => $addInfo1,
                        'add_info_2' => $addInfo2,
                        'add_info_3' => $addInfo3,
                        'introduction' => $introduction,
                        'saved_at' => now()
                    ));

                } else {
                    DB::table('tempsave_add_lecture')->insert(array(
                        'session_id' => $sessionId,
                        'user_id' => $userId,
                        'add_info_1' => $addInfo1,
                        'add_info_2' => $addInfo2,
                        'add_info_3' => $addInfo3,
                        'introduction' => $introduction,
                        'saved_at' => now()
                    ));
                }
                $result['status'] = 'success';

            } catch(Exception $e) {
                $result['status'] = 'fail';
                $result['msg'] = $e->getMessage();
                $result['code'] = $e->getCode();

            } finally {
                return response()->json($result);
            }

        // 커리큘럼 임시 저장
        } else if ($step == 'curriculum') {
            $mainVideoId = $request->post('main_video_id');
            $bcateId = $request->post('bcate_id');
            $scateId = $request->post('scate_id');
            $bchapList = json_decode($request->post('bchap_list'));
            $schapList = json_decode($request->post('schap_list'));
            $videoList = json_decode($request->post('video_list'));

            try {
                // 메인 동영상 ID 저장
                if (count($checkExistData) > 0) {
                    DB::table('tempsave_add_lecture')->where('session_id', $sessionId)->where('user_id', $userId)->update(array(
                        'main_video_id' => $mainVideoId,
                        'saved_at' => now()
                    ));
                } else {
                    DB::table('tempsave_add_lecture')->insert(array(
                        'main_video_id' => $mainVideoId,
                        'saved_at' => now()
                    ));
                }

                // 기존 임시 저장된 정보 삭제
                DB::table('tempsave_b_chapter')->where('session_id', $sessionId)->where('user_id', $userId)->delete();
                DB::table('tempsave_s_chapter')->where('session_id', $sessionId)->where('user_id', $userId)->delete();
                DB::table('tempsave_video')->where('session_id', $sessionId)->where('user_id', $userId)->delete();
                DB::table('tempsave_curriculum')->where('session_id', $sessionId)->where('user_id', $userId)->delete();

                // 수정된 대단원 저장
                foreach($bchapList as $key => $bchap) {
                    if (isset($bchap->bchapId)) {
                        DB::table('tempsave_b_chapter')->insert(array(
                            'session_id' => $sessionId,
                            'user_id' => $userId,
                            'bcate_id' => $bcateId,
                            'scate_id' => $scateId,
                            'bchap_id' => $bchap->bchapId,
                            'bchap_name' => $bchap->bchapName,
                            'order' => $key,
                            'saved_at' => now()
                        ));
                    }
                }

                // 수정된 소단원 저장
                foreach($schapList as $key => $schap) {
                    DB::table('tempsave_s_chapter')->insert(array(
                        'session_id' => $sessionId,
                        'user_id' => $userId,
                        'bcate_id' => $bcateId,
                        'scate_id' => $scateId,
                        'bchap_id' => $schap->bchapId,
                        'schap_id' => $schap->schapId,
                        'schap_name' => $schap->schapName,
                        'order' => $key,
                        'saved_at' => now()
                    ));
                }

                // 기존 DB에 없는 영상 추가로 저장, TODO: 유튜브 API로 분석 필요
                foreach($videoList as $video) {
                    DB::table('tempsave_video')->insert(array(
                        'session_id' => $sessionId,
                        'user_id' => $userId,
                        'uid' => $video->videoId,
                        'title' => $video->videoTitle,
                        'analysis_yn' => $video->analysisYn,
                        'saved_at' => now()
                    ));
                }

                // 수정된 강의 영상 저장
                foreach($videoList as $video) {
                    $videoIdx = DB::table('tempsave_video')->select('idx')->where('uid', $video->videoId)->get();

                    DB::table('tempsave_curriculum')->insert(array(
                        'session_id' => $sessionId,
                        'user_id' => $userId,
                        'bcate_id' => $bcateId,
                        'scate_id' => $scateId,
                        'bchap_id' => $video->bchapId,
                        'schap_id' => $video->schapId,
                        'video_id' => $video->videoId,
                        'new_video_title' => $video->videoTitle,
                        'preview_yn' => $video->previewYn,
                        'saved_at' => now()
                    ));
                }

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

    public function getRecommandVideoData(Request $request) {
        $searchMethod = $request->post('search_method', '');
        $searchData = $request->post('search_data', '');
        $bcateId = $request->post('bcate_id', '');
        $scateId = $request->post('scate_id', '');
        $lastVideoIdx = $request->post('last_video_idx', '');
        $tagNameList = '';
        $where = '';
        $where2 = '';
        $where3 = '';
        $orderBy = '';
        $query = '';
        $resData = '';

        // 해시태그로 조회
        if ($searchMethod == 'tag') {
            $tagNameList = $searchData;
            $tagNames = '';

            // 선택한 태그가 있을 경우 태그명을 배열 형태의 문자열로 재구성
            if ($tagNameList != '') {
                $tagNames = empty($tagNameList) ? 'NULL' : "'".join("','", $tagNameList)."'";
                $where2 = ' AND hashtag.tag IN ('.$tagNames.')';
            }

        // 키워드로 조회
        } else if ($searchMethod == 'keyword') {
            $keywordList = $searchData;
            $keywords = '';

            if ($keywordList != '') {
                foreach($keywordList as $keyword) {
                    $keywords .= $keyword.'|';
                }
                $keywords = substr($keywords, 0, -1);
                $where2 = ' AND subject REGEXP ("'.$keywords.'")';
            }

        // 커리큘럼 정보 추가/수정/삭제 시 조회
        } else if ($searchMethod == 'curriculum') {
            if ($searchData != '') {
                $where2 = ' AND subject REGEXP ("'.$searchData.'")';
            }
        }

        // 더보기를 클릭한 경우
        if ($lastVideoIdx != '') {
            $where3 = ' AND idx < '.$lastVideoIdx;
        }

        $orderBy = ' ORDER BY idx desc';

        // 선택한 태그가 있을 경우
        if ($tagNameList != '') {
            $where = ' AND temp.uid IN (SELECT uid FROM _youtube_fulldata_category WHERE bcate = "'.$bcateId.'" AND scate = "'.$scateId.'")';
            $query = 'SELECT temp.uid, temp.idx, temp.subject, temp.hit_cnt, temp.channel FROM _youtube_fulldata_temp temp, _youtube_fulldata_hashtag hashtag WHERE temp.uid = hashtag.uid'.$where.$where2.$where3.$orderBy.' limit 8';

        // 선택한 태그가 없을 경우
        } else {
            $where = ' WHERE uid IN (SELECT uid FROM _youtube_fulldata_category WHERE bcate = "'.$bcateId.'" AND scate = "'.$scateId.'")';
            $query = 'SELECT idx, uid, subject, hit_cnt, channel FROM _youtube_fulldata_temp'.$where.$where2.$where3.$orderBy.' limit 8';
        }

        try {
            $videoList = DB::select($query);

            foreach($videoList as $video) {
                $resData .= '<div class="item column">';
                $resData .=     '<div class="w1">';
                $resData .=         '<a href="'.route('sub.video.video_detail', ['uid' => $video->uid]).'" class="a1" video_idx="'.$video->idx.'" target="_blank">';
                $resData .=             '<div class="f1">';
                $resData .=                 '<span class="f1p1">';
                $resData .=                     '<img src="https://img.youtube.com/vi/'.$video->uid.'/mqdefault.jpg" alt="'.$video->subject.'">';
                $resData .=                 '</span>';
                $resData .=                 '<i class="ic1 check">선택</i>';
                $resData .=             '</div>';
                $resData .=             '<div class="tg1">';
                $resData .=                 '<strong class="t1">'.$video->subject.'</strong>';
                $resData .=                 '<input type="hidden" class="video_id" value="'.$video->uid.'">';
                $resData .=             '</div>';
                $resData .=             '<div class="tg2">';
                $resData .=                 '<span class="t2">'.$video->channel.' · 조회수 '.$video->hit_cnt.'회</span>';
                                            // TODO: 정확도???
                $resData .=                 '<span class="t4">정확도 80%</span>';
                $resData .=             '</div>';
                $resData .=         '</a>';
                $resData .=     '</div>';
                $resData .= '</div>';
            }

            $result['status'] = 'success';

            // 쿼리 확인
            $result['query'] = $query;

            // 조회된 영상 수
            $result['count'] = count($videoList);

            // 조회된 영상 수에 따라 버튼 숨김 여부 판단
            if (count($videoList) >= 8) {
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

    function getVideoData(Request $request) {
        $videoId = $request->post('video_id');

        try {
            $videoInfo = DB::select('SELECT * FROM _youtube_fulldata_temp WHERE uid="'.$videoId.'"');
            $result['status'] = 'success';

            // 강의 영상이 있으면 리턴
            if (count($videoInfo) > 0) {
                $result['exist'] = True;
                $result['videoTitle'] = $videoInfo[0]->subject;

            // TODO: 강의 영상이 없으면 DB에 등록 후 유튜브 API로 정보 조회/분석 필요
            } else {
                $result['exist'] = False;

                // TODO: 임시로 영상 제목을 ID로 리턴 -> 추후 실제 영상 제목 리턴해야 함
                $result['videoTitle'] = $videoId;
            }

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    function addNewLectureFinal() {

        session_start();
        $sessionId = session_id();
        session_destroy();

        $userId = Auth::user()->email;
        $userName = Auth::user()->nickname;
        $role = Auth::user()->role;

        try {

            // 임시 저장된 강좌 데이터 조회
            $tempLectureInfo = DB::table('tempsave_add_lecture')->where('session_id', $sessionId)->where('user_id', $userId)->get();
            if (count($tempLectureInfo) > 0) {
                $tempLectureInfo = $tempLectureInfo[0];
            }

            // 임시 저장된 대단원 데이터 조회
            $tempBchapList = DB::table('tempsave_b_chapter')->where('session_id', $sessionId)->where('user_id', $userId)->orderBy('order')->get();

            // 임시 저장된 대단원 데이터 조회
            $tempSchapList = DB::table('tempsave_s_chapter')->where('session_id', $sessionId)->where('user_id', $userId)->orderBy('order')->get();

            // 임시 저장된 영상 데이터 조회
            $tempVideoList = DB::table('tempsave_video')->where('session_id', $sessionId)->where('user_id', $userId)->get();

            // 임시 저장된 커리큘럼 데이터 조회
            $tempCurriculumList = DB::table('tempsave_curriculum')->where('session_id', $sessionId)->where('user_id', $userId)->get();

            // 실제 강좌 데이터 저장
            $idx = DB::table('lecture')->insertGetId(array(
                'bcate_id' => $tempLectureInfo->main_bcate_id,
                'scate_id' => $tempLectureInfo->main_scate_id,
                'sub_bcate_id' => $tempLectureInfo->sub_bcate_id,
                'sub_scate_id' => $tempLectureInfo->sub_scate_id,
                'title' => $tempLectureInfo->title,
                'description' => $tempLectureInfo->description,
                'save_thumbnail' => $tempLectureInfo->save_thumbnail,
                'level' => $tempLectureInfo->level,
                'free_yn' => $tempLectureInfo->free_yn,
                'price' => $tempLectureInfo->price,
                'duration' => $tempLectureInfo->duration,
                'category_1' => $tempLectureInfo->main_subject,
                'category_2' => $tempLectureInfo->sub_subject,
                'tags' => $tempLectureInfo->lecture_tags,
                'add_info_1' => $tempLectureInfo->add_info_1,
                'add_info_2' => $tempLectureInfo->add_info_2,
                'add_info_3' => $tempLectureInfo->add_info_3,
                'introduction' => $tempLectureInfo->introduction,
                'main_video_id' => $tempLectureInfo->main_video_id,
                'owner_id' => $userId,
                'owner_name' => $userName,
                'registed_host' => $_SERVER['REMOTE_ADDR'],
                'registed_at' => now(),
            ));

            // 강좌 인덱스 조회
            $lectureIdx = DB::select('SELECT idx FROM lecture WHERE owner_id="'.$userId.'" ORDER BY idx desc LIMIT 1');

            if (count($lectureIdx) > 0) {
                $lectureIdx = $lectureIdx[0]->idx;
            }

            // 실제 대단원 데이터 저장
            foreach($tempBchapList as $key => $tempBchap) {
                DB::table('b_chapter')->insert(array(
                    'lecture_idx' => $lectureIdx,
                    'bcate_id' => $tempBchap->bcate_id,
                    'scate_id' => $tempBchap->scate_id,
                    'bchap_id' => $tempBchap->bchap_id,
                    'bchap_name' => $tempBchap->bchap_name,
                    'order' => $tempBchap->order,
                    'created_at' => now()
                ));
            }

            // 실제 소단원 데이터 저장
            foreach($tempSchapList as $key => $tempSchap) {
                DB::table('s_chapter')->insert(array(
                    'lecture_idx' => $lectureIdx,
                    'bcate_id' => $tempSchap->bcate_id,
                    'scate_id' => $tempSchap->scate_id,
                    'bchap_id' => $tempSchap->bchap_id,
                    'schap_id' => $tempSchap->schap_id,
                    'schap_name' => $tempSchap->schap_name,
                    'order' => $tempSchap->order,
                    'created_at' => now()
                ));
            }

            // 실제 영상 데이터 저장
            foreach($tempVideoList as $key => $tempVideo) {

                // 기존 DB에 등록되지 않은 영상만
                if ($tempVideo->analysis_yn == 'N') {

                    // TODO: 유튜브 API로 분석 후 저장
                    DB::table('_youtube_fulldata_temp')->insert(array(
                        'uid' => $tempVideo->uid,
                        'subject' => $tempVideo->title,
                        //'analysis_yn' => $tempVideo->analysis_yn
                    ));
                }
            }

            // 실제 커리큘럼(영상 매칭) 데이터 저장
            foreach($tempCurriculumList as $key => $tempCurriculum) {
                $videoIdx = DB::table('_youtube_fulldata_temp')->select('uid', 'subject')->where('uid', $tempCurriculum->video_id)->get();

                DB::table('curriculum')->insert(array(
                    'lecture_idx' => $lectureIdx,
                    'bcate_id' => $tempCurriculum->bcate_id,
                    'scate_id' => $tempCurriculum->scate_id,
                    'bchap_id' => $tempCurriculum->bchap_id,
                    'schap_id' => $tempCurriculum->schap_id,
                    'video_id' => $videoIdx[0]->uid,
                    'ori_video_title' => $videoIdx[0]->subject,
                    'new_video_title' => $tempCurriculum->new_video_title,
                    'created_at' => now()
                ));
            }

            createNotification('lecture', $userId, $tempLectureInfo->title,'강좌가 개설되었습니다..', $idx);
            // 강좌 생성 알림 추가

            // 기존 임시 저장된 데이터 모두 삭제
            DB::table('tempsave_add_lecture')->where('session_id', $sessionId)->where('user_id', $userId)->delete();
            DB::table('tempsave_b_chapter')->where('session_id', $sessionId)->where('user_id', $userId)->delete();
            DB::table('tempsave_s_chapter')->where('session_id', $sessionId)->where('user_id', $userId)->delete();
            DB::table('tempsave_video')->where('session_id', $sessionId)->where('user_id', $userId)->delete();
            DB::table('tempsave_curriculum')->where('session_id', $sessionId)->where('user_id', $userId)->delete();

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function getInterestLecture(Request $request) {
        $where = '';
        if($request->get('scate_id')!=''){
            $scateId = $request->get('scate_id');
            $scateName = $request->get('scate_name');
            $where = ' where scate_id ="'.$scateId.'" ';
        }

        try {
            // TODO: 인기 강좌, 신규 강좌, AI 추천 강좌 소분류 카테고리 선택 시 비동기 조회 처리
            // -------------------------------------------------------------------------------------------
            // 인기 강좌
            // TODO: --> 해당 소분류 카테고리 내에서 1순위) 수강자 많은 순, 2순위) 완강률
            $popularLecList = DB::select('SELECT * FROM lecture '.$where.' ORDER BY student_cnt desc limit 10');
            // 신규 강좌
            // TODO: --> 해당 소분류 카테고리 내에서 1순위) 최근 순, 2순위) 수강자 많은 순
            $newLecList = DB::select('SELECT * FROM lecture '.$where.' ORDER BY idx desc, student_cnt desc limit 10');
            // AI 추천 강좌
            // TODO: --> 각 소분류 카테고리 별로 임의 지정?
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
            if($scateId){
                $idxRange = $aiRecommand[$scateId][0];
                for($i=1; $i<count($aiRecommand[$scateId]); $i++){
                    $idxRange.=', '.$aiRecommand[$scateId][$i];
                }

                if($where!=''){
                    $where.=' AND idx IN ('.$idxRange.') ORDER BY FIELD(idx, '.$idxRange.')';
                }else{
                    $where = 'WHERE idx IN ('.$idxRange.') ORDER BY FIELD(idx, '.$idxRange.')';
                }
            }
            $aiLecList = DB::select('SELECT * FROM lecture '.$where.' limit 10');
            // --------------------------------------------------------------------------------------------

            // 인기 강좌
            // AI 추천 강좌
            $resData = '';
            $resData .= '<div class="wrap1">';
            $resData .=     '<div class="hg1">';
            $resData .=         '<div class="w1">';
            $resData .=             '<h3 class="h1">인기강좌</h3>';
            $resData .=             '<strong class="h2">'.$scateName.'</strong>';
            $resData .=         '</div>';
            $resData .=         '<a href="'.route('sub.lecture.lecture_list').'" class="more"><span class="t1 blind">더보기</span> <i class="ic1"></i></a>';
            $resData .=     '</div>';
            $resData .=     '<div class="mControl">';
            $resData .=         '<button type="button" class="m prev"><i class="ic1"></i><span class="blind">인기강좌 #웹개발. 이전 보기</span></button>';
            $resData .=         '<button type="button" class="m next"><i class="ic1"></i><span class="blind">인기강좌 #웹개발. 다음 보기</span></button>';
            $resData .=     '</div>';
            $resData .=     '<div class="owl-carousel owl-theme">';

            foreach($popularLecList as $lecture){
                $resData .= '<div class="item">';
                $resData .=     '<div class="w1">';
                $resData .=         '<a href="'.route('sub.lecture.lecture_detail', ['idx' => $lecture->idx]).'" class="a1">';
                $resData .=             '<div class="f1">';
                $resData .=                 '<span class="f1p1">';
                if ($lecture->save_thumbnail != ''){
                    $resData .=                 '<img src="'.asset('storage/uploads/thumbnail/'.$lecture->save_thumbnail).'" alt="'.$lecture->title.'" />';
                }else{
                    $resData .=                 '<img src="'.asset('assets/images/lib/noimg1.png').'" />';
                }
                $resData .=                 '</span>';
                $resData .=                 '<i class="ic1 play">Play</i>';
                $resData .=             '</div>';
                $resData .=             '<div class="tg1">';
                $resData .=                 '<strong class="t1">'.$lecture->title.'</strong>';
                $resData .=             '</div>';
                $resData .=             '<div class="ratings">';
                $resData .=                 '<strong class="t1 blind">별점</strong>';
                $resData .=                     '<i class="star5rating1">';
                $resData .=                         '<i class="st-on" style="width:'.($lecture->rating * 20).'%'.'"><i class="ic1"></i></i><!-- (3.5/5) -->';
                $resData .=                         '<i class="st-off" style="width:'.(100 - (($lecture->rating / 5) * 20)).'%'.'"><i class="ic2"></i></i><!-- (100-70) -->';
                $resData .=                     '</i>';
                $resData .=                     '<span class="t2">';
                $resData .=                         '<span class="t2t1">평점</span>';
                $resData .=                         '<span class="t2t2">'.$lecture->rating.'</span>';
                $resData .=                         '<span class="t2t3">· 수강생 '.$lecture->student_cnt.'명</span>';
                $resData .=                     '</span>';
                $resData .=                 '</div>';
                $resData .=                 '<div class="tg2">';
                $resData .=                     '<span class="t2">';
                $resData .=                      '<span class="t2t1">'.$lecture->owner_name.'</span>';
                $resData .=                 '</span>';
                $resData .=             '</div>';
                $resData .=         '</a>';
                $resData .=     '</div>';
                $resData .= '</div>';
            }
            $resData .=     '</div>';
            $resData .= '</div>';
            $result['resDataPopular']=$resData;

            // 신규 강좌
            // AI 추천 강좌
            $resData = '';
            $resData .= '<div class="wrap1">';
            $resData .=     '<div class="hg1">';
            $resData .=         '<div class="w1">';
            $resData .=             '<h3 class="h1">신규강좌</h3>';
            $resData .=             '<strong class="h2">'.$scateName.'</strong>';
            $resData .=         '</div>';
            $resData .=         '<a href="'.route('sub.lecture.lecture_list').'" class="more"><span class="t1 blind">더보기</span> <i class="ic1"></i></a>';
            $resData .=     '</div>';
            $resData .=     '<div class="mControl">';
            $resData .=         '<button type="button" class="m prev"><i class="ic1"></i><span class="blind">신규강좌 #웹개발. 이전 보기</span></button>';
            $resData .=         '<button type="button" class="m next"><i class="ic1"></i><span class="blind">신규강좌 #웹개발. 다음 보기</span></button>';
            $resData .=     '</div>';
            $resData .=     '<div class="owl-carousel owl-theme">';

            foreach($newLecList as $lecture){
                $resData .= '<div class="item">';
                $resData .=     '<div class="w1">';
                $resData .=         '<a href="'.route('sub.lecture.lecture_detail', ['idx' => $lecture->idx]).'" class="a1">';
                $resData .=             '<div class="f1">';
                $resData .=                 '<span class="f1p1">';
                if ($lecture->save_thumbnail != ''){
                    $resData .=                 '<img src="'.asset('storage/uploads/thumbnail/'.$lecture->save_thumbnail).'" alt="'.$lecture->title.'" />';
                }else{
                    $resData .=                 '<img src="'.asset('assets/images/lib/noimg1.png').'" />';
                }
                $resData .=                 '</span>';
                $resData .=                 '<i class="ic1 play">Play</i>';
                $resData .=             '</div>';
                $resData .=             '<div class="tg1">';
                $resData .=                 '<strong class="t1">'.$lecture->title.'</strong>';
                $resData .=             '</div>';
                $resData .=             '<div class="ratings">';
                $resData .=                 '<strong class="t1 blind">별점</strong>';
                $resData .=                     '<i class="star5rating1">';
                $resData .=                         '<i class="st-on" style="width:'.($lecture->rating * 20).'%'.'"><i class="ic1"></i></i><!-- (3.5/5) -->';
                $resData .=                         '<i class="st-off" style="width:'.(100 - (($lecture->rating / 5) * 20)).'%'.'"><i class="ic2"></i></i><!-- (100-70) -->';
                $resData .=                     '</i>';
                $resData .=                     '<span class="t2">';
                $resData .=                         '<span class="t2t1">평점</span>';
                $resData .=                         '<span class="t2t2">'.$lecture->rating.'</span>';
                $resData .=                         '<span class="t2t3">· 수강생 '.$lecture->student_cnt.'명</span>';
                $resData .=                     '</span>';
                $resData .=                 '</div>';
                $resData .=                 '<div class="tg2">';
                $resData .=                     '<span class="t2">';
                $resData .=                      '<span class="t2t1">'.$lecture->owner_name.'</span>';
                $resData .=                 '</span>';
                $resData .=             '</div>';
                $resData .=         '</a>';
                $resData .=     '</div>';
                $resData .= '</div>';
            }
            $resData .=     '</div>';
            $resData .= '</div>';
            $result['resDataNew']=$resData;

            // AI 추천 강좌
            $resData = '';
            $resData .= '<div class="wrap1">';
            $resData .=     '<div class="hg1">';
            $resData .=         '<div class="w1">';
            $resData .=             '<h3 class="h1">AI 추천강좌</h3>';
            $resData .=             '<strong class="h2">'.$scateName.'</strong>';
            $resData .=         '</div>';
            $resData .=         '<a href="'.route('sub.lecture.lecture_list').'" class="more"><span class="t1 blind">더보기</span> <i class="ic1"></i></a>';
            $resData .=     '</div>';
            $resData .=     '<div class="mControl">';
            $resData .=         '<button type="button" class="m prev"><i class="ic1"></i><span class="blind">AI 추천강좌 #웹개발. 이전 보기</span></button>';
            $resData .=         '<button type="button" class="m next"><i class="ic1"></i><span class="blind">AI 추천강좌 #웹개발. 다음 보기</span></button>';
            $resData .=     '</div>';
            $resData .=     '<div class="owl-carousel owl-theme">';

            foreach($aiLecList as $lecture){
                $resData .= '<div class="item">';
                $resData .=     '<div class="w1">';
                $resData .=         '<a href="'.route('sub.lecture.lecture_detail', ['idx' => $lecture->idx]).'" class="a1">';
                $resData .=             '<div class="f1">';
                $resData .=                 '<span class="f1p1">';
                if ($lecture->save_thumbnail != ''){
                    $resData .=                 '<img src="'.asset('storage/uploads/thumbnail/'.$lecture->save_thumbnail).'" alt="'.$lecture->title.'" />';
                }else{
                    $resData .=                 '<img src="'.asset('assets/images/lib/noimg1.png').'" />';
                }
                $resData .=                 '</span>';
                $resData .=                 '<i class="ic1 play">Play</i>';
                $resData .=             '</div>';
                $resData .=             '<div class="tg1">';
                $resData .=                 '<strong class="t1">'.$lecture->title.'</strong>';
                $resData .=             '</div>';
                $resData .=             '<div class="ratings">';
                $resData .=                 '<strong class="t1 blind">별점</strong>';
                $resData .=                     '<i class="star5rating1">';
                $resData .=                         '<i class="st-on" style="width:'.($lecture->rating * 20).'%'.'"><i class="ic1"></i></i><!-- (3.5/5) -->';
                $resData .=                         '<i class="st-off" style="width:'.(100 - (($lecture->rating / 5) * 20)).'%'.'"><i class="ic2"></i></i><!-- (100-70) -->';
                $resData .=                     '</i>';
                $resData .=                     '<span class="t2">';
                $resData .=                         '<span class="t2t1">평점</span>';
                $resData .=                         '<span class="t2t2">'.$lecture->rating.'</span>';
                $resData .=                         '<span class="t2t3">· 수강생 '.$lecture->student_cnt.'명</span>';
                $resData .=                     '</span>';
                $resData .=                 '</div>';
                $resData .=                 '<div class="tg2">';
                $resData .=                     '<span class="t2">';
                $resData .=                      '<span class="t2t1">'.$lecture->owner_name.'</span>';
                $resData .=                 '</span>';
                $resData .=             '</div>';
                $resData .=         '</a>';
                $resData .=     '</div>';
                $resData .= '</div>';
            }

            $resData .=     '</div>';
            $resData .= '</div>';

            $result['resDataAi']=$resData;

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
