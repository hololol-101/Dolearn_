<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210520 | @m | 요구반영. 결함개선. 고도화.
 * 20210521 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 질문 리스트')

@section('content')

<? $d1n = '3'; $d2n = '2'; // 1차2차활성 ?>

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">


<!-- body_title -->
<div id="body_title">
	<div class="hg1">
		<i class="ic1"></i>
		<h2 class="h1">질문 리스트</h2>
	</div>
	<div class="eg1">
	</div>
</div>
<!-- /body_title -->


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<p class="mgt0">
	미해결된 질문 리스트 입니다. 직접 답변을 남기거나 다른 수강생의 댓글을 답변으로 채택하고 수강생의 궁금증을 해결해주세요.
</p>


<!-- scroll-x-lt-large -->
<div class="scroll-x-lt-large">
<div style="min-width:580px;">

	<!-- bbs1table1 -->
	<div class="bbs1table1">

		<table class="t1 w100 tttal tt1tac tt2tac mgt0 fsxd lhD">
			<caption>
				<strong class="h1 blind">수강자 관리 목록</strong>
				<span class="summary1 blind">: 선택, 구분, 제목, 수강자명, 작성일자</span>
			</caption>
			<thead>
			<tr>
			<th scope="col" style="width:2em;">
				<span class="blind">선택</span>
				<input type="checkbox" name="★1checkbox0" id="★1checkbox0e0" title="전체선택" class="all" />
			</th>
			<th scope="col" style="width:3em;">
				구분
				<div class="bi1 dpib fsS1 vam">
					<a href="#?" class="li1 tooltip1">
						<span class="tooltip1c w15em">
							강좌설정에서 비공개 질문 작성<br /> 활성/비활성이 가능합니다.
						</span>
					</a>
				</div>
			</th>
			<th scope="col">제목</th>
			<th scope="col">
				수강자명
			</th>
			<th scope="col">
                <input type="hidden" id="sort_type_writed_at" value="desc">
				<a href="javascript:void(0);" class="b1 sort" title="작성일자 오름차순/내림차순 정렬" onclick="sortQna('writed_at')">
					<span class="b1t1">작성일자</span>
					<i class="b1ic1">정렬</i>
				</a>
			</th>
			</tr>
			</thead>
			<tbody class="w1item ttvat" id="qna_list">
            @if (count($qnaList) > 0)
                @foreach ($qnaList as $qna)
                <tr class="item">
                    <td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
                    <td>@if ($qna->public_yn == 'Y') 공개 @else 비공개 @endif</td>
                    <td><a href="{{ route('manage.lecture.qna_detail', ['idx' => $qna->lecture_idx, 'qna_idx' => $qna->idx]) }}">{{ $qna->title }}</a></td>
                    <td>{{ $qna->writer_name }} <span class="dpib">({{ $qna->writer_id }})</span></td>
                    <td>{{ date('Y-m-d H:i', strtotime($qna->writed_at)) }}</td>
                </tr>
                @endforeach
            @endif
			</tbody>
		</table>
        @if (count($qnaList) == 0)
        <br>
        <span>등록된 질문이 없습니다.</span>
        <br><br>
        @endif
	</div>
	<!-- /bbs1table1 -->

</div>
</div>
<!-- /scroll-x-lt-large -->


	<!-- infomenu1 -->
	<div class="infomenu1 mg0">
		<div class="left">
			<!-- <button type="button" class="button del-check">선택 삭제</button>
			<a href="?#★" class="button secondary export">파일 내보내기</a> -->
		</div>
		<div class="right">
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
		</div>
	</div>
	<!-- /infomenu1 -->

<script>/*<![CDATA[*/
	$(function(){
		/** ◇◆ 전체선택. 선택삭제. 삭제 20210302. @m.
		 */
		(function(){
			var my = '.bbs1table1',
				ck = 'input:checkbox',
				ack = 'input.all:checkbox',
				delck = '.del-check', // 선택 삭제
				item = '.item', // 항목
				del = '.del'; // 개별 삭제

			// 미래 전체 클릭
			$(my).on('click', ack, function(e){
				if( $(this).is(':checked') ){
					$(my).find(ck).prop('checked', true);
				}else{
					$(my).find(ck).prop('checked', false);
				}
			});

			// 미래 체크박스 클릭
			$(my).on('click', ck, function(e){
				if( !$(this).is(':checked') ){
					$(my).find(ack).prop('checked', false); // 전체 선택 해제
				}
			});

			// 미래 선택 삭제 클릭
			$(my).on('click', delck, function(e){
				e.preventDefault();
				if( confirm('선택한 항목을 삭제하시겠습니까?') ){
					$(my).find(ck).filter(':checked:not(".all")').closest(item).remove();
				}else{
					return false;
				}
			});

			// 미래 개별 삭제 클릭
			$(my).on('click', del, function(){
				if( confirm('삭제하시겠습니까?') ){
					$(this).closest(item).remove();
				}
			});

		})();

	});
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection

@section('script')
<script>
function sortQna(type) {

    // 오름차순, 내림차순 트리거
    if ($('#sort_type_' + type).val() == 'desc') {
        $('#sort_type_' + type).val('asc');
    } else {
        $('#sort_type_' + type).val('desc');
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('manage.lecture.qna_list') }}",
        // contentType: false,
        // processData: false,
        data: {
            'lecture_idx': '{{ $_GET['idx'] }}',
            'type': type,
            'sort_type': $('#sort_type_' + type).val()
        },
        success: (data) => {
            if (data.status == 'success') {
                $('#qna_list').empty();
                $('#qna_list').append(data.resData);

            } else {
                alert(data.msg);
            }
        },
        error: function(data) {
            console.log(data);
        }
    });
}
</script>
@endsection
