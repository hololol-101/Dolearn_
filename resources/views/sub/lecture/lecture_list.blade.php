<!--
/**
 * SubPage Template
 * 20210111 | @m | 최초 등록
 * 20210111 | @m | 요구반영. 결함개선. 고도화.
 * ~20210113 | @m |
 * 20210330 | @m | 요구반영
 */
-->
@php
$bcateId = isset($_GET['bcate_id']) ? $_GET['bcate_id'] : '';
$scateId = isset($_GET['scate_id']) ? $_GET['scate_id'] : '';
$level = isset($_GET['level']) ? $_GET['level'] : '';
$isFree = isset($_GET['is_free']) ? $_GET['is_free'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : '';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
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

<!-- cp1tag4 -->
<div class="cp1tag4">
	<strong class="h1">주제</strong>
	<div class="tags" id="div_tag_list">
        {{-- @foreach ($lectureTagArr as $key => $lectureTag)
            @if ($lectureTag != '')
            <a href="javascript:void(0);" class="a1">{{ $lectureTag }}</a>
            @endif
        @endforeach --}}
        @foreach ($lectureTagArr as $key => $lectureTag)
            @if ($lectureTag != '')
            <a href="javascript:void(0);" class="a1" tag_idx="{{ $lectureTag->idx }}">{{ $lectureTag->tag }}</a>
            @endif
        @endforeach
	</div>
	@if (count($lectureTagArr) >= 20)
	<a href="javascript:void(0);" class="more" id="more_tag_btn">더보기</a>
    @endif
</div>
<!-- /cp1tag4 -->

<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 태그선택. 20210330. @m
		 */
		(function(){
			var my = '.cp1tag4',
				m = '.a1';
			// 클릭
			$(my).on('click', m, function(e){
				e.preventDefault();
				if( $(this).is('.on') ){
					$(this).removeClass('on');
				}else{
					$(this).addClass('on');
					$(this).prependTo( $(this).parent() );
				}

                var tagNameList = [];
                var onTags = $('.tags').find('.on');

                // 선택된 주제 이름 배열로 저장
                $.each(onTags, function(index, value) {
                    var tagName = $(value).text();

                    if (tagName != '') {
                        // 선택한 값이 배열에 있으면 삭제
                        if (tagNameList.includes(tagName)) {
                            tagNameList.pop(tagName);

                        // 없으면 추가
                        } else {
                            tagNameList.push(tagName);
                        }
                    }
                });
                // console.log(tagNameList);

                getLectureData(tagNameList);
			});
		})();

		// 태그 더보기
        $('#more_tag_btn').on('click', function(){
            var lastTagIdx = $('.tags .a1').last().attr('tag_idx');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'json',
                url: "{{ route('sub.lecture.get_more_tags') }}",
                data: {
                    'last_tag_idx': lastTagIdx,
                    'bcate_id': '{{ $bcateId }}',
                    'scate_id': '{{ $scateId }}',
                },
                // contentType: false,
                // processData: false,
                success: (data) => {
                    if (data.status == 'success') {
                        // alert('done!');

                        // 쿼리 확인용
                        console.log(data.query);

                        if (data.resData.length != 0) {
                            // console.log(data.resData);

                            $('#div_tag_list').append(data.resData);

                            // 조회된 태그 수가 20개 미만일 경우 더보기 버튼 숨김
                            if (data.isShowMore) {
                                $('#more_tag_btn').show();
                            } else {
                                $('#more_tag_btn').hide();
                            }
                        }

                        // 조회된 태그가 없을 경우 더보기 버튼 숨김
                        if (data.count == 0) {
                            $('#more_tag_btn').hide();
                        }

                    } else {
                        alert('태그 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                        console.log('code: ' + data.code + '\nmessage: ' + data.msg);
                    }
                },
                error: function(request, status, error) {
                    console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
                },
                complete: function(data) {
                    //
                }
            });
        });

	});
/*]]>*/</script>

<!-- cp1fcard1 -->
<div class="cp1fcard1">
<div class="wrap1">
	<!-- lst1 -->
	<div class="lst1 even-grid evenmix-234" id="div_lecture_list">
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

    {{-- @if (count($lectureList) >= 8)
	<!-- cp1more1 -->
	<div class="cp1more1" id="show_more">
		<a href="javascript:void(0);" class="more" id="more_lecture_btn">
			<span class="t1">더보기</span>
			<i class="ic1"></i>
		</a>
	</div>
	<!-- /cp1more1 -->
    @endif --}}

</div>
</div>
<!-- /cp1fcard1 -->


