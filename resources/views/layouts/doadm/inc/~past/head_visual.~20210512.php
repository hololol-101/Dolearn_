<?php
$visual_text1[0] = "";
$visual_text1[1] = "";
$visual_text1[2] = "";
$visual_text1[3] = "";
$visual_text1[4] = "";
$visual_text1[5] = "";
$visual_text1[6] = "";
$visual_text1[7] = "";
$visual_text1[8] = "";
$visual_text1[9] = "";

$visual_num = "";
if($d1n<10) $visual_num = "0" . $d1n; // 20180525~. 1차 메뉴별 비주얼 이미지명 v1p01.jpg, v1p02.jpg, ..
else $visual_num = ""; // 조건 이외는 비주얼 기본 이미지명 v1p.jpg
?>
<div id="visual">
	<div class="v1<?=$visual_num?>"><img src="<?=$sitePath?>/img/inc/v1p<?=$visual_num?>.jpg" width="2000" height="500" alt="" /></div>
	<div class="tg1 blind">
		<strong class="h1"><span class="h1t1"><?=$mTitle[$d1n][0][0][0]?></span></strong>
		<p class="t1"><?=$visual_text1[$d1n]?></p>
	</div>
	<div class="tg2 blind">
		<span class="t1"><span class="t1t1 ts1">대치동 수업을 그대로</span> </span>
		<span class="t2"><span class="t2t1"><i class="e1"></i><span class="en">e-learning</span>으로 학습</span></span>
	</div>
</div>