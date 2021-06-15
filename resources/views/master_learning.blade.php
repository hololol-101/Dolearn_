<!DOCTYPE html>
<!--
/**
 * MainPage Template
 * 20201217 | @m | 최초 등록
 * 20201228 | @m | 요구반영. 결함개선. 고도화.
 * ~20210128 | @m |
 * 20210521 | @m |
 */
-->
<html lang="ko">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="DoLearn (두런)" />
<meta name="keywords" content="DoLearn, 두런" />
<meta name="description" content="DoLearn, 두런" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title') | DoLearn</title>

@include('inc.learning.learning_html_head')

</head>
<body>

@include('inc.learning.learning_head')

<!-- #wrap -->
<div id="wrap">
<!-- container -->
<div class="container clearfix">

@yield('content')

</div>
<!-- /container -->
</div>
<!-- /#wrap -->


<!-- cp1layer1lightbox1 : 레이어박스  -->
<div class="cp1layer1lightbox1" id="layer1review1">
	<div class="wrap1">
		<!-- lightbox -->
		<div class="lightbox" style="max-width:705px;">
			<div class="wrap2">


				<!-- ★★(수강후기 남기기) -->
				<div class="hg1">
					<h3 class="h1">수강후기 남기기</h3>
					<a href="#layer1review1" class="b1 close"><i class="ic1"></i> <span class="blind">수강후기 남기기 창 닫기</span></a>
				</div>
				<div class="cont">


					<!-- cp2review1write1 -->
					<div class="cp2review1write1">

						<!-- mj-rating-star -->
						<div class="mj-rating-star">
							<a href="javascript:void(0);" title="별점 1점 선택하기. 선택된 상태라면 별점 0점 선택하기" data-value="1"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 1점</span></a>
							<a href="javascript:void(0);" title="별점 2점 선택하기. 선택된 상태라면 별점 1점 선택하기" data-value="2"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 2점</span></a>
							<a href="javascript:void(0);" title="별점 3점 선택하기. 선택된 상태라면 별점 2점 선택하기" data-value="3"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 3점</span></a>
							<a href="javascript:void(0);" title="별점 4점 선택하기. 선택된 상태라면 별점 3점 선택하기" data-value="4"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 4점</span></a>
							<a href="javascript:void(0);" title="별점 5점 선택하기. 선택된 상태라면 별점 4점 선택하기" data-value="5"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 5점</span></a>
							<input type="hidden" value="0" class="mj-rating-star-input" id="rating" title="별점평가" />
						</div>
						<!-- /mj-rating-star -->

						<script>/*<![CDATA[*/
							/** ◇◆ 별클릭별점체크. 20210331. @m
							 * 한 페이지에 여러개 가능
							 */
							(function(){
								var my = $('.mj-rating-star'), // 래퍼
									m = 'a[href]', // 별 클릭
									star = '.cp1rating1star1', // 별
									iv = '.mj-rating-star-input'; // 별점값
									item = '.m'; // 아이템

								// 별 클릭
								$(my).on('click', m, function(e){
									e.preventDefault();
									var $iv = $(this).closest(my).find(iv);
									if( !$(this).is('.on') ){
										$(this).prevAll().addBack().find(star).removeClass('off');
										$(this).nextAll().find(star).addClass('off');
										$(this).addClass('on').siblings().removeClass('on');
										$iv.val( $(this).data('value') );
									}else{
										$(this).find(star).addClass('off');
										$(this).removeClass('on').prev().addClass('on').siblings().removeClass('on');
										$iv.val( $(this).data('value') - 1 );
									}
									// 별점 0점 아니면 아이템 활성
									if( !!parseInt($iv.val()) ){
										$(this).closest(item).addClass('on');
									}else{
										$(this).closest(item).removeClass('on');
									}
								});
							})();
						/*]]>*/</script>

						<textarea id="review_content" rows="5" cols="80" title="수강후기" placeholder="수강생 여러분의 생생한 후기는 강사와 다음 수강생에게 큰 도움이 됩니다!"></textarea>

						<div class="btns">
							<button type="submit" class="button primary large" onclick="saveReview()">완료하기</button>
						</div>

					</div>
					<!-- /cp2review1write1 -->


				</div>
				<!-- /★★(수강후기 남기기) -->


			</div>
		</div>
		<!-- /lightbox -->
	</div>
</div>
<!-- /cp1layer1lightbox1 -->

@include('inc.learning.learning_foot')

@yield('script')

</body>
</html>
