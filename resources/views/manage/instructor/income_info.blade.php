<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210308 | @m | 요구반영. 결함개선. 고도화.
 * ~20210309 | @m |
 */
-->
@extends('master_sub')

@section('title', '강사 마이페이지 - 강좌관리 - 수익 내역')

@section('content')

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

@include('inc.common.inc_layer_sitemap')

<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="#" class="a1"><i class="t1">강좌관리</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">수익 내역</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('manage.instructor.operation_lecture', ['role' => 'instructor']) }}">운영 강좌</a></li>
			<li><a href="{{ route('manage.instructor.question_list', ['role' => 'instructor']) }}">질문 리스트</a></li>
			<li><a href="{{ route('manage.instructor.review_list', ['role' => 'instructor']) }}">수강후기 리스트</a></li>
			<li class="on"><a href="{{ route('manage.instructor.income_info', ['role' => 'instructor']) }}">수익 내역</a></li>
			</ul>
		</div>
		<!-- /lnb1c -->
	</div>
	<!-- lnb1 -->
	<script>/*<![CDATA[*/
		$(function(){
			/** ◇◆ 목록앵커 클릭하면 활성 메뉴를 제목에 표시. 링크 이동. 20210111. @m
			 */
			(function(){
				var $my = $('#lnb1'),
					$m = $('li>a[href]', $my);
				// 현재활성
				$m.each(function(){
					if( $(this).closest('li').is('.on') ){
						$('.h1 .t1', $my).text( $(this).text() );
					}
				});
				// 클릭
				$m.on('click', function(e){
					//e.preventDefault();
					$('.toggle', $my).triggerHandler('click'); // 토글 닫기
					$('.h1 .t1', $my).text( $(this).text() );
					return; // 링크 이동
				});
			})();
		});
	/*]]>*/</script>

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


<hr class="bdt1px mgt0 mgb05em" />


<!-- even-grid -->
<div class="even-grid float-left gap5pct vgap0">
	<div class="small-12 large-6 column">


		<!-- cp1profit1 -->
		<div class="cp1profit1">
			<div class="hg1">
				<h3 class="h1">수익 현황</h3>
			</div>
			<div class="cont">

				<!-- cp1profit1info1 -->
				<div class="cp1profit1info1">
					<div class="w1">
						<span class="t1">1. 미확정 지급 예정액</span>
						<span class="t2">99,999,999원</span>
					</div>
					<div class="w1">
						<span class="t1">2. 세금 계산 대기액</span>
						<span class="t2">99,999,999원</span>
					</div>
					<div class="w1">
						<span class="t1">3. 지급 예정액</span>
						<div class="w2">
							<div class="w3">
								<span class="t3">이번달 지급 예정</span>
								<span class="t4">99,999,999원</span>
							</div>
							<div class="w3">
								<span class="t3">다음달 지급 예정</span>
								<span class="t4">99,999,999원</span>
							</div>
						</div>
					</div>
				</div>
				<!-- /cp1profit1info1 -->

			</div>
		</div>
		<!-- /cp1profit1 -->


	</div>
	<div class="small-12 large-6 column">


		<!-- cp1profit1 -->
		<div class="cp1profit1">
			<div class="hg1">
				<h3 class="h1">출금 정보</h3>
				<div class="tt1">
					<span class="tt1t1">누적 지급액</span> <span class="tt1t2">1,111,000원</span>
				</div>
			</div>
			<div class="cont">

				<table class="t1 w100 lhD ttpdtb1em tttac ttvam">
					<caption class="blind">
						<strong class="h1">출금 정보</strong>
					</caption>
					<thead class="fsB2">
					<tr>
					<th scope="col">출금일시</th>
					<th scope="col">지급액</th>
					<th scope="col">메시지</th>
					</tr>
					</thead>
					<tbody class="cvc">
					<tr>
					<th scope="row">2021.03.08 17:46</th>
					<td><em class="em0">133,950</em></td>
					<td>두런수익정산</td>
					</tr>
					<tr>
					<th scope="row">2021.02.08 17:46</th>
					<td><em class="em0">248,530</em></td>
					<td>두런수익정산</td>
					</tr>
					<tr>
					<th scope="row">2021.01.08 17:46</th>
					<td><em class="em0">227,160</em></td>
					<td>두런수익정산</td>
					</tr>
					<tr>
					<th scope="row">2020.12.08 17:46</th>
					<td><em class="em0">233,950</em></td>
					<td>두런수익정산</td>
					</tr>
					</tbody>
				</table>

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
						<!-- <span class="m"><a href="?" title="6 페이지">6</a></span>
						<span class="m"><a href="?" title="7 페이지">7</a></span>
						<span class="m"><a href="?" title="8 페이지">8</a></span>
						<span class="m"><a href="?" title="9 페이지">9</a></span>
						<span class="m"><a href="?" title="10 페이지">10</a></span> -->
					</span>
					<span class="control">
						<span class="m next"><a href="?" title="다음 페이지"><i class="ic">다음</i></a></span>
						<span class="m last"><a href="?" title="마지막 페이지"><i class="ic">마지막</i></a></span>
					</span>
				</div>
				<!-- /pagination -->

			</div>
		</div>
		<!-- /cp1profit1 -->


	</div>
