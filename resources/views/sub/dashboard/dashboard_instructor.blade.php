<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210305 | @m | 요구반영. 결함개선. 고도화.
 * ~20210308 | @m |
 * 20210413 | @m | 요구반영
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
			<li><a href="{{ route('sub.dashboard.my_notification_list', ['role' => 'instructor']) }}">내 알림</a></li>
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


<!-- cp1dash5 -->
<div class="cp1dash5">
	<div class="w1">

		<!-- cp1dash3info1 -->
		<div class="cp1dash3info1">
			<div class="hg1">
				<h3 class="h1">{{ $userName }}님, 안녕하세요 :)</h3>
			</div>
			<div class="cont jcfe">
				<a href="{{ route('sub.lecture.add_new_lecture') }}" class="button block gray4 ic1t1"><i class="ic1 add"></i> <span class="t1">새 강좌 만들기</span></a>
			</div>
		</div>
		<!-- /cp1dash3info1 -->

	</div>
	<div class="w2">


		<!-- cp1dlist1 -->
		<div class="cp1dlist1">
			<ul class="dl1">
				<li class="di1">
					<div class="dt1"><span class="t1">강좌 <span class="dpib">평점</span></span></div>
					<div class="dd1"><span class="t2">4.25</span></div>
				</li>
				<li class="di1">
					<div class="dt1">
						<span class="t1 dpib mgr0125em vam">응답률</span>
						<div class="bi1 dpib fsS1 vam">
							<a href="#?" class="li1 tooltip1 mg0">
								<span class="tooltip1c w17em">
									질문 답변, 시험/과제 피드백 등 의 활동을 통해 강사가 얼마나 강좌를 활성화하고 있는지 판단할 수 있습니다.
								</span>
							</a>
						</div>
					</div>
					<div class="dd1"><span class="t2">30%</span></div>
				</li>
				<li class="di1">
					<div class="dt1"><span class="t1">수강자</span></div>
					<div class="dd1"><span class="t2">1,001</span></div>
				</li>
				<li class="di1">
					<div class="dt1"><span class="t1">강좌수</span></div>
					<div class="dd1"><span class="t2">7</span></div>
				</li>
			</ul>
		</div>
		<!-- /cp1dlist1 -->


	</div>
	<div class="w3">


		<!-- cp3chart1 -->
		<div class="cp3chart1">
			<div class="hg1 bd0">
				<h4 class="h1">수강자 수</h4>
				<select class="type1 mg0 pdt0 pdb0 pdl075em fsS2" style="height:2.2em;" title="선택옵션">
					<option value="">7일</option>
					<option value="">30일</option>
					<option value="">1년</option>
				</select>
			</div>
			<div class="cont">

				<div class="waha ls0">
					<canvas id="myChart2" width="400" height="240"></canvas>
				</div>

				<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

				<script>/*<![CDATA[*/
					$(function(){
						/** ◇◆ 차트 :: 라인 1개. 20210412. @m.
						 * chart.js
						 */
						(function(){

							var ctx = document.getElementById('myChart2').getContext('2d');
							var myChart = new Chart(ctx, {
								type: 'line',
								data: {
									labels: ['2021.04.06', '2021.04.07', '2021.04.08', '2021.04.09', '2021.04.10', '2021.04.11', '2021.04.12'],
									datasets: [{
										label: '수강자 수',
										yAxisID: 'y-axis-1',
										data: [50, 160, 190, 245, 295, 330, 420],
										borderColor:'#74b7b2',
										backgroundColor:'rgba(116,183,178, 0)',
										borderWidth: 2,
										pointRadius: 4,
										pointBackgroundColor: '#74b7b2',
										tension: 0 // .4
									}]
								},
								options: {
									title: {
										//display: true,
										fontColor: '#ccc',
										fontSize: 16,
										text: '수강자 변화량'
									},
									legend: {
										display: false, // 범례 감춤
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
												padding: 16,
												fontColor: '#888'
											},
											scaleLabel: {
												//display: true,
												fontColor: '#ccc',
												fontSize: 12,
												labelString: "년.월.일"
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
												padding: 16,
												fontColor: '#888'
											},
											scaleLabel: {
												//display: true,
												fontColor: 'rgba(0,128,255, 1)',
												fontSize: 12,
												labelString: "단위(명)"
											},
											gridLines: {
												color: 'rgba(255,255,255, .1)',
												drawBorder: false,
												drawTicks: false,
												zeroLineColor: 'rgba(255,255,255, .1)'
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
		<!-- /cp3chart1 -->


	</div>
	<div class="w4">


		<!-- cp3chart1 -->
		<div class="cp3chart1">
			<div class="hg1 bd0">
				<h4 class="h1">일일 수강신청 수</h4>
				<select class="type1 mg0 pdt0 pdb0 pdl075em fsS2" style="height:2.2em;" title="선택옵션">
					<option value="">7일</option>
					<option value="">30일</option>
					<option value="">1년</option>
				</select>
			</div>
			<div class="cont">

				<div class="waha ls0">
					<canvas id="myChart3" width="400" height="240"></canvas>
				</div>

				<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

				<script>/*<![CDATA[*/
					$(function(){
						/** ◇◆ 차트 :: 라인 1개. 20210412. @m.
						 * chart.js
						 */
						(function(){

							var ctx = document.getElementById('myChart3').getContext('2d');
							var myChart = new Chart(ctx, {
								type: 'line',
								data: {
									labels: ['2021.04.06', '2021.04.07', '2021.04.08', '2021.04.09', '2021.04.10', '2021.04.11', '2021.04.12'],
									datasets: [{
										label: '일일 수강신청 수',
										yAxisID: 'y-axis-1',
										data: [6, 7, 10, 14, 9, 12, 11],
										borderColor:'#74b7b2',
										backgroundColor:'rgba(116,183,178, 0)',
										borderWidth: 2,
										pointRadius: 4,
										pointBackgroundColor: '#74b7b2',
										tension: 0 // .4
									}]
								},
								options: {
									title: {
										//display: true,
										fontColor: '#ccc',
										fontSize: 16,
										text: '일일 수강신청 수 변화량'
									},
									legend: {
										display: false, // 범례 감춤
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
												padding: 16,
												fontColor: '#666'
											},
											scaleLabel: {
												//display: true,
												fontColor: '#ccc',
												fontSize: 12,
												labelString: "년.월.일"
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
												padding: 16,
												fontColor: '#959595'
											},
											scaleLabel: {
												//display: true,
												fontColor: 'rgba(0,128,255, 1)',
												fontSize: 12,
												labelString: "단위(명)"
											},
											gridLines: {
												color: 'rgba(255,255,255, .1)',
												drawBorder: false,
												drawTicks: false,
												zeroLineColor: 'rgba(255,255,255, .1)'
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
		<!-- /cp3chart1 -->


	</div>
	<div class="w5">


		<!-- cp1analysis1 -->
		<div class="cp1analysis1">

			<!-- scroll-x-lt-large -->
			<div class="scroll-x-lt-large fscroll1-xy">
			<div style="min-width:590px;">

				<!-- w1table -->
				<div class="w1table">
					<table class="t3 w100 ttpdtb1em fsxd lhD tttal ttvam">
						<caption>
							<strong class="h1 blind">분석표</strong>
							<span class="summary1 blind">: 강좌제목(최근 게시한 강좌 7개), 평점(5점 만점), 수강후기 worst, 수강후기 best</span>
						</caption>
						<thead>
						<tr>
						<th scope="col" style="width:25%;"><strong class="fw4 fsB3">강좌제목</strong> <span class="dpib fs12px">(최근 게시한 강좌 7개)</span></th>
						<th scope="col" style="width:25%;"><strong class="fw4 fsB3">평점</strong> <span class="dpib fs12px">(5점 만점)</span></th>
						<th scope="col" style="width:25%;"><strong class="fw4 fsB3">수강후기 worst</strong></th>
						<th scope="col" style="width:25%;"><strong class="fw4 fsB3">수강후기 best</strong></th>
						</tr>
						</thead>
						<tbody>
						<tr>
						<th scope="row">10분 동안 즐기는 딥러닝</th>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						</tr>
						<tr>
						<th scope="row">인공지능에 대해 알아볼까요?</th>
						<td class="pdl0">
							<div class="cp1chart1bar3 on">
								<div class="graph">
									<i class="track"><i class="bar" style="width: 80%;"><span class="data">4.0</span></i></i>
								</div>
							</div>
						</td>
						<td class="fs12px">이게 과연 초급자를 기준으로 만들어진 강의가 맞나요...? ㅋㅋ</td>
						<td class="fs12px">세밀하게 콕콕 집어주셔서 진심으로 고마워요~</td>
						</tr>
						<tr>
						<th scope="row">수학 없는 인공지능 [딥러닝]</th>
						<td class="pdl0">
							<div class="cp1chart1bar3 on">
								<div class="graph">
									<i class="track"><i class="bar" style="width: 85%;"><span class="data">4.25</span></i></i>
								</div>
							</div>
						</td>
						<td class="fs12px">음.. 쉬운 설명이 아니네요.</td>
						<td class="fs12px">중간중간 개념이 애매하게 이해되는 것들이 있었지만 전체적으로 잘 따라오게 설명해...</td>
						</tr>
						<tr>
						<th scope="row">데이터분석과 텍스트마이닝</th>
						<td class="pdl0">
							<div class="cp1chart1bar3 on">
								<div class="graph">
									<!-- (최소값 s1) -->
									<i class="track s1"><i class="bar" style="width: 60%;"><span class="data">3.0</span></i></i>
								</div>
							</div>
						</td>
						<td class="fs12px">이게 과연 초급자를 기준으로 만들어진 강의가 맞나요...? ㅋㅋ</td>
						<td class="fs12px">세밀하게 콕콕 집어주셔서 진심으로 고마워요~</td>
						</tr>
						<tr>
						<th scope="row">제대로 배우자, Data Mining</th>
						<td class="pdl0">
							<div class="cp1chart1bar3 on">
								<div class="graph">
									<!-- (최대값 s2) -->
									<i class="track s2"><i class="bar" style="width: 100%;"><span class="data">5.0</span></i></i>
								</div>
							</div>
						</td>
						<td class="fs12px">음.. 쉬운 설명이 아니네요.</td>
						<td class="fs12px">중간중간 개념이 애매하게 이해되는 것들이 있었지만 전체적으로 잘 따라오게 설명해...</td>
						</tr>
						<tr>
						<th scope="row">CSS 기초 이론 강좌</th>
						<td class="pdl0">
							<div class="cp1chart1bar3 on">
								<div class="graph">
									<i class="track"><i class="bar" style="width: 85%;"><span class="data">4.25</span></i></i>
								</div>
							</div>
						</td>
						<td class="fs12px">음.. 쉬운 설명이 아니네요.</td>
						<td class="fs12px">중간중간 개념이 애매하게 이해되는 것들이 있었지만 전체적으로 잘 따라오게 설명해...</td>
						</tr>
						<tr>
						<th scope="row">[중급 예제] HTML + CSS + JQUERY 프론트엔드 퍼블리싱</th>
						<td class="pdl0">
							<div class="cp1chart1bar3 on">
								<div class="graph">
									<i class="track"><i class="bar" style="width: 90%;"><span class="data">4.5</span></i></i>
								</div>
							</div>
						</td>
						<td class="fs12px">이게 과연 초급자를 기준으로 만들어진 강의가 맞나요...? ㅋㅋ</td>
						<td class="fs12px">세밀하게 콕콕 집어주셔서 진심으로 고마워요~</td>
						</tr>
						</tbody>
						<tfoot>
						<tr>
						<td></td>
						<td class="pdl0">
							<div class="cp1chart1bar3 on">
								<div class="graph">
									<i class="track"><i class="bar" style="width: 85%;"><span class="data eg1"><span class="gt1">전체 평균 4.25</span></span></i></i>
								</div>
							</div>
						</td>
						<td></td>
						<td></td>
						</tr>
						</tfoot>
					</table>

				</div>
				<!-- /w1table -->

			</div>
			</div>
			<!-- /scroll-x-lt-large -->

		</div>
		<!-- /cp1analysis1 -->


	</div>
</div>
<!-- /cp1dash5 -->





</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
