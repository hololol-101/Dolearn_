<!-- my1interest1 -->
<div id="my1interest1">
<div class="wrap1">
    <div class="hg1">
        <h3 class="h1">내 관심 분야</h3>
        <a href="#layer1interests1set1" class="set toggle" data-send-focus="that"><span class="t1 blind">설정</span> <i class="ic1"></i></a>
    </div>
    <div class="wrap2">
        <div class="mControl">
            <button type="button" class="m prev page"><i class="ic1"></i><span class="blind">내 관심 분야. 이전 보기</span></button>
            <button type="button" class="m next page"><i class="ic1"></i><span class="blind">내 관심 분야. 다음 보기</span></button>
        </div>
        <!-- owl-carousel -->
        <div class="owl-carousel owl-theme">
            @if (count($interest_arr)>0)
                @foreach ($interest_arr as $key =>$value )
                    <div class="item">
                        <div class="w1">
                            <a href="javascript:void(0);" class="a1" scate_id='{{ $value['scate_id'] }}'>
                                <strong class="t1">{{ $key }}</strong>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
            <div>관심 분야를 설정하시면 분야에 맞는 강좌를 추천해드립니다.</div>
            @endif
        </div>

        <!-- /owl-carousel -->
    </div>
</div>
</div>
<!-- /my1interest1 -->
<script>/*<![CDATA[*/
    $(function(){
        $('#my1interest1').find('.item').first().addClass('on');
        // 20201220
        $('#my1interest1').jQmCarousel1({
            autoplay: false,
            autoplayTimeout: 6000,
            autoWidth:true,
            loop:false,
            margin: 20,
            responsive: {
                000: { items: 2, margin: 4 },
                640: { items: 4, margin: 8 },
                960: { items: 6, margin: 16 },
                1260: { items: 6, margin: 20 }
            }
        });

        // 클릭활성. 20201228. @m
        (function makeOn1(selector){
            var my = '#my1interest1',
            m = '.item';
            $(document).on('click', my+' '+m, function(e){
                e.preventDefault();
                $(my+' '+m).removeClass('on');
                $(this).closest(m).addClass('on').siblings().removeClass('on');

                var scate_id = $(this).find('.a1').attr('scate_id');
                var cate_name = $(this).find('.t1').text();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    url: "{{ route('sub.lecture.get_interest_lecture') }}",
                    data: {
                        'scate_id':scate_id,
                        'scate_name':cate_name
                    },
                    success: (response) => {
                        var popular = '#fcard4', newL = '#fcard5', ai = '#fcard6';
                        var subname = '.h2';
                        var html = '.owl-carousel';

                        $(popular).empty().append(response.resDataPopular);
                        $(popular).trigger("click");
                        // 슬라이드 스크립트 재호출
                        $(popular).jQmCarousel1({
                            autoplay: false,
                            autoplayTimeout: 6000,
                            margin: 22,
                            responsive: {
                                000: { items: 2 },
                                640: { items: 2 },
                                960: { items: 3 }
                            }
                        });

                        $(newL).empty().append(response.resDataNew);
                        $(newL).trigger("click");

                        $(newL).jQmCarousel1({
                            autoplay: false,
                            autoplayTimeout: 6000,
                            margin: 22,
                            responsive: {
                                000: { items: 2 },
                                640: { items: 2 },
                                960: { items: 3 }
                            }
                        });

                        $(ai).empty().append(response.resDataAi);
                        $(ai).trigger("click");

                        $(ai).jQmCarousel1({
                            autoplay: false,
                            autoplayTimeout: 6000,
                            margin: 22,
                            responsive: {
                                000: { items: 2 },
                                640: { items: 2 },
                                960: { items: 3 }
                            }
                        });

                        console.log($('#ai_lecture_list'));

                    },
                    error: function(response) {
                        console.log(response);
                    }
                })
            });
        })();

    });
/*]]>*/</script>


<!-- (레이어팝업)(코드위치주의!) -->


