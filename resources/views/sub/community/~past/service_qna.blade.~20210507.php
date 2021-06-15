<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210315 | @m | 요구반영. 결함개선. 고도화.
 * ~20210317 | @m |
 */
-->
@extends('master_sub')

@section('title', '커뮤니티 - 서비스 문의')

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
				<i class="sep">|</i>
				<a href="javascript:void(0);" class="a1"><i class="t1">서비스문의</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

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


<!-- cp1tabs1 -->
<div id="cp1tabs1" class="cp1tabs1 mgt1em mgb3em">
	<ul>
	<li class="m1 column on"><a href="{{ route('sub.community.service_qna', ['type' => 'all']) }}" style="min-width:4em;"><span class="t1">전체</span><i class="ic1"></i></a></li>
	<li class="m2 column"><a href="{{ route('sub.community.service_qna', ['type' => 'general']) }}" style="min-width:4em;"><span class="t1">일반</span><i class="ic1"></i></a></li>
	<li class="m3 column"><a href="{{ route('sub.community.service_qna', ['type' => 'instructor']) }}" style="min-width:4em;"><span class="t1">강사</span><i class="ic1"></i></a></li>
	<li class="m4 column"><a href="{{ route('sub.community.service_qna', ['type' => 'student']) }}" style="min-width:4em;"><span class="t1">수강자</span><i class="ic1"></i></a></li>
	<li class="m5 column"><a href="{{ route('sub.community.service_qna', ['type' => 'payment']) }}" style="min-width:4em;"><span class="t1">결제</span><i class="ic1"></i></a></li>
	</ul>
</div>
<!-- /cp1tabs1 -->


<!-- cp1qna1 -->
<div class="cp1qna1">
	<ul class="dl1">
		<li class="di1">
			<a href="#?" class="dt1">
				자주 묻는 질문 제목이 표시됩니다.
			</a>
			<div class="dd1">
				자주 묻는 질문에 대한 답변입니다.
			</div>
		</li>
		<li class="di1">
			<a href="#?" class="dt1">
				일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
			</a>
			<div class="dd1">
				일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
			</div>
		</li>
		<li class="di1">
			<a href="#?" class="dt1">
				자주 묻는 질문 제목이 표시됩니다.
			</a>
			<div class="dd1">
				자주 묻는 질문에 대한 답변입니다.
			</div>
		</li>
		<li class="di1">
			<a href="#?" class="dt1">
				자주 묻는 질문 제목이 표시됩니다.
			</a>
			<div class="dd1">
				자주 묻는 질문에 대한 답변입니다.
			</div>
		</li>
	</ul>
</div>
<!-- /cp1qna1 -->

<script>/*<![CDATA[*/
	$(function(){
		/** ◇◆ 질문답변아코디언. 20210317. @m.
		 */
		(function(){
			var my = '.cp1qna1',
				item = '.di1',
				q = '.dt1',
				a = '.dd1';
			$(my).on('click', item, function(e){
				e.preventDefault();
				//$(this).find(a).slideToggle(); // 나만 활성 토글
				// 나는 활성 형제는 비활성
				if( $(this).find(a).is(':hidden') ){
					$(this).find(a).slideDown().end().siblings().find(a).slideUp();
				}else{
					$(this).find(a).slideUp();
				}
			});
		})();
	});
/*]]>*/</script>


<div class="dpf fww jcsb aic">
	<div class="mgt1em mgb1em">
		<h2 class="hb1 h2 mg0">더 궁금한 점이 있으신가요?</h2>
		1:1 문의하기에 남겨주시면 답변 드리겠습니다.
	</div>
	<div>
		<a href="{{ route('sub.community.one_to_one') }}" class="button primary round w10em fw6 fsB8 semismall">1:1 문의하기</a>
	</div>
</div>


<h3 class="hb1 h4">나의 문의 내역</h3>

<div class="pdt15em pdb15em bdt1px bdb1px">
    <div class="dpf jcc aic" style="min-height:8em;">
		<a href="{{ route('sub.community.one_to_one_detail') }}">1:1 문의 내역 상세 페이지</a>
	</div>
	<!-- 문의 내역이 있습니다.
	일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
	일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
	일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
	일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
	일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
	일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
	일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십 -->
	<div class="dpf jcc aic" style="min-height:8em;">
		문의 내역이 없습니다.
	</div>
</div>


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
