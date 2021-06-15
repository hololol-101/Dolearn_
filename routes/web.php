<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BBSController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ManagementLearningController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\EtcController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\Learning2Controller;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ManageLectureController;
use App\Http\Controllers\ManageYoutuberController;
use App\Http\Controllers\ManageInstructorController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\YouTubeAPIController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 메인
Route::get('/', [MainController::class, 'main'])->name('main');

// Route::get('/', function () {
//     return view('index');
// });

// 회원 계정
Route::group(['prefix'=>'account', 'as'=>'account.'], function() {

    // 비밀번호 재설정
    Route::get('find_password', [AccountController::class, 'findPassword'])->name('find_password');

    // 회원 가입
    Route::get('signup', [AccountController::class, 'signup'])->name('signup');

    // 회원 정보 저장
    Route::post('signup', [AccountController::class, 'signup'])->name('signup');

    // 로그인 정보 확인
    Route::post('signin', [AccountController::class, 'signin'])->name('signin');

    // 로그아웃
    Route::get('logout', [AccountController::class, 'logout'])->name('logout');

    // 프로필 설정
    Route::get('profile_settings', [AccountController::class, 'profileSettings'])->name('profile_settings');

    // 프로필 전체 설정 저장
    Route::post('profile_update_all', [AccountController::class, 'profileUpdateAll'])->name('profile_update_all');

    // 프로필 이미지 저장
    Route::post('save_profile_image', [AccountController::class, 'saveProfileImage'])->name('save_profile_image');

    // 알림 설정
    Route::get('notification_settings', [AccountController::class, 'notificationSettings'])->name('notification_settings');

    //알림 설정 저장
    Route::post('save_notification_settings', [AccountController::class, 'saveNotificationSettings'])->name('save_notification_settings');

    // 회원 탈퇴
    Route::get('withdraw', [AccountController::class, 'withdraw'])->name('withdraw');

    //회원 탈퇴 데이터베이스 수정
    Route::get('change_status', [AccountController::class, 'changeStatus'])->name('change_status');

    //관심 분야 설정
    Route::post('interest_set', [AccountController::class, 'interestSet'])->name('interest_set');

});

// 서브 기능
Route::group(['prefix'=>'sub', 'as'=>'sub.'], function() {

    // 게시판
    Route::group(['prefix'=>'bbs', 'as'=>'bbs.'], function() {

        // 질문 게시판
        Route::get('lecture_qna_detail', [BBSController::class, 'lectureQnaDetail'])->name('lecture_qna_detail');
    });

    // 강좌
    Route::group(['prefix'=>'lecture', 'as'=>'lecture.'], function() {

        // 강좌 목록 조회
        Route::get('lecture_list', [LectureController::class, 'lectureList'])->name('lecture_list');

        // 해시태그(주제)가 포함된 강좌 목록 조회, 강좌 더보기
        Route::post('get_lecture_data', [LectureController::class, 'getLectureData'])->name('get_lecture_data');

        // 태그 더보기
        Route::post('get_more_tags', [LectureController::class, 'getMoreTags'])->name('get_more_tags');

        // 강좌 상세
        Route::get('lecture_detail', [LectureController::class, 'lectureDetail'])->name('lecture_detail')->middleware('auth');

        // 수강 후기 더보기
        Route::post('get_more_review', [LectureController::class, 'getMoreReview'])->name('get_more_review');

        // 수강 신청
        Route::post('course_application', [LectureController::class, 'courseApplication'])->name('course_application')->middleware('auth');

        // 새 강좌 만들기(step parameter로 화면 분기)
        Route::get('add_new_lecture', [LectureController::class, 'addNewLecture'])->name('add_new_lecture')->middleware('auth');

        // 새 강좌 만들기(기본 정보)에 필요한 필수/서브 카테고리 목록 조회
        Route::post('get_category_data', [LectureController::class, 'getCategoryData'])->name('get_category_data');

        // 새 강좌 만들기 - 임시 저장
        Route::post('tempsave_add_lecture', [LectureController::class, 'tempsaveAddLecture'])->name('tempsave_add_lecture');

        // 새 강좌 만들기 - 커리큘럼 : 추천 영상 목록 조회
        Route::post('get_recommand_video_data', [LectureController::class, 'getRecommandVideoData'])->name('get_recommand_video_data');

        // 새 강좌 만들기 - 커리큘럼 : URL -> ID 영상 조회
        Route::post('get_video_data', [LectureController::class, 'getVideoData'])->name('get_video_data');

        // 새 강좌 만들기 - 실제 최종 생성
        Route::post('add_new_lecture_final', [LectureController::class, 'addNewLectureFinal'])->name('add_new_lecture_final');

        //인기 강좌, 신규 강좌, AI 추천 강좌 소분류 카테고리 선택 시 비동기 조회 처리
        Route::get('get_interest_lecture', [LectureController::class, 'getInterestLecture'])->name('get_interest_lecture');
    });

    // 강의 영상
    Route::group(['prefix'=>'video', 'as'=>'video.'], function() {

        // 영상 목록 조회
        Route::get('video_list', [VideoController::class, 'videoList'])->name('video_list');

        // 해시태그(주제)가 포함된 영상 목록 조회, 영상 더보기
        Route::post('get_video_data', [VideoController::class, 'getVideoData'])->name('get_video_data');

        // 태그 더보기
        Route::post('get_more_tags', [VideoController::class, 'getMoreTags'])->name('get_more_tags');

        // 영상 상세
        Route::get('video_detail', [VideoController::class, 'videoDetail'])->name('video_detail')->middleware('auth');

        // 시청 기록
        Route::get('video_play_history', [VideoController::class, 'videoPlayHistory'])->name('video_play_history');

        // 영상 노트
        Route::get('video_note_list', [VideoController::class, 'videoNoteList'])->name('video_note_list');

        // 영상 노트 상세
        Route::get('video_note_detail', [VideoController::class, 'videoNoteDetail'])->name('video_note_detail');

        // 재생 목록
        Route::get('video_playlist', [VideoController::class, 'videoPlaylist'])->name('video_playlist');

        // 재생 목록 상세
        Route::get('video_playlist_detail', [VideoController::class, 'videoPlaylistDetail'])->name('video_playlist_detail');
    });

    // 커뮤니티
    Route::group(['prefix'=>'community', 'as'=>'community.'], function() {

        // 공지사항
        Route::get('notice', [CommunityController::class, 'notice'])->name('notice');

        // 공지사항 - 상세
        Route::get('notice_detail', [CommunityController::class, 'noticeDetail'])->name('notice_detail');

        // 인사이트 - 최신트렌드
        Route::get('trend', [CommunityController::class, 'trend'])->name('trend');

        // 인사이트 - 최신트렌드(상세)
        Route::get('trend_detail', [CommunityController::class, 'trendDetail'])->name('trend_detail');

        // 인사이트 - 랭킹
        Route::get('ranking', [CommunityController::class, 'ranking'])->name('ranking');

        // 서비스 문의
        Route::get('service_qna', [CommunityController::class, 'serviceQna'])->name('service_qna');

        // 서비스 문의 목록 조회(탭 별 - 전체, 일반, 강사, 수강자, 결제)
        Route::post('get_service_qna_data', [CommunityController::class, 'getServiceQnaData'])->name('get_service_qna_data');

        // 1:1 문의
        Route::get('one_to_one', [CommunityController::class, 'oneToOne'])->name('one_to_one');

        // 1:1 문의 상세
        Route::get('one_to_one_detail', [CommunityController::class, 'oneToOneDetail'])->name('one_to_one_detail');

        // 수강후기 모아보기
        Route::get('review_all', [CommunityController::class, 'reviewAll'])->name('review_all');
    });

    // 학습 관리
    Route::group(['prefix'=>'management', 'as'=>'management.'], function() {

        // 수강중인 강좌
        Route::get('learning_lecture_list', [ManagementLearningController::class, 'learningLectureList'])->name('learning_lecture_list');

        // 강좌 노트
        // Route::get('lecture_note_list', [ManagementLearningController::class, 'lectureNoteList'])->name('lecture_note_list');

        // 강좌 노트 상세
        // Route::get('lecture_note_detail', [ManagementLearningController::class, 'lectureNoteDetail'])->name('lecture_note_detail');

        // 내 질문 목록
        Route::get('my_question_list', [ManagementLearningController::class, 'myQuestionList'])->name('my_question_list');
        Route::post('my_question_list', [ManagementLearningController::class, 'myQuestionList'])->name('my_question_list');

        // 내 질문 상세
        Route::get('my_question_detail', [ManagementLearningController::class, 'myQuestionDetail'])->name('my_question_detail');

        // 질문 해결/미해결 선택
        Route::post('check_solution', [ManagementLearningController::class, 'checkSolution'])->name('check_solution');

        // 질문 수정
        Route::post('modify_question', [ManagementLearningController::class, 'modifyQuestion'])->name('modify_question');

        // 질문 삭제
        Route::post('delete_question', [ManagementLearningController::class, 'deleteQuestion'])->name('delete_question');
    });

    // 대시보드
    Route::group(['prefix'=>'dashboard', 'as'=>'dashboard.'], function() {

        // 대시보드 메인
        Route::get('dashboard_main', [DashboardController::class, 'dashboardMain'])->name('dashboard_main')->middleware('auth');

        // 내 알림 목록 조회
        Route::get('my_notification_list', [DashboardController::class, 'myNotificationList'])->name('my_notification_list');
    });

    // 영상 노트
    Route::group(['prefix'=>'note', 'as'=>'note.'], function() {

        // 노트 작성
        Route::post('save_note', [NoteController::class, 'saveNote'])->name('save_note');

        // 노트 수정
        Route::post('modify_note', [NoteController::class, 'modifyNote'])->name('modify_note');

        // 노트 삭제
        Route::post('delete_note', [NoteController::class, 'deleteNote'])->name('delete_note');

        // 노트 다운로드
        Route::get('download_note', [NoteController::class, 'downloadNote'])->name('download_note');
    });

    // 통합 검색
    Route::group(['prefix'=>'search', 'as'=>'search.'], function() {
        // 통합 검색
        Route::get('integrated_search', [SearchController::class, 'integratedSearch'])->name('integrated_search');

        Route::post('integrated_search', [SearchController::class, 'integratedSearch'])->name('integrated_search');
    });
});

