<!--
/**
 * SubPage Template
 * 20210111 | @m | 최초 등록
 * 20210118 | @m | 요구반영. 결함개선. 고도화.
 * ~20210119 | @m |
 * 20210330 | @m | 요구반영
 */
-->
@php
$bcateId = isset($_GET['bcate_id']) ? $_GET['bcate_id'] : '';
$scateId = isset($_GET['scate_id']) ? $_GET['scate_id'] : '';
$order = isset($_GET['order']) ? $_GET['order'] : '';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
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
				<a href="{{ route('sub.video.video_list') }}" class="a1"><i class="t1">영상</i></a>
                {{-- 소분류 카테고리 선택 시 --}}
                @if ($bcateId != '' && $scateId != '')
                <i class="sep">|</i>
				<a href="javascript:void(0);" class="a1"><i class="t1">{{ $bcateName }}</i></a>
                @endif
            </span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">

        {{-- 대/소분류 카테고리 모두 선택 --}}
        @if ($bcateId != '' && $scateId != '')
        <strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">{{ $scateName }}</span> <i class="ic1"></i></a></strong>
        <!-- lnb1c -->
		<div id="lnb1c">
			<ul>
            <li><a href="{{ route('sub.video.video_list', ['bcate_id' => $bcateId]) }}">ALL</a></li>
                @foreach ($scateList as $scate)
                <li><a href="{{ route('sub.video.video_list', ['bcate_id' => $scate->bcate_id, 'scate_id' => $scate->scate_id]) }}">{{ $scate->scate_name }}</a></li>
                @endforeach
			</ul>
		</div>
		<!-- /lnb1c -->

        {{-- 대분류 카테고리만 선택 --}}
        @elseif ($bcateId != '' && $scateId == '')
        <strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">ALL</span> <i class="ic1"></i></a></strong>
        <!-- lnb1c -->
		<div id="lnb1c">
			<ul>
            <li><a href="{{ route('sub.video.video_list') }}">ALL</a></li>
                @foreach ($scateList as $scate)
                <li><a href="{{ route('sub.video.video_list', ['bcate_id' => $scate->bcate_id, 'scate_id' => $scate->scate_id]) }}">{{ $scate->scate_name }}</a></li>
                @endforeach
			</ul>
		</div>
		<!-- /lnb1c -->

        {{-- 카테고리 미선택 --}}
        @else
        <strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">{{ $bcateName }}</span> <i class="ic1"></i></a></strong>
        <!-- lnb1c -->
		<div id="lnb1c">
			<ul>
            <li><a href="{{ route('sub.video.video_list') }}">ALL</a></li>
                @foreach ($bcateList as $bcate)
                <li><a href="{{ route('sub.video.video_list', ['bcate_id' => $bcate->bcate_id, 'scate_id' ]) }}">{{ $bcate->bcate_name }}</a></li>
                @endforeach
			</ul>
		</div>
		<!-- /lnb1c -->
        @endif

	</div>
	<!-- lnb1 -->

	<script>/*<![CDATA[*/
		$(function(){
            @if ($bcateId != '' && $scateId == '')
                var html = '';
                html += '<div class="breadcrumb clearfix">';
                html +=     '<strong class="blind">현재페이지 위치:</strong>';
                html +=     '<span class="cont">';
                html +=         '<a href="/sub/video/video_list" class="a1"><i class="t1">영상</i></a>';
                html +=         '<i class="sep">|</i>';
                html +=         '<a href="javascript:void(0);" class="a1"><i class="t1">{{ $bcateName }}</i></a>';
                html +=     '</span>';
                html += '</div>';

                $('#location1').empty();
                $('#location1').append(html);
            @endif

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
				<button type="submit" class="button submit search" id="search_btn" onclick="keywordSearch()"><i class="ic1"></i><span class="t1 blind">검색</span></button>
			</div>
			<!-- /cp1search1 -->

		</fieldset>
	</form>
	<!-- /form -->
</div>
<!-- /cp1select3search1 -->

<!-- cp1tag5 -->
<div class="cp1tag5">
	<strong class="h1">태그</strong>
	<div class="tags" id="div_tag_list">
        @foreach ($videoTagArr as $videoTag)
            @if ($videoTag->tag != '')
            <a href="javascript:void(0);" class="a1" tag_idx="{{ $videoTag->idx }}">#{{ $videoTag->tag }}</a>
            @endif
        @endforeach
	</div>
    @if (count($videoTagArr) >= 20)
	<a href="javascript:void(0);" class="more" id="more_tag_btn">더보기</a>
    @endif
</div>
<!-- /cp1tag5 -->

<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 태그선택. 20210330. @m
		 */
		(function(){
			var my = '.cp1tag5',
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

                // 선택된 태그 이름 배열로 저장
                $.each(onTags, function(index, value) {
                    var tagName = $(value).text();

                    if (tagName != '') {
                        tagName = tagName.substr(1);

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

                getVideoData(tagNameList);
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
                url: "{{ route('sub.video.get_more_tags') }}",
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
                        // console.log(data.query);

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


<!-- cp1fcard3 -->
<div class="cp1fcard3">
<div class="wrap1">

    <!-- lst1 -->
	<div class="lst1 even-grid evenmix-234" id="div_video_list">
        @if (count($videoList) > 0)
            @foreach ($videoList as $video)
            <div class="item column">
                <div class="w1">
                    <a href="{{ route('sub.video.video_detail', ['uid' => $video->uid]) }}" class="a1" video_idx="{{ $video->idx }}">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="https://img.youtube.com/vi/{{ $video->uid }}/mqdefault.jpg" alt="{{ $video->subject }}">
                            </span>
                            <i class="ic1 play">Play</i>
                        </div>
                        <div class="tg1">
                            <strong class="t1">{{ $video->subject }}</strong>
                        </div>
                        <div class="tg2">
                            <span class="t2">{{ $video->channel }}</span>
                            <span class="t3">조회수 {{ $video->hit_cnt }}회</span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        @else
            <div style="margin-left: 30px;">영상 정보가 없습니다.</div>
        @endif
	</div>
	<!-- /lst1 -->

    {{-- @if (count($videoList) >= 8)
	<!-- cp1more1 -->
	<div class="cp1more1" id="show_more">
		<a href="javascript:void(0);" class="more" id="more_video_btn">
			<span class="t1">더보기</span>
			<i class="ic1"></i>
		</a>
	</div>
	<!-- /cp1more1 -->
    @endif --}}

</div>
</div>
<!-- /cp1fcard3 -->


<!-- infomenu1 -->
<div class="infomenu1">

	<!-- pagination -->
	<div class="pagination" title="페이지 수 매기기">
	</div>
    <script>


    </script>
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
    totalCount= {{ $videoCount }};
    nowPageNum = 1;
    getpage();
});

// selectbox 조건부 검색
function selectSearch(searchType) {
    location.href='/sub/video/video_list?bcate_id={{ $bcateId }}&scate_id={{ $scateId }}&order=' + $('#select_order option:selected').val();
}

// 키워드 검색
function keywordSearch() {
    var keyword = $('#input_keyword').val();
    location.href='/sub/video/video_list?bcate_id={{ $bcateId }}&scate_id={{ $scateId }}&keyword=' + keyword;
}

// 키워드 엔터키 검색
// $("#input_keyword").keyup(function(e){
//     if(e.keyCode == 13) keywordSearch();
// });

// 해시태그(주제)가 포함된 영상 목록 조회
function getVideoData(tagNameList) {
    var keyword = $('#input_keyword').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.video.get_video_data') }}",
        data: {
            'tag_name_list': tagNameList,
            'keyword': keyword,
            'bcate_id': '{{ $bcateId }}',
            'scate_id': '{{ $scateId }}',
            'order':'{{ $order }}',
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');

                // 쿼리 확인
                console.log(data.query);

                if (data.resData.length != 0) {
                    // console.log(data.resData);

                    $('#div_video_list').empty();
                    $('#div_video_list').append(data.resData);

                    //페이지 번호 1로 변경
                    totalCount =data.totalcount;
                    nowPageNum =1;
                    getpage();
                } else {
                    html = '<span>영상 목록이 없습니다.</span>';

                    $('#div_video_list').empty();
                    $('#div_video_list').append(html);
                    $('.cp1more1').hide();
                }
            } else {
                alert('영상 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
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
//페이지 클릭 이벤트
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

    // 선택된 태그 이름 배열로 저장
    $.each(onTags, function(index, value) {
        var tagName = $(value).text();
        if (tagName != '') {
            tagName = tagName.substr(1);
            tagNameList.push(tagName);
            }
        })

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
        url: "{{ route('sub.video.get_video_data') }}",
        data: {
            'tag_name_list': tagNameList,
            'bcate_id': '{{ $bcateId }}',
            'scate_id': '{{ $scateId }}',
            'order': '{{ $order }}',
            'keyword': '{{ $keyword }}',
            'pageNum': selectedPage
        },
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                if (data.resData.length != 0) {
                    $('#div_video_list').empty();
                    $('#div_video_list').append(data.resData);
                    totalCount = data.totalcount;
                    nowPageNum = selectedPage;
                    getpage();

                } else {
                    html = '<span>강좌 목록이 없습니다.</span>';

                    $('#div_video_list').empty();
                    $('#div_video_list').append(html);
                    $('.cp1more1').hide();
                }
            } else {
                alert('강좌 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');

                //console.log('code: ' + data.code + '\nmessage: ' + data.msg);
            }

        },
        error: function(request, status, error) {
            console.log(error)
        },
    });

    // 뒤로가기 시 페이지 유지를 위한 history 추가
    history.pushState({
                'tagNameList': tagNameList,
                'bcateId': '{{ $bcateId }}',
                'scateId': '{{ $scateId }}',
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
            url: "{{ route('sub.video.get_video_data') }}",
            data: {
                'tag_name_list': history.state.tagNameList,
                'bcate_id': history.state.bcateId,
                'scate_id': history.state.scateId,
                'order': history.state.order,
                'keyword': history.state.keyword,
                'pageNum': history.state.pageNum
            },
            success: (data) => {
                if (data.status == 'success') {
                    // alert('done!');
                    if (data.resData.length != 0) {
                        $('#div_video_list').empty();
                        $('#div_video_list').append(data.resData);
                        totalCount = data.totalcount;
                        nowPageNum = history.state.pageNum;
                        getpage();

                    } else {
                        html = '<span>강좌 목록이 없습니다.</span>';

                        $('#div_video_list').empty();
                        $('#div_video_list').append(html);
                        $('.cp1more1').hide();
                    }
                } else {
                    alert('강좌 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');

                    //console.log('code: ' + data.code + '\nmessage: ' + data.msg);
                }

            },
            error: function(request, status, error) {
                console.log(error)
            },
        });

    } else {
        history.back();
    }

});
</script>
@endsection
