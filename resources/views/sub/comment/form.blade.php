    <div class="w1 item reply">
        <textarea rows="3" cols="80" title="댓글작성" class="w100 type1"></textarea>
        <div class="tar">
            <button type="submit" class="button submit semismall" onclick="enrollEvent(this)" value="N">등록하기</button>
        </div>
    </div>
    <!-- /댓글작성 -->
@php
    $page = isset($_GET['page'])?$_GET['page']:1;
@endphp
<script>
function enrollEvent(obj){
    var my = obj;
    var content = $(my).parent().siblings('textarea').val();
    $(my).parent().siblings('textarea').val('')
    var value = $(my).val();
    var idx = $(my).siblings('input[type="hidden"]').val();
    if(typeof(idx) =="undefined") idx = 0;
    @if (Auth::check())
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
        url : "{{ route('sub.comment.create') }}",
        data: {
            'noticeId': {{ $boardView->idx }},
            'parentId': idx,
            'content': content,
            'isReply': value,
            'page':{{ $page }}
        },
        success : (result) => {
            $('#commentSrc').empty().append(result.html);
            $('#commentPage').empty().append(result.pageIndex['htmlCode']);
            console.log(result.pageIndex);

        }
    });
    @else
        alert("로그인 후 이용해주세요.");
    @endif
}
function likeClick(obj){
    @if (Auth::check())
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
                var likenum = $(my).find('.cp1like2t2');
                if(result.msg =="like"){
                    likenum.text(parseInt(likenum.text())+1);
                }else{
                    likenum.text(parseInt(likenum.text())-1);
                }
            }
        });
    @else
        alert("로그인 후 이용해주세요.");
    @endif
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
$(document).ready(function() {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: 'json',
        url : "{{ route('sub.comment.index') }}",
        data: {
            'noticeId': {{ $boardView->idx }},
            'page':{{ $page }}
        },
        success : (result) => {
            $('#commentSrc').empty().append(result.html);
            $('#commentPage').empty().append(result.pageIndex['htmlCode']);
            console.log(result.pageIndex);
        }
    });


});
</script>
