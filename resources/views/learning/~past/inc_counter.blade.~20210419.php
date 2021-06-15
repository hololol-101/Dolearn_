<!-- cp2exam2 -->
<div class="cp2exam2">
	<div class="tg1">
		<span class="eg1">
			<span class="st1"><i class="ic1 question"></i> <span class="t1">총 15문제</span></span>
			<span class="st1"><i class="ic1 time"></i> <span class="t1">30분</span></span>
		</span>
		<strong class="t1">실전 모의고사 1회</strong>
	</div>
	<!-- cp2timer1 -->
	<div class="cp2timer1">
		<div class="donut">
			<div class="bg"></div>
			<div class="pie spinner"></div>
			<div class="pie filler"></div>
			<div class="mask"></div>
		</div>
		<span class="cp2timer1t1"></span>
	</div>
	<!-- /cp2timer1 -->
</div>
<!-- /cp2exam2 -->
<script>/*<![CDATA[*/
	/** ◇◆ 시험시간타이머. 20200127. @m
	 */
	(function(){
		
		var timer; // 여기 선언하여 타이머 중복 호출 방지

		MJS = window.MJS || {};
		MJS.doTimer1 = function(sec){
			var setTime = sec || 0; // 기본 설정 초 0
			var msg, m, s;
			var $my = $('.cp2timer1t1');
			var $dc = $('.cp2timer1 .donut *');

			// 중복 방지
			clearInterval(timer);

			// 도넛 동작시간 설정. setTime-- 하기 전에 한다! 
			$dc.css({
				animationDuration: setTime + 's'
			});

			// 타이머글
			function msgTime(){
				m = Math.floor(setTime / 60); // 남은 분
				s = (setTime % 60); // 남은 초
				m = (m < 10)? '0' + m: m;
				s = (s < 10)? '0' + s: s;
				msg = m + ':' + s + '';
				$my.html(msg);
				setTime--; // 1초씩 감소
				if (setTime < 0) {
					clearInterval(timer);
					$my.html('<span class="t0">시험종료</span>');
				}
			}
			msgTime(); // 즉시 호출
			timer = setInterval(msgTime, 1000); // 1초마다 갱신
		};
		MJS.doTimer1(); // 호출
	})();
/*]]>*/</script>