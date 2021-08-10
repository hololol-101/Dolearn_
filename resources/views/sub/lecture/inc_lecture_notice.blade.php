<!-- <hr class="bdt1px mgt3em mgb2em" /> -->

<h3 class="hb1 h1 tac">공지사항</h3>

<!-- cp1bbs4view1 -->
<!-- 게시글 항목 item | 댓글 reply | 대댓글 reply2  -->
<div class="cp1bbs4view1">
    @if($noticeInfo==null)
        <div>
            등록된 공지사항이 없습니다.
        </div>

    @else
    <input type="hidden" value="{{ $noticeInfo->idx }}" id="noticeIdx">
    <!-- 게시글 -->
    <div class="w1 item">
        <div class="w1w1">
            <div class="f1">
                <span class="f1p1">
                    @if($noticeInfo->save_profile_image=='')
                        <img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
                    @else
                        <img src="{{ asset('storage/uploads/profile/'.$noticeInfo->save_profile_name) }}" alt="{{ $noticeInfo->save_profile_name }}" />
                    @endif
                </span>
            </div>
        </div>
        <div class="w1w2">
            <div class="tt1">
                {{ $noticeInfo->title }}
            </div>
            <div class="tg1">
                <span class="t1">{{ $noticeInfo->nickname }}</span>
                <span class="t2">{{ format_date($noticeInfo->write_at) }}</span>
            </div>
            <div class="tg2">
                {!! $noticeInfo->content !!}
            </div>
            <div class="eg1">
                <a href="javascript:void(0);" class="cp1like1" onclick="boardLike(this)"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">{{ $lectureLike }}</span></a>
                <!-- cp1menu1 -->
                <div class="cp1menu1 toggle1s1">
                    <strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
                    <div class="cp1menu1c toggle-c">
                        <a href="#layer1report1post1" class="b2 report toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
                    </div>
                </div>
                <!-- /cp1menu1 -->
            </div>
        </div>
    </div>
    <!-- /게시글 -->
    <!-- 댓글작성 -->
    <div class="w1 item reply">
        <textarea rows="3" cols="80" title="댓글작성" class="w100 type1"></textarea>
        <div class="tar">
            <button type="submit" class="button submit semismall" onclick="enrollEvent(this)" value="N">등록하기</button>
        </div>
    </div>
    <!-- /댓글작성 -->
    <!-- 댓글 -->
    @foreach ( $lectureNoticeCommentList as $lectureNoticeComment )
        <div class="w1 item reply">
            <div class="w1w1">
                <div class="f1">
                    <span class="f1p1">
                        @if($lectureNoticeComment->save_profile_image!='')
                            <img src="{{ asset('storage/uploads/profile/'.$lectureNoticeComment->save_profile_image) }}" alt="이미지 없음" />
                        @else <img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
                        @endif
                    </span>
                </div>
            </div>
            <div class="w1w2">
                <div class="tg1">
                    <span class="t1">{{ $lectureNoticeComment->nickname }}</span>
                    <span class="t2">{{ format_date($lectureNoticeComment->writed_at ) }}</span>
                </div>
                <div class="tg2">
                    {{  $lectureNoticeComment->content  }}
                </div>
                <div class="eg1">
                    <a href="javascript:void(0)" class="cp1like2" onclick="likeClick(this)" data-value="comment"><span class="cp1like2t1 blind">좋아요</span> <span class="cp1like2t2">{{ $lectureNoticeComment->likes }}</span></a>
                    <!-- cp1menu1 -->
                    <div class="cp1menu1 toggle1s1">
                        <strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
                        <div class="cp1menu1c toggle-c">
                            <a href="javascript:void(0)" rel="noopener" title="새 창" class="b2 report" onclick="reportClick(this)"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
                        </div>
                    </div>
                    <!-- /cp1menu1 -->
                </div>
                <!-- toggle1s1 -->
                <div class="toggle1s1">
                    <a href="javascript:void(0);" class="b1 toggle-b fsS2">답글</a>
                    <div class="toggle-c">
                        <textarea rows="3" cols="80" title="대댓글작성" class="w100 type1"></textarea>
                        <div class="tar">
                            <input type="hidden" value="{{ $lectureNoticeComment->idx }}">
                            <button type="button" class="button toggle-close secondary semismall mgr05em">취소</button>
                            <button type="submit" class="button submit semismall"  onclick="enrollEvent(this)" value="Y">등록</button>
                        </div>
                    </div>
                </div>
                <!-- /toggle1s1 -->
                <!-- toggle1s2 -->
                @php
                $keys = array_keys( array_column($recommentList, 'reply_id'),  $lectureNoticeComment->idx);
                @endphp
                @if(count($keys)>0)
                <div class="toggle1s2">
                    <a href="javascript:void(0);" class="b1 toggle1s2-b cp1switch2 switch fsS2">
                        <span class="cp1switch2-t1 sw-off">답글 보기</span>
                        <span class="cp1switch2-t1 sw-on">답글 숨기기</span>
                        <i class="ic1"></i>
                    </a>
                    <div class="toggle1s2-c">

                    @foreach ( $keys as $key)
                        <!-- 대댓글 -->
                        <div class="w1 item reply2">
                            <div class="w1w1">
                                <div class="f1">
                                    <span class="f1p1">
                                        @if($recommentList[$key]->save_profile_image!=''||$recommentList[$key]->save_profile_image!=null)
                                            <img src="{{ asset('storage/uploads/profile/'.$recommentList[$key]->save_profile_image) }}" alt="이미지 없음" />
                                        @else <img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="w1w2">
                                <div class="tg1">
                                    <span class="t1">{{ $recommentList[$key]->nickname }}</span>
                                    <span class="t2">{{ format_date($recommentList[$key]->writed_at) }}</span>
                                </div>
                                <div class="tg2">
                                    {{ $recommentList[$key]->content }}
                                </div>
                                <div class="eg1">
                                    <input type="hidden" value="{{ $recommentList[$key]->idx }}">
                                    <a href="javascript:void(0)" class="cp1like2" onclick="likeClick(this)" data-value="recomment"><span class="cp1like2t1 blind">좋아요</span> <span class="cp1like2t2">{{ $recommentList[$key]->likes }}</span></a>
                                    <div class="cp1menu1 toggle1s1">
                                        <strong><a href="javascript:void(0);" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
                                        <div class="cp1menu1c toggle-c">
                                            <a href="javascript:void(0)" rel="noopener" title="새 창" class="b2 report" onclick="reportClick(this)"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
                                        </div>
                                    </div>
                                    <!-- /cp1menu1 -->
                                </div>
                            </div>
                        </div>
                        <!-- /대댓글 -->
                    @endforeach
                    </div>
                </div>
                @endif
                <!-- /toggle1s2 -->
            </div>
        </div>
    @endforeach
    <!-- /댓글 -->

    @endif
