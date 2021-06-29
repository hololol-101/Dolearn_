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
            }else if($division == "lecture"){
                $query['program_name']="운영";
                $query['route']='/manage/lecture/lecture_info?idx='.$url;
            }
            $query['status']='active';

        }
        DB::table('notification')->insert($query);
    }
}
