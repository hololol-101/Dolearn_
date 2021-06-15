<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210208 | @m | 요구반영. 결함개선. 고도화.
 * ~20210209 | @m |
 * 20210406 | @m | 요구반영
 */
-->
@extends('master_sub')

@section('title', '내 결제 - 수강바구니')

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
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">수강 바구니</span> <i class="ic1"></i></a></strong>
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


<!-- form -->
<form action="?#" class="form1">
<fieldset class="mg0">
	<legend class="blind"><strong class="h1">수강바구니, 주문자 정보 입력 및 결제</strong></legend>


<!-- even-grid -->
<div class="even-grid float-left gap4pct vgap0">
	<div class="small-12 large-7 column">


		<!-- cp1cart1list1 -->
		<div class="cp1cart1list1">
			<ul class="lst1">
				<li class="li1">
					<div class="w1">
						<label class="a1">
							<span class="a1w1">
								<input type="checkbox" name="★1checkbox0" id="★1checkbox0e1" value="" checked="checked" class="check" />
							</span>
							<span class="a1w2">
								<span class="f1">
									<span class="f1p1">
										<img src="{{ asset('assets/images/lib/noimg1.png') }}" alt="이미지 없음">
									</span>
								</span>
							</span>
							<span class="a1w3">
								<span class="tg1">
									<span class="t1">
										강좌명이 표시됩니다.
									</span>
									<span class="t2">33,000원</span>
								</span>
							</span>
						</label>
						<div class="eg1">
							<button type="button" class="b1 button t1ic1"><span class="t1">바구니에서 삭제</span> <i class="ic1 del"></i></button>
						</div>
					</div>
				</li>
				<li class="li1">
					<div class="w1">
						<label class="a1">
							<span class="a1w1">
								<input type="checkbox" name="★1checkbox0" id="★1checkbox0e2" value="" class="check" />
							</span>
							<span class="a1w2">
								<span class="f1">
									<span class="f1p1">
										<img src="{{ asset('assets/images/lib/noimg1.png') }}" alt="이미지 없음">
									</span>
								</span>
							</span>
							<span class="a1w3">
								<span class="tg1">
									<span class="t1">
										일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
										일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
										일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
									</span>
									<span class="t2">11,000원</span>
								</span>
							</span>
						</label>
						<div class="eg1">
							<button type="button" class="b1 button t1ic1"><span class="t1">바구니에서 삭제</span> <i class="ic1 del"></i></button>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<!-- /cp1cart1list1 -->

		<script>/*<![CDATA[*/
			$(function(){

				/** ◇◆ 바구니에서 삭제 | 20210209. @m
				 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
				 */
				(function(){
					var my = '.cp1cart1list1',
					del = my + ' .b1';
					// 수정 클릭
					$(document).on('click', del, function(e){
						e.preventDefault();
						var isyes = confirm("해당 강좌를 바구니에서 삭제하시겠습니까?");
						if(isyes == true){
							$(this).closest('.li1').remove();
						}else{
							return false;
						}
					});
				})();

			});
		/*]]>*/</script>


	</div>
	<div class="small-12 large-5 column">


			<!-- cp1buy1 -->
			<div class="cp1buy1">
				<div class="orderer">
					<div class="item">
						<label for="★1text0">주문자명</label>
						<input type="text" id="★1text0" value="김두런" class="text-name" />
					</div>
					<div class="item">
						<label for="★1text1">휴대전화</label>
						<input type="text" id="★1text1" value="01012345678" class="text-phone" />
					</div>
					<div class="item">
						<label for="★1text2">이메일</label>
						<input type="text" id="★1text2" value="dolearn@naver.com" readonly="readonly" class="text-email bd0 bgi" />
					</div>
				</div>
				<div class="price">
					<div class="tg1">
						<span class="t1">상품금액</span>
						<span class="t2">44,000원</span>
					</div>
					<div class="tg1">
						<span class="t3">할인</span>
						<span class="t4">-2,500원</span>
					</div>
					<div class="tg1">
						<span class="t5">전체 주문금액</span>
						<span class="t6">41,500원</span>
					</div>
				</div>
				<button type="submit" class="b1 button submit block large" disabled="disabled">결제하기</button>
			</div>
			<!-- /cp1buy1 -->

	</div>
</div>
<!-- /even-grid -->


</fieldset>
</form>
<!-- /form -->


<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 모두 입력하면 전송 버튼 활성화 | 20210210. @m
		 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
		 */
		(function(){
			var $my = $('.form1'),
				$submit = $('.submit', $my); // 결제하기 버튼
			var fcs = ['.text-name', '.text-phone', '.text-email']; // 주문자명, 휴대전화, 이메일
			var $fc0 = $(fcs[0], $my),
				$fc1 = $(fcs[1], $my),
				$fc2 = $(fcs[2], $my);

			// 입력 변화
			$my.find( fcs[0] + ', ' + fcs[1] + ', ' + fcs[2] ).on('change', function(e){
				e.preventDefault();
				//console.log( $(this).val() );
				chkForm();
			});

			function chkForm(){
				if( $fc0.val() && $fc1.val() && $fc2.val() ){
					$submit.removeAttr('disabled');
				}else{
					//alert('주문자명, 휴대전화, 이메일을 모두 입력하세요!');
					$submit.attr({'disabled': 'disabled'});
				}
			}
			chkForm();

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
