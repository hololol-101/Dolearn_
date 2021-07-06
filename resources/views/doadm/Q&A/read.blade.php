@extends('layouts.doadm.doadm_layout') // 레이아웃을 사용함.

@section('content')

<!-- width1s2 -->
<div class="width1s2">

<!-- bbs1view1 -->
<div class="bbs1view1">
<h1 class="h1">{{ $qaInfo->question_title }}</h1>
<!-- info1 -->
<div class="info1">
<dl class="dl1">
<dt class="dt1">작성일</dt>
<dd class="dd1">{{ date('Y.m.d',strtotime($qaInfo->question_writed_at)) }}</dd>
<dt class="dt1">작성자</dt>
<dd class="dd1">{{ $qaInfo->nickname }}</dd>
<dt class="dt1">응답 상태 여부</dt>
@if( $qaInfo->status =="active")
<dd class="dd1"><em class="em1">대기중</em></dd>
@else
<dd class="dd1">답변완료</em></dd>
@endif
</dl>
</div>
<!-- /info1 -->
<!-- attach1 -->
<div class="attach1">
@if ($qaInfo->question_attach_file!='')
<ul>
    <li>
        <a href="{{ route('serviceinquiry.download_attach_file', ['filename'=>$qaInfo->question_attach_file]) }}" class="filename">{{ $qaInfo->question_attach_file }}</a>
        <a href="javascrpt:void(0)"  title="바로보기 [새 창]" onclick="openNewPage('{{ asset('storage/uploads/attach/'.$qaInfo->question_attach_file) }}')" class="b1 quickview"><i class="ic1"></i> 바로보기</a></li>
</ul>
@endif
</div>
<!-- /attach1 -->
<!-- substance -->
<div class="substance">

{!! $qaInfo->question_content !!}

</div>
<!-- /substance -->

</div>
<!-- /bbs1view1 -->

@if($qaInfo->status =="active")
<!-- infomenu1 -->
<div class="infomenu1">
    <p class="left">
        <a href="?" class="button prev default"><span class="t1">이전</span></a>
        <a href="?" class="button next default"><span class="t1">다음</span></a>
    </p>
    <p class="right">
        <a href="{{ route('serviceinquiry.qa_answer', ['idx'=> $qaInfo->idx]) }}" class="button">답변</a>
        <a href="{{ route('serviceinquiry.qa_index') }}" class="button">목록</a>
    </p>

    </div>
    <!-- /infomenu1 -->


@else
    <!-- comment1list1 -->
    <div class="comment1list1">
    <!-- lst1 -->
    <ol class="lst1">
        <li class="li1">
            <p style="text-align:left">
                <div class="text">
                <cite class="name"><a href="?">{{ $qaInfo->nickname }}</a></cite>
                <small class="time"><i class="ic1"></i>{{ date('Y.m.d', strtotime($qaInfo->answer_writed_at)) }}</small>
                <div class="attach1">
                    @if ($qaInfo->answer_attach_file!='')
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
                    @endif

                <div class="t1">{!! $qaInfo->answer_content !!}</div>
            </div>
            </p>
            <p style="text-align:right">
                <a href="{{ route('serviceinquiry.qa_answer', ['idx'=> $qaInfo->idx, 'status'=>'edit']) }}" class="button">수정</a>
                <a href="/doadm/notice/{{ $qaInfo->idx }}/delete" class="button">삭제</a>
            </p>

        </li>



    </ol>
    <!-- /lst1 -->

    </div>
    <!-- /comment1list1 -->
    <div class="infomenu1">
    <p class="left">
        <a href="?" class="button prev default"><span class="t1">이전</span></a>
        <a href="?" class="button next default"><span class="t1">다음</span></a>
    </p>
    <p class="right">
        <a href="{{ route('serviceinquiry.qa_index') }}" class="button">목록</a>
    </p></div>

    </div>

@endif

<script>
    function openNewPage(url){
        window.open(url, "_blank")
    }
</script>

</div>
<!-- /width1s2 -->

@endsection
