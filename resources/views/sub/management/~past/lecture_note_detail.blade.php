<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210205 | @m | 요구반영. 결함개선. 고도화.
 * ~20210208 | @m |
 */
-->
@extends('master_sub')

@section('title', '학습관리 - 강좌노트 상세')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1row1 -->
<div class="cp1row1">
	<div class="column1">
		<a href="javascript:history.back();" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
	</div>
	<div class="column2">
	</div>
</div>
<!-- /cp1row1 -->


<!-- cp1note1 -->
<div class="cp1note1">
	<div class="hg1">
		<h3 class="h1">강좌제목 : 업무가 3분컷!(엑셀편)</h3>
	</div>
	<ul class="lst1">
		<li class="li1">
			<div class="tt1">
				<span class="tt1t1">강의 제목이 표시됩니다.</span>
			</div>
			<div class="tg1">
				<a href="?#★" class="a1"><i class="a1ic1"></i> <span class="a1t1">02 : 22</span></a>
				<a href="?#★" class="b1 button ic1t1 small"><i class="ic1 download2"></i> <span class="t1">다운로드</span></a>
			</div>
			<div class="tg2">
				<div class="t2">
					숫자와 문자 셀을 세는 함수= COUNTA
				</div>
				<div class="eg1">
					<a href="#layer1note1edit1" class="a2 edit toggle" data-send-focus="that"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
					<a href="?#★" class="a2 del"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="tt1">
				<span class="tt1t1">강의 제목이 표시됩니다.</span>
			</div>
			<div class="tg1">
				<a href="?#★" class="a1"><i class="a1ic1"></i> <span class="a1t1">02 : 22</span></a>
				<a href="?#★" class="b1 button ic1t1 small"><i class="ic1 download2"></i> <span class="t1">다운로드</span></a>
			</div>
			<div class="tg2">
				<div class="t2">
					선생님~~ 제가 지금 3.9버전을 쓰는데 background = pygame.image.load("C:/Users/leeha/Desktop/라고 적었는데 안되요ㅠㅠ 어떻게 해야 하나요
				</div>
				<div class="eg1">
					<a href="#layer1note1edit1" class="a2 edit toggle" data-send-focus="that"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
					<a href="?#★" class="a2 del"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="tt1">
				<span class="tt1t1">강의 제목이 표시됩니다.</span>
			</div>
			<div class="tg1">
				<a href="?#★" class="a1"><i class="a1ic1"></i> <span class="a1t1">02 : 22</span></a>
				<a href="?#★" class="b1 button ic1t1 small"><i class="ic1 download2"></i> <span class="t1">다운로드</span></a>
			</div>
			<div class="tg2">
				<div class="t2">
					일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				</div>
				<div class="eg1">
					<a href="#layer1note1edit1" class="a2 edit toggle" data-send-focus="that"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
					<a href="?#★" class="a2 del"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
				</div>
			</div>
		</li>
	</ul>
</div>
<!-- /cp1note1 -->


<!-- (레이어팝업.강좌노트수정) -->
@include('sub.management.inc_layer_note_modify')

<script>/*<![CDATA[*/
		$(function(){
			// 레이어팝업 템플릿 바로 확인
			//$('[href="#layer1note1edit1"]').first().triggerHandler('click');
		});
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
