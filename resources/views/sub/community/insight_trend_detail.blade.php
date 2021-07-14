<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210312 | @m | 요구반영. 결함개선. 고도화.
 * ~20210315 | @m |
 */
-->
@extends('master_sub')

@section('title', '인사이트 - 최신트렌드(상세)')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1row1 -->
<div class="cp1row1">
	<div class="column1">
		<a href="javascript:history.back();" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
	</div>
	<div class="column2">
	</div>
</div>
<!-- /cp1row1 -->


<!-- even-grid -->
<div class="even-grid diffmix-2 float-left gap5pct">
	<div class="md-58pct column">
		<h2 class="hb1 h1 mgt0">
            @php
                $titles=explode(']', $trendInfo->title, 2)
            @endphp
			<span class="dpb fw6">{{ $titles[0].']' }}</span>
			<span class="fw4">{{ $titles[1] }}</span>
		</h2>
		<p class="cvc fsB2">
			{!! $trendInfo->summary !!}
		</p>
		<p class="cvc fsB4 tar">
			{{ $trendInfo->adminName }}ㅣ {{ date('Y.m.d', strtotime($trendInfo->writed_at)) }}
		</p>
	</div>
	<div class="md-42pct column">
        @if ($trendInfo->main_image)
        <img src="{{ asset('storage/uploads/thumbnail/'.$trendInfo->main_image) }}" alt="{{ $trendInfo->title }}" />
        @else
		<img src="{{ asset('assets/images/lib/x3/x3p201.jpg') }}" alt="★대체텍스트필수" />
        @endif
	</div>
</div>
<!-- /even-grid -->


<hr class="bdt1px mgt2em mgb4em bdc4" />

{{-- <h3 class="hb1 h2 tac">엑셀은 도대체 왜 중요한걸까?</h3>

<p class="mgt2em mgb2em cvc fsB2">
	최근 유튜브에서 전문 지식을 바탕으로 수준 높은 정보를 제공하는 유튜버들이 있습니다.
	우리 삶과 밀접한 관계에 있지만 진입 장벽이 높아 쉽게 접근할 수 없었던 의학 영역인데요.
	실제 전문직 종사자들이 전해주는 건강, 의학, 질병 관련 정보 채널은 TV나 책에서 보던 것처럼 딱딱하지 않아요.
	실용적인 정보와 더불어 재치있는 말솜씨와 재밌는 기획을 갖춰 유튜브 생태계에 맞는 다양한 콘텐츠를 생산하고 있는데요.
	그만큼 유튜브 콘텐츠 제작에 있어 조심해야 할 부분이 많은 영역이기도 해요.
	오늘은 의학 유튜브 채널의 모든 이슈를 한 번 살펴보도록 할게요!
</p>
<img src="{{ asset('assets/images/lib/noimg3.png') }}" alt="★대체텍스트필수" class="w100" />
--}}
<p>
    {!! $trendInfo->content !!}
</p>

@php
    $cnt=0
@endphp
@foreach($ranking as $ranking)
<!-- cp1trend1best1 -->
<div class="cp1trend1best1">
	<h3 class="h1">BEST {{ ++$cnt }}</h3>
	<div class="w1">
		<div class="w1w1">
            @if ($ranking['rImage']!='')
			<img src="{{ asset('storage/uploads/profile/'.$ranking['rImage']) }}" alt="{{ $ranking['rName'] }}" class="w100 round" />
            @else
            <img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="{{ $ranking['rName'] }}" class="w100 round" />

            @endif
		</div>
		<div class="w1w2">
			<h4 class="tt1">{{ $ranking['rName'] }}</h4>
			<strong class="tt2">구독자수 129만명</strong>
			<a href="{{ route('etc.user_introduction',['type'=>$ranking['role'], 'user_idx'=>$ranking['rIdx']]) }}" class="button secondary round semismall ic1t1"><span class="t1">채널 바로가기</span><i class="ic1"></i></a>
		</div>
	</div>
	<div class="cont">
		<p class="t1">
            {!! $ranking['explain'] !!}
		</p>
        @if($ranking['youtubeId']!=null)

        <a href="{{ route('sub.video.video_detail', ['uid'=>$ranking['youtubeId']]) }}">
            <p class="mgt2em mgb2em cvc fsB2">{{ $ranking['youtubeExp'] }}(영상상세로 이동)</p>
        </a>
        {{-- //클릭시 영상상세로 이동 --}}
        <!-- w1video -->
        <div class="w1video">
			<div class="flex1wrap1">
                <a href="#" onclick="alert('hi')">
                    <iframe name="youtube_fr" id="display_fr" width="100%" height="100%" src="https://www.youtube.com/embed/{{ $ranking['youtubeId'] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </a>
                {{-- <video class="video" controls="controls" poster="{{ asset('assets/images/lib/x2/x2p1001.jpg') }}" src="{{ $ranking['youtubeUrl'] }}">
					<div class="alternativeContent">
						<p>Your browser does not support the video element.</p>
					</div>
				</video> --}}
				<!-- <i class="ic1 play">Play</i> -->
			</div>
		</div>

        @endif
		<!-- /w1video -->
	</div>
</div>
<!-- /cp1trend1best1 -->

@endforeach




<!-- cp1row1 -->
<div class="cp1row1">
	<div class="column1">
		<a href="javascript:history.back();" class="cp1b1back1"><i class="ic1"></i><span class="t1">목록으로</span></a>
	</div>
	<div class="column2">
	</div>
</div>
<!-- /cp1row1 -->


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
