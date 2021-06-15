<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210202 | @m | 요구반영. 결함개선. 고도화.
 * ~20210210~20210218 | @m |
 * 20210406 | @m | 요구반영
 */
-->
@php
    $recent = isset($_GET['recent']) ? $_GET['recent'] : '';
    $status = isset($_GET['status']) ? $_GET['status'] : '';
@endphp

@extends('master_sub')

@section('title', '학습관리 - 수강강좌')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

<!-- 사용자 별 분기 필요 role = student, instructor, youtuber -->
@include('inc.common.inc_layer_sitemap')

<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="javascript:void(0);" class="a1"><i class="t1">학습관리</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">수강 강좌</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.management.learning_lecture_list') }}">수강 강좌</a></li>
			<!-- <li><a href="{{-- route('sub.management.lecture_note_list') --}}">강좌노트</a></li> -->
			<li><a href="{{ route('sub.management.my_question_list') }}">내 질문</a></li>
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


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">





<!-- cp1row2 -->
<div class="cp1row2 fww">
	<div class="w1 mgb15em">
		<select class="select mgr05em" id="select_recent" onchange="selectSearch('recent')" title="정렬">
			<option value="learn" @if ($recent == 'learn') selected @endif>최근학습</option>
			<option value="application" @if ($recent == 'application') selected @endif>최근 수강신청</option>
		</select>
		<select class="select mgr05em" id="select_status" onchange="selectSearch('status')" title="구분">
			<option value="">전체</option>
			<option value="active" @if ($status == 'active') selected @endif>학습중</option>
			<option value="complete" @if ($status == 'complete') selected @endif>수강완료</option>
		</select>
	</div>
	<div class="w2 mgb15em tar">
        {{-- TODO: 2차 --}}
		{{-- <a href="#layer1certificate1" class="button ic1t1 toggle" data-send-focus="that"><i class="ic1 certificate"></i><span class="t1">수강확인증</span></a>
		<a href="#layer1certificate2" class="button ic1t1 toggle mgl05em" data-send-focus="that"><i class="ic1 certificate"></i><span class="t1">수료증</span></a> --}}

		<script>/*<![CDATA[*/
			$(function(){
				// 레이어팝업 템플릿 바로 확인
				//$('[href="#layer1certificate1"]').triggerHandler('click');
				//$('[href="#layer1certificate2"]').triggerHandler('click');
			});
		/*]]>*/</script>

	</div>
</div>
<!-- /cp1row2 -->


<!-- (레이어팝업.수강확인증) -->
@include('sub.management.inc_layer_cert_confirmation')
<!-- (레이어팝업.수료증) -->
@include('sub.management.inc_layer_cert_completion')


<!-- cp1fcard5 -->
<div class="cp1fcard5">
<div class="wrap1">
	<ul class="lst1 even-grid evenmix-234 gap22px">
        @if (count($myLectureList) > 0)
            @foreach ($myLectureList as $myLecture)
            <li class="item column">
                <div class="w1">
                    <a href="{{ route('learning.main', ['idx' => $myLecture->idx]) }}" class="a1">
                        <div class="f1">
                            <span class="f1p1">
                                @if ($myLecture->save_thumbnail != '')
                                <img src="{{ asset('storage/uploads/thumbnail/'.$myLecture->save_thumbnail) }}" alt="{{ $myLecture->title }}" />
                                @else
                                <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                                @endif
                            </span>
                            {{-- <i class="ic1 play">Play</i> --}}
                        </div>
                        <div class="g1">
                            {{-- 학습 진행률 progress bar --}}
                            <i class="g1b1" style="width:{{ round(($myLecture->complete_video_cnt / $myLecture->video_cnt) * 100) }}%;"></i>
                        </div>
                        <div class="tg1">
                            <strong class="t1">{{ $myLecture->title }}</strong>
                            <div class="t2">
                                @php
                                    // 총 영상 재생시간
                                    if (date('H', strtotime($myLecture->total_video_len)) < 1) {
                                        $totalVideoLen = date('i:s', strtotime($myLecture->total_video_len));
                                    } else {
                                        $totalVideoLen = $myLecture->total_video_len;
                                    }

                                    // 현재 영상 학습시간
                                    if ($myLecture->current_video_time != '') {
                                        if (date('H', strtotime($myLecture->current_video_time)) < 1) {
                                            $currentVideoTime = date('i:s', strtotime($myLecture->current_video_time));
                                        } else {
                                            $currentVideoTime = $myLecture->current_video_time;
                                        }
                                    } else {
                                        $currentVideoTime = '--';
                                    }
                                @endphp
                                <span class="t2t1">{{ $currentVideoTime }}</span> <i class="sep">/</i> <span class="t2t2">{{ $totalVideoLen }}</span>
                            </div>
                            <div class="t3">
                                <span class="t3t1">{{ $myLecture->complete_video_cnt }}강</span> <i class="sep">/</i> <span class="t3t2">{{ $myLecture->video_cnt }}강</span>
                                <b class="t3t3">{{ round(($myLecture->complete_video_cnt / $myLecture->video_cnt) * 100) }}%</b>
                            </div>
                        </div>
                    </a>
                    {{-- 학습 기록이 있으면 이어보기 --}}
                    @if ($myLecture->current_video_time != '')
                    <a href="{{ route('learning.main', ['idx' => $myLecture->idx]) }}" class="b1">
                        <span class="b1t1">이어보기</span>
                    </a>
                    @else
                    <a href="{{ route('learning.main', ['idx' => $myLecture->idx]) }}" class="b1">
                        <span class="b1t1">학습하기</span>
                    </a>
                    @endif
                </div>
            </li>
            @endforeach
        @else
            <br>수강중인 강좌 정보가 없습니다.
        @endif
	</ul>
</div>
</div>
<!-- /cp1fcard5 -->


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
    //
});

// selectbox 조건부 검색
function selectSearch(searchType) {
    if (searchType == 'recent') {
        location.href='/sub/management/learning_lecture_list?recent=' + $('#select_recent option:selected').val();
    } else if (searchType == 'status') {
        location.href='/sub/management/learning_lecture_list?status=' + $('#select_status option:selected').val();
    } else {
        location.href='/sub/lecture/lecture_list';
    }
}
</script>
@endsection
