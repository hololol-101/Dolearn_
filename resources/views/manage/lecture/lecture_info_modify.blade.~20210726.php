<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210222 | @m | 요구반영. 결함개선. 고도화.
 * ~20210302 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 강좌 정보 수정')

@section('content')

<? $d1n = '1'; $d2n = '1'; // 1차2차활성 ?>

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
		<h2 class="h1">강좌 정보 수정</h2>
	</div>
	<div class="eg1">
		<a href="javascript:history.back();" class="b1 button">뒤로가기</a>
		<a href="javascript:void(0);" class="b2 button primary mgl05em" onclick="saveLectureInfo()">저장하기</a>
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
    <h3 class="hb1 h3 dpib mgr1em vam">기본 정보</h3>
    <a href="#layer1tip1write1" class="dpib fsS2 vam toggle" data-send-focus="that">
        <span class="dpib mgr025em bdb1px">기본 정보 작성</span>
        <span class="bgc4 pdl05em pdr05em round ls0 cvf">TIP!</span>
    </a>
</div>

<!-- (레이어팝업. 기본 정보 작성 TIP) -->
@include('sub.lecture.inc_layer_tip_basic')

<script>/*<![CDATA[*/
    $(function(){
        // 레이어팝업 템플릿 바로 확인SW
        //$('[href="#layer1tip1write1"]').first().triggerHandler('click');
    });
/*]]>*/</script>


