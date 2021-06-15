<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210225 | @m | 요구반영. 결함개선. 고도화.
 * ~20210225 | @m |
 * 20210506 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 시험 제출 현황')

@section('content')

<? $d1n = '2'; $d2n = '2'; // 1차2차활성 ?>
<? $type = $_GET['type'] ?>

<!--  -->

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
		<h2 class="h1">@if ($type == 'exam') 시험 @elseif ($type == 'task') 과제 @endif 제출 현황</h2>
	</div>
	<div class="eg1">
		<a href="javascript:history.back();" class="b1 button">뒤로가기</a>
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


<!-- cp3submission1 -->
<div class="cp3submission1">

	<div class="hg1">
		<h3 class="h1">시험 또는 과제 제목이 출력됩니다.</h3>
	</div>

	<!-- even-grid -->
	<div class="even-grid float-left gap4pct vgap00">
		<div class="small-12 large-3 column">


			<div class="status">
				<strong class="tt1">전체 현황보기</strong>
				<ul class="lst1">
					<li class="li1 on"><a class="a1">제출됨(28/30)</a></li>
					<li class="li1"><a class="a1">미제출(2/30)</a></li>
				</ul>
				<ul class="lst1">
					<li class="li1"><a class="a1">채점완료(28/30)</a></li>
					<li class="li1"><a class="a1">미채점(0/30)</a></li>
				</ul>
			</div>


		</div>
		<div class="small-12 large-9 column">


			<!-- scroll-x-lt-large -->
			<div class="scroll-x-lt-large">
			<div style="min-width:360px;">

				<!-- bbs1table1 -->
				<div class="bbs1table1">
					<table class="t1 w100 ttpdlr2pct tttac ttvam mgt0 fsxd lhD">
						<caption>
							<strong class="h1 blind">@if ($type == 'exam') 시험 @elseif ($type == 'task') 과제 @endif 제출 현황</strong>
							<span class="summary1 blind">: 수강자명, 제출 시간, 상태, 관리</span>
						</caption>
						<thead>
						<tr>
						<th scope="col" style="width:auto;" class="tal">수강자명</th>
						<th scope="col" style="width:auto;">제출 시간</th>
						<th scope="col" style="width:auto;">상태</th>
						<th scope="col" style="width:auto;">관리</th>
						</tr>
						</thead>
						<tbody>
						<tr>
						<td class="tal">김두런(dolearn1@dataedu.kr)</td>
						<td>2021.02.25 15:00</td>
						<td>
                            {{-- 제출, 채점 여부에 따른 분기 필요 --}}
							<i class="label1 bgc-danger">미제출</i>
							<i class="label1 bgc-danger">미채점</i>
						</td>
                        @if ($type == 'exam')
                        <td></td>
                        @elseif ($type == 'task')
						<td>
              <a href="?#★" class="button ic1t1 small"><i class="ic1 download"></i> <span class="t1">제출파일</span></a>
							<!-- cp3upload1 -->
							<span class="cp3upload1">
								<label for="★1file1" class="button ic1t1 small"><i class="ic1 upload"></i> <span class="t1">피드백</span></label>
								<span class="w1file">
									<input type="file" id="★1file1" class="file" />
									<input type="text" value="" title="업로드 파일명" class="file" />
									<button type="button" class="b1 del">파일 지우기</button>
								</span>
							</span>
							<!-- /cp3upload1 -->
						</td>
                        @endif
						</tr>
						<tr>
						<td class="tal">이두런(dolearn1@dataedu.kr)</td>
						<td>2021.02.25 15:00</td>
						<td>
							<i class="label1 bgc-danger">미제출</i>
							<i class="label1 bgc-danger">미채점</i>
						</td>
						@if ($type == 'exam')
                        <td></td>
                        @elseif ($type == 'task')
						<td>
              <a href="?#★" class="button ic1t1 small"><i class="ic1 download"></i> <span class="t1">제출파일</span></a>
							<!-- cp3upload1 -->
							<span class="cp3upload1">
								<label for="★1file2" class="button ic1t1 small"><i class="ic1 upload"></i> <span class="t1">피드백</span></label>
								<span class="w1file">
									<input type="file" id="★1file2" class="file" />
									<input type="text" value="" title="업로드 파일명" class="file" />
									<button type="button" class="b1 del">파일 지우기</button>
								</span>
							</span>
							<!-- /cp3upload1 -->
						</td>
                        @endif
						</tr>
						<tr>
						<td class="tal">박두런(dolearn1@dataedu.kr)</td>
						<td>2021.02.25 15:00</td>
						<td>
							<i class="label1 bgc-secondary">제출됨</i>
							<i class="label1 bgc-secondary">채점완료</i>
						</td>
                        @if ($type == 'exam')
						<td>
							<button type="button" class="b2result1 button small">결과보기</button>
						</td>
                        @elseif ($type == 'task')
						<td>
              <a href="?#★" class="button ic1t1 small"><i class="ic1 download"></i> <span class="t1">제출파일</span></a>
							<!-- cp3upload1 -->
							<span class="cp3upload1">
								<label for="★1file3" class="button ic1t1 small"><i class="ic1 upload"></i> <span class="t1">피드백</span></label>
								<span class="w1file">
									<input type="file" id="★1file3" class="file" />
									<input type="text" value="" title="업로드 파일명" class="file" />
									<button type="button" class="b1 del">파일 지우기</button>
								</span>
							</span>
							<!-- /cp3upload1 -->
						</td>
                        @endif
						</tr>
						<tr>
						<td class="tal">최두런(dolearn1@dataedu.kr)</td>
						<td>2021.02.25 15:00</td>
						<td>
							<i class="label1 bgc-secondary">제출됨</i>
							<i class="label1 bgc-secondary">채점완료</i>
						</td>
                        @if ($type == 'exam')
						<td>
							<button type="button" class="b2result1 button small">결과보기</button>
						</td>

                        @elseif ($type == 'task')
						<td>
              <a href="?#★" class="button ic1t1 small"><i class="ic1 download"></i> <span class="t1">제출파일</span></a>
							<!-- cp3upload1 -->
							<span class="cp3upload1">
								<label for="★1file4" class="button ic1t1 small"><i class="ic1 upload"></i> <span class="t1">피드백</span></label>
								<span class="w1file">
									<input type="file" id="★1file4" class="file" />
									<input type="text" value="" title="업로드 파일명" class="file" />
									<button type="button" class="b1 del">파일 지우기</button>
								</span>
							</span>
							<!-- /cp3upload1 -->
						</td>
                        @endif
						</tr>
						</tbody>
					</table>
				</div>
				<!-- /bbs1table1 -->

			</div>
			</div>
			<!-- /scroll-x-lt-large -->


			<script>/*<![CDATA[*/
				//$(function(){
					/** ◇◆ 멀티업로드 input[type='file'] 고도화. 20210506. @m.
					 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 고도화 필요!
					 */
					(function(){
						var $my = $('.cp3upload1');

						$my.each(function(){
							var $this = $(this),
								$file = $('[type="file"]', $this),
								$text = $('[type="text"]', $this),
								$del = $('.b1.del', $this);

							// 초기 호출
							isVal();

							// 파일값 동기화
							$file.on('change', function(){
								$text.val( getFileName( $file.val() ) );
								isVal();
							});

							// 파일 지우기
							$del.on('click', function(e){
								e.preventDefault();
								$file.val('').triggerHandler('change'); // triggerHandler() 강제
								$text.val('');
							});

							// 파일명.확장자 만 추출
							function getFileName(v){
								var arr = v.split("\\"); // 로컬경로는 / 아닌 \ 로 분리
								return arr[arr.length-1]; // 배열의 맨 끝이 파일명
							}

							// 파일값 유무 구분
							function isVal(){
								//console.log( !!$file.val() );
								if( !$file.val() ){ // 값 없으면
									$this.addClass('off');
								}else{
									$this.removeClass('off');
								}
							}

						});

					})();
				//});
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
	</div>
	<!-- /even-grid -->

