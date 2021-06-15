<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210208 | @m | 요구반영. 결함개선. 고도화.
 * ~20210208 | @m |
 */
-->
@extends('master_sub')

@section('title', '영상보관함 - 재생목록')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

@include('inc.common.inc_layer_sitemap')

<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="javascript:void(0);" class="a1"><i class="t1">영상보관함</i></a>
				<i class="sep">|</i>
				<a href="{{ route('sub.video.video_playlist') }}" class="a1"><i class="t1">재생목록</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

</div>
<!-- /body_title -->


<!-- cp1infomenu1 -->
<div class="cp1infomenu1">
	<div class="w1">
	</div>
	<div class="w2">
		<a href="#layer1playlist1write1" class="button toggle" data-send-focus="that"><span class="t1">+ 새 목록 만들기</span></a>
	</div>
</div>
<!-- /cp1infomenu1 -->


<!-- (레이어팝업.노트수정) -->
@include('sub.video.inc_layer_playlist_add')

<script>/*<![CDATA[*/
    $(function(){
        // 레이어팝업 템플릿 바로 확인
        //$('[href="#layer1playlist1write1"]').triggerHandler('click');
    });
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /#body_head -->
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1playlist2 -->
<div class="cp1playlist2">
	<ul class="lst1">
		<li class="li1">
			<div class="tg1">
				<div class="t1">
					<a href="{{ route('sub.video.video_playlist_detail', ['id' => '']) }}" class="a1">재생목록 제목 : 내가 만든 엑셀 공부 재생목록 01</a>
				</div>
				<span class="t2">총 영상 수 2개 &gt;</span>
			</div>
			<div class="eg1">
				<a href="#" class="a2 edit"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
				<a href="#" class="a2 del"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
			</div>
		</li>
		<li class="li1">
			<div class="tg1">
				<div class="t1">
                    <a href="{{ route('sub.video.video_playlist_detail', ['id' => '']) }}" class="a1">내가 만든 엑셀 공부 재생목록 02</a>
				</div>
				<span class="t2">총 영상 수 2개 &gt;</span>
			</div>
			<div class="eg1">
				<a href="#" class="a2 edit"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
				<a href="#" class="a2 del"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
			</div>
		</li>
		<li class="li1">
			<div class="tg1">
				<div class="t1">
                    <a href="{{ route('sub.video.video_playlist_detail', ['id' => '']) }}" class="a1">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</a>
				</div>
				<span class="t2">총 영상 수 2개 &gt;</span>
			</div>
			<div class="eg1">
				<a href="#" class="a2 edit"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
				<a href="#" class="a2 del"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
			</div>
		</li>
	</ul>
</div>
<!-- /cp1playlist2 -->


<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 수정클릭샘플 | 20210208. @m
		 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
		 */
		(function(){
			var $my = $('.cp1playlist2'),
				$bedit = $('.a2.edit', $my);
			// 수정 클릭
			$bedit.on('click', function(e){
				e.preventDefault();
				var $item = $(this).closest('.li1');
				$item.find('.tg1, .eg1').hide(); // 원래 내용 숨김
				var html = '';
					html += '<div class="w1edit">';
					html += '	<input type="text" value="" placeholder="제목을 입력해주세요. (50자 이하)" title="재생 목록 제목" class="text w100 mgb05em" />';
					html += '	<div class="eg1">';
					html += '		<a href="#" class="a2 calcel"><i class="a2ic1"></i> <span class="a2t1">취소</span></a>';
					html += '		<a href="#" class="a2 save"><i class="a2ic1"></i> <span class="a2t1">저장</span></a>';
					html += '	</div>';
					html += '</div>';
				$item.append($(html));
				var $input = $('input.text', $item),
					$bcancel = $('.a2.calcel', $item),
					$bsave = $('.a2.save', $item);
				$input.val( $item.find('.tg1>.t1').text().replace(/^\s*|\s*$/g, '') )[0].focus(); // 앞뒤공백제거 후 인풋막스 값 넣음
				// 취소 클릭
				$bcancel.on('click', function(e){
					$item.find('.tg1, .eg1').show(); // 원래 내용 보임
					$item.find('.w1edit').remove(); // 수정 양식 제거
				});
				// 저장 클릭
				$bsave.on('click', function(e){
					$item.find('.tg1>.t1').text( $input.val() ); // 수정한 값 넣음
					$item.find('.tg1, .eg1').show(); // 원래 내용 보임
					$item.find('.w1edit').remove(); // 수정 양식 제거
				});
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
