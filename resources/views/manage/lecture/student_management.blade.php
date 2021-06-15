<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210226 | @m | 요구반영. 결함개선. 고도화.
 * ~20210302 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 수강자 관리')

@section('content')

<? $d1n = '3'; $d2n = '1'; // 1차2차활성 ?>

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
		<h2 class="h1">수강자 관리</h2>
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


<!-- infomenu1 -->
<div class="infomenu1 mgt0">
    {{-- TODO: 수강자 추가 -> 메일 서버 연동, 메일 발송 --}}
	{{-- <button type="button" class="button add-student">수강자 추가하기</button> --}}
    <button type="button" class="button" onclick="alertDeveloping()">수강자 추가하기</button>
	<!-- cp3send1mail1 -->
	<div class="cp3send1mail1">
		<div class="w1">
			<div class="eg1">
				<input type="text" value="" placeholder="이메일을 추가해서 초대 메일을 전송하세요." title="추가 이메일" class="text1 type1" />
				<button type="button" class="b2 add button gray4">추가</button>
			</div>
			<div class="w1email">
				<!-- <span class="email">
					<span>aaasdfe@naver.com</span>
					<button type="button" class="b1 del-email">삭제</button>
				</span> -->
			</div>
		</div>
		<div class="w2">
			<button type="button" class="b3 button primary send-email">메일 전송</button>
		</div>
	</div>
	<!-- /cp3send1mail1 -->
</div>
<!-- /infomenu1 -->


<script>/*<![CDATA[*/
	//$(function(){

		/** ◇◆ 수강자 추가하기. 이메일 추가 삭제. 20210302. @m.
		 */
		(function(){
			var add = '.add-student'; // 수강자 추가하기
			var my = '.cp3send1mail1',
				w1email = '.w1email', // 이메일 래퍼
				email = '.email', // 이메일 항목
				b1del = '.b1.del-email', // 이메일 삭제 버튼
				text1 = '.text1', // 입력
				b2add = '.b2.add', // 추가 버튼
				b3send = '.send-email'; // 메일 전송

			// 초기화
			$(my).hide();

			// 수강자 추가하기 클릭
			$(add).on('click', function(e){
				$(this).hide();
				$(my).show();
			});

			// 미래 개별 삭제 클릭
			$(my).on('click', b1del, function(){
				if( confirm('삭제하시겠습니까?') ){
					$(this).closest(email).remove();
				}
			});

			// 미래 이메일 추가 클릭
			$(my).on('click', b2add, function(){
				var _html = '';
					_html += '<span class="email button">';
					_html += '	<span>'+ $(this).prevAll('.text1').val() +'</span>';
					_html += '	<button type="button" class="b1 del-email">삭제</button>';
					_html += '</span>';
				$(_html).appendTo( $(this).closest(my).find(w1email) );
			});

		})();

	//});
/*]]>*/</script>


