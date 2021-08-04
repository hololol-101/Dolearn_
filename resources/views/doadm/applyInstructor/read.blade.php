@extends('layouts.doadm.doadm_layout') // 레이아웃을 사용함.

@section('content')

<!-- width1s2 -->
<div class="width1s2">


<!-- bbs1view1 -->
<div class="bbs1view1">
<h1 class="h1"> {{ $faqlist->title }} </h1>
<!-- info1 -->
<div class="info1">
<dl class="dl1">
<dt class="dt1">작성일</dt>
<dd class="dd1">{{ date('Y.m.d', strtotime($faqlist->writed_at) ) }}</dd>
<dt class="dt1">작성자</dt>
<dd class="dd1">{{ $faqlist->adminname }}</dd>
<dt class="dt1" show>공개 여부</dt>
<dd class="dd1"><em class="em1">{{$faqlist->public_yn }}</em></dd>

</dl>
</div>
<!-- /info1 -->
<!-- attach1 -->
<div class="attach1">
@if ($fileArray[0] !='')
    <ul>

    @foreach ($fileArray as $file )
    <li><a href="javascript:void(0)" class="filename">{{ $file }}</a>
        <a href="{{ route('serviceinquiry.download_attach_file', ['filename'=>$file]) }}" title="바로보기 [새 창]" class="b1 download" )"><i class="ic1"></i> 다운로드</a>
        <a href="javascript:void(0)" title="바로보기 [새 창]" class="b1 quickview" onclick ="openNewPage('{{ asset('storage/uploads/attach/'.$file) }}')"><i class="ic1"></i> 바로보기</a></li>
        <a class="b1 quickview"><i class="ic1"></i> <span class="blind">바로보기</span> 변환중…</a></li>
        </li>

    @endforeach

</ul>
@endif
</div>
<!-- /attach1 -->
<!-- substance -->
<div class="substance">

{!! $faqlist->content !!}

</div>
<!-- /substance -->

</div>
<!-- /bbs1view1 -->

<!-- infomenu1 -->
<div class="infomenu1">
<p class="left">
    <a href="?" class="button prev default"><span class="t1">이전</span></a>
    <a href="?" class="button next default"><span class="t1">다음</span></a>
</p>
<p class="right">
    <a href="{{ route('serviceinquiry.faq.edit',['idx'=>$faqlist->idx]) }}" class="button">수정</a>
    <a href="{{ route('serviceinquiry.faq.delete',['idx'=>$faqlist->idx]) }}" class="button">삭제</a>
    <a href="{{ route('serviceinquiry.faq.index') }}" class="button">목록</a>
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
