<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class Learning2Controller extends Controller{
    public function main(Request $request) {
        return view('learning2.learning2_main');
    }

    public function watchVideo(Request $request) {
        $videoId = $request->get('uid', '');

        // 영상 정보 조회
        $videoDetail = DB::select('SELECT * FROM _youtube_fulldata_temp WHERE uid="'.$videoId.'"');

        if (count($videoDetail) > 0) {
            $videoDetail = $videoDetail[0];
        }

        return view('learning2.learning2_watch_video', compact('videoDetail'));
    }

    public function caption(Request $request) {
        $videoId = $request->get('uid', '');

        // 자막 목록 조회
        $captionList = DB::select('SELECT * FROM _youtube_fulldata_timestamp WHERE uid = "'.$videoId.'" ORDER BY paragraph_idx');

        return view('learning2.learning2_caption', compact('captionList'));
    }

    public function search(Request $request) {
        $videoId = $request->post('uid', '');

        // 인기 검색어 목록 조회
        $popKeywordList = DB::select('SELECT * FROM _youtube_fulldata_hashtag WHERE uid = "'.$videoId.'" ORDER BY score desc limit 5');

        return view('learning2.learning2_search', compact('popKeywordList'));
    }

    public function note(Request $request) {
        $videoId = $request->get('uid', '');

        $userId = Auth::user()->email;

        // 영상 노트 목록 조회
        $videoNoteList = DB::select('SELECT * FROM video_note WHERE writer_id = "'.$userId.'" AND video_id = "'.$videoId.'" AND status="active" ORDER BY writed_at DESC');

        return view('learning2.learning2_note', compact('videoNoteList'));
    }
}
