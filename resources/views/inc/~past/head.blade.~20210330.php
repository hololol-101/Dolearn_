@php
    $commonPath = '/_res/dolearn';
    $sitePath = '/_res/dolearn';
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
	<a href="/" title="홈으로 이동" class="a1">
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
                <a href="{{ route('sub.lecture.lecture_list') }}"><span class="t1">전체강좌</span></a>
				<div class="d2">
					<ul>
					<li class="m0 submain">
						<a href="javascript:void(0);"><span class="t1">전체강좌</span></a>
					</li>
					<li class="m1">
						<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'DP000000']) }}"><span class="t1">개발 &amp; 프로그래밍</span></a>
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
						<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'SI000000']) }}"><span class="t1">자기계발</span></a>
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
						<a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => 'ES000000']) }}"><span class="t1">교육 및 학문</span></a>
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
				<a href="{{ route('sub.video.video_list') }}"><span class="t1">전체영상</span></a>
				<div class="d2">
					<ul>
					<li class="m0 submain">
						<a href="javascript:void(0);"><span class="t1">전체영상</span></a>
					</li>
					<li class="m1">
						<a href="{{ route('sub.video.video_list', ['bcate_id' => 'DP000000']) }}"><span class="t1">개발 &amp; 프로그래밍</span></a>
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
						<a href="{{ route('sub.video.video_list', ['bcate_id' => 'SI000000']) }}"><span class="t1">자기계발</span></a>
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
						<a href="{{ route('sub.video.video_list', ['bcate_id' => 'ES000000']) }}"><span class="t1">교육 및 학문</span></a>
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
						<div class="d3">
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
						</div>
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
				<form action="{{ route('sub.integrated_search') }}" method="POST">
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


