<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Notice; // model 클래스 상속

class CommunityController extends Controller{
    public function notice(Request $request) {
        // 공지사항
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

        $totalCount  = Notice::where('depth', '=', '0')
            ->where('public_yn', '=', 'Y')
            ->where('notice_yn', '!=', 'Y')
            ->count();
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

       if ( $pageNum == 1 ) { // 첫번째 페이지만 출력
       // 필독 리스트
            $totalCount_notice  = Notice::where('depth', '=', '0')
                ->where('public_yn', '=', 'Y')
                ->where('notice_yn', '=', 'Y')
                ->count();
            // 필독 게시글 갯수
            $boardList_notice = Notice::where('depth', '=', '0')
                ->where('public_yn', '=', 'Y')
                ->where('notice_yn', '=', 'Y')
                ->orderby('pos')
                ->orderby('thread')
                ->skip($startNum)
                ->take($writeList)
                ->get();

            //$writeList = $writeList - $totalCount_notice;
            //$writeList = ( $writeList < 0 ) ? 1 : $writeList;
       } else {
           $boardList_notice = array();
       }

        // 공지 게시물
        $boardList = Notice::where('depth', '=', '0')
            ->where('public_yn', '=', 'Y')
            ->where('notice_yn', '!=', 'Y')
            ->orderby('pos')
            ->orderby('thread')
            ->skip($startNum)
            ->take($writeList)
            ->get();

        // 테이블에서 가져온 DB 뷰에서 사용 할 수 있는 변수에 저장.

        $pageIndex = getPageIndex($totalCount, $pageNumList, $writeList, $pageNum);
        // 게시판 page nav

        return view('sub.community.notice', [
            'totalCount'=>$totalCount,
            'boardList'=>$boardList,
            'boardList_notice'=>$boardList_notice,
            'pageNum'=>$pageNum,
            'startPage'=>$startPage,
            'endPage'=>$endPage,
            'totalPage'=>$totalPage,
            'pageIndex'=>$pageIndex
            ]);
            // 요청된 정보 처리 후 결과 되돌려줌
    }

    public function noticeDetail(Request $request) {

        $pIdx = $request->input('pidx');

    // ** 전달 된 $ id별로 게시물 세부 정보 가져 오기 * /
    // $post = Notice::where([ 'idx' => $id])-> first ();
        // read count+1
        //Notice::where('idx', $pIdx)->update(['views'=>Notice::raw('views+1')]);
        Notice::find($pIdx)->increment('views'); // 선언된 pk

        // Read
        $read = Notice::where(['idx' => $pIdx])->first();

        return view('sub.community.notice_detail', ['boardView' => $read]);

    }

    public function trend(Request $request) {
        $pageNum     = $request->get('page', 1);
        // view에서 넘어온 현재페이지의 파라미터 값. 페이지 번호가 없으면 1, 있다면 그대로 사용
        $startNum    = ($pageNum-1)*10;
        // 페이지 내 첫 게시글 번호
        $writeList    = 9;
        // 한 페이지당 표시될 글 갯수
        $pageNumList = 10;
        // 전체 페이지 중 표시될 페이지 갯수
        $pageGroup   = ceil($pageNum/$pageNumList);
        // 페이지 그룹 번호
        $startPage   = (($pageGroup-1)*$pageNumList)+1;
        // 페이지 그룹 내 첫 페이지 번호
        $endPage     = $startPage + $pageNumList-1;
        // 페이지 그룹 내 마지막 페이지 번호
        $totalCount =  DB::select('select count(*) total_count from latest_trend where public_yn="Y"')[0]->total_count;
        // 전체 알림 갯수
        $totalPage   = ceil($totalCount/$writeList);
        // 전체 페이지 갯수
        if($endPage >= $totalPage) {
            $endPage = $totalPage;
        }
        $trendList = DB::select('select * from latest_trend where public_yn="Y" order by idx desc limit '.(($pageNum-1)*9).',  9');
        $pageIndex = getPageIndex($totalCount, $writeList, $pageNumList, $pageNum);
        return view('sub.community.insight_trend', compact( 'trendList','pageIndex'));
    }

