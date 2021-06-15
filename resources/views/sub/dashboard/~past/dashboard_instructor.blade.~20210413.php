<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210305 | @m | 요구반영. 결함개선. 고도화.
 * ~20210308 | @m |
 */
-->
@extends('master_sub')

@section('title', '강사 마이페이지 - 대시보드')

@section('content')

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

@include('inc.common.inc_layer_sitemap')

<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="javascript:void(0);" class="a1"><i class="t1">대시보드</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">대시보드</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.dashboard.dashboard_main', ['role' => 'instructor']) }}">대시보드</a></li>
			<li><a href="{{ route('sub.dashboard.my_notification_list') }}">내 알림</a></li>
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


<!-- cp1infomenu1 -->
<div class="cp1infomenu1">
	<div class="w1">
	</div>
	<div class="w2">
		<a href="#★" class="cp1switch1 switch toggle fw4 on">
			<span class="t1 sw-off">강사 대시보드 OFF</span>
			<span class="t1 sw-on">강사 대시보드 ON</span>
			<i class="ic1"></i>
		</a>
	</div>
</div>
<!-- /cp1infomenu1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1dash4 -->
<div class="cp1dash4">
	<div class="w1">

		<!-- cp1dash3info1 -->
		<div class="cp1dash3info1">
			<div class="hg1">
				<h3 class="h1">강사님, 안녕하세요 :)</h3>
			</div>
			<div class="cont jcfe">
				<a href="{{ route('sub.lecture.add_new_lecture') }}" class="button gray4 ic1t1"><i class="ic1 add"></i> <span class="t1">새 강좌 만들기</span></a>
			</div>
		</div>
		<!-- /cp1dash3info1 -->

	</div>
	<div class="w2">


		<!-- cp1dash3info1 -->
		<div class="cp1dash3info1">
			<div class="hg1">
				<h3 class="h1">누적 수익</h3>
			</div>
			<div class="cont jcfe">
				<span class="t1">75,000,000</span>
			</div>
		</div>
		<!-- /cp1dash3info1 -->


	</div>
	<div class="w3">


		<!-- cp1dash3info1 -->
		<div class="cp1dash3info1">
			<div class="hg1">
				<h3 class="h1">운영강좌 수</h3>
			</div>
			<div class="cont jcfe">
				<span class="t1">09</span>
			</div>
		</div>
		<!-- /cp1dash3info1 -->


	</div>
	<div class="w4">


		<!-- cp1dash3info1 -->
		<div class="cp1dash3info1">
			<div class="hg1">
				<h3 class="h1">총 평점</h3>
			</div>
			<div class="cont jcfe">
				<span class="t1">4.5</span>
			</div>
		</div>
		<!-- /cp1dash3info1 -->


	</div>
	<div class="w5">


		<!-- cp1dash1chart1 -->
		<div class="cp1dash1chart1">
			<div class="hg1">
				<h4 class="h1">이번달 수익 분포</h4>
			</div>
			<div class="cont">

				<div class="mgb075em fw6 fsB14 tac">
					총 1,000,000 원
				</div>
				<div class="chart">
					<canvas id="myChart1" width="400" height="300"></canvas>
				</div>

				<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

				<script>/*<![CDATA[*/
					$(function(){
						/** ◇◆ 차트 :: 도넛. 20200308. @m.
						 * chart.js
						 */
						(function(){

							var ctx = document.getElementById('myChart1').getContext('2d');
							var myChart = new Chart(ctx, {
								type: 'doughnut',
								data: {
									labels: ['강좌제목 01', '강좌제목 02', '강좌제목 03', '나머지'],
									datasets: [{
										label: '# of Votes',
										data: [40, 30, 20, 10],
										borderWidth:8,
										borderColor:'#1a1a1a',
										backgroundColor: ['#633acb', '#5431ad', '#3d2972', '#292043']
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
											fontColor: '#ccc',
											fontSize: 14,
											padding: 16,
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

						})();
					});
				/*]]>*/</script>

			</div>
		</div>
		<!-- /cp1dash1chart1 -->


	</div>
	<div class="w6">


		<!-- cp1dash1chart1 -->
		<div class="cp1dash1chart1">
			<div class="hg1">
				<h4 class="h1">수강자 분포</h4>
			</div>
			<div class="cont">

				<div class="mgb075em fw6 fsB14 tac">
					총 120명
				</div>
				<div class="chart">
					<canvas id="myChart2" width="400" height="300"></canvas>
				</div>

				<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

				<script>/*<![CDATA[*/
					$(function(){
						/** ◇◆ 차트 :: 도넛. 20200308. @m.
						 * chart.js
						 */
						(function(){

							var ctx = document.getElementById('myChart2').getContext('2d');
							var myChart = new Chart(ctx, {
								type: 'doughnut',
								data: {
									labels: ['강좌제목 01', '강좌제목 02', '강좌제목 03', '나머지'],
									datasets: [{
										label: '# of Votes',
										data: [40, 30, 20, 10],
										borderWidth:8,
										borderColor:'#1a1a1a',
										backgroundColor: ['#44c792', '#396', '#2e7156', '#224235']
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
											fontColor: '#ccc',
											fontSize: 14,
											padding: 16,
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

						})();
					});
				/*]]>*/</script>

			</div>
		</div>
		<!-- /cp1dash1chart1 -->


	</div>
	<div class="w7">


		<!-- cp1dash1chart1 -->
		<div class="cp1dash1chart1">
			<div class="hg1">
				<h3 class="h1">수익 · 수강자 추세</h3>
				<div class="clearfix">
					<select title="선택옵션" class="type1 w5em">
						<option value="">월</option>
					</select>
				</div>
 			</div>
			<div class="cont">

				<div style="width:auto;height:auto;">
					<canvas id="myChart3" width="400" height="200"></canvas>
				</div>

				<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

				<script>/*<![CDATA[*/
					$(function(){
						/** ◇◆ 차트 :: 라인. 20200304. @m.
						 * chart.js
						 */
						(function(){

							var ctx = document.getElementById('myChart3').getContext('2d');
							var myChart = new Chart(ctx, {
								type: 'line',
								data: {
									labels: ['2020/03', '2020/04', '2020/05', '2020/06', '2020/07', '2020/08', '2020/09', '2020/10', '2020/11', '2020/12', '2020/01', '2020/02'],
									datasets: [{
										label: '수익',
										yAxisID: 'y-axis-1',
										data: [0, 180, 140, 0, 130, 270, 100, 220, 310,260, 205, 425],
										borderColor:'rgba(0,128,255, 1)',
										backgroundColor:'rgba(0,128,255, .1)',
										borderWidth: 2,
										pointRadius: 4,
										pointBackgroundColor: '#000',
										tension: .4
									},{
										label: '수강자',
										yAxisID: 'y-axis-2',
										data: [80, 220, 190, 80, 175, 300, 160, 250, 330, 295, 245, 420],
										borderColor:'rgba(0,201,121, 1)',
										backgroundColor:'rgba(0,201,121, .1)',
										borderWidth: 2,
										pointRadius: 4,
										pointBackgroundColor: '#000',
										tension: .4
									}]
								},
								options: {
									title: {
										//display: true,
										fontColor: '#ccc',
										fontSize: 16,
										text: '일일 조회수 추세'
									},
									legend: {
										//display: false, // 범례 감춤
										labels: {
											boxWidth: 6,
											fontColor: '#ccc',
											fontSize: 12,
											padding: 16,
											usePointStyle: true
										}
									},
									scales: {
										xAxes: [{
											ticks: {
												beginAtZero: true,
												padding: 16
											},
											scaleLabel: {
												//display: true,
												fontColor: '#ccc',
												fontSize: 12,
												labelString: "년/월"
											},
											gridLines: {
												color: 'rgba(255,255,255, .1)',
												drawOnChartArea: false,
												drawBorder: true,
												drawTicks: false
											}
										}],
										yAxes: [{
											id: 'y-axis-1',
											display: true,
											position: 'left',
											ticks: {
												beginAtZero: true,
												padding: 16
											},
											scaleLabel: {
												display: true,
												fontColor: '#ccc',
												fontSize: 12,
												labelString: "단위(만)"
											},
											gridLines: {
												color: 'rgba(255,255,255, .1)',
												drawBorder: false,
												drawTicks: false,
												zeroLineColor: 'rgba(255,255,255, .1)'
											}
										},{
											id: 'y-axis-2',
											display: true,
											position: 'right',
											ticks: {
												beginAtZero: true,
												padding: 16
											},
											scaleLabel: {
												display: true,
												fontColor: '#ccc',
												fontSize: 12,
												labelString: "단위(명)"
											},
											gridLines: {
												drawOnChartArea: false,
												drawTicks: false
											}
										}]
									}
								}
							});

						})();
					});
				/*]]>*/</script>

			</div>
		</div>
		<!-- /cp1dash1chart1 -->


	</div>
</div>
<!-- /cp1dash4 -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
