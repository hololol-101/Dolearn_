<!-- teacher1top10 -->
<div id="teacher1top10">
<div class="wrap1">
    <div class="hg1">
        <h3 class="h1">지금 뜨는 강사 TOP 10</h3>
        <span class="t1">
            <span class="t1t1">#최다수강후기</span>
            <span class="t1t1">#평점UP</span>
            <span class="t1t1">#새로운강사</span>
        </span>
        <a href="{{ route('sub.community.ranking', ['type' => 'instructor']) }}" class="b1"><span class="b1t1">전체보기</span> <i class="b1ic1"></i></a>
    </div>
    <!-- mView -->
    <div class="mView">
        <ol class="mCont">
            @foreach ($hotInstructorList as $key => $hotInstructor)
            <li class="item">
                <div class="w1">
                    <a href="{{ route('etc.user_introduction', ['role' => 'instructor']) }}" class="a1">
                        <b class="g1">{{ $key + 1 }}</b>
                        <div class="f1">
                            <span class="f1p1">
                                <img id ="profile_image" alt="★대체텍스트필수"
                                    @if ($hotInstructor->save_profile_image != ''){
                                        src="{{ asset('storage/uploads/profile/'.$hotInstructor->save_profile_image) }}"
                                    }
                                    @else{
                                        src="{{ asset('assets/images/lib/noimg1face1.png') }}"
                                    }
                                    @endif
                                />
                            </span>
                        </div>
                        <div class="tg1">
                            <strong class="t1">{{ $hotInstructor->nickname }}</strong>
                            {{-- <em class="g2">up</em> --}}
                        </div>
                        <div class="tg2">
                            <span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">{{ $hotInstructor->lecture_cnt }}</span></span>
                            <span class="t2"><span class="t2t1">수강자 수</span> <span class="t2t2">{{ $hotInstructor->total_student }}</span></span>
                        </div>
                    </a>
                </div>
            </li>
            @endforeach
        </ol>
    </div>
    <!-- /mView -->
    @if (count($hotInstructorList) > 5)
    <div class="mControl">
        <a href="#teacher1top10" class="more switch toggle">
            <span class="blind">지금 뜨는 강사 TOP 10</span>
            <span class="t1 sw-off">더보기</span>
            <span class="t1 sw-on">접기</span>
            <i class="ic1"></i>
        </a>
    </div>
    @endif
</div>
</div>
<!-- /teacher1top10 -->
