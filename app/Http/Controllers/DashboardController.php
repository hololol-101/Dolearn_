<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller{

    public function dashboardMain(Request $request) {
        $role = Auth::user()->role;
        $userName = Auth::user()->nickname;
        $email = Auth::user()->email;
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
            $lectureNumber = DB::select('SELECT count(CASE WHEN status = "complete" THEN 1 END) complete_lecture, count(*) all_lecture FROM my_lecture WHERE user_id = ?',[$email])[0];
            $nonReadNotification = DB::select('SELECT count(*) count FROM notification WHERE status = "active" ANd target_id = ?', [$email])[0]->count;
            $lastShowLecture = DB::select('SELECT l.idx, l.title,  ml.recent_learned_at, COUNT(*) totalLecture, COUNT(CASE WHEN mc.status = "complete" THEN 1 END) completeLecture FROM lecture l
                                            JOIN my_curriculum mc ON mc.lecture_idx =l.idx
                                            JOIN my_lecture ml ON l.idx =ml.lecture_idx AND ml.user_id = mc.user_id
                                            WHERE ml.user_id = ? GROUP BY l.idx ORDER BY ml.recent_learned_at DESC LIMIT 1', [$email]);
            $lastShowVideo = DB::select('SELECT v.*,  y.subject  FROM video_history v JOIN _youtube_fulldata_temp y ON v.video_id = y.uid WHERE v.user_id = ? ORDER BY v.recent_watched_at DESC LIMIT 3', [$email]);
            $lastNonSolvedComment = DB::select('SELECT * FROM my_question WHERE writer_id = ? AND solution_yn="N" ORDER BY writed_at DESC LIMIT 3', [$email]);
            $lastVideoNote = DB::select('SELECT * FROM video_note WHERE writer_id = ? ORDER BY idx DESC LIMIT 3', [$email]);
            if(count($lastShowLecture)>0){
                $lastShowLecture = $lastShowLecture[0];
            }
            return view('sub.dashboard.dashboard_student', compact('role', 'userName', 'interest_arr', 'lectureNumber', 'nonReadNotification','lastShowLecture', 'lastShowVideo', 'lastNonSolvedComment', 'lastVideoNote'));
        } else if ($role == 'instructor') {
            $lectureInfo = DB::select('SELECT AVG(l.rating) score_avg, SUM(l.student_cnt) student_cnt , COUNT(Distinct l.idx) lecture_cnt FROM users u LEFT JOIN lecture l ON l.owner_id = u.email  WHERE u.nickname = ?', [$userName])[0];
            return view('sub.dashboard.dashboard_instructor', compact('role', 'userName', 'lectureInfo'));

        } else if ($role == 'youtuber') {
            $totalVideoNum = DB::select('SELECT count(*) total_video FROM _youtube_fulldata_temp WHERE channel = ?',[$userName])[0]->total_video;
            $nonReadNotification = DB::select('SELECT count(*) count FROM notification WHERE status = "active" ANd target_id = ?', [$email])[0]->count;
            $relationLectureNum = DB::select('SELECT COUNT(DISTINCT c.lecture_idx) lecture_cnt FROM curriculum c WHERE c.video_id IN (SELECT y.uid FROM _youtube_fulldata_temp y WHERE CHANNEL = ?)', [$userName])[0]->lecture_cnt;
            $lastShowLecture = DB::select('SELECT l.idx, l.title,  ml.recent_learned_at, COUNT(*) totalLecture, COUNT(CASE WHEN mc.status = "complete" THEN 1 END) completeLecture FROM lecture l
                                            JOIN my_curriculum mc ON mc.lecture_idx =l.idx
                                            JOIN my_lecture ml ON l.idx =ml.lecture_idx AND ml.user_id = mc.user_id
                                            WHERE ml.user_id = ? GROUP BY l.idx ORDER BY ml.recent_learned_at DESC LIMIT 1', [$email]);
            $instructorList = DB::select('SELECT u.*, SUM(l.student_cnt) total_student, AVG(l.rating) score_avg FROM users u LEFT JOIN lecture l ON l.owner_id = u.email WHERE role = "instructor" GROUP BY u.email ORDER BY SUM(l.student_cnt) desc LIMIT 9');
            $lastShowVideo = DB::select('SELECT v.*,  y.subject  FROM video_history v JOIN _youtube_fulldata_temp y ON v.video_id = y.uid WHERE v.user_id = ? ORDER BY v.recent_watched_at DESC LIMIT 3', [$email]);
            if(count($lastShowLecture)>0){
                $lastShowLecture = $lastShowLecture[0];
            }

            return view('sub.dashboard.dashboard_youtuber', compact('role', 'userName', 'interest_arr', 'totalVideoNum', 'nonReadNotification', 'relationLectureNum', 'lastShowLecture', 'lastShowVideo'));
        } else {
            return view('index');
        }
    }

}
