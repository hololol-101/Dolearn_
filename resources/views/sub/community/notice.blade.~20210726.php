<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210311 | @m | 요구반영. 결함개선. 고도화.
 * ~20210311 | @m |
 */
-->
@extends('master_sub')

@section('title', '커뮤니티 - 공지사항')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

@include('sub.community.inc_community_menu')

<!-- cp1infomenu1 -->
<div class="cp1infomenu1">
	<div class="w1">
	</div>
	<div class="w2">

		<select class="select" title="선택옵션">
			<option value="">최신순</option>
			<option value="">좋아요수</option>
			<option value="">조회수</option>
		</select>

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


<!-- cp1bbs4list1 -->
<div class="cp1bbs4list1">
	<ul class="lst1">
    @foreach($boardList_notice as $boardlist_notice)
        <li class="li1">
            <a href="{{ route('sub.community.notice_detail', ['pidx' => $boardlist_notice->idx]) }}" class="a1">
                <b class="g1 s1">필독</b>
                <div class="t1">
                    {{ $boardlist_notice->subject }}
                </div>
            </a>
        </li>
    @endforeach
    @foreach($boardList as $boardlist)
        <li class="li1">
            <a href="{{ route('sub.community.notice_detail', ['pidx' => $boardlist->idx]) }}" class="a1">
                <b class="g1 s2">공지</b>
                <div class="t1">
                    {{ $boardlist->subject }}
                </div>
            </a>
        </li>
    @endforeach
	</ul>
</div>
<!-- /cp1bbs4list1 -->


<!-- pagination -->
{!! $pageIndex['htmlCode'] !!}
<!-- /pagination -->


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
