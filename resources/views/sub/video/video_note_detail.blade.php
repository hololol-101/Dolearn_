<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210208 | @m | 요구반영. 결함개선. 고도화.
 * ~20210208 | @m |
 */
-->
@extends('master_sub')

@section('title', '영상보관함 - 영상노트 상세')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1row1 -->
<div class="cp1row1">
	<div class="column1">
		<a href="javascript:history.back();" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
	</div>
	<div class="column2">
	</div>
</div>
<!-- /cp1row1 -->


<!-- cp1note1 -->
<div class="cp1note1">
	<div class="hg1">
		<h3 class="h1">{{ $videoNoteList[0]->subject }}</h3>
	</div>
	<ul class="lst1">
		@foreach ($videoNoteList as $videoNote)
        <li class="li1" note_idx="{{ $videoNote->note_idx }}" video_time="{{ $videoNote->video_time }}">
            @if ($videoNote->title != '')
			<a href="{{ route('learning.main', ['idx' => $videoNote->lecture_idx, 'video_id' => $videoNote->video_id]) }}" class="tt1">
				<span class="tt1t1">{{ $videoNote->title }}</span>
			</a>
            @endif
			<div class="tg1">
                {{-- TODO: 노트 작성한 영상 시간 --}}
				<a href="javascript:void(0);" class="a1"><i class="a1ic1"></i> <span class="a1t1" class="video_time">02 : 22</span></a>
				<a href="{{ route('sub.note.download_note', ['video_note_idx' => $videoNote->note_idx, 'video_id' => $_GET['video_id']]) }}" class="b1 button ic1t1 small"><i class="ic1 download2"></i> <span class="t1">다운로드</span></a>
			</div>
			<div class="tg2">
				<div class="t2">
					{{ $videoNote->content }}
				</div>
				<div class="eg1">
					<a href="javascript:void(0);" class="a2 edit"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
                    {{-- <a href="#layer1note1edit1" class="a2 edit toggle popup_modify_note" data-toggle="modal" data-idx="{{ $videoNote->note_idx }}" data-time="{{ $videoNote->video_time }}" data-content="{{ $videoNote->content }}"><i class="a2ic1"></i> <span class="a2t1">수정</span></a> --}}
					<a href="javascript:void(0);" class="a2 del" onclick="deleteNote('{{ $videoNote->note_idx }}')"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
                </div>
			</div>
		</li>
        @endforeach
	</ul>
</div>
<!-- /cp1note1 -->


<script>/*<![CDATA[*/
	$(function() {

			/** ◇◆ 영상 노트 수정, 취소. 20210216. @m.
			 * 저장, 수정, 삭제 기능 ★☆ToEdit) @개발자. 작업필요!
			 */
			// 영상 노트 수정, 취소
			(function(){
				var my = '.cp1note1',
					item = '.li1', // 20210602. 아이템 추가
					edit = '.edit',
                    submit = '.submit';
					cancel = '.cancel';

				// 미래 영상 노트 수정
				$(my).on('click', edit, function(){
					var $myItem = $(this).closest(item); // 20210602. 현재 아이템
					var $myItemNote = $myItem.find('.tg2');
					var videoNoteIdx = $myItem.attr('note_idx');
					var currentText = $myItem.find('.t2').text();
					var _input = ''; // 초기화

					_input += '<div class="tg2">';
					_input +=		'<textarea rows="5" cols="80" title="영상 노트 수정" class="note_content">' + currentText.trim() + '</textarea>';
					_input += '<div class="eg1">';
					_input +=		'<a href="javascript:void(0);" class="a2 cancel"><i class="a2ic1"></i> <span class="a2t1">취소</span></a>';
					_input +=		'<a href="javascript:void(0);" class="a2 submit"><i class="a2ic1"></i> <span class="a2t1">저장</span></a>';
					_input +=	'</div>';
					_input += '</div>';

                    //$myItem.addClass('modify');
                    $myItemNote.hide(); // 기존 항목 감춤

					$(_input).insertAfter($myItemNote);
				});

                // 미래 영상 노트 수정된 내용 저장
                $(my).on('click', submit, function(){
                    var $myItem = $(this).closest(item);
					var videoNoteIdx = $myItem.attr('note_idx');
                    var videoTime = $myItem.attr('video_time');
                    var videoNoteContent = $myItem.find('.note_content').val();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        dataType: 'json',
                        url: "{{ route('sub.note.modify_note') }}",
                        // contentType: false,
                        // processData: false,
                        data: {
                            'video_note_idx': videoNoteIdx,
                            'video_note_content': videoNoteContent
                        },
                        success: (response) => {
                            if (response.status == 'success') {
                                location.reload();

                            } else {
                                alert(response.msg);
                            }
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
				});

				// 미래 취소 클릭
				$(my).on('click', cancel, function(){
					var $myWrap = $(this).closest('.tg2'); // 폼항목
					$myWrap.prev('.tg2:hidden').show(); // 기존 요소 보임
					$myWrap.remove(); // 폼항목 제거
				});

		})();
	});


/*]]>*/</script>


<!-- (레이어팝업.노트수정) -->
{{-- @include('sub.video.inc_layer_note_modify') --}}

<script>/*<![CDATA[*/
    $(function(){
        // 레이어팝업 템플릿 바로 확인
        // $('[href="#layer1note1edit1"]').first().triggerHandler('click');
    });
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection

@section('script')
<script>
$(function() {
    // 영상 노트 수정 레이어 팝업창 띄움
    $('.popup_modify_note').click(function() {
        var noteIdx = $(this).data('idx');
        var videoTime = $(this).data('time');
        var noteContent = $(this).data('content');

        $('#note_idx').val(noteIdx);
        $('#video_time').text(videoTime);
        $('#note_content').text(noteContent);
    });
});

// 영상 노트 수정
function modifyNote() {
    var videoNoteIdx = $('#note_idx').val();
    var videoNoteContent = $('#note_content').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.note.modify_note') }}",
        // contentType: false,
        // processData: false,
        data: {
            'video_note_idx': videoNoteIdx,
            'video_note_content': videoNoteContent
        },
        success: (response) => {
            if (response.status == 'success') {
                location.reload();

            } else {
                alert(response.msg);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

// 영상 노트 삭제
function deleteNote(videoNoteIdx) {
    if (confirm('해당 영상 노트를 삭제하시겠습니까?')) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: "{{ route('sub.note.delete_note') }}",
            // contentType: false,
            // processData: false,
            data: {
                'video_note_idx': videoNoteIdx
            },
            success: (response) => {
                if (response.status == 'success') {
                    location.reload();

                } else {
                    alert(response.msg);
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
}
</script>
@endsection
