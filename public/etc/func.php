<?
if ( !function_exists("errormsg") ) {
	function errormsg($error_string){
		echo"<script type='text/javascript'>
	        alert('$error_string')
	        history.go (-1)
		</script><noscript>javascript</noscript>";
	       	exit;
	}
}

if ( !function_exists("resultmsg") ) {
	function resultmsg($result_string){
		echo"<script type='text/javascript'>
	        alert('$result_string');
		</script><noscript>javascript</noscript>";
	}
}

if ( !function_exists("moveurl") ) {
	function moveurl($url){
		echo"<script type='text/javascript'>
	        location.href='$url';
		</script><noscript>javascript</noscript>";
	}
}

if ( !function_exists("isNull") ) {
	function isNull($data) {
        if ( is_string($data)) {
            if ( is_null(trim($data)) or trim($data) == "" ) return true;
            else return false;
        } else {
            if ( is_null($data) or $data == "" ) return true;
            else return false;            
        }
	}
}

if ( !function_exists("StringCut") ) {
	function StringCut($msg,$cut_size){ 
        $temp_str = mb_strimwidth($msg,0,$cut_size,'..','utf-8');
		return $temp_str; 
	} 
}

if ( !function_exists("input_text") ) {
	function input_text($body, $key) { // 1 : html 금지 2: html 제거

		$body = addslashes($body);
		//$body = eregi_replace("'","''",$body);		
	
		if ( $key == 1 ) $body = htmlspecialchars(chop($body));
        if ( $key == 2 ) $body = strip_tags($body);
	
	return $body;
	}
}

if ( !function_exists("output_text") ) {
	function output_text($body, $key) { // 1 : BR 테그 적용
	
		$body = stripslashes($body);
		//$body = eregi_replace("''","'",$body);
	
		if ( $key == 1 ) $body = nl2br($body);
	    if ( $key == 2 ) $body = htmlspecialchars($body);
        
	return $body;
	}
}

if ( !function_exists("create_file") ) {
function create_file($DIR, $BODY) { // 파일생성

	if ( $aaa = fopen($DIR,"w")) {

	fwrite($aaa,$BODY);

	fclose($aaa);
	} else errormsg("파일 쓰기 에러발생.. 대피바람!!!");

}
}

if ( !function_exists("create_file_read") ) {
function create_file_read($DIR) { // 파일읽기

	if ( file_exists($DIR) ) {

		if ( $aaa = fopen($DIR,"r")) {
		
		$body = fread($aaa, filesize($DIR));
		fclose($aaa);
		return $body;

		} else errormsg("파일 읽기 에러발생.. 대피바람!!!");

	}
}
}

function lottoNum($min, $max=100) 
{ 
    return (mt_rand(1, $max) <= $min); 
} 

if ( !function_exists("SuperAdminCheck") ) {
function SuperAdminCheck($pay) { // 슈퍼 관리자 권한 체크

	global $_SESSION;
	
	if ( $pay == 0 ) {
		if ( $_SESSION["session_id"] && $_SESSION["session_name"] && $_SESSION["session_style"] == 1 ) return true;
		else errormsg("슈퍼 관리자만이 접근 가능합니다.");
	} else if ( $pay == 1 ) {
		if ( $_SESSION["session_id"] && $_SESSION["session_name"] && $_SESSION["session_style"] == 1 ) return true;
		else return false;
	} else errormsg("잘못된 호출입니다.");

}
}

if ( !function_exists("SiteAdminCheck") ) {
function SiteAdminCheck($pay) { // 사이트 관리자 권한 체크

	global $_SESSION;
	
	if ( $pay == 0 ) {
		if ( $_SESSION["session_id"] && $_SESSION["session_name"] && $_SESSION["session_style"] == 2 ) return true;
		else errormsg("사이트 관리자만이 접근 가능합니다.");
	} else if ( $pay == 1 ) {
		if ( $_SESSION["session_id"] && $_SESSION["session_name"] && $_SESSION["session_style"] == 2 ) return true;
		else return false;
	} else errormsg("잘못된 호출입니다.");

}
}


if ( !function_exists("SSAdminCheck") ) {
function SSAdminCheck($pay) { // 슈퍼관리자&사이트 관리자 권한 체크

	global $_SESSION;
	
	if ( $pay == 0 ) {
		if ( $_SESSION["session_id"] && $_SESSION["session_name"] && $_SESSION["session_style"] <= 2 ) return true;
		else errormsg("슈퍼(사이트) 관리자만이 접근 가능합니다.");
	} else if ( $pay == 1 ) {
		if ( $_SESSION["session_id"] && $_SESSION["session_name"] && $_SESSION["session_style"] <= 2 ) return true;
		else return false;
	} else errormsg("잘못된 호출입니다.");

}
}

if ( !function_exists("isAdminCheck") ) {
function isAdminCheck($pay) { // 관리자 여부만 체크

	global $_SESSION;

	if ( $pay == 0 ) {
		if ( $_SESSION["session_id"] && $_SESSION["session_name"] && ( $_SESSION["session_style"] <= 5 )) return true;
		else { 
			resultmsg("관리자만이 접근 가능합니다.");
			echo '<script type="text/javascript">
						location.href="http://'.$_SERVER["SERVER_NAME"].'";
						</script>';
			exit;
		}
	} else if ( $pay == 1 ) {
		if ( $_SESSION["session_id"] && $_SESSION["session_name"] && ( $_SESSION["session_style"] <= 5 )) return true;
		else return false;
	} else errormsg("잘못된 호출입니다.");

}
}

if ( !function_exists("EtcAdminCheck") ) {
function EtcAdminCheck($pay) { // 일반 관리자 권한 체크

	global  $_SESSION, $id, $pid;

	if ( !isNull($pid) ) $fid = $pid;
	else $fid = $id;

	if ( isNull($fid) ) { // 프로그램 코드값이 없을때,
		
		if ( $pay == 0 ) SuperAdminCheck(0);
		else SuperAdminCheck(1);
		
	} else {

	if ( $pay == 0 ) {
		if (( $_SESSION["session_id"] && $_SESSION["session_name"] && IdAdminCheck($fid, $_SESSION["session_id"])) or ( SuperAdminCheck(1) == true )) return true;
		else {
			resultmsg("관리자만이 접근 가능합니다.");
			echo '<script type="text/javascript">
						location.href="http://'.$_SERVER["SERVER_NAME"].'";
						</script>';
			exit;
		}			

	} else if ( $pay == 1 ) {
		if ((( $_SESSION["session_id"] && $_SESSION["session_name"] && IdAdminCheck($fid, $_SESSION["session_id"])) or ( SuperAdminCheck(1) == true )) and IpButtonCheck(1)) return true;
		else return false;
	} else errormsg("잘못된 호출입니다.");

	}

}
}

if ( !function_exists("ClassAdminCheck") ) {
function ClassAdminCheck($pay) { // 실과 관리자 여부 체크

	global  $_COOKIE, $id, $pid, $sk_id, $kwa_id;

	if ( isNull($id) and !isNull($pid) ) $id = $pid;
	if ( isNull($kwa_id)) $kwa_id = $sk_id;
	
		if (( $_COOKIE["session_id"] && $_COOKIE["session_name"] && $_COOKIE["session_charge"] && (($_COOKIE["session_kwa_id"] == $kwa_id) and ( $_COOKIE["session_style"] == 3 ))) or ( SuperAdminCheck(1) == true )) return 1;
		else return 0;

}
}

if ( !function_exists("JikWonCheck") ) {
function JikWonCheck($pay) { // 직원 여부 체크

	global  $_COOKIE;

	if ( $pay == 1 ) {
	if ( (int)$_COOKIE["UI_Staff"] == 1 ) return true;
	else return false;
	} else {
	if ( (int)$_COOKIE["UI_Staff"] == 1 ) return true;
	else errormsg("직원만이 접근 가능합니다.");
}

}
}

if ( !function_exists("IdAdminCheck") ) {
	function IdAdminCheck($pay, $sid) { // 프로그램 권한 체크
		
		global $DBMY;

		$strSQL = "select link_source from t_programlink where link_target = '$pay'";
		$strQue = $DBMY -> sql_exec_etc($strSQL);
		$oTotal = count($strQue);
		$DBMY -> free_etc();

		$cnt = 0;
	
		for ( $i = 0; $i < $oTotal; $i++ ) {
			
			if ( $sid ==  $strQue[$i]["link_source"] ) {
				$cnt = 1;
				break;
			}
			
		}
		
		if ( $cnt == 0 ) return false;
		else return true;
	}
}

$IP_CHK_ARRAY = array ( // 관리자 버튼 IP 제한
	#210.104.250 대역에 18,20,22,24,26,28,34,36,38,40,42,44 (2006-02-24에 추가)

	"0" => "121.145.104.8",
	"1" => "118.38.252.169",
	"2" => "113.130.199.16",
    "3" => "220.119.64.139",
    "4" => "222.96.170.54",
    "5" => "211.202.187.186",
    "6" => $_SERVER['REMOTE_ADDR']

);

if ( !function_exists("IpButtonCheck") ) {
	function IpButtonCheck($pay) { // 관리자 버튼 IP 제한 펑션
		global $IP_CHK_ARRAY;
	
		$ip = $_SERVER["REMOTE_ADDR"];
		$a = 0;
		$b = 0;
	
		while ( $IP_CHK_ARRAY[$a] ) {
			if ( $ip == $IP_CHK_ARRAY[$a] ) {
				$b = 1;
				break;
			}
		$a++;
		}

		if ( $b == 0 and $pay == 0 ) {
	
			echo"<script>
						alert('접근 가능한 IP가 아닙니다');
						history.go(-1);
						</script>";
			exit;
	
		}
	
		if ( $b == 0 and $pay == 1 ) return false;
		
		if ( $b == 1 ) return true;
		return true;
	
	}
}

