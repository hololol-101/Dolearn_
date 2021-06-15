<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('error_reporting', '0');
//$d1n=0;$d2n=0;$d3n=0;$d4n=0;$d5n=0;$d6n=0;
//$pageTitle="";
?>

<?php
function getInfo($mAll, $index) {
	if ( $mAll == null ) return null;
	$temp = explode("|", $mAll);
	if ( $index == 0 and count($temp) >= 1 ) return $temp[0];
	else if ( $index == 1 and count($temp) >= 2 ) return $temp[1];
	else if ( $index == 2 and count($temp) >= 3 ) return $temp[2];
	else return "";
}
?>
<?php
/** Menu All v.~20151022~. 20201110. 20210504 | Designed by MoonYoungshin | Reviser |
 * 최종제목 | 사이트명 // ☆이행
 * 사이트명 | 1차 - 2차 - 3차 - 4차 - 최종제목
 */

$viewType = "all"; // desktop|mobile
$pageType = ""; // |popup
$siteName = "AI 펜덕스";
$siteLogoAlt  = ""; // ★로고 이미지 텍스트 ))) 직접코딩
	//$siteLogoAlt = $siteName;
$siteKey = "default"; // ★사이트키 "portal"
$sitePath = "/_res/default"; // ★웹사이트 루트 폴더 "/_res/portal"
	//$sitePath = "/default/_res/default"; // ★ContextPath
$commonPath = $sitePath; // "/_res/portal" ★공통 경로. 포털과 다르면.. "/_res/_common"


// 새창
$newWin = " onclick='window.open(this.href);return false;' target='_blank' rel='noopener' title='새 창'";
$popUp = " onclick='window.open(this.href,\"\",\"width=400,height=500,scrollbars=yes,left=20,top=20\");return false;' target='_blank' rel='noopener' title='새 창'";
// 서브메인
$subMain = " class='submain'";
// ex)
//$mAll[1][1][0][0] = "메뉴명"."|".$sitePath."내부링크주소"."|".$popUp;
//$mAll[0][1][2][0] = "메뉴명"."|"."외부링크주소"."|".$newWin;
//$mAll[1][0][0][0] = "메뉴명"."|".$sitePath."서브메인링크주소"."|".$subMain;


// 1depth
$mAll[1][0][0][0] = "AI 펜덕스 란"."|".$sitePath."/html/sub/01_01.php";

$mAll[1][1][0][0] = "AI 펜덕스 소개"."|".$sitePath."/html/sub/01_01.php";

// 1depth
$mAll[2][0][0][0] = "AI 러닝"."|".$sitePath."/html/sub/02_01.php";

$mAll[2][1][0][0] = "AI 러닝 소개"."|".$sitePath."/html/sub/02_01.php"."|".$subMain;
	$mAll[2][1][1][0] = "Phonics"."|".$sitePath."/html/sub/02_01_01.php";
	$mAll[2][1][2][0] = "Elem"."|".$sitePath."/html/sub/02_01_02.php";
	$mAll[2][1][3][0] = "Bridge"."|".$sitePath."/html/sub/02_01_03.php";
	$mAll[2][1][4][0] = "Inter"."|".$sitePath."/html/sub/02_01_04.php";
	$mAll[2][1][5][0] = "Upper"."|".$sitePath."/html/sub/02_01_05.php";
	$mAll[2][1][6][0] = "Text7"."|".$sitePath."/html/sub/02_01_06.php";
	$mAll[2][1][7][0] = "Text8"."|".$sitePath."/html/sub/02_01_07.php";

// 1depth
$mAll[3][0][0][0] = "커뮤니티"."|".$sitePath."/html/sub/03_01.php";

$mAll[3][1][0][0] = "공지사항"."|".$sitePath."/html/sub/03_01.php";
$mAll[3][2][0][0] = "FAQ(1:1문의)"."|".$sitePath."/html/sub/03_02.php";
$mAll[3][3][0][0] = "원장님 후기"."|".$sitePath."/html/sub/03_03.php";
$mAll[3][4][0][0] = "신규상담신청"."|".$sitePath."/html/sub/03_04.php";

// 1depth
$mAll[4][0][0][0] = "My 강의실"."|".$sitePath."/html/sub/04_01.php";

$mAll[4][1][0][0] = "내 강의실"."|".$sitePath."/html/sub/04_01.php";
$mAll[4][2][0][0] = "이전 강의실"."|".$sitePath."/html/sub/04_02.php";
$mAll[4][3][0][0] = "이용방법"."|".$sitePath."/html/sub/04_03.php";
$mAll[4][4][0][0] = "정보수정"."|".$sitePath."/html/sub/04_04.php";

