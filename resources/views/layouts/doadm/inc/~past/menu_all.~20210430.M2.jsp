<%@page language="java" contentType="text/html; charset=utf-8"%>
<%--
/**
 * Template
 * 20210427 | @m | 최초 등록
 * 20210430 | @m | 요구반영. 결함개선. 고도화.
 */
--%>
<%!
private String getInfo(String mAll, int index){
	if(mAll==null) return null;
	String[] info = mAll.split("\\|");
	if(index==0 && info.length>=1) return info[0];
	if(index==1 && info.length>=2) return info[1];
	if(index==2 && info.length>=3) return info[2];
	return "";
}%><%
/** Menu All v.~20151022~. 20200804. 20201110 | Designed by MoonYoungshin | Reviser |
 * 최종제목 | 사이트명 // ☆이행
 * 사이트명 | 1차 - 2차 - 3차 - 4차 - 최종제목
 */

String viewType = "all"; // desktop|mobile
String pageType = ""; // |popup
String siteName = "펜덕스 AI";
String siteLogoAlt = ""; // ★로고 이미지 텍스트 ))) 직접코딩
	//siteLogoAlt = siteName;
String siteKey = "default"; // ★사이트키 "portal"
String sitePath = "/_res/default"; // ★웹사이트 루트 폴더 "/_res/portal"
	//sitePath = "/default/_res/default"; // ★ContextPath
String commonPath = sitePath; // "/_res/portal" ★공통 경로. 포털과 다르면.. "/_res/_common"


int d1Max = 10; // 1차메뉴수+1
int d2Max = 40; // 2차메뉴수+1
int d3Max = 40; // 3차메뉴수+1
int d4Max = 40; // 4차메뉴수+1

String mAll[][][][] = new String[d1Max][d2Max][d3Max][d4Max];
String mTitle[][][][] = new String[d1Max][d2Max][d3Max][d4Max];
String mLink[][][][] = new String[d1Max][d2Max][d3Max][d4Max];
String mClick[][][][] = new String[d1Max][d2Max][d3Max][d4Max];
String mMenu[][][][] = new String[d1Max][d2Max][d3Max][d4Max];
String mAnchor[][][][] = new String[d1Max][d2Max][d3Max][d4Max];
String mList[][][][] = new String[d1Max][d2Max][d3Max][d4Max];

// 새창
String newWin = " onclick='window.open(this.href);return false;' target='_blank' rel='noopener' title='새 창'";
String popUp = " onclick='window.open(this.href,\"\",\"width=400,height=500,scrollbars=yes,left=20,top=20\");return false;' target='_blank' rel='noopener' title='새 창'";
// 서브메인
String subMain = " class='submain'";
// ex)
//mAll[1][1][0][0] = "메뉴명"+"|"+sitePath+"내부링크주소"+"|"+popUp;
//mAll[0][1][2][0] = "메뉴명"+"|"+"외부링크주소"+"|"+newWin;
//mAll[1][0][0][0] = "메뉴명"+"|"+sitePath+"서브메인링크주소"+"|"+subMain;


// 1depth
mAll[1][0][0][0] = "펜덕스 AI 란"+"|"+sitePath+"/html/sub/01_01.jsp";

mAll[1][1][0][0] = "펜덕스 AI 소개"+"|"+sitePath+"/html/sub/01_01.jsp";

// 1depth
mAll[2][0][0][0] = "AI 러닝"+"|"+sitePath+"/html/sub/02_01.jsp";

mAll[2][1][0][0] = "AI 러닝 소개"+"|"+sitePath+"/html/sub/02_01.jsp";

// 1depth
mAll[3][0][0][0] = "커뮤니티"+"|"+sitePath+"/html/sub/03_01.jsp";

mAll[3][1][0][0] = "공지사항"+"|"+sitePath+"/html/sub/03_01.jsp";
mAll[3][2][0][0] = "FAQ(1:1문의)"+"|"+sitePath+"/html/sub/03_02.jsp";
mAll[3][3][0][0] = "원장님 후기"+"|"+sitePath+"/html/sub/03_03.jsp";
mAll[3][4][0][0] = "신규상담신청"+"|"+sitePath+"/html/sub/03_04.jsp";

// 1depth
mAll[4][0][0][0] = "My 강의실"+"|"+sitePath+"/html/sub/04_01.jsp";

mAll[4][1][0][0] = "내 강의실"+"|"+sitePath+"/html/sub/04_01.jsp";
mAll[4][2][0][0] = "이전 강의실"+"|"+sitePath+"/html/sub/04_02.jsp";
mAll[4][3][0][0] = "이용방법"+"|"+sitePath+"/html/sub/04_03.jsp";
mAll[4][4][0][0] = "정보수정"+"|"+sitePath+"/html/sub/04_04.jsp";
mAll[4][4][0][0] = "정보수정"+"|"+sitePath+"/html/sub/04_04.jsp";

// 1depth
mAll[5][0][0][0] = "My 페이지"+"|"+sitePath+"/html/sub/05_01.jsp";

