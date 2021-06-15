@extends('master_learning')

@section('title', '시험강의 - 결과')

@section('content')

<? $d1n = '1'; // 1차활성 ?>

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

@include('learning.inc_counter')

<!-- cp2score1 -->
<div class="cp2score1">
	<div class="hg1">
		<span class="tt1">정답 수 : 5/15</span>
		<span class="tt2">총 점수 : 40/100</span>
	</div>
	<ul class="lst1 clb">
		<li class="li1">
			<div class="w1">
				<div class="tg1">
					<span class="t1">Q1. 다음 4가지 보기 중 정답을 선택하세요?</span>
					<!-- t2 상태: 정답 s1 | 오답 s2 -->
					<span class="t2 s1"><i class="t2ic1"></i><span class="t2t1">20점</span></span>
				</div>
				<div class="w2">
					<div class="w2w1">
						<div class="tg2">
							<span class="t3">선택한 답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg3">
							<span class="t3">정답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg5">
							<span class="t3">해설</span>
							<div class="t4">
								강사가 입력한 문제해설이 보여지는 영역입니다.<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십<br />
							</div>
						</div>
					</div>
					<div class="w2w2">
						<div class="tg4">
							<span class="t5">정답률</span>
							<span class="t6">77%</span>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="tg1">
					<span class="t1">Q2. 다음 4가지 보기 중 정답을 선택하세요? 일이삼사오륙</span>
					<span class="t2 s2"><i class="t2ic1"></i><span class="t2t1">0점</span></span>
				</div>
				<div class="w2">
					<div class="w2w1">
						<div class="tg2">
							<span class="t3">선택한 답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg3">
							<span class="t3">정답</span>
							<span class="t4">④ 네번째 보기</span>
						</div>
						<div class="tg5">
							<span class="t3">해설</span>
							<div class="t4">
								강사가 입력한 문제해설이 보여지는 영역입니다.<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십<br />
							</div>
						</div>
					</div>
					<div class="w2w2">
						<div class="tg4">
							<span class="t5">정답률</span>
							<span class="t6">33.3%</span>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="tg1">
					<span class="t1">Q3. 다음 4가지 보기 중 정답을 선택하세요?</span>
					<span class="t2 s1"><i class="t2ic1"></i><span class="t2t1">20점</span></span>
				</div>
				<div class="w2">
					<div class="w2w1">
						<div class="tg2">
							<span class="t3">선택한 답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg3">
							<span class="t3">정답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg5">
							<span class="t3">해설</span>
							<div class="t4">
								강사가 입력한 문제해설이 보여지는 영역입니다.<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십<br />
							</div>
						</div>
					</div>
					<div class="w2w2">
						<div class="tg4">
							<span class="t5">정답률</span>
							<span class="t6">77%</span>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="tg1">
					<span class="t1">Q4. 다음 4가지 보기 중 정답을 선택하세요? 일이삼사오륙</span>
					<span class="t2 s2"><i class="t2ic1"></i><span class="t2t1">0점</span></span>
				</div>
				<div class="w2">
					<div class="w2w1">
						<div class="tg2">
							<span class="t3">선택한 답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg3">
							<span class="t3">정답</span>
							<span class="t4">④ 네번째 보기</span>
						</div>
						<div class="tg5">
							<span class="t3">해설</span>
							<div class="t4">
								강사가 입력한 문제해설이 보여지는 영역입니다.<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십<br />
							</div>
						</div>
					</div>
					<div class="w2w2">
						<div class="tg4">
							<span class="t5">정답률</span>
							<span class="t6">33.3%</span>
						</div>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<!-- /cp2score1 -->


</div>
<!-- /container -->
</div>
<!-- /#body -->
<!-- #aside -->
<div id="aside" tabindex="-1">
<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">목차</h2>
	<a href="?#★" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">

@include('learning.inc_info')
@include('learning.inc_list')


</div>
<!-- /aside_content -->
</div>
<!-- /#aside -->
@endsection
