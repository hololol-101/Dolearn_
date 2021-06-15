<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210224 | @m | 요구반영. 결함개선. 고도화.
 * ~20210302~20210304 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 문제 수정')

@section('content')

<? $d1n = '2'; $d2n = '1'; // 1차2차활성 ?>

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
		<h2 class="h1">문제 관리</h2>
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


<h3 class="hb1 hb3 h4 mgt0">문제 수정</h3>


<!-- panel1 -->
<div class="panel1">
<!-- write1form1 -->
<div class="write1form1">
	<div class="item">
		<div class="dt"><label for="★1subject">문제 제목</label></div>
		<div class="dd">
			<input type="text" id="★1subject" value="[강좌제목] 1차 시험 문항" class="w100" />
		</div>
	</div>
	<div class="item">
		<div class="dt"><span>문제 내용</span></div>
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
</div>
<!-- /write1form1 -->
</div>
<!-- /panel1 -->


<h3 class="hb1 hb3 h4">문제</h3>


<!-- panel1 w1cp2question1 -->
<div class="panel1 w1cp2question1">
<!-- write1form1 -->
<div class="write1form1">
	<div class="item">
		<div class="dt"><span>선택지</span></div>
		<div class="dd">
			<div>
				<button type="button" class="b1 add button gray4 mgr075em">선택지 추가</button>
				<ul class="bi1 dpib fsS1 vam op06">
					<li class="li1 mg0">최대 4개까지</li>
				</ul>
			</div>
			<!-- cp2question1 type2 -->
			<div class="cp2question1 type2">
				<ul class="lst1">
					<li class="li1">
						<div class="w1">
							<ol class="lst2">
								<li class="li2">
									<span class="a1">
										<input type="text" value="" placeholder="선택지 보기를 작성하세요." title="선택지 보기" class="text" />
									</span>
									<button type="button" class="b2 del button secondary small">삭제</button>
								</li>
								<li class="li2">
									<span class="a1">
										<input type="text" value="" placeholder="선택지 보기를 작성하세요." title="선택지 보기" class="text" />
									</span>
									<button type="button" class="b2 del button secondary small">삭제</button>
								</li>
								<!-- <li class="li2">
									<span class="a1">
										<input type="text" value="" placeholder="선택지 보기를 작성하세요." title="선택지 보기" class="text" />
									</span>
									<button type="button" class="b2 del button secondary small">삭제</button>
								</li>
								<li class="li2">
									<span class="a1">
										<input type="text" value="" placeholder="선택지 보기를 작성하세요." title="선택지 보기" class="text" />
									</span>
									<button type="button" class="b2 del button secondary small">삭제</button>
								</li> -->
							</ol>
						</div>
					</li>
				</ul>
			</div>
			<!-- /cp2question1 -->
		</div>
	</div>
	<div class="item">
		<div class="dt"><label for="★1answer">정답</label></div>
		<div class="dd">
			<input type="text" id="★1answer" value="1" class="w100" />
			<ul class="bi1 mgt0 fsS1 op06">
				<li class="li1 mg0">정답이 여러개 일 경우 (,)를 입력하여 구분해주세요. ex) 1,2</li>
			</ul>
		</div>
	</div>
	<div class="item">
		<div class="dt"><span>정답 해설</span></div>
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
</div>
<!-- /write1form1 -->
</div>
<!-- /panel1 w1cp2question1 -->


<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 선택지. 추가.삭제. 20210302. @m.
		 */
		(function(){
			var my = '.w1cp2question1', // 선택지 래퍼
				w1item = '.lst2', // 항목래퍼
				item = '.li2', // 항목
				add = '.add', // 추가
				del = '.del'; // 삭제

			var _item = ''; // 항목 태그
				_item += '<li class="li2">';
				_item += '	<span class="a1">';
				_item += '		<input type="text" value="" placeholder="선택지 보기를 작성하세요." title="선택지 보기" class="text" />';
				_item += '	</span>';
				_item += '	<button type="button" class="b2 del button secondary small">삭제</button>';
				_item += '</li>';

			// 선택지 미래 추가 클릭
			$(my).on('click', add, function(){
				if( $(this).closest(my).find(item).length < 4 ){
					var $_item = $(_item);
					$_item.appendTo( $(this).closest(my).find(w1item) ).find('input').focus();
				}else{
					alert('추가할 수 없습니다! \n선택지는 최대 4개까지 가능합니다.');
				}
			});

			// 미래 삭제 클릭
			$(my).on('click', del, function(){
				if( $(this).closest(my).find(item).length > 2 ){
					if( confirm('삭제하시겠습니까?') ){
						$(this).closest(item).remove();
					}
				}else{
					alert('삭제할 수 없습니다! \n선택지는 최소 2개가 필요합니다.');
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
