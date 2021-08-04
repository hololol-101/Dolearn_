@extends('layouts.doadm.doadm_layout') // 레이아웃을 사용함.

@section('content')

<!-- width1s2 -->
<div class="width1s2">


<!-- bbs1view1 -->
<div class="bbs1view1">
    <form method="POST" action="{{ route('admin.manageAccount.detail') }}">
        @csrf
        <h1 class="h1"> 사용자 정보 수정</h1>
        <table class="t1 w100 tttac ttvam fsxd lhD">
            <caption>
                <strong class="h1 blind">★○○ 게시물 목록</strong>
                <span class="summary1 blind">: 번호, 제목, 작성자, 작성일, 첨부, 조회</span>
            </caption>
            <tbody>
                <input type="hidden" name="id" value="{{ $userInfo->id }}">
            <tr>
                <td>이메알</td>
                <td style="text-align=center;">
                    <input type="text" name="email" value = "{{ $userInfo->email }}" style="width: 100%;">
                </td>

            </tr>
            <tr>
                <td>비밀번호</td>
                <td style="text-align=center;">
                    <input type="password" name="password"  value = "" placeholder="최소 8자리 이상 입력해주세요. 입력하지 않을 경우 비밀번호 변경 안됩니다." style="width: 100%;">
                </td>

            </tr>

            <tr>
                <td>닉네임</td>
                <td style="text-align=center;">
                    <input type="text" name="nickname"  value = "{{ $userInfo->nickname }}" style="width: 100%;">
                </td>

            </tr>
            <tr>
                <td>회원유형</td>
                <td style="text-align=center; ">
                    <select id="f1s1s1select1" name="type" title="선택옵션1" class="select1" style="width: 100%;">
                        <option value="student">학생</option>
                        <option value="instructor">강사</option>
                        <option value="youtuber">유튜버</option>
                    </select>
                    <script>
                        @if($userInfo->role =="student")
                            $('#f1s1s1select1').val('student').attr('selected', 'true');
                        @elseif ($userInfo->role =="instructor")
                            $('#f1s1s1select1').val('instructor').attr('selected', 'true');
                        @elseif ($userInfo->role=="youtuber")
                            $('#f1s1s1select1').val('youtuber').attr('selected', 'true');
                        @endif
                    </script>
                    </td>
            </tr>
            <tr>
                <td>상태</td>
                <td style="text-align=center;">
                    <select id="f1s1s1select2" name="status" title="선택옵션1" class="select1" style="width: 100%;">
                        <option value="ready">일반</option>
                        <option value="active">활동중</option>
                        <option value="stop">정지</option>
                        <option value="withdraw">탈퇴</option>
                    </select>
                    <script>
                        @if($userInfo->status=="ready")
                            $('#f1s1s1select2').val('ready').attr('selected', 'true');
                        @elseif ($userInfo->status=="active")
                            $('#f1s1s1select2').val('active').attr('selected', 'true');
                        @elseif ($userInfo->status=="stop")
                            $('#f1s1s1select2').val('stop').attr('selected', 'true');
                        @elseif ($userInfo->status=="withdraw")
                            $('#f1s1s1select2').val('withdraw').attr('selected', 'true');
                        @endif
                    </script>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>

        </tbody>
        </table>

        <button type="submit" class="button" style="float: right;">수정</button>

    </form>

<!-- infomenu1 -->
<div class="infomenu1">
<p class="left">
    <a href="?" class="button prev default"><span class="t1">이전</span></a>
    <a href="?" class="button next default"><span class="t1">다음</span></a>
</p>
</div>
<!-- /infomenu1 -->
<script>
    function openNewPage(url){
        window.open(url, "_blank")
    }
</script>

</div>
<!-- /width1s2 -->

@endsection
