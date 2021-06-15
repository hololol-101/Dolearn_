<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210215 | @m | 요구반영. 결함개선. 고도화.
 * ~20210318~20210302 | @m |
 */
-->
@php
$step = isset($_GET['step']) ? $_GET['step'] : '';
$title = '';

if ($step == '' || $step == 'basic_info') {
    $title = '기본정보';

} else if ($step == 'introduce') {
    $title = '강좌소개';

} else if ($step == 'curriculum') {
    $title = '커리큘럼';

} else if ($step == 'preview') {
    $title = '미리보기';
}
@endphp

@extends('master_sub')

@section('title', '새 강좌 만들기 - {{ $title }}')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- width2wrap1 -->
<div class="width2wrap1 bgc2">
<!-- container -->
<div class="container clearfix">


<!-- even-grid -->
<div class="even-grid gap0 vgap00">
	<div class="small-12 medium-12 large-3 column tal vam">
		<a href="{{ url('/') }}" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
		<h2 class="hb1 h1 mgt025em mgb025em">새 강좌 만들기</h2>
	</div>
	<div class="small-12 medium-8 large-6 column tac vam">
		<!-- cp1step1 -->
		<div class="cp1step1">
			<strong class="blind">진행 단계</strong>
			<ol class="w1step">
			<li class="step @if ($step == '' || $step == 'basic_info') on @endif" title="현재 진행 단계">기본정보</li>
			<li class="step @if ($step == 'introduce') on @endif">강좌소개</li>
			<li class="step @if ($step == 'curriculum') on @endif">커리큘럼</li>
			<li class="step @if ($step == 'preview') on @endif">미리보기</li>
			</ol>
		</div>
		<!-- /cp1step1 -->
	</div>
	<div class="small-12 medium-4 large-3 column tar vam">
		{{-- <a href="{{ route('sub.lecture.add_new_lecture', ['step' => 'introduce']) }}" class="button t1ic1 mgl0375em fsS1"><span class="t1">저장 후 다음</span> <i class="ic1 next"></i></a> --}}
        @if ($step == '' || $step == 'basic_info')
            <a href="{{ route('sub.lecture.add_new_lecture', ['step' => 'introduce']) }}" onclick="" id="save-next-btn" class="button t1ic1 mgl0375em fsS1"><span class="t1">저장 후 다음</span> <i class="ic1 next"></i></a>
        @elseif ($step == 'introduce')
            <a href="{{ route('sub.lecture.add_new_lecture', ['step' => 'basic_info']) }}" onclick="" class="button ic1t1 mgl0375em fsS1"><i class="ic1 prev"></i> <span class="t1">저장 후 이전</span></a>
            <a href="{{ route('sub.lecture.add_new_lecture', ['step' => 'curriculum', 'is_free' => 'yes']) }}" onclick="" class="button ic1t1 mgl0375em fsS1"><span class="t1">저장 후 다음</span> <i class="ic1 next"></i></a>
        @elseif ($step == 'curriculum')
            <a href="{{ route('sub.lecture.add_new_lecture', ['step' => 'introduce']) }}" onclick="" class="button ic1t1 mgl0375em fsS1"><i class="ic1 prev"></i> <span class="t1">저장 후 이전</span></a>
            <a href="{{ route('sub.lecture.add_new_lecture', ['step' => 'preview']) }}" onclick="" class="button t1ic1 mgl0375em fsS1"><span class="t1">저장 후 다음</span> <i class="ic1 next"></i></a>
        @elseif ($step == 'preview')
            <a href="{{ route('sub.lecture.add_new_lecture', ['step' => 'curriculum', 'is_free' => 'yes']) }}" onclick="" class="button ic1t1 mgl0375em fsS1"><i class="ic1 prev mgl-0375em mgr0375em"></i> <span class="t1">이전</span></a>
            <a href="javascript:history.back();" onclick="" class="button mgl0375em fsS1 pdl1em pdr1em"><span class="t1">생성하기</span></a>
        @endif
	</div>
</div>
<!-- /even-grid -->


</div>
<!-- /container -->
</div>
<!-- /width2wrap1 -->

{{-- 기본정보입력 --}}
@if ($step == '' || $step == 'basic_info')

<div class="tac fsB4 wwbw wbka">
	<i class="ic1 indy ic40notice1"></i>
	<div class="mgt05em mgb2em">
		강좌의 기본 정보를 입력해주세요.<br />
		이 강좌에 대한 정보를 쉽게 알 수 있도록 설정해보세요.<br />
		<div class="mgt05em mgb05em">
			<a href="#layer1tip1write1" class="dpib fsS2 vam toggle" data-send-focus="that">
				<span class="dpib mgr025em bdb1px">기본 정보 작성</span>
				<span class="bgc4 pdl05em pdr05em round ls0 cvf">TIP!</span>
			</a>
		</div>
	</div>
</div>

<!-- (레이어팝업. 기본 정보 작성 TIP) -->
@include('sub.lecture.inc_layer_tip_basic')

<script>/*<![CDATA[*/
	$(function(){
		// 레이어팝업 템플릿 바로 확인
		//$('[href="#layer1tip1write1"]').first().triggerHandler('click');
	});
/*]]>*/</script>


<hr class="bdt1px mgt125em mgb125em" />


<!-- even-grid -->
<div class="even-grid float-left gap5pct vgap0">
	<div class="small-12 medium-4 column">


		<!-- cp1new1lecture1write1 -->
		<div class="cp1new1lecture1write1">
			<div class="f1">
				<div class="f1p1">
					<img src="{{ asset('assets/images/lib/noimg1.png') }}" alt="★대체텍스트필수" />
				</div>
			</div>
			<!-- cp1upload1 -->
			<div class="cp1upload1">
				<label for="★1file0" class="label">이미지업로드</label>
				<span class="w1file">
					<input type="file" id="★1file0" class="file" />
					<input type="text" value="" title="업로드 파일명" class="file" />
					<button type="button" class="b1 del">파일 지우기</button>
				</span>
			</div>
			<!-- /cp1upload1 -->
		</div>
		<!-- /cp1new1lecture1write1 -->

		<script>/*<![CDATA[*/
			//$(function(){
				/** ◇◆ 이미지업로드 input[type='file'] 고도화. 20210215. 20210218. @m.
				 */
				(function(){
					var $my = $('.cp1upload1'),
						$file = $('[type="file"]', $my),
						$text = $('[type="text"]', $my),
						$del = $('.b1.del', $my);

					// 초기 호출
					isVal();

					// 파일값 동기화
					$file.on('change', function(){
						$text.val( getFileName( $file.val() ) );
						isVal();
					});

					// 파일 지우기
					$del.on('click', function(e){
						e.preventDefault();
						$file.val('').triggerHandler('change'); // triggerHandler() 강제
						$text.val('');
					});

					// 파일명.확장자 만 추출
					function getFileName(v){
						var arr = v.split("\\"); // 로컬경로는 / 아닌 \ 로 분리
						return arr[arr.length-1]; // 배열의 맨 끝이 파일명
					}

					// 파일값 유무 구분
					function isVal(){
						//console.log( !!$file.val() );
						if( !$file.val() ){ // 값 없으면
							$my.addClass('off');
						}else{
							$my.removeClass('off');
						}
					}

				})();
			//});
		/*]]>*/</script>


	</div>
	<div class="small-12 medium-8 column">


		<!-- <p class="tar"><i class="required" title="필수항목">*</i> 는 필수 입력 <span class="dpib">항목입니다.</span></p> -->

		<!-- 폼아이템들 -->

		<div class="form1item1">
			<label for="★1text0" class="tt1">강좌 제목 <i class="required" title="필수항목">*</i></label>
			<input type="text" id="★1text0" value="" placeholder="강좌명을 입력하세요" class="w100 type1" />
		</div>

		<div class="form1item1">
			<label for="★1textarea0" class="tt1">강좌 설명 <i class="required" title="필수항목">*</i></label>
			<!-- <input type="text" id="★1textarea0" value="" class="w100 type1" /> -->
			<textarea id="★1textarea0" rows="5" cols="80" placeholder="학습내용, 수강대상 등 강좌 요약을 2문장 이상 작성하는 것을 추천드립니다."></textarea>
		</div>

		<div class="form1item1">
			<label for="★1text0" class="tt1">난이도 <i class="required" title="필수항목">*</i></label>
			<div>
				<span class="dpib mgr15em">
					<input type="checkbox" name="★1checkbox0" id="★1checkbox0e0" /> <label for="★1checkbox0e0">초급</label>
				</span>
				<span class="dpib mgr15em">
					<input type="checkbox" name="★1checkbox0" id="★1checkbox0e1" /> <label for="★1checkbox0e1">중급</label>
				</span>
				<span class="dpib mgr15em">
					<input type="checkbox" name="★1checkbox0" id="★1checkbox0e2" /> <label for="★1checkbox0e2">중급 이상</label>
				</span>
			</div>
		</div>

		<!-- even-grid -->
		<div class="even-grid float-left gap2pct vgap00">
			<div class="small-12 large-8 column">

				<div class="form1item1">
					<label for="★1price1" class="tt1">가격 <i class="required" title="필수항목">*</i></label>
					<div>
						<div class="cp1menu4 mgr05em">
							<a href="#" class="m m1 on">무료</a>
							<a href="#" class="m m2">유료</a>
						</div>
						<script>/*<![CDATA[*/
							$('.cp1menu4 .m').on('click', function(e){
								e.preventDefault();
								$(this).siblings().removeClass('on').end().addClass('on');
							});
						/*]]>*/</script>
						<input type="text" id="★1price1" value="" placeholder="원" class="type1 tar w12em" />
					</div>
					<div class="fsS2 op05">
						<ul class="bi1 mgt0">
						<li class="li1">유튜브영상만으로 구성된 강좌는 유료로 설정하실 수 없습니다.</li>
						</ul>
					</div>
				</div>

			</div>
			<div class="small-12 large-4 column">

				<div class="form1item1">
					<label for="★1term1" class="tt1">수강 기간 <i class="required" title="필수항목">*</i></label>
					<input type="text" id="★1term1" value="" placeholder="(일)" class="w100 type1 tar" />
					<div class="fsS2 op05">
						<ul class="bi1 mgt0">
						<li class="li1">비워둘 경우 수강 기간 제한 없음.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /even-grid -->


		<!-- even-grid -->
		<div class="form1item1 even-grid gap2pct vgap00">
			<div class="small-12 xlarge-3 column vam">
				<span class="tt1">강좌 필수 카테고리 <i class="required" title="필수항목">*</i></span>
			</div>
			<div class="small-4 xlarge-3 column vam">
				<select title="필수 대분류" class="w100 type1">
					<option value="">교육 및 학문</option>
				</select>
			</div>
			<div class="small-4 xlarge-3 column vam">
				<select title="필수 중분류" class="w100 type1">
					<option value="">초등교육</option>
				</select>
			</div>
			<div class="small-4 xlarge-3 column vam">
				<select title="필수 소분류" class="w100 type1">
					<option value="">국어</option>
					<option value="">수학</option>
					<option value="">생활</option>
					<option value="">사회</option>
					<option value="">과학</option>
					<option value="">도덕</option>
					<option value="">실과</option>
					<option value="">영어</option>
					<option value="">체육</option>
					<option value="">음악</option>
					<option value="">미술</option>
					<option value="">초등기타</option>
				</select>
			</div>
		</div>
		<!-- /even-grid -->


		<!-- even-grid -->
		<div class="form1item1 even-grid gap2pct vgap00 mgb2em">
			<div class="small-12 xlarge-3 column vam">
				<span class="tt1">강좌 서브 카테고리</span>
			</div>
			<div class="small-4 xlarge-3 column vam">
				<select title="서브 대분류" class="w100 type1">
					<option value="">교육 및 학문</option>
				</select>
			</div>
			<div class="small-4 xlarge-3 column vam">
				<select title="서브 중분류" class="w100 type1">
					<option value="">초등교육</option>
				</select>
			</div>
			<div class="small-4 xlarge-3 column vam">
				<select title="서브 소분류" class="w100 type1">
					<option value="">국어</option>
					<option value="">수학</option>
					<option value="">생활</option>
					<option value="">사회</option>
					<option value="">과학</option>
					<option value="">도덕</option>
					<option value="">실과</option>
					<option value="">영어</option>
					<option value="">체육</option>
					<option value="">음악</option>
					<option value="">미술</option>
					<option value="">초등기타</option>
				</select>
			</div>
		</div>
		<!-- /even-grid -->


		<!-- cp1tag2 -->
		<div class="cp1tag2">
			<strong class="h1"></strong>
			<div class="cont">
				<div class="tg1">
					<a href="?#★" class="a1 on">국어</a>
					<a href="?#★" class="a1 on">6학년</a>
				</div>
				<div class="eg1">
					<input type="text" value="" placeholder="주제를 추가해서 수강자들이 쉽게 강좌를 찾을 수 있도록 해보세요!" title="추가 주제" class="text1 type1" />
					<button type="button" class="b1 add button gray4">추가</button>
				</div>
			</div>
		</div>
		<!-- /cp1tag2 -->

        <script>/*<![CDATA[*/
			$(function(){

				/** ◇◆ 강좌 주제 제거 추가. 20210218. @m.
				 */
				(function(){
					var my = '.cp1tag2',
						tg1 = '.tg1', // 주제 그룹
						a1on = '.a1.on', // 주제
						text1 = '.text1', // 입력
						b1add = '.b1.add', // 추가 버튼
						v = '';

						// 미래 주제 클릭
						$(my).on('click', a1on, function(e){
							e.preventDefault();
							$(this).remove();
						});

						// 미래 추가 클릭
						$(my).on('click', b1add, function(){
							var $last = $(this).closest(my).find(a1on).last();
							$('<a href="?#★" class="a1 on" />').appendTo( $(this).closest(my).find(tg1) ).text( $(this).prevAll('.text1').val() );
						});
				})();
			});
		/*]]>*/</script>

	</div>
