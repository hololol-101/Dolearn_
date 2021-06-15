<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210302 | @m | 요구반영. 결함개선. 고도화.
 * ~20210304 | @m |
 */
-->
@extends('master_sub')

@section('title', '유튜버 마이페이지 - 대시보드')

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
				<a href="?#" class="a1"><i class="t1">대시보드</i></a>
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
			<li><a href="{{ route('sub.dashboard.dashboard_main', ['role' => 'youtuber']) }}">대시보드</a></li>
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


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- even-grid -->
<div class="even-grid gap2pct">
	<div class="small-12 medium-6 column">


		<!-- cp1dash1info1 -->
		<div class="cp1dash1info1">
			<div class="hg1">
				<h3 class="h1">김두런님, 안녕하세요 :)</h3>
			</div>
			<div class="cont">
				<div class="item">
					<strong class="t1">09</strong>
					<span class="t2">수강강좌</span>
				</div>
				<div class="item">
					<strong class="t1">05</strong>
					<span class="t2">완료 강좌 수</span>
				</div>
				<div class="item">
					<strong class="t1">00</strong>
					<span class="t2">읽지 않은 알림</span>
				</div>
			</div>
		</div>
		<!-- /cp1dash1info1 -->


	</div>
	<div class="small-12 medium-6 column">


		<!-- cp1dash1interest1 -->
		<div class="cp1dash1interest1">
			<div class="hg1">
				<h3 class="h1">관심분야</h3>
				<div class="mControl">
					<button type="button" class="m prev"><i class="ic1"></i><span class="t1 blind">관심분야 이전보기</span></button>
					<button type="button" class="m next"><i class="ic1"></i><span class="t1 blind">관심분야 다음보기</span></button>
				</div>
			</div>
			<div class="cont">
				<!-- cp1interest1 -->
				<div class="cp1interest1">
					<ul class="mls">
						<li class="m m1"><a class="a1"><i class="ic1"></i><span class="t1">웹개발</span></a></li>
						<li class="m m2"><a class="a1"><i class="ic1"></i><span class="t1">모바일개발</span></a></li>
						<li class="m m3"><a class="a1"><i class="ic1"></i><span class="t1">프로그래밍</span></a></li>
						<li class="m m4"><a class="a1"><i class="ic1"></i><span class="t1">데이터분석</span></a></li>
						<li class="m m5"><a class="a1"><i class="ic1"></i><span class="t1">인공지능</span></a></li>
						<li class="m m6"><a class="a1"><i class="ic1"></i><span class="t1">경영</span></a></li>
						<li class="m m7"><a class="a1"><i class="ic1"></i><span class="t1">법률</span></a></li>
						<li class="m m8"><a class="a1"><i class="ic1"></i><span class="t1">유아교육</span></a></li>
					</ul>
				</div>
				<!-- /cp1interest1 -->
			</div>
			<div class="fg1">
				<a href="{{ route('account.profile_settings') }}" class="a2"><span class="a2t1">프로필설정 &gt;</span></a>
			</div>
		</div>
		<!-- /cp1dash1interest1 -->
		<script>/*<![CDATA[*/
			(function(){
				/** ◇◆ 단순이전다음. 20210203. @m.
				 */
				var $my = $('.cp1dash1interest1'),
					$prev = $('.mControl .prev', $my),
					$next = $('.mControl .next', $my),
					$v = $('.cp1interest1', $my); // 뷰
					$c = $('.cp1interest1 .mls', $my); // 콘텐츠
					//console.log($v.height());
				var endTop = 0; // 이동할높이값
				// 다음클릭
				$next.on('click', function(e){
					endTop -= $v.height();
					if( endTop <  $v.height() - $c.height() ){
						endTop = 0;
					}
					$c.css({	 top: endTop });
				});
				// 이전클릭
				$prev.on('click', function(e){
					endTop += $v.height();
					if( endTop > 0 ){
						endTop = $v.height() - $c.height();
					}
					$c.css({	 top: endTop });
				});
			})();
		/*]]>*/</script>


	</div>
	<div class="small-12 large-6 column">


		<!-- cp1dash1flist1 -->
		<div class="cp1dash1flist1">
			<div class="hg1">
				<h3 class="h1">최근 3개월 두런 조회수 Top 3  영상</h3>
            </div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1">
						<a href="#?" class="a1">
							<div class="w1">
								<b class="g1">1</b>
								<div class="f1">
									<span class="f1p1">
										<img src="{{ asset('assets/images/main/x1/x1p001.jpg') }}" alt="★대체텍스트필수" />
									</span>
									<i class="ic1 play">Play</i>
								</div>
							</div>
							<div class="w2">
								<div class="t1">자동 합계로 함수 쉽게 사용하는 방법</div>
								<div class="t2">
									<span class="t2t1">#검색어</span>
									<span class="t2t1">#검색어</span>
								</div>
								<div class="t3">조회수 2000회</div>
							</div>
						</a>
					</li>
					<li class="li1">
						<a href="#?" class="a1">
							<div class="w1">
								<b class="g1">2</b>
								<div class="f1">
									<span class="f1p1">
										<img src="{{ asset('assets/images/main/x1/x1p002.jpg') }}" alt="★대체텍스트필수" />
									</span>
									<i class="ic1 play">Play</i>
								</div>
							</div>
							<div class="w2">
								<div class="t1">긍정적인 관계 에너지 만들고싶다. 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</div>
								<div class="t2">
									<span class="t2t1">#검색어</span>
									<span class="t2t1">#검색어</span>
								</div>
								<div class="t3">조회수 1500회</div>
							</div>
						</a>
					</li>
					<li class="li1">
						<a href="#?" class="a1">
							<div class="w1">
								<b class="g1">3</b>
								<div class="f1">
									<span class="f1p1">
										<img src="{{ asset('assets/images/main/x1/x1p003.jpg') }}" alt="★대체텍스트필수" />
									</span>
									<i class="ic1 play">Play</i>
								</div>
							</div>
							<div class="w2">
								<div class="t1">자동 합계로 함수 쉽게 사용하는 방법</div>
								<div class="t2">
									<span class="t2t1">#검색어</span>
									<span class="t2t1">#검색어</span>
								</div>
								<div class="t3">조회수 1400회</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- /cp1dash1flist1 -->


	</div>
	<div class="small-12 large-6 column">


		<!-- cp1dash1chart1 -->
		<div class="cp1dash1chart1">
			<div class="hg1">
				<h3 class="h1">경쟁 채널 비교</h3>
 			</div>
			<div class="cont">

				<strong class="tt1">동일한 카테고리의 구독자 수가 비슷한 20개의 채널 비교(최근 3개월)</strong>

				<div style="width:auto;height:auto;">
					<canvas id="myChart1" width="400" height="300"></canvas>
				</div>

				<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

				<script>/*<![CDATA[*/
					$(function(){
						/** ◇◆ 차트 :: 산점도. 20200304. @m.
						 * chart.js
						 */
						(function(){

							var ctx = document.getElementById('myChart1').getContext('2d');
							var myChart = new Chart(ctx, {
								type: 'scatter',
								data: {
									datasets: [{
										//label: '내채널',
										data: [
											{x: 46, y: 260}, // 내채널
											{x: 11, y: 60}, {x: 16, y: 90}, {x: 18, y: 120}, {x: 50, y: 150}, {x: 24, y: 180}, {x: 36, y: 210}, {x: 30, y: 240}, {x: 42, y: 270}, {x: 56, y: 300}, {x: 64, y: 360},
											{x: 14, y: 130}, {x: 17, y: 285}, {x: 19, y: 255}, {x: 60, y: 225}, {x: 26, y: 195}, {x: 38, y: 165}, {x: 32, y: 135}, {x: 44, y: 105}, {x: 54, y: 275}, {x: 66, y: 245},
										],
										backgroundColor: [
											'#fff', // 내채널
											'#0c7','#0c7','#0c7','#0c7','#0c7','#0c7','#0c7','#0c7','#0c7','#0c7',
											'#0c7','#0c7','#0c7','#0c7','#0c7','#0c7','#0c7','#0c7','#0c7','#0c7'
										],
										// 내채널만 달리
										pointRadius: [8],
										borderWidth: [2],
										borderColor: ['#0c7']
									}]
								},
								options: {
									title: {
										//display: true,
										fontColor: '#ccc',
										fontSize: 12,
										//text: '동일한 카테고리의 구독자 수가 비슷한 20개의 채널 비교(최근 3개월)'
									},
									legend: {
										display: false, // 범례 감춤
										labels: {
											boxWidth: 8,
											fontColor: '#ccc',
											fontSize: 12,
											usePointStyle: true
										}
									},
									scales: {
										xAxes: [{
											ticks: {
												beginAtZero: true
											},
											scaleLabel: {
												display: true,
												fontColor: '#ccc',
												fontSize: 12,
												labelString: "두런 일일 조회수(만명)"
											},
											gridLines: {
												color: 'rgba(255,255,255, .1)'
											}
										}],
										yAxes: [{
											ticks: {
												beginAtZero: true
											},
											scaleLabel: {
												display: true,
												fontColor: '#ccc',
												fontSize: 12,
												labelString: "구독자수(만명)"
											},
											gridLines: {
												color: 'rgba(255,255,255, .1)'
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
	<div class="small-12 column">


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
	<div class="small-12 medium-6 column">


		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 학습 강좌</h3>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1"><a href="#?" class="a1"><span class="t1">강좌제목 일이삼사오육칠팔구십</span> <span class="t2">3일전</span></a></li>
				</ul>
				<div class="gg1">
					<div class="t1">
						<span class="t1t1">진도율</span>
						<span class="t1t2">22강</span> <i class="sep">/</i> <span class="t1t3">30강</span>
						<span class="t1t4">75%</span>
					</div>
					<div class="g1">
						<i class="g1b1" style="width:75%;"></i>
					</div>
				</div>
			</div>
			<div class="fg1">
				<a href="?#" class="a2"><span class="a2t1">내 모든강좌 &gt;</span></a>
				<a href="?#" class="a2 cvf"><span class="a2t1">이어서 학습하기 &gt;</span></a>
			</div>
		</div>
		<!-- /cp1dash1recent1 -->


	</div>
	<div class="small-12 medium-6 column">


		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 시청 영상</h3>
				<a href="{{ route('sub.video.video_play_history') }}" class="a3"><span class="a3t1">내 시청기록 &gt;</span></a>
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
</div>
<!-- /even-grid -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
