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

@section('title', '인사이트 - 랭킹(강사)')

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
	<li class="m1 column"><a href="{{ route('sub.community.ranking', ['type' => 'lecture']) }}" style="min-width:4em;"><span class="t1">강좌</span><i class="ic1"></i></a></li>
	<li class="m2 column on"><a href="{{ route('sub.community.ranking', ['type' => 'instructor']) }}" style="min-width:4em;"><span class="t1">강사</span><i class="ic1"></i></a></li>
	<li class="m3 column"><a href="{{ route('sub.community.ranking', ['type' => 'youtuber']) }}" style="min-width:4em;"><span class="t1">유튜버</span><i class="ic1"></i></a></li>
	</ul>
</div>
<!-- /cp1tabs1 -->


<div class="dpf jcsb aic">
	<h2 class="hb1 h2">지금 뜨는 강사</h2>
	<select class="select" title="선택옵션" >
		<option value="">수강자 수</option>
		{{-- <option value="">응답률</option> --}}
		<option value="">평점</option>
	</select>
</div>


<!-- cp1flist7 -->
<div class="cp1flist7">
	<!-- lst1 -->
	<ul class="lst1">
        @php
            $cnt = 0;
        @endphp
        @foreach ($instructorList as $instructor)
            <li class="li1">
                <a href="{{ route('etc.user_introduction', ['type'=>'instructor', 'user_idx'=>$instructor->id]) }}" class="w1 a1">
                    <div class="w1w1">
                        <div class="w1w1w1">
                            <b class="g1"><span class="g1t1">{{ ++$cnt }}</span></span><span class="g1t2">위</span></b>
                        </div>
                        <div class="w1w1w2">
                            <div class="f1">
                                <span class="f1p1">
                                    @if($instructor->save_profile_image=='')
                                        <img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
                                    @else
                                        <img src="{{ asset('storage/uploads/profile/'.$instructor->save_profile_image) }}" alt="이미지 없음" />
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="w1w1w3">
                            <div class="t1">
                                {{ $instructor->nickname }}
                            </div>
                            <div class="t2">
                                {{ $instructor->introduction }}
                            </div>
                        </div>
                    </div>
                    <div class="w1w2">
                        <div class="w1w2w1">
                            <span class="t3">강좌 평점</span>
                            <span class="t4">@if ($instructor->score_avg!=''){{ number_format($instructor->score_avg, 1) }} @else - @endif</span>
                        </div>
                        <div class="w1w2w2">
                            <span class="t3">수강자 수</span>
                            <span class="t4">@if($instructor->total_student!=''){{ $instructor->total_student }}@else 0 @endif</span>
                        </div>
                        <div class="w1w2w3">
                            <span class="t3">응답률</span>
                            <span class="t4">-</span>
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
<!-- /cp1flist7 -->



<script>/*<![CDATA[*/
	$(function(){
        //더보기 클릭
		var $my = $('.cp1flist7'),
			$more = $('.more', $my),
			$lst = $('.lst1', $my);

        $('.select').on("change", function(){
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    dataType: 'json',
                    url: "{{ route('sub.community.ranking') }}",
                    data: {
                        'type': 'instructor',
                        'sort':  $('.select option:selected').text(),
                    },
                    success: (data) => {
                        if(data.status == 'success'){
                            $('.lst1').empty().append(data.html);
                        }
                        else if(data.status == 'fail'){
                            alert('강사 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                            console.log('code: ' + data.code + '\nmessage: ' + data.msg);
                        }
                        if({{ $totalCnt }} <=$('.li1', $my).length){
                                $more.hide();
                        }else{
                            $more.show();
                        }
                    },
                    error: function(request, status, error) {
                        console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
                    },
                })
            })

		$more.on('click', function(e){
			e.preventDefault();
			$.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'json',
                url: "{{ route('sub.community.ranking') }}",
                data: {
                    'type': 'instructor',
                    'sort': $('.select option:selected').text(),
                    'cnt': $('.li1', $my).length
                },
                success: (data) => {

                    console.log(data.type);
                    console.log( $('.li1', $my).length)

                    if(data.status == 'success'){
                        $('.lst1').append(data.html);
                    }
                    else if(data.status == 'fail'){
                        alert('강사 목록을 조회하는 도중 문제가 발생했습니다.\n관리자에게 문의 바랍니다.');
                        console.log('code: ' + data.code + '\nmessage: ' + data.msg);
                    }
                    //TODO: TOTAL LECTURE < $cnt +5 more 버튼 비활성화
                    if({{ $totalCnt }} <=$('.li1', $my).length){
                        $more.hide();
                    }
                },
                error: function(request, status, error) {
                    console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
                },
            })
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