</div>
<!-- /even-grid -->

{{-- 강좌소개입력 --}}
@elseif ($step == 'introduce')

<div class="tac fsB4 wwbw wbka">
	<i class="ic1 indy ic40notice1"></i>
	<div class="mgt05em mgb2em">
		이 강좌에 대한 핵심 정보를 상세히 작성해주세요.<br />
        <div class="mgt05em mgb05em">
			<a href="#layer1tip1write2" class="dpib fsS2 vam toggle" data-send-focus="that">
				<span class="dpib mgr025em bdb1px">강좌 소개 작성</span>
				<span class="bgc4 pdl05em pdr05em round ls0 cvf">TIP!</span>
			</a>
		</div>
	</div>
</div>

<!-- (레이어팝업. 기본 정보 작성 TIP) -->
@include('sub.lecture.inc_layer_tip_intro')

<script>/*<![CDATA[*/
	$(function(){
		// 레이어팝업 템플릿 바로 확인
		//$('[href="#layer1tip1write2"]').first().triggerHandler('click');
	});
/*]]>*/</script>

<!-- <hr class="bdt1px mgt125em mgb125em" /> -->


<!-- <p class="tar"><i class="required" title="필수항목">*</i> 는 필수 입력 <span class="dpib">항목입니다.</span></p> -->


<!-- 폼아이템들 -->

<!-- cp1write2 -->
<div class="cp1write2">
	<div class="form1item1">
		<div class="clearfix">
			<div class="fl">
				<span class="tt1 mgr1em">무엇을 배울 수 있나요? <i class="required" title="필수항목">*</i></span>
				<span class="bi1 dpib fsS1 vam op05">
					<span class="li1">최소 2개 이상</span>
				</span>
			</div>
			<div class="fr">
				<button type="button" class="button0 add mgr075em"><i class="ic1 indy ic24plus1"></i><span class="t1 blind">추가</span></button>
			</div>
		</div>
		<div class="w1item">
			<div class="item">
				<div class="control move" title="끌어서 놓기로 순서 이동"></div>
				<input type="text" value="" placeholder="최소 2개 이상" title="강좌 내용" class="w100 type1 text" />
				<button type="button" class="b1 button del gray4 small">삭제</button>
			</div>
			<div class="item">
				<div class="control move" title="끌어서 놓기로 순서 이동"></div>
				<input type="text" value="" placeholder="최소 2개 이상" title="강좌 내용" class="w100 type1 text" />
				<button type="button" class="b1 button del gray4 small">삭제</button>
			</div>
		</div>
	</div>
</div>
<!-- /cp1write2 -->

<!-- cp1write2 -->
<div class="cp1write2">
	<div class="form1item1">
		<div class="clearfix">
			<div class="fl">
				<span class="tt1 mgr1em">누가 배우면 좋을까요? <i class="required" title="필수항목">*</i></span>
				<span class="bi1 dpib fsS1 vam op05">
					<span class="li1">최소 2개 이상</span>
				</span>
			</div>
			<div class="fr">
				<button type="button" class="button0 add mgr075em"><i class="ic1 indy ic24plus1"></i><span class="t1 blind">추가</span></button>
			</div>
		</div>
		<div class="w1item">
			<div class="item">
				<div class="control move" title="끌어서 놓기로 순서 이동"></div>
				<input type="text" value="" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
				<button type="button" class="b1 button del gray4 small">삭제</button>
			</div>
			<div class="item">
				<div class="control move" title="끌어서 놓기로 순서 이동"></div>
				<input type="text" value="" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
				<button type="button" class="b1 button del gray4 small">삭제</button>
			</div>
		</div>
	</div>
</div>
<!-- /cp1write2 -->

