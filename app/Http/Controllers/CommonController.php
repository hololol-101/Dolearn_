<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function index(Request $request) //메인페이지 메소드
    {
        $pageNum     = $request->input('page');
        // view에서 넘어온 현재페이지의 파라미터 값.
        $pageNum     = (isset($pageNum)?$pageNum:1);
        // 페이지 번호가 없으면 1, 있다면 그대로 사용
        $startNum    = ($pageNum-1)*10;
        // 페이지 내 첫 게시글 번호
        $writeList    = 10;
        // 한 페이지당 표시될 글 갯수
        $pageNumList = 10;
        // 전체 페이지 중 표시될 페이지 갯수
        $pageGroup   = ceil($pageNum/$pageNumList);
        // 페이지 그룹 번호
        $startPage   = (($pageGroup-1)*$pageNumList)+1;
        // 페이지 그룹 내 첫 페이지 번호
        $endPage     = $startPage + $pageNumList-1;
        // 페이지 그룹 내 마지막 페이지 번호
        $totalCount  = Notice::count();
        // 전체 게시글 갯수
        $totalPage   = ceil($totalCount/$writeList);
        // 전체 페이지 갯수
        if($endPage >= $totalPage) {
        $endPage = $totalPage;
        } // 페이지 그룹이 마지막일 때 마지막 페이지 번호

        if($request->input('del')==1) {
            Notice::where('id', $request->input('delId'))
            ->update(['memo'=>'삭제된글입니다.']);
        } // 삭제요청

        $boardList = Notice::orderby('pos')->orderby('thread')->skip($startNum)->take($writeList)->get();
        // 테이블에서 가져온 DB 뷰에서 사용 할 수 있는 변수에 저장.
        
        $pageIndex = getPageIndex($totalCount, $pageNumList, $writeList, $pageNum);
        // 게시판 page nav
      
        return view('doadm.notice.index', [
            'totalCount'=>$totalCount,
            'boardList'=>$boardList,
            'pageNum'=>$pageNum,
            'startPage'=>$startPage,
            'endPage'=>$endPage,
            'totalPage'=>$totalPage,
            'pageIndex'=>$pageIndex
            ]);
            // 요청된 정보 처리 후 결과 되돌려줌        
    }

    public function post() //생성페이지 메소드
    {
        return view('doadm.notice.form');
    }

    public function edit() //수정페이지 메소드
    {
        return view('notice.form');
    }
    
    public function save(Request $request) //저장 메소드
    {
        
        $wmode = $request->input('wmode');
        $page = $request->input('page');
        $iSubject = $request->input('iSubject');
        $iContent = $request->input('iContent');
        $iFile = $request->input('iFile');
        $iPublic = $request->input('iPublic');
        $iNotice = $request->input('iNotice');
        $agreement = $request->input('agreement');
        
        if ( $wmode == "insert" ) {
        
            $_pos = Notice::min('pos');
            $pos = ($_pos) ? $_pos - 1 : -1;
            
            $ip = getenv("REMOTE_ADDR");
            $reg_date=time();
            
            $Insert = new Notice;
            $Insert->subject = $iSubject;
            $Insert->name = "관리자";
            $Insert->userid = "admin";
            $Insert->content = $iContent;
            $Insert->regdate = $reg_date;
            $Insert->pos = $pos;
            $Insert->remoteaddr = $ip;
            $Insert->notice_yn = $iNotice;
            $Insert->save();
        
        return redirect("/doadm/notice");
        }
    }
}
