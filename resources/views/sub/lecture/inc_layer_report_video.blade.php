<!-- cp1layer1lightbox1 : 레이어박스  -->
<div class="cp1layer1lightbox1" id="layer1report1video1">
	<div class="wrap1">
		<!-- lightbox -->
		<div class="lightbox" style="max-width:445px;">
			<div class="wrap2">


				<!-- ★★(동영상 신고) -->
				<div class="hg1">
					<h3 class="h1">동영상 신고</h3>
					<a href="#layer1report1video1" class="b1 close"><i class="ic1"></i> <span class="blind">동영상 신고 창 닫기</span></a>
				</div>
				<div class="cont">
					<!-- cp1form1itemlist1 -->
					<div class="cp1form1itemlist1">
						<ul class="lst1">
							<li class="li1">
								<input type="radio" name="★1radio1" id="★1radio1e0" /> <label for="★1radio1e0">성적인 영상</label>
							</li>
							<li class="li1">
								<input type="radio" name="★1radio1" id="★1radio1e1" /> <label for="★1radio1e1">유해하거나 폭력적인 행위</label>
							</li>
							<li class="li1">
								<input type="radio" name="★1radio1" id="★1radio1e2" /> <label for="★1radio1e2">스팸 또는 사용자를 현혹하는 영상</label>
							</li>
							<li class="li1">
								<input type="radio" name="★1radio1" id="★1radio1e3" /> <label for="★1radio1e3">영상 품질 및 자막 문제</label>
							</li>
							<li class="li1">
								<input type="radio" name="★1radio1" id="★1radio1e4" /> <label for="★1radio1e4">기타</label>
							</li>
							<!-- <li class="li1">
								<input type="radio" name="★1radio1" id="★1radio1e99" /> <label for="★1radio1e99">일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십일이삼사오륙칠팔구십</label>
							</li> -->
						</ul>
						<button type="button" class="button primary block">신고하기</button>
					</div>
					<!-- /cp1form1itemlist1 -->
				</div>
				<!-- /★★(동영상 신고) -->
                <script>
                    $(function(){
                        var my = $('#layer1report1video1');
                        var close = $('.close', my);
                        my.find(':button').on('click', function(){
                            var content = $('input[name="★1radio1"]:checked').siblings('label').text()
                            if(content ==''){
                                alert('신고사유를 선택해주세요!');
                                return false;
                            }
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: 'POST',
                                dataType: 'json',
                                url: '{{ route('report.report') }}',
                                data: {
                                    'type': 'lecture',
                                    'idx': '{{ $lectureDetail->idx }}',
                                    'content':content
                                },
                                success: (data) => {
                                    if(data.status=="success"){
                                        alert("신고접수가 완료되었습니다.")
                                    }else{
                                        alert("이미 신고접수를 하셨습니다.")
                                    }
                                    close.trigger('click');
                                }
                            });
                        })
                    })
                </script>

			</div>
		</div>
		<!-- /lightbox -->
	</div>
</div>
<!-- /cp1layer1lightbox1 -->
