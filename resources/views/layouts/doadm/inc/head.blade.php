<!-- #container -->
<div id="container">


<!-- #head -->
<div id="head" class="init">
	<h1 id="logo">
		<a href="/" title="시작페이지">ADMIN</a>
	</h1>
	<div id="gnb1">
		<a class="time1"><i class="ic1"></i><span class="t1">2021년05월21일 15:22:22</span></a>
		<a href="/" target="_blank" rel="noopener" title="새 창" class="home1"><i class="ic1"></i><span class="t1">홈페이지 바로가기</span></a>
		<a href="?#★">비밀번호변경</a>
		<a href="?#★" class="logout1"><i class="ic1"></i><span class="t1">로그아웃</span></a>
		<a href="?#★" class="adm1set1"><i class="ic1"></i><span class="t1">관리자 설정</span></a>
	</div>

	<!-- search1 -->
	<div id="search1">
		<form id="search1f0" action="?">
		<fieldset>
			<legend class="blind"><strong class="h1">통합검색</strong></legend>
			<select class="select" title="선택옵션1">
				<option value="">메뉴검색</option>
				<option value="">게시판검색</option>
				<option value="">접근제어검색</option>
				<option value="">프로그램검색</option>
			</select>
			<input type="text" id="search1f0text" value="" placeholder="검색어를 입력해주세요." title="검색어" class="text" />
			<button type="submit" value="" class="button submit search"><i class="ic1"></i><span class="t1">검색</span></button>
		</fieldset>
		</form>
	</div>
	<!-- /search1 -->

	<div id="visual"></div>
</div>
<!-- /#head -->


<a href="#sidebar" class="mj-toggle-tnb1"><i class="ic1"></i><span class="t1">주메뉴 여닫기</span></a>
<script>/*<![CDATA[*/
	/** ◇◆ 주메뉴 여닫기. 20191119. @m.
	 */
	$(function(){
		var $my = $('.mj-toggle-tnb1');
		$my.on('click', function(e){
			e.preventDefault();
			if($(this).attr('href')){
				if( !$(this).is('.st0') ){
					$(this).addClass('st0');
					$($(this).attr('href')).hide();
				}else{
					$(this).removeClass('st0');
					$($(this).attr('href')).show();
				}
			}
		});
	});
/*]]>*/</script>

