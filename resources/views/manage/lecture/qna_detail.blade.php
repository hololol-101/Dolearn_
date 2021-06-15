<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210520 | @m | 요구반영. 결함개선. 고도화.
 * 20210521 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 질문 상세')

@section('content')

<? $d1n = '3'; $d2n = '2'; // 1차2차활성 ?>

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">


<!-- body_title -->
<div id="body_title">
	<div class="hg1">
		<i class="ic1"></i>
		<h2 class="h1">질문 리스트</h2>
	</div>
	<div class="eg1">
	</div>
</div>
<!-- /body_title -->


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1row1 -->
<div class="cp1row1">
	<div class="column1">
		<a href="javascript:void(0);" onclick="history.go(-1); return false;" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
	</div>
	<div class="column2">
		<!-- cp1related1 -->
		<div class="cp1related1">
			<div class="hg1">
                <span class="h1"><i class="h1ic1"></i><span class="h1t1">연관된 강의</span></span>
			</div>
			<ul class="lst1">
			<li class="li1"><a href="{{ route('learning.main', ['idx' => $_GET['idx'], 'uid' => $qnaInfo->video_id]) }}" class="a1">{{ $qnaInfo->new_video_title }}</a></li>
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
					<!-- <img src="{{ asset('assets/images/main/x1/x1p601.jpg') }}" alt="★대체텍스트필수" /> -->
					<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
				</span>
			</div>
		</div>
		<div class="w1w2">
			<div class="tt1">
				{{ $qnaInfo->title }}
			</div>
            @if ($qnaInfo->solution_yn == 'N')
			<span class="st1 s1">#미해결</span>
            @else
			<span class="st1 s2">#해결</span>
            @endif
			<div class="tg1">
				<span class="t1">{{ $qnaInfo->writer_name }}</span>
                {{-- TODO: 질문 작성 시간 계산 --}}
                @php
                    // 지난 시간 계산 함수
                    function format_date($time){
                        $t=time()-$time;
                        $f=array(
                            '31536000'=>'년',
                            '2592000'=>'개월',
                            '604800'=>'주',
                            '86400'=>'일',
                            '3600'=>'시간',
                            '60'=>'분',
                            '1'=>'초'
                        );
                        foreach ($f as $k=>$v)    {
                            if (0 !=$c=floor($t/(int)$k)) {
                                return $c.$v.'전';
                            }
                        }
                    }
                    $result = format_date(strtotime($qnaInfo->writed_at));
                @endphp
				<span class="t2">{{ $result }}</span>
			</div>
			<div class="tg2">
				{{ $qnaInfo->content }}
			</div>
			<div class="eg1">
				<a href="javascript:void(0);" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">{{ $qnaInfo->like_cnt }}</span></a>
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
					<!-- <img src="{{ asset('assets/images/main/x1/x1p601.jpg') }}" alt="★대체텍스트필수" /> -->
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
					<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp1menu1c toggle-c">
						<a href="#★" class="b2 pin"><i class="b2ic1"></i><span class="b2t1">고정하기</span></a>
						<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
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
									<!-- <img src="{{ asset('assets/images/main/x1/x1p601.jpg') }}" alt="★대체텍스트필수" /> -->
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
									<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
									<div class="cp1menu1c toggle-c">
										<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
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
					<!-- <img src="{{ asset('assets/images/main/x1/x1p601.jpg') }}" alt="★대체텍스트필수" /> -->
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
					<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp1menu1c toggle-c">
						<a href="#★" class="b2 pin"><i class="b2ic1"></i><span class="b2t1">고정하기</span></a>
						<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
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


<!-- (레이어팝업) -->
<?php include $_SERVER['DOCUMENT_ROOT']."/_res/dolearn/html/sub/inc_layer1report1post1.php"; ?>


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection
