<!-- cp1layer1lightbox1 : 레이어박스  -->
<div class="cp1layer1lightbox1" id="layer1playlist1move1">
	<div class="wrap1">
		<!-- lightbox -->
		<div class="lightbox">
			<div class="wrap2">


				<!-- ★★(재생 목록 이동) -->
				<div class="hg1">
					<h3 class="h1">재생 목록 이동</h3>
					<a href="#layer1playlist1move1" class="b1 close"><i class="ic1"></i> <span class="blind">재생 목록 이동 창 닫기</span></a>
				</div>
				<div class="cont">
					<!-- cp1playlist1 -->
					<div class="cp1playlist1">
						<ul class="lst1">
                            @foreach ($playlistDirectoryList as $playlistDirectory)
                            <li class="li1">
                                <input type="checkbox" name="check_playlist" directory_idx="{{ $playlistDirectory->idx }}"/>
                                <label for="★1checkbox0e0">{{ $playlistDirectory->title }}</label>
                            </li>
                            @endforeach
						</ul>
                        <input type="hidden" id="playlist_video_idx" value="">
						<button type="submit" class="button primary block" onclick="movePlaylist()">이동하기</button>
					</div>
					<!-- /cp1playlist1 -->
				</div>
				<!-- /★★(재생 목록 이동) -->


			</div>
		</div>
		<!-- /lightbox -->
	</div>
</div>
<!-- /cp1layer1lightbox1 -->

<script>
function movePlaylist() {
    var checkedPlaylistIdxList = [];
    var playlistVideoIdx = $('#playlist_video_idx').val();

    if ($('input[name=check_playlist]:checked').length > 1) {
        alert('재생 목록을 하나만 선택해주세요.');
        return false;
    }

    var checkedPlaylistIdx = $('input[name=check_playlist]:checked').attr('directory_idx');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.video.move_playlist') }}",
        // contentType: false,
        // processData: false,
        data: {
            'playlist_video_idx': playlistVideoIdx,
            'checked_playlist_idx': checkedPlaylistIdx
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
</script>
