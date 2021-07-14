<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210323 | @m | 요구반영. 결함개선. 고도화.
 * ~20210323 | @m |
 */
-->
@extends('master_learning2')

@section('title', '영상학습')

@section('content')


<? $d1n = '1'; // 1차활성 ?>

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

{{-- 현재 재생중인 영상 ID --}}
<input type="hidden" id="video_id" value="{{ $_GET['uid'] }}">
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
    $('#aside').load('/learning2/caption?uid=<?= $_GET['uid'] ?>');
    $('#watch_video').load('/learning2/watch_video?uid=<?= $_GET['uid'] ?>');

    makeActive2ClickHover2('#tnb1', {onFilter: '.m1'}); // 주메뉴 동작 호출 1차 활성

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
    $('#aside').load('/learning2/' + menu + '?&uid=' + videoId);
}

// 자막 리스트 클릭 시 해당 타임스탬프 값의 시간부터 영상 재생
function onClickCaptionList(videoId, timestamp) {
    var timestamp = Math.round(timestamp);

    $('.flex1wrap1').empty();
    $('.flex1wrap1').append('<iframe name="youtube_fr" id="display_fr" style="width:100%;height:100%;border:0;" src="https://www.youtube.com/embed/' + videoId + '?autoplay=1&start=' + timestamp + '" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
}
</script>
@endsection
