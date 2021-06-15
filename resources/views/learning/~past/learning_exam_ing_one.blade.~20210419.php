<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210120 | @m | 요구반영. 결함개선. 고도화.
 * ~20210126 | @m |
 */
-->
@extends('master_learning')

@section('title', '시험강의 - 문제풀이 진행중')

@section('content')

<? $d1n = '1'; // 1차활성 ?>

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

@include('learning.inc_counter')

<script>/*<![CDATA[*/
	MJS.doTimer1(1800); // 시험시간 초단위
/*]]>*/</script>


<!-- cp2question1 -->
<div class="cp2question1">
	<div class="hg1">
		<div class="fl">
			<span class="tt1 mgt1em">20문제 중 1</span>
		</div>
		<div class="fr">
		</div>
	</div>
	<ul class="lst1">
		<li class="li1">
			<div class="w1">
				<div class="tg1">
					<span class="t1">Q1. 다음 4가지 보기 중 정답을 선택하세요?</span>
					<span class="t2">20점</span>
				</div>
				<ol class="lst2">
					<li class="li2"><a href="?#★" class="a1">첫번째 보기</a></li>
					<li class="li2"><a href="?#★" class="a1">두번째 보기 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</a></li>
					<li class="li2"><a href="?#★" class="a1">세번째 보기</a></li>
					<li class="li2"><a href="?#★" class="a1">네번째 보기</a></li>
				</ol>
			</div>
		</li>
	</ul>
</div>
<!-- /cp2question1 -->
<script>/*<![CDATA[*/
	// 20210127 @m
	$('.cp2question1 .li2').on('click', function(e){
		e.preventDefault();
		$(this).addClass('on').siblings().removeClass('on');
	});
/*]]>*/</script>


<!-- infomenu1 -->
<div class="infomenu1">
	<div class="right">
		<a href="{{ url('/learning/exam?step=ing&is_one=no') }}" class="button default" title="원페이지로 문제 풀기"><i class="ic1"></i> <span class="t1">전체</span></a>
		<a href="?#★" class="button default ic1"><i class="ic1 prev"></i> <span class="t1 blind">이전 문제</span></a>
		<a href="?#★" class="button default ic1"><i class="ic1 next"></i> <span class="t1 blind">다음 문제</span></a>
	</div>
</div>
<!-- /infomenu1 -->


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
