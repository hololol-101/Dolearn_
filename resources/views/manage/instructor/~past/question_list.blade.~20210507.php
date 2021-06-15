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
				<i class="sep">|</i>
				<a href="#" class="a1"><i class="t1">질문리스트</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

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