/*
$OrganCODE_CHK_ARRAY = array ( // 
	"5670352",
	"5670351",
	"5670350",
	"5670349",
	"5670348",
	"5670347",
	"5670346",
	"5670345",
	"5670344",
	"5670343",
	"5670342",
	"5670341",
	"5670340",
	"5670339",
	"5670338",
	"5670337",
	"5670336",
	"5670335",
	"5670334",
	"5670333",
	"5670332",
	"5670331",
	"5670330",
	"5670329",
	"5670328",
	"5670327",
	"5670326",
	"5670325",
	"5670324",
	"5670323",
	"5670322",
	"5670321",
	"5670320",
	"5670319",
	"5670318",
	"5670317",
	"5670316",
	"5670315"
);
*/
$OrganCODE_CHK_ARRAY_OLD = array ( // 
	"5670315",
	"5670316",
	"5670317",
	"5670402",
	"5670320",
	"5670321",
	"5670403",
	"5670404",
	"5670405",
	"5670406",
	"5670407",
	"5670408",
	"5670409",
	"5670410",
	"5670411",
	"5670412",
	"5670413",
	"5670414",
	"5670415",
	"5670416",
	"5670417",
	"5670418",
	"5670419",
	"5670420",
	"5670421",
	"5670332",
	"5670333",
	"5670334",
	"5670335",
	"5670336",
	"5670337",
	"5670338",
	"5670339",
	"5670340",
	"5670341",
	"5670342",
	"5670343",
	"5670344"
);



$OrganCODE_CHK_ARRAY = array ( // 
	"5670315",
"5670316",
"cwps30006",
"cwps30007",
"cwps30008",
"cwps30009",
"5670317",
"cwps30010",
"cwps30011",
"5670402",
"cwps30017",
"cwps30014",
"cwps30018",
"cwps30019",
"cwps30020",
"5670320",
"cwps30022",
"cwps30023",
"cwps30024",
"cwps30025",
"5670321",
"cwps30081",
"5670403",
"cwps30082",
"5670404",
"cwps30083",
"5670405",
"cwps30084",
"5670406",
"cwps30085",
"5670407",
"5670407",
"5670408",
"cwps30051",
"cwps30052",
"5670409",
"cwps30013",
"cwps30054",
"cwps30016",
"5670410",
"cwps30055",
"cwps30056",
"cwps30057",
"cwps30058",
"5670411",
"cwps30086",
"5670412",
"cwps30087",
"5670413",
"cwps30088",
"5670414",
"cwps30089",
"5670415",
"cwps30090",
"5670416",
"cwps30091",
"5670417",
"cwps30092",
"5670418",
"cwps30093",
"5670419",
"cwps30094",
"5670420",
"cwps30095",
"5670421",
"cwps30096",
"5670332",
"5670332",
"5670333",
"cwps30040",
"cwps30041",
"5670334",
"cwps30043",
"cwps30044",
"cwps30046",
"5670335",
"cwps30047",
"cwps30048",
"cwps30049",
"cwps30050",
"5670336",
"cwps30097",
"5670337",
"cwps30098",
"5670338",
"cwps30099",
"5670339",
"cwps30100",
"5670340",
"cwps30101",
"5670341",
"cwps30102",
"5670342",
"cwps30103",
"5670343",
"cwps30104",
"5670344",
"cwps30105",
"5670074" 
);

if ( !function_exists("OrganCodeCheck") ) {
	function OrganCodeCheck($ccode) { // 관리자 버튼 IP 제한 펑션
		global $OrganCODE_CHK_ARRAY;
	
		$a = 0;
		$b = 0;
	
		while ( $OrganCODE_CHK_ARRAY[$a] ) {
			if ( $ccode == $OrganCODE_CHK_ARRAY[$a] ) {
				$b = 1;
				break;
			}
		$a++;
		}

		if ( $b == 0 ){
			return false;
		}else{
			return true;
		}

	
	}
}



if ( !function_exists("LoginFilter") ) {
function LoginFilter($pay) {
	$String = str_replace(" ","",trim($pay));
	$String = str_replace(";","",$String);
	$String = str_replace("'","",$String);
	$String = str_replace("=","",$String);
	$String = str_replace("<","",$String);
	$String = str_replace(">","",$String);
	$String = str_replace("..","",$String);
	
	return $String;
}
}

if ( !function_exists("SearchFilter") ) {
function SearchFilter($pay) {
	$String = str_replace(";","",$pay);
	$String = str_replace("'","",$String);
	$String = str_replace("`","",$String);
	//$String = str_replace("=","",$String);
	$String = str_replace("<","",$String);
	$String = str_replace(">","",$String);
	$String = str_replace("(","",$String);
	$String = str_replace(")","",$String);
	$String = str_replace("\\","",$String);
	$String = str_replace("@","",$String);
	$String = str_replace("..","",$String);
	$String = str_replace("*","",$String);
	return $String;
}
}

if ( !function_exists("XssFilter") ) {
function XssFilter($pay) {

	$String = str_replace(";","",$pay);
	$String = str_replace("vbscript", "", $String);
	$String = str_replace("onmouseover", "", $String);
	$String = str_replace("onblur", "", $String);
	$String = str_replace("onfocus", "", $String);
	$String = str_replace("onload", "", $String);
	$String = str_replace("onselect", "", $String);
	$String = str_replace("onsubmit", "", $String);
	$String = str_replace("onunload", "", $String);
	$String = str_replace("onabort", "", $String);
	$String = str_replace("onerror", "", $String);
	$String = str_replace("onmouseout", "", $String);
	$String = str_replace("onreset", "", $String);
	$String = str_replace("ondragdrop", "", $String);
	$String = str_replace("onmousemove", "", $String);
	$String = str_replace("onmouseleave", "", $String);
	$String = str_replace("onmouseenter", "", $String);
	$String = str_replace("onmove", "", $String);
	$String = str_replace("alert", "", $String);
	$String = str_replace("onresize", "", $String);
	$String = str_replace("@import", "", $String);
	$String = str_replace("<script", "&lt;script", $String);
	$String = str_replace("</script", "&lt;/script", $String);
	$String = str_replace("<object", "&lt;object", $String);
	$String = str_replace("</object", "&lt;/object", $String);
	$String = str_replace("<applet", "&lt;applet", $String);
	$String = str_replace("</applet", "&lt;/applet", $String);
	$String = str_replace("<form", "&lt;form", $String);
	$String = str_replace("</form", "&lt;/form", $String);
//	$String = str_replace("<embed", "&lt;embed", $String);
//	$String = str_replace("</embed", "&lt;/embed", $String);
	$String = str_replace("<iframe", "&lt;iframe", $String);
	$String = str_replace("<frame", "&lt;frame", $String);
	$String = str_replace("<base", "&lt;base", $String);
	$String = str_replace("<body", "&lt;body", $String);
	$String = str_replace("<frameset", "&lt;frameset", $String);
	$String = str_replace("<html", "&lt;html", $String);
	$String = str_replace("</html", "&lt;/html", $String);
	$String = str_replace("<meta", "&lt;meta", $String);
	$String = str_replace("<input", "&lt;input", $String);
	//Result = replace(LCase(Result), "<style", "&lt;style", $String);
	//Result = replace(LCase(Result), "</style", "&lt;/style", $String);

	return $String;
}
}

// neo 메일 쿠키 생성값
//UI_UserID : 회원 아이디
//UI_UserName : 회원 이름
//UI_Birthday : 생년월일
//UI_Phone : 휴대폰번호
//UI_Address : 주소
//UI_Staff : 부서코드(시민일 경우 0값으로)
//UI_Regist : 주민등록번호(숫자13자리)를 md5로 변환

if ( !function_exists("MyMemberCheck") ) {

	function MyMemberCheck($pay) {
		global $_SESSION;

//		if ( !isNull($HTTP_COOKIE_VARS[SessionMemberID]) and !isNull($HTTP_COOKIE_VARS[SessionMemberNAME])) {
		if ( !isNull($_SESSION['SessionMemberID']) and !isNull($_SESSION['SessionMemberNickname'])) {
			
			return true;
			
		} else {
			if ( $pay == "0" ) {
				$returnURL_Querystring = "";

                echo "<script type='text/javascript'>
                        alert('로그인 후 이용해 주십시오.');
                        top.location.href='/sub/login.php';
                        </script>";

//				if(strlen($_SERVER["QUERY_STRING"])>0) $returnURL_Querystring = "?".$_SERVER["QUERY_STRING"];
//				echo"<script type='text/javascript'>
 //                       history.go(-1);";
//				echo "		</script>";
				exit;
//                        alert('로그인 후 이용해 주십시오');
//                        top.location.href='/login_proc/is_login.php?return_url=http://".$_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"].$returnURL_Querystring."'";                
				//						top.location.href='';
//						top.location.href='http://www.changwon.go.kr/07etc/login.jsp?return_url=http://".$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].$returnURL_Querystring."'";

			} else if ( $pay == '2' ) {
                        echo "<script type='text/javascript'>
                        alert('로그인 후 이용해 주십시오.');
                        window.close();
                        </script>";
                        exit;
            } else return false;
		}
	}

}

if ( !function_exists("MyMemberCheck_nachotv") ) {

    function MyMemberCheck_nachotv($pay) {
        global $_SESSION;

//        if ( !isNull($HTTP_COOKIE_VARS[SessionMemberID]) and !isNull($HTTP_COOKIE_VARS[SessionMemberNAME])) {
        if ( !isNull($_SESSION['SessionMemberID']) and !isNull($_SESSION['SessionMemberNickname']) and !isNull($_SESSION['Session_signKey']) ) {
            
            return true;
            
        } else {
            if ( $pay == "0" ) {
                $returnURL_Querystring = "";

                echo "<script type='text/javascript'>
                        alert('로그인 후 이용해 주십시오.');
                        top.location.href='/login.php';
                        </script>";

//                if(strlen($_SERVER["QUERY_STRING"])>0) $returnURL_Querystring = "?".$_SERVER["QUERY_STRING"];
//                echo"<script type='text/javascript'>
 //                       history.go(-1);";
//                echo "        </script>";
                exit;
//                        alert('로그인 후 이용해 주십시오');
//                        top.location.href='/login_proc/is_login.php?return_url=http://".$_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"].$returnURL_Querystring."'";                
                //                        top.location.href='';
//                        top.location.href='http://www.changwon.go.kr/07etc/login.jsp?return_url=http://".$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].$returnURL_Querystring."'";

            } else if ( $pay == '2' ) {
                        echo "<script type='text/javascript'>
                        alert('로그인 후 이용해 주십시오.');
                        window.close();
                        </script>";
                        exit;
            } else return false;
        }
    }

}

