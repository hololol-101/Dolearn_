<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210201 | @m | 요구반영. 결함개선. 고도화.
 * ~20210203 | @m |
 */
-->
@extends('master_sub')

@section('title', '비밀번호 재설정')

@section('content')

<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1pw1reset1 -->
<div class="cp1pw1reset1 cp1width1">
	<div class="hg1">
		<h3 class="h1">비밀번호 재설정</h3>
		<i class="ic1"></i>
	</div>
	<div class="cont">
		<div class="tg1">
			가입하셨던 <em class="em">이메일 계정</em>을 입력하시면<br />
			<em class="em">새로운 비밀번호</em>를 이메일로 발송해 드립니다.
			<span class="dpib">비밀번호 변경은 프로필 설정에서 가능합니다.</span>
		</div>
		<!-- form -->
		<form action="#">
		    <fieldset>
                <legend class="blind"><strong class="h1">비밀번호 재설정</strong></legend>
                <input type="text" value="" placeholder="이메일을 입력하세요." title="이메일" class="w100" />
                <button type="submit" class="button submit block">비밀번호 변경</button>
			</fieldset>
		</form>
		<!-- /form -->
	</div>
</div>
<!-- /cp1pw1reset1 -->


</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection
