<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">자막</h2>
	<a href="{{ route('learning.download_caption') }}" class="a2 download" title="자막 파일 다운로드"><span class="blind">자막 파일 다운로드</span></a>
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- cp1caption1 -->
<div class="cp1caption1">
<div class="wrap1">
	<div class="hg1">
		<strong class="blind">자막</strong>
	</div>
	<div class="cont fscroll1-xy" tabindex="0">
		<ul class="lst1">
            @foreach ($captionList as $caption)
            <li class="li1">
                <a href="javascript:void(0);" class="a1" onclick="onClickCaptionList('', '{{ $caption->timestamp }}')">
                    <div class="tg1">
                        @php
                            if (round($caption->timestamp) > 3600) {
                                $time = gmdate("H:i:s", round($caption->timestamp));
                            } else {
                                $time = gmdate("i:s", round($caption->timestamp));
                            }
                        @endphp
                        <span class="t1">{{ $time }}</span>
                    </div>
                    <div class="tg2">
                        <div class="t2">
                            {{ $caption->paragraph_text }}
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
		</ul>
	</div>
</div>
</div>
<!-- /cp1caption1 -->


</div>
<!-- /aside_content -->

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

function onClickCaptionList(videoId, timestamp) {
    var timestamp = Math.round(timestamp);

    $('.flex1wrap1').empty();
    $('.flex1wrap1').append('<iframe name="youtube_fr" id="display_fr" style="width:100%;height:100%;border:0;" src="https://www.youtube.com/embed/Brbh732_KLU?autoplay=1&start=' + timestamp + '" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    // $('#watch_video').load('/learning/watch_video?idx=<?= $_GET['idx'] ?>&video_id=Brbh732_KLU&timestamp=' + timestamp);
}
</script>
