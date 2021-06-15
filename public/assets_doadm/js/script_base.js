/**
 * script_base.js
 * JavaScript jQuery 공용 스크립트
 * 20210121 | @m | 최초 등록
 * 20210121 | @m | 요구반영. 결함개선. 고도화.
 * 20210204~ | @m | 
 * 20210408 | @m | 고도화. doToggleSimple1()
 * 20210409 | @m | 결함개선. makeShow()
 * 20210412 | @m | 결함개선. doToggleSimple1()
 * 20210430 | @m | jQmPR1() 자동 순환 멈춤 재호출 주석처리
 * 20210512 | @m | 주석정리
 * 20210513 | @m | doToggle() 기본값 조정
 * 20210514 | @m | jQmPR1() 결함개선. 고도화
 * 20210517 | @m | 추가. makeEvenWidthMenus() makeMenu2Dropdown()
 * 20210518 | @m | 추가. jQchangePic3()
 */

/*! JavaScript jQuery v0.999 | (c) 20210121~. 20210517. 20210518 | by @m */

/* Table of contents )) ☆ 코드 추가되면.. 목차 갱신하세요.
 ************************************************************
	modernizr
 Base --
	window.console
	window.orientation
	scrollTo
	기본 함수 호출
	jQuery(function($){
		메소드, 함수 호출 )) ★☆ script.js
		즉시 실행
			MJS.doToggleSimple1() 토글심플
			MJS.doToggleSimple2() 토글심플
			MJS.doToggle() 토글
			MJS.doSelectmenu1() 선택메뉴
			MJS.advTel() 전화걸기 고도화
			(라이트박스.스위치.바닥스크롤제어)
 }

 Plugin --
	$.fn.jQmCarousel1 회전목마 owlCarousel 커스터마이징. 이전다음 항목+쪽. 자동순환1항목씩. 루프순환. 터치무브. 빈곳채움. …
	$.fn.jQmPR1 이전다음 쪽. 자동순환. 수동순번. 가로배치전환. 항목폭=쪽폭. 옵션 다양.
	$.fn.jQmPanX1 터치(마우스) 좌우로 이동.

 Function --
	setClassSupportCSS() CSS지원탐지
	setClassUAver() UA버전탐지
	setClassWinWidth() window크기탐지
	setCookie(); getCookie(); 쿠키
	openPop(); closePop(); 팝업레이어

	makeActive() 메뉴활성
	makeShow() 메뉴클릭콘텐츠만보이기
	smoothScrollTop() 부드러운 세로 스크롤

	makeEvenWidthMenus() 메뉴균등폭만들기
	makeMenu2Dropdown() 만들기메뉴드롭다운

	jQchangePic3() 뷰섬네일. 이벤트축소판대상할당온제어

 ************************************************************
 */


