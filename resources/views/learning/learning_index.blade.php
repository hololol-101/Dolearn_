<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">목차</h2>
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- cp2info1 -->
<div class="cp2info1">
	<div class="w1">
		<div class="w1w1">
			<div class="tg1">
				<div class="t1">
					<span class="t1t1">진도율 :</span>
					<span class="t1t2">@if ($completeVideoCnt > 0) {{ $completeVideoCnt }}강 @else -- @endif</span> <i class="sep">/</i> <span class="t1t3">{{ $totalVideoCnt }}강</span>
					<span class="t1t4">(@if ($totalVideoCnt > 0) {{ round(($completeVideoCnt / $totalVideoCnt) * 100) }}% @else 0% @endif)</span>
				</div>
			</div>
            <a href="#layer1review1" class="b1 toggle" data-send-focus="that">수강후기 작성</a>
            {{-- TODO: 모든 강의 수강 완료 후 후기 작성 버튼 활성화 --}}
            {{-- @if ($completeVideoCnt != $totalVideoCnt)
			<a class="b1" title="비활성">수강후기 작성</a>
            @else
			<a href="#layer1review1" class="b1 toggle" data-send-focus="that">수강후기 작성</a>
            @endif --}}
		</div>
		<div class="w1w2">
			<div class="g1">
				<i class="g1b1" style="width:@if ($totalVideoCnt > 0) {{ round(($completeVideoCnt / $totalVideoCnt) * 100) }}%; @else 0%; @endif"></i>
			</div>
		</div>
	</div>
</div>
<!-- /cp2info1 -->

@php
    $carouselIdx = 0;
    $chapterIdx = 1;
    $videoListIdx = 0;
@endphp

<!-- cp1curriculum2 -->
<div class="cp1curriculum2">
    @foreach ($bchapterList as $bkey => $bchapter)
    <h4 class="h1">Part {{ $bkey + 1 }}. {{ $bchapter->bchap_name }}</h4>
        @foreach ($curriSchapterList[$bkey] as $skey => $schapter)
        <div class="d2">
            <h5 class="h2"><a href="javascript:void(0);">Chap {{ $chapterIdx }}. {{ $schapter->schap_name }}</a></h5>
            <div class="d3">
                <!-- cp1flist8 -->
                <div class="cp1flist8">
                    <div class="w1">
                        <div class="w1w1">
                        </div>
                        <div class="w1w2">
                            <ul class="lst1">
                                @foreach ($curriVideoList[$videoListIdx] as $video)
                                <li class="li1 @if ($video->status == 'complete') check @endif">
                                    <a href="javascript:void(0);" class="g1 tooltip1"><i class="g1p1">{{-- TODO: 채널 이미지로 교체 --}}<img src="{{ asset('assets/images/lib/x3/x3p301.jpg') }}" alt="{{ $video->subject }}" class="w100 round" /></i><span class="g1t1 tooltip1c">{{ $video->channel }}</span></a>
                                    @php
                                        $format = '';
                                        if (date("H", strtotime($video->video_len)) >= 1) {
                                            $format = 'H:i:s';
                                        } else {
                                            $format = 'i:s';
                                        }
                                        $videoLen = date($format, strtotime($video->video_len));
                                    @endphp
                                    <a href="javascript:void(0);" class="a1" video_id="{{ $video->uid }}" data-idx="" onclick="onClickVideoList('{{ $video->uid }}')"><span class="t1">{{ $video->new_video_title }}</span><span class="t2">{{ $videoLen }}</span></a>
                                </li>
                                @endforeach
                                {{-- <li class="li1 check">
                                    <a href="javascript:void(0);" class="g1"><i class="g1ic1"></i></a>
                                    <a href="javascript:void(0);" class="a1"><span class="t1">1차 과제 - 무슨무슨 실습파일</span></a>
                                </li>
                                <li class="li1">
                                    <a href="javascript:void(0);" class="g1"><i class="g1ic1"></i></a>
                                    <a href="javascript:void(0);" class="a1"><span class="t1">PART1 마무리 시험</span></a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /cp1flist8 -->
            </div>
        </div>
        @php
            $carouselIdx++;
            $chapterIdx++;
            $videoListIdx++;
        @endphp
        @endforeach
    @endforeach
</div>
<!-- /cp1curriculum2 -->

<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 커리큘럼.아코디언. 20210318. @m.
		 */
		(function(){
			var my = '.cp1curriculum2',
				item = '.d2',
				b = '.h2',
				c = '.d3';
			$(my).on('click', b, function(e){
				e.preventDefault();
				//$(this).closest(item).find(c).slideToggle(); // 나만 활성 토글
				// 나는 활성 형제는 비활성
				if( $(this).closest(item).find(c).is(':hidden') ){
					$(this).closest(item).addClass('on').siblings().removeClass('on');
					$(this).closest(item).find(c).slideDown().end().siblings().find(c).slideUp();
				}else{
					$(this).closest(item).removeClass('on');
					$(this).closest(item).find(c).slideUp();
				}
			});

		})();

		/** ◇◆ 미래클래스on활성비활성. 20210325. @m.
		 */
		var my = '.cp1flist8',
			item = '.li1';
		$(my).on('click', item, function(e){
			e.preventDefault();
			$(my).find(item).removeClass('on');
			$(this).addClass('on');
		});

        // 20210521. 토글 버튼이 Ajax 로 불러와 기능이 안되서 지연 재호출
        setTimeout(function(){
            MJS.doToggle();
        }, 100);

        // srcUrl = $("#video_id").val();
        // alert($('.lst1').find( '[video_id*="'+srcUrl+'"]' ).attr('data-idx'));
	});

    // 목차의 강의 영상 리스트 클릭 시 해당 영상으로 전환
    function onClickVideoList(videoId) {
        $("#video_id").val(videoId);
        $('#watch_video').load('/learning/watch_video?idx=<?= $_GET['idx'] ?>&video_id=' + videoId);
    }

    // 수강 후기 작성
    function saveReview() {
        if ($('#rating').val() == 0) {
            alert('평점을 선택해주세요.');
            return false;
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: "{{ route('learning.save_review') }}",
            data: {
                'lecture_idx': '{{ $_GET['idx'] }}',
                'rating': $('#rating').val(),
                'review_content': $('#review_content').val()
            },
            success: (data) => {
                if (data.status == 'success') {
                    // alert('done!');
                    alert('후기 등록이 완료되었습니다.\n정성스런 후기 남겨주셔서 감사합니다.');

                } else if (data.status = 'exist') {
                    alert('이미 후기를 남겨주셨네요!\n후기는 한 번만 등록 가능합니다.');

                } else {
                    alert('후기 등록에 실패했습니다.\n관리자에게 문의 바랍니다.');
                    // console.log('code: ' + data.code + '\nmessage: ' + data.msg);
                }

                $('#review_content').text('');
                $('a[href*="#layer1review1"]').triggerHandler('click');
            },
            error: function(request, status, error) {
                //
            },
        });

    }

/*]]>*/</script>

</div>
<!-- /aside_content -->
