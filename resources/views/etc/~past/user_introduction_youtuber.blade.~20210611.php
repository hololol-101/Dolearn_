<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210401 | @m | 요구반영. 결함개선. 고도화.
 * ~20210406 | @m |
 * 20210510 | @m |
 */
-->
@extends('master_sub')

@section('title', '유튜브 채널 소개')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1who1 -->
<div class="cp1who1">
	<div class="w1">
		<div class="w1w1">
			<div class="f1">
				<span class="f1p1">
					<!-- <img src="{{ asset('assets/images/lib/noimg1face1d800.png') }}" alt="이미지 없음" /> -->
					<img src="/_res/dolearn/img/lib/x4/x4p100.jpg" alt="MKTV 김미경 TV" />
				</span>
			</div>
		</div>
		<div class="w1w2">
			<div class="tg1">
				<strong class="t1">MKTV 김미경 TV</strong>
				<a href="https://www.youtube.com/user/artspeech0783" target="_blank" rel="noopener" title="유튜브 채널 [새 창]" class="b2 youtube">유튜브 채널</a>
			</div>
			<!-- <a href="#★" class="cp1switch1 switch toggle fw4"> -->
			<a class="cp1switch1 switch fw4">
				<span class="t1 sw-off">강사 소개 OFF</span>
				<span class="t1 sw-on">강사 소개 ON</span>
				<i class="ic1"></i>
			</a>
			<div class="tg2">
				<!-- 유튜버 채널소개가 표시 됩니다.<br />
				좌측 제안하기 버튼은 유튜버가 두런에 가입을 하고 인증을 받으면 활성화 됩니다.<br /> -->

				<div class="t2">학력 및 활동</div>
				<ul class="bu">
				<li>연세대학교 작곡과 학사</li>
				<li>이화여자대학교 대학원 음악학 석사</li>
				<li>더블유 인사이츠 대표, 아트스피치 원장, 김미경의 이클래스 대표 역임 중.</li>
				<li>tvN &lt;어쩌다 어른&gt;, JTBC &lt;김미경 전현무의 나만 그런가&gt; 등 다수의 방송 경력.</li>
				<li>&lt;김미경이 리부트&gt;, &lt;엄마의 자존감 공부&gt; 등 작품 활동 중.</li>
				<li>현재 MKTV 김미경 TV 유튜브 채널 운영 중.</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- /cp1who1 -->


<!-- cp1dash2info1 type3 -->
<div class="cp1dash2info1 type3 mgt25em">
	<div class="hg1">
		<h3 class="h1"><span class="h1t1">유튜버정보</span><i class="h1ic1"></i></h3>
	</div>
	<div class="cont">
		<div class="item">
			<strong class="t1">
				<span class="vat">4</span>
			</strong>
			<span class="t2">
				영상 수
			</span>
		</div>
		<div class="item">
			<strong class="t1">
				<span class="vat">1,001</span>
			</strong>
			<span class="t2">
				강좌 적용 횟수
			</span>
		</div>
		<div class="item">
			<strong class="t1">
				<span class="vat">1만</span>
			</strong>
			<span class="t2">
				조회수
			</span>
		</div>
		<div class="item">
            <strong class="t1">100</strong>
			<span class="t2">
				좋아요 수
			</span>
		</div>
	</div>
</div>
<!-- /cp1dash2info1 type3 -->


<!-- cp1tabs3 -->
<div id="cp1tabs3" class="cp1tabs3">
	<ul>
	<li class="m1 column"><a href="#cp1tabs3pane1"><span class="t1">채널 분석</span><i class="ic1"></i></a></li>
	<li class="m2 column"><a href="#cp1tabs3pane2"><span class="t1">동영상 분석</span><i class="ic1"></i></a></li>
	<li class="m3 column"><a href="#cp1tabs3pane3"><span class="t1">관련 채널 분석</span><i class="ic1"></i></a></li>
	</ul>
</div>
<!-- /cp1tabs3 -->


<!-- cp1tabs3cont -->
<div id="cp1tabs3cont" class="cp1tabs3cont">
<!-- cp1tabs3pane -->
<div id="cp1tabs3pane1" class="cp1tabs3pane">


	@include('etc.inc_youtuber_analysis_channel')


</div>
<!-- /cp1tabs3pane -->
<!-- cp1tabs3pane -->
<div id="cp1tabs3pane2" class="cp1tabs3pane">


	@include('etc.inc_youtuber_analysis_video')


</div>
<!-- /cp1tabs3pane -->
<!-- cp1tabs3pane -->
<div id="cp1tabs3pane3" class="cp1tabs3pane">


	@include('etc.inc_youtuber_analysis_relchannel')


</div>
<!-- /cp1tabs3pane -->
</div>
<!-- /cp1tabs3cont -->
<script>/*<![CDATA[*/
	// 20210405.
	makeShow('#cp1tabs3', '#cp1tabs3pane1');
	makeActive('#cp1tabs3', '.m1');

	// 20210405. 클릭한 탭도 보이도록 스크롤 @m
	$('#cp1tabs3 a').on('click', function(e){
		e.preventDefault();
		smoothScrollTop($(this).offset().top);
	});
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
