@php
/**
 * SubPage Template
 * 20210521 | @m | 최초 등록
 * 20210521 | @m | 요구반영. 결함개선. 고도화.
 */
@endphp
<html lang="ko">
<head>
@include('layouts.doadm.inc.html_head')
</head>
<body>
@include('layouts.doadm.inc.sub_header')
<!-- #body_content -->
<div id="body_content">
<!-- container_main -->
<div class="container_main clearfix_main">

@yield('content')

</div>
<!-- /container -->
</div>
<!-- /#body_content -->
@include('layouts.doadm.inc.sub_footer')
</body>
</html>