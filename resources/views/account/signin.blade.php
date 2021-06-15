<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210201 | @m | 요구반영. 결함개선. 고도화.
 * ~20210202 | @m |
 * 20210331 | @m | 요구반영
 */
-->
@extends('master_sub')

@section('title', '로그인')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

<!-- (레이어팝업) -->
<a href="#layer1login1" class="toggle" data-send-focus="that" type="hidden"></a>
@include('account.inc_layer_login')

<!-- (레이어팝업) -->
<script>/*<![CDATA[*/
$(function(){
    if ("{{ $popup }}"=="1"){
        $('[href="#layer1login1"]').triggerHandler('click');
    }
})
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
