<hr class="bdt1px mgt3em mgb2em" />

<h3 class="hb1 h1">커리큘럼</h3>

{{-- <pre>{{ print_r($curriSchapterList) }}</pre> --}}

<!-- cp1curriculum2 -->
<div class="cp1curriculum2">
    @php
    $carouselIdx = 0;
    $chapterIdx = 1;
    $videoListIdx = 0;
    @endphp
    @foreach ($bchapterList as $bkey => $bchapter)
    <h4 class="h1">Part {{ $bkey + 1 }}. {{ $bchapter->bchap_name }}</h4>
        @foreach ($curriSchapterList[$bkey] as $skey => $schapter)
        <div class="d2">
            <h5 class="h2"><a href="javascript:void(0);">Chap {{ $chapterIdx }}. {{ $schapter->schap_name }}</a></h5>
            <div class="d3">
                <!-- cp1flist8 -->
                <div class="cp1flist8">
                    <div class="w1">
                        <div class="w1w1">
                            <!-- cp1fcard11 -->
                            <div class="cp1fcard11" id="cp1fcard11-{{ $carouselIdx }}">
                            <div class="wrap1">
                                {{-- <div class="mControl">
                                    <button type="button" class="m prev"><i class="ic1"></i><span class="blind">미리보기 영상. 이전 보기</span></button>
                                    <button type="button" class="m next"><i class="ic1"></i><span class="blind">미리보기 영상. 다음 보기</span></button>
                                </div> --}}
                                <!-- owl-carousel -->
                                <div class="owl-carousel owl-theme show-video">

                                {{-- 커리큘럼 리스트 클릭 시 영상 출력 --}}

                                </div>
                                <!-- /owl-carousel -->
                            </div>
                            </div>
                            <!-- /cp1fcard11 -->
                            <script>/*<![CDATA[*/
                                $(function(){
                                    // 20210318
                                    $('#cp1fcard11-{{ $carouselIdx }}').jQmCarousel1({
                                    });
                                });
                            /*]]>*/</script>
                        </div>
                        <div class="w1w2">
                            <ul class="lst1">
                                @foreach ($curriVideoList[$videoListIdx] as $video)
                                <li class="li1">
                                    <a href="javascript:void(0);" class="g1 tooltip1"><i class="g1p1"><img src="{{ asset('assets/images/lib/x3/x3p301.jpg') }}" alt="★대체텍스트필수" class="w100 round" /></i><span class="g1t1 tooltip1c">{{ $video->channel }}</span></a>
                                    @php
                                        $format = '';
                                        if (date("H", strtotime($video->video_len)) >= 1) {
                                            $format = 'H:i:s';
                                        } else {
                                            $format = 'i:s';
                                        }
                                        $videoLen = date($format, strtotime($video->video_len));
                                    @endphp
                                    <a href="javascript:void(0);" class="a1" video_id="{{ $video->uid }}"><span class="t1">{{ $video->new_video_title }}</span> <span class="t2">{{ $videoLen }}</span></a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /cp1flist8 -->
            </div>
        </div>
        @php
        $carouselIdx++;
        $chapterIdx++;
        $videoListIdx++;
        @endphp
        @endforeach
    @endforeach
</div>
<!-- /cp1curriculum2 -->

<script>/*<![CDATA[*/
    $(function(){
        /** ◇◆ 커리큘럼.아코디언. 20210318. @m.
         */
        (function(){
            var my = '.cp1curriculum2',
                item = '.d2',
                b = '.h2',
                c = '.d3';

            $(my).on('click', b, function(e){
                e.preventDefault();
                //$(this).closest(item).find(c).slideToggle(); // 나만 활성 토글
                // 나는 활성 형제는 비활성
                if( $(this).closest(item).find(c).is(':hidden') ){
                    $(this).closest(item).addClass('on').siblings().removeClass('on');
                    $(this).closest(item).find(c).slideDown().end().siblings().find(c).slideUp();

                    // 미리보기 영상(15초) 출력
                    var videoId = $(this).closest(item).find('.a1').attr('video_id');
                    var html = '';
                    html += '<div class="item">';
                    html +=     '<div class="w1">';
                    html +=         '<iframe name="youtube_fr" id="display_fr" style="width:100%;height:100%;border:0;" src="https://www.youtube.com/embed/' + videoId + '?controls=0&start=0&end=15&modestbranding=1&showinfo=0&rel=0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                    html +=     '</div>';
                    html += '</div>';

                    $('.show-video').empty();
                    $(this).closest(item).find('.show-video').append(html);
                }else{
                    $(this).closest(item).removeClass('on');
                    $(this).closest(item).find(c).slideUp();

                    $('.show-video').empty();
                }
            });

            // 커리큘럼 리스트 클릭 시 미리보기 영상 출력
            $(my).on('click', '.a1', function(e){
                e.preventDefault();

                var videoId = $(this).attr('video_id');
                var html = '';
                html += '<div class="item">';
                html +=     '<div class="w1">';
                html +=         '<iframe name="youtube_fr" id="display_fr" style="width:100%;height:100%;border:0;" src="https://www.youtube.com/embed/' + videoId + '?controls=0&start=0&end=15&modestbranding=1&showinfo=0&rel=0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                html +=     '</div>';
                html += '</div>';

                $('.show-video').empty();
                $(this).closest('.d2').find('.show-video').append(html);
            });
        })();
    });
/*]]>*/</script>

<!-- cp1fcard2 -->
<div class="cp1fcard2">
<div class="wrap1">
	<div class="hg1">
		<h3 class="hb1 h1">강사의 다른 강좌</h3>
		<a href="{{ route('sub.lecture.lecture_list') }}" class="more"><span class="t1">더보기</span> <i class="ic1"></i></a>
	</div>
    @if (count($operationLectureList) > 0)
        {{-- 운영중인 강좌가 3개 이하이면 이동 버튼 숨김 --}}
        @if (count($operationLectureList) > 3)
        <div class="mControl">
            <button type="button" class="m prev"><i class="ic1"></i><span class="blind">현재 운영중인 강좌. 이전 보기</span></button>
            <button type="button" class="m next"><i class="ic1"></i><span class="blind">현재 운영중인 강좌. 다음 보기</span></button>
        </div>
        @endif

        <!-- owl-carousel -->
        <div class="owl-carousel owl-theme">
            @foreach ($operationLectureList as $operationLecture)
            <div class="item">
                <div class="w1">
                    <a href="{{ route('sub.lecture.lecture_detail', ['idx' => $operationLecture->idx]) }}" class="a1">
                        <div class="f1">
                            <span class="f1p1">
                                @if ($operationLecture->save_thumbnail != '')
                                <img src="{{ asset('storage/uploads/thumbnail/'.$operationLecture->save_thumbnail) }}" alt="{{ $operationLecture->title }}" />
                                @else
                                <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                                @endif
                            </span>
                            {{-- <i class="ic1 play">Play</i> --}}
                        </div>
                        <div class="tg1">
                            <strong class="t1">{{ $operationLecture->title }}</strong>
                            <div class="t2">
                                <span class="t2t1">총 수강자</span> <span class="t2t2">{{ $operationLecture->student_cnt }}명</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /owl-carousel -->
    @else
        <br><div>강좌 정보가 없습니다.</div>
    @endif
</div>
</div>
<!-- /cp1fcard2 -->

<script>/*<![CDATA[*/
	$(function(){
		// 20210113
		$('.cp1fcard2').jQmCarousel1({
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
