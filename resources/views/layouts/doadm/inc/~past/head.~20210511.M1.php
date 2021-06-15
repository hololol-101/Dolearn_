<div id="skipnav">
	<ul>
	<li><a href="#body">본문 바로가기</a></li>
	<li><a href="#tnb1">주 메뉴 바로가기</a></li>
	</ul>
</div><hr class="dpn" />


<!-- #container -->
<div id="container" tabindex="-1">
<noscript><p class="noscript">JavaScript has been disabled. This site requires JavaScript for full functionality, please enable.</p></noscript>


<!-- #head -->
<div id="head" class="init">
<div class="bg bg2head"></div>
<!-- #head_s1 -->
<div id="head_s1" class="clearfix">
<!-- container -->
<div class="container">


<!-- gn1 -->
<div id="gn1">
	<strong class="blind">Global Navigation</strong>
	<ul>
	<li><a href="?#★"><i class="ic1"></i> <span class="t1">LOGIN</span></a></li>
	<li><a href="?#★"><i class="ic1"></i> <span class="t1">JOIN</span></a></li>
	</ul>
</div>
<!-- /gn1 -->

<!-- gn2 -->
<div id="gn2">
	<ul>
	<li class="sitemap"><a href="?#★"><i class="ic1"></i> <span class="t1 blind">Sitemap</span></a></li>
	</ul>
</div>
<!-- /gn2 -->


</div>
<!-- /container -->
</div>
<!-- /#head_s1 -->
<!-- #head_s2 -->
<div id="head_s2" class="clearfix">
<!-- container -->
<div class="container">


<!-- logo -->
<h1 id="logo">
	<a href="/" title="홈으로 이동">
		<span class="show-default"><img src="<?=$sitePath?>/img/inc/logo@2x.png" alt="AI 펜덕스 (AI Learning 펜덕스 &reg;)" /></span>
		<span class="show-over"><img src="<?=$sitePath?>/img/inc/logo2@2x.png" alt="AI 펜덕스 (AI Learning 펜덕스 &reg;)" /></span>
	</a>
</h1>
<!-- /logo -->


<h2 class="blind">상단 메뉴</h2>


<!-- tnb1 [JS] -->
<div id="tnb1">
	<h3 class="blind">주 메뉴</h3>
	<strong class="h1"><a href="#tnb1c" class="b1 toggle"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">여닫기</span></a></strong>
	<!-- tnb1c -->
	<div id="tnb1c"><div class="bg"></div>
	<!-- cont -->
	<div class="cont"><div class="bg"></div><!-- 20171018 ((( :before 는 클릭안되어 수정 -->
		<a href="#tnb1c" class="b2 close"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">닫기</span></a>
		<!-- tnb1head_s1 -->
		<div id="tnb1head_s1">
			<!-- tnb1gn1 -->
			<div id="tnb1gn1">
				<strong class="blind">Global Navigation</strong>
				<ul>
				<li><a href="?#★"><i class="ic1"></i> <span class="t1">LOGIN</span></a></li>
				<li><a href="?#★"><i class="ic1"></i> <span class="t1">JOIN</span></a></li>
				</ul>
			</div>
			<!-- /tnb1gn1 -->
		</div>
		<!-- /tnb1head_s1 -->
		<!-- d1 --><?php
		$str_hg1h2[0] = ""; //★부제목2
		$str_hg1h2[1] = "";
		$str_hg1h2[2] = "";
		$str_hg1h2[3] = "";
		$str_hg1h2[4] = "";
		$str_hg1h2[5] = "";
		$str_hg1h2[6] = "";
		$str_hg1h2[7] = "";
		$str_hg1h2[8] = "";
		$str_hg1h2[9] = "";

		// ★1차
		for ( $i = 1; $i <= count($mAll); $i++ ) {
			if ( $mAll[$i][0][0][0] == null ) continue;
		?>
		<div class="d1"><div class="bg"></div>
		<ul><?php
				for ( $ii = 1; $ii <= count($mAll); $ii++ ) {
					if ( $mAll[$ii][0][0][0] == null ) continue;
		?>
		<li class="m<?=$ii?>"><a <?=$mAnchor[$ii][0][0][0]?>><i class="ic1"></i> <span class="t1"><?=$mTitle[$ii][0][0][0]?></span></a><?php
		?>
		</li><?php
				}
		?>
		</ul>
		</div><?php
		}
		?>
		<!-- /d1 -->
		<a href="#tnb1c" class="b2 close"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">닫기</span></a>
	</div>
	<!-- /cont -->
	</div>
	<!-- /tnb1c -->
</div>
<!-- /tnb1 -->
<script>/*<![CDATA[*/
	/** ◇◆ 서브메인 링크 마크업추가. 20210428. @m.
	 */
	(function(){
		$('#tnb1 .submain').each(function(){
			$(this).next('div').find('>ul').before('<a href="'+ $(this).attr('href') +'" class="smain"><b class="t1">'+ $(this).text() +'</b><i class="ic1"></i></a>');
		});
	})();
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /#head_s2 -->
</div><hr class="dpn" />
<!-- /#head -->