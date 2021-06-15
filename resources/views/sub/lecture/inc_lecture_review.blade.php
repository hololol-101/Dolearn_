@php
// 지난 시간 계산
function format_date($time){
    $t=time()-$time;
    $f=array(
        '31536000'=>'년',
        '2592000'=>'개월',
        '604800'=>'주',
        '86400'=>'일',
        '3600'=>'시간',
        '60'=>'분',
        '1'=>'초'
    );
    foreach ($f as $k=>$v)    {
        if (0 !=$c=floor($t/(int)$k)) {
            return $c.$v.' 전';
        }
    }
}
@endphp

<hr class="bdt1px mgt3em mgb2em" />

<h3 class="hb1 h1 tac">수강후기</h3>


<!-- cp1rating1 -->
<div class="cp1rating1">
    <div class="rating">
        <strong class="h1 blind">별점</strong>
        <span class="t1">
            <span class="t1t1">@if ($reviewAllCnt != 0) {{ round(($ratingSum / $reviewAllCnt)) }}점 @else 0점 @endif</span>
        </span>
        <i class="star5rating2">
            <i class="st-on" style="width:@if ($reviewAllCnt != 0) {{ round(($ratingSum / $reviewAllCnt)) * 20 }}% @else 0% @endif;"><i class="ic1"></i></i><!-- (3.5/5) -->
            <i class="st-off" style="width:100%;"><i class="ic2"></i></i><!-- (100-70) -->
        </i>
        <span class="t2">
            <span class="t2t1">수강후기</span> <span class="t2t1">{{ $reviewAllCnt }}개</span>
        </span>
    </div>
    <div class="graph">
        <strong class="h2 blind">별점 분포</strong>
        <ul>
            @foreach ($ratingCntArr as $key => $ratingCnt)
            <li>
                <span class="term"><span class="t1">{{ $key }}점</span></span>
                <i class="track"><i class="bar" style="width: @if ($ratingCnt != 0) {{ ($ratingCnt / $reviewAllCnt) * 100 }}% @else 0% @endif;"><span class="data">{{ $ratingCnt }}명</span></i></i>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /cp1rating1 -->


<!-- cp1review1 -->
<!-- 리뷰 item | 답장 reply  -->
<div class="cp1review1" id="review_list">
    @foreach ($reviewList as $review)
    <div class="w1 item" review_idx={{ $review->idx }}>
        <div class="w1w1">
            <div class="f1">
                <span class="f1p1">
                    @if ($review->save_profile_image == '')
                    <img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
                    @else
                    <img src="{{ asset('assets/images/lib/'.$review->save_profile_image) }}" alt="{{ $review->save_profile_image }}" />
                    @endif
                </span>
            </div>
        </div>
        <div class="w1w2">
            <div class="tg1">
                <i class="star5rating1">
                    <i class="st-on" style="width:{{ $review->rating * 20 }}%;"><i class="ic1"></i></i><!-- (3.5/5) -->
                    <i class="st-off" style="width:100%;"><i class="ic2"></i></i><!-- (100-70) -->
                </i>
                <span class="t1">{{ $review->writer_name }}</span>
                <span class="t2">{{ format_date(strtotime($review->writed_at)) }}</span>
            </div>
            <div class="tg2">
                {{ $review->content }}
            </div>
            <div class="eg1">
                <a href="javascript:void(0);" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">{{ $review->like_cnt }}</span></a>
                <!-- cp1menu1 -->
                <div class="cp1menu1 toggle1s1">
                    <strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
                    <div class="cp1menu1c toggle-c">
                        <a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
                    </div>
                </div>
                <!-- /cp1menu1 -->
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- /cp1review1 -->


<!-- cp1more1 -->
<div class="cp1more1">
    <a href="javascript:void(0);" class="more" id="more_review_btn" onclick="getMoreReview()">
        <span class="t1">더보기</span>
        <i class="ic1"></i>
    </a>
</div>
<!-- /cp1more1 -->


<script>/*<![CDATA[*/
    $(function(){

        /** ◇◆ 더보기클릭샘플. 20210114. @m
         * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
         */
        // (function(){
        //     var $my = $('.cp1review1'),
        //         $more = $my.next('.cp1more1').find('.more');
        //     var html = $my.html();

        //     $more.on('click', function(e){
        //         e.preventDefault();
        //         $my.append($(html));
        //     });
        // })();

    });

/*]]>*/</script>


<!-- (레이어팝업) -->
@include('sub.lecture.inc_layer_report_post')
