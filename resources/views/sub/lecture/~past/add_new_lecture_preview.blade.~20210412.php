@php
$step = isset($_GET['step']) ? $_GET['step'] : '';
$isFree = isset($_GET['is_free']) ? $_GET['is_free'] : '';
@endphp

@extends('sub.lecture.add_new_lecture')

@section('sub_content')

<!-- width1wrap1 -->
<div class="width1wrap1">

    <!-- cp1view1 -->
    <div class="cp1view1">

        <!-- w1video -->
        <div class="w1video">
            <div class="flex1wrap1">
                <video class="video" controls="controls" poster="{{ asset('assets/images/lib/x2/x2p1001.jpg') }}" src="https://content.jwplatform.com/videos/HkauGhRi-640.mp4">
                    <div class="alternativeContent">
                        <p>Your browser does not support the video element.</p>
                    </div>
                </video>
                <!-- <i class="ic1 play">Play</i> -->
            </div>
        </div>
        <!-- /w1video -->

        <div class="w1">
            <div class="w1w1">
                <div class="tg1">
                    <strong class="t1">[ 파이썬 올인원! ] 파이썬 기초부터 심화과정까지 한번에! 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
                </div>
                <div class="ratings">
                    <strong class="t1 blind">별점</strong>
                    <i class="star5rating1">
                        <i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
                        <i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
                    </i>
                    <span class="t2">
                        (<span class="t2t1">평점</span> <span class="t2t2">3.5</span>)
                    </span>
                    <span class="t3">
                        <span class="t3t1">수강후기</span> <span class="t3t2">30개</span>
                    </span>
                </div>
                <div class="tg2">
                    <b class="t2">수료증 발급 가능</b>
                    <b class="t2">실시간 채팅 가능</b>
                    <b class="t2">과제 있음</b>
                </div>
            </div>
            <div class="w1w2">
                <div class="tg3">
                    <a href="?#★" class="b1 button primary">수강신청하기</a>
                    <b class="t3">무료</b>
                </div>
            </div>
        </div>

    </div>
    <!-- /cp1view1 -->

    <!-- cp1view2 -->
    <div class="cp1view2">

    <!-- cp1info1 -->
    <div class="cp1info1">
        <div class="w1">
            <div class="w1w1">
                <div class="tg1">
                    <i class="new">New</i>
                    <span class="t1">
                        <span class="t1t1">총 30 강의</span>
                        <i class="sep">/</i>
                        <span class="t1t2">총 시간 10시간 10분</span>
                    </span>
                </div>
                <div class="tg2">
                    <b class="g1"><span class="g1t1">Top</span><span class="g1t2">10</span></b>
                    <span class="t2">지금 뜨는 강좌 순위 3위</span>
                </div>
                <div class="tg3">
                    엑셀 기초부터 심화까지 모든 내용을 학습할 수 있도록 데이터에듀가 직접 제작한 커리큘럼 입니다.
                    데이터 입력만 가능한 엑셀 초보! 엑셀에 능숙하지 못한 사회초년생! 단순 반복 작업으로 야근러가 된 직장인! 엑셀을 필요로 하는 모두를 위한 강의를 하나의 커리큘럼으로 모았습니다!
                </div>
            </div>
            <div class="w1w2">
                <ul class="cp1dl1 mgt05em">
                <li class="di1">
                    <span class="dt1">강사명</span> <span class="sep">:</span>
                    <span class="dd1"><a href="?#★" class="a1">데이터에듀</a></span>
                </li>
                <li class="di1">
                    <span class="dt1">난이도</span> <span class="sep">:</span>
                    <span class="dd1">초급, 중급</span>
                </li>
                <li class="di1">
                    <span class="dt1">태그</span> <span class="sep">:</span>
                    <span class="dd1">
                        <span class="dpib">#엑셀</span>
                        <span class="dpib">#엑셀기초</span>
                        <span class="dpib">#일이삼사오</span>
                        <span class="dpib">#일이삼사오</span>
                        <span class="dpib">#일이삼사오</span>
                    </span>
                </li>
                <!-- <li class="di1">
                    <span class="dt1">주제</span> <span class="sep">:</span>
                    <span class="dd1">
                        <span class="dpib">엑셀</span>
                        <span class="dpib">엑셀기초</span>
                    </span>
                </li> -->
                </ul>
            </div>
        </div>
    </div>
    <!-- /cp1info1 -->

    </div>
    <!-- /cp1view2 -->

    </div>
    <!-- /width1wrap1 -->

@endsection

@section('sub_script')
<script>
$(function() {

});

// 입력 정보 저장 후 다음 단계로 이동
function saveAndGoNextStep(nextStep) {

    // 입력 데이터 유효성 검사
    @if ($step == 'introduce')
    if (addInfo1 == '' || addInfo2 == '' || addInfo3 == '') {
        alert('필수 항목을 입력해주세요.');
        return false;
    }
    @endif

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.lecture.tempsave_add_lecture') }}",
        data: {
            'step': '{{ $step }}',
            'add_info_1': addInfo1,
            'add_info_2': addInfo2,
            'add_info_3': addInfo3,
            'introduction': introduction
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                location.href='/sub/lecture/add_new_lecture?step=' + nextStep + '&is_free={{ $isFree }}';
            }
        },
        error: function(request, status, error) {
            console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
        },
        complete: function(data) {
            //
        }
    });
}
</script>
@endsection
