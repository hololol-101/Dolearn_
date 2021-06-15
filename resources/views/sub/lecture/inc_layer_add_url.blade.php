<!-- cp1layer1lightbox1 : 레이어박스  -->
<div class="cp1layer1lightbox1" id="layer1add1url1">
	<div class="wrap1">
		<!-- lightbox -->
		<div class="lightbox">
			<div class="wrap2">


				<!-- ★★(URL로 영상 등록) -->
				<div class="hg1">
					<h3 class="h1">URL로 영상 등록</h3>
					<a href="#layer1add1url1" class="b1 close"><i class="ic1"></i> <span class="blind">URL로 영상 등록 창 닫기</span></a>
				</div>
				<div class="cont">
					<div class="mgt2em mgb3em">
                        <!-- sample URL : https://www.youtube.com/watch?v=5AgKQCc55pQ -->
						<input type="text" value="" id="input_url" placeholder="영상 URL을 입력하고 등록하기를 눌러주세요." title="영상 URL" class="w100 type2" />
						<!-- To.@개발) 아래 안내무구. 두런 DB에 없는 영상URL을 입력했을 경우 나타남 -->
						{{-- <div class="op06">
							<ul class="bi1">
							<li class="li1">입력하신 URL은 분석이 필요한 영상으로 내용검색 및 자막의 기능 사용이 제한됩니다. 분석은 2~3일 소요되며 완료시 알림으로 알려드립니다.</li>
							</ul>
						</div> --}}
					</div>
					<button type="button" class="button primary block" onclick="addUrlToVideoList()">등록하기</button>
				</div>
				<!-- /★★(URL로 영상 등록) -->


			</div>
		</div>
		<!-- /lightbox -->
	</div>
</div>
<!-- /cp1layer1lightbox1 -->