<!-- infomenu1 -->
<div class="infomenu1">
    <!-- pagination -->
	<div class="pagination" title="페이지 수 매기기">

    <span class="pages"></span>


	</div>

	<!-- /pagination -->

	<!-- <p class="left">
		<a href="?" onclick="history.go(-1); return false;" class="button default">이전</a>
	</p>
	<p class="right">
		<a href="?" class="button">글작성</a>
	</p> -->

</div>
<!-- /infomenu1 -->




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
$(function() {
    @php
        $searchKeyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    @endphp

    var searchKeyword = '{{ $searchKeyword }}';

    if (searchKeyword != '') {
        $('#input_keyword').val(searchKeyword);
    }
    // 전역변수 지정 (총수, 현재 페이지 번호)
    var global = "totalCount";
    var global = "nowPageNum";
    totalCount= {{ $lectureCount }};
    nowPageNum = 1;
    getpage();

});

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

// 키워드 검색
function keywordSearch() {
    var keyword = $('#input_keyword').val();
    location.href='/sub/lecture/lecture_list?bcate_id={{ $bcateId }}&scate_id={{ $scateId }}&keyword=' + keyword;
}

// 키워드 엔터키 검색
// $("#input_keyword").keyup(function(e){
//     if(e.keyCode == 13) keywordSearch();
// });

// 해시태그(주제)가 포함된 강좌 목록 조회
function getLectureData(tagNameList) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.lecture.get_lecture_data') }}",
        data: {
            'tag_name_list': tagNameList,
            'bcate_id': '{{ $bcateId }}',
            'scate_id': '{{ $scateId }}',
            'level':'{{ $level }}',
            'isFree':'{{ $isFree }}',
            'order':'{{ $order }}',
            'keyword':'{{ $keyword }}'
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                if (data.resData.length != 0) {
                    // console.log(data.resData);

                    // 쿼리 확인
                    // console.log(data.query);

                    $('#div_lecture_list').empty();
                    $('#div_lecture_list').append(data.resData);

                    //페이지 번호 1로 변경
                    totalCount =data.totalcount;
                    nowPageNum =1;
                    getpage();

                } else {
                    html = '<span>강좌 목록이 없습니다.</span>';
                    $('#div_lecture_list').empty();
                    $('#div_lecture_list').append(html);
                    $('.cp1more1').hide();

                    totalCount=0;
                    getpage();
                }
            } else {
                alert('강좌 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                // console.log('code: ' + data.code + '\nmessage: ' + data.msg);
            }
        },
        error: function(request, status, error) {
            console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
        },
        complete: function(data) {
            //
        }
    });
}

//페이지 번호 변경
function getpage(){
    var dataPerPage = 12;    //한 페이지당 데이터 수
    var pageCount = 10;     //표시할 페이지 수
    var totalPage = Math.ceil(totalCount/dataPerPage);   //총 페이지
    var pageGroup = Math.ceil(nowPageNum/pageCount);    //현재 페이지 그룹
    var last = pageGroup*pageCount;     //해당 페이지 그룹의 마지막 번호
    var first = last-pageCount+1;       //해당 페이지 그룹의 첫번째 번호
    if(last>totalPage){
        last = totalPage;
    }

    var html ="";
    html+='<span class="control">';
        if (pageGroup<=1){
            html+='<span class="m first"><a  title="처음 페이지"><i class="ic">처음</i></a></span>';
            html+='<span class="m prev"><a  title="이전 페이지"><i class="ic">이전</i></a></span>';
        }
        else{
            html+='<span class="m first"><a href="javascript:void(0)" onclick="pageClick(this)" title="처음 페이지"><i class="ic">처음</i></a></span>';
            html+='<span class="m prev"><a href="javascript:void(0)" onclick="pageClick(this)" title="이전 페이지"><i class="ic">이전</i></a></span>';
        }

    html+='</span>';


    html+='<span class="pages">';
    for(var idx=first;idx<=last;idx++){
        if(idx == nowPageNum )
            html+='<span class="m on"><a href="javascript:void(0)" onclick="pageClick(this)" title="'+idx+' 페이지">'+idx+'</a></span>';
        else
            html+='<span class="m"><a href="javascript:void(0)" onclick="pageClick(this)" title="'+idx+' 페이지">'+idx+'</a></span>';
    }
    html+='</span>';

    html+='<span class="control">';
        if (pageGroup >= Math.ceil(totalPage/10)){
            html+='<span class="m next"><a title="다음 페이지"><i class="ic">다음</i></a></span>';
            html+='<span class="m last" id="last"><a title="마지막 페이지"><i class="ic">마지막</i></a></span>';
        }
        else{
            html+='<span class="m next"><a  href="javascript:void(0)" onclick="pageClick(this)" title="다음 페이지"><i class="ic">다음</i></a></span>';
            html+='<span class="m last" id="last"><a  href="javascript:void(0)" onclick="pageClick(this)" title="마지막 페이지"><i class="ic">마지막</i></a></span>';
        }

    html+='</span>';
    $(".infomenu1 .pagination").html(html);
}

