@extends('layouts.doadm.doadm_layout')
@section('content')

<div class="width1s2">

<!-- infomenu1 -->
<div class="infomenu1">

<!-- search1select1 -->
<div class="search1select1">
    <form id="f1s1s1" action="{{ route('admin.applyInstructor.index') }}" method="POST">
        @csrf
    <fieldset><legend class="blind">게시물 검색</legend>
        <select id="f1s1s1select1" title="선택옵션1" name = "type" class="select1">
            <option value="all">전체</option>
            <option value="ready">대기 중</option>
            <option value="confirm">승인 완료</option>
        </select>
        <input type="text" id="f1s1s1text1" name="search" value="" title="검색어" class="text1">
        <button type="submit" class="button submit search"><i class="ic1"></i><span class="t1">검색</span></button>
    </fieldset>
    </form>
    <script>
        $('#f1s1s1select1').val('{{ $type }}').attr('selected', 'true');
    </script>
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
        <th scope="col" style="width:auto;"><input type="checkbox" name="★1checkbox0" id="★1checkbox0e0" title="전체선택" class="all" /></th>
        <th scope="col" style="width:auto;">번호</th>
        <th scope="col" style="width:auto">두런 아이디</th>
        <th scope="col" style="width:auto;">이름</th>
        <th scope="col" style="width:auto;">연락처</th>
        <th scope="col" style="width:auto;">희망분야</th>
        <th scope="col" style="width:auto;">신청일</th>
        <th scope="col" style="width:auto;">상태</th>
    </tr>
        </thead>
        <tbody>
        @foreach($applyList as $apply)
        <tr>
            <td><input type="checkbox" name="★1checkbox1" title="선택" idx={{ $apply->idx }} /></td>
        <td>{{ $apply->idx }}</td>
        <td style = style="text-align=center;"'>

            <a href="{{ route('admin.applyInstructor.detail', ['idx'=>$apply->idx]) }}">{{ $apply->dolearn_id }}</a></td>
        <td style="text-align=center;">{{ $apply->user_name }}</td>
        <td style="text-align=center;">{{ $apply->mobile }}</td>
        <td style="text-align=center;">{{ $apply->hope_part }}</td>
        <td style="text-align=center;">{{ $apply->applicated_at }}</td>

        @if($apply->status =="ready")
            <td>대기중</td>
            @elseif ($apply->status =="confirm")
            <td>승인완료</td>
            @endif
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
        <button type="button" class="button apply">승인</button>
        <button type="button" class="button delete">삭제</button>

    </p>

</div>
<!-- /infomenu1 -->

</div>
<script>
    var my = '.list2table1',
		ck = 'input:checkbox',
		ack = 'input.all:checkbox',
		delck = '.del-check', // 선택 삭제
		item = '.item', // 항목
		del = '.del'; // 개별 삭제

		// 미래 전체 클릭
		$(my).on('click', ack, function(e){
            if( $(this).is(':checked') ){
				$(my).find(ck).prop('checked', true);
                $(my).find(ck).find("ischecked");
                console.log($(my).find(ck).val())
			}else{
				$(my).find(ck).prop('checked', false);
			}
		});
    $('.apply').on("click", function(){
        let idxs="";
        $('input[name=★1checkbox1]:checked').each(function(){
                idxs+=$(this).attr('idx')+",";
        })
        idxs = idxs.slice(0, -1);
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
        });
    })
    $('.delete').on("click", function(){
        let idxs="";
        $('input[name=★1checkbox1]:checked').each(function(){
                idxs+=$(this).attr('idx')+",";
        })
        idxs = idxs.slice(0, -1);
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
                    location.reload();
                }
            }, error: (result)=>{
                console.log(result);
            }
        });
    })
</script>


@endsection
