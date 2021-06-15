<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210225 | @m | 요구반영. 결함개선. 고도화.
 * ~20210302~20210304 | @m |
 * 20210504 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 시험/과제 생성 및 수정')

@section('content')

<? $d1n = '2'; $d2n = '2'; // 1차2차활성 ?>

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
		<h2 class="h1">시험/과제 생성 및 수정</h2>
	</div>
	<div class="eg1">
		<a href="javascript:history.back();" class="b1 button">뒤로가기</a>
		<a href="?#★" class="b2 button primary">저장하기</a>
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


<h3 class="hb1 hb3 h4 mgt0">시험/과제 내용</h3>

<!-- panel1 -->
<div class="panel1">
<!-- write1form1 -->
<div class="write1form1">
	<div class="item">
		<div class="dt"><label for="★1subject">시험/과제 제목</label></div>
		<div class="dd">
			<input type="text" id="★1subject" value="" placeholder="제목을 입력하세요" class="w100" />
		</div>
	</div>
	<div class="item mw-radio1">
		<div class="dt"><span class="dpib">분류</span></div>
		<div class="dd">
			<span class="dpib mgr1em">
				<input type="radio" name="★1radio0" id="★1radio0e0" checked="checked" /><label for="★1radio0e0" class="form-static1">시험</label>
			</span>
			<span class="dpib">
				<input type="radio" name="★1radio0" id="★1radio0e1" /><label for="★1radio0e1" class="form-static1">과제</label>
			</span>
		</div>
	</div>
	<div class="item">
		<div class="dt"><span>시험/과제 내용</span></div>
		<div class="dd">
			<!-- cp1write1 -->
			<div class="cp1write1">
				<div class="editor">
					<div class="mgt3em mgb3em tac">개발자 온라인 웹문서 편집기 처리 필요!</div>
				</div>
			</div>
			<!-- /cp1write1 -->
		</div>
	</div>
	<div class="item">
		<div class="dt"><label for="★1file0">첨부파일</label></div>
		<div class="dd">
			<input type="file" id="★1file0" />
			<ul class="bi1 m0 fsS1 op06">
				<li class="li1 mg0">최대 용량 2MB</li>
			</ul>
		</div>
	</div>
</div>
<!-- /write1form1 -->
</div>
<!-- /panel1 -->


<h3 class="hb1 hb3 h4 mgt0">제출 설정</h3>


<!-- panel1 -->
<div class="panel1">
<!-- write1form1 -->
<div class="write1form1">
	<div class="item">
		<div class="dt"><span>시작 일시</span></div>
		<div class="dd">
			<input type="text" value="시간 제한 없음" title="시작 일" />
			<select title="시작 시" class="type1">
				<option value="">24시</option>
			</select>
			<select title="시작 분" class="type1">
				<option value="">00분</option>
			</select>
		</div>
	</div>
	<div class="item">
		<div class="dt"><span>종료 일시</span></div>
		<div class="dd">
			<input type="text" value="시간 제한 없음" title="시작 일" />
			<select title="종료 시" class="type1">
				<option value="">24시</option>
			</select>
			<select title="종료 분" class="type1">
				<option value="">00분</option>
			</select>
		</div>
	</div>
	<!-- <div class="item">
		<div class="dt"><span class="dpib">채점 방식</span></div>
		<div class="dd">
			<span class="dpib mgr1em">
				<input type="radio" name="★1radio1" id="★1radio1e0" /><label for="★1radio1e0" class="form-static1 mgr025em">사용함</label>
				<span class="bi1 dpib fsS1 vam">
					<a href="#?" class="li1 tooltip1">
						<span class="tooltip1c w14em">
							과제 : 파일첨부하여 피드백<br />
							시험 : 자동채점<br />
						</span>
					</a>
				</span>
			</span>
			<span class="dpib">
				<input type="radio" name="★1radio1" id="★1radio1e1" /><label for="★1radio1e1" class="form-static1">사용 안함</label>
			</span>
		</div>
	</div> -->
</div>
<!-- /write1form1 -->
</div>
<!-- /panel1 -->


