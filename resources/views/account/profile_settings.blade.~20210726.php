<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210209 | @m | 요구반영. 결함개선. 고도화.
 * ~20210210~20210217 | @m |
 * 20210407 | @m | 요구반영
 */
-->
@extends('master_sub')

@section('title', '계정 설정 - 프로필 설정')

@section('content')

@php
    $user = Auth::user();
@endphp

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

@include('inc.common.inc_layer_sitemap')

<!-- body_title -->
<div id="body_title">
	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="{{ route('account.profile_settings') }}" class="a1"><i class="t1">계정 설정</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">프로필 설정</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('account.profile_settings') }}">프로필 설정</a></li>
			<li><a href="{{ route('account.notification_settings') }}">알림 설정</a></li>
			</ul>
		</div>
		<!-- /lnb1c -->
	</div>
	<!-- lnb1 -->
	<script>/*<![CDATA[*/
		$(function(){
			/** ◇◆ 목록앵커 클릭하면 활성 메뉴를 제목에 표시. 링크 이동. 20210111. @m
			 */
			(function(){
				var $my = $('#lnb1'),
					$m = $('li>a[href]', $my);
				// 현재활성
				$m.each(function(){
					if( $(this).closest('li').is('.on') ){
						$('.h1 .t1', $my).text( $(this).text() );
					}
				});
				// 클릭
				$m.on('click', function(e){
					//e.preventDefault();
					$('.toggle', $my).triggerHandler('click'); // 토글 닫기
					$('.h1 .t1', $my).text( $(this).text() );
					return; // 링크 이동
				});
			})();
		});
	/*]]>*/</script>

</div>
<!-- /body_title -->


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">

