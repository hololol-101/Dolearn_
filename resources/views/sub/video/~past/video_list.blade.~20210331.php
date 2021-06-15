<!--
/**
 * SubPage Template
 * 20210111 | @m | 최초 등록
 * 20210118 | @m | 요구반영. 결함개선. 고도화.
 * ~20210119 | @m |
 */
-->
@php
$bcateId = isset($_GET['bcate_id']) ? $_GET['bcate_id'] : '';
$scateId = isset($_GET['scate_id']) ? $_GET['scate_id'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : '';
@endphp

@extends('master_sub')

@section('title', '전체영상')

@section('content')

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<?//php include $_SERVER['DOCUMENT_ROOT']."/_res/dolearn/share/inc/body_head.php"; ?>
<!-- #body_head -->
<div id="body_head" class="init">
<!-- container -->
<div class="container clearfix">


<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="{{ route('sub.video.video_list') }}" class="a1"><i class="t1">전체영상</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">{{ $selectText }}</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.video.video_list', ['bcate_id' => 'DP000000']) }}">개발 &amp; 프로그래밍</a></li>
			<li><a href="{{ route('sub.video.video_list', ['bcate_id' => 'DS000000']) }}">데이터사이언스</a></li>
			<li><a href="{{ route('sub.video.video_list', ['bcate_id' => 'SI000000']) }}">자기계발</a></li>
			<li><a href="{{ route('sub.video.video_list', ['bcate_id' => 'ES000000']) }}">교육 및 학문</a></li>
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


<!-- cp1select3search1 -->
<div class="cp1select3search1">
	<!-- form -->
	<form action="javascript:void(0);">
		<fieldset>
			<legend class="blind"><strong class="h1">검색</strong></legend>

			<!-- cp1select3 -->
			<div class="cp1select3">
				<select class="select" id="select_order" onchange="selectSearch()" title="선택옵션">
					<option value="latest" @if ($order == 'latest') selected @endif>최신순</option>
					<option value="like" @if ($order == 'like') selected @endif>좋아요수</option>
					<option value="hit" @if ($order == 'hit') selected @endif>조회수</option>
				</select>
			</div>
			<!-- /cp1select3 -->

			<!-- cp1search1 -->
			<div class="cp1search1">
				<input type="text" value="" placeholder="검색어를 입력하세요." title="검색어"
					onfocus="if( this.value == this.defaultValue ) this.value=''; this.select();"
					onblur="if( this.value=='' ) this.value=this.defaultValue;"
					class="text" id="input_keyword"/>
				<button type="button" class="button submit search" id="search_btn"><i class="ic1"></i><span class="t1 blind">검색</span></button>
			</div>
			<!-- /cp1search1 -->

		</fieldset>
	</form>
	<!-- /form -->
</div>
<!-- /cp1select3search1 -->


<!-- cp1tag1 -->
<div class="cp1tag1">
	<strong class="h1">태그</strong>
	<div class="tags">
        @foreach ($videoTagArr as $tag)
            @if ($tag != '')
		    <a href="{{ route('sub.video.video_list', ['tags' => $tag]) }}" class="a1">#{{ $tag }}</a>
            @endif
        @endforeach
	</div>
	<a href="#★" class="more">더보기</a>
</div>
<!-- /cp1tag1 -->
<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 태그선택. 20210111. @m
		 */
		(function(){
			var my = '.cp1tag1',
				m = my + ' .a1';
			// 클릭
			$(document).on('click', m, function(e){
				e.preventDefault();
				if( $(this).is('.on') ){
					$(this).removeClass('on');
				}else{
					$(this).addClass('on');
				}
			});
		})();

		/** ◇◆ 더보기클릭샘플. 20210111. @m
		 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
		 */
		(function(){
			var $my = $('.cp1tag1'),
				$more = $('.more', $my),
				$tags = $('.tags', $my);

			$more.on('click', function(e){
				e.preventDefault();
				var html = '';
				html += '<a href="?#★" class="a1">#추가한태그</a>';
				html += '<a href="?#★" class="a1">#추가한태그</a>';
				html += '<a href="?#★" class="a1">#추가한태그</a>';
				html += '<a href="?#★" class="a1">#추가한태그</a>';
				html += '<a href="?#★" class="a1">#추가한태그</a>';
				$tags.append($(html));
			});
		})();

	});
/*]]>*/</script>


<!-- cp1fcard3 -->
<div class="cp1fcard3">
<div class="wrap1">

    <!-- lst1 -->
	<div class="lst1 even-grid evenmix-234">
        @foreach ($videoList as $video)
		<div class="item column">
			<div class="w1">
				<a href="{{ route('sub.video.video_detail', ['idx' => $video->idx]) }}" class="a1">
					<div class="f1">
						<span class="f1p1">
                            <img src="https://img.youtube.com/vi/{{ $video->uid }}/mqdefault.jpg" alt="{{ $video->title }}">
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">{{ $video->title }}</strong>
					</div>
					<div class="tg2">
						<span class="t2">{{ $video->channel }}</span>
						<span class="t3">조회수 {{ $video->hit_cnt }}회</span>
					</div>
				</a>
			</div>
		</div>
        @endforeach
	</div>
	<!-- /lst1 -->

	<!-- cp1more1 -->
	<div class="cp1more1">
		<a href="#★" class="more">
			<span class="t1">더보기</span>
			<i class="ic1"></i>
		</a>
	</div>
	<!-- /cp1more1 -->

</div>
</div>
<!-- /cp1fcard3 -->


<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 더보기클릭샘플. 20210111. @m
		 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
		 */
		(function(){
			var $my = $('.cp1fcard3'),
				$more = $('.more', $my),
				$lst = $('.lst1', $my);
			var html = $lst.html();

			$more.on('click', function(e){
				e.preventDefault();
				$lst.append($(html));
			});
		})();

	});
/*]]>*/</script>

</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection

@section('script')
<script>
// selectbox 조건부 검색
function selectSearch(searchType) {
    location.href='/sub/video/video_list?bcate_id={{ $bcateId }}&scate_id={{ $scateId }}&order=' + $('#select_order option:selected').val();
}

$('#search_btn').click(function() {
    var keyword = $('#input_keyword').val();
    location.href='/sub/video/video_list?bcate_id={{ $bcateId }}&scate_id={{ $scateId }}&keyword=' + keyword;
});
</script>
@endsection