<!-- cp3exam1set1 -->
<div class="cp3exam1set1">

	<h3 class="hb1 hb3 h4">시험 설정</h3>

	<!-- panel1 -->
	<div class="panel1">
	<!-- write1form1 -->
	<div class="write1form1">
		<div class="item">
			<div class="dt"><span class="dpib">시험 시간 제한</span></div>
			<div class="dd">
				<span class="dpib mgr1em">
					<input type="radio" name="★1radio2" id="★1radio2e0" checked="checked" /><label for="★1radio2e0" class="form-static1">사용안함</label>
				</span>
				<span class="dpib">
					<input type="radio" name="★1radio2" id="★1radio2e1" /><label for="★1radio2e1" class="form-static1 mgr05em">사용함</label>
					<span class="dpib">
						<input type="text" id="★1exam1time1" value="" title="시험 시간 (분)" size="4" maxlength="4" class="tar" /> <label for="★1exam1time1">분</label>
					</span>
				</span>
			</div>
		</div>
		<div class="item">
			<div class="dt"><span>추가된 문제</span></div>
			<div class="dd">

				<!-- bbs1table1 -->
				<div class="bbs1table1">

					<!-- infomenu1 -->
					<div class="infomenu1 mg0">
						<div class="left">
							<button type="button" class="b1 add button gray4 mgr075em">+ 문제 추가</button>
						</div>
						<div class="right">
							<span class="dpib">
								<span class="dpib vam">총점 :</span>
								<input type="text" value="70" placeholder="총점" title="총점" size="4" maxlength="4" class="text1total tac" />
							</span>
						</div>
					</div>
					<!-- /infomenu1 -->

					<table class="t1 tlf w100 tttac ttvam fsxd lhD">
						<caption>
							<strong class="h1 blind">시험/과제 관리 목록</strong>
							<span class="summary1 blind">: 순서이동, 제목, 점수, 관리</span>
						</caption>
						<thead>
						<tr>
						<th scope="col" style="width:1em;"><span class="blind">순서이동</span></th>
						<th scope="col" style="width:auto;" class="tal">제목</th>
						<th scope="col" style="width:2em;">점수</th>
						<th scope="col" style="width:4em;">관리</th>
						</tr>
						</thead>
						<tbody class="w1item">
						<tr class="item">
						<td><div class="control move" title="끌어서 놓기로 순서 이동"></div></td>
						<td class="tal">엑셀 시험 문항 01</td>
						<td>10</td>
						<td>
							<button type="button" class="b2 del button secondary small">삭제</button>
						</td>
						</tr>
						<tr class="item">
						<td><div class="control move" title="끌어서 놓기로 순서 이동"></div></td>
						<td class="tal">문제 제목이 표시됩니다.</td>
						<td>10</td>
						<td>
							<button type="button" class="b2 del button secondary small">삭제</button>
						</td>
						</tr>
						<tr class="item">
						<td><div class="control move" title="끌어서 놓기로 순서 이동"></div></td>
						<td class="tal">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</td>
						<td>10</td>
						<td>
							<button type="button" class="b2 del button secondary small">삭제</button>
						</td>
						</tr>
						</tbody>
					</table>

				</div>
				<!-- /bbs1table1 -->

				<!-- w1question1write1 -->
				<div class="w1question1write1">
					<select title="문제 선택" class="select1question type1 w100">
						<option value="">문제 선택</option>
						<option value="1">문제 제목 일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</option>
						<option value="2">문제 제목 이삼사오륙칠팔구십일이삼사오륙칠팔구십</option>
						<option value="3">문제 제목 삼사오륙칠팔구십일이삼사오륙칠팔구십</option>
						<option value="4">문제 제목 사오륙칠팔구십일이삼사오륙칠팔구십</option>
						<option value="5">문제 제목 오륙칠팔구십일이삼사오륙칠팔구십</option>
					</select>
					<input type="text" value="" placeholder="점수 입력" title="점수" size="4" maxlength="4" class="text1score tac w6em" />
					<button type="button" class="b3 add2 button secondary mgr075em">추가</button>
				</div>
				<!-- /w1question1write1 -->

			</div>
		</div>
	</div>
	<!-- /write1form1 -->
	</div>
	<!-- /panel1 -->


</div>
<!-- /cp3exam1set1 -->


