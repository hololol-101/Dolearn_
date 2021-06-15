<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BBSController extends Controller{
    public function lectureQnaDetail(Request $request) {
        return view('sub.bbs.lecture_qna_detail');
    }
}
