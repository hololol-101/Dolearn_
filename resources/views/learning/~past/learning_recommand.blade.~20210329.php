<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210120 | @m | 요구반영. 결함개선. 고도화.
 * ~20210125 | @m |
 */
-->
@extends('master_learning')

@section('title', '강좌학습 - 추천 영상')

@section('content')

<? $d1n = '6'; // 1차활성 ?>

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
	<h2 class="h1">추천 영상</h2>
	<a href="?#★" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


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


</div>
<!-- /aside_content -->
</div>
<!-- /#aside -->
@endsection
