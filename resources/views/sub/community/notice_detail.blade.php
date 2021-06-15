<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210311 | @m | 요구반영. 결함개선. 고도화.
 * ~20210316 | @m |
 */
-->
@extends('master_sub')

@section('title', '커뮤니티 - 공지사항(상세)')

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
				<div class="tg1">
					<span class="t1">데이터에듀</span>
					<span class="t2">1시간전</span>
				</div>
				<div class="tg2">
					빅데이터 교육 No.1, 데이터에듀가<br />
					2020 소비자가 뽑은 한국소비자만족지수 교육부분에 1위를 수상했습니다.<br />
					<br />
					여러분의 성원에 감사드리며,<br />
					더욱더 발전하는 데이터에듀가 되기 위해 최선을 다하겠습니다.<br />
					<br />
					https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=004&oid=050&aid=0000055489<br />
				</div>
				<div class="eg1">
					<a href="#★" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">0</span></a>
					<!-- cp1menu1 -->
					<div class="cp1menu1 toggle1s1">
						<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
						<div class="cp1menu1c toggle-c">
							<a href="#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
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
						<textarea rows="3" cols="80" title="대댓글작성"></textarea>
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
						<textarea rows="3" cols="80" title="대댓글작성"></textarea>
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