<!-- cp1write2 -->
<div class="cp1write2">
	<div class="form1item1">
		<div class="clearfix">
			<div class="fl">
				<span class="tt1 mgr1em">필요한 배경지식이 있나요? </span>
			</div>
			<div class="fr">
				<button type="button" class="button0 add mgr075em"><i class="ic1 indy ic24plus1"></i><span class="t1 blind">추가</span></button>
			</div>
		</div>
		<div class="w1item">
			<div class="item">
				<div class="control move" title="끌어서 놓기로 순서 이동"></div>
				<input type="text" value="" placeholder="선택사항" title="배경지식" class="w100 type1 text" />
				<button type="button" class="b1 button del gray4 small">삭제</button>
			</div>
			<div class="item">
				<div class="control move" title="끌어서 놓기로 순서 이동"></div>
				<input type="text" value="" placeholder="선택사항" title="배경지식" class="w100 type1 text" />
				<button type="button" class="b1 button del gray4 small">삭제</button>
			</div>
		</div>
	</div>
</div>
<!-- /cp1write2 -->

<script>/*<![CDATA[*/
	$(function(){


		/** ◇◆ 핵심정보 입력상자 추가삭제. 20210216. @m.
		 */
		(function(){
			var my = '.cp1write2',
				item = '.item',
				add = my + ' .add',
				del = my + ' .del';
			// 미래 추가 클릭
			$(document).on('click', add, function(){
				var $last = $(this).closest(my).find(item).last();
				$last.clone().insertAfter( $last ).find('input[type="text"]').val('');
			});
			// 미래 삭제 클릭
			$(document).on('click', del, function(){
				if( $(this).closest(my).find(item).length > 2 ){
					$(this).closest(item).remove();
				}else{
					alert('더 이상 삭제할 수 없습니다.');
				}
			});
		})();


		/** ◇◆ 드래그앤드롭(마우스+터치) 순서이동. 20210216. @m.
		 * [IE9+]
		 * Use) makeDrag1('.cp1write2 .item');
		 */
		function makeDrag1(selector){
			var sy = ey = 0;
			var my = selector,
				mv = my + ' .move';

			// 미래 요소 이벤트 연결
			$(document).on('mousedown touchstart', mv, function(e){
				e.preventDefault(); // img 등 'mousedown' 동작 끊김 방지
				doDragDrop(e, $(this).closest('.item'));
			});

			// 드래그앤드롭 동작
			function doDragDrop(e, $c){
				if(e.originalEvent.touches || e.originalEvent.changedTouches){ // 터치 있으면
					var e = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0]; // 싱글 터치
				}else{
					var e = e || window.event;
				}
				sy = e.clientY;

				//console.log(e.type, $c.index(), sy);

				$(document).on('mouseup touchend', function(e){
					doDrop(e, $c);
				});
				$(document).on('mousemove touchmove', function(e){
					doDrag(e, $c);
				});
			}

			// 드래그 동작
			function doDrag(e, $c){
				if(e.originalEvent.touches || e.originalEvent.changedTouches){ // 터치 있으면
					var e = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0]; // 싱글 터치
				}else{
					var e = e || window.event;
				}
				ey = e.clientY - sy;
				$c.css({
					zIndex: '1',
					transform: 'translateY(' + ey + 'px)'
				});
			}

			// 드롭 동작 (순서변경)
			function doDrop(e, $c){
				$(document).off('mouseup mousemove touchend touchmove');

				//var $cs = $c.closest('.w1item').children();
				var $cs = $c.parent().children();
				var ofs = {
					zIndex: '',
					transform: 'none'
				};

				if( $c.position().top > $cs.last().position().top ){
					$cs.last().after( $c );
				}else{
					for(var i = 0; i < $cs.length; i++){
						if( $c.position().top < $cs.eq(i).position().top ){
							$cs.eq(i).before( $c );
							break;
						}
					}
				}
				$c.css(ofs);
			}
		}

		// 호출
		makeDrag1('.cp1write2 .item');


	});
/*]]>*/</script>


<div class="form1item1">
	<span class="tt1 mgr1em">강좌 소개</span>
	<a href="#layer1tip1write2" class="dpib fsS2 toggle">
		<span class="dpib mgr025em bdb1px">강좌 소개 작성</span>
		<span class="bgc4 pdl05em pdr05em round ls0">TIP!</span>
	</a>
	<!-- cp1write1 -->
	<div class="cp1write1">
		<div class="editor">
			<div class="mgt5em mgb5em em tac">개발자 온라인 웹문서 편집기 처리 필요!</div>
		</div>
	</div>
	<!-- /cp1write1 -->
</div>

{{-- 커리큘럼입력 --}}
@elseif ($step == 'curriculum')

<div class="tac fsB4 wwbw wbka">
	<i class="ic1 indy ic40notice1"></i>
	<div class="mgt05em mgb2em">
		커리큘럼을 생성합니다.<br />
		대단원 &gt; 소단원 &gt; 강의 순으로 생성하고 <span class="dpib">대표 동영상을 선택해 주세요.</span><br />
		영상에 대한 설명은 강좌 생성 후 관리 페이지에서 입력하실 수 있습니다.<br />
	</div>
</div>


<hr class="bdt1px mgt125em mgb125em" />


<!-- <p class="tar"><i class="required" title="필수항목">*</i> 는 필수 입력 <span class="dpib">항목입니다.</span></p> -->


<!-- even-grid -->
<div class="form1item1 even-grid gap0 vgap00 mgb2em">
	<div class="small-12 column">
		<strong class="tt1 mgr05em fw4 fsB8 vam">대표 동영상</strong>
		<div class="bi1 dpib fsS1 vam">
			<a href="#?" class="li1 tooltip1">
				<span class="tooltip1c">
					강좌 상세 페이지로 들어온 회원들에게 가장 먼저 보여지는 소개 동영상입니다.
					커리큘럼에서 미리보기를 지정한 강의 중 선택 할 수 있습니다.
					선택하지 않을경우 강좌 섬네일로 대체됩니다.
				</span>
			</a>
		</div>
	</div>
	<div class="small-12 large-6 column">
		<select title="대표 동영상" class="w100 type1">
			<option value="">대표 동영상을 선택하세요.</option>
			<option value="">일이삼사오륙칠팔구십</option>
			<option value="">일이삼사오륙칠팔구십</option>
		</select>
	</div>
</div>
<!-- /even-grid -->


