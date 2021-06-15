<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210308 | @m | 요구반영. 결함개선. 고도화.
 * ~20210308 | @m |
 */
-->
@php
$level = isset($_GET['level']) ? $_GET['level'] : '';
$isFree = isset($_GET['is_free']) ? $_GET['is_free'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : '';
@endphp

@extends('master_sub')

@section('title', '강사 마이페이지 - 강좌관리 - 운영강좌')

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
				<a href="javascript:void(0);" class="a1"><i class="t1">강좌관리</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">운영 강좌</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li class="on"><a href="{{ route('manage.instructor.operation_lecture') }}">운영 강좌</a></li>
			<li><a href="{{ route('manage.instructor.question_list') }}">질문 리스트</a></li>
			<li><a href="{{ route('manage.instructor.review_list') }}">수강후기 리스트</a></li>
			<li><a href="{{ route('manage.instructor.income_info') }}">수익 내역</a></li>
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


<!-- cp1infomenu1 -->
<div class="cp1infomenu1">
	<div class="w1">
	</div>
	<div class="w2">
		<a href="{{ route('sub.lecture.add_new_lecture', ['step' => 'basic_info']) }}" class="button gray4 ic1t1"><i class="ic1 add"></i> <span class="t1">새 강좌 만들기</span></a>
	</div>
</div>
<!-- /cp1infomenu1 -->


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
				<input type="text" value="" placeholder="검색어를 입력하세요." title="검색어"
					onfocus="if( this.value == this.defaultValue ) this.value=''; this.select();"
					onblur="if( this.value=='' ) this.value=this.defaultValue;"
					class="text" id="input_keyword"/>
				<button type="submit" class="button submit search" id="search_btn" onclick="keywordSearch()"><i class="ic1"></i><span class="t1 blind">검색</span></button>
			</div>
			<!-- /cp1search1 -->

		</fieldset>
	</form>
	<!-- /form -->
</div>
<!-- /cp1select3search1 -->


<!-- cp1fcard7 -->
<div class="cp1fcard7">
<div class="wrap1">
	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-223 gap3pct">
        @if (count($lectureList) > 0)
            @foreach ($lectureList as $lecture)
            <div class="item column">
                <div class="w1">
                    <a href="{{ route('sub.lecture.lecture_detail', ['idx' => $lecture->idx]) }}" class="a1">
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
                            <div class="t2">
                                <span class="t2t1">평점 {{ $lecture->rating }} · 수강생 {{ $lecture->student_cnt }}명</span>
                            </div>
                        </div>
                    </a>
                    <div class="btns">
                        <a href="{{ route('manage.lecture.lecture_info', ['idx' => $lecture->idx]) }}" class="a2"><span class="a2t1">강좌 관리하기</span></a>
                        <a href="{{ route('sub.lecture.lecture_detail', ['idx' => $lecture->idx]) }}" class="a2"><span class="a2t1">강좌 바로가기</span></a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <span style="margin-left: 20px">운영 중인 강좌가 없습니다.</span>
        @endif
	</div>
	<!-- /lst1 -->
</div>
</div>
<!-- /cp1fcard7 -->


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
        location.href='/manage/instructor/operation_lecture?level=' + $('#select_level option:selected').val();
    } else if (searchType == 'free') {
        location.href='/manage/instructor/operation_lecture?is_free=' + $('#select_free option:selected').val();
    } else if (searchType == 'order') {
        location.href='/manage/instructor/operation_lecture?order=' + $('#select_order option:selected').val();
    } else {
        location.href='/manage/instructor/operation_lecture';
    }
}

// 키워드 검색
function keywordSearch() {
    var keyword = $('#input_keyword').val();
    location.href='/manage/instructor/operation_lecture?keyword=' + keyword;
}
</script>
@endsection
