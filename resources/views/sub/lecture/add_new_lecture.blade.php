<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210215 | @m | 요구반영. 결함개선. 고도화.
 * ~20210318~20210302 | @m |
 * 20210412 | @m | 요구반영
 * 20210504 | @m | 결함개선
 * 20210525 | @m | 
 * 20210601 | @m | 
 */
-->
@php
$step = isset($_GET['step']) ? $_GET['step'] : '';
$isFree = isset($_GET['is_free']) ? $_GET['is_free'] : '';
$title = '';

if ($step == '' || $step == 'basic_info') {
    $title = '기본정보';

} else if ($step == 'introduce') {
    $title = '강좌소개';

} else if ($step == 'curriculum') {
    $title = '커리큘럼';

} else if ($step == 'preview') {
    $title = '미리보기';
}
@endphp

@extends('master_sub')

@section('title', '새 강좌 만들기 - '.$title)

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- width2wrap1 -->
<div class="width2wrap1 bgc2">
<!-- container -->
<div class="container clearfix">


<!-- even-grid -->
<div class="even-grid gap0 vgap00">
	<div class="small-12 medium-12 large-3 column tal vam">
		<a href="{{ url('/') }}" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
		<h2 class="hb1 h1 mgt025em mgb025em">새 강좌 만들기</h2>
	</div>
	<div class="small-12 medium-8 large-6 column tac vam">
		<!-- cp1step1 -->
		<div class="cp1step1">
			<strong class="blind">진행 단계</strong>
			<ol class="w1step">
			<li class="step @if ($step == '' || $step == 'basic_info') on @endif" title="현재 진행 단계">기본정보</li>
			<li class="step @if ($step == 'introduce') on @endif">강좌소개</li>
			<li class="step @if ($step == 'curriculum') on @endif">커리큘럼</li>
			<li class="step @if ($step == 'preview') on @endif">미리보기</li>
			</ol>
		</div>
		<!-- /cp1step1 -->
	</div>
	<div class="small-12 medium-4 large-3 column tar vam">
		{{-- <a href="{{ route('sub.lecture.add_new_lecture', ['step' => 'introduce']) }}" class="button t1ic1 mgl0375em fsS1"><span class="t1">저장 후 다음</span> <i class="ic1 next"></i></a> --}}
        @if ($step == '' || $step == 'basic_info')
            <a href="javascript:void(0);" onclick="saveAndGoNextStep('introduce')" class="button t1ic1 mgl0375em fsS1"><span class="t1">저장 후 다음</span> <i class="ic1 next"></i></a>
        @elseif ($step == 'introduce')
            <a href="javascript:void(0);" onclick="saveAndGoNextStep('basic_info')" class="button ic1t1 mgl0375em fsS1"><i class="ic1 prev"></i> <span class="t1">저장 후 이전</span></a>
            <a href="javascript:void(0);" onclick="saveAndGoNextStep('curriculum')" class="button ic1t1 mgl0375em fsS1"><span class="t1">저장 후 다음</span> <i class="ic1 next"></i></a>
        @elseif ($step == 'curriculum')
            <a href="javascript:void(0);" onclick="saveAndGoNextStep('introduce')" class="button ic1t1 mgl0375em fsS1"><i class="ic1 prev"></i> <span class="t1">저장 후 이전</span></a>
            <a href="javascript:void(0);" onclick="saveAndGoNextStep('preview')" class="button t1ic1 mgl0375em fsS1"><span class="t1">저장 후 다음</span> <i class="ic1 next"></i></a>
        @elseif ($step == 'preview')
            <a href="javascript:history.back();" onclick="" class="button ic1t1 mgl0375em fsS1"><i class="ic1 prev mgl-0375em mgr0375em"></i> <span class="t1">이전</span></a>
            <a href="javascript:void(0);" class="button mgl0375em fsS1 pdl1em pdr1em" onclick="addNewLectureFinal()"><span class="t1">생성하기</span></a>
        @endif
	</div>
</div>
<!-- /even-grid -->


</div>
<!-- /container -->
</div>
<!-- /width2wrap1 -->

@yield('sub_content')

</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection

@section('script')

@yield('sub_script')

@endsection
