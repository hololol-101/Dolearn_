<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class NotificationController extends Controller{

    public function delete(Request $request){
        $idx = $request->get('idx');
        DB::update('UPDATE notification SET deleted_at = ?, status = "delete" WHERE idx = ?', [now(), $idx]);
        return redirect()->back();
    }

    public function deleteReadNotification(){
        DB::update('update notification set status = "delete", deleted_at = ? where status = "read" and target_id = ?', [now(), Auth::user()->email]);
        return redirect()->back();
    }
    public function read(Request $request){
        $idx = $request->get('idx');
        $route = $request->get('route');
        DB::update('UPDATE notification SET status = "read" WHERE idx = ?', [$idx]);
        echo '<script>window.location.href = "'.$route.'"</script>';
        // return redirect()->route('main', [$route]);
    }
    //안읽은 알람 수 구하기
    public function nonReadNotification(){
        $nonReadCount = DB::select('SELECT count(*) count FROM notification WHERE status ="active" AND target_id = ?', [Auth::user()->email]);
        $result['nonReadCount'] = $nonReadCount[0]->count;
        return response()->json($result, 200);
    }

    public function notificationList(){
        $notificationList = DB::select('SELECT * FROM notification WHERE status ="active" AND target_id = ? order by idx desc', [Auth::user()->email]);
        $notReadNotice =count($notificationList);
        $result['list'] = $notificationList;
        $html ='';
        if(count($notificationList)>0){
            foreach($notificationList as $notification){
                $html .='<li class="li1"><a href="'.route('notification.read',  ['idx'=>$notification->idx, 'route'=>$notification->route]).'" class="a2">';
                if($notification->program_name=='공지')
                    $html .='   <span class="g1 s1">'.$notification->program_name.'</span>';
                else
                    $html .='   <span class="g1">'.$notification->program_name.'</span>';
                $html .='   <div class="tg1">';
                $html .='        <span class="t1">'.$notification->content.'</span>';
                $html .='        <span class="t2">'.$notification->title.'</span>';
                $html .='        <span class="t3">'.$notification->created_at.'</span>';
                $html .='    </div>';
                $html .='</a></li>';
            }
        }else{
            $html .='<div>읽지 않은 알림이 없습니다.</div>';
        }

        $result['html'] = $html;
        $result['notReadNotice'] = $notReadNotice;

        return response()->json($result, 200);

    }
    public function myNotificationList(Request $request) {
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

        $count =  DB::select('select count(*) total_count, count(case when status="active" then 1 end) new_count from notification where status!="delete" and target_id = ?', [Auth::user()->email])[0];
        //알림 수 조회 query
        $totalCount  =$count->total_count;
        // 전체 알림 갯수
        $newNotificationCount = $count->new_count;
        // 새 알림 갯수
        $totalPage   = ceil($totalCount/$writeList);
        // 전체 페이지 갯수

        $myNotificationList = DB::select('select * from notification where status!="delete" and target_id = ? order by idx desc limit '.$startNum.' ,'.$writeList, [Auth::user()->email]);

        $pageIndex = getPageIndex($totalCount, $writeList, $pageNumList, $pageNum);
        // 게시판 page nav
        return view('sub.dashboard.my_notification_list', compact('myNotificationList', 'newNotificationCount', 'pageIndex'));
    }

}


