<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210324 | @m | 요구반영. 결함개선. 고도화.
 * ~20210324 | @m |
 */
-->
@extends('master_sub')

@section('title', '강사계정 신청하기')

@section('content')

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


<h2 class="hb1 h2">
	강사계정 신청하기
</h2>


<form id="form1item1" enctype="multipart/form-data">
    @csrf
<!-- 폼아이템들(.cp1form1item1) -->
	<div class="cp1form1item1">
		<div class="dt">
			<label for="★1text0" class="tt1">두런 계정</label>
		</div>
		<div class="dd">
			{{-- TODO: session 에서 user id 가져옴. 해당 값 변경 불가 --}}
			<input type="text" id="{★1text0}" value="{{ Auth::user()->email }}" placeholder="dolearn@dolearn.co.kr" class="w100 bdct bgct" name="accountEmail" readonly/>
		</div>
	</div>

	<div class="cp1form1item1">
		<div class="dt">
			<label for="★1text1" class="tt1">연락받을 이메일</label>
		</div>
		<div class="dd">
			<input type="text" id="★1text1" value="" placeholder="dolearn@dolearn.co.kr" class="w100 bdct bgct" name="contactEmail"/>
		</div>
	</div>

	<div class="cp1form1item1">
		<div class="dt">
			<label for="★1text2" class="tt1">이름(실명)</label>
		</div>
		<div class="dd">
			<input type="text" id="★1text2" value="" placeholder="실명을 입력해주세요." class="w100 bdct bgct" name="name"/>
		</div>
	</div>

	<div class="cp1form1item1">
		<div class="dt">
			<label for="★1text3" class="tt1">연락처</label>
		</div>
		<div class="dd">
			<input type="text" id="★1text3" value="" placeholder="000-0000-0000" class="w100 bdct bgct" name="celphone"/>
		</div>
	</div>

	<div class="cp1form1item1">
		<div class="dt">
			<span class="tt1 s1">희망 분야</span>
		</div>
		<div class="dd" id="radio">
			<span class="dpib mgr1em">
				<input type="radio" name="★1radio0" id="★1radio0e1" value="IT"/> <label for="★1radio0e1">IT</label>
			</span>
			<span class="dpib mgr1em">
				<input type="radio" name="★1radio0" id="★1radio0e2" value="직무기초"/> <label for="★1radio0e2">직무기초</label>
			</span>
			<span class="dpib mgr1em">
				<input type="radio" name="★1radio0" id="★1radio0e3" value="커리어" /> <label for="★1radio0e3">커리어</label>
			</span>
			<span class="dpib mgr1em">
				<input type="radio" name="★1radio0" id="★1radio0e4" value="업무스킬"/> <label for="★1radio0e4">업무스킬</label>
			</span>
			<span class="dpib mgr1em">
				<input type="radio" name="★1radio0" id="★1radio0e5" value="취미"/> <label for="★1radio0e5">취미</label>
			</span>
			<span class="dpib mgr1em">
				<input type="radio" name="★1radio0" id="★1radio0e6" value="기타"/> <label for="★1radio0e6">기타</label>
			</span>
		</div>
	</div>

	<div class="cp1form1item1">
		<div class="dt">
			<label for="★1textarea0" class="tt1">자기소개</label>
		</div>
		<div class="dd">
			<textarea id="★1textarea0" rows="5" cols="80" placeholder="나를 소개해 주세요." class="w100 bdct bgct" name="textarea0"></textarea>
		</div>
	</div>

	<div class="cp1form1item1">
		<div class="dt">
			<label for="★1file0" class="tt1">첨부</label>
		</div>
		<div class="dd">
			<input type="file" id="★1file0" title="파일명 또는 URL" class="w100 bdct bgct" name="uploadFile"/>
		</div>
	</div>
	<!-- /폼아이템들(.cp1form1item1) -->
</form>



<div class="clearfix">
	<input type="checkbox" name="★1checkbox0" id="★1checkbox0e0" /> <label for="★1checkbox0e0">개인정보 수집 및 이용 동의</label>
</div>


<!-- infomenu1 -->
<div class="infomenu1">
	<div class="center">
		<button type="submit" class="button submit wide round fsB2" id="submit_btn">제출하기</button>
		<a href="?" class="button secondary round  fsB2">취소하기</a>
	</div>
</div>
<!-- /infomenu1 -->

</div>
<!-- /container -->
</div>
<!-- /#body -->
<script>
    $(document).on("keyup", "#★1text3", function() {
        $(this).val( $(this).val().replace(/[^0-9]/g, "").replace(/(^02|^0505|^1[0-9]{3}|^0[0-9]{2})([0-9]+)?([0-9]{4})$/,"$1-$2-$3").replace("--", "-") ); });

    $('#submit_btn').on("click", function(){
        @if(Auth::user()->role == "instructor"){
            alert("이미 강사 계정입니다.");
        }
        @else{
            var format = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var format2 = /(^02|^0505|^1[0-9]{3}|^0[0-9]{2})-([0-9]+)?-([0-9]{4})$/;

            var radios = $("input[name='★1radio0']:checked");
            var email =$('#★1text1');
            var phone = $('#★1text3');

            if( email.val()==''){
                alert("연락받을 이메일을 입력해주세요."); email.focus();}
            else if(email.val().search(format)==-1){
                alert("이메일 형식이 잘못되었습니다.");
                email.focus();}
            else if($('#★1text2').val()==''){
                alert('이름을 입력해주세요.');
                $('#★1text2').focus();}
            else if(phone.val()==''){
                alert('연락처를 입력해주세요.');
                $(phone).focus();}
            else if(phone.val().search(format2)==-1){
                alert('전화번호 형식이 잘못되었습니다.');
                $(phone).focus();}
            else if(radios.val()==undefined){
                alert("희망 분야를 선택해주세요.");
                $('.dpib mgr1em').focus();}
            else if($('#★1textarea0').val()==''){
                alert('자기소개를 입력해주세요.');
                $('#★1textarea0').focus();}
            else if(!$("input:checked[id='★1checkbox0e0']").is(":checked")){
                alert('개인정보 수집 및 이용 동의를 해주세요.');
                $('#★1checkbox0e0').focus()}
            else{
                //선택한 라디오 버튼 name 지정
                // radios.attr("name", 'radios');

                $('#form1item1').attr("method", "post").attr("action", "{{ route('etc.store_instructor') }}").submit();
            }
        }
        @endif
    })

</script>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>

@endsection
