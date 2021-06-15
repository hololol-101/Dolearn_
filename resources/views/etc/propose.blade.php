<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210324 | @m | 요구반영. 결함개선. 고도화.
 * ~20210324 | @m |
 */
-->

@extends('master_sub')

@section('title', '제안하기')

@section('content')

@php
//instructorID
$userIdx = isset($_GET['user_idx']) ? $_GET['user_idx'] : '';

$image_path = isset($arr['image_path']) ? asset("storage/uploads/profile/")."/".$arr['image_path'] : '';
$name = isset($arr['name']) ? $arr['name'] : '';

@endphp

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1row1 -->
<div class="cp1row1">
	<div class="column1">
		<a href="javascript:void(0);" onclick="history.go(-1); return false;" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
	</div>
	<div class="column2">
	</div>
</div>
<!-- /cp1row1 -->

<!-- cp1row2 -->
<div class="cp1row2 mgt15em mgb2em">
	<div class="column1">
		<h2 class="hb1 h2 mg0 fsB24 font-size-20px-small-only">
			<span class="fw4">{{ $name }}</span><br />
			<span class="cvc fsS2">에게 제안하기</span>
		</h2>
	</div>
	<div class="column2" style="width:20%;max-width:150px;">
        <img
        @if ($image_path){
            src = '{{ $image_path }}';
        }
        $else
            src="{{ asset('assets/images/lib/noimg1face1d800.png') }}"
        @endif
        alt="이미지 없음" class="w100 round" id = "profile_image"/>
	</div>
</div>
<!-- /cp1row2 -->

<form class="cp1form1" method = "POST" enctype="multipart/form-data">
    @csrf
    {{-- valie== userIdx  --}}
    <input type="hidden" value ="{{ $userIdx }}" name = "instructor_id">
    <input type="hidden" value="{{ $name }}" name = "instructor_name" >

<!-- 폼아이템들(.cp1form1item1) -->
<div class="cp1form1item1">
	<div class="dt">
		<span class="tt1 s1">문의 유형</span>
	</div>
	<div class="dd">
		<span class="dpib mgr1em">
			<input type="radio" name="★1radio0" id="★1radio0e1" value="강좌 요청"/> <label for="★1radio0e1">강좌요청</label>
		</span>
		<span class="dpib mgr1em">
			<input type="radio" name="★1radio0" id="★1radio0e2" value="영상 요청"/> <label for="★1radio0e2">영상요청</label>
		</span>
		<span class="dpib mgr1em">
			<input type="radio" name="★1radio0" id="★1radio0e3" value="출강 요청" /> <label for="★1radio0e3">출강요청</label>
		</span>
	</div>
</div>

<div class="cp1form1item1">
	<div class="dt">
		<label for="★1text0" class="tt1">이메일</label>
	</div>
	<div class="dd">
		<input type="text" id="★1text0" value="{{ Auth::user()->email }}" placeholder="이메일을 입력하세요." class="w100 bdct bgct" />
	</div>
</div>

<div class="cp1form1item1">
	<div class="dt">
		<label for="★1textarea0" class="tt1">제안 내용</label>
	</div>
	<div class="dd">
		<textarea id="★1textarea0" rows="5" cols="80" placeholder="제안 내용을 입력하세요." class="w100 bdct bgct"></textarea>
	</div>
</div>

<div class="cp1form1item1">
	<div class="dt">
		<label for="★1file0" class="tt1">첨부</label>
	</div>
	<div class="dd">
		<input type="file" id="★1file0" title="파일명 또는 URL" class="w100 bdct bgct" />
	</div>
</div>

<!-- /폼아이템들(.cp1form1item1) -->


<div class="clearfix">
	<input type="checkbox" id="★1checkbox0e0" name="★1checkbox0"/> <label for="★1checkbox0e0">개인정보 수집 및 이용 동의</label>
</div>


<!-- infomenu1 -->
<div class="infomenu1">
	<div class="center">
		<button id= "sdafdsaf" type="submit" class="button submit wide round fsB2">제안하기</button>
		<a href="?" class="button secondary round  fsB2">취소하기</a>
	</div>
</div>
<!-- /infomenu1 -->

</form>

<script>
$(document).ready(function(){
    let cnt=0;
    $('.cp1form1 :submit').on("click", function(){
        my = $('.cp1form1item1');

        var format = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        radios = $('input[name="★1radio0"]:checked');
        email = $(':text', my);
        content = $('textarea', my);
        check = $('checkbox', my);
        file =$(':file', my);
        console.log(cnt++);
        if(!radios.val()){
            alert("문의 유형을 선택해주세요.");
            return false;
        }
        else if(email.val()==""){
            alert("이메일을 입력해주세요.");
            return false;
        }
        else if(email.val().search(format)==-1){
            alert("이메일 형식이 잘못되었습니다.");
            return false;
        }
        else if(content.val()==""){
            alert("제안내용을 입력해주세요.");
            return false;
        }
        else if(!$('input:checkbox[name = "★1checkbox0"]').is(":checked")){
            alert('개인정보 수집 및 이용 동의를 해주세요.');
            return false;
        }
        else{
            email.attr("name","email");
            content.attr("name", "content");
            file.attr("name", "file");
            $('.cp1form1').submit();
            return false;
        }
        return false;
    })
});

</script>

</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