function pageClick(obj){
    var dataPerPage = 12; //한 페이지당 데이터 수
    var pageCount = 10;  //표시할 페이지 수
    var totalPage = Math.ceil(totalCount/dataPerPage);   //총 페이지
    var currentPage = nowPageNum ;
    var pageGroup = Math.ceil(currentPage/pageCount);    //현재 페이지 그룹
    var last = pageGroup*pageCount;     //해당 페이지 그룹의 마지막 번호
    var first = last-pageCount+1;       //해당 페이지 그룹의 첫번째 번호

    if(last>totalPage){
        last = totalPage;
    }

    var tagNameList = [];
    var onTags = $('.tags').find('.on');

    // 선택된 주제 이름 배열로 저장
    $.each(onTags, function(index, value) {
        var tagName = $(value).text();
        if (tagName != '') {
            tagNameList.push(tagName);
        }
    });

    var selectedPage=$(obj).text();

    if($(obj).text()=="처음"){
        if(currentPage==1){return false;}
        selectedPage = 1;
    }
    else if($(obj).text()=="이전"){
        selectedPage = first-1;
    }
    else if($(obj).text()=="다음"){
        selectedPage = last+1;
    }
    else if($(obj).text()=="마지막"){
        if(currentPage==totalPage){return false;}
        selectedPage = totalPage;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.lecture.get_lecture_data') }}",
        data: {
            'tag_name_list': tagNameList,
            'bcate_id': '{{ $bcateId }}',
            'scate_id': '{{ $scateId }}',
            'level': '{{ $level }}',
            'isFree': '{{ $isFree }}',
            'order': '{{ $order }}',
            'keyword': '{{ $keyword }}',
            'pageNum': selectedPage
        },
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');

                totalCount = data.totalcount;
                nowPageNum = selectedPage;
                getpage();

                if (data.resData.length != 0) {
                    $('#div_lecture_list').empty();
                    $('#div_lecture_list').append(data.resData);

                } else {
                    html = '<span>강좌 목록이 없습니다.</span>';

                    $('#div_lecture_list').empty();
                    $('#div_lecture_list').append(html);
                    $('.cp1more1').hide();
                }
            } else {
                alert('강좌 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                // console.log('code: ' + data.code + '\nmessage: ' + data.msg);
            }

        },
        error: function(request, status, error) {
        },

    });

    // 뒤로가기 시 페이지 유지를 위한 history 추가
    history.pushState({
                'tagNameList': tagNameList,
                'bcateId': '{{ $bcateId }}',
                'scateId': '{{ $scateId }}',
                'level': '{{ $level }}',
                'isFree': '{{ $isFree }}',
                'order': '{{ $order }}',
                'keyword': '{{ $keyword }}',
                'pageNum': selectedPage
            }, null, '');
}

// 뒤로가기 이벤트 발생 시 페이지 전환
$(window).on('popstate', function(event) {
    // history 에 state 가 있을 경우
    if (history.state) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: "{{ route('sub.lecture.get_lecture_data') }}",
            data: {
                'tag_name_list': history.state.tagNameList,
                'bcate_id': history.state.bcateId,
                'scate_id': history.state.scateId,
                'level': history.state.level,
                'isFree': history.state.isFree,
                'order': history.state.order,
                'keyword': history.state.keyword,
                'pageNum': history.state.pageNum
            },
            success: (data) => {
                if (data.status == 'success') {
                    // alert('done!');

                    totalCount = data.totalcount;
                    nowPageNum = history.state.pageNum;
                    getpage();

                    if (data.resData.length != 0) {
                        $('#div_lecture_list').empty();
                        $('#div_lecture_list').append(data.resData);

                    } else {
                        html = '<span>강좌 목록이 없습니다.</span>';

                        $('#div_lecture_list').empty();
                        $('#div_lecture_list').append(html);
                        $('.cp1more1').hide();
                    }
                } else {
                    alert('강좌 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                    // console.log('code: ' + data.code + '\nmessage: ' + data.msg);
                }
            },
            error: function(request, status, error) {
            },
        });

    } else {
        history.back();
    }

});

</script>

@endsection