<!-- even-grid -->
<div class="even-grid float-left gap5pct vgap0">
	<div class="small-12 medium-4 column">


		<!-- cp1new1lecture1write1 -->
		<div class="cp1new1lecture1write1">
			<div class="f1">
				<div class="f1p1">
                    @if (isset($lectureInfo))
                        @if ($lectureInfo->save_thumbnail == '')
                        <img src="{{ asset('assets/images/lib/noimg1_manage.png') }}" id="thumb-image" alt="★대체텍스트필수" />
                        @else
                        <img src="{{ asset('storage/uploads/thumbnail/'.$lectureInfo->save_thumbnail) }}" id="thumb-image" alt="★대체텍스트필수" />
                        @endif
                    @else
                    <img src="{{ asset('assets/images/lib/noimg1_manage.png') }}" alt="★대체텍스트필수" />
                    @endif
				</div>
			</div>
			<!-- cp1upload1 -->
			<div class="cp1upload1">
				<label for="★1file0" class="label">이미지업로드</label>
                <form method="POST" id="image-upload-form" action="" enctype="multipart/form-data">
                    @csrf
                    <span class="w1file">
                        <input type="file" id="★1file0" name="file" class="file" />
                        <input type="text" value="" title="업로드 파일명" class="file" />
                        <button type="button" class="b1 del">파일 지우기</button>
                    </span>
                </form>
			</div>
			<!-- /cp1upload1 -->
		</div>
		<!-- /cp1new1lecture1write1 -->

		<script>/*<![CDATA[*/
			//$(function(){
				/** ◇◆ 이미지업로드 input[type='file'] 고도화. 20210215. 20210218. @m.
				 */
				(function(){
					var $my = $('.cp1upload1'),
						$file = $('[type="file"]', $my),
						$text = $('[type="text"]', $my),
						$del = $('.b1.del', $my);

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
							$my.addClass('off');
						}else{
							$my.removeClass('off');
						}
					}

				})();
			//});
		/*]]>*/</script>


	</div>
	<div class="small-12 medium-8 column">


		<!-- <p class="tar"><i class="required" title="필수항목">*</i> 는 필수 입력 <span class="dpib">항목입니다.</span></p> -->

		<!-- 폼아이템들 -->
        <input type="hidden" id="input-filename" name="filename" value="@if (isset($lectureInfo)) {{ $lectureInfo->save_thumbnail }} @endif" />

		<div class="form1item1">
			<label for="★1text0" class="tt1">강좌 제목 <i class="required" title="필수항목">*</i></label>
			<input type="text" id="title" name="title" value="@if (isset($lectureInfo)) {{ $lectureInfo->title }} @endif" placeholder="강좌명을 입력하세요" class="w100 type1" />
		</div>

		<div class="form1item1">
			<label for="★1textarea0" class="tt1">강좌 설명 <i class="required" title="필수항목">*</i></label>
			<!-- <input type="text" id="★1textarea0" value="" class="w100 type1" /> -->
			<textarea id="description" name="description" rows="5" cols="80" placeholder="학습내용, 수강대상 등 강좌 요약을 2문장 이상 작성하는 것을 추천드립니다.">@if (isset($lectureInfo)) {{ $lectureInfo->description }} @endif</textarea>
		</div>

		<div class="form1item1">
			<label for="★1text0" class="tt1">난이도 <i class="required" title="필수항목">*</i></label>
			<div>
				<span class="dpib mgr15em">
					<input type="radio" id="level" name="level" value="low" @if (isset($lectureInfo)) @if ($lectureInfo->level == 'low') checked @endif @else checked @endif />초급
				</span>
				<span class="dpib mgr15em">
					<input type="radio" id="level" name="level" value="medium" @if (isset($lectureInfo)) @if ($lectureInfo->level == 'medium') checked @endif @endif />중급
				</span>
				<span class="dpib mgr15em">
					<input type="radio" id="level" name="level" value="high" @if (isset($lectureInfo)) @if ($lectureInfo->level == 'high') checked @endif @endif />중급 이상
				</span>
			</div>
		</div>

		<!-- even-grid -->
		<div class="even-grid float-left gap2pct vgap00">
			<div class="small-12 large-8 column">

				<div class="form1item1">
					<label for="★1price1" class="tt1">가격 <i class="required" title="필수항목">*</i></label>
					<div>
						<div class="cp1menu4 mgr05em">
                            <a href="javascript:void(0);" class="m m1 @if (isset($lectureInfo)) @if ($lectureInfo->free_yn == 'Y') on @endif @else on @endif" onclick="toggleFreeValue('Y');">무료</a>
							<a href="javascript:void(0);" class="m m2 @if (isset($lectureInfo)) @if ($lectureInfo->free_yn == 'N') on @endif @endif" onclick="toggleFreeValue('N');">유료</a>
						</div>
                        <input type="hidden" id="is_free" name="is_free" @if(isset($lectureInfo)) @if ($lectureInfo->free_yn == '') value="Y" @else value="{{ $lectureInfo->free_yn }}" @endif @else value="Y" @endif />
						<script>/*<![CDATA[*/
							$('.cp1menu4 .m').on('click', function(e){
								e.preventDefault();
								$(this).siblings().removeClass('on').end().addClass('on');
							});
						/*]]>*/</script>
						<input type="text" id="price" name="price" value="@if (isset($lectureInfo)) {{ $lectureInfo->price }} @endif" onkeydown="checkInputInteger()" placeholder="원" class="type1 tar w12em" />
					</div>
					<ul class="bi1 mgt0 fsS2">
					<li class="li1">유료는 유튜브 영상추천 기능을 제공하지 않습니다.</li>
					</ul>
				</div>

			</div>
			<div class="small-12 large-4 column">

				<div class="form1item1" id="div_duration">
					<label for="★1term1" class="tt1">수강 기간 <i class="required" title="필수항목">*</i></label>
					<input type="text" id="duration" name="duration" value="@if (isset($lectureInfo)) {{ $lectureInfo->duration }} @endif" onkeydown="checkInputInteger()" placeholder="(일)" class="w100 type1 tar" />
					<ul class="bi1 mgt0 fsS2">
					<li class="li1">비워둘 경우 수강 기간 제한 없음.</li>
					</ul>
				</div>

			</div>
		</div>
		<!-- /even-grid -->


		<!-- even-grid -->
		<div class="form1item1 even-grid gap2pct vgap00">
			<div class="small-12 xlarge-3 column vam">
				<span class="tt1">강좌 필수 카테고리 <i class="required" title="필수항목">*</i></span>
			</div>
			<div class="small-4 xlarge-3 column vam">
				<select title="필수 대분류" class="w100 type1" id="main_bcate" name="sel_main_cate">
					<option value="">선택하세요</option>
                    @foreach ($bcategoryList as $bcategory)
                        <option value="{{ $bcategory->bcate_id }}" @if (isset($lectureInfo)) @if ($bcategory->bcate_id == $lectureInfo->bcate_id) selected @endif @endif>{{ $bcategory->bcate_name }}</option>
                    @endforeach
				</select>
			</div>
			<div class="small-4 xlarge-3 column vam">
				<select title="필수 소분류" class="w100 type1" id="main_scate" name="sel_main_cate">
					<option value="">선택하세요</option>
                    @if (isset($lectureInfo))
                        @if (count($existMainSCategoryList) > 0)
                            @foreach ($existMainSCategoryList as $existMainSCategory)
                            <option value="{{ $existMainSCategory->scate_id }}" @if ($existMainSCategory->scate_id == $lectureInfo->scate_id) selected @endif>{{ $existMainSCategory->scate_name }}</option>
                            @endforeach
                        @endif
                    @endif
				</select>
			</div>
		</div>
		<!-- /even-grid -->


		<!-- even-grid -->
		<div class="form1item1 even-grid gap2pct vgap00 mgb2em">
			<div class="small-12 xlarge-3 column vam">
				<span class="tt1">강좌 서브 카테고리</span>
			</div>
			<div class="small-4 xlarge-3 column vam">
				<select title="서브 대분류" class="w100 type1" id="sub_bcate" name="sel_sub_cate">
					<option value="">선택하세요</option>
					@foreach ($bcategoryList as $bcategory)
                        <option value="{{ $bcategory->bcate_id }}" @if (isset($lectureInfo) && $lectureInfo->category_2 != '') @if ($bcategory->bcate_id == $lectureInfo->sub_bcate_id) selected @endif @endif>{{ $bcategory->bcate_name }}</option>
                    @endforeach
				</select>
			</div>
			<div class="small-4 xlarge-3 column vam">
				<select title="서브 소분류" class="w100 type1" id="sub_scate" name="sel_sub_cate">
					<option value="">선택하세요</option>
                    @if (isset($lectureInfo))
                        @if (count($existSubSCategoryList) > 0)
                            @foreach ($existSubSCategoryList as $existSubSCategory)
                            <option value="{{ $existSubSCategory->scate_id }}" @if (isset($lectureInfo)) @if ($existSubSCategory->scate_id == $lectureInfo->sub_scate_id) selected @endif @endif>{{ $existSubSCategory->scate_name }}</option>
                            @endforeach
                        @endif
                    @endif
				</select>
			</div>
		</div>
		<!-- /even-grid -->


		<!-- cp1tag2 -->
		<div class="cp1tag2">
			<strong class="h1"></strong>
			<div class="cont">
				<div class="tg1" id="add_subject">
					{{-- 추가 버튼 클릭 시 주제가 해당 위치에 추가됨 --}}
				</div>
				<div class="eg1">
					<input type="text" value="" placeholder="주제를 추가해서 수강자들이 쉽게 강좌를 찾을 수 있도록 해보세요!" title="추가 주제" class="text1 type1" id="input_subject"/>
					<button type="button" class="b1 add button gray4">추가</button>
				</div>
			</div>
		</div>
		<!-- /cp1tag2 -->

		<script>/*<![CDATA[*/
			$(function(){

				/** ◇◆ 강좌 주제 제거 추가. 20210218. @m.
				 */
				(function(){
					var my = '.cp1tag2',
						tg1 = '.tg1', // 주제 그룹
						a1on = '.a1.on', // 주제
						text1 = '.text1', // 입력
						b1add = '.b1.add', // 추가 버튼
						v = '';

						// 미래 주제 클릭
						$(my).on('click', a1on, function(e){
							e.preventDefault();
							$(this).remove();
						});

						// 미래 추가 클릭
						$(my).on('click', b1add, function(){
							if ($('#input_subject').val() != '') {
                                var $last = $(this).closest(my).find(a1on).last();
                                $('<a href="javascript:void(0);" class="a1 on" />').appendTo( $(this).closest(my).find(tg1) ).text( $(this).prevAll('.text1').val() );
                                $('#input_subject').val('');
                            }
                            $('#input_subject').focus();
						});

                        // 엔터키 입력 이벤트로 주제 추가
                        $('#input_subject').keydown(function(key) {
                            if (key.keyCode == 13) {
                                var $last = $(this).closest(my).find(a1on).last();
                                $('<a href="javascript:void(0);" class="a1 on" />').appendTo( $(this).closest(my).find(tg1) ).text($(this).val());
                                $('#input_subject').val('');
                            }
                            $('#input_subject').focus();
                        });
				})();
			});
		/*]]>*/</script>

	</div>