//print_r ($HTTP_COOKIE_VARS);

if ( !function_exists("MyMemberFireCheck") ) {

	function MyMemberFireCheck($pay) { //SessionMemberFireCode
		global $_SESSION;

//		if ( !isNull($HTTP_COOKIE_VARS[SessionMemberID]) and !isNull($HTTP_COOKIE_VARS[SessionMemberNAME])) {
		if ( !isNull($_SESSION['SessionMemberFireCode']) and OrganCodeCheck($_SESSION['SessionMemberFireCode'])) {
			return true;
			
		} else {

			if ( $pay == "0" ) {
				$returnURL_Querystring = "";
				if(strlen($_SERVER["QUERY_STRING"])>0) $returnURL_Querystring = "?".$_SERVER["QUERY_STRING"];
				echo"<script type='text/javascript'>/*<![CDATA[*/
						alert('소방공무원 전용 페이지입니다. 로그인 후 이용해 주십시오');
						top.location.href='/program/login_proc/is_login.php?return_url=http://".$_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"].$returnURL_Querystring."'
						/*]]>*/</script>";
				exit;
				//						top.location.href='';
//						top.location.href='http://www.changwon.go.kr/07etc/login.jsp?return_url=http://".$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].$returnURL_Querystring."'";

			} else return false;
		}
	}

}

////////// 썸네일을 만들 이미지를 불러옵니다.


if ( !function_exists("loadImage") ) {
function loadImage ($file_name) { 
    $file_ext=strtolower(substr(strrchr($file_name,"."), 1));
    switch ($file_ext) { 
        case "jpg": case "jpeg": 
            $image=@imagecreatefromjpeg($file_name); 
            break; 
        case "gif": 
            $image=@imagecreatefromgif($file_name); 
            break; 
        case "png": 
            $image=@imagecreatefrompng($file_name); 
            break; 
    } 
    if (!$image) {                
        $image=ImageCreate(150, 30); 
        $bgc=ImageColorAllocate($image, 255, 255, 255); 
        $tc=ImageColorAllocate($image, 0, 0, 0); 
        ImageFilledRectangle($image, 0, 0, 150, 30, $bgc); 
        ImageString($image, 1, 5, 5, "Error loading $file_name", $tc); 
    } 
    return $image; 
} 
}

////////// 썸네일을 만듭니다.

if ( !function_exists("thumbnail") ) {
function thumbnail ($file_path,$target_path,$width,$height,$quality) { 
    $size=getimagesize($file_path); //원본 이미지사이즈를 구한다.
    if ($size[0] > $size[1]) { $new_height=($size[1]*$height)/$size[0]; $new_width=$width; } // width가 클때 width=$width으로 지정 ,height값 비율에 맞게 구한다.
    if ($size[0] < $size[1]) { $new_width=($size[0]*$width)/$size[1]; $new_height=$height; } // height가 클때 heigth=$height으로 지정 ,width값 비율에 맞게 구한다.     
    if ($size[0] == $size[1]) { $new_width=$width; $new_height=$height; } // width,height 둘다같을때 지정한다.
    $src_image=loadImage($file_path); 
    $dst_image=imagecreatetruecolor($new_width,$new_height);  // 해상도 좋은 썸네일을 만든다. 
    imagecopyresampled($dst_image,$src_image,0,0,0,0,$new_width,$new_height,imagesx($src_image),imagesy($src_image)); 
    Imagejpeg($dst_image,$target_path,$quality);
//   return $dst_image; 
    Imagedestroy($dst_image);  // 메모리에서 이미지를 제거한다.
} 
}

//thumb-nail이미지 생성시(큰그림을 작게 하기) 
//예로 source.jpg 이미지로 200,150 크기의 thumb.jpg만들려면 
// 모양 그대로 jpg로 변환

if ( !function_exists("thumbnail_gandan") ) {
function thumbnail_gandan ( $file_path, $target_path, $width, $height) {
	$src=loadImage($file_path);
	$thumb=imagecreatetruecolor($width, $height); //넓이, 높이
	imagecopyresized($thumb,$src,0,0,0,0,$width,$height,imagesx($src),imagesy($src));
	imagejpeg($thumb,$target_path); 
	imagedestroy($thumb); 
	imagedestroy($src); 
}
}


if ( !function_exists("thumnail") ) {
function thumnail($file, $save_filename, $save_path, $max_width, $max_height)
{
       $img_info = getImageSize($file);
       if($img_info[2] == 1)
       {
              $src_img = ImageCreateFromGif($file);
              }elseif($img_info[2] == 2){
              $src_img = ImageCreateFromJPEG($file);
              }elseif($img_info[2] == 3){
              $src_img = ImageCreateFromPNG($file);
              }else{
              return 0;
       }
       $img_width = $img_info[0];
       $img_height = $img_info[1];

       if($img_width > $max_width || $img_height > $max_height)
       {
              if($img_width == $img_height)
              {
                     $dst_width = $max_width;
                     $dst_height = $max_height;
              }elseif($img_width > $img_height){
                     $dst_width = $max_width;
                     $dst_height = ceil(($max_width / $img_width) * $img_height);
              }else{
                     $dst_height = $max_height;
                     $dst_width = ceil(($max_height / $img_height) * $img_width);
              }
       }else{
              $dst_width = $img_width;
              $dst_height = $img_height;
       }
       if($dst_width < $max_width) $srcx = ceil(($max_width - $dst_width)/2); else $srcx = 0;
       if($dst_height < $max_height) $srcy = ceil(($max_height - $dst_height)/2); else $srcy = 0;

       if($img_info[2] == 1) 
       {
              $dst_img = imagecreate($max_width, $max_height);
       }else{
              $dst_img = imagecreatetruecolor($max_width, $max_height);
       }

       $bgc = ImageColorAllocate($dst_img, 255, 255, 255);
       ImageFilledRectangle($dst_img, 0, 0, $max_width, $max_height, $bgc); 
       ImageCopyResampled($dst_img, $src_img, $srcx, $srcy, 0, 0, $dst_width, $dst_height, ImageSX($src_img),ImageSY($src_img));

       if($img_info[2] == 1) 
       {
              ImageInterlace($dst_img);
              ImageGif($dst_img, $save_path.$save_filename);
       }elseif($img_info[2] == 2){
              ImageInterlace($dst_img);
              ImageJPEG($dst_img, $save_path.$save_filename);
       }elseif($img_info[2] == 3){
              ImagePNG($dst_img, $save_path.$save_filename);
       }
       ImageDestroy($dst_img);
       ImageDestroy($src_img);
}
}

if ( !function_exists("thumnail_temp") ) {
function thumnail_temp($file, $save_filename, $save_path, $thumb_width, $thumb_height)
{
		$thumb_quality = 100;
    $thumb = $file; 
    if (!file_exists($thumb)) 
    { 
     //   $file = $list[$i][file][0][path] .'/'. $list[$i][file][0][file]; 
        if (preg_match("/\.(jp[e]?g|gif|png)$/i", $file) && file_exists($file)) 
        { 
            $size = @getimagesize($file); 
            if ($size[2] == 1) 
                $src = imagecreatefromgif($file); 
            else if ($size[2] == 2) 
                $src = imagecreatefromjpeg($file); 
            else if ($size[2] == 3) 
                $src = imagecreatefrompng($file); 
            else 
                return false; 

            $rate = $thumb_width / $size[0]; 
            $height = (int)($size[1] * $rate); 

            if ($height < $thumb_height) 
                $dst = imagecreatetruecolor($thumb_width, $height); 
            else 
                $dst = imagecreatetruecolor($thumb_width, $thumb_height); 
            /*imagecopyresampled($dst, $src, 0, 0, 0, 0, $thumb_width, $height, $size[0], $size[1]); 
            imagejpeg($dst, $thumb_path.'/'.$list[$i][file][0][file], $thumb_quality); 
            chmod($thumb_path.'/'.$list[$i][file][0][file], 0606);*/

			imagecopyresampled($dst, $src, 0, 0, 0, 0, $thumb_width, $height, $size[0], $size[1]);
			imagejpeg($dst, $save_path.'/'.$save_filename, $thumb_quality);
			chmod($save_path.'/'.$save_filename, 0606);
		}
	}
}
}

if ( !function_exists("cvtIntext") ) {
function cvtIntext ( $body ) {
	$temp = ereg_replace("'","''",$body);
return $temp;
}
}

if ( !function_exists("cvtOuttext") ) {
function cvtOuttext ( $body ) {

return $temp;
}
}


//////////////// 필터링 관련

// 문자열을 hexcode로 바꿔주는 함수 

if ( !function_exists("asc_hex") ) {
function asc_hex($char) { 
$j = 0; $word_length=strlen($char); 
for($i = 0;$i<$word_length;$i++) { 
if($j == 0) { if(ord(substr($char,$i,1)) > 0xa1 && ord(substr($char,$i,1)) <= 0xfe) { 
$j = 1; $t_char = $t_char.bin2hex(substr($char,$i,1)); } 
else { $t_char = $t_char."00".bin2hex(substr($char,$i,1))." "; } 
} else { $t_char = $t_char.bin2hex(substr($char,$i,1))." "; $j = 0; } } 
return $t_char; } 
}

// 필터링 처리

