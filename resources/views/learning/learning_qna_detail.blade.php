<!-- aside_head -->
<div id="aside_head">
	<a href="javascript:void(0);" class="b2 back" onclick="goBackAndLoadPage()"><i class="ic1"></i><span class="t1 blind">돌아가기</span></a>
	<h2 class="h1">질문 상세</h2>
	<!-- <a href="?#★" class="a1">내 질문 모두보기</a> -->
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
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
				{{ $myQuestionInfo->title }}
			</div>
            @if ($myQuestionInfo->solution_yn == 'N')
			<span class="st1 s1">#미해결</span>
            @else
			<span class="st1 s2">#해결</span>
            @endif
			<div class="tg1">
				<span class="t1">{{ $myQuestionInfo->writer_name }}</span>
                {{-- TODO: --}}
				<span class="t2">1달전</span>
			</div>
			<div class="tg2">
				{{ $myQuestionInfo->content }}
			</div>
			<div class="eg1">
				<a href="javascript:void(0);" class="cp2like1"><span class="cp2like1t1">좋아요</span> <span class="cp2like1t2">{{ $myQuestionInfo->like_cnt }}</span></a>
				<!-- cp2menu1 -->
				<div class="cp2menu1 toggle1s1">
					<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp2menu1c toggle-c">
						<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
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
						<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
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
										<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
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
				<a href="javascript:void(0);" class="cp2like2"><span class="cp2like2t1 blind">좋아요</span> <span class="cp2like2t2">0</span></a>
				<!-- cp2menu1 -->
				<div class="cp2menu1 toggle1s1">
					<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp2menu1c toggle-c">
						<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
					</div>
				</div>
				<!-- /cp2menu1 -->
			</div>
			<!-- toggle1s1 -->
			<div class="toggle1s1">
				<a href="javascript:void(0);" class="b1 toggle-b fsS2">답글</a>
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


<!-- (레이어팝업) -->
@include('sub.lecture.inc_layer_report_post')


</div>
<!-- /aside_content -->

<script>
$(function() {
    // 20210521. 토글 버튼이 Ajax 로 불러와 기능이 안되서 지연 재호출
    setTimeout(function(){
        MJS.doToggle();
    }, 100);
});

function goBackAndLoadPage() {
    $('#aside').load('/learning/qna?idx={{ $myQuestionInfo->lecture_idx }}&uid={{ $myQuestionInfo->video_id }}');
}
</script>
