<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210118 | @m | 요구반영. 결함개선. 고도화.
 * ~20210121 | @m |
 */
-->
@extends('master_sub')

@section('title', '영상상세')

@section('content')
<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">


<!-- width1wrap1 -->
<div class="width1wrap1">

<!-- cp1view1 type2 -->
<div class="cp1view1 type2">

	<div class="width1wrap2">
		<a href="javascript:history.back();" class="cp1b1close1"><i class="ic1"></i><span class="t1">닫기</span></a>
	</div>

	<!-- w1video -->
	<div class="w1video">
		<div class="flex1wrap1">
            <iframe name="youtube_fr" id="display_fr" width="100%" height="100%" src="https://www.youtube.com/embed/{{ $videoDetail->uid }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			{{-- <video class="video" controls="controls" poster="{{ asset('assets/images/lib/x2/x2p1001.jpg') }}" src="http://content.jwplatform.com/videos/HkauGhRi-640.mp4">
				<div class="alternativeContent">
					<p>Your browser does not support the video element.</p>
				</div>
			</video> --}}
			<!-- <i class="ic1 play">Play</i> -->
		</div>
	</div>
	<!-- /w1video -->

	<div class="w1">
		<div class="tg1">
			<strong class="t1">{{ $videoDetail->title }}</strong>
		</div>
		<div class="w1w1">
			<div class="tg4">
				<span class="t4"><span class="t4t1">{{ $videoDetail->channel }}</span> <span class="t4t2">· 조회수 {{ $videoDetail->hit_cnt }}회</span></span>
			</div>
		</div>
		<div class="w1w2">
			<div class="eg1">
				<a href="#★" class="cp1like1"><span class="cp1like1t1">좋아요</span> <span class="cp1like1t2">{{ $videoDetail->like_cnt }}</span></a>
				<!-- cp1menu1 -->
				<div class="cp1menu1 toggle1s1">
					<strong><a href="#★" class="b1 toggle-b"><i class="b1ic1"></i><span class="b1t1">(부가메뉴 여닫기)</span></a></strong>
					<div class="cp1menu1c toggle-c">
						<a href="?#★" target="_blank" rel="noopener" title="새 창" class="b2 report"><i class="b2ic1"></i><span class="b2t1">신고하기</span></a>
						<a href="#layer1playlist1" class="b2 add toggle" data-send-focus="that"><i class="b2ic1"></i><span class="b2t1">재생목록 <span class="blind">추가</span></span></a>
					</div>
				</div>
				<!-- /cp1menu1 -->
			</div>
		</div>
	</div>


</div>
<!-- /cp1view1 -->


<!-- cp1view2 -->
<div class="cp1view2">


<!-- even-grid -->
<div class="even-grid float-left gap2pct">
	<div class="small-6 column">
		<a href="#cp1caption1" class="cp1switch1 switch toggle fw4">
			<span class="t1 sw-off">자막 OFF</span>
			<span class="t1 sw-on">자막 ON</span>
			<i class="ic1"></i>
		</a>
	</div>
	<div class="small-6 column tar">
		<a href="?#★" class="button ic1t1"><i class="ic1 download"></i><span class="t1">다운로드</span></a>
	</div>
</div>
<!-- /even-grid -->


<!-- cp1caption1 -->
<div id="cp1caption1" class="cp1caption1">
<div class="wrap1">
	<div class="hg1">
		<strong class="blind">자막</strong>
	</div>
	<div class="cont fscroll1-xy" tabindex="0">
		<ul class="lst1">
		<li class="li1">
			<a href="#★" class="a1">
				<div class="tg1">
					<span class="t1">01:24</span>
				</div>
				<div class="tg2">
					<div class="t2">
						지금 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 하는데 여기지금 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 하는데...
					</div>
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="#★" class="a1">
				<div class="tg1">
					<span class="t1">02:22</span>
				</div>
				<div class="tg2">
					<div class="t2">
						일이삼사오륙칠팔구십
					</div>
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="#★" class="a1">
				<div class="tg1">
					<span class="t1">03:33</span>
				</div>
				<div class="tg2">
					<div class="t2">
						지금 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 하는데 여기지금 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 하는데...
					</div>
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="#★" class="a1">
				<div class="tg1">
					<span class="t1">03:59</span>
				</div>
				<div class="tg2">
					<div class="t2">
						지금 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 하는데 여기지금 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 하는데...
					</div>
				</div>
			</a>
		</li>
		<li class="li1">
			<a href="#★" class="a1">
				<div class="tg1">
					<span class="t1">04:47</span>
				</div>
				<div class="tg2">
					<div class="t2">
						지금 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 하는데 여기지금 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 참석인원 교육 참석 인원수와 불참 인원수를 구하려고 하는데...
					</div>
				</div>
			</a>
		</li>
		</ul>
	</div>
</div>
</div>
<!-- /cp1caption1 -->


<hr class="bdt1px mgt0 mgb2em" />


