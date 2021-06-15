<!-- fcard5 -->
<div id="fcard5" class="fcard4">
<div class="wrap1">
    <div class="hg1">
        <div class="w1">
            <h3 class="h1">신규강좌</h3>
            <strong class="h2">#웹개발</strong>
        </div>
        <a href="{{ route('sub.lecture.lecture_list') }}" class="more"><span class="t1 blind">더보기</span> <i class="ic1"></i></a>
    </div>
    <div class="mControl">
        <button type="button" class="m prev"><i class="ic1"></i><span class="blind">신규강좌 #웹개발. 이전 보기</span></button>
        <button type="button" class="m next"><i class="ic1"></i><span class="blind">신규강좌 #웹개발. 다음 보기</span></button>
    </div>
    <!-- owl-carousel -->
    <div class="owl-carousel owl-theme">
        @if(isset($newLecList1))
        @foreach($newLecList1 as $newLec)
        <div class="item">
            <div class="w1">
                <a href="{{ route('sub.lecture.lecture_detail', ['idx' => $newLec->idx]) }}" class="a1">
                    <div class="f1">
                        <span class="f1p1">
                            @if ($newLec->save_thumbnail != '')
                            <img src="{{ asset('storage/uploads/thumbnail/'.$newLec->save_thumbnail) }}" alt="{{ $newLec->title }}" />
                            @else
                            <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                            @endif
                        </span>
                        <i class="ic1 play">Play</i>
                    </div>
                    <div class="tg1">
                        <strong class="t1">{{ $newLec->title }}</strong>
                    </div>
                    <div class="ratings">
                        <strong class="t1 blind">별점</strong>
                        <i class="star5rating1">
                            <i class="st-on" style="width:{{ ($newLec->rating / 5) * 100 }}%;"><i class="ic1"></i></i><!-- (3.5/5) -->
                            <i class="st-off" style="width:{{ 100 - (($newLec->rating / 5) * 100) }}%;"><i class="ic2"></i></i><!-- (100-70) -->
                        </i>
                        <span class="t2">
                            <span class="t2t1">평점</span>
                                                        <span class="t2t2">{{ $newLec->rating }}</span>
                                                        <span class="t2t3">· 수강생 {{ $newLec->student_cnt }}명</span>
                        </span>
                    </div>
                    <div class="tg2">
                        <span class="t2">
                                                    <span class="t2t1">{{ $newLec->owner_name }}</span>
                                                </span>
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
<!-- /fcard5 -->
<script>/*<![CDATA[*/
    $(function(){
        // 20210102
        $('#fcard5').jQmCarousel1({
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
