<!-- cp1layer1lightbox1 : 레이어박스  -->
<div class="cp1layer1lightbox1" id="layer1interests1set1">
	<div class="wrap1">
		<!-- lightbox -->
		<div class="lightbox" style="max-width:1000px;">
			<div class="wrap2">
				<!-- ★★(관심분야 설정) -->
				<div class="hg1">
					<h3 class="h1">관심분야 설정</h3>
					<a href="#layer1interests1set1" class="b1 close" onclick="exitClick()"><i class="ic1" ></i> <span class="blind">관심분야 설정 창 닫기</span></a>
				</div>
                <form method="POST" action="{{ route('account.interest_set') }}" onsubmit="beforeClick()">
                    @csrf
				<div class="cont">
					<!-- cp1interests1set1 -->
					<div class="cp1interests1set1">
						<div class="tac wbka">
							<p class="mg0 fsB12">꼭 맞는 강좌와 영상을 추천해드릴께요!</p>
							<p class="mgt1em mgb2em cvc">분야를 선택하고 관심도를 설정해주세요.</p>
						</div>
						<div class="fscroll1-xy">
							<ul class="mns">
								<li class="m m1" tabindex="0">
									<div class="w1">
										<i class="m-ic1"></i>
										<span class="t1">웹개발</span>
										<!-- mj-rating-star -->
										<div class="mj-rating-star">
											<a href="#?" title="별점 1점 선택하기. 선택된 상태라면 별점 0점 선택하기" data-value="1"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 1점</span></a>
											<a href="#?" title="별점 2점 선택하기. 선택된 상태라면 별점 1점 선택하기" data-value="2"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 2점</span></a>
											<a href="#?" title="별점 3점 선택하기. 선택된 상태라면 별점 2점 선택하기" data-value="3"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 3점</span></a>
											<a href="#?" title="별점 4점 선택하기. 선택된 상태라면 별점 3점 선택하기" data-value="4"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 4점</span></a>
											<a href="#?" title="별점 5점 선택하기. 선택된 상태라면 별점 4점 선택하기" data-value="5"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 5점</span></a>
											<input type="hidden" value="0" class="mj-rating-star-input" title="별점평가" />
										</div>
										<!-- /mj-rating-star -->
									</div>
								</li>
								<li class="m m2" tabindex="0">
									<div class="w1">
										<i class="m-ic1"></i>
										<span class="t1">모바일개발</span>
										<!-- mj-rating-star -->
										<div class="mj-rating-star">
											<a href="#?" title="별점 1점 선택하기. 선택된 상태라면 별점 0점 선택하기" data-value="1"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 1점</span></a>
											<a href="#?" title="별점 2점 선택하기. 선택된 상태라면 별점 1점 선택하기" data-value="2"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 2점</span></a>
											<a href="#?" title="별점 3점 선택하기. 선택된 상태라면 별점 2점 선택하기" data-value="3"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 3점</span></a>
											<a href="#?" title="별점 4점 선택하기. 선택된 상태라면 별점 3점 선택하기" data-value="4"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 4점</span></a>
											<a href="#?" title="별점 5점 선택하기. 선택된 상태라면 별점 4점 선택하기" data-value="5"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 5점</span></a>
											<input type="hidden" value="0" class="mj-rating-star-input" title="별점평가" />
										</div>
										<!-- /mj-rating-star -->
									</div>
								</li>
								<li class="m m3" tabindex="0">
									<div class="w1">
										<i class="m-ic1"></i>
										<span class="t1">프로그래밍 언어</span>
										<!-- mj-rating-star -->
										<div class="mj-rating-star">
											<a href="#?" title="별점 1점 선택하기. 선택된 상태라면 별점 0점 선택하기" data-value="1"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 1점</span></a>
											<a href="#?" title="별점 2점 선택하기. 선택된 상태라면 별점 1점 선택하기" data-value="2"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 2점</span></a>
											<a href="#?" title="별점 3점 선택하기. 선택된 상태라면 별점 2점 선택하기" data-value="3"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 3점</span></a>
											<a href="#?" title="별점 4점 선택하기. 선택된 상태라면 별점 3점 선택하기" data-value="4"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 4점</span></a>
											<a href="#?" title="별점 5점 선택하기. 선택된 상태라면 별점 4점 선택하기" data-value="5"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 5점</span></a>
											<input type="hidden" value="0" class="mj-rating-star-input" title="별점평가" />
										</div>
										<!-- /mj-rating-star -->
									</div>
								</li>
								<li class="m m4" tabindex="0">
									<div class="w1">
										<i class="m-ic1"></i>
										<span class="t1">데이터분석</span>
										<!-- mj-rating-star -->
										<div class="mj-rating-star">
											<a href="#?" title="별점 1점 선택하기. 선택된 상태라면 별점 0점 선택하기" data-value="1"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 1점</span></a>
											<a href="#?" title="별점 2점 선택하기. 선택된 상태라면 별점 1점 선택하기" data-value="2"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 2점</span></a>
											<a href="#?" title="별점 3점 선택하기. 선택된 상태라면 별점 2점 선택하기" data-value="3"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 3점</span></a>
											<a href="#?" title="별점 4점 선택하기. 선택된 상태라면 별점 3점 선택하기" data-value="4"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 4점</span></a>
											<a href="#?" title="별점 5점 선택하기. 선택된 상태라면 별점 4점 선택하기" data-value="5"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 5점</span></a>
											<input type="hidden" value="0" class="mj-rating-star-input" title="별점평가" />
										</div>
										<!-- /mj-rating-star -->
									</div>
								</li>
								<li class="m m5" tabindex="0">
									<div class="w1">
										<i class="m-ic1"></i>
										<span class="t1">인공지능</span>
										<!-- mj-rating-star -->
										<div class="mj-rating-star">
											<a href="#?" title="별점 1점 선택하기. 선택된 상태라면 별점 0점 선택하기" data-value="1"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 1점</span></a>
											<a href="#?" title="별점 2점 선택하기. 선택된 상태라면 별점 1점 선택하기" data-value="2"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 2점</span></a>
											<a href="#?" title="별점 3점 선택하기. 선택된 상태라면 별점 2점 선택하기" data-value="3"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 3점</span></a>
											<a href="#?" title="별점 4점 선택하기. 선택된 상태라면 별점 3점 선택하기" data-value="4"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 4점</span></a>
											<a href="#?" title="별점 5점 선택하기. 선택된 상태라면 별점 4점 선택하기" data-value="5"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 5점</span></a>
											<input type="hidden" value="0" class="mj-rating-star-input" title="별점평가" />
										</div>
										<!-- /mj-rating-star -->
									</div>
								</li>
								<li class="m m6" tabindex="0">
									<div class="w1">
										<i class="m-ic1"></i>
										<span class="t1">데이터베이스</span>
										<!-- mj-rating-star -->
										<div class="mj-rating-star">
											<a href="#?" title="별점 1점 선택하기. 선택된 상태라면 별점 0점 선택하기" data-value="1"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 1점</span></a>
											<a href="#?" title="별점 2점 선택하기. 선택된 상태라면 별점 1점 선택하기" data-value="2"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 2점</span></a>
											<a href="#?" title="별점 3점 선택하기. 선택된 상태라면 별점 2점 선택하기" data-value="3"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 3점</span></a>
											<a href="#?" title="별점 4점 선택하기. 선택된 상태라면 별점 3점 선택하기" data-value="4"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 4점</span></a>
											<a href="#?" title="별점 5점 선택하기. 선택된 상태라면 별점 4점 선택하기" data-value="5"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 5점</span></a>
											<input type="hidden" value="0" class="mj-rating-star-input" title="별점평가" />
										</div>
										<!-- /mj-rating-star -->
									</div>
								</li>
								<li class="m m7" tabindex="0">
									<div class="w1">
										<i class="m-ic1"></i>
										<span class="t1">유아교육</span>
										<!-- mj-rating-star -->
										<div class="mj-rating-star">
											<a href="#?" title="별점 1점 선택하기. 선택된 상태라면 별점 0점 선택하기" data-value="1"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 1점</span></a>
											<a href="#?" title="별점 2점 선택하기. 선택된 상태라면 별점 1점 선택하기" data-value="2"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 2점</span></a>
											<a href="#?" title="별점 3점 선택하기. 선택된 상태라면 별점 2점 선택하기" data-value="3"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 3점</span></a>
											<a href="#?" title="별점 4점 선택하기. 선택된 상태라면 별점 3점 선택하기" data-value="4"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 4점</span></a>
											<a href="#?" title="별점 5점 선택하기. 선택된 상태라면 별점 4점 선택하기" data-value="5"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 5점</span></a>
											<input type="hidden" value="0" class="mj-rating-star-input" title="별점평가" />
										</div>
										<!-- /mj-rating-star -->
									</div>
								</li>
								<li class="m m8" tabindex="0">
									<div class="w1">
										<i class="m-ic1"></i>
										<span class="t1">초등교육</span>
										<!-- mj-rating-star -->
										<div class="mj-rating-star">
											<a href="#?" title="별점 1점 선택하기. 선택된 상태라면 별점 0점 선택하기" data-value="1"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 1점</span></a>
											<a href="#?" title="별점 2점 선택하기. 선택된 상태라면 별점 1점 선택하기" data-value="2"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 2점</span></a>
											<a href="#?" title="별점 3점 선택하기. 선택된 상태라면 별점 2점 선택하기" data-value="3"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 3점</span></a>
											<a href="#?" title="별점 4점 선택하기. 선택된 상태라면 별점 3점 선택하기" data-value="4"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 4점</span></a>
											<a href="#?" title="별점 5점 선택하기. 선택된 상태라면 별점 4점 선택하기" data-value="5"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 5점</span></a>
											<input type="hidden" value="0" class="mj-rating-star-input" title="별점평가" />
										</div>
										<!-- /mj-rating-star -->
									</div>
								</li>
								<li class="m m9" tabindex="0">
									<div class="w1">
										<i class="m-ic1"></i>
										<span class="t1">직무능력</span>
										<!-- mj-rating-star -->
										<div class="mj-rating-star">
											<a href="#?" title="별점 1점 선택하기. 선택된 상태라면 별점 0점 선택하기" data-value="1"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 1점</span></a>
											<a href="#?" title="별점 2점 선택하기. 선택된 상태라면 별점 1점 선택하기" data-value="2"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 2점</span></a>
											<a href="#?" title="별점 3점 선택하기. 선택된 상태라면 별점 2점 선택하기" data-value="3"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 3점</span></a>
											<a href="#?" title="별점 4점 선택하기. 선택된 상태라면 별점 3점 선택하기" data-value="4"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 4점</span></a>
											<a href="#?" title="별점 5점 선택하기. 선택된 상태라면 별점 4점 선택하기" data-value="5"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 5점</span></a>
											<input type="hidden" value="0" class="mj-rating-star-input" title="별점평가" />
										</div>
										<!-- /mj-rating-star -->
									</div>
								</li>
								<li class="m m10" tabindex="0">
									<div class="w1">
										<i class="m-ic1"></i>
										<span class="t1">금융 · 경영</span>
										<!-- mj-rating-star -->
										<div class="mj-rating-star">
											<a href="#?" title="별점 1점 선택하기. 선택된 상태라면 별점 0점 선택하기" data-value="1"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 1점</span></a>
											<a href="#?" title="별점 2점 선택하기. 선택된 상태라면 별점 1점 선택하기" data-value="2"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 2점</span></a>
											<a href="#?" title="별점 3점 선택하기. 선택된 상태라면 별점 2점 선택하기" data-value="3"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 3점</span></a>
											<a href="#?" title="별점 4점 선택하기. 선택된 상태라면 별점 3점 선택하기" data-value="4"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 4점</span></a>
											<a href="#?" title="별점 5점 선택하기. 선택된 상태라면 별점 4점 선택하기" data-value="5"><i class="cp1rating1star1 off"><i class="ic1"></i><i class="ic2"></i></i><span class="blind">별 5점</span></a>
											<input type="hidden" value="0" class="mj-rating-star-input" title="별점평가" />
										</div>
										<!-- /mj-rating-star -->
									</div>
								</li>
							</ul>
						</div>


                        <button type="submit" class="b1 button" id="subbtn">설정완료</button>
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
                                        $iv.attr('name',$(this).parent().siblings('.t1').html());
									}else{
										$(this).closest(item).removeClass('on');
                                        $iv.removeAttr('name');
									}
								});
							})();
						/*]]>*/</script>

					</div>
					<!-- /cp1interests1set1 -->
				</div>
				<!-- /★★(관심분야 설정) -->
            </form>

			</div>
		</div>
		<!-- /lightbox -->
	</div>