/*! modernizr 3.5.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-cssscrollbar-video-setclasses !*/
!function(e,n,o){function a(e,n){return typeof e===n}function s(){var e,n,o,s,t,i,l;for(var r in d)if(d.hasOwnProperty(r)){if(e=[],n=d[r],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(o=0;o<n.options.aliases.length;o++)e.push(n.options.aliases[o].toLowerCase());for(s=a(n.fn,"function")?n.fn():n.fn,t=0;t<e.length;t++)i=e[t],l=i.split("."),1===l.length?Modernizr[l[0]]=s:(!Modernizr[l[0]]||Modernizr[l[0]]instanceof Boolean||(Modernizr[l[0]]=new Boolean(Modernizr[l[0]])),Modernizr[l[0]][l[1]]=s),c.push((s?"":"no-")+l.join("-"))}}function t(e){var n=f.className,o=Modernizr._config.classPrefix||"";if(u&&(n=n.baseVal),Modernizr._config.enableJSClass){var a=new RegExp("(^|\\s)"+o+"no-js(\\s|$)");n=n.replace(a,"$1"+o+"js$2")}Modernizr._config.enableClasses&&(n+=" "+o+e.join(" "+o),u?f.className.baseVal=n:f.className=n)}function i(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):u?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function l(){var e=n.body;return e||(e=i(u?"svg":"body"),e.fake=!0),e}function r(e,o,a,s){var t,r,c,d,p="modernizr",u=i("div"),v=l();if(parseInt(a,10))for(;a--;)c=i("div"),c.id=s?s[a]:p+(a+1),u.appendChild(c);return t=i("style"),t.type="text/css",t.id="s"+p,(v.fake?v:u).appendChild(t),v.appendChild(u),t.styleSheet?t.styleSheet.cssText=e:t.appendChild(n.createTextNode(e)),u.id=p,v.fake&&(v.style.background="",v.style.overflow="hidden",d=f.style.overflow,f.style.overflow="hidden",f.appendChild(v)),r=o(u,e),v.fake?(v.parentNode.removeChild(v),f.style.overflow=d,f.offsetHeight):u.parentNode.removeChild(u),!!r}var c=[],d=[],p={_version:"3.5.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var o=this;setTimeout(function(){n(o[e])},0)},addTest:function(e,n,o){d.push({name:e,fn:n,options:o})},addAsyncTest:function(e){d.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=p,Modernizr=new Modernizr;var f=n.documentElement,u="svg"===f.nodeName.toLowerCase(),v=p._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];p._prefixes=v;var h=p.testStyles=r;h("#modernizr{overflow: scroll; width: 40px; height: 40px; }#"+v.join("scrollbar{width:10px} #modernizr::").split("#").slice(1).join("#")+"scrollbar{width:10px}",function(e){Modernizr.addTest("cssscrollbar","scrollWidth"in e&&30==e.scrollWidth)}),Modernizr.addTest("video",function(){var e=i("video"),n=!1;try{n=!!e.canPlayType,n&&(n=new Boolean(n),n.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),n.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),n.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""),n.vp9=e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/,""),n.hls=e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/,""))}catch(o){}return n}),s(),t(c),delete p.addTest,delete p.addAsyncTest;for(var m=0;m<Modernizr._q.length;m++)Modernizr._q[m]();e.Modernizr=Modernizr}(window,document);


/* ◇◆ Base ◇◆◇◆◇◆◇◆◇◆ */


/* [~IE7] console 에러 방지 */
	if(window.console == undefined){console = {log:function(){}};}

/* Mobile | Desktop PC 구분 20190923 PC 추가 */
	if(window.orientation != undefined){$('html').addClass('Mobile');}else{$('html').addClass('Desktop PC');}

/* [Mobile]툴바감춤 20170324. 20170821.
 * 앱 자체에서 툴바감춤 기능 제공 여부에 따라 조건 실행.
 * 20170324. [Android5.0.2](기본인터넷앱) 기능 제공되지만 1px 오차있어 추가함.
 * 20180821. 아래 scrollTo() 실행 후 앱 메뉴에서 이전쪽로 가면..
	[iOS10.2.1] 클릭 위치 그대로 표시한다.
	[Android5.0.2](삼성앱5.4.02.3) 웹페이지 상단으로 가버려 불편하다. ))) /Android/ 제외하여 해결.
 */
	//if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	if( /webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		if(window.addEventListener){window.addEventListener('load',function(){setTimeout(scrollTo,0,0,1);},false);}
	}


/* 기본 함수 호출 20201008 */
setClassSupportCSS('zoom');
setClassSupportCSS('object-fit');
setClassUAver();
setClassWinWidth();


//jQuery.noConflict();
/* ◇◆ jQuery(document).ready(function($){}); ◇◆◇◆◇◆◇◆◇◆ */
jQuery(function($){


/* ◇◆ 즉시 실행 doAction ◇◆◇◆◇◆ */


// 즉시실행에서 호출가능한 함수로 변경 | 20201007. 20201019. MoonYoungshin
// var MJS = MJS || {}; // 전역에서만 가능
MJS = window.MJS || {};
(MJS.doDo1 = function(){
//(function doDo1(){
	//console.log(this);
//})();
})();


/** ◇◆ 토글심플. v0.5 | 20210114~20210408. 20210412. MoonYoungShin.
 * 나 말고 다른거 비활성
 * 외부영역 클릭하면 모두 비활성. 20210412
 */
(MJS.doToggleSimple1 = function(selector){
	var my = selector,
		b = '.toggle-b', // 토글메뉴
		c = '.toggle-c', // 토글대상
		close = '.toggle-close'; // 닫기
	
	// 초기화
	$(my).find(c).hide();

	// 미래 토글메뉴 클릭
	$('html').on('click', my+' '+b, function(e){
		console.log( 111 );
		e.preventDefault();
		var $b = $(my+' '+b);
		var $c = $(my+' '+c);
		var $myc = $(this).closest(my).find(c);

		// 토글
		if( $(this).is('.on') ){
			$(this).removeClass('on');
			$myc.removeClass('on').hide();
		}else{
			// 모두 비활성
			$b.removeClass('on');
			$c.removeClass('on').hide();
			// 나만 활성
			$(this).addClass('on');
			$myc.addClass('on').show();
		}
	});

	// 미래 닫기 클릭
	$('html').on('click', my+' '+close, function(e){
		e.preventDefault();
		var $myb = $(this).closest(my).find(b);
		var $myc = $(this).closest(my).find(c);
		$myb.removeClass('on');
		$myc.removeClass('on').hide();
	});

	// 외부영역 클릭
	// 20210412. 'click' 을 'mouseup' 로 수정 ( 'click' 보다 'mouseup' 이 먼저 호출됨! 키보드 운용도 가능해짐! )
	$('html').on('mouseup', function(e){
		var $b = $(my+' '+b);
		var $c = $(my+' '+c);
		//console.log(
		//	e.target,
		//	!!$b.has(e.target).length,
		//	$(e.target).is(b),
		//	!!$c.has(e.target).length,
		//	$(e.target).is(c)
		//);
		// 20210412. 결함 해결! 메뉴 또는 대상 영역 아니면으로 수정.  메뉴 내부 빈 곳 $(e.target).is(b), 대상 내부 빈 곳 $(e.target).is(c) 도 고려!
		//if( !$b.has(e.target).length ){
		if( ( !$b.has(e.target).length && !$(e.target).is(b) ) && ( !$c.has(e.target).length && !$(e.target).is(c) ) ){
			// 모두 비활성
			$b.removeClass('on');
			$c.removeClass('on').hide();
		}
	});

})('.toggle1s1');


/** ◇◆ 토글심플. v0.3 | 20210311. MoonYoungShin.
 */
(MJS.doToggleSimple2 = function(selector){
	var my = selector,
		b = my + '-b', // 토글메뉴
		c = my + '-c', // 토글대상
		close = my + '-close'; // 닫기
	
	// 초기화
	$(my).find(c).hide();

	// 미래 토글메뉴 클릭
	$('html').on('click', my+' '+b, function(e){
		e.preventDefault();
		var $c = $(this).closest(my).find(c);
		if( $(this).is('.on') ){
			$(this).removeClass('on');
			$c.removeClass('on').hide();
		}else{
			$(this).addClass('on');
			$c.addClass('on').show();
		}
	});

	// 미래 닫기 클릭
	$('html').on('click', my+' '+close, function(e){
		e.preventDefault();
		var $b = $(this).closest(my).find(b);
		var $c = $(this).closest(my).find(c);
		$b.removeClass('on');
		$c.removeClass('on').hide();
	});

})('.toggle1s2');


/** ◇◆ 토글. v0.8.7.2 | 20150520~ 20210111. 20210513. MoonYoungShin.
 * Use1) <a href="#search1c" title="통합 검색 여닫기" class="b1 toggle fade"><span class="t1>통합 검색</span><i class="ic1"></i></a>
 * Use2) ☆ .toggle 이 탭처럼 동작하려면 (내가 on 이면 형제는 off), 나와 형제가 클래스 값이 각각 1개이고 같아야 한다.
   <div class="family1"><a href="#family1c1" class="toggle"><div id="family1c1"></div></div>
   <div class="family1"><a href="#family1c2" class="toggle"><div id="family1c2"></div></div>
   …
 * 토글 앵커와 대상의 부모가 같아야 한다. ( 다르더라도 단독 동작 토글이라면 괜찮다. )
 * 고도화. 효과 지정 가능. donot 결함 수정.
 * 20160527. 최초 비활성/활성 분기
 * 20170109. 토글a클릭 - 토글b클릭 - 토글a닫기클릭 시 초첨 되돌리기 무동작 결함개선.
 * 20170222. 초첨 보내기 분기. 메뉴 또는 대상.
 * 20180130. 토글 앵커와 대상이 멀리 있는 경우 형제 콘텐츠 닫기 고도화.
 * 20180531. 20180509. 초첨 보내기 고도화.
 * 20181120. 토글 앵커 href 없을 때, 토글 대상 # 없을 때 에러 방지
 * 20190131. 옵션 duration, easing 추가
 * 20190719. doToggle() 중복 호출 안하니 $('.toggle').off() 제거
 * 20210111. duration 기본값 변경
 * 20210513. duration 기본값 변경
 * Task1)
 * 탭처럼 클래스 값이 2개이상이면 고도화 필요!
 */
(MJS.doToggle = function(selector){
//(function doToggle(selector){
	$('.toggle').not('.donot').each(function(){ // 20150515. 토글 동작 안하기 추가
		var $my = $(this), // 토글 앵커
			$that = $(); // 토글 대상
		var myhref = $my.attr('href') || '';
		var where = myhref.lastIndexOf('#'),
			myhash = '';
		if( !!myhref && where != -1 ){
			myhash  = myhref.substring( where );
		}
		$that = $(myhash);
		var $sib = $that.parent().siblings('.' + $that.parent().attr('class')); // 형제 콘텐츠. $my 말고 $that 에서 찾아야 정확하다.

		// 20190129. 20210513
		var duration = ($my.data('duration'))? $my.data('duration') : 300; // (( 200
		var easing = ($my.data('easing'))? $my.data('easing') : 'easeInOutQuart'; // 'swing'

		// 최초 비활성/활성 분기
		if( $my.hasClass('on') ){
			$that.addClass('on').show();
		}else{
			$that.removeClass('on').hide();
		}
		// 토글 클릭
		$my.on('click', function(){

			// 나 아닌 형제만 탐색하기 위해 .now 추가했다가 형제 조작한 뒤 제거한다.
			$my.addClass('now');
			$that.addClass('now');

			if( !$(this).is('.on') ){ // 20161208. 토글 닫은 후에 초점 오려면 .on 이 제거되도 .opener-last 클래스를 남겨둔다.
				$('.toggle').removeClass('opener-last'); // 오프너 제거
				$my.addClass('opener-last'); // 오프너 설정
			}
			// 형제 콘텐츠 닫기
			if( $my.is('.opt-far') ){ // 토글 앵커와 대상이 멀리 있는 경우라면..
				var $wrap = $my.closest('.w1toggles');
				console.log( $sib.not('.now').length );
				$('.toggle.opt-far', $wrap).not('.now').removeClass('on');
				$sib.not('.now').children().removeClass('on').hide();
			}else{
				$sib.each(function(){
					$(this).removeClass('on');
					var $my = $('.toggle', $(this)); // 형제 토글 앵커
					var $that = $($my.attr('href')); // 형제 토글 대상
					$my.removeClass('on');
					$that.removeClass('on').hide();
				});
			}

			$my.removeClass('now');
			$that.removeClass('now');

			// 내 토글 동작. 20180719 ☆ toggle() before toggleClass()
			if($my.hasClass('showhide')){
				$that.toggle();
			}else if($my.hasClass('slide')){
				$that.slideToggle(duration, easing, function(){});
			}else if($my.hasClass('fade')){
				$that.fadeToggle(duration, easing, function(){});
			}else if($my.hasClass('animate1')){
				$that.animate({
					left: 'toggle',
					top: 'toggle',
					width: 'toggle',
					height: 'toggle',
					opacity: 'toggle'
				}, duration, function(){});
			}else if($my.hasClass('animate1height1')){
				$that.animate({
					height: 'toggle',
					opacity: 'toggle'
				}, duration, function(){});
			}else{ // 기본 토글
				//$that.toggle(easing); // $that.toggle(duration, easing); 과 같다.
				$that.toggle();
				//console.log('기본 토글');
			}
			$my.toggleClass('on');
			$that.toggleClass('on');

			// 초점 보내기. 20180531.
			setTimeout(function(){ // CSS transition 사용하면 초점 사라지는 결함 해결
				if($my.is('.on')){
					if($my.data('sendFocus') == 'that'){ // data-send-focus="that"
						$that.find('a, input, select, textarea, button').first().focus(); // 토글 대상이 떨어져 있어도 된다.
					}else{
						$my.focus();
					}
				}
			}, 50);

			return false;
		});

		// 닫기 클릭. 20170109
		// $my.filter('.opener-last') 없으면 초점 보이지 않지만, 탭키 누르면 다음 콘텐츠로 이동한다. (이건 주로 마우스 동작 시 해당되므로 문제없음)
		$('.close', $that).on('click', function(){
			//console.log($my.text() + $my.is('.opener-last'));
			var closeHref = $(this).attr('href');
			if( $my.attr('href') == closeHref ){
				$my.filter('.on').triggerHandler('click');
				$my.filter('.opener-last').focus();
			}
			return false;
		});

	});
//})();
})();


/** ◇◆ 선택메뉴 | 20141022~ 20201019. 20210204. MoonYoungShin.
 * 20190730. 다른 선택메뉴 비활성
 * 20150626.1) 전송 버튼 클릭하면 링크로 이동. 2) 이벤트 없는 곳 클릭하면.. 선택메뉴 모두 닫음.
 * Use1) See Markup Code
 <div class="selectmenu1">
 <strong class="title"><a href="#selectmenu1option1" class="a1"><span class="t1">옵션</span><i class="ic1"></i></a></strong>
 <div class="selectmenu1option" id="selectmenu1option1">
 <ul class="options">
 <li class="option"><a href="#?" class="a1">옵션1</a></li>
 <li class="option"><a href="#?" class="a1">옵션2</a></li>
 <li class="option"><a href="#?" class="a1">옵션3</a></li>
 </ul>
 </div>
 </div>
 <a href="?" class="b1 submit">이동</a> <!-- 선택사항 -->
 …
 */
(MJS.doSelectmenu1 = function(selector){
	$('.selectmenu1').each(function(){
		var $my = $('.title .a1', this); // 제목+여닫기 버튼
		var $that = $($my.attr('href')); // 표적(옵션 블록)
		var $t1= $('.t1', $my); // 제목 텍스트
		var $option = $('.option .a1', $that); // 옵션 요소
		var thatOn = 0; // 옵션 블록 focusout 고도화
		// 20210204. 아래 결함해결. $that 추가하여 내 초기값만 가져오기
		$t1.text($('.option.on .a1', $that).text() || $t1.text()); // 20150918. 제목을 선택 옵션 텍스트 또는 초기값으로.
		$my.parent().removeClass('on');
		$that.removeClass('on').hide();
		$my.on('click', function(){
			if( !$that.is('.on') ){ // 20190730 비활성 선택메뉴 클릭이라면
				$('body').triggerHandler('click'); // 모든 선택메뉴 비활성
			}
			// 토글
			$my.parent().toggleClass('on');
			$that.toggleClass('on');
			$that.toggle();
			$my.focus(); // 제목으로 초점 보내기
			return false;
		});
		$option.on('click', function(){
			$(this).parent().siblings().removeClass('on');
			$(this).parent().addClass('on');
			$t1.text($(this).text()); // 제목을 선택한 옵션 텍스트로
			$my.triggerHandler('click');
			thatOn = 1; // 옵션 클릭으로 옵션 블록 focusout 되면서 0 으로 변한 값을 1 로 바꿔준다, $my.triggerHandler('click'); 가 재실행되는 것을 방지한다.
			if( $(this).closest('.selectmenu1').nextAll('.submit').length > 0 ){ // 20150626.1)
				if($(this).attr('href').indexOf('#') == 0){ // 현재페이지링크 href="#.."
					return false;
				}else{ // 다른페이지링크
					return false;
				}
			}
		});
		$that.on('focusout', function(){
			thatOn = 0;
			setTimeout(function(){
				if(!thatOn){ // 옵션 블록 focusin 되거나, 옵션 클릭으로 focusout 되는 경우는 실행안한다.
					$my.triggerHandler('click');
				}
			}, 50);
			return false;
		});
		$that.on('focusin', function(){
			thatOn = 1;
			return false;
		});
	});
	// 20150626.1) 전송 버튼 클릭하면 링크로 이동
	$('.selectmenu1~.submit').on('click', function(){
		var $on_a = $(this).prev('.selectmenu1').find('.on>a');
		if($on_a.length > 0){
			location.href = $on_a.attr('href');
		}else{ // 선택한 메뉴 없으면.. 선택메뉴로 간다.
			$(this).prev('.selectmenu1').find('.title a.a1')[0].focus();
		}
		return false;
	});
	// 20150626.2) 이벤트 없는 곳 클릭하면.. 선택메뉴 모두 닫음.
	$('body').on('click', function(){
		$('.selectmenu1 .title').removeClass('on');
		$('.selectmenu1option').removeClass('on').hide();
	});
})();


/* ◇◆ 전화걸기. 20160504~ 20201007. 20201019. MoonYoungshin.
 */
(MJS.advTel = function(){
	$('a[href^="tel"]').on('click', function(){
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			return;
		}else{
			alert('스마트폰일 때 전화걸기가 가능합니다!');
			return false;
		}
	});
})();


/** ◇◆ 라이트박스.스위치.바닥스크롤제어 | 20160106. 20170223. MoonYoungshin.
 * Task) 창조절 결함 해결 필요
 */
/* (function(){
	var sw = false;
	$('#tnb1>.h1>.b1.toggle').on('click', function(){
		sw = !sw;
		if(sw){
			$('html').css({
				position: 'fixed'
			});
		}else{
			$('html').css({
				position: ''
			});
		}
	});
})(); */


}); /* /jQuery(function($){})(); */


/* ◇◆ Plugin ◇◆◇◆◇◆◇◆◇◆ */


/** ◇◆ 회전목마 만들기. v0.25.1.1 | 20190328. 20201019. 20210311. MoonYoungshin.
 * Need) owl.carousel.min.js, owl.carousel.min.css, animate.css
 * Use)
	$(function(){
		// 20201008
		$('#ppr1carousel1').jQmCarousel1({
			//animateIn: 'flipInX',
			//animateOut: 'slideOutDown',
			autoplay: true,
			autoplayTimeout: 6000,
			//center: true, // 센터정렬 (도트, 이전, 다음 모두 아이템 순번으로만 제어된다!)
			hereBar: true,
			//lazyLoad: true,
			margin: 20,
			responsive: {
				000: { items: 1 },
				640: { items: 2 },
				960: { items: 3 },
				1260: {
					items: 4,
					margin: 30
				}
			}
		});
	});
	* 20200304. 제어2 세로 중앙 정렬 여부 추가
	* 20200416. animateIn, animateOut 기본값 false 로 수정 (fadeIn, fadeOut 글자 전환시 미추결함 해결)
	* 20200417. 현재 아이템. 전체 수보다 크면 1번째로 되돌리기
	* 20201008. 이미지 left 값 결함 doImgFull() 제거 ))) CSS object-fit 활용
	* 20201019. 제어버튼 맨앞 맨끝 무력화
	* 20210311. autoplay: false 로 초기화
 */
$.fn.jQmCarousel1 = function(options){
	if(!this) return false;
	return this.each(function(){

		var $my = $(this);
			$my.$mItem = $('.mItem ', $my);
			$my.$mPage = $('.mPage ', $my);
			$my.$goItem = $('.goItem ', $my);
			$my.$goPage = $('.goPage ', $my);
			$my.$mControl2 = $('.mControl2 ', $my);

		var config = {
			// Property
				animateIn: false, // 'fadeIn' | 등장 아이템 동작 ( 페이지당 아이템수 1인 경우)
				animateOut: false, // 'fadeOut' | 퇴장 아이템 동작 ( 페이지당 아이템수 1인 경우)
				autoplay: false, // 자동순환 20210311
				autoplayHoverPause: true,
				autoplayTimeout: 6000,
				autoWidth: false,
				autoHeight: false,
				//center: true,
				//dots: false, // 페이지 계산 위해서는 기본값 true 그대로 둔다!
				//dotsEach: true,
				lazyLoad: false, // 게으른 로딩하려면.. 이미지 마크업 <img class="owl-lazy" src="/assets_doadm/img/lib/b.png" data-src="이미지URI" /> 필요
				lazyLoadEager: 0, // 미리로드 할 항목 수
				loop: true,
				margin: 0,
				//nav: true,
				//navText: ['<i class="ic1"></i> <span class="t1">이전</span>', '<i class="ic1"></i> <span class="t1">다음</span>'],
				//onInitialize: doInitialize, // 2
				//onInitialized: doInitialized, // 10
				//onRefresh: doRefresh, // 3
				onRefreshed: doRefreshed, // 6
				onTranslate: doTranslate, // 9
				//onTranslated: doTranslated, // 11
				//onChange: doChange, // 4, 7
				//onChanged: doChanged, // 1, 5, 8
				//onChanged: callback, // ☆
				//onLoadLazy: doLoadLazy,
				onLoadedLazy: doLoadedLazy,
				items: 1,
				//responsive: {
				//	000: { items: 1 },
				//	640: { items: 2 },
				//	960: { items: 3 }
				//},
				//rtl:true,
				smartSpeed: 250,
				stagePadding: 0,
				//startPosition: 'URLHash',
				//URLhashListener: true, // 주의! <div class="item" data-hash="m1"> 만들면 자동으로 true 로 설정된다
				video: true,
			// Mine
				hereBar: false, // 여기바 코드 추가 여부
				vamControl2: true // 제어2 세로 중앙 정렬
			// DOM Selectors
				// If you need it later
		};
		$.extend(config, options);
		//console.log( config.lazyLoad );

		// owl.carousel.js
		var $owl = $('.owl-carousel', $my);
		$owl.owlCarousel( config );

		$(window).on('load resize', function(e){
			// 엉킬 수 있으니.. onRefreshed 이용하자!
		});

		// 이미지 모두 로드 즉시 실행
		$(window).on('load', function(e){
			//$my.addClass('loaded'); // )) .owl-loaded 클래스 이용
		});

		// 창 리사이즈 즉시 실행
		$(window).on('resize', function(e){
			preLoad();
		});

		// 마우스휠 (모바일 사용성 및 기본 동작 막는거 나빠서 주석처리)
		$owl.on('mousewheel', '.owl-stage', function(e){
			//e.preventDefault();
			if (e.deltaY>0) {
				//$owl.trigger('next.owl');
			} else {
				//$owl.trigger('prev.owl');
			}
		});

		// 콜백Test
		function doInitialize(e){
			callback(e);
		}
		function doInitialized(e){
			callback(e);
			doSetMenu();
		}
		function doRefresh(e){
			callback(e);
		}
		function doRefreshed(e){
			callback(e);
			makeMenu(e);
			doSetMenu();
		}
		function doTranslate(e){
			callback(e);
			doSetMenu();
		}
		function doTranslated(e){
			callback(e);
		}
		function doChange(e){
			callback(e);
		}
		function doChanged(e){
			callback(e);
		}
		function doLoadLazy(e){
			callback(e);
		}
		function doLoadedLazy(e){
			callback(e);
		}

		// 콜백 공통
		function callback(e) {

			// 아이템 계산
			$my.i_total = e.item.count; // 전체 아이템 수
			$my.p_size = e.page.size; // 페이지 당 항목 수

			// 현재 아이템 (복제 고려해서 계산)
			$my.i_on = (e.item.index + 1) - ($('.owl-item.cloned', $my).length / 2);
			if( $my.i_on < 1 ){
				$my.i_on = $my.i_total + $my.i_on; // + $my.i_on
			}else if( $my.i_on > $my.i_total ){
				$my.i_on = 1; // 20200417 주석제거
			}
			//console.log( e.item.index, $my.i_on );

			// 나머지가 있는 경우?
			$my.remainder = $my.i_total % $my.p_size;
			if ( $my.remainder == 0 ){
				$my.mn = 0; // 매직넘버
			}else{
				$my.mn = $my.p_size - $my.remainder;
			}
			//console.log($my.mn);

			// 페이지 수는 따로 계산! (( 최초 e.page.count = 0, e.page.index = -1 이고, doChanged 직후에는 변경전 값이어서..
			$my.p_total = Math.ceil( $my.i_total / $my.p_size );
			$my.p_on = Math.ceil( ($my.i_on + $my.mn) / $my.p_size );

			//console.log( e.item.count +' - '+ e.item.index +' - '+ e.page.count +' - '+ e.page.index );

			if( config.hereBar ){
				makeHereBar( $my.i_total, $my.p_size, $my.i_on ); /* ★ */
			}

		}

		//  메뉴 만들기
		function makeMenu(e){

			$my.mn2 = ( !config.loop )? ($my.p_size - 1): 0; // 루프 아니면 $goItem 메뉴 줄임수
			//console.log( $my.mn2 );

			// 아이템
			if( !(!!$my.$goItem.is('.manual') && $my.p_size == 1) ){ // ( 수동 생성이며 페이지 당 항목 수 1) 아니면
				$my.$goItem.empty();
				for(var i= 1; i <= ($my.i_total - $my.mn2); i++){
					$my.$goItem.append('<a href="#?" class="m">'+ i +'</a>'+'\n');
				}
			}
			// 페이지
			$my.$goPage.empty();
			for(var i= 1; i <= $my.p_total ; i++){
				$my.$goPage.append('<a href="#?" class="m">[Page '+ i +']</a>'+'\n');
			}

			// 아이템 위치로 이동
			$('.m', $my.$goItem).on('click', function(e){
				e.preventDefault();
				//console.log( $(this).index() +'   '+ $my.i_on );
				$owl.trigger( 'to.owl.carousel', [$(this).index(), , true] );
			});
			// 페이지 위치로 이동
			$('.m', $my.$goPage).on('click', function(e){
				e.preventDefault();
				$owl.trigger( 'to.owl.carousel', [$(this).index()] );
			});

			// .mControl2 세로 위치 중앙 맞춤
			if( config.vamControl2 ){ // 20200304
				$my.$mControl2.removeClass('show');
				setTimeout(function(){
					//console.log( $('.owl-carousel', $my).position().top +'  '+ $('.owl-stage-outer', $my).height() );
					//console.log( $('.owl-height', $my).css('transition-duration') +'  '+ $('.owl-height', $my).css('transition-delay') );
					$my.$mControl2.css({
						top: ( $('.owl-carousel', $my).position().top + $('.owl-stage-outer', $my).height() / 2 ) + 'px',
						bottom: 'auto'
					}).addClass('show');
				}, 1000); // >= (.owl-height 의 transition-duration + transition-delay)
			}

		}

		// 메뉴 활성 설정
		function doSetMenu(){
			$('.total', $my.$mItem).text($my.i_total);
			$('.on', $my.$mItem).text($my.i_on);
			$('.total', $my.$mPage).text($my.p_total);
			$('.on', $my.$mPage).text($my.p_on);
			$('.m', $my.$goItem).removeClass('on').eq( $my.i_on - 1 ).addClass('on');
			$('.m', $my.$goPage).removeClass('on').eq( $my.p_on - 1 ).addClass('on');
			// 20201019
			$('.mControl .m', $my).removeClass('disabled');
			if($my.i_on == 1) $('.prev:not(.page)', $my).addClass('disabled');
			if($my.i_on == $my.i_total) $('.next:not(.page)', $my).addClass('disabled');
			if($my.p_on == 1) $('.prev.page', $my).addClass('disabled');
			if($my.p_on == $my.p_total) $('.next.page', $my).addClass('disabled');
		}

		// 메뉴 제어
		$('.stop', $my).on('click', function(){ $owl.trigger('stop.owl.autoplay'); });
		//$('.play', $my).on('click', function(){ $owl.trigger('play.owl.autoplay', [2000]); });
		$('.play', $my).on('click', function(){ $owl.trigger('play.owl.autoplay'); });

		// 이전 아이템
		$('.prev:not(.page)', $my).on('click', function(e){
			e.preventDefault();
			//$owl.trigger('prev.owl.carousel'); // 되돌리기 위해 아래 코드로 수정
			$my.n = $my.i_on - 1;
			if( $my.n < 1 ){ $my.n = $my.i_total - $my.mn2 }
			$owl.trigger( 'to.owl.carousel', [ $my.n - 1, , true ] );
		});

		// 다음 아이템
		$('.next:not(.page)', $my).on('click', function(e){
			e.preventDefault();
			//$owl.trigger('next.owl.carousel'); // 되돌리기 위해 아래 코드로 수정
			$my.n = $my.i_on + 1;
			if( $my.n > $my.i_total - $my.mn2 ){ $my.n = 1 }
			$owl.trigger( 'to.owl.carousel', [ $my.n - 1, , true ] );
		});

		// 이전 페이지
		$('.prev.page', $my).on('click', function(e){
			e.preventDefault();
			$my.n = $my.p_on - 1;
			if( $my.n < 1 ){ $my.n = $my.p_total }
			//console.log($my.n - 1);
			$owl.trigger( 'to.owl.carousel', [$my.n - 1] );
		});

		// 다음 페이지
		$('.next.page', $my).on('click', function(e){
			e.preventDefault();
			$my.n = $my.p_on + 1;
			if( $my.n > $my.p_total ){ $my.n = 1 }
			//console.log($my.n - 1);
			$owl.trigger( 'to.owl.carousel', [$my.n - 1] );
		});

		// 자동순환제어
		$my.on('mouseenter focusin', function(){
			$owl.triggerHandler('mouseenter');
		}).on('mouseleave focusout', function(){
			$owl.triggerHandler('mouseleave');
		});

		// 키보드 초점
		var mFlag = false; // 마우스 들어왔수?
		var oneFlag = false; // 한번만 실행해주!
		$('.owl-stage', $my).on('mouseenter focusin', function(e){
			if( e.type == 'mouseenter' ){
				mFlag = true;
				$('.owl-item.cloned', $my).css({
					visibility: 'visible'
				});
			}
			if( !mFlag ){
				$('.owl-item.cloned', $my).css({
					visibility: 'hidden'
				});
				preLoad(); /* ★ */
				$owl.trigger( 'to.owl.carousel', [0] ); // 첫 아이템으로 이동
			}
			//console.log( e.type +' -- '+ mFlag );
		}).on('mouseleave blur', function(e){ // focusout 은 내부 초점 이동할 때마다 발생하므로 blur 로 해야한다.
			if( e.type == 'mouseleave' ){
				mFlag = false;
			}
			$('.owl-item.cloned', $my).css({
				visibility: 'visible'
			});
			//console.log( e.type +' -- '+ mFlag );
		});

		// 게으른 이미지 로딩 미리 불러오기
		function preLoad(){
			if( $('.owl-lazy', $my).length > 0 && oneFlag == false ){
				//console.log('preLoad');
				oneFlag = true;
				//console.log( $('.owl-lazy', $my).length );
				for(var i = $my.i_total; i--; ){
					$owl.trigger( 'to.owl.carousel', [i, 0, true] );
				}
			}
		}


		/** ◇◆ 위치바 표시기 동작 | 20190328. MoonYoungshin.
		 * 회전목마 속성값 loop: false 설정 필요!
		 */
		function makeHereBar(a,b,c){
			var a = a, // 전체 아이템 수
				b = b, // 페이지 당 항목 수
				c = c, // 현재 아이템
				d = 0; // 마우스 클릭 좌거리
			if ( $('.herebar', $my).length < 1 ){
				$my.append('<i class="herebar"><i></i></i>');
			}
			var $herebar = $('.herebar', $my);
			$herebar.css({
				display: 'block',
				position: 'relative',
				height: '3px',
				margin: '10px 0 0',
				borderTop: '6px solid #fff',
				borderBottom: '6px solid #fff',
				background: '#eee',
				opacity: '1'
			});
			$('i', $herebar).css({
				display: 'block',
				position: 'absolute',
				left: (1/a * (c - 1) * 100)+'%',
				right: 'auto',
				top: 'auto',
				bottom: '0',
				width: (b/a * 100)+'%',
				height: '6px',
				background: '#000',
				transition: '.2s'
			});
			// 해당 위치로 이동
			$herebar.one('click', function(e){ // 이벤트를 한 번만 연결
				//console.log( e.offsetX +'   '+ $(this).outerWidth() +'   '+ a );
				//console.log( Math.round( e.offsetX / $(this).outerWidth() * a ) );
				if( !!$(e.target).is('.herebar') ){
					d = e.offsetX;
				}else{
					d = e.target.offsetLeft + e.offsetX;
				}
				//console.log( d );
				$owl.trigger( 'to.owl.carousel', [ Math.floor( d / $(this).outerWidth() * a ), , true ] );
			});
		}


	}); // return this.each(function(){});
} /* /$.fn.jQmCarousel1 */


/** ◇◆ PictureRotator. v0.74.0 | ~20140814~ 20210503. 20210514. MoonYoungShin.
 * 이전다음 쪽. 자동순환. 수동순번. 가로배치 가로전환. 항목폭=쪽폭. 옵션 다양.
 * !!required: jquery-1.8.0.min.js 이상, jquery.easing.1.3.js
 * Use)
   $('#vpr1').jQmPR1({ interval: 6000, mTabindex: '-1', effect: 'slide', duration: 400, easing: 'easeOutExpo', gesture: true, threshold: 10 });
   $('#npr1').jQmPR1({ interval: 6000, mTabindex: '-1' });
   $('#ppr2').jQmPR1({ interval: 6000, mTabindex: '-1', gesture: true, swipe: false });
   // 회전목마 효과 (★ CSS transition) (( 보이는 아이템 수 * 2 ) + 1 ) 개 이상 필요! ( 끝에서 되돌리는 아이템이 보이면 이상할 경우 안보이게 하려면.. )
   $('#apr1').jQmPR1({ interval: 6000, mTabindex: '0', effect: 'accordion', c: '>.c', mNumEvent: 'focusin mouseenter click' }); // 아코디언 효과. 모바일 결함 확인요.
   // ))) ★ JS 단순 효과 사용하고, CSS transition 이용 권장!
 * 20210514.
	이전 다음 직접 동작에 $my.restartInterval($my.timer1); 추가
	클래스 on 제거와 추가 사이에 틈
	config.p2n 추가
 * 20210503. 자동 순환 멈춤 재호출 주석처리
 * 20201016. 현재 활성 )) CSS 이용
 * 20191220. setmItemLeft() 메서드 next6-on 까지 추가! reset() 에 추가 및 $(window).on('resize') 직전으로 코드 이동.
 * 20191107. reverse 슬라이드 거꾸로 옵션 추가
 * 20191008. addClass('focusin') 추가
 * 20190726. 'nodo' 제거 추가. 효과 부활
 * 20190626. pageX pageY 결함개선
 * 20181203. carousel 효과 고도화
 * 20180608. fade 효과 수정
 * 20180420. swipe 기본값 ture 에서 false 로 수정
 * 20180404. fade 효과에 다른거 잠깐 보이는거 해결
 * 20180220. 아이템 1개일 때 CSS클래스 'nodo' 추가. 효과제거
 * 20171229. 회전목마 동작 고도화
 * 20170126. 창 크기 조절 후 슬라이드 이전 다음 결함개선. z-index 개선
 * 20170126. 코드 정리. 자동순환. 재생 버튼 클릭 후 초점 있을 때, 마우스 포인트를 콘텐츠 지나서 아웃할 때, 재가동으로 수정
 * 20161215. 아이템 1개일 때 결함 해결
 * 20161025. Test 코드 추가. 접근성 자동 순환 정지 관련
 * 20161021. .onSync 활성동기화(연동) 추가
 * 20161005. 콘텐츠 3개(현재.이전.다음)만 보이고, 나머지는 화면 밖으로 보냄
 * 20161005. 아이템 에 .off .prev-on .next-on 추가
 * 20160202. 내부에 초점 있는 상태에서 mouseleave 하면.. 자동순환 재개되어.. 콘텐츠 사라지는 결함 해결!
 * 20150414. mouseup 이벤트 a 링크 위해 e.preventDefault(); 주석처리. 'mouseup'){
 * a 링크 위해 'touchend' || 'mouseup' 일 때 e.preventDefault(); 제거함
 * 반응형 적용 문제 해결. 창 조절에 동작값 다시 구하고  효과별 액션 분기
 * 현재페이지/전체페이지 추가
 * 아코디언 효과 추가.
 * 순환 콘텐츠 고도화.. fade, slide 효과 벌레퇴치.
 * 콘텐츠와 순번이 섞여있을 때 고려 : 아이템>.m 와 .mCont>.m 일 경우 모두 고려함
 * 아이템 키보드 운용 바르게 동작하도록 수정. 추가 . mNum 순번 탭 없을 경우 고려
 * 세로 슬라이드 추가, mNum, z-index, 키보드 운용할 때.. 즉시 변경으로 해결
 * 콘텐츠 a 에 focus 시 콘텐츠 보이며 운용 가능.
 * 순번 탭 포커싱 선택 추가
 * 맨앞뒤 이후 동작 같은 방향으로..
 * touch, drag? 콘텐츠에 a 요소가 있으면 touch 는 괜찮지만.. drag 는 동작하지 않는다
 * .mCont{position:absolute;} 이면.. 이전, 다음 콘텐츠가 touchmove 에 동작한다
   .mCont{position:absolute;} 아니면.. touchend 시 이전, 다음 액션
 * addBack() 추가하여 $my 오버 아웃 추가
 * 새 활성 콘텐츠 내용 없으면.. 코드 만들어 불러온다. ★☆개발필요! ajax! 만들어진 코드 가져오도록..
 ----
 * Note) Defer) 아코디언 키보드 후진, Ajax, loading…, 멀티아이템뷰 페이드 (대안! 아이템 안에 멀티 콘텐츠 넣기)
 */
$.fn.jQmPR1 = function(options){
	if(!this) return false;
	var config = {
		interval: 6000, // 간격 밀리초
		auto: true, // true: 정지 버튼 클릭 안한 상태, false: 클릭한 상태
		effect: null, // 효과
		initEffect: null, // 최초 실행 효과 .20140626
		duration: 400, // 효과 동작시간 밀리초
		delay: 0, // 효과 지연시간
		zIndex: 0, // 콘텐츠 겹칠 때 이용
		//onnum: parseInt(location.hash.charAt(location.hash.length-1)) || 1, // 초기활성값=#끝수. 실무에는 글쎄요..
		onnum: 1, // 초기활성값
		oldonnum: 0, // 최초 콘텐츠 없는 상태
		easing: 'swing', // 동작 완화. jswing 은 jquery.easing.1.3.js 필요!
		preAct: 1, // 1: 1번째 액션에서만 실행, 2: 2번째.., ..
		viewNum: 1, // 멀티뷰. 단수 표시만 가능 (순번은 absolute 로 개별 위치 지정)
		//frontback: 1, // 1: 정방향(→↓), -1: 역방향(←↑) 감지에 이용 (임의 지정 말자)
		reverse: 0, // 1: 맨앞맨끝에서 슬라이드 거꾸로 진행. 20191107
		vertical: 0, // 0: 가로방향 동작, 1: 세로방향 동작
		mTabindex: 0, // -1: 순번 탭 포커싱 안함, 0: 함.
		mNumEvent: 'click', // 순번 이벤트. 아코디언 효과에는 'focusin mouseenter click' .20140626
		gesture: true, // false: 터치 제스처 사용 안함
		threshold: 10, // 터치무브가 값px 이상이면 동작 (( 40 에서 기본값 변경.
		swipe: false, // true: 터치 이동만큼 mCont 이동. effect: 'slide' 에서만 사용 권장. 20180420
		p2n: 0, // prev 항목을 next 로 보낸다. 1, 2, .. (맨앞1개, 맨앞2개, ..)

		// DOM Selectors
		mView: '.mView', // 뷰영역
		mCont: '.mCont', // 콘텐츠 그룹
		mItem: '.mContC', // 단위콘텐츠. 아코디언 효과에는 자식으로 순번 앵커와 진짜콘텐츠를 분리한다.
		c: '', // 진짜콘텐츠가 아이템>.c 이면 '>.c' 를 할당하라. 순번 앵커 아이템>.m 를 추가할 수 있다.
		mNum: '.mNum', // 순번 페이징 그룹
		m: '.m', // 단위 순번은 .mNum>.m 이다.
		prev: '.mControl .prev', // 이전 버튼
		next: '.mControl .next', // 다음 버튼
		stop: '.mControl .stop', // (일시)정지 버튼
		play: '.mControl .play', // 재생 버튼
		pageOn: '.mPage .on', // 현재페이지
		pageTotal: '.mPage .total', // 전체페이지
		onSync: '.onSync', // 활성연동 그룹
		jsonDataUri: '/html/main/json.js' // ★☆개발필요! 동적으로 콘텐츠 가져오기 주소로 사용할거다.
	};
	$.extend(config, options);

	return this.each(function(){
		var $my = $(this);

		$my.effect = config.effect; // 효과 기억 위해!
		$my.addClass(config.effect); // 20181203

		if($my.effect  == 'accordion'){
			config.initEffect = 'accordion';
		}

		//DOM
		$my.mView = $(config.mView, $my);
		$my.mCont = $(config.mCont, $my.mView);
		$my.mItem = $(config.mItem, $my.mCont); // 아이템
		$my.mItemc = $(config.c, $my.mItem); // 아이템>.c  // 아코디언용
		$my.mItemm = $(config.m, $my.mItem); // 아이템>.m // 아코디언용
		$my.mNum = $(config.mNum, $my);
		$my.prev = $(config.prev, $my);
		$my.next = $(config.next, $my);
		$my.stop = $(config.stop, $my);
		$my.play = $(config.play, $my);
		$my.pageOn = $(config.pageOn, $my); // 현재페이지
		$my.pageTotal = $(config.pageTotal, $my); // 전체페이지
		$my.cTotal = $my.mItem.length; // 단위콘텐츠 개수.
		$my.onSync = $(config.onSync, $my); // 활성연동

		if(	$my.cTotal < 2 ){ // 20190726
			$my.addClass('nodo');
			//$my.effect = config.effect = '';
			$my.effect = '';
		}else{
			$my.removeClass('nodo');
			$my.effect = config.effect;
		}
		$my.attr({'data-total-item': $my.cTotal}); // 20181203. CSS 선택자로 이용

		$my.v0 = { // 20170126. 불변값. 반응형결함개선
			endLeft: 0,
			endTop: 0,
			endOpacity: $my.mItem.css('opacity')
		};

		($my.setV0 = function(){ // 변동값
			// 뷰영역(단위콘텐츠크기) 밖에서 시작하여 원래 위치에서 끝난다.
			$my.v1 = {
				startLeft: parseInt($my.mItem.css('width')),
				startTop: parseInt($my.mItem.css('height')),
				// 아코디언용
				mItemcWidth: parseInt($my.mItemc.css('width')),
				mItemmWidth: parseInt($my.mItemm.css('width'))
			};
			$.extend($my.v0, $my.v1); // 불변값+변동값
		})();

		($my.autoOnOff = function(){ // auto play, stop 상태 표시
			if(config.auto){
				$my.play.removeClass('on').addClass('on');
				$my.stop.removeClass('on')
			}else{
				$my.play.removeClass('on')
				$my.stop.removeClass('on').addClass('on');
			}
		})();

		// 순번 활성. 20161005. 20161021. 20210514.
		($my.changOn = function(){
			//console.log($my.attr('id'), config.onnum);
			$my.mNum.each(function(){ // 순번
				var $this = $(this);
				$this.children('.m').removeClass('on').addClass('off');
				// 클래스 on 제거와 추가 사이에 틈을 주면 CSS animation 재동작한다.
				setTimeout(function(){
					$this.children('.m').eq(config.onnum-1).addClass('on').removeClass('off');	
				}, 0);
			});
			$my.onSync.each(function(){ // 활성연동
				$(this).children('.m').removeClass('on').addClass('off').eq(config.onnum-1).addClass('on').removeClass('off');
			});
			$my.mCont.each(function(){ // 콘텐츠
				$(this).children(config.mItem).css({ zIndex: '' }) // 20181203. z-index 초기화
					.removeClass('on').addClass('off').eq(config.onnum-1).addClass('on').removeClass('off');
				for(var i = config.viewNum-1; i--;){ // config.viewNum 개씩 보임.
					$(this).children(config.mItem).eq(config.onnum + i).addClass('on');
				}
				//$(this).children().eq(config.onnum-1).find('a').focus(); // 활성 콘텐츠 자손 a 있으면 포커스
			});

			// 새, 헌 활성 콘텐츠 객체 구하기
			$my.cOnNew = $(config.mItem+'.on' + config.c, $my.mCont);
			$my.cOnOld = (config.c)?
				$(config.c, $my.mCont.children().eq(config.oldonnum-1)).delay(config.delay):
				$my.mCont.children().eq(config.oldonnum-1);
			$my.cOnNew.css({ zIndex: 11 }); // 20170126. 새 활성 z-index 맨위로.
			$my.cOnOld.css({ zIndex: 10 });

			// 새 활성 콘텐츠 내용 없으면.. 코드 만들어 불러온다. ★☆개발필요! ajax! 만들어진 코드 가져오도록..
			$my.loadContent = function(){
				if($my.cOnNew.html() == ''){
					var onn = (config.onnum < 10)? '0' + config.onnum: config.onnum;
					$my.cOnNew.html('<div class="c"><a href="?' + config.onnum + '"><img src="/img/main/v1/v1' + onn + '.jpg" width="2000" height="300" alt="★대체텍스트' + onn + '" title="" /></a></div>');
				}
			}
			$my.loadContent();

			// 콘텐츠 나열. 20131205~. 20181203. 20191220.
			($my.setmItemLeft = function(){

				$my.mItem.each(function(){
					var idxGap = 0; // 활성 콘텐츠 상대 순번 ( 0: 활성. 1: 이후첫번째, -1: 이전첫번째, ..)
					var thisNum = 1 + $(this).prevAll(config.mItem).length; // 20131205.. 콘텐츠 순서 계산 (콘텐츠와 순번이 섞여있을 때 고려).

					$(this).removeClass('prev-on next-on prev2-on next2-on prev3-on next3-on prev4-on next4-on prev5-on next5-on prev6-on next6-on');

					idxGap = (thisNum - config.onnum);

					// next- 우선. 아이템 좌우 대칭 배치.
					if( idxGap <= (-1 * Math.ceil($my.cTotal / 2)) ){ // $my.cTotal 홀수 짝수 다른 값
						idxGap += $my.cTotal
					}else if ( idxGap > Math.floor($my.cTotal / 2) ){ // $my.cTotal 홀수 짝수 같은 값
						idxGap -= $my.cTotal
					}
					
					// 20210514. idxGap 가 i 번째 최소값이면 최대값 + i 로 만든다.
					if(!!config.p2n){
						for(var i = 1; i <= config.p2n; i++){
							if( idxGap == i - Math.ceil($my.cTotal / 2) ){
								idxGap = Math.floor($my.cTotal / 2) + i;
							}
						}
					}
					//console.log(idxGap, Math.ceil($my.cTotal / 2), Math.floor($my.cTotal / 2) );

					if( idxGap == -1 ){
						$(this).addClass('prev-on');
					}else if( idxGap == 1 ){
						$(this).addClass('next-on');
					}
					if( idxGap == -2 ){
						$(this).addClass('prev2-on');
					}else if( idxGap == 2 ){
						$(this).addClass('next2-on');
					}
					if( idxGap == -3 ){
						$(this).addClass('prev3-on');
					}else if( idxGap == 3 ){
						$(this).addClass('next3-on');
					}
					if( idxGap == -4 ){
						$(this).addClass('prev4-on');
					}else if( idxGap == 4 ){
						$(this).addClass('next4-on');
					}
					if( idxGap == -5 ){
						$(this).addClass('prev5-on');
					}else if( idxGap == 5 ){
						$(this).addClass('next5-on');
					}
					if( idxGap == -6 ){
						$(this).addClass('prev6-on');
					}else if( idxGap == 6 ){
						$(this).addClass('next6-on');
					}

					// 위치 지정
					$(this).css({
						left:(idxGap*$my.v0.startLeft) + 'px',
						top:(idxGap*$my.v0.startTop) + 'px'
					});

				});
			})();

			// 세로 슬라이드 여부
			if(config.vertical){$my.v0.startLeft = 0}
			else{$my.v0.startTop = 0}
			// <아이템>< class=".m" />< class=".c" /></> 일 때
			//$(config.m, $my.mNum).css({zIndex: parseInt($(config.m, $my.mNum).css('zIndex')) + 1}); // .c 와 형제일 때 제어 버튼을 위로 올려서 보이게 한다.

			$my.pageOn.text(config.onnum); // 현재페이지
			$my.pageTotal.text($my.cTotal); // 전체페이지

			// 20201016 현재 활성 )) CSS 이용
			$my.attr({'data-onnum': config.onnum});

			// 20181203 뷰 영역 당 아이템 수에 대응한 상태값 'data-state'
			$my.ipv = Math.round( $my.mView.width() / $my.mItem.width() ); // 보이는 아이템수
			$my.views = $my.cTotal / $my.ipv;
			if( $my.views >= 2 ){
				if( $my.cTotal < 4 ){
					$my.state = 'gte2-lt4items';
				}else{
					$my.state = 'gte2';
				}
			}else if( $my.views > 1 && $my.views < 2 ){
				$my.state = 'gt1lt2';
			}else if( $my.views == 1 ){
				$my.state = 'eq1';
			}else if( $my.views < 1 ){
				$my.state = 'lt1';
			}else{
				$my.state = '';
			}
			$my.attr({'data-state': $my.state}); // CSS 선택자로 이용

			// 20181203 한 페이지 이하이면 자동 순환 안함
			if ( $my.state == 'eq1' || $my.state == 'lt1' ){
				config.auto = false;
			}

		}); // 20171218. $my.action() 에서 호출하므로 자동 실행 안되게 수정함.

		// 액션!!
		($my.action = function(effect){
			switch(effect){
			case 'slide': // ★슬라이드
				$my.changOn();

				// 20191107. 기본 방향은 prevAct() nextAct() 에서 결정
				if( config.reverse == 1 ){
					//if( config.onnum > config.oldonnum ){ config.frontback = 1 } // 정방향
					//else if( config.onnum < config.oldonnum ){ config.frontback = -1 } // 역방향
					if( config.onnum == 1 && config.oldonnum == $my.cTotal ){ // 맨앞←맨끝 (역방향)
						config.frontback = -1;
					}else if( config.oldonnum == 1 && config.onnum == $my.cTotal ){ // 맨앞→맨끝 (정방향)
						config.frontback = 1;
					}
				}

				// 새 to 활성 동작
				$my.cOnNew.css({
					left:(config.frontback*$my.v0.startLeft) + $my.offsetXdrag + 'px',
					top:(config.frontback*$my.v0.startTop) + 'px',
					opacity:$my.v0.endOpacity
				});
				$my.cOnNew.delay(config.delay).stop().animate({
					left:$my.v0.endLeft + 'px',
					top:$my.v0.endTop + 'px',
					opacity:$my.v0.endOpacity
				}, config.duration, config.easing,function(){});
				// 헌 to 비활성 동작
				$my.cOnOld.css({
					left:(config.frontback*$my.v0.endLeft) + $my.offsetXdrag + 'px',
					top:(config.frontback*$my.v0.endTop) + 'px',
					opacity:$my.v0.endOpacity
				});
				$my.cOnOld.delay(config.delay).stop().animate({
					left:(config.frontback*(-1)*$my.v0.startLeft) + 'px',
					top:(config.frontback*(-1)*$my.v0.startTop) + 'px',
					opacity:$my.v0.endOpacity
				}, config.duration, config.easing,function(){});
				break;
			case 'fade': // ★페이드. 20180608.
				$my.changOn();
				$my.mItem.css({display: '', left: $my.v0.endLeft, top: $my.v0.endTop, opacity: 0}); // 모든 콘텐츠 초기화
				$my.cOnNew.css({opacity: 0}); // 새 활성 콘텐츠 초기화.
				$my.cOnNew.delay(config.delay).stop().animate({opacity: $my.v0.endOpacity}, config.duration, config.easing, function(){});
				$my.cOnOld.css({opacity: $my.v0.endOpacity}); // 헌 활성 콘텐츠 초기화.
				// 20180608. 아래 주석 이유 ) 배경 투명이면 쌓임 밑이 비치는거 해결
				//$my.cOnOld.delay(config.delay).stop().animate({opacity: 0}, config.duration, config.easing, function(){});
				break;
			case 'accordion': // ★아코디언. 20140626.
				$my.changOn(); // 활성 on 용으로만 사용. 불필요한 지정값은 아래에서 리셋.
				$my.mItem.css({left:'auto', top:'auto'});
				$my.mItemc.css({zIndex:''});
				$my.mItem.each(function(){
					if($(this).is('.on')){
						$('.m', this).delay(config.delay).stop().animate({width: 0 + 'px'}, config.duration, config.easing, function(){});
						$('.c', this).delay(config.delay).stop().animate({width: $my.v0.mItemcWidth + 'px'}, config.duration, config.easing, function(){});
					}else{
						$('.m', this).delay(config.delay).stop().animate({width: $my.v0.mItemmWidth + 'px'}, config.duration, config.easing, function(){});
						$('.c', this).delay(config.delay).stop().animate({width: 0 + 'px'}, config.duration, config.easing, function(){});
					}
				});
				break;
			default: // ★단순 표시
				$my.changOn();
			}
			$my.offsetXdrag = 0; // 보정 후 초기화
		})(config.initEffect); // ★최초 실행

		$my.prevAct = function(){ // 이전 동작
			config.oldonnum = config.onnum;
			config.onnum -= config.viewNum; // 뷰영역에 config.viewNum 개씩 보임.
			if(config.onnum < 1){
				config.onnum = $my.cTotal; // 맨뒤 순번
				config.onnum = config.viewNum*(Math.ceil($my.cTotal/config.viewNum)-1) + 1; // 맨앞 이전은 맨뒤 그룹의 맨앞. config.viewNum 이하면 몇 개든 1그룹으로 계산.
			}
			config.frontback = -1; // 역방향. 20191107
			$my.action($my.effect);
			$my.restartInterval($my.timer1); // 20210514
		}

		$my.nextAct = function(){ // 다음 동작
			//console.log('$my.effect : ' + $my.effect); // 자동 실행에는 값 가지지만, 클릭 시에는 아래 접근성 기능으로 null 이 되버림.
			config.oldonnum = config.onnum;
			config.onnum += config.viewNum; // 뷰영역에 config.viewNum 개씩 보임.
			if(config.onnum > $my.cTotal){
				config.onnum = 1; // 맨뒤 다음은 맨앞
			}
			config.frontback = 1; // 정방향. 20191107
			$my.action($my.effect);
			$my.restartInterval($my.timer1); // 20210514
		}

		$my.directAct = function(thisNum){ // 직접 동작
			if(config.onnum == thisNum) return false; // 활성 순번 클릭하면 동작 무시
			config.oldonnum = config.onnum;
			config.onnum = thisNum; // 클릭한 순번 활성화
			$my.action($my.effect);
			$my.restartInterval($my.timer1); // 20210514
		}

		// 자동 순환 //
		$my.autoAct = function(){ // 자동 동작
			if(config.auto){
				$my.nextAct();
			}
		}
		$my.timer1 = setInterval($my.autoAct, config.interval); // 자동 가동
		$my.restartInterval = function(timer){ // 자동 재가동
			if(timer){
				clearInterval(timer);
			}
			$my.timer1 = setInterval($my.autoAct, config.interval);
		}

		$my.stopAct = function(){ // 정지 동작
			config.auto = false;
			$my.autoOnOff();
			clearInterval($my.timer1);
		}

		$my.playAct = function(){ // 재생 동작
			config.auto = true;
			$my.autoOnOff();
			$my.changOn(); // 20210514
			$my.restartInterval($my.timer1);
		}

		$my.prev.on('click', function(e){ // 이전 클릭
			e.preventDefault();
			$my.prevAct();
		});

		$my.next.on('click', function(e){ // 다음 클릭
			e.preventDefault();
			$my.nextAct();
		});

		$(config.m, $my.mNum).on(config.mNumEvent , function(e){ // 순번 클릭
			e.preventDefault();
			// 콘텐츠와 순번 혼합 형태 고려한 순번 계상. 20160626.
			if( $(this).parent().hasClass('mNum') ){ // .mNum>.m 또는 ( .mCont.mNum>.m 이고 .mCont.mNum>아이템 ) 이면
				var thisNum = 1 + $(this).index() * $(this).closest('.mNum').find('.m').length / $(this).closest('.mNum').children().length;
			}else{ // .mCont.mNum>아이템>.m 이면
				var thisNum = 1 + $(this).closest(config.mItem).index() * $(this).closest('.mNum').find('.m').length / $(this).closest('.mNum').children().length;
			}
			$my.directAct(thisNum);
		}).attr('tabindex', config.mTabindex); // 순번 탭 포커싱

		$my.stop.on('click', function(e){ // 정지 클릭
			e.preventDefault();
			$my.stopAct();
		});

		$my.play.on('click', function(e){ // 재생 클릭
			e.preventDefault();
			$my.playAct();
		});

		// 다시 맞춤 (load, resize, oriented 이벤트에 동작)
		($my.reset = function(){
			//$my.mView.css({width:(config.viewNum*$my.v0.startLeft) + 'px'}); // 멀티뷰*뷰너비. ☆20140731. 이 기능 제거해야 단독뷰 너비 반응형 동작한다.
			$my.setV0(); // 20140814. 동작값 다시 만들기
			$my.setmItemLeft(); // 20191220. 콘텐츠 나열
		})();

		// 반응형. 사라짐 방지. 20170126
		var delta = 300,
			timer0 = null;
		$(window).on('resize', function(){
			if($my.timer1){
				//clearInterval($my.timer1);
			}
			clearTimeout( timer0 );
			timer0 = setTimeout( resizeDone, delta ); // 1번만 실행
		});
		function resizeDone(){
			$my.reset();
			//$my.restartInterval($my.timer1);
		}

		// 20161025. Test ☆☆(Hint to us!)
		//var xinterval, xnum = 0;
		//xinterval = setInterval(function(){
		//	xnum++;
		//	console.log( $my.attr('id') + " : " + xnum + " : " + config.auto );
		//}, 1000);

		// 접근성 20170126. ~20191008
		$my.find('button, a').addBack().on('focusin mouseenter', function(e){ // 오버 ( click 이벤트 추가하면 다른 요소가 초점 사라짐 주의)
			// 20131209. 투명 콘텐츠 겹쳐 보이는거 해결.
			if(e.type == 'focusin'){
				if($(this).closest(config.mItem).length){ // 콘텐츠만 적용
					$my.effect = null; // 단순 효과로 변경. 안하면.. 초점 받은 후 동작으로 초점이 사라질 수 있다.
					$my.addClass('focusin'); // 20191008
					$my.mItem.css({
						display: '',
						// 20180323. UA 해석 달라졌는지.. 첫 진입에서 겹쳐보여.. 아래 2줄 주석처리함
						//left: $my.v0.endLeft,
						//top: $my.v0.endTop,
						opacity: '' // 20171219. 인라인 스타일 제거하여 정의된 CSS값이 적용된다.
					});
					$(this).closest(config.mItem).css({opacity:$my.v0.endOpacity});
				}
			}
			//clearInterval($my.timer1); // 20210503. 자동 순환 멈춤 주석처리
		}).on('focusout mouseleave', function(e){ // 아웃
			if(e.type == 'focusout'){ // 20131209. 투명 콘텐츠 겹쳐 보이는거 해결 복구
				$my.effect = config.effect; // 효과 옵션 다시 가져온다.
				$my.removeClass('focusin'); // 20191008
				if($(this).closest(config.mItem).length){ // 콘텐츠만 적용
					$(this).closest(config.mItem).css({opacity:$my.v0.endOpacity});
				}
			}
			if(config.auto && !$(':focus', $my.mItem).length){ // 20160202. 20170126. auto 참이고 단위콘텐츠 내부에 초점 없으면
				//$my.restartInterval($my.timer1); // 20210503. 자동 순환 재호출 주석처리
			}
		});

		// 단위콘텐츠. 키보드운용 20131205. 20171219
		// 이벤트는 focusin )) click 순서로 발생하니 유의바람!
		var activeFlag;
		var focusinFlag;
		$('a, area', $my.mItem).attr('tabindex',0).on('focusin', function(e){ // 초점인

			var thisIdx = $(this).closest(config.mItem).prevAll(config.mItem).length;

			if ( config.onnum == (thisIdx + 1) ){
				activeFlag = true;
			}else{
				activeFlag = false;
			}

			if($(config.m, $my.mNum).length > 0){ // 콘텐츠와 순번이 섞여있을 때 고려 : 아이템>.m 와 .mCont>.m 일 경우 모두 고려함.
				$(config.m, $my.mNum).eq(thisIdx).trigger('click');
			}else{ // 순번 없으면
				config.oldonnum = config.onnum;
				config.onnum = thisIdx + 1;
				$my.action($my.effect);
			}

			focusinFlag = true;
			//setTimeout(function(){
				focusinFlag = false;
			//}, 200); // [CR]OK!

		}).on('click', function(e){ // 클릭
			//e.preventDefault();
			//console.log( config.onnum +'  ' + activeFlag + '  ' + focusinFlag);
			if( activeFlag ){
				return;
			}else{
				if( !focusinFlag ){ // focusinFlag = flase 이면 실행. 마우스 클릭 아닌 키보드 엔터 누를 때 이미 포커싱 되어 있으므로..
					return;
				}
				return false;
			}
		});

		// 제스처. 20190626.
		if(!config.gesture) return false;
		($my.gesture1 = function(){
			var o = {
				sx: 0, // start x
				sy: 0, // start y
				dx: 0, // distance x
				dy: 0, // distance y
				ex: 0, // end x
				ey: 0, // end y
				sl: 0, // start left
				st: 0, // start top
				threshold: config.threshold // 반응 기준값
			};
			$my.mView.on('touchstart touchmove touchend mousedown mousemove mouseup', function(e){
				 // $(this) 좌상단에서의 터치 이벤트 상대 위치 x, y
				$my.offsetLeft = ($(this).offset().left < 0)? 0: $(this).offset().left; // 뷰가 화면 보다 클 때 보정
				$my.offsetTop = ($(this).offset().top < 0)? 0: $(this).offset().top;
				if(e.originalEvent.touches || e.originalEvent.changedTouches){ // 터치 있으면
					var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0]; // 싱글 터치
					touch.length = e.originalEvent.touches.length || e.originalEvent.changedTouches.length;
					var x = touch.pageX - $my.offsetLeft;
					var y = touch.pageY - $my.offsetTop;
				}else{
					var e = e || window.event;
					var x = e.pageX - $my.offsetLeft;
					var y = e.pageY - $my.offsetTop;
				}
				//console.log(e.type +'   '+ e.pageX +'   '+ e.pageY);
				if(x < $(this).width() && x > 0 && y < $(this).height() && y > 0){ // $(this) 범위 안이면 동작
					if(e.type == 'touchstart' || e.type == 'mousedown'){
						$my.onGesture = 1;
						o.sx = x; o.sy = y; // 터치 시작 위치 기억
						o.dx = 0; o.dy = 0; // 터치 이동 거리 초기화
						o.sl = parseInt($my.mCont.css('left')); // mCont 가 [1][2][3] 나열되어 있을 때와 동일하게 동작하고.. 이전, 다음 동작 시에는  아이템으로 계산할거다.
						clearInterval($my.timer1); // 자동 정지
					}
					if(e.type == 'touchmove' || e.type == 'mousemove'){
						if($my.onGesture){
							o.dx = x-o.sx; o.dy = y-o.sy; // 터치 이동 거리 계산
							if(Math.abs(o.dx) > Math.abs(o.dy)){ // 가로 이동 크면 동작
								e.preventDefault();
								if(config.swipe){
									$my.mCont.css('left',(o.sl + o.dx) + 'px'); // 터치 이동 거리만큼 mCont 이동
								}
							}else{
								$my.onGesture = 0;
							}
						}
					}
					if(e.type == 'touchend' || e.type == 'mouseup'){
						//e.preventDefault(); // 20150414. a 링크 위해 주석처리.
						$my.onGesture = 0;
						o.ex = x; o.ey = y; // 터치 종료 위치 기억
						if(Math.abs(o.dx) > Math.abs(o.dy)){ // 가로 이동 크면 동작
							$my.offsetXdrag = parseInt($my.mCont.css('left')) || 0; // 아이템을 이전 다음 동작 시 이동한 만큼 보정할거고.. (NAN이면0으로계산)
							$my.mCont.css('left',(o.sl) + 'px');// mCont 는 원위치한다.
							if((o.ex-o.sx) > o.threshold){
								$my.prevAct();
							}
							else if((o.ex-o.sx) < -o.threshold){
								$my.nextAct();
							}
							else{
								$my.returnAct('slide');
							}
						}
						$my.restartInterval($my.timer1);
					}
				}else{ // $(this) 범위 밖이면 원위치
					if($my.onGesture){ // 터치중
						$my.returnAct('slide');
						$my.onGesture = 0;
					}
				}
				/* $('a', this).on('click', function(){
					if(Math.abs(o.dx) > 2){ // 2px 초과 드래그하면.. 링크 이동 안함.
						return false;
					}else{
						return;
					}
				}); */
				// Android 4.1.2 Webkit 534.30 (GalaxyS2,..) 는 touch 와 mouse 이벤트 동시에 발생하고,
				if(/touch/.test(e.type)){
					//$('.test').html($my.onGesture + "  " + /touch/.test(e.type) + "  " + e.type + "  " + Math.abs(o.dx)).css({'border':'1px solid #f00'}); // 점검
				}else{ // PC Web 은 mouse 이벤트만 발생한다.
					//$('.test').html($my.onGesture + "  " + /touch/.test(e.type) + "  " + e.type + "  " + Math.abs(o.dx)).css({'background':'#0f0'}); // 점검
					return false; // 그래서 여기서만 해줘야지.. 올바로 동작
				}
			});
		})();
		$my.returnAct = function(effect){ // 제자리로 되돌리기
			switch(effect){
			case 'slide':
				$my.mCont.animate({left:0},'slow','swing', function(){});
				break;
			default:
				$my.mCont.css('left',0);
			}
		}
	});
} /* /$.fn.jQmPR1 */