    public function trendDetail(Request $request) {
        $idx = $request->get('id');
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
        return view('sub.community.insight_trend_detail', compact('trendInfo', 'ranking'));
    }

    public function ranking(Request $request) {
        if($request->isMethod('get')){
            $type = $request->get('type', '');

            if ($type == '' || $type == 'lecture') {
                $lectureList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY l.student_cnt DESC LIMIT 9');
                $totalCnt =DB::select('select count(*) count from lecture')[0]->count;
                return view('sub.community.insight_ranking_lecture', compact('lectureList', 'totalCnt'));
            } else if ($type == 'instructor') {
                $instructorList = DB::select('SELECT u.*, SUM(l.student_cnt) total_student, AVG(l.rating) score_avg FROM users u LEFT JOIN lecture l ON l.owner_id = u.email WHERE role = "instructor" GROUP BY u.email ORDER BY SUM(l.student_cnt) desc LIMIT 9');
                $totalCnt =DB::select('select count(*) count from users where role = "instructor"')[0]->count;
                return view('sub.community.insight_ranking_instructor', compact('instructorList','totalCnt'));
            } else if ($type == 'youtuber') {
                $youtuberList = DB::select('SELECT  sum(y.hit_cnt) sum_hit, u.* FROM users u inner join _youtube_fulldata_temp y ON u.nickname = y.channel GROUP BY CHANNEL ORDER BY sum(y.hit_cnt) desc limit 9');
                $totalCnt =DB::select('SELECT COUNT(*) count FROM users u WHERE u.nickname in (SELECT distinct channel FROM _youtube_fulldata_temp y)')[0]->count;
                return view('sub.community.insight_ranking_youtuber', compact('youtuberList', 'totalCnt'));
            }
        }
        else if($request->isMethod('post')){
            $type = $request->post('type', '');
            $sort = $request->post('sort', '');
            $cnt = $request->post('cnt', 0);
            $limit = ($cnt!=0)?' LIMIT '.$cnt.', 5':' LIMIT 9';
            $html = '';
            $result = array();
            if ($type == '' || $type == 'lecture') {
                if($sort == '수강자 수'){
                    $lectureList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY l.student_cnt DESC '.$limit);
                }else if($sort =='완강률'){
                    $lectureList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY COUNT(ml.status="complete")/l.student_cnt  DESC '.$limit);
                }else if($sort =='평점'){
                    $lectureList = DB::select('SELECT l.*,COUNT(ml.status="complete") complete_cnt FROM lecture l LEFT JOIN my_lecture ml ON l.idx = ml.lecture_idx GROUP BY l.idx ORDER BY l.rating DESC '.$limit);
                }
                try{
                    foreach($lectureList as $lecture){
                        $html .='<li class="li1">';
                        $html .='   <a href="'.route('sub.lecture.lecture_detail', ['idx' => $lecture->idx]).'" class="w1 a1">';
                        $html .='       <div class="w1w1">';
                        $html .='           <div class="w1w1w1">';
                        $html .='               <b class="g1"><span class="g1t1">'.++$cnt.'</span><span class="g1t2">위</span></b>';
                        $html .='           </div>';
                        $html .='           <div class="w1w1w2">';
                        $html .='               <div class="f1">';
                        $html .='                   <span class="f1p1">';
                        if($lecture->save_thumbnail !='')
                            $html .='                       <img src="'.asset('storage/uploads/thumbnail/'.$lecture->save_thumbnail).'" alt="★대체텍스트필수" />';
                        else{
                            $html .='                       <img src="'.asset('assets/images/main/x1/x1p010.jpg').'" alt="★대체텍스트필수" />';
                        }
                        $html .='                   </span>';
                        $html .='               </div>';
                        $html .='           </div>';
                        $html .='           <div class="w1w1w3">';
                        $html .='               <div class="t1">';
                        $html .=                    $lecture->title;
                        $html .='               </div>';
                        $html .='               <div class="t2">';
                        $html .=                    $lecture->owner_name;
                        $html .='               </div>';
                        $html .='           </div>';
                        $html .='       </div>';
                        $html .='       <div class="w1w2">';
                        $html .='           <div class="w1w2w1">';
                        $html .='               <span class="t3">완강률</span>';
                        $html .='               <span class="t4">';
                        if ($lecture->student_cnt != 0){
                        $html .=                    round(((int)$lecture->complete_cnt / $lecture->student_cnt) * 100, 0).'%';
                        } else{
                        $html .='                   0%';
                        }
                        $html .='               </span>';
                        $html .='           </div>';
                        $html .='           <div class="w1w2w2">';
                        $html .='               <span class="t3">강좌 평점</span>';
                        $html .='               <span class="t4">'.$lecture->rating.'</span>';
                        $html .='           </div>';
                        $html .='           <div class="w1w2w3">';
                        $html .='               <span class="t3">수강자 수</span>';
                        $html .='               <span class="t4">'.$lecture->student_cnt.'</span>';
                        $html .='           </div>';
                        $html .='       </div>';
                        $html .='</a>';
                        $html .='</li>';
                    }
                    $result['status'] = "success";
                    $result['html'] = $html;
                }catch(Exception $e){
                    $result['status'] = 'fail';
                    $result['msg'] = $e->getMessage();
                    $result['code'] = $e->getCode();
                }
            } else if ($type == 'instructor') {
                if($sort == '수강자 수'){
                    $instructorList =  DB::select('SELECT  u.*, SUM(l.student_cnt) total_student, AVG(l.rating) score_avg FROM users u LEFT JOIN lecture l ON l.owner_id = u.email WHERE role = "instructor" GROUP BY u.email ORDER BY SUM(l.student_cnt) desc '.$limit);
                }else if($sort =='응답률'){
                    $instructorList =  DB::select('SELECT u.*, SUM(l.student_cnt) total_student, AVG(l.rating) score_avg FROM users u LEFT JOIN lecture l ON l.owner_id = u.email WHERE role = "instructor" GROUP BY u.email ORDER BY SUM(l.student_cnt) desc '.$limit);
                }else if($sort =='평점'){
                    $instructorList = DB::select('SELECT u.*, SUM(l.student_cnt) total_student, AVG(l.rating) score_avg FROM users u LEFT JOIN lecture l ON l.owner_id = u.email WHERE role = "instructor" GROUP BY u.email ORDER BY  AVG(l.rating) desc '.$limit);
                }
                try{
                    foreach($instructorList as $instructor){
                        $html .= '<li class="li1">';
                        $html .= '	 <a href="'.route('etc.user_introduction', ['type'=>'instructor', 'user_idx'=>$instructor->id]).'" class="w1 a1">';
                        $html .= '		<div class="w1w1">';
                        $html .= '			<div class="w1w1w1">';
                        $html .= '				<b class="g1"><span class="g1t1">'.++$cnt.'</span><span class="g1t2">위</span></b>';
                        $html .= '			</div>';
                        $html .= '			<div class="w1w1w2">';
                        $html .= '				<div class="f1">';
                        $html .= '					<span class="f1p1">';
                        if($instructor->save_profile_image!=''){
                            $html .= '                  <img src="'.asset('storage/uploads/profile/'.$instructor->save_profile_image).'" alt="이미지 없음" />';
                        }else{
                            $html .= '                  <img src="'.asset('assets/images/lib/noimg1face1.png').'" alt="이미지 없음" />';
                        }
                        $html .= '					</span>';
                        $html .= '				</div>';
                        $html .= '			</div>';
                        $html .= '			<div class="w1w1w3">';
                        $html .= '				<div class="t1">';
                        $html .=                    $instructor->nickname;
                        $html .= '				</div>';
                        $html .= '				<div class="t2">';
                        $html .=    			    $instructor->introduction;
                        $html .= '				</div>';
                        $html .= '			</div>';
                        $html .= '		</div>';
                        $html .= '		<div class="w1w2">';
                        $html .= '			<div class="w1w2w1">';
                        $html .= '				<span class="t3">강좌 평균 평점</span>';
                        $html .= '				<span class="t4">';
                        $html .=                    ($instructor->score_avg!='')? number_format($instructor->score_avg, 1):'-';
                        $html .= '              </span>';
                        $html .= '			</div>';
                        $html .= '			<div class="w1w2w2">';
                        $html .= '				<span class="t3">수강자 수</span>';
                        $html .= '				<span class="t4">';
                        $html .=                    ($instructor->total_student!='')? $instructor->total_student:'0';
                        $html .= '              </span>';
                        $html .= '			</div>';
                        $html .= '			<div class="w1w2w3">';
                        $html .= '				<span class="t3">응답률</span>';
                        $html .= '				<span class="t4">-</span>';
                        $html .= '			</div>';
                        $html .= '		</div>';
                        $html .= '	</a>';
                        $html .= '</li>';
                    }
                    $result['status'] = "success";
                    $result['html'] = $html;
                }catch(Exception $e){
                    $result['status'] = 'fail';
                    $result['msg'] = $e->getMessage();
                    $result['code'] = $e->getCode();
                }
            } else if ($type == 'youtuber') {
                if($sort == '유튜브 조회수'){
                    $youtuberList =  DB::select('SELECT  sum(y.hit_cnt) sum_hit, u.* FROM users u inner join _youtube_fulldata_temp y ON u.nickname = y.channel GROUP BY CHANNEL ORDER BY sum(y.hit_cnt) desc '.$limit);
                }else if($sort =='두런 조회수'){
                    $youtuberList =   DB::select('SELECT  sum(y.hit_cnt) sum_hit, u.* FROM users u inner join _youtube_fulldata_temp y ON u.nickname = y.channel GROUP BY CHANNEL '.$limit);
                }else if($sort =='평점'){
                    $youtuberList =   DB::select('SELECT  sum(y.hit_cnt) sum_hit, u.* FROM users u inner join _youtube_fulldata_temp y ON u.nickname = y.channel GROUP BY CHANNEL '.$limit);
                } try{
                    foreach($youtuberList as $youtuber){
                        $html .= '<li class="li1">';
                        $html .= '	<a href="'.route('etc.user_introduction', ['type'=>'youtuber', 'user_idx'=>$youtuber->id]).'" class="w1 a1">';
                        $html .= '		<div class="w1w1">';
                        $html .= '			<div class="w1w1w1">';
                        $html .= '				<b class="g1"><span class="g1t1">'.++$cnt.'</span><span class="g1t2">위</span></b>';
                        $html .= '			</div>';
                        $html .= '			<div class="w1w1w2">';
                        $html .= '				<div class="f1">';
                        $html .= '					<span class="f1p1">';
                        if ($youtuber->save_profile_image!=''){
                            $html .= '                  <img src="'.asset('storage/uploads/profile/'.$youtuber->save_profile_image).'" alt="이미지 없음" />';
                        } else{
                            $html .= '                  <img src="'.asset('assets/images/lib/noimg1face1.png').'" alt="이미지 없음" />';
                        }
                        $html .= '					</span>';
                        $html .= '				</div>';
                        $html .= '			</div>';
                        $html .= '			<div class="w1w1w3">';
                        $html .= '				<div class="t1">';
                        $html .= 					$youtuber->nickname;
                        $html .= '				</div>';
                        $html .= '				<div class="t2">';
                        $html .= 					$youtuber->introduction;
                        $html .= '				</div>';
                        $html .= '			</div>';
                        $html .= '		</div>';
                        $html .= '		<div class="w1w2">';
                        $html .= '			<div class="w1w2w1">';
                        $html .= '				<span class="t3">채널 평점</span>';
                        $html .= '				<span class="t4">-</span>';
                        $html .= '			</div>';
                        $html .= '			<div class="w1w2w2">';
                        $html .= '				<span class="t3">YouTube 조회수</span>';
                        $html .= '				<span class="t4">';
                        $html .= (strlen($youtuber->sum_hit)>4)?number_format($youtuber->sum_hit/10000, 1).'만':number_format($youtuber->sum_hit/10000, 1) ;
                        $html .= '</span>';
                        $html .= '			</div>';
                        $html .= '			<div class="w1w2w3">';
                        $html .= '				<span class="t3">두런 조회수</span>';
                        $html .= '				<span class="t4">-</span>';
                        $html .= '			</div>';
                        $html .= '		</div>';
                        $html .= '	</a>';
                        $html .= '</li>';
                    }
                    $result['status'] = "success";
                    $result['html'] = $html;
                }catch(Exception $e){
                    $result['status'] = 'fail';
                    $result['msg'] = $e->getMessage();
                    $result['code'] = $e->getCode();
                }
            }
            return response()->json($result, 200);
        }

    }

