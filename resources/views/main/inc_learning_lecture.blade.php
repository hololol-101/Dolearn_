<!-- fcard2 -->
<div id="fcard2">
<div class="wrap1">
    <div class="hg1">
        <div class="w1 toggle1s1">
            <h3 class="h1">현재 수강중인 강좌</h3>
            <a href="#fcard3" class="sw1 switch toggle on">
                <span class="t1">비슷한 강좌 추천받기</span>
                <span class="t2 sw-on">ON</span>
                <span class="t2 sw-off">OFF</span>
                <i class="ic1"></i>
            </a>
            <script>/*<![CDATA[*/
                /** ◇◆ 온하면 해당 위치로. 20210128. @m.
                    */
                $(function(){
                    $('#fcard2 .sw1').on('click', function(e){
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
        <a href="{{ route('sub.management.learning_lecture_list') }}" class="more"><span class="t1">전체보기</span></a>
    </div>

    <!-- fcard2on1 -->
    <div id="fcard2on1">

        <div class="mControl">
            <button type="button" class="m prev"><i class="ic1"></i><span class="blind">현재 수강중인 강좌. 이전 보기</span></button>
            <button type="button" class="m next"><i class="ic1"></i><span class="blind">현재 수강중인 강좌. 다음 보기</span></button>
        </div>

        <!-- owl-carousel -->
        <div class="owl-carousel owl-theme">
            @if (isset($learningLectureList))
            @foreach($learningLectureList as $learningLecture)
            <div class="item">
                <div class="w1">
                    <a href="{{ route('learning.main', ['idx' => $learningLecture->idx]) }}" class="a1">
                        <div class="f1">
                            <span class="f1p1">
                                @if ($learningLecture->save_thumbnail != '')
                                <img src="{{ asset('storage/uploads/thumbnail/'.$learningLecture->save_thumbnail) }}" alt="{{ $learningLecture->title }}" />
                                @else
                                <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                                @endif
                            </span>
                            {{-- <i class="ic1 play">Play</i> --}}
                        </div>
                        <div class="g1">
                            {{-- 학습 진행률 progress bar --}}
                            <i class="g1b1" style="width:{{ round(($learningLecture->complete_video_cnt / $learningLecture->video_cnt) * 100) }}%;"></i>
                        </div>
                        <div class="tg1">
                            <strong class="t1">{{ $learningLecture->title }}</strong>
                            <div class="t2">
                                @php
                                    // 총 영상 재생시간
                                    if (date('H', strtotime($learningLecture->total_video_len)) < 1) {
                                        $totalVideoLen = date('i:s', strtotime($learningLecture->total_video_len));
                                    } else {
                                        $totalVideoLen = $learningLecture->total_video_len;
                                    }

                                    // 현재 영상 학습시간
                                    if ($learningLecture->current_video_time != '') {
                                        if (date('H', strtotime($learningLecture->current_video_time)) < 1) {
                                            $currentVideoTime = date('i:s', strtotime($learningLecture->current_video_time));
                                        } else {
                                            $currentVideoTime = $learningLecture->current_video_time;
                                        }
                                    } else {
                                        $currentVideoTime = '--';
                                    }
                                @endphp
                                <span class="t2t1">{{ $currentVideoTime }}</span> <i class="sep">/</i> <span class="t2t2">{{ $totalVideoLen }}</span>
                            </div>
                            <div class="t3">
                                <span class="t3t1">{{ $learningLecture->complete_video_cnt }}강</span> <i class="sep">/</i> <span class="t3t2">{{ $learningLecture->video_cnt }}강</span>
                                    <b class="t3t3">{{ round(($learningLecture->complete_video_cnt / $learningLecture->video_cnt) * 100) }}%</b>
                            </div>
                        </div>
                    </a>
                    {{-- 학습 기록이 있으면 이어보기 --}}
                    @if ($learningLecture->current_video_time != '')
                    <a href="{{ route('learning.main', ['idx' => $learningLecture->idx]) }}" class="b1">
                        <span class="b1t1">이어보기</span>
                    </a>
                    @else
                    <a href="{{ route('learning.main', ['idx' => $learningLecture->idx]) }}" class="b1">
                        <span class="b1t1">학습하기</span>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <!-- /owl-carousel -->
    </div>
    <!-- /fcard2on1 -->

    <!-- fcard2off1 -->
    <!-- <div id="fcard2off1">
        <a href="?#" class="a1">
            <div class="tc1">
                <span class="t1">다양한 강좌를 만나보세요!</span>
                <i class="ic1"></i>
            </div>
        </a>
    </div> -->
    <!-- /fcard2off1 -->

</div>
</div>
<!-- /fcard2 -->
<script>/*<![CDATA[*/
    $(function(){
        // 20210102
        $('#fcard2').jQmCarousel1({
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
