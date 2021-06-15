 <!DOCTYPE html>
<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210520 | @m | 요구반영. 결함개선. 고도화.
 * 20210520 | @m |
 */
-->
<? $d1n = '3'; $d2n = '3'; // 1차2차활성 ?>

<html lang="ko">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="DoLearn (두런)" />
<meta name="keywords" content="강좌관리상세, DoLearn, 두런" />
<meta name="description" content="강좌관리상세, DoLearn, 두런" />
<title>강좌관리상세 - 수강후기 리스트 | DoLearn (두런)</title>
<?php include $_SERVER['DOCUMENT_ROOT']."/_res/manage1/share/inc/sub_html_head.php"; ?>
</head>
<body class="d1n<?=$d1n?> d2n<?=$d2n?>">
<?php include $_SERVER['DOCUMENT_ROOT']."/_res/manage1/share/inc/head.php"; ?>
<!-- #wrap -->
<div id="wrap">
<!-- container -->
<div class="container clearfix">
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





<!-- <p class="mgt0">
	일이삼사오륙칠팔구십
</p> -->


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
				<a href="#" class="b1 sort" title="평점 오름차순/내림차순 정렬">
					<span class="b1t1">평점</span>
					<i class="b1ic1">정렬</i>
				</a>
			</th>
			<th scope="col">내용</th>
			<th scope="col">
				수강자명
			</th>
			<th scope="col">
				<a href="#" class="b1 sort" title="작성일자 오름차순/내림차순 정렬">
					<span class="b1t1">작성일자</span>
					<i class="b1ic1">정렬</i>
				</a>
			</th>
			</tr>
			</thead>
			<tbody class="w1item ttvat">
			<tr class="item">
			<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
			<td>3</td>
			<td>
				기초강의라고 했는데 너무 생략 된 부분도 많고 강의 중 강사님께서도 방향을 못 잡는 부분이 있는게 느껴졌어요. 그냥 이미 아는 수강생들이 정리하는 느낌으로 살짝 듣기에는 좋은 강의입니다. 정말 아무것도 모르면 더 모르는 느낌으로 끝날 수 있을 것 같아요.<br />
				강의자료도 괜찮고, 설명도 잘해주십니다. 다이어그램이 너무 깔끔해서 개인적으로 만족스러웠네요. 다만, 간혹 '거짓'을 '거짖'이라고 하거나, '반드시'를 반듯이'라고 표기하는 것은 문과생으로써 보기 힘들었습니다. 다음에 다시 리뉴얼 해주실 때는 신경써주시길 바랄께요.<br />
				자바 - JSP - MVC 건너면서 자바 자체에 소홀히 한것 같아 리뷰하듯 보고 있습니다.<br />
				저처럼 가볍게 리뷰 하실 분이나, 자바를 처음 하시는 분들에게는 정말 좋은 강의 입니다.<br />
			</td>
			<td>김두런 <span class="dpib">(dolearn1@dataedu.kr)</span></td>
			<td>2021/05/20 17:47</td>
			</tr>
			<tr class="item">
			<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
			<td>5</td>
			<td>좋은 강의 감사합니다</td>
			<td>김두런 <span class="dpib">(dolearn1@dataedu.kr)</span></td>
			<td>2021/05/20 17:47</td>
			</tr>
			<tr class="item">
			<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
			<td>4</td>
			<td>감사합니다</td>
			<td>김두런 <span class="dpib">(dolearn1@dataedu.kr)</span></td>
			<td>2021/05/20 17:47</td>
			</tr>
			<tr class="item">
			<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
			<td>2</td>
			<td>목소리가 너무 작아서 안들려요</td>
			<td>김두런 <span class="dpib">(dolearn1@dataedu.kr)</span></td>
			<td>2021/05/20 17:47</td>
			</tr>
			<tr class="item">
			<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
			<td>3</td>
			<td>
				코딩에 관심이있어서 시작하게되었어요.<br />
				이해하기 쉽고 편하게 듣고있습니다.<br />
				아직 용어나 단어들이 어색하게 들리지만 언젠간 들리겠죠??<br />
				좋은 강의 감사합니다.<br />
		</td>
			<td>김두런 <span class="dpib">(dolearn1@dataedu.kr)</span></td>
			<td>2021/05/20 17:47</td>
			</tr>
			<tr class="item">
			<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
			<td>5</td>
			<td>Great !!</td>
			<td>김두런 <span class="dpib">(dolearn1@dataedu.kr)</span></td>
			<td>2021/05/20 17:47</td>
			</tr>
			<tr class="item">
			<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
			<td>4</td>
			<td>훌륭한 강의 감사합니다.</td>
			<td>김두런 <span class="dpib">(dolearn1@dataedu.kr)</span></td>
			<td>2021/05/20 17:47</td>
			</tr>
			<tr class="item">
			<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
			<td>4</td>
			<td>감사합니다!!</td>
			<td>김두런 <span class="dpib">(dolearn1@dataedu.kr)</span></td>
			<td>2021/05/20 17:47</td>
			</tr>
			<tr class="item">
			<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
			<td>3</td>
			<td>일이삼사오륙칠팔구십</td>
			<td>김두런 <span class="dpib">(dolearn1@dataedu.kr)</span></td>
			<td>2021/05/20 17:47</td>
			</tr>
			<tr class="item">
			<td><input type="checkbox" name="★1checkbox1" title="선택" class="mg0 mgt025em mgb025em vat" /></td>
			<td>3</td>
			<td>일이삼사오륙칠팔구십</td>
			<td>김두런 <span class="dpib">(dolearn1@dataedu.kr)</span></td>
			<td>2021/05/20 17:47</td>
			</tr>
			</tbody>
		</table>

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
</div>
<!-- /container -->
</div>
<!-- /#wrap -->
<?php include $_SERVER['DOCUMENT_ROOT']."/_res/manage1/share/inc/foot.php"; ?>
</body>
</html>