@php
$step = isset($_GET['step']) ? $_GET['step'] : '';
$isFree = isset($_GET['is_free']) ? $_GET['is_free'] : '';

$whatInfoArr = array();
$whoInfoArr = array();
$needInfoArr = array();

if (isset($tempInfo)) {
    $whatInfoArr = explode("|", $tempInfo->add_info_1);
    $whoInfoArr = explode("|", $tempInfo->add_info_2);
    $needInfoArr = explode("|", $tempInfo->add_info_3);
}
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
                {{-- 대표 영상 ID가 있으면 재생, 없으면 썸네일로 대체 --}}
                @if (isset($tempInfo))
                    @if ($tempInfo->main_video_id != '')
                    <iframe name="youtube_fr" id="display_fr" style="width:100%;height:100%;border:0;" src="https://www.youtube.com/embed/{{ $tempInfo->main_video_id }}" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @else
                        @if ($tempInfo->save_thumbnail != '')
                        <img src="{{ asset('storage/uploads/thumbnail/'.$tempInfo->save_thumbnail) }}" alt="{{ $tempInfo->title }}" />
                        @else
                        <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                        @endif
                    @endif
                @endif
                {{-- <video class="video" controls="controls" poster="{{ asset('assets/images/lib/x2/x2p1001.jpg') }}" src="https://content.jwplatform.com/videos/HkauGhRi-640.mp4">
                    <div class="alternativeContent">
                        <p>Your browser does not support the video element.</p>
                    </div>
                </video> --}}
                <!-- <i class="ic1 play">Play</i> -->
            </div>
        </div>
        <!-- /w1video -->

        <div class="w1">
            <div class="w1w1">
                <div class="tg1">
                    <strong class="t1">@if (isset($tempInfo)) {{ $tempInfo->title }} @endif</strong>
                </div>
                <div class="tg2">
                    @if (isset($tempInfo) && count($lectureTagList) > 1)
                        @foreach ($lectureTagList as $lectureTag)
                        <b class="t2"> {{ $lectureTag }} </b>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="w1w2">
                <div class="tg3">
                    <a class="b1 button default bdct">수강신청하기</a>
                    <b class="t3">@if (isset($tempInfo)) @if ($tempInfo->free_yn == 'Y') 무료 @else 유료 @endif @endif</b>
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
													<span class="t1t1">총 {{ $countVideo->cnt }} 강의</span>
													<i class="sep">/</i>
													<span class="t1t2">총 시간 10시간 10분</span>
											</span>
									</div>
									<div class="tg3">
										@if (isset($tempInfo)) {{ $tempInfo->description }} @endif</pre>
									</div>
							</div>
							<div class="w1w2">
									<ul class="cp1dl1 mgt05em">
									<li class="di1">
											<span class="dt1">강사명</span> <span class="sep">:</span>
											<span class="dd1"><a href="javascript:void(0);" class="a1">@if (isset($tempInfo)) {{ $tempInfo->user_id }} @endif</a></span>
									</li>
									<li class="di1">
											<span class="dt1">난이도</span> <span class="sep">:</span>
											<span class="dd1">@if (isset($tempInfo)) @if ($tempInfo->level == 'low') 초급 @elseif ($tempInfo->level == 'medium') 중급 @else 중급이상 @endif @endif</span>
									</li>
									</ul>
							</div>
					</div>
			</div>
			<!-- /cp1info1 -->


			<h3 class="hb1 h1">강좌소개</h3>


			<!-- cp1lecture1 -->
			<div class="cp1lecture1">
				<strong class="h1 what"><span class="h1t1">무엇을 배울 수 있나요?</span></strong>
				<div class="cont">
					<ul class="bu">
                        @foreach ($whatInfoArr as $whatInfo)
                        <li>{{ $whatInfo }}</li>
                        @endforeach
					</ul>
				</div>
			</div>
			<!-- /cp1lecture1 -->

			<!-- cp1lecture1 -->
			<div class="cp1lecture1">
				<strong class="h1 who"><span class="h1t1">누가 배우면 좋을까요?</span></strong>
				<div class="cont">
					<ul class="bu">
                        @foreach ($whoInfoArr as $whoInfo)
                        <li>{{ $whoInfo }}</li>
                        @endforeach
					</ul>
				</div>
			</div>
			<!-- /cp1lecture1 -->

            @if (count($needInfoArr) > 1)
			<!-- cp1lecture1 -->
			<div class="cp1lecture1">
				<strong class="h1 backknow"><span class="h1t1">필요한 배경 지식이 있나요?</span></strong>
				<div class="cont">
					<ul class="bu">
                        @foreach ($needInfoArr as $needInfo)
                        <li>{{ $needInfo }}</li>
                        @endforeach
					</ul>
				</div>
			</div>
			<!-- /cp1lecture1 -->
            @endif


			<div class="block-center mgt4em mgb4em cve tac wbka" style="width:100%;max-width:540px;" id="introduction">
                @if (isset($tempInfo)) {!! $tempInfo->introduction !!} @endif
			</div>


			<hr class="bdt1px mgt125em mgb125em" />

            {{-- TODO: 마이페이지 자기소개 부분 출력 --}}
			<h3 class="hb1 h1">강사소개</h3>

			<!-- cp1teacher1 -->
			<div class="cp1teacher1">
				<div class="w1">
					<div class="w1w1">
						<div class="f1">
							<span class="f1p1">
								<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
								<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
							</span>
						</div>
					</div>
					<div class="w1w2">
						<div class="tg1">
							<strong class="t1">데이터에듀</strong>
						</div>
						<div class="tg2">
							<div class="t2">학력 및 활동</div>
							<ul class="bu">
							<li>빅데이터 / AI 기업 강의</li>
							<li>삼성전자 삼성 SDS, LG CNS, SKT 외 다수</li>
							<li>빅데이터 및 데이터 분석 프로젝트( 외환은행, 신한은행, CJ, LS산정 외 다수)</li>
							<li>빅데이터 활용 창업 강좌 및 멘토링( 연세대, 선균관대, 동국대, 아주대 외 다수)</li>
							<li>빅데이터 전문가 협회 정회원</li>
							<li>중소기업청, 창조경제타운 심사 평가단</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /cp1teacher1 -->


    </div>
    <!-- /cp1view2 -->

    </div>
    <!-- /width1wrap1 -->

@endsection

@section('sub_script')
<script>
$(function() {

});

// 새 강좌 최종 생성
function addNewLectureFinal() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.lecture.add_new_lecture_final') }}",
        data: {
            //
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            console.log(data)
            if (data.status == 'success') {
                // alert('done!');
                alert('강좌 생성이 완료되었습니다.');

                location.href='/manage/instructor/operation_lecture';
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
