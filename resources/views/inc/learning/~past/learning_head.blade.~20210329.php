@php
    $commonPath = '/_res/dolearn';
    $sitePath = '/_res/learn';
@endphp

<div id="skipnav">
	<ul>
	<li><a href="#body">본문 바로가기</a></li>
	</ul>
</div><hr class="dpn" />


<!-- #container -->
<div id="container" tabindex="-1">
<noscript><p class="noscript">JavaScript has been disabled. This site requires JavaScript for full functionality, please enable.</p></noscript>


<!-- #head -->
<div id="head" class="init">
<!-- #head_s1 -->
<div id="head_s1" class="clearfix">
<!-- container -->
<div class="container">


<h1 class="blind">강좌 학습</h1>


<!-- gn1 -->
<div id="gn1">
	<a href="{{ route('sub.management.learning_lecture_list') }}" class="a1" title="강좌 상세로 이동"><span class="ic1"></span> <span class="t1">강좌로 이동</span></a>
</div>
<!-- /gn1 -->


<!-- gn2 -->
<div id="gn2">
	<a href="?#★" class="a1 prev"><span class="ic1"></span> <span class="t1">이전 강의</span></a>
	<a href="?#★" class="a1 next"><span class="t1">다음 강의</span> <span class="ic1"></span></a>
</div>
<!-- /gn2 -->


<!-- gn3 -->
<div id="gn3">
	<span class="page" title="현재강의/전체강의">
		<span class="t1 on">1</span><i class="sep">/</i><span class="t1 total">20</span>
	</span>
</div>
<!-- /gn3 -->


</div>
<!-- /container -->
</div>
<!-- /#head_s1 -->
<!-- #head_s2 -->
<div id="head_s2" class="clearfix">
<!-- container -->
<div class="container">


<!-- tnb1 [JS] -->
<div id="tnb1">
	<h3 class="blind">주 메뉴</h3>
	<strong class="h1"><a href="#tnb1c" class="b1 toggle"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">여닫기</span></a></strong>
	<!-- tnb1c -->
	<div id="tnb1c"><div class="bg"></div>
	<!-- cont -->
	<div class="cont"><div class="bg"></div>
		<!-- <a href="#tnb1c" class="b2 close"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">닫기</span></a> -->
		<!-- d1 -->
		<div class="d1">
            <!-- TODO:탭으로 화면 전환 시 비동기 처리 필요할 듯! -->
			<ul>
			<li class="m1">
				<a href="{{ route('learning.index') }}"><span class="t1">목차</span></a>
			</li>
			<li class="m2">
				<a href="{{ route('learning.aiqna') }}"><span class="t1">질의응답</span></a>
			</li>
			<li class="m3">
				<a href="{{ route('learning.search') }}"><span class="t1">내용검색</span></a>
			</li>
			<li class="m4">
				<a href="{{ route('learning.note') }}"><span class="t1">강좌 노트</span></a>
			</li>
			<li class="m5">
				<a href="{{ route('learning.qna_bbs') }}"><span class="t1">질문 게시판</span></a>
			</li>
			<li class="m6">
				<a href="{{ route('learning.recommand') }}"><span class="t1">추천 영상</span></a>
			</li>
			<li class="m7">
				<a href="{{ route('learning.purchase') }}"><span class="t1">구매하기</span></a>
			</li>
			</ul>
		</div>
		<!-- /d1 -->
		<!-- <a href="#tnb1c" class="b2 close"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">닫기</span></a> -->
	</div>
	<!-- /cont -->
	</div>
	<!-- /tnb1c -->
</div>
<!-- /tnb1 -->
<script>/*<![CDATA[*/
	$(function(){
		makeActive2ClickHover2('#tnb1', {onFilter: '.m<?=$d1n?>'}); // 주메뉴 동작 호출 1차 활성
	});
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /#head_s2 -->
</div><hr class="dpn" />
<!-- /#head -->