// 강좌 학습
Route::group(['prefix'=>'learning', 'as'=>'learning.'], function() {

    // 메인
    Route::get('main', [LearningController::class, 'main'])->name('main');

    // 목차
    Route::get('index', [LearningController::class, 'index'])->name('index');

    // 영상 시청
    Route::get('watch_video', [LearningController::class, 'watchVideo'])->name('watch_video');

    // 이전/다음 강의
    Route::get('move_next_video', [LearningController::class, 'moveNextVideo'])->name('move_next_video');

    // 자막
    Route::get('caption', [LearningController::class, 'caption'])->name('caption');

    // 자막 다운로드
    Route::get('download_caption', [LearningController::class, 'downloadCaption'])->name('download_caption');

    // 질의 응답 및 요약
    Route::get('aiqna', [LearningController::class, 'aiqna'])->name('aiqna');

    // 내용 검색
    Route::get('search', [LearningController::class, 'search'])->name('search');

    // 검색 결과
    Route::post('search_result', [LearningController::class, 'searchResult'])->name('search_result');

    // 영상 노트
    Route::get('note', [LearningController::class, 'note'])->name('note');

    // 질문 게시판
    Route::get('qna', [LearningController::class, 'qna'])->name('qna');

    // 질문 키워드 검색
    Route::post('qna_search', [LearningController::class, 'qnaSearch'])->name('qna_search');

    // 질문 작성
    Route::get('qna_write', [LearningController::class, 'qnaWrite'])->name('qna_write');

    // 질문 등록
    Route::post('save_qna', [LearningController::class, 'saveQna'])->name('save_qna');

    // 질문 상세
    Route::get('qna_detail', [LearningController::class, 'qnaDetail'])->name('qna_detail');

    // 추천 영상
    Route::get('recommand', [LearningController::class, 'recommand'])->name('recommand');

    // 구매 하기
    Route::get('purchase', [LearningController::class, 'purchase'])->name('purchase');

    // 과제 강의
    Route::get('task', [LearningController::class, 'task'])->name('task');

    // 시험 강의
    Route::get('exam', [LearningController::class, 'exam'])->name('exam');

    // 수강 후기 저장
    Route::post('save_review', [LearningController::class, 'saveReview'])->name('save_review');
});