</div>
<!-- /even-grid -->


<div class="hgroup1">
	<h3 class="hb1 h3">강좌 소개</h3>
</div>


<!-- 폼아이템들 -->

<!-- cp1write2 -->
<div class="cp1write2">
	<div class="form1item1">
		<div class="clearfix">
			<div class="fl">
				<span class="tt1 mgr1em">무엇을 배울 수 있나요? <i class="required" title="필수항목">*</i></span>
				<span class="bi1 dpib fsS1 vam">
					<span class="li1">최소 2개 이상</span>
				</span>
			</div>
			<div class="fr">
				<button type="button" class="button0 add mgr075em"><i class="ic1 indy ic24plus1"></i><span class="t1 blind">추가</span></button>
			</div>
		</div>
		<div class="w1item" id="addinfo1">
            @if (isset($lectureInfo))
                @if ($lectureInfo->add_info_1 == '')
                <div class="item">
                    <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                    <input type="text" value="" placeholder="최소 2개 이상" title="강좌 내용" class="w100 type1 text" />
                    <button type="button" class="b1 button del gray4 small">삭제</button>
                </div>
                <div class="item">
                    <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                    <input type="text" value="" placeholder="최소 2개 이상" title="강좌 내용" class="w100 type1 text" />
                    <button type="button" class="b1 button del gray4 small">삭제</button>
                </div>
                @else
                    @php
                    $addInfo1List = explode('|', $lectureInfo->add_info_1);
                    @endphp
                    @foreach ($addInfo1List as $addInfo1)
                    <div class="item">
                        <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                        <input type="text" value="{{ $addInfo1 }}" placeholder="최소 2개 이상" title="강좌 내용" class="w100 type1 text" />
                        <button type="button" class="b1 button del gray4 small">삭제</button>
                    </div>
                    @endforeach
                @endif
            @else
            <div class="item">
                <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                <input type="text" value="" placeholder="최소 2개 이상" title="강좌 내용" class="w100 type1 text" />
                <button type="button" class="b1 button del gray4 small">삭제</button>
            </div>
            <div class="item">
                <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                <input type="text" value="" placeholder="최소 2개 이상" title="강좌 내용" class="w100 type1 text" />
                <button type="button" class="b1 button del gray4 small">삭제</button>
            </div>
            @endif
		</div>
	</div>