<!-- cp1fcard4 cp1fcard4a1 -->
<div class="cp1fcard4 cp1fcard4a1">
<div class="wrap1">
	<div class="hg1">
		<h3 class="hb1 h1">내용 검색</h3>
		<!-- cp1search1 -->
		<div class="cp1search1">
			<input type="text" value="해당 영상에서 찾고자하는 키워드를 입력하세요." placeholder="해당 영상에서 찾고자하는 키워드를 입력하세요." title="검색어"
				onfocus="if( this.value == this.defaultValue ) this.value=''; this.select();"
				onblur="if( this.value=='' ) this.value=this.defaultValue;"
				class="text" />
			<button type="submit" class="button submit search"><i class="ic1"></i><span class="t1 blind">검색</span></button>
		</div>
		<!-- /cp1search1 -->
	</div>
	<div class="mControl">
		<button type="button" class="m prev"><i class="ic1"></i><span class="blind">영상 슬라이드. 이전 보기</span></button>
		<button type="button" class="m next"><i class="ic1"></i><span class="blind">영상 슬라이드. 다음 보기</span></button>
	</div>
	<!-- owl-carousel -->
	<div class="owl-carousel owl-theme">
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p102.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p103.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p004.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p005.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p006.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /owl-carousel -->
</div>
</div>
<!-- /cp1fcard4 -->
<script>/*<![CDATA[*/
	$(function(){
		// 20210118
		$('.cp1fcard4a1').jQmCarousel1({
			autoplay: false,
			autoplayTimeout: 6000,
			margin: 22,
			responsive: {
				000: { items: 2 },
				640: { items: 3 },
				960: { items: 4 },
				1260: { items: 4 }
			}
		});
	});
/*]]>*/</script>


<!-- cp1video1note1 -->
<div class="cp1video1note1">
<div class="wrap1">
	<div class="hg1">
		<h3 class="hb1 h1">영상 노트</h3>
	</div>
	<div class="cont">
		<ul class="lst1">
		<li class="li1">
			<div class="tg1">
				<a href="?#★" class="a1"><i class="a1ic1"></i> <span class="a1t1">02 : 22</span></a>
			</div>
			<div class="tg2">
				<div class="t1">
					문자 셀을 세는 함수= COUNTA
				</div>
				<div class="eg1">
					<a href="?#★" class="a2 save"><i class="a2ic1"></i> <span class="a2t1">파일 저장</span></a>
					<a href="?#★" class="a2 edit"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
					<a href="?#★" class="a2 del"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
				</div>
			</div>
		</li>
		<li class="li1">
			<div class="tg1">
				<a href="?#★" class="a1"><i class="a1ic1"></i> <span class="a1t1">03 : 33</span></a>
			</div>
			<div class="tg2">
				<span class="t1">
					선생님~~ 제가 지금 3.9버전을 쓰는데 background = pygame.image.load("C:/Users/leeha/Desktop/ 라고 적었는데 안되요ㅠㅠ 어떻게 해야 하나요
				</span>
				<div class="eg1">
					<a href="?#★" class="a2 save"><i class="a2ic1"></i> <span class="a2t1">파일 저장</span></a>
					<a href="?#★" class="a2 edit"><i class="a2ic1"></i> <span class="a2t1">수정</span></a>
					<a href="?#★" class="a2 del"><i class="a2ic1"></i> <span class="a2t1">삭제</span></a>
				</div>
			</div>
		</li>
		</ul>
	</div>
</div>
</div>
<!-- /cp1video1note1 -->


<!-- cp1write1 -->
<div class="cp1write1">
	<div class="editor">
		<div class="mgt3em mgb3em tac">개발자 온라인 웹문서 편집기 처리 필요!</div>
	</div>
	<div class="btns tar">
		<button type="submit" class="button submit">등록하기</button>
	</div>
</div>
<!-- /cp1write1 -->


<!-- cp1fcard4 cp1fcard4a2 -->
<div class="cp1fcard4 cp1fcard4a2">
<div class="wrap1">
	<div class="hg1">
		<h3 class="hb1 h1">추천 영상</h3>
	</div>
	<div class="mControl">
		<button type="button" class="m prev"><i class="ic1"></i><span class="blind">추천 영상. 이전 보기</span></button>
		<button type="button" class="m next"><i class="ic1"></i><span class="blind">추천 영상. 다음 보기</span></button>
	</div>
	<!-- owl-carousel -->
	<div class="owl-carousel owl-theme">
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p101.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p102.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p103.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p004.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p005.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
		<div class="item">
			<div class="w1">
				<a href="?#★" class="a1">
					<div class="f1">
						<span class="f1p1">
							<img src="{{ asset('assets/images/main/x1/x1p006.jpg') }}" alt="★대체텍스트필수" />
						</span>
						<i class="ic1 play">Play</i>
					</div>
					<div class="tg1">
						<strong class="t1">엑셀 올인원! 엑셀 기초부터 일이삼사오륙칠팔구십</strong>
					</div>
					<div class="tg2">
						<span class="t2">데이터에듀</span>
						<span class="t3">조회수 1800회</span>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /owl-carousel -->
</div>
</div>
<!-- /cp1fcard4 -->
<script>/*<![CDATA[*/
	$(function(){
		// 20210118
		$('.cp1fcard4a2').jQmCarousel1({
			autoplay: false,
			autoplayTimeout: 6000,
			margin: 22,
			responsive: {
				000: { items: 2 },
				640: { items: 3 },
				960: { items: 4 },
				1260: { items: 4 }
			}
		});
	});
/*]]>*/</script>


</div>
<!-- /cp1view2 -->

</div>
<!-- /width1wrap1 -->


<!-- (레이어팝업) -->
@include('sub.video.inc_layer_playlist');

</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
