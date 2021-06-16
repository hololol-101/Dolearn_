<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class CommunityController extends Controller{
    public function notice() {
        return view('sub.community.notice');
    }

    public function noticeDetail() {
        return view('sub.community.notice_detail');
    }

    public function trend() {
        return view('sub.community.insight_trend');
    }

    public function trendDetail() {
        return view('sub.community.insight_trend_detail');
    }

    public function ranking(Request $request) {
        if($request->isMethod('get')){
            $type = $request->get('type', '');

            if ($type == '' || $type == 'lecture') {
                $lectureList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY l.student_cnt DESC LIMIT 9');

                return view('sub.community.insight_ranking_lecture', compact('lectureList'));
            } else if ($type == 'instructor') {
                $instructorList = DB::select('select * from users where role="instructor"');
                return view('sub.community.insight_ranking_instructor', compact('instructorList'));

            } else if ($type == 'youtuber') {
                $youtuberList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY l.student_cnt DESC LIMIT 9');
                return view('sub.community.insight_ranking_youtuber', compact('youtuberList'));
            }
        }
        else if($request->isMethod('post')){
            $type = $request->post('type', '');
            $sort = $request->post('sort', '');
            $cnt = 1;
            $html = '';

            if ($type == '' || $type == 'lecture') {
                if($sort == '수강자 수'){
                    $lectureList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY l.student_cnt DESC LIMIT 9');
                }else if($sort =='완강률'){
                    $lectureList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY COUNT(ml.status="complete")/l.student_cnt  DESC LIMIT 9');
                }else if($sort =='평점'){
                    $lectureList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY l.rating DESC LIMIT 9');
                }
                try{
                    foreach($lectureList as $lecture){
                        $html .='<li class="li1">';
                            $html .='<a href="?#★" class="w1 a1">';
                                $html .='<div class="w1w1">';
                                    $html .='<div class="w1w1w1">';
                                        $html .='<b class="g1"><span class="g1t1">'.$cnt++.'</span><span class="g1t2">위</span></b>';
                                    $html .='</div>';
                                    $html .='<div class="w1w1w2">';
                                        $html .='<div class="f1">';
                                            $html .='<span class="f1p1">';
                                                $html .='<img src="'.asset('storage/uploads/thumbnail/'.$lecture->save_thumbnail).'" alt="★대체텍스트필수" />';
                                            $html .='</span>';
                                        $html .='</div>';
                                    $html .='</div>';
                                    $html .='<div class="w1w1w3">';
                                        $html .='<div class="t1">';
                                            $html .=$lecture->title;
                                        $html .='</div>';
                                        $html .='<div class="t2">';
                                            $html .=$lecture->owner_name;
                                        $html .='</div>';
                                    $html .='</div>';
                                $html .='</div>';
                                $html .='<div class="w1w2">';
                                    $html .='<div class="w1w2w1">';
                                        $html .='<span class="t3">완강률</span>';
                                        $html .='<span class="t4">';
                                        if ($lecture->student_cnt != 0){
                                            $html .=round(((int)$lecture->complete_cnt / $lecture->student_cnt) * 100, 0).'%';
                                        } else{
                                            $html .= '0%';
                                        }
                                        $html .='</span>';
                                    $html .='</div>';
                                    $html .='<div class="w1w2w2">';
                                        $html .='<span class="t3">강좌 평점</span>';
                                        $html .='<span class="t4">'.$lecture->rating.'</span>';
                                    $html .='</div>';
                                    $html .='<div class="w1w2w3">';
                                        $html .='<span class="t3">수강자 수</span>';
                                        $html .='<span class="t4">'.$lecture->student_cnt.'</span>';
                                    $html .=' </div>';
                                $html .='</div>';
                            $html .='</a>';
                        $html .='</li>';
                    }
                    $result['status'] = "success";
                    $result['html'] = $html;
                }catch(Exception $e){
                    $result['status'] = 'fail';
                    $result['msg'] = $e->getMessage();
                    $result['code'] = $e->getCode();
                }
                return response()->json($result, 200);
            } else if ($type == 'instructor') {
                return view('sub.community.insight_ranking_instructor');

            } else if ($type == 'youtuber') {
                return view('sub.community.insight_ranking_youtuber');
            }
        }

    }

    public function serviceQna() {
        return view('sub.community.service_qna');
    }

    public function getServiceQnaData(Request $request) {
        $type = $request->post('type', '');
        $resData = '';

        try {
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

    public function oneToOne() {
        return view('sub.community.one_to_one');
    }

    public function oneToOneDetail() {
        return view('sub.community.one_to_one_detail');
    }

    public function reviewAll(Request $request) {
        $keyword = $request->get('keyword', '');
        $query = '';
        $where = '';

        if ($keyword != '') {
            $where = ' AND content LIKE "%'.$keyword.'%"';
        }

        $query = 'SELECT rev.*, lec.idx AS lecutre_idx, lec.title, lec.save_thumbnail
                    FROM lecture_review rev, lecture lec
                    WHERE rev.lecture_idx = lec.idx'.$where.'
                    ORDER BY rev.writed_at DESC
                    LIMIT 5';

        $reviewList = DB::select($query);

        return view('sub.community.review_all', compact('reviewList'));
    }
    public function moreList(Request $request){
        $type = $request->post('type', '');
        $sort = $request->post('sort', '');
        $cnt =  $request->post('cnt', 0);
        $html = '';
        $limit = 'limit '.$cnt.', 5';
        if ($type == '' || $type == 'lecture') {
            if($sort == '수강자 수'){
                $lectureList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY l.student_cnt DESC '.$limit);
            }else if($sort =='완강률'){
                $lectureList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY COUNT(ml.status="complete")/l.student_cnt  DESC '.$limit);
            }else if($sort =='평점'){
                $lectureList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY l.rating DESC '.$limit);
            }
            try{
                foreach($lectureList as $lecture){
                    $html .='<li class="li1">';
                        $html .='<a href="?#★" class="w1 a1">';
                            $html .='<div class="w1w1">';
                                $html .='<div class="w1w1w1">';
                                    $html .='<b class="g1"><span class="g1t1">'.++$cnt.'</span><span class="g1t2">위</span></b>';
                                $html .='</div>';
                                $html .='<div class="w1w1w2">';
                                    $html .='<div class="f1">';
                                        $html .='<span class="f1p1">';
                                            $html .='<img src="'.asset('storage/uploads/thumbnail/'.$lecture->save_thumbnail).'" alt="★대체텍스트필수" />';
                                        $html .='</span>';
                                    $html .='</div>';
                                $html .='</div>';
                                $html .='<div class="w1w1w3">';
                                    $html .='<div class="t1">';
                                        $html .=$lecture->title;
                                    $html .='</div>';
                                    $html .='<div class="t2">';
                                        $html .=$lecture->owner_name;
                                    $html .='</div>';
                                $html .='</div>';
                            $html .='</div>';
                            $html .='<div class="w1w2">';
                                $html .='<div class="w1w2w1">';
                                    $html .='<span class="t3">완강률</span>';
                                    $html .='<span class="t4">';
                                    if ($lecture->student_cnt != 0){
                                        $html .=round(((int)$lecture->complete_cnt / $lecture->student_cnt) * 100, 0).'%';
                                    } else{
                                        $html .= '0%';
                                    }
                                    $html .='</span>';
                                $html .='</div>';
                                $html .='<div class="w1w2w2">';
                                    $html .='<span class="t3">강좌 평점</span>';
                                    $html .='<span class="t4">'.$lecture->rating.'</span>';
                                $html .='</div>';
                                $html .='<div class="w1w2w3">';
                                    $html .='<span class="t3">수강자 수</span>';
                                    $html .='<span class="t4">'.$lecture->student_cnt.'</span>';
                                $html .=' </div>';
                            $html .='</div>';
                        $html .='</a>';
                    $html .='</li>';
                }
                $result['status'] = "success";
                $result['html'] = $html;
                $result['totalData'] = DB::select('select count(*) count from lecture')[0]->count;

            }catch(Exception $e){
                $result['status'] = 'fail';
                $result['msg'] = $e->getMessage();
                $result['code'] = $e->getCode();
            }
            return response()->json($result, 200);
        } else if ($type == 'instructor') {
            return view('sub.community.insight_ranking_instructor');

        } else if ($type == 'youtuber') {
            return view('sub.community.insight_ranking_youtuber');
        }
    }
}
