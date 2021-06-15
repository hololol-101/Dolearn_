@php
    $commonPath = '/_res/dolearn';
    $sitePath = '/_res/manage1';
    $lectureIdx = isset($_GET['idx']) ? $_GET['idx'] : '';
@endphp

<div id="skipnav">
	<ul>
	<li><a href="#body">본문 바로가기</a></li>
	</ul>
</div><hr class="dpn" />


<!-- #container -->
<div id="container" tabindex="-1">
<noscript><p class="noscript">JavaScript has been disabled. This site requires JavaScript for full functionality, please enable.</p></noscript>


<!-- #head -->
<div id="head" class="init">
<!-- #head_s1 -->
<div id="head_s1" class="clearfix">
<!-- container -->
<div class="container">


<h1 class="blind">강좌관리상세</h1>


</div>
<!-- /container -->
</div>
<!-- /head_s1 -->
<!-- #head_s2 -->
<div id="head_s2" class="clearfix">
<!-- container -->
<div class="container">


<!-- gn1 -->
<div id="gn1">
	<a href="{{ route('manage.instructor.operation_lecture', ['role' => 'instructor']) }}" class="a1" title="운영강좌로 이동"><span class="ic1"></span> <span class="t1">돌아가기</span></a>
</div>
<!-- /gn1 -->


<!-- head_title -->
<div id="head_title">
	<div class="f1">
		<div class="f1p1">
            <img src="{{ asset('assets/images/lib/noimg1_manage.png') }}" alt="★대체텍스트필수" id="lecture_img"/>
		</div>
	</div>
	<h2 class="h1" id="lecture_title"></h2>
</div>
<!-- /head_title -->


<!-- tnb1 [JS] -->
<div id="tnb1">
	<h3 class="blind">주 메뉴</h3>
	<strong class="h1"><a href="#tnb1c" class="b1 toggle"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">여닫기</span></a></strong>
	<!-- tnb1c -->
	<div id="tnb1c"><div class="bg"></div>
	<!-- cont -->
	<div class="cont"><div class="bg"></div>
		<!-- <a href="#tnb1c" class="b2 close"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">닫기</span></a> -->
		<!-- d1 -->
		<div class="d1">
			<ul>
			<li class="m1">
				<a href="javascript:void(0);"><span class="t1">강좌 정보</span></a>
				<div class="d2">
					<ul>
                    <li class="m1">
                        <a href="{{ route('manage.lecture.lecture_info', ['idx' => $lectureIdx]) }}"><span class="t1">강좌 정보</span></a>
                    </li>
                    <li class="m2">
                        <a href="{{ route('manage.lecture.lecture_settings', ['idx' => $lectureIdx]) }}"><span class="t1">강좌 설정</span></a>
                    </li>
                    <li class="m3">
                        <a href="{{ route('manage.lecture.curriculum', ['idx' => $lectureIdx]) }}"><span class="t1">커리큘럼</span></a>
                    </li>
					</ul>
				</div>
			</li>
			<li class="m2">
				<a href="javascript:void(0);"><span class="t1">시험/과제 관리</span></a>
				<div class="d2">
					<ul>
					<li class="m1">
						<a href="{{ route('manage.lecture.question_management', ['idx' => $lectureIdx]) }}"><span class="t1">문제 관리</span></a>
					</li>
					<li class="m2">
						<a href="{{ route('manage.lecture.exam_task_management', ['idx' => $lectureIdx]) }}"><span class="t1">시험/과제 목록</span></a>
					</li>
					</ul>
				</div>
			</li>
			<li class="m3">
				<a href="javascript:void(0);"><span class="t1">수강자 관리</span></a>
				<div class="d2">
                    <ul>
                        <li class="m1">
                            <a href="{{ route('manage.lecture.student_management', ['idx' => $lectureIdx]) }}"><span class="t1">수강자 관리</span></a>
                        </li>
                        <li class="m2">
                            <a href="{{ route('manage.lecture.qna_list', ['idx' => $lectureIdx]) }}">
                                <div class="w1">
                                    <span class="tg1">
                                        <span class="t1">질문 리스트</span>
                                        <i class="t2">99</i>
                                    </span>
                                    <b class="t3">0</b>
                                </div>
                            </a>
                        </li>
                        <li class="m3">
                            <a href="{{ route('manage.lecture.review_list', ['idx' => $lectureIdx]) }}"><span class="t1">수강후기 리스트</span></a>
                        </li>
                        </ul>
				</div>
			</li>
			</ul>
		</div>
		<!-- /d1 -->
		<!-- <a href="#tnb1c" class="b2 close"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">닫기</span></a> -->
	</div>
	<!-- /cont -->
	</div>
	<!-- /tnb1c -->

</div>
<!-- /tnb1 -->
<script>/*<![CDATA[*/
	$(function(){
		makeActive2ClickHover2('#tnb1'); // 주메뉴 동작 호출
		// 현재활성
		$('#tnb1 div.d1>ul>li.m' + {{ $d1n }}).addClass('on'); // 1차
		$('#tnb1 div.d1>ul>li.on>div.d2>ul>li.m' + {{ $d2n }}).addClass('on'); // 2차

        // 페이지 로드 시 강좌 썸네일, 제목 조회 후 교체
        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('manage.lecture.get_thumbnail') }}",
        data: {
            'lecture_idx': {{ $lectureIdx }},
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                var lectureInfo = JSON.parse(data.lectureInfo);

                $('#lecture_img').attr('src', "{{ asset('storage/uploads/thumbnail/') }}" + "/" + lectureInfo[0].save_thumbnail);
                $('#lecture_title').append(lectureInfo[0].title);

            } else {
                console.log('code: ' + data.code + '\nmessage: ' + data.msg);
            }
        },
        error: function(request, status, error) {
            console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
        },
        complete: function(data) {
            //
        }
    });
	});
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /head_s2 -->
</div><hr class="dpn" />
<!-- /#head -->
