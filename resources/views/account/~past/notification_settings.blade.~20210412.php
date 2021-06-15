<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210210 | @m | 요구반영. 결함개선. 고도화.
 * ~20210210 | @m |
 * 20210406 | @m | 요구반영
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
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">알림 설정</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('account.profile_settings') }}">프로필 설정</a></li>
			<li><a href="{{ route('account.notification_settings') }}">알림 설정</a></li>
			</ul>
		</div>
		<!-- /lnb1c -->
	</div>
	<!-- lnb1 -->
	<script>/*<![CDATA[*/
		$(function(){
			/** ◇◆ 목록앵커 클릭하면 활성 메뉴를 제목에 표시. 링크 이동. 20210111. @m
			 */
			(function(){
				var $my = $('#lnb1'),
					$m = $('li>a[href]', $my);
				// 현재활성
				$m.each(function(){
					if( $(this).closest('li').is('.on') ){
						$('.h1 .t1', $my).text( $(this).text() );
					}
				});
				// 클릭
				$m.on('click', function(e){
					//e.preventDefault();
					$('.toggle', $my).triggerHandler('click'); // 토글 닫기
					$('.h1 .t1', $my).text( $(this).text() );
					return; // 링크 이동
				});
			})();
		});
	/*]]>*/</script>

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