</div>
<!-- /cp1write2 -->

<!-- cp1write2 -->
<div class="cp1write2">
	<div class="form1item1">
		<div class="clearfix">
			<div class="fl">
				<span class="tt1 mgr1em">누가 배우면 좋을까요? <i class="required" title="필수항목">*</i></span>
				<span class="bi1 dpib fsS1 vam">
					<span class="li1">최소 2개 이상</span>
				</span>
			</div>
			<div class="fr">
				<button type="button" class="button0 add mgr075em"><i class="ic1 indy ic24plus1"></i><span class="t1 blind">추가</span></button>
			</div>
		</div>
		<div class="w1item" id="addinfo2">
			@if (isset($lectureInfo))
                @if ($lectureInfo->add_info_2 == '')
                <div class="item">
                    <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                    <input type="text" value="" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
                    <button type="button" class="b1 button del gray4 small">삭제</button>
                </div>
                <div class="item">
                    <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                    <input type="text" value="" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
                    <button type="button" class="b1 button del gray4 small">삭제</button>
                </div>
                @else
                    @php
                    $addInfo2List = explode('|', $lectureInfo->add_info_2);
                    @endphp
                    @foreach ($addInfo2List as $addInfo2)
                    <div class="item">
                        <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                        <input type="text" value="{{ $addInfo2 }}" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
                        <button type="button" class="b1 button del gray4 small">삭제</button>
                    </div>
                    @endforeach
                @endif
            @else
            <div class="item">
                <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                <input type="text" value="" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
                <button type="button" class="b1 button del gray4 small">삭제</button>
            </div>
            <div class="item">
                <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                <input type="text" value="" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
                <button type="button" class="b1 button del gray4 small">삭제</button>
            </div>
            @endif
		</div>
	</div>
