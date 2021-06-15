<!-- fcard8 -->
<div id="fcard8">
<div class="wrap1">
    <div class="hg1">
        <h3 class="h1">최근 추가된 내 영상</h3>
        <a href="{{ route('sub.video.video_list') }}" class="more"><span class="t1">전체보기</span></a>
    </div>
    <div class="mControl">
        <button type="button" class="m prev"><i class="ic1"></i><span class="blind">최근 추가된 내 영상. 이전 보기</span></button>
        <button type="button" class="m next"><i class="ic1"></i><span class="blind">최근 추가된 내 영상. 다음 보기</span></button>
    </div>
    <!-- owl-carousel -->
    <div class="owl-carousel owl-theme">
        @foreach ($addRecentVideoList as $addRecentVideo)
        <div class="item">
            <div class="w1">
                <a href="{{ route('sub.video.video_detail', ['uid' => $addRecentVideo->uid]) }}" class="a1">
                    <div class="f1">
                        <span class="f1p1">
                            <img src="https://img.youtube.com/vi/{{ $addRecentVideo->uid }}/mqdefault.jpg" alt="{{ $addRecentVideo->subject }}">
                        </span>
                        <i class="ic1 play">Play</i>
                    </div>
                    <div class="tg1">
                        <strong class="t1">{{ $addRecentVideo->subject }}</strong>
                    </div>
                    <div class="tg2">
                        <span class="t2">{{ $addRecentVideo->channel }}</span>
                        @php
                            $hitCnt = $addRecentVideo->hit_cnt
                        @endphp
                        <span class="t3">조회수 @if ($hitCnt >= 10000) {{ round(($hitCnt / 10000), 1) }}만 @else {{ $hitCnt }} @endif 회</span>
                    </div>
                </a>
                <!-- cp1menu5 -->
                <div class="cp1menu5 toggle1s1">
                    <strong><a href="#" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
                    <div class="cp1menu5c toggle-c">
                        <a href="#layer1confirm1approve1cancel1" class="b2 toggle" data-send-focus="that"><span class="b2t1">승인 취소하기</span></a>
                    </div>
                </div>
                <!-- /cp1menu5 -->
                <div class="btns">
                    <a href="{{ route('sub.video.video_detail', ['uid' => $addRecentVideo->uid]) }}" class="a2"><span class="a2t1">영상 바로보기</span></a>
                    <a href="{{ route('sub.lecture.lecture_detail', ['idx' => $addRecentVideo->lecture_idx]) }}" class="a2"><span class="a2t1">연관 강좌보기</span></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /owl-carousel -->
</div>
</div>
<!-- /fcard8 -->
<script>/*<![CDATA[*/
    $(function(){
        // 20210129
        $('#fcard8').jQmCarousel1({
            autoplay: false,
            autoplayTimeout: 6000,
            margin: 22,
            responsive: {
                000: { items: 2 },
                640: { items: 2 },
                960: { items: 3 },
                1260: { items: 4 }
            }
        });
    });
/*]]>*/</script>


<!-- (레이어팝업. 승인 취소 확인) -->
@include('manage.youtuber.inc_layer_confirm_delete_video')


<script>/*<![CDATA[*/
		$(function(){
			// 레이어팝업 템플릿 바로 확인
			//$('[href="#layer1confirm1approve1cancel1"]').first().triggerHandler('click');
		});
/*]]>*/</script>
