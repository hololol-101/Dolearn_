<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">추천 영상</h2>
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">

@if (count($recommandVideoList) > 0)
    @foreach ($recommandVideoList as $recommandVideo)
    <!-- cp2video1 -->
    <div class="cp2video1 mgb1em">
        <div class="flex1wrap1">
            <iframe name="youtube_fr" id="display_fr" width="100%" height="100%" src="https://www.youtube.com/embed/{{ $recommandVideo->uid }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="tar">
            {{-- <a href="#layer1playlist1" class="button primary small fsS1 toggle" data-send-focus="that">+ 재생목록</a> --}}
            <a href="#layer1playlist1" class="button primary small fsS1 toggle" data-send-focus="that">+ 재생목록</a>
        </div>
    </div>
    <!-- /cp2video1 -->
    @endforeach
@else
<span>추천 영상 정보가 없습니다.</span>
@endif

</div>
<!-- /aside_content -->

<!-- (레이어팝업) -->
@include('sub.video.inc_layer_playlist')
