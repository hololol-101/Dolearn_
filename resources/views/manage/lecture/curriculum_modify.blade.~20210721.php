<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210224 | @m | 요구반영. 결함개선. 고도화.
 * ~20210302 | @m |
 * 20210412 | @m | 요구반영
 * 20210525 | @m |
 */
-->

@php
$lectureIdx = isset($_GET['idx']) ? $_GET['idx'] : '';
$isFree = isset($_GET['is_free']) ? $_GET['is_free'] : '';
$title = '강좌관리상세 - 커리큘럼 수정';

// 유/무료에 따라 분기 : title, url로 영상 등록, 영상 검색 결과
if ($isFree != '') {
    if ($isFree == 'Y') {
        $title = '강좌관리상세 - 커리큘럼 수정(무료강좌)';

    } else if ($isFree == 'N') {
        $title = '강좌관리상세 - 커리큘럼 수정(유료강좌)';
    }
}
@endphp

@extends('master_manage')

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
		<a href="javascript:void(0);" class="b2 button primary" onclick="saveCurriculum()">저장하기</a>
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

<!-- even-grid -->
<div class="form1item1 even-grid gap0 vgap00 mgb2em">
	<div class="small-12 column">
		<strong class="tt1 mgr05em fw5 fsB8 vam">대표 동영상</strong>
		<div class="bi1 dpib fsS1 vam">
			<a href="javascript:void(0);" class="li1 tooltip1">
				<span class="tooltip1c">
					강좌 상세 페이지로 들어온 회원들에게 가장 먼저 보여지는 소개 동영상입니다.
					커리큘럼에서 미리보기를 지정한 강의 중 선택 할 수 있습니다.
					선택하지 않을경우 강좌 섬네일로 대체됩니다.
				</span>
			</a>
		</div>
	</div>
	<div class="small-12 large-6 column">
		<select title="대표 동영상" class="w100 type1" id="main_video">
			<option value="">대표 동영상을 선택하세요.</option>
		</select>
	</div>
</div>
<!-- /even-grid -->