mAll[5][1][0][0] = "학습관리"+"|"+sitePath+"/html/sub/05_01.jsp";
mAll[5][2][0][0] = "신청하기"+"|"+sitePath+"/html/sub/05_02.jsp";
mAll[5][3][0][0] = "내결제"+"|"+sitePath+"/html/sub/05_03.jsp";
mAll[5][4][0][0] = "이용방법"+"|"+sitePath+"/html/sub/05_04.jsp";
mAll[5][5][0][0] = "정보수정"+"|"+sitePath+"/html/sub/05_05.jsp";

// 1depth
mAll[6][0][0][0] = "회원"+"|"+sitePath+"/html/sub/06_01.jsp";

mAll[6][1][0][0] = "로그인"+"|"+sitePath+"/html/sub/06_01.jsp";
mAll[6][2][0][0] = "회원가입"+"|"+sitePath+"/html/sub/06_02.jsp"+"|"+newWin;

// 1depth
mAll[7][0][0][0] = "기타안내"+"|"+sitePath+"/html/sub/sitemap.jsp";

mAll[7][1][0][0] = "사이트맵"+"|"+sitePath+"/html/sub/sitemap.jsp";
mAll[7][2][0][0] = "개인정보취급방침"+"|"+sitePath+"/html/sub/05_02.jsp"+"|"+newWin;
mAll[7][3][0][0] = "이메일무단수집거부"+"|"+sitePath+"/html/sub/05_03.jsp"+"|"+newWin;
mAll[7][4][0][0] = "이용약관"+"|"+sitePath+"/html/sub/05_04.jsp"+"|"+newWin;


// 공통메뉴
mAll[0][0][0][0] = "홈"+"|"+sitePath+"/"; // HOME

// [상]사이트 메뉴
mAll[0][1][1][0] = mAll[0][0][0][0]; // Home
mAll[0][1][2][0] = mAll[5][1][0][0]; // Sitemap
//mAll[0][1][3][0] = mAll[1][3][0][0]; // 내부링크
//mAll[0][1][3][0] = "외부링크"+"|"+"http://www.external.go.kr/"+"|"+newWin;

// [하]사이트 안내 및 정책
// [우]내부링크면여기서지정


int loopSum = 0; // 반복수 테스트

// 공용코드. 메뉴제목,링크주소,자바스크립트,title속성 할당, mList class='on' 활성
for(int i=0; i<d1Max; i++){
	if(mAll[i][0][0][0]==null) continue;
	for(int j=0; j<d2Max; j++){
		if(mAll[i][j][0][0]==null && i!=0) continue;
		for(int k=0; k<d3Max; k++){
			if(mAll[i][j][k][0]==null && i!=0) continue;
			for(int l=0; l<d4Max; l++){
				if(mAll[i][j][k][l]==null && i!=0) continue;
				mTitle[i][j][k][l] = getInfo(mAll[i][j][k][l],0);
				mLink[i][j][k][l] = getInfo(mAll[i][j][k][l],1);
				mClick[i][j][k][l] = getInfo(mAll[i][j][k][l],2);
				mMenu[i][j][k][l] = "<a href='" + mLink[i][j][k][l] + "'" + mClick[i][j][k][l] + ">" + mTitle[i][j][k][l] + "</a>";
				mAnchor[i][j][k][l] = "href='" + mLink[i][j][k][l] + "'" + mClick[i][j][k][l];
				if( (i==d1n && j==0) || (i==d1n && j==d2n && k==0) || (i==d1n && j==d2n && k==d3n && l==0) || (i==d1n && j==d2n && k==d3n && l==d4n) ){
					mList[i][j][k][l] = "<li class='on'><a href='" + mLink[i][j][k][l] + "'" + mClick[i][j][k][l] + ">" + mTitle[i][j][k][l] + "</a></li>";
				}else{
					mList[i][j][k][l] = "<li><a href='" + mLink[i][j][k][l] + "'" + mClick[i][j][k][l] + ">" + mTitle[i][j][k][l] + "</a></li>";
				}
				loopSum++;
			}
		}
	}
}

String d1menu = "";
String d2menu = "";
String d3menu = "";
String d4menu = "";

if(d1n!=0){ d1menu = mTitle[d1n][0][0][0]; }
if(d2n!=0){ d2menu = mTitle[d1n][d2n][0][0]; }
if(d3n!=0){ d3menu = mTitle[d1n][d2n][d3n][0]; }
if(d4n!=0){ d4menu = mTitle[d1n][d2n][d3n][d4n]; }

// title, keywords, description
String titleTag = "",
	pageTitleTemp = "";
if(pageTitle!=null && !pageTitle.equals("")){
	pageTitleTemp = pageTitle;
}else{
	if(d1menu!=null && !d1menu.equals("")) pageTitle = d1menu;
	if(d2menu!=null && !d2menu.equals("")) pageTitle = d2menu;
	if(d3menu!=null && !d3menu.equals("")) pageTitle = d3menu;
	if(d4menu!=null && !d4menu.equals("")) pageTitle = d4menu;
}
if(!pageTitle.equals(""))
	titleTag = pageTitle+" | "+siteName;
else
	titleTag = siteName;

