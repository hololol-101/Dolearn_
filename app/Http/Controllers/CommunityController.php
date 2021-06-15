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

    public function ranking(Request $reqeust) {
        $type = $reqeust->get('type', '');

        if ($type == '' || $type == 'lecture') {
            return view('sub.community.insight_ranking_lecture');

        } else if ($type == 'instructor') {
            return view('sub.community.insight_ranking_instructor');

        } else if ($type == 'youtuber') {
            return view('sub.community.insight_ranking_youtuber');
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
}