// 영상 학습(스마트 학습)
Route::group(['prefix'=>'learning2', 'as'=>'learning2.'], function() {

    // 메인
    Route::get('main', [Learning2Controller::class, 'main'])->name('main');

    // 영상 시청
    Route::get('watch_video', [Learning2Controller::class, 'watchVideo'])->name('watch_video');

    // 자막
    Route::get('caption', [Learning2Controller::class, 'caption'])->name('caption');

    // 내용 검색
    Route::get('search', [Learning2Controller::class, 'search'])->name('search');

    // 영상 노트
    Route::get('note', [Learning2Controller::class, 'note'])->name('note');
});

// 관리
Route::group(['prefix'=>'manage', 'as'=>'manage.'], function() {

    // 강좌 관리 상세
    Route::group(['prefix'=>'lecture', 'as'=>'lecture.'], function() {

        // 관리 페이지 사이드 썸네일, 제목 조회
        Route::post('get_thumbnail', [ManageLectureController::class, 'getThumbnail'])->name('get_thumbnail');

        // 강좌 정보
        Route::get('lecture_info', [ManageLectureController::class, 'lectureInfo'])->name('lecture_info');

        // 강좌 정보 수정
        Route::get('lecture_info_modify', [ManageLectureController::class, 'lectureInfoModify'])->name('lecture_info_modify');

        // 강좌 정보 저장
        Route::post('save_lecture_info', [ManageLectureController::class, 'saveLectureInfo'])->name('save_lecture_info');

        // 강좌 설정
        Route::get('lecture_settings', [ManageLectureController::class, 'lectureSettings'])->name('lecture_settings');

        // 강좌 설정 저장
        Route::post('save_lecture_settings', [ManageLectureController::class, 'saveLectureSettings'])->name('save_lecture_settings');

        // 커리큘럼
        Route::get('curriculum', [ManageLectureController::class, 'curriculum'])->name('curriculum');

        // 커리큘럼 조회 : 강사 한 마디, 미리보기 영상 정보
        Route::post('get_curriculum_info', [ManageLectureController::class, 'getCurriculumInfo'])->name('get_curriculum_info');

        // 커리큘럼 : 강사 한 마디 저장
        Route::post('save_comment', [ManageLectureController::class, 'saveComment'])->name('save_comment');

        // 커리큘럼 저장
        Route::post('save_curriculum', [ManageLectureController::class, 'saveCurriculum'])->name('save_curriculum');

        // 커리큘럼 수정(유/무료)
        Route::get('curriculum_modify', [ManageLectureController::class, 'curriculumModify'])->name('curriculum_modify');

        // 문제 관리(목록)
        Route::get('question_management', [ManageLectureController::class, 'questionManagement'])->name('question_management');

        // 문제 생성
        Route::get('add_new_question', [ManageLectureController::class, 'addNewQuestion'])->name('add_new_question');

        // 문제 수정
        Route::get('modify_question', [ManageLectureController::class, 'modifyQuestion'])->name('modify_question');

        // 시험/과제 관리(목록)
        Route::get('exam_task_management', [ManageLectureController::class, 'examTaskManagement'])->name('exam_task_management');

        // 시험/과제 생성
        Route::get('add_new_exam_task', [ManageLectureController::class, 'addNewExamTask'])->name('add_new_exam_task');

        // 시험/과제 수정
        Route::get('modify_exam_task', [ManageLectureController::class, 'modifyExamTask'])->name('modify_exam_task');

        // 시험/과제 제출 현황(type parameter로 분기)
        Route::get('submission_status', [ManageLectureController::class, 'submissionStatus'])->name('submission_status');

        // 수강자 관리
        Route::get('student_management', [ManageLectureController::class, 'studentManagement'])->name('student_management');

        // 수강자 목록 정렬, 조건부 조회
        Route::post('student_management', [ManageLectureController::class, 'studentManagement'])->name('student_management');

        // 질문 목록
        Route::get('qna_list', [ManageLectureController::class, 'qnaList'])->name('qna_list');

        // 질문 목록 정렬 조회
        Route::post('qna_list', [ManageLectureController::class, 'qnaList'])->name('qna_list');

        // 질문 상세
        Route::get('qna_detail', [ManageLectureController::class, 'qnaDetail'])->name('qna_detail');

        // 수강후기 목록
        Route::get('review_list', [ManageLectureController::class, 'reviewList'])->name('review_list');

        // 수강후기 목록 정렬 조회
        Route::post('review_list', [ManageLectureController::class, 'reviewList'])->name('review_list');

    });

    // 영상 관리 - 유튜버
    Route::group(['prefix'=>'youtuber', 'as'=>'youtuber.'], function() {

        // 영상 관리 : 내 영상, 내 영상 포함 강좌
        Route::get('video_management', [ManageYoutuberController::class, 'videoManagement'])->name('video_management');

        // 영상 분석
        Route::get('video_analysis', [ManageYoutuberController::class, 'videoAnalysis'])->name('video_analysis');
    });

    // 강좌 관리 - 강사
    Route::group(['prefix'=>'instructor', 'as'=>'instructor.'], function() {

        // 운영 강좌
        Route::get('operation_lecture', [ManageInstructorController::class, 'operationLecture'])->name('operation_lecture');

        // 질문 리스트
        Route::get('question_list', [ManageInstructorController::class, 'questionList'])->name('question_list');

        // 수강후기 리스트
        Route::get('review_list', [ManageInstructorController::class, 'reviewList'])->name('review_list');

        // 수익 내역
        Route::get('income_info', [ManageInstructorController::class, 'incomeInfo'])->name('income_info');
    });
});

