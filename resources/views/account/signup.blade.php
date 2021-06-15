<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210201 | @m | 요구반영. 결함개선. 고도화.
 * ~20210203 | @m |
 * 20210331 | @m | 요구반영
 */
-->
@extends('master_sub')

@section('title', '회원가입')

@section('content')

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

<!-- cp1join1 -->
<div class="cp1join1 cp1width1">
    <div class="hg1">
        <h3 class="h1">회원가입</h3>
        <i class="ic1"></i>
    </div>

    <!-- cp1tabs1 -->
    <div id="cp1tabs2" class="cp1tabs1 mgt1em mgb2em">
        <ul>
        <li class="m1 column"><a href="#cp1tabs1pane3"><span class="t1">일반회원</span><i class="ic1"></i></a></li>
        <li class="m2 column"><a href="#cp1tabs1pane4"><span class="t1">유튜브회원</span><i class="ic1"></i></a></li>
        </ul>
    </div>
    <!-- /cp1tabs1 -->


    <!-- cp1tabs1cont -->
    <div id="cp1tabs2cont2" class="cp1tabs1cont">
    <!-- cp1tabs1pane -->
    <div id="cp1tabs1pane3" class="cp1tabs1pane">


        <!-- cp1sns1  -->
        <div class="cp1sns1">
            <span class="tt1">SNS계정으로 간편 로그인/회원가입</span>
            <a href="?#" target="_blank" rel="noopener" title="새 창" class="b2 google"><span class="b2t1">구글 로그인창 이동</span></a>
            <a href="?#" target="_blank" rel="noopener" title="새 창" class="b2 kakaotalk"><span class="b2t1">카톡 로그인창 이동</span></a>
            <a href="?#" target="_blank" rel="noopener" title="새 창" class="b2 naver"><span class="b2t1">네이버 로그인창 이동</span></a>
        </div>
        <!-- /cp1sns1 -->

        <hr class="bdt1px bdcfo02 mgt-1em mgb2em" />

        <!-- form -->
        <form action="" id="signupform" method="POST">
            {{-- post 방식으로 form data 넘길 때 csrf token 필수 --}}
            @csrf
            <fieldset>
                <legend class="blind"><strong class="h1">일반회원 회원가입</strong></legend>

                <input type="text" value="" placeholder="이메일주소" title="이메일" class="w100" id="email" name="email" />
                <input type="password" value="" placeholder="비밀번호 (8자 이상)" title="비밀번호" class="w100" id="password" name="password" />
                <input type="password" value="" placeholder="비밀번호 확인" title="비밀번호 확인" class="w100 ic1check1" id="passwordRe"/>
                <input type="text" value="" placeholder="닉네임 (2자 이상)" title="닉네임" class="w100" id="nickname" name="nickname"/>

                <div class="agree">
                    <div class="item all">
                        <input type="checkbox" name="★1checkbox0" id="★1checkbox0e0" /> <label for="★1checkbox0e0">전체 동의</label>
                    </div>
                    <div class="item">
                        <input type="checkbox" name="★1checkbox1" id="★1checkbox1e0" /> <label for="★1checkbox1e0">만 14세 이상입니다. (필수)</label>
                    </div>
                    <div class="item">
                        <input type="checkbox" name="★1checkbox1" id="★1checkbox1e1" /> <label for="★1checkbox1e1">이용약관 (필수)</label>
                    </div>
                    <div class="item">
                        <input type="checkbox" name="★1checkbox1" id="★1checkbox1e2" /> <label for="★1checkbox1e2">개인정보처리방침 (필수)</label>
                    </div>
                    <div class="item">
                        <input type="checkbox" name="★1checkbox1" id="★1checkbox1e3" /> <label for="★1checkbox1e3">이벤트, 프로모션 알림 수신 (선택)</label>
                    </div>
                </div>
                <script>/*<![CDATA[*/
                    /** ◇◆ 전체선택. 20210202. @m.
                        */
                    (function(){
                        var $ck = $('.cp1join1 .agree input:checkbox'),
                            $ack = $('.cp1join1 .agree .all input:checkbox');

                        // 전체 클릭
                        $ack.on('click', function(e){
                            if( $(this).is(':checked') ){
                                $ck.prop('checked', true);
                            }else{
                                $ck.prop('checked', false);
                            }
                        });

                        // 체크박스 클릭
                        $ck.on('click', function(e){
                            if( !$(this).is(':checked') ){
                                $ack.prop('checked', false); // 전체 선택 해제
                            }
                        });

                    })();
                /*]]>*/</script>

                <input type="button" class="button submit block" id="submitblock" value="회원가입">

                <script>
                    $('#submitblock').on('click', function(e){
                        e.preventDefault();

                        var email=$('#email');
                        var password=$('#password');
                        var passwordRe=$('#passwordRe');
                        var nickname=$('#nickname');
                        var checkbox=$('.cp1join1 .agree');

                        //이메일 형식
                        var format = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

                        //이벤트, 프로모션 알림 수신
                        var checkEvent=($("input:checked[id='★1checkbox1e3']").is(":checked") == true ? 'Y':'N');

                        if(email.val()==""){
                            alert("이메일을 입력해주세요.");
                            email.focus();
                        }
                        else if(email.val().search(format)==-1){
                            alert("이메일 형식이 잘못되었습니다.");
                            email.focus();
                        }
                        else if(password.val().length <8){
                            alert("비밀번호를 8자 이상 입력해주세요.");
                            password.focus();
                        }
                        else if(password.val() != passwordRe.val()){
                            alert("비밀번호가 다릅니다.");
                            passwordRe.focus();
                        }
                        else if(nickname.val().length<2){
                            alert("닉네임을 2자 이상 입력해주세요.");
                            nickname.focus();
                        }
                        else if(!$("input:checked[id='★1checkbox1e0']").is(":checked")){
                            alert("만14세 미만은 회원가입이 불가합니다.");
                            $('#★1checkbox1e0').focus();
                        }
                        else if(!$("input:checked[id='★1checkbox1e1']").is(":checked")){
                            alert("이용약관에 동의해주세요.");
                            $('#★1checkbox1e1').focus();
                        }
                        else if(!$("input:checked[id='★1checkbox1e2']").is(":checked")){
                            alert("개인정보처리방침에 동의해주세요.");
                            $('#★1checkbox1e2').focus();
                        }
                        else{
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: 'POST',
                                dataType: 'json',
                                url: "{{ route('account.signup') }}",
                                data: {
                                    'email':email.val(),
                                    'password':password.val(),
                                    'nickname':nickname.val(),
                                    'role':'student',
                                    'event_yn':checkEvent
                                },
                                success: (response) => {
                                    if(response.msg == 'ExistEmail'){
                                        alert("이미 이메일이 존재합니다.");
                                        email.focus();
                                    }
                                    else if(response.msg == 'ExistNick'){
                                        alert("이미 닉네임이 존재합니다.");
                                        nickname.focus();
                                    }
                                    else{
                                        location.href="{{ route('main') }}"
                                    }
                                },
                                error: (response)=> {
                                    console.log(response);
                                }
                            });
                        }

                    });
                </script>
            </fieldset>
        </form>
        <!-- /form -->


    </div>
    <!-- /cp1tabs1pane -->
    <!-- cp1tabs1pane -->
    <div id="cp1tabs1pane4" class="cp1tabs1pane">

        <a href="{{ route('youtube.signup_youtube') }}" rel="noopener" title="새 창" class="button primary block" >유튜브 채널 인증하기</a>

    </div>
    <!-- /cp1tabs1pane -->
    </div>
    <!-- /cp1tabs1cont -->
    <script>/*<![CDATA[*/
        // 20210202.
        makeShow('#cp1tabs2', '#cp1tabs1pane3');
        makeActive('#cp1tabs2', '.m1');
    /*]]>*/</script>


</div>
<!-- /cp1join1 -->


</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection

@section('script')
<script>
$(function() {
    //
});
</script>
@endsection
