<!-- lecture1top10 -->
<div id="lecture1top10">
<div class="wrap1">
    <div class="hg1">
        <h3 class="h1">지금 핫한 강좌 TOP 10</h3>
        <span class="t1">
            <span class="t1t1">#최다수강생</span>
            <span class="t1t1">#인기급상승</span>
            <span class="t1t1">#2021강좌</span>
        </span>
        <!-- <a href="?#" class="b1"><span class="b1t1">전체보기</span> <i class="b1ic1"></i></a> -->
    </div>
    <!-- mView -->

    <div class="mView">
        <ol class="mCont">
            @if (isset($hotLecList))
            @foreach($hotLecList as $key => $hotLec)
            <li class="item">
                <div class="w1">
                    <a href="{{ route('sub.lecture.lecture_detail', ['idx' => $hotLec->idx]) }}" class="a1">
                        <div class="f1">
                            <span class="f1p1">
                                @if ($hotLec->save_thumbnail != '')
                                <img src="{{ asset('storage/uploads/thumbnail/'.$hotLec->save_thumbnail) }}" alt="{{ $hotLec->title }}" />
                                @else
                                <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                                @endif
                            </span>
                            <i class="ic1 play">Play</i>
                        </div>
                        <div class="tg1">
                            <b class="g1">{{ $key + 1 }}</b>
                            <strong class="t1">{{ $hotLec->title }}</strong>
                            <span class="t2">{{ $hotLec->category_1 }} · 수강생 {{ $hotLec->student_cnt }}</span>
                        </div>
                        <div class="tg2">
                            <span class="t3">{{ $hotLec->owner_name }}</span>
                            <span class="t4">
                                <span class="t4t1">평점</span> <span class="t4t2">{{ $hotLec->rating }}</span>
                            </span>
                        </div>
                    </a>
                </div>
            </li>
            @endforeach
            @endif
        </ol>
    </div>
    <!-- /mView -->
    @if (count($hotLecList) > 5)
    <div class="mControl">
        <a href="#lecture1top10" class="more switch toggle">
            <span class="blind">지금 핫한 강좌 TOP 10</span>
            <span class="t1 sw-off">더보기</span>
            <span class="t1 sw-on">접기</span>
            <i class="ic1"></i>
        </a>
    </div>
    @endif
</div>
</div>
<!-- /lecture1top10 -->