// 결제
Route::group(['prefix'=>'payment', 'as'=>'payment.'], function() {

    // 수강 바구니
    Route::get('payment_cart', [PaymentController::class, 'paymentCart'])->name('payment_cart');

    // 구매 정보
    Route::get('purchase_info', [PaymentController::class, 'purchaseInfo'])->name('purchase_info');
});

// 기타
Route::group(['prefix'=>'etc', 'as'=>'etc.'], function() {

    // 이용약관
    Route::get('terms', [EtcController::class, 'terms'])->name('terms');

    // 개인정보처리방침
    Route::get('privacy', [EtcController::class, 'privacy'])->name('privacy');

    // 강사 계정 신청하기
    Route::get('instructor_application', [EtcController::class, 'instructorApplication'])->name('instructor_application')->middleware('auth');

    // 강사 계정 저장
    Route::post('store_instructor', [EtcController::class, 'storeInstructor'])->name('store_instructor');

    // 강사/유튜버 소개
    Route::get('user_introduction', [EtcController::class, 'userIntroduction'])->name('user_introduction');

    // 제안하기
    Route::get('propose', [EtcController::class, 'propose'])->name('propose');

    // 제안하기
    Route::post('propose', [EtcController::class, 'propose'])->name('propose');

    // 새 강좌 생성 시 썸네일 이미지 파일 업로드
    Route::post('store_image', [EtcController::class, 'storeImage'])->name('store_image');
});

// CKEditor 파일 업로드
Route::post('ck_file_upload', [CKEditorController::class, 'ckFileUpload'])->name('ck_file_upload');

// YouTube API
Route::group(['prefix'=>'youtube', 'as'=>'youtube.'], function() {

    //oauth 로그인
    Route::get('oauthcheck', [YouTubeAPIController::class, 'oauthCheck'])->name('oauthcheck');

    //유튜브 회원가입
    Route::get('signup_youtube', [YouTubeAPIController::class, 'signupYoutube'])->name('signup_youtube');

    //유튜브 회원 로그인
    Route::get('signin_youtube', [YouTubeAPIController::class, 'signinYoutube'])->name('signin_youtube');

});

// 테스트...
// 인증
Route::group(['prefix'=>'auth', 'as'=>'auth.'], function() {
    Route::get('google_redirect', [TestController::class, 'googleRedirect'])->name('google_redirect');
    Route::get('google_callback', [TestController::class, 'googleCallback'])->name('google_callback');
});

// 테스트
Route::group(['prefix'=>'test', 'as'=>'test.'], function() {
    Route::get('', function () {
        return view('test.test_main');
    });

    Route::post('select_data', [TestController::class, 'selectData'])->name('select_data');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// TEST 정부장
Route::prefix('doadm')->group(function () {
    Route::get('notice', 'NoticeController@index'); // notice.index
    Route::get('notice/post', 'NoticeController@post'); // notice.post
    Route::get('notice/{post}', 'NoticeController@read')->where(['post' => '[0-9]+']); // notice.read
    Route::get('notice/{post}/edit', 'NoticeController@modify'); // notice.modify
    Route::get('notice/{post}/delete', 'NoticeController@delete'); // notice.delete
    Route::get('notice/{post}/reply', 'NoticeController@reply'); // notice.delete
    Route::post('notice', 'NoticeController@save'); // notice.save
});
