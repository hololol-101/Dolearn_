<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $postId = $request->get('noticeId');
        //게시글 id
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
        $count =  DB::select('select count(*) total_count from comment c where c.post_id = ? and c.is_reply = "N"  and c.status!="delete" order by idx desc', [$postId])[0];
        // //알림 수 조회 query
        $totalCount  =$count->total_count;
        // 전체 알림 갯수
        $totalPage   = ceil($totalCount/$writeList);
        // 전체 페이지 갯수


        $commentList = DB::select('select * from comment c join users u on c.writer_id = u.email where c.post_id = ? and c.is_reply = "N"  and c.status!="delete" order by idx desc limit '.$startNum.' ,'.$writeList, [$postId]);

        //commentList에 있는 대댓글 조회
        $inIdx ='';
        if(count($commentList)>0){
            $inIdx .= " and parent_reply_id IN (".$commentList[0]->idx;
            for($i =1; $i<count($commentList); $i++){
                $inIdx .= ",".$commentList[$i]->idx;
            }
            $inIdx.=") ";
        }
        $recommentList = DB::select('select * from comment c join users u on c.writer_id = u.email where c.post_id = ? and c.is_reply = "Y"  and c.status!="delete" '.$inIdx.'order by idx desc', [$postId]);

        $html = '';
        foreach($commentList as $comment){
            $html.= '<div class="w1 item reply">';
            $html.='    <div class="w1w1">';
            $html.='        <div class="f1">';
            $html.='            <span class="f1p1">';
            if($comment->save_profile_image!='')
            $html.='                <img src="'.asset('storage/uploads/profile/'.$comment->save_profile_image).'" alt="이미지 없음" />';
            else $html.='                <img src="'.asset('assets/images/lib/noimg1face1.png').'" alt="이미지 없음" />';
            $html.='            </span>';
            $html.='        </div>';
            $html.='    </div>';
            $html.='    <div class="w1w2">';
            $html.='        <div class="tg1">';
            $html.='            <span class="t1">'.$comment->nickname.'</span>';
            $html.='            <span class="t2">'.format_date($comment->writed_at).'</span>';
            $html.='        </div>';
            $html.='        <div class="tg2">';
            $html.=             $comment->content;
            $html.='        </div>';
            $html.='        <div class="eg1">';
            $html.='            <a href="javascript:void(0)" class="cp1like2" onclick="likeClick(this)" data-value="comment"><span class="cp1like2t1 blind">좋아요</span> <span class="cp1like2t2">'.$comment->likes.'</span></a>';
            $html.='            <!-- cp1menu1 -->';
            $html.='            <div class="cp1menu1 toggle1s1">';
            $html.='                <strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>';
            $html.='                <div class="cp1menu1c toggle-c">';
            $html.='                    <a href="javascript:void(0)" rel="noopener" title="새 창" class="b2 report" onclick="reportClick(this)"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>';
            $html.='                </div>';
            $html.='            </div>';
            $html.='            <!-- /cp1menu1 -->';
            $html.='        </div>';
            $html.='        <!-- toggle1s1 -->';
            $html.='        <div class="toggle1s1">';
            $html.='            <a href="#★" class="b1 toggle-b fsS2">답글</a>';
            $html.='             <div class="toggle-c" style="display: none;">';
            $html.='                <textarea rows="3" cols="80" title="대댓글작성"></textarea>';
            $html.='                 <div class="tar">';
            $html.='                    <input type="hidden" value="'.$comment->idx.'">';
            $html.='                    <button type="button" class="button toggle-close secondary semismall mgr05em">취소</button>';
            $html.='                    <button type="button" class="button submit semismall" onClick="enrollEvent(this)" value="Y">등록</button>';
            $html.='                </div>';
            $html.='            </div>';
            $html.='        </div>';
            $keys = array_keys( array_column($recommentList, 'parent_reply_id'),  $comment->idx);
            if(count($keys)>0){
                $html.='<div class="toggle1s2">';
                $html.='    <a href="#★" class="b1 toggle1s2-b cp1switch2 switch fsS2">';
                $html.='        <span class="cp1switch2-t1 sw-off">답글 보기</span>';
                $html.='        <span class="cp1switch2-t1 sw-on">답글 숨기기</span>';
                $html.='        <i class="ic1"></i>';
                $html.='    </a>';
                $html.='    <div class="toggle1s2-c" style="display: none;">';

                foreach($keys as $key){
                    $html.='        <div class="w1 item reply2">';
                    $html.='            <div class="w1w1">';
                    $html.='                <div class="f1">';
                    $html.='                    <span class="f1p1">';
                    if($recommentList[$key]->save_profile_image!='')
                    $html.='                <img src="'.asset('storage/uploads/profile/'.$recommentList[$key]->save_profile_image).'" alt="이미지 없음" />';
                    else $html.='                <img src="'.asset('assets/images/lib/noimg1face1.png').'" alt="이미지 없음" />';
                    $html.='                    </span>';
                    $html.='                </div>';
                    $html.='            </div>';
                    $html.='            <div class="w1w2">';
                    $html.='                <div class="tg1">';
                    $html.='            <span class="t1">'.$recommentList[$key]->nickname.'</span>';
                    $html.='            <span class="t2">'.format_date($recommentList[$key]->writed_at).'</span>';
                    $html.='                </div>';
                    $html.='                <div class="tg2">';
                    $html.=             $recommentList[$key]->content;
                    $html.='                </div>';
                    $html.='                <div class="eg1">';
                    $html.='                    <input type="hidden" value="'.$recommentList[$key]->idx.'">';
                    $html.='                    <a href="javascript:void(0)" class="cp1like2" onclick="likeClick(this)" data-value="recomment"><span class="cp1like2t1 blind">좋아요</span> <span class="cp1like2t2">'.$recommentList[$key]->likes.'</span></a>';
                    $html.='                    <!-- cp1menu1 -->';
                    $html.='                    <div class="cp1menu1 toggle1s1">';
                    $html.='                        <strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>';
                    $html.='                        <div class="cp1menu1c toggle-c">';
                    $html.='                            <a href="javascript:void(0)" rel="noopener" title="새 창" class="b2 report" onclick="reportClick(this)"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>';
                    $html.='                        </div>';
                    $html.='                    </div>';
                    $html.='                    <!-- /cp1menu1 -->';
                    $html.='                </div>';
                    $html.='            </div>';
                    $html.='        </div>';
                    $html.='        <!-- /대댓글 -->';
                }
                $html.='    </div>';
                $html.='</div>';

            }
            $html.='    </div>';
            $html.='</div>';

        }
        $result['html'] = $html;
        $result['status'] = "success";

        $result['pageIndex'] = getPageIndexInAjax($totalCount, $writeList, $pageNumList, $pageNum, $_SERVER["HTTP_REFERER"]);

        return response()->json($result, 200);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $postId = $request->post('noticeId');
        $parentId =$request->post('parentId');
        $content = $request->post('content');
        $isReply = $request->post('isReply');
        $pageNum = $request->post('page', 1);
        // view에서 넘어온 현재페이지의 파라미터 값. 페이지 번호가 없으면 1, 있다면 그대로 사용

        DB::table('comment')->insert(array(
            'post_id'=>$postId,
            'writer_id'=>Auth::user()->email,
            'parent_reply_id'=>$parentId,
            'content'=>$content,
            'writed_at'=>now(),
            'is_reply'=>$isReply,
            'status'=>'active'
        ));

        $startNum    = ($pageNum-1)*10;
        // 페이지 내 첫 게시글 번호
        $writeList    = 10;
        // 한 페이지당 표시될 글 갯수
        $pageNumList = 10;
        // 전체 페이지 중 표시될 페이지 갯수
        $pageGroup   = ceil($pageNum/$pageNumList);
        // 페이지 그룹 번호
        $count =  DB::select('select count(*) total_count from comment c where c.post_id = ? and c.is_reply = "N"  and c.status!="delete" order by idx desc', [$postId])[0];
        // //알림 수 조회 query
        $totalCount  =$count->total_count;
        // 전체 알림 갯수
        $totalPage   = ceil($totalCount/$writeList);
        // 전체 페이지 갯수


        $commentList = DB::select('select * from comment c join users u on c.writer_id = u.email where c.post_id = ? and c.is_reply = "N"  and c.status!="delete" order by idx desc limit '.$startNum.' ,'.$writeList, [$postId]);

        //commentList에 있는 대댓글 조회
        $inIdx ='';
        if(count($commentList)>0){
            $inIdx .= " and parent_reply_id IN (".$commentList[0]->idx;
            for($i =1; $i<count($commentList); $i++){
                $inIdx .= ",".$commentList[$i]->idx;
            }
            $inIdx.=") ";
        }
        $recommentList = DB::select('select * from comment c join users u on c.writer_id = u.email where c.post_id = ? and c.is_reply = "Y"  and c.status!="delete" '.$inIdx.'order by idx desc', [$postId]);

        $html = '';
        foreach($commentList as $comment){
            $html.= '<div class="w1 item reply">';
            $html.='    <div class="w1w1">';
            $html.='        <div class="f1">';
            $html.='            <span class="f1p1">';
            if($comment->save_profile_image!='')
            $html.='                <img src="'.asset('storage/uploads/profile/'.$comment->save_profile_image).'" alt="이미지 없음" />';
            else $html.='                <img src="'.asset('assets/images/lib/noimg1face1.png').'" alt="이미지 없음" />';
            $html.='            </span>';
            $html.='        </div>';
            $html.='    </div>';
            $html.='    <div class="w1w2">';
            $html.='        <div class="tg1">';
            $html.='            <span class="t1">'.$comment->nickname.'</span>';
            $html.='            <span class="t2">'.format_date($comment->writed_at).'</span>';
            $html.='        </div>';
            $html.='        <div class="tg2">';
            $html.=             $comment->content;
            $html.='        </div>';
            $html.='        <div class="eg1">';
            $html.='            <a href="javascript:void(0)" class="cp1like2" onclick="likeClick(this)" data-value="comment"><span class="cp1like2t1 blind">좋아요</span> <span class="cp1like2t2">'.$comment->likes.'</span></a>';
            $html.='            <!-- cp1menu1 -->';
            $html.='            <div class="cp1menu1 toggle1s1">';
            $html.='                <strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>';
            $html.='                <div class="cp1menu1c toggle-c">';
            $html.='                    <a href="javascript:void(0)" rel="noopener" title="새 창" class="b2 report" onclick="reportClick(this)"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>';
            $html.='                </div>';
            $html.='            </div>';
            $html.='            <!-- /cp1menu1 -->';
            $html.='        </div>';
            $html.='        <!-- toggle1s1 -->';
            $html.='        <div class="toggle1s1">';
            $html.='            <a href="#★" class="b1 toggle-b fsS2">답글</a>';
            $html.='             <div class="toggle-c" style="display: none;">';
            $html.='                <textarea rows="3" cols="80" title="대댓글작성"></textarea>';
            $html.='                 <div class="tar">';
            $html.='                    <input type="hidden" value="'.$comment->idx.'">';
            $html.='                    <button type="button" class="button toggle-close secondary semismall mgr05em">취소</button>';
            $html.='                    <button type="button" class="button submit semismall" onClick="enrollEvent(this)" value="Y">등록</button>';
            $html.='                </div>';
            $html.='            </div>';
            $html.='        </div>';
            $keys = array_keys( array_column($recommentList, 'parent_reply_id'),  $comment->idx);
            if(count($keys)>0){
                $html.='<div class="toggle1s2">';
                $html.='    <a href="#★" class="b1 toggle1s2-b cp1switch2 switch fsS2">';
                $html.='        <span class="cp1switch2-t1 sw-off">답글 보기</span>';
                $html.='        <span class="cp1switch2-t1 sw-on">답글 숨기기</span>';
                $html.='        <i class="ic1"></i>';
                $html.='    </a>';
                $html.='    <div class="toggle1s2-c" style="display: none;">';

                foreach($keys as $key){
                    $html.='        <div class="w1 item reply2">';
                    $html.='            <div class="w1w1">';
                    $html.='                <div class="f1">';
                    $html.='                    <span class="f1p1">';
                    if($recommentList[$key]->save_profile_image!='')
                    $html.='                <img src="'.asset('storage/uploads/profile/'.$recommentList[$key]->save_profile_image).'" alt="이미지 없음" />';
                    else $html.='                <img src="'.asset('assets/images/lib/noimg1face1.png').'" alt="이미지 없음" />';
                    $html.='                    </span>';
                    $html.='                </div>';
                    $html.='            </div>';
                    $html.='            <div class="w1w2">';
                    $html.='                <div class="tg1">';
                    $html.='            <span class="t1">'.$recommentList[$key]->nickname.'</span>';
                    $html.='            <span class="t2">'.format_date($recommentList[$key]->writed_at).'</span>';
                    $html.='                </div>';
                    $html.='                <div class="tg2">';
                    $html.=             $recommentList[$key]->content;
                    $html.='                </div>';
                    $html.='                <div class="eg1">';
                    $html.='                    <input type="hidden" value="'.$recommentList[$key]->idx.'">';
                    $html.='                    <a href="javascript:void(0)" class="cp1like2" onclick="likeClick(this)" data-value="recomment"><span class="cp1like2t1 blind">좋아요</span> <span class="cp1like2t2">'.$recommentList[$key]->likes.'</span></a>';
                    $html.='                    <!-- cp1menu1 -->';
                    $html.='                    <div class="cp1menu1 toggle1s1">';
                    $html.='                        <strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>';
                    $html.='                        <div class="cp1menu1c toggle-c">';
                    $html.='                            <a href="javascript:void(0)"  rel="noopener" title="새 창" class="b2 report" onclick="reportClick(this)"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>';
                    $html.='                        </div>';
                    $html.='                    </div>';
                    $html.='                    <!-- /cp1menu1 -->';
                    $html.='                </div>';
                    $html.='            </div>';
                    $html.='        </div>';
                    $html.='        <!-- /대댓글 -->';
                }
                $html.='    </div>';
                $html.='</div>';

            }
            $html.='    </div>';
            $html.='</div>';

        }
        $result['html'] = $html;
        $result['status'] = "success";
        $result['pageIndex'] = getPageIndexInAjax($totalCount, $writeList, $pageNumList, $pageNum, $_SERVER["HTTP_REFERER"]);

        return response()->json($result, 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $idx = $request->post('idx');
        $content = $request->post('content');

        DB::table('comment')->where('idx', $idx)->update(array(
            'content'=>$content,
        ));
        return response()->json(array('status'=> "success"), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idx = $request->post('idx');
        DB::table('comment')->where('idx', $idx)->update(array(
            'status'=>'delete',
        ));

    }

    public function like(Request $request){
        $writingId = $request->get('writingId');
        $programId = $request->get('programId');
        $email = Auth::user()->email;
        $info = DB::select('select * from my_likes where user_id = ? and writing_id = ? and program_id =?', [$email, $writingId, $programId]);

        if(count($info)==0){
            DB::table('my_likes')->insert(array(
                'user_id'=>$email,
                'writing_id' =>$writingId,
                'program_id'=>$programId,
                'conn_host'=> $_SERVER['REMOTE_ADDR'],
                'conn_time'=>now()
            ));
            if($programId == "comment"||$programId =="recomment"){
                DB::update('update comment set likes = likes+1 where idx =?', [$writingId]);
                $result['q'] ='update comment set likes = likes+1 where idx ='.$writingId;
            }
            $result['msg'] = "like";

        }else{
            DB::delete('delete from my_likes where idx = ?', [$info[0]->idx]);
            if($programId == "comment"){
                DB::update('update comment set likes = likes-1 where idx =? ', [$writingId]);
            }

            $result['msg'] = "dislike";
        }
        return response()->json($result, 200);
        return response()->json(array("msg"=>"like"), 200);

    }

}
