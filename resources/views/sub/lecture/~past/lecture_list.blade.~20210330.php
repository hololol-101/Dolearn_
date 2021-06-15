<!--
/**
 * SubPage Template
 * 20210111 | @m | 최초 등록
 * 20210111 | @m | 요구반영. 결함개선. 고도화.
 * ~20210113 | @m |
 */
-->
@php
$bcateId = isset($_GET['bcate_id']) ? $_GET['bcate_id'] : '';
$scateId = isset($_GET['scate_id']) ? $_GET['scate_id'] : '';
$level = isset($_GET['level']) ? $_GET['level'] : '';
$isFree = isset($_GET['is_free']) ? $_GET['is_free'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : '';
@endphp

@extends('master_sub')

@section('title', '전체강좌')

@section('content')

{{-- {{ print_r($tagArr) }} --}}

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">

@include('sub.lecture.inc_body_head')

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
				<select class="select" id="select_level" onchange="selectSearch('level')" title="난이도">
					<option value="">모두</option>
                    <option value="low" @if ($level == 'low') selected @endif>초급</option>
                    <option value="medium" @if ($level == 'medium') selected @endif>중급</option>
                    <option value="high" @if ($level == 'high') selected @endif>중급이상</option>
				</select>
				<select class="select" id="select_free" onchange="selectSearch('free')" title="유/무료">
					<option value="">유/무료</option>
					<option value="N" @if ($isFree == 'N') selected @endif>유료</option>
					<option value="Y" @if ($isFree == 'Y') selected @endif>무료</option>
				</select>
				<select class="select" id="select_order" onchange="selectSearch('order')" title="정렬">
					<option value="latest" @if ($order == 'latest') selected @endif>최신순</option>
					<option value="students" @if ($order == 'students') selected @endif>수강자 많은순</option>
					<option value="rating" @if ($order == 'rating') selected @endif>평점 높은순</option>
                    <option value="complete" @if ($order == 'complete') selected @endif>완강률 높은순</option>
				</select>
			</div>
			<!-- /cp1select3 -->

			<!-- cp1search1 -->
			<div class="cp1search1">
				<input type="text" value="검색어를 입력하세요." placeholder="검색어를 입력하세요." title="검색어"
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
        @foreach ($lectureTagArr as $tag)
        <a href="{{ route('sub.lecture.lecture_list', ['tags' => $tag]) }}" class="a1">#{{ $tag }}</a>
        @endforeach
	</div>
	<a href="javascript:void(0);" class="more">더보기</a>
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

<!-- cp1fcard1 -->
<div class="cp1fcard1">
<div class="wrap1">
	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234">
        @foreach ($lectureList as $lecture)
        <div class="item column">
            <div class="w1">
                <a href="{{ route('sub.lecture.lecture_detail', ['idx' => $lecture->idx]) }}" class="a1">
                    <div class="f1">
                        <span class="f1p1">
                            <img src="{{ asset('assets/images/thumbnail/curriculum/'.$lecture->ori_thumbnail) }}" alt="{{ $lecture->title }}" />
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
                        </span>
                    </div>
                    <div class="tg2">
                        <span class="t2">
                            <span class="t2t1">{{ $lecture->owner_name }}</span> <span class="t2t2">· 수강생 1800명</span>
                        </span>
                        <span class="t3">
                            <span class="t3t1">@if($lecture->free_yn == 'Y') 무료 @else 유료 @endif</span>
                        </span>
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
<!-- /cp1fcard1 -->

<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 더보기클릭샘플. 20210111. @m
		 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
		 */
		(function(){
			var $my = $('.cp1fcard1'),
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
    if (searchType == 'level') {
        location.href='/sub/lecture/lecture_list?bcate_id={{ $bcateId }}&scate_id={{ $scateId }}&level=' + $('#select_level option:selected').val();
    } else if (searchType == 'free') {
        location.href='/sub/lecture/lecture_list?bcate_id={{ $bcateId }}&scate_id={{ $scateId }}&is_free=' + $('#select_free option:selected').val();
    } else if (searchType == 'order') {
        location.href='/sub/lecture/lecture_list?bcate_id={{ $bcateId }}&scate_id={{ $scateId }}&order=' + $('#select_order option:selected').val();
    } else {
        location.href='/sub/lecture/lecture_list';
    }
}

$('#search_btn').click(function() {
    var keyword = $('#input_keyword').val();
    location.href='/sub/lecture/lecture_list?bcate_id={{ $bcateId }}&scate_id={{ $scateId }}&keyword=' + keyword;
});
</script>
@endsection
