@extends('layouts.doadm.doadm_layout') // 레이아웃을 사용함.

@section('content')

<!-- width1s2 -->
<div class="width1s2">





<!-- <h1 class="hb1 h1">_BBS1 상세뷰1+SNS공유+소셜댓글</h1> -->


<!-- bbs1view1 -->
<div class="bbs1view1">
<h1 class="h1">{{ $boardView->subject }}</h1>
<!-- info1 -->
<div class="info1">
<dl class="dl1">
<dt class="dt1">작성일</dt>
<dd class="dd1">{{ date('Y.m.d',$boardView->regdate) }}</dd>
<dt class="dt1">작성자</dt>
<dd class="dd1">{{ $boardView->name }}</dd>
<dt class="dt1">공개 여부</dt>
<dd class="dd1"><em class="em1">{{ $boardView->public_yn }}</em></dd>
<!-- <dt class="dt1 show">출처 :</dt>< !-- ☆ 글 보이려면 show 추가 -- >
<dd class="dd1">우주달빛뉴스</dd>
<dt class="dt1">처리</dt>
<dd class="dd1"><em class="em4">완료</em></dd> -->
<dt class="dt1 show">조회 :</dt>
<dd class="dd1">{{ $boardView->views }}</dd>
</dl>
</div>
<!-- /info1 -->
<!-- attach1 -->
<div class="attach1">
<ul>
<li><a href="AbcdeFghijKlmnoPqrstUvwxyZ.zip" class="filename">AbcdeFghijKlmnoPqrstUvwxyZ.zip</a>
<a href="?" target="_blank" title="바로보기 [새 창]" class="b1 download"><i class="ic1"></i> 다운로드</a></li>
<li><a href="AbcdeFghijKlmnoPqrstUvwxyZ.hwp" class="filename">AbcdeFghijKlmnoPqrstUvwxyZ.hwp</a>
<a href="?" target="_blank" title="바로보기 [새 창]" class="b1 quickview"><i class="ic1"></i> 바로보기</a></li>
<li><a href="일이삼사오륙칠팔구십일이삼사오륙칠팔구십.hwp" class="filename">일이삼사오륙칠팔구십일이삼사오륙칠팔구십.hwp</a>
<a href="?" target="_blank" title="바로보기 [새 창]" class="b1 quickview"><i class="ic1"></i> 바로보기</a></li>
<li><a href="AbcdeFghijKlmnoPqrstUvwxyZ.hwp" class="filename">AbcdeFghijKlmnoPqrstUvwxyZ.hwp</a>
<!-- ★변환중…이면 href 속성 제거 -->
<a class="b1 quickview"><i class="ic1"></i> <span class="blind">바로보기</span> 변환중…</a></li>
</ul>
</div>
<!-- /attach1 -->
<!-- substance -->
<div class="substance">

{!! $boardView->content !!}

</div>
<!-- /substance -->

<!-- sns1like1 -->
<!-- <div class="sns1like1"><div class="fr">
<span class="m m1"><b class="t1">페이스북에 담긴 숫자</b> <span class="t2">9999</span></span>
<span class="m m2"><b class="t1">트위터에 담긴 숫자</b> <span class="t2">22</span></span>
<span class="m m3"><b class="t1">구글플러스에 담긴 숫자</b> <span class="t2">0</span></span>
</div></div> -->
<!-- /sns1like1 -->

<!-- sns1like1 ★★ 20180214. iframe 내부 초점표시안되니 변경 필요! 새 창 알림도 안되니 수정 필요! -->
<div class="sns1like1"><div class="fr">
<div class="m facebook">
    <div id="fb-root"></div>
    <div class="fb-share-button" data-href="http://www.namhae.go.kr/news/board/View.do?pageCd=NW0101000000&siteGubun=news&gcode=1131&idx=105899" data-layout="button_count"></div>
    <script>/*<![CDATA[*/
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ko_KR/sdk.js#xfbml=1&appId=253769764636147&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    /*]]>*/</script>
</div>
<div class="m twitter">
    <a href="https://twitter.com/share" class="twitter-share-button" data-via="namhaegun">Tweet</a>
    <script>/*<![CDATA[*/
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
    /*]]>*/</script>
</div>
<div class="m googleplus">
    <div class="g-plus" data-action="share" data-annotation="bubble" data-href="http://www.namhae.go.kr/news/board/View.do?pageCd=NW0101000000&siteGubun=news&gcode=1131&idx=105899"></div>
    <script type="text/javascript" src="https://apis.google.com/js/platform.js" async="async" defer="defer">/*<![CDATA[*/
        {lang: 'ko'}
    /*]]>*/</script>
