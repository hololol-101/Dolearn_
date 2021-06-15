<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210208 | @m | 요구반영. 결함개선. 고도화.
 * ~20210208 | @m |
 */
-->
@extends('master_sub')

@section('title', '영상보관함 - 영상노트')

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
				<a href="javascript:void(0);" class="a1"><i class="t1">영상보관함</i></a>
				<i class="sep">|</i>
				<a href="{{ route('sub.video.video_note_list') }}" class="a1"><i class="t1">영상 노트</i></a>
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


<!-- cp1flist2 -->
<div class="cp1flist2">
	<ul class="lst1">
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<a href="{{ route('sub.video.video_note_detail', ['id' => '']) }}" class="a1">
						<div class="a1w1">
								<div class="f1">
									<span class="f1p1">
										<img src="{{ asset('assets/images/main/x1/x1p301.jpg') }}" alt="★대체텍스트필수" />
									</span>
								</div>
						</div>
						<div class="a1w2">
							<div class="t1">
								강좌제목 : 업무가 3분컷!(엑셀편)
							</div>
							<span class="t2">
								최근 학습일 2021.02.05
							</span>
						</div>
					</a>
				</div>
				<div class="w1w2">
					<div class="eg1">
						<a href="{{ route('sub.video.video_note_detail', ['id' => '']) }}" class="a2">노트 0개</a>
						<a href="?#" class="b1 button ic1t1 small"><i class="ic1 download2"></i><span class="t1">다운로드</span></a>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<a href="{{ route('sub.video.video_note_detail', ['id' => '']) }}" class="a1">
						<div class="a1w1">
								<div class="f1">
									<span class="f1p1">
										<img src="{{ asset('assets/images/main/x1/x1p302.jpg') }}" alt="★대체텍스트필수" />
									</span>
								</div>
						</div>
						<div class="a1w2">
							<div class="t1">
								강좌제목 : 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
							</div>
							<span class="t2">
								최근 학습일 2021.02.05
							</span>
						</div>
					</a>
				</div>
				<div class="w1w2">
					<div class="eg1">
						<a href="{{ route('sub.video.video_note_detail', ['id' => '']) }}" class="a2">노트 0개</a>
						<a href="?#" class="b1 button ic1t1 small"><i class="ic1 download2"></i><span class="t1">다운로드</span></a>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="w1w1">
					<a href="{{ route('sub.video.video_note_detail', ['id' => '']) }}" class="a1">
						<div class="a1w1">
								<div class="f1">
									<span class="f1p1">
										<img src="{{ asset('assets/images/main/x1/x1p303.jpg') }}" alt="★대체텍스트필수" />
									</span>
								</div>
						</div>
						<div class="a1w2">
							<div class="t1">
								강좌제목 : 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
								일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
								일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십
							</div>
							<span class="t2">
								최근 학습일 2021.02.05
							</span>
						</div>
					</a>
				</div>
				<div class="w1w2">
					<div class="eg1">
						<a href="{{ route('sub.video.video_note_detail', ['id' => '']) }}" class="a2">노트 0개</a>
						<a href="?#" class="b1 button ic1t1 small"><i class="ic1 download2"></i><span class="t1">다운로드</span></a>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<!-- /cp1flist2 -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
