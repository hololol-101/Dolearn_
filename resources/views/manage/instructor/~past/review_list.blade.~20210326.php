<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210308 | @m | 요구반영. 결함개선. 고도화.
 * ~20210308 | @m |
 */
-->
@extends('master_sub')

@section('title', '강사 마이페이지 - 강좌관리 - 수강후기 리스트')

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
				<a href="#" class="a1"><i class="t1">강좌관리</i></a>
				<i class="sep">|</i>
				<a href="#" class="a1"><i class="t1">수강후기 리스트</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

</div>
<!-- /body_title -->


<!-- cp1infomenu1 -->
<div class="cp1infomenu1">
	<div class="w1">
	</div>
	<div class="w2 mg0">

		<select title="선택옵션" class="select w100">
			<option value="">전체</option>
			<option value="">운영강좌 제목 01</option>
			<option value="">운영강좌 제목 02 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</option>
			<option value="">운영강좌 제목 03</option>
		</select>

	</div>
</div>
<!-- /cp1infomenu1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1flist5 -->
<div class="cp1flist5">
	<ul class="lst1">
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<div class="w1w1w1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p001.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</div>
					<div class="w1w1w2">
						<div class="tg1">
							<i class="star5rating1">
								<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<div class="t1">
								수강후기 표시됩니다.
							</div>
						</div>
						<div class="t2">
							최근 학습일 2021.03.08
						</div>
					</div>
				</div>
				<div class="w1w2">
					<div class="w1w2w1">
						<!-- cp1menu1 -->
						<div class="cp1menu1 toggle1s1">
							<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
							<div class="cp1menu1c toggle-c">
								<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
							</div>
						</div>
						<!-- /cp1menu1 -->
					</div>
					<div class="w1w2w2">
						<div class="t3">
							10분전
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<div class="w1w1w1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/lib/noimg1.png') }}" alt="이미지없음" />
							</span>
						</div>
					</div>
					<div class="w1w1w2">
						<div class="tg1">
							<i class="star5rating1">
								<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<div class="t1">
								일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
								일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
								일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
							</div>
						</div>
						<div class="t2">
							최근 학습일 2021.03.08
						</div>
					</div>
				</div>
				<div class="w1w2">
					<div class="w1w2w1">
						<!-- cp1menu1 -->
						<div class="cp1menu1 toggle1s1">
							<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
							<div class="cp1menu1c toggle-c">
								<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
							</div>
						</div>
						<!-- /cp1menu1 -->
					</div>
					<div class="w1w2w2">
						<div class="t3">
							10분전
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<div class="w1w1w1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p003.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</div>
					<div class="w1w1w2">
						<div class="tg1">
							<i class="star5rating1">
								<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<div class="t1">
								수강후기 표시됩니다.
							</div>
						</div>
						<div class="t2">
							최근 학습일 2021.03.08
						</div>
					</div>
				</div>
				<div class="w1w2">
					<div class="w1w2w1">
						<!-- cp1menu1 -->
						<div class="cp1menu1 toggle1s1">
							<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
							<div class="cp1menu1c toggle-c">
								<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
							</div>
						</div>
						<!-- /cp1menu1 -->
					</div>
					<div class="w1w2w2">
						<div class="t3">
							10분전
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<div class="w1w1w1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p004.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</div>
					<div class="w1w1w2">
						<div class="tg1">
							<i class="star5rating1">
								<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<div class="t1">
								수강후기 표시됩니다.
							</div>
						</div>
						<div class="t2">
							최근 학습일 2021.03.08
						</div>
					</div>
				</div>
				<div class="w1w2">
					<div class="w1w2w1">
						<!-- cp1menu1 -->
						<div class="cp1menu1 toggle1s1">
							<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
							<div class="cp1menu1c toggle-c">
								<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
							</div>
						</div>
						<!-- /cp1menu1 -->
					</div>
					<div class="w1w2w2">
						<div class="t3">
							10분전
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<div class="w1w1w1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p005.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</div>
					<div class="w1w1w2">
						<div class="tg1">
							<i class="star5rating1">
								<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<div class="t1">
								수강후기 표시됩니다.
							</div>
						</div>
						<div class="t2">
							최근 학습일 2021.03.08
						</div>
					</div>
				</div>
				<div class="w1w2">
					<div class="w1w2w1">
						<!-- cp1menu1 -->
						<div class="cp1menu1 toggle1s1">
							<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
							<div class="cp1menu1c toggle-c">
								<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
							</div>
						</div>
						<!-- /cp1menu1 -->
					</div>
					<div class="w1w2w2">
						<div class="t3">
							10분전
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<div class="w1w1w1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p006.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</div>
					<div class="w1w1w2">
						<div class="tg1">
							<i class="star5rating1">
								<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<div class="t1">
								수강후기 표시됩니다.
							</div>
						</div>
						<div class="t2">
							최근 학습일 2021.03.08
						</div>
					</div>
				</div>
				<div class="w1w2">
					<div class="w1w2w1">
						<!-- cp1menu1 -->
						<div class="cp1menu1 toggle1s1">
							<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
							<div class="cp1menu1c toggle-c">
								<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
							</div>
						</div>
						<!-- /cp1menu1 -->
					</div>
					<div class="w1w2w2">
						<div class="t3">
							10분전
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<div class="w1w1w1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p007.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</div>
					<div class="w1w1w2">
						<div class="tg1">
							<i class="star5rating1">
								<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<div class="t1">
								수강후기 표시됩니다.
							</div>
						</div>
						<div class="t2">
							최근 학습일 2021.03.08
						</div>
					</div>
				</div>
				<div class="w1w2">
					<div class="w1w2w1">
						<!-- cp1menu1 -->
						<div class="cp1menu1 toggle1s1">
							<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
							<div class="cp1menu1c toggle-c">
								<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
							</div>
						</div>
						<!-- /cp1menu1 -->
					</div>
					<div class="w1w2w2">
						<div class="t3">
							10분전
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<div class="w1w1w1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p008.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</div>
					<div class="w1w1w2">
						<div class="tg1">
							<i class="star5rating1">
								<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<div class="t1">
								수강후기 표시됩니다.
							</div>
						</div>
						<div class="t2">
							최근 학습일 2021.03.08
						</div>
					</div>
				</div>
				<div class="w1w2">
					<div class="w1w2w1">
						<!-- cp1menu1 -->
						<div class="cp1menu1 toggle1s1">
							<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
							<div class="cp1menu1c toggle-c">
								<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
							</div>
						</div>
						<!-- /cp1menu1 -->
					</div>
					<div class="w1w2w2">
						<div class="t3">
							10분전
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<div class="w1w1w1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p009.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</div>
					<div class="w1w1w2">
						<div class="tg1">
							<i class="star5rating1">
								<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<div class="t1">
								수강후기 표시됩니다.
							</div>
						</div>
						<div class="t2">
							최근 학습일 2021.03.08
						</div>
					</div>
				</div>
				<div class="w1w2">
					<div class="w1w2w1">
						<!-- cp1menu1 -->
						<div class="cp1menu1 toggle1s1">
							<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
							<div class="cp1menu1c toggle-c">
								<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
							</div>
						</div>
						<!-- /cp1menu1 -->
					</div>
					<div class="w1w2w2">
						<div class="t3">
							10분전
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<div class="w1w1w1">
						<div class="f1">
							<span class="f1p1">
								<img src="{{ asset('assets/images/main/x1/x1p010.jpg') }}" alt="★대체텍스트필수" />
							</span>
						</div>
					</div>
					<div class="w1w1w2">
						<div class="tg1">
							<i class="star5rating1">
								<i class="st-on" style="width:70%;"><i class="ic1"></i></i><!-- (3.5/5) -->
								<i class="st-off" style="width:30%;"><i class="ic2"></i></i><!-- (100-70) -->
							</i>
							<div class="t1">
								수강후기 표시됩니다.
							</div>
						</div>
						<div class="t2">
							최근 학습일 2021.03.08
						</div>
					</div>
				</div>
				<div class="w1w2">
					<div class="w1w2w1">
						<!-- cp1menu1 -->
						<div class="cp1menu1 toggle1s1">
							<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
							<div class="cp1menu1c toggle-c">
								<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
							</div>
						</div>
						<!-- /cp1menu1 -->
					</div>
					<div class="w1w2w2">
						<div class="t3">
							10분전
						</div>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<!-- /cp1flist5 -->


<!-- infomenu1 -->
<div class="infomenu1">

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
<!-- /infomenu1 -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection
