<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210103 | @m | 요구반영. 결함개선. 고도화.
 * ~20210114 | @m |
 * 20210414 | @m | 요구반영
 * 20210507 | @m |
 * 20210604 | @m |
 */
-->
@extends('master_sub')

@section('title', '강좌상세')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

<!-- width1wrap1 -->
<div class="width1wrap1 type2">

<!-- cp1view1 -->
<div class="cp1view1">
	<div class="width1wrap2">
		<a href="javascript:history.back();" class="cp1b1close1"><i class="ic1"></i><span class="t1">닫기</span></a>
	</div>

	<!-- w1video -->
	<div class="w1video">
		<div class="flex1wrap1">
            @if ($lectureDetail->main_video_id != '')
            <iframe name="youtube_fr" id="display_fr" style="width:100%;height:100%;border:0;" src="https://www.youtube.com/embed/{{ $lectureDetail->main_video_id }}" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            @else
                @if ($lectureDetail->save_thumbnail != '')
                <img src="{{ asset('storage/uploads/thumbnail/'.$lectureDetail->save_thumbnail) }}" alt="{{ $lectureDetail->title }}" />
                @else
                <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                @endif
            @endif
			{{-- <video class="video" controls="controls" poster="{{ asset('assets/images/lib/x2/x2p1001.jpg') }}" src="http://content.jwplatform.com/videos/HkauGhRi-640.mp4">
				<div class="alternativeContent">
					<p>Your browser does not support the video element.</p>
				</div>
			</video> --}}
			<!-- <i class="ic1 play">Play</i> -->
		</div>
	</div>
	<!-- /w1video -->

	<div class="w1">
		<div class="w1w1">
			<div class="tg1">
				<strong class="t1">{{ $lectureDetail->title }}</strong>
			</div>
			<div class="ratings">
				<strong class="t1 blind">별점</strong>
				<i class="star5rating1">
					<i class="st-on" style="width:@if ($reviewAllCnt != 0) {{ round(($ratingSum / $reviewAllCnt)) * 20 }}% @else 0% @endif;"><i class="ic1"></i></i><!-- (3.5/5) -->
					<i class="st-off" style="width:100%;"><i class="ic2"></i></i><!-- (100-70) -->
				</i>
				<span class="t2">
					(<span class="t2t1">평점</span> <span class="t2t2">@if ($reviewAllCnt != 0) {{ round(($ratingSum / $reviewAllCnt)) }}점 @else 0점 @endif</span>)
				</span>
				<span class="t3">
					<span class="t3t1">수강후기</span> <span class="t3t2">{{ $reviewAllCnt }}개</span>
				</span>
			</div>
			<div class="tg2">
				<b class="t2">{{ $lectureDetail->category_1 }}</b>
                @if($lectureDetail->category_2 != '')
                <b class="t2">{{ $lectureDetail->category_2 }}</b>
                @endif
			</div>
		</div>
		<div class="w1w2">
			<div class="tg3">
                @if ($isApplicatedLecture)
				<a href="{{ route('learning.main', ['idx' => $lectureDetail->idx]) }}" class="b1 button primary">학습하기</a>
                @else
                <a href="javascript:void(0);" class="b1 button primary" onclick="courseApplication()">수강신청하기</a>
                @endif
				<b class="t3">@if ($lectureDetail->free_yn == 'Y') 무료 @else 유료 @endif</b>
			</div>
		</div>
	</div>


</div>
<!-- /cp1view1 -->


<!-- cp1view2 -->
<div class="cp1view2">


<!-- cp1info1 -->
<div class="cp1info1">
	<div class="w1">
		<div class="w1w1">
			<div class="tg1">
				<i class="new">New</i>
				<span class="t1">
					<span class="t1t1">총 {{ $countVideo }} 강의</span>
					<i class="sep">/</i>
                    @php
                        $seconds = $lectureDetail->total_video_len;
                        $hours = floor($seconds / 3600);
                        $mins = floor($seconds / 60 % 60);
                        // $secs = floor($seconds % 60);
                    @endphp
					<span class="t1t2">총 {{ $hours }}시간 @if ($mins != 0) {{ $mins }}분 @endif</span>
				</span>
			</div>
			<div class="tg2">
				<b class="g1"><span class="g1t1">Top</span><span class="g1t2">10</span></b>
				<span class="t2">지금 뜨는 강좌 순위 3위</span>
			</div>
			<div class="tg3">
				{{ $lectureDetail->description }}
			</div>
		</div>
		<div class="w1w2">
			<!-- cp1menu1 -->
			<div class="cp1menu1 toggle1s1">
				<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
				<div class="cp1menu1c toggle-c">
					<a href="#layer1report1video1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
				</div>
			</div>
			<!-- /cp1menu1 -->
			<ul class="cp1dl1">
                <li class="di1">
                    <span class="dt1">강사명</span> <span class="sep">:</span>
                    <span class="dd1"><a href="{{ route('etc.user_introduction', ['type' => $instructorInfo->role, 'user_idx' => $instructorInfo->id]) }}" class="a1">{{ $lectureDetail->owner_name }}</a></span>
                </li>
                <li class="di1">
                    <span class="dt1">난이도</span> <span class="sep">:</span>
                    <span class="dd1">@if ($lectureDetail->level == 'low') 초급 @elseif ($lectureDetail->level == 'medium') 중급 @else 중급이상 @endif </span>
                </li>
                @if ($lectureDetail->certificate_yn == 'Y')
                <li class="di1">
                    <span class="dd1">
                        <span class="dpib">수료증 발급 가능</span>
                    </span>
                </li>
                @endif
                @if ($lectureDetail->secret_question_yn == 'Y')
                <li class="di1">
                    <span class="dd1">
                        <span class="dpib">비공개 질문 가능</span>
                    </span>
                </li>
                @endif
			</ul>
		</div>
	</div>
