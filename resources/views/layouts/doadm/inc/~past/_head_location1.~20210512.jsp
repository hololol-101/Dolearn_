<%@page language="java" contentType="text/html; charset=utf-8"%>
<%--
/**
 * @File Name : head_location1.jsp
 * @Description : 현재페이지 위치
 * @Modification Information
 * <pre>
 * 수정일 | 수정자 | 수정내용
 * 2020.08.04 | 문영신 | 최초 등록
 * 2020.08.20 | 문영신 | 요구반영. 결함개선. 고도화.
 * </pre>
 * @author 웹표준화실 문영신
 * @since 2020.08.04
 *
 * @Copyright (C) IACTS.CO.KR All rights reserved.
 */
--%>
<!-- location1 -->
<div id="location1">
<div class="breadcrumb clearfix">
	<strong class="blind">현재페이지 위치:</strong>
	<span class="cont"><%=locationLink%></span>
</div>
</div>
<!-- /location1 -->
<script>/*<![CDATA[*/
/* ◇◆ 토글형제동작. ~20180808. MoonYoungshin.
 */
(function(){
	$('#location1 a').on('click', function(){
		$(this).siblings('.on').triggerHandler('click'); // 토글 열린거 닫음.
	});
}());
/*]]>*/</script>


<!-- lnb1d1~lnb1d3 [JS] 키보드 운용 적합 -->
<!-- ★))@개발자! CMS 만들 때.. IA 에 알맞게 1~3차 메뉴 가져오세요. -->
<!-- lnb1d1 -->
<div id="lnb1d1" class="clearfix">
	<strong class="h1 blind">1차메뉴</strong>
	<div class="d1"><div class="bg"></div>
	<ul>
	<li class="m1"><a <%=mAnchor[1][0][0][0]%>><span class="t1"><%=mTitle[1][0][0][0]%></span></a></li>
	<li class="m2"><a <%=mAnchor[2][0][0][0]%>><span class="t1"><%=mTitle[2][0][0][0]%></span></a></li>
	<li class="m3"><a <%=mAnchor[3][0][0][0]%>><span class="t1"><%=mTitle[3][0][0][0]%></span></a></li>
	<li class="m4"><a <%=mAnchor[4][0][0][0]%>><span class="t1"><%=mTitle[4][0][0][0]%></span></a></li>
	<li class="m5"><a <%=mAnchor[5][0][0][0]%>><span class="t1"><%=mTitle[5][0][0][0]%></span></a></li>
	<li class="m6"><a <%=mAnchor[6][0][0][0]%>><span class="t1"><%=mTitle[6][0][0][0]%></span></a></li>
	</ul>
	</div>
</div>
<!-- /lnb1d1 -->
<!-- lnb1d2 -->
<div id="lnb1d2" class="clearfix">
	<strong class="h1 blind">2차메뉴</strong>
	<div class="d2"><div class="bg"></div>
	<ul>
	<%
	for(int i = 1; i < d2Max; i++){
		if(mAll[d1n][i][0][0]==null) continue;
		if( i == d2n ){
	%>	
			<li class="m<%=i%> on"><a <%=mAnchor[d1n][i][0][0]%>><span class="t1"><%=mTitle[d1n][i][0][0]%></span></a></li>
	<%	}else{%>
			<li class="m<%=i%>"><a <%=mAnchor[d1n][i][0][0]%>><span class="t1"><%=mTitle[d1n][i][0][0]%></span></a></li>
	<%	}
	}
	%>
	</ul>
	</div>
</div>
<!-- /lnb1d2 -->
<!-- lnb1d3 -->
<div id="lnb1d3" class="clearfix">
	<strong class="h1 blind">3차메뉴</strong>
	<div class="d3"><div class="bg"></div>
	<ul>
	<%
	for(int i = 1; i < d3Max; i++){
		if(mAll[d1n][d2n][i][0]==null) continue;
		if( i == d3n ){
	%>	
			<li class="m<%=i%> on"><a <%=mAnchor[d1n][d2n][i][0]%>><span class="t1"><%=mTitle[d1n][d2n][i][0]%></span></a></li>
	<%	}else{%>
			<li class="m<%=i%>"><a <%=mAnchor[d1n][d2n][i][0]%>><span class="t1"><%=mTitle[d1n][d2n][i][0]%></span></a></li>
	<%	}
	}
	%>
	</ul>
	</div>
</div>
<!-- /lnb1d3 -->

