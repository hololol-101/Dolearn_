<!DOCTYPE html>
<!--
/**
 * MainPage Template
 * 20201217 | @m | 최초 등록
 * 20201228 | @m | 요구반영. 결함개선. 고도화.
 * ~20210128 | @m |
 */
-->
<html lang="ko">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="DoLearn (두런)" />
<meta name="keywords" content="DoLearn, 두런" />
<meta name="description" content="DoLearn, 두런" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title') | DoLearn</title>

@include('inc.learning.learning_html_head')

</head>
<body>

@include('inc.learning.learning_head')

<!-- #wrap -->
<div id="wrap">
<!-- container -->
<div class="container clearfix">

@yield('content')

</div>
<!-- /container -->
</div>
<!-- /#wrap -->

@include('inc.learning.learning_foot')

@yield('script')
</body>
</html>
