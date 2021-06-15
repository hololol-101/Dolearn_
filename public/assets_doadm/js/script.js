/* 20140605. Template by MoonYoungshin. YYYYMMDD. Last Developer. */

if(window.console==undefined){console={log:function(){}};} // [~IE10] IE11은 window.console 지원예정.

/** Mobile | Desktop 구분. 20140513. [IE11,CR,FF,OP,SF, Android WebBrowser]OK
*/
if(window.orientation!=undefined){
	$('html').addClass('Mobile'); // SmartPhone+Tablet
}else{
	$('html').addClass('Desktop'); // PC
}

/* jQuery Function ◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆ */



/* jQuery(document).ready(function($){}); ◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆ */
//jQuery.noConflict();
jQuery(function($){
(function(){


/** jQmTnbD4a1() 주메뉴(전체메뉴)1·2·3·4차.
 * For tablet, mobile
 * ☆required: jquery-1.8.0.min.js 이상, jquery.easing.1.3.js 'easeInOutQuad'
**/

//위지저장용 쿠키저장.
function setCookie(name, value) {
	var todayDate = new Date();
	todayDate.setDate(todayDate.getDate() + 365);
	document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";";
}
function getCookie( name ){
    var nameOfCookie = name + "=";
    var x = 0;
    while ( x <= document.cookie.length )
    {
         var y = (x+nameOfCookie.length);
         if ( document.cookie.substring( x, y ) == nameOfCookie ) {
              if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 )
                   endOfCookie = document.cookie.length;
              return unescape( document.cookie.substring( y, endOfCookie ) );
         }
         x = document.cookie.indexOf( " ", x ) + 1;
         if ( x == 0 )
              break;
    }
    return "";
}


$.fn.jQmTnbD2a1 = function(options){
	if(!this) return false;
	var config = {
		that: '#tnb1c', // 여닫는 대상 콘텐츠 선택자
		home: 'a.b1.gohome', // 홈 아이콘 메뉴
		action: '' // 예비
	};
	$.extend(config,options);
	return this.each(function(){
		var $this = $(this); // 전체 메뉴 래퍼
		var $that = $(config.that);
		var $home = $(config.home, $this);
		$('div.d1 a+div', $this).prev().parent().addClass('hasSubNav');
		$('div.d1>ul>li>a', $this).click(function(){ // 1차메뉴 클릭
			var r1 = new RegExp("(m[1-9]*)");
			var css = $(this).parent().attr("class");
			if ( css ) {
				if ( r1.exec(css) ) {
					setCookie("__console_menu", RegExp.$1);
				}
			}
			$(this).parent().siblings().removeClass('on');
			$(this).parent().toggleClass('on');
			if($(this).parent().hasClass('hasSubNav')){
				$(this).parent().siblings().children('div').slideUp(100, 'swing', function(){});
				$(this).next('div').slideToggle(100, 'swing', function(){});
				return false;
			}
		});
		var __clicked = getCookie("__console_menu"); 
		
		if ( __clicked && $('div.d1>ul>li.'+ __clicked +'>a', $this).length > 0 ) {
			$('div.d1>ul>li.'+ __clicked +'>a', $this).triggerHandler("click");
		} else {
			// 정확한 쿠키값이 없을 겨웅 첫번째 항목에 
			var r1 = new RegExp("(m[1-9]*)");
			var css = $("div.d1>ul>li", $this).attr("class");
			if ( css ) {
				if ( r1.exec(css) ) {
					$('div.d1>ul>li.'+ RegExp.$1 +'>a', $this).triggerHandler("click");	
				}
			}
		};
	});
	
}
$('#tnb1').jQmTnbD2a1();






})();///(function(){

/* $(document).ready( Execution ) ◆◆◆◆◆◆◆◆ */

// main


// sub >> 각 콘텐츠 바로 아래 실행 // 범용 기능만 여기서 실행.


});///jQuery(function($){

/* $(window).load(function(){}); ◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆ */
$(window).load(function(){

});///$(window).load(function(){