<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210308 | @m | 요구반영. 결함개선. 고도화.
 * ~20210308 | @m |
 */
-->
@extends('master_sub')

@section('title', '강사 마이페이지 - 강좌관리 - 질문 리스트')

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
				<a href="#" class="a1"><i class="t1">강좌관리</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">질문리스트</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('manage.instructor.operation_lecture', ['role' => 'instructor']) }}">운영 강좌</a></li>
			<li class="on"><a href="{{ route('manage.instructor.question_list', ['role' => 'instructor']) }}">질문 리스트</a></li>
			<li><a href="{{ route('manage.instructor.review_list', ['role' => 'instructor']) }}">수강후기 리스트</a></li>
			<li><a href="{{ route('manage.instructor.income_info', ['role' => 'instructor']) }}">수익 내역</a></li>
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


<!-- cp1infomenu1 -->
<div class="cp1infomenu1">
	<div class="w1">
	</div>
	<div class="w2 mg0">

		<select title="선택옵션" class="select w100">
			<option value="">전체</option>
			<option value="">운영강좌 제목 01</option>
			<option value="">운영강좌 제목 02 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</option>
			<option value="">운영강좌 제목 03</option>
		</select>

	</div>
</div>
<!-- /cp1infomenu1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1bbs2list1 -->
<div class="cp1bbs2list1">
	<ul class="lst1">
		<li class="li1">
			<a href="?#★" class="w1 a1">
				<div class="w1w1">
					<div class="f1">
						<span class="f1p1">
							<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
							<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
						</span>
					</div>
				</div>
				<div class="w1w2">
					<div class="tt1">
						Q. 질문 제목이 표시됩니다.
					</div>
					<span class="st1 s1">#미해결</span>
					<!-- <span class="st1 s2">#해결</span> -->
					<div class="tg1">
						<span class="t1">김두런</span>
						<span class="t2">1달전</span>
					</div>
					<div class="tg2">
						<span class="t4">댓글 3개</span>
					</div>
				</div>
			</a>
			<div class="eg1">
				<a href="#★" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">0</span></a>
			</div>
		</li>
		<li class="li1">
			<a href="?#★" class="w1 a1">
				<div class="w1w1">
					<div class="f1">
						<span class="f1p1">
							<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
							<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
						</span>
					</div>
				</div>
				<div class="w1w2">
					<div class="tt1">
						Q. 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
					</div>
					<span class="st1 s2">#해결</span>
					<div class="tg1">
						<span class="t1">김두런</span>
						<span class="t2">1달전</span>
					</div>
					<div class="tg2">
						<span class="t4">댓글 3개</span>
					</div>
				</div>
			</a>
			<div class="eg1">
				<a href="#★" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">0</span></a>
			</div>
		</li>
	</ul>
</div>
<!-- /cp1bbs2list1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection
