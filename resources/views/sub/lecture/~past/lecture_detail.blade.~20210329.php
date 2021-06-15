<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210103 | @m | 요구반영. 결함개선. 고도화.
 * ~20210114 | @m |
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
<div class="width1wrap1">

<!-- cp1view1 -->
<div class="cp1view1">
	<div class="width1wrap2">
		<a href="{{ route('sub.lecture.lecture_list') }}" class="cp1b1close1"><i class="ic1"></i><span class="t1">닫기</span></a>
	</div>

	<!-- w1video -->
	<div class="w1video">
		<div class="flex1wrap1">
            <iframe name="youtube_fr" id="display_fr" width="100%" height="100%" src="https://www.youtube.com/embed/{{ $lectureDetail->uid }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
					<i class="st-on" style="width:{{ round($lectureDetail->rating * 20, 1) }}%;"><i class="ic1"></i></i><!-- (3.5/5) -->
					<i class="st-off" style="width:100%;"><i class="ic2"></i></i><!-- (100-70) -->
				</i>
				<span class="t2">
					(<span class="t2t1">평점</span> <span class="t2t2">{{ $lectureDetail->rating }}</span>)
				</span>
				<span class="t3">
					<span class="t3t1">수강후기</span> <span class="t3t2">30개</span>
				</span>
			</div>
			<div class="tg2">
				<b class="t2">{{ $lectureDetail->category_1 }}</b>
                @empty(!$lectureDetail->category_2)
                <b class="t2">{{ $lectureDetail->category_2 }}</b>
                @endempty
			</div>
		</div>
		<div class="w1w2">
			<div class="tg3">
				<a href="?#★" class="b1 button primary">수강신청하기</a>
				<b class="t3">무료</b>
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
					<span class="t1t1">총 30 강의</span>
					<i class="sep">/</i>
					<span class="t1t2">총 시간 10시간 10분</span>
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
				<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
				<div class="cp1menu1c toggle-c">
					<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
				</div>
			</div>
			<!-- /cp1menu1 -->
			<ul class="cp1dl1">
                <li class="di1">
                    <span class="dt1">강사명</span> <span class="sep">:</span>
                    <span class="dd1"><a href="?#★" class="a1">{{ $lectureDetail->owner_name }}</a></span>
                </li>
                <li class="di1">
                    <span class="dt1">난이도</span> <span class="sep">:</span>
                    <span class="dd1">@if ($lectureDetail->level == 'low') 초급 @elseif ($lectureDetail->level == 'medium') 중급 @else 고급 @endif </span>
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

<!-- TODO:수강신청 전/후로 분기시켜야 함 : 탭하고 아래 내용 포함(질문게시판) -->
<!-- cp1tabs1 -->
<div id="cp1tabs1" class="cp1tabs1">
	<ul>
	<li class="m1 column"><a href="#cp1tabs1pane1" class="mj-smooth1scroll1"><span class="t1">강좌소개</span><i class="ic1"></i></a></li>
	<li class="m2 column"><a href="#cp1tabs1pane2" class="mj-smooth1scroll1"><span class="t1">커리큘럼</span><i class="ic1"></i></a></li>
    <li class="m3 column"><a href="#cp1tabs1pane3" class="mj-smooth1scroll1"><span class="t1">질문게시판</span><i class="ic1"></i></a></li>
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
<div id="cp1tabs1pane3" class="cp1tabs1pane">

    @include('sub.lecture.inc_lecture_qna')
    <!-- (레이어팝업) -->
    @include('sub.lecture.inc_layer_question')

</div>

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
