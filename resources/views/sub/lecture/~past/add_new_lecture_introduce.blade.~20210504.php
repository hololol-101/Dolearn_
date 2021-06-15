@php
$step = isset($_GET['step']) ? $_GET['step'] : '';
$isFree = isset($_GET['is_free']) ? $_GET['is_free'] : '';
@endphp

@extends('sub.lecture.add_new_lecture')

@section('sub_content')

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
		<div class="w1item" id="addinfo1">
            @if (isset($tempInfo))
                @if ($tempInfo->add_info_1 == '')
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
                @else
                    @php
                    $addInfo1List = explode('|', $tempInfo->add_info_1);
                    @endphp
                    @foreach ($addInfo1List as $addInfo1)
                    <div class="item">
                        <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                        <input type="text" value="{{ $addInfo1 }}" placeholder="최소 2개 이상" title="강좌 내용" class="w100 type1 text" />
                        <button type="button" class="b1 button del gray4 small">삭제</button>
                    </div>
                    @endforeach
                @endif
            @else
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
            @endif
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
		<div class="w1item" id="addinfo2">
            @if (isset($tempInfo))
                @if ($tempInfo->add_info_2 == '')
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
                @else
                    @php
                    $addInfo2List = explode('|', $tempInfo->add_info_2);
                    @endphp
                    @foreach ($addInfo2List as $addInfo2)
                    <div class="item">
                        <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                        <input type="text" value="{{ $addInfo2 }}" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
                        <button type="button" class="b1 button del gray4 small">삭제</button>
                    </div>
                    @endforeach
                @endif
            @else
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
            @endif
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
		<div class="w1item" id="addinfo3">
            @if (isset($tempInfo))
                @if ($tempInfo->add_info_3 == '')
                <div class="item">
                    <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                    <input type="text" value="" placeholder="내용을 입력하세요" title="강좌 대상" class="w100 type1 text" />
                    <button type="button" class="b1 button del gray4 small">삭제</button>
                </div>
                {{-- <div class="item">
                    <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                    <input type="text" value="" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
                    <button type="button" class="b1 button del gray4 small">삭제</button>
                </div> --}}
                @else
                    @php
                    $addInfo3List = explode('|', $tempInfo->add_info_3);
                    @endphp
                    @foreach ($addInfo3List as $addInfo3)
                    <div class="item">
                        <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                        <input type="text" value="{{ $addInfo3 }}" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
                        <button type="button" class="b1 button del gray4 small">삭제</button>
                    </div>
                    @endforeach
                @endif
            @else
            <div class="item">
                <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                <input type="text" value="" placeholder="내용을 입력하세요" title="강좌 대상" class="w100 type1 text" />
                <button type="button" class="b1 button del gray4 small">삭제</button>
            </div>
            {{-- <div class="item">
                <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                <input type="text" value="" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
                <button type="button" class="b1 button del gray4 small">삭제</button>
            </div> --}}
            @endif
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
		<textarea class="editor" id="editor">
			{{-- <div class="mgt5em mgb5em em tac">개발자 온라인 웹문서 편집기 처리 필요!</div> --}}
            @if (isset($tempInfo)) {{ $tempInfo->introduction }} @endif
		</textarea>
	</div>
	<!-- /cp1write1 -->
    {{-- <script src="{{ asset('assets/js/ckeditor_load.js') }}"></script> --}}
    <script>
    $(function() {
        // CKEditor load
        CKEDITOR.replace('editor', {
            height: 500,
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    });
    </script>
</div>

@endsection

@section('sub_script')
<script>
$(function() {

});

// 입력 정보 저장 후 다음 단계로 이동
function saveAndGoNextStep(nextStep) {
    var addInfo1InputList = $('#addinfo1 input[type=text]');
    var addInfo2InputList = $('#addinfo2 input[type=text]');
    var addInfo3InputList = $('#addinfo3 input[type=text]');
    var addInfo1 = '';
    var addInfo2 = '';
    var addInfo3 = '';
    var introduction = '';

    $.each(addInfo1InputList, function(index, value) {
        if ($(value).val() != '') {
            addInfo1 += $(value).val() + '|';
        }
    });

    $.each(addInfo2InputList, function(index, value) {
        if ($(value).val() != '') {
            addInfo2 += $(value).val() + '|';
        }
    });

    $.each(addInfo3InputList, function(index, value) {
        if ($(value).val() != '') {
            addInfo3 += $(value).val() + '|';
        }
    });

    addInfo1 = addInfo1.slice(0, -1);
    addInfo2 = addInfo2.slice(0, -1);
    addInfo3 = addInfo3.slice(0, -1);

    @if ($step == 'introduce')
    introduction = CKEDITOR.instances.editor.getData();
    @endif

    // 입력 데이터 유효성 검사
    @if ($step == 'introduce')
    if (addInfo1 == '' || addInfo2 == '') {
        alert('필수 항목을 입력해주세요.');
        return false;
    }
    @endif

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.lecture.tempsave_add_lecture') }}",
        data: {
            'step': '{{ $step }}',
            'add_info_1': addInfo1,
            'add_info_2': addInfo2,
            'add_info_3': addInfo3,
            'introduction': introduction
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                location.href='/sub/lecture/add_new_lecture?step=' + nextStep + '&is_free={{ $isFree }}';
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
