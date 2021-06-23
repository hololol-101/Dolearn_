<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Notice; // model 클래스 상속
use App\Http\Controllers\fileuploadController;

class NoticeController extends Controller
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

        //if($request->input('del')==1) {
        //    Notice::where('id', $request->input('delId'))
        //    ->update(['memo'=>'삭제된글입니다.']);
       // } // 삭제요청

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

    public function read($post) //뷰 페이지 메소드
    {
        //$pIdx = $request->segment(3); <- Request $request
        $pIdx = $post;

    // ** 전달 된 $ id별로 게시물 세부 정보 가져 오기 * / 
    // $post = Notice::where([ 'idx' => $id])-> first ();      
        // read count+1
        //Notice::where('idx', $pIdx)->update(['views'=>Notice::raw('views+1')]);
        Notice::find($pIdx)->increment('views'); // 선언된 pk
        
        // Read
        $read = Notice::where(['idx' => $pIdx])->first();    

        return view('doadm.notice.read', ['boardView' => $read]);
    }

    public function modify($post) //뷰 페이지 메소드
    {
        //$pIdx = $request->segment(3); <- Request $request
        $pIdx = $post;
      
        // Read
        $read = Notice::where(['idx' => $pIdx])->first();    

        return view('doadm.notice.form', ['boardEdit' => $read, 'action' => 'edit']);
    }

    public function post(Request $request) //생성페이지 메소드
    {
        return view('doadm.notice.form', ['boardEdit' => '', 'action' => 'post']);
    }

    public function reply($post) //생성페이지 메소드
    {
        $pIdx = $post;

        // Read
        $read = Notice::select('idx', 'subject')->where(['idx' => $pIdx])->first();    

        return view('doadm.notice.form', ['boardReply' => $read, 'action' => 'reply']);
    }
   
    public function save(Request $request) //저장 메소드
    {
        
        $wmode = $request->input('wmode');
        $page = $request->input('page');
        $iSubject = $request->input('iSubject');
        $iContent = $request->input('iContent');
        $iFile = $request->hasfile('iFile') ? $request->file('iFile') : '';
        $iPublic = $request->input('iPublic');
        $iNotice = $request->input('iNotice');
        $agreement = $request->input('agreement');
        
        if ( $wmode == "insert" ) {

            $_pos = Notice::min('pos');
            $pos = ($_pos) ? $_pos - 1 : -1;
            
            $ip = getenv("REMOTE_ADDR");
            $reg_date=time();
            
            $uploadController = new fileuploadController(public_path().'/upload/notice');
            $fileNames = $uploadController->define_($request->file('iFile'));
            
            /* 위즈윅 이미지 업로드 START */
            $dom = new \DOMDocument();
            
            $dom->loadHtml('<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'.$iContent, LIBXML_NOERROR  | LIBXML_NOWARNING);
            $images = $dom->getElementsByTagName('img');


            foreach($images as $k => $img){
               $data = $img->getAttribute('src');
               if(preg_match('/data:image/', $data)){
                   list($type, $data) = explode(';', $data);
                   list(, $data)      = explode(',', $data);
                   $data = base64_decode($data);
                   $image_name= "/upload/notice/editor/". time().$k.'.png';
                   $path = public_path() . $image_name;
                   file_put_contents($path, $data);
                   $img->removeAttribute('src');
                   $img->setAttribute('src', $image_name);
               }
            }
 
            $iContent = $dom->saveHTML();
            $iContent = preg_replace('~<(?:!DOCTYPE|/?(?:html|head|body|meta))[^>]*>\s*~i', '', $iContent);   // 불필요한 태그삭제 
            /* 위즈윅 이미지 업로드 STOP */   
               
            $Insert = new Notice;
            
            $Insert->subject = $iSubject;
            $Insert->name = "관리자";
            $Insert->userid = "admin";
            $Insert->content = $iContent;
            $Insert->regdate = $reg_date;
            $Insert->pos = $pos;
            $Insert->remoteaddr = $ip;
            
            $oCnt = count($fileNames);
            $j = 1;
            for ( $i = 0; $i < $oCnt; $i++ ) {
                if ( !isNull($fileNames[$i]) ) {
                    $tempFile = "file".$j;
                    $Insert->$tempFile = $fileNames[$i];
                    $j++;
                }
            }
                        
            if (!isNull($iNotice)) {
                $Insert->notice_yn = $iNotice;
            }
            $Insert->save();
        
        return redirect("/doadm/notice");
        }

        if ( $wmode == "reply_ok" ) {
            
            $reIdx = $request->input('reIdx');
            
            // 부모게시판 포지션등 가져오기
            $read = Notice::select('pos', 'thread', 'depth')->where(['idx' => $reIdx])->first();
            $oThread = $read->thread + 1;
            $oDepth = $read->depth + 1;
            $oPos = $read->pos;

            // 동일 thread순서 맨 아래로
            $read = Notice::select('thread', 'depth')->where('pos', '=', $oPos)->where('thread', '>=', $oThread)->orderBy('thread', 'asc')->get();
            foreach($read as $result) {
                if ( $oDepth > $result->depth ) break;
                else $oThread = $result->thread + 1;
            }

            // 순서 update
            Notice::where('pos', '=', $oPos)->where('thread', '>=', $oThread)->update(['thread'=>Notice::raw('thread+1')]);              
            $ip = getenv("REMOTE_ADDR");
            $reg_date=time();
            
            $uploadController = new fileuploadController(public_path().'/upload/notice');
            $fileNames = $uploadController->define_($request->file('iFile'));
            
            /* 위즈윅 이미지 업로드 START */
            $dom = new \DOMDocument();
            
            $dom->loadHtml('<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'.$iContent, LIBXML_NOERROR  | LIBXML_NOWARNING);
            $images = $dom->getElementsByTagName('img');


            foreach($images as $k => $img){
               $data = $img->getAttribute('src');
               if(preg_match('/data:image/', $data)){
                   list($type, $data) = explode(';', $data);
                   list(, $data)      = explode(',', $data);
                   $data = base64_decode($data);
                   $image_name= "/upload/notice/editor/". time().$k.'.png';
                   $path = public_path() . $image_name;
                   file_put_contents($path, $data);
                   $img->removeAttribute('src');
                   $img->setAttribute('src', $image_name);
               }
            }
 
            $iContent = $dom->saveHTML();
            $iContent = preg_replace('~<(?:!DOCTYPE|/?(?:html|head|body|meta))[^>]*>\s*~i', '', $iContent);   // 불필요한 태그삭제 
            /* 위즈윅 이미지 업로드 STOP */   
               
            $Insert = new Notice;   
            
            $Insert->subject = $iSubject;
            $Insert->name = "관리자";
            $Insert->userid = "admin";
            $Insert->content = $iContent;
            $Insert->regdate = $reg_date;
            $Insert->pos = $oPos;
            $Insert->thread = $oThread;
            $Insert->depth = $oDepth;
            $Insert->remoteaddr = $ip;
            
            $oCnt = count($fileNames);
            $j = 1;
            for ( $i = 0; $i < $oCnt; $i++ ) {
                if ( !isNull($fileNames[$i]) ) {
                    $tempFile = "file".$j;
                    $Insert->$tempFile = $fileNames[$i];
                    $j++;
                }
            }
                        
            if (!isNull($iNotice)) {
                $Insert->notice_yn = $iNotice;
            }
            $Insert->save();
        
        return redirect("/doadm/notice");
        }

        
        if ( $wmode == "edit_ok" ) {
            
        $pIdx = $request->input('pIdx');

         /* 위즈윅 이미지 업로드 START */
        $dom = new \DOMDocument();
        
        $dom->loadHtml('<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'.$iContent, LIBXML_NOERROR  | LIBXML_NOWARNING);
        $images = $dom->getElementsByTagName('img');


        foreach($images as $k => $img){
           $data = $img->getAttribute('src');
           if(preg_match('/data:image/', $data)){
               list($type, $data) = explode(';', $data);
               list(, $data)      = explode(',', $data);
               $data = base64_decode($data);
               $image_name= "/upload/notice/editor/". time().$k.'.png';
               $path = public_path() . $image_name;
               file_put_contents($path, $data);
               $img->removeAttribute('src');
               $img->setAttribute('src', $image_name);
           }
        }

        $iContent = $dom->saveHTML();
        $iContent = preg_replace('~<(?:!DOCTYPE|/?(?:html|head|body|meta))[^>]*>\s*~i', '', $iContent);   // 불필요한 태그삭제 
        
        $Update = Notice::where('idx', $pIdx) -> first();
        $Update -> subject = $iSubject;
        $Update -> content = $iContent;
        $Update -> modifydate = time();
        $Update -> save();
            
        return redirect("/doadm/notice/".$pIdx."/edit");

    // 파일 정렬
/*
    if ( !isNull($oFile[0][file_name1]) ) $eFile_name[] = $oFile[0][file_name1];
    if ( !isNull($oFile[0][file_name2]) ) $eFile_name[] = $oFile[0][file_name2];
    if ( !isNull($oFile[0][file_name3]) ) $eFile_name[] = $oFile[0][file_name3];
    if ( !isNull($oFile[0][file_name4]) ) $eFile_name[] = $oFile[0][file_name4];
    if ( !isNull($oFile[0][file_name5]) ) $eFile_name[] = $oFile[0][file_name5];
*/                
            
        }
    }
    public function delete($post) //뷰 페이지 메소드
    {
        //$pIdx = $request->segment(3); <- Request $request
        $pIdx = $post;
      
        // Read
        Notice::where(['idx' => $pIdx])->delete();    

        return redirect('/doadm/notice')->with('success', 'Student deleted successfully');
    }
    
}
