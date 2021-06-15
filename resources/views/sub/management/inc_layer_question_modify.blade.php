<!-- cp1layer1lightbox1 : 레이어박스  -->
<div class="cp1layer1lightbox1" id="layer1question1edit1">
	<div class="wrap1">
		<!-- lightbox -->
		<div class="lightbox">
			<div class="wrap2">


				<!-- ★★(질문 수정) -->
				<div class="hg1">
					<h3 class="h1">질문 수정</h3>
					<a href="#layer1question1edit1" class="b1 close"><i class="ic1"></i> <span class="blind">질문 수정 창 닫기</span></a>
				</div>
				<div class="cont">
                    <input type="hidden" id="question_idx" value="">
					<input type="text" id="question_title" value="" placeholder="제목을 입력하세요." class="w100" />

					<!-- cp1write1 -->
					<div class="cp1write1">
						{{-- <div class="editor">
							<div class="mgt6em mgb6em tac">개발자 온라인 웹문서 편집기 처리 필요!</div>
						</div> --}}
                        <textarea rows="5" cols="80" title="댓글작성" id="question_content" class="w100 type1" placeholder="내용을 입력하세요."></textarea>
					</div>
					<!-- /cp1write1 -->

					<!-- infomenu1 -->
					<div class="infomenu1">
						<div class="center">
							<button type="submit" class="button submit wide" onclick="modifyQuestion()">저장하기</button>
							<a href="#layer1question1edit1" class="button secondary close wide mgl05em">취소하기</a>
						</div>
					</div>
					<!-- /infomenu1 -->

				</div>
				<!-- /★★(질문 수정) -->


			</div>
		</div>
		<!-- /lightbox -->
	</div>
</div>
<!-- /cp1layer1lightbox1 -->
