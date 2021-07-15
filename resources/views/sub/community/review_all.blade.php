<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210316 | @m | 요구반영. 결함개선. 고도화.
 * ~20210316 | @m |
 * 20210507 | @m |
 */
-->


@extends('master_sub')

@section('title', '커뮤니티 - 수강후기 모아보기')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">


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
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">수강후기 모아보기</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.community.notice') }}">공지사항</a></li>
			<li><a href="{{ route('sub.community.trend') }}">인사이트</a></li>
			<li><a href="{{ route('sub.community.service_qna', ['type' => 'all']) }}">서비스 문의</a></li>
			<li class="on"><a href="{{ route('sub.community.review_all') }}">수강후기 모아보기</a></li>
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


<!-- cp1infomenu1 -->
<div class="cp1infomenu1">
	<!-- cp1search1 -->
	<div class="cp1search1 w100">
        @php
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        @endphp
		<input type="text" placeholder="검색어를 입력하세요." title="검색어" class="text" id="search_keyword" value="@if ($keyword != '') {{ $keyword }} @endif"/>
		<button type="submit" class="button submit search" onclick="searchReview()"><i class="ic1"></i><span class="t1 blind">검색</span></button>
	</div>
	<!-- /cp1search1 -->
</div>
<!-- /cp1infomenu1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1flist5 -->
<div class="cp1flist5">
	<ul class="lst1">
    @if (count($reviewList) > 0)
        @foreach ($reviewList as $review)
        <li class="li1">
            <input type="hidden" value="{{ $review->idx }}">
            <div class="w1">
				<div class="w1w1">
					<div class="w1w1w1">
						<a href="{{ route('sub.lecture.lecture_detail', ['idx' => $review->lecture_idx]) }}" class="a1">
							<div class="f1">
								<span class="f1p1">
                                    @if ($review->save_thumbnail != '')
                                    <img src="{{ asset('storage/uploads/thumbnail/'.$review->save_thumbnail) }}" alt="{{ $review->title }}" />
                                    @else
                                    <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                                    @endif
								</span>
							</div>
						</a>
					</div>
					<div class="w1w1w2">
						<div class="tg1">
							<i class="star5rating1">
								<i class="st-on" style="width:{{ $review->rating * 20 }}%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:100%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<div class="t1">
								{{ $review->content }}
							</div>
						</div>
						<div class="t2">
							<span class="dpib mgr1em">좋아요: {{ $review->like_cnt }}</span>
							<span class="dpib">작성자: {{ $review->writer_name }}</span>
						</div>
					</div>
				</div>
				<div class="w1w2">
					<div class="w1w2w1">
						<!-- cp1menu1 -->
						<div class="cp1menu1 toggle1s1">
							<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
							<div class="cp1menu1c toggle-c">
								<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1" onclick="clickReport(this)">신고하기</span></a>
							</div>
						</div>
						<!-- /cp1menu1 -->
					</div>
					<div class="w1w2w2">
						<div class="t3">
							{{ format_date($review->writed_at) }}
						</div>
					</div>
				</div>
			</div>
		</li>
        @endforeach
    @else
    <br><span>수강 후기가 없습니다.</span>
    @endif
	</ul>
</div>
<!-- /cp1flist5 -->


<!-- infomenu1 -->
<div class="infomenu1">
    {!! $pageIndex['htmlCode'] !!}
</div>
<!-- /infomenu1 -->


<!-- (레이어팝업) -->
@include('sub.lecture.inc_layer_report_post')





</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection

@section('script')
<script>
function searchReview() {
    var searchKeyword = $('#search_keyword').val();
    location.href = '/sub/community/review_all?keyword=' + searchKeyword;
}

// 엔터키 입력 이벤트로 검색
$('#search_keyword').keydown(function(key) {
    if (key.keyCode == 13) {
        var searchKeyword = $('#search_keyword').val();
        location.href = '/sub/community/review_all?keyword=' + searchKeyword;
    }
});
</script>

<script>
    var idx
    function clickReport(obj){
        var my = $(obj);
        idx = my.parents("li").find("input").val();
    }
    $(function(){
        var my = $('#layer1report1post1');
        var close = $('.close', my);
        my.find(':button').on('click', function(e){
            e.preventDefault();
            var content = $('input[name="★1radio2"]:checked').siblings('label').text()
            if(content ==''){
                alert('신고사유를 선택해주세요!');
                return false;
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'json',
                url: '{{ route('report.report') }}',
                data: {
                    'type': "review",
                    'idx': idx,
                    'content':content
                },
                success: (data) => {
                    if(data.status=="success"){
                        alert("신고접수가 완료되었습니다.")
                    }else{
                        alert("이미 신고접수를 하셨습니다.")
                    }
                    close.trigger('click');
                }
            });
        })

    })
</script>
@endsection
