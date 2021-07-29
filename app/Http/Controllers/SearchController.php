<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller{
    public function integratedSearch(Request $request) {
        $type = '';
        $keyword = '';
        $result = array();

        $videoList = null;
        $lectureList = null;
        $insightList = null;
        $instructorList = null;
        $youtuberList = null;

        $setting = ' ORDER BY idx desc limit 8 ';
        $setting2 = ' ORDER BY id desc limit 10 ';
        $whereVideo = '';
        $whereLecture = '';
        $whereInsight = '';
        $whereInstructor = 'where u.role="instructor" and u.status!="withdraw"';
        $whereYoutuber = 'where u.role="youtuber" and u.status!="withdraw"';
        if ($request->isMethod('get')) {
            $type = $request->get('type', '');
            $keyword = $request->get('keyword', '');
        }

        if ($request->isMethod('post')){
            $type = $request->post('type', '');
            $keyword = $request->post('keyword', '');
        }

        $keyword = addslashes($keyword);
        //키원드가 있을 경우 where문
        if($keyword!="" or $keyword!=null){
            $where = " LIKE '%$keyword%' ";
            $whereVideo= "where subject".$where." or content ".$where;
            $whereLecture= "where title ".$where." or description ".$where;
            $whereInsight= "where title ".$where." or content ".$where." or summary ".$where;
            $whereInstructor = " where u.role = 'instructor' and u.status!='withdraw' and (u.nickname ".$where." or u.introduction ".$where.") ";
            $whereYoutuber = " where u.role = 'youtuber' and u.status!='withdraw' and (u.nickname ".$where." or u.introduction ".$where.") ";
        }

        // TODO: type parameter에 따른 검색 내용 조회
        if ($type == '' || $type == 'all') {
            $result['title'] = '전체';

            //영상 정보, 총 영상 수 검색
            $queryVideo = "SELECT idx, uid, subject, hit_cnt, channel FROM _youtube_fulldata_temp ";
            $queryVC = "SELECT count(*) cnt FROM _youtube_fulldata_temp ";
            $videoList = DB::select($queryVideo.$whereVideo.$setting);
            $result['videoCount'] = DB::select($queryVC.$whereVideo)[0]->cnt;

            //강의 정보, 총 강의 수 검색
            $queryLecture = "SELECT idx, title, save_thumbnail, rating, student_cnt, tags, owner_name, free_yn FROM lecture ";
            $queryLC =  "SELECT count(*) cnt FROM lecture ";
            $lectureList = DB::select($queryLecture.$whereLecture.$setting);
            $result['lectureCount'] = DB::select($queryLC.$whereLecture)[0]->cnt;

            //인사이트 정보, 총 인사이트 수 검색
            $queryInsight = "SELECT idx, title, summary, main_image, writed_at from latest_trend ";
            $queryIRC = "SELECT count(*) cnt FROM latest_trend ";
            $insightList = DB::select($queryInsight.$whereInsight." ORDER BY idx desc limit 9");
            $result['insightCount'] =  DB::select($queryIRC.$whereInsight)[0]->cnt;

            //강사 정보, 총 강사 수 검색
            $queryInstructor = "SELECT IFNULL(COUNT(*), 0) AS lectureCount, u.id, u.nickname, u.save_profile_image, sum(IFNULL(lr.COUNT, 0)) as reviewCount
            FROM lecture l
				RIGHT  OUTER JOIN (
                SELECT id, nickname, save_profile_image, email, role, status, introduction  FROM users GROUP BY email
            )AS u ON (l.owner_id = u.email)
         	LEFT JOIN (
					SELECT COUNT(*) COUNT, lecture_idx FROM lecture_review
					GROUP BY lecture_idx
				)AS lr ON (l.idx = lr.lecture_idx) ";
            $queryIRC = "SELECT count(*) cnt FROM users u ";
            $instructorList = DB::select($queryInstructor.$whereInstructor." GROUP BY u.email ORDER BY u.id desc limit 10");
            $result['instructorReviewCount'] = DB::select('SELECT u.nickname , COUNT(*) FROM lecture l, lecture_review lr, users u WHERE l.idx = lr.lecture_idx AND l.owner_id = u.email GROUP BY u.email');
            $result['instructorCount'] =  DB::select($queryIRC.$whereInstructor)[0]->cnt;


            //유튜버 정보, 총 유튜버 수 검색

            $queryYoutuber =  "SELECT  sum(y.hit_cnt) sum_hit, u.nickname, u.save_profile_image, u.id FROM users u inner join _youtube_fulldata_temp y ON u.nickname = y.channel ";
            $queryYC = "SELECT count(c.sum_hit) cnt FROM (".$queryYoutuber.$whereYoutuber." GROUP BY channel) as c";
            $youtuberList = DB::select($queryYoutuber.$whereYoutuber." GROUP BY CHANNEL ".$setting2);
            $result['youtuberCount'] =  DB::select($queryYC)[0]->cnt;

            //전체 검색 결과로 추후에 인사이트, 강사, 유튜버 정보도 추가
            $result['count']=$result['videoCount']+$result['lectureCount'];
        } else if ($type == 'video') {
            $result['title'] = '영상';
            $queryVideo = "SELECT idx, uid, subject, hit_cnt, channel FROM _youtube_fulldata_temp ";
            $queryVC = "SELECT count(*) cnt FROM _youtube_fulldata_temp ";

            $videoList = DB::select($queryVideo.$whereVideo.$setting);
            $result['count']=$result['videoCount'] = DB::select($queryVC.$whereVideo)[0]->cnt;
        } else if ($type == 'lecture') {
            $result['title'] = '강좌';
            $queryLecture = "SELECT idx, title, save_thumbnail, rating, student_cnt, tags, owner_name, free_yn FROM lecture ";
            $queryLC =  "SELECT count(*) cnt FROM lecture ";

            $lectureList = DB::select($queryLecture.$whereLecture.$setting);
            $result['count'] =  $result['lectureCount'] =  DB::select($queryLC.$whereLecture)[0]->cnt;
        } else if ($type == 'insight') {
            $result['title'] = '인사이트';

            $queryInsight = "SELECT idx, title, summary, main_image, writed_at from latest_trend ";
            $queryIRC = "SELECT count(*) cnt FROM latest_trend ";
            $insightList = DB::select($queryInsight.$whereInsight." ORDER BY idx desc limit 9");
            $result['count'] = $result['insightCount'] =  DB::select($queryIRC.$whereInsight)[0]->cnt;
        } else if ($type == 'instructor') {
            $result['title'] = '강사';


            $queryInstructor = "SELECT IFNULL(COUNT(*), 0) AS lectureCount, u.id, u.nickname, u.save_profile_image, sum(IFNULL(lr.COUNT, 0)) as reviewCount
            FROM lecture l
				RIGHT  OUTER JOIN (
                SELECT id, nickname, save_profile_image, email, role, status, introduction  FROM users GROUP BY email
            )AS u ON (l.owner_id = u.email)
         	LEFT JOIN (
					SELECT COUNT(*) COUNT, lecture_idx FROM lecture_review
					GROUP BY lecture_idx
				)AS lr ON (l.idx = lr.lecture_idx) ";
            $queryIRC = "SELECT count(*) cnt FROM users u ";
            $instructorList = DB::select($queryInstructor.$whereInstructor." GROUP BY u.email ORDER BY u.id desc limit 10");
            $result['instructorReviewCount'] = DB::select('SELECT u.nickname , COUNT(*) FROM lecture l, lecture_review lr, users u WHERE l.idx = lr.lecture_idx AND l.owner_id = u.email GROUP BY u.email');
            $result['count'] = $result['instructorCount'] =  DB::select($queryIRC.$whereInstructor)[0]->cnt;

        } else if ($type == 'youtuber') {
            $result['title'] = '유튜버';
            $queryYoutuber =  "SELECT  sum(y.hit_cnt) sum_hit, u.nickname, u.save_profile_image, u.id FROM users u inner join _youtube_fulldata_temp y ON u.nickname = y.channel ";
            $queryYC = "SELECT count(c.sum_hit) cnt FROM (".$queryYoutuber.$whereYoutuber." GROUP BY channel) as c";
            $youtuberList = DB::select($queryYoutuber.$whereYoutuber." GROUP BY CHANNEL ".$setting2);
            $result['count'] = $result['youtuberCount'] =  DB::select($queryYC)[0]->cnt;

        } else {
            return view('index');
            exit;
        }
        $result['keyword'] = stripslashes($keyword);
        return view('sub.search.integrated_search', compact('result', 'videoList', 'lectureList', 'insightList', 'instructorList', 'youtuberList'));

        /*
        $result['keyword'] = $keyword;

        // 조회된 데이터(검색 결과) 수
        $result['count'] = 1;
        return view('sub.search.integrated_search', compact('result', json_encode($result)));
        */

    }
    public function searchMore(Request $request){
        $type = $request->get('type');
        $count = $request->get('count');
        $keyword = $request->get('keyword');

        $setting = ' ORDER BY idx desc limit '.$count.', 8';
        $setting2 = ' ORDER BY id desc limit '.$count.', 10';
        $whereVideo = '';
        $whereLecture = '';
        $whereInsight = '';
        $whereInstructor = 'where u.role="instructor" and u.status!="withdraw"';
        $whereYoutuber = 'where u.role="youtuber" and u.status!="withdraw"';
        $keyword = addslashes($keyword);

        //키원드가 있을 경우 where문
        if($keyword!="" or $keyword!=null){
            $where = " LIKE '%$keyword%' ";
            $whereVideo= "where subject".$where." or content ".$where;
            $whereLecture= "where title ".$where." or description ".$where;
            $whereInsight= "where title ".$where." or content ".$where." or summary ".$where;
            $whereInstructor = "where u.role = 'instructor' and (u.nickname ".$where." or u.introduction ".$where.") ";
            $whereYoutuber = "where role = 'youtuber' and (nickname ".$where." or introduction ".$where.") ";
        }

        $html = '';

        if ($type == 'video') {
            $result['title'] = '영상';
            $queryVideo = "SELECT idx, uid, subject, hit_cnt, channel FROM _youtube_fulldata_temp ";
            $queryVC = "SELECT count(*) cnt FROM _youtube_fulldata_temp ";
            $videoList = DB::select($queryVideo.$whereVideo.$setting);
            $result['count']=$result['videoCount'] = DB::select($queryVC.$whereVideo)[0]->cnt;
            foreach ($videoList as $video){
                $html .= '<div class="item column">';
                $html .= '    <div class="w1">';
                $html .= '        <a href="'.route('sub.video.video_detail', ['uid' => $video->uid]).'" class="a1" video_idx="'.$video->idx.'">';
                $html .= '            <div class="f1">';
                $html .= '                <span class="f1p1">';
                $html .= '                    <img src="https://img.youtube.com/vi/'.$video->uid.'/mqdefault.jpg" alt="'.$video->subject.'">';
                $html .= '                </span>';
                $html .= '                <i class="ic1 play">Play</i>';
                $html .= '            </div>';
                $html .= '            <div class="tg1">';
                $html .= '                <strong class="t1">'.$video->subject.'</strong>';
                $html .= '            </div>';
                $html .= '            <div class="tg2">';
                $html .= '                <span class="t2">'.$video->channel.'</span>';
                $html .= '                <span class="t3">조회수 '.$video->hit_cnt.'회</span>';
                $html .= '            </div>';
                $html .= '        </a>';
                $html .= '    </div>';
                $html .= '</div>';
            }
        } else if ($type == 'lecture') {
            $result['title'] = '강좌';
            $queryLecture = "SELECT idx, title, save_thumbnail, rating, student_cnt, tags, owner_name, free_yn FROM lecture ";
            $queryLC =  "SELECT count(*) cnt FROM lecture ";
            $lectureList = DB::select($queryLecture.$whereLecture.$setting);
            $result['count'] =  $result['lectureCount'] =  DB::select($queryLC.$whereLecture)[0]->cnt;

            foreach ($lectureList as $lecture){
                $html .= '<div class="item column">';
                $html .= '    <div class="w1">';
                $html .= '        <a href="'.route('sub.lecture.lecture_detail', ['idx' => $lecture->idx]).'" class="a1" lecture_idx="'.$lecture->idx.'">';
                $html .= '            <div class="f1">';
                $html .= '                <span class="f1p1">';
                if ($lecture->save_thumbnail != '')
                $html .= '                    <img src="'.asset('storage/uploads/thumbnail/'.$lecture->save_thumbnail).'" alt="'.$lecture->title.'" />';
                else
                $html .= '                    <img src="'.asset('assets/images/lib/noimg1.png').'" />';
                $html .= '                </span>';
                $html .= '            </div>';
                $html .= '            <div class="tg1">';
                $html .= '                <strong class="t1">'.$lecture->title.'</strong>';
                $html .= '            </div>';
                $html .= '            <div class="ratings">';
                $html .= '                <strong class="t1 blind">별점</strong>';
                $html .= '                <i class="star5rating1">';
                $html .= '                    <i class="st-on" style="width:'.round($lecture->rating * 20, 1).'%;"><i class="ic1"></i></i><!-- (3.5/5) -->';
                $html .= '                    <i class="st-off" style="width:100%;"><i class="ic2"></i></i><!-- (100-70) -->';
                $html .= '                </i>';
                $html .= '                <span class="t2">';
                $html .= '                    <span class="t2t1">평점</span>';
                $html .= '                    <span class="t2t2">'.$lecture->rating.'</span>';
                $html .= '                    <span class="t2t3">· 수강생 '.$lecture->student_cnt.'명</span>';
                $html .= '                </span>';
                $html .= '            </div>';
                $html .= '            <div class="tg2">';
                $html .= '                <span class="t2">';
                $html .= '                    <span class="t2t1">'.$lecture->owner_name.'</span>';
                $html .= '                </span>';
                $html .= '                <span class="t3">';
                $html .= '                    <span class="t3t1">';
                if($lecture->free_yn == 'Y') $html.='무료';else $html.='유료';
                $html .= '                    </span>';
                $html .= '                </span>';
                $html .= '            </div>';
                $html .= '        </a>';
                $html .= '    </div>';
                $html .= '</div>';
            }
        } else if ($type == 'insight') {
            $result['title'] = '인사이트';

            $queryInsight = "SELECT idx, title, summary, main_image, writed_at from latest_trend ";
            $queryIRC = "SELECT count(*) cnt FROM latest_trend ";
            $insightList = DB::select($queryInsight.$whereInsight." ORDER BY idx desc limit 9");
            $result['count'] = $result['insightCount'] =  DB::select($queryIRC.$whereInsight)[0]->cnt;

            foreach ( $insightList as $insight ){
                $html .= '<div class="item column">';
                $html .= '    <div class="w1">';
                $html .= '        <a href="'.route('sub.community.trend_detail', ['id'=>$insight->idx]).'" class="a1">';
                $html .= '            <div class="f1">';
                $html .= '                <span class="f1p1">';
                $html .= '                    <img src="'.asset('storage/uploads/thumbnail/'.$insight->main_image).'" alt="'.$insight->main_image.'" />';
                $html .= '                </span>';
                $html .= '            </div>';
                $html .= '            <div class="tg1">';
                $html .= '                <strong class="t1">'.$insight->title.'</strong>';
                $html .= '                <span class="t2">{{ $insight->summary }}</span>';
                $html .= '                <span class="t3">'.date('Y.m.d', strtotime($insight->writed_at)).'</span>';
                $html .= '            </div>';
                $html .= '        </a>';
                $html .= '    </div>';
                $html .= '</div>';
            }
        } else if ($type == 'instructor') {
            $result['title'] = '강사';

            $queryInstructor = "SELECT IFNULL(COUNT(*), 0) AS lectureCount, u.id, u.nickname, u.save_profile_image, sum(IFNULL(lr.COUNT, 0)) as reviewCount
            FROM lecture l
				RIGHT  OUTER JOIN (
                SELECT id, nickname, save_profile_image, email, role, status, introduction  FROM users GROUP BY email
            )AS u ON (l.owner_id = u.email)
         	LEFT JOIN (
					SELECT COUNT(*) COUNT, lecture_idx FROM lecture_review
					GROUP BY lecture_idx
				)AS lr ON (l.idx = lr.lecture_idx) ";
            $queryIRC = "SELECT count(*) cnt FROM users u ";
            $instructorList = DB::select($queryInstructor.$whereInstructor." GROUP BY u.email ORDER BY u.id desc limit ".$count.",10");
            $result['instructorReviewCount'] = DB::select('SELECT u.nickname , COUNT(*) FROM lecture l, lecture_review lr, users u WHERE l.idx = lr.lecture_idx AND l.owner_id = u.email GROUP BY u.email');
            $result['count'] = $result['instructorCount'] =  DB::select($queryIRC.$whereInstructor)[0]->cnt;
            foreach ( $instructorList as $instructor ){
            $html .= '<div class="item column">';
            $html .= '    <div class="w1">';
            $html .= '        <a href="'.route('etc.user_introduction', ['type'=>'instructor', 'user_idx'=>$instructor->id]).'" class="a1">';
            $html .= '            <div class="f1">';
            $html .= '                <span class="f1p1">';
            if($instructor->save_profile_image=='')
            $html .= '                    <img src="'.asset('assets/images/lib/noimg1face1.png').'" alt="★대체텍스트필수" />';
            else
            $html .= '                    <img src="'.asset('storage/uploads/profile/'.$instructor->save_profile_image).'" alt="'. $instructor->save_profile_image.'" />';
            $html .= '                </span>';
            $html .= '            </div>';
            $html .= '            <div class="tg1">';
            $html .= '                <strong class="t1">'.$instructor->nickname.'</strong>';
            $html .= '                <span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">'.$instructor->lectureCount.'</span></span>';
            $html .= '                <span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">'.$instructor->reviewCount.'</span></span>';
            $html .= '            </div>';
            $html .= '        </a>';
            $html .= '    </div>';
            $html .= '</div>';
            }
        } else if ($type == 'youtuber') {
            $result['title'] = '유튜버';

            $queryYoutuber =  "SELECT  sum(y.hit_cnt) sum_hit, u.nickname, u.save_profile_image, u.id FROM users u inner join _youtube_fulldata_temp y ON u.nickname = y.channel ";
            $queryYC = "SELECT count(c.sum_hit) cnt FROM (".$queryYoutuber.$whereYoutuber." GROUP BY channel) as c";
            $youtuberList = DB::select($queryYoutuber.$whereYoutuber." GROUP BY CHANNEL ".$setting2);
            $result['youtuberCount'] =  DB::select($queryYC)[0]->cnt;

            foreach ( $youtuberList as $youtuber ){
            $html .= '<div class="item column">';
            $html .= '    <div class="w1">';
            $html .= '        <a href="'.route('etc.user_introduction', ['type'=>'youtuber', 'user_idx'=>$youtuber->id]).'" class="a1">';
            $html .= '            <div class="f1">';
            $html .= '                <span class="f1p1">';
            if ($youtuber->save_profile_image=='')
            $html .= '                    <img src="'.asset('assets/images/lib/noimg1face1.png').'" alt="★대체텍스트필수" />';
            else $html .= '                    <img src="'.asset('storage/uploads/profile/'.$youtuber->save_profile_image).'" alt="'.$youtuber->save_profile_image.'" />';
            $html .= '                </span>';
            $html .= '            </div>';
            $html .= '            <div class="tg1">';
            $html .= '                <strong class="t1">'.$youtuber->nickname.'</strong>';
            $html .= '                    <span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">';
            if (strlen($youtuber->sum_hit)>4)
            $html .= number_format($youtuber->sum_hit/10000, 1)."만";
            else $html .= number_format($youtuber->sum_hit/10000, 1);
            $html .= '                    </span></span>';
            $html .= '                    <span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>';
            $html .= '            </div>';
            $html .= '        </a>';
            $html .= '    </div>';
            $html .= '</div>';
            }
        } else {
            return view('index');
            exit;
        }
        $result['keyword'] = stripslashes($keyword);
        $result['html'] = $html;
        return response()->json($result, 200);

    }
}