<!-- even-grid -->
<div class="even-grid float-left gap5pct vgap0">
	<div class="small-12 medium-4 column">


		<!-- cp1profile1write1 -->
		<div class="cp1profile1write1">
			<div class="f1">
				<div class="f1p1">
                    <img id ="profile_image" alt="★대체텍스트필수"

                    @if (Auth::user()->save_profile_image){
                        src="{{ asset('storage/uploads/profile/'.Auth::user()->save_profile_image) }}"
                    }
                    @else{
                        src="{{ asset('assets/images/lib/noimg1face1.png') }}"
                    }
                    @endif
                    />
                </div>
			</div>
			<!-- cp1upload1 -->
			<div class="cp1upload1">
				<label for="★1file0" class="label">이미지업로드</label>
                <form method="POST" id="image_form" action="" enctype="multipart/form-data">
                    @csrf
                    <span class="w1file">
                        <input type="file" id="★1file0" name="file" class="file" />
                        <input type="text" value="" title="업로드 파일명" class="file" />
                        <button type="button" class="b1 del">파일 지우기</button>
                    </span>
                </form>
			</div>
			<!-- /cp1upload1 -->
			<div class="fsS2 op05">
				<ul class="bi1 mgt0">
				<li class="li1">최대용량 2MB</li>
				</ul>
			</div>
            <button type="button" class="b2 button submit block large" disabled="disabled">전체 설정 저장하기</button>
        </div>
		<!-- /cp1profile1write1 -->

		<script>/*<![CDATA[*/
			//$(function(){
				/** ◇◆ 이미지업로드 input[type='file'] 고도화. 20210215. 20210218. @m.
				 */
				(function(){
					var $my = $('.cp1upload1'),
						$file = $('[type="file"]', $my),
						$text = $('[type="text"]', $my),
						$del = $('.b1.del', $my);

					// 초기 호출
					isVal();

					// 파일값 동기화
					$file.on('change', function(){
						$text.val( getFileName( $file.val() ) );
						isVal();
					});

					// 파일 지우기
					$del.on('click', function(e){
						e.preventDefault();
						$file.val('').triggerHandler('change'); // triggerHandler() 강제
						$text.val('');
					});

					// 파일명.확장자 만 추출
					function getFileName(v){
						var arr = v.split("\\"); // 로컬경로는 / 아닌 \ 로 분리
						return arr[arr.length-1]; // 배열의 맨 끝이 파일명
					}

					// 파일값 유무 구분
					function isVal(){
						//console.log( !!$file.val() );
						if( !$file.val() ){ // 값 없으면
							$my.addClass('off');
						}else{
							$my.removeClass('off');
						}
					}
				})();
			//});
		/*]]>*/</script>
        <script>
            //이미지 업로드
            $('#★1file0').change( function() {
                    $('#image_form').submit();
            });
            $('#image_form').submit(function(e){
                var $my = $('.cp1upload1'),
                $file = $('[type="file"]', $my),
                $text = $('[type="text"]', $my)

                e.preventDefault();
                var formdata = new FormData(this);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    dataType: 'json',
                    url: "{{ route('account.save_profile_image') }}",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        if (response.status == 'success') {
                            var date = new Date();
                            $('#profile_image').attr('src', response.savePath);

                        } else {
                            alert(response.msg);
                            $file.val('');
                            $text.val('');
                            $('#profile_image').attr('src', "{{ asset('assets/images/lib/noimg2.png') }}");
                            return false;
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                })
            })

        </script>

	</div>
	<div class="small-12 medium-8 column">
    <!-- form -->
    <form  class="form1" enctype="multipart/form-data">
        @csrf
        <fieldset class="mg0">
        <legend class="blind"><strong class="h1">프로필 설정</strong></legend>

		<!-- 폼아이템들 -->
		<div class="form1item1">
			<label for="★1text0" class="tt1">닉네임</label>
            <input type="text" id="★1text0" value="{{ Auth::user()->nickname}}" class="w100 type1 text-name"/>

		</div>

		<div class="form1item1">
			<span class="tt1">자기소개</span>
			<!-- cp1write1 -->
			<div class="cp1write1">
				<div class="editor">
                    <textarea id="textarea01" cols="40" rows="8">{{ $user->introduction }}</textarea>
					<!--<div class="mgt5em mgb5em em tac">개발자 온라인 웹문서 편집기 처리 필요!</div> -->
				</div>
			</div>
			<!-- /cp1write1 -->
			<!--
            <div class="tar">
				<button type="button" class="button primary" >저장하기</button>
			</div> -->
		</div>
		<div class="form1item1">
			<label for="★1text1" class="tt1">이메일</label>
			<span class="vam op06">(이메일 변경 후 재인증 필요)</span>
			<input type="text" id="★1text1" value={{ $user->email }} class="w100 type1 text-email" disabled/>
		</div>
        @if($role=='')
		<div class="form1item1">
			<label for="★1pw1" class="tt1 fl">비밀번호</label>
			<a href="#" class="fr bdb1px">비밀번호를 모르신다면?</a>
			<input type="password" id="★1pw1" value="" placeholder="기존 비밀번호" title="기존 비밀번호" class="w100 type1 text-pw1"/>
			<input type="password" id="★1pw2" value="" placeholder="새 비밀번호" title="새 비밀번호" class="w100 type1 text-pw2" />
			<input type="password" id="★1pw3" value="" placeholder="새 비밀번호 확인" title="새 비밀번호 확인" class="w100 type1 text-pw3" />
		</div>
        @endif
		<!-- /폼아이템들 -->


		<div class="ofh mgt1em mgb1em">
			<a href="{{ route('account.withdraw') }}" class="fr">회원탈퇴 &gt;</a>
		</div>

	</div>
</div>
<!-- /even-grid -->
</fieldset>
</form>
<!-- /form -->

