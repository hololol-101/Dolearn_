<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EtcController extends Controller{
    public function terms() {
        return view('etc.terms');
    }

    public function privacy() {
        return view('etc.privacy');
    }

    public function instructorApplication() {
        if(Auth::user()){
            return view('etc.instructor_application');
        }
        else{
            return view('account.signin');
        }
    }

    public function storeInstructor(Request $request) {
        $res = $request->post();
        $file = $request->file('uploadFile');

        if(isset($res)){
            $query=DB::select('select * from instructor_application where dolearn_id = ?',[$res['accountEmail']]);
            if(isset($query[0])){
                echo '<script>alert("이미 강사계정이 존재합니다.\n메인 페이지로 이동합니다."); location.href="'.route('main').'"</script>';
                exit;
            }

            //파일 저장
            $fileReName=null;
            $filename=null;
            if($file){
                $originalname = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $filename = pathinfo($originalname, PATHINFO_FILENAME);
                $fileReName=$filename.'_'.time().'.'.$extension;
                $file->storeAs('uploads/attach/', $fileReName);
            }

            $hope = ( isset($res['★1radio0'])!=null ?  $res['★1radio0']:' ');

            $query2=DB::insert('insert into instructor_application (dolearn_id, email, user_name, mobile, hope_part, introduction, ori_attach_file, save_attach_file, applicated_at, status) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [$res['accountEmail'], $res['contactEmail'], $res['name'], $res['celphone'], $hope, $res['textarea0'], $filename, $fileReName, now(), "ready"]);

            if($query2){
                return redirect()->back()->with('alert', '강사신청이 완료되었습니다.');
            }else{
                return redirect()->back()->with('alert', '강사신청에 실패했습니다.');
            }
        }

//        return view('etc.instructor_application');
    }

    public function userIntroduction(Request $request) {
        $type = $request->get('type', '');
        $userIdx = $request->get('user_idx', '');

        // 회원 정보 조회
        $userInfo = DB::select('SELECT * FROM users WHERE id = '.$userIdx);

        if (count($userInfo) > 0) {
            $userInfo = $userInfo[0];
        }

        if ($type == 'instructor') {
            // 해당 강좌의 강사가 운영 중인 다른 강좌 정보 조회
            $operationLectureList = DB::select('SELECT idx, title, save_thumbnail, owner_name, rating, student_cnt, free_yn FROM lecture WHERE owner_id = "'.$userInfo->email.'" ORDER BY idx DESC limit 4');

            return view('etc.user_introduction_instructor', compact('userInfo', 'operationLectureList'));
        }

        if ($type == 'youtuber') {
            return view('etc.user_introduction_youtuber', compact('userInfo'));
        }
    }


    public function propose(Request $request) {
        if($request->isMethod('get')){
            $email = $request->get('user_idx');
            $query = DB::select('SELECT i.user_name, u.save_profile_image  FROM users u,  instructor_application i WHERE i.dolearn_id = ? AND i.dolearn_id = u.email', [$email]);

            $arr = array();
            $arr['name'] = $query[0]->user_name;
            $arr['image_path'] = $query[0]->save_profile_image;

            return view('etc.propose', compact('arr'));
        }
        if($request->isMethod('post')){
            $req = $request->post();

            $file = $request->file("file");
            $fileReName = null;
            $filename = null;
            if($file){
                $originalname = $file->getClientOriginalName();
                $filename = pathinfo($originalname, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileReName=$filename.'_'.time().'.'.$extension;

                $file->storeAs('uploads/attach/', $fileReName);
            }
            $query=DB::insert('insert into proposal (writer_id, instructor_id, instructor_name, type, email, content, ori_attach_file, save_attach_file, writed_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [Auth::user()->email, $req['instructor_id'], $req['instructor_name'], $req['★1radio0'], $req['email'], $req['content'], $filename, $fileReName, now()]);
            if($query){
                return '<script>alert("제안이 성공적으로 완료되었습니다.")</script>'.redirect()->back();
            }
            else{
                return '<script>alert("제안에 실패했습니다.")</script>'.redirect()->back();
            }

        }
    }

    public function storeImage(Request $request) {
        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageNameWithExtension = $imagePath->getClientOriginalName();
            $imageName = pathinfo($imageNameWithExtension, PATHINFO_FILENAME);
            $extension = $imagePath->getClientOriginalExtension();

            $allowType = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

            if (!in_array(strtolower($extension), $allowType)) {
                $result['status'] = 'fail';
                $result['msg'] = '이미지 파일만 업로드가 가능합니다.';

                return response()->json($result);
            }

            $imageStoreName = $imageName.'_'.time().'.'.$extension;
            $request->file('file')->storeAs('uploads/thumbnail/', $imageStoreName);

            $result['status'] = 'success';
            $result['msg'] = '이미지 업로드가 완료되었습니다.';
            $result['fileName'] = $imageStoreName;
            $result['savePath'] = asset('storage/uploads/thumbnail/'.$imageStoreName);

        } else {
            $result['status'] = 'fail';
            $result['msg'] = '이미지 업로드에 실패했습니다.';
        }

        return response()->json($result);
    }


}
