@php
$role = Auth::user()->role;
@endphp

<!-- anb1 -->
<nav id="anb1">
	<strong><a href="#anb1c" class="b1 toggle"><i class="ic1"></i> <span class="t1 blind">대시보드 전체메뉴</span> <span class="blind">여닫기</span></a></strong>
	<!-- anb1c -->
	<div id="anb1c">
	<div class="cont">
		<h3 class="h1 blind">대시보드 전체메뉴</h3>
		<!-- d1 -->
		<div class="d1">
			<ul>
			<li class="m1"><a href="#"><span class="t1">대시보드</span></a>
				<div class="d2">
					<ul>
					<li class="m1"><a href="{{ route('sub.dashboard.dashboard_main') }}"><span class="t1">대시보드</span></a></li>
					<li class="m2"><a href="{{ route('notification.my_notification_list') }}"><span class="t1">내 알림</span></a></li>

                    @if ($role == 'instructor')
                    <li class="m3"><a href="{{ route('sub.lecture.add_new_lecture') }}" class="s1"><span class="t1">+ 새 강좌 만들기</span></a></li>
                    @endif

					</ul>
				</div>
			</li>

            @if ($role == 'instructor')
            <li class="m2"><a href="#"><span class="t1">강좌관리</span></a>
                <div class="d2">
                    <ul>
                    <li class="m1"><a href="{{ route('manage.instructor.operation_lecture') }}"><span class="t1">운영 강좌</span></a></li>

                    {{-- 강좌 관리 상세로 이동 --}}
                    {{-- <li class="m2"><a href="{{ route('manage.instructor.question_list') }}"><span class="t1">질문 리스트</span></a></li>
                    <li class="m3"><a href="{{ route('manage.instructor.review_list') }}"><span class="t1">수강후기 리스트</span></a></li> --}}

                    {{-- TODO: 수익내역(2차) --}}
                    {{-- <li class="m4"><a href="{{ route('manage.instructor.income_info') }}"><span class="t1">수익 내역</span></a></li> --}}
                    </ul>
                </div>
            </li>
            @endif

            @if ($role == 'youtuber')
            <li class="m2"><a href="#"><span class="t1">영상관리</span></a>
				<div class="d2">
					<ul>
					<li class="m1"><a href="{{ route('manage.youtuber.video_management', ['type' => 'video']) }}"><span class="t1">내 영상</span></a></li>
					<li class="m2"><a href="{{ route('manage.youtuber.video_management', ['type' => 'lecture']) }}"><span class="t1">내 영상 포함 강좌</span></a></li>
					</ul>
				</div>
			</li>
            @endif

			<li class="m2"><a href="#"><span class="t1">학습관리</span></a>
				<div class="d2">
					<ul>
					<li class="m1"><a href="{{ route('sub.management.learning_lecture_list') }}"><span class="t1">수강 강좌</span></a></li>
					{{-- 삭제 --}}
                    {{-- <li class="m2"><a href="{{ route('sub.management.lecture_note_list') }}"><span class="t1">강좌 노트</span></a></li> --}}
					<li class="m3"><a href="{{ route('sub.management.my_question_list') }}"><span class="t1">내 질문</span></a></li>
					</ul>
				</div>
			</li>
			<li class="m3"><a href="#"><span class="t1">영상보관함</span></a>
				<div class="d2">
					<ul>
					<li class="m1"><a href="{{ route('sub.video.video_play_history') }}"><span class="t1">시청 기록</span></a></li>
					<li class="m2"><a href="{{ route('sub.video.video_note_list') }}"><span class="t1">영상 노트</span></a></li>
					<li class="m3"><a href="{{ route('sub.video.video_playlist') }}"><span class="t1">재생 목록</span></a></li>
					</ul>
				</div>
			</li>
            {{-- TODO: 내 결제(2차) --}}
			{{-- <li class="m4"><a href="#"><span class="t1">내 결제</span></a>
				<div class="d2">
					<ul>
					<li class="m1"><a href="{{ route('payment.payment_cart') }}"><span class="t1">수강 바구니</span></a></li>
					<li class="m2"><a href="{{ route('payment.purchase_info') }}"><span class="t1">구매 정보</span></a></li>
					</ul>
				</div>
			</li> --}}
			<li class="m5"><a href="#"><span class="t1">계정 설정</span></a>
				<div class="d2">
					<ul>
					<li class="m1"><a href="{{ route('account.profile_settings') }}"><span class="t1">프로필 설정</span></a></li>
					<li class="m2"><a href="{{ route('account.notification_settings') }}"><span class="t1">알림 설정</span></a></li>
					</ul>
				</div>
			</li>
			</ul>
		</div>
		<!-- /d1 -->
		<!-- <a href="#anb1c" class="b1 close"><i class="ic1"></i> <span class="blind">대시보드 전체메뉴</span> <span class="t1 blind">닫기</span></a> -->
	</div>
	</div>
	<!-- /anb1c -->
</nav>
<!-- /anb1 -->
