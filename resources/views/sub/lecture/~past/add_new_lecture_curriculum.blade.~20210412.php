@php
$step = isset($_GET['step']) ? $_GET['step'] : '';
$isFree = isset($_GET['is_free']) ? $_GET['is_free'] : '';
@endphp

@extends('sub.lecture.add_new_lecture')

@section('sub_content')

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
		<div class="w1w w1w1" id="div_bchap">
			<strong class="tt2">대단원(PART)</strong>
			<div class="cont fscroll1-xy">
				<div class="w1item">
					<!-- 대단원 추가 -->
				</div>
				<button type="button" class="b3 add"><i class="b3ic1"></i> <span class="b3t1">추가</span></button>
			</div>
		</div>
		<div class="w1w w1w2" id="div_schap">
			<strong class="tt2">소단원(CHAPTER)</strong>
			<div class="cont fscroll1-xy">
				<div class="w1item">
                    <!-- 소단원 추가 -->
				</div>
				<button type="button" class="b3 add"><i class="b3ic1"></i> <span class="b3t1">추가</span></button>
			</div>
		</div>
		<div class="w1w w1w3" div="div_video">
			<strong class="tt2">강의</strong>
			<div class="cont fscroll1-xy">
				<div class="w1item">
                    <!-- 강의 추가 -->
					{{-- <div class="item">
						<div class="control move" title="끌어서 놓기로 순서 이동"></div>
						<div class="tg1">
							<span class="t1 form-static1">MS 워드 2007 기초배우기 동영상 강좌 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</span>
						</div>
						<div class="eg1">
							<a href="javascript:void(0);" class="b1 preview tooltip1">
								<span class="tooltip1c">
									미리보기 영상
								</span>
							</a>
							<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>
							<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>
						</div>
					</div> --}}
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
                        @if ($_GET['is_free'] == 'Y')
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

            var bchapIdx = 0;  // 대단원(Part) 인덱스
            var schapIdx = 0;  // 소단원(Chapter) 인덱스
            var videoIdx = 0;  // 강의 인덱스

			// 미래 항목 클릭 활성
			$(my).on('click', item, function(){
				if( !!$(this).closest('.w1w1').length || !!$(this).closest('.w1w2').length ){ // 대단원 또는 소단원이면 (강의 미포함)
					$(this).addClass('on').siblings().removeClass('on');

                    if( !!$(this).closest('.w1w1').length ){  // 대단원이면
                        $('div:has("")').hide();

                        // if ($('.w1w2 .tg1 input[type="text"]').attr('bchap_idx') == $(this).attr('bchap_idx')) {
                        //     $('.w1w2 .cont').hide();
                        // }
                    }
				}
			});

			// 미래 추가 클릭
			$(my).on('click', add, function(){
				if( !!$(this).closest('.w1w1').length || !!$(this).closest('.w1w2').length ){ // 대단원 또는 소단원이면 (강의 미포함)
					var $_input = $(_input);
					if( !!$(this).closest('.w1w2').length ){ // 소단원이면

                        // 대단원을 선택했을 경우에만 소단원 추가 가능
                        if (!!$('#div_bchap').find('.on').length) {
                            $_input.find('input[type="text"]').attr({
                                placeholder: "소단원 제목을 입력하세요.",
                                title: "소단원 제목",
                                bchap_idx: $('div.on .tg1 input[type="text"]').attr('bchap_idx'),
                                schap_idx: schapIdx
                            });
                            schapIdx++;

                        } else {
                            alert('대단원을 선택해주세요.');
                            return false;
                        }

					} else { // 대단원이면
                        $_input.find('input[type="text"]').attr({
                            bchap_idx: bchapIdx
						});
                        bchapIdx++;
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

				getRecommandVideoData('curriculum', str);
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

                getRecommandVideoData('curriculum', '');
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
@if ($_GET['is_free'] == 'Y')
<!-- cp1tag2 -->
<div class="cp1tag2">
	<div class="cont w1">
		<div class="w1w1">
			<div class="tg1">
                {{-- 추가 버튼 클릭 시 주제가 해당 위치에 추가됨 --}}
			</div>
			<div class="eg1">
				<input type="text" value="" id="input_subject" placeholder="키워드를 추가해서 최적의 영상을 찾아보세요!" title="추가 키워드" class="text1 type1" />
				<button type="button" class="b1 add button gray4">추가</button>
			</div>
		</div>
		<div class="w1w2">
			<button type="button" class="b2 button primary block round" onclick="getRecommandVideoData('keyword', '');"><span class="b1t1">검색</span></button>
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
				// $(my).on('click', b1add, function(){
				// 	//var $last = $(this).closest(my).find(a1on).last();
				// 	$('<a href="?#★" class="a1 on" />').appendTo( $(this).closest(my).find(tg1) ).text( $(this).prevAll('.text1').val() );
				// });

                $(my).on('click', b1add, function(){
                    if ($('#input_subject').val() != '') {
                        var $last = $(this).closest(my).find(a1on).last();
                        $('<a href="javascript:void(0);" class="a1 on" />').appendTo( $(this).closest(my).find(tg1) ).text( $(this).prevAll('.text1').val() );
                        $('#input_subject').val('');
                    }
                    $('#input_subject').focus();
                });
		})();

	});
/*]]>*/</script>

<!-- 유료일 경우 보이지 않음 -->
@if ($_GET['is_free'] == 'Y')
<!-- cp1tag4 -->
<div class="cp1tag4">
	<strong class="h1">주제</strong>
	<div class="tags">
        @foreach ($videoTagArr as $tag)
            @if ($tag != '')
            <a href="javascript:void(0);" class="a1">{{ $tag }}</a>
            @endif
        @endforeach
	</div>
	@if (count($videoTagArr) > 1)
	<a href="javascript:void(0);" class="more">더보기</a>
    @endif
