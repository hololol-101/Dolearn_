<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210120 | @m | 요구반영. 결함개선. 고도화.
 * ~20210122 | @m |
 */
-->
@extends('master_learning')

@section('title', '강좌학습 - 목차')

@section('content')

<? $d1n = '1'; // 1차활성 ?>

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

@include('learning.inc_video')

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


<!-- cp2info1 -->
<div class="cp2info1">
	<div class="w1">
		<div class="w1w1">
			<div class="tg1">
				<div class="t1">
					<span class="t1t1">진도율 :</span>
					<span class="t1t2">10강</span> <i class="sep">/</i> <span class="t1t3">40강</span>
					<span class="t1t4">(75%)</span>
				</div>
				<div class="g1">
					<i class="g1b1" style="width:75%;"></i>
				</div>
			</div>
		</div>
		<div class="w1w2">
			<a class="b1" title="비활성">수강후기 작성</a>
			<!-- <a href="?#★" class="b1">수강후기 작성</a> -->
		</div>
	</div>
</div>
<!-- /cp2info1 -->

@include('learning.inc_list')

</div>
<!-- /aside_content -->
</div>
<!-- /#aside -->
@endsection
