<h3 class="hb1 h1">커리큘럼</h3>

{{-- <pre>{{ print_r($videoList) }}</pre> --}}

<!-- cp1curriculum2 -->
<div class="cp1curriculum2">
    @php $carouselIdx = 0; @endphp
    @foreach ($bchapterList as $bkey=>$bchapter)
    <h4 class="h1">Part {{ $bkey + 1 }}. {{ $bchapter->bchap_name }}</h4>
        @foreach ($schapterList as $skey=>$schapter)
        <div class="d2">
            <h5 class="h2">Chap {{ $skey + 1 }}. {{ $schapter->schap_name }}</h5>
            <div class="d3">
                <!-- cp1flist8 -->
                <div class="cp1flist8">
                    <div class="w1">
                        <div class="w1w1">
                            <!-- cp1fcard11 -->
                            <div class="cp1fcard11" id="cp1fcard11-{{ $carouselIdx }}">
                            <div class="wrap1">
                                <div class="mControl">
                                    <button type="button" class="m prev"><i class="ic1"></i><span class="blind">미리보기 영상. 이전 보기</span></button>
                                    <button type="button" class="m next"><i class="ic1"></i><span class="blind">미리보기 영상. 다음 보기</span></button>
                                </div>
                                <!-- owl-carousel -->
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="w1">
                                            {{-- <iframe name="youtube_fr" id="display_fr" width="100%" height="100%" src="https://www.youtube.com/embed/{{ 'eBUxKobfWgk' }}?controls=0&end=10" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                                            {{-- <video class="video" controls="controls" poster="{{ asset('assets/images/lib/x2/x2p1001.jpg') }}" src="http://content.jwplatform.com/videos/HkauGhRi-640.mp4">
                                                <div class="alternativeContent">
                                                    <p>Your browser does not support the video element.</p>
                                                </div>
                                            </video> --}}
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="w1">
                                            {{-- <iframe name="youtube_fr" id="display_fr" width="100%" height="100%" src="https://www.youtube.com/embed/{{ 'eBUxKobfWgk' }}?controls=0&end=10" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                                            {{-- <video class="video" controls="controls" poster="{{ asset('assets/images/lib/x2/x2p1001.jpg') }}" src="http://content.jwplatform.com/videos/HkauGhRi-640.mp4">
                                                <div class="alternativeContent">
                                                    <p>Your browser does not support the video element.</p>
                                                </div>
                                            </video> --}}
                                        </div>
                                    </div>
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
                                @foreach ($videoList as $video)
                                <li class="li1"><a href="#?" class="g1 tooltip1"><i class="g1p1"><img src="{{ asset('assets/images/lib/x3/x3p301.jpg') }}" alt="★대체텍스트필수" class="w100 round" /></i><span class="g1t1 tooltip1c">{{ $video->channel }}</span></a> <span class="t1">{{ $video->title }}</span> <span class="t2">{{ $video->time }}</span></li>
                                @endforeach
                                <li class="li1"><b class="g1"><i class="g1ic1"></i></b> <span class="t1">1차 과제 - 무슨무슨 실습파일</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /cp1flist8 -->
            </div>
        </div>
        @php $carouselIdx++; @endphp
        @endforeach
	</div>
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
                }else{
                    $(this).closest(item).removeClass('on');
                    $(this).closest(item).find(c).slideUp();
                }
            });
        })();
    });
/*]]>*/</script>

<!-- cp1fcard2 -->
<div class="cp1fcard2">
<div class="wrap1">
	<div class="hg1">
		<h3 class="hb1 h1">강사의 다른 강좌</h3>
		<a href="?#★" class="more"><span class="t1">더보기</span> <i class="ic1"></i></a>
	</div>
	<div class="mControl">
		<button type="button" class="m prev"><i class="ic1"></i><span class="blind">현재 운영중인 강좌. 이전 보기</span></button>
		<button type="button" class="m next"><i class="ic1"></i><span class="blind">현재 운영중인 강좌. 다음 보기</span></button>
	</div>
	<!-- owl-carousel -->
	<div class="owl-carousel owl-theme">
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">포토샵 강좌 #72 - 깊이감이 느껴지는 타이포그래피 일이삼사오륙칠팔구십</strong>
						<div class="t2">
							<span class="t2t1">총 수강자</span> <span class="t2t2">30명</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p102.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일러스트레이터 강좌 #49 - 타이포가 돋보이 일이삼사오륙칠팔구십</strong>
						<div class="t2">
							<span class="t2t1">총 수강자</span> <span class="t2t2">130명</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p103.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">호너 아티스트 권병호 - 하모니카 강좌 1편</strong>
						<div class="t2">
							<span class="t2t1">총 수강자</span> <span class="t2t2">12명</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p004.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
						<div class="t2">
							<span class="t2t1">총 수강자</span> <span class="t2t2">12명</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p005.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
						<div class="t2">
							<span class="t2t1">총 수강자</span> <span class="t2t2">12명</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p006.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십</strong>
						<div class="t2">
							<span class="t2t1">총 수강자</span> <span class="t2t2">12명</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p007.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십</strong>
						<div class="t2">
							<span class="t2t1">총 수강자</span> <span class="t2t2">12명</span>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /owl-carousel -->
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
