@php
    $commonPath = '/_res/dolearn';
    $sitePath = '/_res/dolearn';

    $role = isset(Auth::user()->role) ? Auth::user()->role : '';
    $userId = isset(Auth::user()->email) ? Auth::user()->email : '';
@endphp

<div id="skipnav">
	<ul>
	<li><a href="#body">본문 바로가기</a></li>
	<li><a href="#tnb1">주 메뉴 바로가기</a></li>
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


<!-- logo -->
<h1 id="logo">
	<a href="{{ route('main') }}" title="홈으로 이동" class="a1">
		<img src="{{ asset('assets/images/inc/logo.png') }}" alt="DoLearn" />
	</a>
</h1>
<!-- /logo -->


<h2 class="blind">상단 메뉴</h2>

<!-- tnb1 [JS] -->
<div id="tnb1">
	<h3 class="blind">주 메뉴</h3>
	<strong class="h1"><a href="#tnb1c" class="b1 toggle"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">여닫기</span></a></strong>
	<!-- tnb1c -->
	<div id="tnb1c"><div class="bg"></div>
	<!-- cont -->
	<div class="cont"><div class="bg"></div>
		<a href="#tnb1c" class="b2 close"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">닫기</span></a>
		<!-- d1 -->
		<div class="d1">
			<ul>
			<li class="m1 on">
        <a href="{{ route('sub.lecture.lecture_list') }}"><span class="t1">강좌</span></a>
				<div class="d2">
					<div class="hg1"><!-- 1차제목, 부제목 추가 -->
						<strong class="h1">COURSE</strong>
						<p class="h2">
							지금 딱! 필요했던<br /> 강좌를 만나보세요.
						</p>
						<i class="ic1"></i>
					</div>
					<ul>
					<li class="m0 submain">
						<a href="javascript:void(0);"><span class="t1">all</span></a>
					</li>
					<li class="m1">
						<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'DP000000']) }}"><span class="t1">개발</span></a>
						<div class="d3">
							<ul>
							<li class="m0 submain">
								<a href="javascript:void(0);"><span class="t1">전체</span></a>
							</li>
							<li class="m1">
								<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'DP000000', 'scate_id' => 'DP010000']) }}"><span class="t1">웹개발</span></a>
							</li>
							<li class="m2">
								<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'DP000000', 'scate_id' => 'DP020000']) }}"><span class="t1">모바일개발</span></a>
							</li>
							<li class="m3">
								<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'DP000000', 'scate_id' => 'DP030000']) }}"><span class="t1">프로그래밍 언어</span></a>
							</li>
							</ul>
						</div>
					</li>
					<li class="m2">
						<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'DS000000']) }}"><span class="t1">데이터 사이언스</span></a>
						<div class="d3">
							<ul>
							<li class="m0 submain">
								<a href="javascript:void(0);"><span class="t1">전체</span></a>
							</li>
							<li class="m1">
								<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'DS000000', 'scate_id' => 'DS010000']) }}"><span class="t1">데이터분석</span></a>
							</li>
							<li class="m2">
								<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'DS000000', 'scate_id' => 'DS020000']) }}"><span class="t1">인공지능</span></a>
							</li>
							<li class="m3">
								<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'DS000000', 'scate_id' => 'DS030000']) }}"><span class="t1">데이터베이스</span></a>
							</li>
							</ul>
						</div>
					</li>
					<li class="m3">
						<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'SI000000']) }}"><span class="t1">커리어</span></a>
						<div class="d3">
							<ul>
							<li class="m0 submain">
								<a href="javascript:void(0);"><span class="t1">전체</span></a>
							</li>
							<li class="m1">
								<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'SI000000', 'scate_id' => 'SI010000']) }}"><span class="t1">직무능력</span></a>
							</li>
							<li class="m2">
								<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'SI000000', 'scate_id' => 'SI020000']) }}"><span class="t1">금융 · 경영</span></a>
							</li>
							</ul>
						</div>
					</li>
					<li class="m4">
						<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'ES000000']) }}"><span class="t1">키즈</span></a>
						<div class="d3">
							<ul>
							<li class="m0 submain">
								<a href="javascript:void(0);"><span class="t1">전체</span></a>
							</li>
							<li class="m1">
								<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'ES000000', 'scate_id' => 'ES010000']) }}"><span class="t1">유아교육</span></a>
							</li>
							<li class="m2">
								<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'ES000000', 'scate_id' => 'ES020000']) }}"><span class="t1">초등교육</span></a>
							</li>
							</ul>
						</div>
					</li>
					</ul>
				</div>
			</li>
			<li class="m2">
				<a href="{{ route('sub.video.video_list') }}"><span class="t1">영상</span></a>
				<div class="d2">
					<div class="hg1"><!-- 1차제목, 부제목 추가 -->
						<strong class="h1">VIDEO</strong>
						<p class="h2">
							지금 딱! 필요했던<br /> 영상을 만나보세요.
						</p>
						<i class="ic1"></i>
					</div>
					<ul>
					<li class="m0 submain">
						<a href="javascript:void(0);"><span class="t1">all</span></a>
					</li>
					<li class="m1">
						<a href="{{ route('sub.video.video_list', ['bcate_id' => 'DP000000']) }}"><span class="t1">개발</span></a>
						<div class="d3">
							<ul>
							<li class="m0 submain">
								<a href="javascript:void(0);"><span class="t1">전체</span></a>
							</li>
							<li class="m1">
								<a href="{{ route('sub.video.video_list', ['bcate_id' => 'DP000000', 'scate_id' => 'DP010000']) }}"><span class="t1">웹개발</span></a>
							</li>
							<li class="m2">
								<a href="{{ route('sub.video.video_list', ['bcate_id' => 'DP000000', 'scate_id' => 'DP020000']) }}"><span class="t1">모바일개발</span></a>
							</li>
							<li class="m3">
								<a href="{{ route('sub.video.video_list', ['bcate_id' => 'DP000000', 'scate_id' => 'DP030000']) }}"><span class="t1">프로그래밍 언어</span></a>
							</li>
							</ul>
						</div>
					</li>
					<li class="m2">
						<a href="{{ route('sub.video.video_list', ['bcate_id' => 'DS000000']) }}"><span class="t1">데이터 사이언스</span></a>
						<div class="d3">
							<ul>
							<li class="m0 submain">
								<a href="javascript:void(0);"><span class="t1">전체</span></a>
							</li>
							<li class="m1">
								<a href="{{ route('sub.video.video_list', ['bcate_id' => 'DS000000', 'scate_id' => 'DS010000']) }}"><span class="t1">데이터분석</span></a>
							</li>
							<li class="m2">
								<a href="{{ route('sub.video.video_list', ['bcate_id' => 'DS000000', 'scate_id' => 'DS020000']) }}"><span class="t1">인공지능</span></a>
							</li>
							<li class="m3">
								<a href="{{ route('sub.video.video_list', ['bcate_id' => 'DS000000', 'scate_id' => 'DS030000']) }}"><span class="t1">데이터베이스</span></a>
							</li>
							</ul>
						</div>
					</li>
					<li class="m3">
						<a href="{{ route('sub.video.video_list', ['bcate_id' => 'SI000000']) }}"><span class="t1">커리어</span></a>
						<div class="d3">
							<ul>
							<li class="m0 submain">
								<a href="javascript:void(0);"><span class="t1">전체</span></a>
							</li>
							<li class="m1">
								<a href="{{ route('sub.video.video_list', ['bcate_id' => 'SI000000', 'scate_id' => 'SI010000']) }}"><span class="t1">직무능력</span></a>
							</li>
							<li class="m2">
								<a href="{{ route('sub.video.video_list', ['bcate_id' => 'SI000000', 'scate_id' => 'SI020000']) }}"><span class="t1">금융 · 경영</span></a>
							</li>
							</ul>
						</div>
					</li>
					<li class="m4">
						<a href="{{ route('sub.video.video_list', ['bcate_id' => 'ES000000']) }}"><span class="t1">키즈</span></a>
						<div class="d3">
							<ul>
							<li class="m0 submain">
								<a href="javascript:void(0);"><span class="t1">전체</span></a>
							</li>
							<li class="m1">
								<a href="{{ route('sub.video.video_list', ['bcate_id' => 'ES000000', 'scate_id' => 'ES010000']) }}"><span class="t1">유아교육</span></a>
							</li>
							<li class="m2">
								<a href="{{ route('sub.video.video_list', ['bcate_id' => 'ES000000', 'scate_id' => 'ES020000']) }}"><span class="t1">초등교육</span></a>
							</li>
							</ul>
						</div>
					</li>
					</ul>
				</div>
			</li>
			<li class="m3">
				<a href="{{ route('sub.community.notice') }}"><span class="t1">커뮤니티</span></a>
				<div class="d2">
					<div class="hg1"><!-- 1차제목, 부제목 추가 -->
						<strong class="h1">DoLearn</strong>
						<p class="h2">
							나에게 필요한 강좌와 영상만<br /> 콕! 집어 추천해 줍니다.
						</p>
						<i class="ic1"></i>
					</div>
					<ul>
					<li class="m0 submain">
						<a href="{{ route('sub.community.notice') }}"><span class="t1">커뮤니티</span></a>
					</li>
					<li class="m1">
						<a href="{{ route('sub.community.notice') }}"><span class="t1">공지사항</span></a>
					</li>
					<li class="m2">
						<a href="{{ route('sub.community.trend') }}"><span class="t1">인사이트</span></a>
						<div class="d3">
							<ul>
							<li class="m1">
								<a href="{{ route('sub.community.trend') }}"><span class="t1">최신 트렌드</span></a>
							</li>
                            <li class="m2">
								<a href="{{ route('sub.community.ranking') }}"><span class="t1">랭킹</span></a>
							</li>
							<li class="m3">
								{{-- <a href="../../sub/03_02_02.html"><span class="t1">인공지능</span></a> --}}
							</li>
							</ul>
						</div>
					</li>
					<li class="m3">
						<a href="{{ route('sub.community.service_qna') }}"><span class="t1">서비스 문의</span></a>
						<!-- <div class="d3">
							<ul>
							<li class="m1">
								<a href="{{ route('sub.community.service_qna', ['type' => 'all']) }}"><span class="t1">전체</span></a>
							</li>
							<li class="m2">
								<a href="{{ route('sub.community.service_qna', ['type' => 'general']) }}"><span class="t1">일반</span></a>
							</li>
							<li class="m3">
								<a href="{{ route('sub.community.service_qna', ['type' => 'instructor']) }}"><span class="t1">강사</span></a>
							</li>
							<li class="m4">
								<a href="{{ route('sub.community.service_qna', ['type' => 'student']) }}"><span class="t1">수강자</span></a>
							</li>
							<li class="m5">
								<a href="{{ route('sub.community.service_qna', ['type' => 'payment']) }}"><span class="t1">결제</span></a>
							</li>
							</ul>
						</div> -->
					</li>
					<li class="m4">
						<a href="{{ route('sub.community.review_all') }}"><span class="t1">수강후기 모아보기</span></a>
					</li>
					</ul>
				</div>
			</li>
			<li class="m4">
				<a href="../../sub/04.html"><span class="t1">스토어</span></a>
			</li>
			<li class="m5">
				<a href="../../sub/05.html"><span class="t1">내 강의실</span></a>
			</li>
			</ul>
		</div>
		<!-- /d1 -->
		<a href="#tnb1c" class="b2 close"><i class="ic1"></i> <span class="t1 blind">주 메뉴</span> <span class="blind">닫기</span></a>
	</div>
	<!-- /cont -->
	</div>
	<!-- /tnb1c -->