    public function serviceQna(Request $request) {
        if($request->isMethod('get')){
            $faqPage = $request->get('faqpage', 1);
            //현재 faq 페이지
            $faqTotalCount=DB::select('select count(*) count from faq where public_yn="Y"')[0]->count;
            $faqList = DB::select('select f.*, a.nickname adminname from faq f, admin a where a.idx = f.writer_id and public_yn="Y" order by idx desc limit 0,10');

            $faqPageHtml = pagenationToAjax($faqPage, $faqTotalCount); //faq 페이지네이션

            if(Auth::check()){//로그인이 되어있을 경우 qna 출력
                $qnaPage = $request->get('qnaPage', 1);
                //현재 qna 페이지
                $qaList = DB::select('select idx, status, question_title, question_writed_at from qna where writer_id = ? order by idx desc limit 10', [Auth::user()->email]);
                $qnaTotalCount = DB::select('select count(*) count from qna where writer_id = ?', [Auth::user()->email])[0]->count;

                $qnaPageHtml = pagenationToAjax($qnaPage, $qnaTotalCount);
                //qna페이지네이션
            }
            return view('sub.community.service_qna',  compact('qaList', 'faqList','faqPageHtml','qnaPageHtml'));
        }else if($request->isMethod('post')){
            $status = $request->post('status');
            if($status =='faq'){
                //faq 페이지가 바뀐 경우

                $faqPage = $request->post('faqpage', 1);
                $type = $request->post('tab');

                if($type=='all'){
                    $faqList = DB::select('select f.*, a.nickname adminname from faq f, admin a where a.idx = f.writer_id and public_yn="Y"  order by idx desc limit '.(($faqPage-1)*10).',10');
                    $faqTotalCount=DB::select('select count(*) count from faq where public_yn="Y"')[0]->count;
                    // 총 faq 데이터 수
                }else{
                    $faqList = DB::select('select f.*, a.nickname adminname from faq f, admin a where a.idx = f.writer_id and public_yn="Y" and division=? order by idx desc limit '.(($faqPage-1)*10).',10', [$type]);
                    $faqTotalCount=DB::select('select count(*) count from faq where public_yn="Y" and division = ?',[$type])[0]->count;
                    // 총 faq 데이터 수
                }
                $faqPageHtml = pagenationToAjax($faqPage, $faqTotalCount);

                $faqListHtml ='';
                $faqListHtml.='<ul class="dl1">';
                foreach ($faqList as $faq){
                    $faqListHtml.='    <li class="di1">';
                    $faqListHtml.='        <a href="javascript:void(0);" class="dt1">';
                    $faqListHtml.=            $faq->title;
                    $faqListHtml.='        </a>';
                    $faqListHtml.='        <div class="dd1">';
                    $faqListHtml.='            <div class="attach1">';
                    if($faq->attach_file!=null){
                        foreach (explode(',', $faq->attach_file) as $file){
                        $faqListHtml.='            <ul>';
                        $faqListHtml.='                <li>';
                        $faqListHtml.='                    <a href="'.asset('storage/uploads/attach/'.$file).'" class="filename">'.$file.'</a>';
                        $faqListHtml.='                    <a href="javascript:void(0)" title="바로보기 [새 창]" class="b1 quickview" onclick = window.open("'.asset('storage/uploads/attach/'.$file).'", "_blank")><i class="ic1"></i> 바로보기</a>';
                        $faqListHtml.='                </li>';
                        $faqListHtml.='            </ul>';

                        }
                    }
                    $faqListHtml.='            </div>';
                    $faqListHtml.=            $faq->content;
                    $faqListHtml.='        </div>';
                    $faqListHtml.='    </li>';
                }
                $faqListHtml.='</ul>';

                $result['faqListHtml']=$faqListHtml;
                $result['faqPageHtml']=$faqPageHtml;

            }else{
                //qna 페이지가 변한경우
                $qnaPage = $request->post('qnaPage', 1);

                if(Auth::check()){
                    $qaList = DB::select('select idx, status, question_title, question_writed_at from qna where writer_id = ? order by idx desc limit '.(($qnaPage-1)*10).', 10', [Auth::user()->email]);
                    $qnaTotalCount = DB::select('select count(*) count from qna where writer_id = ?', [Auth::user()->email])[0]->count;
                    $qnaPageHtml = pagenationToAjax($qnaPage, $qnaTotalCount);
                    $qnaListHtml ='';
                    foreach ($qaList as $qa){

                        $qnaListHtml.='<tr>';
                        if ($qa->status =="active"){
                            $qnaListHtml.='<td><i class="button w5em small primary1">대기중</i></td>';
                        }else{
                            $qnaListHtml.='<td><i class="button w5em small gray4">답변완료</i></td>';
                        }
                        $qnaListHtml.='<td><a href="'.route('sub.community.one_to_one_detail', ['idx' => $qa->idx ]).'">'.$qa->question_title.'</a></td>';
                        $qnaListHtml.='<td>'.date('Y.m.d', strtotime($qa->question_writed_at)).'</td>';
                        $qnaListHtml.='</tr>';
                    }
                    if (count($qaList)==0)
                    $qnaListHtml='<div>문의 내역이 없습니다.</div>';
                }

                $result['qnaListHtml']=$qnaListHtml;
                $result['qnaPageHtml']=$qnaPageHtml;

            }
            return response()->json($result, 200);
        }
    }

