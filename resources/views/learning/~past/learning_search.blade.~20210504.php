<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">내용 검색</h2>
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- cp2search1 -->
<div class="cp2search1">
	<input type="text" value="" placeholder="검색어를 입력하세요." title="검색어" class="text">
	<button type="submit" class="button submit search" id="searchBtn"><i class="ic1"></i><span class="t1 blind">검색</span></button>
</div>
<!-- /cp2search1 -->


<!-- cp4tag1 -->
<div class="cp4tag1">
	<strong class="h1">인기 검색어</strong>
	<div class="tags">
		<a href="?#★" class="a1"><span class="a1t1">JavaScript</span></a>
		<a href="?#★" class="a1"><span class="a1t1">모바일 앱 개발</span></a>
		<a href="?#★" class="a1"><span class="a1t1">HTML/CSS</span></a>
		<a href="?#★" class="a1"><span class="a1t1">데이터분석</span></a>
		<a href="?#★" class="a1"><span class="a1t1">데이터분석</span></a>
		<a href="?#★" class="a1"><span class="a1t1">데이터분석</span></a>
		<a href="?#★" class="a1"><span class="a1t1">데이터분석</span></a>
		<a href="?#★" class="a1"><span class="a1t1">데이터분석</span></a>
	</div>
</div>
<!-- /cp4tag1 -->


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

    $('#searchBtn').click(function() {
        location.href='/learning/search_result';
    });
});
</script>

<script>
    $(function() {

    });
    </script>
