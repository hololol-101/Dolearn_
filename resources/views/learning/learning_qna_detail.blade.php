<!-- aside_head -->
<div id="aside_head">
	<a href="javascript:void(0);" class="b2 back" onclick="goBackAndLoadPage()"><i class="ic1"></i><span class="t1 blind">돌아가기</span></a>
	<h2 class="h1">질문 상세</h2>
	<!-- <a href="?#★" class="a1">내 질문 모두보기</a> -->
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- w1bottom1 -->
<div class="w1bottom1">


<!-- cp2bbs4view1 -->
<!--
	게시글 class="w1 item"
	댓글 class="w1 item reply"
	대댓글 class="w1 item reply2"
-->
<div class="cp2bbs4view1">
	<!-- 게시글 -->
	<div class="w1 item">
		<div class="w1w1">
			<div class="f1">
				<span class="f1p1">
					<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
					<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
				</span>
			</div>
		</div>
		<div class="w1w2">
			<div class="tt1">
				{{ $myQuestionInfo->title }}
			</div>
            @if ($myQuestionInfo->solution_yn == 'N')
			<span class="st1 s1">#미해결</span>
            @else
			<span class="st1 s2">#해결</span>
            @endif
			<div class="tg1">
				<span class="t1">{{ $myQuestionInfo->writer_name }}</span>
				<span class="t2">{{ format_date(($myQuestionInfo->writed_at)) }}</span>
			</div>
			<div class="tg2">
				{{ $myQuestionInfo->content }}
			</div>
			<div class="eg1">
				<a href="javascript:void(0);" class="cp2like1" onclick="qnaLike()"><span class="cp2like1t1">좋아요</span> <span class="cp2like1t2">{{ $myQuestionInfo->like_cnt }}</span></a>
				<!-- cp2menu1 -->
				<div class="cp2menu1 toggle1s1">
					<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp2menu1c toggle-c">
						<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
					</div>
				</div>
				<!-- /cp2menu1 -->
			</div>
		</div>
	</div>
	<!-- /게시글 -->
	<!-- 댓글작성 -->
	<div class="w1 item reply">
		<textarea rows="3" cols="80" title="댓글작성"></textarea>
		<div class="tar">
			<button type="button" class="button submit semismall" value="N" onclick="enrollEvent(this)">등록하기</button>
		</div>
	</div>
	<!-- /댓글작성 -->
    <div id = "commentSrc"></div>
</div>
<!-- /cp2bbs4view1 -->


<!-- (레이어팝업) -->
@include('sub.lecture.inc_layer_report_post')


</div>
<!-- /aside_content -->


<script>
$(function() {
    // 20210521. 토글 버튼이 Ajax 로 불러와 기능이 안되서 지연 재호출
    setTimeout(function(){
        MJS.doToggle();
    }, 100);
});

function goBackAndLoadPage() {
    $('#aside').load('/learning/qna?idx={{ $myQuestionInfo->lecture_idx }}&uid={{ $myQuestionInfo->video_id }}');
}
function enrollEvent(obj){
    var postId = {{ $myQuestionInfo->idx }};
    var my = obj;
    var content = $(my).parent().siblings('textarea').val();
    $(my).parent().siblings('textarea').val('')
    var value = $(my).val();
    var idx = $(my).siblings('input[type="hidden"]').val();
    var permission = 'N';
    if(typeof(idx) =="undefined") idx = 0;
    if(content==''){
        alert("내용을 입력해주세요.");
        return false;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url : "{{ route('sub.comment.lecture_side_create') }}",
        data: {
            'postId': postId,
            'parentId': idx,
            'permission': permission,
            'postType':"question",
            'content': content,
            'isReply': value,
        },
        success : (result) => {
            console.log(result);
            $('#commentSrc').empty().append(result.html);
        }
    });
}
$(document).ready(function() {
    var postId = '{{ $myQuestionInfo->idx }}'
    var permission = 'N';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: 'json',
        url : "{{ route('sub.comment.lecture_side_index') }}",
        data: {
            'postId': postId,
            'postType':"question",
            'permission':permission
        },
        success : (result) => {
            $('#commentSrc').empty().append(result.html);
        }
    });
});

function likeClick(obj){
        var my = obj;
        var idx = $(my).siblings('input[type="hidden"]').val();
        var program_id='';
        if(typeof(idx) =="undefined"){  //댓글의 경우
            idx = $(my).parent().siblings('.toggle1s1').find('input[type="hidden"]').val();
            program_id = "comment";
        }
        else{ //대댓글의 경우
            program_id ="recomment"
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType: 'json',
            url : "{{ route('sub.comment.like') }}",
            data: {
                'writingId':idx,
                'programId': $(my).data('value'),
            },
            success : (result) => {
                var likenum = $(my).find('.cp2like2t2');
                if(result.msg =="like"){
                    likenum.text(parseInt(likenum.text())+1);
                }else{
                    likenum.text(parseInt(likenum.text())-1);
                }
            }
        });
}


function reportClick(obj){
    @if (Auth::check())
        var my = obj;
        var idx = $(my).closest('.w1w2').find('input[type="hidden"]').val();

        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url : "{{ route('report.report') }}",
        data: {
            'type':'comment',
            'idx': idx,
            'content': ''
        },
        success : (data) => {
            if(data.status=="success"){
                alert("신고접수가 완료되었습니다.")
            }else{
                alert("이미 신고접수를 하셨습니다.")
            }
        }
    });

    @else
        alert("로그인 후 이용해주세요.");
    @endif

}

function qnaLike(){
    var my = $('.cp2bbs4view1 .cp2like1 .cp2like1t2');
    var cnt = my.html();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'get',
        dataType: 'json',
        url : "{{ route('learning.qna_like') }}",
        data: {
            'idx':'{{ $myQuestionInfo->idx }}',
        },
        success : (data) => {
            if(data.status=="like"){
                my.html(parseInt(cnt)+1);
            }else if(data.status=="dislike"){
                my.html(parseInt(cnt)-1);
            }
        }
    });
}
$('#layer1report1post1').find(':button').on('click', function(){
    var my = $('#layer1report1post1');
    var content = $('input[name="★1radio2"]:checked').siblings('label').text()
    if(content ==''){
        alert('신고사유를 선택해주세요!');
        return false;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url : "{{ route('report.report') }}",
        data: {
            'type':'qna',
            'idx':'{{ $myQuestionInfo->idx }}',
            'content': content
        },
        success : (data) => {
            if(data.status=="success"){
                alert("신고접수가 완료되었습니다.")
            }else{
                alert("이미 신고접수를 하셨습니다.")
            }
        }
    });

})
</script>
