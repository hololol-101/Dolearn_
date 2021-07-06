<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210315 | @m | 요구반영. 결함개선. 고도화.
 * ~20210317 | @m |
 */
-->
@extends('master_sub')

@section('title', '커뮤니티 - 서비스 문의')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">


<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="javascript:void(0);" class="a1"><i class="t1">커뮤니티</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">서비스 문의</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.community.notice') }}">공지사항</a></li>
			<li><a href="{{ route('sub.community.trend') }}">인사이트</a></li>
			<li class="on"><a href="{{ route('sub.community.service_qna', ['type' => 'all']) }}">서비스 문의</a></li>
			<li><a href="{{ route('sub.community.review_all') }}">수강후기 모아보기</a></li>
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


<!-- cp1tabs1 -->
<div id="cp1tabs1" class="cp1tabs1 mgt1em mgb3em">
	<ul>
        <li class="m1 column on"><a href="javascript:void(0);" class="qna_tab" tab_type="all" style="min-width:4em;" onclick="clickTab(this)"><span class="t1">전체</span><i class="ic1"></i></a></li>
        <li class="m2 column"><a href="javascript:void(0);" class="qna_tab" tab_type="basic" style="min-width:4em;" onclick="clickTab(this)"><span class="t1">일반</span><i class="ic1"></i></a></li>
        <li class="m3 column"><a href="javascript:void(0);" class="qna_tab" tab_type="instructor" style="min-width:4em;" onclick="clickTab(this)"><span class="t1">강사</span><i class="ic1"></i></a></li>
        <li class="m4 column"><a href="javascript:void(0);" class="qna_tab" tab_type="student" style="min-width:4em;" onclick="clickTab(this)"><span class="t1">수강자</span><i class="ic1"></i></a></li>
        <li class="m5 column"><a href="javascript:void(0);" class="qna_tab" tab_type="pay" style="min-width:4em;" onclick="clickTab(this)"><span class="t1">결제</span><i class="ic1"></i></a></li>
	</ul>
</div>
<!-- /cp1tabs1 -->
<script>
    function clickTab(obj){
        my=$(obj);
        my.parents().siblings().removeClass('on');
        my.parent().addClass('on');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: '{{ route('serviceinquiry.faq_index') }}',
            data: {
                'type': my.attr('tab_type')
            },
            success: (data) => {
                $('#qna_list').empty();
                $('#qna_list').append(data.html);
            },
        });
    }
</script>

<!-- cp1qna1 -->
<div class="cp1qna1" id="qna_list">
	<ul class="dl1">
        @foreach ($faqList as $faq)
        <li class="di1">
			<a href="javascript:void(0);" class="dt1">
			{{	$faq->title}}
			</a>
			<div class="dd1">
                <div class="attach1">
                    @if($faq->attach_file!='')
                    @foreach (explode(',', $faq->attach_file) as $file)
                    <ul>
                        <li>
                            <a href="{{ asset('storage/uploads/attach/'.$file) }}.'" class="filename">{{ $file }}</a>
                            <a href="javascript:void(0)" title="바로보기 [새 창]" class="b1 quickview" onclick = window.open("'.asset('storage/uploads/attach/'.$file).'", "_blank")><i class="ic1"></i> 바로보기</a>
                        </li>
                        </ul>

                    @endforeach
                    @endif
                </div>

				{!! $faq->content !!}
			</div>
		</li>
        @endforeach
	</ul>
</div>
<!-- /cp1qna1 -->

<script>/*<![CDATA[*/
	$(function(){
		/** ◇◆ 질문답변아코디언. 20210317. @m.
		 */
		(function(){
			var my = '.cp1qna1',
				item = '.di1',
				q = '.dt1',
				a = '.dd1';
			$(my).on('click', item, function(e){
				e.preventDefault();
				//$(this).find(a).slideToggle(); // 나만 활성 토글
				// 나는 활성 형제는 비활성
				if( $(this).find(a).is(':hidden') ){
					$(this).find(a).slideDown().end().siblings().find(a).slideUp();
				}else{
					$(this).find(a).slideUp();
				}
			});
		})();
	});
/*]]>*/</script>


<div class="dpf fww jcsb aic">
	<div class="mgt1em mgb1em">
		<h2 class="hb1 h2 mg0">더 궁금한 점이 있으신가요?</h2>
		1:1 문의하기에 남겨주시면 답변 드리겠습니다.
	</div>
	<div>
		<a href="{{ route('sub.community.one_to_one') }}" class="button primary round w10em fw6 fsB8 semismall">1:1 문의하기</a>
	</div>
</div>


<h3 class="hb1 h4">나의 문의 내역</h3>

<!-- <div class="pdt15em pdb15em bdt1px bdb1px">
	<div class="dpf jcc aic" style="min-height:8em;">
		문의 내역이 없습니다.
	</div>
</div> -->

<table class="t2 w100 bdw2px tttac tt2tal ttvam lhD">
    <caption>
        <strong class="h1 blind">나의 문의 내역 목록</strong>
        <span class="summary1 blind">: 구분, 제목, 날짜</span>
    </caption>
    <col class="w6em" /><col /><col class="w6em" />
    <thead class="blind">
        <tr>
        <th scope="col">구분</th>
        <th scope="col">제목</th>
        <th scope="col">날짜</th>
        </tr>
    </thead>
    <tbody>
        @if (Auth::check())
            @foreach ($qaList as $qa)
            <tr>
                @if ($qa->status =="active")
                    <td><i class="button w5em small primary1">대기중</i></td>
                @else
                    <td><i class="button w5em small gray4">답변완료</i></td>
                @endif
                <td><a href="{{ route('sub.community.one_to_one_detail', ['idx' => $qa->idx ]) }}">{{ $qa->question_title }}</a></td>
                <td>{{ date('Y.m.d', strtotime($qa->question_writed_at)) }}</td>
            </tr>
            @endforeach
            @if (count($qaList)==0)
            <div>문의 내역이 없습니다.</div>
            @endif

        @else
        <div>로그인 후 이용해주세요.</div>
        @endif

    </tbody>
</table>


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
    // 서비스 문의 탭 선택
    $('.qna_tab').click(function() {
        var myItem = $(this).closest('li');
        var tabType = $(this).attr('tab_type');
        myItem.siblings().removeClass('on');
        myItem.addClass('on');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: '{{ route('serviceinquiry.faq_index') }}',
            data: {
                'type': tabType
            },
            success: (data) => {
                console.log(data)
                if (data.status == 'success') {

                    if (data.html.length != 0) {
                        $('#qna_list').empty();
                        $('#qna_list').append(data.html);
                    } else {
                        html = '<br><span>자주 묻는 질문 내역이 없습니다.</span>';
                        $('#qna_list').empty();
                        $('#qna_list').append(html);
                    }

                } else {
                    alert('강좌 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                    // console.log('code: ' + data.code + '\nmessage: ' + data.msg);
                }
            },
            error: function(request, status, error) {
                //
            },
        });
    });
});
</script>
@endsection
