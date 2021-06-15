<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210304 | @m | 요구반영. 결함개선. 고도화.
 * ~20210305 | @m |
 */
-->
@extends('master_sub')

@section('title', '유튜버 마이페이지 - 내영상 포함 강좌')

@section('content')

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

@include('inc.common.inc_layer_sitemap')

<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="{{ route('manage.youtuber.video_management') }}" class="a1"><i class="t1">영상관리</i></a>
				<i class="sep">|</i>
				<a href="{{ route('manage.youtuber.video_management', ['type' => 'lecture']) }}" class="a1"><i class="t1">내 영상 포함 강좌</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

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


<!-- cp1select3search1 -->
<div class="cp1select3search1">
	<!-- form -->
	<form action="?#★">
		<fieldset>
			<legend class="blind"><strong class="h1">검색</strong></legend>

			<!-- cp1search1 -->
			<div class="cp1search1">
				<input type="text" value="" placeholder="검색어를 입력하세요." title="검색어" class="text" />
				<button type="submit" class="button submit search"><i class="ic1"></i><span class="t1 blind">검색</span></button>
			</div>
			<!-- /cp1search1 -->

			<!-- cp1select3 -->
			<div class="cp1select3">
				<select class="select" title="정렬">
					<option value="" selected="selected">최신순</option>
					<option value="">평점순</option>
					<option value="">수강자 많은순</option>
					<option value="">완강자 많은순</option>
				</select>
			</div>
			<!-- /cp1select3 -->

		</fieldset>
	</form>
	<!-- /form -->
</div>
<!-- /cp1select3search1 -->


<!-- cp1flist4 -->
<div class="cp1flist4">
	<ul class="lst1">
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<a href="?#★" class="w1w1w1 a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p001.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</a>
					<div class="w1w1w2">
						<a href="?#★" class="a2">
							<div class="t1">
								자동 합계로 함수 쉽게 사용하는 방법
							</div>
						</a>
						<span class="t2">
							<a href="?#★" class="a3">
								<span class="t2t1">데이터에듀</span>
							</a>
							<span class="t2t2">오늘</span>
						</span>
						<div class="t3">
							내 영상 10개 포함
						</div>
						<div class="t4">
							직장에서 예쁨받는 필수함수 &amp; 조건별 합계구하기 SUMIF 함수 &amp; 긍정적인 관계 에너지를 만들고 싶다 &amp; 일러스트 강좌 #49 …
						</div>
					</div>
				</div>
				<div class="w1w2">
					<!-- cp1menu5 -->
					<div class="cp1menu5 toggle1s1">
						<strong><a href="#" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
						<div class="cp1menu5c toggle-c">
							<a href="#layer1video1list1del1" class="b2 toggle" data-send-focus="that"><span class="b2t1">이 강좌에서 내 영상 삭제하기</span></a>
						</div>
					</div>
					<!-- /cp1menu5 -->
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<a href="?#★" class="w1w1w1 a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p002.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</a>
					<div class="w1w1w2">
						<a href="?#★" class="a2">
							<div class="t1">
								긍정적인 관계 에너지 만들고싶다.
							</div>
						</a>
						<span class="t2">
							<a href="?#★" class="a3">
								<span class="t2t1">데이터에듀</span>
							</a>
							<span class="t2t2">3일전</span>
						</span>
						<div class="t3">
							내 영상 1개 포함
						</div>
						<div class="t4">
							조건별 합계구하기 SUMIF 함수
						</div>
					</div>
				</div>
				<div class="w1w2">
					<!-- cp1menu5 -->
					<div class="cp1menu5 toggle1s1">
						<strong><a href="#" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
						<div class="cp1menu5c toggle-c">
							<a href="#layer1video1list1del1" class="b2 toggle" data-send-focus="that"><span class="b2t1">이 강좌에서 내 영상 삭제하기</span></a>
						</div>
					</div>
					<!-- /cp1menu5 -->
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<a href="?#★" class="w1w1w1 a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p003.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</a>
					<div class="w1w1w2">
						<a href="?#★" class="a2">
							<div class="t1">
								일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
							</div>
						</a>
						<span class="t2">
							<a href="?#★" class="a3">
								<span class="t2t1">데이터에듀</span>
							</a>
							<span class="t2t2">5일전</span>
						</span>
						<div class="t3">
							내 영상 10개 포함
						</div>
						<div class="t4">
							일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십 …
						</div>
					</div>
				</div>
				<div class="w1w2">
					<!-- cp1menu5 -->
					<div class="cp1menu5 toggle1s1">
						<strong><a href="#" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
						<div class="cp1menu5c toggle-c">
							<a href="#layer1video1list1del1" class="b2 toggle" data-send-focus="that"><span class="b2t1">이 강좌에서 내 영상 삭제하기</span></a>
						</div>
					</div>
					<!-- /cp1menu5 -->
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<a href="?#★" class="w1w1w1 a1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p004.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</a>
					<div class="w1w1w2">
						<a href="?#★" class="a2">
							<div class="t1">
								일이삼사오륙칠팔구십
							</div>
						</a>
						<span class="t2">
							<a href="?#★" class="a3">
								<span class="t2t1">데이터에듀</span>
							</a>
							<span class="t2t2">1개월전</span>
						</span>
						<div class="t3">
							내 영상 10개 포함
						</div>
						<div class="t4">
							일이삼사오륙칠팔구십
						</div>
					</div>
				</div>
				<div class="w1w2">
					<!-- cp1menu5 -->
					<div class="cp1menu5 toggle1s1">
						<strong><a href="#" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
						<div class="cp1menu5c toggle-c">
							<a href="#layer1video1list1del1" class="b2 toggle" data-send-focus="that"><span class="b2t1">이 강좌에서 내 영상 삭제하기</span></a>
						</div>
					</div>
					<!-- /cp1menu5 -->
				</div>
			</div>
		</li>
	</ul>
</div>
<!-- /cp1flist4 -->


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


<!-- (레이어팝업. 이 강좌에서 해당 영상 삭제하기) -->
@include('manage.youtuber.inc_layer_delete_video')

<script>/*<![CDATA[*/
	$(function(){
		// 레이어팝업 템플릿 바로 확인
		//$('[href="#layer1video1list1del1"]').first().triggerHandler('click');
	});
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