String metaKeywords = "";
metaKeywords = siteName;
if(d1menu!=null && !d1menu.equals("")) metaKeywords = metaKeywords + ", " + d1menu;
if(d2menu!=null && !d2menu.equals("")) metaKeywords = metaKeywords + ", " + d2menu;
if(d3menu!=null && !d3menu.equals("")) metaKeywords = metaKeywords + ", " + d3menu;
if(d4menu!=null && !d4menu.equals("")) metaKeywords = metaKeywords + ", " + d4menu;
if(pageTitleTemp!=null && !pageTitleTemp.equals("")) metaKeywords = metaKeywords + ", " + pageTitleTemp;

// 현재위치 20161102~ 20200507. 20201013
String locationLink = "<a " + mAnchor[0][0][0][0] + " class='home' title='홈'><i class='ic1'></i><i class='t1'>" + mTitle[0][0][0][0] + "</i></a>\n";
if(d1menu!=null && !d1menu.equals("")){
	locationLink = locationLink + "<i class='sep'> / </i>" + "<a " + mAnchor[d1n][0][0][0] + "><i class='t1'>" + mTitle[d1n][0][0][0] + "</i><i class='ic1'></i></a>\n";
	//locationLink = locationLink + "<i class='sep'> | </i>" + "<a href='#lnb1d1' class='toggle' title='동일 레벨 메뉴보기'><i class='t1'>" + mTitle[d1n][0][0][0] + "</i><i class='ic1'></i></a>\n";
}
if(d2menu!=null && !d2menu.equals("")){
	locationLink = locationLink + "<i class='sep'> / </i>" + "<a " + mAnchor[d1n][d2n][0][0] + "><i class='t1'>" + mTitle[d1n][d2n][0][0] + "</i><i class='ic1'></i></a>\n";
	//locationLink = locationLink + "<i class='sep'> | </i>" + "<a href='#lnb1d2' class='toggle' title='동일 레벨 메뉴보기'><i class='t1'>" + mTitle[d1n][d2n][0][0] + "</i><i class='ic1'></i></a>\n";
}
if(d3menu!=null && !d3menu.equals("")){
	locationLink = locationLink + "<i class='sep'> / </i>" + "<a " + mAnchor[d1n][d2n][d3n][0] + "><i class='t1'>" + mTitle[d1n][d2n][d3n][0] + "</i><i class='ic1'></i></a>\n";
	//locationLink = locationLink + "<i class='sep'> | </i>" + "<a href='#lnb1d3' class='toggle' title='동일 레벨 메뉴보기'><i class='t1'>" + mTitle[d1n][d2n][d3n][0] + "</i><i class='ic1'></i></a>\n";
}
if(d4menu!=null && !d4menu.equals("")){
	locationLink = locationLink + "<i class='sep'> / </i>" + "<a " + mAnchor[d1n][d2n][d3n][d4n] + "><i class='t1'>" + mTitle[d1n][d2n][d3n][d4n] + "</i><i class='ic1'></i></a>\n";
	//locationLink = locationLink + "<i class='sep'> | </i>" + "<a href='#lnb1d4' class='toggle' title='동일 레벨 메뉴보기'><i class='t1'>" + mTitle[d1n][d2n][d3n][d4n] + "</i><i class='ic1'></i></a>\n";
}
//locationLink = locationLink + "<i class='sep'> | </i>" + "\n";

// 본문제목이미지
String d1nn=""; if(d1n<10) d1nn = "0" + d1n; else d1nn = Integer.toString(d1n);
String d2nn=""; if(d2n<10) d2nn = "0" + d2n; else d2nn = Integer.toString(d2n);
String d3nn=""; if(d3n<10) d3nn = "0" + d3n; else d3nn = Integer.toString(d3n);
String d4nn=""; if(d4n<10) d4nn = "0" + d4n; else d4nn = Integer.toString(d4n);

String titleImgSrc = sitePath + "/img/inc/h/h";
if(d1n!=0) titleImgSrc = titleImgSrc + d1nn;
if(d2n!=0) titleImgSrc = titleImgSrc + "_" + d2nn;
if(d3n!=0) titleImgSrc = titleImgSrc + "_" + d3nn;
if(d4n!=0) titleImgSrc = titleImgSrc + "_" + d4nn;
titleImgSrc = titleImgSrc + ".png";

String titleImgAlt = "";
//if(d4menu!=null && !d4menu.equals("")) titleImgAlt = d4menu;
if(d3menu!=null && !d3menu.equals("")) titleImgAlt = d3menu;
else if(d2menu!=null && !d2menu.equals("")) titleImgAlt = d2menu;
else titleImgAlt = d1menu;

String titleImg = "";
titleImg = "<img src='"+titleImgSrc+"' alt='"+titleImgAlt+"' />";

String bodyClass = "d";
// 20131210. RegExp 로 1~4차 순번 추출 용이
bodyClass = bodyClass + d1n;
bodyClass = bodyClass + " d" + d1n + "_" + d2n;
bodyClass = bodyClass + " d" + d1n + "_" + d2n + "_" + d3n;
bodyClass = bodyClass + " d" + d1n + "_" + d2n + "_" + d3n + "_" + d4n;
%>