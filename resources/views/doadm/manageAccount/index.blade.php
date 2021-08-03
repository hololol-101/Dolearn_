@extends('layouts.doadm.doadm_layout') // 레이아웃을 사용함.

@section('content')

<div class="width1s2">

<!-- infomenu1 -->
<div class="infomenu1">

<!-- search1select1 -->
<div class="search1select1">
    <form id="f1s1s1" action="{{ route('serviceinquiry.manageAccount.index') }}" method="POST">
        @csrf
        <fieldset><legend class="blind">게시물 검색</legend>
        <select id="f1s1s1select1" name="type" title="선택옵션1" class="select1">
            <option value="all">전체</option>
            <option value="student">학생</option>
            <option value="instructor">강사</option>
            <option value="youtuber">유튜버</option>
        </select>
        <input type="text" id="f1s1s1text1" name="search" value="" title="검색어" placeholder="이메일 or 닉네임" class="text1">
        <button type="submit" class="button submit search"><i class="ic1"></i><span class="t1">검색</span></button>
    </fieldset>
    </form>
</div>
<!-- /search1select1 -->

<div class="left">
    {{-- <div class="info1">
            총 <b class="em">{{ $totalCount }}</b>건의 자료가 있습니다.
        <span class="dpib">(<b class="em">{{ $pageNum }}</b>/{{ $pageIndex['totalPage'] }} 페이지)</span>
    </div> --}}
</div>
<div class="right">
    <!-- 필터메뉴 -->
</div>

</div>
<!-- /infomenu1 -->

<!-- list2table1 -->
<div class="list2table1">
    <table class="t1 w100 tttac ttvam fsxd lhD">
        <caption>
            <strong class="h1 blind">★○○ 게시물 목록</strong>
            <span class="summary1 blind">: 번호, 제목, 작성자, 작성일, 첨부, 조회</span>
        </caption>
        <thead>
        <tr>
        <th scope="col" style="width:auto; text-align=left;">번호</th>
        <th scope="col" style="width:auto; text-align=left;">이메일</th>
        <th scope="col" style="width:auto;">닉네임</th>
        <th scope="col" style="width:auto;">회원유형</th>
        <th scope="col" style="width:auto;">상태</th>

    </tr>
        </thead>
        <tbody>
        @foreach($userList as $user)
        <tr>
        <td>{{ $user->id }}</td>
        <td style="text-align=center;">

            <a href="{{ route('serviceinquiry.manageAccount.detail', ['id'=>$user->id]) }}">
                {{ $user->email }}
            </a>
        </td>
        <td style="text-align=center;">{{ $user->nickname }} </td>
        <td style="text-align=center;">
            @if($user->role =="student")
                학생
            @elseif ($user->role =="instructor")
                강사
            @elseif ($user->role=="youtuber")
                유튜버
            @endif
            </td>
        <td style="text-align=center;">
            @if($user->status=="ready")
                일반
            @elseif ($user->status=="active")
                활동중
            @elseif ($user->status=="stop")
                정지
            @elseif ($user->status=="withdraw")
                탈퇴
            @endif </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<!-- /list2table1 -->


<!-- infomenu1 -->
<div class="infomenu1">

    <!-- pagination -->
    {{-- {!! $pageIndex['htmlCode'] !!} --}}
    <!-- /pagination -->

    <p class="left">
        <a href="?" onclick="history.go(-1); return false;" class="button default">이전</a>
    </p>
    <p class="right">
        <a href="{{ route('serviceinquiry.faq.create') }}" class="button">글작성</a>
    </p>

</div>
<!-- /infomenu1 -->


</div>

@endsection
