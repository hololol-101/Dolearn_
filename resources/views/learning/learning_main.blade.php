<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210120 | @m | 요구반영. 결함개선. 고도화.
 * ~20210122 | @m |
 * 20210325 | @m | 요구반영
 * 20210521 | @m | 요구반영
 */
-->
@extends('master_learning')

@section('title', '강좌학습')

@section('content')

<!-- #body -->
<div id="body" tabindex="-1">

<!-- container -->
<div class="container clearfix">

{{-- 현재 재생중인 영상 ID --}}
<input type="hidden" id="video_id" value="{{ $lectureDetail->video_id }}">

{{-- watch_video --}}
<div id="watch_video">

{{-- 영상 시청 화면 비동기 전환 DIV --}}

</div>
{{-- /watch_video --}}

</div>
<!-- /container -->
</div>
<!-- /#body -->

<!-- #aside -->
<div id="aside" tabindex="-1">

{{-- 탭 별 화면 비동기 전환 DIV --}}

</div>
<!-- /#aside -->
@endsection

@section('script')
<script>
$(function() {
    $('#aside').load('/learning/index?idx=<?= $_GET['idx'] ?>');
    $('#watch_video').load('/learning/watch_video?idx=<?= $_GET['idx'] ?>');

    makeActive2ClickHover2('#tnb1', {onFilter: '.m1'}); // 주메뉴 동작 호출 1차 활성

    // url 에 video_id 매개 변수 있을 시 해당 영상 바로 출력
    // 다른 페이지에서 요청 했을 경우 : ex)영상 노트 상세 -> 연관된 강좌 제목 클릭
    @if (isset($_GET['video_id']))
        @if ($_GET['video_id'] != '')
        $('#watch_video').load('/learning/watch_video?idx=<?= $_GET['idx'] ?>&video_id=<?= $_GET['video_id'] ?>');
        @endif
    @endif

    // 20210521. 토글 버튼이 Ajax 로 불러와 기능이 안되서 지연 재호출
    setTimeout(function(){
        MJS.doToggle();
    }, 100);

    /** ◇◆ #aside 감춤 | 20210504. @m.
        */
    (function(){
        // 미래 닫기 요소 클릭
        $('#aside').on('click', '#aside_head .close', function(e){
            e.preventDefault();
            $('html').addClass('hide-aside');
            $('#tnb1 li').filter('.on').removeClass('on');
            smoothScrollTop($('#container').offset().top, -70);
        });
    })();
})

// 탭 클릭 시 화면 비동기 전환
function onClickTab(menu, tabNo) {
    var videoId = $('#video_id').val();

    makeActive2ClickHover2('#tnb1', {onFilter: tabNo}); // 주메뉴 동작 호출 1차 활성
    $('html').removeClass('hide-aside');
    smoothScrollTop($('#aside').offset().top, -70); // 20210504. 해당 콘텐츠 위치로 스크롤

    $('#aside').load('/learning/' + menu + '?idx=<?= $_GET['idx'] ?>&uid=' + videoId);

    // 20210521. 토글 버튼이 Ajax 로 불러와 기능이 안되서 지연 재호출
    setTimeout(function(){
        MJS.doToggle();
    }, 100);
}

// 자막 리스트 클릭 시 해당 타임스탬프 값의 시간부터 영상 재생
function onClickCaptionList(videoId, timestamp) {
    var timestamp = Math.round(timestamp);

    $('.flex1wrap1').empty();
    $('.flex1wrap1').append('<iframe name="youtube_fr" id="display_fr" style="width:100%;height:100%;border:0;" src="https://www.youtube.com/embed/' + videoId + '?autoplay=1&start=' + timestamp + '" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
}
</script>
@endsection