<script>/*<![CDATA[*/
	$(function(){
		/** ◇◆ 툴팁 고도화. 20210218. @m.
		 */
		// 툴팁 z-index 는 select option 보다 위에 올 수 없어 아래처럼 처리
		$('.tooltip1').hover(function(){
			$('select').blur();
		});
	});
/*]]>*/</script>



<!-- cp1curriculum1 -->
<div class="cp1curriculum1">
	<strong class="tt1 mgr05em fw4 fsB8 vam">커리큘럼</strong>
	<div class="w1">
		<div class="w1w w1w1">
			<strong class="tt2">대단원(PART)</strong>
			<div class="cont fscroll1-xy">
				<div class="w1item">
					<div class="item on">
						<div class="control move" title="끌어서 놓기로 순서 이동"></div>
						<div class="tg1">
							<span class="t1 form-static1">Adobe XD 기초</span>
						</div>
						<div class="eg1">
							<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>
							<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>
						</div>
					</div>
					<div class="item">
						<div class="control move" title="끌어서 놓기로 순서 이동"></div>
						<div class="tg1">
							<input type="text" value="" placeholder="대단원 제목을 입력하세요." title="대단원 제목" class="w100 type1 text" />
						</div>
						<div class="eg1">
							<button type="button" class="b2 cancel"><span class="b2t1">취소</span></button>
							<button type="button" class="b2 save"><span class="b2t1">저장</span></button>
						</div>
					</div>
				</div>
				<button type="button" class="b3 add"><i class="b3ic1"></i> <span class="b3t1">추가</span></button>
			</div>
		</div>
		<div class="w1w w1w2">
			<strong class="tt2">소단원(CHAPTER)</strong>
			<div class="cont fscroll1-xy">
				<div class="w1item">
					<div class="item">
						<div class="control move" title="끌어서 놓기로 순서 이동"></div>
						<div class="tg1">
							<span class="t1 form-static1">01_Adobe XD 시작</span>
						</div>
						<div class="eg1">
							<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>
							<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>
						</div>
					</div>
					<div class="item on">
						<div class="control move" title="끌어서 놓기로 순서 이동"></div>
						<div class="tg1">
							<span class="t1 form-static1">02_도형 및 오브젝트 그리기</span>
						</div>
						<div class="eg1">
							<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>
							<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>
						</div>
					</div>
					<div class="item">
						<div class="control move" title="끌어서 놓기로 순서 이동"></div>
						<div class="tg1">
							<span class="t1 form-static1">03_색상 및 이미지 활용</span>
						</div>
						<div class="eg1">
							<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>
							<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>
						</div>
					</div>
				</div>
				<button type="button" class="b3 add"><i class="b3ic1"></i> <span class="b3t1">추가</span></button>
			</div>
		</div>
		<div class="w1w w1w3">
			<strong class="tt2">강의</strong>
			<div class="cont fscroll1-xy">
				<div class="w1item">
					<div class="item">
						<div class="control move" title="끌어서 놓기로 순서 이동"></div>
						<div class="tg1">
							<span class="t1 form-static1">MS 워드 2007 기초배우기 동영상 강좌 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</span>
						</div>
						<div class="eg1">
							<a href="?#★" class="b1 preview tooltip1">
								<span class="tooltip1c">
									미리보기 영상
								</span>
							</a>
							<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>
							<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>
						</div>
					</div>
					<div class="item">
						<div class="control move" title="끌어서 놓기로 순서 이동"></div>
						<div class="tg1">
							<span class="t1 form-static1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</span>
						</div>
						<div class="eg1">
							<a class="b1 preview"><span class="b1t1">미리보기 영상 없음</span></a>
							<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>
							<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>
						</div>
					</div>
					<div class="item">
						<div class="control move" title="끌어서 놓기로 순서 이동"></div>
						<div class="tg1">
							<span class="t1 form-static1">1차 과제</span>
						</div>
						<div class="eg1">
							<a class="b1 preview"><span class="b1t1">미리보기 영상 없음</span></a>
							<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>
							<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>
						</div>
					</div>
					<div class="cp1dropzone1" id="dropZone">
						<i class="ic1"></i>
						<div class="t1">
							<!-- @m)) 어디서 영상을 가져오는건가? -->
							영상을 <b class="em">여기에 끌어다 놓거나,</b><br />
							<b class="em">아래 추가 버튼</b>을 눌러 강의를 추가하세요.<br />
						</div>
					</div>
				</div>
				<div class="toggle1s1">
					<button type="button" class="b3 add toggle-b"><i class="b3ic1"></i> <span class="b3t1">(추가메뉴 여닫기)</span></button>
					<div class="toggle-c addmenu">
                        @if ($_GET['is_free'] == 'yes')
                            <a href="#layer1add1url1" class="a2 toggle" data-send-focus="that">URL로 영상 등록</a>
                        @endif
						<a href="#layer1add1playlist1" class="a2 toggle" data-send-focus="that">재생목록 영상 등록</a>
						<hr class="hr" />
						<a href="#layer1add1exam1" class="a2 toggle" data-send-focus="that">시험/과제 등록</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /cp1curriculum1 -->


<!-- (레이어팝업. URL로 영상 등록) -->
@include('sub.lecture.inc_layer_add_url')
<!-- (레이어팝업. 재생목록 영상 등록) -->
@include('sub.lecture.inc_layer_add_playlist')
<!-- (레이어팝업. 시험/과제 등록) -->
@include('sub.lecture.inc_layer_add_exam')

<script>/*<![CDATA[*/
	$(function(){
		// 레이어팝업 템플릿 바로 확인
		//$('[href="#layer1add1url1"]').first().triggerHandler('click');
		//$('[href="#layer1add1playlist1"]').first().triggerHandler('click');
		//$('[href="#layer1add1exam1"]').first().triggerHandler('click');
	});
/*]]>*/</script>