if ( !function_exists("fil_ok") ) {
function fil_ok($fil_field, $chk_body) {

$fil = explode(";", $fil_field);

for($e=0;$e<count($fil);$e++) 
{ 
if(strchr($chk_body,$fil[$e])) 
{ 
      // 필터링에 걸렸을때 잘못된 체크는 아닌지 체크함 
      $check_pos=strpos($chk_body,$fil[$e]); 
               if($check_pos<5) $check_pos=5; 
      $check_filter2=substr($chk_body,$check_pos-5,strlen($fil[$e])+5); 
      if(eregi(asc_hex($fil[$e]),asc_hex($check_filter2))) { 
		  $select = "ok";
		  $filter_ok[] = $fil[$e];
	  }
		  
	}
} 

if ($select == "ok") {

	for($e=0;$e<count($filter_ok);$e++) {
		$fff .= $filter_ok[$e]." ";
	}
	echo"<script>
		alert('금지된단어 ( $fff )가 사용되었습니다.');
		history.go(-1);
		</script>";
	exit;
	}
}
}

if ( !function_exists("nobr") ) {
function nobr($data) {
	$data = str_replace("\r\n", "", $data); 
	$data = str_replace("\r", "", $data);
	$data = str_replace("\n", "", $data);
	
return $data;
}
}

if ( !function_exists("SilNameCheck") ) {
	
	function SilNameCheck($pay) {
		global $_SESSION;
//		if ( (!isNull($HTTP_COOKIE_VARS[Session_Ju]) and !isNull($HTTP_COOKIE_VARS[Session_Name]) and $HTTP_COOKIE_VARS[Session_Ok] == "OK") or ( MyMemberCheck(1) ) ) {
		if ( (!isNull($_SESSION["Session_Ju"]) and !isNull($_SESSION["Session_Name"]) and $_SESSION["Session_Ok"] == "OK") ) {
			return true;
			
		} else {
			if ( $pay == "0" ) {
				echo"<script type='text/javascript'>
						alert('실명확인 후 이용해 주십시오');
						top.location.href='/';
						</script>";
				exit;
			} else return false;
		}
	}
}	

if ( !function_exists("RobotCheck") ) {
function RobotCheck() {
	global $HTTP_SERVER_VARS, $_SESSION;
	
if(preg_match("/msie|firefox|safari|opera|gecko/", strtolower($HTTP_SERVER_VARS["HTTP_USER_AGENT"]))) 
{ 
//	echo strtolower($HTTP_SERVER_VARS["HTTP_USER_AGENT"]);
if ( EtcAdminCheck(1) ) {
	 echo "정상사용자";  
} else { errormsg("웹로봇으로 추정됩니다. 관리자에게 문의하세요.");
}
}

}
}


if ( !function_exists("remove_tags") ) { // < tag 뒤에 영문자일경우 필터링됨..
function remove_tags($str) { 
    $allowedTags = '';    // 허용할 테그 
    $stripAttrib = 'javascript:|onclick|ondblclick|onmousedown|onmouseup|onmouseover|'. 
                'onmousemove|onmouseout|onkeypress|onkeydown|onkeyup|onchange|onblur|onfocus';    // 제거할 속성 

    $str = preg_replace("/<(\/?)(?![\/a-z])([^>]*)>/i", "&lt;\\1\\2\\3&gt;", $str); 
    $str = strip_tags($str,$allowedTags); 

    return preg_replace("/<(.*)($stripAttrib)+([^>]*)>/i", "<\\1xx\\2xx\\3>", $str); 
} 
}

/*

if ( !function_exists("remove_tags") ) {
function remove_tags($str) {
	$subject = ereg_replace('<','＆lt;',$subject); 
	$subject = ereg_replace('>','＆lt;',$subject); 	
	
	return $str;
}
}
*/

// 모든 파라미터 값들 필터링

/*
$Query_S1 = explode("&",$_SERVER["QUERY_STRING"]);
	$Query_result = "";
for ( $i = 0; $i < count($Query_S1); $i++ ) {
	$Query_temp = explode("=",$Query_S1[$i]);
	${$Query_temp[0]} = SearchFilter(urldecode($Query_temp[1]));
	unset($Query_temp);
} 
*/

$SSLPage_CHK_ARRAY = array ( // 
	"/program/board/main/check_pub.php",
	"/program/board/main/delete.php",
	"/program/board/main/edit_sub.php",
	"/program/login_proc/is_login.php"
);

if ( !function_exists("SSLPageCheck") ) {
	function SSLPageCheck() { // 
		global $SSLPage_CHK_ARRAY;
	
		$REQUEST_HOST =  $_SERVER["SERVER_NAME"];
		switch($REQUEST_HOST){
			case "ms119.changwon.go.kr":
				//$SSL_Port = "446";
				$SSL_Port = "443";
				break;
			case "cw119.changwon.go.kr":
				//$SSL_Port = "447";
				$SSL_Port = "443";
				break;
			default :
				//$SSL_Port = "543";
				$SSL_Port = "443";
				break;
		}

		

		if (in_array($_SERVER["SCRIPT_NAME"], $SSLPage_CHK_ARRAY)) {
			if ($_SERVER["SERVER_PORT"] == "80" && $SSL_Port) $goPageUrl = "https://".$REQUEST_HOST.":".$SSL_Port.$_SERVER["REQUEST_URI"];
		}else{
			if ($_SERVER["SERVER_PORT"] != "80") $goPageUrl = "http://".$REQUEST_HOST.$_SERVER["REQUEST_URI"];
		}

		if($goPageUrl && false ) {
			echo"<script type='text/javascript'>/*<![CDATA[*/
					location.href='$goPageUrl';
				/*]]>*/</script>";
		}

	}
}

/***************************************************/
/* date, time */
/***************************************************/
// 날짜값 풀기 (yyyymmddhhiiss => timestamp)
function get_timestamp($date) {
	return mktime(substr($date,8,2),substr($date,10,2),substr($date,12,2),substr($date,4,2),substr($date,6,2),substr($date,0,4));
}

// 날짜값 풀기 (yyyymmddhhiiss => yyyy-mm-dd hh:ii:ss)
function get_dateformat($date, $locale='') {
	if(!empty($date)) {
		if($locale=='kr' || $locale=='ko') {
			return substr($date,0,4).'년 '.substr($date,4,2).'월 '.substr($date,6,2).'일 '.substr($date,8,2).'시 '.substr($date,10,2).'분 '.substr($date,12,2).'초';
		} else {
			return substr($date,0,4).'-'.substr($date,4,2).'-'.substr($date,6,2).' '.substr($date,8,2).':'.substr($date,10,2).':'.substr($date,12,2);
		}
	}
}

function base64url_decode($base64url)
{
$base64 = strtr($base64url, '-_ ', '+/+');
    $plainText = base64_decode($base64);
    return ($plainText);
}


function rand_code_2($nc, $a='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') {
          $l = strlen($a) - 1; $r = '';
          $nc = $nc - 1;
          while($nc-->0) $r .= $a{mt_rand(0,$l)};
          
          $b = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          
          $r = $b{mt_rand(0,15)}.$r;
             
          return $r;
 }
 
 // 확장자 체크 ( o : true/false 1 : 확장자리턴 )
 function checkFileExt($fileName, $str1, $str2)
{
    $fileName = strtolower($fileName);
    $str_temp = pathinfo($fileName);
    $temp_file = $str_temp['extension'];

    if ( $str2 == 0 ) {
        $temp_str = 0;
        foreach($str1 as $key => $value)
        {
               if ( trim($value) == $temp_file ) {
                    $temp_str = 1;
                    break;
               }
        }
        return $temp_str;
    } else {
        return $temp_file;
    }
    
}

 function checkFileName($fileName)
{
    $str_temp = pathinfo($fileName);
    $temp_file = $str_temp['filename'];

    return $temp_file;
    
}

//--------------------- get jquery serialized values
function get_serialized($args) {
	if(is_array($args) || is_object($args)) {
		foreach($args as $i=>$data) { 
			if(is_array($data)) {
				$_args->$data['name'] = $data['value']; 
			}
			elseif(is_object($data)) {
				$_args->$data->name = $data->value; 
			}
		}
		return $_args;
	}
	else {
		return false;
	}
}

function memberinfo($str='') {
	global $DBMY, $_SESSION;
    
	if ( !MyMemberCheck(1) ) return false;
    if ( isNull($str) ) $SMID = $_SESSION['SessionMemberID'];
    else $SMID = $str;

    // 기본 정보
    $strSQL = "select * from _member a inner join _member_extension b on a.member_id = b.member_id inner join _member_pay c on a.member_id = c.member_id where a.member_id = '".$SMID."' ";
    $DBMY->sql($strSQL);
    $DBMY->fetch_row();
    $result->member_idx = $DBMY->f('idx');
    $result->user_name = $DBMY->f('user_name');
    $result->nick_name = $DBMY->f('nick_name');
    $result->level = $DBMY->f('level');
    $result->register_date = date('Y.m.d H:i', $DBMY->f('register_date'));
    $result->last_connect = $DBMY->f('last_connect');
    $result->cash = $DBMY->f('cash');
    $result->point = $DBMY->f('point');
    $result->game_point = $DBMY->f('game_point');    
    $result->profil_img = $DBMY->f('profil_img');    
    $result->profil_img_src = !isNull($DBMY->f('profil_img')) ? 'thumb_150_'.$DBMY->f('profil_img') : '';    
    $result->allow_ip = $DBMY->f('allow_ip');    
    $result->memo = $DBMY->f('memo');    
    $result->chat = $DBMY->f('chat');    
    $result->nick = $DBMY->f('nick');    
    $result->honey = $DBMY->f('honey');    
    $result->todaytalk = $DBMY->f('todaytalk');    
    $result->profilimg = $DBMY->f('profilimg');    
    $result->new_memo = $DBMY->f('new_memo');
    $result->game_cnt = $DBMY->f('game1_cnt') + $DBMY->f('game2_cnt') + $DBMY->f('game3_cnt') + $DBMY->f('game4_cnt') + $DBMY->f('game5_cnt');
    $result->status = $DBMY->f('status');    
    $DBMY->free();
	
    //  today talk
    $strSQL = "select * from _member_todaytalk where member_id='".$SMID."' and status='active' order by idx desc limit 0,1";
    $DBMY->sql($strSQL);
    $DBMY->fetch_row();
    $result->content = output_text($DBMY->f('content'),0);
    $DBMY->free();

    //  attand
    $strSQL = "select count(idx) from t_attend where member_id='".$SMID."' and adate = '".date('Y-m-d')."' ";
    $DBMY->sql($strSQL);
    $DBMY->fetch_row();
    $result->todayattend = $DBMY->f(0);
    $DBMY->free();

	// bestuser
    $strSQL = "select count(idx) from _best_member where member_id='".$SMID."' ";
    $DBMY->sql($strSQL);
    $DBMY->fetch_row();
    if ( $DBMY->f(0) > 0 ) $result->isBest = "Y";
	else $result->isBest = "N";
    $DBMY->free();
        
	return $result;	
}

