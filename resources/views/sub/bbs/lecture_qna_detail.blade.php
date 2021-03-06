@extends('master_sub')

@section('title', '질문게시판 - 상세')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

<!-- width1wrap1 -->
<div class="width1wrap1">

<!-- cp1view2 -->
<div class="cp1view2">

	<!-- cp1row1 -->
	<div class="cp1row1">
		<div class="column1">
			<a href="javascript:history.back();" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
		</div>
		<div class="column2">
			<!-- cp1related1 -->
			<div class="cp1related1">
				<div class="hg1">
				<span class="h1"><i class="h1ic1"></i><span class="h1t1">연관된 강의</span></span>
				</div>
				<ul class="lst1">
				<li class="li1"><a href="?#★" class="a1">강의 제목이 표시되고 클릭시, 강의 페이지로 이동합니다.</a></li>
				</ul>
			</div>
			<!-- /cp1related1 -->
		</div>
	</div>
	<!-- /cp1row1 -->

    <!-- cp1bbs4view1 -->
	<!-- 게시글 항목 item | 댓글 reply | 대댓글 reply2  -->
	<div class="cp1bbs4view1">
		<!-- 게시글 -->
		<div class="w1 item">
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
					2020 소비자가 뽑은 한국소비자만족지수 교육부분에 1위
				</div>

                <!-- # 게시자/강사에 따른 분기 필요함 : 해결/미해결 탭, 수정/삭제 버튼 -->
                <!-- # 해결 여부에 따른 분기 필요함 -->
				<span class="st1 s1">#미해결</span>
				<!-- <span class="st1 s2">#해결</span> -->

				<div class="cp1menu3">
					<a href="#" class="m m1 on">해결</a>
					<a href="#" class="m m2">미해결</a>
				</div>

				<div class="tg1">
					<span class="t1">김두런</span>
					<span class="t2">1시간전</span>
				</div>
				<div class="tg2">
					선생님~~ 제가 지금 3.9버전을 쓰는데 background = pygame.image.load("C:/Users/leeha/Desktop/ 라고 적었는데 안되요ㅠㅠ 어떻게 해야 하나요
				</div>

                <div class="eg2">
					<a href="?#★" class="a3 edit"><span class="a3t1">수정</span></a>
					<a href="?#★" class="a3 del"><span class="a3t1">삭제</span></a>
				</div>

				<div class="eg1">
					<a href="#★" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">0</span></a>
					<!-- cp1menu1 -->
					<div class="cp1menu1 toggle1s1">
						<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
						<div class="cp1menu1c toggle-c">
							<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
						</div>
					</div>
					<!-- /cp1menu1 -->
				</div>
			</div>
		</div>
		<!-- /게시글 -->
		<!-- 댓글작성 -->
		<div class="w1 item reply">
			<textarea rows="3" cols="80" title="댓글작성" class="w100 type1"></textarea>
			<div class="tar">
				<button type="submit" class="button submit semismall">등록하기</button>
			</div>
		</div>
		<!-- /댓글작성 -->
		<!-- 댓글 -->
		<div class="w1 item reply">
			<b class="g1"><i class="g1ic1"></i><span class="g1t1">강사가 채택한 답변입니다.</span></b>
			<div class="w1w1">
				<div class="f1">
					<span class="f1p1">
						<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
						<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
					</span>
				</div>
			</div>
			<div class="w1w2">
				<div class="tg1">
					<span class="t1">강사명</span>
					<span class="t2">방금</span>
				</div>
				<div class="tg2">
					질문 답변입니다.질문 답변입니다.질문 답변입니다.질문 답변입니다.질문 답변입니다.질문 답변입니다.질문 답변입니다.질문 답변입니다.질문 답변입니다.질문 답변입니다.
				</div>
				<div class="eg1">
					<a href="#★" class="cp1like2"><span class="cp1like2t1 blind">좋아요</span> <span class="cp1like2t2">0</span></a>
					<!-- cp1menu1 -->
					<div class="cp1menu1 toggle1s1">
						<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
						<div class="cp1menu1c toggle-c">
							<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
						</div>
					</div>
					<!-- /cp1menu1 -->
				</div>
				<!-- toggle1s1 -->
				<div class="toggle1s1">
					<a href="#★" class="b1 toggle-b fsS2">답글</a>
					<div class="toggle-c">
						<textarea rows="3" cols="80" title="대댓글작성" class="w100 type1"></textarea>
						<div class="tar">
							<button type="button" class="button toggle-close secondary semismall mgr05em">취소</button>
							<button type="submit" class="button submit semismall">등록</button>
						</div>
					</div>
				</div>
				<!-- /toggle1s1 -->
				<!-- toggle1s2 -->
				<div class="toggle1s2">
					<a href="#★" class="b1 toggle1s2-b cp1switch2 switch fsS2">
						<span class="cp1switch2-t1 sw-off">답글 보기</span>
						<span class="cp1switch2-t1 sw-on">답글 숨기기</span>
						<i class="ic1"></i>
					</a>
					<div class="toggle1s2-c">

						<!-- 대댓글 -->
						<div class="w1 item reply2">
							<div class="w1w1">
								<div class="f1">
									<span class="f1p1">
										<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
										<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
									</span>
								</div>
							</div>
							<div class="w1w2">
								<div class="tg1">
									<span class="t1">강사명</span>
									<span class="t2">방금</span>
								</div>
								<div class="tg2">
									좋은 평 감사합니다.
								</div>
								<div class="eg1">
									<a href="#★" class="cp1like2"><span class="cp1like2t1 blind">좋아요</span> <span class="cp1like2t2">0</span></a>
									<!-- cp1menu1 -->
									<div class="cp1menu1 toggle1s1">
										<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
										<div class="cp1menu1c toggle-c">
											<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
										</div>
									</div>
									<!-- /cp1menu1 -->
								</div>
							</div>
						</div>
						<!-- /대댓글 -->

					</div>
				</div>
				<!-- /toggle1s2 -->
			</div>
		</div>
		<!-- /댓글 -->
		<!-- 댓글 -->
		<div class="w1 item reply">
			<div class="w1w1">
				<div class="f1">
					<span class="f1p1">
						<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
						<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
					</span>
				</div>
			</div>
			<div class="w1w2">
				<div class="tg1">
					<span class="t1">누군가</span>
					<span class="t2">1시간전</span>
				</div>
				<div class="tg2">
					일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
					일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				</div>
				<div class="eg1">
					<a href="#★" class="cp1like2"><span class="cp1like2t1 blind">좋아요</span> <span class="cp1like2t2">0</span></a>
					<!-- cp1menu1 -->
					<div class="cp1menu1 toggle1s1">
						<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
						<div class="cp1menu1c toggle-c">
							<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
						</div>
					</div>
					<!-- /cp1menu1 -->
				</div>
				<!-- toggle1s1 -->
				<div class="toggle1s1">
					<a href="#★" class="b1 toggle-b fsS2">답글</a>
					<div class="toggle-c">
						<textarea rows="3" cols="80" title="대댓글작성" class="w100 type1"></textarea>
						<div class="tar">
							<button type="button" class="button toggle-close secondary semismall mgr05em">취소</button>
							<button type="submit" class="button submit semismall">등록</button>
						</div>
					</div>
				</div>
				<!-- /toggle1s1 -->
			</div>
		</div>
		<!-- /댓글 -->
	</div>
	<!-- /cp1bbs4view1 -->


</div>
<!-- /cp1view2 -->


</div>
<!-- /width1wrap1 -->


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
