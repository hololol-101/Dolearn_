@php
    $commonPath = '/_res/dolearn';
    $sitePath = '/_res/manage1';
@endphp

<div id="skipnav">
	<ul>
	<li><a href="#body">본문 바로가기</a></li>
	</ul>
</div><hr class="dpn" />


<!-- #container -->
<div id="container" tabindex="-1">
<noscript><p class="noscript">JavaScript has been disabled. This site requires JavaScript for full functionality, please enable.</p></noscript>


<!-- #head -->
<div id="head" class="init">
<!-- #head_s1 -->
<div id="head_s1" class="clearfix">
<!-- container -->
<div class="container">


<h1 class="blind">강좌관리상세</h1>


</div>
<!-- /container -->
</div>
<!-- /head_s1 -->
<!-- #head_s2 -->
<div id="head_s2" class="clearfix">
<!-- container -->
<div class="container">


<!-- gn1 -->
<div id="gn1">
	<a href="{{ route('manage.instructor.operation_lecture', ['role' => 'instructor']) }}" class="a1" title="운영강좌로 이동"><span class="ic1"></span> <span class="t1">돌아가기</span></a>
</div>
<!-- /gn1 -->


<!-- head_title -->
<div id="head_title">
	<div class="f1">
		<div class="f1p1">
			<img src="{{ asset('assets/images/lib/noimg1_manage.png') }}" alt="★대체텍스트필수" />
		</div>
	</div>
	<h2 class="h1">강좌 이름이 표시됩니다</h2>
</div>
<!-- /head_title -->


<!-- tnb1 [JS] -->
<div id="tnb1">
	<h3 class="blind">주 메뉴</h3>
	<strong class="h1"><a href="#tnb1c" class="b1 toggle"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">여닫기</span></a></strong>
	<!-- tnb1c -->
	<div id="tnb1c"><div class="bg"></div>
	<!-- cont -->
	<div class="cont"><div class="bg"></div>
		<!-- <a href="#tnb1c" class="b2 close"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">닫기</span></a> -->
		<!-- d1 -->
		<div class="d1">
			<ul>
			<li class="m1">
				<a href="#"><span class="t1">강좌 정보</span></a>
				<div class="d2">
					<ul>
                    <li class="m1">
                        <a href="{{ route('manage.lecture.lecture_info') }}"><span class="t1">강좌 정보</span></a>
                    </li>
                    <li class="m2">
                        <a href="{{ route('manage.lecture.lecture_settings') }}"><span class="t1">강좌 설정</span></a>
                    </li>
                    <li class="m3">
                        <a href="{{ route('manage.lecture.curriculum') }}"><span class="t1">커리큘럼</span></a>
                    </li>
					</ul>
				</div>
			</li>
			<li class="m2">
				<a href="#"><span class="t1">문제 및 시험 관리</span></a>
				<div class="d2">
					<ul>
					<li class="m1">
						<a href="{{ route('manage.lecture.question_management') }}"><span class="t1">문제 관리</span></a>
					</li>
					<li class="m2">
						<a href="{{ route('manage.lecture.exam_task_management') }}"><span class="t1">시험/과제 목록</span></a>
					</li>
					</ul>
				</div>
			</li>
			<li class="m3">
				<a href="#"><span class="t1">수강자 관리</span></a>
				<div class="d2">
					<ul>
					<li class="m1">
						<a href="{{ route('manage.lecture.student_management') }}"><span class="t1">수강자 관리</span></a>
					</li>
					</ul>
				</div>
			</li>
			</ul>
		</div>
		<!-- /d1 -->
		<!-- <a href="#tnb1c" class="b2 close"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">닫기</span></a> -->
	</div>
	<!-- /cont -->
	</div>
	<!-- /tnb1c -->

</div>
<!-- /tnb1 -->
<script>/*<![CDATA[*/
	$(function(){
		makeActive2ClickHover2('#tnb1'); // 주메뉴 동작 호출
		// 현재활성
		$('#tnb1 div.d1>ul>li.m' + {{ $d1n }}).addClass('on'); // 1차
		$('#tnb1 div.d1>ul>li.on>div.d2>ul>li.m' + {{ $d2n }}).addClass('on'); // 2차
	});
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /head_s2 -->
</div><hr class="dpn" />
<!-- /#head -->
