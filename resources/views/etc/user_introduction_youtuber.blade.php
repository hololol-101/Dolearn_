<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210401 | @m | 요구반영. 결함개선. 고도화.
 * ~20210406 | @m |
 * 20210510 | @m |
 */
-->
@extends('master_sub')

@section('title', '유튜브 채널 소개')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1who1 -->
<div class="cp1who1">
	<div class="w1">
		<div class="w1w1">
			<div class="f1">
				<span class="f1p1">
					<!-- <img src="{{ asset('assets/images/lib/noimg1face1d800.png') }}" alt="이미지 없음" /> -->
					<img src="/_res/dolearn/img/lib/x4/x4p100.jpg" alt="MKTV 김미경 TV" />
				</span>
			</div>
		</div>
		<div class="w1w2">
			<div class="tg1">
				<strong class="t1">MKTV 김미경 TV</strong>
				<a href="https://www.youtube.com/user/artspeech0783" target="_blank" rel="noopener" title="유튜브 채널 [새 창]" class="b2 youtube">유튜브 채널</a>
			</div>
			<!-- <a href="#★" class="cp1switch1 switch toggle fw4"> -->
			<a class="cp1switch1 switch fw4">
				<span class="t1 sw-off">강사 소개 OFF</span>
				<span class="t1 sw-on">강사 소개 ON</span>
				<i class="ic1"></i>
			</a>
			<div class="tg2">
				<!-- 유튜버 채널소개가 표시 됩니다.<br />
				좌측 제안하기 버튼은 유튜버가 두런에 가입을 하고 인증을 받으면 활성화 됩니다.<br /> -->

				<div class="t2">학력 및 활동</div>
				<ul class="bu">
				<li>연세대학교 작곡과 학사</li>
				<li>이화여자대학교 대학원 음악학 석사</li>
				<li>더블유 인사이츠 대표, 아트스피치 원장, 김미경의 이클래스 대표 역임 중.</li>
				<li>tvN &lt;어쩌다 어른&gt;, JTBC &lt;김미경 전현무의 나만 그런가&gt; 등 다수의 방송 경력.</li>
				<li>&lt;김미경이 리부트&gt;, &lt;엄마의 자존감 공부&gt; 등 작품 활동 중.</li>
				<li>현재 MKTV 김미경 TV 유튜브 채널 운영 중.</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- /cp1who1 -->


<div class="clearfix mgb3em"></div>


<h3 class="blind">채널 분석</h3>


<!-- cp1dash4info1 -->
<div class="cp1dash4info1">
	<div class="hg1">
		<h4 class="h1"><span class="h1t1">YouTube</span></h4>
		<p class="t1">
			유튜브에서 집계되는<br class="hide-all show-large" /> 정보입니다.
		</p>
	</div>
	<div class="cont">
		<div class="item">
			<strong class="t1">구독자</strong>
			<span class="t2">
				<span class="t2t1">2000</span>
				<!-- st1 : 증가 up | 감소 dn  -->
				<span class="st1 dn" title="증감">-110</span>
			</span>
			<span class="t3">YouTube 순위 13th</span>
		</div>
		<div class="item">
			<strong class="t1">조회수</strong>
			<span class="t2">
				<span class="t2t1">1만</span>
				<span class="st1 up" title="증감">+10</span>
			</span>
			<span class="t3">YouTube 순위 13th</span>
		</div>
		<div class="item">
			<strong class="t1">동영상</strong>
			<span class="t2">
				<span class="t2t1">152</span>
			</span>
		</div>
	</div>
</div>
<!-- /cp1dash4info1 -->


<!-- cp1dash4info1 -->
<div class="cp1dash4info1">
	<div class="hg1">
		<h4 class="h1"><span class="h1t1">DoLearn</span></h4>
		<p class="t1">
			두런에서 집계되는<br class="hide-all show-large" /> 정보입니다.
		</p>
	</div>
	<div class="cont">
		<div class="item">
			<strong class="t1">
				<span class="dpib">채널 평점</span>
				<span class="bi1 dpib fsS1 vat mgt-4px">
					<a href="#?" class="li1 tooltip1 lt">
						<span class="tooltip1c" style="width:19em;">
							4개의 기준으로 채널을 분석한 결과 입니다.<br />
							(100점 만점)<br />
						</span>
					</a>
				</span>
			</strong>
			<span class="t2">
				<span class="t2t1">67점</span>
			</span>
			<span class="t3">두런 순위 11th</span>
		</div>
		<div class="item">
			<strong class="t1">두런 조회수</strong>
			<span class="t2">
				<span class="t2t1">2000회</span>
				<span class="st1 up" title="증감">+10</span>
			</span>
			<span class="t3">두런 순위 11th</span>
		</div>
		<div class="item">
			<strong class="t1">연관 강좌 수</strong>
			<span class="t2">
				<span class="t2t1">33개</span>
			</span>
		</div>
	</div>
