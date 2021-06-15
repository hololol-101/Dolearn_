@php
    $carouselIdx = 0;
    $chapterIdx = 1;
    $videoListIdx = 0;
@endphp

<!-- cp1curriculum2 -->
<div class="cp1curriculum2">
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
                        </div>
                        <div class="w1w2">
                            <ul class="lst1">
                                @foreach ($curriVideoList[$videoListIdx] as $video)
                                <li class="li1 check">
                                    <a href="javascript:void(0);" class="g1 tooltip1"><i class="g1p1"><img src="{{ asset('assets/images/lib/x3/x3p301.jpg') }}" alt="{{ $video->title }}" class="w100 round" /></i><span class="g1t1 tooltip1c">{{ $video->channel }}</span></a>
                                    <a href="javascript:void(0);" class="a1"><span class="t1">{{ $video->title }}</span> <span class="t2">{{ $video->time }}</span></a>
                                </li>
                                @endforeach
                                <li class="li1 check">
                                    <a href="javascript:void(0);" class="g1"><i class="g1ic1"></i></a>
                                    <a href="javascript:void(0);" class="a1"><span class="t1">1차 과제 - 무슨무슨 실습파일</span></a>
                                </li>
                                <li class="li1">
                                    <a href="javascript:void(0);" class="g1"><i class="g1ic1"></i></a>
                                    <a href="javascript:void(0);" class="a1"><span class="t1">PART1 마무리 시험</span></a>
                                </li>
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
				}else{
					$(this).closest(item).removeClass('on');
					$(this).closest(item).find(c).slideUp();
				}
			});
		})();


		/** ◇◆ 미래클래스on활성비활성. 20210325. @m.
		 */
		var my = '.cp1flist8',
			item = '.li1';
		$(my).on('click', item, function(e){
			e.preventDefault();
			$(my).find(item).removeClass('on');
			$(this).addClass('on');
		});


	});
/*]]>*/</script>
