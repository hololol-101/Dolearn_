/**
 * script.js
 * JavaScript jQuery 필요한거 여기 패키징
 * 20201217 | @m | 최초 등록
 * 20201228 | @m | 요구반영. 결함개선. 고도화.
 * 20210204~ | @m |
 */

/*! JavaScript jQuery v0.999 | (c) 20201217~. 20210121. 20210204 | by @m */

/* Table of contents )) ☆ 코드 추가되면.. 목차 갱신하세요.
 ************************************************************
 Base --
	기본 함수 호출
	 jQuery(function($){
		메소드, 함수 호출 )) ★☆
		즉시 실행
			MJS.doSmoothScroll() 부드러운 스크롤 이동 적용
	 }

 Plugin --
		)) script_base.js

 Function --
	makeActive2ClickHover2() 주메뉴활성동작


 ************************************************************
 */


// 즉시실행에서 호출가능한 함수로 변경 | 20210119. MoonYoungshin
// var MJS = MJS || {}; // 전역에서만 가능
MJS = window.MJS || {};
(MJS.doDo1 = function(){
//(function doDo1(){
	//console.log(this);
//})();
})();


//jQuery.noConflict();
/* ◇◆ jQuery(document).ready(function($){}); ◇◆◇◆◇◆◇◆◇◆ */
jQuery(function($){


/* ◇◆ 메소드, 함수 호출 ◇◆◇◆◇◆ */


// 주메뉴 기본 동작
makeActive2ClickHover2('#tnb1');



/* ◇◆ 즉시 실행 ◇◆◇◆◇◆ */


/** ◇◆ 부드러운 스크롤 이동 적용 v0.2 | 20210121. 20210129. 20210204 MoonYoungShin.
 * Use) a href="webpage.html#fragmentlink" class="mj-smooth1scroll1"
 * 새 페이지 로딩 후 앵커로 부드럽게 스크롤
 */
(MJS.doSmoothScroll = function(selector){

	if(window.location.hash) scroll(0,0); // 바로 맨 위로
	setTimeout( function(){ scroll(0,0); }, 1); // 일부 브라우저 문제 무효화
	$(function(){
			// 클릭 기능
			$('.mj-smooth1scroll1').on('click', function(e){
					e.preventDefault();
					//smoothScrollTop($($(this).attr('href')).offset().top, -30);
					smoothScrollTop($($(this)[0].hash).offset().top, -30); // #값만 추출
			});
			try{
				// URL에 앵커 있는 경우
				if(window.location.hash){
					// 주의! 	해시값이 유효하지 않으면 $(window.location.hash) 오류. 예를 들면 #★
					smoothScrollTop($(window.location.hash).offset().top, -30);
				}
			}catch(e){
			}
	});
})();


}); /* /jQuery(function($){})(); ◇◆◇◆◇◆◇◆◇◆ */


/* ◇◆ Plugin ◇◆◇◆◇◆◇◆◇◆ */





/* ◇◆ Function ◇◆◇◆◇◆◇◆◇◆ */


/** ◇◆ 주메뉴활성동작2 | 20160908~ 20191023. 20201113. MoonYoungShin.
 * Use) makeActive2ClickHover2('#tnb1');
 * makeActive2ClickHover2('#tnb1', {activeThey: 'all'}); // 데스크탑 1차메뉴 li 모두 .over 만듦
 * makeActive2ClickHover2('#tnb1', {onFilter: '.m1'}); // 1차메뉴 li.m1.on 만듦
 * 모바일 (()) 데스크탑('.width-xlarge')
 * li 이벤트 'focusin mouseenter' 하면 .over 만듦
 * 모바일: 1차~2차~4차메뉴 클릭하면 링크 이동 없이 하위메뉴 펼침.
 * 데스크탑: 1~3차메뉴 클릭하면 모두 링크 이동. 메뉴 호버하면 하위메뉴 펼침.
 * 데스크탑. setTimeout 하면 마우스 빠른 동작 결함 발생하니 CSS transition 이용바람.
 * 20191018. 메뉴 통 초점 호버 동작
 * 20191023. 데스크탑.주메뉴
 * 20201113. 키보드 접근성 결함개선
 * Task) 2차높이계산 take2tnb1heightD2() )) ★☆ script.js
 * Task) To Advance.
 */