/** ◇◆ jQmPanX1. v0.5.2 | 20191223 Plugin (( v.20151116~20190626. ) MoonYoungShin.
 * !!required: jquery-1.8.0.min.js + jquery.easing.1.3.js
 * 20191223. Plugin 으로 고도화
 * 20190626. pageX pageY 결함 개선
 * 20160309. left 를 margin-left 로 수정. (키보드 운용 고도화 하다보니..)
 * 20160309. 내용물이 뷰보다 길 때 터치 이동 동작 결함 해결.
 * 현재위치 1줄 배치하고 뷰 영역 넘칠 때 터치슬라이드 동작으로 UX 고도화.
 */
$.fn.jQmPanX1 = function(options){
	if(!this) return false;
	var config = {

		// DOM Selectors
		//mView : '.mView', // 뷰
		mStage : '.mStage', // 무대
		mCont : '.mCont' // 내용물 묶음
		//mItem : '.mView .mContC' // 아이템

	};
	$.extend(config, options);
	return this.each(function(){
		var $my = $(this);

		// DOM
		$my.$mView = $my; // 뷰
		$my.$mStage = $(config.mStage, $my.$mView); // 무대
		$my.$mCont = $(config.mCont, $my.$mView); // 내용물 묶음

		// 초기화
		$my.$mStage.css({
			//left: '0' // 20160309.
			margin: '0'
		});

		// Gesture
		($my.gesture1 = function(){
			var o = {
				sx: 0, // start x
				sy: 0, // start y
				dx: 0, // distance x
				dy: 0, // distance y
				ex: 0, // end x
				ey: 0, // end y
				sl: 0, // start left
				st: 0, // start top
				range: 0, // 뷰-내용물
				threshold: 0 // 50 // 임계값
			};

			$my.on('touchstart touchmove touchend touchcancel mousedown mousemove mouseup', function(e){

				o.range = $my.$mView.width() - $my.$mCont.width(); // 내용물이 크면 마이너스값
				//if(o.range >= 0) return false; // 내용물이 작을 때 터치 동작 안하려고 .. return false 하면 안된다! 클릭 동작도 안된다!

				// $(this) 좌상단에서의 터치 이벤트 상대 위치 x, y
				$my.offsetLeft = ($(this).offset().left < 0)? 0: $(this).offset().left; // 뷰가 화면 보다 클 때 보정
				$my.offsetTop = ($(this).offset().top < 0)? 0: $(this).offset().top;
				if(e.originalEvent.touches || e.originalEvent.changedTouches){ // 터치 있으면
					var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0]; // 싱글 터치
					touch.length = e.originalEvent.touches.length || e.originalEvent.changedTouches.length;
					var x = touch.pageX - $my.offsetLeft;
					var y = touch.pageY - $my.offsetTop;
				}else{
					var e = e || window.event;
					var x = e.pageX - $my.offsetLeft;
					var y = e.pageY - $my.offsetTop;
				}
				if(e.type == 'touchstart' || e.type == 'mousedown'){
					$my.onGesture = 1;
					o.sx = x; o.sy = y; // 터치 시작 위치 기억
					o.dx = 0; o.dy = 0; // 터치 이동 거리 초기화
					o.sl = parseInt($my.$mStage.css('margin-left'));
					clearInterval($my.timer1); // 자동 정지
				}
				if(e.type == 'touchmove' || e.type == 'mousemove'){
					if($my.onGesture){
						o.dx = x-o.sx; o.dy = y-o.sy; // 터치 이동 거리 계산
						if(Math.abs(o.dx) > Math.abs(o.dy)){ // 가로 이동 크면 동작
							e.preventDefault();
							$my.$mStage.stop().animate({ // 터치 드래그 거리만큼 스테이지 이동
								'margin-left': (o.sl + o.dx) + 'px'
							}, 0, 'linear', function(){}); // 즉시 이동
						}else{
							$my.onGesture = 0;
						}
					}
				}
				if(e.type == 'touchend' || e.type == 'mouseup'){
					//e.preventDefault(); // 20150414. a 링크 위해 주석처리.
					$my.onGesture = 0;
					o.ex = x; o.ey = y; // 터치 종료 위치 기억
					if(Math.abs(o.dx) > Math.abs(o.dy)){ // 가로 이동 크면 동작
						$my.offsetXdrag = parseInt($my.$mStage.css('margin-left')) || 0;
						$my.action1('slide'); // 동작 실행
					}
				}
				if(e.type == 'touchcancel'){
					if($my.onGesture){ // 터치중
						$my.action1('slide'); // 동작 실행
						$my.onGesture = 0;
					}
				}

				$('a', this).click(function(){
					if(Math.abs(o.dx) > 2){ // 2px 초과 드래그하면.. 링크 이동 안함.
						return false;
					}else{
						return;
					}
				});

				// 20160309. 터치 드래그 이동과 원위치.
				// 20150609. (o.sl) 값 받으려면 즉시함수 안으로 이동.
				$my.action1 = function(effect){
					o.sl = o.sl + o.dx; // 20160309 ☆ 시작 좌값 + 이동 거리값
					if( o.sl > 0 ){ // 맨앞보다 우측으로 보내면
						o.sl = 0; // 맨앞으로
					}
					if( o.sl < o.range ){ // 맨뒤보다 좌측으로 보내면
						if( o.range >= 0 ){ // 내용물이 작으면 맨뒤로 보내면 안되기에..
							o.sl = 0; // 맨앞으로
						}else{
							o.sl = o.range; // 맨뒤로
						}
					}
					switch(effect){
					case 'slide':
						$my.$mStage.stop().animate({
							'margin-left': (o.sl) + 'px'
						}, 200, 'swing', function(){}); // 부드럽게 이동
						break;
					default:
						$my.$mStage.stop().css({
							'margin-left': (o.sl) + 'px'
						});
					}
				}

				// 20191220. Android (삼성인터넷10.2.00.53) 는 touch 와 mouse 이벤트 동시에 발생하고,
				if(/touch/.test(e.type)){
				}else{ // PC 는 mouse 이벤트만 발생
					return false; // 여기만 해야지.. 올바로 동작
				}

			});

		})();

	});
} /* /$.fn.jQmPanX1 */


