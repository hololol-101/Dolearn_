<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210315 | @m | 요구반영. 결함개선. 고도화.
 * ~20210315 | @m |
 * 20210414 | @m | 요구반영
 */
-->
@extends('master_sub')

@section('title', '인사이트 - 랭킹(강좌)')

@section('content')
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

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="javascript:void(0);" class="a1"><i class="t1">커뮤니티</i></a>
				<i class="sep">|</i>
				<a href="javascript:void(0);" class="a1"><i class="t1">인사이트</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">랭킹</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.community.trend') }}">최신 트렌드</a></li>
			<li class="on"><a href="{{ route('sub.community.ranking', ['type' => 'lecture']) }}">랭킹</a></li>
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
<!-- #body_content -->
<div id="body_content">
<!-- container -->
<div class="container clearfix">


<!-- cp1tabs1 -->
<div id="cp1tabs1" class="cp1tabs1 mgt1em mgb1em">
    <ul>
    <li class="m1 column on"><a href="{{ route('sub.community.ranking', ['type' => 'lecture']) }}" style="min-width:4em;"><span class="t1">강좌</span><i class="ic1"></i></a></li>
    <li class="m2 column"><a href="{{ route('sub.community.ranking', ['type' => 'instructor']) }}" style="min-width:4em;"><span class="t1">강사</span><i class="ic1"></i></a></li>
    <li class="m3 column"><a href="{{ route('sub.community.ranking', ['type' => 'youtuber']) }}" style="min-width:4em;"><span class="t1">유튜버</span><i class="ic1"></i></a></li>
    </ul>
</div>
<!-- /cp1tabs1 -->


<div class="dpf jcsb aic">
	<h2 class="hb1 h2">지금 핫한 강좌</h2>
	<select class="select" title="선택옵션" onchange="handleOnChange(this)">
		<option value="">수강자 수</option>
		<option value="">완강률</option>
		<option value="">평점</option>
	</select>
</div>

@php
    $cnt = 1;
@endphp
<!-- cp1flist6 -->
<div class="cp1flist6">
    <!-- lst1 -->
    <ul class="lst1">
        @foreach ($lectureList as $lecture )
        <li class="li1">
            <a href="?#★" class="w1 a1">
                <div class="w1w1">
                    <div class="w1w1w1">
                        <b class="g1"><span class="g1t1">{{ $cnt++ }}</span><span class="g1t2">위</span></b>
                    </div>
                    <div class="w1w1w2">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('storage/uploads/thumbnail/'.$lecture->save_thumbnail) }}" alt="★대체텍스트필수" />
                            </span>
                        </div>
                    </div>
                    <div class="w1w1w3">
                        <div class="t1">
                            {{ $lecture->title }}
                        </div>
                        <div class="t2">
                            {{ $lecture->owner_name }}
                        </div>
                    </div>
                </div>
								<div class="w1w2">
									<div class="w1w2w1">
										<span class="t3">완강률</span>
										<span class="t4">@if ($lecture->student_cnt != 0) {{ round(((int)$lecture->complete_cnt / $lecture->student_cnt) * 100, 0) }}% @else 0% @endif</span>
									</div>
									<div class="w1w2w2">
										<span class="t3">강좌 평점</span>
										<span class="t4">{{ $lecture->rating }}</span>
									</div>
									<div class="w1w2w3">
										<span class="t3">수강자 수</span>
										<span class="t4">{{ $lecture->student_cnt }}</span>
									</div>
								</div>
            </a>
        </li>
        @endforeach
    </ul>
    <!-- /lst1 -->

    <!-- cp1more1 -->
    <div class="cp1more1">
        <a href="#★" class="more">
            <span class="t1">더보기</span>
            <i class="ic1"></i>
        </a>
    </div>
    <!-- /cp1more1 -->

</div>
<!-- /cp1flist6 -->
<script>
    function handleOnChange(e){
        alert(e.options[e.selectedIndex].text)
    }

</script>

<script>/*<![CDATA[*/
    $(function(){

        /** ◇◆ 더보기클릭샘플. 20210315. @m
            * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
            */
        (function(){
            var $my = $('.cp1flist6'),
                $more = $('.more', $my),
                $lst = $('.lst1', $my);
            var html = '';
                html += '<li class="li1">';
                html += '	<a href="?#★" class="w1 a1">';
                html += '		<div class="w1w1">';
                html += '			<div class="w1w1w1">';
                html += '				<b class="g1"><span class="g1t1">-</span><!-- <span class="g1t2">위</span> --></b>'; // 10위 이상 표현하려면.. 디자인 크기 줄여야 한다.
                html += '			</div>';
                html += '			<div class="w1w1w2">';
                html += '				<div class="f1">';
                html += '					<span class="f1p1">';
                html += '						<img src="{{ asset('assets/images/main/x1/x1p010.jpg') }}" alt="★대체텍스트필수" />';
                html += '					</span>';
                html += '				</div>';
                html += '			</div>';
                html += '			<div class="w1w1w3">';
                html += '				<div class="t1">';
                html += '					강좌제목일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십';
                html += '				</div>';
                html += '				<div class="t2">';
                html += '					강사이름';
                html += '				</div>';
                html += '			</div>';
                html += '		</div>';
                html += '		<div class="w1w2">';
                html += '			<div class="w1w2w1">';
                html += '				<span class="t3">완강률</span>';
                html += '				<span class="t4">98%</span>';
                html += '			</div>';
                html += '			<div class="w1w2w2">';
                html += '				<span class="t3">수강생 수</span>';
                html += '				<span class="t4">100</span>';
                html += '			</div>';
                html += '			<div class="w1w2w3">';
                html += '				<span class="t3">게시일</span>';
                html += '				<span class="t4">2021.03.15</span>';
                html += '			</div>';
                html += '		</div>';
                html += '	</a>';
                html += '</li>';

            $more.on('click', function(e){
                e.preventDefault();
                for(var i = 5; i--; ){
                    $lst.append($(html));
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
