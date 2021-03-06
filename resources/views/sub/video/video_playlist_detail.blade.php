<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210208 | @m | 요구반영. 결함개선. 고도화.
 * ~20210208~20210216~20210217 | @m |
 * 20210406 | @m | 요구반영
 */
-->
@extends('master_sub')

@section('title', '영상보관함 - 재생목록 상세')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- cp1row1 -->
<div class="cp1row1">
	<div class="column1">
		<a href="{{ route('sub.video.video_playlist') }}" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
	</div>
	<div class="column2">
	</div>
</div>
<!-- /cp1row1 -->


<!-- cp1flist3 -->
<div class="cp1flist3">
	<div class="hg1">
		<h3 class="h1">{{ $playlistDirectoryInfo->title }}</h3>
		<span class="t1">총 영상 {{ $playlistDirectoryInfo->video_cnt }}개</span>
	</div>
	<ul class="lst1">
        @foreach ($playlistVideoList as $playlistVideo)
        <li class="li1">
			<div class="w1">
				<div class="control move" title="끌어서 놓기로 순서 이동">
					<b class="b1 prev"><span class="b1t1">이전</span></b>
					<b class="b1 next"><span class="b1t1">다음</span></b>
				</div>
				<div class="w1w1">
					<a href="{{ route('learning2.main', ['uid' => $playlistVideo->uid]) }}" class="a1">
						<div class="a1w1">
                            <div class="f1">
                                <span class="f1p1">
                                    <img src="https://img.youtube.com/vi/{{ $playlistVideo->uid }}/mqdefault.jpg" alt="{{ $playlistVideo->subject }}">
                                </span>
                            </div>
						</div>
						<div class="a1w2">
							<div class="t1">
								{{ $playlistVideo->subject }}
							</div>
							{{-- <span class="t2">
								노트 {{ $playlistVideo->note_sum }}개
							</span> --}}
							<div class="t3">
								{{ $playlistVideo->channel }} · 조회수 {{ $playlistVideo->hit_cnt }}회
							</div>
						</div>
					</a>
				</div>
				<div class="w1w2">
					<div class="eg1">
						<a href="#layer1playlist1move1" class="a2 toggle popup_move_playlist" data-idx="{{ $playlistVideo->idx }}"><i class="a2ic1"></i> <span class="a2t1">목록이동</span></a>
						<a href="javascript:void(0);" class="a2 del" onclick="deletePlaylistVideo('{{ $playlistVideo->idx }}')"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
					</div>
				</div>
			</div>
		</li>
        @endforeach
	</ul>
</div>
<!-- /cp1flist3 -->


<!-- (레이어팝업.재생목록이동) -->
@include('sub.video.inc_layer_playlist_move')

<script>/*<![CDATA[*/
		$(function(){
			// 레이어팝업 템플릿 바로 확인
			// $('[href="#layer1playlist1move1"]').first().triggerHandler('click');
		});
/*]]>*/</script>


<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 영상 순서 변경 샘플 | 20210216. @m
		 * 이거 사용안하고 아래 드래그앤드롭 기능을 사용함
		 */
		(function(){
			var my = '.cp1flist3';
			// 이전 클릭
			$(my).on('click', '.b1.prev', function(e){
				e.preventDefault();
				var $myItem = $(this).closest('.li1'),
					$prevItem = $myItem.prev();
				if( !!$prevItem.length ){
					$prevItem.before( $myItem );
				}else{
					alert('영상 순서 변경을 할 수 없습니다.')
				}
			});
			// 다음 클릭
			$(my).on('click', '.b1.next', function(e){
				e.preventDefault();
				var $myItem = $(this).closest('.li1'),
					$nextItem = $myItem.next();
				if( !!$nextItem.length ){
					$nextItem.after( $myItem );
				}else{
					alert('영상 순서 변경을 할 수 없습니다.')
				}
			});
		//})();
		});

	});
/*]]>*/</script>


<script>/*<![CDATA[*/
	$(function(){

		/** ◇◆ 드래그앤드롭(마우스+터치) 순서이동. 20210217. 20210406. @m.
		 * [IE9+]
		 * Use) makeDrag1('.cp1flist3 .lst1');
		 */

		// 호출
		makeDrag1('.cp1flist3 .lst1');

		// 드래그앤드롭 만들기
		function makeDrag1(selector){
			var sy = ey = 0;
			var my = selector,
				item =  '.li1',
				mv = '.control.move';

			// 미래 요소 이벤트 연결
			$(my).on('mousedown touchstart', mv, function(e){
				e.preventDefault(); // img 등 'mousedown' 동작 끊김 방지
				var $c = $(this).closest(item);
				$c.addClass('moving');
				doDragDrop(e, $c);
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
					$c.removeClass('moving');
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

				//var $cs = $c.closest('.lst1').children();
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
<!-- /#body -->
@endsection

@section('script')
<script>
$(function() {
    // 재생목록 이동 레이어 팝업창 띄움
    $('.popup_move_playlist').click(function() {
        var playlistVideoIdx = $(this).data('idx');

        $('#playlist_video_idx').val(playlistVideoIdx);
    });
});

// 재생 목록 영상 삭제
function deletePlaylistVideo(idx) {
    if (confirm('해당 영상을 삭제하시겠습니까?')) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: "{{ route('sub.video.delete_playlist_video') }}",
            // contentType: false,
            // processData: false,
            data: {
                'playlist_video_idx': idx
            },
            success: (response) => {
                if (response.status == 'success') {
                    location.reload();

                } else {
                    alert(response.msg);
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
}
</script>
@endsection
