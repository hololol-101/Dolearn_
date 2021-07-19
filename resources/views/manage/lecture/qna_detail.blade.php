<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210520 | @m | 요구반영. 결함개선. 고도화.
 * 20210521 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 질문 상세')

@section('content')

<? $d1n = '3'; $d2n = '2'; // 1차2차활성 ?>

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
	<div class="hg1">
		<i class="ic1"></i>
		<h2 class="h1">질문 리스트</h2>
	</div>
	<div class="eg1">
	</div>
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


<!-- cp1row1 -->
<div class="cp1row1">
	<div class="column1">
		<a href="javascript:void(0);" onclick="history.go(-1); return false;" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
	</div>
	<div class="column2">
		<!-- cp1related1 -->
		<div class="cp1related1">
			<div class="hg1">
                <span class="h1"><i class="h1ic1"></i><span class="h1t1">연관된 강의</span></span>
			</div>
			<ul class="lst1">
			<li class="li1"><a href="{{ route('learning.main', ['idx' => $_GET['idx'], 'uid' => $qnaInfo->video_id]) }}" class="a1">{{ $qnaInfo->new_video_title }}</a></li>
			</ul>
		</div>
		<!-- /cp1related1 -->
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
					<!-- <img src="{{ asset('assets/images/main/x1/x1p601.jpg') }}" alt="★대체텍스트필수" /> -->
					<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
				</span>
			</div>
		</div>
		<div class="w1w2">
			<div class="tt1">
				{{ $qnaInfo->title }}
			</div>
            @if ($qnaInfo->solution_yn == 'N')
			<span class="st1 s1">#미해결</span>
            @else
			<span class="st1 s2">#해결</span>
            @endif
			<div class="tg1">
				<span class="t1">{{ $qnaInfo->writer_name }}</span>
                {{-- TODO: 질문 작성 시간 계산 --}}
				<span class="t2">{{ format_date($qnaInfo->writed_at) }}</span>
			</div>
			<div class="tg2">
				{{ $qnaInfo->content }}
			</div>
			<div class="eg1">
				<a href="javascript:void(0);" class="cp1like1" onclick="qnaLike()"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">{{ $qnaInfo->like_cnt }}</span></a>
				<!-- cp1menu1 -->
				<div class="cp1menu1 toggle1s1">
					<strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp1menu1c toggle-c">
						<a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
					</div>
				</div>
				<!-- /cp1menu1 -->
			</div>
		</div>
	</div>
	<!-- /게시글 -->
	<!-- 댓글작성 -->
    <div class="w1 item reply">
        <textarea rows="3" cols="80" title="댓글작성" class="w100 type1"></textarea>
        <div class="tar">
            <button type="button" class="button submit semismall" onclick="enrollEvent(this)" value="N">등록하기</button>
        </div>
    </div>
    <!-- /댓글작성 -->
    <div id="commentSrc"></div>
	<!-- 댓글 -->
    <div id="commentPage"></div>

</div>
<!-- /cp1bbs4view1 -->
@include('manage.lecture.commentlist');

<!-- (레이어팝업) -->
@include('sub.lecture.inc_layer_report_post');

</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
<script>
    function declaration(obj){
        var my = obj;
        var idx = $(my).closest('.w1w2').find('input[type="hidden"]').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            dataType: 'json',
            url : "{{ route('sub.comment.declare') }}",
            data: {
                'idx': idx,
                'lectureId':'{{ $qnaInfo->lecture_idx }}',
                'postWriter':'{{ $qnaInfo->writer_id }}',
                'postTitle':'{{ $qnaInfo->title }}'
            },
            success : (data) => {
                if(data.status=="success"){
                    alert("댓글이 고정되었습니다.")
                }
            }
        });
    }
    function qnaLike(){
        var my = $('.cp1bbs4view1 .cp1like1 .cp1like1t2');
        var cnt = my.html();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'get',
            dataType: 'json',
            url : "{{ route('learning.qna_like') }}",
            data: {
                'idx':'{{ $qnaInfo->idx }}',
            },
            success : (data) => {
                if(data.status=="like"){
                    my.html(parseInt(cnt)+1);
                }else if(data.status=="dislike"){
                    my.html(parseInt(cnt)-1);
                }
            }
        });
    }
    $('#layer1report1post1').find(':button').on('click', function(){
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
                'type':'qna',
                'idx':'{{ $qnaInfo->idx }}',
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
<script>
    $(document).ready(function() {
        var postId = '';
        @if(isset($_GET['qna_idx']))
            postId = '{{ $_GET['qna_idx'] }}'
        @elseif(isset($_GET['idx']))
            postId = '{{ $_GET['idx'] }}'
        @endif
        var permission = 'N';
        @if(isset($permission)) permission = 'Y';@endif
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType: 'json',
            url : "{{ route('sub.comment.index') }}",
            data: {
                'postId': postId,
                'page':1,
                'postType':"question",
                'permission':permission
            },
            success : (result) => {
                console.log(result.query);
                $('#commentSrc').empty().append(result.html);
                $('#commentPage').empty().append(result.pageIndex['htmlCode']);
            }
        });
    });
</script>
@endsection
