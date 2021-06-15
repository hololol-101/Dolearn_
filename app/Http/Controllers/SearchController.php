<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller{
    public function integratedSearch(Request $request) {
        $type = '';
        $keyword = '';
        $result = array();

        $videoList = null;
        $lectureList = null;
        $insightList = null;
        $instructorList = null;
        $youtuberList = null;

        $setting = ' ORDER BY idx desc limit 8 ';
        $whereVideo = '';
        $whereLecture = '';

        if ($request->isMethod('get')) {
            $type = $request->get('type', '');
            $keyword = $request->get('keyword', '');
        }

        if ($request->isMethod('post')){
            $type = $request->post('type', '');
            $keyword = $request->post('keyword', '');
        }

        //키원드가 있을 경우 where문
        if($keyword!="" or $keyword!=null){
            $where = " LIKE '%$keyword%' ";
            $whereVideo= "where subject".$where." or content ".$where;
            $whereLecture= "where title ".$where." or description ".$where;
        }


        // TODO: type parameter에 따른 검색 내용 조회
        if ($type == '' || $type == 'all') {
            $result['title'] = '전체';

            //영상 정보, 총 영상 수 검색
            $queryVideo = "SELECT idx, uid, subject, hit_cnt, channel FROM _youtube_fulldata_temp ";
            $queryVC = "SELECT count(*) cnt FROM _youtube_fulldata_temp ";
            $videoList = DB::select($queryVideo.$whereVideo.$setting);
            $result['videoCount'] = DB::select($queryVC.$whereVideo)[0]->cnt;

            //강의 정보, 총 강의 수 검색
            $queryLecture = "SELECT idx, title, save_thumbnail, rating, student_cnt, tags, owner_name, free_yn FROM lecture ";
            $queryLC =  "SELECT count(*) cnt FROM lecture ";
            $lectureList = DB::select($queryLecture.$whereLecture.$setting);
            $result['lectureCount'] = DB::select($queryLC.$whereLecture)[0]->cnt;

            //전체 검색 결과로 추후에 인사이트, 강사, 유튜버 정보도 추가
            $result['count']=$result['videoCount']+$result['lectureCount'];
        } else if ($type == 'video') {
            $result['title'] = '영상';
            $queryVideo = "SELECT idx, uid, subject, hit_cnt, channel FROM _youtube_fulldata_temp ";
            $queryVC = "SELECT count(*) cnt FROM _youtube_fulldata_temp ";

            $videoList = DB::select($queryVideo.$whereVideo.$setting);

            $result['count']=$result['videoCount'] = DB::select($queryVC.$whereVideo)[0]->cnt;
        } else if ($type == 'lecture') {
            $result['title'] = '강좌';

            $queryLecture = "SELECT idx, title, save_thumbnail, rating, student_cnt, tags, owner_name, free_yn FROM lecture ";
            $queryLC =  "SELECT count(*) cnt FROM lecture ";

            $lectureList = DB::select($queryLecture.$whereLecture.$setting);
            $result['count'] =  $result['lectureCount'] =  DB::select($queryLC.$whereLecture)[0]->cnt;
        } else if ($type == 'insight') {
            $result['title'] = '인사이트';

        } else if ($type == 'instructor') {
            $result['title'] = '강사';

        } else if ($type == 'youtuber') {
            $result['title'] = '유튜버';

        } else {
            return view('index');
            exit;
        }
        $result['keyword'] = $keyword;
        return view('sub.search.integrated_search', compact('result', 'videoList', 'lectureList', 'insightList', 'instructorList', 'youtuberList'));

        /*
        $result['keyword'] = $keyword;

        // 조회된 데이터(검색 결과) 수
        $result['count'] = 1;
        return view('sub.search.integrated_search', compact('result', json_encode($result)));
        */

    }
}
