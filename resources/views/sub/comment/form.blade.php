    <div class="w1 item reply">
        <textarea rows="3" cols="80" title="댓글작성" class="w100 type1"></textarea>
        <div class="tar">
            <button type="submit" class="button submit semismall" onclick="enrollEvent(this)" value="N">등록하기</button>
        </div>
    </div>
    <!-- /댓글작성 -->

<script>
function enrollEvent(obj){
    var my = obj;
    var content = $(my).parent().siblings('textarea').val();
    var value = $(my).val();
    var idx = $(my).siblings('input[type="hidden"]').val();
    if(typeof(idx) =="undefined") idx = 0;
    @if (Auth::check())
        if(content==''){
            alert("내용을 입력해주세요.");
            return false;
        }
    console.log(content);
    console.log(value);
    console.log({{ $boardView->idx }});
    console.log(idx);
    alert('stop');
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
            'isReply': value
        },
        success : (result) => {
            $('#commentSrc').empty().append(result.html);
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
        },
        success : (result) => {
            $('#commentSrc').empty().append(result.html);
        }
    });


});
</script>
