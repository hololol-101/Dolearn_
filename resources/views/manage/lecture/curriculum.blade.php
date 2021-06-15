<!--
/**
 * SubPage Template
 * 20210219 | @m | 최초 등록
 * 20210224 | @m | 요구반영. 결함개선. 고도화.
 * ~20210224 | @m |
 */
-->
@extends('master_manage')

@section('title', '강좌관리상세 - 커리큘럼')

@section('content')

<? $d1n = '1'; $d2n = '3'; // 1차2차활성 ?>

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
	<div class="hg1">
		<i class="ic1"></i>
		<h2 class="h1">커리큘럼</h2>
	</div>
	<div class="eg1">
		{{-- <a href="javascript:void(0);" class="b2 button primary">전체 설정 저장</a> --}}
		<a href="{{ route('manage.lecture.curriculum_modify', ['idx' => $lectureInfo->idx, 'is_free' => $lectureInfo->free_yn]) }}" class="b1 button">수정하기</a>
	</div>
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


<!-- <p class="tar"><i class="required" title="필수항목">*</i> 는 필수 입력 <span class="dpib">항목입니다.</span></p> -->


<script>/*<![CDATA[*/
	$(function(){
		/** ◇◆ 툴팁 고도화. 20210218. @m.
		 */
		// 툴팁 z-index 는 select option 보다 위에 올 수 없어 아래처럼 처리
		$('.tooltip1').hover(function(){
			$('select').blur();
		});
	});
/*]]>*/</script>


<!-- cp1curriculum1 type2 ( 좌측에 끌어서놓기 없음, 우측에 미리보기만 있음 ) -->
<div class="cp1curriculum1 type2">
	<div class="dpf fww jcsb aife mgb1em">
		<strong class="tt1 mgb0 mgr05em fw5 fsB8 vam">커리큘럼</strong>
		<div class="mgt025em mgb025em fsS2">대단원&gt; 소단원&gt; 강의 순으로 선택하면 강의 미리보기가 보여지며 강사 한마디를 작성 할 수 있습니다.</div>
	</div>
	<div class="w1">
		<div class="w1w w1w1">
			<strong class="tt2">대단원(PART)</strong>
			<div class="cont fscroll1-xy">
				<div class="w1item" id="div_bchap">
                    <!-- 대단원 추가 -->
                    @if (isset($bchapterList))
                        @foreach ($bchapterList as $key => $bchapter)
                        <div class="item" style="cursor: pointer">
                            <div class="tg1">
                                <span class="t1 form-static1" bchap_id="{{ $bchapter->bchap_id }}">{{ $bchapter->bchap_name }}</span>
                            </div>
                        </div>
                        @endforeach
                    @endif
				</div>
			</div>
		</div>
		<div class="w1w w1w2">
			<strong class="tt2">소단원(CHAPTER)</strong>
			<div class="cont fscroll1-xy">
                <!-- 소단원 default -->
                <div class="w1item" id="div_schap_default">
                    <div class="item2" style="margin-left: 15px">
                        <div class="tg1">
                            <span class="t1 form-static1">대단원을 선택해주세요.</span>
                        </div>
                    </div>
                </div>
				<div class="w1item" id="div_schap">
                    <!-- 소단원 추가 -->
                    @if (isset($schapterList))
                        @foreach ($schapterList as $key => $schapter)
                        <div class="item" style="cursor: pointer">
                            <div class="tg1">
                                <span class="t1 form-static1" bchap_id="{{ $schapter->bchap_id }}" schap_id="{{ $schapter->schap_id }}">{{ $schapter->schap_name }}</span>
                            </div>
                        </div>
                        @endforeach
                    @endif
				</div>
			</div>
		</div>
		<div class="w1w w1w3">
			<strong class="tt2">강의</strong>
			<div class="cont fscroll1-xy">
                <!-- 강의 default -->
                <div class="w1item" id="div_video_default">
                    <div class="item2" style="margin-left: 15px">
                        <div class="tg1">
                            <span class="t1 form-static1">소단원을 선택해주세요.</span>
                        </div>
                    </div>
                </div>
				<div class="w1item" id="div_video">
                    <!-- 강의 추가 -->
                    @if (isset($videoInfoList))
                        @foreach ($videoInfoList as $key => $videoInfo)
                        <div class="item" style="cursor: pointer">
                            <div class="tg1">
                                <span class="t1 form-static1" bchap_id="{{ $videoInfo->bchap_id }}" schap_id="{{ $videoInfo->schap_id }}" video_id="{{ $videoInfo->uid }}" analysis_yn="{{ $videoInfo->analysis_yn }}" preview_yn="{{ $videoInfo->preview_yn }}">{{ $videoInfo->new_video_title }}</span>
                            </div>
                            <div class="eg1">
                                @if ($videoInfo->preview_yn == 'Y')
                                <a href="javascript:void(0);" class="b1 preview tooltip1"><span class="tooltip1c">미리보기 영상</span></a>
                                @else
                                <a class="b1 preview"><span class="b1t1">미리보기 영상 없음</span></a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /cp1curriculum1 -->


