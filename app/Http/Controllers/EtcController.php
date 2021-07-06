<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EtcController extends Controller{
    public function introduce() {
        return view('etc.introduce');
    }

    public function terms() {
        return view('etc.terms');
    }

    public function privacy() {
        return view('etc.privacy');
    }

    public function instructorApplication() {
        if(Auth::user()){
            return view('etc.instructor_application');
        }
        else{
            return view('account.signin');
        }
    }

    public function storeInstructor(Request $request) {
        $res = $request->post();
        $file = $request->file('uploadFile');

        if(isset($res)){
            $query=DB::select('select * from instructor_application where dolearn_id = ?',[$res['accountEmail']]);
            if(isset($query[0])){
                echo '<script>alert("이미 강사계정이 존재합니다.\n메인 페이지로 이동합니다."); location.href="'.route('main').'"</script>';
                exit;
            }

            $filename ='';
            $fileReName = '';

            if($file){
                $fileIdx =storeAttachFile($file);
                $filename = $fileIdx['filename'];
                $fileReName = $fileIdx['fileReName'];
            }

            $fileIdx = storeAttachFile($file);
            $hope = ( isset($res['★1radio0'])!=null ?  $res['★1radio0']:' ');

            $query2=DB::insert('insert into instructor_application (dolearn_id, email, user_name, mobile, hope_part, introduction, ori_attach_file, save_attach_file, applicated_at, status) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [$res['accountEmail'], $res['contactEmail'], $res['name'], $res['celphone'], $hope, $res['textarea0'], $filename, $fileReName, now(), "ready"]);

            if($query2){
                return redirect()->back().'<script>alert("강사신청이 완료되었습니다.") </script>';
            }else{
                return redirect()->back()->with('alert', '강사신청에 실패했습니다.');
            }
        }

//        return view('etc.instructor_application');
    }

    public function userIntroduction(Request $request) {
        if($request->isMethod('get')){
            $type = $request->get('type', '');
            $userIdx = $request->get('user_idx', '');

            // 회원 정보 조회
            $userInfo = DB::select('SELECT * FROM users WHERE id = '.$userIdx);

            if (count($userInfo) > 0) {
                $userInfo = $userInfo[0];
            }

            if ($type == 'instructor') {
                // 해당 강좌의 강사가 운영 중인 다른 강좌 정보 조회
                $instructorInfo = DB::select('SELECT  COUNT(*) lecture_num,  SUM(l.student_cnt) total_student, AVG(l.rating) score_avg FROM lecture l where l.owner_id = ? GROUP BY l.owner_id', [$userInfo->email]);
                if (count($instructorInfo) > 0) {
                    $instructorInfo = $instructorInfo[0];
                }else{
                    $instructorInfo = (object) array('lecture_num'=>'-', 'total_student'=>'0', 'score_avg'=>'-' );
                }
                $operationLectureList = DB::select('SELECT idx, title, save_thumbnail, owner_name, rating, student_cnt, free_yn FROM lecture WHERE owner_id = "'.$userInfo->email.'" ORDER BY idx DESC limit 8');
                $totalLectureCnt = DB::select('select count(*) count FROM lecture WHERE owner_id = "'.$userInfo->email.'"')[0]->count;

                return view('etc.user_introduction_instructor', compact('userInfo', 'operationLectureList', 'instructorInfo', 'totalLectureCnt'));
            }

            if ($type == 'youtuber') {
                $youtuberInfo = DB::select('SELECT  sum(hit_cnt) sum_hit, subscribers, ch_id, COUNT(*) video_cnt  FROM _youtube_fulldata_temp  where channel = (SELECT nickname FROM users WHERE id = ?) GROUP BY CHANNEL' , [$userIdx])[0];
                $videoList = DB::select('select * FROM _youtube_fulldata_temp where ch_id = ?  ORDER BY score LIMIT 6',[$youtuberInfo->ch_id]);
                $totalVideoCnt = DB::select('select count(*) count FROM _youtube_fulldata_temp where ch_id = ? ',[$youtuberInfo->ch_id])[0]->count;

                return view('etc.user_introduction_youtuber', compact('userInfo', 'youtuberInfo', 'videoList', 'totalVideoCnt'));
            }
        }else if($request->isMethod('post')){
            $type = $request->post('type', '');
            $sort = $request->post('sort', '');
            $userIdx = $request->post('user_idx', '');
            $cnt = $request->post('cnt', 0);
            $limit = ($cnt!=0) ? ' limit '.$cnt.', 6':' limit 6';
            $html = '';
            if ($type == 'instructor') {
                // 해당 강좌의 강사가 운영 중인 다른 강좌 정보 조회
                $operationLectureList = DB::select('SELECT idx, title, save_thumbnail, owner_name, rating, student_cnt, free_yn FROM lecture WHERE owner_id = (select email from users where id = ?) ORDER BY idx DESC limit ? , 8', [$userIdx, $cnt]);
                try{
                    foreach($operationLectureList as $operationLecture){
                        $html .='<div class="item column">';
                        $html .='   <div class="w1">';
                        $html .='        <a href="'.route('sub.lecture.lecture_detail', ['idx'=>$operationLecture->idx]).'" class="a1">';
                        $html .='            <div class="f1">';
                        $html .='                <span class="f1p1">';
                        $html .='                    <img src="'.asset('storage/uploads/thumbnail/'.$operationLecture->save_thumbnail).'" alt="'.$operationLecture->title.'">';
                        $html .='                </span>';
                        $html .='           </div>';
                        $html .='           <div class="tg1">';
                        $html .='                <strong class="t1">'.$operationLecture->title.'</strong>';
                        $html .='           </div>';
                        $html .='           <div class="ratings">';
                        $html .='              <strong class="t1 blind">별점</strong>';
                        $html .='              <i class="star5rating1">';
                        $html .='                  <i class="st-on" style="width:'.round($operationLecture->rating * 20, 1).'%;"><i class="ic1"></i></i><!-- (3.5/5) -->';
                        $html .='                  <i class="st-off" style="width:100%;"><i class="ic2"></i></i><!-- (100-70) -->';
                        $html .='              </i>';
                        $html .='              <span class="t2">';
                        $html .='                  <span class="t2t1">평점</span>';
                        $html .='                  <span class="t2t2">'.$operationLecture->rating.'</span>';
                        $html .='                  <span class="t2t3">· 수강생 '.$operationLecture->student_cnt.' 명</span>';
                        $html .='               </span>';
                        $html .='           </div>';
                        $html .='           <div class="tg2">';
                        $html .='               <span class="t2">';
                        $html .='                   <span class="t2t1">'. $operationLecture->owner_name .'</span>';
                        $html .='               </span>';
                        $html .='               <span class="t3">';
                        $html .='                   <span class="t3t1">';
                        if ($operationLecture->free_yn == 'Y') $html .= '무료'; else $html .='유료';
                        $html .='</span>';
                        $html .='               </span>';
                        $html .='           </div>';
                        $html .='       </a>';
                        $html .='   </div>';
                        $html .='</div>';

                    }
                    $result['status'] = 'success';
                    $result['html'] = $html;
                }catch(Exception $e){
                    $result['status'] = 'fail';
                    $result['msg'] = $e->getMessage();
                    $result['code'] = $e->getCode();$result['status'] = 'fail';
                }
            }else if ($type == 'youtuber') {
                if($sort == '영상 평점 기준'){
                    $videoList = DB::select('select * FROM _youtube_fulldata_temp where channel = (SELECT nickname FROM users WHERE id = ?) ORDER BY score desc '.$limit,[$userIdx]);
                }else if($sort =='두런 조회수 기준'){
                    //TODO: ORDER BY 수정
                    $videoList = DB::select('select * FROM _youtube_fulldata_temp where channel = (SELECT nickname FROM users WHERE id = ?) ORDER BY idx '.$limit,[$userIdx]);
                }else if($sort =='조회수 기준'){
                    $videoList = DB::select('select * FROM _youtube_fulldata_temp where channel = (SELECT nickname FROM users WHERE id = ?) ORDER BY hit_cnt desc '.$limit,[$userIdx]);
                }

                try{
                    foreach($videoList as $video){
                        $html .='<div class="item column">';
                        $html .='   <div class="w1">';
                        $html .='        <a href="'.route('sub.video.video_detail', ['uid' => $video->uid]).'" class="a1" video_idx="'.$video->idx.'">';
                        $html .='            <div class="f1">';
                        $html .='                <span class="f1p1">';
                        $html .='                    <img src="https://img.youtube.com/vi/'.$video->uid.'/mqdefault.jpg" alt="'.$video->subject.'">';
                        $html .='                </span>';
                        $html .='                <i class="ic1 play">Play</i>';
                        $html .='           </div>';
                        $html .='           <div class="tg1">';
                        $html .='                <strong class="t1">'.$video->subject.'</strong>';
                        $html .='           </div>';
                        $html .='           <div class="tg2">';
                        $html .='               <span class="t2">';
                        $html .='                   <span class="t2ic1">재생</span>';
                        $html .='                   <span class="t2t2">'.$video->hit_cnt.'</span>';
                        $html .='               </span>';
                        $html .='               <span class="t2">';
                        $html .='                   <span class="t2t1">두런</span>';
                        $html .='                   <span class="t2ic1">재생</span>';
                        $html .='                   <span class="t2t2">0</span>';
                        $html .='               </span>';
                        $html .='               <span class="t3">평점'.$video ->score.'</span>';
                        $html .='           </div>';
                        $html .='           <div class="tg3">';
                        $hashlist = explode('|', $video->hashtag, 6);
                        if($hashlist[0] !='')
                            for ($idx =0; $idx<5; $idx++)
                        $html .= '<span class="t4">'.$hashlist[$idx].'</span>';
                        $html .='            </div>';
                        $html .='        </a>';
                        $html .='    </div>';
                        $html .='</div>';
                    }
                    $result['status'] = 'success';
                    $result['html'] = $html;
                }catch(Exception $e){
                    $result['status'] = 'fail';
                    $result['msg'] = $e->getMessage();
                    $result['code'] = $e->getCode();$result['status'] = 'fail';
                }
            }
            return response()->json($result, 200);
        }

    }

    public function propose(Request $request) {
        if($request->isMethod('get')){
            $email = $request->get('user_idx');
            $query = DB::select('SELECT i.user_name, u.save_profile_image  FROM users u,  instructor_application i WHERE i.dolearn_id = ? AND i.dolearn_id = u.email', [$email]);
            $arr = array();
            $arr['name'] = $query[0]->user_name;
            $arr['image_path'] = $query[0]->save_profile_image;

            return view('etc.propose', compact('arr'));
        }
        if($request->isMethod('post')){
            $req = $request->post();
            $filename ='';
            $fileReName = '';
            $file = $request->file("file");
            if($file){
                $fileIdx =storeAttachFile($file);
                $filename = $fileIdx['filename'];
                $fileReName = $fileIdx['fileReName'];
            }
            $query=DB::insert('insert into proposal (writer_id, instructor_id, instructor_name, type, email, content, ori_attach_file, save_attach_file, writed_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [Auth::user()->email, $req['instructor_id'], $req['instructor_name'], $req['★1radio0'], $req['email'], $req['content'], $filename, $fileReName, now()]);
            if($query){
                return '<script>alert("제안이 성공적으로 완료되었습니다.")</script>'.redirect()->back();
            }
            else{
                return '<script>alert("제안에 실패했습니다.")</script>'.redirect()->back();
            }

        }
    }

    public function storeImage(Request $request) {
        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageNameWithExtension = $imagePath->getClientOriginalName();
            $imageName = pathinfo($imageNameWithExtension, PATHINFO_FILENAME);
            $extension = $imagePath->getClientOriginalExtension();

            $allowType = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

            if (!in_array(strtolower($extension), $allowType)) {
                $result['status'] = 'fail';
                $result['msg'] = '이미지 파일만 업로드가 가능합니다.';

                return response()->json($result);
            }

            $imageStoreName = $imageName.'_'.time().'.'.$extension;
            $request->file('file')->storeAs('uploads/thumbnail/', $imageStoreName);

            $result['status'] = 'success';
            $result['msg'] = '이미지 업로드가 완료되었습니다.';
            $result['fileName'] = $imageStoreName;
            $result['savePath'] = asset('storage/uploads/thumbnail/'.$imageStoreName);

        } else {
            $result['status'] = 'fail';
            $result['msg'] = '이미지 업로드에 실패했습니다.';
        }

        return response()->json($result);
    }


}