</div>
<!-- /cp1tag4 -->
@endif
<!-- /유료일 경우 보이지 않음 -->

<script>/*<![CDATA[*/
	$(function(){

        /** ◇◆ 태그선택. 20210330. @m
		 */
		(function(){
			var my = '.cp1tag4',
				m = '.a1';
			// 클릭
			$(my).on('click', m, function(e){
				e.preventDefault();
				if( $(this).is('.on') ){
					$(this).removeClass('on');
				}else{
					$(this).addClass('on');
					$(this).prependTo( $(this).parent() );
				}

                var tagNameList = [];
                var onTags = $('.tags').find('.on');

                // 선택된 주제 이름 배열로 저장
                $.each(onTags, function(index, value) {
                    var tagName = $(value).text();

                    if (tagName != '') {
                        // 선택한 값이 배열에 있으면 삭제
                        if (tagNameList.includes(tagName)) {
                            tagNameList.pop(tagName);

                        // 없으면 추가
                        } else {
                            tagNameList.push(tagName);
                        }
                    }
                });
                // console.log(tagNameList);

                getRecommandVideoData('tag', tagNameList);
			});
		})();

		/** ◇◆ 더보기클릭샘플. 20210330. @m
		 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
		 */
		(function(){
			var $my = $('.cp1tag4'),
				$more = $('.more', $my),
				$tags = $('.tags', $my);

			$more.on('click', function(e){
				e.preventDefault();
				var html = '';
				html += '<a href="?#★" class="a1">추가한태그1</a>';
				html += '<a href="?#★" class="a1">추가한태그2</a>';
				html += '<a href="?#★" class="a1">추가한태그3</a>';
				html += '<a href="?#★" class="a1">추가한태그4</a>';
				html += '<a href="?#★" class="a1">추가한태그5</a>';
				$tags.append($(html));
			});
		})();
	});
/*]]>*/</script>

<!-- 유료일 경우 보이지 않음 -->
@if ($_GET['is_free'] == 'Y')

<!-- cp1fcard3 -->
<div id="cp1fcard3a1" class="cp1fcard3 mgt0 mgb2em pdt1em pdb1em">
<div class="wrap1">

	<h3 class="fw6 fsB10">두런에서 검색결과</h3>

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234" id="div_video_list">
        @foreach ($videoList as $video)
        <div class="item column">
            <div class="w1">
                <a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that">
                    <div class="f1">
                        <span class="f1p1">
                            <img src="https://img.youtube.com/vi/{{ $video->uid }}/mqdefault.jpg" alt="{{ $video->title }}">
                        </span>
                        <i class="ic1 play">Play</i>
                    </div>
                    <div class="tg1">
                        <strong class="t1">{{ $video->title }}</strong>
                    </div>
                    <div class="tg2">
                        <span class="t2">{{ $video->channel }} · 조회수 {{ $video->hit_cnt }}회</span>
                        <span class="t4">정확도 80%</span>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
	</div>
	<!-- /lst1 -->

	<!-- cp1more1 -->
	<div class="cp1more1" id="more_dolearn">
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
@if ($_GET['is_free'] == 'Y')
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
        <!-- TODO: loop -->
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

@endsection

@section('sub_script')
<script>
$(function() {

});

// 입력 정보 저장 후 다음 단계로 이동
function saveAndGoNextStep(nextStep) {
    // $.ajax({
    //     type: 'POST',
    //     dataType: 'json',
    //     url: "{{ route('sub.lecture.tempsave_add_lecture') }}",
    //     data: {

    //     },
    //     // contentType: false,
    //     // processData: false,
    //     success: (data) => {
    //         if (data.status == 'success') {
    //             // alert('done!');
    //             location.href='/sub/lecture/add_new_lecture?step=' + nextStep + '&is_free={{ $isFree }}';
    //         }
    //     },
    //     error: function(request, status, error) {
    //         console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
    //     },
    //     complete: function(data) {
    //         //
    //     }
    // });

    location.href='/sub/lecture/add_new_lecture?step=' + nextStep + '&is_free={{ $isFree }}';
}

function getRecommandVideoData(searchMethod, searchData) {
    if (searchMethod == 'keyword') {
        var keywordList = [];
        var onTags = $('.tg1').find('.on');

        // 선택된 주제 이름 배열로 저장
        $.each(onTags, function(index, value) {
            var keyword = $(value).text();

            if (keyword != '') {
                keywordList.push(keyword);
            }
        });
        // console.log(keywordList);

        searchData = keywordList;
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.lecture.get_recommand_video_data') }}",
        data: {
            'search_method': searchMethod,
            'search_data': searchData,
            'bcate_id': '{{ $tempInfo->main_bcate_id }}',
            'scate_id': '{{ $tempInfo->main_scate_id }}',
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');

                if (data.resData.length != 0) {
                    // console.log(data.resData);

                    $('#div_video_list').empty();
                    $('#div_video_list').append(data.resData);

                } else {
                    html = '강의 영상 목록이 없습니다.';

                    $('#div_video_list').empty();
                    $('#div_video_list').append(html);
                    $('#more_dolearn').hide();
                }
            } else {
                alert('강의 영상 목록 조회에 실패했습니다.\n관리자에게 문의 바랍니다.');
            }
        },
        error: function(request, status, error) {
            console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
        },
        complete: function(data) {
            //
        }
    });
}
</script>
@endsection
