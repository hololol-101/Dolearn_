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
            $faqlist = DB::select('select f.*, a.nickname adminname from faq f, admin a where a.idx = f.writer_id  order by idx desc limit '.$startNum.' ,'.$writeList);

            $pageIndex = getPageIndex($totalCount, $writeList, $pageNumList, $pageNum);

            return view('doadm.FAQ.index', compact('faqlist', 'pageIndex'));
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
            return redirect()->route('serviceinquiry.faq.detail', compact('idx'));


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
            return redirect()->route('serviceinquiry.faq.index');

        }
    }
    public function faqDelete(Request $request){
        //FAQ 삭제
        $idx = $request->get('idx');
        DB::delete('delete from faq where idx = ?', [$idx]);
        return redirect()->route('serviceinquiry.faq.index');
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
        $fileArray = explode(',', $qaInfo->answer_attach_file);
        return view('doadm.Q&A.read', compact('qaInfo', 'fileArray'));
    }

    public function qaAnswer(Request $request){
        //QNA 답변
        if($request->isMethod('get')){
            //답변 보여주기
            $idx = $request->get('idx');
            $title = $request->get('title');
            $status = $request->get('status');
            $qaInfo = DB::select('select * from qna where idx = ?', [$idx])[0];
            $fileArray = explode(',', $qaInfo->answer_attach_file);
            return view('doadm.Q&A.form', compact('qaInfo', 'status', 'fileArray'));
        }else{
            $idx = $request->post('idx');
            $content = $request->post('iContent');

            $fileReName=null;
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

            //정보 조회
            $info = DB::select('select writer_id, status from qna where idx = ?', [$idx])[0];

            //답변 등록
            DB::table('qna')->where('idx', $idx)->update([
                'admin_id'=>0,
                'answer_content'=>$content,
                'answer_writed_at'=>now(),
                'status'=>"complete",
                'answer_attach_file'=>$files,
            ]);
            //QnA 답변 알림
            createNotification('qna', $info->writer_id, '','1:1 문의에 답변이 등록되었습니다.', '');

            return redirect()->route('serviceinquiry.qna.detail', ['idx'=>$idx]);
        }
    }
    public function qaAnswerEdit(Request $request){
        $idx = $request->post('idx');
        $content = $request->post('iContent');

        $fileReName=null;
        $fileArray = array();

        //기존에 있던 파일 중 삭제되지 않은 파일
        for($fcnt=0; $fcnt<3; $fcnt++){
            $filename = $request->post('answer_attach_file_name'.$fcnt);
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


        //정보 조회
        $info = DB::select('select writer_id, status from qna where idx = ?', [$idx])[0];

        //답변 등록
        DB::table('qna')->where('idx', $idx)->update([
            'admin_id'=>0,
            'answer_content'=>$content,
            'answer_writed_at'=>now(),
            'status'=>"complete",
            'answer_attach_file'=>$files,
        ]);
            //QnA 답변 알림
        createNotification('qna', $info->writer_id, '','1:1 문의에 답변이 등록되었습니다.', $idx);

        return redirect()->route('serviceinquiry.qna.detail', ['idx'=>$idx]);
    }
    public function trendIndex(Request $request){
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
        $totalCount  = DB::select('select count(*) count from latest_trend l, admin a where a.idx = l.writer_id')[0]->count;
        // 전체 게시글 갯수
        $totalPage   = ceil($totalCount/$writeList);
        // 전체 페이지 갯수
        if($endPage >= $totalPage) {
        $endPage = $totalPage;
        }
        $trendList = DB::select('select l.idx, l.title, l.writed_at, l.public_yn, a.nickname adminname from latest_trend l, admin a where a.idx = l.writer_id order by idx desc limit '.$startNum.' , '.$writeList);
        $pageIndex = getPageIndex($totalCount, $writeList, $pageNumList, $pageNum);
        return view('doadm.trend.index', compact('trendList', 'pageIndex'));
    }
    public function trendCreate(Request $request){
        if($request->isMethod('get')){
            return view('doadm.trend.form');
        }else{
            $title =$request->post('iSubject');
            $summary =$request->post('iSummary');
            $content =$request->post('iContent');
            $writerId =3;
            $publicYn =$request->post('iPublic');
            $imageStoreName = '';
            $ranking = array();
            for($i=0;$i<5;$i++){
                $arr['writer_name'] = $request->post('iRankingName'.$i);
                $arr['explain'] = $request->post('iRanking'.$i);
                $arr['youtubeExp'] =$request->post('iRankingYoutube'.$i);
                $url =$request->post('iRankingUrl'.$i);
                $urlsplit = explode('=', $url);
                $arr['videoId'] =$urlsplit[count($urlsplit)-1];
                array_push($ranking, implode("|", $arr));
            }

            //이미지 저장
            if($request->file('imageFile')){
                $imagePath = $request->file('imageFile');
                $imageNameWithExtension = $imagePath->getClientOriginalName();
                $imageName = pathinfo($imageNameWithExtension, PATHINFO_FILENAME);
                $extension = $imagePath->getClientOriginalExtension();

                $allowType = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

                if (!in_array(strtolower($extension), $allowType)) {
                    $result['status'] = 'imgfail';
                    $result['msg'] = '이미지 파일만 업로드가 가능합니다.';

                    return redirect()->back();
                }
                $imageStoreName = $imageName.'_'.time().'.'.$extension;
                $request->file('imageFile')->storeAs('uploads/thumbnail/', $imageStoreName);

                $result['status'] = 'success';
                $result['msg'] = '이미지 업로드가 완료되었습니다.';
                $result['fileName'] = $imageStoreName;
                $result['savePath'] = asset('storage/thumbnail/profile/'.$imageStoreName);
            }
            else {
                $result['status'] = 'fail';
                $result['msg'] = '이미지 업로드에 실패했습니다.';
            }

            DB::table('latest_trend')->insert(array(
                'title'=>$title,
                'summary'=>$summary,
                'content'=>$content,
                'writer_id'=>$writerId,
                'main_image'=>$imageStoreName,
                'writed_at'=>now(),
                'public_yn'=>$publicYn,
                'ranking0'=>$ranking[0],
                'ranking1'=>$ranking[1],
                'ranking2'=>$ranking[2],
                'ranking3'=>$ranking[3],
                'ranking4'=>$ranking[4]
            ));
            return redirect()->route('serviceinquiry.trend.index');
        }
    }
    public function trendEdit(Request $request){
        if($request->isMethod('get')){
            $idx = $request->get('idx');
            $trendInfo = DB::select('select * from latest_trend where idx = ?', [$idx])[0];
            $status = "edit";
            $rankerArr = array();
            $rankerArr[0] = explode('|', $trendInfo->ranking0);
            $rankerArr[1] = explode('|', $trendInfo->ranking1);
            $rankerArr[2] = explode('|', $trendInfo->ranking2);
            $rankerArr[3] = explode('|', $trendInfo->ranking3);
            $rankerArr[4] = explode('|', $trendInfo->ranking4);

            return view('doadm.trend.form', compact('trendInfo', 'status', 'rankerArr'));
        }else if($request->isMethod('post')){
            $idx = $request->post('idx');
            $mainImage = $request->post('main_image');
            $title =$request->post('iSubject');
            $summary =$request->post('iSummary');
            $content =$request->post('iContent');
            $writerId =3;
            $publicYn =$request->post('iPublic');
            $imageStoreName = '';
            $ranking = array();
            for($i=0;$i<5;$i++){
                $arr['writer_name'] = $request->post('iRankingName'.$i);
                $arr['explain'] = $request->post('iRanking'.$i);
                $arr['youtubeExp'] =$request->post('iRankingYoutube'.$i);
                $url =$request->post('iRankingUrl'.$i);
                $urlsplit = explode('=', $url);
                $arr['videoId'] =$urlsplit[count($urlsplit)-1];
                array_push($ranking, implode("|", $arr));
            }
            if($mainImage!=null){
                $imageStoreName =$mainImage;
            }
            //이미지 저장
            if($request->file('imageFile')){
                $imagePath = $request->file('imageFile');
                $imageNameWithExtension = $imagePath->getClientOriginalName();
                $imageName = pathinfo($imageNameWithExtension, PATHINFO_FILENAME);
                $extension = $imagePath->getClientOriginalExtension();

                $allowType = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

                if (!in_array(strtolower($extension), $allowType)) {
                    $result['status'] = 'imgfail';
                    $result['msg'] = '이미지 파일만 업로드가 가능합니다.';

                    return redirect()->back();
                }
                $imageStoreName = $imageName.'_'.time().'.'.$extension;
                $request->file('imageFile')->storeAs('uploads/thumbnail/', $imageStoreName);

                $result['status'] = 'success';
                $result['msg'] = '이미지 업로드가 완료되었습니다.';
                $result['fileName'] = $imageStoreName;
                $result['savePath'] = asset('storage/thumbnail/profile/'.$imageStoreName);
            }


            DB::table('latest_trend')->where('idx', $idx)->update(array(
                'title'=>$title,
                'summary'=>$summary,
                'content'=>$content,
                'writer_id'=>$writerId,
                'main_image'=>$imageStoreName,
                'writed_at'=>now(),
                'public_yn'=>$publicYn,
                'ranking0'=>$ranking[0],
                'ranking1'=>$ranking[1],
                'ranking2'=>$ranking[2],
                'ranking3'=>$ranking[3],
                'ranking4'=>$ranking[4]
            ));
            return redirect()->route('serviceinquiry.trend.detail', ['idx'=>$idx]);
        }
    }
    public function trendDelete(Request $request){
        $idx = $request->get('idx');
        DB::delete('delete from latest_trend where idx = ?', [$idx]);
        return redirect()->route('serviceinquiry.trend.index');
    }
    public function trendDetail(Request $request){
        $idx = $request->get('idx');
        $trendInfo = DB::select('SELECT l.*, a.nickname adminName from latest_trend l, admin a WHERE l.idx = ? AND a.idx = l.writer_id', [$idx])[0];
        $rank[0]=$trendInfo->ranking0;
        $rank[1]=$trendInfo->ranking1;
        $rank[2]=$trendInfo->ranking2;
        $rank[3]=$trendInfo->ranking3;
        $rank[4]=$trendInfo->ranking4;

        for($idx=0;$idx<5;$idx++){
            $arr = explode('|', $rank[$idx]);
            if(count($arr)>1){
                $ranking[$idx]['writer_name']=$arr[0];
                $ranking[$idx]['explain']=$arr[1];
                $ranking[$idx]['youtubeExp']=$arr[2];
                $ranking[$idx]['youtubeId']=$arr[3];
                $name = $ranking[$idx]['writer_name'];

                $rankerInfo = DB::select('select * from users where nickname = ?', [$name])[0];
                $ranking[$idx]['rIdx']=$rankerInfo->id;
                $ranking[$idx]['rName']=$rankerInfo->nickname;
                $ranking[$idx]['rImage']=$rankerInfo->save_profile_image;
                $ranking[$idx]['role']=$rankerInfo->role;

            }
        }
        return view('doadm.trend.read', compact('trendInfo', 'ranking'));
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
