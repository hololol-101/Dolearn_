<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210120 | @m | 요구반영. 결함개선. 고도화.
 * ~20210122 | @m |
 */
-->
@extends('master_learning')

@section('title', '강좌학습 - 영상 노트 (노트수정)')

@section('content')

<? $d1n = '4'; // 1차활성 ?>

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
	<h2 class="h1">영상 노트</h2>
	<a href="#" class="a1">내 노트 모두보기</a>
	<a href="#" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- w1bottom1 -->
<div class="w1bottom1">


<!-- cp2lecture1note1 -->
<div class="cp2lecture1note1">
	<div class="tg1">
		<span class="t1"><i class="t1ic1"></i> <span class="t1t1">02 : 22</span></span>
	</div>
	<div class="tg2">
		<textarea class="textarea" title="영상 노트 수정">숫자와 문자 셀을 세는 함수= COUNTA</textarea>
		<div class="eg1">
			<a href="?#★" class="a2 cancel"><i class="a2ic1"></i> <span class="a2t1">취소</span></a>
			<a href="?#★" class="a2 submit"><i class="a2ic1"></i> <span class="a2t1">저장</span></a>
		</div>
	</div>
</div>
<!-- /cp2lecture1note1 -->


<!-- cp2lecture1note1 -->
<div class="cp2lecture1note1">
	<div class="tg1">
		<span class="t1"><i class="t1ic1"></i> <span class="t1t1">02 : 22</span></span>
	</div>
	<div class="tg2">
		<div class="t2">
			일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
			일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔
		</div>
		<div class="eg1">
			<a href="?#★" class="a2 edit"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
			<a href="?#★" class="a2 del"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
		</div>
	</div>
</div>
<!-- /cp2lecture1note1 -->


<!-- cp2write1 -->
<div class="cp2write1">
	<div class="editor">
		<div class="mgt3em mgb3em tac">개발자 온라인 웹문서 편집기 처리 필요!</div>
	</div>
	<div class="btns">
		<button type="submit" class="button submit">등록하기</button>
	</div>
</div>
<!-- /cp2write1 -->


</div>
<!-- /w1bottom1 -->


</div>
<!-- /aside_content -->
</div>
<!-- /#aside -->

@endsection
