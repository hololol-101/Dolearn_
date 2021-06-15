<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210225 | @m | 요구반영. 결함개선. 고도화.
 * ~20210225 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 시험/과제 목록')

@section('content')

<? $d1n = '2'; $d2n = '2'; // 1차2차활성 ?>

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
		<h2 class="h1">시험/과제 목록</h2>
	</div>
	<div class="eg1">
		<a href="{{ route('manage.lecture.add_new_exam_task') }}" class="b1 button">+ 시험/ 과제 생성</a>
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


<!-- bbs1table1 -->
<div class="bbs1table1">

	<!-- infomenu1 -->
	<div class="infomenu1 mg0">
		<div class="left">
			<button type="button" class="button small del-check">선택 삭제</button>
		</div>
		<div class="right">
			<!-- <a href="?#★" class="button small">+ 시험/ 과제 생성</a> -->
		</div>
	</div>
	<!-- /infomenu1 -->

	<table class="t1 w100 tttac ttvam fsxd lhD">
		<caption>
			<strong class="h1 blind">시험/과제 관리 목록</strong>
			<span class="summary1 blind">: 선택, 분류, 제목, 상태, 시작날짜, 종료날짜, 관리</span>
		</caption>
		<thead>
		<tr>
		<th scope="col" style="width:1em;">
			<span class="blind">선택</span>
			<input type="checkbox" name="★1checkbox0" id="★1checkbox0e0" title="전체선택" class="all" />
		</th>
		<th scope="col" style="width:2em;">분류</th>
		<th scope="col" style="width:50%;" class="tal">제목</th>
		<th scope="col" style="width:4em;">상태</th>
		<th scope="col" style="width:4em;">시작날짜</th>
		<th scope="col" style="width:4em;">종료날짜</th>
		<th scope="col" style="width:12em;">관리</th>
		</tr>
		</thead>
		<tbody class="w1item">
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td>시험</td>
		<td class="tal">엑셀 시험 01</td>
		<td><i class="label1 bgc-danger">진행중</i></td>
		<td>바로시작</td>
		<td>제한없음</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{-- type parameter DB에서 가져와야 함 --}}{{ route('manage.lecture.submission_status', ['id' => '', 'type' => 'exam']) }}" class="b2 button small secondary submission">제출현황</a>
			<a href="{{ route('manage.lecture.modify_exam_task', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td>시험</td>
		<td class="tal">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</td>
		<td><i class="label1 bgc-danger">진행중</i></td>
		<td>바로시작</td>
		<td>제한없음</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.submission_status', ['id' => '', 'type' => 'exam']) }}" class="b2 button small secondary submission">제출현황</a>
			<a href="{{ route('manage.lecture.modify_exam_task', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td>과제</td>
		<td class="tal">엑셀 시험 01</td>
		<td></td>
		<td>바로시작</td>
		<td>제한없음</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.submission_status', ['id' => '', 'type' => 'task']) }}" class="b2 button small secondary submission">제출현황</a>
			<a href="{{ route('manage.lecture.modify_exam_task', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td>과제</td>
		<td class="tal">과제 제목이 표시됩니다.</td>
		<td></td>
		<td>바로시작</td>
		<td>제한없음</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.submission_status', ['id' => '', 'type' => 'task']) }}" class="b2 button small secondary submission">제출현황</a>
			<a href="{{ route('manage.lecture.modify_exam_task', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
		</td>
		</tr>
		</tbody>
	</table>

</div>
<!-- /bbs1table1 -->


<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 전체선택. 선택삭제. 삭제 20210226. @m.
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
				if( confirm("선택한 항목을 삭제하시겠습니까?") ){
					$(my).find(ck).filter(':checked:not(".all")').closest(item).remove();
				}else{
					return false;
				}
			});

			// 미래 개별 삭제 클릭
			$(my).on('click', del, function(){
					$(this).closest(item).remove();
			});

		})();

	});
/*]]>*/</script>


<!-- infomenu1 -->
<div class="infomenu1 mgb3em">

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
<!-- /infomenu1 -->


<!-- cp3preview1 -->
<div class="cp3preview1" id="preview">

	<div class="hgroup3 mgb2em">
		<strong class="hb1 h5">미리보기</strong>
	</div>

	<!-- cp2task1 -->
	<div class="cp2task1">
		<div class="tg1">
			<strong class="t1">1차과제 - 함수 실습 후 파일 제출하기</strong>
			<span class="eg1">
				<span class="st1"><i class="ic1 time"></i> <span class="t1">마감 기한 없음</span></span>
			</span>
		</div>
		<div class="tg2">
			<div class="t2">
				첫번째 과제 입니다.<br />
				예제 파일을 첨부했으니, chap1. 엑셀 다루기에서 배웠던 함수들을 가지고 실습을 해보세요~<br />
			</div>
		</div>
	</div>
	<!-- /cp2task1 -->


	<!-- cp2attach1 -->
	<div class="cp2attach1">
		<div class="w1">
			<div class="w1w1">
				<span class="tt1">첨부파일 1개</span>
			</div>
			<div class="w1w2">
				<a href="?#★" class="b1 button t1ic1"><span class="t1">파일명_20210225.pdf</span> <i class="ic1 download"></i></a>
				<!-- <a href="?#★" class="b1 button t1ic1"><span class="t1">파일명_20211129.pdf</span> <i class="ic1 download"></i></a> -->
			</div>
		</div>
	</div>
	<!-- /cp2attach1 -->

</div>
<!-- /cp3preview1 -->


<script>/*<![CDATA[*/
	$(function(){
		/** ◇◆ 미리보기. 20210225. @m.
		 */
		(function(){
			var $b = $('.bbs1table1 .preview'),
				$v = $('#preview');

			// 미리보기 클릭
			$b.on('click', function(e){
				$v.addClass('on');
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
