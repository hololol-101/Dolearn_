<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210304 | @m | 요구반영. 결함개선. 고도화.
 * ~20210304 | @m |
 */
-->
@extends('master_sub')

@section('title', '유튜버 마이페이지 - 영상분석')

@section('content')

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1row1 -->
<div class="cp1row1">
	<div class="column1">
		<a href="javascript:history.back();" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
	</div>
	<div class="column2">
	</div>
</div>
<!-- /cp1row1 -->


<div class="tac">
<h3 class="hb1 h2 hb3 dpib mgb1375em">영상제목 : 조건별 합계구하기 SUMIF 함수</h3>
</div>


<!-- cp1dash3 -->
<div class="cp1dash3">
	<div class="w1">

		<!-- cp1dash3info1 -->
		<div class="cp1dash3info1">
			<div class="hg1">
				<h3 class="h1">이 영상이 포함된 강좌 수</h3>
			</div>
			<div class="cont jcfe">
				<span class="t1">50</span>
			</div>
		</div>
		<!-- /cp1dash3info1 -->


	</div>
	<div class="w2">


		<!-- cp1dash3info1 -->
		<div class="cp1dash3info1">
			<div class="hg1">
				<h3 class="h1">두런 누적 조회수</h3>
			</div>
			<div class="cont jcfe">
				<span class="t1">1232회</span>
			</div>
		</div>
		<!-- /cp1dash3info1 -->


	</div>
	<div class="w3">


		<!-- cp1dash3info1 -->
		<div class="cp1dash3info1">
			<div class="hg1">
				<h3 class="h1">두런 누적 좋아요 수</h3>
			</div>
			<div class="cont jcfe">
				<span class="t1">134</span>
			</div>
		</div>
		<!-- /cp1dash3info1 -->


	</div>
	<div class="w4">


		<!-- cp1dash3info1 -->
		<div class="cp1dash3info1">
			<div class="hg1">
				<h3 class="h1">베스트 해시태그</h3>
			</div>
			<div class="cont">
				<!-- cp1tag1 -->
				<div class="cp1tag1 type2 mgt05em mgb0">
					<div class="tags">
						<a class="a1">#검색어</a>
						<a class="a1">#검색어</a>
					</div>
				</div>
				<!-- /cp1tag1 -->
			</div>
		</div>
		<!-- /cp1dash3info1 -->


	</div>
	<div class="w5">


		<!-- cp1dash3info1 -->
		<div class="cp1dash3info1">
			<div class="hg1">
				<h3 class="h1">해시태그</h3>
			</div>
			<div class="cont">
				<!-- cp1tag1 -->
				<div class="cp1tag1 type2 mgt05em mgb0">
					<div class="tags">
						<a class="a1">#엑셀기초</a>
						<a class="a1">#검색어</a>
						<a class="a1">#인기검색어</a>
						<a class="a1">#빅데이터전문가다</a>
						<a class="a1">#ADsP강의보기</a>
						<a class="a1">#인기검색어</a>
						<a class="a1">#엑셀기초</a>
						<a class="a1">#엑셀</a>
						<a class="a1">#엑셀기초</a>
						<a class="a1">#검색어</a>
						<a class="a1">#인기검색어</a>
						<a class="a1">#빅데이터전문가다</a>
					</div>
				</div>
				<!-- /cp1tag1 -->
			</div>
		</div>
		<!-- /cp1dash3info1 -->


	</div>
	<div class="w6">


		<!-- cp1dash3info1 -->
		<div class="cp1dash3info1">
			<div class="hg1">
				<h3 class="h1">내용 검색 키워드</h3>
			</div>
			<div class="cont">
				<!-- cp1tag1 -->
				<div class="cp1tag1 type2 mgt05em mgb0">
					<div class="tags">
						<a class="a1">#엑셀기초</a>
						<a class="a1">#검색어</a>
						<a class="a1">#인기검색어</a>
						<a class="a1">#빅데이터전문가다</a>
						<a class="a1">#ADsP강의보기</a>
						<a class="a1">#인기검색어</a>
						<a class="a1">#엑셀기초</a>
						<a class="a1">#엑셀</a>
					</div>
				</div>
				<!-- /cp1tag1 -->
			</div>
		</div>
		<!-- /cp1dash3info1 -->


	</div>
	<div class="w7">


		<!-- cp1dash1chart1 -->
		<div class="cp1dash1chart1">
			<div class="hg1">
				<h3 class="h1">일일 조회수 추세</h3>
				<div class="clearfix">
					<select title="선택옵션" class="type1 w5em">
						<option value="">월</option>
					</select>
				</div>
 			</div>
			<div class="cont">

				<div style="width:auto;height:auto;">
					<canvas id="myChart2" width="400" height="200"></canvas>
				</div>

				<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

				<script>/*<![CDATA[*/
					$(function(){
						/** ◇◆ 차트 :: 라인. 20200304. @m.
						 * chart.js
						 */
						(function(){

							var ctx = document.getElementById('myChart2').getContext('2d');
							var myChart = new Chart(ctx, {
								type: 'line',
								data: {
									labels: ['2020/03', '2020/04', '2020/05', '2020/06', '2020/07', '2020/08', '2020/09', '2020/10', '2020/11', '2020/12', '2020/01', '2020/02'],
									datasets: [{
										label: '두런 조회수',
										yAxisID: 'y-axis-1',
										data: [0, 180, 140, 0, 130, 270, 100, 220, 310,260, 205, 425],
										borderColor:'rgba(0,128,255, 1)',
										backgroundColor:'rgba(0,128,255, .1)',
										borderWidth: 2,
										pointRadius: 4,
										pointBackgroundColor: '#000',
										tension: .4
									},{
										label: '유튜브 조회수',
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
	<div class="w8">


		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 포함된 강좌</h3>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1"><a href="#?" class="a1"><span class="t1">자동 합계로 함수 쉽게 사용하는 방법</span> <span class="t2">방금</span></a></li>
					<li class="li1"><a href="#?" class="a1"><span class="t1">일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십</span> <span class="t2">2일전</span></a></li>
					<li class="li1"><a href="#?" class="a1"><span class="t1">일이삼사오육칠팔구십</span> <span class="t2">3일전</span></a></li>
				</ul>
			</div>
		</div>
		<!-- /cp1dash1recent1 -->


	</div>
	<div class="w9">


		<!-- cp1dash3video1 -->
		<div class="cp1dash3video1">
			<div class="hg1">
				<h3 class="h1">이 영상과 유사한 다른 채널의 영상</h3>
				<!-- cp1tag1 -->
				<div class="cp1tag1 type2 mgt-0375em mgb075em">
					<div class="tags">
						<a class="a1">#검색어</a>
						<a class="a1">#검색어</a>
					</div>
				</div>
				<!-- /cp1tag1 -->
			</div>
			<div class="cont">

				<!-- cp1fcard6 -->
				<div class="cp1fcard6">
				<div class="wrap1">
					<!-- lst1 -->
					<div class="lst1 even-grid evenmix-1 vgap00">
						<div class="item column">
							<div class="w1">
								<a href="?#" class="a1">
									<div class="f1">
										<span class="f1p1">
											<img src="{{ asset('assets/images/main/x1/x1p001.jpg') }}" alt="★대체텍스트필수" />
										</span>
										<i class="ic1 play">Play</i>
									</div>
									<div class="tg1">
										<strong class="t1">조건별 합계 구하기 SUMIF 일이삼사오육칠팔구십 조건별 합계 구하기 SUMIF 일이삼사오육칠팔구십</strong>
									</div>
									<div class="tg2 mgb0">
										<span class="t2">데이터에듀</span>
										<span class="t3">조회수 1800회</span>
									</div>
								</a>
							</div>
						</div>
					</div>
					<!-- /lst1 -->

				</div>
				</div>
				<!-- /cp1fcard6 -->

			</div>
		</div>
		<!-- /cp1dash3video1 -->


	</div>
</div>
<!-- /cp1dash3 -->


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
