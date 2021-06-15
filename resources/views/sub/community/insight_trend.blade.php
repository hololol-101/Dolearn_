<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210312 | @m | 요구반영. 결함개선. 고도화.
 * ~20210312 | @m |
 */
-->
@extends('master_sub')

@section('title', '인사이트 - 최신트렌드')

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
				<i class="sep">|</i>
				<a href="javascript:void(0);" class="a1"><i class="t1">인사이트</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">최신 트렌드</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li class="on"><a href="{{ route('sub.community.trend') }}">최신 트렌드</a></li>
			<li><a href="{{ route('sub.community.ranking', ['type' => 'lecture']) }}">랭킹</a></li>
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


<!-- cp1fcard8 -->
<div class="cp1fcard8 mgt1em">
<div class="wrap1">

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-23 gap3pct">
		<div class="item column">
			<div class="w1">
				<a href="{{ route('sub.community.trend_detail', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">[3월 2주차] 직장인들의 필수 항목 엑셀</strong>
						<span class="t2">엑셀 전문 유튜브 채널 전격 분석!!!!!</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="{{ route('sub.community.trend_detail', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p102.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">[3월 2주차] EXCEL 자격증 대분석 일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
						<span class="t2">필요없는 건 하지말자! 일이삼사오륙칠팔구십일이삼사오륙칠팔구십</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="{{ route('sub.community.trend_detail', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">[3월 2주차] 직장인들의 필수 항목 엑셀</strong>
						<span class="t2">엑셀 전문 유튜브 채널 전격 분석!!!!!</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="{{ route('sub.community.trend_detail', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p102.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">[3월 2주차] EXCEL 자격증 대분석 일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
						<span class="t2">필요없는 건 하지말자! 일이삼사오륙칠팔구십일이삼사오륙칠팔구십</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="{{ route('sub.community.trend_detail', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">[3월 2주차] 직장인들의 필수 항목 엑셀</strong>
						<span class="t2">엑셀 전문 유튜브 채널 전격 분석!!!!!</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="{{ route('sub.community.trend_detail', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p102.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">[3월 2주차] EXCEL 자격증 대분석 일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
						<span class="t2">필요없는 건 하지말자! 일이삼사오륙칠팔구십일이삼사오륙칠팔구십</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="{{ route('sub.community.trend_detail', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">[3월 2주차] 직장인들의 필수 항목 엑셀</strong>
						<span class="t2">엑셀 전문 유튜브 채널 전격 분석!!!!!</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="{{ route('sub.community.trend_detail', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p102.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">[3월 2주차] EXCEL 자격증 대분석 일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
						<span class="t2">필요없는 건 하지말자! 일이삼사오륙칠팔구십일이삼사오륙칠팔구십</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /lst1 -->

</div>
</div>
<!-- /cp1fcard8 -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
