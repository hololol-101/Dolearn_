<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">영상 노트</h2>
	<a href="{{ route('sub.video.video_note_list') }}" class="a1">내 노트 모두보기</a>
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- w1bottom1 -->
<div class="w1bottom1">

@if (count($videoNoteList) > 0)
    <!-- cp2lecture1note1 -->
    @foreach ($videoNoteList as $key => $videoNote)
    <div class="cp2lecture1note1" note_idx={{ $videoNote->idx }}>
        <div class="tg1">
            {{-- TODO: 영상 시간은 플레이어 이벤트 발생시에만 가져올 수 있음. API 검토 필요 --}}
            <span class="t1"><i class="t1ic1"></i> <span class="t1t1">02 : 22</span></span>
        </div>
        <div class="tg2">
            <div class="t2">
                {{ $videoNote->content }}
            </div>
            <div class="eg1">
                <a href="javascript:void(0);" class="a2 edit"><i class="a2ic1"></i><span class="a2t1">수정</span></a>
                <a href="javascript:void(0);" class="a2 del" onclick="deleteNote('{{ $videoNote->idx }}')"><i class="a2ic1"></i><span class="a2t1">삭제</span></a>
            </div>
        </div>
    </div>
    @endforeach
    <!-- /cp2lecture1note1 -->
@else
<span>작성된 노트가 없습니다.</span>
@endif

<!-- cp2write1 -->
<div class="cp2write1">
	<div class="editor">
        <textarea style="border: 0;" id="video_note_content"></textarea>
		{{-- <div class="mgt3em mgb3em tac">개발자 온라인 웹문서 편집기 처리 필요!</div> --}}

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
            cancel = '.cancel';
        var _input = '';

        // 미래 영상 노트 수정
        $(my).on('click', edit, function(){
            var $_input = '';
            var $myItem = $(this).closest(my);
            var videoNoteIdx = $myItem.attr('note_idx');
            var currentText = $myItem.find('.t2').text();

            _input += '<div class="cp2lecture1note1">';
            _input +=   '<div class="tg1">';
            _input +=       '<span class="t1"><i class="t1ic1"></i> <span class="t1t1">02 : 22</span></span>';
            _input +=   '</div>';
            _input +=   '<div class="tg2">';
            _input +=     '<div class="t2">';
            _input +=         '<textarea rows="5" cols="80" title="영상 노트 수정">' + currentText.trim() + '</textarea>';
            _input +=     '</div>';
            _input +=     '<div class="eg1">';
            _input +=         '<a href="javascript:void(0);" class="a2 cancel"><i class="a2ic1"></i> <span class="a2t1">취소</span></a>';
            _input +=         '<a href="javascript:void(0);" class="a2 submit" onclick="modifyNote(\'' + videoNoteIdx + '\')"><i class="a2ic1"></i> <span class="a2t1">저장</span></a>';
            _input +=     '</div>';
            _input +=   '</div>';
            _input += '</div>';

            $_input = $(_input);

            $myItem.addClass('modify');
            $myItem.hide(); // 기존 항목 감춤

            $_input.insertAfter($myItem);
        });

        // 미래 취소 클릭
        $(my).on('click', cancel, function(){
            alert('here~~~');
            return false;

            var $myItem = $(this).closest(my); // 폼항목
            $myItem.prev(my+':hidden').show(); // 기존 요소 보임
            $myItem.remove(); // 폼항목 제거
        });
    })();
});

// 영상 노트 저장
function saveNote() {
    var lectureIdx = '{{ $_GET['idx'] }}';
    var videoId = '{{ $_GET['uid'] }}';
    var videoNoteContent = $('#video_note_content').val();

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
                $('#aside').load('/learning/note?idx=' + lectureIdx + '&uid=' + videoId);

            } else {
                alert(response.msg);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

// 영상 노트 수정
function modifyNote(videoNoteIdx) {
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
        var lectureIdx = '{{ $_GET['idx'] }}';
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
                    $('#aside').load('/learning/note?idx=' + lectureIdx + '&uid=' + videoId);

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