</div>
<!-- /tnb1 -->


<!-- search1 -->
<div id="search1">
	<strong><a href="#search1c" class="b1 toggle"><i class="ic1"></i><span class="t1">검색하기</span> <span class="t1 blind">(검색 박스 여닫기)</span></a></strong>
	<!-- search1c -->
	<div id="search1c">
		<div class="wrap1">
			<div class="wrap2">
				<div class="hg1">
					<strong class="h1">SEARCH</strong>
				</div>
				<form action="{{ route('sub.search.integrated_search') }}" method="POST">
                    @csrf
					<fieldset>
						<legend class="blind"><strong class="h1">통합 검색</strong></legend>
						<input type="text" name="keyword" value="" placeholder="검색어를 입력하세요." title="검색어"
							onfocus="if( this.value == this.defaultValue ) this.value=''; this.select();"
							onblur="if( this.value=='' ) this.value=this.defaultValue;"
							class="text" />
						<button type="submit" class="button submit search"><i class="ic1"></i><span class="t1 blind">검색</span></button>
					</fieldset>
				</form>
				<a href="#search1c" class="b2 close"><i class="ic1"></i><span class="t1 blind">검색 박스 닫기</span></a>
			</div>
		</div>
	</div>
	<!-- /search1c -->
</div>
<!-- /search1 -->

@if (Auth::user())

<!-- gn1 -->
<div id="gn1">
	<div class="mns1">
		<div class="mn1 notice">
            <a href="#gn1c1" class="a1 toggle" onclick = "getList()"><i class="a1ic1"></i> <span class="a1t1 blind">알림</span> <b class="a1t2"></b></a>
			<div id="gn1c1" class="gn1c">
				<div class="cont">
					<div class="w1">
						<a href="#gn1c1" class="b1 close"><i class="b1ic1"></i> <span class="b1t1 blind">미니 알림 창 닫기</span></a>
                        <strong class="tt1">읽지 않은 알림 0개</strong>
					</div>
					<div class="w2">
						<ul class="lst1">

						</ul>
						<a href="{{ route('notification.my_notification_list') }}" class="b2">모든 알림 보기</a>
					</div>
				</div>
			</div>
		</div>
        {{-- TODO: 2차 --}}
		{{-- <div class="mn1 cart">
			<a href="#gn1c2" class="a1 toggle"><i class="a1ic1"></i> <span class="a1t1 blind">장바구니</span> <b class="a1t2">2</b></a>
			<div id="gn1c2" class="gn1c">
				<div class="cont">
					<div class="w1">
						<a href="#gn1c2" class="b1 close"><i class="b1ic1"></i> <span class="b1t1 blind">미니 장바구니 창 닫기</span></a>
						<strong class="tt1">담긴 강좌 3개</strong>
					</div>
					<div class="w2">
						<ul class="lst1">
						<li class="li1"><a href="javascript:void(0);" class="a2">
							<div class="f1">
								<span class="f1p1"><img src="{{ asset('assets/images/inc/noimg1.png') }}" alt="★대체텍스트필수" /></span>
							</div>
							<div class="tg1">
								<span class="t1">강좌명이 표시됩니다.</span>
								<span class="t2">33,000원</span>
							</div>
						</a></li>
						<li class="li1"><a href="javascript:void(0);" class="a2">
							<div class="f1">
								<span class="f1p1"><img src="{{ asset('assets/images/inc/noimg1.png') }}" alt="★대체텍스트필수" /></span>
							</div>s
							<div class="tg1">
								<span class="t1">강좌명이 표시됩니다.</span>
								<span class="t2">11,000원</span>
							</div>
						</a></li>
						<li class="li1"><a href="javascript:void(0);" class="a2">
							<div class="f1">
								<span class="f1p1"><img src="{{ asset('assets/images/inc/noimg1.png') }}" alt="★대체텍스트필수" /></span>
							</div>
							<div class="tg1">
								<span class="t1">강좌명이 표시됩니다.</span>
								<span class="t2">11,000원</span>
							</div>
						</a></li>
						</ul>
						<a href="{{ route('payment.payment_cart') }}" class="b2">수강바구니 이동</a>
					</div>
				</div>
			</div>
		</div> --}}
		<div class="mn1 my">
			<a href="#gn1c3" class="a1 toggle"><i class="a1ic1"></i> <span class="a1t1 blind">미니 프로필</span> <i class="a1ic2"></i></a>
			<div id="gn1c3" class="gn1c">
				<div class="cont">
					<div class="w1">
						<a href="#gn1c3" class="b1 close"><i class="b1ic1"></i> <span class="b1t1 blind">미니 프로필 창 닫기</span></a>
						<a href="{{ route('notification.my_notification_list') }}" class="a1 notice"><i class="a1ic1"></i> <span class="a1t1 blind">알림</span> <b class="a1t2">4</b></a>
						{{-- TODO: 2차 --}}
                        {{-- <a href="{{ route('payment.purchase_info') }}" class="a1 cart"><i class="a1ic1"></i> <span class="a1t1 blind">장바구니</span> <b class="a1t2">2</b></a> --}}
					</div>
					<div class="w2">
                        <strong  class="tt1"><span class="tt1t1">미니 프로필</span> <i class="tt1ic1"></i></strong>

                        {{--  BEFORE: Auth::user()->email  AFTER: $userId 수정한 사람: 강은 --}}
                        @if ($userId != '')
                        <a href="{{ route('account.profile_settings') }}" class="a2"><span class="a2t1">{{ $userId }}</span>{{-- <i class="a2ic1">&gt;</i> --}}</a>
                        <div class="tg1">
							<span class="t1"><span class="t1t1">수강</span> <span class="t1t2">@if (isset($_SESSION['countLearningLecture'])) {{ $_SESSION['countLearningLecture'] }} @endif</span></span>
                            @if ($role == 'youtuber')
							<span class="t1"><span class="t1t1">영상</span> <span class="t1t2">@if (isset($_SESSION['countLearningLecture'])) {{ $_SESSION['countLearningLecture'] }} @endif</span></span>
                            @endif
                            @if ($role == 'instructor')
							<span class="t1"><span class="t1t1">운영</span> <span class="t1t2">@if (isset($_SESSION['countOperatingLecture'])) {{ $_SESSION['countOperatingLecture'] }} @endif</span></span>
                            @endif
						</div>
                        @else
                        <a href="#layer1login1" class="a2 toggle" name="test" data-send-focus="that"><span class="a2t1">로그인 후 이용해주세요.</span>{{-- <i class="a2ic1">&gt;</i> --}}</a>
                        @endif

                        @if ($role == 'instructor')
						<a href="{{ route('sub.lecture.add_new_lecture', ['step' => 'basic_info']) }}" class="b2">+ 새 강좌 만들기</a>
                        @endif
					</div>
					<div class="w3">
						<ul class="mns2">
                            @if ($role == 'youtuber')
                            <li class="mn2"><a href="{{ route('manage.youtuber.video_management') }}" class="a3"><span class="a3t1">영상관리</span> <i class="a3ic1 manage"></i></a></li>
                            @endif
                            @if ($role == 'instructor')
                            <li class="mn2"><a href="{{ route('manage.instructor.operation_lecture') }}" class="a3"><span class="a3t1">운영강좌</span> <i class="a3ic1 operation"></i></a></li>
                            @endif
                            <li class="mn2"><a href="{{ route('sub.management.learning_lecture_list') }}" class="a3"><span class="a3t1">수강강좌</span> <i class="a3ic1"></i></a></li>
                            <li class="mn2"><a href="{{ route('sub.video.video_play_history') }}" class="a3"><span class="a3t1">영상보관함</span> <i class="a3ic1"></i></a></li>
                            {{-- TODO: 내 결제(2차) --}}
                            {{-- <li class="mn2"><a href="{{ route('payment.purchase_info') }}" class="a3"><span class="a3t1">내결제</span> <i class="a3ic1"></i></a></li> --}}
                            <li class="mn2"><a href="{{ route('account.profile_settings') }}" class="a3"><span class="a3t1">계정설정</span> <i class="a3ic1"></i></a></li>
						</ul>
					</div>
					<div class="w4">
						<a href="{{ route('account.logout') }}" class="a4"><span class="a4t1">로그아웃</span></a>
                        @if ($role == 'instructor')
						<a href="{{ route('sub.community.service_qna') }}" class="a5"><span class="a5t1">서비스문의</span> <i class="a5ic1">&gt;</i></a>
                        @else
                        <a href="{{ route('etc.instructor_application') }}" class="a5"><span class="a5t1">강사계정신청하기</span> <i class="a5ic1">&gt;</i></a>
                        @endif

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- gn1 -->
<script>
    function getList(){

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType: 'json',
            url: "{{ route('notification.notification_list') }}",
            success: (data) => {
                $('.notice .lst1').empty().append(data.html);
                $('.notice .tt1').text('읽지 않은 알림 '+data.notReadNotice+'개');
            },
        });
    }
