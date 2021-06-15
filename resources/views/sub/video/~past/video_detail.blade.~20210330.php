<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210118 | @m | 요구반영. 결함개선. 고도화.
 * ~20210121. 20210326 | @m | 
 */
-->
@extends('master_sub')

@section('title', '영상상세')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- width1wrap1 -->
<div class="width1wrap1">

<!-- cp1view1 type2 -->
<div class="cp1view1 type2">

	<div class="width1wrap2">
		<a href="javascript:history.back();" class="cp1b1close1"><i class="ic1"></i><span class="t1">닫기</span></a>
	</div>

	<!-- w1video -->
	<div class="w1video">
		<div class="flex1wrap1">
            <iframe name="youtube_fr" id="display_fr" width="100%" height="100%" src="https://www.youtube.com/embed/{{ $videoDetail->uid }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			{{-- <video class="video" controls="controls" poster="{{ asset('assets/images/lib/x2/x2p1001.jpg') }}" src="http://content.jwplatform.com/videos/HkauGhRi-640.mp4">
				<div class="alternativeContent">
					<p>Your browser does not support the video element.</p>
				</div>
			</video> --}}
			<!-- <i class="ic1 play">Play</i> -->
		</div>
	</div>
	<!-- /w1video -->

	<div class="w1">
		<div class="w1w1">
			<div class="tg5">
				<div class="tg5w1">
					<span class="t5"><span class="t5t1">두런 조회수</span> <span class="t5t2">{{ $videoDetail->hit_cnt }}</span></span>
					<span class="t5"><span class="t5t1">두런 좋아요</span> <span class="t5t2">{{ $videoDetail->like_cnt }}</span></span>
				</div>
				<span class="t6">2021.03.19</span>
			</div>
			<div class="tg1">
				<strong class="t1">{{ $videoDetail->title }}</strong>
			</div>
			<div class="fg1">
				<div class="fg1w1">
					<img src="{{ asset('assets/images/lib/x3/x3p301.jpg') }}" alt="★대체텍스트필수" class="w100 round">
				</div>
				<div class="fg1w2">
					<span class="t1">{{ $videoDetail->channel }}</span>
					<span class="t2">구독자 수 33.2만 · 동영상 수 123</span>
				</div>
			</div>
		</div>
		<div class="w1w2">
			<div class="tg3">
				<a href="?#★" class="b1 button">스마트 학습하기</a>
			</div>
		</div>
	</div>

</div>
<!-- /cp1view1 -->


<!-- cp1view3 -->
<div class="cp1view3">


	<!-- cp1dash2info2 -->
	<div class="cp1dash2info2">
		<div class="cont">
			<div class="item">
				<span class="t1">조회수</span>
				<strong class="t2">28만</strong>
			</div>
			<div class="item">
				<span class="t1">러닝시간</span>
				<strong class="t2">5분10초</strong>
			</div>
			<div class="item">
				<span class="t1">좋아요 수</span>
				<strong class="t2">1.2만</strong>
			</div>
			<div class="item">
				<span class="t1">댓글 수</span>
				<strong class="t2">125</strong>
			</div>
			<div class="item">
				<span class="t1">연관 강좌 수</span>
				<strong class="t2">5</strong>
			</div>
		</div>
	</div>
	<!-- /cp1dash2info2 -->


</div>
<!-- /cp1view3 -->


<!-- cp1view2 -->
<div class="cp1view2 pdt1em">


	<!-- cp1dash2info1 type2 -->
	<div class="cp1dash2info1 type2 bgn">
		<div class="hg1">
			<h3 class="h1"><span class="h1t1">분석 리포트</span><i class="h1ic1"></i></h3>
		</div>
		<div class="cont">
			<div class="item">
				<strong class="t1">
					<span class="vat">67점</span>
					<a href="#layer1metewand1" class="b1 metewand toggle" data-send-focus="that"><i class="b1ic1"></i><span class="b1t1">평가 기준</span></a>
				</strong>
				<span class="t2">
					<span class="vam">영상 평점</span>
					<span class="bi1 dpib fsS1 vam">
						<a href="#?" class="li1 tooltip1 lt">
							<span class="tooltip1c" style="width:19em;">
								8개의 기준으로 영상을 분석한 결과 입니다.<br />
								100점 만점
							</span>
						</a>
					</span>
				</span>
			</div>
			<div class="item">
				<div class="st1">
					<span class="st1t1 like">1.2만</span> <span class="sep">/</span> <span class="st1t1 hate">80</span>
				</div>
				<strong class="t1">98%</strong>
				<span class="t2">
					<span class="vam">좋아요 비율</span>
					<span class="bi1 dpib fsS1 vam">
						<a href="#?" class="li1 tooltip1 ct">
							<span class="tooltip1c" style="width:21em;">
								유튜브 좋아요 수와 싫어요 수를 알 수 있습니다.
							</span>
						</a>
					</span>
				</span>
			</div>
			<div class="item">
				<div class="st1">
					<span class="st1t1 like">1.2만</span> <span class="sep">/</span> <span class="st1t1 hate">80</span>
				</div>
				<strong class="t1">21%</strong>
				<span class="t2">
					<span class="vam">긍정적 댓글 비율</span>
					<span class="bi1 dpib fsS1 vam">
						<a href="#?" class="li1 tooltip1 rt">
							<span class="tooltip1c" style="width:19em;">
								댓글 감성분석을 통해 긍적적 댓글의 수를 알 수 있습니다.
							</span>
						</a>
					</span>
				</span>
			</div>
		</div>
	</div>
	<!-- /cp1dash2info1 type2 -->


	<!-- (레이어팝업) -->
	<!-- cp1layer1lightbox1 : 레이어박스  -->
	<div class="cp1layer1lightbox1 type4" id="layer1metewand1">
		<div class="wrap1">
			<!-- lightbox -->
			<div class="lightbox">
				<div class="wrap2">
					
					
					<!-- ★★(평가 기준) -->
					<div class="hg1">
						<h3 class="h1">평가 기준</h3>
						<a href="#layer1metewand1" class="b1 close"><i class="ic1"></i> <span class="blind">평가 기준 창 닫기</span></a>
					</div>
					<div class="cont">
						<!-- cp1metewand1 -->
						<div class="cp1metewand1">
							<div class="graph">
								<ul>
								<li>
									<span class="term"><span class="t1">조회수</span></span>
									<i class="track"><i class="bar" style="width: 60%;"><span class="data">60점</span></i></i>
								</li>
								<li>
									<span class="term"><span class="t1">일평균 조회수</span></span>
									<i class="track"><i class="bar" style="width: 70%;"><span class="data">70점</span></i></i>
								</li>
								<li>
									<span class="term"><span class="t1">조회수 평균 좋아요</span></span>
									<i class="track"><i class="bar" style="width: 60%;"><span class="data">60점</span></i></i>
								</li>
								<li>
									<span class="term"><span class="t1">좋아요</span></span>
									<i class="track"><i class="bar" style="width: 80%;"><span class="data">80점</span></i></i>
								</li>
								<li>
									<span class="term"><span class="t1">일평균 좋아요</span></span>
									<i class="track"><i class="bar" style="width: 50%;"><span class="data">50점</span></i></i>
								</li>
								<li>
									<span class="term"><span class="t1">좋아요/전체평가수</span></span>
									<i class="track"><i class="bar" style="width: 55%;"><span class="data">55점</span></i></i>
								</li>
								<li>
									<span class="term"><span class="t1">구독자수</span></span>
									<i class="track"><i class="bar" style="width: 50%;"><span class="data">50점</span></i></i>
								</li>
								<li>
									<span class="term"><span class="t1">러닝시간(분)</span></span>
									<i class="track"><i class="bar" style="width: 75%;"><span class="data">75점</span></i></i>
								</li>
								</ul>
							</div>
						</div>
						<!-- /cp1metewand1 -->
					</div>
					<!-- /★★(평가 기준) -->


				</div>	
			</div>
			<!-- /lightbox -->
		</div>
	</div>
	<!-- /cp1layer1lightbox1 -->

	<!-- cp1tag3 -->
	<div class="cp1tag3">
	<div class="w1">
		<strong class="h1">
			<span class="vam">두런 해시태그</span>
			<span class="bi1 dpib fs16px vam">
				<a href="#?" class="li1 tooltip1 rt">
					<span class="tooltip1c" style="width:19em;">
						영상 내용에서 가장 많이 사용되고<br /> 연관도가 높은 단어를 분석한 결과입니다.
					</span>
				</a>
			</span>
		</strong>
		<div class="tags">
			<a href="?#★" class="a1"><span class="a1t1">#해시태그일이</span> <small class="a1t2">20회</small></a>
			<a href="?#★" class="a1"><span class="a1t1">#해시삼사</span> <small class="a1t2">12회</small></a>
			<a href="?#★" class="a1"><span class="a1t1">#태그오육칠팔</span> <small class="a1t2">5회</small></a>
			<a href="?#★" class="a1"><span class="a1t1">#일이삼사 오육</span> <small class="a1t2">999회</small></a>
			<a href="?#★" class="a1"><span class="a1t1">#칠팔구</span></a>
			<a href="?#★" class="a1"><span class="a1t1">#해시태그다</span></a>
		</div>
	</div>
	<div class="w2">
		<strong class="h1">유튜브 해시태그</strong>
		<div class="tags">
			<a href="?#★" class="a1"><span class="a1t1">#해시태그일이</span></a>
			<a href="?#★" class="a1"><span class="a1t1">#해시삼사</span></a>
			<a href="?#★" class="a1"><span class="a1t1">#태그오육칠팔</span></a>
			<a href="?#★" class="a1"><span class="a1t1">#일이삼사 오육</span></a>
			<a href="?#★" class="a1"><span class="a1t1">#칠팔구</span></a>
			<a href="?#★" class="a1"><span class="a1t1">#해시태그다</span></a>
		</div>
	</div>
	</div>
	<!-- /cp1tag3 -->


	<!-- contentsBlock -->
	<div class="clearfix mgb3em">

		<h3 class="hb1 h1 fsB12 mgt0">영상 조회수 추세</h3>

		<div style="width:auto;height:auto;">
			<canvas id="myChart3" width="400" height="200"></canvas>
		</div>

		<script src="/_res/dolearn/share/vendor/chart.js/Chart.min.js"></script>

		<script>/*<![CDATA[*/
			$(function(){
				/** ◇◆ 차트 :: 라인. 20210322. @m.
				 * chart.js
				 */
				(function(){

					var ctx = document.getElementById('myChart3').getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'line',
						data: {
							labels: ['2020/03', '2020/04', '2020/05', '2020/06', '2020/07', '2020/08', '2020/09', '2020/10', '2020/11', '2020/12', '2021/01', '2021/02'],
							datasets: [{
								label: '누적 조회수',
								yAxisID: 'y-axis-1',
								data: [50, 80, 160, 175, 190, 220, 245, 250, 295, 300, 330, 440],
								borderColor:'rgba(0,128,255, 1)',
								backgroundColor:'rgba(0,128,255, .1)',
								borderWidth: 2,
								pointRadius: 4,
								pointBackgroundColor: '#000',
								tension: .4
							},{
								label: '두런 조회수',
								yAxisID: 'y-axis-2',
								data: [0, 50, 110, 130, 140, 180, 205, 220, 260, 270, 290, 420],
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
										fontColor: 'rgba(0,128,255, 1)',
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
										fontColor: 'rgba(0,201,121, 1)',
										fontSize: 12,
										labelString: "단위(천)"
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
	<!-- /contentsBlock -->


	<!-- cp1fcard4 -->
	<div class="cp1fcard4 mgb3em">
	<div class="wrap1">
		<div class="hg1">
			<h3 class="hb1 h1 fsB12">다른 유튜버의 유사한 영상</h3>
			<div class="cp1tag1 type2 mgt0 mgb0">
				<div class="tags">
					<a href="?#★" class="a1">#검색어</a>
					<a href="?#★" class="a1">#검색어</a>
				</div>
			</div>
			<div class="mControl">
				<button type="button" class="m prev"><i class="ic1"></i><span class="blind">다른 유튜버의 유사한 영상. 이전 보기</span></button>
				<button type="button" class="m next"><i class="ic1"></i><span class="blind">다른 유튜버의 유사한 영상. 다음 보기</span></button>
			</div>
		</div>
		<!-- owl-carousel -->
		<div class="owl-carousel owl-theme">
			<div class="item">
				<div class="w1">
					<a href="?#★" class="a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p101.jpg') }}" alt="★대체텍스트필수" />
							</span>
							<i class="ic1 play">Play</i>
						</div>
						<div class="tg1">
							<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
						</div>
						<div class="tg2">
							<span class="t2">데이터에듀</span>
							<span class="t3">조회수 1800회</span>
						</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="w1">
					<a href="?#★" class="a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p102.jpg') }}" alt="★대체텍스트필수" />
							</span>
							<i class="ic1 play">Play</i>
						</div>
						<div class="tg1">
							<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
						</div>
						<div class="tg2">
							<span class="t2">데이터에듀</span>
							<span class="t3">조회수 1800회</span>
						</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="w1">
					<a href="?#★" class="a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p103.jpg') }}" alt="★대체텍스트필수" />
							</span>
							<i class="ic1 play">Play</i>
						</div>
						<div class="tg1">
							<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
						</div>
						<div class="tg2">
							<span class="t2">데이터에듀</span>
							<span class="t3">조회수 1800회</span>
						</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="w1">
					<a href="?#★" class="a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p004.jpg') }}" alt="★대체텍스트필수" />
							</span>
							<i class="ic1 play">Play</i>
						</div>
						<div class="tg1">
							<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
						</div>
						<div class="tg2">
							<span class="t2">데이터에듀</span>
							<span class="t3">조회수 1800회</span>
						</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="w1">
					<a href="?#★" class="a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p005.jpg') }}" alt="★대체텍스트필수" />
							</span>
							<i class="ic1 play">Play</i>
						</div>
						<div class="tg1">
							<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
						</div>
						<div class="tg2">
							<span class="t2">데이터에듀</span>
							<span class="t3">조회수 1800회</span>
						</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="w1">
					<a href="?#★" class="a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p006.jpg') }}" alt="★대체텍스트필수" />
							</span>
							<i class="ic1 play">Play</i>
						</div>
						<div class="tg1">
							<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
						</div>
						<div class="tg2">
							<span class="t2">데이터에듀</span>
							<span class="t3">조회수 1800회</span>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!-- /owl-carousel -->
	</div>
	</div>
	<!-- /cp1fcard4 -->
	<script>/*<![CDATA[*/
		$(function(){
			// 20210118
			$('.cp1fcard4').jQmCarousel1({
				autoplay: false,
				autoplayTimeout: 6000,
				margin: 22,
				responsive: {
					000: { items: 2 },
					640: { items: 3 },
					960: { items: 4 },
					1260: { items: 4 }
				}
			});
		});
	/*]]>*/</script>


	<!-- cp1fcard10 -->
	<div class="cp1fcard10">
	<div class="wrap1">
		<div class="hg1">
			<h3 class="hb1 h1 fsB12">연관된 강좌</h3>
			<div class="mControl">
				<button type="button" class="m prev"><i class="ic1"></i><span class="blind">연관된 강좌. 이전 보기</span></button>
				<button type="button" class="m next"><i class="ic1"></i><span class="blind">연관된 강좌. 다음 보기</span></button>
			</div>
		</div>
		<!-- owl-carousel -->
		<div class="owl-carousel owl-theme">
			<div class="item">
				<div class="w1">
					<a href="?#★" class="a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p301.jpg') }}" alt="★대체텍스트필수" />
							</span>
							<i class="ic1 play">Play</i>
						</div>
						<div class="tg1">
							<strong class="t1">엑셀 올인원! 엑셀 기초부터 실무까지 일이삼사오륙칠팔구십</strong>
						</div>
						<div class="ratings">
							<strong class="t1 blind">별점</strong>
							<i class="star5rating1">
								<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<span class="t2">
								<span class="t2t1">평점</span>
								<span class="t2t2">3.5</span>
							</span>
						</div>
						<div class="tg2">
							<span class="t2">
								<span class="t2t1">데이터에듀</span> <span class="t2t2">· 수강생 1800명</span>
							</span>
							<span class="t3">
								<span class="t3t1">무료</span>
							</span>
						</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="w1">
					<a href="?#★" class="a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p302.jpg') }}" alt="★대체텍스트필수" />
							</span>
							<i class="ic1 play">Play</i>
						</div>
						<div class="tg1">
							<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
						</div>
						<div class="ratings">
							<strong class="t1 blind">별점</strong>
							<i class="star5rating1">
								<i class="st-on" style="width:90%;"><i class="ic1"></i></i><!-- (4.5/5) -->
								<i class="st-off" style="width:10%;"><i class="ic2"></i></i><!-- (100-90) -->
							</i>
							<span class="t2">
								<span class="t2t1">평점</span>
								<span class="t2t2">4.5</span>
							</span>
						</div>
						<div class="tg2">
							<span class="t2">
								<span class="t2t1">데이터에듀</span> <span class="t2t2">· 수강생 1800명</span>
							</span>
							<span class="t3">
								<span class="t3t1">무료</span>
							</span>
						</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="w1">
					<a href="?#★" class="a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p303.jpg') }}" alt="★대체텍스트필수" />
							</span>
							<i class="ic1 play">Play</i>
						</div>
						<div class="tg1">
							<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
						</div>
						<div class="ratings">
							<strong class="t1 blind">별점</strong>
							<i class="star5rating1">
								<i class="st-on" style="width:50%;"><i class="ic1"></i></i><!-- (2.5/5) -->
								<i class="st-off" style="width:50%;"><i class="ic2"></i></i><!-- (100-50) -->
							</i>
							<span class="t2">
								<span class="t2t1">평점</span>
								<span class="t2t2">2.5</span>
							</span>
						</div>
						<div class="tg2">
							<span class="t2">
								<span class="t2t1">데이터에듀</span> <span class="t2t2">· 수강생 1800명</span>
							</span>
							<span class="t3">
								<span class="t3t1">무료</span>
							</span>
						</div>
					</a>
				</div>
			</div>
			<div class="item">
				<div class="w1">
					<a href="?#★" class="a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p304.jpg') }}" alt="★대체텍스트필수" />
							</span>
							<i class="ic1 play">Play</i>
						</div>
						<div class="tg1">
							<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
						</div>
						<div class="ratings">
							<strong class="t1 blind">별점</strong>
							<i class="star5rating1">
								<i class="st-on" style="width:98%;"><i class="ic1"></i></i><!-- (4.9/5) -->
								<i class="st-off" style="width:2%;"><i class="ic2"></i></i><!-- (100-98) -->
							</i>
							<span class="t2">
								<span class="t2t1">평점</span>
								<span class="t2t2">4.9</span>
							</span>
						</div>
						<div class="tg2">
							<span class="t2">
								<span class="t2t1">데이터에듀</span> <span class="t2t2">· 수강생 1800명</span>
							</span>
							<span class="t3">
								<span class="t3t1">무료</span>
							</span>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!-- /owl-carousel -->
	</div>
	</div>
	<!-- /cp1fcard10 -->
	<script>/*<![CDATA[*/
		$(function(){
			// 20210311
			$('.cp1fcard10').jQmCarousel1({
				autoplay: false,
				autoplayTimeout: 6000,
				margin: 22,
				responsive: {
					000: { items: 2 },
					640: { items: 2 },
					960: { items: 3 },
					1260: { items: 4 }
				}
			});
		});
	/*]]>*/</script>



</div>
<!-- /cp1view2 -->


</div>
<!-- /width1wrap1 -->


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
