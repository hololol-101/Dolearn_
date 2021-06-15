<!-- search1main1 -->
<div id="search1main1">
<div class="wrap1">
	<div class="hg1">
		<strong class="h1 blind">SEARCH</strong>
		<div class="tabs">
			<a href="javascript:void(0);" class="a1">영상검색</a>
			<a href="javascript:void(0);" class="a1">강좌검색</a>
		</div>
	</div>
    <fieldset>
        <legend class="blind"><strong class="h1">통합 검색</strong></legend>
        <input type="text" name="search_keyword" id="search_keyword" value="" placeholder="" title="검색어" class="text" />
        <input type="hidden" name="search_type" id="search_type" value="">
        <button type="submit" class="button submit search" id="search_btn" onclick="keywordSearch()"><i class="ic1"></i><span class="t1 blind">검색</span></button>
    </fieldset>
	<!-- <div class="tag">
		<a href="?#" class="a1">태그</a>
		<a href="?#" class="a1">인기</a>
		<a href="?#" class="a1">검색어</a>
		<a href="?#" class="a1">입력창</a>
		<a href="?#" class="a1">바로가기</a>
		<a href="?#" class="a1">버튼</a>
	</div> -->
</div>
</div>
<!-- /search1main1 -->


<script>/*<![CDATA[*/
	$(function(){
		/** ◇◆ 탭 선택하면 활성동작. input type="text" placeholder 값 변경. 20210414. @m.
		 */
		(function(){
			var my = '#search1main1',
				$m = $('.tabs .a1', $(my)),
				$t = $('.text', $(my)),
				vs = vt = '';
			$m.on('click', function(e){
				e.preventDefault();
				$(this).addClass('on').siblings().removeClass('on');
				vs = $(this).text();
				switch(vs){
					case '영상검색': vt = '영상 내용 또는 제목으로 검색이 가능합니다.'; $('#search_type').val('video'); break;
					case '강좌검색': vt = '제목 또는 주제로 검색이 가능합니다.'; $('#search_type').val('lecture'); break;
					default: vt = ''; break;
				}
				$t.attr({placeholder: vt});
			});
			$m.triggerHandler('click');
		})();
	});

    // 키워드로 검색
    function keywordSearch() {
        var searchType = $('#search_type').val();
        var searchKeyword = $('#search_keyword').val();

        if (searchType == 'video') {
            location.href = '/sub/video/video_list?keyword=' + searchKeyword;
        } else if (searchType == 'lecture'){
            location.href = '/sub/lecture/lecture_list?keyword=' + searchKeyword;
        }
    }
/*]]>*/</script>
