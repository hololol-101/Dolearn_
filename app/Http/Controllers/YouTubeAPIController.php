<?php
namespace App\Http\Controllers;

use Exception;
use Google_Client;
use Google_Service_YouTube;
use Google_Service_Oauth2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
require_once base_path().'/vendor/autoload.php';

class YouTubeAPIController extends Controller{
//TODO: youtuber == totalResults!=0

    public function signupYoutube(Request $request){

        //권한 동의
        $client=new Google_Client();
        $client->setScopes(
            array(
                Google_Service_Oauth2::USERINFO_PROFILE,
                Google_Service_Oauth2::USERINFO_EMAIL,
                Google_Service_YouTube::YOUTUBE_READONLY,
            )
        );

        //google oauth 계정
        $client->setClientId('44320613438-gu2q1lusi1sg0o4ghsecldpd6i6q33d0.apps.googleusercontent.com');
        $client->setClientSecret('UXK2Y9IW7nurWx6Gd3-xVlmX');
        $client->setRedirectUri('https://new2.dolearn.co.kr/youtube/signup_youtube');

        $client->setAccessType('offline');
        $client->setIncludeGrantedScopes(true);
        $client->setPrompt('select_account consent');

        $youtube="";
        $res = "";
        $me="";
        if($client->isAccessTokenExpired()){
            if($client->getRefreshToken()){
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                $youtube=new Google_Service_YouTube($client);
            }
            else{
                if(isset($_GET['code'])){
                    $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                    if (array_key_exists('error', $accessToken)) {
                        throw new Exception(join(', ', $accessToken));
                    }

                    $client->setAccessToken($accessToken);
                    $youtube=new Google_Service_YouTube($client);
                }
                else{
                    $authurl = $client->createAuthUrl();
                    header('Location: ' . filter_var($authurl, FILTER_SANITIZE_URL));
                    exit();
                }
            }
        }

        if(isset($youtube)){
            $oauth=new Google_Service_Oauth2($client);
            $me = $oauth->userinfo->get();

            $res = $youtube->channels->listChannels('snippet', array('mine'=>'true'));
            $existChannel = $res->pageInfo->totalResults;
            if($existChannel>0){//채널이 존재하는 경우
                $snippet = $res->items[0]->snippet;
                //이미 회원인지 확인
                $check=DB::select('select COUNT(case when role!="student" then 1 END) exist, COUNT(case when role="student" then 1 END) basic  from users where email = ? ', [$me->email])[0];
                if($check->exist>0){
                    //유튜브 계정 혹은 강사 계정이 존재할 경우
                        return '<script>alert("이미 존재하는 계정입니다.")</script>'.view('account.signup');
                }else if($check->basic>0){
                    // 일반 계정이 존재할 경우 일반계정에 정보 덮어쓰기
                    //url 이미지 DB에 저장
                    $image = file_get_contents($snippet->thumbnails->default->url);
                    $imageName = $snippet->title."profileImg";
                    $imageStoreName = $imageName.time().".jpg";
                    file_put_contents( 'storage/uploads/profile/'.$imageStoreName, $image);
                    DB::table('users')->where('email',$me->email)->update(array(
                        'password'=>password_hash('youtube', PASSWORD_DEFAULT),
                        'nickname'=> $snippet->title,
                        'role'=>'youtuber',
                        'introduction'=>$snippet->description,
                        'ori_profile_image'=>$imageName,
                        'save_profile_image'=>$imageStoreName,
                        'notification_4'=>'Y',
                        'updated_at'=>now(),
                        'update_host'=>$_SERVER['REMOTE_ADDR']
                    ));
                    $request->session()->put('email', $me->email);
                    $request->session()->put('role', 'youtuber');
                    return redirect()->route('main');
                }else{
                //url 이미지 DB에 저장
                $image = file_get_contents($snippet->thumbnails->default->url);
                $imageName = $snippet->title."profileImg";
                $imageStoreName = $imageName.time().".jpg";
                file_put_contents( 'storage/uploads/profile/'.$imageStoreName, $image);

                $query = DB::insert('insert into users (email, password, nickname, role, introduction, ori_profile_image, save_profile_image, notification_1, notification_2, notification_4, event_yn, created_at, regist_host)'
                .' values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$me->email, password_hash('youtube', PASSWORD_DEFAULT) , $snippet->title, 'youtuber', $snippet->description, $imageName, $imageStoreName, 'Y', 'Y', 'Y', 'Y', now(),  $_SERVER['REMOTE_ADDR']]);
                $request->session()->put('email', $me->email);
                $request->session()->put('role', 'youtuber');
                return redirect()->route('main');

                }
            }
            else{// 채널이 없는 경우
                return '<script>alert("유튜브 채널이 없습니다.\n유튜브 채널을 등록해주세요.")</script>'.view('account.signup');
            }
        }
    }
    public function signinYoutube(Request $request){
        $client=new Google_Client();
        $client->setScopes(
            array(
                Google_Service_Oauth2::USERINFO_PROFILE,
                Google_Service_Oauth2::USERINFO_EMAIL,
            )
        );

        //google oauth 계정
        $client->setClientId('44320613438-gu2q1lusi1sg0o4ghsecldpd6i6q33d0.apps.googleusercontent.com');
        $client->setClientSecret('UXK2Y9IW7nurWx6Gd3-xVlmX');
        $client->setRedirectUri('https://new2.dolearn.co.kr/youtube/signin_youtube');

        $client->setAccessType('offline');
        $client->setIncludeGrantedScopes(true);
        $client->setPrompt('select_account consent');


        if($client->isAccessTokenExpired()){
            if($client->getRefreshToken()){
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                $oauth=new Google_Service_Oauth2($client);
                $me = $oauth->userinfo->get();
            }
            else{
                if(isset($_GET['code'])){
                    $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                    $client->setAccessToken($accessToken);
                    if (array_key_exists('error', $accessToken)) {
                        throw new Exception(join(', ', $accessToken));
                    }

                    $oauth=new Google_Service_Oauth2($client);
                    $me = $oauth->userinfo->get();
                }
                else{
                    $authurl = $client->createAuthUrl();
                    header('Location: ' . filter_var($authurl, FILTER_SANITIZE_URL));
                    exit();
                }
            }
        }

        if($me!=""){
        //이미 회원인지 확인
            $check=DB::select('select * from users where email = ? and role != "student"', [$me->email]);

            if(count($check)>0){
                Auth::attempt(['email' => $me->email, 'password' => 'youtube']);

                //탈퇴한 경우
                if(Auth::user()->status=="withdraw"){
                    Auth::logout();
                    $request->session()->put('alert', "유튜브 계정이 없습니다. 회원가입에서 유튜브 채널을 등록해주세요.");
                    return redirect()->route('main');
                    //return '<script>alert("유튜브 계정이 없습니다.\n회원가입에서 유튜브 채널을 등록해주세요.")</script>'.view('account.signup');
                }

                DB::update('update users set last_conn_at = ?, last_conn_host = ? where email = ? and role = "youtuber"',  [now(),  $_SERVER['REMOTE_ADDR'], $me->email]);
                DB::insert('insert into signin_log (user_id, user_agent, signin_host, signin_at) values (?, ?, ?, ?)', [$me->email, $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR'], now()]);
                return redirect()->route('main');
            }
            else{// 채널이 없는 경우
                $request->session()->put('alert', "유튜브 계정이 없습니다. 회원가입에서 유튜브 채널을 등록해주세요.");
                return redirect()->route('main');
                //return '<script>alert("유튜브 계정이 없습니다.\n회원가입에서 유튜브 채널을 등록해주세요.")</script>'.view('account.signup');
            }
        }
    }
}
