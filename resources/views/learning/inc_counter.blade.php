<!-- cp2exam2 -->
<div class="cp2exam2">
	<div class="tg1">
		<span class="eg1">
			<span class="st1"><i class="ic1 question"></i> <span class="t1">총 15문제</span></span>
			<span class="st1"><i class="ic1 time"></i> <span class="t1">30분</span></span>
		</span>
		<strong class="t1">실전 모의고사 1회</strong>
	</div>
	<!-- cp2chart1timer1 -->
	<div class="cp2chart1timer1">
		<span class="t1"><span class="t1t1" data-num="0" title="남은시간(초)"></span></span>
		<svg class="chart" viewBox="0 0 220 220">
			<circle class="bg" cx="110" cy="110" r="100"></circle>
			<circle class="fg" cx="110" cy="110" r="100"></circle>
		</svg>
	</div>
	<!-- /cp2chart1timer1 -->
</div>
<!-- /cp2exam2 -->


<script>/*<![CDATA[*/
	/** ◇◆ SVG. 원 그래프 애니메이션 + 타이머. 20210419. @m.
	 */
	(function(){

		MJS = window.MJS || {};
		MJS.doTimer2 = function(sec){

			var $my = $('.cp2chart1timer1');

			// 애니메이션 
			(function animateChart(){
			
				$my.each(function(){

					var timer; // setInterval
					var $item = $(this);
					var $title = $('.t1t1', $item);
					var $circle = $('circle.fg', $item);
					
					$title.attr({'data-num': sec}); // sec 가 undefined 이면 data-num 값 그대로 유지

					var targetNum = $title.data('num');
					var setTime = targetNum || 0; // 기본 설정 초 0
					var hms, h, m, s;

					// 애니메이션
					$({rate: 0}).animate({rate: targetNum},{
						duration: targetNum * 1000,
						easing: 'linear',
						progress: function(){
							var now = this.rate;
							var amount = ( 628 * now / targetNum );
							//$title.text( Math.floor(now) ); // 값카운트 )) hmsTime() 로 대체
							$circle.css({strokeDashoffset: amount}); // 선그리기
						}
					});

					// 타이머글
					function hmsTime(){
						h = Math.floor(setTime / 3600); // 남은 시
						m = Math.floor((setTime % 3600) / 60); // 남은 분
						s = (setTime % 60); // 남은 초
						h = (h < 10)? '0' + h: h;
						m = (m < 10)? '0' + m: m;
						s = (s < 10)? '0' + s: s;
						if( parseInt(h) == 0 ){
							hms = m + ':' + s + '';
						}else{
							hms = h + ':' + m + ':' + s + '';
						}
						$title.html(hms);
						setTime--; // 1초씩 감소
						if (setTime < 0) {
							clearInterval(timer);
							$title.html('<span class="t0">시험종료</span>');
						}
					}
					hmsTime(); // 즉시 호출
					timer = setInterval(hmsTime, 1000); // 1초마다 갱신
				});

			})();

		};

		// 호출 (재 호출은 안됨)
		//MJS.doTimer2(); // (data-num 값 그대로 유지)
		//MJS.doTimer2(0); // (타임아웃)
		//MJS.doTimer2(22); // (22초)

	})();
/*]]>*/</script>