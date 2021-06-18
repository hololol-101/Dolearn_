<!-- cp1layer1lightbox1 : 레이어박스  -->
<div class="cp1layer1lightbox1" id="layer1playlist1">
	<div class="wrap1">
		<!-- lightbox -->
		<div class="lightbox">
			<div class="wrap2">


				<!-- ★★(재생 목록) -->
				<div class="hg1">
					<h3 class="h1">재생 목록</h3>
					<a href="#layer1playlist1" class="b1 close"><i class="ic1"></i> <span class="blind">재생 목록 창 닫기</span></a>
				</div>
				<div class="cont">
					<!-- cp1playlist1 -->
					<div class="cp1playlist1">
						<ul class="lst1">
                            @if (isset($playlistDirectoryList))
                                @foreach ($playlistDirectoryList as $playlistDirectory)
                                <li class="li1" directory_idx="{{ $playlistDirectory->idx }}">
                                    <span class="tg1">
                                        <input type="checkbox" name="★1checkbox0"/> <label for="★1checkbox0e0">{{ $playlistDirectory->title }}</label>
                                    </span>
                                    <span class="st1">저장됨</span>
                                </li>
                                @endforeach
                            @endif
						</ul>
                        <input type="hidden" id="playlist_video_id" value="">
						<div class="makelist toggle1s1">
							<a href="javascript:void(0);" class="button block primary toggle-b">+ 새 목록 만들기</a>
							<div class="toggle-c">
								<strong class="tt1">새 목록 만들기</strong>
								<input type="text" value="제목을 입력해주세요. (50자 이하)" placeholder="제목을 입력해주세요. (50자 이하)" title="재생 목록 제목" onfocus="if( this.value == this.defaultValue ) this.value=''; this.select();" onblur="if( this.value=='' ) this.value=this.defaultValue;" class="text">
								<button type="submit" class="b1 button primary">저장하기</button>
								<button type="button" class="b2 button secondary toggle-close">취소하기</button>
							</div>
						</div>


						<script>/*<![CDATA[*/
							$(function(){

								/** ◇◆ 저장하기클릭샘플 | 20210119. @m
								 * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
								 */
								(function(){
									var $my = $('.cp1playlist1'),
										$b = $('.makelist .b1', $my),
										$lst = $('.lst1', $my);
										$input = $('input.text', $my);
									var sn = 999;
									$b.on('click', function(e){
										e.preventDefault();
										++sn;
										var html = '';
										html += '<li class="li1">';
										html += '	<span class="tg1">';
										html += '		<input type="checkbox" name="★1checkbox0" id="★1checkbox0e'+ sn +'" /> <label for="★1checkbox0e'+ sn +'">';
										html += '			'+ $input.val();
										html += '		</label>';
										html += '	</span>';
										html += '	<span class="st1">저장됨</span>';
										html += '</li>';
										$lst.append($(html));
									});
								})();

							});
						/*]]>*/</script>


					</div>
					<!-- /cp1playlist1 -->
				</div>
				<!-- /★★(재생 목록) -->


			</div>
		</div>
		<!-- /lightbox -->
	</div>
</div>
<!-- /cp1layer1lightbox1 -->


<script>/*<![CDATA[*/
	/** ◇◆ 온클래스체크박스 | 20210119. @m.
	 */
	//MJS = window.MJS || {};
	(MJS.doOnClassCheckbox = function(selector){
		var my = selector;
		$(document).on('click', my, function(e){ // 미래 객체
			e.preventDefault();
			e.stopPropagation();
			var $cb = $('input[type="checkbox"]', this);
			// console.log( $cb.prop('checked') );

            var videoId = $('#playlist_video_id').val();
            var directoryIdx = $(this).attr('directory_idx');

			if( $cb.prop('checked') ){
				$cb.prop({'checked':''});
				$(this).removeClass('on');

                // 재생 목록에서 영상 삭제
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    dataType: 'json',
                    url: "{{ route('learning.delete_video') }}",
                    // contentType: false,
                    // processData: false,
                    data: {
                        'video_id': videoId,
                        'directory_idx': directoryIdx
                    },
                    success: (response) => {
                        if (response.status == 'success') {

                        } else if (response.status == 'exist') {
                            alert('이미 재생목록에 추가된 영상입니다.');

                        } else {
                            alert(response.msg);
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });

			}else{
				$cb.prop({'checked':'checked'});
				$(this).addClass('on');

                // 재생 목록에 영상 추가
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    dataType: 'json',
                    url: "{{ route('learning.add_video') }}",
                    // contentType: false,
                    // processData: false,
                    data: {
                        'video_id': videoId,
                        'directory_idx': directoryIdx
                    },
                    success: (response) => {
                        if (response.status == 'success') {

                        } else {
                            alert(response.msg);
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
			}
		});
	})('.cp1playlist1 .li1');
/*]]>*/</script>
