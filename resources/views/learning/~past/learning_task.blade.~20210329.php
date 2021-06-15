<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210120 | @m | 요구반영. 결함개선. 고도화.
 * ~20210128~20210219 | @m |
 */
-->
@extends('master_learning')

@section('title', '강좌학습 - 과제강의')

@section('content')

<? $d1n = '1'; // 1차활성 ?>

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp2task1 -->
<div class="cp2task1">
	<div class="tg1">
		<strong class="t1">1차과제 - 함수 실습 후 파일 제출하기</strong>
		<span class="eg1">
			<span class="st1"><i class="ic1 time"></i> <span class="t1">마감 기한 없음</span></span>
		</span>
	</div>
	<div class="tg2">
		<div class="t2">
			첫번째 과제 입니다.<br />
			예제 파일을 첨부했으니, chap1. 엑셀 다루기에서 배웠던 함수들을 가지고 실습을 해보세요~<br />
		</div>
	</div>
</div>
<!-- /cp2task1 -->


<!-- cp2attach1 -->
<div class="cp2attach1">
	<div class="w1">
		<div class="w1w1">
			<span class="tt1">첨부파일 7개</span>
		</div>
		<div class="w1w2">
			<a href="?#★" class="b1 button t1ic1"><span class="t1">파일명_20201129.pdf</span> <i class="ic1 download"></i></a>
			<a href="?#★" class="b1 button t1ic1"><span class="t1">파일명_20210126.pdf</span> <i class="ic1 download"></i></a>
			<a href="?#★" class="b1 button t1ic1"><span class="t1">파일명_20210126.pdf</span> <i class="ic1 download"></i></a>
			<a href="?#★" class="b1 button t1ic1"><span class="t1">파일명_20210126.pdf</span> <i class="ic1 download"></i></a>
			<a href="?#★" class="b1 button t1ic1"><span class="t1">파일명_20210126.pdf</span> <i class="ic1 download"></i></a>
			<a href="?#★" class="b1 button t1ic1"><span class="t1">파일명_20210126.pdf</span> <i class="ic1 download"></i></a>
			<a href="?#★" class="b1 button t1ic1"><span class="t1">파일명_20210126.pdf</span> <i class="ic1 download"></i></a>
		</div>
	</div>
</div>
<!-- /cp2attach1 -->


<!-- cp2view2 -->
<div class="cp2view2">
	<!-- even-grid -->
	<div class="even-grid float-left gap2pct">
		<div class="small-6 column">
		</div>
		<div class="small-6 column tar">
			<div class="eg1">
				<a href="#★" class="cp2like1"><span class="cp2like1t1">좋아요</span> <span class="cp2like1t2">1개</span></a>
				<!-- cp2menu1 -->
				<div class="cp2menu1 toggle1s1">
					<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp2menu1c toggle-c">
						<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
					</div>
				</div>
				<!-- /cp2menu1 -->
			</div>
		</div>
	</div>
	<!-- /even-grid -->
</div>
<!-- /cp2view2 -->


<h3 class="hb1 h3">과제 파일 제출</h3>


<!-- form -->
<form action="?#★" name="uploadForm" id="uploadForm" enctype="multipart/form-data" method="post">

	<!-- cp2submit1 -->
	<div class="cp2submit1">

		<table class="table">
			<caption>
				<strong class="h1 blind">과제 파일 제출</strong>
				<!-- <span class="summary1 blind">: ★표요약, 구조, 탐색방법</span> -->
			</caption>
			<thead>
			<tr>
			<th scope="col">파일명</th>
			<th scope="col">마지막 수정일</th>
			<th scope="col">피드백</th>
			</tr>
			</thead>
			<tbody id="fileTableTbody">
			<!-- <tr>
			<th scope="row">파일명_20201129.pdf</th>
			<td>2021.01.28</td>
			<td>-</td>
			</tr> -->
			</tbody>
		</table>

		<div class="cp2dropzone1" id="dropZone">
			<i class="ic1"></i>
			<div class="t1">
				여기에 파일을 끌어서 놓으세요.<br />
			</div>
		</div>

		<input type="file" id="★examplePasswordInput" title="첨부파일" />

	</div>
	<!-- /cp2submit1 -->


	<div class="tac">
		<button type="submit" class="button primary1 large w17em" onclick="uploadFile(); return false;">과제 제출하기</button>
	</div>
</form>
<!-- /form -->


