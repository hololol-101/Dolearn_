<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210222 | @m | 요구반영. 결함개선. 고도화.
 * ~20210304 | @m |
 * 20210412 | @m | 요구반영
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
		<a href="{{ route('manage.lecture.lecture_info_modify', ['idx' => $lectureInfo->idx]) }}" class="b1 button">정보수정</a>
        @if ($lectureInfo->public_yn == 'Y')
		<em class="g1 button secondary round">공개</em>
        @else
		<em class="g1 button primary round mgl05em">비공개</em>
        @endif
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
	<h3 class="hb1 h3 dpib mgt01875em mgb01875em mgr05em vat">{{ $lectureInfo->title }}</h3>
	<div class="cp3tag1 dpib vat">
        @if (isset($lectureTagList))
            @foreach ($lectureTagList as $lectureTag)
                @if ($lectureTag != '')
                <span class="a1">{{ $lectureTag }}</span>
                @endif
            @endforeach
        @endif
	</div>
</div>


<!-- even-grid -->
<div class="even-grid float-left gap5pct vgap0">
	<div class="small-12 medium-4 column">


		<!-- cp3f1 -->
		<div class="cp3f1">
			<span class="f1p1">
                @if ($lectureInfo->save_thumbnail != '')
                <img src="{{ asset('storage/uploads/thumbnail/'.$lectureInfo->save_thumbnail) }}" alt="{{ $lectureInfo->title }}" />
                @else
                <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                @endif
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
					<span class="dd1">{{ $lectureInfo->description }}</span>
				</li>
				<li class="di1 cs1">
					<b class="dt1">강좌 카테고리</b>
					{{-- <span class="dd1"><span class="dpib">개발 · 프로그래밍 &gt; php</span>, <span class="dpib">개발 · 프로그래밍 &gt; php</span></span> --}}
                    <span class="dd1"><span class="dpib">{{ $lectureInfo->bcate_name }} &gt; {{ $lectureInfo->scate_name }}</span></span>
				</li>
				<li class="di1 cs1">
					<b class="dt1">난이도</b>
					<span class="dd1">@if ($lectureInfo->level == 'low') 초급 @elseif ($lectureInfo->level == 'medium') 중급 @else 중급이상 @endif</span>
				</li>
				<li class="di1 cs1">
					<b class="dt1">가격</b>
					<span class="dd1">@if ($lectureInfo->free_yn == 'Y') 무료 @else {{ $lectureInfo->price }}원 @endif</span>
				</li>
				<li class="di1 cs1">
					<b class="dt1">수강기간</b>
					<span class="dd1">@if ($lectureInfo->duration == '' || $lectureInfo->duration == 0) 제한 없음 @else {{ $lectureInfo->duration }}일 @endif</span>
				</li>
				<li class="di1 cs2">
					<b class="dt1">강좌 URL</b>
					<span class="dd1">
						<a href="{{ route('sub.lecture.lecture_detail', ['idx' => $lectureInfo->idx]) }}" target="_blank" rel="noopener" title="새 창" class="a1">new2.dolearn.co.kr/sub/lecture/lecture_datail?idx={{ $lectureInfo->idx }}</a>
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


		<!-- cp3dlist2 -->
		<div class="cp3dlist2">
			<ul class="dl1">
				<li class="di1">
					<b class="dt1">강좌 평점</b>
					<span class="dd1">{{ $lectureInfo->rating }}</span>
				</li>
				<li class="di1">
					<b class="dt1 dpib mgr0125em vam">완강률</b>
					<div class="bi1 dpib fsS1 vam">
						<a href="#?" class="li1 tooltip1 rt">
							<span class="tooltip1c w17em">
								전체 수강자 대비 수강완료 수강자의 비율입니다.
							</span>
						</a>
					</div>
					<span class="dd1">@if ($lectureInfo->student_cnt != 0) {{ round(((int)$countLearningComplete / $lectureInfo->student_cnt) * 100, 0) }}% @else 0% @endif</span>
				</li>
			</ul>
		</div>
		<!-- /cp3dlist2 -->


	</div>
	<div class="w2">


		<!-- cp3dlist2 -->
		<div class="cp3dlist2">
			<ul class="dl1">
				<li class="di1">
					<b class="dt1">영상 수</b>
					<span class="dd1">{{ $countVideo }}</span>
				</li>
				<li class="di1">
                    {{-- TODO: 시험/과제 수 --}}
					<b class="dt1">시험/과제 수</b>
					<span class="dd1">0</span>
				</li>
			</ul>
		</div>
		<!-- /cp3dlist2 -->


	</div>
	<div class="w3">


		<!-- cp3dlist2 -->
		<div class="cp3dlist2">
			<ul class="dl1">
				<li class="di1">
					<b class="dt1 dpib mgr0125em vam">응답률</b>
					<div class="bi1 dpib fsS1 vam">
						<a href="#?" class="li1 tooltip1">
							<span class="tooltip1c w17em">
								질문 답변, 시험/과제 피드백 등 의 활동을 통해 강사가 얼마나 강좌를 활성화하고 있는지 판단할 수 있습니다.
							</span>
						</a>
					</div>
                    {{-- TODO: 응답률 --}}
					<span class="dd1">-</span>
				</li>
				<li class="di1">
					<b class="dt1">미채점 <span class="dpib">시험/과제</span></b>
                    {{-- TODO: 미채점 시험/과제 수 --}}
					<span class="dd1">0</span>
				</li>
			</ul>
		</div>
		<!-- /cp3dlist2 -->


	</div>
	<div class="w4">


		<!-- cp3chart1 -->
		<div class="cp3chart1">
			<div class="hg1">
				<h4 class="h1">수강자 분포</h4>
			</div>
			<div class="cont">
				<div class="chart">
					<canvas id="myChart1" width="400" height="300"></canvas>
				</div>
				<div class="t1 mgt05em">
					전체 {{ $lectureInfo->student_cnt }}명
				</div>

				<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

				<script>/*<![CDATA[*/
					$(function(){
						/** ◇◆ 차트 :: 도넛. 20210412. @m.
						 * chart.js
						 */
						(function(){

							// 범례와 차트 간격
							Chart.Legend.prototype.afterFit = function() {
								this.height = this.height + 8;
							};

							// 차트 그리기
							var ctx = document.getElementById('myChart1').getContext('2d');
							var myChart = new Chart(ctx, {
								type: 'doughnut',
								data: {
									labels: ['수강중', '수강완료', '인증대기중'],
									datasets: [{
										label: '# of Votes',
                                        // TODO: 인증대기중인 수강자 수
										data: [{{ $lectureInfo->student_cnt - (int)$countLearningComplete }}, {{ (int)$countLearningComplete }}, 0],
										backgroundColor: ['#74b7b2', '#4c78a9', '#f48f13'],
										weight: 10,
										circumference: 180
									}]
								},
								options: {
									cutoutPercentage: 78, // 0 : pie
									tooltips: {
										bodySpacing: 20
									},
									legend: {
										position: 'top',
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

						})();
					});
				/*]]>*/</script>

			</div>
		</div>
		<!-- /cp3chart1 -->


	</div>
	<div class="w5">


		<!-- cp3bbs1 -->
		<div class="cp3bbs1">
			<div class="hg1">
                {{-- TODO: 공지사항 --}}
				<h4 class="h1">공지사항</h4>
				<a href="javascript:void(0);" class="a3"><span class="a3t1">편집하기 &gt;</span></a>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1"><a class="a1"><span class="t1">공지사항001</span> <span class="t2">2021/02/22 16:04</span></a></li>
					<li class="li1"><a class="a1"><span class="t1">공지사항002</span> <span class="t2">2021/02/22 16:04</span></a></li>
					<li class="li1"><a class="a1"><span class="t1">공지사항003</span> <span class="t2">2021/02/22 16:04</span></a></li>
				</ul>
			</div>
		</div>
		<!-- /cp3bbs1 -->


	</div>
	<div class="w6">


		<!-- cp3chart1 -->
		<div class="cp3chart1">
			<div class="hg1 bd0">
                {{-- TODO: 일별 수강자 수 그래프 --}}
				<h4 class="h1">수강자 수</h4>
				<select class="type1 mg0 pdt0 pdb0 pdl075em fsS2" id="student_cnt_day" style="height:2.2em;" title="선택옵션">
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
												fontColor: '#666'
											},
											scaleLabel: {
												//display: true,
												fontColor: '#ccc',
												fontSize: 12,
												labelString: "년.월.일"
											},
											gridLines: {
												color: 'rgba(0,0,0, .1)',
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
												color: 'rgba(0,0,0, .1)',
												drawBorder: false,
												drawTicks: false,
												zeroLineColor: 'rgba(0,0,0, .1)'
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
	<div class="w7">


		<!-- cp3chart1 -->
		<div class="cp3chart1">
			<div class="hg1 bd0">
                {{-- TODO: 일일 수강신청 수 그래프 --}}
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
												color: 'rgba(0,0,0, .1)',
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
												color: 'rgba(0,0,0, .1)',
												drawBorder: false,
												drawTicks: false,
												zeroLineColor: 'rgba(0,0,0, .1)'
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