</div>
<!-- /cp1info1 -->


<!-- (레이어팝업) -->
@include('sub.lecture.inc_layer_report_video')


<!-- cp1tabs1 -->
<div id="cp1tabs1" class="cp1tabs1">
	<ul>
	<li class="m1 column"><a href="#cp1tabs1pane1" class="mj-smooth1scroll1"><span class="t1">강좌소개</span><i class="ic1"></i></a></li>
	<li class="m2 column"><a href="#cp1tabs1pane2" class="mj-smooth1scroll1"><span class="t1">커리큘럼</span><i class="ic1"></i></a></li>
    {{-- <li class="m3 column"><a href="#cp1tabs1pane3" class="mj-smooth1scroll1"><span class="t1">질문게시판</span><i class="ic1"></i></a></li> --}}
	<li class="m3 column"><a href="#cp1tabs1pane4" class="mj-smooth1scroll1"><span class="t1">수강후기</span><i class="ic1"></i></a></li>
	<li class="m4 column"><a href="#cp1tabs1pane5" class="mj-smooth1scroll1"><span class="t1">공지사항</span><i class="ic1"></i></a></li>
	</ul>
</div>
<!-- /cp1tabs1 -->


<!-- cp1tabs1cont -->
<div id="cp1tabs1cont" class="cp1tabs1cont">

<!-- 강좌 소개 -->
<div id="cp1tabs1pane1" class="cp1tabs1pane">
    @include('sub.lecture.inc_lecture_intro')
</div>

<!-- 커리큘럼 -->
<div id="cp1tabs1pane2" class="cp1tabs1pane">
    @include('sub.lecture.inc_lecture_curriculum')
</div>

<!-- 질문 게시판 -->
{{-- <div id="cp1tabs1pane3" class="cp1tabs1pane">
    @include('sub.lecture.inc_lecture_qna')
    <!-- (레이어팝업) -->
    @include('sub.lecture.inc_layer_question')
</div> --}}

<!-- 수강 후기 -->
<div id="cp1tabs1pane4" class="cp1tabs1pane">
    @include('sub.lecture.inc_lecture_review')
</div>

<!-- 공지 사항 -->
<div id="cp1tabs1pane5" class="cp1tabs1pane">
	@include('sub.lecture.inc_lecture_notice')
</div>
</div>
<!-- /cp1tabs1cont -->

<script>/*<![CDATA[*/
	// 20210112.
	//makeShow('#cp1tabs1', '#cp1tabs1pane1');
	//makeActive('#cp1tabs1', '.m1');
/*]]>*/</script>

</div>
<!-- /cp1view2 -->

</div>
<!-- /width1wrap1 -->

</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection

@section('script')
<script>
$(function() {
    //
});

// 수강 신청
function courseApplication() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: '{{ route('sub.lecture.course_application') }}',
        data: {
            'lecture_idx': '{{ $_GET['idx'] }}'
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                alert('수강신청이 완료되었습니다. 수강신청한 강좌는 수강강좌 메뉴에서 수강하실 수 있습니다.');
                return false;
                // location.href='{{ route('sub.lecture.lecture_list') }}';

            } else if (data.status == 'exist') {
                alert('이미 수강신청한 강좌입니다.');
                return false;
            }
        },
        error: function(request, status, error) {
            console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
        },
        complete: function(data) {
            //
        }
    });
}

// 리뷰 더보기
function getMoreReview() {
    var lectureIdx = '{{ $_GET['idx'] }}';
    var lastReviewIdx = $('#review_list .w1').last().attr('review_idx');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: '{{ route('sub.lecture.get_more_review') }}',
        data: {
            'lecture_idx': lectureIdx,
            'last_review_idx': lastReviewIdx
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // 쿼리 확인용
                // console.log(data.query);

                if (data.resData.length != 0) {
                    $('#review_list').append(data.resData);

                    // 조회된 후기 수가 3개 미만일 경우 더보기 버튼 숨김
                    if (data.isShowMore) {
                        $('#more_review_btn').show();
                    } else {
                        $('#more_review_btn').hide();
                    }
                }

                // 조회된 후기가 없을 경우 더보기 버튼 숨김
                if (data.count == 0) {
                    $('#more_review_btn').hide();
                }

            } else {
                alert('후기 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
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
}
</script>
@endsection