</div>
<!-- /cp1bbs4view1 -->


<!-- infomenu1 -->
<div class="infomenu1">

    <!-- pagination -->
    <div class="pagination" title="페이지 수 매기기">
        {!! $noticePage !!}
    </div>
    <!-- /pagination -->

    <!-- <p class="left">
        <a href="?" onclick="history.go(-1); return false;" class="button default">이전</a>
    </p>
    <p class="right">
        <a href="?" class="button">글작성</a>
    </p> -->

</div>
<!-- /infomenu1 -->
@include('manage.lecture.commentlist')
@php
    $page = isset($_GET['page'])?$_GET['page']:1;
@endphp


<!-- /infomenu1 -->
<script>
function pageClick(obj){
    var my = obj;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('sub.lecture.lecture_notice') }}",
        data: {
            'lectureID': {{ $lectureDetail->idx }},
            'page':$(my).html()
        },
        success: (data) => {
            $('.pagination').empty().append(data.noticePage);
            $('.cp1bbs4view1').empty().append(data.html);

        }, error: function(response) {
            console.log(response);
        }
    })
}
function enrollEvent(obj){
    var my = obj;
    var content = $(my).parent().siblings('textarea').val();
    var value = $(my).val();
    var idx = $(my).siblings('input[type="hidden"]').val();
    if(typeof(idx) =="undefined") idx = 0;
    @if (Auth::check())
        if(content==''){
            alert("내용을 입력해주세요.");
            return false;
        }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: 'json',
        url : "{{ route('sub.lecture.lecture_notice_comment_enroll') }}",
        data: {
            'postId': $('#noticeIdx').val(),
            'parentId': idx,
            'postType':"lecture_notice",
            'content': content,
            'isReply': value
        },
        success : (result) => {
            $('.cp1bbs4view1').empty().append(result.html).trigger("create");
            // $('#commentPage').empty().append(result.pageIndex['htmlCode']);
        }
    });
    @else
        alert("로그인 후 이용해주세요.");
    @endif
}
function boardLike(obj){
    var my = $(obj);
    var likeNum = my.find('.cp1like1t2').text();
    var idx =$('#noticeIdx').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: 'json',
        url: "{{ route('notice.like') }}",
        data: {
            'writingId':idx,
            'programId':"lecture_notice"
        },
        success: (data) => {
            if(data.status =="like"){
                my.find('.cp1like1t2').text(parseInt(likeNum)+1);
            }else{
                my.find('.cp1like1t2').text(parseInt(likeNum)-1);
            }
        }, error: function(response) {
            console.log(response);
        }
    })
}

$('#reportButton').on("click", function(){
    alert("hello");
    $('#layer1report1post1').addClass('on');
    $('#layer1report1post1').css('disable', '')
})

$('#layer1report1post1').find(':button').on('click', function(){
    var my = $('#layer1report1post1');
    var idx =$('#noticeIdx').val();

    var content = $('input[name="★1radio2"]:checked').siblings('label').text()
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
        url : "{{ route('report.report') }}",
        data: {
            'type':'lecture_notice',
            'idx':idx,
            'content': content
        },
        success : (data) => {
            if(data.status=="success"){
                alert("신고접수가 완료되었습니다.")
            }else{
                alert("이미 신고접수를 하셨습니다.")
            }
            $('#layer1report1post1').removeClass('on');
            $('#layer1report1post1').css('disable', 'none')

        }
    });
})
$('.lightbox .ic1').on("click", function(){
    $('#layer1report1post1').removeClass('on');
            $('#layer1report1post1').css('disable', 'none')
})
</script>