function rand_code($nc, $a='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') {
          $l = strlen($a) - 1; $r = '';
          while($nc-->0) $r .= $a{mt_rand(0,$l)};
          
          $b = 'abcdefghijklmnopqrstuvwxyz';
          
          $r = $b{mt_rand(0,15)}.$r;
             
          return $r;
 }
 
 //메세지 출력

function alert($msg)
{
    //$msg=iconv('utf-8','euc-kr',$msg);
    echo '<script>alert(\''.$msg.'\');</script>';
}

function alertExit($msg)
{
    echo '<script>alert(\''.$msg.'\');</script>';
    exit;
}

//에러메세지 출력

function errMsg($msg)
{
    //$msg=iconv('utf-8','euc-kr',$msg);
    echo '<script>alert(\''.$msg.'\');history.back();</script>';
    exit;
}

//그냥출력
function echoExit($msg)
{
    echo $msg;
    exit;
}

function alertGo($msg,$url=0,$target='self',$close=0)
{
    //$msg=iconv('utf-8','euc-kr',$msg);
    echo '<script>';
    if($msg) echo 'alert(\''.$msg.'\');';
    if($url) echo 'window.'.$target.'.location.replace(\''.$url.'\');';
    if($close) echo 'self.close();';
    echo '</script>';
    exit;
}

function popupReload($msg)
{
    echo '<script>';
    if($msg) echo 'alert(\''.$msg.'\');';
    echo 'opener.location.reload();';
    echo 'self.close();';
    echo '</script>';
    exit;
}
function Reload($msg,$Url)
{
    echo "<script>";
    if($msg) echo "alert('".$msg."');";
    echo "location.href='".$Url."'";
    echo "</script>";
    exit;
}
function selfReload($msg)
{
    echo "<script>";
    if($msg) echo "alert('".$msg."');";
    echo "location.reload()";
    echo "</script>";
    exit;
}

function parentReload($msg,$close=0)
{
    echo '<script>';
    if($msg) echo 'alert(\''.$msg.'\');';
    echo 'parent.location.reload();';
    if($close) echo 'self.close();';
    echo '</script>';
    exit;
}

function openerparentReload($msg,$close=0)
{
    echo '<script>';
    if($msg) echo 'alert(\''.$msg.'\');';
    echo 'opener.parent.location.reload();';
    if($close) echo 'self.close();';
    echo '</script>';
    exit;
}

function parentopenerReload($msg,$close=0)
{
    echo '<script>';
    if($msg) echo 'alert(\''.$msg.'\');';
    echo 'parent.opener.location.reload();';
    if($close) echo 'parent.self.close();';
    echo '</script>';
    exit;
}

function alertClose($msg,$target='self')
{
    echo '<script>';
    if($msg) echo 'alert(\''.$msg.'\');';
    echo $target.'.close();';
    echo '</script>';
    exit;
}

function confirmGo($msg,$url,$target='self',$back=0,$close=0)
{
    echo '<script>';
    echo 'if(confirm(\''.$msg.'\')) window.'.$target.'.location.replace(\''.$url.'\');';
    if($back) echo 'else history.back();';
    else if($close) echo 'close();';
    else echo 'else return;';
    echo '</script>';
    exit;
}

function confirmUrlGo($msg,$ok_url,$no_url,$target='self',$close=0)
{
    echo '<script>';
    echo 'if(confirm(\''.$msg.'\')) window.'.$target.'.location.replace(\''.$ok_url.'\');';
    echo 'else window.'.$target.'.location.replace(\''.$no_url.'\');';
    if($close) echo 'close();';
    echo '</script>';
    exit;
}

function winOpen($url,$width,$height,$scroll=0)
{
    echo '<script>';
    echo 'window.open(\''.$url.'\',\'\',\'width='.$width.',height='.$height.',scrollbars='.$scroll.'\');';
    echo '</script>';
    exit;
}

# POST Request
function post_request($url, $data) {

        // Convert the data array into URL Parameters like a=b&foo=bar etc.
        $data = http_build_query($data);

        // parse the given URL
        $url = parse_url($url);


        if ($url['scheme'] != 'http') {
                return "Error:Only HTTP request are supported!";
        }

        // extract host and path:

        $host = $url['host'];
        $path = $url['path'];
        $res = '';

        // open a socket connection on port 80 - timeout: 300 sec
        if ($fp = fsockopen($host, 80, $errno, $errstr, 300)) {
                $reqBody = $data;
                $reqHeader = "POST $path HTTP/1.1\r\n" . "Host: $host\r\n";
                $reqHeader .= "Content-type: application/x-www-form-urlencoded\r\n"
                . "Content-length: " . strlen($reqBody) . "\r\n"
                . "Connection: close\r\n\r\n";

                /* send request */
                fwrite($fp, $reqHeader);
                fwrite($fp, $reqBody);

                while(!feof($fp)) {
                        $res .= fgets($fp, 1024);
                }

                fclose($fp);

        } else {
                return "Error:Cannot Connect!";
        }


        // split the result header from the content

        $result = explode("\r\n\r\n", $res, 2);

        $header = isset($result[0]) ? $result[0] : '';
        $content = isset($result[1]) ? $result[1] : '';

		$args -> org_value = $res;
		$args -> content = $content;

        return $args;

}

function is_mobile_browsers() { // 모바일 브라우져 여부 체크
$useragent=$_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) return true;
    else return false;
}