<!-- cp1curriculum1 -->
<div class="cp1curriculum1">
	<strong class="tt1 mgr05em fw5 fsB8 vam">커리큘럼</strong>
	<div class="w1">
		<div class="w1w w1w1">
			<strong class="tt2">대단원(PART)</strong>
			<div class="cont fscroll1-xy">
				<div class="w1item" id="div_bchap">
					<!-- 대단원 추가 -->
                    @if (isset($bchapterList))
                        @foreach ($bchapterList as $bchapter)
                        <div class="item" style="cursor:pointer">
                            <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                            <div class="tg1">
                                <span class="t1 form-static1" bchap_id="{{ $bchapter->bchap_id }}">{{ $bchapter->bchap_name }}</span>
                            </div>
                            <div class="eg1">
                                <button type="button" class="b1 edit"><span class="b1t1">수정</span></button>
                                <button type="button" class="b1 del"><span class="b1t1">삭제</span></button>
                            </div>
                        </div>
                        @endforeach
                    @endif
				</div>
				<button type="button" class="b3 add"><i class="b3ic1"></i> <span class="b3t1">추가</span></button>
			</div>
		</div>
		<div class="w1w w1w2">
			<strong class="tt2">소단원(CHAPTER)</strong>
			<div class="cont fscroll1-xy">
                <!-- 소단원 default -->
                <div class="w1item" id="div_schap_default">
                    <div class="item2" style="margin-left: 15px">
                        <div class="tg1">
                            <span class="t1 form-static1">대단원을 선택해주세요.</span>
                        </div>
                    </div>
                </div>
				<div class="w1item" id="div_schap">
					<!-- 소단원 추가 -->
                    @if (isset($schapterList))
                        @foreach ($schapterList as $schapter)
                        <div class="item" style="cursor:pointer">
                            <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                            <div class="tg1">
                                <span class="t1 form-static1" bchap_id="{{ $schapter->bchap_id }}" schap_id="{{ $schapter->schap_id }}">{{ $schapter->schap_name }}</span>
                            </div>
                            <div class="eg1">
                                <button type="button" class="b1 edit"><span class="b1t1">수정</span></button>
                                <button type="button" class="b1 del"><span class="b1t1">삭제</span></button>
                            </div>
                        </div>
                        @endforeach
                    @endif
				</div>
				<button type="button" class="b3 add"><i class="b3ic1"></i> <span class="b3t1">추가</span></button>
			</div>
		</div>
		<div class="w1w w1w3">
			<strong class="tt2">강의</strong>
			<div class="cont fscroll1-xy">
                <!-- 강의 default -->
                <div class="w1item" id="div_video_default">
                    <div class="item2" style="margin-left: 15px">
                        <div class="tg1">
                            <span class="t1 form-static1">소단원을 선택해주세요.</span>
                        </div>
                    </div>
                </div>
				<div class="w1item" id="div_video">
                    <!-- 유료일 경우 보이지 않음 -->
                    @if ($isFree == 'Y')
                        <!-- 강의 추가 -->
                        @if (isset($videoInfoList))
                            @foreach ($videoInfoList as $videoInfo)
                            <div class="item" style="cursor:pointer">
                                <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                                <div class="tg1">
                                    <span class="t1 form-static1" bchap_id="{{ $videoInfo->bchap_id }}" schap_id="{{ $videoInfo->schap_id }}" video_id="{{ $videoInfo->uid }}" preview_yn="{{ $videoInfo->preview_yn }}">{{ $videoInfo->new_video_title }}</span>
                                    {{-- <span class="t1 form-static1" bchap_id="{{ $videoInfo->bchap_id }}" schap_id="{{ $videoInfo->schap_id }}" video_id="{{ $videoInfo->uid }}" analysis_yn="{{ $videoInfo->analysis_yn }}" preview_yn="{{ $videoInfo->preview_yn }}">{{ $videoInfo->new_video_title }}</span> --}}
                                </div>
                                <div class="eg1">
                                    @if ($videoInfo->preview_yn == 'Y')
                                    <a href="javascript:void(0);" class="b1 preview tooltip1"><span class="tooltip1c">미리보기 영상</span></a>
                                    @else
                                    <a class="b1 preview"><span class="b1t1">미리보기 영상 없음</span></a>
                                    @endif
                                    <button type="button" class="b1 edit"><span class="b1t1">수정</span></button>
                                    <button type="button" class="b1 del"><span class="b1t1">삭제</span></button>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    @endif
					<div class="cp1dropzone1" id="dropZone">
						<i class="ic1"></i>
						<div class="t1">
							영상을 <b class="em">여기에 끌어다 놓거나,</b><br />
							<b class="em">아래 추가 버튼</b>을 눌러 강의를 추가하세요.<br />
						</div>
					</div>
				</div>
				<div class="toggle1s1">
					<button type="button" class="b3 add toggle-b"><i class="b3ic1"></i> <span class="b3t1">(추가메뉴 여닫기)</span></button>
					<div class="toggle-c addmenu">
                        @if (isset($_GET['is_free']))
                            @if ($_GET['is_free'] == 'Y')
                                <a href="#layer1add1url1" class="a2 toggle" data-send-focus="that">URL로 영상 등록</a>
                            @endif
                        @endif
						<a href="#layer1add1playlist1" class="a2 toggle" data-send-focus="that">재생목록 영상 등록</a>
						{{-- <hr class="hr" />
						<a href="#layer1add1exam1" class="a2 toggle" data-send-focus="that">시험/과제 등록</a> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /cp1curriculum1 -->


<!-- (레이어팝업. URL로 영상 등록) -->
{{-- @include('manage.lecture.inc_layer_add_url') --}}
@include('sub.lecture.inc_layer_add_url')

<!-- (레이어팝업. 재생목록 영상 등록) -->
{{-- @include('manage.lecture.inc_layer_add_playlist') --}}
@include('sub.lecture.inc_layer_add_playlist')

<!-- (레이어팝업. 시험/과제 등록) -->
{{-- @include('manage.lecture.inc_layer_add_exam') --}}
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
				_input += '<div class="item" style="cursor:pointer;">';
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
				_item += '<div class="item" style="cursor:pointer;">';
				_item += '	<div class="control move" title="끌어서 놓기로 순서 이동"></div>';
				_item += '	<div class="tg1">';
				_item += '		 <span class="t1 form-static1">무제</span>';
				_item += '	</div>';
				_item += '	<div class="eg1">';
				_item += '		<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>';
				_item += '		<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>';
				_item += '	</div>';
				_item += '</div>';

            var bchapId = 0;  // 대단원(Part) 인덱스
            var schapId = 0;  // 소단원(Chapter) 인덱스
            var videoId = 0;  // 강의 인덱스

			// 미래 항목 클릭 활성
			$(my).on('click', item, function(){
				if( !!$(this).closest('.w1w1').length || !!$(this).closest('.w1w2').length || !!$(this).closest('.w1w3').length ){ // 대단원 또는 소단원이면 (강의 미포함)
                    $(this).addClass('on').siblings().removeClass('on');

                    if( !!$(this).closest('.w1w1').length ){  // 대단원이면
                        var _bchapId = $('#div_bchap div.on').find('.t1').attr('bchap_id');

                        $('#div_schap div.on').removeClass('on');  // 소단원 비활성화

                        $('#div_schap_default').hide();
                        $('#div_video_default').show();

                        $('#div_schap').find('.t1').each(function() {
                            if ($(this).attr('bchap_id') == _bchapId) {
                                $(this).parents('.item').show();
                            } else {
                                $(this).parents('.item').hide();
                            }
                        });

                        $('#div_video').find('.item').each(function() {
                            $(this).hide();
                        });

                        // $('#dropZone').show();

                    } else if( !!$(this).closest('.w1w2').length ){  // 소단원이면
                        var _schapId = $('#div_schap div.on').find('.t1').attr('schap_id');

                        $('#div_video_default').hide();

                        $('#div_video').find('.t1').each(function() {
                            if ($(this).attr('schap_id') != _schapId) {
                                $(this).parents('.item').hide();
                            } else {
                                $(this).parents('.item').show();
                            }
                        });
                    }
				}
			});

			// 미래 추가 클릭
			$(my).on('click', add, function(){
				if( !!$(this).closest('.w1w1').length || !!$(this).closest('.w1w2').length ){ // 대단원 또는 소단원이면 (강의 미포함)
					var $_input = $(_input);

					if( !!$(this).closest('.w1w2').length ){ // 소단원이면
                        var _schapId = $('#div_schap div.on').find('.t1').attr('schap_id');

                        // 대단원을 선택했을 경우에만 소단원 추가 가능
                        if (!!$('#div_bchap div.on').find('.t1').length) {
                            $_input.find('input[type="text"]').attr({
                                placeholder: "소단원 제목을 입력하세요.",
                                title: "소단원 제목",
                                bchap_id: $('div.on .t1').attr('bchap_id'),
                                schap_id: parseInt(_schapId) + 1
                            });
                            schapId++;

                        } else {
                            alert('대단원을 선택해주세요.');
                            return false;
                        }

					} else { // 대단원이면
                        var _bchapId = $('#div_bchap div.on').find('.t1').attr('bchap_id');

                        $_input.find('input[type="text"]').attr({
                            bchap_id: parseInt(_bchapId) + 1
						});
                        bchapId++;
                    }
					$_input.appendTo( $(this).parent().find(w1item) );
                    // $_input.find('input[type="text"]').focus();
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
                var _bchapId = $myItem.find('input[type="text"]').attr('bchap_id');
                var _schapId = $myItem.find('input[type="text"]').attr('schap_id');
                var _videoId = $myItem.find('input[type="text"]').attr('video_id');

                if (str == '') {
                    alert('내용을 입력해주세요.');
                    return false;
                }

				if( $myItem.prev(item).is(':hidden') && $myItem.prev(item).hasClass('modify')){ // 기존 요소 수정
					$_item = $myItem.prev(item).find('.t1').text( str ).end().show();

				}else{ // 새 요소 추가
					$_item.insertAfter( $myItem ).find('.t1').text( str );

                    if( !!$(this).closest('.w1w2').length ){ // 소단원일 때
                        $_item.insertAfter( $myItem ).find('span').attr({
                            bchap_id: _bchapId,
                            schap_id: _schapId
                        });
                        getRecommandVideoData('curriculum', str);

                    } else if ( !!$(this).closest('.w1w1').length ){ // 대단원일 때
                        $_item.insertAfter( $myItem ).find('span').attr({
                            bchap_id: _bchapId
                        });
                        getRecommandVideoData('curriculum', str);

                    } else {  // 강의 영상일 때
                        $_item.insertAfter( $myItem ).find('span').attr({
                            bchap_id: _bchapId,
                            schap_id: _schapId,
                            video_id: _videoId
                        });
                    }
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
                var str = $myItem.find('input[type="text"]').val();

                $myItem.addClass('modify');
				$myItem.hide(); // 기존 항목 감춤

				if( !!$(this).closest('.w1w2').length ){ // 소단원이면
					$_input.find('input[type="text"]').attr({
						placeholder: "소단원 제목을 입력하세요.",
						title: "소단원 제목"
					});

				} else if (!!$(this).closest('.w1w3').length){  // 강의
                    $_input.find('input[type="text"]').attr({
                        placeholder: "강의 영상 제목을 입력하세요.",
                        title: "강의 영상 제목"
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
				if(confirm('삭제하시겠습니까?')){
                    var $myItem = $(this).closest(item);
                    var _bchapId = $myItem.find('.t1').attr('bchap_id');
                    var _schapId = $myItem.find('.t1').attr('schap_id');

                    if (!!$(this).closest('.w1w1').length){  // 대단원일 경우
                        // 해당 대단원의 하위 소단원 아이템 삭제
                        $('#div_schap').find('.item').each(function() {
                            if ($(this).find('.t1').attr('bchap_id') == _bchapId) {
                                $(this).remove();
                            }
                        });

                        // 해당 대단원의 하위 강의 아이템 삭제
                        $('#div_video').find('.item').each(function() {
                            if ($(this).find('.t1').attr('bchap_id') == _bchapId) {
                                $(this).remove();
                            }
                        });

                    } else if (!!$(this).closest('.w1w2').length) {  // 소단원일 경우
                        // 해당 소단원의 하위 강의 아이템 삭제
                        $('#div_video').find('.item').each(function() {
                            if ($(this).find('.t1').attr('bchap_id') == _bchapId && $(this).find('.t1').attr('schap_id') == _schapId) {
                                $(this).remove();
                            }
                        });
                    }

                    // 해당 아이템 삭제
                    $myItem.remove();
				}
			});

            // 미래 미리보기 토글
            $(my).on('click', '.preview', function() {
                if ($(this).is('[href]')) {
                    $(this).removeAttr('href');
                    $(this).find('span').text('미리보기 영상 없음');
                    $(this).parents(item).children('.tg1').find('.t1').attr('preview_yn', 'N');
                } else {
                    $(this).attr('href', 'javascript:void(0);');
                    $(this).find('span').text('미리보기 영상');
                    $(this).parents(item).children('.tg1').find('.t1').attr('preview_yn', 'Y');
                }
                getMainVideoList();
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
@if ($isFree == 'Y')

<!-- cp1tag2 -->
<div class="cp1tag2">
	<div class="cont w1">
		<div class="w1w1">
			<div class="eg1">
				<input type="text" value="" placeholder="키워드를 추가해서 최적의 영상을 찾아보세요!" title="추가 키워드" class="text1 type1"  id="input_subject"/>
				<button type="button" class="b1 add button gray4">추가</button>
			</div>
			<div class="tg1">
			</div>
		</div>
		<div class="w1w2">
			<button type="button" class="b2 button search primary" onclick="getRecommandVideoData('keyword', '');"><span class="b1t1">검색</span></button>
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

                // 엔터키 입력 이벤트로 주제 추가
                $('#input_subject').keydown(function(key) {
                    if (key.keyCode == 13) {
                        var $last = $(this).closest(my).find(a1on).last();
                        $('<a href="javascript:void(0);" class="a1 on" />').appendTo( $(this).closest(my).find(tg1) ).text($(this).val());
                        $('#input_subject').val('');
                    }
                    $('#input_subject').focus();
                });
		})();
	});
/*]]>*/</script>

<!-- 유료일 경우 보이지 않음 -->
@if ($isFree == 'Y')

<!-- cp1tag1 -->
<div class="cp1tag1 mgt4em mgb4em">
	<div class="tags" id="div_tag_list">
	@if (isset($videoTagArr))
        @foreach ($videoTagArr as $tag)
            @if ($tag != '')
            <a href="javascript:void(0);" class="a1" tag_idx="{{ $tag->idx }}">#{{ $tag->tag }}</a>
            @endif
        @endforeach
    @endif
    </div>
	@if (isset($videoTagArr) && count($videoTagArr) >= 20)
	<a href="javascript:void(0);" class="more" id="more_tag_btn">더보기</a>
    @endif
</div>
<!-- /cp1tag1 -->
@endif
<!-- /유료일 경우 보이지 않음 -->

<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 태그선택. 20210330. @m
		 */
        (function(){
			var my = '.cp1tag1',
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
                        tagName = tagName.substr(1);

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

		// 태그 더보기
        $('#more_tag_btn').on('click', function(){
            var lastTagIdx = $('#div_tag_list .a1').last().attr('tag_idx');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'json',
                url: "{{ route('sub.video.get_more_tags') }}",
                data: {
                    'last_tag_idx': lastTagIdx,
                    'bcate_id': '{{ $lectureInfo->bcate_id }}',
                    'scate_id': '{{ $lectureInfo->scate_id }}',
                },
                // contentType: false,
                // processData: false,
                success: (data) => {
                    if (data.status == 'success') {
                        // alert('done!');

                        // 쿼리 확인용
                        console.log(data.query);

                        if (data.resData.length != 0) {
                            // console.log(data.resData);

                            $('#div_tag_list').append(data.resData);

                            // 조회된 태그 수가 20개 미만일 경우 더보기 버튼 숨김
                            if (data.isShowMore) {
                                $('#more_tag_btn').show();
                            } else {
                                $('#more_tag_btn').hide();
                            }

                        }

                        // 조회된 태그가 없을 경우 더보기 버튼 숨김
                        if (data.count == 0) {
                            $('#more_tag_btn').hide();
                        }

                    } else {
                        alert('태그 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                        console.log('code: ' + data.code + '\nmessage: ' + data.msg);
                    }
                },
                error: function(request, status, error) {
                    console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
                },
                complete: function(data) {
                    //
                }
            });
        });

	});
/*]]>*/</script>

<!-- 유료일 경우 보이지 않음 -->
@if ($isFree == 'Y')

<!-- cp1fcard3 -->
<div id="cp1fcard3a1" class="cp1fcard3 mgt0 mgb2em pdt1em pdb1em">
<div class="wrap1">

	<div class="dpf jcsb aic">
		<h3 class="fw6 fsB10">두런에서 검색결과</h3>
		<button type="button" class="button" id="add_video_btn">강의로 추가하기</button>
	</div>

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234" id="div_video_list">
		@if (isset($videoList))
            @foreach ($videoList as $video)
            <div class="item column">
                <div class="w1">
                    {{-- <a href="#layer1video1preview1" class="a1 toggle" data-send-focus="that" video_idx="{{ $video->idx }}"> --}}
                    <a href="{{ route('sub.video.video_detail', ['uid' => $video->uid]) }}" class="a1" video_idx="{{ $video->idx }}" target="_blank">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="https://img.youtube.com/vi/{{ $video->uid }}/mqdefault.jpg" alt="{{ $video->subject }}">
                            </span>
                            <i class="ic1 check">선택</i>
                        </div>
                        <div class="tg1">
                            <strong class="t1">{{ $video->subject }}</strong>
                            <input type="hidden" class="video_id" value="{{ $video->uid }}">
                        </div>
                        <div class="tg2">
                            <span class="t2">{{ $video->channel }} · 조회수 {{ $video->hit_cnt }}회</span>
                            <span class="t4">정확도 80%</span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        @endif
	</div>
	<!-- /lst1 -->

	@if (count($videoList) >= 8)
	<!-- cp1more1 -->
	<div class="cp1more1" id="show_more_dolearn_video">
		<a href="javascript:void(0);" class="more" id="more_video_btn">
			<span class="t1">더보기</span>
			<i class="ic1"></i>
		</a>
	</div>
	<!-- /cp1more1 -->
    @endif

</div>
</div>
<!-- /cp1fcard3 -->
@endif
<!-- /유료일 경우 보이지 않음 -->


<script>/*<![CDATA[*/
	$(function(){

		// 영상 더보기
        $('#more_video_btn').on('click', function(){
            var lastVideoIdx = $('#div_video_list .a1').last().attr('video_idx');
            var onTags = $('.tags').find('.on');
            var tagNameList = [];

            // 선택된 태그 이름 배열로 저장
            $.each(onTags, function(index, value) {
                var tagName = $(value).text();

                if (tagName != '') {
                    tagName = tagName.substr(1);

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

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'json',
                url: "{{ route('sub.lecture.get_recommand_video_data') }}",
                data: {
                    'last_video_idx': lastVideoIdx,
                    'tag_name_list': tagNameList,
                    'bcate_id': '{{ $lectureInfo->bcate_id }}',
                    'scate_id': '{{ $lectureInfo->scate_id }}',
                },
                // contentType: false,
                // processData: false,
                success: (data) => {
                    if (data.status == 'success') {
                        // alert('done!');

                        // 쿼리 확인
                        console.log(data.query);

                        if (data.resData.length != 0) {
                            // console.log(data.resData);

                            $('#div_video_list').append(data.resData);

                            // 조회된 영상 수가 8개 미만일 경우 더보기 버튼 숨김
                            if (data.isShowMore) {
                                $('#show_more_dolearn_video').show();
                            } else {
                                $('#show_more_dolearn_video').hide();
                            }
                        }

                        // 조회된 영상이 없을 경우 더보기 버튼 숨김
                        if (data.count == 0) {
                            $('#show_more_dolearn_video').hide();
                        }

                    } else {
                        alert('영상 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                        console.log('code: ' + data.code + '\nmessage: ' + data.msg);
                    }
                },
                error: function(request, status, error) {
                    console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
                },
                complete: function(data) {
                    //
                }
            });
        });


		/** ◇◆ 다중선택. 20210525. @m.
		 */
		(function(){
			// 미래 요소 클릭
			$('#cp1fcard3a1').on('click', '.item', function(e){
				e.preventDefault();
				$(this).toggleClass('on');
			});
		})();


	});
/*]]>*/</script>


<!-- 유료일 경우 보이지 않음 -->
@if ($isFree == 'Y')

<a href="#cp1fcard3a2" class="cp1switch1 switch toggle fw4">
	<span class="t1">유튜브에서 검색</span>
	<span class="t1 sw-off">OFF</span>
	<span class="t1 sw-on">ON</span>
	<i class="ic1"></i>
</a>

<!-- cp1fcard3 -->
<div id="cp1fcard3a2" class="cp1fcard3 mgt0 mgb2em pdt1em pdb1em">
<div class="wrap1">

    {{-- TODO: 유튜브에서 검색결과 --}}
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
$(function() {
    // 페이지 로딩 시 소단원 목록 숨김
    $('#div_schap').find('.item').each(function() {
        $(this).hide();
    });

    // 페이지 로딩 시 강의 영상 목록 숨김
    $('#div_video').find('.item').each(function() {
        $(this).hide();
    });

    // 페이지 로딩 시 대표 동영상 목록 생성 및 추가
    getMainVideoList();
});

// 대표 동영상 목록 가져와서 select box에 추가
function getMainVideoList() {
    var html = '';

    $('#div_video').find('.eg1').each(function() {
        var $_title = $(this).siblings('.tg1').find('.t1');

        if ($(this).children().is('[href]')) {
            if ($_title.attr('video_id') == '{{ $lectureInfo->main_video_id }}') {
                html += '<option value="' + $_title.attr('video_id') + '" selected>' + $_title.text() + '</option>';
            } else {
                html += '<option value="' + $_title.attr('video_id') + '">' + $_title.text() + '</option>';
            }
        }
    });

    $('#main_video').empty();
    $('#main_video').append('<option value="">대표 동영상을 선택하세요.</option>');
    $('#main_video').append(html);
}

// 추천 강의 영상 조회
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
            'bcate_id': '@if (isset($lectureInfo)) {{ $lectureInfo->bcate_id }} @endif',
            'scate_id': '@if (isset($lectureInfo)) {{ $lectureInfo->scate_id }} @endif',
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');

                // 쿼리 확인
                console.log(data.query);

                if (data.resData.length != 0) {
                    // console.log(data.resData);

                    $('#div_video_list').empty();
                    $('#div_video_list').append(data.resData);

                    // 조회된 영상 수가 8개 미만일 경우 더보기 버튼 숨김
                    if (data.isShowMore) {
                        $('#show_more_dolearn_video').show();
                    } else {
                        $('#show_more_dolearn_video').hide();
                    }
                }

                // 조회된 영상이 없을 경우 더보기 버튼 숨김
                if (data.count == 0) {
                    html = '<span style="margin-left:15px">강의 영상 목록이 없습니다.</span>';
                    $('#div_video_list').empty();
                    $('#div_video_list').append(html);
                    $('#show_more_dolearn_video').hide();
                }

            } else {
                alert('강의 영상 목록 조회에 실패했습니다.\n관리자에게 문의 바랍니다.');
                console.log('code: ' + data.code + '\nmessage: ' + data.msg);
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

// URL을 등록해서 강의 영상에 추가
function addUrlToVideoList() {

    // 소단원을 선택했을 경우에만 강의 영상 추가 가능
    if (!$('#div_schap div.on').find('.t1').length) {
        alert('소단원을 선택해주세요.');
        $('#input_url').val('');
        $('[href="#layer1add1url1"]').first().triggerHandler('click');

        return false;
    }

    var url = $('#input_url').val();
    var _video = '';  // 강의 태그
        _video += '<div class="item" style="cursor:pointer;">';
        _video +=   '<div class="control move" title="끌어서 놓기로 순서 이동"></div>';
        _video +=   '<div class="tg1">';
        _video +=       '<span class="t1 form-static1">' + url + '</span>';
        _video +=   '</div>';
        _video +=   '<div class="eg1">';
        _video +=       '<a class="b1 preview"><span class="b1t1">미리보기 영상 없음</span></a>';
        _video +=       '<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>';
        _video +=       '<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>';
        _video +=   '</div>';
        _video += '</div>';
    var $_video = $(_video);
    var _bchapId = $('#div_schap div.on').find('.t1').attr('bchap_id');
    var _schapId = $('#div_schap div.on').find('.t1').attr('schap_id');
    var analysisYn = 'Y';

    if (url == '') {
        alert('URL을 입력해주세요.');
        return false;
    } else if (url.includes('www.youtube.com/watch?v=')) {
        $videoId = url.split('www.youtube.com/watch?v=')[1];
    } else if (url.includes('youtu.be/')) {
        $videoId = url.split('youtu.be/')[1];
    } else {
        alert('URL 형식이 맞지 않습니다. 다시 입력해주세요.');
    }

    // URL에서 유튜브 영상 id 추출 후 DB에 있는지 확인.  TODO: 없으면 유튜브 API 사용해야 함
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.lecture.get_video_data') }}",
        data: {
            'video_id': $videoId,
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                if (!data.exist) {
                    analysisYn = 'N';
                    alert('입력하신 URL은 분석이 필요한 영상으로\n내용검색 및 자막의 기능 사용이 제한됩니다.\n분석은 2~3일 소요되며 완료시 알림으로 알려드립니다.');
                }

                $('#input_url').val('');
                $('[href="#layer1add1url1"]').first().triggerHandler('click');

                $('#dropZone').hide();
                $_video.find('span').first().attr({
                    bchap_id: _bchapId,
                    schap_id: _schapId,
                    video_id: $videoId,
                    analysis_yn: analysisYn
                });

                $_video.find('.t1').text(data.videoTitle);
                $_video.appendTo('#div_video');

                getMainVideoList();

            } else {
                alert('code: ' + data.code + '\nmessage: ' + data.msg);
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

// 커리큘럼 저장
function saveCurriculum() {
    var lectureIdx = '{{ $lectureIdx }}';
    var mainVideoId = $('#main_video').val();
    var bcateId = '{{ $lectureInfo->bcate_id }}';
    var scateId = '{{ $lectureInfo->scate_id }}';
    var bchapList = new Array();
    var schapList = new Array();
    var videoList = new Array();

    // 대단원 목록을 json 형태로 변환
    $('#div_bchap').find('.t1').each(function() {
        var data = new Object();

        data.bchapId = $(this).attr('bchap_id');
        data.bchapName = $(this).text();

        if (data.bchapId != '') {
            bchapList.push(data);
        }
    });

    // 소단원 목록을 json 형태로 변환
    $('#div_schap').find('.t1').each(function() {
        var data = new Object();

        data.bchapId = $(this).attr('bchap_id');
        data.schapId = $(this).attr('schap_id');
        data.schapName = $(this).text();

        if (data.schapId != '') {
            schapList.push(data);
        }
    });

    // 강의 영상 목록을 json 형태로 변환
    $('#div_video').find('.t1').each(function() {
        var data = new Object();

        data.bchapId = $(this).attr('bchap_id');
        data.schapId = $(this).attr('schap_id');
        data.videoId = $(this).attr('video_id');
        data.analysisYn = $(this).attr('analysis_yn');
        data.previewYn = $(this).attr('preview_yn');
        data.videoTitle = $(this).text();

        if(!isEmpty(data.previewYn)) {
            data.previewYn = $(this).attr('preview_yn');
        } else {
            data.previewYn = 'N';
        }

        if (!isEmpty(data.videoId)) {
            videoList.push(data);
        }
    });

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('manage.lecture.save_curriculum') }}",
        data: {
            'lecture_idx': lectureIdx,
            'main_video_id': mainVideoId,
            'bcate_id': bcateId,
            'scate_id': scateId,
            'bchap_list': JSON.stringify(bchapList),
            'schap_list': JSON.stringify(schapList),
            'video_list': JSON.stringify(videoList)
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                alert('커리큘럼 정보가 수정되었습니다.');
                location.href='/manage/lecture/curriculum?idx={{ $lectureIdx }}';
            } else {
                alert('code: ' + data.code + '\nmessage: ' + data.msg);
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

// 추천 영상 목록에서 영상 선택 후 추가
$('#add_video_btn').click(function() {
    var selectedItemList = $('#cp1fcard3a1').find('.on');  // 선택된 영상 목록
    var _video = '';  // 강의 영상 목록 태그
    var _bchapId = $('#div_schap div.on').find('.t1').attr('bchap_id');
    var _schapId = $('#div_schap div.on').find('.t1').attr('schap_id');
    var analysisYn = 'Y';

    // 소단원을 선택했을 경우에만 강의 영상 추가 가능
    if (!$('#div_schap div.on').find('.t1').length) {
        alert('소단원을 선택해주세요.');
        return false;
    }

    $('#dropZone').hide();

    selectedItemList.each(function(index, element) {
        var _video = '';
        _video += '<div class="item" style="cursor: pointer">';
        _video +=   '<div class="control move" title="끌어서 놓기로 순서 이동"></div>';
        _video +=   '<div class="tg1">';
        _video +=       '<span class="t1 form-static1"></span>';
        _video +=   '</div>';
        _video +=   '<div class="eg1">';
        _video +=       '<a class="b1 preview"><span class="b1t1">미리보기 영상 없음</span></a>';
        _video +=       '<button type="button" class="b1 edit"><span class="b1t1">수정</span></button>';
        _video +=       '<button type="button" class="b1 del"><span class="b1t1">삭제</span></button>';
        _video +=   '</div>';
        _video += '</div>';

        var $_video = $(_video);

        $_video.find('span').attr({
            bchap_id: _bchapId,
            schap_id: _schapId,
            video_id: $(element).find('.video_id').val(),
            analysis_yn: analysisYn
        });

        $_video.find('.t1').text($(element).find('.t1').text());
        $_video.appendTo('#div_video');
    });
    // 선택된 강의 영상 비활성화
    $('#cp1fcard3a1').find('.on').removeClass('on');
});
</script>
@endsection