// 1depth
$mAll[5][0][0][0] = "My 페이지"."|".$sitePath."/html/sub/05_01.php";

$mAll[5][1][0][0] = "학습관리"."|".$sitePath."/html/sub/05_01.php";
	$mAll[5][1][1][0] = "학생관리"."|".$sitePath."/html/sub/05_01_01.php";
	$mAll[5][1][2][0] = "그룹관리"."|".$sitePath."/html/sub/05_01_02.php";
	$mAll[5][1][3][0] = "AI 강의관리"."|".$sitePath."/html/sub/05_01_03.php";
$mAll[5][2][0][0] = "신청하기"."|".$sitePath."/html/sub/05_02.php";
	$mAll[5][2][1][0] = "AI 강의신청"."|".$sitePath."/html/sub/05_02_01.php";
	$mAll[5][2][2][0] = "강의교재신청"."|".$sitePath."/html/sub/05_02_02.php";
$mAll[5][3][0][0] = "내결제"."|".$sitePath."/html/sub/05_03.php";
$mAll[5][4][0][0] = "이용방법"."|".$sitePath."/html/sub/05_04.php";
$mAll[5][5][0][0] = "정보수정"."|".$sitePath."/html/sub/05_05.php";

// 1depth
$mAll[6][0][0][0] = "회원"."|".$sitePath."/html/sub/06_01.php";

$mAll[6][1][0][0] = "로그인"."|".$sitePath."/html/sub/06_01.php";
$mAll[6][2][0][0] = "회원가입"."|".$sitePath."/html/sub/06_02.php";

// 1depth
$mAll[7][0][0][0] = "기타안내"."|".$sitePath."/html/sub/sitemap.php";

$mAll[7][1][0][0] = "사이트맵"."|".$sitePath."/html/sub/sitemap.php";
$mAll[7][2][0][0] = "개인정보취급방침"."|".$sitePath."/html/sub/07_02.php";
$mAll[7][3][0][0] = "이메일무단수집거부"."|".$sitePath."/html/sub/07_03.php";
$mAll[7][4][0][0] = "이용약관"."|".$sitePath."/html/sub/07_04.php";
//$mAll[7][5][0][0] = "관련사이트"."|".$sitePath."/html/sub/05_04.php";


// 공통메뉴
$mAll[0][0][0][0] = "홈"."|".$sitePath."/"; // HOME

// [상]사이트 메뉴
$mAll[0][1][1][0] = $mAll[0][0][0][0]; // Home
$mAll[0][1][2][0] = $mAll[7][1][0][0]; // Sitemap
//$mAll[0][1][3][0] = $mAll[1][3][0][0]; // 내부링크
//$mAll[0][1][3][0] = "외부링크"+"|"+"http://www.external.go.kr/"+"|"+newWin;

// [하]사이트 안내 및 정책
// [우]내부링크면여기서지정


$loopSum = 0; // 반복수 테스트

$d1Max = 0;
$d2Max = 0;
$d3Max = 0;
$d4Max = 0;

// 공용코드. 메뉴제목, 링크주소, 자바스크립트, title속성 할당, mList class='on' 활성
$d1Max = count($mAll);
for ( $i = 0; $i <= count($mAll); $i++ ) {
	if ( $mAll[$i][0][0][0] == null ) continue;
	if ($d2Max < count($mAll[$i])) $d2Max = count($mAll[$i]);
	for ( $j = 0; $j <= count($mAll[$i]); $j++ ) {
		if ( $mAll[$i][$j][0][0] == null and $i <> 0 ) continue;
		if ($d3Max < count($mAll[$i][$j])) $d3Max = count($mAll[$i][$j]);
		for ( $k = 0; $k <= count($mAll[$i][$j]); $k++ ) {
			if ( $mAll[$i][$j][$k][0] == null and $i <> 0 ) continue;
		if ($d4Max < count($mAll[$i][$j][$k])) $d4Max = count($mAll[$i][$j][$k]);
			for ( $l = 0; $l <= count($mAll[$i][$j][$k]); $l++ ) {
				if ( $mAll[$i][$j][$k][$l] == null) continue;
				$mTitle[$i][$j][$k][$l] = getInfo($mAll[$i][$j][$k][$l], 0);
				$mLink[$i][$j][$k][$l] = getInfo($mAll[$i][$j][$k][$l], 1);
				$mClick[$i][$j][$k][$l] = getInfo($mAll[$i][$j][$k][$l], 2);
				$mMenu[$i][$j][$k][$l] = "<a href='" . $mLink[$i][$j][$k][$l] . "'" . $mClick[$i][$j][$k][$l] . ">" . $mTitle[$i][$j][$k][$l] . "</a>";
				$mAnchor[$i][$j][$k][$l] = "href='" . $mLink[$i][$j][$k][$l] . "'" . $mClick[$i][$j][$k][$l];

				if( ($i == $d1n && $j == 0) || ($i == $d1n && $j == $d2n && $k == 0) || ($i == $d1n && $j == $d2n && $k == $d3n && $l == 0) || ($i == $d1n && $j == $d2n && $k == $d3n && $l == $d4n) ){
					$mList[$i][$j][$k][$l] = "<li class='on'>" . $mMenu[$i][$j][$k][$l] . "</li>";
				}else{
					$mList[$i][$j][$k][$l] = "<li>" . $mMenu[$i][$j][$k][$l] . "</li>";
				}
				$loopSum++;
			}
		}
	}
}

