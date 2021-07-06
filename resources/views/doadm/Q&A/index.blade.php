@extends('layouts.doadm.doadm_layout') // 레이아웃을 사용함.

@section('content')

<div class="width1s2">

<!-- infomenu1 -->
<div class="infomenu1">

<!-- search1select1 -->
<div class="search1select1">
    <form id="f1s1s1" action="?#★">
    <fieldset><legend class="blind">게시물 검색</legend>
        <select id="f1s1s1select1" title="선택옵션1" class="select1">
            <option value="">제목+내용</option>
            <option value="">작성자</option>
            <option value="">제목</option>
            <option value="">내용</option>
        </select>
        <input type="text" id="f1s1s1text1" value="" title="검색어" class="text1">
        <button type="submit" class="button submit search"><i class="ic1"></i><span class="t1">검색</span></button>
    </fieldset>
    </form>
</div>
<!-- /search1select1 -->

<div class="left">
    <div class="info1">
        총 <b class="em">{{ $pageIndex['totalRecord'] }}</b>건의 자료가 있습니다.
        <span class="dpib">(<b class="em">{{ $pageIndex['currentPage'] }}</b>/{{ $pageIndex['totalPage'] }} 페이지)</span>
    </div>
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
        <th scope="col" style="width:auto;">번호</th>
        <th scope="col" style="width:4em;">문의</th>
        <th scope="col" style="width:50%;">제목</th>
        <th scope="col" style="width:4em;">작성자</th>
        <th scope="col" style="width:6em;">작성일</th>
        <th scope="col" style="width:auto;">첨부</th>
        </tr>
        </thead>
        <tbody>
        @foreach($qalist as $qaInfo)
        <tr>
        <td>{{ $qaInfo->idx }}</td>
        @if ($qaInfo->status=="active")
        <td>대기중</td>
        @else
        <td>답변완료</td>
        @endif

        <td class="tal">
        {{-- @if  ($qaInfo->depth > 0)
            @for($k=1;$k<$qaInfo->depth;$k++)
                &nbsp;&nbsp;
            @endfor
            <i>└</i>
        @endif --}}
        <a href="{{route('serviceinquiry.qa_detail',['idx'=>$qaInfo->idx])  }}">{{ $qaInfo->question_title }}</a>
        </td>
        <td>{{ $qaInfo->nickname }}</td>
        <td>{{ date('Y.m.d',strtotime($qaInfo->question_writed_at)) }}</td>
        <td>
            <a href="filename.zip"><img src="/_res/A/img/board/icon/ic16_zip.png" width="16" height="16" alt="zip 파일 첨부"></a>
            <a href="filename.zip"><img src="/_res/A/img/board/icon/ic16_file.png" width="16" height="16" alt="파일 첨부"></a>
            <a href="filename.odf"><img src="/_res/A/img/board/icon/ic16_file.png" width="16" height="16" alt="파일 첨부"></a>
        </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<!-- /list2table1 -->


<!-- infomenu1 -->
<div class="infomenu1">

    <!-- pagination -->
    {!! $pageIndex['htmlCode'] !!}
    <!-- /pagination -->

    <p class="left">
        <a href="?" onclick="history.go(-1); return false;" class="button default">이전</a>
    </p>

</div>
<!-- /infomenu1 -->


</div>

@endsection