<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 커리큘럼. 추가.취소.저장.수정.삭제. 20210217. @m.
		 */
		(function(){
			var my = '.cp1curriculum1 .w1w', // 대단원, 소단원, 강의 공통
				w1item = '.w1item',
				item = '.item',
				add = '.add',
				cancel = '.cancel',
				save = '.save',
				edit = '.edit',
				del = '.del',
				preview = '.preview';
			var _input = ''; // 폼항목 태그
				_input += '<div class="item">';
				_input += '	<div class="control move" title="끌어서 놓기로 순서 이동"></div>';
				_input += '	<div class="tg1">';
				_input += '		 <input type="text" value="" placeholder="대단원 제목을 입력하세요." title="대단원 제목" class="w100 type1 text" />';
				_input += '	</div>';
				_input += '	<div class="eg1">';
				_input += '		<button type="button" class="b2 cancel"><span class="b2t1">취소</span></button>';
				_input += '		<button type="button" class="b2 save"><span class="b2t1">저장</span></button>';
				_input += '	</div>';
				_input += '</div>';
			var _item = ''; // 항목 태그
				_item += '<div class="item">';
				_item += '	<div class="control move" title="끌어서 놓기로 순서 이동"></div>';
				_item += '	<div class="tg1">';
				_item += '		 <span class="t1 form-static1">무제</span>';
				_item += '	</div>';
				_item += '	<div class="eg1">';
				_item += '		<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>';
				_item += '		<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>';
				_item += '	</div>';
				_item += '</div>';

			// 미래 항목 클릭 활성
			$(my).on('click', item, function(){
				if( !!$(this).closest('.w1w1').length || !!$(this).closest('.w1w2').length ){ // 대단원 또는 소단원이면 (강의 미포함)
					$(this).addClass('on').siblings().removeClass('on');
				}
			});

			// 미래 추가 클릭
			$(my).on('click', add, function(){
				if( !!$(this).closest('.w1w1').length || !!$(this).closest('.w1w2').length ){ // 대단원 또는 소단원이면 (강의 미포함)
					var $_input = $(_input);
					if( !!$(this).closest('.w1w2').length ){ // 소단원이면
						$_input.find('input[type="text"]').attr({
							placeholder: "소단원 제목을 입력하세요.",
							title: "소단원 제목"
						});
					}
					$_input.appendTo( $(this).parent().find(w1item) );
				}
			});

			// 미래 취소 클릭
			$(my).on('click', cancel, function(){
				var $myItem = $(this).closest(item); // 폼항목
				$myItem.prev(item+':hidden').show(); // 기존 요소 보임
				$myItem.remove(); // 폼항목 제거
			});

			// 미래 저장 클릭
			$(my).on('click', save, function(){
				var $_item = $(_item);
				var $myItem = $(this).closest(item); // 폼항목
				var str = $myItem.find('input[type="text"]').val();
				if( $myItem.prev(item).is(':hidden') ){ // 기존 요소 수정
					$_item = $myItem.prev(item).find('.t1').text( str ).end().show();
				}else{ // 새 요소 추가
					$_item.insertAfter( $myItem ).find('.t1').text( str );
				}
				// 기존 활성이면 활성
				if( $myItem.is('.on') ){
					$_item.addClass('on');
				}
				$myItem.remove(); // 폼항목 제거
			});

			// 미래 수정 클릭
			$(my).on('click', edit, function(){
				var $_input = $(_input);
				var $myItem = $(this).closest(item);
				$myItem.hide(); // 기존 항목 감춤
				if( !!$(this).closest('.w1w2').length ){ // 소단원이면
					$_input.find('input[type="text"]').attr({
						placeholder: "소단원 제목을 입력하세요.",
						title: "소단원 제목"
					});
				}
				$_input.insertAfter( $myItem ); // 폼항목 추가
				$_input.find('input[type="text"]').val( $myItem.find('.t1').text() ); // 기존 항목 값 가져옴
				// 기존 활성이면 활성
				if( $myItem.is('.on') ){
					$_input.addClass('on');
				}
			});

			// 미래 삭제 클릭
			$(my).on('click', del, function(){
				$(this).closest(item).remove();
			});

		})();


		/** ◇◆ 드래그앤드롭(마우스+터치) 순서이동. 20210217. @m.
		 * [IE9+]
		 * Use) makeDrag1('.cp1curriculum1');
		 */

		// 호출
		makeDrag1('.cp1curriculum1');

		// 드래그앤드롭 만들기
		function makeDrag1(selector){
			var sy = ey = 0;
			var my = selector,
				item =  '.item',
				mv = '.control.move';

			// 미래 요소 이벤트 연결
			// $(document).on('mousedown touchstart', mv, function(e){}); 이건 모바일 결함 있어 아래처럼 수정
			$(my).on('mousedown touchstart', mv, function(e){
				e.preventDefault(); // img 등 'mousedown' 동작 끊김 방지
				doDragDrop(e, $(this).closest(item));
			});

			// 드래그앤드롭 동작
			function doDragDrop(e, $c){
				if(e.originalEvent.touches || e.originalEvent.changedTouches){ // 터치 있으면
					var e = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0]; // 싱글 터치
				}else{
					var e = e || window.event;
				}
				sy = e.clientY;

				//console.log(e.type, $c.index(), sy);

				$(document).on('mouseup touchend', function(e){
					doDrop(e, $c);
				});
				$(document).on('mousemove touchmove', function(e){
					doDrag(e, $c);
				});
			}

			// 드래그 동작
			function doDrag(e, $c){
				if(e.originalEvent.touches || e.originalEvent.changedTouches){ // 터치 있으면
					var e = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0]; // 싱글 터치
				}else{
					var e = e || window.event;
				}
				ey = e.clientY - sy;
				$c.css({
					zIndex: '1',
					transform: 'translateY(' + ey + 'px)'
				});
			}

			// 드롭 동작 (순서변경)
			function doDrop(e, $c){
				$(document).off('mouseup mousemove touchend touchmove');

				//var $cs = $c.closest('.w1item').children();
				var $cs = $c.parent().children();
				var ofs = {
					zIndex: '',
					transform: 'none'
				};

				if( $c.position().top > $cs.last().position().top ){
					$cs.last().after( $c );
				}else{
					for(var i = 0; i < $cs.length; i++){
						if( $c.position().top < $cs.eq(i).position().top ){
							$cs.eq(i).before( $c );
							break;
						}
					}
				}
				$c.css(ofs);
			}
		}

	});