    public function getServiceQnaData(Request $request) {
        $type = $request->post('type', '');
        $resData = '';

        try {
            $result['status'] = 'success';

        } catch(Exception $e) {
            $result['status'] = 'fail';
            $result['msg'] = $e->getMessage();
            $result['code'] = $e->getCode();
        } finally {
            $result['resData'] = $resData;

            return response()->json($result);
        }
    }

    public function oneToOne(Request $request) {
        if($request->isMethod('post')){
            $selectedName = $request->post('selectedName');
            $file = $request->file("file");

            $fileReName = '';
            if($file){
                $fileIdx =storeAttachFile($file);
                $fileReName =$fileIdx['fileReName'];
            }
            $title = $request->post('title');
            $content = $request->post('content');
            if($selectedName=="★1radio0e0"){
                $type = "basic";
            }else if($selectedName=="★1radio0e1"){
                $type = "lecture";
            }else if($selectedName=="★1radio0e2"){
                $type = "video";
            }else if($selectedName=="★1radio0e3"){
                $type = "teach";
            }else{
                $type = "etc";
            }
            $idx =DB::table('qna')->insert(array(
                'writer_id'=>Auth::user()->email,
                'type'=>$type,
                'question_title'=>$title,
                'question_content'=>$content,
                'question_writed_at'=>now(),
                'status'=>'active',
                'question_attach_file'=>$fileReName
            ));
            //QnA 답변 알림
            createNotification('qna', Auth::user()->email, '','1:1 문의가 등록되었습니다.', '');


            return redirect()->route('sub.community.service_qna');
        }else{
            return view('sub.community.one_to_one');
        }
    }

    public function oneToOneDetail(Request $request) {
        $idx = $request->get('idx');
        $qaInfo = DB::select('select * from qna where idx = ?', [$idx])[0];

        return view('sub.community.one_to_one_detail', compact('qaInfo'));
    }

    public function reviewAll(Request $request) {
        $keyword = $request->get('keyword', '');
        $query = '';
        $where = '';

        if ($keyword != '') {
            $where = ' AND content LIKE "%'.$keyword.'%"';
        }

        $query = 'SELECT rev.*, lec.idx AS lecutre_idx, lec.title, lec.save_thumbnail
                    FROM lecture_review rev, lecture lec
                    WHERE rev.lecture_idx = lec.idx'.$where.'
                    ORDER BY rev.writed_at DESC
                    LIMIT 5';

        $reviewList = DB::select($query);

        return view('sub.community.review_all', compact('reviewList'));
    }
}
