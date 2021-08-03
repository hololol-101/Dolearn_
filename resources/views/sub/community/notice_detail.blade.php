<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210311 | @m | 요구반영. 결함개선. 고도화.
 * ~20210316 | @m |
 */
-->
@extends('master_sub')

@section('title', '커뮤니티 - 공지사항(상세)')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- width1wrap1 -->
<div class="width1wrap1">


<!-- cp1view2 -->
<div class="cp1view2">


	<!-- cp1row1 -->
	<div class="cp1row1">
		<div class="column1">
			<a href="javascript:history.back();" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
		</div>
		<div class="column2">
		</div>
	</div>
	<!-- /cp1row1 -->


	<!-- cp1bbs4view1 -->
	<!-- 게시글 항목 item | 댓글 reply | 대댓글 reply2  -->
	<div class="cp1bbs4view1">
		<!-- 게시글 -->
		<div class="w1 item">
			<div class="w1w1">
				<div class="f1">
					<span class="f1p1">
						<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
						<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
					</span>
				</div>
			</div>
			<div class="w1w2">
				<div class="tt1">
					{{ $boardView->subject }}
				</div>
				<div class="tg1">
					<span class="t1">{{ $boardView->name }}</span>
					<span class="t2">{{ date('Y.m.d',$boardView->regdate) }}</span>
				</div>
				<div class="tg2">
                    {!! $boardView->content !!}
				</div>
				<div class="eg1">
					<a href="javascript:void(0)" class="cp1like1" onclick="boardLike(this)" ><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">0</span></a>
					<!-- cp1menu1 -->
					<div class="cp1menu1 toggle1s1">
						<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
						<div class="cp1menu1c toggle-c">
							<a href="#layer1report1post1" rel="noopener" title="새 창" class="b2 report toggle"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
						</div>
					</div>
					<!-- /cp1menu1 -->
				</div>
			</div>
		</div>
		<!-- /게시글 -->
        <!-- (레이어팝업) -->
        @include('sub.lecture.inc_layer_report_post')

		<!-- 댓글작성 -->
        @include('sub.comment.form')
        <div id="commentSrc"></div>
		<!-- /댓글 -->
	</div>
	<!-- /cp1bbs4view1 -->
    <div id="commentPage"></div>


</div>
<!-- /cp1view2 -->


</div>
<!-- /width1wrap1 -->


</div>
<!-- /container -->
</div>
<!-- /#body -->
<script>

function boardLike(obj){
    @if (!Auth::check())
        alert("로그인 후 이용해주세요.");
        return false;
    @endif
    var my = $(obj);
    var likeNum = my.find('.cp1like1t2').text();
    var idx ='{{ $boardView->idx }}';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: 'json',
        url: "{{ route('notice.like') }}",
        data: {
            'writingId':idx,
            'programId':"notice"
        },
        success: (data) => {
            if(data.status =="like"){
                my.find('.cp1like1t2').text(parseInt(likeNum)+1);
            }else{
                my.find('.cp1like1t2').text(parseInt(likeNum)-1);
            }
        }, error: function(response) {
            console.log(response);
        }
    })
}
$('#layer1report1post1').find(':button').on('click', function(){
    @if (!Auth::check())
        alert("로그인 후 이용해주세요.");
        return false;
    @endif

    var idx ='{{ $boardView->idx }}';
    var my = $('#layer1report1post1');
    var content = $('input[name="★1radio2"]:checked').siblings('label').text()
    if(content ==''){
        alert('신고사유를 선택해주세요!');
        return false;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url : "{{ route('report.report') }}",
        data: {
            'type':'notice',
            'idx':idx,
            'content': content
        },
        success : (data) => {
            if(data.status=="success"){
                alert("신고접수가 완료되었습니다.")
            }else{
                alert("이미 신고접수를 하셨습니다.")
            }
        }
    });

})

</script>
@endsection