/* ◇◆ Function ◇◆◇◆◇◆◇◆◇◆ */


/** ◇◆ CSS지원탐지 | 20180612. MoonYoungshin.
 * Use)
	setClassSupportCSS('zoom');
 * Result)
	<html class="zoom"> // [IE8+][CR][OP][SF]
	<html class="no-zoom"> // [FF]
 */
function setClassSupportCSS(a){
	var el = document.createElement('div');
	// typeof el.style.zoom == 'string';
	if( a in el.style ){
		$('html').addClass(a);
	}else{
		$('html').addClass('no-'+a);
	}
}


/** ◇◆ UA버전탐지(IE version) | 20140901~20180503. 20181130. MoonYoungShin.
 * Result)
	[IE8]<html class="IE8 lteIE8 lteIE9 lteIE10 lteIE11">
	[IE9]<html class="IE9 lteIE9 lteIE10 lteIE11 gteIE9orSUA">
	[IE10]<html class="IE10 lteIE10 lteIE11 gteIE9orSUA">
	[IE11]<html class="IE11 lteIE11 gteIE9orSUA">
 */
function setClassUAver(){ // Returns the version of Internet Explorer or a -1 for other browsers.
	$.browser = {};
	$.browser.msie = false;
	//$.browser.ua = navigator.userAgent.toLowerCase();
	$.browser.ua = navigator.userAgent;
	$.browser.rv = -1;
	if(navigator.appName == 'Microsoft Internet Explorer'){ // [IE7~10]
		$.browser.msie = true;
		$.browser.re = new RegExp('MSIE ([0-9]{1,}[\.0-9]{0,})');
		if($.browser.re.exec($.browser.ua) != null){
			$.browser.rv = parseFloat( RegExp.$1 );
		}
		$('html').addClass('IE' + $.browser.rv); // IE7, IE8, IE9, IE10 (IE11~ 제외!)
	}
	if((navigator.appName == 'Netscape' && $.browser.ua.search('Trident') != -1)){
		$('html').addClass('IE11');
		$('html').addClass('lteIE11'); // ~IE11
	}
	if($.browser.rv > -1 && $.browser.rv <= 8){
		$('html').addClass('lteIE8'); // ~IE8
	}else{
		$('html').addClass('gteIE9orSUA'); // IE9~, Standard User Agent
	}
	if($.browser.rv > -1 && $.browser.rv <= 9){
		$('html').addClass('lteIE9'); // ~IE9
	}
	if($.browser.rv > -1 && $.browser.rv <= 10){
		$('html').addClass('lteIE10'); // ~IE10
		$('html').addClass('lteIE11'); // ~IE11
	}
	if( ($.browser.ua.indexOf("Chrome") != -1)  && ($.browser.ua.indexOf("Safari") != -1) ){ // Chrome, Opera
		$('html').addClass('Chrome');
	}
	if( ($.browser.ua.indexOf("Safari") != -1) && ($.browser.ua.indexOf("Chrome") == -1) ){
		$('html').addClass('Safari');
	}
	if($.browser.ua.indexOf("Firefox") != -1){
		$('html').addClass('Firefox');
	}
	//console.log($.browser.rv);
}


