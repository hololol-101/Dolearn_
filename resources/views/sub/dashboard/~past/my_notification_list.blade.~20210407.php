@extends('master_sub')

@section('title', '대시보드 - 내 알림')

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
				<a href="#" class="a1"><i class="t1">대시보드</i></a>
				<i class="sep">|</i>
				<a class="a1"><i class="t1">내 알림</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

</div>
<!-- /body_title -->


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1infomenu2 -->
<div class="cp1infomenu2">
	<div class="w1">
		<div class="info1">
			새 알림 <em class="em">2</em>개
		</div>
	</div>
	<div class="w2">
		<a href="?#" class="a1">읽은 알림 삭제</a>
	</div>
</div>
<!-- /cp1infomenu2 -->


<!-- cp1bbs3list1 -->
<div class="cp1bbs3list1">
	<ul class="lst1">
		<li class="li1">
			<div class="w1">
				<a href="?#★" class="w1w1 a1">
					<i class="new">새 글</i>
					<div class="t1">
						[NEW] 엑셀 기초부터 심화까지 모든 애용을 학습 할 수 있도록 데이터에듀가 직접 제작한 커리큘럼 수강 시작
					</div>
					<span class="t2">두런 공지</span>
				</a>
				<div class="w1w2">
					<span class="t3">오늘</span>
					<a href="?#" class="a2">삭제</a>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<a href="?#★" class="w1w1 a1">
					<i class="new">새 글</i>
					<div class="t1">
						[이벤트] 2021 신년 맞이 전 강좌 5% 할인 이벤트(~ 1월 31)
					</div>
					<span class="t2">두런 공지</span>
				</a>
				<div class="w1w2">
					<span class="t3">오늘</span>
					<a href="?#" class="a2">삭제</a>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<a href="?#★" class="w1w1 a1">
					<div class="t1">
						[두런 소식] 2020.12.22 서비스 장애 개선
					</div>
					<span class="t2">두런 공지</span>
				</a>
				<div class="w1w2">
					<span class="t3">10일전</span>
					<a href="?#" class="a2">삭제</a>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<a href="?#★" class="w1w1 a1">
					<div class="t1">
						과제 제출이 완료되었습니다.
					</div>
					<span class="t2">수강강좌 제목 01</span>
				</a>
				<div class="w1w2">
					<span class="t3">10일전</span>
					<a href="?#" class="a2">삭제</a>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<a href="?#★" class="w1w1 a1">
					<div class="t1">
						일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십
					</div>
					<span class="t2">수강강좌 제목 01</span>
				</a>
				<div class="w1w2">
					<span class="t3">10일전</span>
					<a href="?#" class="a2">삭제</a>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<a href="?#★" class="w1w1 a1">
					<div class="t1">
						과제 제출이 완료되었습니다.
					</div>
					<span class="t2">수강강좌 제목 01</span>
				</a>
				<div class="w1w2">
					<span class="t3">10일전</span>
					<a href="?#" class="a2">삭제</a>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<a href="?#★" class="w1w1 a1">
					<div class="t1">
						과제 제출이 완료되었습니다.
					</div>
					<span class="t2">수강강좌 제목 01</span>
				</a>
				<div class="w1w2">
					<span class="t3">10일전</span>
					<a href="?#" class="a2">삭제</a>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<a href="?#★" class="w1w1 a1">
					<div class="t1">
						과제 제출이 완료되었습니다.
					</div>
					<span class="t2">수강강좌 제목 01</span>
				</a>
				<div class="w1w2">
					<span class="t3">10일전</span>
					<a href="?#" class="a2">삭제</a>
				</div>
			</div>
		</li>
	</ul>
</div>
<!-- /cp1bbs3list1 -->


<!-- pagination -->
<div class="pagination" title="페이지 수 매기기">
	<span class="control">
		<span class="m first"><a title="처음 페이지"><i class="ic">처음</i></a></span>
		<span class="m prev"><a title="이전 페이지"><i class="ic">이전</i></a></span>
	</span>
	<span class="pages">
		<span class="m on"><a title="현재 1 페이지">1</a></span>
		<span class="m"><a href="?" title="2 페이지">2</a></span>
		<span class="m"><a href="?" title="3 페이지">3</a></span>
		<span class="m"><a href="?" title="4 페이지">4</a></span>
		<span class="m"><a href="?" title="5 페이지">5</a></span>
		<span class="m"><a href="?" title="6 페이지">6</a></span>
		<span class="m"><a href="?" title="7 페이지">7</a></span>
		<span class="m"><a href="?" title="8 페이지">8</a></span>
		<span class="m"><a href="?" title="9 페이지">9</a></span>
		<span class="m"><a href="?" title="10 페이지">10</a></span>
	</span>
	<span class="control">
		<span class="m next"><a href="?" title="다음 페이지"><i class="ic">다음</i></a></span>
		<span class="m last"><a href="?" title="마지막 페이지"><i class="ic">마지막</i></a></span>
	</span>
</div>
<!-- /pagination -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection
