<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210224 | @m | 요구반영. 결함개선. 고도화.
 * ~20210303 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 문제 관리')

@section('content')

@php
    $d1n = '2'; $d2n = '1'; // 1차2차활성
@endphp

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
		<h2 class="h1">문제 관리</h2>
	</div>
	<div class="eg1">
		<a href="{{ route('manage.lecture.add_new_question') }}" class="b1 button">+ 새 문제 생성</a>
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
			<button type="button" class="b3 button small del-check">선택 삭제</button>
		</div>
		<div class="right">
			<!-- <a href="?#★" class="button small">+ 새 문제 생성</a> -->
		</div>
	</div>
	<!-- /infomenu1 -->

	<table class="t1 w100 tttac ttvam fsxd lhD">
		<caption>
			<strong class="h1 blind">문제 관리 목록</strong>
			<span class="summary1 blind">: 선택, 문제 이름, 일자, 관리</span>
		</caption>
		<thead>
		<tr>
		<th scope="col" style="width:2em;">
			<span class="blind">선택</span>
			<input type="checkbox" name="★1checkbox0" id="★1checkbox0e0" title="전체선택" class="all" />
		</th>
		<th scope="col" style="width:60%;" class="tal">문제 이름</th>
		<th scope="col" style="width:4em;">일자</th>
		<th scope="col" style="width:12em;">관리</th>
		</tr>
		</thead>
		<tbody class="w1item">
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td class="tal"><a href="?#★">엑셀 초급 강의 실시간 화상 강의 일시 공지</a></td>
		<td>2021/02/24</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.modify_question', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
			<button type="button" class="b2 button small secondary del">삭제</button>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td class="tal"><a href="?#★">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</a></td>
		<td>2021/02/24</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.modify_question', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
			<button type="button" class="b2 button small secondary del">삭제</button>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td class="tal"><a href="?#★">일이삼사오륙칠팔구십</a></td>
		<td>2021/02/24</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.modify_question', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
			<button type="button" class="b2 button small secondary del">삭제</button>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td class="tal"><a href="?#★">일이삼사오륙칠팔구십</a></td>
		<td>2021/02/24</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.modify_question', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
			<button type="button" class="b2 button small secondary del">삭제</button>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td class="tal"><a href="?#★">일이삼사오륙칠팔구십</a></td>
		<td>2021/02/24</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.modify_question', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
			<button type="button" class="b2 button small secondary del">삭제</button>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td class="tal"><a href="?#★">일이삼사오륙칠팔구십</a></td>
		<td>2021/02/24</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.modify_question', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
			<button type="button" class="b2 button small secondary del">삭제</button>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td class="tal"><a href="?#★">일이삼사오륙칠팔구십</a></td>
		<td>2021/02/24</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.modify_question', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
			<button type="button" class="b2 button small secondary del">삭제</button>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td class="tal"><a href="?#★">일이삼사오륙칠팔구십</a></td>
		<td>2021/02/24</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.modify_question', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
			<button type="button" class="b2 button small secondary del">삭제</button>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td class="tal"><a href="?#★">일이삼사오륙칠팔구십</a></td>
		<td>2021/02/24</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.modify_question', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
			<button type="button" class="b2 button small secondary del">삭제</button>
		</td>
		</tr>
		<tr class="item">
		<td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
		<td class="tal"><a href="?#★">일이삼사오륙칠팔구십</a></td>
		<td>2021/02/24</td>
		<td>
			<a href="#preview" class="b2 button small secondary preview mj-smooth1scroll1">미리보기</a>
			<a href="{{ route('manage.lecture.modify_question', ['id' => '']) }}" class="b2 button small secondary edit">수정</a>
			<button type="button" class="b2 button small secondary del">삭제</button>
		</td>
		</tr>
		</tbody>
	</table>

</div>
<!-- /bbs1table1 -->


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
				if( confirm("선택한 항목을 삭제하시겠습니까?") ){
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

	<strong class="hb1 h5">미리보기</strong>

	<!-- cp2question1 -->
	<div class="cp2question1">
		<ul class="lst1">
			<li class="li1">
				<div class="w1">
					<div class="tg1">
						<span class="t1">Q1. 다음 4가지 보기 중 정답을 선택하세요?</span>
						<span class="t2">20점</span>
					</div>
					<ol class="lst2">
						<li class="li2"><a class="a1">첫번째 보기</a></li>
						<li class="li2"><a class="a1">두번째 보기 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</a></li>
						<li class="li2"><a class="a1">세번째 보기</a></li>
						<li class="li2"><a class="a1">네번째 보기</a></li>
					</ol>
				</div>
			</li>
		</ul>
	</div>
	<!-- /cp2question1 -->

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
