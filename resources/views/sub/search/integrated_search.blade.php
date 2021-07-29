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
		<a href="{{ route('sub.search.integrated_search', ['type' => 'video', 'keyword' => $result['keyword']]) }}" class="allview button secondary round">전체보기</a>
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
    @if($type=='video')
    <script>
        $('.cp1search2hg1 .allview').css('display', 'none');
    </script>
    @if( $result['count']>8)
    <!-- cp1more1 -->
    <div class="cp1more1">
        <a href="javascript:void(0);" class="more" onclick="moreClick(this)">
            <span class="t1">더보기</span>
            <i class="ic1"></i>
        </a>
    </div>
    <!-- /cp1more1 -->
    @endif
    @endif
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
			<strong class="em0">{{ $result['keyword'] }}</strong>@if ($result['keyword'] != '') 에 대한 @endif 강좌 검색결과 <strong class="em0">{{ $result['lectureCount'] }}건</strong>
		</h3>
		<a href="{{ route('sub.search.integrated_search', ['type' => 'lecture', 'keyword' => $result['keyword']]) }}" class="allview button secondary round">전체보기</a>
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
    @if($type=='lecture')
        <script>
            $('.cp1search2hg1 .allview').css('display', 'none');
        </script>

        @if($result['count']>8)
            <!-- cp1more1 -->
            <div class="cp1more1">
                <a href="javascript:void(0);" class="more" onclick="moreClick(this)">
                    <span class="t1">더보기</span>
                    <i class="ic1"></i>
                </a>
            </div>
            <!-- /cp1more1 -->
        @endif
    @endif

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
			<strong class="em0">{{ $result['keyword'] }}</strong>@if ($result['keyword'] != '') 에 대한 @endif 인사이트 검색결과 <strong class="em0">{{ $result['insightCount'] }}건</strong>
		</h3>
		<a href="{{ route('sub.search.integrated_search', ['type' => 'insight', 'keyword' => $result['keyword']]) }}" class="allview button secondary round" style="display:block;">전체보기</a>
    </div>
	<!-- /cp1search2hg1 -->

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-23 gap3pct">
        @if (count($insightList)>0)
        @foreach ( $insightList as $insight )
            <div class="item column">
                <div class="w1">
                    <a href="{{ route('sub.community.trend_detail', ['id'=>$insight->idx]) }}" class="a1">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('storage/uploads/thumbnail/'.$insight->main_image) }}" alt="{{ $insight->main_image }}" />
                            </span>
                            <!-- <i class="ic1 play">Play</i> -->
                        </div>
                        <div class="tg1">
                            <strong class="t1">{{ $insight->title }}</strong>
                            <span class="t2">{{ $insight->summary }}</span>
                            <span class="t3">{{ date('Y.m.d', strtotime($insight->writed_at)) }}</span>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        @else
        <div style="margin-left: 30px;">인사이트 정보가 없습니다.</div>
        @endif

	</div>
	<!-- /lst1 -->
    @if($type=='insight' )
        <script>
            $('.cp1search2hg1 .allview').css('display', 'none');
        </script>

        @if($result['count']>6)
            <!-- cp1more1 -->
            <div class="cp1more1">
                <a href="javascript:void(0);" class="more" onclick="moreClick(this)">
                    <span class="t1">더보기</span>
                    <i class="ic1"></i>
                </a>
            </div>
            <!-- /cp1more1 -->
        @endif
    @endif
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
			<strong class="em0">{{ $result['keyword'] }}</strong>@if ($result['keyword'] != '') 에 대한 @endif 강사 검색결과 <strong class="em0">{{ $result['instructorCount'] }}건</strong>
		</h3>
        <a href="{{ route('sub.search.integrated_search', ['type' => 'instructor', 'keyword' => $result['keyword']]) }}" class="allview button secondary round">전체보기</a>
	</div>
	<!-- /cp1search2hg1 -->

	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-35 gap5pct">
        @if (count($instructorList)>0)
        @foreach ( $instructorList as $instructor )
            <div class="item column">
                <div class="w1">
                    <a href="{{ route('etc.user_introduction', ['type'=>'instructor', 'user_idx'=>$instructor->id]) }}" class="a1">
                        <div class="f1">
                            <span class="f1p1">
                                @if($instructor->save_profile_image=='')
                                <img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="★대체텍스트필수" />
                                @else
                                <img src="{{ asset('storage/uploads/profile/'.$instructor->save_profile_image) }}" alt="{{ $instructor->save_profile_image }}" />
                                @endif
                            </span>
                        </div>
                        <div class="tg1">
                            <strong class="t1">{{ $instructor->nickname }}</strong>
                            <span class="t2"><span class="t2t1">강좌 수</span> <span class="t2t2">{{ $instructor->lectureCount }}</span></span>
                            <span class="t2"><span class="t2t1">수강후기</span> <span class="t2t2">{{ $instructor->reviewCount }}</span></span>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        @else
            <div style="margin-left: 30px;">강사 정보가 없습니다.</div>
        @endif
	</div>
	<!-- /lst1 -->
    @if($type=='instructor' )
        <script>
            $('.cp1search2hg1 .allview').css('display', 'none');
        </script>

        @if($result['count']>10)
            <!-- cp1more1 -->
            <div class="cp1more1">
                <a href="javascript:void(0);" class="more" onclick="moreClick(this)">
                    <span class="t1">더보기</span>
                    <i class="ic1"></i>
                </a>
            </div>
        <!-- /cp1more1 -->
        @endif
    @endif
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
			<strong class="em0">{{ $result['keyword'] }}</strong>@if ($result['keyword'] != '') 에 대한 @endif 유튜버 검색결과 <strong class="em0">{{ $result['youtuberCount'] }}건</strong>
		</h3>
		<a href="{{ route('sub.search.integrated_search', ['type' => 'youtuber', 'keyword' => $result['keyword']]) }}" class="allview button secondary round">전체보기</a>
	</div>
	<!-- /cp1search2hg1 -->
	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-35 gap5pct">
        @if (count($youtuberList)>0)

        @foreach ( $youtuberList as $youtuber )
        <div class="item column">
			<div class="w1">
				<a href="{{ route('etc.user_introduction', ['type'=>'youtuber', 'user_idx'=>$youtuber->id]) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
                            @if ($youtuber->save_profile_image=='')
                            <img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="★대체텍스트필수" />
                            @else
                            <img src="{{ asset('storage/uploads/profile/'.$youtuber->save_profile_image) }}" alt="{{ $youtuber->save_profile_image }}" />
                            @endif
							</span>
					</div>
					<div class="tg1">
						<strong class="t1">{{ $youtuber->nickname }}</strong>
						<span class="t2"><span class="t2t1">조회 수</span> <span class="t2t2">@if (strlen($youtuber->sum_hit)>4){{ number_format($youtuber->sum_hit/10000, 1) }} 만 @else {{ number_format($youtuber->sum_hit/10000, 1) }} @endif </span></span>
						<span class="t2"><span class="t2t1">구독자 수</span> <span class="t2t2">10.1만</span></span>
					</div>
				</a>
			</div>
		</div>
        @endforeach
        @else
        <div style="margin-left: 30px;">유튜버 정보가 없습니다.</div>
        @endif

    </div>
	<!-- /lst1 -->
    @if($type=='youtuber' )
    <script>
        $('.cp1search2hg1 .allview').css('display', 'none');
    </script>

    @if($result['count']>10)
    <!-- cp1more1 -->
    <div class="cp1more1">
        <a href="javascript:void(0);" class="more" onclick="moreClick(this)">
            <span class="t1">더보기</span>
            <i class="ic1"></i>
        </a>
    </div>
    @endif
    <!-- /cp1more1 -->
    @endif
</div>
</div>
<!-- /cp1fcard9 -->
@endif
{{-- /유튜버 검색 --}}

@else

{{-- 검색 결과가 없을 경우 --}}
@include('sub.search.inc_no_result')

@endif

</div>
<!-- /container -->
</div>
<!-- /#body -->
<script>
    function moreClick(obj){
        var my = $(obj);
        var currentCount = my.parents('.wrap1').find('.lst1 .item').length;
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: 'json',
                url : "{{ route('sub.search.search_more') }}",
                data: {
                    'type': '{{ $type }}',
                    'count': currentCount,
                    'keyword': '{{ $result["keyword"] }}'
                },
                success : (result) => {
                    my.parents('.wrap1').find('.lst1').append(result.html);

                    if( my.parents('.wrap1').find('.lst1 .item').length=='{{ $result["count"] }}'){
                        my.parent('.cp1more1').css('display', 'none')
                    }
                }, error: function(request) {
                        console.log('code: ' + request.status + '\nmessage: ' + request.responseText);
                }
            });
    }
</script>
@endsection