</div>
<!-- /cp1write2 -->

<!-- cp1write2 -->
<div class="cp1write2">
	<div class="form1item1">
		<div class="clearfix">
			<div class="fl">
				<span class="tt1 mgr1em">필요한 배경지식이 있나요? </span>
			</div>
			<div class="fr">
				<button type="button" class="button0 add mgr075em"><i class="ic1 indy ic24plus1"></i><span class="t1 blind">추가</span></button>
			</div>
		</div>
		<div class="w1item" id="addinfo3">
			@if (isset($lectureInfo))
                @if ($lectureInfo->add_info_3 == '')
                <div class="item">
                    <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                    <input type="text" value="" placeholder="내용을 입력하세요" title="강좌 대상" class="w100 type1 text" />
                    <button type="button" class="b1 button del gray4 small">삭제</button>
                </div>
                {{-- <div class="item">
                    <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                    <input type="text" value="" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
                    <button type="button" class="b1 button del gray4 small">삭제</button>
                </div> --}}
                @else
                    @php
                    $addInfo3List = explode('|', $lectureInfo->add_info_3);
                    @endphp
                    @foreach ($addInfo3List as $addInfo3)
                    <div class="item">
                        <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                        <input type="text" value="{{ $addInfo3 }}" placeholder="최소 2개 이상" title="강좌 대상" class="w100 type1 text" />
                        <button type="button" class="b1 button del gray4 small">삭제</button>
                    </div>
                    @endforeach
                @endif
            @else
            <div class="item">
                <div class="control move" title="끌어서 놓기로 순서 이동"></div>
                <input type="text" value="" placeholder="내용을 입력하세요" title="강좌 대상" class="w100 type1 text" />
                <button type="button" class="b1 button del gray4 small">삭제</button>
            </div>
            @endif
		</div>
	</div>
</div>
<!-- /cp1write2 -->