function insertLog ($siteId, $pageId,  $memberId='', $price='', $introId='') {
    global $DBMY, $_SESSION;
    
    if ( isNull($siteId) ) return;
    
    $joinCnt = 0;    
    
    $page_array = array("view","visit","join","join_succee","join_succee_temp","join_succee_commit");            
    if ( in_array($pageId, $page_array) ) { 
        
        if ( is_mobile_browsers() ) { // 모바일 경우 c class 로 차단
            
            $user_remote_ip = $_SERVER["REMOTE_ADDR"];
            $user_remote_ip_temp1 = explode(".", $user_remote_ip);
            $user_remote_ip_temp2 = array_pop($user_remote_ip_temp1);
            $user_remote_ip_cclass = implode(".", $user_remote_ip_temp1);
            
            $user_ip_class = $user_remote_ip_cclass.".";
            
            //$where_deny_ipaddr = " where register_host like '".$user_ip_class."%' ";
            $where_deny_ipaddr = " where register_host='".$_SERVER['REMOTE_ADDR']."' ";
        
        } else {
            
            $where_deny_ipaddr = " where register_host='".$_SERVER['REMOTE_ADDR']."' ";
            
        }

        $strSQL = "select count(*) from _member ".$where_deny_ipaddr;
        $DBMY->sql($strSQL);
        $DBMY->fetch_row();
        $joinCnt = $DBMY->f(0);
        $DBMY->free();

        if ( $joinCnt <= 0 ) {
           // $where_partner = " and partner_id not in ('babfile') ";
           if ( $pageId == "join_succee_commit" ) {
                $where_partner = " and status = 'active' ";
           }
            $strSQL = "select count(*) from _partner_member ".$where_deny_ipaddr." ".$where_partner;
            $DBMY->sql($strSQL);
            $DBMY->fetch_row();
            $joinCnt = $DBMY->f(0);
            $DBMY->free();      
        }  
    }

//$joinCnt = 0;
//resultmsg($_SERVER['REMOTE_ADDR']);
        $ip = $_SERVER["REMOTE_ADDR"];
        $user_agent = $_SERVER["HTTP_USER_AGENT"];
        $referer = $_SERVER["HTTP_REFERER"];
        $user_agent = addslashes($user_agent);

        $dim_user_agent = explode(";", $user_agent);

        if ( count($dim_user_agent) > 1 ) {
            $brow_user_agent = $dim_user_agent[1];
            $os_user_agent = $dim_user_agent[2];
            $os_user_agent = str_replace(")", "", $os_user_agent);
        } else {
            $brow_user_agent = "";
            $os_user_agent = "";
        }
        
        if ( $joinCnt <= 0 && $pageId == 'view' ) {
            $strSQL = "select count(*) from _accesslog_partner where pageid='view' and stat_ip='".$_SERVER['REMOTE_ADDR']."' and siteid = '".$siteId."' ";
            $DBMY->sql($strSQL);
            $DBMY->fetch_row();
            $joinCnt = $DBMY->f(0);
            $DBMY->free();
        }

        if ( $joinCnt <= 0 && $pageId == 'visit' ) {
            $strSQL = "select count(*) from _accesslog_partner where pageid='visit' and stat_ip='".$_SERVER['REMOTE_ADDR']."' and siteid = '".$siteId."' ";
            $DBMY->sql($strSQL);
            $DBMY->fetch_row();
            $joinCnt = $DBMY->f(0);
            $DBMY->free();
        }
                
     //   if ( trim($brow_user_agent) != 'Googlebot/2.1' ) {   
        $strSQL = "insert into _accesslog_partner (stat_ip, stat_date, stat_user_agent, stat_referer, stat_browser, stat_os,siteid,pageid, deviceid, introid, member_id) values ('".$ip."', now(), '[".apache_note("GEOIP_COUNTRY_CODE")."||".apache_note("GEOIP_COUNTRY_NAME")."]".$user_agent."','".$referer."','".$brow_user_agent."','".$os_user_agent."','".$siteId."','".$pageId."','".$oDevice."','".$introId."','".$memberId."')";
        $DBMY->sql($strSQL);
        $DBMY->free();


    if ( $joinCnt <= 0  ) {   // 동일 IP일 경우 카운트 노~
    
    // 특정파트너일 경우 패널티
    if ( $siteId == 'babfile__' ) {
        if ( $pageId == 'account' ) $siteId = "babfile0";
        else if( lottoNum(60,100) ) $siteId = "babfile0";
    }
    
    if ( is_mobile_browsers() ) $oDevice = 'mobile';
    else $oDevice = 'web';
    
    $cookie_id = $siteId.$pageId;
//  접속 로그

if (!preg_match("/googlebot|bingbot|msnbot/", strtolower($_SERVER["HTTP_USER_AGENT"]))) { // 웹로봇 제외 

$siteinfo['domain_cookie'] = ".bjhotnews.com";
    # 카운트 제어
//    if(trim($_COOKIE[$cookie_id]) != $_SERVER['REMOTE_ADDR']){
        #쿠키적용

        //setcookie($cookie_id,$_SERVER['REMOTE_ADDR'],mktime('23', '59', '59', date('m'), date('d'), date('Y')),"/",$siteinfo['domain_cookie']);
        $arr_ret = array();
        
        #접속경로기록
        //if($chkrefer == 1) $dbcon->insertSet('_log_visit',"referer='".$_SERVER['HTTP_REFERER']."',ip='".$_SERVER['REMOTE_ADDR']."',regdate=unix_timestamp()");
        #종합카운트
        /*
        $where = "where cdate='".date("Y-m-d H")."'";
        if($dbcon->cnt('_log_count',$where,"count(idx)") > 0) $dbcon->update('_log_count',$where,"visit=visit+1");
        else $dbcon->insertSet('_log_count',"cdate='".date("Y-m-d H")."', visit=visit+1");
        */
        

        
        
        $where_count = "where cdate='".date("Y-m-d H")."' and siteid='".$siteId."' ";
        $strSQL = "select count(idx) from _log_partner_count ".$where_count;
        $DBMY->sql($strSQL);
        $DBMY->fetch_row();
        $oCnt1 = $DBMY->f(0);
        $DBMY->free();
        
        switch($pageId) {
            case "view" :
                $fname = "view";
                $fname2 = "view";
                $fname3 = "view";
                break;
            case "visit" :
                $fname = "visit";
                $fname2 = "click";
                $fname3 = "click";
                break;
            case "join" :
                $fname = "join_visit";
                $fname2 = "";
                $fname3 = "";
                break;
            case "join_succee" :
                $fname = "member";
                $fname2 = "join";
                $fname3 = "count";
                break;
            case "join_succee_temp" :
                $fname = "member_temp";
                $fname2 = "join";
                $fname3 = "count";
                break;                            
           case "join_succee_commit" :
                $fname = "member_commit";
                $fname2 = "";
                $fname3 = "";
                break;                            
            case "account" :
                $fname = "account";
                $fname2 = "pay";
                $fname3 = "pay";
                break;
            case "secede" :
                $fname = "secede";
                $fname2 = "";
                $fname3 = "";
                break;
            default :
                $fname = "";
                $fname2 = "";
                $fname3 = "";
                break;
                                
        }
      
      if ( !isNull($fname) ) {  
        if ( $pageId == 'account' ) {
            if($oCnt1 > 0) $strSQL = "update _log_partner_count set account=account+1, accountp=accountp+".$price." ".$where_count;
            else $strSQL = "insert into _log_partner_count set account=1, accountp=".$price.", siteid='".$siteId."', cdate='".date("Y-m-d H")."' ";
            $DBMY->sql($strSQL);
            $DBMY->free();       
        } else {
            
            $page_array2 = array("join_succee_commit"); // 파트너 인증률 패널티
            if ( in_array($pageId, $page_array2) ) { 
                
                // if ( $siteId == 'ljc205' ) $oPenalty_commit_value = 20;
                // else $oPenalty_commit_value = 0;
                /*
                $strSQL = "select (select penalty from partner_penalty where idx=a.penalty_join_pc ) as pt_join_pc,
                (select penalty from partner_penalty where idx=a.penalty_join_mobile ) as pt_join_mo 
                 from partner_member a where id='".$siteId."' ";
                 $DBMY->sql($strSQL);
                 $DBMY->fetch_row();
                 $oPtJoinPC = round($DBMY->f('pt_join_pc'));
                 $oPtJoinMO = round($DBMY->f('pt_join_mo'));
                 $DBMY->free();
                */
                $oPenalty_commit_value = 0;
                if( lottoNum($oPenalty_commit_value,100) ) { // 패널티 적용
                } else {   
                    if($oCnt1 > 0) $strSQL = "update _log_partner_count set ".$fname."=".$fname."+1 ".$where_count;
                    else $strSQL = "insert into _log_partner_count set ".$fname."=1, siteid='".$siteId."', cdate='".date("Y-m-d H")."' ";
                    $DBMY->sql($strSQL);
                    $DBMY->free();                   
                     
               } 
            } else {
                
                    if($oCnt1 > 0) $strSQL = "update _log_partner_count set ".$fname."=".$fname."+1 ".$where_count;
                    else $strSQL = "insert into _log_partner_count set ".$fname."=1, siteid='".$siteId."', cdate='".date("Y-m-d H")."' ";
                    $DBMY->sql($strSQL);
                    $DBMY->free();
                    
            }
        }
      }
 
                
}

$oAccount_cnt = 0;
if ( $pageId == 'account' ) { // 재결제 관련 처리 2회 까지만 로그에 쌓임
    $strSQL = "select count(*) from _account_nachotv where userid='".$memberId."' and status='Y' ";
    $DBMY->sql($strSQL);
    $DBMY->fetch_row();
    $oAccount_cnt = isNull($DBMY->f(0)) ? 0 : $DBMY->f(0);
    $DBMY->free();
}

// 파트너사이트쪽 작업
if ( !isNull($fname2) && $oAccount_cnt < 3 ) {
    
$strSQL = "select * from partner_member where id='".$siteId."' ";
$DBMY->sql($strSQL);
$DBMY->fetch_row();
$oPartnerIdx = $DBMY->f('idx');
$oPenalty_join_pc = $DBMY->f('penalty_join_pc');
$oPenalty_join_mobile = $DBMY->f('penalty_join_mobile');
$oPenalty_click_pc = $DBMY->f('penalty_click_pc');
$oPenalty_click_mobile = $DBMY->f('penalty_click_mobile');
$oPenalty_pay_pc = $DBMY->f('penalty_pay_pc');
$oPenalty_pay_mobile = $DBMY->f('penalty_pay_mobile');
$oLogin_time = $DBMY->f('login_time');

$oCo_once_pc = $DBMY->f('pc_one');
$oCo_once_mobile = $DBMY->f('mobile_one');

$DBMY->free();

$count = 1;
$penalty_sql = '';

$temp_device = ($oDevice=='mobile') ? 'mobile' : 'pc';
$temp_fname2 = 'oPenalty_'.$fname2.'_'.$temp_device;
$oPenaltyIdx = ${$temp_fname2};

if ( $oPenaltyIdx > 0 ) {
    $strSQL = "select idx, penalty from partner_penalty where idx='".$oPenaltyIdx."' ";
    $DBMY->sql($strSQL);
    $DBMY->fetch_row();
    $oPenalty_idx = $DBMY->f(0);
    $oPenalty_value = $DBMY->f(1);
    $DBMY->free();

    $penalty_sql = " , click_".$temp_device."_penalty = '".$oPenalty_value."' , click_".$temp_device."_penalty_idx = ".$oPenalty_idx;

   // if( strtotime(date('Y-m-d H:i:s')) - strtotime($oLogin_time) > 10*60 ){ 로그인시간 제한  주석처리
        if($oPenalty_value>0){
            if( lottoNum($oPenalty_value,100) ){
                $count = 1;

                $strSQL = "select * from partner_member where idx = '".mt_rand(10,12)."'";
               // $strSQL = "select * from partner_member where idx = 10";
                $DBMY->sql($strSQL);
                $DBMY->fetch_row();
                $oPartnerIdx = $DBMY->f('idx');
                $oPenalty_join_pc = $DBMY->f('penalty_join_pc');
                $oPenalty_join_mobile = $DBMY->f('penalty_join_mobile');
                $oPenalty_click_pc = $DBMY->f('penalty_click_pc');
                $oPenalty_click_mobile = $DBMY->f('penalty_click_mobile');
                $oPenalty_pay_pc = $DBMY->f('penalty_pay_pc');
                $oPenalty_pay_mobile = $DBMY->f('penalty_pay_mobile');
                $oLogin_time = $DBMY->f('login_time');
                
                $oCo_once_pc = $DBMY->f('pc_one');
                $oCo_once_mobile = $DBMY->f('mobile_one');
                
                $DBMY->free();              
                
                    $page_array4 = array("join"); // 
                    if ( in_array($fname2, $page_array4) ) {                // 파트너 세션 변경
                        $_SESSION['PARTNER_ID']  = $siteId."_P"; 
                    }
                  
            }
        }
   // }    
}

    if ( !isNull($oPartnerIdx) ) {

        
        $add_sql = ' , '.$fname2.'_total_count = '.$count.' , '.$fname2.'_'.($oDevice=='mobile'?'mobile':'pc').'_count = '.$count;
        $add_up_sql = ' '.$fname2.'_total_count = '.$fname2.'_total_count + '.$count.'  , '.$fname2.'_'.($oDevice=='mobile'?'mobile':'pc').'_count = '.$fname2.'_'.($oDevice=='mobile'?'mobile':'pc').'_count + '.$count;
        
        if ( $fname2 == 'join' ) { // 퍼미션 지급 
        
            $oComm_value_temp = 'oCo_once_'.$temp_device;
            $oComm_value = ${$oComm_value_temp};

            $comm_add_sql = ",  commission = ".$oComm_value.", commission_".$temp_device." = ".$oComm_value." ";
            $comm_up_sql = ",  commission = commission + ".$oComm_value.", commission_".$temp_device." = commission_".$temp_device." + ".$oComm_value." ";    
            $comm_member_sql = ", total_commission = total_commission + ".$oComm_value.", ".$temp_device."_commission = ".$temp_device."_commission + ".$oComm_value." ";
                 
        } else {
            $comm_add_sql = '';
            $comm_up_sql = '';
        }

        if ( $oAccount_cnt > 0 && $fname2 == 'pay' ) {
            $add_repay_sql = ", pay_total_recount =1 ";
            $up_repay_sql = ", pay_total_recount = pay_total_recount + 1 ";
        } else {
            $up_repay_sql = "";
            $add_reapy_sql = "";
        }
        
        $strSQL = "INSERT INTO partner_show SET part_idx = '".$oPartnerIdx."' , regtime = '".date("Y-m-d H:00:00")."' ".$add_sql.$penalty_sql.$comm_add_sql.$add_repay_sql." , date_y = '".date('Y')."', date_m = '".date('m')."', date_d = '".date('d')."', date_h = '".date('H')."' ON DUPLICATE KEY UPDATE ".$add_up_sql.$comm_up_sql.$up_repay_sql;
        $DBMY->sql($strSQL);
        $DBMY->free();

        // 종합로그 
        $strSQL = "INSERT INTO partner_show SET part_idx = '0' , regtime = '".date("Y-m-d H:00:00")."' ".$add_sql.$comm_add_sql.$add_repay_sql." , date_y = '".date('Y')."', date_m = '".date('m')."', date_d = '".date('d')."', date_h = '".date('H')."' ON DUPLICATE KEY UPDATE ".$add_up_sql.$comm_up_sql.$up_repay_sql;
        $DBMY->sql($strSQL);
        $DBMY->free();


        //"INSERT INTO partner_show_raw SET part_idx = '".$part_info['idx']."' , regtime = '".date("Y-m-d H:00:00")."' ".$add_sql.$penalty_sql." , date_y = '".date('Y')."', date_m = '".date('m')."', date_d = '".date('d')."', date_h = '".date('H')."' ON DUPLICATE KEY UPDATE ".$add_up_sql

        $isMobile_ = $oDevice=='mobile' ? '1':'0';
        $strSQL = "INSERT INTO partner_".$fname2." SET part_idx = '".$oPartnerIdx."' , device = ".$isMobile_." , regtime = '".date("Y-m-d H:00:00")."', count = 1, date_y = '".date('Y')."', date_m = '".date('m')."', date_d = '".date('d')."', date_h = '".date('H')."' ON DUPLICATE KEY UPDATE count = count + ".$count;
        $DBMY->sql($strSQL);
        $DBMY->free();

        // 종합로그
        $strSQL = "INSERT INTO partner_".$fname2." SET part_idx = '0' , device = ".$isMobile_." , regtime = '".date("Y-m-d H:00:00")."', count = 1, date_y = '".date('Y')."', date_m = '".date('m')."', date_d = '".date('d')."', date_h = '".date('H')."' ON DUPLICATE KEY UPDATE count = count + ".$count;
        $DBMY->sql($strSQL);
        $DBMY->free();        
        
        $strSQL = "UPDATE partner_member SET total_".$fname3." = total_".$fname3." + ".$count." , ".($oDevice=='mobile'?'mobile':'pc')."_".$fname3." = ".($oDevice=='mobile'?'mobile':'pc')."_".$fname3." + ".$count." ".$comm_member_sql." Where idx  = ".$oPartnerIdx;
        $DBMY->sql($strSQL);
        $DBMY->free();      

        
        $strSQL = "INSERT INTO partner_referrer SET part_idx = '".$oPartnerIdx."', part_id = '".$siteId."', reg_date = NOW(), url = '".$_SERVER["HTTP_REFERER"]."', count = 1, date_y = '".date('Y')."', date_m = '".date('m')."', date_d = '".date('d')."' ON DUPLICATE KEY UPDATE count = count + 1";
        $DBMY->sql($strSQL);
        $DBMY->free();
                
    }

}
    }
       
  //  }
//}    
    
}

