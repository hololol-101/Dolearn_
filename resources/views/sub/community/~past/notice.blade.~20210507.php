<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210311 | @m | 요구반영. 결함개선. 고도화.
 * ~20210311 | @m |
 */
-->
@extends('master_sub')

@section('title', '커뮤니티 - 공지사항')

@section('content')
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

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="javascript:void(0);" class="a1"><i class="t1">커뮤니티</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">공지사항</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li class="on"><a href="{{ route('sub.community.notice') }}">공지사항</a></li>
			<li><a href="{{ route('sub.community.trend') }}">인사이트</a></li>
			<li><a href="?#">서비스문의</a></li>
			<li><a href="?#">수강후기 모아보기</a></li>
			</ul>
		</div>
		<!-- /lnb1c -->
	</div>
	<!-- lnb1 -->
	<script>/*<![CDATA[*/
		$(function(){
			/** ◇◆ 목록앵커 클릭하면 활성 메뉴를 제목에 표시. 링크 이동. 20210111. @m
			 */
			(function(){
				var $my = $('#lnb1'),
					$m = $('li>a[href]', $my);
				// 현재활성
				$m.each(function(){
					if( $(this).closest('li').is('.on') ){
						$('.h1 .t1', $my).text( $(this).text() );
					}
				});
				// 클릭
				$m.on('click', function(e){
					//e.preventDefault();
					$('.toggle', $my).triggerHandler('click'); // 토글 닫기
					$('.h1 .t1', $my).text( $(this).text() );
					return; // 링크 이동
				});
			})();
		});
	/*]]>*/</script>

</div>
<!-- /body_title -->


<!-- cp1infomenu1 -->
<div class="cp1infomenu1">
	<div class="w1">
	</div>
	<div class="w2">

		<select class="select" title="선택옵션">
			<option value="">최신순</option>
			<option value="">좋아요수</option>
			<option value="">조회수</option>
		</select>

	</div>
</div>
<!-- /cp1infomenu1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1bbs4list1 -->
<div class="cp1bbs4list1">
	<ul class="lst1">
		<li class="li1">
			<a href="{{ route('sub.community.notice_detail', ['id' => '']) }}" class="a1">
				<b class="g1 s1">필독</b>
				<div class="t1">
					[안내] 함께 성장하는 좋은 질문 작성법
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="{{ route('sub.community.notice_detail', ['id' => '']) }}" class="a1">
				<b class="g1 s1">필독</b>
				<div class="t1">
					[두런 소식] 새로운 유튜브 강의 추가
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="{{ route('sub.community.notice_detail', ['id' => '']) }}" class="a1">
				<b class="g1 s2">공지</b>
				<div class="t1">
					[업데이트 소식] 강의 배속 기능 추가
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="{{ route('sub.community.notice_detail', ['id' => '']) }}" class="a1">
				<b class="g1 s2">공지</b>
				<div class="t1">
					일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="{{ route('sub.community.notice_detail', ['id' => '']) }}" class="a1">
				<b class="g1 s2">공지</b>
				<div class="t1">
					일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="{{ route('sub.community.notice_detail', ['id' => '']) }}" class="a1">
				<b class="g1 s2">공지</b>
				<div class="t1">
					일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="{{ route('sub.community.notice_detail', ['id' => '']) }}" class="a1">
				<b class="g1 s2">공지</b>
				<div class="t1">
					일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="{{ route('sub.community.notice_detail', ['id' => '']) }}" class="a1">
				<b class="g1 s2">공지</b>
				<div class="t1">
					일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="{{ route('sub.community.notice_detail', ['id' => '']) }}" class="a1">
				<b class="g1 s2">공지</b>
				<div class="t1">
					일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="{{ route('sub.community.notice_detail', ['id' => '']) }}" class="a1">
				<b class="g1 s2">공지</b>
				<div class="t1">
					일이삼사오륙칠팔구십일이삼사오륙칠팔구십
				</div>
			</a>
		</li>
	</ul>
</div>
<!-- /cp1bbs4list1 -->


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


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