</div>
</div></div>
<!-- /sns1like1 -->

</div>
<!-- /bbs1view1 -->

@php
/*
<!-- 답변부분

<!-- bbs1view1.reply1 -->
<div class="bbs1view1 reply1">
<h1 class="h1"><i class="ib1"><i class="ic1"></i> [답변]</i> 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</h1>
<!-- info1 -->
<div class="info1">
<dl class="dl1">
<dt class="dt1">작성일</dt>
<dd class="dd1">2015.11.03</dd>
<dt class="dt1">작성자</dt>
<dd class="dd1">해양수산과</dd>
</dl>
</div>
<!-- /info1 -->
<!-- attach1 -->
<div class="attach1">
<ul>
<li><a href="AbcdeFghijKlmnoPqrstUvwxyZ.zip" class="filename">AbcdeFghijKlmnoPqrstUvwxyZ.zip</a>
<a href="?" target="_blank" title="바로보기 [새 창]" class="b1 download"><i class="ic1"></i> 다운로드</a></li>
<li><a href="AbcdeFghijKlmnoPqrstUvwxyZ.hwp" class="filename">AbcdeFghijKlmnoPqrstUvwxyZ.hwp</a>
<a href="?" target="_blank" title="바로보기 [새 창]" class="b1 quickview"><i class="ic1"></i> 바로보기</a></li>
<li><a href="일이삼사오륙칠팔구십일이삼사오륙칠팔구십.hwp" class="filename">일이삼사오륙칠팔구십일이삼사오륙칠팔구십.hwp</a>
<a href="?" target="_blank" title="바로보기 [새 창]" class="b1 quickview"><i class="ic1"></i> 바로보기</a></li>
<li><a href="AbcdeFghijKlmnoPqrstUvwxyZ.hwp" class="filename">AbcdeFghijKlmnoPqrstUvwxyZ.hwp</a>
<!-- ★변환중…이면 href 속성 제거 -->
<a class="b1 quickview"><i class="ic1"></i> <span class="blind">바로보기</span> 변환중…</a></li>
</ul>
</div>
<!-- /attach1 -->
<!-- substance -->

<div class="substance">

일이삼사오륙칠팔구십<br />
<br />
일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십<br />
<br />
일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십<br />
<br />
일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십<br />
<br />
일이삼사오륙칠팔구십<br />

</div>
<!-- /substance -->

</div>
<!-- /bbs1view1.reply1 -->
*/
@endphp

<!-- infomenu1 -->
<div class="infomenu1">
<p class="left">
    <a href="?" class="button prev default"><span class="t1">이전</span></a>
    <a href="?" class="button next default"><span class="t1">다음</span></a>
</p>
<p class="right">
    <a href="/doadm/notice/{{ $boardView->idx }}/edit" class="button">수정</a>
    <a href="/doadm/notice/{{ $boardView->idx }}/reply" class="button">답변</a>
    <a href="/doadm/notice/{{ $boardView->idx }}/delete" class="button">삭제</a>
    <a href="{{ url()->previous() }}" class="button">목록</a>
</p>
</div>
<!-- /infomenu1 -->


<!-- sns1comment1 -->
<div class="sns1comment1">

<!-- comment1write1 -->
<div class="comment1write1">
<h3 class="h1 blind">소셜 댓글 작성</h3>

<div class="login">
<strong class="h2 blind">소셜 로그인:</strong>
<a href="?" class="m1">페이스북 로그인</a>
<a href="?" class="m2">트위터 로그인</a>
<a href="?" class="m3">구글플러스 로그인</a>
<a href="?" class="m4">네이버 블로그 로그인</a><!-- ☆기획 확인 필요하다! -->
</div>
<p class="note">댓글을 작성하시려면 소셜 로그인이 필요합니다.</p>

<!-- help1popover1 -->
<div class="help1popover1">
<a href="#comment1write1help1popover1c" class="b1 toggle">소셜댓글이란?<i class="ic1"></i></a>
<div id="comment1write1help1popover1c" class="help1popover1c"><i class="deco"></i>
페이스북, 트위터, 구글플러스, <br />네이버의 아이디로 로그인 할 수 있으며,<br />
작성한 댓글은 로그인한 SNS에도 등록되는 새로운 소셜 댓글 서비스 입니다.<br />
계정을 선택하시면 로그인/계정인증을 통해 댓글을 남기실 수 있습니다.<br />
<a href="#comment1write1help1popover1c" class="b1 close">닫기<i class="ic1"></i></a>
</div>
</div>
<!-- /help1popover1 -->