</script>


<script>
    $(document).ready(function(){
        img = $(".w2 .tt1");

        @if (isset(Auth::user()->save_profile_image))
            image_path = "{{ url('storage/uploads/profile/') }}"+"/"+"{{ Auth::user()->save_profile_image }}";
            url = "url("+image_path+")";
            img.css({"background": url, "background-size":"44px 44px", "border-radius": "50%"});
            img.removeClass("ttl");
            img.addClass("ttl");
        @endif
    });
</script>

<!-- gn2 -->
<div id="gn2">
	<ul>
	<li class="m"><a href="{{ url('/sub/dashboard/dashboard_main') }}" class="a1"><i class="ic1"></i> <span class="t1">대시보드</span></a></li>
	</ul>
</div>
<!-- gn2 -->

@else

<!-- gn3 -->
<div id="gn3">
	<div class="mns1">
		<div class="mn1 login">
			<a href="#layer1login1" class="a1 toggle"><i class="a1ic1"></i>  <span class="a1t1">로그인</span></a>
		</div>
		<div class="mn1 join">
			<a href="{{ route('account.signup') }}" class="a1"><i class="a1ic1"></i>  <span class="a1t1">회원가입</span></a>
		</div>
	</div>
</div>
<!-- gn3 -->

<script>/*<![CDATA[*/
	//$(function(){
		/** ◇◆ 로그인전(로그아웃) 구분. 20210601. @m.
		 */
		(function(){
			$('html').addClass('logout');
		})();
	//});