<script>/*<![CDATA[*/

	$(function(){
		(function(){
			var $my = $('.form1'),
				$button = $('.button','.cp1profile1write1'); // 전체 설정 저장하기 버튼
			var fcs = ['.text-name', '.text-email', '.text-pw1', '.text-pw2', '.text-pw3']; // 닉네임, 이메일, 기존 비밀번호, 새 비밀번호, 새 비밀번호 확인 제외

			var $fc0 = $(fcs[0], $my),
				$fc1 = $(fcs[1], $my),
				$fc2 = $(fcs[2], $my),
				$fc3 = $(fcs[3], $my),
				$fc4 = $(fcs[4], $my);



			// 입력 변화
			$my.find( fcs[0] + ', ' + fcs[1] + ', ' + fcs[2] + ', ' + fcs[3] + ', ' + fcs[4] ).on('change keyup paste', function(e){
				e.preventDefault();
				//console.log( $(this).val() );
				chkForm();
			});

			function chkForm(){
                @if($role!='')
                $button.removeAttr('disabled');
                @else
				//if( $fc0.val() && $fc1.val() && $fc2.val() && $fc3.val() && $fc4.val() ){
				if( $fc0.val() && $fc1.val() && $fc2.val() ){ // 새 비밀번호, 새 비밀번호 확인 제외
					$button.removeAttr('disabled');
				}else{
					$button.attr({'disabled': 'disabled'});
				}
                @endif
			}
			chkForm();

		})();

	});
</script>
<script>
    @if($role!='')
    $('.button', $('.cp1profile1write1')).on("click", function(){
        let nickname = $('#★1text0');
        let email = $('#★1text1');
        let data= {
            'nickname':nickname.val(),
            'email':email.val(),
            'textarea01': $('#textarea01').val(),
            'role':'{{ $role }}'
        }
        if(email.val().search(/([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/)==-1){
            alert("이메일 형식이 잘못되었습니다.");
            email.focus();
            return false;
        }
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: "{{ route('account.profile_update_all')}}",
            data: data,
            success: (response) => {
                if(response.msg == 'ExistNick'){
                    alert("이미 해당 닉네임이 존재합니다.");
                    nickname.focus();
                }
                else if(response.msg == 'ExistEmail'){
                    alert("이미 등록된 이메일입니다.");
                    nickname.focus();
                }
                else{
                    //메인 페이지 이동
                    alert("프로필 수정이 완료되었습니다. 메인로 이동합니다.");
                    location.href = "{{ route('main') }}";
                }
            },
            error: (response)=> {
                alert(response.msg);
            }
        });
        return false;
    })
    @else
    $('.button', $('.cp1profile1write1')).on("click", function(){
        let nickname = $('#★1text0');
        let email = $('#★1text1');
        let pwd = $('#★1pw1');
        let newpw= $('#★1pw2');
        let newpwre= $('#★1pw3');
        let data= {
            'nickname':nickname.val(),
            'email':email.val(),
            'password':pwd.val(),
            'textarea01': $('#textarea01').val(),
        }
        if(email.val().search(/([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/)==-1){
            alert("이메일 형식이 잘못되었습니다.");
            email.focus();
            return false;
        }
        if(newpw.val()!=""){
            if(newpw.val().length<8){
                alert("최소 8자의 비밀번호를 입력해주세요.");
                newpw.focus();
                return false;
            }
            if(newpw.val()!=newpwre.val()){
                alert("비밀번호 확인이 다릅니다.");
                newpwre.focus();
                return false;
            }
            else{
                data.newPassword = newpw.val();
            }
        }

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: "{{ route('account.profile_update_all')}}",
            data: data,
            success: (response) => {
                if(response.msg == 'PasswordError'){
                    alert("비밀번호를 잘못입력하셨습니다.");
                    pwd.focus();
                }
                else if(response.msg == 'ExistNick'){
                    alert("이미 해당 닉네임이 존재합니다.");
                    nickname.focus();
                }
                else if(response.msg == 'ExistEmail'){
                    alert("이미 등록된 이메일입니다.");
                    nickname.focus();
                }
                else{
                    //메인 페이지 이동
                    alert("프로필 수정이 완료되었습니다. 메인로 이동합니다.");
                    location.href = "{{ route('main') }}";
                }
            },
            error: (response)=> {
                alert(response.msg);
            }
        });
        return false;
    })
    @endif
</script>



</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
