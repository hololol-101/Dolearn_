<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210309 | @m | 요구반영. 결함개선. 고도화.
 * ~20210311 | @m |
 * 20210330 | @m | 요구반영
 */
-->
@extends('master_sub')

@php
$type = isset($_GET['type']) ? $_GET['type'] : '';

if ($type == '') {
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $keyword = isset($_POST['keyword']) ? $_POST['keyword']:'';
}

$title = '통합검색 - '.$result['title'];
@endphp

@section('title', $title)

@section('content')

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

@include('sub.search.search_header')

<script>/*<![CDATA[*/
	// 20210310.
    var type = '{{ $type }}';
    if (type == '' || type == 'all') {
        makeActive('.cp1tabs2', '.m1');

    } else if (type == 'video') {
        makeActive('.cp1tabs2', '.m2');

    } else if (type == 'lecture') {
        makeActive('.cp1tabs2', '.m3');

    } else if (type == 'insight') {
        makeActive('.cp1tabs2', '.m4');

    } else if (type == 'instructor') {
        makeActive('.cp1tabs2', '.m5');

    } else if (type == 'youtuber') {
        makeActive('.cp1tabs2', '.m6');
    }
/*]]>*/</script>

@if ($result['count'] > 0)

@if ($type == '' || $type == 'all')
<p class="fw4 fsB8 tac wbka">
	<strong class="em">{{ $result['keyword'] }}</strong>@if ($result['keyword'] != '') 에 대한 검색결과, @endif 총 <strong class="em">{{ $result['count'] }}</strong>의 검색결과가 있습니다.
</p>
@endif

{{-- 영상 검색 --}}
@if ($type == '' || $type == 'all' || $type == 'video')
<!-- cp1fcard3 -->
<div class="cp1fcard3">
<div class="wrap1">

	<!-- cp1search2hg1 -->
	<div class="cp1search2hg1">
		<h3 class="h1">
			<strong class="em0">{{ $result['keyword'] }}</strong>@if ($result['keyword'] != '') 에 대한 @endif 영상 검색결과 <strong class="em0">{{ $result['videoCount'] }}건</strong>
		</h3>
		<a href="{{ route('sub.video.video_list', ['type' => 'video', 'keyword' => $result['keyword']]) }}" class="allview button secondary round">전체보기</a>
	</div>
	<!-- /cp1search2hg1 -->

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234">
        @if (count($videoList) > 0)
        @foreach ($videoList as $video)
        <div class="item column">
            <div class="w1">
                <a href="{{ route('sub.video.video_detail', ['uid' => $video->uid]) }}" class="a1" video_idx="{{ $video->idx }}">
                    <div class="f1">
                        <span class="f1p1">
                            <img src="https://img.youtube.com/vi/{{ $video->uid }}/mqdefault.jpg" alt="{{ $video->subject }}">
                        </span>
                        <i class="ic1 play">Play</i>
                    </div>
                    <div class="tg1">
                        <strong class="t1">{{ $video->subject }}</strong>
                    </div>
                    <div class="tg2">
                        <span class="t2">{{ $video->channel }}</span>
                        <span class="t3">조회수 {{ $video->hit_cnt }}회</span>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    @else
        <div style="margin-left: 30px;">영상 정보가 없습니다.</div>
    @endif
	</div>
	<!-- /lst1 -->

</div>
</div>
<!-- /cp1fcard3 -->
@endif
{{-- /영상 검색 --}}