/** ◇◆ window크기탐지 | 20151117~. 20190430. 20200128. MoonYoungShin.
 */
function setClassWinWidth(){
	var $window = $(window);
	var $html = $('html');

	// 즉시 호출
	removeClassWidth();
	addClassWidth();

	$(window).on('load resize', function(){
		removeClassWidth();
		addClassWidth();
		//console.log( $window.width(), $html.width(), $window.outerWidth() );
	});

	function removeClassWidth(){
		$html.removeClass('width-small width-medium width-large width-xlarge lt-width-xlarge');
	}
	function addClassWidth(){
		var widthscroll = $window.outerWidth(); // screen width with scrollbar

		if( widthscroll <= 767 ){
			$html.addClass('width-small');
		}
		if( (widthscroll >= 768) && (widthscroll <= 999) ){
			$html.addClass('width-medium');
		}
		if( (widthscroll >= 1000) && (widthscroll <= 1259) ){
			$html.addClass('width-large');
		}
		if( widthscroll >= 1260 ){
			$html.addClass('width-xlarge');
		}else{
			$html.addClass('lt-width-xlarge');
		}

	}
}


/** ◇◆ 쿠키 | 20180125. 20190708. MoonYoungshin.
 * [IE8+]OK
 * 20180125) [IE11] 브라우저 ) 도구 ) 인터넷옵션 ) 삭제 ) 실행 해도 쿠키 바로 제거 안되는 결함 주의!
 * 20190708) 오늘 안보이기 추가
 * Task) 쿠키 제거 delCookie();
 */

