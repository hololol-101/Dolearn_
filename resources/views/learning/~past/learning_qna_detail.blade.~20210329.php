<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210120 | @m | 요구반영. 결함개선. 고도화.
 * ~20210125 | @m |
 */
-->
@extends('master_learning')

@section('title', '강좌학습 - 질문 상세')

@section('content')

<? $d1n = '5'; // 1차활성 ?>

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

@include('learning.inc_video')


</div>
<!-- /container -->
</div>
<!-- /#body -->
<!-- #aside -->
<div id="aside" tabindex="-1">
<!-- aside_head -->
<div id="aside_head">
	<a href="javascript:history.back();" class="b2 back"><i class="ic1"></i><span class="t1 blind">돌아가기</span></a>
	<h2 class="h1">질문 상세</h2>
	<!-- <a href="?#★" class="a1">내 질문 모두보기</a> -->
	<a href="?#★" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- w1bottom1 -->
<div class="w1bottom1">


<!-- cp2bbs4view1 -->
<!--
	게시글 class="w1 item"
	댓글 class="w1 item reply"
	대댓글 class="w1 item reply2"
-->
<div class="cp2bbs4view1">
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
				주석을 잘 달고 싶어요
			</div>
			<!-- <span class="st1 s1">#미해결</span> -->
			<span class="st1 s2">#해결</span>
			<div class="tg1">
				<span class="t1">김두런</span>
				<span class="t2">1달전</span>
			</div>
			<div class="tg2">
				주석을 잘 달고 싶은데 어떻게 주석을 쉽게 달 수 있을까요?
			</div>
			<div class="eg1">
				<a href="#★" class="cp2like1"><span class="cp2like1t1">좋아요</span> <span class="cp2like1t2">1</span></a>
				<!-- cp2menu1 -->
				<div class="cp2menu1 toggle1s1">
					<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp2menu1c toggle-c">
						<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
					</div>
				</div>
				<!-- /cp2menu1 -->
			</div>
		</div>
	</div>
	<!-- /게시글 -->
	<!-- 댓글작성 -->
	<div class="w1 item reply">
		<textarea rows="3" cols="80" title="댓글작성"></textarea>
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
				<a href="#★" class="cp2like2"><span class="cp2like2t1 blind">좋아요</span> <span class="cp2like2t2">0</span></a>
				<!-- cp2menu1 -->
				<div class="cp2menu1 toggle1s1">
					<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp2menu1c toggle-c">
						<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
					</div>
				</div>
				<!-- /cp2menu1 -->
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
				<a href="#★" class="b1 toggle1s2-b cp2switch2 switch fsS2">
					<span class="cp2switch2-t1 sw-off">답글 보기</span>
					<span class="cp2switch2-t1 sw-on">답글 숨기기</span>
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
								<a href="#★" class="cp2like2"><span class="cp2like2t1 blind">좋아요</span> <span class="cp2like2t2">0</span></a>
								<!-- cp2menu1 -->
								<div class="cp2menu1 toggle1s1">
									<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
									<div class="cp2menu1c toggle-c">
										<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
									</div>
								</div>
								<!-- /cp2menu1 -->
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
				<a href="#★" class="cp2like2"><span class="cp2like2t1 blind">좋아요</span> <span class="cp2like2t2">0</span></a>
				<!-- cp2menu1 -->
				<div class="cp2menu1 toggle1s1">
					<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp2menu1c toggle-c">
						<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
					</div>
				</div>
				<!-- /cp2menu1 -->
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
<!-- /cp2bbs4view1 -->


</div>
<!-- /aside_content -->
</div>
<!-- /#aside -->

@endsection