//  접속 로그

//if ( $_SERVER["HTTP_USER_AGENT"] == 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36') exit;
//if(!preg_match("/49.0.2623.112/", strtolower($_SERVER["HTTP_USER_AGENT"]))) exit;

if ( $_SERVER['HTTP_HOST'] == 'www.bjhotnews.com' || $_SERVER['HTTP_HOST'] == 'bjhotnews.com'  ) {   // 허용 도메인
    
$deny_folder_array = array (
    "0" => "/partner/nachotvList01.php"
);

    if ( !in_array($_SERVER['SCRIPT_NAME'], $deny_folder_array ) ) { // 허용 폴더

        if(!preg_match("/googlebot|bingbot|msnbot/", strtolower($_SERVER["HTTP_USER_AGENT"]))) { // 웹로봇 제외 

        $siteinfo['domain_cookie'] = ".bjhotnews.com";
            # 카운트 제어
            if(trim($_COOKIE["log_ip"]) != $_SERVER['REMOTE_ADDR']){
                #쿠키적용

                setcookie("log_ip",$_SERVER['REMOTE_ADDR'],mktime('23', '59', '59', date('m'), date('d'), date('Y')),"/",$siteinfo['domain_cookie']);
                $arr_ret = array();
                
                #접속경로기록
                //if($chkrefer == 1) $dbcon->insertSet('_log_visit',"referer='".$_SERVER['HTTP_REFERER']."',ip='".$_SERVER['REMOTE_ADDR']."',regdate=unix_timestamp()");
                #종합카운트
                
                $where_count = "where cdate='".date("Y-m-d H")."'";
                $strSQL = "select count(idx) from _log_count ".$where_count;
                $DBMY->sql($strSQL);
                $DBMY->fetch_row();
                $oCnt2 = $DBMY->f(0);
                $DBMY->free();
                
                if($oCnt2 > 0) $strSQL = "update _log_count set visit=visit+1 ".$where_count;
                else $strSQL = "insert into _log_count set visit=1, cdate='".date("Y-m-d H")."' ";
                $DBMY->sql($strSQL);
                $DBMY->free();
                
                
                $ip = $_SERVER["REMOTE_ADDR"];
                $user_agent = $_SERVER["HTTP_USER_AGENT"];
                $referer = $_SERVER["HTTP_REFERER"];
                $user_agent = addslashes($user_agent);

                $dim_user_agent = explode(";", $user_agent);

                if ( count($dim_user_agent) > 1 ) {
                    $brow_user_agent = $dim_user_agent[1];
                    $os_user_agent = $dim_user_agent[2];
                    $os_user_agent = str_replace(")", "", $os_user_agent);
                } else {
                    $brow_user_agent = "";
                    $os_user_agent = "";
                }      
             //   if ( trim($brow_user_agent) != 'Googlebot/2.1' ) {
                $oDivice = is_mobile_browsers() ? 'mobile' : '-';
                $strSQL = "insert into _accesslog_www (stat_ip, stat_date, stat_user_agent, stat_referer, stat_browser, stat_os, stat_divice) values ('".$ip."', now(), '".$user_agent."','".$referer."','".$brow_user_agent."','".$os_user_agent."','".$oDivice."')";
                $DBMY->sql($strSQL);
                $DBMY->free();
             //   }
             
                $t_date = date("Y-m-d");
                $y_date = date("Y-m-d", mktime(0, 0, 0, date("n"), date("j")-1, date("Y")));

                $sql = "select DATE_FORMAT(regdate, '%Y-%m-%d') as udate from t_total_count where id = 'main' ";
                $DBMY -> sql($sql);
                $DBMY -> fetch_row();
                $udate = $DBMY -> f(0);
                $DBMY -> free();
                
                if ($udate) {
                    if ($udate == $t_date) {
                        $sql = "update t_total_count set today = today + 1, totalday = totalday + 1 where id = 'main' ";
                    } else {
                        $sql = "update t_total_count set today = 1, totalday = totalday + 1, regdate = now() where id = 'main' ";
                    }
                } else {
                    $sql = "insert into t_total_count (id, today, totalday, regdate) values ('main','1', '1', now())";
                }  
                $DBMY->sql($sql);
                $DBMY->free();   
                
            }
        }

    }
}

// 키를 통해 복호화

function aes_decrypt($text, $key) {

$size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);

$iv = mcrypt_create_iv($size, MCRYPT_RAND);

$bin = pack('H*', bin2hex( base64_decode($text)) );

$decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $bin, MCRYPT_MODE_ECB, $iv);

return rtrim( pkcs5_unpad($decrypted) );

}

// 키를 통해 암호화

function aes_encrypt($text, $key) {

$text = pkcs5_pad($text, 16);

$size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);

$iv = mcrypt_create_iv($size, MCRYPT_RAND);

$bin = pack('H*', bin2hex($text) );

$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $bin, MCRYPT_MODE_ECB, $iv);

return base64_encode($encrypted);

}

// PKCS5 패드추가

function pkcs5_pad($text, $blocksize) {

$pad = $blocksize - (strlen($text) % $blocksize);

return $text . str_repeat(chr($pad), $pad);

}

// PKCS5 패드제거

function pkcs5_unpad($text) {

$pad = ord($text{strlen($text)-1});

if ($pad > strlen($text)) return false;

if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;

return substr($text, 0, -1 * $pad);

}

/**
* Decrypt data from a CryptoJS json encoding string
*
* @param mixed $passphrase
* @param mixed $jsonString
* @return mixed
*/
function cryptoJsAesDecrypt($passphrase, $jsonString){
    $jsondata = json_decode($jsonString, true);
    $salt = hex2bin($jsondata["s"]);
    $ct = base64_decode($jsondata["ct"]);
    $iv  = hex2bin($jsondata["iv"]);
    $concatedPassphrase = $passphrase.$salt;
    $md5 = array();
    $md5[0] = md5($concatedPassphrase, true);
    $result = $md5[0];
    for ($i = 1; $i < 3; $i++) {
        $md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);
        $result .= $md5[$i];
    }
    $key = substr($result, 0, 32);
    $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
    return json_decode($data, true);
}

