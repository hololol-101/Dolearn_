<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210401 | @m | 요구반영. 결함개선. 고도화.
 * ~20210406 | @m |
 * 20210510 | @m |
 */
-->
@extends('master_sub')

@section('title', '강사 소개')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1who1 -->
<div class="cp1who1">
	<div class="w1">
		<div class="w1w1">
			<div class="f1">
				<span class="f1p1">
					<!-- <img src="{{ asset('assets/images/lib/noimg1face1d800.png') }}" alt="이미지 없음" /> -->
                    @if (isset($userInfo->save_profile_image))
					<img src="{{ asset('storage/uploads/profile/'.$userInfo->save_profile_image) }}" alt="{{ $userInfo->nickname }}" />
                    @else
                    <img src="{{ asset('assets/images/lib/noimg1face1d800.png') }}" alt="이미지 없음" />
                    @endif
				</span>
			</div>
            @if (Auth::check())
                @if (Auth::user()->role == 'youtuber')
                <a href="{{ route('etc.propose', ['user_idx' => $_GET['user_idx']]) }}" class="b1 button block">제안하기</a>
                @endif

            @endif
		</div>
		<div class="w1w2">
			<div class="tg1">
				<strong class="t1">{{ $userInfo->nickname }}</strong>
			</div>
			<div class="tg2">
                <pre>{{ $userInfo->introduction }}</pre>
				{{-- 강사의 경력 및 자기소개가 표시됩니다.<br /> --}}

				{{-- <div class="t2">학력 및 활동</div>
				<ul class="bu">
				<li>연세대학교 작곡과 학사</li>
				<li>이화여자대학교 대학원 음악학 석사</li>
				<li>더블유 인사이츠 대표, 아트스피치 원장, 김미경의 이클래스 대표 역임 중.</li>
				<li>tvN &lt;어쩌다 어른&gt;, JTBC &lt;김미경 전현무의 나만 그런가&gt; 등 다수의 방송 경력.</li>
				<li>&lt;김미경이 리부트&gt;, &lt;엄마의 자존감 공부&gt; 등 작품 활동 중.</li>
				<li>현재 MKTV 김미경 TV 유튜브 채널 운영 중.</li>
				</ul> --}}
			</div>
		</div>
	</div>
</div>
<!-- /cp1who1 -->


<!-- cp1dash2info1 type3 -->
<div class="cp1dash2info1 type3 mgt25em">
	<div class="hg1">
		<h3 class="h1"><span class="h1t1">강사정보</span><i class="h1ic1"></i></h3>
	</div>
	<div class="cont">
		<div class="item">
			<strong class="t1">
				<span class="vat">{{ $instructorInfo->lecture_num }}</span>
			</strong>
			<span class="t2">
				강좌 수
			</span>
		</div>
		<div class="item">
			<strong class="t1">
				<span class="vat">{{ $instructorInfo->total_student }}</span>
			</strong>
			<span class="t2">
				수강생 수
			</span>
		</div>
		<div class="item">
			<strong class="t1">
                <span class="vat">@if ($instructorInfo->score_avg!='-') {{number_format( $instructorInfo->score_avg, 1) }} @else {{ $instructorInfo->score_avg }} @endif</span>
			</strong>
			<span class="t2">
				총 평점
			</span>
		</div>
		<div class="item">
            {{-- TODO:응답률 계산 --}}
			<strong class="t1">-</strong>
			<span class="t2">
				<span class="vam">응답률</span>
				<span class="bi1 dpib fsS1 vam">
					<a href="#?" class="li1 tooltip1 rt">
						<span class="tooltip1c" style="width:17em;">
							수강생의 질문에 응답한 비율 입니다.
						</span>
					</a>
				</span>
			</span>
		</div>
	</div>
</div>
<!-- /cp1dash2info1 type3 -->



<!-- cp1fcard1 -->
<div class="cp1fcard1">
<div class="wrap1">
	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234">
        @if (isset($operationLectureList))
            @foreach ($operationLectureList as $operationLecture)
            <div class="item column">
                <div class="w1">
                    <a href="{{ route('sub.lecture.lecture_detail', ['idx'=>$operationLecture->idx]) }}" class="a1">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('storage/uploads/thumbnail/'.$operationLecture->save_thumbnail) }}" alt="{{ $operationLecture->title }}" />
                            </span>
                            {{-- <i class="ic1 play">Play</i> --}}
                        </div>
                        <div class="tg1">
                            <strong class="t1">{{ $operationLecture->title }}</strong>
                        </div>
                        <div class="ratings">
                            <strong class="t1 blind">별점</strong>
                            <i class="star5rating1">
                                <i class="st-on" style="width:{{ round($operationLecture->rating * 20, 1) }}%;"><i class="ic1"></i></i><!-- (3.5/5) -->
                                <i class="st-off" style="width:100%;"><i class="ic2"></i></i><!-- (100-70) -->
                            </i>
                            <span class="t2">
                                <span class="t2t1">평점</span>
                                <span class="t2t2">{{ $operationLecture->rating }}</span>
                                <span class="t2t3">· 수강생 {{ $operationLecture->student_cnt }}명</span>
                            </span>
                        </div>
                        <div class="tg2">
                            <span class="t2">
                                <span class="t2t1">{{ $operationLecture->owner_name }}</span>
                            </span>
                            <span class="t3">
                                <span class="t3t1">@if ($operationLecture->free_yn == 'Y') 무료 @else 유료 @endif</span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        @else
        <div>운영 중인 강좌가 없습니다.</div>
        @endif
	</div>

    @if($totalLectureCnt>4)
        <!-- cp1more1 -->
    <div class="cp1more1">
        <a href="#★" class="more">
            <span class="t1">더보기</span>
            <i class="ic1"></i>
        </a>
    </div>
    <!-- /cp1more1 -->
    @endif
    <!-- /lst1 -->

</div>
<script>
$(function(){
    var $my = $('.cp1fcard1'),
            $more = $('.more', $my),
            $lst = $('.lst1', $my);

    $more.on('click', function(e){
            e.preventDefault();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'json',
                url: "{{ route('etc.user_introduction') }}",
                data: {
                    'type': 'instructor',
                    'cnt': $('.item', $my).length,
                    'user_idx': {{ $userInfo->id }}
                },
                success: (data) => {
                    if(data.status == 'success'){
                        $lst.append(data.html);
                    }
                    else if(data.status == 'fail'){
                        alert('강좌 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                        console.log('code: ' + data.code + '\nmessage: ' + data.msg);
                    }
                    //TODO: TOTAL LECTURE < $cnt +5 more 버튼 비활성화
                    if({{ $totalLectureCnt }} <=$('.item', $my).length){
                            $more.hide();
                    }
                },
                error: function(request, status, error) {
                    console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
                },
            })
        });
})
</script>

</div>
<!-- /cp1fcard1 -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