<!-- bbs1table1 -->
<div class="bbs1table1">


	<!-- scroll-x-lt-large -->
	<div class="scroll-x-lt-large">
	<div style="min-width:580px;">

		<table class="t1 w100 tttac ttvam mgt0 fsxd lhD">
			<caption>
				<strong class="h1 blind">수강자 관리 목록</strong>
				<span class="summary1 blind">: 선택, 수강자명, 이메일, 최근 접속시간, 수강상태, 관리</span>
			</caption>
			<thead>
			<tr>
			<th scope="col" style="width:2em;">
				<span class="blind">선택</span>
				<input type="checkbox" name="★1checkbox0" id="★1checkbox0e0" title="전체선택" class="all" />
			</th>
			<th scope="col" style="width:5em;">
                <input type="hidden" id="sort_type_nickname" value="desc">
				<a href="javascript:void(0);" class="b1 sort" title="수강자명 오름차순/내림차순 정렬" onclick="sortStudent('nickname')">
					<span class="b1t1">수강자명</span>
					<i class="b1ic1">정렬</i>
				</a>
			</th>
			<th scope="col">
                <input type="hidden" id="sort_type_email" value="desc">
				<a href="javascript:void(0);" class="b1 sort" title="이메일 오름차순/내림차순 정렬" onclick="sortStudent('email')">
					<span class="b1t1">이메일</span>
					<i class="b1ic1">정렬</i>
				</a>
			</th>
			<th scope="col">
                <input type="hidden" id="sort_type_last_conn_at" value="desc">
				<a href="javascript:void(0);" class="b1 sort" title="최근 접속시간 오름차순/내림차순 정렬" onclick="sortStudent('last_conn_at')">
					<span class="b1t1">최근 접속시간</span>
					<i class="b1ic1">정렬</i>
				</a>
			</th>
			<th scope="col" class="tal">
				<div class="toggle1s1">
					<a href="javascript:void(0);" class="b1 filter toggle-b"><span class="b1t1">수강상태</span> <i class="b1ic1"></i></a>
					<div class="toggle-c addmenu">
						<a href="javascript:void(0);" class="a2" onclick="selectStudent('ready')">인증 대기중</a>
						<a href="javascript:void(0);" class="a2" onclick="selectStudent('active')">수강중</a>
						<a href="javascript:void(0);" class="a2" onclick="selectStudent('complete')">수강완료</a>
					</div>
				</div>
			</th>
			<th scope="col">관리</th>
			</tr>
			</thead>
			<tbody class="w1item" id="student_list">
            @if (count($studentInfoList) > 0)
                @foreach ($studentInfoList as $studentInfo)
                <tr class="item">
                    <td><input type="checkbox" name="★1checkbox1" title="선택" /></td>
                    <td>{{ $studentInfo->nickname }}</td>
                    <td>{{ $studentInfo->email }}</td>
                    <td>{{ date('Y/m/d H:i:s', strtotime($studentInfo->last_conn_at)) }}</td>
                    @php
                        $totalCnt = $studentInfo->total_cnt;
                        $completeCnt = $studentInfo->complete_cnt;
                    @endphp
                    @if ($studentInfo->status == 'ready')
                    <td class="tal">인증 대기중</td>
                    @elseif ($studentInfo->status == 'complete')
                    <td class="tal">수강 완료</td>
                    @else
                    <td class="tal">수강중 : {{ $completeCnt }}개 강의 수강 <em class="em">{{ round(($completeCnt / $totalCnt) * 100, 1) }}%</em></td>
                    @endif
                    <td>
                        <button type="button" class="b2 button small secondary del">삭제</button>
                    </td>
                </tr>
                @endforeach
            @endif
			</tbody>
		</table>
        <div id="no_result">
            @if (count($studentInfoList) == 0)
            <br>
            <span>현재 수강자가 없습니다.</span>
            <br><br>
            @endif
        </div>
	</div>
	</div>
	<!-- /scroll-x-lt-large -->


	<!-- infomenu1 -->
	<div class="infomenu1 mg0">
		<div class="left">
			<button type="button" class="button del-check">선택 삭제</button>
			<a href="?#★" class="button secondary export">파일 내보내기</a>
		</div>
		<div class="right">
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
	</div>
	<!-- /infomenu1 -->


</div>
<!-- /bbs1table1 -->


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
					$(my).find(ck).filter(':checked:not(".all")').closest(item).remove();
				}else{
					return false;
				}
			});

			// 미래 개별 삭제 클릭
			$(my).on('click', del, function(){
				if( confirm('삭제하시겠습니까?') ){
					// $(this).closest(item).remove();
				}
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
// 수강자 목록 정렬
function sortStudent(type) {

    // 오름차순, 내림차순 트리거
    if ($('#sort_type_' + type).val() == 'desc') {
        $('#sort_type_' + type).val('asc');
    } else {
        $('#sort_type_' + type).val('desc');
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('manage.lecture.student_management') }}",
        // contentType: false,
        // processData: false,
        data: {
            'lecture_idx': '{{ $_GET['idx'] }}',
            'type': type,
            'sort_type': $('#sort_type_' + type).val()
        },
        success: (data) => {
            if (data.status == 'success') {
                $('#student_list').empty().append(data.resData);

            } else {
                alert(data.msg);
            }
        },
        error: function(data) {
            console.log(data);
        }
    });
}

// 수강자 조건부 검색
function selectStudent(selectType) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('manage.lecture.student_management') }}",
        // contentType: false,
        // processData: false,
        data: {
            'lecture_idx': '{{ $_GET['idx'] }}',
            'select_type': selectType
        },
        success: (data) => {
            if (data.status == 'success') {

                if (data.resData.length == 0) {
                    $('#student_list').empty();
                    $('#no_result').empty().append('<br><span>현재 수강자가 없습니다.</span><br><br>');
                } else {
                    $('#student_list').empty().append(data.resData);
                }

            } else {
                alert(data.msg);
            }
        },
        error: function(data) {
            console.log(data);
        }
    });
}
</script>
@endsection