/**
* Encrypt value to a cryptojs compatiable json encoding string
*
* @param mixed $passphrase
* @param mixed $value
* @return string
* 
* $encrypted = cryptoJsAesEncrypt("my passphrase", "value to encrypt");
* $decrypted = cryptoJsAesDecrypt("my passphrase", $encrypted);
* 
*/
function cryptoJsAesEncrypt($passphrase, $value){
    $salt = openssl_random_pseudo_bytes(8);
    $salted = '';
    $dx = '';
    while (strlen($salted) < 48) {
        $dx = md5($dx.$passphrase.$salt, true);
        $salted .= $dx;
    }
    $key = substr($salted, 0, 32);
    $iv  = substr($salted, 32,16);
    $encrypted_data = openssl_encrypt(json_encode($value), 'aes-256-cbc', $key, true, $iv);
    $data = array("ct" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "s" => bin2hex($salt));
    return json_encode($data);
}


/*
 AES256 EnCrypt / DeCrypt
echo AES_Encode('nachotv');
echo AES_Decode('kWyuTmUELRiREWIPpLy3ZA==');
*/
$key = "skchxlqleoqkrskfkvkdlxld12345678";

function AES_Encode($plain_text)
{
    global $key;
    return rawurlencode(base64_encode(openssl_encrypt($plain_text, "aes-256-cbc", $key, true, str_repeat(chr(0), 16))));
}

function AES_Decode($base64_text)
{
    global $key;
    return openssl_decrypt(base64_decode(rawurldecode($base64_text)), "aes-256-cbc", $key, true, str_repeat(chr(0), 16));
}


/*
   $post_data = array (
        "signId" => $oMember_id
    );
$aaa = get_curl ('http://sys1.billcontents.com:9001/jsonp/api/join/idUseCheck.asp', $post_data );
$aaa = get_curl ($oM_url, $post_data, 'PNJSONP' );
*/
function get_curl($url, $params=array(), $jsonp='HYJSONP', $rep="yes") 
{ 

    $url = $url.'?'.http_build_query($params, '', '&');
    $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)';
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt ($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt ($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
        
    $response = curl_exec($ch);

    curl_close($ch);
    
    if ( $rep == "yes" ) {
        $a = str_replace($jsonp."(","",$response);
        $c = strrpos($a, ')');
        $response = substr($a, 0, $c);    

        return json_decode($response);
    } else {
        return $response;
    }

}

function get_curl_post($url, $params=array()) 
{ 

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);      
    curl_exec ($ch);
    curl_close ($ch);
    
}

if ( !function_exists("get_shortURL") ) {
function get_shortURL($longURL, $shortURL_domain) {
  switch($shortURL_domain) {
    case "bit.ly" :
    case "j.mp" :
      $login = "o_1krjijn7ik"; // 가입후 https://bitly.com/a/your_api_key
      $api_key = "R_03f4ba8a39ba46648d38591b239a6f0f";
      $curlopt_url = "http://api.".$shortURL_domain."/v3/shorten?login=".$login."&apiKey=".$api_key."&uri=".urlencode($longURL)."&format=txt";
      break;
//    case "is.gd" :
//      $curlopt_url = "http://is.gd/api.php?longurl=".$longURL;
//      break;
    case "v.gd" :
      $curlopt_url = "http://v.gd/create.php?format=simple&url=".$longURL;
      break;
    case "to.ly" :
      $curlopt_url = "http://to.ly/api.php?longurl=".$longURL;
      break;
    case "goo.gl" :
      $api_key = "AIzaSyBNSyYXUMl2trfg3x5bQPUobmeHYXW5n08";
      $curlopt_url = "https://www.googleapis.com/urlshortener/v1/url?key=".$api_key;
      break;
    case "durl.me" :
      $curlopt_url = "http://durl.me/api/Create.do?type=json&longurl=".$longURL;
      break;   
    case "tinyurl" :
      $curlopt_url = "http://tinyurl.com/api-create.php?url=".$longURL;
      break;

  } 
  $ch = curl_init();
  //$timeout = 10;
  
  curl_setopt($ch, CURLOPT_URL, $curlopt_url);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

  if($shortURL_domain == "goo.gl" || $shortURL_domain == "durl.me") {
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, true); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
    $jsonArray = array('longUrl' => $longURL); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($jsonArray)); 
    $shortURL = curl_exec($ch);
    curl_close($ch);
    $result_array = json_decode($shortURL, true);

    if($result_array['shortUrl']) return $result_array['shortUrl'];  // durl.me
    else if($result_array['id']) return $result_array['id']; // goo.gl
    else return false;
  }

  $shortURL = curl_exec($ch);
  curl_close($ch);

  // bit.ly(j.mp) 주소 끝에 붙은 줄바꿈 문자를 없앰 
  if( ($shortURL_domain == "j.mp" || $shortURL_domain  == "bit.ly") && bin2hex(substr($shortURL, -1, 1)) == "0a") $shortURL = substr($shortURL, 0, strlen($shortURL)-1);

  return $shortURL;
}
}



function isIPhone() {
    $agent = $_SERVER['HTTP_USER_AGENT'];
    if (!empty($agent) and preg_match("~Mozilla/[^ ]+ \((iPhone|iPod); U; CPU [^;]+ Mac OS X; [^)]+\) AppleWebKit/[^ ]+ \(KHTML, like Gecko\) Version/[^ ]+ Mobile/[^ ]+ Safari/[^ ]+~", $agent, $match)) {
        return "YES";
    } elseif (stristr($agent, 'iphone') or stristr($agent, 'ipod')){
        return "MAYBE";
    } else {
        return "NO";
    }
}

function round_down($num, $d = 0) {
  return sgn($num) * p_floor(abs($num), $d);
}
 
function p_floor($val, $d) {
  return floor($val * pow(10,$d))/pow(10,$d);
}
function sgn($x) {
  return $x ? ($x > 0 ? 1:-1) :0;
}

function main_newslist ($type, $listcnt) {
    global $DBMY;
    
    if ( isNull($type) ) {
        $where = '';
    } else {
        $where = " and pos = '".$type."' ";
    }
    
    $strSQL = "select * from (select * from t_bjhotnews_bbs where stat='start' ".$where." order by rand() limit 0,100".$listcnt.") a limit 0,".$listcnt;
    $strQue = $DBMY-> sql_exec($strSQL);
    $DBMY->free();
    
    return $strQue;
}

function main_interviewlist ($listcnt) {
    global $DBMY;
    $listcnt = $listcnt + 20;
    
    $strSQL = "select * from t_bjinterview where stat='start' order by rand() limit 0,".$listcnt;
    $strQue = $DBMY-> sql_exec($strSQL);
    $DBMY->free();
    
    return $strQue;
}

function main_bbslist ($bid, $listcnt) {
    global $DBMY;
   // $listcnt = $listcnt + 20;
    
    $strSQL = "select num, date_format(reg_date, '%Y.%m.%d') as date, subject, name from ".$bid."_bbs where (( ( stat is NULL  or stat = '' ) or stat = 'R' ) and ( admin_stat <> 'A' or admin_stat is NULL )) and depth = '0' order by reg_date desc limit 0,".$listcnt;
    $strQue = $DBMY-> sql_exec($strSQL);
    $DBMY->free();
    
    return $strQue;
}

function main_linklist ($type, $listcnt) {
    global $DBMY;
    
    $where = " where link_source = ".$type;
    $strSQL = "select a.*, b.part, b.bj_name, b.imgfile from t_bjlink a left join t_bjmember b on a.link_target=b.idx ".$where." order by a.r_slt asc limit 0,".$listcnt;    
    $strQue = $DBMY-> sql_exec($strSQL);
    $DBMY->free();
    
    return $strQue;
}

function recommend_src ($pid, $pidx) {
    global $DBMY, $_SESSION;
    
    $strSQL = "select count(*) from t_recommend where pgm_id='".$pid."' and pgm_idx='".$pidx."' ";
    $DBMY->sql($strSQL);
    $DBMY->fetch_row();
    $oCnt = $DBMY->f(0);
    $DBMY->free();
    
    return $oCnt;
}

function comment_src ($pid, $pidx) {
    global $DBMY, $_SESSION;
    
    $strSQL = "select count(*) from t_comment where pgm_id='".$pid."' and pgm_idx='".$pidx."' and stat='active'";
    $DBMY->sql($strSQL);
    $DBMY->fetch_row();
    $oCnt = $DBMY->f(0);
    $DBMY->free();
    
    return $oCnt;
}

function url_auto_link($str = '', $popup = false)
{
    if (empty($str)) {
        return false;
    }
    $target = $popup ? 'target="_blank"' : '';
    $str = str_replace(
        array("&lt;", "&gt;", "&amp;", "&quot;", "&nbsp;", "&#039;"),
        array("\t_lt_\t", "\t_gt_\t", "&", "\"", "\t_nbsp_\t", "'"),
        $str
    );
    $str = preg_replace(
        "/([^(href=\"?'?)|(src=\"?'?)]|\(|^)((http|https|ftp|telnet|news|mms):\/\/[a-zA-Z0-9\.-]+\.[가-힣\xA1-\xFEa-zA-Z0-9\.:&#=_\?\/~\+%@;\-\|\,\(\)]+)/i",
        "\\1<a href=\"\\2\" {$target}>\\2</A>",
        $str
    );
    $str = preg_replace(
        "/(^|[\"'\s(])(www\.[^\"'\s()]+)/i",
        "\\1<a href=\"http://\\2\" {$target}>\\2</A>",
        $str
    );
    $str = preg_replace(
        "/[0-9a-z_-]+@[a-z0-9._-]{4,}/i",
        "<a href=\"mailto:\\0\">\\0</a>",
        $str
    );
    $str = str_replace(
        array("\t_nbsp_\t", "\t_lt_\t", "\t_gt_\t", "'"),
        array("&nbsp;", "&lt;", "&gt;", "&#039;"),
        $str
    );
    return $str;
}
?>