</div>
<!-- /cp1dash4info1 -->


<div class="clearfix mgb3em"></div>


<h3 class="blind">동영상 분석</h3>


<!-- cp1dash4box1 -->
<div class="cp1dash4box1 mgt3em">

	<div class="cp1row2 pdb175em bdb1px bdcfo02">
		<h3 class="hb1 h1 mg0 fw4 fsB12">최근 3개월 두런 조회수 Top 3  영상</h3>
	</div>

	<!-- cp1fcard12 -->
	<div class="cp1fcard12">
	<div class="wrap1">
		<!-- lst1 -->
		<div class="lst1 even-grid evenmix-1113 vgap0">
			<div class="item column">
				<div class="w1">
					<a href="?#★" class="a1">
						<strong class="tt1">
							<b class="tt1g1">1</b>
							<span class="tt1t1">자동 합계로 함수 쉽게 사용하는 방법</span>
						</strong>
						<div class="w2">
							<div class="w2w1">
								<div class="f1">
									<span class="f1p1">
										<img src="{{ asset('assets/images/main/x1/x1p101.jpg') }}" alt="★대체텍스트필수" />
									</span>
									<i class="ic1 play">Play</i>
								</div>
							</div>
							<div class="w2w2">
								<div class="tg1">
									<div class="t1">
										<span class="t1t1">조회수</span>
										<span class="t1t2">2000회</span>
									</div>
									<div class="t1">
										<span class="t1t1">두런 조회수</span>
										<span class="t1t2">153회</span>
									</div>
									<div class="t1">
										<span class="t1t1">영상 평점</span>
										<span class="t1t2">44점</span>
									</div>
									<div class="t2">
										<span class="t2t1">#태그일</span>
										<span class="t2t1">#태그이</span>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!-- /lst1 -->
	</div>
	</div>
	<!-- /cp1fcard12 -->

</div>
<!-- /cp1dash4box1 -->


<!-- cp1dash4box1 -->
<div class="cp1dash4box1">

	<div class="cp1row2 pdb175em bdb1px bdcfo02">
		<h3 class="hb1 h1 mg0 fw4 fsB12">유튜버이름 인기 동영상</h3>
		<div class="clearfix">
			<select title="선택옵션" class="type1">
				<option value="">영상 평점 기준</option>
				<option value="">두런 조회수 기준</option>
				<option value="">조회수 기준</option>
			</select>
		</div>
	</div>

	<!-- cp1fcard13 -->
	<div class="cp1fcard13">
	<div class="wrap1">
		<!-- lst1 -->
		<div class="lst1 even-grid evenmix-223 gap25pct vgap0">
			<div class="item column">
				<div class="w1">
					<a href="?#★" class="a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p001.jpg') }}" alt="★대체텍스트필수" />
							</span>
							<i class="ic1 play">Play</i>
						</div>
						<div class="tg1">
							<strong class="t1">자동 합계로 함수 쉽게 사용하는 방법</strong>
						</div>
						<div class="tg2">
							<span class="t2">
								<span class="t2ic1">재생</span>
								<span class="t2t2">1800</span>
							</span>
							<span class="t2">
								<span class="t2t1">두런</span>
								<span class="t2ic1">재생</span>
								<span class="t2t2">153</span>
							</span>
							<span class="t3">평점 88</span>
						</div>
						<div class="tg3">
							<span class="t4">#태그</span>
							<span class="t4">#태그</span>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!-- /lst1 -->

		<!-- cp1more1 -->
		<div class="cp1more1">
			<a href="#★" class="more">
				<span class="t1">더보기</span>
				<i class="ic1"></i>
			</a>
		</div>
		<!-- /cp1more1 -->

	</div>
	</div>
	<!-- /cp1fcard13 -->

	<script>/*<![CDATA[*/
		$(function(){

			/** ◇◆ 더보기클릭샘플. 20210402. @m
			 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
			 */
			(function(){
				var $my = $('.cp1fcard13'),
					$more = $('.more', $my),
					$lst = $('.lst1', $my);
				var html = $lst.html();

				$more.on('click', function(e){
					e.preventDefault();
					$lst.append($(html));
				});
			})();

		});
	/*]]>*/</script>

</div>
<!-- /cp1dash4box1 -->


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
