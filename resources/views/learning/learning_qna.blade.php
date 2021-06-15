<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">질문 게시판</h2>
	<a href="{{ route('sub.management.my_question_list') }}" class="a1">내 질문 모두보기</a>
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- w1bottom2 -->
<div class="w1bottom2">


<!-- cp2search1 -->
<div class="cp2search1">
	<input type="text" value="" placeholder="검색어를 입력하세요." title="검색어" class="text" id="search_keyword">
	<button type="submit" class="button submit search" onclick="qnaSearch()"><i class="ic1"></i><span class="t1 blind">검색</span></button>
</div>
<!-- /cp2search1 -->


<!-- cp2qna1list1 -->
<div class="cp2qna1list1">
	<ul class="lst1" id="qna_list">
        @if (count($questionList) > 0)
            @foreach ($questionList as $question)
            <li class="li1">
                <a href="javascript:void(0);" class="a1" onclick="showQnaDetail('{{ $question->idx }}')">
                    <div class="tg1">
                        <span class="t1">
                            @if ($question->public_yn == 'N') <i class="t1ic1 private"></i> @endif
                            <span class="t1t1">Q. {{ $question->title }}</span>
                        </span>
                        @if ($question->solution_yn == 'N')
                        <span class="st1 s1">#미해결</span>
                        @else
                        <span class="st1 s2">#해결</span>
                        @endif
                    </div>
                    <div class="tg2">
                        <span class="t2">
                            {{ $question->writer_name }}
                        </span>
                        <div class="eg1">
                            {{-- TODO: 댓글 수 --}}
                            <span class="t3">댓글 3</span>
                            <span class="t3">좋아요 {{ $question->like_cnt }}</span>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        @else
        <br>
        <span>질문 내역이 없습니다.</span>
        @endif
	</ul>
</div>
<!-- /cp2qna1list1 -->


<!-- cp2btns1 -->
<div class="cp2btns1">
	<a href="javascript:void(0);" class="button primary ic1t1 wide" id="write_new_question"><i class="ic1 write"></i> <span class="t1">새 질문 작성</span></a>
</div>
<!-- /cp2btns1 -->


</div>
<!-- /w1bottom2 -->


</div>
<!-- /aside_content -->

<script>
$(function(){

});

// 질문 키워드 검색
function qnaSearch() {
    var lectureIdx = '{{ $_GET['idx'] }}';
    var videoId = '{{ $_GET['uid'] }}';
    var searchKeyword = $('#search_keyword').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('learning.qna_search') }}",
        // contentType: false,
        // processData: false,
        data: {
            'lecture_idx': lectureIdx,
            'video_id': videoId,
            'search_keyword': searchKeyword
        },
        success: (response) => {
            if (response.status == 'success') {
                // 쿼리 확인용
                // console.log(response.query);

                $('#qna_list').empty().append(response.resData);

            } else {
                alert(response.msg);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

// 엔터키 입력 이벤트로 주제 추가
$('#search_keyword').keydown(function(key) {
    if (key.keyCode == 13) {
        qnaSearch();
    }
});

// 질문 상세 페이지 로드
function showQnaDetail(qnaIdx) {
    var videoId = $('#video_id').val();
    $('#aside').load('/learning/qna_detail?idx=' + qnaIdx + '&uid=' + videoId);
}

// 새 질문 작성 페이지 로드
$('#write_new_question').click(function() {
    var videoId = $('#video_id').val();
    $('#aside').load('/learning/qna_write?idx=<?= $_GET['idx'] ?>&uid=' + videoId);
});
</script>
