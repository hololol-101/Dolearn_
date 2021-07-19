<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210520 | @m | 요구반영. 결함개선. 고도화.
 * 20210520 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 수강후기 리스트')

@section('content')

<? $d1n = '3'; $d2n = '3'; // 1차2차활성 ?>

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
		<h2 class="h1">수강후기 리스트</h2>
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


<!-- scroll-x-lt-large -->
<div class="scroll-x-lt-large">
<div style="min-width:580px;">

	<!-- bbs1table1 -->
	<div class="bbs1table1">

		<table class="t1 w100 tttal tt1tac tt2tac mgt0 fsxd lhD">
			<caption>
				<strong class="h1 blind">수강자 관리 목록</strong>
				<span class="summary1 blind">: 선택, 평점, 내용, 수강자명, 작성일자</span>
			</caption>
			<thead>
			<tr>
			<th scope="col" style="width:2em;">
				<span class="blind">선택</span>
				<input type="checkbox" name="★1checkbox0" id="★1checkbox0e0" title="전체선택" class="all" />
			</th>
			<th scope="col" style="width:4em;">
                <input type="hidden" id="sort_type_rating" value="desc">
				<a href="javascript:void(0);" class="b1 sort" title="평점 오름차순/내림차순 정렬" onclick="sortReview('rating')">
					<span class="b1t1">평점</span>
					<i class="b1ic1">정렬</i>
				</a>
			</th>
			<th scope="col">내용</th>
			<th scope="col">
				수강자명
			</th>
			<th scope="col">
                <input type="hidden" id="sort_type_writed_at" value="desc">
				<a href="javascript:void(0);" class="b1 sort" title="작성일자 오름차순/내림차순 정렬" onclick="sortReview('writed_at')">
					<span class="b1t1">작성일자</span>
					<i class="b1ic1">정렬</i>
				</a>
			</th>
			</tr>
			</thead>
			<tbody class="w1item ttvat" id="review_list">
            @if (count($reviewList) > 0)
                @foreach ($reviewList as $review)
                <tr class="item">
                    <td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
                    <td>{{ $review->rating }}</td>
                    <td>
                        {{ $review->content }}
                    </td>
                    <td>{{ $review->writer_name }}<span class="dpib">({{ $review->writer_id }})</span></td>
                    <td>{{ $review->writed_at }}</td>
                </tr>
                @endforeach
            @endif
			</tbody>
		</table>
        @if (count($reviewList) == 0)
        <br>
        <span>작성된 후기가 없습니다.</span>
        <br><br>
        @endif
	</div>
	<!-- /bbs1table1 -->

</div>
</div>
<!-- /scroll-x-lt-large -->


	<!-- infomenu1 -->
    <div class="infomenu1 mg0">
        {!! $pageIndex['htmlCode'] !!}
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
function sortReview(type) {

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
        url: "{{ route('manage.lecture.review_list') }}",
        // contentType: false,
        // processData: false,
        data: {
            'lecture_idx': '{{ $_GET['idx'] }}',
            'type': type,
            'sort_type': $('#sort_type_' + type).val()
        },
        success: (data) => {
            if (data.status == 'success') {
                $('#review_list').empty();
                $('#review_list').append(data.resData);

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