//print_r($loopSum);
//print_r($mAll);
//print_r(count($mAll[2][1]));
//print_r(count($mAll));
//print_r($d1Max .'|'. $d2Max .'|'. $d3Max .'|'. $d4Max);

$d1menu = "";
$d2menu = "";
$d3menu = "";
$d4menu = "";

if($d1n!=0) $d1menu = $mTitle[$d1n][0][0][0];
if($d2n!=0) $d2menu = $mTitle[$d1n][$d2n][0][0];
if($d3n!=0) $d3menu = $mTitle[$d1n][$d2n][$d3n][0];
if($d4n!=0) $d4menu = $mTitle[$d1n][$d2n][$d3n][$d4n];

// title태그내용
$titleTag = $siteName;
if($d1menu && $d1menu!="") $titleTag = $titleTag . " - " . $d1menu;
if($d2menu && $d2menu!="") $titleTag = $titleTag . " - " . $d2menu;
if($d3menu && $d3menu!="") $titleTag = $titleTag . " - " . $d3menu;
if($d4menu && $d4menu!="") $titleTag = $titleTag . " - " . $d4menu;

// title, keywords, description
$titleTag = "";
$pageTitleTemp = "";
if($pageTitle && $pageTitle!=""){
	$pageTitleTemp = $pageTitle;
}else{
	if($d1menu && $d1menu!="") $pageTitle = $d1menu;
	if($d2menu && $d2menu!="") $pageTitle = $d2menu;
	if($d3menu && $d3menu!="") $pageTitle = $d3menu;
	if($d4menu && $d4menu!="") $pageTitle = $d4menu;
}
if($pageTitle!="")
	$titleTag = $pageTitle." | ".$siteName;
else
	$titleTag = $siteName;

$metaKeywords = "";
$metaKeywords = $siteName;
if($d1menu && $d1menu!="") $metaKeywords = $metaKeywords . ", " . $d1menu;
if($d2menu && $d2menu!="") $metaKeywords = $metaKeywords . ", " . $d2menu;
if($d3menu && $d3menu!="") $metaKeywords = $metaKeywords . ", " . $d3menu;
if($d4menu && $d4menu!="") $metaKeywords = $metaKeywords . ", " . $d4menu;
if($pageTitleTemp && $pageTitleTemp!="") $metaKeywords = $metaKeywords . ", " . $pageTitleTemp;


//현재위치
$locationLink = "<a href='" . $mLink[0][0][0][0] . "'" . $mClick[0][0][0][0] . " class='home' title='홈'>" . $mTitle[0][0][0][0] . "</a>";
if($d1menu && $d1menu!="") $locationLink = $locationLink . " <span>&gt;</span> " . $mMenu[$d1n][0][0][0];
if($d2menu && $d2menu!="") $locationLink = $locationLink . " <span>&gt;</span> " . $mMenu[$d1n][$d2n][0][0];
if($d3menu && $d3menu!="") $locationLink = $locationLink . " <span>&gt;</span> " . $mMenu[$d1n][$d2n][$d3n][0];
if($d4menu && $d4menu!="") $locationLink = $locationLink . " <span>&gt;</span> " . $mMenu[$d1n][$d2n][$d3n][$d4n];

