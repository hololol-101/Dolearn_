@php
$timestamp = isset($_GET['timestamp']) ? $_GET['timestamp'] : '';
@endphp

<!-- cp2view1 -->
<div class="cp2view1">

	<div class="tg1">
		<strong class="t1">{{ $lectureDetail->subject }}</strong>
	</div>
	<div class="tg2">
		<div class="t2">

            {{-- 강사 한마디가 있는 경우만 출력 --}}
            @if ($lectureDetail->comment != '')
			<!-- toggle1s2 cp4unfold1 -->
			<div class="toggle1s2 cp4unfold1">
				<div class="toggle1s2-c">
					{{ $lectureDetail->comment }}
				</div>
				<a href="javascript:void(0);" class="b1 toggle1s2-b cp2switch2 type2 switch fsS4">
					<span class="cp1switch2-t1 sw-off">펼치기</span>
					<span class="cp1switch2-t1 sw-on">접기</span>
					<i class="ic1"></i>
				</a>
			</div>
			<!-- /toggle1s2 cp4unfold1 -->
            @endif

		</div>
	</div>

	<!-- w1video -->
	<div class="w1video">
		<div class="flex1wrap1" id="my_ytplayer">
            <iframe name="youtube_fr" id="display_fr" style="width:100%;height:100%;border:0;" src="https://www.youtube.com/embed/{{ $lectureDetail->video_id }}@if ($timestamp != '') ?autoplay=1&start={{ $timestamp }} @endif" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<!-- <i class="ic1 play">Play</i> -->
		</div>
	</div>
	<!-- /w1video -->

</div>
<!-- /cp2view1 -->


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
                    $subscribers = $lectureDetail->subscribers;
                    $hitCnt = $lectureDetail->hit_cnt;
                    @endphp
					<span class="t1">{{ $lectureDetail->channel }}</span>
					<span class="t2">구독자 수 @if ($subscribers >= 10000) {{ round(($subscribers / 10000), 1) }}만 @else {{ $subscribers }} @endif · 조회 수 @if ($hitCnt >= 10000) {{ round(($hitCnt / 10000), 1) }}만 @else {{ $hitCnt }} @endif</span>
				</div>
			</div>

		</div>
		<div class="small-12 medium-6 column tar">

			<div class="eg1">
				<a href="javascript:void(0);" class="cp2like1"><span class="cp2like1t1">좋아요</span> <span class="cp2like1t2">{{ $lectureDetail->like_cnt }}개</span></a>
				<!-- <a href="#layer1playlist1" class="toggle mgl1em fsS2 vam" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">+ 재생목록 <span class="blind">추가</span></span></a> -->
				<!-- cp2menu1 -->
				<div class="cp2menu1 toggle1s1 mgl1em">
					<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp2menu1c toggle-c">
						<a href="#layer1report1video1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
						<!-- <a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a> -->
					</div>
				</div>
				<!-- /cp2menu1 -->
			</div>

		</div>
	</div>
	<!-- /even-grid -->
</div>
<!-- /cp4view2 -->

<!-- (신고하기 레이어팝업) -->
@include('sub.video.inc_layer_report_video')

{{-- TODO: 유튜브 영상 소개가 있는 경우만 출력 --}}
<!-- toggle1s2 cp4unfold1 -->
<div class="toggle1s2 cp4unfold1">
	<div class="toggle1s2-c">
		{{ $lectureDetail->content }}
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
    // controller 에서 첫 번째, 마지막 영상 체크 후 session name => alert 로 저장 후 리턴
    @if (Session::has('alert'))
    alert('{{ session()->get('alert') }}');
    return false;
    @endif

    // video id 값이 변경될 때마다 input hidden type 에 id 값 저장
    $('#video_id').val('{{ $lectureDetail->video_id }}');
});

// 이전/다음 강의로 이동
function moveNextVideo(step) {
    $('#watch_video').load('/learning/move_next_video?idx=<?= $_GET['idx'] ?>&step=' + step + '&cur_video_id={{ $lectureDetail->video_id }}');

    setTimeout(function(){
        makeActive2ClickHover2('#tnb1', {onFilter: '.m1'}); // 주메뉴 동작 호출 1차 활성
        $('#aside').load('/learning/index?idx=<?= $_GET['idx'] ?>');
    }, 100);

    // 20210521. 토글 버튼이 Ajax 로 불러와 기능이 안되서 지연 재호출
    setTimeout(function(){
        MJS.doToggle();
    }, 100);
}

// var player;

// function onYouTubePlayerAPIReady() {
//     try {
//         player = new YT.Player('my_ytplayer', {
//             height: '100%',
//             width: '100%',
//             videoId: '{{ $lectureDetail->video_id }}',
//             events: {
//                 'onReady': onPlayerReady,
//                 'onStateChange': onPlayerStateChange
//             }
//         });

//     } catch (e) {}
// }

// function onPlayerReady(event) {

// 	//유튜브 플레이어가 다 만들어지면 호출됨
//     // 총 재생 시간
//     console.log(player.getDuration());
// }

// function onPlayerStateChange(event) {

//     // 현재 시간
//     console.log(player.getCurrentTime());

//     if (event.data === 0) {
//         alert('영상 종료');
//     }
// }
</script>
