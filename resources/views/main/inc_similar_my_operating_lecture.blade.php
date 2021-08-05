<!-- fcard3-5 -->
<div id="fcard3-1">
<div class="wrap1">
    <div class="hg1">
        <h3 class="h1">내가 운영중인 강좌와 비슷한</h3>
        <span class="t1">
            {{-- <span class="t1t1">#엑셀</span>
            <span class="t1t1">#엑셀</span> --}}
        </span>
        {{-- <a href="{{ route('sub.lecture.lecture_list') }}" class="more"><span class="t1">더보기</span> <i class="ic1"></i></a> --}}
    </div>
    <div class="mControl">
        <button type="button" class="m prev"><i class="ic1"></i><span class="blind">현재 운영중인 강좌와 비슷한 강좌. 이전 보기</span></button>
        <button type="button" class="m next"><i class="ic1"></i><span class="blind">현재 운영중인 강좌와 비슷한 강좌. 다음 보기</span></button>
    </div>
    <!-- owl-carousel -->
    <div class="owl-carousel owl-theme">
        @foreach ($similarOperLecList as $similarOperLec)
        <div class="item">
            <div class="w1">
                <a href="{{ route('sub.lecture.lecture_detail', ['idx' => $similarOperLec->idx]) }}" class="a1">
                    <div class="f1">
                        <span class="f1p1">
                            @if ($similarOperLec->save_thumbnail != '')
                            <img src="{{ asset('storage/uploads/thumbnail/'.$similarOperLec->save_thumbnail) }}" alt="{{ $similarOperLec->title }}" />
                            @else
                            <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                            @endif
                        </span>
                        {{-- <i class="ic1 play">Play</i> --}}
                    </div>
                    <div class="tg1">
                        <strong class="t1">{{ $similarOperLec->title }}</strong>
                    </div>
                    <div class="ratings">
                        <strong class="t1 blind">별점</strong>
                        <i class="star5rating1">
                            <i class="st-on" style="width:{{ round($similarOperLec->rating * 20, 1) }}%;"><i class="ic1"></i></i><!-- (3.5/5) -->
                            <i class="st-off" style="width:100%;"><i class="ic2"></i></i><!-- (100-70) -->
                        </i>
                        <span class="t2">
                            <span class="t2t1">평점</span>
                            <span class="t2t2">{{ $similarOperLec->rating }}</span>
                            <span class="t2t3">· 수강생 {{ $similarOperLec->student_cnt }}명</span>
                        </span>
                    </div>
                    <div class="tg2">
                        <span class="t2">
                            <span class="t2t1">{{ $similarOperLec->owner_name }}</span>
                        </span>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /owl-carousel -->
</div>
</div>
<!-- /fcard3 -->
<script>/*<![CDATA[*/
    $(function(){
        // 20210102
        $('#fcard3-1').jQmCarousel1({
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
