<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller{
    public function ckFileUpload(Request $request) {

        if($request->hasFile('upload')) {

            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->storeAs('uploads/attach/', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/attach/'.$filenametostore);
            $msg = 'Image successfully uploaded';

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>"; // 알림창 띄우려면 파라미터에 msg 추가

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            //echo $response;
            if ( isset($CKEditorFuncNum) ) echo $response;
            else echo '{"filename" : "'.$filename.'", "uploaded" : 1, "url":"'.$url.'"}';
        }
    }
}
