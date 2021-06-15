<!-- cp1layer1lightbox1 : 레이어박스 type3  -->
<div class="cp1layer1lightbox1 type3" id="layer1video1list1del1">
	<div class="wrap1">
		<!-- lightbox -->
		<div class="lightbox">
			<div class="wrap2">


				<!-- ★★(이 강좌가 포함하고 있는 내 영상 목록) -->
				<div class="hg1">
					<h3 class="h1">이 강좌가 포함하고 있는 내 영상 목록</h3>
					<a href="#layer1video1list1del1" class="b1 close"><i class="ic1"></i> <span class="blind">이 강좌가 포함하고 있는 내 영상 목록 창 닫기</span></a>
				</div>
				<div class="cont">

					<div class="all mgb075em fsS1">
						<input type="checkbox" name="★1checkbox0" id="★1checkbox0e0" class="dpn" /><!-- 숨김(for기획디자인) -->
						<label for="★1checkbox0e0">모두선택</label>
					</div>

					<!-- fscroll1-xy -->
					<div class="fscroll1-xy" style="max-height:20em;border-top:1px solid rgba(255,255,255, .2);">
						<!-- cp1playlist1 -->
						<div class="cp1playlist1">
							<ul class="lst1">
							<li class="li1">
								<input type="checkbox" name="★1checkbox1" id="★1checkbox1e0" />
								<label for="★1checkbox1e0">직장에서 예쁨받는 필수함수</label>
							</li>
							<li class="li1">
								<input type="checkbox" name="★1checkbox1" id="★1checkbox1e1" />
								<label for="★1checkbox1e1">조건별 합계구하기 SUMIF 함수 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</label>
							</li>
							<li class="li1">
								<input type="checkbox" name="★1checkbox1" id="★1checkbox1e2" />
								<label for="★1checkbox1e2">긍정적인 관계 에너지를 만들고 싶다</label>
							</li>
							<li class="li1">
								<input type="checkbox" name="★1checkbox1" id="★1checkbox1e3" />
								<label for="★1checkbox1e3">일러스트 강좌 #49</label>
							</li>
							<li class="li1">
								<input type="checkbox" name="★1checkbox1" id="★1checkbox1e4" />
								<label for="★1checkbox1e4">일이삼사오륙칠팔구십일이삼사오륙칠팔구십</label>
							</li>
							<li class="li1">
								<input type="checkbox" name="★1checkbox1" id="★1checkbox1e5" />
								<label for="★1checkbox1e5">일이삼사오륙칠팔구십일이삼사오륙칠팔구십</label>
							</li>
							<li class="li1">
								<input type="checkbox" name="★1checkbox1" id="★1checkbox1e6" />
								<label for="★1checkbox1e6">일이삼사오륙칠팔구십일이삼사오륙칠팔구십</label>
							</li>
							<li class="li1">
								<input type="checkbox" name="★1checkbox1" id="★1checkbox1e7" />
								<label for="★1checkbox1e7">일이삼사오륙칠팔구십일이삼사오륙칠팔구십</label>
							</li>
							<!-- <li class="li1">
								<label>
									<input type="checkbox" name="★1checkbox1" />
									<span class="t1">쌈일이삼사오륙칠팔구십일이삼사오륙칠팔구십</span>
								</label>
							</li> -->
							</ul>
						</div>
						<!-- /cp1playlist1 -->
					</div>
					<!-- /fscroll1-xy -->

					<!-- cp1confirm1 -->
					<div class="cp1confirm1">
						<i class="ic1 indy ic40notice1"></i>
						<p class="t1">
							선택하신 <span class="v1">0</span>개의 영상이 강좌에서 삭제됩니다.<br />
							삭제 하시겠습니까?<br />
						</p>
						<div class="fg1">
							<a href="#layer1video1list1del1" class="b2 close"><span class="b2t1">취소하기</span></a>
							<a href="#" class="b2 close"><span class="b2t1">삭제하기</span></a>
						</div>
					</div>
					<!-- /cp1confirm1 -->

					<script>/*<![CDATA[*/
						$(function(){

							/** ◇◆ 선택된 체크박스 전체수 + 모두선택. 20210305. 20210407. @m.
							 */
							(function(){
								var my = '#layer1video1list1del1', // 래퍼
									ck = '.cp1playlist1 input:checkbox', // 체크박스
									ack = '.all input:checkbox', // 모두선택
									v1 = '.v1'; // 선택한 수

								// 선택한 수 계산 넣기
								function numChecked(){
									//var $cks = $(my).find('[name='+ $(this).attr('name') +']');
									var $cks = $(my).find(ck);
									$(my +' '+ v1).text( $cks.filter(':checked').length );
								}							
								
								// 미래 체크박스 클릭
								$(my).on('change', ck, function(e){ // 상동 $(my).on('click', ck, function(e){}
									if( !$(this).is(':checked') ){
										$(this).closest(my).find(ack).prop('checked', false); // 전체 선택 해제
									}
									numChecked();
								});

								// 모두선택 클릭
								$(my).on('click', ack, function(e){
									if( $(this).is(':checked') ){
										$(this).closest(my).find(ck).prop('checked', true);
									}else{
										$(this).closest(my).find(ck).prop('checked', false);
									}
									numChecked();
								});

							})();

						});
					/*]]>*/</script>

				</div>
				<!-- /★★(이 강좌가 포함하고 있는 내 영상 목록) -->


			</div>
		</div>
		<!-- /lightbox -->
	</div>
</div>
<!-- /cp1layer1lightbox1 -->
