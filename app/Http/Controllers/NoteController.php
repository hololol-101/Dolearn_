<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class NoteController extends Controller{

    public function saveNote(Request $request) {
        $lectureIdx = $request->post('lecture_idx', '');
        $videoId = $request->post('video_id', '');
        $videoNoteContent = $request->post('video_note_content', '');

        try {
            // 영상 노트 정보 저장
            DB::table('video_note')->insert(array(
                'lecture_idx' => $lectureIdx,
                'video_id' => $videoId,
                'writer_id' => Auth::user()->email,
                'writer_name' => Auth::user()->nickname,
                'content' => $videoNoteContent,
                'writed_at' => now()
            ));

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function modifyNote(Request $request) {
        $videoNoteIdx = $request->post('video_note_idx', '');
        $videoNoteContent = $request->post('video_note_content', '');

        try {
            // 영상 노트 정보 수정
            DB::table('video_note')->where('idx', $videoNoteIdx)->update(['content' => $videoNoteContent, 'updated_at' => now()]);

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }

        return view('learning.learning_note_modify');
    }

    public function deleteNote(Request $request) {
        $videoNoteIdx = $request->post('video_note_idx', '');

        try {
            // 영상 노트 정보 삭제
            DB::table('video_note')->where('idx', $videoNoteIdx)->update(['status' => 'delete', 'deleted_at' => now()]);

            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();

        } finally {
            return response()->json($result);
        }
    }

    public function downloadNote(Request $request) {
        $userId = Auth::user()->email;
        $videoId = $request->get('video_id', '');
        $videoNoteIdx = $request->get('video_note_idx', '');
        $where = '';
        $query = '';

        if ($videoNoteIdx == '') {
            $where = ' AND note.video_id = "'.$videoId.'"';
        } else {
            $where = ' AND note.video_id = "'.$videoId.'" AND note.idx = '.$videoNoteIdx;
        }

        $query = 'SELECT vid.subject, note.video_time, note.content, note.writed_at, note.updated_at
                    FROM video_note note, _youtube_fulldata_temp vid
                    WHERE note.video_id = vid.uid
                        AND note.writer_id = "'.$userId.'"'.$where.'
                        AND note.status = "active"
                    ORDER BY writed_at';

        $fileName = $_SERVER['DOCUMENT_ROOT'].'/notes/'.$videoId.'_'.time().'.txt';
        $txt = fopen($fileName, "wb") or die("Unable to open file!");

        // 자막 데이터 조회
        $videoNoteList = DB::select($query);

        foreach ($videoNoteList as $videoNote) {
            fwrite($txt, '- 강의 영상 제목 : '.$videoNote->subject.chr(13).chr(10));
            fwrite($txt, '- 최초 작성일 : '.$videoNote->writed_at.chr(13).chr(10));
            fwrite($txt, '- 최근 수정일 : '.$videoNote->updated_at.chr(13).chr(10));
            fwrite($txt, '- 내용 : '.$videoNote->content.chr(13).chr(10).chr(13).chr(10));

            // 시간 표시 변환
            // if (round($caption->timestamp) > 3600) {
            //     $time = gmdate("H:i:s", round($caption->timestamp));
            // } else {
            //     $time = gmdate("i:s", round($caption->timestamp));
            // }
            // fwrite($txt, $time.' '.$caption->paragraph_text.chr(13).chr(10));
        }
        fclose($txt);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.basename($fileName));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: '.filesize($fileName));
        header("Content-Type: text/plain");
        readfile($fileName);
    }
}
