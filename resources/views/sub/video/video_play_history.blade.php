<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210205 | @m | 요구반영. 결함개선. 고도화.
 * ~20210205 | @m |
 */
-->
@php
    $type = isset($_GET['type']) ? $_GET['type'] : '';
@endphp

@extends('master_sub')

@section('title', '영상보관함 - 시청기록')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

@include('inc.common.inc_layer_sitemap')

<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="javascript:void(0);" class="a1"><i class="t1">영상보관함</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">시청 기록</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.video.video_play_history') }}">시청 기록</a></li>
			<li><a href="{{ route('sub.video.video_note_list') }}">영상 노트</a></li>
			<li><a href="{{ route('sub.video.video_playlist') }}">재생 목록</a></li>
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
	<div class="w1">
		<select title="영상 필터" class="select" id="select_filter">
			<option value="" @if ($type == '') selected @endif>최근 시청 영상</option>
			<option value="like" @if ($type == 'like') selected @endif>좋아요 누른 영상</option>
		</select>
	</div>
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


<!-- cp1fcard4 -->
<div class="cp1fcard4">
<div class="wrap1">
	<div class="dpf-sbc">
		<h3 class="hb1 h5">오늘</h3>
		<div class="mControl">
			<button type="button" class="m prev"><i class="ic1"></i><span class="blind">추천 영상. 이전 보기</span></button>
			<button type="button" class="m next"><i class="ic1"></i><span class="blind">추천 영상. 다음 보기</span></button>
		</div>
	</div>
	<!-- owl-carousel -->
	<div class="owl-carousel owl-theme">
        @if (count($todayHistoryList) > 0)
            @foreach ($todayHistoryList as $todayHistory)
            <div class="item">
                <div class="w1">
                    <a href="{{ route('sub.video.video_detail', ['uid' => $todayHistory->video_id]) }}" class="a1">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="https://img.youtube.com/vi/{{ $todayHistory->video_id }}/mqdefault.jpg" alt="{{ $todayHistory->subject }}">
                            </span>
                            <i class="ic1 play">Play</i>
                        </div>
                        <div class="tg1">
                            <strong class="t1">{{ $todayHistory->subject }}</strong>
                        </div>
                        <div class="tg2">
                            <span class="t2">{{ $todayHistory->channel }}</span>
                            <span class="t3">조회수 {{ $todayHistory->like_cnt }}회</span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        @endif
	</div>
	<!-- /owl-carousel -->
    @if (count($todayHistoryList) == 0)
    <br><span>영상 정보가 없습니다.</span>
    @endif
</div>
</div>
<!-- /cp1fcard4 -->
<script>/*<![CDATA[*/
	$(function(){
		// 20210205
		$('.cp1fcard4').jQmCarousel1({
			autoplay: false,
			autoplayTimeout: 6000,
			margin: 22,
			responsive: {
				000: { items: 2 },
				640: { items: 3 },
				960: { items: 4 },
				1260: { items: 4 }
			}
		});
	});
/*]]>*/</script>


<!-- cp1fcard3 -->
<div class="cp1fcard3">
<div class="wrap1">
	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234 gap22px" id="div_history_list">
        @if (count($otherHistoryList))
            @foreach ($otherHistoryList as $otherHistory)
            <div class="item column">
                <div class="w1">
                    <a href="{{ route('sub.video.video_detail', ['uid' => $otherHistory->video_id]) }}" class="a1" history_idx="{{ $otherHistory->idx }}">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="https://img.youtube.com/vi/{{ $otherHistory->video_id }}/mqdefault.jpg" alt="{{ $otherHistory->subject }}">
                            </span>
                            <i class="ic1 play">Play</i>
                        </div>
                        <div class="tg1">
                            <strong class="t1">{{ $otherHistory->subject }}</strong>
                        </div>
                        <div class="tg2">
                            <span class="t2">{{ $otherHistory->channel }}</span>
                            <span class="t3">조회수 {{ $otherHistory->like_cnt }}회</span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        @else
        <div class="item column">
            <span>영상 정보가 없습니다.</span>
        </div>
        @endif
	</div>
	<!-- /lst1 -->

    @if (count($otherHistoryList) > 7)
	<!-- cp1more1 -->
	<div class="cp1more1" id="div_more_btn">
		<a href="javascript:void(0);" class="more" id="more_history_btn">
			<span class="t1">더보기</span>
			<i class="ic1"></i>
		</a>
	</div>
	<!-- /cp1more1 -->
    @endif

</div>
</div>
<!-- /cp1fcard3 -->


<script>/*<![CDATA[*/
	$(function(){

        // 영상 더보기
        $('#more_history_btn').on('click', function(){
            var lastHistoryIdx = $('#div_history_list .a1').last().attr('history_idx');
            var type = $('#select_filter').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'json',
                url: "{{ route('sub.video.get_more_video_history') }}",
                data: {
                    'last_history_idx': lastHistoryIdx,
                    'type': type
                },
                // contentType: false,
                // processData: false,
                success: (data) => {
                    if (data.status == 'success') {
                        // alert('done!');

                        // 쿼리 확인
                        // console.log(data.query);

                        if (data.resData.length != 0) {
                            // console.log(data.resData);

                            $('#div_history_list').append(data.resData);

                            // 조회된 영상 수가 8개 미만일 경우 더보기 버튼 숨김
                            if (data.isShowMore) {
                                $('#div_more_btn').show();
                            } else {
                                $('#div_more_btn').hide();
                            }
                        }

                        // 조회된 영상이 없을 경우 더보기 버튼 숨김
                        if (data.count == 0) {
                            $('#div_more_btn').hide();
                        }

                    } else {
                        alert('영상 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                        console.log('code: ' + data.code + '\nmessage: ' + data.msg);
                    }
                },
                error: function(request, status, error) {
                    console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
                },
                complete: function(data) {
                    //
                }
            });
        });
	});
/*]]>*/</script>


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
$(function() {
    $('#select_filter').change(function() {
        var type = $(this).val();

        if (type == 'like') {
            location.href='{{ route('sub.video.video_play_history', ["type" => "like"]) }}';

        } else {
            location.href='{{ route('sub.video.video_play_history') }}';
        }
    });
});
</script>
@endsection
