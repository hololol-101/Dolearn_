<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">영상 노트</h2>
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- w1bottom1 -->
<div class="w1bottom1">


<!-- cp2lecture1note1 -->
@if (count($videoNoteList) > 0)
    @foreach ($videoNoteList as $videoNote)
    <div class="cp2lecture1note1" note_idx={{ $videoNote->idx }}>
        <div class="tg1">
            {{-- TODO: 노트 작성한 영상 시간 --}}
            <span class="t1"><i class="t1ic1"></i> <span class="t1t1">02 : 22</span></span>
        </div>
        <div class="tg2">
            <div class="t2">
                {{ $videoNote->content }}
            </div>
            <div class="eg1">
                <a href="javascript:void(0);" class="a2 edit"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
                <a href="javascript:void(0);" class="a2 del" onclick="deleteNote('{{ $videoNote->idx }}')"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
            </div>
        </div>
    </div>
    @endforeach
@else
<span>작성된 노트가 없습니다.</span>
@endif
<!-- /cp2lecture1note1 -->


<!-- cp2write1 -->
<div class="cp2write1">
	<div class="editor">
		{{-- <div class="mgt3em mgb3em tac">개발자 온라인 웹문서 편집기 처리 필요!</div> --}}
        <textarea class="textarea" id="video_note_content"></textarea>
	</div>
	<div class="btns">
		<button type="submit" class="button submit" onclick="saveNote()">등록하기</button>
	</div>
</div>
<!-- /cp2write1 -->


</div>
<!-- /w1bottom1 -->


</div>
<!-- /aside_content -->

<script>
$(function() {

    // 영상 노트 수정, 취소
    (function(){
        var my = '.cp2lecture1note1',
            edit = '.edit',
            submit = '.submit',
            cancel = '.cancel';

        // 미래 영상 노트 수정
        $(my).on('click', edit, function() {
            var $myItem = $(this).closest(my);
            var $myItemNote = $myItem.find('.tg2');
            var videoNoteIdx = $myItem.attr('note_idx');
            var currentText = $myItem.find('.t2').text();
            var _input = '';

            _input += '<div class="tg2">';
            _input +=   '<textarea rows="5" cols="80" class="modify_note_content" title="영상 노트 수정">' + currentText.trim() + '</textarea>';
            _input +=   '<div class="eg1">';
            _input +=       '<a href="javascript:void(0);" class="a2 cancel"><i class="a2ic1"></i> <span class="a2t1">취소</span></a>';
            _input +=       '<a href="javascript:void(0);" class="a2 submit"><i class="a2ic1"></i> <span class="a2t1">저장</span></a>';
            _input +=   '</div>';
            _input += '</div>';

            $myItemNote.hide(); // 기존 항목 감춤

            $(_input).insertAfter($myItemNote);
        });

        // 미래 저장(수정 후)
        $(my).on('click', submit, function() {
            var videoId = '{{ $_GET['uid'] }}';
            var $myItem = $(this).closest(my);
            var videoNoteIdx = $myItem.attr('note_idx');
            var videoNoteContent = $(my).find('.modify_note_content').val();

            if (videoNoteContent == '') {
                alert('내용을 입력해주세요.');
                return false;
            }

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
                        $('#aside').load('/learning2/note?uid=' + videoId);

                    } else {
                        alert(response.msg);
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });

        // 미래 취소
        $(my).on('click', cancel, function(){
            var $myWrap = $(this).closest('.tg2'); // 폼항목
            $myWrap.prev('.tg2:hidden').show(); // 기존 요소 보임
            $myWrap.remove(); // 폼항목 제거
        });
    })();
});

// 영상 노트 저장
function saveNote() {
    var lectureIdx = 0;
    var videoId = '{{ $_GET['uid'] }}';
    var videoNoteContent = $('#video_note_content').val();

    if (videoNoteContent == '') {
        alert('내용을 입력해주세요.');
        return false;
    }

    // var currentTime = $('#player .ytp-time-current').val();
    // console.log(currentTime);
    // return false;

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.note.save_note') }}",
        // contentType: false,
        // processData: false,
        data: {
            'lecture_idx': lectureIdx,
            'video_id': videoId,
            'video_note_content': videoNoteContent
        },
        success: (response) => {
            if (response.status == 'success') {
                $('#aside').load('/learning2/note?uid=' + videoId);

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
        var videoId = '{{ $_GET['uid'] }}';

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
                    $('#aside').load('/learning2/note?uid=' + videoId);

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
