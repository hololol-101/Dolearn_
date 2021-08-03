@php
$role = isset(Auth::user()->role) ? Auth::user()->role : '';
$popup = isset($_GET['isPopup']) ? $_GET['isPopup'] : 'fail';
@endphp

@extends('master')

@section('title', '메인')

@section('content')
<!-- 공통(로그인 전) : 두런 소개 배너 -->
@include('main.inc_intro')


<!-- #body -->
<div id="body" tabindex="-1">

<!-- ◇◆ mainbody1 ◇◆◇◆◇◆◇◆◇◆ -->
<div id="mainbody1">
<!-- container -->
<div class="container clearfix">

<!-- 공통(로그인 전) : 검색 -->
@include('main.inc_search_main')
</div>
<!-- /container -->
</div>

<!-- /mainbody1 -->

@if (Auth::user())

    <!-- ◇◆ mainbody2 ◇◆◇◆◇◆◇◆◇◆ -->
    <div id="mainbody2">
    <!-- container -->
    <div class="container clearfix">

    @if ($role == 'student')
        @if (count($learningLectureList) > 0)
            <!-- 학생 : 현재 수강중인 강좌 -->
            @include('main.inc_learning_lecture')

            <!-- 학생 : 내가 수강중인 강좌와 비슷한 -->
            @include('main.inc_similar_my_lecture')

        <!-- 학생 : 수강중인 강좌 없을 경우 출력 -->
        @else
            <!-- fcard2 -->
            <div id="fcard2">
                <div class="wrap1">
                    <div class="hg1">
                        <div class="w1 toggle1s1">
                            <h3 class="h1">현재 수강중인 강좌</h3>
                            <a class="sw1 switch">
                                <span class="t1">비슷한 강좌 추천받기</span>
                                <span class="t2 sw-on">ON</span>
                                <span class="t2 sw-off">OFF</span>
                                <i class="ic1"></i>
                            </a>
                        </div>
                        <a href="javascript:void(0);" class="more"><span class="t1">전체보기</span></a>
                    </div>

                    <!-- fcard2off1 -->
                    <div id="fcard2off1">
                        <a href="{{ route('sub.lecture.lecture_list') }}" class="a1">
                            <div class="tc1">
                                <span class="t1">다양한 강좌를 만나보세요!</span>
                                <i class="ic1"></i>
                            </div>
                        </a>
                    </div>
                    <!-- /fcard2off1 -->
                </div>
            </div>
            <!-- /fcard2 -->
        @endif

    @endif

    @if ($role == 'instructor')
            <!-- 강사 : 현재 운영중인 강좌 -->
            @include('main.inc_operating_lecture')
            @if (count($operatingLectureList) > 0)
            <!-- 강사 : 내가 운영중인 강좌와 비슷한 -->
            @include('main.inc_similar_my_operating_lecture')
            @endif

    @endif

    @if ($role == 'youtuber')
        @if (count($addRecentVideoList) > 0)
            <!-- 유튜버 : 최근 추가된 내 영상 -->
            @include('main.inc_add_recent_video')
        @endif
    @endif

    </div>
    <!-- /container -->
    </div>
    <!-- /mainbody2 -->

    <!-- ◇◆ mainbody3 ◇◆◇◆◇◆◇◆◇◆ -->
    <div id="mainbody3">
    <!-- container -->
    <div class="container clearfix">
    <!-- 공통(로그인 후) : 내 관심 분야 -->
    @include('main.inc_my_interest_field')

    @if ($interest_arr!=[])
        <!-- 공통(로그인 후) : 인기 강좌 -->
        @include('main.inc_popular_lecture')

        <!-- 공통(로그인 후) : 신규 강좌 -->
        @include('main.inc_new_lecture')

        <!-- 공통(로그인 후) : AI 추천 강좌 -->
        @include('main.inc_ai_recommand_lecture')

    @endif


    </div>
    <!-- /container -->
    </div>
    <!-- /mainbody3 -->
@endif

<!-- ◇◆ mainbody4 ◇◆◇◆◇◆◇◆◇◆ -->
<div id="mainbody4">
<!-- container -->
<div class="container clearfix">

<!-- 공통(로그인 전) : 지금 뜨는 강사 TOP 10 -->
@include('main.inc_instructor_top10')

</div>
<!-- /container -->
</div>
<!-- /mainbody4 -->

<!-- ◇◆ mainbody5 ◇◆◇◆◇◆◇◆◇◆ -->
<div id="mainbody5">
<!-- container -->
<div class="container clearfix">

<!-- 공통(로그인 전) : 지금 핫한 강좌 TOP 10 -->
@include('main.inc_lecture_top10')

</div>
<!-- /container -->
</div>
<!-- /mainbody5 -->

<!-- ◇◆ mainbody6 ◇◆◇◆◇◆◇◆◇◆ -->
<div id="mainbody6">
<!-- container -->
<div class="container clearfix">

<!-- 공통(로그인 전) : 최신 트렌드 AI 분석 -->
@include('main.inc_latest_trend')

</div>
<!-- /container -->
</div>
<!-- /mainbody6 -->

<!-- /◇◆ mainbody1~* ◇◆◇◆◇◆◇◆◇◆ -->

</div>
<!-- /#body -->

@endsection
