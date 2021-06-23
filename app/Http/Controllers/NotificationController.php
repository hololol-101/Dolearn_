<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class NotificationController extends Controller{

    public function store(Request $request){
        $title = $request->post('title');
        $content = $request->post('content');
        $program_name = $request->post('program_name');
        $route = $request->post('route');

        DB::insert('insert into notification(target_id, title, content, created_at, program_name, status, route) values (?, ?, ?, ?, ?, ?, ?)', [Auth::user()->email, $title, $content, now(), $program_name, "active", $route ]);

        return redirect()->back();
    }
    public function delete(Request $request){
        $idx = $request->get('idx');
        DB::update('UPDATE notification SET delete_at = ?, status = "delete" WHERE idx = ?', [now(), $idx]);
        return redirect()->back();
    }
    public function deleteReadNotification(){
        DB::update('update notification set status = "delete" and where status = "read" and target_id = ?', [Auth::user()->email]);
        return redirect()->back();
    }
    public function read(Request $request){
        $idx = $request->get('idx');
        $route = $request->get('route');
        $route_idx = $request->get('route_idx');

        DB::update('UPDATE notification SET status = "read" WHERE idx = ?', [$idx]);
        return redirect()->route($route, ["idx"=>$route_idx]);
    }
    public function notificationList(){
        $notificationList = DB::select('SELECT * FROM notification WHERE status = !="delete" AND target_id = ?', [Auth::user()->email]);
        $notReadNotice =0;
        foreach($notificationList as $notification){
            if($notification->status !='read')
                $notReadNotice++;
        }

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

        $count =  DB::select('select count(*) total_count, count(case when status="active" then 1 end) new_count from notification where  target_id = ?', [Auth::user()->email])[0];
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