</div>
<!-- /cp3submission1 -->


<!-- 위 [결과보기] 버튼을 클릭하면 목록 아래에 상세내용이 보여집니다. -->


<!-- cp2score1 -->
<div class="cp2score1 mgt3em">
	<div class="hg1">
		<span class="tt1">정답 수 : 5/15</span>
		<span class="tt2">총 점수 : 40/100</span>
	</div>
	<ul class="lst1 clb">
		<li class="li1">
			<div class="w1">
				<div class="tg1">
					<span class="t1">Q1. 다음 4가지 보기 중 정답을 선택하세요?</span>
					<!-- t2 상태: 정답 s1 | 오답 s2 -->
					<span class="t2 s1"><i class="t2ic1"></i><span class="t2t1">20점</span></span>
				</div>
				<div class="w2">
					<div class="w2w1">
						<div class="tg2">
							<span class="t3">선택한 답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg3">
							<span class="t3">정답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg5">
							<span class="t3">해설</span>
							<div class="t4">
								강사가 입력한 문제해설이 보여지는 영역입니다.<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십<br />
							</div>
						</div>
					</div>
					<div class="w2w2">
						<div class="tg4">
							<span class="t5">정답률</span>
							<span class="t6">77%</span>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="tg1">
					<span class="t1">Q2. 다음 4가지 보기 중 정답을 선택하세요? 일이삼사오륙</span>
					<span class="t2 s2"><i class="t2ic1"></i><span class="t2t1">0점</span></span>
				</div>
				<div class="w2">
					<div class="w2w1">
						<div class="tg2">
							<span class="t3">선택한 답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg3">
							<span class="t3">정답</span>
							<span class="t4">④ 네번째 보기</span>
						</div>
						<div class="tg5">
							<span class="t3">해설</span>
							<div class="t4">
								강사가 입력한 문제해설이 보여지는 영역입니다.<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십<br />
							</div>
						</div>
					</div>
					<div class="w2w2">
						<div class="tg4">
							<span class="t5">정답률</span>
							<span class="t6">33.3%</span>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="tg1">
					<span class="t1">Q3. 다음 4가지 보기 중 정답을 선택하세요?</span>
					<span class="t2 s1"><i class="t2ic1"></i><span class="t2t1">20점</span></span>
				</div>
				<div class="w2">
					<div class="w2w1">
						<div class="tg2">
							<span class="t3">선택한 답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg3">
							<span class="t3">정답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg5">
							<span class="t3">해설</span>
							<div class="t4">
								강사가 입력한 문제해설이 보여지는 영역입니다.<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십<br />
							</div>
						</div>
					</div>
					<div class="w2w2">
						<div class="tg4">
							<span class="t5">정답률</span>
							<span class="t6">77%</span>
						</div>
					</div>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="w1">
				<div class="tg1">
					<span class="t1">Q4. 다음 4가지 보기 중 정답을 선택하세요? 일이삼사오륙</span>
					<span class="t2 s2"><i class="t2ic1"></i><span class="t2t1">0점</span></span>
				</div>
				<div class="w2">
					<div class="w2w1">
						<div class="tg2">
							<span class="t3">선택한 답</span>
							<span class="t4">③ 세번째 보기</span>
						</div>
						<div class="tg3">
							<span class="t3">정답</span>
							<span class="t4">④ 네번째 보기</span>
						</div>
						<div class="tg5">
							<span class="t3">해설</span>
							<div class="t4">
								강사가 입력한 문제해설이 보여지는 영역입니다.<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십일이삼사오육칠팔구십<br />
								일이삼사오육칠팔구십<br />
							</div>
						</div>
					</div>
					<div class="w2w2">
						<div class="tg4">
							<span class="t5">정답률</span>
							<span class="t6">33.3%</span>
						</div>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<!-- /cp2score1 -->


<script>/*<![CDATA[*/
	//$(function(){
		/** ◇◆ 결과보기 클릭 동작. 20210506. @m.
		 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 고도화 필요!
		 */
		(function(){
			var $it = $('.cp2score1');
			$it.hide();
			$('.b2result1').on('click', function(){
				$it.fadeIn();
				smoothScrollTop($it.offset().top, -120);
			});
		})();
	//});
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
