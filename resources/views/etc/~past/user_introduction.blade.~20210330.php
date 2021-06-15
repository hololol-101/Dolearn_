<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210323 | @m | 요구반영. 결함개선. 고도화.
 * ~20210324 | @m |
 */
-->
@php
$user = isset($_GET['user']) ? $_GET['user'] : '';
$title = '';

if ($user == 'instructor') {
    $title = '강사 소개';
} else if ($user == 'youtuber') {
    $title = '유튜브 채널 소개';
}
@endphp

@extends('master_sub')

@section('title', $title)

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- width2wrap1 -->
<div class="width2wrap1 bgc2">
<!-- container -->
<div class="container clearfix">


	<!-- cp1who1 -->
	<div class="cp1who1">
		<div class="w1">
			<div class="w1w1">
				<div class="f1">
					<span class="f1p1">
						<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
						<img src="{{ asset('assets/images/lib/noimg1face1d800.png') }}" alt="이미지 없음" />
					</span>
				</div>
				<a href="{{ route('etc.propose', ['name'=>'테스터']) }}" class="b1 button block">제안하기</a>
			</div>
			<div class="w1w2">
				<div class="tg1">
					<strong class="t1">@if($user == 'instructor') 강사 이름 @elseif ($user == 'youtuber') 유튜버 이름 @endif</strong>
				</div>
				<div class="tg2">
                    @if ($user == 'instructor')
					강사의 경력 및 자기소개가 표시됩니다.<br />
                    @elseif ($user == 'youtuber')
                    유튜버 채널소개가 표시 됩니다.<br />
					좌측 제안하기 버튼은 유튜버가 두런에 가입을 하고 인증을 받으면 활성화 됩니다.<br />
                    @endif
					<div class="t2">학력 및 활동</div>
					<ul class="bu">
					<li>빅데이터 / AI 기업 강의</li>
					<li>삼성전자 삼성 SDS, LG CNS, SKT 외 다수</li>
					<li>빅데이터 및 데이터 분석 프로젝트( 외환은행, 신한은행, CJ, LS산정 외 다수)</li>
					<li>빅데이터 활용 창업 강좌 및 멘토링( 연세대, 선균관대, 동국대, 아주대 외 다수)</li>
					<li>빅데이터 전문가 협회 정회원</li>
					<li>중소기업청, 창조경제타운 심사 평가단</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- /cp1who1 -->


</div>
<!-- /container -->
</div>
<!-- /width2wrap1 -->


<!-- cp1dash2info1 type3 -->
<div class="cp1dash2info1 type3">
	<div class="hg1">
		<h3 class="h1"><span class="h1t1">@if ($user == 'instructor') 강사정보 @elseif($user == 'youtuber') 유튜버정보 @endif</span><i class="h1ic1"></i></h3>
	</div>
	<div class="cont">
		<div class="item">
			<strong class="t1">
				<span class="vat">12</span>
			</strong>
			<span class="t2">
				@if ($user == 'instructor') 강좌 수 @elseif($user == 'youtuber') 영상 수 @endif
			</span>
		</div>
		<div class="item">
			<strong class="t1">
				<span class="vat">1,001</span>
			</strong>
			<span class="t2">
				@if ($user == 'instructor') 수강생 수 @elseif($user == 'youtuber') 강좌 적용 횟수 @endif
			</span>
		</div>
		<div class="item">
			<strong class="t1">
				<span class="vat">@if ($user == 'instructor') 4.21 @elseif($user == 'youtuber') 1만 @endif</span>
			</strong>
			<span class="t2">
				@if ($user == 'instructor') 총 평점 @elseif($user == 'youtuber') 조회수 @endif
			</span>
		</div>
		<div class="item">
            @if ($user == 'instructor')
			<strong class="t1">70%</strong>
			<span class="t2">
				<span class="vam">응답률</span>
				<span class="bi1 dpib fsS1 vam">
					<a href="#?" class="li1 tooltip1 rt">
						<span class="tooltip1c" style="width:17em;">
							수강생의 질문에 응답한 비율 입니다.
						</span>
					</a>
				</span>
			</span>
            @elseif($user == 'youtuber')
            <strong class="t1">100</strong>
			<span class="t2">
				좋아요 수
			</span>
            @endif
		</div>
	</div>
</div>
<!-- /cp1dash2info1 type3 -->

@if ($user == 'instructor')

<!-- cp1fcard1 -->
<div class="cp1fcard1">
<div class="wrap1">
	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234">
        {{-- TODO: loop --}}
		<div class="item column">
			<div class="w1">
				<a href="{{ route('sub.lecture.lecture_detail', ['idx'=>'1']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p301.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 실무까지 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="ratings">
						<strong class="t1 blind">별점</strong>
						<i class="star5rating1">
							<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
							<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
						</i>
						<span class="t2">
							<span class="t2t1">평점</span>
							<span class="t2t2">3.5</span>
						</span>
					</div>
					<div class="tg2">
						<span class="t2">
							<span class="t2t1">데이터에듀</span> <span class="t2t2">· 수강생 1800명</span>
						</span>
						<span class="t3">
							<span class="t3t1">무료</span>
						</span>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /lst1 -->
</div>
</div>
<!-- /cp1fcard1 -->

@elseif ($user == 'youtuber')

<!-- cp1fcard3 -->
<div class="cp1fcard3">
<div class="wrap1">
    <!-- lst1 -->
    <div class="lst1 even-grid evenmix-234">
        {{-- TODO: loop --}}
        <div class="item column">
            <div class="w1">
                <a href="?#★" class="a1">
                    <div class="f1">
                        <span class="f1p1">
                            <img src="{{ asset('assets/images/main/x1/x1p301.jpg') }}" alt="★대체텍스트필수" />
                        </span>
                        <i class="ic1 play">Play</i>
                    </div>
                    <div class="tg1">
                        <strong class="t1">엑셀 올인원! 엑셀 기초부터 실무까지 일이삼사오륙칠팔구십</strong>
                    </div>
                    <div class="tg2">
                        <span class="t2">데이터에듀</span>
                        <span class="t3">조회수 1800회</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /lst1 -->
</div>
</div>
<!-- /cp1fcard3 -->
@endif

</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