{{-- 강좌 검색 --}}
@if ($type == '' || $type == 'all' || $type == 'lecture')
<!-- cp1fcard1 -->
<div class="cp1fcard1">
<div class="wrap1">

	<!-- cp1search2hg1 -->
	<div class="cp1search2hg1">
		<h3 class="h1">
			<strong class="em0">{{ $result['keyword'] }}</strong>@if ($result['keyword'] != '') 에 대한 @endif 강좌 검색결과 <strong class="em0">{{ $result['lectureCount'] }}</strong>
		</h3>
		<a href="{{ route('sub.lecture.lecture_list', ['type' => 'lecture', 'keyword' => $result['keyword']]) }}" class="allview button secondary round">전체보기</a>
	</div>
	<!-- /cp1search2hg1 -->

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234">
        @if (count($lectureList) > 0)
        @foreach ($lectureList as $lecture)
        <div class="item column">
            <div class="w1">
                <a href="{{ route('sub.lecture.lecture_detail', ['idx' => $lecture->idx]) }}" class="a1" lecture_idx="{{ $lecture->idx }}">
                    <div class="f1">
                        <span class="f1p1">
                            @if ($lecture->save_thumbnail != '')
                            <img src="{{ asset('storage/uploads/thumbnail/'.$lecture->save_thumbnail) }}" alt="{{ $lecture->title }}" />
                            @else
                            <img src="{{ asset('assets/images/lib/noimg1.png') }}" />
                            @endif
                        </span>
                        {{-- <i class="ic1 play">Play</i> --}}
                    </div>
                    <div class="tg1">
                        <strong class="t1">{{ $lecture->title }}</strong>
                    </div>
                    <div class="ratings">
                        <strong class="t1 blind">별점</strong>
                        <i class="star5rating1">
                            <i class="st-on" style="width:{{ round($lecture->rating * 20, 1) }}%;"><i class="ic1"></i></i><!-- (3.5/5) -->
                            <i class="st-off" style="width:100%;"><i class="ic2"></i></i><!-- (100-70) -->
                        </i>
                        <span class="t2">
                            <span class="t2t1">평점</span>
                            <span class="t2t2">{{ $lecture->rating }}</span>
                            <span class="t2t3">· 수강생 {{ $lecture->student_cnt }}명</span>
                        </span>
                    </div>
                    <div class="tg2">
                        <span class="t2">
                            <span class="t2t1">{{ $lecture->owner_name }}</span>
                        </span>
                        <span class="t3">
                            <span class="t3t1">@if($lecture->free_yn == 'Y') 무료 @else 유료 @endif</span>
                        </span>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    @else
        <div style="margin-left: 30px;">강좌 정보가 없습니다.</div>
    @endif
	</div>
	<!-- /lst1 -->

</div>
</div>
<!-- /cp1fcard1 -->
@endif
{{-- /강좌 검색 --}}

{{-- 인사이트 검색 --}}
@if ($type == '' || $type == 'all' || $type == 'insight')
<!-- cp1fcard8 -->
<div class="cp1fcard8" id="cp1fcard8a1">
<div class="wrap1">

	<!-- cp1search2hg1 -->
	<div class="cp1search2hg1">
		<h3 class="h1">
			<strong class="em0">{{ $result['keyword'] }}</strong>@if ($result['keyword'] != '') 에 대한 @endif 인사이트 검색결과 <strong class="em0">2건</strong>
		</h3>
		<a href="{{ route('sub.search.integrated_search', ['type' => 'insight', 'keyword' => '']) }}" class="allview button secondary round">전체보기</a>
	</div>
	<!-- /cp1search2hg1 -->

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-23 gap3pct">
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">직장인들의 필수 항목 엑셀</strong>
						<span class="t2">엑셀 전문 유튜브 채널 전격 분석!!!!!</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p102.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">EXCEL 자격증 대분석 일이삼사오륙칠팔구십일이삼사오륙칠팔구십</strong>
						<span class="t2">필요없는 건 하지말자! 일이삼사오륙칠팔구십일이삼사오륙칠팔구십</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
        <div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">직장인들의 필수 항목 엑셀</strong>
						<span class="t2">엑셀 전문 유튜브 채널 전격 분석!!!!!</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
        <div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">직장인들의 필수 항목 엑셀</strong>
						<span class="t2">엑셀 전문 유튜브 채널 전격 분석!!!!!</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
        <div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">직장인들의 필수 항목 엑셀</strong>
						<span class="t2">엑셀 전문 유튜브 채널 전격 분석!!!!!</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
        <div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">직장인들의 필수 항목 엑셀</strong>
						<span class="t2">엑셀 전문 유튜브 채널 전격 분석!!!!!</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
        <div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/lib/x3/x3p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<!-- <i class="ic1 play">Play</i> -->
					</div>
					<div class="tg1">
						<strong class="t1">직장인들의 필수 항목 엑셀</strong>
						<span class="t2">엑셀 전문 유튜브 채널 전격 분석!!!!!</span>
						<span class="t3">2020.03.10</span>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /lst1 -->

</div>
</div>
<!-- /cp1fcard8 -->
@endif
{{-- /인사이트 검색 --}}

