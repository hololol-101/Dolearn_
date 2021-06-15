<%@page language="java" contentType="text/html; charset=utf-8"%>
<%--
/**
 * Template
 * 2021.04.27 | @m | 최초 등록
 * 2021.04.30 | @m | 요구반영. 결함개선. 고도화.
 */
--%>
<!-- html_head -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="<%=siteName%>" />
<meta name="keywords" content="<%=metaKeywords%>" />
<meta name="description" content="<%=metaKeywords%>" />
<title><%=titleTag%></title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/css/font.css" />
<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/css/base.css" /><!-- Do not edit! -->
<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/vendor/animate.min.css" />
<%if(pageType != null && !pageType.equals("") && !pageType.equals("popup")){ // MainPage, SubPages
	%>	<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/css/all.css" />
	<%if(d1n==0){ // MainPage
	%>	<link rel="stylesheet" type="text/css" href="<%=sitePath%>/share/css/style.css" /><!-- ◆ 개별 -->
		<link rel="stylesheet" type="text/css" href="<%=sitePath%>/share/css/main.css" /><!-- ◆ 개별 -->
	<%}else{ // SubPages
	%>	
		<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/css/sub.css" />
		<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/css/lib.css" />
		<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/css/lib1cp1.css" /><!-- /tp/ or /tp1/ ☆BBS+ -->
		<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/css/lib2.css" /><!-- /lib2/ -->
		<link rel="stylesheet" type="text/css" href="<%=sitePath%>/share/css/style.css" /><!-- ◆ 개별 -->
		<link rel="stylesheet" type="text/css" href="<%=sitePath%>/share/css/content.css" /><!-- ◆ 개별 -->
	<%}
}else{ // PopupPages
%>	<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/css/lib.css" />
	<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/css/lib1cp1.css" />
	<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/css/lib2.css" />
	<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/css/popup.css" />
<%}%>
<script src="<%=commonPath%>/share/js/hammer.min.js"></script><!-- [IE9+] -->
<script src="<%=commonPath%>/share/js/iscroll-min.js"></script>
<script src="<%=commonPath%>/share/js/jquery-3.4.1.min.js"></script>
<script src="<%=commonPath%>/share/js/jquery.easing.1.3.js"></script>
<!-- Do not edit! -->
<script src="<%=commonPath%>/share/js/script_base.js"></script>
<script src="<%=commonPath%>/share/js/script_scroll1section1.js"></script>
<!-- /Do not edit! -->
<!-- OwlCarousel2 -->
<link rel="stylesheet" type="text/css" href="<%=commonPath%>/share/vendor/OwlCarousel2/owl.carousel.min.css" />
<script src="<%=commonPath%>/share/vendor/OwlCarousel2/owl.carousel.min.js"></script>
<!-- 실행호출 -->
<script src="<%=commonPath%>/share/js/script.js"></script>
<!-- /html_head -->