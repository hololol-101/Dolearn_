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
				<a href="{{ route('sub.lecture.lecture_list') }}" class="a1"><i class="t1">강좌</i></a>
                {{-- 소분류 카테고리 선택 시 --}}
                @if ($bcateId != '' && $scateId != '')
                <i class="sep">|</i>
				<a href="javascript:void(0);" class="a1"><i class="t1">{{ $bcateName }}</i></a>
                @endif
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">

        {{-- 대/소분류 카테고리 모두 선택 --}}
        @if ($bcateId != '' && $scateId != '')
        <strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">{{ $scateName }}</span> <i class="ic1"></i></a></strong>
        <!-- lnb1c -->
		<div id="lnb1c">
			<ul>
            <li><a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => $bcateId]) }}">ALL</a></li>
                @foreach ($scateList as $scate)
                <li><a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => $scate->bcate_id, 'scate_id' => $scate->scate_id]) }}">{{ $scate->scate_name }}</a></li>
                @endforeach
			</ul>
		</div>
		<!-- /lnb1c -->

        {{-- 대분류 카테고리만 선택 --}}
        @elseif ($bcateId != '' && $scateId == '')
        <strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">ALL</span> <i class="ic1"></i></a></strong>
        <!-- lnb1c -->
		<div id="lnb1c">
			<ul>
            <li><a href="{{ route('sub.lecture.lecture_list') }}">ALL</a></li>
                @foreach ($scateList as $scate)
                <li><a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => $scate->bcate_id, 'scate_id' => $scate->scate_id]) }}">{{ $scate->scate_name }}</a></li>
                @endforeach
			</ul>
		</div>
		<!-- /lnb1c -->

        {{-- 카테고리 미선택 --}}
        @else
        <strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">{{ $bcateName }}</span> <i class="ic1"></i></a></strong>
        <!-- lnb1c -->
		<div id="lnb1c">
			<ul>
            <li><a href="{{ route('sub.lecture.lecture_list') }}">ALL</a></li>
                @foreach ($bcateList as $bcate)
                <li><a href="{{ route('sub.lecture.lecture_list', ['bcate_id' => $bcate->bcate_id, 'scate_id' ]) }}">{{ $bcate->bcate_name }}</a></li>
                @endforeach
			</ul>
		</div>
		<!-- /lnb1c -->
        @endif

	</div>

	<!-- lnb1 -->
	<script>/*<![CDATA[*/
		$(function(){
            @if ($bcateId != '' && $scateId == '')
                var html = '';
                html += '<div class="breadcrumb clearfix">';
                html +=     '<strong class="blind">현재페이지 위치:</strong>';
                html +=     '<span class="cont">';
                html +=         '<a href="/sub/lecture/lecture_list" class="a1"><i class="t1">강좌</i></a>';
                html +=         '<i class="sep">|</i>';
                html +=         '<a href="javascript:void(0);" class="a1"><i class="t1">{{ $bcateName }}</i></a>';
                html +=     '</span>';
                html += '</div>';

                $('#location1').empty();
                $('#location1').append(html);
            @endif

			/** ◇◆ 목록앵커 클릭하면 활성 메뉴를 제목에 표시. 링크 이동. 20210111. @m
			 */
			(function(){
				var $my = $('#lnb1'),
					$m = $('li>a[href]', $my);

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
			})();
		});
	/*]]>*/</script>

</div>
<!-- /body_title -->

</div>
<!-- /container -->
</div>
<!-- /#body_head -->