function makeActive2ClickHover2(selector, options){
	var $my = $(selector);
	if(!$my) return false;
	var timer = null; // 타이머 초기화위해 필요
	var config = {
		onFilter : null, // 최초활성 선택자. 예) '.m1'
		activeThey : 'one', // 데스크탑 활성옵션.  one: 해당메뉴 | all: 모든메뉴
		onToggle: true
	};
	$.extend(config, options);

	$tnb1c = $('#tnb1c');
	$my.$d1 = $('div.d1', $my);
	$my.$d2 = $('div.d2', $my);
	$my.$m = $('li', $my);
	$my.$a = $('li>a[href]', $my);
	$my.$close = $('.b3.close', $my); // 2차~ 펼친거 닫기

	$('div.d1 a+div', $my).prev().parent().addClass('hasSub');

	if(config.onFilter){
		$my.$m.removeClass('on').filter(config.onFilter).addClass('on');
	}

	$my.$a.off(); // 20170227. 함수 2번 호출하면 아래 토글 동작이 2번 실행되는 결함 해결

	// 앵커 클릭
	$my.$a.on('click', function(){ // a[href]
		if($(this).parent().is('.on')){ // 토글
			if( config.onToggle ){
				$(this).parent().removeClass('on');
			}
		}else{
			$(this).parent().siblings().removeClass('on').end().addClass('on');
		}
		// 링크 이동 return | 이동 없음 return false
		if($('html').is('.width-xlarge')){ // 데스크탑은 모두 링크로 이동
			return;
		}else{
			if($(this).next('div[class*="d"]').length > 0){ // 하위 메뉴 있으면
				return false;
			}else{ // 하위 메뉴 없으면
				return;
			}
		}
	});

	/** ◇◆ 데스크탑.주메뉴 | ~20191023. 20201113
	 * CSS 만으로는 키보드 운용 안되어 JS 개발
	 * 키보드운용 [IE11][CR]OK!
	 */

	//$my.$m.off(); // ☆ 이거하면 다른 곳 스크립트에서 추가한 바인딩도 제거된다.

	// 20191018. 메뉴 통 초점 호버 동작
	$tnb1c.on('focusin mouseenter', function(){
		$(this).addClass('over');
	}).on('focusout mouseleave', function(){
		$(this).removeClass('over');
	});

	// 메뉴 전체 초점 호버 동작
	//$my.$d1.on('focusin mouseenter', function(){
	//	$(this).addClass('over');
	//}).on('focusout mouseleave', function(){
	//	$(this).removeClass('over');
	//});

	// 메뉴 초점 호버 동작
	$my.$m.on('focusin mouseenter', function(){
		var $m = $(this);
		if( config.activeThey == 'one' ){ // 해당메뉴 하나만 오버
			$m.addClass('over').siblings().removeClass('over');
		}else if( config.activeThey == 'all' ){ // 모든메뉴 오버
			$m.siblings().addBack().addClass('over');
		}
	}).on('mouseleave', function(){ // focusout 하지마라.
		var $m = $(this);
		$m.removeClass('over');
	});

	// 키보드 접근성
	$my.$a.on('focusin', function(){
		//console.log(config.activeThey);
		var $m = $(this).parent();
		if( config.activeThey == 'one' ){
			$m.addClass('over').siblings().removeClass('over'); // 해당메뉴 활성
		}else if( config.activeThey == 'all' ){
			$m.siblings().addBack().addClass('over'); // 모든메뉴 활성
		}
	}).on('focusout', function(){
		var $m = $(this).parent();
		//setTimeout(function(){ // 20201113. 주석처리
			//if( !$tnb1c.is('.over') ){ // 20201113. 주석처리
				$my.$m.removeClass('over'); // 모든 .over 제거
			//}
		//}, 0);
	});

	// 2차~ 펼친거 닫기
	$my.$close.on('click', function(){
		// (OK)[CR][FF][OP] 초점은 안보이지만 탭누르면 다음 요소로 이동한다.
		// (Bug)[IE11] 초점을 잃고 웹페이지 처음으로 되돌아간다.
		if( $('html').is('[class*=" IE"]') ){ // [IE7~11] 결함 해결
			var $next = $(this).closest('div.d2').parent('li').next();
			if( !!$next.length && !($next.css('display') == 'none') ){ // 다음 li 가 존재하고 안보이지 않는다면
				$next.attr({tabindex: '0'}).focus().attr({tabindex: ''});
			}else{
				$('#anb1 a').focus(); // 주메뉴 다음 콘텐츠에 초점.
			}
		}
		$(this).blur(); // 이거만해도 메뉴 li 이벤트 focusout 발생한다. 초점 보내기 전에 이거부터 하면 다시 펼쳐지니 주의!
	});

}
