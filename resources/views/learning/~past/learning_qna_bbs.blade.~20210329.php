<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210120 | @m | 요구반영. 결함개선. 고도화.
 * ~20210125 | @m |
 */
-->
@extends('master_learning')

@section('title', '강좌학습 - 질문 게시판')

@section('content')

<? $d1n = '5'; // 1차활성 ?>

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

@include('learning.inc_video')

</div>
<!-- /container -->
</div>
<!-- /#body -->
<!-- #aside -->
<div id="aside" tabindex="-1">
<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">질문 게시판</h2>
	<a href="#" class="a1">내 질문 모두보기</a>
	<a href="#" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- w1bottom2 -->
<div class="w1bottom2">


<!-- cp2search1 -->
<div class="cp2search1">
	<input type="text" value="" placeholder="검색어를 입력하세요." title="검색어" class="text">
	<button type="submit" class="button submit search"><i class="ic1"></i><span class="t1 blind">검색</span></button>
</div>
<!-- /cp2search1 -->


<!-- cp2qna1list1 -->
<div class="cp2qna1list1">
	<ul class="lst1">
		<li class="li1">
			<a href="{{ route('learning.qna_detail', ['id' => '']) }}" class="a1">
				<div class="tg1">
					<span class="t1">
						<i class="t1ic1 private">비공개</i>
						<span class="t1t1">Q.주석을 잘 달고 싶어요</span>
					</span>
					<span class="st1 s1">#미해결</span>
				</div>
				<div class="tg2">
					<span class="t2">
						김두런
					</span>
					<div class="eg1">
						<span class="t3">댓글 3</span>
						<span class="t3">좋아요 1</span>
					</div>
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="{{ route('learning.qna_detail', ['id' => '']) }}" class="a1">
				<div class="tg1">
					<span class="t1">
						<span class="t1t1">Q.일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</span>
					</span>
					<span class="st1 s1">#미해결</span>
				</div>
				<div class="tg2">
					<span class="t2">
						김두런
					</span>
					<div class="eg1">
						<span class="t3">댓글 3</span>
						<span class="t3">좋아요 1</span>
					</div>
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="{{ route('learning.qna_detail', ['id' => '']) }}" class="a1">
				<div class="tg1">
					<span class="t1">
						<span class="t1t1">Q.주석을 잘 달고 싶어요</span>
					</span>
					<span class="st1 s2">#해결</span>
				</div>
				<div class="tg2">
					<span class="t2">
						김두런
					</span>
					<div class="eg1">
						<span class="t3">댓글 3</span>
						<span class="t3">좋아요 1</span>
					</div>
				</div>
			</a>
		</li>
	</ul>
</div>
<!-- /cp2qna1list1 -->


<!-- cp2btns1 -->
<div class="cp2btns1">
	<a href="{{ route('learning.qna_write') }}" class="button primary ic1t1 w12em"><i class="ic1 write"></i> <span class="t1">새 질문 작성</span></a>
</div>
<!-- /cp2btns1 -->


</div>
<!-- /w1bottom2 -->


</div>
<!-- /aside_content -->
</div>
<!-- /#aside -->

@endsection