/*]]>*/</script>

<!-- 유료일 경우 보이지 않음 -->
@if ($_GET['is_free'] == 'yes')
<!-- cp1tag2 -->
<div class="cp1tag2">
	<div class="cont w1">
		<div class="w1w1">
			<div class="tg1">
				<a href="?#★" class="a1 on"> Adobe XD</a>
				<a href="?#★" class="a1 on">도형 및 오브젝트</a>
			</div>
			<div class="eg1">
				<input type="text" value="" placeholder="키워드를 추가해서 최적의 영상을 찾아보세요!" title="추가 키워드" class="text1 type1" />
				<button type="button" class="b1 add button gray4">추가</button>
			</div>
		</div>
		<div class="w1w2">
			<button type="button" class="b2 button primary block round"><span class="b1t1">검색</span></button>
		</div>
	</div>
</div>
<!-- /cp1tag2 -->
@endif
<!-- /유료일 경우 보이지 않음 -->

<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 강좌 주제 제거 추가. 20210302. @m.
		 */
		(function(){
			var my = '.cp1tag2',
				tg1 = '.tg1', // 주제 그룹
				a1on = '.a1.on', // 주제
				text1 = '.text1', // 입력
				b1add = '.b1.add', // 추가 버튼
				b2search = '.b2.search';

				// 미래 주제 클릭
				$(my).on('click', a1on, function(e){
					e.preventDefault();
					$(this).remove();
				});

				// 미래 추가 클릭
				$(my).on('click', b1add, function(){
					//var $last = $(this).closest(my).find(a1on).last();
					$('<a href="?#★" class="a1 on" />').appendTo( $(this).closest(my).find(tg1) ).text( $(this).prevAll('.text1').val() );
				});
		})();

	});
/*]]>*/</script>

<!-- 유료일 경우 보이지 않음 -->
@if ($_GET['is_free'] == 'yes')
<!-- cp1tag1 -->
<div class="cp1tag1 mgt4em mgb4em">
	<div class="tags">
		<a href="?#★" class="a1 on">#파이썬</a>
		<a href="?#★" class="a1 on">#JavaScript</a>
		<a href="?#★" class="a1">#모바일 앱 개발</a>
		<a href="?#★" class="a1">#HTML/CSS</a>
		<a href="?#★" class="a1">#데이터분석</a>
		<a href="?#★" class="a1">#파이썬</a>
		<a href="?#★" class="a1">#JavaScript</a>
		<a href="?#★" class="a1">#모바일 앱 개발</a>
		<a href="?#★" class="a1">#HTML/CSS</a>
		<a href="?#★" class="a1">#데이터분석</a>
		<a href="?#★" class="a1">#파이썬</a>
		<a href="?#★" class="a1">#JavaScript</a>
		<a href="?#★" class="a1">#모바일 앱 개발</a>
		<a href="?#★" class="a1">#HTML/CSS</a>
		<a href="?#★" class="a1">#데이터분석</a>
	</div>
	<a href="?#★" class="more">더보기</a>
</div>
<!-- /cp1tag1 -->
@endif
<!-- /유료일 경우 보이지 않음 -->

<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 태그선택 20210219. @m
		 */
		(function(){
			var my = '.cp1tag1',
				m = my + ' .a1';
			// 미래 태그 클릭
			$(document).on('click', m, function(e){
				e.preventDefault();
				if( $(this).is('.on') ){
					$(this).removeClass('on');
				}else{
					$(this).addClass('on');
				}
			});
		})();

		/** ◇◆ 더보기클릭 20210219. @m
		 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
		 */
		(function(){
			var $my = $('.cp1tag1'),
				$more = $('.more', $my),
				$tags = $('.tags', $my);

			// 더보기 클릭 샘플
			$more.on('click', function(e){
				e.preventDefault();
				var html = '';
				html += '<a href="?#★" class="a1">#추가한태그</a>';
				html += '<a href="?#★" class="a1">#추가한태그</a>';
				html += '<a href="?#★" class="a1">#추가한태그</a>';
				html += '<a href="?#★" class="a1">#추가한태그</a>';
				html += '<a href="?#★" class="a1">#추가한태그</a>';
				$tags.append($(html));
			});
		})();

	});
/*]]>*/</script>

<!-- 유료일 경우 보이지 않음 -->
@if ($_GET['is_free'] == 'yes')

<!-- cp1fcard3 -->
<div id="cp1fcard3a1" class="cp1fcard3 mgt0 mgb2em pdt1em pdb1em">
<div class="wrap1">

	<h3 class="fw6 fsB10">두런에서 검색결과</h3>

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234">
		<div class="item column">
			<div class="w1">
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
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
						<span class="t2">데이터에듀 · 조회수 1800회</span>
						<span class="t4">정확도 80%</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
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

@endif
<!-- /유료일 경우 보이지 않음 -->


<script>/*<![CDATA[*/
	$(function(){

        /** ◇◆ 더보기클릭샘플. 20210217. 20210312. @m
        * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
        */
        (function(){
            var $my = $('#cp1fcard3a1'),
                $more = $('.more', $my),
                $lst = $('.lst1', $my);
            var html = $lst.html();

            $more.on('click', function(e){
                e.preventDefault();
                $lst.append($(html));
                // 추가된거 위해 토글기능 재부여!
                $('.toggle').off(); // 기존 토글 이벤트 핸들러 제거 제거하여 2번 실행되는 오류 방지
                MJS.doToggle();
            });
        })();

    });
/*]]>*/</script>


<!-- 유료일 경우 보이지 않음 -->
@if ($_GET['is_free'] == 'yes')
<a href="#cp1fcard3a2" class="cp1switch1 switch toggle fw4">
	<span class="t1">유튜브에서 검색</span>
	<span class="t1 sw-off">OFF</span>
	<span class="t1 sw-on">ON</span>
	<i class="ic1"></i>
</a>