/*]]>*/</script>

@endif

<div>
    {{-- 로그인 전/후 공통 로그인 레이어 팝업 --}}
    @include('account.inc_layer_login')

    <!--관심 설정 레이어 팝업-->
    <a href="#layer1interests1set1" class="set toggle" data-send-focus="that"><span class="t1 blind">설정</span> <i class="ic1"></i></a>
    @include('account.inc_layer_interests_set')

</div>

<script>
    @if (Auth::check())
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: 'json',
        url: "{{ route('notification.non_read_notification') }}",
        success: (data) => {
            $('.notice .a1t2').text(data.nonReadCount);
        },
    });

    @endif

    $(function(){
        @if (Session::has('alert'))
            alert('{{ session()->get("alert") }}');
            "{{ session()->forget('alert') }}"

            setTimeout(function() {
                $('a[href*="#layer1login1"]').triggerHandler('click');
            }, 300);

        @endif

        @if (Session::has('email')&&Session::has('role'))
            joinemail = '{{ session()->get("email") }}';
            joinrole = '{{ session()->get("role") }}'
            "{{ session()->forget('email') }}"
            "{{ session()->forget('role') }}"

            setTimeout(function() {
                $('[href*="#layer1interests1set1"]').triggerHandler('click');
            }, 300);
            "{{ session()->put('alert', '회원가입이 완료되었습니다.\n로그인 페이지로 이동합니다.') }}"
        @endif

        //알람 정보 조회
    });


</script>

</div>
<!-- /container -->
</div>
<!-- /#head_s1 -->
</div><hr class="dpn" />
<!-- /#head -->
