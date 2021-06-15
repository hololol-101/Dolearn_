<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210202 | @m | 요구반영. 결함개선. 고도화.
 * ~20210203 | @m |
 * 20210331. 20210406 | @m | 요구반영
 */
-->
@extends('master_sub')

@section('title', '대시보드 - 학생')

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
				<a href="javascript:void(0);" class="a1"><i class="t1">대시보드</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">대시보드</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.dashboard.dashboard_main', ['role' => 'student']) }}">대시보드</a></li>
			<li><a href="{{ route('sub.dashboard.my_notification_list', ['role' => 'student']) }}">내 알림</a></li>
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


<!-- even-grid -->
<div class="even-grid evenmix-12">
	<div class="column">
		<!-- cp1dash1info1 -->
		<div class="cp1dash1info1">
			<div class="hg1">
				<h3 class="h1">{{ $userName }}님, 안녕하세요 :)</h3>
			</div>
			<div class="cont">
				<div class="item">
					<strong class="t1">09</strong>
					<span class="t2">수강강좌</span>
				</div>
				<div class="item">
					<strong class="t1">05</strong>
					<span class="t2">완료 강좌 수</span>
				</div>
				<div class="item">
					<strong class="t1">00</strong>
					<span class="t2">읽지 않은 알림</span>
				</div>
			</div>
		</div>
		<!-- /cp1dash1info1 -->
	</div>
	<div class="column">
		<!-- cp1dash1interest1 -->
		<div class="cp1dash1interest1">
			<div class="hg1">
				<div class="hg1w1">
					<h3 class="h1">관심분야</h3>
					<a href="#layer1interests1set1" class="set toggle" data-send-focus="that"><span class="t1 blind">설정</span> <i class="ic1"></i></a>
				</div>
				<div class="mControl">
					<button type="button" class="m prev"><i class="ic1"></i><span class="t1 blind">관심분야 이전보기</span></button>
					<button type="button" class="m next"><i class="ic1"></i><span class="t1 blind">관심분야 다음보기</span></button>
				</div>
			</div>
			<div class="cont">
                <!-- cp1interest2 -->
				<div class="cp1interest2">
                    @if (count($interest_arr)>0)
                        <ul class="mls">
                            @if(array_key_exists('웹개발', $interest_arr)){
                                <li class="m m1">
                                <a class="a1">
                                    <i class="ic1"></i><span class="t1">웹개발</span>
                                    <i class="star5rating3">
                                            <i class="st-on" style="width:{{ $interest_arr['웹개발']['score'].'%' }};"><i class="ic1"></i></i><!-- (5/5) -->
                                            <i class="st-off" style="width:{{ (100-$interest_arr['웹개발']['score']).'%' }};"><i class="ic2"></i></i><!-- (100-0) -->
                                        }
                                    </i>
                                </a>
                            </li>
                            @endif
                            @if (array_key_exists('모바일개발', $interest_arr))
                            <li class="m m2">
                                <a class="a1">
                                    <i class="ic1"></i><span class="t1">모바일개발</span>
                                    <i class="star5rating3">
                                        <i class="st-on" style="width:{{ $interest_arr['모바일개발']['score'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
                                        <i class="st-off" style="width:{{ (100-$interest_arr['모바일개발']['score']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
                                    </i>
                                </a>
                            </li>
                            @endif
                            @if (array_key_exists('프로그래밍 언어', $interest_arr))
                            <li class="m m3">
                                <a class="a1">
                                    <i class="ic1"></i><span class="t1">프로그래밍 언어</span>
                                    <i class="star5rating3">
                                        <i class="st-on" style="width:{{ $interest_arr['프로그래밍 언어']['score'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
                                        <i class="st-off" style="width:{{ (100-$interest_arr['프로그래밍 언어']['score']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
                                    </i>
                                </a>
                            </li>
                            @endif
                            @if (array_key_exists('데이터분석', $interest_arr))
                            <li class="m m4">
                                <a class="a1">
                                    <i class="ic1"></i><span class="t1">데이터분석</span>
                                    <i class="star5rating3">
                                        <i class="st-on" style="width:{{ $interest_arr['데이터분석']['score'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
                                        <i class="st-off" style="width:{{ (100-$interest_arr['데이터분석']['score']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
                                    </i>
                                </a>
                            </li>
                            @endif
                            @if (array_key_exists('인공지능', $interest_arr))
                            <li class="m m5">
                                <a class="a1">
                                    <i class="ic1"></i><span class="t1">인공지능</span>
                                    <i class="star5rating3">
                                        <i class="st-on" style="width:{{ $interest_arr['인공지능']['score'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
                                        <i class="st-off" style="width:{{ (100-$interest_arr['인공지능']['score']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
                                    </i>
                                </a>
                            </li>
                            @endif
                            @if (array_key_exists('데이터베이스', $interest_arr))
                            <li class="m m6">
                                <a class="a1">
                                    <i class="ic1"></i><span class="t1">데이터베이스</span>
                                    <i class="star5rating3">
                                        <i class="st-on" style="width:{{ $interest_arr['데이터베이스']['score'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
                                        <i class="st-off" style="width:{{ (100-$interest_arr['데이터베이스']['score']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
                                    </i>
                                </a>
                            </li>
                            @endif
                            @if (array_key_exists('유아교육', $interest_arr))
                            <li class="m m7">
                                <a class="a1">
                                    <i class="ic1"></i><span class="t1">유아교육</span>
                                    <i class="star5rating3">
                                        <i class="st-on" style="width:{{ $interest_arr['유아교육']['score'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
                                        <i class="st-off" style="width:{{ (100-$interest_arr['유아교육']['score']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
                                    </i>
                                </a>
                            </li>
                            @endif
                            @if (array_key_exists('초등교육', $interest_arr))
                            <li class="m m8">
                                <a class="a1">
                                    <i class="ic1"></i><span class="t1">초등교육</span>
                                    <i class="star5rating3">
                                        <i class="st-on" style="width:{{ $interest_arr['초등교육']['score'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
                                        <i class="st-off" style="width:{{ (100-$interest_arr['초등교육']['score']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
                                    </i>
                                </a>
                            </li>
                            @endif
                            @if (array_key_exists('직무능력', $interest_arr))
                            <li class="m m9">
                                <a class="a1">
                                    <i class="ic1"></i><span class="t1">직무능력</span>
                                    <i class="star5rating3">
                                        <i class="st-on" style="width:{{ $interest_arr['직무능력']['score'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
                                        <i class="st-off" style="width:{{ (100-$interest_arr['직무능력']['score']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
                                    </i>
                                </a>
                            </li>
                            @endif
                            @if (array_key_exists('금융 · 경영', $interest_arr))
                            <li class="m m10">
                                <a class="a1">
                                    <i class="ic1"></i><span class="t1">금융 · 경영</span>
                                    <i class="star5rating3">
                                        <i class="st-on" style="width:{{ $interest_arr['금융 · 경영']['score'].'%' }};"><i class="ic1"></i></i><!-- (3/5) -->
                                        <i class="st-off" style="width:{{ (100-$interest_arr['금융 · 경영']['score']).'%' }};"><i class="ic2"></i></i><!-- (100-60) -->
                                    </i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    @else
                        <div>관심 분야를 설정하시면 분야에 맞는 강좌를 추천해드립니다.</div>
                    @endif
				</div>
				<!-- /cp1interest2 -->
			</div>
			<div class="fg1">
				<!-- <a href="?#" class="a2"><span class="a2t1">프로필설정 &gt;</span></a> -->
				<!-- <a href="#layer1interests1set1" class="a2 toggle" data-send-focus="that"><span class="a2t1">관심분야 설정 &gt;</span></a> -->
			</div>
		</div>
		<!-- /cp1dash1interest1 -->

		<script>/*<![CDATA[*/
			(function(){
				/** ◇◆ 단순이전다음. 20210203. 20210406. @m.
				 */
				var $my = $('.cp1dash1interest1'),
					$prev = $('.mControl .prev', $my),
					$next = $('.mControl .next', $my),
					$v = $('.cp1interest2', $my); // 뷰
					$c = $('.cp1interest2 .mls', $my); // 콘텐츠
					console.log($v.height());
				var endTop = 0; // 이동할높이값
				// 다음클릭
				$next.on('click', function(e){
					endTop -= $v.height();
					if( endTop <  $v.height() - $c.height() ){
						endTop = 0;
					}
					$c.css({	 top: endTop });
				});
				// 이전클릭
				$prev.on('click', function(e){
					endTop += $v.height();
					if( endTop > 0 ){
						endTop = $v.height() - $c.height();
					}
					$c.css({	 top: endTop });
				});
			})();
		/*]]>*/</script>


		<!-- (레이어팝업) ->head 부분에 include -->


	</div>
	<div class="column">
		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 학습 강좌</h3>
			</div>
			<div class="cont">
				<ul class="lst1">
                    {{-- TODO: 임시 idx 값 --}}
					<li class="li1"><a href="{{ route('learning.main', ['idx' => '17']) }}" class="a1"><span class="t1">데이터분석과 텍스트마이닝</span> <span class="t2">3일전</span></a></li>
				</ul>
				<div class="gg1">
					<div class="t1">
						<span class="t1t1">진도율</span>
						<span class="t1t2">22강</span> <i class="sep">/</i> <span class="t1t3">30강</span>
						<span class="t1t4">75%</span>
					</div>
					<div class="g1">
						<i class="g1b1" style="width:75%;"></i>
					</div>
				</div>
			</div>
			<div class="fg1">
				<a href="{{ route('sub.management.learning_lecture_list') }}" class="a2"><span class="a2t1">내 모든강좌 &gt;</span></a>
                {{-- TODO: 임시 idx 값 --}}
				<a href="{{ route('learning.main', ['idx' => '17']) }}" class="a2 cvf"><span class="a2t1">이어서 학습하기 &gt;</span></a>
			</div>
		</div>
		<!-- /cp1dash1recent1 -->
	</div>
	<div class="column">
		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 시청 영상</h3>
				<a href="{{ route('sub.video.video_play_history', ['role' => 'student']) }}" class="a3"><span class="a3t1">내 시청기록 &gt;</span></a>
			</div>
			<div class="cont">
				<ul class="lst1">
                    {{-- TODO: 임시 uid 값 --}}
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">03.빅데이터의 개념</span> <span class="t2">방금</span></a></li>
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">02.빅데이터의 등장(2/2)</span> <span class="t2">2일전</span></a></li>
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">01.빅데이터의 등장(1/2)</span> <span class="t2">3일전</span></a></li>
				</ul>
			</div>
		</div>
		<!-- /cp1dash1recent1 -->
	</div>
	<div class="column">
		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 내 질문 (미해결)</h3>
				<a href="{{ route('sub.management.my_question_list') }}" class="a3"><span class="a3t1">전체보기 &gt;</span></a>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">Q. 텍스트 마이닝이란 무엇인가요?</span> <span class="t2">방금</span></a></li>
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">Q. 데이터 분석 방법에는 어떤 것들이 있나요?</span> <span class="t2">방금</span></a></li>
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">Q. 빅데이터란 무엇인가요?</span> <span class="t2">3일전</span></a></li>
				</ul>
			</div>
		</div>
		<!-- /cp1dash1recent1 -->
	</div>
	<div class="column">
		<!-- cp1dash1recent1 -->
		<div class="cp1dash1recent1">
			<div class="hg1">
				<h3 class="h1">최근 영상 노트</h3>
				<a href="{{ route('sub.video.video_note_list') }}" class="a3"><span class="a3t1">전체보기 &gt;</span></a>
			</div>
			<div class="cont">
				<ul class="lst1">
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">영상 노트 제목 1</span> <span class="t2">방금</span></a></li>
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">영상 노트 제목 2</span> <span class="t2">1일전</span></a></li>
					<li class="li1"><a href="javascript:void(0);" class="a1"><span class="t1">영상 노트 제목 3</span> <span class="t2">2일전</span></a></li>
				</ul>
			</div>
		</div>
		<!-- /cp1dash1recent1 -->
	</div>
</div>
<!-- /even-grid -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection
