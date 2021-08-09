<!-- cp1layer1lightbox1 : 레이어박스  -->
<div class="cp1layer1lightbox1" id="layer1notice1write1">
	<div class="wrap1">
		<!-- lightbox -->
        <form action="{{ route('manage.lecture.create_notice') }}" method="POST" enctype="multipart/form-data">
            @csrf

        <div class="lightbox">
			<div class="wrap2">
                <input type="hidden" name="idx" value="" id="postIdx">
                <input type="hidden" name="lectureIdx" value="{{ $lectureInfo->idx }}">
				<!-- ★★(공지사항 생성·수정) -->
                <div class="hg1">
					<h3 class="h1">공지사항 생성·수정</h3>
					<a href="#layer1notice1write1" class="b1 close"><i class="ic1"></i> <span class="blind">공지사항 생성·수정 창 닫기</span></a>
				</div>
				<div class="cont">
					<input type="text" id="noticeTitle" placeholder="제목을 입력하세요." name="noticeTitle" class="w100"/>

					<!-- cp1write1 -->

                    <div class="form1item1">
                        <!-- cp1write1 -->

                        <div class="cp1write1">
                            <textarea class="editor" id="editor" name="noticeContent" >

                            </textarea>
                        </div>
                        <!-- /cp1write1 -->
                        {{-- <script src="{{ asset('assets/js/ckeditor_load.js') }}"></script> --}}

                    </div>
					<!-- /cp1write1 -->
					<input type="file" id = "file" title="첨부파일" name ="file01" class="w100" onclick="$('#filename0').val(''); $('#filename1').text('')" />
                    <input type="hidden" id="filename0" name="filename" value="">
                    <div id="filename1">
                    </div>

					<!-- infomenu1 -->
					<div class="infomenu1">
						<div class="center">
							<button type="submit" class="button submit wide" onclick="return checkNull()">저장하기</button>
							<a href="#layer1notice1write1" class="button secondary wide close mgl05em">취소하기</a>
						</div>
					</div>
					<!-- /infomenu1 -->
				</div>
				<!-- /★★(공지사항 생성·수정) -->
			</div>
		</div>
    </form>

        <!-- /lightbox -->
	</div>
</div>
<!-- /cp1layer1lightbox1 -->
<script>
    function checkNull(){
        var my=$('.lightbox');
        console.log($('#editor').text());
        if(my.find(":input[type='text']").val()==''){
            alert('제목을 입력하세요.');
            return false;
        }
    }
</script>
