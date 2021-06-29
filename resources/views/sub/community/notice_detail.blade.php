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
					{{ $boardView->subject }}
				</div>
				<div class="tg1">
					<span class="t1">{{ $boardView->name }}</span>
					<span class="t2">{{ date('Y.m.d',$boardView->regdate) }}</span>
				</div>
				<div class="tg2">
                    {!! $boardView->content !!}
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
        @include('sub.comment.form')        
        <div id="commentSrc"></div>
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