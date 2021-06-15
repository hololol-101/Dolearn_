<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageYoutuberController extends Controller {
    public function videoManagement(Request $request) {
        $type = $request->get('type', '');

        if ($type == '' || $type == 'video') {
            return view('manage.youtuber.manage_my_video');

        } else if ($type == 'lecture') {
            return view('manage.youtuber.manage_include_my_video_lecture');
        }
    }

    public function videoAnalysis() {
        return view('manage.youtuber.video_analysis');
    }
}
