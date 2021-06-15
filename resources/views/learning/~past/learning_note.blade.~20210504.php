<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">영상 노트</h2>
	<a href="javascript:void(0);" class="a1">내 노트 모두보기</a>
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- w1bottom1 -->
<div class="w1bottom1">


<!-- cp2lecture1note1 -->
<div class="cp2lecture1note1">
	<div class="tg1">
		<span class="t1"><i class="t1ic1"></i> <span class="t1t1">02 : 22</span></span>
	</div>
	<div class="tg2">
		<div class="t2">
			숫자와 문자 셀을 세는 함수= COUNTA
		</div>
		<div class="eg1">
			<a href="{{ route('learning.modify_note') }}" class="a2 edit"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
			<a href="?#★" class="a2 del"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
		</div>
	</div>
</div>
<!-- /cp2lecture1note1 -->


<!-- cp2lecture1note1 -->
<div class="cp2lecture1note1">
	<div class="tg1">
		<span class="t1"><i class="t1ic1"></i> <span class="t1t1">02 : 22</span></span>
	</div>
	<div class="tg2">
		<div class="t2">
			일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
			일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔
		</div>
		<div class="eg1">
			<a href="{{ route('learning.modify_note') }}" class="a2 edit"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
			<a href="?#★" class="a2 del"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
		</div>
	</div>
</div>
<!-- /cp2lecture1note1 -->


<!-- cp2write1 -->
<div class="cp2write1">
	<div class="editor">
		<div class="mgt3em mgb3em tac">개발자 온라인 웹문서 편집기 처리 필요!</div>
	</div>
	<div class="btns">
		<button type="submit" class="button submit">등록하기</button>
	</div>
</div>
<!-- /cp2write1 -->


</div>
<!-- /w1bottom1 -->


</div>
<!-- /aside_content -->

<script>
$(function() {
    /** ◇◆ #aside 감춤 | 20210121. @m.
    */
    (function(){
        var $my = $('#tnb1');
        $my.$m = $('li', $my);

        $('#aside_head .close').on('click', function(e){
            e.preventDefault();
            $('html').addClass('hide-aside');
            $my.$m.filter('.on').removeClass('on');
        });
    })();
})
</script>
