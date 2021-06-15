<!-- cp1layer1lightbox1 : 레이어박스  -->
<div class="cp1layer1lightbox1" id="layer1login1">
	<div class="wrap1">
		<!-- lightbox -->
		<div class="lightbox" style="max-width:555px;">
			<div class="wrap2">

				<!-- ★★(로그인) -->
				<div class="hg1">
					<h3 class="h1"><span class="blind">로그인</span></h3>
					<a href="#layer1login1" class="b1 close"><i class="ic1"></i> <span class="blind">로그인 창 닫기</span></a>
				</div>
				<div class="cont">
					<!-- cp1login1 -->
					<div class="cp1login1 cp1width1">


						<!-- cp1tabs1 -->
						<div id="cp1tabs1" class="cp1tabs1 mgt1em mgb2em">
							<ul>
							<li class="m1 column"><a href="#cp1tabs1pane1"><span class="t1">일반회원</span><i class="ic1"></i></a></li>
							<li class="m2 column"><a href="#cp1tabs1pane2"><span class="t1">유튜브회원</span><i class="ic1"></i></a></li>
							</ul>
						</div>
						<!-- /cp1tabs1 -->
						<p class="mgb2em tac cv9 fsS1">
							강사계정은 로그인 후 신청이 가능합니다.
						</p>

                        <!-- cp1tabs1cont -->
						<div id="cp1tabs1cont" class="cp1tabs1cont">
						<!-- cp1tabs1pane -->
						<div id="cp1tabs1pane1" class="cp1tabs1pane">


							<!-- form -->
                            <div>
                                <legend class="blind"><strong class="h1">일반회원 로그인</strong></legend>
                                <input type="text" value="" placeholder="이메일" title="이메일" class="w100" id="txt_email" name="email" />
                                <input type="password" value="" placeholder="비밀번호" title="비밀번호" class="w100" id="pwd_password" name="password"/>

                                <button type="button" class="button submit block" id="btn_submit">로그인</button>

                            </div>
							{{-- <form action="{{ route('account.signin') }}" method = "post" id="normal_login">
                                {{ csrf_field() }}
								<fieldset>
									<legend class="blind"><strong class="h1">일반회원 로그인</strong></legend>
									<input type="text" value="" placeholder="이메일" title="이메일" class="w100" id="txt_email" name="email" />
									<input type="password" value="" placeholder="비밀번호" title="비밀번호" class="w100" id="pwd_password" name="password"/>

                                    <button type="button" class="button submit block" id="btn_submit">로그인</button>
								</fieldset>
							</form> --}}

							<!-- /form -->

							<div class="mns1">
								<a href="{{ route('account.find_password') }}" class="a1">비밀번호 찾기</a>
								<a href="{{ route('account.signup') }}" class="a1">회원가입하기</a>
							</div>

							<!-- cp1sns1  -->
							<div class="cp1sns1">
								<span class="tt1">SNS계정으로 간편 로그인/회원가입</span>
								<a href="#" target="_blank" rel="noopener" title="새 창" class="b2 google"><span class="b2t1">구글 로그인창 이동</span></a>
								<a href="#" target="_blank" rel="noopener" title="새 창" class="b2 kakaotalk"><span class="b2t1">카톡 로그인창 이동</span></a>
								<a href="#" target="_blank" rel="noopener" title="새 창" class="b2 naver"><span class="b2t1">네이버 로그인창 이동</span></a>
							</div>
							<!-- /cp1sns1 -->

						</div>
						<!-- /cp1tabs1pane -->
						<!-- cp1tabs1pane -->
						<div id="cp1tabs1pane2" class="cp1tabs1pane">


							<a href="{{ route('youtube.signin_youtube') }}"  rel="noopener" title="새 창" class="button primary block mgt2em mgb4em">구글로 로그인 하기</a>

							<div class="mns1 mgb4em">
								<a href="{{ route('account.find_password') }}" class="a1">비밀번호 찾기</a>
								<a href="{{ route('account.signup') }}" class="a1">회원가입하기</a>
							</div>


						</div>
						<!-- /cp1tabs1pane -->
						</div>
						<!-- /cp1tabs1cont -->
						<script>/*<![CDATA[*/
							// 20210202.
							makeShow('#cp1tabs1', '#cp1tabs1pane1');
							makeActive('#cp1tabs1', '.m1');
						/*]]>*/</script>

					</div>
					<!-- /cp1login1 -->
				</div>
				<!-- /★★(로그인) -->

			</div>
		</div>
		<!-- /lightbox -->
	</div>
</div>
<script>
$('#btn_submit').on('click', function(e){
    e.preventDefault();
    signin();
});

// 엔터키 입력 이벤트로 주제 추가
$('#pwd_password').keydown(function(key) {
    if (key.keyCode == 13) {
        signin();
    }
});

// 로그인
function signin() {
    var email=$("#txt_email");
    var password=$("#pwd_password");
    //이메일 형식
    var format = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    if(email.val()==""){
        alert("이메일을 입력해주세요.");
        email.focus();
    }
    else if(email.val().search(format)==-1){
        alert("이메일 형식이 잘못되었습니다.");
        email.focus();
    }
    else if(password.val().length<1){
        alert("비밀번호를 입력해주세요.");
        password.focus();
    }
    else{
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: "{{ route('account.signin') }}",
            data: {
                'email': email.val(),
                'password':password.val(),
            },
            success: (response) => {
                if(response.status == "success"){
                    location.reload(true);
                }else if(response.status == "check"){
                    var confirmData = confirm("이미 다른 곳에서 접속중입니다. 다른 기기를 로그아웃 하시겠습니까?");
                    if(confirmData||window.event.keyCode == 13){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            dataType: 'json',
                            url: "{{ route('account.signin') }}",
                            data: {
                                'check': "okay",
                                'email': email.val(),
                                'password':password.val()
                            },
                            success: (response) => {
                                if(response.status == "success")
                                    location.reload(true);
                                    //location.href='{{ route('main') }}';
                            },
                            error: function(response) {
                                console.log(response);
                            }
                        })
                    }

                }
                else{
                    alert("일치하는 회원 정보가 없습니다. 다시 로그인 해 주세요");
                    email.val('');
                    password.val('');
                }
            },
            error: function(response) {
                console.log(response);
            }
        })

    }
}
</script>


<!-- /cp1layer1lightbox1 -->


{{-- <>/*<![CDATA[*/
	/** ◇◆ 온클래스체크박스 | 20210119. @m.
	 */
	//MJS = window.MJS || {};
	(MJS.doOnClassCheckbox = function(selector){
		var my = selector;
		$(document).on('click', my, function(e){ // 미래 객체
			e.preventDefault();
			e.stopPropagation();
			var $cb = $('input[type="checkbox"]', this);
			console.log( $cb.prop('checked') );
			if( $cb.prop('checked') ){
				$cb.prop({'checked':''});
				$(this).removeClass('on');
			}else{
				$cb.prop({'checked':'checked'});
				$(this).addClass('on');
			}
		});
	})('.cp1playlist1 .li1');
/*]]>*/</> --}}