<!-- gn1 -->
<div id="gn1">
	<div class="mns1">
		<div class="mn1 notice">
			<a href="#gn1c1" class="a1 toggle"><i class="a1ic1"></i> <span class="a1t1 blind">알림</span> <b class="a1t2">12</b></a>
			<div id="gn1c1" class="gn1c">
				<div class="cont">
					<div class="w1">
						<a href="#gn1c1" class="b1 close"><i class="b1ic1"></i> <span class="b1t1 blind">미니 알림 창 닫기</span></a>
						<strong class="tt1">읽지 않은 알림 4개</strong>
					</div>
					<div class="w2">
						<ul class="lst1">
						<li class="li1"><a href="?#" class="a2">
							<span class="g1 s1">공지</span>
							<div class="tg1">
								<span class="t1">[두런 소식] 2020.12.22 서비스 장애 개선</span>
								<span class="t2">두런 공지</span>
								<span class="t3">10일전</span>
							</div>
						</a></li>
						<li class="li1"><a href="?#" class="a2">
							<span class="g1 s2">학습</span>
							<div class="tg1">
								<span class="t1">과제 제출이 완료되었습니다.</span>
								<span class="t2">수강강좌 제목 01</span>
								<span class="t3">10일전</span>
							</div>
						</a></li>
						<li class="li1"><a href="?#" class="a2">
							<span class="g1 s2">학습</span>
							<div class="tg1">
								<span class="t1">새로운 강의가 추가 되었습니다.</span>
								<span class="t2">수강강좌 제목 01</span>
								<span class="t3">10일전</span>
							</div>
						</a></li>
						<li class="li1"><a href="?#" class="a2">
							<span class="g1 s2">학습</span>
							<div class="tg1">
								<span class="t1">질문등록이 완료되었습니다.</span>
								<span class="t2">수강강좌 제목 01</span>
								<span class="t3">10일전</span>
							</div>
						</a></li>
						</ul>
						<a href="{{ route('sub.dashboard.my_notification_list') }}" class="b2">모든 알림 보기</a>
					</div>
				</div>
			</div>
		</div>
		<div class="mn1 cart">
			<a href="#gn1c2" class="a1 toggle"><i class="a1ic1"></i> <span class="a1t1 blind">장바구니</span> <b class="a1t2">10</b></a>
			<div id="gn1c2" class="gn1c">
				<div class="cont">
					<div class="w1">
						<a href="#gn1c2" class="b1 close"><i class="b1ic1"></i> <span class="b1t1 blind">미니 장바구니 창 닫기</span></a>
						<strong class="tt1">담긴 강좌 3개</strong>
					</div>
					<div class="w2">
						<ul class="lst1">
						<li class="li1"><a href="?#" class="a2">
							<div class="f1">
								<span class="f1p1"><img src="{{ asset('assets/images/inc/noimg1.png') }}" alt="★대체텍스트필수" /></span>
							</div>
							<div class="tg1">
								<span class="t1">강좌명이 표시됩니다.</span>
								<span class="t2">33,000원</span>
							</div>
						</a></li>
						<li class="li1"><a href="?#" class="a2">
							<div class="f1">
								<span class="f1p1"><img src="{{ asset('assets/images/inc/noimg1.png') }}" alt="★대체텍스트필수" /></span>
							</div>
							<div class="tg1">
								<span class="t1">강좌명이 표시됩니다.</span>
								<span class="t2">11,000원</span>
							</div>
						</a></li>
						<li class="li1"><a href="?#" class="a2">
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
		</div>
		<div class="mn1 my">
			<a href="#gn1c3" class="a1 toggle"><i class="a1ic1"></i> <span class="a1t1 blind">미니 프로필</span> <i class="a1ic2"></i></a>
			<div id="gn1c3" class="gn1c">
				<div class="cont">
					<div class="w1">
						<a href="#gn1c3" class="b1 close"><i class="b1ic1"></i> <span class="b1t1 blind">미니 프로필 창 닫기</span></a>
						<a href="#?" class="a1 notice"><i class="a1ic1"></i> <span class="a1t1 blind">알림</span> <b class="a1t2">12</b></a>
						<a href="#?" class="a1 cart"><i class="a1ic1"></i> <span class="a1t1 blind">장바구니</span> <b class="a1t2">10</b></a>
					</div>
                    <!-- TODO:사용자 별 미니 프로필 메뉴 분기 필요 -->
					<div class="w2">
						<strong class="tt1"><span class="tt1t1">미니 프로필</span> <i class="tt1ic1"></i></strong>
						<a href="?#" class="a2"><span class="a2t1">사용자이메일</span> <i class="a2ic1">&gt;</i></a>
						<div class="tg1">
							<span class="t1"><span class="t1t1">수강</span> <span class="t1t2">4</span></span>
							<span class="t1"><span class="t1t1">영상</span> <span class="t1t2">30</span></span>
							<span class="t1"><span class="t1t1">운영</span> <span class="t1t2">5</span></span>
						</div>
						<a href="{{ route('sub.lecture.add_new_lecture', ['step' => 'basic_info']) }}" class="b2">+ 새 강좌 만들기</a>
					</div>
					<div class="w3">
						<ul class="mns2">
                            <li class="mn2"><a href="{{ route('sub.dashboard.dashboard_main', ['role' => 'youtuber']) }}" class="a3"><span class="a3t1">유튜버 대시보드</span> <i class="a3ic1"></i></a></li>
                            <li class="mn2"><a href="{{ route('sub.dashboard.dashboard_main', ['role' => 'instructor']) }}" class="a3"><span class="a3t1">강사 대시보드</span> <i class="a3ic1"></i></a></li>
                            <li class="mn2"><a href="{{ route('manage.instructor.operation_lecture', ['role' => 'instructor']) }}" class="a3"><span class="a3t1">운영강좌</span> <i class="a3ic1 operation"></i></a></li>
                            <li class="mn2"><a href="{{ route('manage.youtuber.video_management') }}" class="a3"><span class="a3t1">영상관리</span> <i class="a3ic1 manage"></i></a></li>
                            <li class="mn2"><a href="{{ route('sub.management.learning_lecture_list') }}" class="a3"><span class="a3t1">수강강좌</span> <i class="a3ic1"></i></a></li>
                            <li class="mn2"><a href="{{ route('sub.video.video_play_history') }}" class="a3"><span class="a3t1">영상보관함</span> <i class="a3ic1"></i></a></li>
                            <li class="mn2"><a href="{{ route('payment.payment_cart') }}" class="a3"><span class="a3t1">내결제</span> <i class="a3ic1"></i></a></li>
                            <li class="mn2"><a href="{{ route('account.profile_settings') }}" class="a3"><span class="a3t1">계정설정</span> <i class="a3ic1"></i></a></li>
                            <li class="mn2"><a href="{{ route('account.signin') }}" class="a3" data-send-focus="that"><span class="a3t1">로그인</span> <i class="a3ic1"></i></a></li>
                            <!-- 레이어 팝업 시 class에 toggle 추가 -->
						</ul>
					</div>
					<div class="w4">
						<a href="?#★" class="a4"><span class="a4t1">로그아웃</span></a>
						<a href="?#★" class="a5"><span class="a5t1">서비스문의</span> <i class="a5ic1">&gt;</i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- gn1 -->


<!-- gn2 -->
<div id="gn2">
	<ul>
	<li class="m"><a href="{{ url('/sub/dashboard/dashboard_main?role=student') }}" class="a1"><i class="ic1"></i> <span class="t1">대시보드</span></a></li>
	</ul>
</div>
<!-- gn2 -->


</div>
<!-- /container -->
</div>
<!-- /#head_s1 -->
</div><hr class="dpn" />
<!-- /#head -->
