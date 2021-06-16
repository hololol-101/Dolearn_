<!-- cp1layer1lightbox1 : 레이어박스  -->
<div class="cp1layer1lightbox1" id="layer1playlist1write1">
	<div class="wrap1">
		<!-- lightbox -->
		<div class="lightbox">
			<div class="wrap2">


				<!-- ★★(새 재생 목록 만들기) -->
				<div class="hg1">
					<h3 class="h1">새 재생 목록 만들기</h3>
					<a href="#layer1playlist1write1" class="b1 close"><i class="ic1"></i> <span class="blind">새 재생 목록 만들기 창 닫기</span></a>
				</div>
				<div class="cont">
					<!-- cp1playlist1 -->
					<div class="cp1playlist1">
						<div class="makelist">
							<input type="text" id="directory_title" value="제목을 입력해주세요. (50자 이하)" placeholder="제목을 입력해주세요. (50자 이하)" title="재생 목록 제목" onfocus="if( this.value == this.defaultValue ) this.value=''; this.select();" onblur="if( this.value=='' ) this.value=this.defaultValue;" class="text" />
							<button type="submit" class="b1 button primary" onclick="addPlaylistDirectory()">저장하기</button>
							<a href="#layer1playlist1write1" class="b2 button secondary close">취소하기</a>
						</div>
					</div>
					<!-- /cp1playlist1 -->
				</div>
				<!-- /★★(새 재생 목록 만들기) -->


			</div>
		</div>
		<!-- /lightbox -->
	</div>
</div>
<!-- /cp1layer1lightbox1 -->

<script>
// 새 재생목록 디렉터리 생성
function addPlaylistDirectory() {
    var directoryTitle = $('#directory_title').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.video.add_playlist_directory') }}",
        // contentType: false,
        // processData: false,
        data: {
            'directory_title': directoryTitle
        },
        success: (response) => {
            if (response.status == 'success') {
                location.reload();
                // $('[href="#layer1playlist1write1"]').triggerHandler('click');

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