// 쿠키 설정
function setCookie(name, value, expdays) {
	var sdate = new Date(), // 시작
		edate = new Date(), // 만료
		willCookie = '';
	if( !!expdays ){ // 하루~ 안보이기
		edate.setDate(edate.getDate() + expdays);
	}else{ // 오늘 안보이기
		edate = new Date(edate.getFullYear(), edate.getMonth(), edate.getDate()+1, 00, 00, 00);
	}
	willCookie += name + '=' + encodeURIComponent(value) + ';';
	willCookie += 'expires=' + edate.toUTCString() + '';
	//console.log( sdate.toString() +' ~ '+ edate.toString() );
	//console.log( sdate.toUTCString() +' ~ '+ edate.toUTCString() );
	document.cookie = willCookie;
}

// 쿠키 추출
function getCookie(name) {
	var cookies = document.cookie.split('; '); // ((( ';'
	for (var i in cookies) {
		if (cookies[i].search(name) != -1) {
			return decodeURIComponent( cookies[i].replace(name + '=', '') );
		}
	}
}


/** ◇◆ 팝업레이어 | ~20180502. 20190708. MoonYoungshin.
 * Use) openPop('#pop20190708a1');
	<a href="#pop20190708a1" onclick="closePop('#pop20190708a1', 'checked'); return false;" class="b1"><span class="t1">오늘 안보이기</span></a>
	<a href="#pop20190708a1" onclick="closePop('#pop20190708a1', 'checked', 1); return false;" class="b1"><span class="t1">하루 안보이기</span></a>
	<a href="#pop20190708a1" onclick="closePop('#pop20190708a1', 'checked', 7); return false;" class="b1"><span class="t1">일주일 안보이기</span></a>
	<a href="#pop20190708a1" onclick="closePop('#pop20190708a1', ''); return false;" class="b2"><span class="t1">닫기</span></a>
 */