<script>/*<![CDATA[*/
	$(function(){

		// 미래 항목 클릭 활성. 20210224. @m.
		$('.cp1curriculum1 .w1w').on('click', '.item', function(){
			if( !!$(this).closest('.w1w1').length || !!$(this).closest('.w1w2').length || !!$(this).closest('.w1w3').length ){
				$(this).addClass('on').siblings().removeClass('on');

                if( !!$(this).closest('.w1w1').length ){  // 대단원이면
                    var _bchapId = $('#div_bchap div.on').find('.t1').attr('bchap_id');

                    $('#div_schap_default').hide();
                    $('#div_video_default').show();
                    $('#curriculum_info').hide();

                    $('#div_schap').find('.t1').each(function() {
                        if ($(this).attr('bchap_id') == _bchapId) {
                            $(this).parents('.item').show();
                        } else {
                            $(this).parents('.item').hide();
                        }
                    });

                    $('#div_video').find('.item').each(function() {
                        $(this).hide();
                    });

                    // $('#dropZone').show();

                } else if (!!$(this).closest('.w1w2').length) {  // 소단원이면
                    var _schapId = $('#div_schap div.on').find('.t1').attr('schap_id');

                    $('#div_video_default').hide();
                    $('#curriculum_info').hide();

                    $('#div_video').find('.t1').each(function() {
                        if ($(this).attr('schap_id') != _schapId) {
                            $(this).parents('.item').hide();
                        } else {
                            $(this).parents('.item').show();
                        }
                    });

                } else {  // 강의이면
                    var lectureIdx = '{{ $_GET['idx'] }}';
                    var videoId = $('#div_video div.on').find('.t1').attr('video_id');

                    getCurriculumInfo(lectureIdx, videoId);
                }
			}
		});

	});
/*]]>*/</script>


<!-- 강사 한 마디 작성, 영상 미리보기 -->
<div id="curriculum_info">
<div class="hgroup2">
	<h3 class="hb1 h2 mgt0" id="video_title"></h3>
</div>

{{-- 강사 한 마디 작성 --}}
<!-- cp1write1 -->
<div class="cp1write" id="show_editor">
	{{-- <div class="editor"></div> --}}
    {{-- <div class="mgt3em mgb3em tac">개발자 온라인 웹문서 편집기 처리 필요!</div> --}}
    <textarea class="editor" id="editor">
    </textarea>
</div>