<script>/*<![CDATA[*/

	/** ◇◆ 드래그앱드롭파일업로드. 20210128. 20210219 (( @w
	 * 샘플코드입니다. 개발자 수정 처리 필요!
	 */
	//(function(){ // 생성된 삭제 버튼에서.. deleteFile() 호출위해 주석처리. 차후 고도화 필요!

		var fileIndex = 0; // 파일 리스트 번호
		var totalFileSize = 0; // 등록할 전체 파일 사이즈
		var fileList = new Array(); // 파일 리스트
		var fileSizeList = new Array(); // 파일 사이즈 리스트
		var fileLastDateList = new Array(); // 마지막 수정일
		var uploadSize = 50; // 등록 가능한 파일 사이즈 MB
		var maxUploadSize = 500; // 등록 가능한 총 파일 사이즈 MB

		var $w = $('.cp2submit1'); // 래퍼
		var $ufl = $('#fileTableTbody'); // 업로드할 파일 래퍼
		var $dz = $('#dropZone'); // 드롭존

		$(function(){
			fileDropDown(); // 호출
		});

		// 파일 드롭 다운
		function fileDropDown(){
			var dropZone = $dz; // 드롭존
			//Drag기능
			dropZone.on('dragenter',function(e){
				e.stopPropagation();
				e.preventDefault();
				dropZone.css('background-color','#e4f4fc');
			});
			dropZone.on('dragleave',function(e){
				e.stopPropagation();
				e.preventDefault();
				dropZone.css('background-color','');
			});
			dropZone.on('dragover',function(e){
				e.stopPropagation();
				e.preventDefault();
				dropZone.css('background-color','#e4f4fc');
			});
			dropZone.on('drop',function(e){
				e.preventDefault();
				dropZone.css('background-color','');

				var files = e.originalEvent.dataTransfer.files;

				if(files != null){
					if(files.length < 1){
						alert("폴더 업로드 불가");
						return;
					}
					// 1개 제한 @m
					if(files.length != 1){
						alert("첨부파일 개수는 1개로 제한합니다.");
						return;
					}
					selectFile(files);
				}else{
					alert("ERROR");
				}
			});
		}

		// 파일 선택시
		function selectFile(files){
			// 다중파일 등록
			if(files != null){
				for(var i = 0; i < files.length; i++){
					var fileName = files[i].name; // 파일 이름
					var fileNameArr = fileName.split("\.");
					var ext = fileNameArr[fileNameArr.length - 1]; // 확장자
					var fileSize = files[i].size / 1024 / 1024; // 파일 사이즈(단위 :MB)
					var d = files[i].lastModifiedDate; // 마지막 수정일 @m
					d = d.getFullYear() + '.' + num2d((d.getMonth() + 1)) + '.' + num2d(d.getDate()) + ' ' + num2d(d.getHours()) + ':' + num2d(d.getMinutes()) + ':' + num2d(d.getSeconds());
					//console.log( d );
					fileLastDate = d;

					if($.inArray(ext, ['exe', 'bat', 'sh', 'java', 'jsp', 'html', 'js', 'css', 'xml']) >= 0){ // 확장자 체크
						alert("등록 불가 확장자");
						break;
					}else if(fileSize > uploadSize){ // 파일 사이즈 체크
						alert("용량 초과\n업로드 가능 용량 : " + uploadSize + " MB");
						break;
					}else{
						totalFileSize += fileSize; // 전체 파일 사이즈
						fileList[fileIndex] = files[i]; // 파일 배열에 넣기
						fileSizeList[fileIndex] = fileSize; // 파일 사이즈 배열에 넣기
						fileLastDateList[fileIndex] = fileLastDate; // 마지막 수정일 배열에 넣기 @m
						addFileList(fileIndex, fileName, fileSize, fileLastDate); // 호출) 업로드 파일 목록 생성
						fileIndex++; // 파일 번호 증가
					}
				}
			}else{
				alert("ERROR");
			}
		}

		// 2자리수 만들기
		function num2d(n){
			var n = ( n < 10 )? '0' + n: n;
			return n;
		}

		// 업로드 파일 목록 생성
		function addFileList(fIndex, fileName, fileSize, fileLastDate){
			var html = '';
			html += '<tr id="fileTr_' + fIndex + '">';
			//html += '<th scope="row">' + fileName +'('+ fileSize +'MB)' + '</th>';
			html += '<th scope="row"><span class="t1">' + fileName + '</span> <a href="#" onclick="deleteFile(' + fIndex + '); return false;" class="b1 button default small">삭제</a></th>';
			html += '<td>' + fileLastDate + '</td>';
			html += '<td></td>';
			html += '</tr>';
			$ufl.append(html);

			$w.addClass('has-c'); // @m. 자식 있음 클래스 추가
		}

		// 업로드 파일 삭제
		function deleteFile(fIndex){
			totalFileSize -= fileSizeList[fIndex]; // 전체 파일 사이즈 수정
			delete fileList[fIndex]; // 파일 배열에서 삭제
			delete fileSizeList[fIndex]; // 파일 사이즈 배열 삭제
			$("#fileTr_" + fIndex).remove(); // 업로드 파일 테이블 목록에서 삭제

			$w.removeClass('has-c'); // @m. 자식 있음 클래스 제거
		}

		// 파일 등록
		function uploadFile(){
			var uploadFileList = Object.keys(fileList); // 등록할 파일 리스트
			if(uploadFileList.length == 0){ // 파일이 있는지 체크
				alert("파일이 없습니다."); // 파일등록 경고창
				return;
			}

			// 용량을 maxUploadSize MB를 넘을 경우 업로드 불가
			if(totalFileSize > maxUploadSize){
				alert("총 용량 초과\n총 업로드 가능 용량 : " + maxUploadSize + " MB");	// 파일 사이즈 초과 경고창
				return;
			}

			if(confirm("등록 하시겠습니까?")){
				// 등록할 파일 리스트를 formData로 데이터 입력
				var form = $('#uploadForm');
				var formData = new FormData(form);
				for(var i = 0; i < uploadFileList.length; i++){
					formData.append('files', fileList[uploadFileList[i]]);
				}

				$.ajax({
					url:"업로드 경로",
					data:formData,
					type:'POST',
					enctype:'multipart/form-data',
					processData:false,
					contentType:false,
					dataType:'json',
					cache:false,
					success:function(result){
						if(result.data.length > 0){
							alert("성공");
							location.reload();
						}else{
							alert("실패");
							location.reload();
						}
					}
				});
			}
		}

	//})();
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /#body -->
<!-- #aside -->
<div id="aside" tabindex="-1">
<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">목차</h2>
	<a href="?#★" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">

@include('learning.inc_info')
@include('learning.inc_list')

</div>
<!-- /aside_content -->
</div>
<!-- /#aside -->
@endsection
