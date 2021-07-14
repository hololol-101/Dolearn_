@extends('layouts.doadm.doadm_layout') // 레이아웃을 사용함.

@section('content')

<!-- width1s2 -->
<div class="width1s2">


<!-- bbs1view1 -->
<div class="bbs1view1">
<h1 class="h1"> {{ $trendInfo->title }} </h1>

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
        <div class="w1" style="display: flex">
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


</div>
<!-- /bbs1view1 -->

<!-- infomenu1 -->
<div class="infomenu1">
<p class="left">
    <a href="?" class="button prev default"><span class="t1">이전</span></a>
    <a href="?" class="button next default"><span class="t1">다음</span></a>
</p>
<p class="right">
    <a href="{{ route('serviceinquiry.trend.edit',['idx'=>$trendInfo->idx]) }}" class="button">수정</a>
    <a href="{{ route('serviceinquiry.trend.delete',['idx'=>$trendInfo->idx]) }}" class="button">삭제</a>
    <a href="{{ route('serviceinquiry.trend.index') }}" class="button">목록</a>
</p>
</div>
<!-- /infomenu1 -->
<script>
    function openNewPage(url){
        window.open(url, "_blank")
    }
</script>

</div>
<!-- /width1s2 -->

@endsection
