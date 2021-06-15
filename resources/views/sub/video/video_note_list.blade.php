<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210208 | @m | 요구반영. 결함개선. 고도화.
 * ~20210208 | @m |
 * 20210406 | @m | 요구반영
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
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">영상 노트</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.video.video_play_history') }}">시청 기록</a></li>
			<li><a href="{{ route('sub.video.video_note_list') }}">영상 노트</a></li>
			<li><a href="{{ route('sub.video.video_playlist') }}">재생 목록</a></li>
			</ul>
		</div>
		<!-- /lnb1c -->
	</div>
	<!-- lnb1 -->
	<script>/*<![CDATA[*/
		$(function(){
			/** ◇◆ 목록앵커 클릭하면 활성 메뉴를 제목에 표시. 링크 이동. 20210111. @m
			 */
			(function(){
				var $my = $('#lnb1'),
					$m = $('li>a[href]', $my);
				// 현재활성
				$m.each(function(){
					if( $(this).closest('li').is('.on') ){
						$('.h1 .t1', $my).text( $(this).text() );
					}
				});

				// 클릭
				$m.on('click', function(e){
					//e.preventDefault();
					$('.toggle', $my).triggerHandler('click'); // 토글 닫기
					$('.h1 .t1', $my).text( $(this).text() );
					return; // 링크 이동
				});
			})();
		});
	/*]]>*/</script>

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
        @if (count($videoNoteList) > 0)
            @foreach ($videoNoteList as $videoNote)
            <li class="li1">
                <div class="w1">
                    <div class="w1w1">
                        <a href="{{ route('sub.video.video_note_detail', ['video_id' => $videoNote->uid]) }}" class="a1">
                            <div class="a1w1">
                                    <div class="f1">
                                        <span class="f1p1">
                                            <img src="https://img.youtube.com/vi/{{ $videoNote->uid }}/mqdefault.jpg" alt="{{ $videoNote->subject }}">
                                        </span>
                                    </div>
                            </div>
                            <div class="a1w2">
                                <div class="t1">
                                    {{ $videoNote->subject }}
                                </div>
                                <span class="t2">
                                    최근 학습일 {{ date('Y-m-d', strtotime($videoNote->recent_learned_at)) }}
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="w1w2">
                        <div class="eg1">
                            <a href="{{ route('sub.video.video_note_detail', ['video_id' => $videoNote->uid]) }}" class="a2">노트 {{ $videoNote->note_cnt }}개</a>
                            <a href="{{ route('sub.note.download_note', ['video_id' => $videoNote->uid]) }}" class="b1 button ic1t1 small"><i class="ic1 download2"></i><span class="t1">다운로드</span></a>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        @else
        <br>
        <br>
        <span>작성된 영상 노트가 없습니다.</span>
        @endif
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
