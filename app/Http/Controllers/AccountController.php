<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller{

    public function findPassword() {
        return view('account.reset_password');
    }

    public function signup(Request $request) {
        if($request->isMethod('get')){
            return view('account.signup');
        }
        if($request->isMethod('post')){
            $email = $request->post('email');
            $password = $request->post('password');
            $nickname = $request->post('nickname');
            $role = $request->post('role');
            $event_yn=$request->post('event_yn');
            //비밀번호 암호화
            $hash_pw=password_hash($password, PASSWORD_DEFAULT);

            //email과 nickname이 존재하는지 확인
            $isExist = DB::select("SELECT * FROM users WHERE email = '$email' or nickname='$nickname'");

            if(count($isExist)<1){
                DB::table('users')->insert(array(
                    'email'=>$email,
                    'password'=>$hash_pw,
                    'nickname'=>$nickname,
                    'role'=>$role,
                    'notification_1'=>'Y',
                    'notification_2'=>'Y',
                    'event_yn'=>$event_yn,
                    'created_at'=>now(),
                    'last_conn_at'=>now(),
                    'regist_host'=>$_SERVER['REMOTE_ADDR'],
                    'last_conn_host'=>$_SERVER['REMOTE_ADDR']
                ));
                $request->session()->put('email', $email);
                $request->session()->put('role', $role);
                return response()->json(array('msg'=> "Create"), 200);
            }
            else{
                for($index = 0; $index<count($isExist); $index++){
                    $existEmail = $isExist[$index]->email;
                    if($existEmail==$email){
                        return response()->json(array('msg'=> "ExistEmail"), 200);
                    }
                }
                //$request ->session('key');
                return response()->json(array('msg'=> "ExistNick"), 200);
            }
        }

        // $users = User::all();

        // return view('account.signup', compact('users', json_encode($users)));
    }

    public function signin(Request $request) {
        if ($request->isMethod('post')) {
            $email=$request->post('email');
            $password=$request->post('password');

            //로그인 확인
            if(Auth::attempt(['email' => $email, 'password' => $password])&&Auth::user()->status!="withdraw"){
                //다른 기기 로그아웃 처리
                //Auth::logoutOtherDevices($password);

                DB::update('update users set last_conn_at = ?, last_conn_host = ? where email = ?',  [now(),  $_SERVER['REMOTE_ADDR'],$email]);
                DB::insert('insert into signin_log (user_id, user_agent, signin_host, signin_at) values (?, ?, ?, ?)', [$email, $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR'], now()]);

                $countLearningLecture =  DB::select('select count(*) count FROM my_lecture WHERE user_id = ?',[$email])[0]->count;
                $request->session()->put('countLearningLecture', $countLearningLecture);
                if(Auth::user()->role =="instructor"){
                    $countOperatingLecture = DB::select('select count(Distinct l.idx) count FROM users u LEFT JOIN lecture l ON l.owner_id = u.email  WHERE u.nickname = ?', [Auth::user()->nickname])[0]->count;
                    $request->session()->put('countOperatingLecture', $countOperatingLecture);
                }
                if(Auth::user()->role =="youtuber"){
                    $countMyVideo = DB::select('select count(*) count from _youtube_fulldata_temp where channel = ?', [Auth::user()->nickname])[0]->count;
                    $request->session()->put('countMyVideo', $countMyVideo);
                }



                return response()->json(array('status'=> "success"), 200);
            }else{
                return response()->json(array('status'=> "fail"), 200);
            }
        }
    }

    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function profileSettings() {
        $role='';
        if(password_verify('youtube', Auth::user()->password)){
            $role = "youtuber";
        }
        return view('account.profile_settings', compact('role'));
    }

    public function profileUpdateAll(Request $request) {
        $req = $request->post();
        $user = Auth::user();
        $email = $user->email;
        $nickname = $user->nickname;
        $email_verified_at = $user->email_verified_at;
        $role = $request->post('role');

        //닉네임이 다를 경우 존재하는 닉네임인지 확인
        if($nickname!=$req['nickname']){
            $query = DB::select('select * from users where nickname= ?', [$req['nickname']]);
            if(count($query)!=0){
                return response()->json(array('msg'=> "ExistNick"), 200);
            }
            else{
                $nickname = $req['nickname'];
            }
        }
        //이메일이 다를 경우 존재하는 이메일인지 확인
        if($email!=$req['email']){
            $query = DB::select('select * from users where email= ?', [$req['email']]);
            if(count($query)!=0){
                return response()->json(array('msg'=> "ExistEmail"), 200);
            }
            else{
                $email =$req['email'];
                $email_verified_at="null";
            }
        }

        if($role =="youtuber"){ //유튜브 계정의 정보 수정할 경우
            $query=DB::update('UPDATE users SET email=?, nickname=?, introduction=?, email_verified_at=?, updated_at=? where id = ?',
            [$email, $nickname, $req['textarea01'], $email_verified_at, now(), $user->id]);

            return response()->json(array('msg'=> "success"), 200);
        }else{    // 일반계정 수정할 경우
            $query=DB::update('UPDATE users SET email=?,  nickname=?, introduction=?, email_verified_at=?, updated_at=? where id = ?',
            [$email, $nickname, $req['textarea01'], $email_verified_at, now(), $user->id]);

            return response()->json(array('msg'=> "success"), 200);
        }
        return response()->json(array('msg'=> "success"), 200);
    }
    public function changePassword(Request $request){
        $origin = $request->post('password');
        $newPwd = $request->post('newPwd');
        $email = Auth::user()->email;
        if(password_verify($origin, Auth::user()->password)){
            DB::table('users')->where('email', Auth::user()->email)->update( array(
                    'password'=>password_hash($newPwd,PASSWORD_DEFAULT)
            ));
            Session::flush();
            Auth::attempt(['email' => $email, 'password' => $newPwd]);
            return response()->json(array('msg'=>'success'), 200);

        }else{
            return response()->json(array('msg'=>'wrongPwd'), 200);
        }
    }
    public function saveProfileImage(Request $request){

        if($request->file('file')){
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
            $request->file('file')->storeAs('uploads/profile/', $imageStoreName);

            $result['status'] = 'success';
            $result['msg'] = '이미지 업로드가 완료되었습니다.';
            $result['fileName'] = $imageStoreName;
            $result['savePath'] = asset('storage/uploads/profile/'.$imageStoreName);
            //DB에 위치 UPDATE
            $query=DB::update('update users set ori_profile_image =?, save_profile_image = ? where email = ?', [$imageName, $imageStoreName, Auth::user()->email]);
        }
        else {
            $result['status'] = 'fail';
            $result['msg'] = '이미지 업로드에 실패했습니다.';
            //DB에 위치 제거
            $query=DB::update('update users set save_profile_image = null where email = ?', [Auth::user()->email]);
        }
        return response()->json($result);
    }

    public function notificationSettings() {
        return view('account.notification_settings');
    }

    public function saveNotificationSettings(Request $request) {
        $noticeNum = $request->post('num');
        $check =$request->post('isOn');
        $query = DB::update('update users set notification_'.$noticeNum.' = ? where email = ?', [$check, Auth::user()->email]);
        return response()->json(array('msg'=> $query), 200);
    }

    public function withdraw() {
        return view('account.withdraw');
    }

    public function changeStatus() {
        $query = DB::update('update users set withdraw_at = ?, status = "withdraw" where email = ?', [now(), Auth::user()->email]);
        // session()->forget(Auth::user()->email);
        Auth::logout();
        if($query){
            return response()->json(array('msg'=> "success"), 200);
        }else{
            return response()->json(array('msg'=> "fail"), 400);
        }
    }


    public function interestSet(Request $request){
        //request에서 spacebar가 underline로 변환되어 있음
        $email = $request->post('email', '');
        $role = $request->post('role', '');
        if($email==''||$role==''){//로그인 후 접속
            $email=Auth::user()->email;
            $role=Auth::user()->role;
        }

        $req = $request->except('email', 'role', '_token');
        $key = array_keys($req);
        //submit 하면 spacebar가 underline으로 바뀌기때문에 변환과정 필요
        $key= str_replace('_', ' ', $key);

        if(count($key)!=0){
            $query = 'select scate_id, scate_name from s_category where scate_name in ("'.$key[0].'"';
            for($idx=1;$idx<count($key);$idx++){
                $query.= ", '".$key[$idx]."'";
            }
            $query .= ')';


            $js = array();
            $result = DB::select($query);
            foreach($result as $item){
                $name = $item->scate_name;
                $name= str_replace(' ', '_', $name);

                $id = $item->scate_id;
                $js[$id]  = $req[$name];
            }
            DB::update('update users set interest = ? where email = ? and role = ? ', [json_encode($js), $email, $role]);

        }else{
            DB::update('update users set interest = null where email = ? and role = ? ', [$email, $role]);
        }
        return redirect()->back();
    }
}
