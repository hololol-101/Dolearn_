<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210209 | @m | 요구반영. 결함개선. 고도화.
 * ~20210209. 20210309 | @m |
 * 20210406 | @m | 요구반영
 */
-->
@extends('master_sub')

@section('title', '내 결제 - 결제정보')

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
				<a href="javascript:void(0);" class="a1"><i class="t1">내 결제</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">구매 정보</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('payment.payment_cart') }}">수강 바구니</a></li>
			<li><a href="{{ route('payment.purchase_info') }}">구매 정보</a></li>
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
<div class="infomenu1 mgt0">
	<div class="left">
		<span class="dpib vam mgr1em">
			<span class="dpib"><input type="text" value="2021.02.09" size="10" title="조회 시작일" class="date date1" /></span>
			<span class="mgl05em mgr05em fsB2 vam">~</span>
			<span class="dpib"><input type="text" value="2021.02.09" size="10" title="조회 종료일" class="date date2" /></span>
		</span>
		<span class="dpib vam">
			<a href="?#" class="button month1">1개월</a>
			<a href="?#" class="button month3">3개월</a>
			<a href="?#" class="button month6">6개월</a>
			<a href="?#" class="button month12">12개월</a>
		</span>
	</div>
	<div class="right">
		<button type="submit" class="button submit">조회하기</button>
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


<!-- cp1list1 -->
<div class="cp1list1">
	<!-- table-to-list1 -->
	<div class="table-to-list1">
		<table class="t1 w100 cve tttac tt2tal ttvam lhD tt1nowrap tt3nowrap tt4nowrap tt5nowrap">
			<caption class="blind">
				<strong class="h1">결제정보</strong>
			</caption>
			<thead class="ttpdtb1em">
			<tr>
			<th scope="col">주문일</th>
			<th scope="col">상품정보</th>
			<th scope="col">최종 결제금액</th>
			<th scope="col">진행상태</th>
			<th scope="col">결제취소</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			<td> 2021.02.09</td>
			<td>[강좌] 강좌명이 표시됩니다.</td>
			<td>00,000 원</td>
			<td>결제완료</td>
			<td>
				<a href="#layer1confirm1" class="button small toggle" data-send-focus="that"><span class="t1">취소신청</span></a>
			</td>
			</tr>
			<tr>
			<td> 2021.02.09</td>
			<td>[강좌] 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</td>
			<td>00,000 원</td>
			<td>결제완료</td>
			<td>
				<a href="#layer1confirm1" class="button small toggle" data-send-focus="that"><span class="t1">취소신청</span></a>
			</td>
			</tr>
			<tr>
			<td>2021.02.09</td>
			<td>[강좌] 강좌명이 표시됩니다.</td>
			<td>00,000 원</td>
			<td>취소완료</td>
			<td>
				<i class="button small vbh">완료</i>
			</td>
			</tr>
			<tr>
			<td>2021.02.09</td>
			<td>[강좌] 강좌명이 표시됩니다.</td>
			<td>00,000 원</td>
			<td>환불완료</td>
			<td>
				<i class="button small vbh">완료</i>
			</td>
			</tr>
			</tbody>
		</table>
	</div>
	<!-- /table-to-list1 -->
</div>
<!-- /cp1list1 -->


<div class="fsS1 tar op05">
	<ul class="dpib bi1">
	<li class="li1">강좌상품의 경우 결제일 기준 7일 초과 · 진도율 10%초과시 취소가 철회 될 수 있음을 알려드립니다.</li>
	</ul>
</div>


<!-- (레이어팝업.결제취소확인) -->
@include('payment.inc_layer_confirm')

<script>/*<![CDATA[*/
		$(function(){
			// 레이어팝업 템플릿 바로 확인
			//$('[href="#layer1confirm1"]').first().triggerHandler('click');
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
