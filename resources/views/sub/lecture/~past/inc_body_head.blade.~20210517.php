<!-- #body_head -->
<div id="body_head" class="init">
<!-- container -->
<div class="container clearfix">

<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="javascript:void(0);" class="a1"><i class="t1">강좌</i></a>
                {{-- 소분류 카테고리 선택 시 --}}
                {{-- @if ($bcateId != '')
                <i class="sep">|</i>
				<a href="javascript:void(0);" class="a1"><i class="t1">{{ $bcateName }}</i></a>
                @endif --}}
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">{{ $bcateName }}</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
            <li><a href="{{ route('sub.lecture.lecture_list') }}">ALL</a></li>
            @foreach ($bcateList as $bcate)
            <li><a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => $bcate->bcate_id]) }}">{{ $bcate->bcate_name }}</a></li>
            @endforeach
			</ul>
		</div>
		<!-- /lnb1c -->
        {{-- 소분류 카테고리 선택 시 selectbox 3depth --}}
        <strong class="h1" style="margin-left: 10px"><a href="#lnb1c2" class="toggle slide" title="현재 위치"><span class="t1">{{ $scateName }}</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c2">
			<ul>
            @if ($scateId == '')
            <li><a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => $bcateId]) }}">ALL</a></li>
            @else
                @foreach ($scateList as $scate)
                <li><a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => $bcateId, 'scate_id' => $scate->scate_id]) }}">{{ $scate->scate_name }}</a></li>
                @endforeach
            @endif
			</ul>
		</div>
		<!-- /lnb1c -->
	</div>

	<!-- lnb1 -->
	<script>/*<![CDATA[*/
		$(function(){
			/** ◇◆ 목록앵커 클릭하면 활성 메뉴를 제목에 표시. 링크 이동. 20210111. @m
			 */
			(function(){
				var $my = $('#lnb1'),
                    // $my2 = $('#lnb2'),
					$m = $('li>a[href]', $my);
                    // $m2 = $('li>a[href]', $my2);

                // 대분류 카테고리
				// 현재활성
				$m.each(function(){
					if( $(this).closest('li').is('.on') ){
						$('.h1 .t1', $my).text( $(this).text() );
					}
				});
				// 클릭
				$m.on('click', function(e){
					//e.preventDefault();
					$('.toggle', $my).triggerHandler('click'); // 토글 닫기
					$('.h1 .t1', $my).text( $(this).text() );
					return; // 링크 이동
				});

                // 소분류 카테고리
                // // 현재활성
				// $m2.each(function(){
				// 	if( $(this).closest('li').is('.on') ){
				// 		$('.h1 .t1', $my).text( $(this).text() );
				// 	}
				// });
				// // 클릭
				// $m2.on('click', function(e){
				// 	//e.preventDefault();
				// 	$('.toggle', $my).triggerHandler('click'); // 토글 닫기
				// 	$('.h1 .t1', $my).text( $(this).text() );
				// 	return; // 링크 이동
				// });
			})();
		});
	/*]]>*/</script>

</div>
<!-- /body_title -->

</div>
<!-- /container -->
</div>
<!-- /#body_head -->
