<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller{

    public function report(Request $request){

        $type = $request->post('type');
        $idx = $request->post('idx');
        $content = $request->post('content');
        $email = Auth::user()->email;

        $isExist = DB::select('select count(*) count from report where writer_id=? and target_id=? and type=?', [$email, $idx, $type])[0]->count;
        if($isExist==0){
            DB::table('report')->insert(array(
                'writer_id'=> $email,
                'type'=>$type,
                'target_id'=>$idx,
                'content'=>$content,
                'reported_host'=>$_SERVER['REMOTE_ADDR'],
                'reported_at'=>now()
            ));
            return response()->json(array('status'=>'success'), 200);
        }else{
            return response()->json(array('status'=>'false'), 200);
        }
        return response()->json(array('status'=>'success'), 200);

    }


    public function getReportList(){
        return response()->json(array('status'=>'success'), 200);
    }

}
