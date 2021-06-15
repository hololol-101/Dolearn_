<!-- my1interest1 -->
<div id="my1interest1">
<div class="wrap1">
    <div class="hg1">
        <h3 class="h1">내 관심 분야</h3>
        <a href="?#" class="set"><span class="t1 blind">설정</span> <i class="ic1"></i></a>
    </div>
    <div class="wrap2">
        <div class="mControl">
            <button type="button" class="m prev page"><i class="ic1"></i><span class="blind">내 관심 분야. 이전 보기</span></button>
            <button type="button" class="m next page"><i class="ic1"></i><span class="blind">내 관심 분야. 다음 보기</span></button>
        </div>
        <!-- owl-carousel -->
        <div class="owl-carousel owl-theme">
            <div class="item on">
                <div class="w1">
                    <a href="?#" class="a1">
                        <strong class="t1">파이썬</strong>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="w1">
                    <a href="?#" class="a1">
                        <strong class="t1">엑셀</strong>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="w1">
                    <a href="?#" class="a1">
                        <strong class="t1">프로그래밍</strong>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="w1">
                    <a href="?#" class="a1">
                        <strong class="t1">프로그램</strong>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="w1">
                    <a href="?#" class="a1">
                        <strong class="t1">데이터분석</strong>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="w1">
                    <a href="?#" class="a1">
                        <strong class="t1">프리미어프로</strong>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="w1">
                    <a href="?#" class="a1">
                        <strong class="t1">일이삼사오륙칠팔구십</strong>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="w1">
                    <a href="?#" class="a1">
                        <strong class="t1">일이삼사오륙칠팔구십</strong>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="w1">
                    <a href="?#" class="a1">
                        <strong class="t1">일이삼사오륙칠팔구십</strong>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="w1">
                    <a href="?#" class="a1">
                        <strong class="t1">일이삼사오륙칠팔구십</strong>
                    </a>
                </div>
            </div>
        </div>
        <!-- /owl-carousel -->
    </div>
</div>
</div>
<!-- /my1interest1 -->
<script>/*<![CDATA[*/
    $(function(){

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
            });
        })();

    });
/*]]>*/</script>