<!-- comment1form1 -->
<div class="comment1form1">
<form action="?">
<fieldset>
<legend class="blind"><strong class="h1">댓글 작성 폼</strong></legend>
<label for="sns1comment1form1e0" class="blind">의견</label>
<textarea cols="80" rows="4" id="sns1comment1form1e0" class="textarea"></textarea>
<input type="submit" value="댓글쓰기" class="button submit block secondary" />
</fieldset>
</form>
</div>
<!-- /comment1form1 -->

</div>
<!-- /comment1write1 -->

<!-- comment1list1 -->
<div class="comment1list1">
<h3 class="h1 blind">소셜 댓글 목록</h3>
<p class="note">총 <b>2</b>개의 댓자료가 있습니다.</p>
<!-- lst1 -->
<ol class="lst1">
<li class="li1"><span class="pic"><img src="/img/lib/sns1comment1noimg.png" width="70" height="70" alt="등록된 이미지 없음" /></span>
    <div class="text">
        <cite class="name"><a href="?">일이삼사오륙칠팔구십</a></cite>
        <small class="time"><i class="ic1"></i>2014.06.09 오후 5:42</small>
        <div class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</div>
    </div>
</li>
<li class="li1"><span class="pic"><img src="//www.iacts.co.kr/+m/_lib/_img.ex/teddy-424630_100.jpg" width="70" height="70" alt="★대체텍스트" /></span>
    <div class="text">
        <cite class="name"><a href="?">noname Jo</a></cite>
        <small class="time"><i class="ic1"></i>2014.06.09 오후 5:42</small>
        <div class="t1">해당 페이지에 대해 작성된 댓글 내용이 보여집니다. 해당 페이지에 대해 작성된 댓글 내용이 보여집니다. 해당 페이지에 대해 작성된 댓글내용이 보여집니다. 해당 페이지에 대해 작성된 댓글 내용이 보여집니다.</div>
    </div>
</li>
<li class="li1"><span class="pic"><img src="//www.iacts.co.kr/+m/_lib/_img.ex/baby-501630_100.jpg" width="70" height="70" alt="★대체텍스트" /></span>
    <div class="text">
        <cite class="name"><a href="?">우리사랑</a></cite>
        <small class="time"><i class="ic1"></i>2014.06.07 오전 7:03</small>
        <div class="t1">해당 페이지에 대해 작성된 댓글 내용이 보여집니다. 해당 페이지에 대해 작성된 댓글 내용이 보여집니다. 해당 페이지에 대해 작성된 댓글내용이 보여집니다. 해당 페이지에 대해 작성된 댓글 내용이 보여집니다. 해당 페이지에 대해 작성된 댓글 내용이 보여집니다. 해당 페이지에 대해 작성된 댓글 내용이 보여집니다. 해당 페이지에 대해 작성된 댓글 내용이 보여집니다. 해당 페이지에 대해 작성된 댓글 내용이 보여집니다.</div>
    </div>
</li>
</ol>
<!-- /lst1 -->

<!-- infomenu1 -->
<div class="infomenu1">

    <!-- pagination -->
    <div class="pagination" title="페이지 수 매기기">
        <span class="control">
            <span class="m first"><a title="처음 페이지"><i class="ic">처음</i></a></span>
            <span class="m prev"><a title="이전 페이지"><i class="ic">이전</i></a></span>
        </span>
        <span class="pages">
            <span class="m on"><a title="현재 1 페이지">1</a></span>
            <span class="m"><a href="?" title="2 페이지">2</a></span>
            <span class="m"><a href="?" title="3 페이지">3</a></span>
            <span class="m"><a href="?" title="4 페이지">4</a></span>
            <span class="m"><a href="?" title="5 페이지">5</a></span>
            <span class="m"><a href="?" title="6 페이지">6</a></span>
            <span class="m"><a href="?" title="7 페이지">7</a></span>
            <span class="m"><a href="?" title="8 페이지">8</a></span>
            <span class="m"><a href="?" title="9 페이지">9</a></span>
            <span class="m"><a href="?" title="10 페이지">10</a></span>
        </span>
        <span class="control">
            <span class="m next"><a href="?" title="다음 페이지"><i class="ic">다음</i></a></span>
            <span class="m last"><a href="?" title="마지막 페이지"><i class="ic">마지막</i></a></span>
        </span>
    </div>
    <!-- /pagination -->

    <div class="right">
        <!-- 여기에 버튼 -->
    </div>

</div>
<!-- /infomenu1 -->

</div>
<!-- /comment1list1 -->

</div>
<!-- /sns1comment1 -->

</div>
<!-- /width1s2 -->

@endsection