<script>/*<![CDATA[*/
	$(function(){


		/** ◇◆ 핵심정보 입력상자 추가삭제. 20210302. @m.
		 */
        (function(){
			var my = '.cp1write2',
				item = '.item',
				add = '.add',
				del = '.del';
			// 미래 추가 클릭
			$(my).on('click', add, function(){
				var $last = $(this).closest(my).find(item).last();

                $last.clone().insertAfter( $last ).find('input[type="text"]').val('');
			});
			// 미래 삭제 클릭
			$(my).on('click', del, function(){
				if ($(this).closest(my).find(item).length > 2 || $(this).closest('#addinfo3').find(item).length > 1){
					if( confirm('삭제하시겠습니까?') ){
						$(this).closest(item).remove();
					}
				} else {
					alert('더 이상 삭제할 수 없습니다.');
				}
			});
		})();

		/** ◇◆ 드래그앤드롭(마우스+터치) 순서이동. 20210217. @m.
		 * [IE9+]
		 * Use) makeDrag1('.cp1write2');
		 */

		// 호출
		makeDrag1('.cp1write2');

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


<div class="form1item1">
	<span class="tt1 mgr1em vam">강좌 소개</span>
	<a href="#layer1tip1write2" class="dpib fsS2 vam toggle" data-send-focus="that">
		<span class="dpib mgr025em bdb1px">강좌 소개 작성</span>
		<span class="bgc4 pdl05em pdr05em round ls0 cvf">TIP!</span>
	</a>
	<!-- cp1write1 -->
	<div class="cp1write1">
		{{-- <div class="editor"></div> --}}
        <textarea class="editor" id="editor">
            {{-- <div class="mgt5em mgb5em em tac">개발자 온라인 웹문서 편집기 처리 필요!</div> --}}
            @if (isset($lectureInfo)) {{ $lectureInfo->introduction }} @endif
        </textarea>
	</div>
	<!-- /cp1write1 -->
</div>

<!-- (레이어팝업. 강좌 소개 작성 TIP) -->
@include('sub.lecture.inc_layer_tip_intro')

<script>/*<![CDATA[*/
	$(function(){
		// 레이어팝업 템플릿 바로 확인
		//$('[href="#layer1tip1write2"]').first().triggerHandler('click');

        // CKEditor load
        CKEDITOR.replace('editor', {
            height: 400,
            filebrowserUploadUrl: "{{ route('ck_file_upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
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
$(function() {
    @if ($lectureInfo->free_yn == 'Y' || $lectureInfo->free_yn == '')
    $('#price').hide();
    $('#div_duration').hide();
    @endif

    // 기존 저장된 주제 목록 추가
    @if (isset($lectureTagList))
        @foreach ($lectureTagList as $lectureTag)
            @if ($lectureTag != '')
            $('#add_subject').append('<a href="javascript:void(0);" class="a1 on">{{ $lectureTag }}</a>');
            @endif
        @endforeach
    @endif
});

// 강좌 썸네일 이미지 파일 업로드
$('#★1file0').change(function() {
    $('#image-upload-form').submit();
});

$('#image-upload-form').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    var $my = $('.cp1upload1'),
        $file = $('[type="file"]', $my),
        $text = $('[type="text"]', $my)

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('etc.store_image') }}",
        contentType: false,
        processData: false,
        data: formData,
        success: (response) => {
            if (response.status == 'success') {
                $('#thumb-image').attr('src', response.savePath);
                $('#input-filename').val(response.fileName);
            } else {
                alert(response.msg);
                $file.val('');
                $text.val('');
                return false;
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
});

// 필수 대분류 카테고리 선택
$('#main_bcate').change(function() {
    $('#main_scate').empty();
    $('#main_scate').append('<option value="">선택하세요</option>');

    var bcateId = $('#main_bcate').val();
    var scateId = $('#main_scate').val();

    getCategoryData(bcateId, scateId, 'main');
});

// 서브 대분류 카테고리 선택
$('#sub_bcate').change(function() {
    $('#sub_scate').empty();
    $('#sub_scate').append('<option value="">선택하세요</option>');

    var bcateId = $('#sub_bcate').val();
    var scateId = $('#sub_scate').val();

    getCategoryData(bcateId, scateId, 'sub');
});

// 유/무료 선택 시 가격, 수강 기간 표시 토글
function toggleFreeValue(isFree) {
    $('#is_free').val(isFree);

    if (isFree == 'Y') {
        $('#price').hide();
        $('#div_duration').hide();
    } else {
        $('#price').show();
        $('#div_duration').show();
    }
}

// 키보드로 입력 시 숫자 유효성 검사
function checkInputInteger() {
    /** 키보드 ASCII 코드
     * 48~57 : 0~9
     * 96~105 : 키패드 0~9
     * 37~40 : 방향키
     * 8 : BACKSPACE
     * 9 : TAB
     * 46 : DEL
     * 13 : ENTER
     * 27 : ESC
    */
    if (!((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || (event.keyCode >= 37 && event.keyCode <= 40) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 46 || event.keyCode == 13 || event.keyCode == 27)) {
        alert('숫자만 입력해주세요.');
        event.returnValue = false;
        // $('#price').val('');
        $('#price').focus();

        return false;
    }
}

// 필수/서브 카테고리 선택 시 카테고리 목록 조회
function getCategoryData(bcateId, scateId, isMain) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.lecture.get_category_data') }}",
        data: {
            'bcate_id': bcateId,
            'scate_id': scateId
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                var html = '';
                var scategoryList = JSON.parse(data.scategoryList);

                for (var key in scategoryList) {
                    // console.log(scategoryList[key].scate_name);
                    html = "<option value='"+ scategoryList[key].scate_id +"'>" + scategoryList[key].scate_name + "</option>";

                    if (isMain == 'main') {
                        $('#main_scate').append(html);
                    } else {
                        $('#sub_scate').append(html);
                    }
                }
            }
        },
        error: function(request, status, error) {
            console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
        },
        complete: function(data) {

        }
    });
}

function saveLectureInfo() {
    var title = $('#title').val();
    var description = $('#description').val();
    var saveThumbnail = $('#input-filename').val();
    var level = $('input[name=level]:checked').val();
    var isFree = $('#is_free').val();
    var price = $('#price').val();
    var duration = $('#duration').val();
    var mainBCateId = $('#main_bcate').val();
    var mainSCateId = $('#main_scate').val();
    var mainSubject = $('#main_scate option:selected').text();
    var subBCateId = $('#sub_bcate').val();
    var subSCateId = $('#sub_scate').val();
    var subSubject = ($('#sub_scate').val() != '') ? $('#sub_scate option:selected').text() : '';
    var lectureTags = '';
    var addInfo1InputList = $('#addinfo1 input[type=text]');
    var addInfo2InputList = $('#addinfo2 input[type=text]');
    var addInfo3InputList = $('#addinfo3 input[type=text]');
    var addInfo1 = '';
    var addInfo2 = '';
    var addInfo3 = '';
    var introduction = '';

    // 입력 데이터 유효성 검사
    if (title == '') {
        alert('강좌 제목을 입력해주세요.');
        $('#title').focus();
        return false;
    }

    if (description == '') {
        alert('강좌 설명을 입력해주세요.');
        $('#description').focus();
        return false;
    }

    if (level == '') {
        alert('난이도를 선택해주세요.');
        return false;
    }

    if (isFree == 'N') {
        if (price == 0 || price == '') {
            alert('가격을 입력해주세요.');
            $('#price').focus();
            return false;
        }
    }

    if (mainBCateId == '' || mainSCateId == '') {
        alert('필수 카테고리를 선택해주세요.');
        $('#main_bcate').focus();
        return false;
    }

    // 강좌 추가 정보 serialize
    $.each(addInfo1InputList, function(index, value) {
        if ($(value).val() != '') {
            addInfo1 += $(value).val() + '|';
        }
    });

    $.each(addInfo2InputList, function(index, value) {
        if ($(value).val() != '') {
            addInfo2 += $(value).val() + '|';
        }
    });

    $.each(addInfo3InputList, function(index, value) {
        if ($(value).val() != '') {
            addInfo3 += $(value).val() + '|';
        }
    });

    addInfo1 = addInfo1.slice(0, -1);
    addInfo2 = addInfo2.slice(0, -1);
    addInfo3 = addInfo3.slice(0, -1);

    if (addInfo1 == '' || addInfo2 == '') {
        alert('필수 항목을 입력해주세요.');
        return false;
    }

    // 강좌 주제 serialize
    $.each($('#add_subject').children(), function(index, item) {
        lectureTags += item.text;
        lectureTags += '|';
    });
    lectureTags = lectureTags.slice(0, -1);

    // 에디터에서 강좌 소개 내용 가져옴
    introduction = CKEDITOR.instances.editor.getData();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('manage.lecture.save_lecture_info') }}",
        data: {
            'lecture_idx': '{{ $lectureInfo->idx }}',
            'title': title,
            'description': description,
            'save_thumbnail': saveThumbnail,
            'level': level,
            'free_yn': isFree,
            'price': price,
            'duration': duration,
            'main_bcate_id': mainBCateId,
            'main_scate_id': mainSCateId,
            'main_subject': mainSubject,
            'sub_bcate_id': subBCateId,
            'sub_scate_id': subSCateId,
            'sub_subject': subSubject,
            'lecture_tags': lectureTags,
            'add_info_1': addInfo1,
            'add_info_2': addInfo2,
            'add_info_3': addInfo3,
            'introduction': introduction
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                location.href='/manage/lecture/lecture_info?idx={{ $lectureInfo->idx }}';
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
</script>
@endsection
