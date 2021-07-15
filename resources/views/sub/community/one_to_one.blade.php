<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210316 | @m | 요구반영. 결함개선. 고도화.
 * ~20210317 | @m |
 * 20210414 | @m | 요구반영
 */
-->
@extends('master_sub')

@section('title', '커뮤니티 - 1:1 문의 작성')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1row1 -->
<div class="cp1row1">
	<div class="column1">
		<a href="javascript:history.back();" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
	</div>
	<div class="column2">
	</div>
</div>
<!-- /cp1row1 -->


<h2 class="hb1 h2">1:1 문의</h2>

<p class="mgb2em cvc fsS1">
	두런 서비스 이용에 대해 궁금한 내용을 남겨주세요.<br />
	자주 질문하는 내용은 FAQ에 정리되어 있으니 참고해 주세요.<br />
</p>

<!-- 폼아이템들(.cp1form1item1) -->
<form method="POST" action="{{ route('sub.community.one_to_one') }}" id="★1form0" enctype="multipart/form-data">
    @csrf
    <div class="cp1form1item1">
        <div class="dt">
            <span class="tt1 s1">문의 유형</span>
        </div>
        <div class="dd">
            <input type="hidden" name="selectedName" id="selectedName"/>
            <span class="dpib mgr1em">
                <input type="radio" name="★1radio0" id="★1radio0e0" /> <label for="★1radio0e0">일반</label>
            </span>
            <span class="dpib mgr1em">
                <input type="radio" name="★1radio0" id="★1radio0e1" /> <label for="★1radio0e1">강좌요청</label>
            </span>
            <span class="dpib mgr1em">
                <input type="radio" name="★1radio0" id="★1radio0e2" /> <label for="★1radio0e2">영상요청</label>
            </span>
            <span class="dpib mgr1em">
                <input type="radio" name="★1radio0" id="★1radio0e3" /> <label for="★1radio0e3">출강요청</label>
            </span>
            <span class="dpib mgr1em">
                <input type="radio" name="★1radio0" id="★1radio0e4" /> <label for="★1radio0e4">기타</label>
            </span>
        </div>
    </div>

    <div class="cp1form1item1">
        <div class="dt">
            <label for="★1text0" class="tt1">제목</label>
        </div>
        <div class="dd">
            <input type="text" id="★1text0" name="title" value="" placeholder="제목을 입력하세요." class="w100 bdct bgct" />
        </div>
    </div>

    <div class="cp1form1item1">
        <div class="dt">
            <label for="★1textarea0" class="tt1">내용</label>
        </div>
        <div class="dd">
            <textarea id="★1textarea0" name="content" rows="5" cols="80" placeholder="문의 내용을 입력하세요." class="w100 bdct bgct"></textarea>
        </div>
    </div>

    <div class="cp1form1item1">
        <div class="dt">
            <label for="★1file0" class="tt1">첨부</label>
        </div>
        <div class="dd">
            <input type="file" id="★1file0" title="파일명 또는 URL" class="w100 bdct bgct" name="file" />
        </div>
    </div>

    <!-- /폼아이템들(.cp1form1item1) -->


    <!-- infomenu1 -->
    <div class="infomenu1">
        <div class="center">
            <button type="submit" class="button submit wide round fsB2">등록하기</button>
            <a href="javascript:history.back();" class="button secondary wide round  fsB2">취소하기</a>
        </div>
    </div>
    <!-- /infomenu1 -->

</form>
<script>
    $('#★1form0').on('submit', function(){
        var check = $('input[name="★1radio0"]:checked');
        $('#selectedName').attr("value", check.attr("id") );
        if(typeof(check.val())=='undefined'){
            alert('문의 유형을 선택해주세요.');
            return false;
        }else if($('#★1text0').val()==''){
            alert('제목을 입력하세요.')
            return false;
        }else if($('#★1textarea0').val()==''){
            alert('문의 내용을 입력하세요.');
            return false;
        }else{
        }


    })
</script>

</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
