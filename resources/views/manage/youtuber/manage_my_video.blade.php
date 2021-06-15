<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210304 | @m | 요구반영. 결함개선. 고도화.
 * ~20210304 | @m |
 * 20210407 | @m | 요구반영
 */
-->
@extends('master_sub')

@section('title', '유튜버 마이페이지 - 영상관리')

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
				<a href="javascript:void(0);" class="a1"><i class="t1">영상관리</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">내 영상</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('manage.youtuber.video_management', ['type' => 'video']) }}">내 영상</a></li>
			<li><a href="{{ route('manage.youtuber.video_management', ['type' => 'lecture']) }}">내 영상 포함 강좌</a></li>
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
				<input type="text" value="" placeholder="검색어를 입력하세요." title="검색어" class="text" id="input_keyword"/>
				<button type="submit" class="button submit search" onclick="keywordSearch()"><i class="ic1"></i><span class="t1 blind">검색</span></button>
			</div>
			<!-- /cp1search1 -->

			<!-- cp1select1 -->
			<div class="cp1select1">
				<select class="select" title="정렬">
					<option value="" selected="selected">강좌에 포함된 일자 순</option>
					<option value="">강좌에 포함된 횟수 많은 순</option>
					<option value="">조회수 높은 순</option>
				</select>
				<select class="select" title="필터">
					<option value="" selected="selected">모두</option>
					<option value="">영상 삭제 대기중</option>
				</select>
			</div>
			<!-- /cp1select1 -->

		</fieldset>
	</form>
	<!-- /form -->
</div>
<!-- /cp1select3search1 -->


<!-- cp1fcard14 -->
<div class="cp1fcard14">
<div class="wrap1">

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234">
        <div class="item column">
			<div class="w1">
				<a href="?#" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">포토샵 강좌 #72 - 깊이감이 느껴지는 타이포그래피 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
				<!-- cp1menu5 -->
				<div class="cp1menu5 toggle1s1">
					<strong><a href="#" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp1menu5c toggle-c">
						<a href="#layer1confirm1video1del1" class="b2 toggle" data-send-focus="that"><span class="b2t1">영상 삭제하기</span></a>
					</div>
				</div>
				<!-- /cp1menu5 -->
				<div class="btns">
					<a href="{{ route('sub.video.video_detail', ['idx' => '']) }}" class="a2"><span class="a2t1">영상 바로보기</span></a>
					<a href="{{ route('manage.youtuber.video_management', ['type' => 'lecture']) }}" class="a2"><span class="a2t1">연관 강좌보기</span></a>
				</div>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p102.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일러스트레이터 강좌 #49 - 타이포가 돋보이 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
				<!-- cp1menu5 -->
				<div class="cp1menu5 toggle1s1">
					<strong><a href="#" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp1menu5c toggle-c">
						<a href="#layer1confirm1video1del1" class="b2 toggle" data-send-focus="that"><span class="b2t1">영상 삭제하기</span></a>
					</div>
				</div>
				<!-- /cp1menu5 -->
				<div class="btns">
					<span class="t4">영상 삭제 대기중</span>
				</div>
			</div>
		</div>
	</div>
	<!-- /lst1 -->

</div>
</div>
<!-- /cp1fcard14 -->


<!-- (레이어팝업. 승인 취소 확인) -->
@include('manage.youtuber.inc_layer_confirm_delete_video')

<script>/*<![CDATA[*/
		$(function(){
			// 레이어팝업 템플릿 바로 확인
			//$('[href="#layer1confirm1approve1cancel1"]').first().triggerHandler('click');
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

@section('script')
<script>
// 키워드 검색
function keywordSearch() {
    var keyword = $('#input_keyword').val();
    location.href='/manage/instructor/operation_lecture?keyword=' + keyword;
}
</script>
@endsection
