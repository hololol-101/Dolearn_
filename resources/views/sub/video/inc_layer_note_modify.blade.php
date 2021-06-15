<!-- cp1layer1lightbox1 : 레이어박스  -->
<div class="cp1layer1lightbox1 modal" id="layer1note1edit1">
	<div class="wrap1">
		<!-- lightbox -->
		<div class="lightbox">
			<div class="wrap2">


				<!-- ★★(노트 수정) -->
				<div class="hg1">
					<h3 class="h1">노트 수정</h3>
					<a href="#layer1note1edit1" class="b1 close"><i class="ic1"></i> <span class="blind">노트 수정 창 닫기</span></a>
				</div>
				<div class="cont">
                    <input type="hidden" id="note_idx" value="">
					<!-- cp1note1edit1 -->
					<div class="cp1note1edit1">
						<div class="tg1">
							<span class="t1"><i class="t1ic1"></i> <span class="t1t1" id="video_time">02 : 22</span></span>
							<div class="eg1">
								<a href="javascript:void(0);" class="button submit mgl05em" onclick="modifyNote()">저장하기</a>
								<a href="#layer1note1edit1" class="button secondary mgl05em close">취소하기</a>
							</div>
						</div>
						<!-- cp1write1 -->
						{{-- <div class="cp1write1">
							<div class="editor">

							</div>
						</div> --}}
                        <textarea class="textarea" id="note_content"></textarea>
						<!-- /cp1write1 -->
						{{-- <textarea class="textarea" id="ori_note_content" title="강좌 노트 수정" disabled>숫자와 문자 셀을 세는 함수= COUNTA</textarea> --}}
					</div>
					<!-- /cp1note1edit1 -->

				</div>
				<!-- /★★(노트 수정) -->


			</div>
		</div>
		<!-- /lightbox -->
	</div>
</div>
<!-- /cp1layer1lightbox1 -->