</div>
<!-- /cp1layer1lightbox1 -->
<script>
    function beforeClick(){
        if(typeof(joinemail)!='undefined'&&typeof(joinrole)!='undefined'){
            $('.cont').append('<input type="hidden" name="email" value="'+joinemail+'">');
            $('.cont').append('<input type="hidden" name="role" value="'+joinrole+'">');
        }
    }
    function exitClick(){
        if(typeof(joinemail)!='undefined'&&typeof(joinrole)!='undefined'){ //회원가입 후 X 클릭
            location.reload(true);
        }else{ //로그인 후 X 클릭
            //별 버튼 초기화
            var nowM = $('.cp1interests1set1 .m1');
            var star = '.cp1rating1star1';  // 별 class명
            for(var i=0;i<$('.m .w1 .t1').length;i++){
                    rating_star= nowM.find('.mj-rating-star').children().last();
                    rating_star.addBack().find(star).removeClass('on');
                    rating_star.addBack().find(star).addClass('off');

                    nowM.removeClass('on');
                    nowM.find('.mj-rating-star-input').val(0);
                    nowM.find('.mj-rating-star-input').removeAttr('name');
                    nowM=nowM.next();
            }
            setting();
        }
    }
    function setting(){
        @if (isset($interest_arr))
            var obj = @json($interest_arr);
            var star = '.cp1rating1star1';  // 별 class명
            var nowM = $('.cp1interests1set1 .m1');

            for(var i=0;i<$('.m .w1 .t1').length;i++){
                name = nowM.find('.t1').text();

                //분야명이 db에 저장된 interest에 있을 경우
                if(Object.keys(obj).includes(name)){
                    count = obj[name]['score']/20;

                    rating_star= nowM.find('.mj-rating-star').children().first();

                    for(i=0;i<5;i++){
                        if(rating_star.data('value')==count){
                            rating_star.prevAll().addBack().find(star).removeClass('off');
                            rating_star.nextAll().find(star).addClass('off');
                            rating_star.addClass('on').siblings().removeClass('on');

                            nowM.addClass('on');
                            break;
                        }
                        rating_star = rating_star.next();
                    }

                    nowM.find('.mj-rating-star-input').val(count);
                    nowM.find('.mj-rating-star-input').attr('name', name);
                }

                nowM=nowM.next();
            }
        @endif
    }
    $(function(){
        setting();
    })

</script>
