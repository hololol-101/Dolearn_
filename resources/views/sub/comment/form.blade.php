    <div class="w1 item reply">
        <textarea rows="3" cols="80" title="댓글작성" class="w100 type1"></textarea>
        <div class="tar">
            <button type="submit" class="button submit semismall" onclick="enrollEvent(this)" value="N">등록하기</button>
        </div>
    </div>
    <!-- /댓글작성 -->

@include('sub.lecture.inc_layer_report_post')

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
        url : "{{ route('sub.comment.create_all') }}",
        data: {
            'postId': {{ $boardView->idx }},
            'parentId': idx,
            'postType':"notice",
            'content': content,
            'isReply': value,
        },
        success : (result) => {
            $('#commentSrc').empty().append(result.html);
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

$(document).ready(function() {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: 'json',
        url : "{{ route('sub.comment.index_all') }}",
        data: {
            'postId': {{ $boardView->idx }},
            'postType':"notice"
        },
        success : (result) => {
            $('#commentSrc').empty().append(result.html);
        }
    });


});

</script>