{{-- 강사 검색 --}}
@if ($type == '' || $type == 'all' || $type == 'instructor')
<!-- cp1fcard9 -->
<div class="cp1fcard9" id="cp1fcard9a1">
<div class="wrap1">

	<!-- cp1search2hg1 -->
	<div class="cp1search2hg1">
		<h3 class="h1">
			<strong class="em0">{{ $result['keyword'] }}</strong>@if ($result['keyword'] != '') 에 대한 @endif 강사 검색결과 <strong class="em0">5건</strong>
		</h3>
		<a href="{{ route('sub.search.integrated_search', ['type' => 'instructor', 'keyword' => '']) }}" class="allview button secondary round">전체보기</a>
	</div>
	<!-- /cp1search2hg1 -->

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-35 gap5pct">
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p601.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">설민석</strong>
						<span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">20</span></span>
						<span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">2450</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p602.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">차홍</strong>
						<span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">20</span></span>
						<span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">2450</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p603.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">강소라</strong>
						<span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">20</span></span>
						<span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">2450</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">강사이름오륙칠팔구십</strong>
						<span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">20</span></span>
						<span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">2450</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">강사명</strong>
						<span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">20</span></span>
						<span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">2450</span></span>
					</div>
				</a>
			</div>
		</div>
        <div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">강사명</strong>
						<span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">20</span></span>
						<span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">2450</span></span>
					</div>
				</a>
			</div>
		</div>
        <div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">강사명</strong>
						<span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">20</span></span>
						<span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">2450</span></span>
					</div>
				</a>
			</div>
		</div>
        <div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">강사명</strong>
						<span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">20</span></span>
						<span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">2450</span></span>
					</div>
				</a>
			</div>
		</div>
        <div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">강사명</strong>
						<span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">20</span></span>
						<span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">2450</span></span>
					</div>
				</a>
			</div>
		</div>
        <div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">강사명</strong>
						<span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">20</span></span>
						<span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">2450</span></span>
					</div>
				</a>
			</div>
		</div>
        <div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">강사명</strong>
						<span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">20</span></span>
						<span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">2450</span></span>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /lst1 -->

</div>
</div>
<!-- /cp1fcard9 -->
@endif
{{-- /강사 검색 --}}

{{-- 유튜버 검색 --}}
@if ($type == '' || $type == 'all' || $type == 'youtuber')
<!-- cp1fcard9 -->
<div class="cp1fcard9" id="cp1fcard9a2">
<div class="wrap1">

	<!-- cp1search2hg1 -->
	<div class="cp1search2hg1">
		<h3 class="h1">
			<strong class="em0">{{ $result['keyword'] }}</strong>@if ($result['keyword'] != '') 에 대한 @endif 유튜버 검색결과 <strong class="em0">12건</strong>
		</h3>
		<a href="{{ route('sub.search.integrated_search', ['type' => 'youtuber', 'keyword' => '']) }}" class="allview button secondary round">전체보기</a>
	</div>
	<!-- /cp1search2hg1 -->

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-35 gap5pct">
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p601.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">유튜버이름</strong>
						<span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">22</span></span>
						<span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p602.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">차홍</strong>
						<span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">22</span></span>
						<span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p603.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">강소라</strong>
						<span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">22</span></span>
						<span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">유튜버이름륙칠팔구십</strong>
						<span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">22</span></span>
						<span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">유튜버이름</strong>
						<span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">22</span></span>
						<span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p601.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">설민석</strong>
						<span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">22</span></span>
						<span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p602.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">차홍</strong>
						<span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">22</span></span>
						<span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p603.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">강소라</strong>
						<span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">22</span></span>
						<span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">유튜버이름륙칠팔구십</strong>
						<span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">22</span></span>
						<span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>
					</div>
				</a>
			</div>
		</div>
		<div class="item column">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p604.jpg') }}" alt="★대체텍스트필수" />
						</span>
					</div>
					<div class="tg1">
						<strong class="t1">유튜버이름</strong>
						<span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">22</span></span>
						<span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /lst1 -->

</div>
</div>
<!-- /cp1fcard9 -->
@endif
{{-- /유튜버 검색 --}}

<script>/*<![CDATA[*/
	//$(function(){
		/** ◇◆ 전체보기 비활성 활성. 20210310. @m.
		 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
		 */
		(function(){
			var my1 = '#cp1fcard8a1', // 인사이트 래퍼
				my2 = '#cp1fcard9a1', // 강사 래퍼
				my3 = '#cp1fcard9a2', // 유튜버 래퍼
				item = '.lst1>.item', // 항목
				b1 = '.allview.button', // 전체 보기
				v = '';

			// 초기화
			$(my1)	.find(b1).hide();
			$(my2)	.find(b1).hide();
			$(my3)	.find(b1).hide();

			// 동작 ( 항목 수 초과하면 활성)
			if( $(my1).find(item).length > 6 ){
				$(my1)	.find(b1).show();
			}
			if( $(my2).find(item).length > 10 ){
				$(my2)	.find(b1).show();
			}
			if( $(my3).find(item).length > 10 ){
				$(my3)	.find(b1).show();
			}

		})();
	//});
/*]]>*/</script>
@else

{{-- 검색 결과가 없을 경우 --}}
@include('sub.inc_no_result')

@endif

</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection
