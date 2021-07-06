<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210316 | @m | 요구반영. 결함개선. 고도화.
 * ~20210316 | @m |
 * 20210324 | @m | 신고하기 레이어팝업 추가
 */
-->
@extends('master_sub')

@section('title', '커뮤니티 - 1:1 문의 상세')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- width1wrap1 -->
<div class="width1wrap1">


<!-- cp1view2 -->
<div class="cp1view2">


	<!-- cp1row1 -->
	<div class="cp1row1">
		<div class="column1">
			<a href="javascript:history.back();" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a>
		</div>
		<div class="column2">
		</div>
	</div>
	<!-- /cp1row1 -->


	<!-- cp1bbs4view1 type2 -->
	<!-- 게시글 항목 item | 댓글 reply | 대댓글 reply2  -->
	<div class="cp1bbs4view1 type2">
		<!-- 게시글 -->
		<div class="w1 item">
			<div class="w1w1">
				<div class="f1">
					<span class="f1p1">
                        @if (Auth::user()->save_profile_image!='')
                        <img src="{{ asset('storage/uploads/profile/'.Auth::user()->save_profile_image) }}" alt="이미지 없음" />
                        @else
						<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
                        @endif
					</span>
				</div>
			</div>
			<div class="w1w2">
				<div class="tt1">
					{{ $qaInfo->question_title }}
				</div>
				<div class="tg1">
					<span class="t1">{{ Auth::user()->nickname }}</span>
					<span class="t2">{{ format_date($qaInfo->question_writed_at) }}</span>
				</div>
                <div class="attach1">
                    @if ($qaInfo->question_attach_file!='')
                    <ul>
                    <li><a href="{{ route('serviceinquiry.download_attach_file', ['filename'=>$qaInfo->question_attach_file]) }}" class="filename">{{ $qaInfo->question_attach_file }}</a>
                    <a href="javascript:void(0)" title="바로보기 [새 창]" class="b1 quickview" onclick="openNewPage('{{ asset('storage/uploads/attach/'.$qaInfo->question_attach_file) }}')"><i class="ic1"></i> 바로보기</a></li>
                    </ul>
                    @endif
                    </div>

				<div class="tg2">
                    {!! $qaInfo->question_content !!}
                </div>
				<div class="eg1">
					<a href="#★" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">0</span></a>
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
        @if($qaInfo->status=="complete")
		<!-- 댓글 -->
        <div class="w1 item reply">

			<div class="w1w1">
				{{-- <div class="f1">
					<span class="f1p1">
						<!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
						<img src="{{ asset('assets/images/lib/noimg1face1.png') }}" alt="이미지 없음" />
					</span>
				</div> --}}
			</div>
			<div class="w1w2">
				<div class="tg1">
					<span class="t1">관리자</span>
					<span class="t2">{{ format_date($qaInfo->answer_writed_at) }}</span>
				</div>
                <div class="attach1">
                    @if ($qaInfo->answer_attach_file!='')
                    <ul>
                    <li><a href="{{ route('serviceinquiry.download_attach_file', ['filename'=>$qaInfo->answer_attach_file]) }}" class="filename">{{ $qaInfo->answer_attach_file }}</a>
                    <a href="javascript:void(0)" title="바로보기 [새 창]" class="b1 quickview" onclick="openNewPage('{{ asset('storage/uploads/attach/'.$qaInfo->answer_attach_file) }}')"><i class="ic1"></i> 바로보기</a></li>
                    </ul>
                    @endif
                </div>

				<div class="tg2">
					{!! $qaInfo->answer_content !!}
				</div>
				<div class="eg1">
					<a href="#★" class="cp1like2"><span class="cp1like2t1 blind">좋아요</span> <span class="cp1like2t2">0</span></a>
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
		<!-- /댓글 -->
        @else
        @endif
	</div>
	<!-- /cp1bbs4view1 type2 -->


</div>
<!-- /cp1view2 -->


</div>
<!-- /width1wrap1 -->


 <!-- (레이어팝업) -->
 @include('sub.lecture.inc_layer_report_post')



 <script>
    function openNewPage(url){
        window.open(url, "_blank")
    }
</script>


</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
