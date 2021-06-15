<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210202 | @m | 요구반영. 결함개선. 고도화.
 * ~20210210~20210218 | @m |
 */
-->
@extends('master_sub')

@section('title', '학습관리 - 수강강좌')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

<!-- 사용자 별 분기 필요 role = student, instructor, youtuber -->
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
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">수강강좌</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.management.learning_lecture_list') }}">수강강좌</a></li>
			<li><a href="{{ route('sub.management.lecture_note_list') }}">강좌노트</a></li>
			<li><a href="{{ route('sub.management.my_question') }}">내 질문</a></li>
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
		<select title="강좌 필터" class="select">
			<option value="">전체</option>
			<option value="">개발 · 프로그래밍</option>
			<option value="">데이터 사이언스</option>
			<option value="">자기계발</option>
			<option value="">교육 및 학문</option>
		</select>
	</div>
	<div class="w2">
		<a href="#layer1certificate1" class="button ic1t1 toggle" data-send-focus="that"><i class="ic1 certificate"></i><span class="t1">수강확인증</span></a>
		<a href="#layer1certificate2" class="button ic1t1 toggle" data-send-focus="that"><i class="ic1 certificate"></i><span class="t1">수료증</span></a>
		<script>/*<![CDATA[*/
				$(function(){
					// 레이어팝업 템플릿 바로 확인
					//$('[href="#layer1certificate1"]').triggerHandler('click');
					//$('[href="#layer1certificate2"]').triggerHandler('click');
				});
		/*]]>*/</script>

	</div>
</div>
<!-- /cp1infomenu1 -->


<!-- (레이어팝업.수강확인증) -->
@include('sub.management.inc_layer_cert_confirmation')
<!-- (레이어팝업.수료증) -->
@include('sub.management.inc_layer_cert_completion')


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1fcard5 -->
<div class="cp1fcard5">
<div class="wrap1">
	<ul class="lst1 even-grid evenmix-234 gap22px">
		<li class="item column">
			<div class="w1">
				<a href="{{ route('learning.index', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p201.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="g1">
						<i class="g1b1" style="width:30%;"></i>
					</div>
					<div class="tg1">
						<strong class="t1">자동 합계로 함수 쉽게 사용하기 일이삼사오륙칠팔구십</strong>
						<div class="t2">
							<span class="t2t1">20:21</span> <i class="sep">/</i> <span class="t2t2">50:27</span>
						</div>
						<div class="t3">
							<span class="t3t1">100강</span> <i class="sep">/</i> <span class="t3t2">130강</span>
							<b class="t3t3">30%</b>
						</div>
					</div>
				</a>
				<a href="?#" class="b1">
					<span class="b1t1">이어보기</span>
				</a>
			</div>
		</li>
		<li class="item column">
			<div class="w1">
				<a href="{{ route('learning.index', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p202.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="g1">
						<i class="g1b1" style="width:50%;"></i>
					</div>
					<div class="tg1">
						<strong class="t1">긍정적인 관계 에너지 만들 일이삼사오륙칠팔구십</strong>
						<div class="t2">
							<span class="t2t1">10:21</span> <i class="sep">/</i> <span class="t2t2">20:27</span>
						</div>
						<div class="t3">
							<span class="t3t1">5강</span> <i class="sep">/</i> <span class="t3t2">10강</span>
							<b class="t3t3">50%</b>
						</div>
					</div>
				</a>
				<a href="?#" class="b1">
					<span class="b1t1">이어보기</span>
				</a>
			</div>
		</li>
		<li class="item column">
			<div class="w1">
				<a href="{{ route('learning.index', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p203.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="g1">
						<i class="g1b1" style="width:97%;"></i>
					</div>
					<div class="tg1">
						<strong class="t1">일러스트레이터 강좌 #49 일이삼사오륙칠팔구십</strong>
						<div class="t2">
							<span class="t2t1">01:10:21</span> <i class="sep">/</i> <span class="t2t2">01:50:27</span>
						</div>
						<div class="t3">
							<span class="t3t1">68강</span> <i class="sep">/</i> <span class="t3t2">70강</span>
							<b class="t3t3">97%</b>
						</div>
					</div>
				</a>
				<a href="?#" class="b1">
					<span class="b1t1">이어보기</span>
				</a>
			</div>
		</li>
		<li class="item column">
			<div class="w1">
				<a href="{{ route('learning.index', ['id' => '']) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p204.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="g1">
						<i class="g1b1" style="width:16%;"></i>
					</div>
					<div class="tg1">
						<strong class="t1">조건별 합계 구하기 SUMIF 일이삼사오륙칠팔구십</strong>
						<div class="t2">
							<span class="t2t1">20:21</span> <i class="sep">/</i> <span class="t2t2">50:27</span>
						</div>
						<div class="t3">
							<span class="t3t1">40강</span> <i class="sep">/</i> <span class="t3t2">30강</span>
							<b class="t3t3">16%</b>
						</div>
					</div>
				</a>
				<a href="{{ route('learning.index', ['id' => '', 'time' => '']) }}" class="b1">
					<span class="b1t1">이어보기</span>
				</a>
			</div>
		</li>
	</ul>
</div>
</div>
<!-- /cp1fcard5 -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