<script>/*<![CDATA[*/
	$(function(){


		/** ◇◆ 분류에서 시험을 선택했을 때만 활성화. 20210226. @m.
		 */
		(function(){
			var my = '.mw-radio1', // 래퍼
				rdo = 'input[type="radio"]', // 라디오
				you = '.cp3exam1set1'; // 대상

			// 대상 동작
			function doYou(b){
				if(b){
					$(you).show();
				}else{
					$(you).hide();
				}
			}

			// 분류 라디오 체인지
			$(my).on('change', rdo, function(){
				var $rdo1 = $(this).closest(my).find(rdo).eq(0); // 첫번째 라디오
				var chk = $rdo1.prop('checked'); // 분류 시험 체크 유무
				doYou( chk );
			});

		})();


		/** ◇◆ 시험 설정. 문제 추가. 삭제. 20210302. @m.
		 */
		(function(){
			var my = '.cp3exam1set1', // 시험 설정 래퍼
				w1item = '.w1item', // 항목 래퍼
				w1qw = '.w1question1write1', // 문제 추가 폼 래퍼
				add = '.add', // 문제 추가 버튼
				item = '.item', // 항목
				question = '.select1question', // 문제 선택
				score = '.text1score', // 점수
				add2 = '.add2', // 추가 버튼
				del = '.del'; // 삭제

			// 문제 추가 버튼 클릭
			$(my).find(w1qw).hide(); // 초기 감춤
			$(my).on('click', add, function(){
				$(my).find(w1qw).show().find('select').focus(); // 시험 설정 활성 초점
			});

			// 추가 버튼 클릭
			$(my).on('click', add2, function(){
				var $opt = $(my).find(question + ' option:selected'),
					$score = $(my).find(score);

				if( !$opt.val() || !$score.val() ){
					alert('문제 선택 및 점수 입력을 해주세요!');
					$(my).find(question).focus();
					return false;
				}

				var _item = ''; // 항목 태그
					_item += '<tr class="item">';
					_item += '<td><div class="control move" title="끌어서 놓기로 순서 이동"></div></td>';
					_item += '<td class="tal">' + $opt.text() + '</td>';
					_item += '<td>'+ $score.val() +'</td>';
					_item += '<td>';
					_item += '	<button type="button" class="b2 del button secondary small">삭제</button>';
					_item += '</td>';
					_item += '</tr>';

				$(_item).appendTo( $(this).closest(my).find(w1item) );

				//$(my).find(w1qw).hide(); // 시험 설정 비활성

			});

			// 미래 삭제 클릭
			$(my).on('click', del, function(){
				if( confirm('삭제하시겠습니까?') ){
					$(this).closest(item).remove();
				}
			});

		})();


		/** ◇◆ 드래그앤드롭(마우스+터치) 순서이동. 20210226. @m.
		 * [IE9+]
		 * Use) makeDrag1('.cp3exam1set1');
		 */

		// 호출
		makeDrag1('.cp3exam1set1');

		// 드래그앤드롭 만들기
		function makeDrag1(selector){
			var sy = ey = 0;
			var my = selector,
				item = '.item',
				mv = '.control.move';

			// 미래 요소 이벤트 연결
			// $(document).on('mousedown touchstart', mv, function(e){}); 이건 모바일 결함 있어 아래처럼 수정
			$(my).on('mousedown touchstart', mv, function(e){
				e.preventDefault(); // img 등 'mousedown' 동작 끊김 방지
				doDragDrop(e, $(this).closest(item));
			});

			// 드래그앤드롭 동작
			function doDragDrop(e, $c){
				if(e.originalEvent.touches || e.originalEvent.changedTouches){ // 터치 있으면
					var e = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0]; // 싱글 터치
				}else{
					var e = e || window.event;
				}
				sy = e.clientY;

				//console.log(e.type, $c.index(), sy);

				$(document).on('mouseup touchend', function(e){
					doDrop(e, $c);
				});
				$(document).on('mousemove touchmove', function(e){
					doDrag(e, $c);
				});
			}

			// 드래그 동작
			function doDrag(e, $c){
				if(e.originalEvent.touches || e.originalEvent.changedTouches){ // 터치 있으면
					var e = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0]; // 싱글 터치
				}else{
					var e = e || window.event;
				}
				ey = e.clientY - sy;
				$c.css({
					zIndex: '1',
					transform: 'translateY(' + ey + 'px)'
				});
			}

			// 드롭 동작 (순서변경)
			function doDrop(e, $c){
				$(document).off('mouseup mousemove touchend touchmove');

				//var $cs = $c.closest('.w1item').children();
				var $cs = $c.parent().children();
				var ofs = {
					zIndex: '',
					transform: 'none'
				};

				if( $c.position().top > $cs.last().position().top ){
					$cs.last().after( $c );
				}else{
					for(var i = 0; i < $cs.length; i++){
						if( $c.position().top < $cs.eq(i).position().top ){
							$cs.eq(i).before( $c );
							break;
						}
					}
				}
				$c.css(ofs);
			}
		}


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