// 현재위치 20161102~ 20201013. 20210507.
$locationLink = "<a " . $mAnchor[0][0][0][0] . " class='home' title='홈'><i class='ic1'></i><i class='t1'>" . $mTitle[0][0][0][0] . "</i></a>\n";
if($d1menu && $d1menu!=""){
	$locationLink = $locationLink . "<i class='sep'> / </i>" . "<a " . $mAnchor[$d1n][0][0][0] . "><i class='t1'>" . $mTitle[$d1n][0][0][0] . "</i><i class='ic1'></i></a>\n";
	//$locationLink = $locationLink . "<i class='sep'> | </i>" . "<a href='#lnb1d1' class='toggle' title='동일 레벨 메뉴보기'><i class='t1'>" . $mTitle[$d1n][0][0][0] . "</i><i class='ic1'></i></a>\n";
}
if($d2menu && $d2menu!=""){
	$locationLink = $locationLink . "<i class='sep'> / </i>" . "<a " . $mAnchor[$d1n][$d2n][0][0] . "><i class='t1'>" . $mTitle[$d1n][$d2n][0][0] . "</i><i class='ic1'></i></a>\n";
	//$locationLink = $locationLink . "<i class='sep'> | </i>" . "<a href='#lnb1d2' class='toggle' title='동일 레벨 메뉴보기'><i class='t1'>" . $mTitle[$d1n][$d2n][0][0] . "</i><i class='ic1'></i></a>\n";
}
if($d3menu && $d3menu!=""){
	$locationLink = $locationLink . "<i class='sep'> / </i>" . "<a " . $mAnchor[$d1n][$d2n][$d3n][0] . "><i class='t1'>" . $mTitle[$d1n][$d2n][$d3n][0] . "</i><i class='ic1'></i></a>\n";
	//$locationLink = $locationLink . "<i class='sep'> | </i>" . "<a href='#lnb1d3' class='toggle' title='동일 레벨 메뉴보기'><i class='t1'>" . $mTitle[$d1n][$d2n][$d3n][0] . "</i><i class='ic1'></i></a>\n";
}
if($d4menu && $d4menu!=""){
	$locationLink = $locationLink . "<i class='sep'> / </i>" . "<a " . $mAnchor[$d1n][$d2n][$d3n][$d4n] . "><i class='t1'>" . $mTitle[$d1n][$d2n][$d3n][$d4n] . "</i><i class='ic1'></i></a>\n";
	//$locationLink = $locationLink . "<i class='sep'> | </i>" . "<a href='#lnb1d4' class='toggle' title='동일 레벨 메뉴보기'><i class='t1'>" . $mTitle[$d1n][$d2n][$d3n][$d4n] . "</i><i class='ic1'></i></a>\n";
}
//$locationLink = $locationLink . "<i class='sep'> | </i>" . "\n";


// 본문제목이미지
$d1nn = ""; if($d1n<10) $d1nn="0" . $d1n; else $d1nn = $d1n;
$d2nn = ""; if($d2n<10) $d2nn="0" . $d2n; else $d2nn = $d2n;
$d3nn = ""; if($d3n<10) $d3nn="0" . $d3n; else $d3nn = $d3n;
$d4nn = ""; if($d4n<10) $d4nn="0" . $d4n; else $d4nn = $d4n;

$titleImgSrc = $sitePath . "/img/inc/h/h";
if($d1n!=0) $titleImgSrc = $titleImgSrc . $d1nn;
if($d2n!=0) $titleImgSrc = $titleImgSrc . "_" . $d2nn;
if($d3n!=0) $titleImgSrc = $titleImgSrc . "_" . $d3nn;
if($d4n!=0) $titleImgSrc = $titleImgSrc . "_" . $d4nn;
$titleImgSrc = $titleImgSrc . ".png";

$titleImgAlt="";
if($d4menu && $d4menu!="") $titleImgAlt = $d4menu;
else if ($d3menu && $d3menu!="") $titleImgAlt = $d3menu;
else if ($d2menu && $d2menu!="") $titleImgAlt = $d2menu;
else $titleImgAlt = $d1menu;

$titleImg = "";
$titleImg = "<img src='" . $titleImgSrc . "' alt='" . $titleImgAlt . "' />";


// body 태그 고유 CSS 클래스 ( RegExp 로 1~4차 순번 추출 용이 )
$bodyClass = "d";
$bodyClass = $bodyClass . $d1n;
$bodyClass = $bodyClass . " d" . $d1n . "_" . $d2n;
$bodyClass = $bodyClass . " d" . $d1n . "_" . $d2n . "_" . $d3n;
$bodyClass = $bodyClass . " d" . $d1n . "_" . $d2n . "_" . $d3n . "_" . $d4n;
?>