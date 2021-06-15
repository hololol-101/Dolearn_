<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">질문 게시판</h2>
	<!-- <a href="?#★" class="a1">내 질문 모두보기</a> -->
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">

{{-- 비공개 질문 작성 가능 여부에 따른 분기 --}}
@if ($secretQuestionYn == 'Y')
<a href="javascript:void(0);" class="cp2switch1 switch toggle" id="switch_public" onclick="switchPublic()">
    <input type="hidden" id="public_yn" value="N">
	<span class="t1 sw-off">비공개</span>
	<span class="t1 sw-on">공개</span>
	<i class="ic1"></i>
	<span class="t2 sw-off mgl075em fsS3">강사만 답변을 달 수 있어요.</span>
	<span class="t2 sw-on mgl075em fsS3">누구나 답변을 달 수 있어요.</span>
</a>
@else
<a href="javascript:void(0);" class="cp2switch1 switch off" id="switch_public">
    <input type="hidden" id="public_yn" value="Y">
	<span class="t1 sw-off">공개</span>
	<i class="ic1"></i>
	<span class="t2 sw-off mgl075em fsS3">공개 질문만 가능한 강좌입니다.</span>
</a>
@endif

<!-- cp2write2 -->
<div class="cp2write2">
	<input type="text" placeholder="제목을 입력하세요." class="w100" id="qna_title" value=""/>
	<div class="editor">
		{{-- <div class="mgt6em mgb6em tac">개발자 온라인 웹문서 편집기 처리 필요!</div> --}}
        <textarea id="qna_content" placeholder="내용을 입력하세요."></textarea>
	</div>
	<div class="btns">
		<button type="submit" class="button submit mgr05em" onclick="saveQna()">등록</button>
		<a href="javascript:void(0);" class="button secondary close" onclick="backToQnaList()">취소</a>
	</div>
</div>
<!-- /cp2write2 -->


</div>
<!-- /aside_content -->

<script>
$(function() {
    // 20210521. 토글 버튼이 Ajax 로 불러와 기능이 안되서 지연 재호출
    setTimeout(function(){
        MJS.doToggle();
    }, 100);
});

// 공개 여부 선택 -> id=public_yn 에 값 저장
function switchPublic() {
    if ($('#switch_public').hasClass('on')) {
        $('#public_yn').val('N');
    } else {
        $('#public_yn').val('Y');
    }
}

// 질문 등록
function saveQna() {
    var lectureIdx = '{{ $_GET['idx'] }}';
    var videoId = '{{ $_GET['uid'] }}';
    var qnaTitle = $('#qna_title').val();
    var qnaContent = $('#qna_content').val();
    var publicYn = $('#public_yn').val();

    // 데이터 유효성 체크
    if (qnaTitle == '') {
        alert('질문 제목을 입력해주세요');
        $('#qna_title').focus();
        return false;
    }

    if (qnaContent == '') {
        alert('질문 내용을 입력해주세요');
        $('#qna_content').focus();
        return false;
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('learning.save_qna') }}",
        // contentType: false,
        // processData: false,
        data: {
            'lecture_idx': lectureIdx,
            'video_id': videoId,
            'qna_title': qnaTitle,
            'qna_content': qnaContent,
            'public_yn': publicYn
        },
        success: (response) => {
            if (response.status == 'success') {
                $('#aside').load('/learning/qna?idx=' + lectureIdx + '&uid=' + videoId);

            } else {
                alert(response.msg);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

// 새 질문 작성 페이지에서 취소 누르면 질문 목록 페이지로 전환
function backToQnaList() {
    var lectureIdx = '{{ $_GET['idx'] }}';
    var videoId = '{{ $_GET['uid'] }}';

    $('#aside').load('/learning/qna?idx=' + lectureIdx + '&uid=' + videoId);
}
</script>