</div>
<!-- /even-grid -->


<hr class="bdt1px mgt2em mgb15em" />


<!-- cp1profit1 -->
<div class="cp1profit1">
	<div class="hg1">
		<h3 class="h1">수익 내역 조회</h3>
		<div class="tt1">
			<span class="tt1t1">기간 내 총 수익</span> <span class="tt1t2">111,560원</span>
		</div>
		<a href="?#★" class="button ic1t1 semismall"><i class="ic1 download"></i> <span class="t1">Excel 다운로드</span></a>
	</div>
	<div class="cont">


		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

		<script>/*<![CDATA[*/
		/** ◇◆ 달력 날짜 선택기 생성. 20200922. MoonYoungshin.
		 */
		$(function() {
			$('input.date').datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'yy.mm.dd',
				prevText: '이전 달',
				nextText: '다음 달',
				monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
				monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
				dayNames: ['일','월','화','수','목','금','토'],
				dayNamesShort: ['일','월','화','수','목','금','토'],
				dayNamesMin: ['일','월','화','수','목','금','토'],
				showMonthAfterYear: true,
				yearSuffix: '년',
				showOn: 'button',
				buttonImageOnly: true,
				buttonImage: '{{ asset('assets/images/lib/ic20a2c0calendar1.png') }}',
				buttonText: '달력 날짜 선택기 열기 (마우스 클릭, 화면 터치로 이용 가능합니다.)',
				beforeShow: function() {
					setTimeout(function(){
						$('.ui-datepicker').css({'z-index': 9999}); // 레이어팝업.달력날짜선택기
					}, 50);
				}
			});
			/* ☆[m] 접근성 자동점검 통과. 20191029. 20200922 */
			$(".ui-datepicker-trigger").on('click', function(){ // 버튼이미지(buttonImage)
				$('table.ui-datepicker-calendar').prepend('<caption class="blind">달력 날짜 선택기</caption>');
				$('select.ui-datepicker-year').attr({title: '년 선택'});
				$('select.ui-datepicker-month').attr({title: '월 선택'});
			});
		});
		/*]]>*/</script>
		<script>/*<![CDATA[*/
		function fnVaccChk() {
			var theForm = document.getElementById("f0");
			if(!theForm.f0date0.value){
				alert("일자를 입력하세요.");
				theForm.f0date0.focus();
				return false;
			}
			return true;
		}
		/*]]>*/</script>


		<!-- infomenu1 -->
		<div class="infomenu1 mgt0 mgb1px pd1em pdl2em pdr2em bdrd4 bgcfop01">
			<div class="left">
				<span class="dpib"><input type="text" value="2021.02.09" size="10" title="조회 시작일" class="date date1 bdcc" /></span>
				<span class="mgl05em mgr05em fsB2 vam">~</span>
				<span class="dpib"><input type="text" value="2021.02.09" size="10" title="조회 종료일" class="date date2 bdcc" /></span>
			</div>
			<div class="right">
				<a href="?#" class="button bdcc month1">1개월</a>
				<a href="?#" class="button bdcc month3">3개월</a>
				<a href="?#" class="button bdcc month6">6개월</a>
				<a href="?#" class="button bdcc month12">12개월</a>
			</div>
		</div>
		<!-- /infomenu1 -->


		<script>/*<![CDATA[*/
			$(function(){

				/** ◇◆ 1,3,6,12개월 조회 입력 | 20210209. @m
				 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
				 */
				(function(){
					var $my = $('.infomenu1'), // 선택자 한정
						$date1 = $(' .date1', $my), // 조회 시작일
						$date2 = $('.date2', $my), // 조회 종료일
						$bmonth1 = $('.month1', $my), // 1개월 버튼
						$bmonth3 = $('.month3', $my), // 3개월 버튼
						$bmonth6 = $('.month6', $my), // 6개월 버튼
						$bmonth12 = $('.month12', $my); // 12개월 버튼

					// 1~12개월 버튼 클릭
					$bmonth1.on('click', function(e){
						e.preventDefault();
						$date1.val( pastMonth(1) );
						$date2.val( today() );
					});
					$bmonth3.on('click', function(e){
						e.preventDefault();
						$date1.val( pastMonth(3) );
						$date2.val( today() );
					});
					$bmonth6.on('click', function(e){
						e.preventDefault();
						$date1.val( pastMonth(6) );
						$date2.val( today() );
					});
					$bmonth12.on('click', function(e){
						e.preventDefault();
						$date1.val( pastMonth(12) );
						$date2.val( today() );
					});

					// 날짜 관련 함수들 //

					// 날짜 객체 받아서 문자열로 리턴하는 함수
					function getDateStr(myDate){
						var year = myDate.getFullYear();
						var month = (myDate.getMonth() + 1);
						var day = myDate.getDate();
						month = (month < 10) ? '0' + String(month) : month;
						day = (day < 10) ? '0' + String(day) : day;
						return  year + '.' + month + '.' + day;
					}

					// 오늘 날짜를 문자열로 반환
					function today() {
						var d = new Date();
						return getDateStr(d);
					}

					// 오늘로부터 1주일전+1 날짜 반환
					function pastWeek() {
						var d = new Date();
						var dayOfMonth = d.getDate();
						d.setDate(dayOfMonth - 7 + 1);
						return getDateStr(d);
					}

					// 오늘로부터 m개월전+1일 날짜 반환
					function pastMonth(m) {
						var d = new Date();
						var m = m || 1;
						var monthOfYear = d.getMonth();
						var dayOfMonth = d.getDate();
						d.setMonth(monthOfYear - m);
						d.setDate(dayOfMonth + 1);
						return getDateStr(d);
					}

					// 사용예제
					//console.log( today(), pastWeek(), pastMonth(), pastMonth(6) );
				})();

			});
		/*]]>*/</script>


		<table class="t1 w100 lhD ttpdtb1em tttac ttvam mgt0">
			<caption class="blind">
				<strong class="h1">결제정보</strong>
			</caption>
			<thead class="fsB2">
			<tr>
			<th scope="col">일자</th>
			<th scope="col"><strong class="em0">지급예정금액</strong></th>
			<th scope="col">소득세</th>
			<th scope="col">부가가치세</th>
			<th scope="col">결제수수료</th>
			<th scope="col">서비스수수료</th>
			</tr>
			</thead>
			<tbody class="cvc">
			<tr>
			<td>2021.03.09</td>
			<td><strong class="em0">33,950</strong></td>
			<td>330</td>
			<td>0</td>
			<td>330</td>
			<td>3,300</td>
			</tr>
			<tr>
			<td>2021.03.08</td>
			<td><strong class="em0">48,530</strong></td>
			<td>480</td>
			<td>0</td>
			<td>480</td>
			<td>4,800</td>
			</tr>
			<tr>
			<td>2021.03.07</td>
			<td><strong class="em0">27,160</strong></td>
			<td>270</td>
			<td>0</td>
			<td>270</td>
			<td>2,700</td>
			</tr>
			<tr>
			<td>2021.03.06</td>
			<td><strong class="em0">33,950</strong></td>
			<td>330</td>
			<td>0</td>
			<td>330</td>
			<td>3,300</td>
			</tr>
			<tr>
			<td>2021.03.05</td>
			<td><strong class="em0">48,530</strong></td>
			<td>480</td>
			<td>0</td>
			<td>480</td>
			<td>4,800</td>
			</tr>
			<tr>
			<td>2021.03.04</td>
			<td><strong class="em0">27,160</strong></td>
			<td>270</td>
			<td>0</td>
			<td>270</td>
			<td>2,700</td>
			</tr>
			</tbody>
		</table>

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
<!-- /cp1profit1 -->


<hr class="bdt1px mgt3em mgb15em" />


<!-- cp1profit1 -->
<div class="cp1profit1">
	<div class="hg1 fl w12em mgr2em width-auto-small-only">
		<h3 class="h1">정산 정보 변경</h3>
	</div>
	<div class="cont ofh">

		<input type="text" value="" placeholder="예금주" title="예금주" class="type1 w100" />
		<input type="text" value="" placeholder="은행명" title="은행명" class="type1 w100" />
		<input type="text" value="" placeholder="계좌번호" title="계좌번호" class="type1 w100" />

	</div>
	<div class="cont">

		<div class="panel1 radius cvc">
			정산 관련 안내 글 들어갈 예정<br />
			<br />
			정산 관련 안내 글 들어갈 예정  정산 관련 안내 글 들어갈 예정  정산 관련 안내 글 들어갈 예정  정산 관련 안내 글 들어갈 예정 정산 관련 안내 글 들어갈 예정 정산 관련 안내 글 들어갈 예정 정산 관련 안내 글 들어갈 예정  정산 관련 안내 글 들어갈 예정정산 관련 안내 글 들어갈 예정<br />
			<br />
			일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
			일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
			일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
			일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
		</div>

	</div>
</div>
<!-- /cp1profit1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection
