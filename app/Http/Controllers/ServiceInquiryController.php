<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ServiceInquiryController extends Controller{
    public function faqIndex(Request $request){
        if($request->isMethod('get')){
            $pageNum     = $request->get('page', 1);
            // view에서 넘어온 현재페이지의 파라미터 값. 페이지 번호가 없으면 1, 있다면 그대로 사용
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
            $totalCount  = DB::select('select count(*) count from faq')[0]->count;
            // 전체 게시글 갯수
            $totalPage   = ceil($totalCount/$writeList);
            // 전체 페이지 갯수
            if($endPage >= $totalPage) {
            $endPage = $totalPage;
            }
            $faqlist = DB::select('select f.*, a.nickname adminname from faq f, admin a where a.idx = f.writer_id order by idx desc limit '.$startNum.' ,'.$writeList);

            $pageIndex = getPageIndex($totalCount, $writeList, $pageNumList, $pageNum);

            return view('doadm.FAQ.index', compact('faqlist', 'pageIndex'));
        }else if($request->isMethod('post')){
            $type = $request->post('type');
            if($type =="all"){
                //ALL을 선택한 경우
                $faqlist = DB::select('select f.*, a.nickname adminname from faq f, admin a where a.idx = f.writer_id order by idx desc ');
            }else{
                //ALL을 제외한 나머지 탭을 선택한 경우
                $faqlist = DB::select('select f.*, a.nickname adminname from faq f, admin a where a.idx = f.writer_id and division = ? order by idx desc ', [$type]);
            }
            $html ='<ul class="dl1">';
            if(count($faqlist)==0){
                //FAQ가 없을 경우
                $html.='자주 묻는 질문 내역이 없습니다.';
            }
            foreach($faqlist as $faq){
                $html.='<li class="di1">';
                $html.='    <a href="javascript:void(0);" class="dt1">';
				$html.=         $faq->title;
                $html.='    </a>';
                $html.='	<div class="dd1">';
                $html.='        <div class="attach1">';
                if($faq->attach_file!=''){
                    $html.='        <ul>';
                    $html.='        <li><a href="'.asset('storage/uploads/attach/'.$faq->attach_file).'" class="filename">'. $faq->attach_file .'</a>';
                    $html.='        <a href="javascript:void(0)" title="바로보기 [새 창]" class="b1 quickview" onclick = window.open("'.asset('storage/uploads/attach/'.$faq->attach_file).'", "_blank")><i class="ic1"></i> 바로보기</a></li>';
                    $html.='        </ul>';
                }
                $html.='        </div>';
                $html.=         $faq->content;
                $html.='    </div>';
                $html.='</li>';
            }
            $html.='</ul>';
            $result['html']=$html;
            $result['tab']=$type;
            $result['status']="success";
            return response()->json($result, 200);
        }
    }
    public function faqDetail(Request $request){
        //FAQ 상세 정보 조회
        $idx = $request->get('idx');
        $faqlist = DB::select('select f.*, a.nickname adminname from faq f, admin a where a.idx = f.writer_id and f.idx=?', [$idx])[0];
        $fileArray = explode(',', $faqlist->attach_file);
        return view('doadm.FAQ.read', compact('faqlist', 'fileArray'));
    }

    public function faqEdit(Request $request){
        if($request->isMethod('get')){
        // FAQ 수정 페이지 열기
            $idx = $request->get('idx');
            $status = "edit";
            $faqlist = DB::select('select f.*, a.nickname adminname from faq f, admin a where a.idx = f.writer_id and f.idx=?', [$idx])[0];
            $fileArray = explode(',', $faqlist->attach_file);
            return view('doadm.FAQ.form', compact('faqlist', 'status', 'fileArray'));
        }
        if($request->isMethod('post')){

            $title = $request->post('iSubject');
            $content = $request->post('iContent');
            $division = $request->post('★1radio0');
            $isPublic = $request->post('iPublic');
            $idx = $request->post('idx');

            $fileReName=null;
            $writerId = 0;
            $fileArray = array();

            //기존에 있던 파일 중 삭제되지 않은 파일
            for($fcnt=0; $fcnt<3; $fcnt++){
                $filename = $request->post('save_attach_file_name'.$fcnt);
                if($filename!=null){
                    array_push($fileArray, $filename);
                }
            }

            //파일 저장
            for($fcnt=0; $fcnt<3; $fcnt++){
                $file = $request->file('iFile'.$fcnt);
                if($file){
                    $fileIdx = storeAttachFile($file);
                    $fileReName=$fileIdx['fileReName'];
                    array_push($fileArray, $fileReName);
                }
            }

            $files = implode(',', $fileArray);

            //수정한 정보를 저장
            DB::table('faq')->where('idx', $idx)->update(array(
                'division'=>$division,
                'writer_id'=>$writerId,
                'title'=>$title,
                'content'=>$content,
                'updated_at'=>now(),
                'attach_file'=>$files,
                'public_yn'=>$isPublic
            ));
            return redirect()->route('serviceinquiry.faq_detail', compact('idx'));


        }
    }

    public function faqCreate(Request $request){
        if($request->isMethod('get')){
            //FQA 작성 페이지
            return view('doadm.FAQ.form', compact('qalist'));
                //FAQ 정보 DB 저장
                $title = $request->post('iSubject');
                $content = $request->post('iContent');
                $division = $request->post('★1radio0');
                $isPublic = $request->post('iPublic');

        }
        else if($request->isMethod('post')){
            //FAQ 정보 DB 저장
            $title = $request->post('iSubject');
            $content = $request->post('iContent');
            $division = $request->post('★1radio0');
            $isPublic = $request->post('iPublic');

            $fileReName=null;

            $writerId = 0;
            $fileArray = array();
            //파일 저장
            for($fcnt=0; $fcnt<3; $fcnt++){
                $file = $request->file('iFile'.$fcnt);
                if($file){
                    $fileIdx = storeAttachFile($file);
                    $fileReName=$fileIdx['fileReName'];
                    array_push($fileArray, $fileReName);
                }
            }
            $files = implode(',', $fileArray);
            //새로운 FAQ를 생성
            DB::table('faq')->insert(array(
                'division'=>$division,
                'writer_id'=>$writerId,
                'title'=>$title,
                'content'=>$content,
                'writed_at'=>now(),
                'attach_file'=>$files,
                'public_yn'=>$isPublic
            ));
            return redirect()->route('serviceinquiry.faq_index');

        }
    }
    public function faqDelete(Request $request){
        //FAQ 삭제
        $idx = $request->get('idx');
        DB::delete('delete from faq where idx = ?', [$idx]);
        return redirect()->route('serviceinquiry.faq_index');
    }
    public function qaIndex(Request $request){
        $pageNum     = $request->get('page', 1);
        // view에서 넘어온 현재페이지의 파라미터 값. 페이지 번호가 없으면 1, 있다면 그대로 사용
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
        $totalCount  = DB::select('select count(*) count from qna')[0]->count;
        // 전체 게시글 갯수
        $totalPage   = ceil($totalCount/$writeList);
        // 전체 페이지 갯수
        if($endPage >= $totalPage) {
        $endPage = $totalPage;
        } // 페이지 그룹이 마지막일 때 마지막 페이지 번호
        $qalist = DB::select('select q.*, u.nickname from qna q, users u where q.writer_id = u.email order by idx desc limit '.$startNum.' ,'.$writeList);
        $pageIndex = getPageIndex($totalCount, $writeList, $pageNumList, $pageNum);

        return view('doadm.Q&A.index', compact('qalist', 'pageIndex'));
    }
    public function qaDetail(Request $request){
        //QNA 상세 정보
        $idx = $request->get('idx');
        $title = $request->get('title');

        $qaInfo = DB::select('select q.*, u.nickname,  a.nickname admin_name from qna q, users u, admin a where q.writer_id = u.email and a.idx = q.admin_id and q.idx = ?', [$idx])[0];
        return view('doadm.Q&A.read', compact('qaInfo'));
    }

    public function qaAnswer(Request $request){
        //QNA 답변
        if($request->isMethod('get')){
            //답변 보여주기
            $idx = $request->get('idx');
            $title = $request->get('title');
            $status = $request->get('status');
            $qaInfo = DB::select('select * from qna where idx = ?', [$idx])[0];
                return view('doadm.Q&A.form', compact('qaInfo', 'status'));
        }else{
            $idx = $request->post('idx');
            $content = $request->post('iContent');
            $fileReName='';
            $file = $request->file('iFile');
            $isDelete = $request->post('isDelete');
            $attach_file_name = $request->post('attach_file_name');
            //파일 저장
            if($file){
                $fileIdx = storeAttachFile($file);
                $fileReName=$fileIdx['fileReName'];
            }
            if($isDelete=="true"&&$fileReName==''){
                $fileReName = '';
            }else if($isDelete==null&& $fileReName==''){
                $fileReName = $attach_file_name;
            }
            //정보 조회
            $info = DB::select('select writer_id, status from qna where idx = ?', [$idx])[0];

            //답변 등록
            DB::table('qna')->where('idx', $idx)->update([
                'admin_id'=>0,
                'answer_content'=>$content,
                'answer_writed_at'=>now(),
                'status'=>"complete",
                'answer_attach_file'=>$fileReName,
            ]);
                //QnA 답변 알림
            createNotification('qna', $info->writer_id, '','1:1 문의에 답변이 등록되었습니다.', $idx);

            return redirect()->route('serviceinquiry.qa_detail', ['idx'=>$idx]);

        }
    }

    public function downloadAttachFile(Request $request){
        //첨부파일 다운
        $filename= $request->get('filename');
        $fileinfo = pathinfo($filename);
        $ext = $fileinfo['extension'];
        $headers = array( 'Content-Type: application/'.$ext);
        return response()->download(public_path('/storage/uploads/attach/'.$filename));

    }

}
