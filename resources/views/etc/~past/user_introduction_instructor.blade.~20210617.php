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
            @if (Auth::user()->role == 'youtuber')
            <a href="{{ route('etc.propose', ['user_idx' => $_GET['user_idx']]) }}" class="b1 button block">제안하기</a>
            @endif
		</div>
		<div class="w1w2">
			<div class="tg1">
				<strong class="t1">{{ $userInfo->nickname }}</strong>
			</div>
			<div class="tg2">
                {{ $userInfo->introduction }}
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
				<span class="vat">4</span>
			</strong>
			<span class="t2">
				강좌 수
			</span>
		</div>
		<div class="item">
			<strong class="t1">
				<span class="vat">1,001</span>
			</strong>
			<span class="t2">
				수강생 수
			</span>
		</div>
		<div class="item">
			<strong class="t1">
				<span class="vat">4.21</span>
			</strong>
			<span class="t2">
				총 평점
			</span>
		</div>
		<div class="item">
			<strong class="t1">70%</strong>
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
	<!-- /lst1 -->
</div>
</div>
<!-- /cp1fcard1 -->


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
