	<!-- <hr class="bdt1px mgt3em mgb2em" /> -->

	<h3 class="hb1 h1 tac">질문게시판</h3>


	<!-- even-grid -->
	<div class="even-grid float-left gap2pct">
		<div class="small-12 medium-6 column">
			<!-- cp1search1 -->
			<div class="cp1search1" style="max-width:320px;">
				<input type="text" value="검색어를 입력하세요." placeholder="검색어를 입력하세요." title="검색어" onfocus="if( this.value == this.defaultValue ) this.value=''; this.select();" onblur="if( this.value=='' ) this.value=this.defaultValue;" class="text">
				<button type="submit" class="button submit search"><i class="ic1"></i><span class="t1 blind">검색</span></button>
			</div>
			<!-- /cp1search1 -->
		</div>
		<div class="small-12 medium-6 column tar">
			<a href="#layer1question1" class="button primary toggle" data-send-focus="that">질문하기</a>
		</div>
	</div>
	<!-- /even-grid -->


	<!-- cp1bbs2list1 -->
	<div class="cp1bbs2list1">
		<ul class="lst1">
			<li class="li1">
				<a href="{{ route('sub.bbs.lecture_qna_detail', ['id' => '']) }}" class="w1 a1">
					<div class="w1w1">
						<div class="f1">
							<span class="f1p1">
								<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
								<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
							</span>
						</div>
					</div>
					<div class="w1w2">
						<div class="tt1">
							Q. 함수 코드 좀 봐주세요!
						</div>
						<span class="st1 s1">#미해결</span>
						<!-- <span class="st1 s2">#해결</span> -->
						<div class="tg1">
							<span class="t1">김두런</span>
							<span class="t2">1시간전</span>
						</div>
						<div class="tg2">
							<span class="t4">댓글 3개</span>
						</div>
					</div>
				</a>
				<div class="eg1">
					<a href="javascript:void(0);" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">15</span></a>
				</div>
			</li>
			<li class="li1">
				<a href="{{ route('sub.bbs.lecture_qna_detail', ['id' => '']) }}" class="w1 a1">
					<div class="w1w1">
						<div class="f1">
							<span class="f1p1">
								<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
								<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
							</span>
						</div>
					</div>
					<div class="w1w2">
						<div class="tt1">
							Q. 영상을 보다가 이해가 안가는 부분이 있어요.
						</div>
						<span class="st1 s1">#미해결</span>
						<!-- <span class="st1 s2">#해결</span> -->
						<div class="tg1">
							<span class="t1">이두런</span>
							<span class="t2">1달전</span>
						</div>
						<div class="tg2">
							<span class="t4">댓글 3개</span>
						</div>
					</div>
				</a>
				<div class="eg1">
					<a href="javascript:void(0);" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">6</span></a>
				</div>
			</li>
		</ul>
	</div>
	<!-- /cp1bbs2list1 -->


	<!-- infomenu1 -->
	<div class="infomenu1">

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

		<!-- <p class="left">
			<a href="?" onclick="history.go(-1); return false;" class="button default">이전</a>
		</p>
		<p class="right">
			<a href="?" class="button">글작성</a>
		</p> -->

	</div>
	<!-- /infomenu1 -->
