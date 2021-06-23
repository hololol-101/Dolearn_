<?php

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
//    $String = str_replace("<embed", "&lt;embed", $String);
//    $String = str_replace("</embed", "&lt;/embed", $String);
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

if ( !function_exists("getPageIndex") ) { // 게시판 페이징
    function getPageIndex($totalRecord, $recordPerPage,$pagePerBlock,$currentPage)
    {

        //SET ARRAY REFER TO PARAMETERS:페이지 인덱스 생성을 위한 기본값 정렬
        $pageIndex['totalRecord'] = $totalRecord;
        $pageIndex['recordPerPage'] = $recordPerPage;
        $pageIndex['pagePerBlock'] = $pagePerBlock;
        $pageIndex['currentPage'] = $currentPage;

        //CALCULATE PAGE IDNEX:
        $pageIndex['totalPage']=ceil($pageIndex['totalRecord']/$pageIndex['recordPerPage']);
        $pageIndex['currentBlock']=ceil($pageIndex['currentPage']/$pageIndex['pagePerBlock']);
        $pageIndex['totalBlock']=ceil($pageIndex['totalPage']/$pageIndex['pagePerBlock']);

        //FIRST PAGE/LAST PAGE
        $pageIndex['firstPage']=($pageIndex['currentBlock']*$pageIndex['pagePerBlock']) - ($pageIndex['pagePerBlock']-1);
        $pageIndex['lastPage']=($pageIndex['currentBlock']*$pageIndex['pagePerBlock']);

        /****************************************
        //DEFINE NEW QUERY_STRING
         페이지 링크 정의를 위한 URL파싱
         ***************************************/
        parse_str($_SERVER['QUERY_STRING'],$QUERY_STRING);
        unset($QUERY_STRING['page']);
        $temp = '';
        foreach($QUERY_STRING as $key=>$value)
        {
            if(empty($temp)){
                $temp="$key=".urlencode($value);
            }else{
                $temp.="&$key=".urlencode($value);
            }
        }
        $QUERY_STRING=$temp;


        /****************************************
         CREATE PAGE INDEX HTML CODE
         HTML코드 생성
         ***************************************/
        ##PREVIOUS BLOCK

            $pageIndex['htmlCode'] = '<div class="pagination" title="페이지 수 매기기">
        <span class="control">
            <span class="m first"><a href="'.$_SERVER['REDIRECT_URL'].'?'.$QUERY_STRING.'&page=1" title="처음 페이지"><i class="ic">처음</i></a></span>';

        if($pageIndex['currentPage'] > $pageIndex['pagePerBlock'])
        {
            $pageIndex['htmlCode'].= '<span class="m prev"><a href="'.$_SERVER['REDIRECT_URL'].'?'.$QUERY_STRING.'&page='.( ($pageIndex['currentBlock']-2)*$pageIndex['pagePerBlock']+1).' title="이전 페이지"><i class="ic">이전</i></a></span>';
        }else{
            $pageIndex['htmlCode'].= '<span class="m prev"><a title="이전 페이지 없음"><i class="ic">이전</i></a></span>';
        }


        ##PAGE INDEX
        $pageIndex['htmlCode'] .= '<span class="pages">';
        for($i=$pageIndex['firstPage']; $i<=$pageIndex['lastPage']; $i++)
        {

            /*
          if ( $i == $pageIndex[firstPage] ) $class_temp = ' class="first"';
          else if ( $i == $pageIndex[lastPage] ) $class_temp = ' class="last"';
          else $class_temp = '';
          */

            if($i<=$pageIndex['totalPage'])
            {
                if($i==$pageIndex['currentPage'])
                {
                    $pageIndex['htmlCode'].='<span class="m on"><a title="현재 '.$i.' 페이지">'.$i.'</a></span>';
                }else{
                    $pageIndex['htmlCode'].='<span class="m"><a href="'.$_SERVER['REDIRECT_URL'].'?'.$QUERY_STRING.'&page='.$i.'" title="'.$i.' 페이지">'.$i.'</a></span>';
                }
            }
        }
        $pageIndex['htmlCode'] .= '</span>';

        ##NEXT BLOCK
        $pageIndex['htmlCode'].='<span class="control">';
        if($pageIndex['currentBlock'] <= ($pageIndex['totalBlock']-1) )
        {
            $pageIndex['htmlCode'].='<span class="m next"><a href="'.$_SERVER['REDIRECT_URL'].'?'.$QUERY_STRING.'&page='.($pageIndex['currentBlock']*$pageIndex['pagePerBlock']+1).'" title="다음 페이지"><i class="ic">다음</i></a></span>';
        }else{
            $pageIndex['htmlCode'].='<span class="m next"><a title="다음 페이지 없음"><i class="ic">다음</i></a></span>';
        }

        $pageIndex['htmlCode'] .= '<span class="m last"><a href="'.$_SERVER['REDIRECT_URL'].'?'.$QUERY_STRING.'&page='.$pageIndex['totalPage'].'" title="마지막 페이지"><i class="ic">마지막</i></a></span></div>';

        ##RETURN PAGE INDEX ARRAY
        return $pageIndex;

    }//END METHOD
}
if(!function_exists("format_date")){
    // 지난 시간 계산 알고리즘
    function format_date($time){
        $t=time()-strtotime($time);
        $f=array(
            '31536000'=>'년',
            '2592000'=>'개월',
            '604800'=>'주',
            '86400'=>'일',
            '3600'=>'시간',
            '60'=>'분',
            '1'=>'초'
        );
        foreach ($f as $k=>$v)    {
            if (0 !=$c=floor($t/(int)$k)) {
                return $c.$v.'전';
            }
        }
    }
}
