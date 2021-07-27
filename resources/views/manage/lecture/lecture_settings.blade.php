<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210223 | @m | 요구반영. 결함개선. 고도화.
 * ~20210302 | @m |
 * 20210412 | @m | 요구반영
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 강좌설정')

@section('content')

<? $d1n = '1'; $d2n = '2'; // 1차2차활성 ?>

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
		<h2 class="h1">강좌 설정</h2>
	</div>
	<div class="eg1">
		<a href="javascript:void(0);" class="b2 button primary" onclick="saveLectureSettings()">설정 저장</a>
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


<div class="hgroup1 mgt0">
	<h3 class="hb1 h4 dpib mgr05em vam">비공개 질문 작성 활성화</h3>
	<div class="bi1 dpib fsS1 vam">
		<a href="#?" class="li1 tooltip1">
			<span class="tooltip1c w17em">
				강사가 직접 응답할 여유가 없을 경우, 비활성화를 추천드립니다.
			</span>
		</a>
	</div>
</div>


<!-- cp3dlist3 -->
<div class="cp3dlist3">
	<ul class="dl1">
		<li class="di1">
			<b class="dt1">
				<input type="radio" name="secret_question_yn" id="secret_question_yn" value="Y" @if($lectureInfo->secret_question_yn == 'Y') checked @endif/><label for="★1radio0e0">비공개 질문 가능</label>
			</b>
			<div class="dd1">
				<div class="form-text1">
					질문하기 게시판에서 비공개 질문 작성이 가능하며, 강사와 1:1 질문&amp;답변이 가능합니다.
				</div>
			</div>
		</li>
		<li class="di1">
			<b class="dt1">
				<input type="radio" name="secret_question_yn" id="secret_question_yn" value="N" @if($lectureInfo->secret_question_yn == 'N') checked @endif/><label for="★1radio0e1">비공개 질문 불가능</label>
			</b>
			<div class="dd1">
				<div class="form-text1">
					공개 질문만 작성 가능하며, 수강자들의 자유로운 토론이 가능합니다.
				</div>
			</div>
		</li>
	</ul>
</div>
<!-- /cp3dlist3 -->


<div class="hgroup1">
	<h3 class="hb1 h4">수료증 발급 활성화</h3>
</div>


<!-- cp3dlist3 -->
<div class="cp3dlist3">
	<ul class="dl1">
		<li class="di1">
			<b class="dt1">
				<input type="radio" name="certificate_yn" id="certificate_yn" value="Y" @if ($lectureInfo->certificate_yn == 'Y') checked @endif/><label for="★1radio1e0">수료증 발급 가능</label>
			</b>
			<div class="dd1">
				<div class="form-text1">
					수료증 발급을 활성화 시킵니다.
				</div>
				<div class="box0">
					<strong class="mgr05em cv0 fw4">발급 기준</strong>
					<input type="text" id="progress_rate" name="progress_rate" value="@if ($lectureInfo->certificate_yn == 'Y') {{ $lectureInfo->progress_rate }} @endif" placeholder="진도율(필수)" title="진도율(필수)" class="mgr05em" />
					<span class="dpib">
						<input type="checkbox" name="★1check1submit1" id="★1check1submit1e0" /><label for="★1check1submit1e0">과제/시험 모두 제출 <small class="text-muted">(선택)</small></label>
					</span>
				</div>
			</div>
		</li>
		<li class="di1">
			<b class="dt1">
				<input type="radio" name="certificate_yn" id="certificate_yn" value="N" @if ($lectureInfo->certificate_yn == 'N') checked @endif/><label for="★1radio1e1">수료증 발급 불가능</label>
			</b>
			<div class="dd1">
				<div class="form-text1">
					수료증 발급이 비활성화 됩니다.
				</div>
			</div>
		</li>
	</ul>
</div>
<!-- /cp3dlist3 -->


<div class="hgroup1">
	<h3 class="hb1 h4">공지사항 설정</h3>
</div>


<!-- bbs1table1 -->
<div class="bbs1table1">

	<!-- infomenu1 -->
	<div class="infomenu1 mgb0">
		<div class="left">
			<button type="button" class="button small del-check">선택 삭제</button>
		</div>
		<div class="right">
			<a href="#layer1notice1write1" class="button small toggle" data-send-focus="that" onclick="$('#noticeTitle').val(''); $('#editor').empty(); $('#idx').val('');">+ 새 공지</a>
		</div>
	</div>
	<!-- /infomenu1 -->

	<table class="t1 w100 tttac ttvam fsxd lhD">
		<caption>
			<strong class="h1 blind">공지사항 설정 목록</strong>
			<span class="summary1 blind">: 선택, 제목, 작성자, 작성일, 관리</span>
		</caption>
		<thead>
		<tr>
		<th scope="col" style="width:auto;">
			<span class="blind">선택</span>
			<input type="checkbox" name="★1checkbox0" id="★1checkbox0e0" title="전체선택" class="all" />
		</th>
		<th scope="col" style="width:60%;">
			<a href="#" class="b1 sort" title="제목 오름차순/내림차순 정렬">
				<span class="b1t1">제목</span>
				<i class="b1ic1">정렬</i>
			</a>
		</th>
		<th scope="col" style="width:4em;">작성자</th>
		<th scope="col" style="width:auto;">
			<a href="#" class="b1 sort" title="작성일 오름차순/내림차순 정렬">
				<span class="b1t1">작성일</span>
				<i class="b1ic1">정렬</i>
			</a>
		</th>
		<th scope="col" style="width:auto;">관리</th>
		</tr>
		</thead>
		<tbody class="w1item">
        @foreach ($lectureNoticeList as $lectureNotice )
            <tr class="item">
            <td><input type="checkbox" name="★1checkbox1" title="선택" value="{{ $lectureNotice->idx }}"/></td>
            <td class="tal"><a href="#">{{ $lectureNotice->title }}</a></td>
            <td>{{ $lectureNotice->writer_name }}</td>
            <td>{{ $lectureNotice->write_at }}</td>
            <td><a href="#layer1notice1write1" class="b2 button small secondary edit toggle" data-send-focus="that" data-idx="{{ $lectureNotice->idx }}" data-title="{{ $lectureNotice->title }}" data-content="{{ $lectureNotice->content }}" >수정</a></td>
            </tr>
        @endforeach
		</tbody>
	</table>

