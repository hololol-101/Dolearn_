<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210201 | @m | 요구반영. 결함개선. 고도화.
 * ~20210203 | @m |
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
    <div id="cp1tabs1" class="cp1tabs1 mgt1em mgb2em">
        <ul>
        <li class="m1 column"><a href="#cp1tabs1pane1"><span class="t1">일반회원</span><i class="ic1"></i></a></li>
        <li class="m2 column"><a href="#cp1tabs1pane2"><span class="t1">유튜브회원</span><i class="ic1"></i></a></li>
        </ul>
    </div>
    <!-- /cp1tabs1 -->


    <!-- cp1tabs1cont -->
    <div id="cp1tabs1cont" class="cp1tabs1cont">
    <!-- cp1tabs1pane -->
    <div id="cp1tabs1pane1" class="cp1tabs1pane">


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
        <form action="?#">
            {{-- post 방식으로 form data 넘길 때 csrf token 필수 --}}
            @csrf
            <fieldset>
                <legend class="blind"><strong class="h1">일반회원 회원가입</strong></legend>

                <input type="text" value="" placeholder="이메일주소" title="이메일" class="w100" />
                <input type="password" value="" placeholder="비밀번호 (8자 이상)" title="비밀번호" class="w100" />
                <input type="password" value="" placeholder="비밀번호 확인" title="비밀번호 확인" class="w100 ic1check1" />
                <input type="text" value="" placeholder="닉네임 (2자 이상)" title="닉네임" class="w100" />

                <!-- cp1interest1 -->
                <div class="cp1interest1 s1"><!-- 일반회원용 s1 -->
                    <div class="tg1">
                        <span class="t1">꼭 맞는 강좌를 추천해드릴께요 !</span>
                        <div class="t2">
                            관심사를 모두 선택해주세요.<br />
                            가입 후, 프로필 설정에서도 수정이 가능해요.<br />
                        </div>
                    </div>
                    <ul class="mls">
                        <li class="m m1"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">웹개발</span></a></li>
                        <li class="m m2"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">모바일개발</span></a></li>
                        <li class="m m3"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">프로그래밍</span></a></li>
                        <li class="m m4"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">데이터분석</span></a></li>
                        <li class="m m5"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">인공지능</span></a></li>
                        <li class="m m6"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">경영</span></a></li>
                        <li class="m m7"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">법률</span></a></li>
                        <li class="m m8"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">유아교육</span></a></li>
                    </ul>
                </div>
                <!-- /cp1interest1 -->
                <script>/*<![CDATA[*/
                    /** ◇◆ 클래스on활성비활성. 20210202. @m.
                        */
                    $('.cp1join1 .cp1interest1.s1 .m').on('click', function(e){
                        e.preventDefault();
                        $(this).toggleClass('on');
                    });
                /*]]>*/</script>

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

                <button type="submit" class="button submit block">회원가입</button>
            </fieldset>
        </form>
        <!-- /form -->


    </div>
    <!-- /cp1tabs1pane -->
    <!-- cp1tabs1pane -->
    <div id="cp1tabs1pane2" class="cp1tabs1pane">

        <!-- cp1interest1 -->
        <div class="cp1interest1 s2"><!-- 유튜브회원용 s2 -->
            <div class="tg1">
                <span class="t1">꼭 맞는 강좌를 추천해드릴께요 !</span>
                <div class="t2">
                    관심사를 모두 선택해주세요.<br />
                    가입 후, 프로필 설정에서도 수정이 가능해요.<br />
                </div>
            </div>
            <ul class="mls">
                <li class="m m1"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">웹개발</span></a></li>
                <li class="m m2"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">모바일개발</span></a></li>
                <li class="m m3"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">프로그래밍</span></a></li>
                <li class="m m4"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">데이터분석</span></a></li>
                <li class="m m5"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">인공지능</span></a></li>
                <li class="m m6"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">경영</span></a></li>
                <li class="m m7"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">법률</span></a></li>
                <li class="m m8"><a href="#?" class="a1"><i class="ic1"></i><span class="t1">유아교육</span></a></li>
            </ul>
        </div>
        <!-- /cp1interest1 -->
        <script>/*<![CDATA[*/
            /** ◇◆ 클래스on활성비활성. 20210202. @m.
                */
            $('.cp1join1 .cp1interest1.s2 .m').on('click', function(e){
                e.preventDefault();
                $(this).toggleClass('on');
            });
        /*]]>*/</script>


        <a href="?#" target="_blank" rel="noopener" title="새 창" class="button primary block">유튜브 채널 인증하기</a>


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
<!-- /cp1join1 -->


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection

@section('script')

@endsection
