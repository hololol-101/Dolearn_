
<script>
    var postId = '';
    @if(isset($_GET['qna_idx']))
    postId = '{{ $_GET['qna_idx'] }}'
    @elseif(isset($_GET['idx']))
    postId = '{{ $_GET['idx'] }}'
    @endif
    @php
        $page = isset($_GET['page'])?$_GET['page']:1;
    @endphp
    function enrollEvent(obj){
        var my = obj;
        var content = $(my).parent().siblings('textarea').val();
        $(my).parent().siblings('textarea').val('')
        var value = $(my).val();
        var idx = $(my).siblings('input[type="hidden"]').val();
        var permission = 'N';

        if(typeof(idx) =="undefined") idx = 0;
        @if(isset($permission)) permission = 'Y';@endif
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
                    'postId': postId,
                    'parentId': idx,
                    'permission': permission,
                    'postType':"question",
                    'content': content,
                    'isReply': value,
                    'page':{{ $page }}
                },
                success : (result) => {
                    $('#commentSrc').empty().append(result.html);
                    $('#commentPage').empty().append(result.pageIndex['htmlCode']);
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
    var permission = 'N';
    @if(isset($permission)) permission = 'Y';@endif
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: 'json',
        url : "{{ route('sub.comment.index') }}",
        data: {
            'postId': postId,
            'page':{{ $page }},
            'postType':"question",
            'permission':permission
        },
        success : (result) => {
            console.log(result.query);
            $('#commentSrc').empty().append(result.html);
            $('#commentPage').empty().append(result.pageIndex['htmlCode']);
        }
    });

});
</script>
