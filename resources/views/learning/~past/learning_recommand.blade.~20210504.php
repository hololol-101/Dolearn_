<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">추천 영상</h2>
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
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
	<div class="tar">
		<a href="#layer1playlist1" class="button primary small fsS1 toggle" data-send-focus="that">+ 재생목록</a>
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
	<div class="tar">
		<a href="#layer1playlist1" class="button primary small fsS1 toggle" data-send-focus="that">+ 재생목록</a>
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
	<div class="tar">
		<a href="#layer1playlist1" class="button primary small fsS1 toggle" data-send-focus="that">+ 재생목록</a>
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
	<div class="tar">
		<a href="#layer1playlist1" class="button primary small fsS1 toggle" data-send-focus="that">+ 재생목록</a>
	</div>
</div>
<!-- /cp2video1 -->


</div>
<!-- /aside_content -->

<!-- (레이어팝업) -->
@include('sub.video.inc_layer_playlist')

<script>
$(function() {
    /** ◇◆ #aside 감춤 | 20210121. @m.
    */
    (function(){
        var $my = $('#tnb1');
        $my.$m = $('li', $my);

        $('#aside_head .close').on('click', function(e){
            e.preventDefault();
            $('html').addClass('hide-aside');
            $my.$m.filter('.on').removeClass('on');
        });
    })();
})
</script>
