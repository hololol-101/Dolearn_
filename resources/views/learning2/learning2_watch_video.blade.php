@php
$timestamp = isset($_GET['timestamp']) ? $_GET['timestamp'] : '';
@endphp

<!-- cp4view1 -->
<div class="cp4view1">

	<div class="tg1">
		<strong class="t1">{{ $videoDetail->subject }}</strong>
	</div>

	<!-- w1video -->
	<div class="w1video">
		<div class="flex1wrap1">
            <iframe name="youtube_fr" id="display_fr" style="width:100%;height:100%;border:0;" src="https://www.youtube.com/embed/{{ $videoDetail->uid }}@if ($timestamp != '') ?autoplay=1&start={{ $timestamp }} @endif" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			{{-- <video class="video" controls="controls" poster="{{ asset('assets/images/lib/x2/x2p1001.jpg') }}" src="http://content.jwplatform.com/videos/HkauGhRi-640.mp4">
				<div class="alternativeContent">
					<p>Your browser does not support the video element.</p>
				</div>
			</video> --}}
			<!-- <i class="ic1 play">Play</i> -->
		</div>
	</div>
	<!-- /w1video -->

</div>
<!-- /cp4view1 -->


<!-- cp4view2 -->
<div class="cp4view2">
	<!-- even-grid -->
	<div class="even-grid float-left gap2pct">
		<div class="small-12 medium-6 column">

			<div class="fg1">
				<div class="fg1w1">
					<img src="{{ asset('assets/images/lib/x3/x3p301.jpg') }}" alt="★대체텍스트필수" class="w100 round">
				</div>
				<div class="fg1w2">
                    @php
                    $subscribers = $videoDetail->subscribers;
                    $hitCnt = $videoDetail->hit_cnt;
                    @endphp
					<span class="t1">{{ $videoDetail->channel }}</span>
					<span class="t2">구독자 수 @if ($subscribers >= 10000) {{ round(($subscribers / 10000), 1) }}만 @else {{ $subscribers }} @endif · 조회 수 @if ($hitCnt >= 10000) {{ round(($hitCnt / 10000), 1) }}만 @else {{ $hitCnt }} @endif</span>
				</div>
			</div>

		</div>
		<div class="small-12 medium-6 column tar">

            <div class="eg1">
				<a href="javascript:void(0);" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">{{ $videoDetail->like_cnt }}개</span></a>
				<a href="#layer1playlist1" class="toggle mgl1em fsS2 vam" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">+ 재생목록 <span class="blind">추가</span></span></a>
				<!-- cp1menu1 -->
				<div class="cp1menu1 toggle1s1 mgl1em">
					<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp1menu1c toggle-c">
						<a href="#layer1report1video1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
						<!-- <a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a> -->
					</div>
				</div>
				<!-- /cp1menu1 -->
			</div>

		</div>
	</div>
	<!-- /even-grid -->
</div>
<!-- /cp4view2 -->

<!-- (재생목록 레이어팝업) -->
@include('sub.video.inc_layer_playlist')

<!-- (신고하기 레이어팝업) -->
@include('sub.lecture.inc_layer_report_video')

{{-- TODO: 유튜브 영상 소개가 있는 경우만 출력 --}}
<!-- toggle1s2 cp4unfold1 -->
<div class="toggle1s2 cp4unfold1">
	<div class="toggle1s2-c">
		{{ $videoDetail->content }}
	</div>
	<a href="javascript:void(0);" class="b1 toggle1s2-b cp2switch2 type2 switch fsS3">
		<span class="cp1switch2-t1 sw-off">펼치기</span>
		<span class="cp1switch2-t1 sw-on">접기</span>
		<i class="ic1"></i>
	</a>
</div>
<!-- /toggle1s2 cp4unfold1 -->

<script>
$(function() {
    @if (Session::has('alert'))
    alert('{{ session()->get('alert') }}');
    return false;
    @endif

    // 20210521. 토글 버튼이 Ajax 로 불러와 기능이 안되서 지연 재호출
    setTimeout(function(){
        MJS.doToggle();
    }, 100);

    $('#video_id').val('{{ $videoDetail->uid }}');
})
</script>
