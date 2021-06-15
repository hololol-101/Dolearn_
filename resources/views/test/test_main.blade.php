@extends('master')

@section('title', '테스트')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">
<br>
<br>
<h2>테스트 페이지입니다 :)</h2>
<br>
<div>
    <ul>
        <li>구글 로그인</li>
        <a href="/auth/google_redirect"><img src="{{ asset('assets/images/google_signin_buttons/1x/btn_google_signin_dark_normal_web.png') }}" alt="sign in with google"></a>
        <br><br>
        <button class="button" id="select-data">회원 조회</button>
        <br><br>
        <li>이름 검색</li>
        <div class="input-group" id="search-name">
            <input type="text" class="form-control" id="search-text" name="title" placeholder="검색할 이름을 입력하세요.">
            <span class="input-group-btn">
                <input type="button" class="btn btn-default" id="search-btn" value="검색">
            </span>
        </div>
        <br>
        <div id="result"></div>
        <br>
        <li>문서 편집기</li>

        <form method="POST" action="">
            <div class="input-group" id="input-title">
                <input type="text" class="form-control" id="title" name="title" placeholder="제목을 입력하세요.">
            </div>
            <textarea id="editor" name="editor"></textarea>
            <div id="input-submit">
                <input type="submit" class="btn btn-primary" id="submit-btn" value="글등록">
                <input type="button" class="btn btn-default" id="cancel-btn" value="취소">
            </div>
        </form>
    </ul>
</div>

</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection

@section('script')
<script src="{{ asset('assets/js/ckeditor_load.js') }}"></script>
<script>
// 데이터 조회
$('#select-data').click(function() {
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: 'POST',
        url: '{{ route('test.select_data') }}',
        data: {},
        dataType: 'json',
        success: function(data) {
            $('#result').empty();
            if (data.success) {
                $('#result').append(data.html);
            } else {
                $('#result').append(data.message + '<br>' + data.code);
            }
        },
        error: function(request, status, error) {
            var msg = 'Status Code: ' + request.status + '\n' + error;
            console.log(msg);
        }
    });
    return false;
});

// 실시간 입력 변경 검색
$("#search-text").on("propertychange change keyup paste input", function() {
    console.log($(this).val());
    if ($(this).val() != '') {
        var search_text = $(this).val();
        $("#search-table > tbody > tr").hide();
        var temp = $("#search-table > tbody > tr > td:nth-child(4n+2):contains('" + search_text + "')");
        $(temp).parent().show();
    } else {
        $("#search-table > tbody > tr").show();
    }
});
</script>
@endsection