<script>/*<![CDATA[*/
	$(function(){
        // CKEditor load
        CKEDITOR.replace('editor', {
            height: 200,
            filebrowserUploadUrl: "{{ route('ck_file_upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
	});
/*]]>*/</script>

<!-- /cp1write1 -->
<div class="tar">
	<button type="button" class="button black" onclick="saveComment()">저장하기</button>
</div>

<br />

<!-- w1video -->
<div class="w1video">
	<div class="flex1wrap1" id="preview_video">
	</div>
</div>
<!-- /w1video -->
</div>
<!-- cp1write1 -->
</div>
<!-- /강사 한 마디 작성, 영상 미리보기 -->

</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection

@section('script')
<script>
$(function() {
    // 페이지 로딩 시 소단원 목록 숨김
    $('#div_schap').find('.item').each(function() {
        $(this).hide();
    });

    // 페이지 로딩 시 강의 영상 목록 숨김
    $('#div_video').find('.item').each(function() {
        $(this).hide();
    });

    // 강사 한 마디, 영상 미리보기 숨김
    $('#curriculum_info').hide();
});

// 커리큘럼 조회 : 강사 한마디 조회, 등록, 수정 및 미리보기 영상
function getCurriculumInfo(lectureIdx, videoId) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('manage.lecture.get_curriculum_info') }}",
        data: {
            'lecture_idx': lectureIdx,
            'video_id': videoId
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                var curriculumInfo = JSON.parse(data.curriculumInfo);
                var comment = '';

                // console.log(curriculumInfo);

                // 강의 영상 제목 변경
                $('#curriculum_info').show();
                $('#video_title').empty();
                $('#video_title').append(curriculumInfo.new_video_title);

                // 강사 한 마디 변경
                $('#show_editor').empty();

                if (curriculumInfo.comment != null) {
                    comment = curriculumInfo.comment;
                }

                $('#show_editor').append('<textarea class="editor" id="editor">' + comment + '</textarea>');

                CKEDITOR.replace('editor', {
                    height: 200,
                    filebrowserUploadUrl: "{{ route('ck_file_upload', ['_token' => csrf_token()]) }}",
                    filebrowserUploadMethod: 'form'
                });

                // 영상 미리보기 변경
                $('#preview_video').empty();
                $('#preview_video').append('<iframe name="youtube_fr" id="display_fr" style="width:100%;height:100%;border:0;" src="https://www.youtube.com/embed/' + curriculumInfo.uid + '?controls=0&start=0&end=15&modestbranding=1&showinfo=0&rel=0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');

                // 미리보기 여부가 Y 이면 영상 미리보기, N 이면 영상 썸네일?
                // if (curriculumInfo.preview_yn == 'Y') {
                //     $('#preview_video').append('<iframe name="youtube_fr" id="display_fr" style="width:100%;height:100%;border:0;" src="https://www.youtube.com/embed/' + curriculumInfo.uid + '?controls=0&start=0&end=15&modestbranding=1&showinfo=0&rel=0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
                // } else {
                //     $('#preview_video').append('<img src="https://img.youtube.com/vi/' + curriculumInfo.uid + '/mqdefault.jpg" alt="' + curriculumInfo.subject +'">');
                // }

            }
        },
        error: function(request, status, error) {
            console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
        },
        complete: function(data) {
            //
        }
    });
}

// 강사 한 마디 저장
function saveComment() {
    var lectureIdx = '{{ $_GET['idx'] }}';
    var videoId = $('#div_video div.on').find('.t1').attr('video_id');
    var comment = CKEDITOR.instances.editor.getData();

    console.log(comment);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: "{{ route('manage.lecture.save_comment') }}",
        data: {
            'lecture_idx': lectureIdx,
            'video_id': videoId,
            'comment': comment
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                alert('저장이 완료되었습니다.');
            } else {
                alert('code: ' + data.code + '\nmsg: ' + data.msg);
            }
        },
        error: function(request, status, error) {
            console.log('code: ' + request.status + '\nmessage: ' + request.responseText + '\nerror: ' + error);
        },
        complete: function(data) {
            //
        }
    });
}
</script>
@endsection
