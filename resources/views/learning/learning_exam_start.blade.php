<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210120 | @m | 요구반영. 결함개선. 고도화.
 * ~20210126 | @m |
 */
-->
@extends('master_learning')

@section('title', '강좌학습 - 시험강의')

@section('content')

<? $d1n = '1'; // 1차활성 ?>

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp2exam1 -->
<div class="cp2exam1">
	<div class="tg1">
		<strong class="t1">실전 모의고사 1회</strong>
		<span class="eg1">
			<span class="st1"><i class="ic1 question"></i> <span class="t1">총 20문제</span></span>
			<span class="st1"><i class="ic1 time"></i> <span class="t1">30분</span></span>
		</span>
	</div>
	<div class="tg2">
		<strong class="t2">&lt;수험자 유의사항&gt;</strong>
		<div class="t3">
			<ul class="bu mgt1em">
			<li>하단의 [시험 시작하기] 버튼을 누르면 시작됩니다.</li>
			<li>시험시작 후에는 사이트를 벗어나도 시험은 진행되니 참고바랍니다.</li>
			<li>답을 비워두시면 제출 후 결과지에 정답이 보이지 않으니 답을 꼭 입력해야 합니다.</li>
			<li>문제를 모두 체크한 후 [시험 제출하기] 버튼을 꼭 눌러주셔야 합니다.</li>
			</ul>
		</div>
	</div>
</div>
<!-- /cp2exam1 -->


<!-- cp2view2 -->
<div class="cp2view2">
	<!-- even-grid -->
	<div class="even-grid float-left gap2pct">
		<div class="small-6 column">
		</div>
		<div class="small-6 column tar">
			<div class="eg1">
				<!-- <a href="#★" class="cp2like1"><span class="cp2like1t1">좋아요</span> <span class="cp2like1t2">1개</span></a> -->
				<!-- cp2menu1 -->
				<div class="cp2menu1 toggle1s1">
					<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp2menu1c toggle-c">
						<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
					</div>
				</div>
				<!-- /cp2menu1 -->
			</div>
		</div>
	</div>
	<!-- /even-grid -->
</div>
<!-- /cp2view2 -->


<div class="mgt2em mgb2em tac">
	<a href="{{ route('learning.exam', ['step' => 'ing']) }}" class="button primary1 large w17em"><span class="t1">시험 시작하기</span></a>
</div>


 <!-- (레이어팝업) -->
 @include('sub.lecture.inc_layer_report_post')


</div>
<!-- /container -->
</div>
<!-- /#body -->
<!-- #aside -->
<div id="aside" tabindex="-1">
<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">목차</h2>
	<a href="?#★" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">

@include('learning.inc_info')
@include('learning.inc_list')

</div>
<!-- /aside_content -->
</div>
<!-- /#aside -->
@endsection
