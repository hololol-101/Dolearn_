<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller{

    public function dashboardMain(Request $request) {
        $role = Auth::user()->role;
        $userName = Auth::user()->nickname;

        $query = DB::select('select interest from users where email = ? and role = ?', [Auth::user()->email, $role])[0]->interest;
        $interest =  json_decode($query, true);
        $scate = DB::select('select scate_id, scate_name from s_category');

        $interest_arr = array();
        if(isset($interest)){
            foreach($scate as $item ){
                if(array_key_exists($item->scate_id, $interest)){
                    $interest_arr[$item->scate_name] = ['score'=>(int)$interest[$item->scate_id]*20, 'scate_id'=>$item->scate_id];
                }
            }
            array_multisort(array_column($interest_arr, 'score'), SORT_DESC, array_column($interest_arr, 'scate_id'), SORT_ASC, $interest_arr);
        }

        if ($role == 'student') {
            return view('sub.dashboard.dashboard_student', compact('role', 'userName', 'interest_arr'));

        } else if ($role == 'instructor') {
            return view('sub.dashboard.dashboard_instructor', compact('role', 'userName'));

        } else if ($role == 'youtuber') {
            return view('sub.dashboard.dashboard_youtuber', compact('role', 'userName', 'interest_arr'));

        } else {
            return view('index');
        }
    }

    public function myNotificationList() {
        return view('sub.dashboard.my_notification_list');
    }
}