</div>
<!-- /bbs1table1 -->

<!-- (레이어팝업. 공지사항 등록) -->
@include('manage.lecture.inc_layer_add_notice')

<script>/*<![CDATA[*/
	$(function(){
		// 레이어팝업 템플릿 바로 확인
		//$('[href="#layer1notice1write1"]').first().triggerHandler('click');
	});
/*]]>*/</script>


<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 전체선택. 선택삭제. 삭제 20210302. @m.
		 */
		(function(){
			var my = '.bbs1table1',
				ck = 'input:checkbox',
				ack = 'input.all:checkbox',
				delck = '.del-check', // 선택 삭제
				item = '.item', // 항목
				del = '.del'; // 개별 삭제

			// 미래 전체 클릭
			$(my).on('click', ack, function(e){
				if( $(this).is(':checked') ){
					$(my).find(ck).prop('checked', true);
				}else{
					$(my).find(ck).prop('checked', false);
				}
			});

			// 미래 체크박스 클릭
			$(my).on('click', ck, function(e){
				if( !$(this).is(':checked') ){
					$(my).find(ack).prop('checked', false); // 전체 선택 해제
				}
			});

			// 미래 선택 삭제 클릭
			$(my).on('click', delck, function(e){
				e.preventDefault();
				if( confirm('선택한 항목을 삭제하시겠습니까?') ){
                    var chk_arr=[];
                    $(my).find(ck).filter(':checked:not(".all")').each(function(){
                        var chk =$(this).closest(item).find("input").val();
                        chk_arr.push(chk);
                    })
                    $.ajax({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'GET',
                        dataType: 'json',
                        url: "{{ route('manage.lecture.remove_notice')}}",
                        data: {'checkArr': chk_arr},
                        success: (response) => {
                            if(response.status=='success'){
                                console.log(response.query)
                                $(my).find(ck).filter(':checked:not(".all")').closest(item).remove();
                            }
                        },
                        error: (response)=> {
                            alert(response.msg);
                        }
                    });
                }

			});

			// 미래 개별 삭제 클릭
			$(my).on('click', del, function(){
				if( confirm('삭제하시겠습니까?') ){

					$(this).closest(item).remove();
				}
			});

		})();

	});
/*]]>*/</script>


<!-- infomenu1 -->
<div class="infomenu1">

	<!-- pagination -->
	<div class="pagination" title="페이지 수 매기기">
		<span class="control">
			<span class="m first"><a title="처음 페이지"><i class="ic">처음</i></a></span>
			<span class="m prev"><a title="이전 페이지"><i class="ic">이전</i></a></span>
		</span>
		<span class="pages">
			<span class="m on"><a title="현재 1 페이지">1</a></span>
			<span class="m"><a href="?" title="2 페이지">2</a></span>
			<span class="m"><a href="?" title="3 페이지">3</a></span>
			<span class="m"><a href="?" title="4 페이지">4</a></span>
			<span class="m"><a href="?" title="5 페이지">5</a></span>
			<span class="m"><a href="?" title="6 페이지">6</a></span>
			<span class="m"><a href="?" title="7 페이지">7</a></span>
			<span class="m"><a href="?" title="8 페이지">8</a></span>
			<span class="m"><a href="?" title="9 페이지">9</a></span>
			<span class="m"><a href="?" title="10 페이지">10</a></span>
		</span>
		<span class="control">
			<span class="m next"><a href="?" title="다음 페이지"><i class="ic">다음</i></a></span>
			<span class="m last"><a href="?" title="마지막 페이지"><i class="ic">마지막</i></a></span>
		</span>
	</div>
	<!-- /pagination -->

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
function saveLectureSettings() {
    var lectureIdx = "{{ isset($_GET['idx']) ? $_GET['idx'] : '' }}";
    var secretQuestionYn = $('input[name=secret_question_yn]:checked').val();
    var certificateYn = $('input[name=certificate_yn]:checked').val();
    var progressRate = $('#progress_rate').val();
    var idx = $('idx').val();


    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('manage.lecture.save_lecture_settings') }}",
        data: {
            'lecture_idx': '{{ $_GET['idx'] }}',
            'secret_question_yn': secretQuestionYn,
            'certificate_yn': certificateYn,
            'progress_rate': progressRate
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                location.href='{{ route('manage.lecture.lecture_settings', ['idx' => $lectureInfo->idx]) }}';
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

$(function(){
    setTimeout(function(){
        $('.secondary.edit').click(function(){
            var content = $(this).data('content');
            var title = $(this).data('title');
            var idx = $(this).data('idx');
            //TODO: content 안나옴
            $('#noticeTitle').val(title);
            $('#editor').val(content);
            $('#idx').val(idx);

        })

    }, 100);

})

</script>
@endsection
