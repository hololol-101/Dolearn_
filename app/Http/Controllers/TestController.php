<?php
namespace App\Http\Controllers;

use Exception;
use Google_Client;
use Google_Service_Oauth2;
use Google_Service_YouTube;
use Illuminate\Support\Facades\DB;

require_once base_path().'/vendor/autoload.php';

class TestController extends Controller{

    // 구글 서버에 사용자 구글 계정 인증 요청
    public function googleRedirect() {
        $client = new Google_Client();
        $client->setScopes(
            array(
                Google_Service_Oauth2::USERINFO_PROFILE,
                Google_Service_Oauth2::USERINFO_EMAIL,
                Google_Service_YouTube::YOUTUBE_READONLY,
            )
        );
        $client->setClientId('284225148855-dl6tp9a499kb08ml1g0rqgb1kn4u7m5n.apps.googleusercontent.com');
        $client->setRedirectUri('https://new2.dolearn.co.kr/auth/google_callback');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        if ($client->isAccessTokenExpired()) {
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                $authUrl = $client->createAuthUrl();
                header('Location: '.filter_var($authUrl, FILTER_SANITIZE_URL));
                exit();
            }
        }
    }

    // 인증 완료 후 redirect uri로 리턴 받은 code 값으로 access token 값 가져옴
    public function googleCallback() {
        session_start();

        $client = new Google_Client();
        $client->setScopes(
            array(
                Google_Service_Oauth2::USERINFO_PROFILE,
                Google_Service_Oauth2::USERINFO_EMAIL,
                Google_Service_YouTube::YOUTUBE_READONLY,
            )
        );
        $client->setClientId('284225148855-dl6tp9a499kb08ml1g0rqgb1kn4u7m5n.apps.googleusercontent.com');
        $client->setRedirectUri('https://new2.dolearn.co.kr/auth/google_callback');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        if (!isset($_GET['code'])) {
            $authUri = $client->createAuthUrl();
            header('Location: '.filter_var($authUri, FILTER_SANITIZE_URL));
            exit();
        } else {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
        }

        echo 'client session: '.json_encode($client, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function tokenExchange() {

    }

    // DB 조회 기능 테스트
    public function selectData() {
        $html = '';

        try {
            $userList= DB::select('SELECT * FROM users');
            $html .= '<table class="search-table" id="search-table"><thead>';
            $html .= '<tr><th>ID</th><th>이름</th><th>권한</th><th>가입일</th><th>최근 접속일</th></tr></thead><tbody>';

            foreach($userList as $user) {
                $html .= '<tr>';
                $html .= '<td>'.$user->email.'</td>';
                $html .= '<td>'.$user->nickname.'</td>';
                $html .= '<td>'.$user->role.'</td>';
                $html .= '<td>'.$user->created_at.'</td>';
                $html .= '<td>'.$user->last_conn_at.'</td>';
                $html .= '</tr>';
            }
            $html .= '</tbody></table>';

        } catch(Exception $e) {
            return response()->json(array('success' => false, 'message' => $e->getMessage(), 'code' => $e->getCode()));

        } finally {
            return response()->json(array('success' => true, 'html' => $html));
        }
    }
}
