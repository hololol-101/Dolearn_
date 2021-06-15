<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210205 | @m | 요구반영. 결함개선. 고도화.
 * ~20210205 | @m |
 * 20210406 | @m | 요구반영
 */
-->
@php
// 지난 시간 계산
function format_date($time){
    $t=time()-$time;
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
            return $c.$v.' 전';
        }
    }
}
@endphp

@extends('master_sub')

@section('title', '학습관리 - 내 질문')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

@include('inc.common.inc_layer_sitemap')

<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="javascript:void(0);" class="a1"><i class="t1">학습관리</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">내 질문</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.management.learning_lecture_list') }}">수강 강좌</a></li>
			<!-- <li><a href="{{-- route('sub.management.lecture_note_list') --}}">강좌노트</a></li> -->
			<li><a href="{{ route('sub.management.my_question_list') }}">내 질문</a></li>
			</ul>
		</div>
		<!-- /lnb1c -->
	</div>
	<!-- lnb1 -->
	<script>/*<![CDATA[*/
		$(function(){
			/** ◇◆ 목록앵커 클릭하면 활성 메뉴를 제목에 표시. 링크 이동. 20210111. @m
			 */
			(function(){
				var $my = $('#lnb1'),
					$m = $('li>a[href]', $my);
				// 현재활성
				$m.each(function(){
					if( $(this).closest('li').is('.on') ){
						$('.h1 .t1', $my).text( $(this).text() );
					}
				});
				// 클릭
				$m.on('click', function(e){
					//e.preventDefault();
					$('.toggle', $my).triggerHandler('click'); // 토글 닫기
					$('.h1 .t1', $my).text( $(this).text() );
					return; // 링크 이동
				});
			})();
		});
	/*]]>*/</script>

</div>
<!-- /body_title -->


<!-- cp1infomenu1 -->
<div class="cp1infomenu1">
	<div class="w1">
		<select title="수강강좌 필터" class="select" id="select_lecture">
			<option value="">전체</option>
            @foreach ($myLectureList as $myLecture)
            <option value="{{ $myLecture->idx }}">{{ $myLecture->title }}</option>
            @endforeach
		</select>
	</div>
	<div class="w2">
		<select title="해결/미해결 필터" class="select" id="select_solution_yn">
			<option value="">해결/미해결</option>
			<option value="Y">해결</option>
			<option value="N">미해결</option>
		</select>
	</div>
</div>
<!-- /cp1infomenu1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1bbs2list1 -->
<div class="cp1bbs2list1">
	<ul class="lst1" id="my_question_list">
        @if (count($myQuestionList) > 0)
            @foreach ($myQuestionList as $myQuestion)
            <li class="li1">
                <a href="{{ route('sub.management.my_question_detail', ['idx' => $myQuestion->idx]) }}" class="w1 a1">
                    <div class="w1w1">
                        <div class="f1">
                            <span class="f1p1">
                                <!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
                                <img src="{{ asset('storage/uploads/profile/'.Auth::user()->save_profile_image) }}" alt="{{ Auth::user()->save_profile_image }}" />
                            </span>
                        </div>
                    </div>
                    <div class="w1w2">
                        <div class="tt1">
                            Q. {{ $myQuestion->title }}
                        </div>
                        <!-- s1 #미해결 | s2 #해결 -->
                        @if ($myQuestion->solution_yn == 'N')
                        <span class="st1 s1">#미해결</span>
                        @else
                        <span class="st1 s2">#해결</span>
                        @endif
                        <div class="tg1">
                            <span class="t1">{{ $myQuestion->writer_name }}</span>
                            <span class="t2">{{ format_date(strtotime($myQuestion->writed_at)) }}</span>
                        </div>
                        <div class="tg2">
                            {{-- TODO: --}}
                            <span class="t4">댓글 3개</span>
                        </div>
                    </div>
                </a>
                <div class="eg1">
                    <a href="javascript:void(0);" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">{{ $myQuestion->like_cnt }}</span></a>
                </div>
            </li>
            @endforeach
        @else
        <span>질문 내역이 없습니다.</span>
        @endif
	</ul>
</div>
<!-- /cp1bbs2list1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection

@section('script')
<script>
// 강좌 선택
$('#select_lecture').change(function() {
    var lectureIdx = $('#select_lecture').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.management.my_question_list') }}",
        data: {
            'lecture_idx': lectureIdx
        },
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                $('#my_question_list').empty().append(data.resData);

            } else {
                alert('질문 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                // console.log('code: ' + data.code + '\nmessage: ' + data.msg);
            }
        },
        error: function(request, status, error) {
            //
        },
    });
});

// 해결, 미해결 선택
$('#select_solution_yn').change(function() {
    var lectureIdx = $('#select_lecture').val();
    var solutionYn = $('#select_solution_yn').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.management.my_question_list') }}",
        data: {
            'lecture_idx': lectureIdx,
            'solution_yn': solutionYn
        },
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                $('#my_question_list').empty().append(data.resData);

            } else {
                alert('질문 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                // console.log('code: ' + data.code + '\nmessage: ' + data.msg);
            }
        },
        error: function(request, status, error) {
            //
        },
    });
});
</script>
@endsection
