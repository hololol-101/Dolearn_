<!-- fcard1 -->
<div id="fcard1">
<div class="wrap1">
    <div class="hg1">
        <div class="w1 toggle1s1">
            <h3 class="h1">현재 운영중인 강좌</h3>
            <a href="#fcard3-1" class="sw1 switch toggle on">
                <span class="t1">비슷한 강좌 추천받기</span>
                <span class="t2 sw-on">ON</span>
                <span class="t2 sw-off">OFF</span>
                <i class="ic1"></i>
            </a>
            <script>/*<![CDATA[*/
                /** ◇◆ 온하면 해당 위치로. 20210128. @m.
                    */
                $(function(){
                    $('#fcard1 .sw1').on('click', function(e){
                        e.preventDefault();
                        $my = $(this);
                        setTimeout(function(){
                            if( $my.is('.on') ){
                                console.log($($my[0].hash).offset().top);
                                smoothScrollTop($($my[0].hash).offset().top, -30);
                            }
                        }, 100);
                    });
                });
            /*]]>*/</script>
        </div>
        <a href="{{ route('manage.instructor.operation_lecture') }}" class="more"><span class="t1">전체보기</span></a>
    </div>
    <div class="mControl">
        <button type="button" class="m prev"><i class="ic1"></i><span class="blind">현재 운영중인 강좌. 이전 보기</span></button>
        <button type="button" class="m next"><i class="ic1"></i><span class="blind">현재 운영중인 강좌. 다음 보기</span></button>
    </div>
    <!-- owl-carousel -->
    <div class="owl-carousel owl-theme">
        @foreach ($operatingLectureList as $operatingLecture)
        <div class="item">
            <div class="w1">
                <a href="{{ route('sub.lecture.lecture_detail', ['idx' => $operatingLecture->idx]) }}" class="a1">
                    <div class="f1">
                        <span class="f1p1">
                            @if ($operatingLecture->save_thumbnail != '')
                            <img src="{{ asset('storage/uploads/thumbnail/'.$operatingLecture->save_thumbnail) }}" alt="{{ $operatingLecture->title }}" />
                            @else
                            <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                            @endif
                        </span>
                        {{-- <i class="ic1 play">Play</i> --}}
                    </div>
                    <div class="tg1">
                        <strong class="t1">{{ $operatingLecture->title }}</strong>
                        <div class="t2">
                            <span class="t2t1">총 수강자</span> <span class="t2t2">{{ $operatingLecture->student_cnt }}명</span>
                        </div>
                    </div>
                </a>
                <div class="btns">
                    <a href="{{ route('manage.lecture.lecture_info', ['idx' => $operatingLecture->idx]) }}" class="a2"><span class="a2t1">강좌 관리하기</span></a>
                    <a href="{{ route('sub.lecture.lecture_detail', ['idx' => $operatingLecture->idx]) }}" class="a2"><span class="a2t1">강좌 바로가기</span></a>
                </div>
                <!-- <div class="btns">
                    <a href="?#" class="a2"><span class="a2t1">미해결 질문</span> <span class="a2t2">4</span></a>
                    <a href="?#" class="a2"><span class="a2t1">미채점 시험/과제</span> <span class="a2t2">10</span></a>
                </div> -->
            </div>
        </div>
        @endforeach
    </div>
    <!-- /owl-carousel -->
</div>
</div>
<!-- /fcard1 -->
<script>/*<![CDATA[*/
    $(function(){
        // 20210102
        $('#fcard1').jQmCarousel1({
            autoplay: false,
            autoplayTimeout: 6000,
            margin: 22,
            responsive: {
                000: { items: 2 },
                640: { items: 2 },
                960: { items: 3 },
                1260: {
                    items: 3,
                    margin: 39
                }
            }
        });
    });
/*]]>*/</script>
