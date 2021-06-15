<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210210 | @m | 요구반영. 결함개선. 고도화.
 * ~20210210 | @m |
 */
-->
@extends('master_sub')

@section('title', '계정 설정 - 알림 설정')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

@include('inc.common.inc_layer_sitemap')

<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="javascript:void(0);" class="a1"><i class="t1">계정 설정</i></a>
				<i class="sep">|</i>
				<a href="#" class="a1"><i class="t1">알림 설정</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

</div>
<!-- /body_title -->


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1notice1set1 -->
<div class="cp1notice1set1">
	<ul class="lst1">
	<li class="li1">
		<div class="w1">
			<b class="t1">두런 공지 알림</b>
			<div class="t2">
				인기&amp;신규 강좌에 대한 홍보 및 홈페이지 업데이트 알림을 메일로 받습니다.
			</div>
		</div>
		<div class="w2">
			<a href="?#★" class="cp1switch1 switch toggle fw4">
				<span class="t1 sw-off">OFF</span>
				<span class="t1 sw-on">ON</span>
				<i class="ic1"></i>
			</a>
		</div>
	</li>
	<li class="li1">
		<div class="w1">
			<b class="t1">학습 관리 알림</b>
			<div class="t2">
				내가 수강하는 강좌의 공지사항 및 내 활동에 대한 알림을 메일로 받습니다.
			</div>
		</div>
		<div class="w2">
			<a href="?#★" class="cp1switch1 switch toggle fw4 on">
				<span class="t1 sw-off">OFF</span>
				<span class="t1 sw-on">ON</span>
				<i class="ic1"></i>
			</a>
		</div>
	</li>

    <!-- TODO:로그인 유저 정보에서 role이 강사(instructor)인 경우에만 출력 -->
    @if (true)
    <li class="li1">
		<div class="w1">
			<b class="t1">강좌 관리 알림</b>
			<div class="t2">
				내가 개설한 강좌의 상태와 내 활동에 대한 알림을 메일로 받습니다.
			</div>
		</div>
		<div class="w2">
			<a href="?#★" class="cp1switch1 switch toggle fw4 on">
				<span class="t1 sw-off">OFF</span>
				<span class="t1 sw-on">ON</span>
				<i class="ic1"></i>
			</a>
		</div>
	</li>
    @endif

	</ul>
</div>
<!-- /cp1notice1set1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