// 팝업레이어 열기
function openPop(pop){
	var $pop = $(pop);
	if( getCookie(pop) != 'done' ){
		$pop.addClass('on');
	}else{
		$pop.addClass('off');
	}
}

// 팝업레이어 닫기
function closePop(pop, check, days){
	var $pop = $(pop);
	if( check == 'checked' ){
		setCookie(pop, 'done', days);
		$pop.addClass('off');
	}else{
		$pop.removeClass('off');
	}
	$pop.removeClass('on');
}


/** ◇◆ 메뉴활성 | 20150528~ 20170719. 20171108. MoonYoungShin.
 * Use1) makeActive('#tabs1', '.m1');
 * 20170719. makeActive('#tabs1', '.m1', 'toggle'); // 토글 기능 추가. 단, makeMenu2Dropdown() 일 때는 토글 안되는데.. 기능적으로 맞음.
 * 20170707. isLocationHash 추가. 단, location.hash 와 동일한 메뉴가 2개 이상 있으면 최초 활성 결함 발생. (예) #? 와  li>a[href='#?']
 * 20161122. 주메뉴 등에만 사용되던 코드 제거.
 * Task) To Advance.
 */
function makeActive(selector, onFilter, option){
	var $my = $(selector);
		$my.$m = $('li', $my);
		$my.$a = $('li>a[href]', $my);
	var isLocationHash = !!$('a[href$="'+ location.hash +'"]', $my).length;
	var option = option;

	$my.$a.on('click', function(){
		if($(this).parent().is('.on')){
			if( option == 'toggle' ){ // 토글 할거
				$(this).parent().removeClass('on');
			}
		}else{
			$(this).parent().addClass('on').siblings().removeClass('on');
		}
		//return false; // fragment link 도 링크 위치로 이동하도록 주석처리함.
	});

	if(onFilter){
		$my.$m.removeClass('on').filter(onFilter).addClass('on'); // 최초 활성
	}

	if( isLocationHash ){ // 20170718.
		$my.$aa = $('a[href$="'+ location.hash +'"]', $my);
		// 최초 활성 변경
		//$my.$aa.parent().siblings().removeClass('on').end().addClass('on'); // 이러면 안돼요.
		$my.$aa.parent().addClass('on').siblings().removeClass('on');
	}
}


