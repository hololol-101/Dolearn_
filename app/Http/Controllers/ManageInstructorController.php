<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class ManageInstructorController extends Controller {

    public function operationLecture(Request $request) {
        $userId = Auth::user()->email;

        $bcateId = $request->get('bcate_id', '');
        $scateId = $request->get('scate_id', '');
        $keyword = $request->get('keyword', '');
        $level = $request->get('level', '');
        $isFree = $request->get('is_free', '');
        $order = $request->get('order', '');
        $tags = $request->get('tags', '');
        $where = '';
        $where2 = '';
        $where3 = '';
        $orderBy = '';
        $bcateName = '';
        $scateName = '';

        // selectbox 값 조건부 강좌 목록 조회 쿼리
        if ($level != '') {
            if ($where == '') {
                $where = ' WHERE level="'.$level.'"';
            } else {
                $where2 = ' AND level="'.$level.'"';
            }
        }
        if ($isFree != '') {
            if ($where == '') {
                $where = ' WHERE free_yn="'.$isFree.'"';
            } else {
                $where2 = ' AND free_yn="'.$isFree.'"';
            }
        }

        // 키워드 조건부 강좌 목록 조회 쿼리
        if ($keyword != '') {
            if ($where == '') {
                $where = ' WHERE title LIKE "%'.$keyword.'%"';
            } else {
                $where2 = ' AND title LIKE "%'.$keyword.'%"';
            }
        }

        if ($where != '') {
            $where3 = ' AND owner_id="'.$userId.'"';
        } else {
            $where3 = ' WHERE owner_id="'.$userId.'"';
        }

        $orderBy = ' ORDER BY idx desc';

        if ($order == 'students') {
            $orderBy = ' ORDER BY student_cnt desc';

        } else if ($order == 'rating') {
            $orderBy = ' ORDER BY rating desc';

        } else if ($order == 'complete') {
            // TODO: 완강률 높은순 정렬 쿼리
        }

        $lectureList = DB::select('SELECT idx, title, save_thumbnail, rating, student_cnt FROM lecture'.$where.$where2.$where3.$orderBy);

        return view('manage.instructor.operation_lecture', compact('lectureList'));
    }

    public function questionList() {
        return view('manage.instructor.question_list');
    }

    public function reviewList() {
        return view('manage.instructor.review_list');
    }

    public function incomeInfo() {
        return view('manage.instructor.income_info');
    }
}
