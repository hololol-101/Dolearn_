<?php
use Illuminate\Support\Facades\DB;

// 지난 시간 계산 알고리즘
if ( !function_exists("format_date") ) {
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
        return "방금 전";
    }
}

if(!function_exists("create_notification")){
    function createNotification($division, $user, $title, $content, $url){
        $query = array();
        if($division == 'all'){
            // 전체에 관한 알림

            $usersInfo = DB::select('select email from users where status !="withdraw"');
            //탈퇴한 사용자를 제외한 전체에게 알림

            foreach($usersInfo as $userInfo){
                $item = array();
                $item['target_id']=$userInfo->email;
                $item['title']=$title;
                $item['content']=$content;
                $item['created_at']=now();
                $item['program_name']="공지";
                $item['status']='active';
                $item['route']=$url;
                array_push($query, $item);
            }

        }else if($division =='group'){
             //특정 그룹에 관한 할림

            $usersInfo = DB::select('select email from users where status !="withdraw"');
             //탈퇴한 사용자를 제외한 전체에게 알림

            foreach($usersInfo as $userInfo){
                $item = array();
                $item['target_id']=$userInfo->email;
                $item['title']=$title;
                $item['content']=$content;
                $item['created_at']=now();
                $item['program_name']="영상";
                $item['status']='active';
                $item['route']=$url;
                array_push($query, $item);
            }
        }else{
            //특정 사용자에 관한 알림
            $query['target_id']=$user;
            $query['title']=$title;
            $query['content']=$content;
            $query['created_at']=now();
            if($division =="learning"){
                $query['program_name']="수강";
                $query['route']=$url;
            }else if($division == "lecture"){
                $query['program_name']="운영";
                $query['route']=$url;
            }if($division=="qna"){
                $query['program_name']="문의";
                $query['route']='/sub/community/service_qna';
            }
            $query['status']='active';

        }
        DB::table('notification')->insert($query);
    }
}
if ( !function_exists("getPageIndexInAjax") ) { // 게시판 페이징
    function getPageIndexInAjax($totalRecord, $recordPerPage,$pagePerBlock,$currentPage ,$prevurl)
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
        $urldata = explode('?', $prevurl, 2);
        $url = $urldata[0];

        $parameters = explode('=&', $urldata[1]);
        $parameterStart = '';
        $parameterEnd = '';
        if(array_search('page', $parameters)!==false){
            for($idx=0;$idx<array_search('page', $parameters); $idx+2){
                $parameterStart.=$parameters[$idx].'='.$parameters[$idx+1].='&';
            }
            for($idx=array_search('page', $parameters)+2;$idx<count($parameters); $idx+2){
                $parameterEnd.='&'.$parameters[$idx].'='.$parameters[$idx+1].'&'.$parameters[$idx].'='.$parameters[$idx+1];
            }
        }
        else{
            $parameterStart=$urldata[1];
        }
        $pageIndex['parameterStart']=$urldata[1];
        $pageIndex['parameterEnd']=$parameters[0];

        /* 매개변수 설정*/

        $pageIndex['htmlCode'] = '<div class="pagination" title="페이지 수 매기기">
        <span class="control">
            <span class="m first"><a href="'.$url.'?'.$parameterStart.'&page=1"'.$parameterEnd.' title="처음 페이지"><i class="ic">처음</i></a></span>';

        if($pageIndex['currentPage'] > $pageIndex['pagePerBlock'])
        {
            $pageIndex['htmlCode'].= '<span class="m prev"><a href="'.$url.'?'.$parameterStart.'&page='.( ($pageIndex['currentBlock']-2)*$pageIndex['pagePerBlock']+1).$parameterEnd.' title="이전 페이지"><i class="ic">이전</i></a></span>';
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
                    $pageIndex['htmlCode'].='<span class="m"><a href="'.$url.'?'.$parameterStart.'&page='.$i.$parameterEnd.'" title="'.$i.' 페이지">'.$i.'</a></span>';
                }
            }
        }
        $pageIndex['htmlCode'] .= '</span>';

        ##NEXT BLOCK
        $pageIndex['htmlCode'].='<span class="control">';
        if($pageIndex['currentBlock'] <= ($pageIndex['totalBlock']-1) )
        {
            $pageIndex['htmlCode'].='<span class="m next"><a href="'.$url.'?'.$parameterStart.'&page='.($pageIndex['currentBlock']*$pageIndex['pagePerBlock']+1).$parameterEnd.'" title="다음 페이지"><i class="ic">다음</i></a></span>';
        }else{
            $pageIndex['htmlCode'].='<span class="m next"><a title="다음 페이지 없음"><i class="ic">다음</i></a></span>';
        }

        $pageIndex['htmlCode'] .= '<span class="m last"><a href="'.$url.'?'.$parameterStart.'&page='.$pageIndex['totalPage'].$parameterEnd.'" title="마지막 페이지"><i class="ic">마지막</i></a></span></div>';

        ##RETURN PAGE INDEX ARRAY
        return $pageIndex;

    }//END METHOD


}
if ( !function_exists("storeAttachFile") ) { // 파일 저장
    function storeAttachFile($file){
        //파일 저장
        $fileReName=null;
        $filename=null;
        if($file){
            $originalname = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filename = pathinfo($originalname, PATHINFO_FILENAME);
            $fileReName=$filename.'_'.time().'.'.$extension;
            $file->storeAs('uploads/attach/', $fileReName);
        }
        return array('filename'=>$filename, 'fileReName'=>$fileReName);
    }
}
if(!function_exists('pagenationToAjax')){
    function pagenationToAjax($curPage, $totalCount,$dataPerPage=10){
        // 페이지 이동 시 화면 새로고침이 아닌 pageClick 실행
        //현재 페이지
        $pageCount=10;
        //보여줄 페이지 수
        $totalPage = ceil($totalCount/$dataPerPage);
        // 총 faq 페이지 수
        $pageGroup = ceil($curPage/$pageCount);
        // 현재 faq 페이지 그룹
        $last = $pageGroup*$pageCount;
        // 현재 페이지 그룹 마지막 번호
        $first = $last-$pageCount +1;
        // 현재 페이지 그룹 첫번째 번호
        if($last>$totalPage){
            $last = $totalPage;
        }

        if($curPage=="처음"){
            $curPage = 1;
        }
        else if($curPage=="이전"){
            $curPage = $first-1;
        }
        else if($curPage=="다음"){
            $curPage = $last+1;
        }
        else if($curPage=="마지막"){
            $curPage = $totalPage;
        }



        $html = '';
        $html.='<span class="control">';
        if ($pageGroup<=1){
            $html.='<span class="m first"><a title="처음 페이지"><i class="ic">처음</i></a></span>';
            $html.='<span class="m prev"><a title="이전 페이지"><i class="ic">이전</i></a></span>';
        }
        else{
            $html.='<span class="m first"><a href="javascript:void(0)" onclick="pageClick(this)" title="처음 페이지"><i class="ic">처음</i></a></span>';
            $html.='<span class="m prev"><a href="javascript:void(0)" onclick="pageClick(this)" title="이전 페이지"><i class="ic">이전</i></a></span>';
        }

        $html.='</span>';
        $html.='<span class="pages">';
        for($idx = $first; $idx<=$last; $idx++){
            if($idx == $curPage )
            $html.='<span class="m on"><a href="javascript:void(0)" onclick="pageClick(this)" title="'.$idx.' 페이지">'.$idx.'</a></span>';
        else
            $html.='<span class="m"><a href="javascript:void(0)" onclick="pageClick(this)" title="'.$idx.' 페이지">'.$idx.'</a></span>';
        }
        $html.='</span>';
        $html.='<span class="control">';
        if ($pageGroup >= ceil($totalPage/10)){
            $html.='<span class="m next"><a title="다음 페이지"><i class="ic">다음</i></a></span>';
            $html.='<span class="m last" id="last"><a title="마지막 페이지"><i class="ic">마지막</i></a></span>';
        }
        else{
            $html.='<span class="m next"><a  href="javascript:void(0)" onclick="pageClick(this)" title="다음 페이지"><i class="ic">다음</i></a></span>';
            $html.='<span class="m last" id="last"><a  href="javascript:void(0)" onclick="pageClick(this)" title="마지막 페이지"><i class="ic">마지막</i></a></span>';
        }

        $html.='</span>';
        return $html;
    }
}