/** ◇◆ 메뉴href콘텐츠만보이기 | 20150330~ 20170707. 20210409. MoonYoungShin.
 * Use1) makeActive() 와 함께 사용하면 탭과 유사하다.
   makeShow('#tabs1', '#tabs1pane1');
   makeActive('#tabs1', '.m1');
 * Task) To Advance.
 * 20161103. 스크립트오류해결. jquery-1.12.4.min.js:2 Uncaught Error: Syntax error, unrecognized expression: a[href$=#tabs1pane1](…)
 * 20170707. myHash 결함해결. 활성된 탭 위치로 화면 이동 gotohere
 * 20210409. setoff 결함 해결
 */
function makeShow(selector, onHash, setoff){
	var $my = $(selector); // 주의!) selector 는 메뉴래퍼
		$my.$m = $('li', $my);
		$my.$a = $('li>a[href]', $my);
	var myHash = "";
	var isLocationHash = !!$('a[href$="'+ location.hash +'"]', $my).length;
	var gotohere;

	(setoff)? setoff: setoff = 0; // 20210409

	$my.$a.on('click', function(){
		$($(this).attr('href')).show().siblings().hide();
		return false; // fragment link 도 링크 위치로 이동하려면 주석처리함. 20151126.
	});

	// isLocationHash 20170707. //myHash = location.hash || onHash;
	if( isLocationHash ){
		myHash = location.hash;
	}else{
		myHash = onHash;
	}
	//console.log(myHash);
	
	$my.$aa = $('a[href$="'+ myHash +'"]', $my);
	$my.$aa.triggerHandler('click'); // 20161103
	
	if( isLocationHash ){
		gotohere = $my.$aa.offset().top;
		smoothScrollTop( gotohere, setoff ); // setoff 단위 없이 정수값
	}
}


/** ◇◆ 부드러운 세로 스크롤. 20160725. 20210409. MoonYoungshin
 * 20210409. scrolling 분기 추가
 */
function smoothScrollTop(end_top, setoff){ // (이동할곳, 상쇄값)
	if( $('html').is('.scrolling') ) return false;
	(setoff)? setoff: setoff = 0;
	$('html, body').stop().animate({ // $('html, body').animate() ☆[호환]OK!
		scrollTop: end_top + setoff // 상쇄 합침
	}, 400, 'swing', function(){
		$('html').removeClass('scrolling');
	});
	$('html').addClass('scrolling');
}


/* ◇◆ 메뉴균등폭만들기. 20150529~ 20170515. 20201127. MoonYoungshin.
 * 웹페이지 로딩 및 리사이징 시 실행
 * 20151019. 1줄 꽉채우는 로직 바르게 수정.
 * [IE7]down Bug 성능개선OK!
 * 20170310. 탭콘텐츠처럼 감췄다가 보이는 거는 탭 클릭할 때 지연 호출한다.
   setTimeout(function(){ makeEvenWidthMenus(); }, 0); // (ex) tp2tour2view1.jsp
 * 20170515. mnum 옵션값 추가
 * 20201127. $my.removeClass() 수정
 */
function makeEvenWidthMenus(mnum){
	var $my = $('.mj-menu-even-width>ul'); // 20151201. >* 를 ul 로 한정
	var mnum = mnum || 10; // 20170515. +10 매직넘버추가. 줄바뀜 결함 해결.
	var doit = function(){
		//$my.css({'opacity': '0'}); // 이래도 css 정의만 못하다. 살짝 보였다 사라짐.
		//setTimeout(function(){ // 20161103. [IE8]먹통 개선위해 주석처리.
			$my.each(function(){
				var $my = $(this);
				var $that = $('>li>a', $my);
				var v = {
					mwidth: 0, // 메뉴너비최대값
					colnum: 0, // 컬럼수
					bar: 0
				};
				//$my.removeClass(); // class 를 모두 지운다.
				$my.removeClass('col-0 col-1 col-2 col-3 col-4 col-5 col-6 col-7 col-8 col-9 col-10 col-11 col-12'); // 20201127
				$that.each(function(){
					var $that = $(this);
					$that.realWidth = $that.outerWidth(true); // padding, scrollbar, border, margin 포함
					$that.css({
						'position': 'absolute',
						'white-space': 'nowrap'
					});
					//console.log( $that.parent().index()+1 +'   '+ $that.realWidth +'   '+ v.mwidth );
					if ( $that.realWidth > v.mwidth){
						v.mwidth = $that.realWidth + mnum; // 20170502.
					}
					$that.css({
						'position': 'relative',
						'white-space': 'normal'
					});
				});
				v.colnum = parseInt($my.parent().width() / v.mwidth);
				v.colnum = (v.colnum)? v.colnum: 1;
				$my.addClass('col-' + v.colnum);
				if( $that.length < v.colnum ){ // 20151019. li 수가 계산된 컬럼 수보다 적으면
					$my.removeClass('col-' + v.colnum);
					$my.addClass('col-' + $that.length); // 1줄 꽉채운다.
				}
			});
			$my.animate({'opacity': '1'}, 0);
		//}, 0); // delay
	};
	doit(); // 20160125. 다른 이벤트로 실행가능하게 (탭클릭순간,..)
	$(window).on('load resize', function(e){
		switch(e.type){
		case 'load':
			//if (navigator.userAgent.indexOf("MSIE 7.") == -1){ // not[IE7]
			//	doit(); // 20160125
			//}
			break;
		case 'resize':
			doit();
			break;
		default:
		}
	});
}


/* ◇◆ 만들기메뉴드롭다운. v.20151201~.20160104. 20170217. MoonYoungshin.
 * Even Width Menus ))) Dropdown Menu
 * Use) makeMenu2Dropdown();
 * DOM 생성 시간차 최소화하려면 마크업 바로 아래 실행!
 * makeCnb1() v.20140916 복제.변경.고도화
 * 1) Dropdown Menu 동작 1가지만 구현.
 * 2) Tab Prev Next 기능은 없다.
 * Task) [IE7]?
 */
function makeMenu2Dropdown(ss, os){ // subject selector, object selector
	var $my = (ss)? $(ss): $('.mj-menu2dropdown'); // $('.mj-menu2dropdown')
	var v = { // 마크업 추가
		note: '<div class="note"><i class="ic1"></i><span class="t1">선택하세요</span></div>',
		toggle: '<button type="button" class="toggle"><span class="t1">메뉴 여닫기</span><i class="ic1"></i></button>',
		foo: ''
	};
	$my.each(function(){
		var $my = $(this);
		var $that = (os)? $(os): $('ul', $my); // 20170217. 아래 if 안에서 여기로 이동.
		if( !$('.toggle', $my).length ){ // Dropdown 으로 만든 적이 없으면 (중복 실행 오류 방지)
			// 1) Dropdown Menu
			$my.prepend(v.toggle);
			$my.prepend(v.note);
			$('li', $my).each(function(){ // 활성
				if($(this).is('.on')){
					$that.hide();
					$('.note>.t1', $my).html($(this).find('a').html());
				}
			});
			$('.toggle', $my).on('click', function(){ // 토글클릭
				if($that.is(':hidden')){
					$('.t1', this).text('메뉴 감추기');
					$that.slideDown(200, 'swing', function(){});
				}else{
					$('.t1', this).text('메뉴 보이기');
					$that.slideUp(200, 'swing', function(){});
				}
			});
		}
		$('li>a', $my).on('click', function(){ // 메뉴클릭.활성. 20160104.
			$(this).parent().addClass('on').siblings().removeClass('on');
			if($(this).parent().is('.on')){
				$that.hide();
				$('.note>.t1', $my).html($(this).html());
			}
		});
	});
}


/** ◇◆ 뷰섬네일. jQchangePic3. v0.3 | 20140829. 20160616. 20161129. MoonYoungshin.
 * Use) jQchangePic3('click', '.pic1gallery3', '.m', 1, '.pt1');
 * 이벤트축소판대상할당온제어.이전다음. 제목 추가.
 * resize 제거하여 간단히
 * 20160513. 활성 순번에 따라 대응하는 대상 $foll1cn 추가
 * 20160616. [~IE8]bugFix) 이전다음에서 .bsContain 생성 img 도 섬네일로 바꿔지는 결함 )))  $('img', $my.$c) 을 $('>.p1>img', $my.$c) 로 수정하여 해결.
 * 20161129. 고도화. 빈 섬네일 코드 계산. 변수 미리 정리. 일반변수와 $객체 분리.
 * 섬네일 나열형
 */
function jQchangePic3(e, selector, m, n, c){
	var act_e = (e)? e: 'click', // 동작 이벤트
		str_m = (m)? (selector + ' ' + m): (selector + ' .m'), // 메뉴 선택자
		str_c = (c)? $(selector + ' ' + c): (selector + ' .c'), // 콘텐츠 선택자
		onnum = (n)? n: 0, // 활성순번 : 0 은 모두 비활성
		str_mimg = '>*>img'; // 메뉴>*>섬네일이미지
	var $my = $(selector);
		$my.$m = $(str_m); // 메뉴
		$my.$c = $(str_c); // 대상 (콘텐츠가 변하는거)
		$my.$img = $('>.p1>img', $my.$c); // 대상 이미지
		$my.$t1 = $('.t1', $my.$c); // 대상 이미지 제목
		$my.$bprev = $('.mControl .prev', $my); // 이전
		$my.$bnext = $('.mControl .next', $my); // 다음
	// 20160513. 대상 (활성 순번에 따라 대응하는거)
	var $foll1cn = $my.parent().find('.foll1pic1gallery1').children();
	var $foll2cn = $my.parent().find('.foll2pic1gallery1').children();

	// 링크주소 있는 앵커만 동작
	$('a[href]', $my.$m).on(act_e, function(e){
		e.preventDefault();
		$my.$m.removeClass('on');
		$(this).parent().addClass('on');
		$my.$img.attr({ // 20160616
			src: $(this).attr('href'),
			alt: $(str_mimg, this).attr('alt')
		});
		//$my.$t1.html($('.t1', this).text()); // 섬네일도 텍스트 제목
		$my.$t1.text($my.$img.attr('alt')); // 제목
		//onnum = $(this).parent().index()+1; // 20161129. index() 는 조건에 맞지 않는 형제도 포함된 인덱스이므로 아래 코드 수정함.
		onnum = $my.$m.filter('.on').index(str_m)+1;
		//console.log(onnum);
		controlAdvanced();
		$foll1cn.hide().eq($(this).parent().index()).show();
		$foll2cn.hide().eq($(this).parent().index()).show();
	});
	$my.$bprev.on('click', function(e){e.preventDefault(); // 이전
		onnum--;
		if(onnum <= 0) onnum = onnum + $my.$m.length;
		$my.$m.eq(onnum-1).find('a').triggerHandler(act_e);
		controlAdvanced();
	});
	$my.$bnext.on('click', function(e){e.preventDefault(); // 다음
		onnum++;
		if(onnum > $my.$m.length) onnum -= $my.$m.length;
		$my.$m.eq(onnum-1).find('a').triggerHandler(act_e);
		controlAdvanced();
	});
	$my.$m.eq(onnum-1).find('a').triggerHandler(act_e); // 초기실행

	function controlAdvanced(){ // 이전 다음 점멸
		$my.onIdx = $my.$m.filter('.on').index(str_m); // 20161129. str_m 선택자 해당되는 형제 중 인덱스.
		if( $my.onIdx == 0){
			$my.$bprev.hide();
		}else{
			$my.$bprev.show();
		}
		if( $my.onIdx == $my.$m.length-1){
			$my.$bnext.hide();
		}else{
			$my.$bnext.show();
		}
	}
}