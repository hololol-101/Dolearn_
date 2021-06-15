<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210210 | @m | 요구반영. 결함개선. 고도화.
 * ~20210210 | @m |
 */
-->
@extends('master_sub')

@section('title', '계정 설정 - 탈퇴하기')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1jumbotron1 -->
<div class="cp1jumbotron1">
	<strong class="tt1">탈퇴하기</strong>
	<i class="ic1 indy ic90face1cry1"></i>
	<div class="tg1">
		<p class="t1">
			두런에서 모든 개인정보와 학습정보가 삭제되며 <b class="dpib em0">되돌릴 수 없습니다.</b><br />
			정말로 탈퇴하시겠어요?<br />
		</p>
	</div>
	<div class="btns">
        <a class="button primary round w20em">두런 탈퇴하기</a>
    </div>
</div>
<!-- /cp1jumbotron1 -->
<script>
    $('.btns .button').on("click", function(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: "{{ route('account.change_status') }}",
            success: (response) => {
                alert("계정삭제가 완료되었습니다.\n메인화면으로 이동합니다.");
                location.href="{{ route('main') }}"
            },
            error: (response)=> {
                console.log(response);
            }
        });
    })
</script>

</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
