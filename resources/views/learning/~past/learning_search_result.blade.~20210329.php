<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210120 | @m | 요구반영. 결함개선. 고도화.
 * ~20210122 | @m |
 */
-->
@extends('master_learning')

@section('title', '강좌학습 - 검색결과')

@section('content')

<? $d1n = '3'; // 1차활성 ?>

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
	<h2 class="h1">내용 검색</h2>
	<a href="?#★" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- cp2search1 -->
<div class="cp2search1 mgb1em">
	<input type="text" value="수식을 복사해서" placeholder="검색어를 입력하세요." title="검색어" class="text">
	<button type="submit" class="button submit search" id="searchBtn"><i class="ic1"></i><span class="t1 blind">검색</span></button>
</div>
<!-- /cp2search1 -->


<!-- cp2video1 -->
<div class="cp2video1 mgb1em">
	<div class="flex1wrap1">
		<video class="video" controls="controls" src="http://content.jwplatform.com/videos/HkauGhRi-640.mp4">
			<div class="alternativeContent">
				<p>Your browser does not support the video element.</p>
			</div>
		</video>
	</div>
</div>
<!-- /cp2video1 -->
<!-- cp2video1 -->
<div class="cp2video1 mgb1em">
	<div class="flex1wrap1">
		<video class="video" controls="controls" poster="{{ asset('assets/images/lib/x2/x2p1001.jpg') }}" src="http://content.jwplatform.com/videos/HkauGhRi-640.mp4">
			<div class="alternativeContent">
				<p>Your browser does not support the video element.</p>
			</div>
		</video>
	</div>
</div>
<!-- /cp2video1 -->
<!-- cp2video1 -->
<div class="cp2video1 mgb1em">
	<div class="flex1wrap1">
		<video class="video" controls="controls" src="http://content.jwplatform.com/videos/HkauGhRi-640.mp4">
			<div class="alternativeContent">
				<p>Your browser does not support the video element.</p>
			</div>
		</video>
	</div>
</div>
<!-- /cp2video1 -->


</div>
<!-- /aside_content -->
</div>
<!-- /#aside -->
@endsection

@section('script')
<script>
$(function() {
    $('#searchBtn').click(function() {
        location.href='/learning/search_result';
    });
});
</script>
@endsection
