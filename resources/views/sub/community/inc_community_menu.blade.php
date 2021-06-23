<!-- body_title -->
<div id="body_title">

    <!-- location1 -->
    <div id="location1">
        <div class="breadcrumb clearfix">
            <strong class="blind">현재페이지 위치:</strong>
            <span class="cont">
                <a href="javascript:void(0);" class="a1"><i class="t1">커뮤니티</i></a>
            </span>
        </div>
    </div>
    <!-- /location1 -->

    <!-- lnb1 -->
    <div id="lnb1">
        <strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">공지사항</span> <i class="ic1"></i></a></strong>
        <!-- lnb1c -->
        <div id="lnb1c">
            <ul>
            <li class="on"><a href="{{ route('sub.community.notice') }}">공지사항</a></li>
            <li><a href="{{ route('sub.community.trend') }}">인사이트</a></li>
            <li><a href="{{ route('sub.community.service_qna', ['type' => 'all']) }}">서비스 문의</a></li>
            <li><a href="{{ route('sub.community.review_all') }}">수강후기 모아보기</a></li>
            </ul>
        </div>
        <!-- /lnb1c -->
    </div>
    <!-- lnb1 -->
    <script>/*<![CDATA[*/
        $(function(){
            /** ◇◆ 목록앵커 클릭하면 활성 메뉴를 제목에 표시. 링크 이동. 20210111. @m
             */
            (function(){
                var $my = $('#lnb1'),
                    $m = $('li>a[href]', $my);
                // 현재활성
                $m.each(function(){
                    if( $(this).closest('li').is('.on') ){
                        $('.h1 .t1', $my).text( $(this).text() );
                    }
                });
                // 클릭
                $m.on('click', function(e){
                    //e.preventDefault();
                    $('.toggle', $my).triggerHandler('click'); // 토글 닫기
                    $('.h1 .t1', $my).text( $(this).text() );
                    return; // 링크 이동
                });
            })();
        });
    /*]]>*/</script>

</div>
<!-- /body_title -->
