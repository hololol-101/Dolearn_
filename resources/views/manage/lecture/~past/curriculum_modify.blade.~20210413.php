<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210224 | @m | 요구반영. 결함개선. 고도화.
 * ~20210302 | @m |
 * 20210412 | @m | 요구반영
 */
-->
@extends('master_manage')

@php
// 유/무료에 따라 분기 : title, url로 영상 등록, 영상 검색 결과
if (isset($_GET['is_free'])) {
    if ($_GET['is_free'] == 'yes') {
        $title = '강좌관리상세 - 커리큘럼 수정(무료강좌)';

    } else if ($_GET['is_free'] == 'no') {
        $title = '강좌관리상세 - 커리큘럼 수정(유료강좌)';
    } else {
        $title = '강좌관리상세 - 커리큘럼 수정';
    }
} else {
    $title = '강좌관리상세 - 커리큘럼 수정';
}
@endphp

@section('title', $title)

@section('content')

<? $d1n = '1'; $d2n = '3'; // 1차2차활성 ?>

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
		<h2 class="h1">커리큘럼 수정</h2>
	</div>
	<div class="eg1">
		<a href="javascript:history.back();" class="b1 button">뒤로가기</a>
		<a href="?#★" class="b2 button primary">저장하기</a>
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


<!-- cp1curriculum1 -->
<div class="cp1curriculum1">
	<strong class="tt1 mgr05em fw5 fsB8 vam">커리큘럼</strong>
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
                    <!-- 유료일 경우 보이지 않음 -->
                    @if ($_GET['is_free'] == 'yes')

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
                    @endif

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
                        @if (isset($_GET['is_free']))
                            @if ($_GET['is_free'] == 'yes')
                                <a href="#layer1add1url1" class="a2 toggle" data-send-focus="that">URL로 영상 등록</a>
                            @endif
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
@include('manage.lecture.inc_layer_add_url')

<!-- (레이어팝업. 재생목록 영상 등록) -->
@include('manage.lecture.inc_layer_add_playlist')

<!-- (레이어팝업. 시험/과제 등록) -->
@include('manage.lecture.inc_layer_add_exam')

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

		/** ◇◆ 커리큘럼. 추가.취소.저장.수정.삭제. 20210302. @m.
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
				if( confirm('삭제하시겠습니까?') ){
					$(this).closest(item).remove();
				}
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
            <div class="eg1">
				<input type="text" value="" placeholder="키워드를 추가해서 최적의 영상을 찾아보세요!" title="추가 키워드" class="text1 type1" />
				<button type="button" class="b1 add button gray4">추가</button>
			</div>
			<div class="tg1">
				<a href="?#★" class="a1 on"> Adobe XD</a>
				<a href="?#★" class="a1 on">도형 및 오브젝트</a>
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
						<span class="t2">데이터에듀 · 조회수 1800회</span>
						<span class="t4">정확도 80%</span>
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
@endif
<!-- /유료일 경우 보이지 않음 -->


<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 더보기클릭샘플. 20210217. @m
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
				<a href="?#★" class="a1">
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
				<a href="?#★" class="a1">
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
				<a href="?#★" class="a1">
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
				<a href="?#★" class="a1">
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
				<a href="?#★" class="a1">
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
				<a href="?#★" class="a1">
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
				<a href="?#★" class="a1">
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
				<a href="?#★" class="a1">
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

		/** ◇◆ 더보기클릭샘플. 20210217. @m
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
