<?php
// DB 커넥션및 공통 환경변수등.

// register_globals=off 인경우 값 그냥 받기
@extract($_GET);
@extract($_POST);
@extract($_SERVER); 

//홈 디랙토리
$HOME_DIR = $_SERVER["DOCUMENT_ROOT"]."/";

//홈주소
$HOME_URL = "";
$IMG_TEMP_URL = "";

//데이타베이스 설정
/*
$DB_SERVER = "59.20.226.7:33306";         // DB 호스트
$DB_USER = "dataedu";          // DB에 접근 가능한 아이디
$DB_PASSWD = "dataedu!1";    // 해당 아이디 비밀번호
$DB_NAME = "stepping";    // DB 이름
*/

$DB_SERVER = "localhost";         // DB 호스트
$DB_USER = "dolearn";          // DB에 접근 가능한 아이디
$DB_PASSWD = "dolearn!1";    // 해당 아이디 비밀번호
$DB_NAME = "dolearn";    // DB 이름

//if ( $_SERVER['HTTP_HOST'] == "m.nachotv.com" ) $oSite = "mobile";
?>