<%//if(d4n!=0){ // 4차라면%>
<!-- lnb1d4 -->
<div id="lnb1d4" class="clearfix">
	<strong class="h1 blind">4차메뉴</strong>
	<div class="d4"><div class="bg"></div>
	<ul>
	<%
	for(int i = 1; i < d4Max; i++){
		if(mAll[d1n][d2n][d3n][i]==null) continue;
		if( i == d4n ){
	%>	
			<li class="m<%=i%> on"><a <%=mAnchor[d1n][d2n][d3n][i]%>><span class="t1"><%=mTitle[d1n][d2n][d3n][i]%></span></a></li>
	<%	}else{%>
			<li class="m<%=i%>"><a <%=mAnchor[d1n][d2n][d3n][i]%>><span class="t1"><%=mTitle[d1n][d2n][d3n][i]%></span></a></li>
	<%	}
	}
	%>
	</ul>
	</div>
</div>
<!-- /lnb1d4 -->
<%//} // 4차라면%>

<script>/*<![CDATA[*/

(function(){
	addOnNav(); // 1차 활성 위해
}());

/* ◇◆ 현재위치펼침메뉴.이동. 20160303. 20161028. 20190121. MoonYoungshin.
 */
(function(){
	$('#lnb1d1').insertAfter('#location1 a[href="#lnb1d1"]');
	$('#lnb1d2').insertAfter('#location1 a[href="#lnb1d2"]');
	$('#lnb1d3').insertAfter('#location1 a[href="#lnb1d3"]');
	$('#lnb1d4').insertAfter('#location1 a[href="#lnb1d4"]');
}());

/* ◇◆ 현재위치펼침메뉴.좌위치..고도화. 20151126. 20180809. 20190122. MoonYoungshin.
 */
(function(){
	var timer = setTimeout(function(){}, 0);
	var v = {
		lnb1w: 180, // lnb1 width (펼침메뉴 폭)
		ol: 1, // offset left (.sep(분리장식) width)
		ow: 70 // offset width
	};

	// 펼침메뉴 폭 계산
	function calLnb1Width(selector){
		$this = selector;
		v.lnb1w = ( $this.width() > ($this.prev().outerWidth() + v.ow) )? $this.width() : $this.prev().outerWidth() + v.ow;
		//console.log($this.width()  +'  '+  $this.prev().outerWidth());
		return v.lnb1w + 'px';
	}

	$(window).on('load resize', function(){
		// 초기화!! 2단))1단
		$('#lnb1d3').css({'width': 'auto'});
		$('#lnb1d3>.d3>ul>li').css({
			'float': 'none',
			'width': 'auto',
			'margin-left': '0',
			'border-left': '0'
		});
		clearTimeout(timer);
		timer = setTimeout(function(){
			// width, margin-left 고도화 // 20190122. 화면폭 medium, large, xlarge 이면
			if( $('html').is('.width-medium') || $('html').is('.width-large') || $('html').is('.width-xlarge')  ){
				$('[id^="lnb1d"]').css({
					'width': 'auto'
				});
				// 20151124. 에러방지
				if(!!$('#location1 a[href="#lnb1d1"]').length){
					$('#lnb1d1').css({
						'width': function(){ return calLnb1Width($(this)); },
						'margin-left': ($('#location1 a[href="#lnb1d1"]').position().left - v.ol) + 'px'
					});
				}
				if(!!$('#location1 a[href="#lnb1d2"]').length){
					$('#lnb1d2').css({
						'width': function(){ return calLnb1Width($(this)); },
						'margin-left': ($('#location1 a[href="#lnb1d2"]').position().left - v.ol) + 'px'
					});
				}
				if(!!$('#location1 a[href="#lnb1d3"]').length){
					$('#lnb1d3').css({
						'width': function(){ return calLnb1Width($(this)); },
						'margin-left': ($('#location1 a[href="#lnb1d3"]').position().left - v.ol) + 'px'
					});
				}
				if(!!$('#location1 a[href="#lnb1d4"]').length){
					$('#lnb1d4').css({
						'width': function(){ return calLnb1Width($(this)); },
						'margin-left': ($('#location1 a[href="#lnb1d4"]').position().left - v.ol) + 'px'
					});
				}
			}else{ // (모바일, 태블릿, ..) 초대형 화면 아니면..
				$('[id^="lnb1d"]').css({
					'width': $('body').width() + 'px', //
					'margin-left': '0'
				});
			}
			// 형제메뉴 많으면 2단 배치
			if($('#lnb1d3>.d3>ul>li').length > 13){
				if($('html').hasClass('width-xlarge')){
					$('#lnb1d3').css({'width': ( $('#lnb1d3').width() * 2 ) + 'px' });
				}
				$('#lnb1d3>.d3>ul>li').css({
					'float': 'left',
					'width': '50%',
					'margin-left': '-1px',
					'border-left': '1px solid #ddd'
				});
			}
		}, 50);
	});
}());

/*]]>*/</script>