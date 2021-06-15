<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210205 | @m | 요구반영. 결함개선. 고도화.
 * ~20210205 | @m |
 */
-->
@extends('master_sub')

@section('title', '영상보관함 - 시청기록')

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
				<a href="javascript:void(0);" class="a1"><i class="t1">학습관리</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">시청기록</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.video.video_play_history') }}">시청기록</a></li>
			<li><a href="{{ route('sub.video.video_note_list') }}">영상노트</a></li>
			<li><a href="{{ route('sub.video.video_playlist') }}">재생목록</a></li>
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
		<select title="영상 필터" class="select">
			<option value="">최근 시청 영상</option>
			<option value="">좋아요 누른 영상</option>
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


<!-- cp1fcard4 -->
<div class="cp1fcard4">
<div class="wrap1">
	<div class="dpf-sbc">
		<h3 class="hb1 h5">오늘</h3>
		<div class="mControl">
			<button type="button" class="m prev"><i class="ic1"></i><span class="blind">추천 영상. 이전 보기</span></button>
			<button type="button" class="m next"><i class="ic1"></i><span class="blind">추천 영상. 다음 보기</span></button>
		</div>
	</div>
	<!-- owl-carousel -->
	<div class="owl-carousel owl-theme">
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p102.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p103.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p004.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p005.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p006.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /owl-carousel -->
</div>
</div>
<!-- /cp1fcard4 -->
<script>/*<![CDATA[*/
	$(function(){
		// 20210205
		$('.cp1fcard4').jQmCarousel1({
			autoplay: false,
			autoplayTimeout: 6000,
			margin: 22,
			responsive: {
				000: { items: 2 },
				640: { items: 3 },
				960: { items: 4 },
				1260: { items: 4 }
			}
		});
	});
/*]]>*/</script>


<!-- cp1fcard3 -->
<div class="cp1fcard3">
<div class="wrap1">
	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234 gap22px">
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p301.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 실무까지 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p302.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p303.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p304.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p301.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 실무까지 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p302.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p303.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p304.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p301.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 실무까지 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p302.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p303.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p304.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /lst1 -->

	<!-- cp1more1 -->
	<div class="cp1more1">
		<a href="#★" class="more">
			<span class="t1">더보기</span>
			<i class="ic1"></i>
		</a>
	</div>
	<!-- /cp1more1 -->

</div>
</div>
<!-- /cp1fcard3 -->


<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 더보기클릭샘플. 20210205. @m
		 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
		 */
		(function(){
			var $my = $('.cp1fcard3'),
				$more = $('.more', $my),
				$lst = $('.lst1', $my);
			var html = $lst.html();

			$more.on('click', function(e){
				e.preventDefault();
				$lst.append($(html));
			});
		})();

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
