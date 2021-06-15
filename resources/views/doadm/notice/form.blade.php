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

<form action="/doadm/notice" method="post" id="frm" enctype="multipart/form-data" onsubmit="return sendwrite();">
@csrf

@if ( $action == 'edit' )
<input type="hidden" name="wmode" value="edit_ok">
<input type="hidden" name="pIdx" value="{{ $boardEdit->idx }}">
@elseif ( $action == 'reply')
<input type="hidden" name="wmode" value="reply_ok">
<input type="hidden" name="reIdx" value="{{ $boardReply->idx }}">
@else
<input type="hidden" name="wmode" value="insert">
@endif
<input type="hidden" name="page" value=""> 

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
    <td><input type="text" id="iSubject" name="iSubject" value="@if (isset($boardEdit->subject)) {{ $boardEdit->subject }} @elseif (isset($boardReply->subject)) RE : {{ $boardReply->subject }} @endif" class="w100"></td>
    </tr>
    <tr>
    <th scope="row"><label for="iContent">내용</label></th>
    <td>
        <div class="explain form-text1">※ 개인정보보호를 위해 주민번호, 주소, 전화번호 등은 내용에 남기지 마십시오.</div>
        <textarea class="summernote" name="iContent">@if (isset($boardEdit->content)) {{ $boardEdit->content }} @endif</textarea>
    </td>
    </tr>
    <tr>
    <th scope="row"><span class="form-static1">첨부파일</span></th>
    <td>
    @for($fcnt=0; $fcnt < 3; $fcnt++)
        <div>
            <label for="iFile{{ $fcnt +1 }}">첨부파일 {{ $fcnt +1 }} </label>
            <input type="file" name="iFile[]" id="iFile{{ $fcnt +1 }}">
        </div>
    @endfor
    </td>
    </tr>
<!--    <tr>
    <th scope="row"><label for="★1file1">첨부파일1</label></th>
    <td>
        <input type="file" id="★1file1" class="mgr075em">
        <div class="explain form-text1">
            <em class="em2">이미지는 웹 접근성을 위해 적절한 대체텍스트를 제공해야 합니다.</em>
        </div>
        <textarea id="★1file1alt1" rows="2" cols="80" class="w100" placeholder="첨부파일1 대체텍스트" title="첨부파일1 대체텍스트"></textarea>
    </td>
    </tr>
    <tr>
    <th scope="row"><label for="★1file2">첨부파일2</label></th>
    <td><input type="file" id="★1file2"></td>
    </tr>
    <tr>
    <th scope="row" class="vam"><label for="★1file2alt1" class="mgtb0">첨부파일2 <span class="dpib">대체텍스트</span></label></th>
    <td class="vam">
        <textarea id="★1file2alt1" rows="2" cols="80" class="w100" placeholder="첨부파일2 대체텍스트" title="첨부파일2 대체텍스트"></textarea>
    </td>
    </tr>
    <tr>
    <th scope="row"><label for="★1cite1">출처</label></th>
    <td><input type="text" id="★1cite1" class="w100"></td>
    </tr> -->

    <tr>
    <th scope="row"><span class="form-static1">공개/비공개 <span class="dpib">선택</span></span></th>
    <td>
        <span class="dpib vam">
            <input type="radio" name="iPublic" id="iPublic1" checked="checked" value="Y"><label for="iPublic1">공개</label>
        </span>
        <span class="form-static1">&nbsp;&nbsp;</span>
        <span class="dpib vam">
            <input type="radio" name="iPublic" id="iPublic2" value="N"><label for="iPublic2">비공개</label>
        </span>
    </td>
    </tr>
<!--    <tr>
    <th scope="row"><span class="form-static1">정보공개</span></th>
    <td>
        <span class="explain form-text1">일반인에게</span>
        <label for="★1openinfo" class="blind">공개옵션</label>
        &nbsp;
        <select id="★1openinfo" title="공개옵션">
        <option value="">공개</option>
        <option value="">비공개</option>
        </select>
        &nbsp;
        <span class="explain form-text1">하시겠습니까?</span>
    </td>
    </tr> -->
    <tr>
    <th scope="row"><span class="form-static1 blind">공지글</span></th>
    <td>
        <span class="dpib form-text1 wwbw wbka">
            <input type="checkbox" name="iNotice" id="iNotice" class="fl" value="Y"><label for="iNotice" class="dpb ofh form-text1"> 공지글로 표시</label>
        </span>
    </td>
    </tr>    
    <tr>
    <th scope="row"><span class="form-static1 blind">개인정보 수집 동의</span></th>
    <td>
        <span class="dpib form-text1 wwbw wbka">
            <input type="checkbox" name="agreement" id="agreement" class="fl"><label for="agreement" class="dpb ofh form-text1"> 개인정보 수집에 동의합니다.</label>
        </span>
    </td>
    </tr>
    </tbody>
</table>
<!-- /writeform1 -->


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

    if ( $("#frm input:checkbox[name='agreement']").is(":checked") != true ) {
           alert('약관에 동의하셔야 가입이 가능합니다.');
           $("#frm radio[name='agreement']").focus();
           return false;
    }
      
return;
}
</script>

</div>

@endsection
