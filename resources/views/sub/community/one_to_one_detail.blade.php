<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210316 | @m | 요구반영. 결함개선. 고도화.
 * ~20210316 | @m |
 * 20210324 | @m | 신고하기 레이어팝업 추가
 */
-->
@extends('master_sub')

@section('title', '커뮤니티 - 1:1 문의 상세')

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


	<!-- cp1bbs4view1 type2 -->
	<!-- 게시글 항목 item | 댓글 reply | 대댓글 reply2  -->
	<div class="cp1bbs4view1 type2">
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
					질문 제목이 표시 일이삼사오육?
				</div>
				<div class="tg1">
					<span class="t1">김두런</span>
					<span class="t2">1달전</span>
				</div>
				<div class="tg2">
					선생님~~ 제가 지금 3.9버전을 쓰는데 background = pygame.image.load("C:/Users/leeha/Desktop/ 라고 적었는데 안되요ㅠㅠ 어떻게 해야 하나요
					선생님~~ 제가 지금 3.9버전을 쓰는데 background = pygame.image.load("C:/Users/leeha/Desktop/ 라고 적었는데 안되요ㅠㅠ 어떻게 해야 하나요
					선생님~~ 제가 지금 3.9버전을 쓰는데 background = pygame.image.load("C:/Users/leeha/Desktop/ 라고 적었는데 안되요ㅠㅠ 어떻게 해야 하나요????
				</div>
				<div class="eg1">
					<a href="#★" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">0</span></a>
					<!-- cp1menu1 -->
					<div class="cp1menu1 toggle1s1">
						<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
						<div class="cp1menu1c toggle-c">
							<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
						</div>
					</div>
					<!-- /cp1menu1 -->
				</div>
			</div>
		</div>
		<!-- /게시글 -->
		<!-- 댓글작성 -->
		{{-- <div class="w1 item reply">
			<textarea rows="3" cols="80" title="댓글작성" placeholder="댓글을 입력하세요." class="w100 type1"></textarea>
			<div class="tar">
				<button type="submit" class="button submit semismall">등록하기</button>
			</div>
		</div> --}}
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
							<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
						</div>
					</div>
					<!-- /cp1menu1 -->
				</div>
			</div>
		</div>
		<!-- /댓글 -->
	</div>
	<!-- /cp1bbs4view1 type2 -->


</div>
<!-- /cp1view2 -->


</div>
<!-- /width1wrap1 -->


 <!-- (레이어팝업) -->
 @include('sub.lecture.inc_layer_report_post')





</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
