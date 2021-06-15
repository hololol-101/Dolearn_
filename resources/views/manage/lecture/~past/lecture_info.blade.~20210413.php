<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210222 | @m | 요구반영. 결함개선. 고도화.
 * ~20210304 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 강좌정보')

@section('content')

<? $d1n = '1'; $d2n = '1'; // 1차2차활성 ?>

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
	<div class="hg1">
		<i class="ic1"></i>
		<h2 class="h1">강좌 정보</h2>
	</div>
	<div class="eg1">
		<a href="{{ route('manage.lecture.lecture_info_modify') }}" class="b1 button">정보수정</a>
		<em class="g1 button primary round mgl05em">비공개</em>
		<!-- <em class="g1 button secondary round">공개</em> -->
	</div>
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


<div class="mgb1875em">
	<h3 class="hb1 h3 dpib mgt01875em mgb01875em mgr05em vat">강좌 이름이 표시됩니다.</h3>
	{{-- <div class="cp3tag1 dpib vat">
		<span class="a1">#메인주제</span>
		<span class="a1">#서브주제</span>
	</div> --}}
</div>


<!-- even-grid -->
<div class="even-grid float-left gap5pct vgap0">
	<div class="small-12 medium-4 column">


		<!-- cp3f1 -->
		<div class="cp3f1">
			<span class="f1p1">
				<img src="{{ asset('assets/images/lib/noimg1_manage.png') }}" alt="★대체텍스트필수" />
			</span>
		</div>
		<!-- /cp3f1 -->


	</div>
	<div class="small-12 medium-8 column">


		<!-- cp3dlist1 -->
		<div class="cp3dlist1">
			<ul class="dl1">
				<li class="di1 cs2">
					<b class="dt1">강좌 설명</b>
					<span class="dd1">강좌 한 줄 요약(강좌 개요, 수강대상 등) 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</span>
				</li>
				<li class="di1 cs1">
					<b class="dt1">강좌 카테고리</b>
					<span class="dd1"><span class="dpib">개발 · 프로그래밍 &gt; php</span>, <span class="dpib">개발 · 프로그래밍 &gt; php</span></span>
				</li>
				<li class="di1 cs1">
					<b class="dt1">난이도</b>
					<span class="dd1">초급</span>
				</li>
				<li class="di1 cs1">
					<b class="dt1">가격</b>
					<span class="dd1">무료</span>
				</li>
				<li class="di1 cs1">
					<b class="dt1">수강기간</b>
					<span class="dd1">제한 없음</span>
				</li>
				<li class="di1 cs2">
					<b class="dt1">강좌 URL</b>
					<span class="dd1">
						<a href="//www.dolearn.co.kr/alsdfsdg_sdf" target="_blank" rel="noopener" title="새 창" class="a1">www.dolearn.co.kr/alsdfsdg_sdf</a>
					</span>
				</li>
			</ul>
		</div>
		<!-- /cp3dlist1 -->


	</div>
</div>
<!-- /even-grid -->


<h3 class="hb1 h3">강좌 대시보드</h3>


<!-- cp3dash1 -->
<div class="cp3dash1">
	<div class="w1">

		<!-- cp3chart1 -->
		<div class="cp3chart1">
			<div class="hg1">
				<h4 class="h1">수강생 수</h4>
			</div>
			<div class="cont">
				<div class="chart">
					<canvas id="myChart2" width="400" height="300"></canvas>
				</div>
				<div class="t1">
					전체 100명
				</div>

				<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
				<script>/*<![CDATA[*/
					var ctx = document.getElementById('myChart2').getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'doughnut',
						data: {
							//labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
							labels: ['수강중', '수강완료', '인증대기중'],
							datasets: [{
								label: '# of Votes',
								//data: [22, 18, 16, 14, 8, 12],
								data: [60, 30, 10],
								//backgroundColor: ['#f00', '#08c', '#c80', '#0a0', '#66f', '#f50']
								backgroundColor: ['#1f78b4', '#a6cee3', '#b2df8a']
							}]
						},
						options: {
							tooltips: {
								bodySpacing: 20
							},
							legend: {
								position: 'bottom',
								align: 'center',
								labels: {
									usePointStyle: true
								}
							},
							scales: {
								yAxes: [{
									display: false,
									ticks: {
										beginAtZero: true
									}
								}]
							}
						}
					});
				/*]]>*/</script>


			</div>
		</div>
		<!-- /cp3chart1 -->

	</div>
	<div class="w2">

		<!-- cp3bbs1 -->
		<div class="cp3bbs1">
			<div class="hg1">
				<h4 class="h1">공지사항</h4>
				<a href="?#★" class="a3"><span class="a3t1">편집하기 &gt;</span></a>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1"><a href="?#★" class="a1"><span class="t1">엑셀 초급 강의 실시간 화상 강의 일시 공지</span> <span class="t2">2021/02/22 16:04</span></a></li>
					<li class="li1"><a href="?#★" class="a1"><span class="t1">일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십</span> <span class="t2">2021/02/22 16:04</span></a></li>
					<li class="li1"><a href="?#★" class="a1"><span class="t1">일이삼사오육칠팔구십</span> <span class="t2">2021/02/22 16:04</span></a></li>
				</ul>
			</div>
		</div>
		<!-- /cp3bbs1 -->

	</div>
	<div class="w3">

		<!-- cp3dlist2 -->
		<div class="cp3dlist2">
			<ul class="dl1">
				<li class="di1">
					<b class="dt1">완강률</b>
					<span class="dd1">30%</span>
				</li>
				<li class="di1">
					<b class="dt1">수강 평점</b>
					<span class="dd1">4.20</span>
				</li>
			</ul>
		</div>
		<!-- /cp3dlist2 -->

	</div>
	<div class="w4">

		<!-- cp3dlist2 -->
		<div class="cp3dlist2">
			<ul class="dl1">
				<li class="di1">
					<b class="dt1">문제 수</b>
					<span class="dd1">25</span>
				</li>
				<li class="di1">
					<b class="dt1">시험/과제 수</b>
					<span class="dd1">1</span>
				</li>
			</ul>
		</div>
		<!-- /cp3dlist2 -->

	</div>
	<div class="w5">

		<!-- cp3dlist2 -->
		<div class="cp3dlist2">
			<ul class="dl1">
				<li class="di1">
					<b class="dt1">미해결 질문</b>
					<span class="dd1">25</span>
				</li>
				<li class="di1">
					<b class="dt1">미채점 <span class="dpib">시험/과제</span></b>
					<span class="dd1">10</span>
				</li>
			</ul>
		</div>
		<!-- /cp3dlist2 -->

	</div>
</div>
<!-- /cp3dash1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
