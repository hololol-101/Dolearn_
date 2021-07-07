@extends('layouts.doadm.doadm_layout') // 레이아웃을 사용함.

@section('content')

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<div class="width1s2">

<!-- <h1 class="hb1 h1">글작성1</h1> -->


<div class="ofh mgt2em">
    <h3 class="hb1 h3 fl mg0">글작성하기</h3>
    <p class="tar"><em class="required" title="필수항목">*</em> 는 필수 입력 <span class="dpib">항목입니다.</span></p>
</div>


<!-- panel1 -->
<div class="panel1 bg-default shadow">
@if(isset($status))
<form action="{{ route('serviceinquiry.qna.answer_edit') }}" method="post" id="frm" enctype="multipart/form-data" onsubmit="return sendwrite();">
@else
<form action="{{ route('serviceinquiry.qna.answer') }}" method="post" id="frm" enctype="multipart/form-data" onsubmit="return sendwrite();">
@endif

@csrf
<input type="hidden" name = "idx" @if (isset($qaInfo->idx))  value = "{{ $qaInfo->idx }}"@endif>

<!-- writeform1 -->
<table class="writeform1 t01 tdpdlr2pct thcv0 bdsd fsxd">
    <caption class="pd0">
        <strong class="h1 blind">작성 폼</strong>
        <span class="summary1 blind"><!-- : ★표요약,구조,탐색방법 (아이디, 암호, 암호 확인, 이름, …) th 항목 모두 나열하세요. --></span>
    </caption>
    <colgroup><col style="width:8em;"><col>
    </colgroup><tbody>
    <tr>
    <th scope="row"><label for="iSubject">제목</label></th>
    <td><input type="text" id="iSubject" name="iSubject" value="@if (isset($qaInfo->question_title)) RE : {{ $qaInfo->question_title }} @endif" class="w100"></td>
    </tr>
    <tr>
    <th scope="row"><label for="iContent">내용</label></th>
    <td>
        <div class="explain form-text1">※ 개인정보보호를 위해 주민번호, 주소, 전화번호 등은 내용에 남기지 마십시오.</div>
        <textarea class="summernote" name="iContent">@if($status!='') {{ $qaInfo->answer_content }}@endif</textarea>
    </td>
    </tr>
    <tr>
    <th scope="row"><span class="form-static1">첨부파일</span></th>
    <td>
        @for($fcnt=0; $fcnt < 3; $fcnt++)
        <div>
            <label for="iFile{{ $fcnt }}">첨부파일{{ $fcnt+1 }}</label>
            @if (isset($fileArray[$fcnt]))
            @if ($fileArray[$fcnt]!='')
                {{ $fileArray[$fcnt] }}
                <input type="hidden" name="answer_attach_file_name{{ $fcnt }}" value="{{ $fileArray[$fcnt] }} ">
                <button type="button" value="{{ $fcnt }}" class="button" id="deleteFile" onclick="deleteClick(this)">파일삭제</button>
            @else
                <input type="file" name="iFile{{ $fcnt }}" id="iFile{{ $fcnt }}" >
            @endif
        @else
                <input type="file" name="iFile{{ $fcnt }}" id="iFile{{ $fcnt }}">
        @endif

        </div>
        @endfor
        {{-- <div>
            @if (isset($qaInfo->idx))
                @if ($qaInfo->answer_attach_file!='')
                    {{ $qaInfo->answer_attach_file }}
                    <input type="hidden" name="isDelete">
                    <input type="hidden" name="attach_file_name" value="{{ $qaInfo->answer_attach_file }}">

                    <button type="button" value="delete" class="button" id="deleteFile">파일삭제</button>
                @else
                <input type="file" name="iFile" id="iFile">
            @endif
        @else
            <input type="file" name="iFile" id="iFile">
        @endif
        </div> --}}
    </td>
    </tr>
    </tbody>
</table>
<!-- /writeform1 -->

<script>
    function deleteClick(obj){
        var my = $(obj)
        var parent = my.parent();
        var cnt = my.val();
        $('input[name="isDelete'+cnt+'"]').val(true);
        my.parent().empty().append(' <input type="file" name="iFile'+cnt+'" id="iFile'+cnt+'">');
    }
</script>

<!-- infomenu1 -->
<div class="infomenu1 mg0 dott">
    <p class="center mgt1em mgb1em">
        <button type="submit" value="submit" class="button large submit">저장하기</button>
        <a href="{{ url()->previous() }}" class="button large default">취소하기</a>
    </p>
</div>
<!-- /infomenu1 -->

</form>

</div>
<!-- /panel1 -->

<script type="text/javascript">
$(document).ready(function() {
  $('.summernote').summernote({
    tabsize: 2,
    height: 300,
    lang: 'ko-KR',
//    callbacks: {
//        onImageUpload: function(files){
//            sendFile(files[0], $(this));
//        }
//    }
  });
});
function sendFile(file, editor) {
    var data = new FormData();
    data.append("uploadFile", file);
    $.ajax({
        data: data,
        type: "POST",
        url: "/image_upload.php",
        enctype: 'multipart/form-data',
        cache: false,
        contentType: false,
        processData: false,
        success: function(dd){
            data = jQuery.parseJSON(dd);

            if(data.status == "OK"){
                editor.summernote('insertImage', data.url);
            } else {
                alert(data.message);
            }
        },
        error: function(data){
            console.log(data);
        }
    });
}

function save(){
    var markupStr = $('#summernote').summernote('code');
    $("#content").val(markupStr);
    $("#inform").submit();
}

function default_value(){
    var markupStr = '디폴트 값';
    $('#summernote').summernote('code', markupStr);
}

function sendwrite() {

    if ($('#frm input[name="iSubject"]').val().trim() == "" ) {
       alert('제목을 입력 하세요');
          $('#frm input[name="iSubject"]').focus();
       return false;
    }
    if ($('#frm textarea[name="iContent"]').val().trim() == "" ) {
       alert('내용을 입력 하세요');
          $('#frm textarea[name="iContent"]').focus();
       return false;
    }

return;
}
</script>

</div>

@endsection
