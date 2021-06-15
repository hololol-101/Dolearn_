<!-- fcard7 -->
<div id="fcard7">
<div class="wrap1">
    <div class="hg1">
        <div class="w1">
            <h3 class="h1"><span class="h1t1">최신트렌드</span> <span class="h1t2">AI분석</span></h3>
            <span class="t1">
                <span class="t1t1">#엑셀</span>
                <span class="t1t1">#PPT</span>
                <span class="t1t1">#코딩</span>
                <span class="t1t1">#파이썬</span>
                <span class="t1t1">#프로그램</span>
            </span>
        </div>
        <a href="{{ route('sub.video.video_list') }}" class="more"><span class="t1 blind">더보기</span> <i class="ic1"></i></a>
    </div>
    <div class="mControl">
        <button type="button" class="m prev"><i class="ic1"></i><span class="blind">최신트렌드 AI분석. 이전 보기</span></button>
        <button type="button" class="m next"><i class="ic1"></i><span class="blind">최신트렌드 AI분석. 다음 보기</span></button>
    </div>
    <!-- owl-carousel -->
    <div class="owl-carousel owl-theme">
        @if (isset($analysisVideoList))
        @foreach($analysisVideoList as $analysisVideo)
        <div class="item">
            <div class="w1">
                <a href="{{ route('sub.video.video_detail', ['uid' => $analysisVideo->uid]) }}" class="a1">
                    <div class="f1">
                        <span class="f1p1">
                            <img src="https://img.youtube.com/vi/{{ $analysisVideo->uid }}/mqdefault.jpg" alt="{{ $analysisVideo->subject }}">
                        </span>
                        <i class="ic1 play">Play</i>
                    </div>
                    <div class="w2">
                        <div class="tg1">
                            <strong class="t1">{{ $analysisVideo->subject }}</strong>
                        </div>
                        <div class="tg3">
							<span class="t3">{{ $analysisVideo->channel }}</span>
							<span class="t4">조회수 {{ $analysisVideo->hit_cnt }}회</span>
						</div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <!-- /owl-carousel -->
</div>
</div>
<!-- /fcard7 -->
<script>/*<![CDATA[*/
    $(function(){
        // 20210102
        $('#fcard7').jQmCarousel1({
            autoplay: false,
            autoplayTimeout: 6000,
            margin: 22,
            responsive: {
                000: { items: 2 },
                640: { items: 2 },
                960: { items: 3 }
            }
        });
    });
/*]]>*/</script>
