@extends('layouts.doadm.doadm_layout')
@section('content')

<!-- width1s2 -->
<div class="width1s2">


<!-- bbs1view1 -->
<div class="bbs1view1">

<h1 class="h1"> {{ $userInfo->dolearn_id }} </h1>
<!-- info1 -->
<div class="info1">
<dl class="dl1">
<dt class="dt1">신청일</dt>
<dd class="dd1">{{ date('Y.m.d', strtotime($userInfo->applicated_at) ) }}</dd>
<dt class="dt1">작성자</dt>
<dd class="dd1">{{ $userInfo->user_name }}</dd>
<dt class="dt1" show>전화번호</dt>
<dd class="dd1">{{$userInfo->mobile }}</dd>
<dt class="dt1" show>희망분야</dt>
<dd class="dd1">{{$userInfo->hope_part }}</dd>
</dl>
</div>
<!-- /info1 -->
<!-- attach1 -->
<div class="attach1">
@if ($userInfo->save_attach_file !='')
    <ul>
    <li><a href="javascript:void(0)" class="filename">{{ $userInfo->save_attach_file  }}</a>
        <a href="{{ route('admin.download_attach_file', ['filename'=>$userInfo->save_attach_file ]) }}" title="바로보기 [새 창]" class="b1 download" )"><i class="ic1"></i> 다운로드</a>
        <a href="javascript:void(0)" title="바로보기 [새 창]" class="b1 quickview" onclick ="openNewPage('{{ asset('storage/uploads/attach/'.$userInfo->save_attach_file ) }}')"><i class="ic1"></i> 바로보기</a></li>
        </li>

</ul>
@endif
</div>
<!-- /attach1 -->
<!-- substance -->
<div class="substance">

{!! $userInfo->introduction !!}

</div>
<!-- /substance -->

</div>
<!-- /bbs1view1 -->

<!-- infomenu1 -->
<div class="infomenu1">
<p class="left">
    <a href="{{ route('admin.applyInstructor.index') }}" class="button prev default"><span class="t1">목록</span></a>
</p>
<p class="right">
    @if ($userInfo->status!="confirm")
    <button type="button" class="button apply">승인</button>
    @endif
    <button type="button" class="button delete">삭제</button>

</p>
</div>
<!-- /infomenu1 -->
<script>
    function openNewPage(url){
        window.open(url, "_blank")
    }
    $('.apply').on("click", function(){
        let idxs = {{ $userInfo->idx }}
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType: 'json',
            url : "{{ route('admin.applyInstructor.approve') }}",
            data: {
                'idxs': idxs
            },
            success : (data) => {
                console.log(data)
                if(data.result =="success"){
                    location.reload();
                }
            }, error: (result)=>{
                console.log(result);
            }
        })
    })
    $('.delete').on("click", function(){
        let idxs = {{ $userInfo->idx }}
        $('input[name=★1checkbox1]:checked').each(function(){
                idxs+=$(this).attr('idx')+",";
        })
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType: 'json',
            url : "{{ route('admin.applyInstructor.delete') }}",
            data: {
                'idxs': idxs
            },
            success : (data) => {
                if(data.result =="success"){
                    location.href = "{{ route('admin.applyInstructor.index') }}"
                }
            }, error: (result)=>{
                console.log(result);
            }
        });
    })
</script>

</div>
<!-- /width1s2 -->

@endsection
