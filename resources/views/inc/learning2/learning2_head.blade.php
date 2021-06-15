@php
    $commonPath = '/_res/dolearn';
    $sitePath = '/_res/learn2';
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


<h1 class="blind">영상 학습</h1>


<!-- gn1 -->
<div id="gn1">
	<a href="{{ route('sub.video.video_detail', ['uid'=>$_GET['uid']]) }}" class="a1" title="영상 상세로 이동"><span class="ic1"></span> <span class="t1">영상 정보</span></a>
</div>
<!-- /gn1 -->


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
	<!-- d1 -->
	<div class="d1">
		<ul>
		<li class="m1">
			<a href="javascript:void(0);" class="a1" onclick="onClickTab('caption', '.m1')"><span class="t1">자막</span></a>
		</li>
		<li class="m2">
			<a href="javascript:void(0);" class="a1" onclick="onClickTab('search', '.m2')"><span class="t1">내용 검색</span></a>
		</li>
		<li class="m3">
			<a href="javascript:void(0);" class="a1" onclick="onClickTab('note', '.m3')"><span class="t1">영상 노트</span></a>
		</li>
		</ul>
	</div>
	<!-- /d1 -->
</div>
<!-- /tnb1 -->


</div>
<!-- /container -->
</div>
<!-- /#head_s2 -->
</div><hr class="dpn" />
<!-- /#head -->