<!-- cp1fcard3 -->
<div id="cp1fcard3a2" class="cp1fcard3 mgt0 mgb2em pdt1em pdb1em">
<div class="wrap1">

	<h3 class="fw6 fsB10">유튜브에서 검색결과</h3>

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234">
		<div class="item column">
			<div class="w1">
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p001.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">자동 합계로 함수 쉽게 사용</strong>
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p002.jpg') }}" alt="★대체텍스트필수" />
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p003.jpg') }}" alt="★대체텍스트필수" />
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p004.jpg') }}" alt="★대체텍스트필수" />
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p005.jpg') }}" alt="★대체텍스트필수" />
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p006.jpg') }}" alt="★대체텍스트필수" />
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p007.jpg') }}" alt="★대체텍스트필수" />
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
				<a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p008.jpg') }}" alt="★대체텍스트필수" />
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
@endif
<!-- /유료일 경우 보이지 않음 -->

<script>/*<![CDATA[*/
	$(function(){

        /** ◇◆ 더보기클릭샘플. 20210217. 20210312. @m
        * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
        */
        (function(){
            var $my = $('#cp1fcard3a2'),
                $more = $('.more', $my),
                $lst = $('.lst1', $my);
            var html = $lst.html();

            $more.on('click', function(e){
                e.preventDefault();
                $lst.append($(html));
                // 추가된거 위해 토글기능 재부여!
                $('.toggle').off(); // 기존 토글 이벤트 핸들러 제거 제거하여 2번 실행되는 오류 방지
                MJS.doToggle();
            });
        })();

    });
/*]]>*/</script>

<!-- (레이어팝업. 영상미리보기) -->
@include('sub.lecture.inc_layer_video_preview')

<script>/*<![CDATA[*/
	$(function(){
		// 레이어팝업 템플릿 바로 확인
		//$('[href="#layer1video1preview1"]').first().triggerHandler('click');
	});
/*]]>*/</script>

{{-- 미리보기 --}}
@elseif ($step == 'preview')

<!-- width1wrap1 -->
<div class="width1wrap1">

<!-- cp1view1 -->
<div class="cp1view1">

    <!-- w1video -->
    <div class="w1video">
        <div class="flex1wrap1">
            <video class="video" controls="controls" poster="{{ asset('assets/images/lib/x2/x2p1001.jpg') }}" src="http://content.jwplatform.com/videos/HkauGhRi-640.mp4">
                <div class="alternativeContent">
                    <p>Your browser does not support the video element.</p>
                </div>
            </video>
            <!-- <i class="ic1 play">Play</i> -->
        </div>
    </div>
    <!-- /w1video -->

    <div class="w1">
        <div class="w1w1">
            <div class="tg1">
                <strong class="t1">[ 파이썬 올인원! ] 파이썬 기초부터 심화과정까지 한번에! 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
            </div>
            <div class="ratings">
                <strong class="t1 blind">별점</strong>
                <i class="star5rating1">
                    <i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
                    <i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
                </i>
                <span class="t2">
                    (<span class="t2t1">평점</span> <span class="t2t2">3.5</span>)
                </span>
                <span class="t3">
                    <span class="t3t1">수강후기</span> <span class="t3t2">30개</span>
                </span>
            </div>
            <div class="tg2">
                <b class="t2">수료증 발급 가능</b>
                <b class="t2">실시간 채팅 가능</b>
                <b class="t2">과제 있음</b>
            </div>
        </div>
        <div class="w1w2">
            <div class="tg3">
                <a href="?#★" class="b1 button primary">수강신청하기</a>
                <b class="t3">무료</b>
            </div>
        </div>
    </div>

</div>
<!-- /cp1view1 -->

<!-- cp1view2 -->
<div class="cp1view2">

<!-- cp1info1 -->
<div class="cp1info1">
    <div class="w1">
        <div class="w1w1">
            <div class="tg1">
                <i class="new">New</i>
                <span class="t1">
                    <span class="t1t1">총 30 강의</span>
                    <i class="sep">/</i>
                    <span class="t1t2">총 시간 10시간 10분</span>
                </span>
            </div>
            <div class="tg2">
                <b class="g1"><span class="g1t1">Top</span><span class="g1t2">10</span></b>
                <span class="t2">지금 뜨는 강좌 순위 3위</span>
            </div>
            <div class="tg3">
                엑셀 기초부터 심화까지 모든 내용을 학습할 수 있도록 데이터에듀가 직접 제작한 커리큘럼 입니다.
                데이터 입력만 가능한 엑셀 초보! 엑셀에 능숙하지 못한 사회초년생! 단순 반복 작업으로 야근러가 된 직장인! 엑셀을 필요로 하는 모두를 위한 강의를 하나의 커리큘럼으로 모았습니다!
            </div>
        </div>
        <div class="w1w2">
            <ul class="cp1dl1 mgt05em">
            <li class="di1">
                <span class="dt1">강사명</span> <span class="sep">:</span>
                <span class="dd1"><a href="?#★" class="a1">데이터에듀</a></span>
            </li>
            <li class="di1">
                <span class="dt1">난이도</span> <span class="sep">:</span>
                <span class="dd1">초급, 중급</span>
            </li>
            <li class="di1">
                <span class="dt1">태그</span> <span class="sep">:</span>
                <span class="dd1">
                    <span class="dpib">#엑셀</span>
                    <span class="dpib">#엑셀기초</span>
                    <span class="dpib">#일이삼사오</span>
                    <span class="dpib">#일이삼사오</span>
                    <span class="dpib">#일이삼사오</span>
                </span>
            </li>
            <!-- <li class="di1">
                <span class="dt1">주제</span> <span class="sep">:</span>
                <span class="dd1">
                    <span class="dpib">엑셀</span>
                    <span class="dpib">엑셀기초</span>
                </span>
            </li> -->
            </ul>
        </div>
    </div>
</div>
<!-- /cp1info1 -->

</div>
<!-- /cp1view2 -->

</div>
<!-- /width1wrap1 -->

@endif

</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection

@section('script')
<script>

</script>
@endsection
