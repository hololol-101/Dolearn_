<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210202 | @m | 요구반영. 결함개선. 고도화.
 * ~20210203 | @m |
 */
-->
@extends('master_sub')

@section('title', '대시보드 - 학생')

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
				<a href="javascript:void(0);" class="a1"><i class="t1">대시보드</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">대시보드</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.dashboard.dashboard_main', ['role' => 'student']) }}">대시보드</a></li>
			<li><a href="{{ route('sub.dashboard.my_notification_list') }}">내 알림</a></li>
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


<!-- even-grid -->
<div class="even-grid evenmix-12">
	<div class="column">
		<!-- cp1dash1info1 -->
		<div class="cp1dash1info1">
			<div class="hg1">
				<h3 class="h1">김두런님, 안녕하세요 :)</h3>
			</div>
			<div class="cont">
				<div class="item">
					<strong class="t1">09</strong>
					<span class="t2">수강강좌</span>
				</div>
				<div class="item">
					<strong class="t1">05</strong>
					<span class="t2">완료 강좌 수</span>
				</div>
				<div class="item">
					<strong class="t1">00</strong>
					<span class="t2">읽지 않은 알림</span>
				</div>
			</div>
		</div>
		<!-- /cp1dash1info1 -->
	</div>
	<div class="column">
		<!-- cp1dash1interest1 -->
		<div class="cp1dash1interest1">
			<div class="hg1">
				<h3 class="h1">관심분야</h3>
				<div class="mControl">
					<button type="button" class="m prev"><i class="ic1"></i><span class="t1 blind">관심분야 이전보기</span></button>
					<button type="button" class="m next"><i class="ic1"></i><span class="t1 blind">관심분야 다음보기</span></button>
				</div>
			</div>
			<div class="cont">
				<!-- cp1interest1 -->
				<div class="cp1interest1">
					<ul class="mls">
						<li class="m m1"><a class="a1"><i class="ic1"></i><span class="t1">웹개발</span></a></li>
						<li class="m m2"><a class="a1"><i class="ic1"></i><span class="t1">모바일개발</span></a></li>
						<li class="m m3"><a class="a1"><i class="ic1"></i><span class="t1">프로그래밍</span></a></li>
						<li class="m m4"><a class="a1"><i class="ic1"></i><span class="t1">데이터분석</span></a></li>
						<li class="m m5"><a class="a1"><i class="ic1"></i><span class="t1">인공지능</span></a></li>
						<li class="m m6"><a class="a1"><i class="ic1"></i><span class="t1">경영</span></a></li>
						<li class="m m7"><a class="a1"><i class="ic1"></i><span class="t1">법률</span></a></li>
						<li class="m m8"><a class="a1"><i class="ic1"></i><span class="t1">유아교육</span></a></li>
					</ul>
				</div>
				<!-- /cp1interest1 -->
			</div>
			<div class="fg1">
				<a href="?#" class="a2"><span class="a2t1">프로필설정 &gt;</span></a>
			</div>
		</div>
		<!-- /cp1dash1interest1 -->
		<script>/*<![CDATA[*/
			(function(){
				/** ◇◆ 단순이전다음. 20210203. @m.
				 */
				var $my = $('.cp1dash1interest1'),
					$prev = $('.mControl .prev', $my),
					$next = $('.mControl .next', $my),
					$v = $('.cp1interest1', $my); // 뷰
					$c = $('.cp1interest1 .mls', $my); // 콘텐츠
					// console.log($v.height());
				var endTop = 0; // 이동할높이값
				// 다음클릭
				$next.on('click', function(e){
					endTop -= $v.height();
					if( endTop <  $v.height() - $c.height() ){
						endTop = 0;
					}
					$c.css({	 top: endTop });
				});
				// 이전클릭
				$prev.on('click', function(e){
					endTop += $v.height();
					if( endTop > 0 ){
						endTop = $v.height() - $c.height();
					}
					$c.css({	 top: endTop });
				});
			})();
		/*]]>*/</script>
	</div>
	<div class="column">
		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 학습 강좌</h3>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1"><a href="#?" class="a1"><span class="t1">강좌제목 일이삼사오육칠팔구십</span> <span class="t2">3일전</span></a></li>
				</ul>
				<div class="gg1">
					<div class="t1">
						<span class="t1t1">진도율</span>
						<span class="t1t2">22강</span> <i class="sep">/</i> <span class="t1t3">30강</span>
						<span class="t1t4">75%</span>
					</div>
					<div class="g1">
						<i class="g1b1" style="width:75%;"></i>
					</div>
				</div>
			</div>
			<div class="fg1">
				<a href="{{ route('sub.management.learning_lecture_list') }}" class="a2"><span class="a2t1">내 모든강좌 &gt;</span></a>
				<a href="?#" class="a2 cvf"><span class="a2t1">이어서 학습하기 &gt;</span></a>
			</div>
		</div>
		<!-- /cp1dash1recent1 -->
	</div>
	<div class="column">
		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 시청 영상</h3>
				<a href="{{ route('sub.video.video_play_history') }}" class="a3"><span class="a3t1">내 시청기록 &gt;</span></a>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1"><a href="#?" class="a1"><span class="t1">자동 합계로 함수 쉽게 사용하는 방법</span> <span class="t2">방금</span></a></li>
					<li class="li1"><a href="#?" class="a1"><span class="t1">일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십</span> <span class="t2">2일전</span></a></li>
					<li class="li1"><a href="#?" class="a1"><span class="t1">일이삼사오육칠팔구십</span> <span class="t2">3일전</span></a></li>
				</ul>
			</div>
		</div>
		<!-- /cp1dash1recent1 -->
	</div>
	<div class="column">
		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 내 질문 (미해결)</h3>
				<a href="{{ route('sub.management.my_question') }}" class="a3"><span class="a3t1">전체보기 &gt;</span></a>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1"><a href="#?" class="a1"><span class="t1">Q. 질문제목 일이삼사오육칠팔구십?</span> <span class="t2">방금</span></a></li>
					<li class="li1"><a href="#?" class="a1"><span class="t1">Q. 질문제목 일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십</span> <span class="t2">방금</span></a></li>
					<li class="li1"><a href="#?" class="a1"><span class="t1">Q. 질문제목 일이삼사오육칠팔구십</span> <span class="t2">3일전</span></a></li>
				</ul>
			</div>
		</div>
		<!-- /cp1dash1recent1 -->
	</div>
	<div class="column">
		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 강좌 노트</h3>
				<a href="{{ route('sub.management.lecture_note_list') }}" class="a3"><span class="a3t1">전체보기 &gt;</span></a>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1"><a href="#?" class="a1"><span class="t1">강좌제목 일이삼사오육칠팔구십</span> <span class="t2">2일전</span></a></li>
					<li class="li1"><a href="#?" class="a1"><span class="t1">강좌제목 일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십</span> <span class="t2">2일전</span></a></li>
					<li class="li1"><a href="#?" class="a1"><span class="t1">강좌제목 일이삼사오육칠팔구십</span> <span class="t2">3일전</span></a></li>
					<li class="li1"><a href="#?" class="a1"><span class="t1">강좌제목 일이삼사오육칠팔구십</span> <span class="t2">3일전</span></a></li>
					<li class="li1"><a href="#?" class="a1"><span class="t1">강좌제목 일이삼사오육칠팔구십</span> <span class="t2">3일전</span></a></li>
				</ul>
			</div>
		</div>
		<!-- /cp1dash1recent1 -->
	</div>
</div>
<!-- /even-grid -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection
