<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210302 | @m | 요구반영. 결함개선. 고도화.
 * ~20210304 | @m |
 * 20210409 | @m | 요구반영
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
			<li><a href="{{ route('sub.dashboard.my_notification_list', ['role' => 'youtuber']) }}">내 알림</a></li>
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
				<h3 class="h1">{{ $userName }}님, 안녕하세요 :)</h3>
			</div>
			<div class="cont">
				<div class="item">
					<strong class="t1">09</strong>
					<span class="t2">내 영상 수</span>
				</div>
				<div class="item">
					<strong class="t1">05</strong>
					<span class="t2">연관 강좌 수</span>
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
				<div class="hg1w1">
					<h3 class="h1">관심분야</h3>
					<a href="#layer1interests1set1" class="set toggle" data-send-focus="that" ><span class="t1 blind">설정</span> <i class="ic1"></i></a>
				</div>
				<div class="mControl">
					<button type="button" class="m prev"><i class="ic1"></i><span class="t1 blind">관심분야 이전보기</span></button>
					<button type="button" class="m next"><i class="ic1"></i><span class="t1 blind">관심분야 다음보기</span></button>
				</div>
			</div>
            <div class="cont">
				<!-- cp1interest2 -->
				<div class="cp1interest2">
					<ul class="mls">
                        @if(array_key_exists('웹개발', $interest_arr)){
						<li class="m m1">
							<a class="a1">
								<i class="ic1"></i><span class="t1">웹개발</span>
								<i class="star5rating3">

                                        <i class="st-on" style="width:{{ $interest_arr['웹개발'].'%' }};"><i class="ic1"></i></i><!-- (5/5) -->
                                        <i class="st-off" style="width:{{ (100-$interest_arr['웹개발']).'%' }};"><i class="ic2"></i></i><!-- (100-0) -->
                                    }

								</i>
							</a>
						</li>
                        @endif
                        @if (array_key_exists('모바일개발', $interest_arr))
						<li class="m m2">
							<a class="a1">
								<i class="ic1"></i><span class="t1">모바일개발</span>
								<i class="star5rating3">
									<i class="st-on" style="width:{{ $interest_arr['모바일개발'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
									<i class="st-off" style="width:{{ (100-$interest_arr['모바일개발']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
								</i>
							</a>
						</li>
                        @endif
                        @if (array_key_exists('프로그래밍 언어', $interest_arr))
						<li class="m m3">
							<a class="a1">
								<i class="ic1"></i><span class="t1">프로그래밍 언어</span>
								<i class="star5rating3">
									<i class="st-on" style="width:{{ $interest_arr['프로그래밍 언어'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
									<i class="st-off" style="width:{{ (100-$interest_arr['프로그래밍 언어']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
								</i>
							</a>
						</li>
                        @endif
                        @if (array_key_exists('데이터분석', $interest_arr))
						<li class="m m4">
							<a class="a1">
								<i class="ic1"></i><span class="t1">데이터분석</span>
								<i class="star5rating3">
									<i class="st-on" style="width:{{ $interest_arr['데이터분석'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
									<i class="st-off" style="width:{{ (100-$interest_arr['데이터분석']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
								</i>
							</a>
						</li>
                        @endif
                        @if (array_key_exists('인공지능', $interest_arr))
						<li class="m m5">
							<a class="a1">
								<i class="ic1"></i><span class="t1">인공지능</span>
								<i class="star5rating3">
                                    <i class="st-on" style="width:{{ $interest_arr['인공지능'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
									<i class="st-off" style="width:{{ (100-$interest_arr['인공지능']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
								</i>
							</a>
						</li>
                        @endif
                        @if (array_key_exists('데이터베이스', $interest_arr))
						<li class="m m6">
							<a class="a1">
								<i class="ic1"></i><span class="t1">데이터베이스</span>
								<i class="star5rating3">
									<i class="st-on" style="width:{{ $interest_arr['데이터베이스'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
									<i class="st-off" style="width:{{ (100-$interest_arr['데이터베이스']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
								</i>
							</a>
						</li>
                        @endif
                        @if (array_key_exists('유아교육', $interest_arr))
						<li class="m m7">
							<a class="a1">
								<i class="ic1"></i><span class="t1">유아교육</span>
								<i class="star5rating3">
                                    <i class="st-on" style="width:{{ $interest_arr['유아교육'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
									<i class="st-off" style="width:{{ (100-$interest_arr['유아교육']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
								</i>
							</a>
						</li>
                        @endif
                        @if (array_key_exists('초등교육', $interest_arr))
						<li class="m m8">
							<a class="a1">
								<i class="ic1"></i><span class="t1">초등교육</span>
								<i class="star5rating3">
									<i class="st-on" style="width:{{ $interest_arr['초등교육'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
									<i class="st-off" style="width:{{ (100-$interest_arr['초등교육']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
								</i>
							</a>
						</li>
                        @endif
                        @if (array_key_exists('직무능력', $interest_arr))
						<li class="m m9">
							<a class="a1">
								<i class="ic1"></i><span class="t1">직무능력</span>
								<i class="star5rating3">
									<i class="st-on" style="width:{{ $interest_arr['직무능력'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
									<i class="st-off" style="width:{{ (100-$interest_arr['직무능력']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
								</i>
							</a>
						</li>
                        @endif
                        @if (array_key_exists('금융 · 경영', $interest_arr))
						<li class="m m10">
							<a class="a1">
								<i class="ic1"></i><span class="t1">금융 · 경영</span>
								<i class="star5rating3">
                                    <i class="st-on" style="width:{{ $interest_arr['금융 · 경영'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
									<i class="st-off" style="width:{{ (100-$interest_arr['금융 · 경영']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
								</i>
							</a>
						</li>
                        @endif
					</ul>
				</div>
				<!-- /cp1interest2 -->
			</div>
			<div class="fg1">
				<!-- <a href="?#" class="a2"><span class="a2t1">프로필설정 &gt;</span></a> -->
				<!-- <a href="#layer1interests1set1" class="a2 toggle" data-send-focus="that"><span class="a2t1">관심분야 설정 &gt;</span></a> -->
			</div>
		</div>
		<!-- /cp1dash1interest1 -->

		<script>/*<![CDATA[*/
			(function(){
				/** ◇◆ 단순이전다음. 20210203. 20210406. @m.
				 */
				var $my = $('.cp1dash1interest1'),
					$prev = $('.mControl .prev', $my),
					$next = $('.mControl .next', $my),
					$v = $('.cp1interest2', $my); // 뷰
					$c = $('.cp1interest2 .mls', $my); // 콘텐츠
					console.log($v.height());
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


		<!-- (레이어팝업) -- 헤드에 설정-->


	</div>
	<div class="small-12 large-6 column">


		<!-- cp1dash1flist1 -->
		<div class="cp1dash1flist1">
			<div class="hg1">
				<h3 class="h1">최근 3개월 두런 조회수 Top 3  영상</h3>
				<a href="{{ route('etc.user_introduction', ['role' => 'youtuber']) }}#cp1tabs3pane2" class="more">더보기 &gt;</a>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1">
						<a href="#?" class="a1">
							<div class="w1">
								<b class="g1">1</b>
								<div class="f1">
									<span class="f1p1">
                                        <img src="https://img.youtube.com/vi/mN6v6NJ8Gko/mqdefault.jpg" alt="빅데이터의 개념">
									</span>
									<i class="ic1 play">Play</i>
								</div>
							</div>
							<div class="w2">
								<div class="t1">빅데이터의 개념</div>
								<div class="t2">
									<span class="t2t1">#빅데이터</span>
									<span class="t2t1">#4차산업혁명</span>
								</div>
								<div class="t3">조회수 2125회</div>
							</div>
						</a>
					</li>
					<li class="li1">
						<a href="#?" class="a1">
							<div class="w1">
								<b class="g1">2</b>
								<div class="f1">
									<span class="f1p1">
										<img src="https://img.youtube.com/vi/k5ZBMbPOPNg/mqdefault.jpg" alt="자동 합계로 함수 쉽게 사용하는 방법">
									</span>
									<i class="ic1 play">Play</i>
								</div>
							</div>
							<div class="w2">
								<div class="t1">자동 합계로 함수 쉽게 사용하는 방법</div>
								<div class="t2">
									<span class="t2t1">#엑셀</span>
									<span class="t2t1">#자동합계함수</span>
								</div>
								<div class="t3">조회수 15020회</div>
							</div>
						</a>
					</li>
					<li class="li1">
						<a href="#?" class="a1">
							<div class="w1">
								<b class="g1">3</b>
								<div class="f1">
									<span class="f1p1">
										<img src="https://img.youtube.com/vi/-0gmF9UIMc8/mqdefault.jpg" alt="블로그 마케팅 - 맘메이트님 블로그 진단">
									</span>
									<i class="ic1 play">Play</i>
								</div>
							</div>
							<div class="w2">
								<div class="t1">블로그 마케팅 - 맘메이트님 블로그 진단</div>
								<div class="t2">
									<span class="t2t1">#블로그</span>
									<span class="t2t1">#마케팅</span>
								</div>
								<div class="t3">조회수 1401회</div>
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
				<h3 class="h1">관련 채널 비교</h3>
				<a href="{{ route('etc.user_introduction', ['role' => 'youtuber']) }}#cp1tabs3pane3" class="more">더보기 &gt;</a>
			</div>
			<div class="cont">

				<strong class="tt1 mgl6em  tar">동일한 카테고리의 <span class="dpib">구독자 수가 비슷한 8개의 채널 비교 <span class="dpib">(최근 3개월)</span></span></strong>

				<!-- cp1chart2scatter1 -->
				<div class="cp1chart2scatter1">
					<!-- cont -->
					<div class="cont">
						<!-- graph -->
						<div class="graph">
							<!-- xy눈금모눈. 고정!
								세로 10개 ([class*='row'])
								가로 8개 ([class*='row']>i 와 [class*='col'])
							-->
							<span class="ylabel">구독자수</span>
							<span class="xlabel">일일 조회수</span>
							<div class="scales">
								<div class="row9"><span class="yv">9</span><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
								<div class="row8"><span class="yv">8</span><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
								<div class="row7"><span class="yv">7</span><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
								<div class="row6"><span class="yv">6</span><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
								<div class="row5"><span class="yv">5</span><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
								<div class="row4"><span class="yv">4</span><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
								<div class="row3"><span class="yv">3</span><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
								<div class="row2"><span class="yv">2</span><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
								<div class="row1"><span class="yv">1</span><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
								<div class="row0"><span class="yv">0</span><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
							</div>
							<div class="cols">
								<span class="col0"><span class="xv">0</span></span>
								<span class="col1"><span class="xv">1</span></span>
								<span class="col2"><span class="xv">2</span></span>
								<span class="col3"><span class="xv">3</span></span>
								<span class="col4"><span class="xv">4</span></span>
								<span class="col5"><span class="xv">5</span></span>
								<span class="col6"><span class="xv">6</span></span>
								<span class="col7"><span class="xv">7</span></span>
							</div>
							<!-- ☆ 항목수([class*='dl']) 본인+비교8개  -->
							<div class="data">
								<div class="di0" tabindex="0">
									<i class="pt"><img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" /></i>
									<div class="tooltip">
										<div class="w1">
											<i class="p1"><img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" /></i>
										</div>
										<div class="w2">
											<div class="t1">본인채널</div>
											<div class="t2"><i class="t2t1">구독자</i> <i class="v1" data-v="2500000"></i></div>
											<div class="t3"><i class="t3t1">일일 조회수</i> <i class="v2" data-v="4700"></i></div>
										</div>
									</div>
								</div>
								<div class="di1" tabindex="0">
									<i class="pt"></i>
									<div class="tooltip on">
										<div class="w1">
											<i class="p1"><img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" /></i>
										</div>
										<div class="w2">
											<div class="t1">유튜버이름일이삼사오륙칠팔구십</div>
											<div class="t2"><i class="t2t1">구독자</i> <i class="v1" data-v="600000"></i></div>
											<div class="t3"><i class="t3t1">일일 조회수</i> <i class="v2" data-v="100"></i></div>
										</div>
									</div>
								</div>
								<div class="di2" tabindex="0">
									<i class="pt"></i>
									<div class="tooltip">
										<div class="w1">
											<i class="p1"><img src="{{ asset('assets/images/main/x1/x1p603.jpg') }}" alt="★대체텍스트필수" /></i>
										</div>
										<div class="w2">
											<div class="t1">유튜버이름</div>
											<div class="t2"><i class="t2t1">구독자</i> <i class="v1" data-v="2200000"></i></div>
											<div class="t3"><i class="t3t1">일일 조회수</i> <i class="v2" data-v="4900"></i></div>
										</div>
									</div>
								</div>
								<div class="di3" tabindex="0">
									<i class="pt"></i>
									<div class="tooltip">
										<div class="w1">
											<i class="p1"><img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" /></i>
										</div>
										<div class="w2">
											<div class="t1">유튜버이름</div>
											<div class="t2"><i class="t2t1">구독자</i> <i class="v1" data-v="6000"></i></div>
											<div class="t3"><i class="t3t1">일일 조회수</i> <i class="v2" data-v="1300"></i></div>
										</div>
									</div>
								</div>
								<div class="di4" tabindex="0">
									<i class="pt"></i>
									<div class="tooltip">
										<div class="w1">
											<i class="p1"><img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" /></i>
										</div>
										<div class="w2">
											<div class="t1">유튜버이름</div>
											<div class="t2"><i class="t2t1">구독자</i> <i class="v1" data-v="1900000"></i></div>
											<div class="t3"><i class="t3t1">일일 조회수</i> <i class="v2" data-v="2000"></i></div>
										</div>
									</div>
								</div>
								<div class="di5" tabindex="0">
									<i class="pt"></i>
									<div class="tooltip">
										<div class="w1">
											<i class="p1"><img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" /></i>
										</div>
										<div class="w2">
											<div class="t1">유튜버이름</div>
											<div class="t2"><i class="t2t1">구독자</i> <i class="v1" data-v="1700000"></i></div>
											<div class="t3"><i class="t3t1">일일 조회수</i> <i class="v2" data-v="2600"></i></div>
										</div>
									</div>
								</div>
								<div class="di6" tabindex="0">
									<i class="pt"></i>
									<div class="tooltip">
										<div class="w1">
											<i class="p1"><img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" /></i>
										</div>
										<div class="w2">
											<div class="t1">유튜버이름</div>
											<div class="t2"><i class="t2t1">구독자</i> <i class="v1" data-v="3100000"></i></div>
											<div class="t3"><i class="t3t1">일일 조회수</i> <i class="v2" data-v="2700"></i></div>
										</div>
									</div>
								</div>
								<div class="di7" tabindex="0">
									<i class="pt"></i>
									<div class="tooltip">
										<div class="w1">
											<i class="p1"><img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" /></i>
										</div>
										<div class="w2">
											<div class="t1">유튜버이름</div>
											<div class="t2"><i class="t2t1">구독자</i> <i class="v1" data-v="1500000"></i></div>
											<div class="t3"><i class="t3t1">일일 조회수</i> <i class="v2" data-v="3300"></i></div>
										</div>
									</div>
								</div>
								<div class="di8" tabindex="0">
									<i class="pt"></i>
									<div class="tooltip">
										<div class="w1">
											<i class="p1"><img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" /></i>
										</div>
										<div class="w2">
											<div class="t1">유튜버이름</div>
											<div class="t2"><i class="t2t1">구독자</i> <i class="v1" data-v="3050000"></i></div>
											<div class="t3"><i class="t3t1">일일 조회수</i> <i class="v2" data-v="4000"></i></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /graph -->
					</div>
					<!-- /cont -->
				</div>
				<!-- /cp1chart2scatter1 -->

				<script>/*<![CDATA[*/
					//$(function(){
						(function(){

							makeChartScatter('.cp1chart2scatter1 .graph');

							/** ◇◆ 산점도 만들기. 20210409. @m.
							 */
							function makeChartScatter(selector){
								var $my = $(selector),
								$data = $('.data', $my), // 자료
								$di = $('[class*="di"]', $my), // 자료항목
								$row = $('.scales [class*="row"]', $my), // 눈금 Y축
								$col = $('.cols [class*="col"]', $my), // 눈금 X축
								rowSum = $row.length, // 눈금 Y축 칸수
								colSum = $col.length, // 눈금 X축 칸수
								mdx = 0, mdy = 0, // 자료 최대값
								msx = 0,  msy = 0, // 최대 눈금값
								digitsx = 0, digitsy = 0; // 눈금값 하위자리수 절삭용 자리수값 10, 100, 1000, ..

								console.log( $('.v1', $data).data('v'), $('.v2', $data).data('v')  );

								// 최대값 구하기 +
								$di.each(function(){
									$data.v1 = parseInt( $('.v1', this).data('v').toString().replace(',', '') ); // y축
									mdy = ($data.v1 > mdy) ? $data.v1: mdy;
									$data.v2 = parseInt( $('.v2', this).data('v').toString().replace(',', '') ); // x축
									mdx = ($data.v2 > mdx) ? $data.v2: mdx;

									// 툴팁값 넣기
									$('.v1', this).text( convertNum($data.v1) );
									$('.v2', this).text( convertNum($data.v2) );
								});

								// ☆ 자료 최대값이 최대눈금-1 쯤 되도록 최대 정수 눈금값을 만든다.
								msy =  Math.ceil( mdy * ( rowSum / (rowSum - 1) ) );
								msx =  Math.ceil( mdx * ( colSum / (colSum - 1) ) );

								// 자리수-1 이유? 다른 눈금값은 최대값을 다시 나눠서 앞2자리까지 표현된다.
								digitsy = Math.pow( 10, msy.toString().length - 1 );
								digitsx = Math.pow( 10, msx.toString().length - 1 );

								msy = Math.ceil( msy / digitsy ) * digitsy;
								msx = Math.ceil( msx / digitsx ) * digitsx;

								//console.log(msy, digitsy, msx, digitsx);

								// 눈금 값 넣기
								$row.each(function(){
									$my.y = msy * ( rowSum - $(this).index() ) / rowSum; // 최대에서 최소 눈금. 0은 제외
									$my.y = Math.round( $my.y );
									$('.yv', this).text( convertNum($my.y) );
								});
								$col.each(function(){
									$my.x = msx * ( $(this).index() + 1 ) / colSum; // 최소에서 최대 눈금. 0은 제외
									$my.x = Math.round( $my.x );
									$('.xv', this).text( convertNum($my.x) );
								});

								// 그래프 그리기
								$di.each(function(){
									// 최대 눈금값 대비 비율
									$data.dgy = ( parseInt( $('.v1', this).data('v').toString().replace(',', '') ) / msy ); // y
									$data.dgx = ( parseInt( $('.v2', this).data('v').toString().replace(',', '') ) / msx ); // x
									$(this).css({
										bottom: ($data.dgy *100) + '%', // y
										left: ($data.dgx *100) + '%' // x
									});
								});

								// 숫자 표현 변환
								function convertNum(n){
									// 10000 이상이면 00.0000만
									if( n >= 10000 ){
										n = (n / 10000) + '만';
									}
									//else if( n >= 1000 ){
									//	n = (n / 1000) + '천';
									//}
									return n;
								}
								//console.log( convertNum(99999) );;

							};

						})();
					//});

				/*]]>*/</script>


			</div>
		</div>
		<!-- /cp1dash1chart1 -->


	</div>
	<div class="small-12 column">


		<!-- cp1dash1chart1 -->
		<div class="cp1dash1chart1">
			<div class="hg1">
				<div class="hg1w1">
					<h3 class="h1">일일 조회수 변화량</h3>
					<a href="{{ route('etc.user_introduction', ['role' => 'youtuber']) }}#cp1tabs3pane1" class="a1">채널분석 모두보기</a>
				</div>
				<div class="clearfix">
					<select title="선택옵션" class="type1 w5em">
						<option value="">월</option>
						<option value="">주</option>
						<option value="">일</option>
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
						/** ◇◆ 차트 :: 라인. 20210408. @m.
						 * chart.js
						 */
						(function(){

							var ctx = document.getElementById('myChart2').getContext('2d');
							var myChart = new Chart(ctx, {
								type: 'line',
								data: {
									labels: ['2020/03', '2020/04', '2020/05', '2020/06', '2020/07', '2020/08', '2020/09', '2020/10', '2020/11', '2020/12', '2021/01', '2021/02'],
									datasets: [{
										label: '유튜브 조회수',
										yAxisID: 'y-axis-1',
										data: [80, 220, 190, 80, 175, 300, 160, 250, 330, 295, 245, 425],
										borderColor:'rgba(0,128,255, 1)',
										backgroundColor:'rgba(0,128,255, .1)',
										borderWidth: 2,
										pointRadius: 4,
										pointBackgroundColor: '#000',
										tension: .4
									},{
										label: '두런 조회수',
										yAxisID: 'y-axis-2',
										data: [0, 180, 140, 0, 130, 270, 100, 220, 310,260, 205, 410],
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

		<!-- (레이어팝업) ->head 부분에 include -->
        <!--@include('account.inc_layer_interests_set')-->

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
                    {{-- TODO: 임시 idx 값 --}}
					<li class="li1"><a href="{{ route('learning.main', ['idx' => '17']) }}" class="a1"><span class="t1">데이터분석과 텍스트마이닝</span> <span class="t2">3일전</span></a></li>
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
				<a href="{{ route('manage.instructor.operation_lecture') }}" class="a2"><span class="a2t1">내 모든강좌 &gt;</span></a>
                {{-- TODO: 임시 idx 값 --}}
				<a href="{{ route('learning.main', ['idx' => '17']) }}" class="a2 cvf"><span class="a2t1">이어서 학습하기 &gt;</span></a>
			</div>
		</div>
		<!-- /cp1dash1recent1 -->


	</div>
	<div class="small-12 medium-6 column">


		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 시청 영상</h3>
				<a href="{{ route('sub.video.video_play_history', ['role' => 'youtuber']) }}" class="a3"><span class="a3t1">내 시청기록 &gt;</span></a>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">03.빅데이터의 개념</span> <span class="t2">방금</span></a></li>
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">02.빅데이터의 등장(2/2)</span> <span class="t2">2일전</span></a></li>
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">01.빅데이터의 등장(1/2)</span> <span class="t2">3일전</span></a></li>
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
