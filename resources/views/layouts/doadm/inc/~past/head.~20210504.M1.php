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
	<a <?=$mAnchor[0][0][0][0]?> title="홈으로 이동">
		<span class="show-default"><img src="<%=sitePath%>/img/inc/logo.png" alt="AI 펜덕스 (AI Learning. Publishing & Online. Institute of English Education)" /></span>
		<span class="show-over"><img src="<%=sitePath%>/img/inc/logo2.png" alt="AI 펜덕스 (AI Learning. Publishing & Online. Institute of English Education)" /></span>
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
				<li><a <?=$mAnchor[0][0][0][0]?>><i class="ic1"></i> <span class="t1">LOGIN</span></a></li>
				<li><a <?=$mAnchor[0][0][0][0]?>><i class="ic1"></i> <span class="t1">JOIN</span></a></li>
				</ul>
			</div>
			<!-- /tnb1gn1 -->
		</div>
		<!-- /tnb1head_s1 -->
		<!-- d1 --><%
		String str_hg1h2[] = new String[d1Max];
		str_hg1h2[0] = ""; //★부제목2
		str_hg1h2[1] = "";
		str_hg1h2[2] = "";
		str_hg1h2[3] = "";
		str_hg1h2[4] = "";
		str_hg1h2[5] = "";
		str_hg1h2[6] = "";
		str_hg1h2[7] = "";
		str_hg1h2[8] = "";
		str_hg1h2[9] = "";

		// ★1차
		for(int i = 1; i < d1Max; i++){ // ★☆ToEdit) (( d1Max
			if(mAll[i][0][0][0] != null){
		%>
		<div class="d1"><div class="bg"></div>
		<ul><%
				for(int ii = 1; ii < d1Max; ii++){ // ★☆ToEdit) (( d1Max
					if(mAll[ii][0][0][0] == null) continue;
		%>
		<li class="m<%=ii%>"><a <%=mAnchor[ii][0][0][0]%>><i class="ic1"></i> <span class="t1"><%=mTitle[ii][0][0][0]%></span></a><%
					 // ★	2차
					for(int j = 1; j < d2Max; j++){
						if(mAll[ii][j][0][0] != null){
		%>
			<div class="d2"><div class="bg"></div>
			<!-- 1차제목, 부제목 -->
			<div class="hg1">
				<strong class="h1"><%=mTitle[ii][0][0][0]%></strong>
				<p class="h2"><%=str_hg1h2[ii]%></p>
				<i class="ic1"></i>
			</div>
			<ul><%
							for(int jj = 1; jj < d2Max; jj++){
								if(mAll[ii][jj][0][0]== null) continue;
		%>
			<li class="m<%=jj%>"><a <%=mAnchor[ii][jj][0][0]%>><i class="ic1"></i> <span class="t1"><%=mTitle[ii][jj][0][0]%></span></a><%
								// ★3차
								for(int k = 1; k < d3Max; k++){
									if(mAll[ii][jj][k][0] != null){
		%>
				<div class="d3"><div class="bg"></div>
				<ul><%
										for(int kk = 1; kk < d3Max; kk++){
											if(mAll[ii][jj][kk][0] == null) continue;
		%>
				<li class="m<%=kk%>"><%=mMenu[ii][jj][kk][0]%><%
											// ★4차
											for(int l = 1; l < d4Max; l++){
												if(mAll[ii][jj][kk][l] != null){
		%>
					<div class="d4"><div class="bg"></div>
					<ul><%
													for(int ll = 1; ll < d4Max; ll++){
														if(mAll[ii][jj][kk][ll]== null) continue;%>
					<li class="m<%=ll%>"><%=mMenu[ii][jj][kk][ll]%></li><%
													}
		%>
					</ul>
					</div><%
													break;
												}
											}
		%>
				</li><%
										}
		%>
				</ul>
				</div><%
										break;
									}
								}
		%>
			</li><%
							}
		%>
			</ul>
			</div><%
							break;
						}
					}
		%>
		</li><%
				}
		%>
		</ul>
		</div><%
				break;
			}
		}
		%>
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