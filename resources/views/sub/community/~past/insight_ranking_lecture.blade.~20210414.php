<!--
/**
 * SubPage Template
 * 20210102 | @m | 최초 등록
 * 20210315 | @m | 요구반영. 결함개선. 고도화.
 * ~20210315 | @m |
 */
-->
@extends('master_sub')

@section('title', '인사이트 - 랭킹(강좌)')

@section('content')
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

    <!-- location1 -->
    <div id="location1">
        <div class="breadcrumb clearfix">
            <strong class="blind">현재페이지 위치:</strong>
            <span class="cont">
                <a href="javascript:void(0);" class="a1"><i class="t1">커뮤니티</i></a>
                <i class="sep">|</i>
                <a href="javascript:void(0);" class="a1"><i class="t1">인사이트</i></a>
                <i class="sep">|</i>
                <a href="javascript:void(0);" class="a1"><i class="t1">랭킹</i></a>
            </span>
        </div>
    </div>
    <!-- /location1 -->

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


<!-- cp1tabs1 -->
<div id="cp1tabs1" class="cp1tabs1 mgt1em mgb1em">
    <ul>
    <li class="m1 column on"><a href="{{ route('sub.community.ranking', ['type' => 'lecture']) }}" style="min-width:4em;"><span class="t1">강좌</span><i class="ic1"></i></a></li>
    <li class="m2 column"><a href="{{ route('sub.community.ranking', ['type' => 'instructor']) }}" style="min-width:4em;"><span class="t1">강사</span><i class="ic1"></i></a></li>
    <li class="m3 column"><a href="{{ route('sub.community.ranking', ['type' => 'youtuber']) }}" style="min-width:4em;"><span class="t1">유튜버</span><i class="ic1"></i></a></li>
    </ul>
</div>
<!-- /cp1tabs1 -->


<div class="dpf jcsb aic">
    <h2 class="hb1 h2">지금 핫한 강좌</h2>
    <select class="select" title="선택옵션">
        <option value="">완강률</option>
        <option value="">수강생 수</option>
        <option value="">최신순</option>
    </select>
</div>


<!-- cp1flist6 -->
<div class="cp1flist6">
    <!-- lst1 -->
    <ul class="lst1">
        <li class="li1">
            <a href="?#★" class="w1 a1">
                <div class="w1w1">
                    <div class="w1w1w1">
                        <b class="g1"><span class="g1t1">1</span><span class="g1t2">위</span></b>
                    </div>
                    <div class="w1w1w2">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('assets/images/main/x1/x1p001.jpg') }}" alt="★대체텍스트필수" />
                            </span>
                        </div>
                    </div>
                    <div class="w1w1w3">
                        <div class="t1">
                            강좌제목
                        </div>
                        <div class="t2">
                            강사이름
                        </div>
                    </div>
                </div>
                <div class="w1w2">
                    <div class="w1w2w1">
                        <span class="t3">완강률</span>
                        <span class="t4">98%</span>
                    </div>
                    <div class="w1w2w2">
                        <span class="t3">수강생 수</span>
                        <span class="t4">100</span>
                    </div>
                    <div class="w1w2w3">
                        <span class="t3">게시일</span>
                        <span class="t4">2021.03.15</span>
                    </div>
                </div>
            </a>
        </li>
        <li class="li1">
            <a href="?#★" class="w1 a1">
                <div class="w1w1">
                    <div class="w1w1w1">
                        <b class="g1"><span class="g1t1">2</span><span class="g1t2">위</span></b>
                    </div>
                    <div class="w1w1w2">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('assets/images/main/x1/x1p002.jpg') }}" alt="★대체텍스트필수" />
                            </span>
                        </div>
                    </div>
                    <div class="w1w1w3">
                        <div class="t1">
                            강좌제목일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십
                        </div>
                        <div class="t2">
                            강사이름
                        </div>
                    </div>
                </div>
                <div class="w1w2">
                    <div class="w1w2w1">
                        <span class="t3">완강률</span>
                        <span class="t4">98%</span>
                    </div>
                    <div class="w1w2w2">
                        <span class="t3">수강생 수</span>
                        <span class="t4">100</span>
                    </div>
                    <div class="w1w2w3">
                        <span class="t3">게시일</span>
                        <span class="t4">2021.03.15</span>
                    </div>
                </div>
            </a>
        </li>
        <li class="li1">
            <a href="?#★" class="w1 a1">
                <div class="w1w1">
                    <div class="w1w1w1">
                        <b class="g1"><span class="g1t1">3</span><span class="g1t2">위</span></b>
                    </div>
                    <div class="w1w1w2">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('assets/images/main/x1/x1p003.jpg') }}" alt="★대체텍스트필수" />
                            </span>
                        </div>
                    </div>
                    <div class="w1w1w3">
                        <div class="t1">
                            강좌제목일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십
                        </div>
                        <div class="t2">
                            강사이름
                        </div>
                    </div>
                </div>
                <div class="w1w2">
                    <div class="w1w2w1">
                        <span class="t3">완강률</span>
                        <span class="t4">98%</span>
                    </div>
                    <div class="w1w2w2">
                        <span class="t3">수강생 수</span>
                        <span class="t4">100</span>
                    </div>
                    <div class="w1w2w3">
                        <span class="t3">게시일</span>
                        <span class="t4">2021.03.15</span>
                    </div>
                </div>
            </a>
        </li>
        <li class="li1">
            <a href="?#★" class="w1 a1">
                <div class="w1w1">
                    <div class="w1w1w1">
                        <b class="g1"><span class="g1t1">4</span><span class="g1t2">위</span></b>
                    </div>
                    <div class="w1w1w2">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('assets/images/main/x1/x1p004.jpg') }}" alt="★대체텍스트필수" />
                            </span>
                        </div>
                    </div>
                    <div class="w1w1w3">
                        <div class="t1">
                            강좌제목일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십
                        </div>
                        <div class="t2">
                            강사이름
                        </div>
                    </div>
                </div>
                <div class="w1w2">
                    <div class="w1w2w1">
                        <span class="t3">완강률</span>
                        <span class="t4">98%</span>
                    </div>
                    <div class="w1w2w2">
                        <span class="t3">수강생 수</span>
                        <span class="t4">100</span>
                    </div>
                    <div class="w1w2w3">
                        <span class="t3">게시일</span>
                        <span class="t4">2021.03.15</span>
                    </div>
                </div>
            </a>
        </li>
        <li class="li1">
            <a href="?#★" class="w1 a1">
                <div class="w1w1">
                    <div class="w1w1w1">
                        <b class="g1"><span class="g1t1">5</span><span class="g1t2">위</span></b>
                    </div>
                    <div class="w1w1w2">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('assets/images/main/x1/x1p005.jpg') }}" alt="★대체텍스트필수" />
                            </span>
                        </div>
                    </div>
                    <div class="w1w1w3">
                        <div class="t1">
                            강좌제목일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십
                        </div>
                        <div class="t2">
                            강사이름
                        </div>
                    </div>
                </div>
                <div class="w1w2">
                    <div class="w1w2w1">
                        <span class="t3">완강률</span>
                        <span class="t4">98%</span>
                    </div>
                    <div class="w1w2w2">
                        <span class="t3">수강생 수</span>
                        <span class="t4">100</span>
                    </div>
                    <div class="w1w2w3">
                        <span class="t3">게시일</span>
                        <span class="t4">2021.03.15</span>
                    </div>
                </div>
            </a>
        </li>
        <li class="li1">
            <a href="?#★" class="w1 a1">
                <div class="w1w1">
                    <div class="w1w1w1">
                        <b class="g1"><span class="g1t1">6</span><span class="g1t2">위</span></b>
                    </div>
                    <div class="w1w1w2">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('assets/images/main/x1/x1p006.jpg') }}" alt="★대체텍스트필수" />
                            </span>
                        </div>
                    </div>
                    <div class="w1w1w3">
                        <div class="t1">
                            강좌제목일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십
                        </div>
                        <div class="t2">
                            강사이름
                        </div>
                    </div>
                </div>
                <div class="w1w2">
                    <div class="w1w2w1">
                        <span class="t3">완강률</span>
                        <span class="t4">98%</span>
                    </div>
                    <div class="w1w2w2">
                        <span class="t3">수강생 수</span>
                        <span class="t4">100</span>
                    </div>
                    <div class="w1w2w3">
                        <span class="t3">게시일</span>
                        <span class="t4">2021.03.15</span>
                    </div>
                </div>
            </a>
        </li>
        <li class="li1">
            <a href="?#★" class="w1 a1">
                <div class="w1w1">
                    <div class="w1w1w1">
                        <b class="g1"><span class="g1t1">7</span><span class="g1t2">위</span></b>
                    </div>
                    <div class="w1w1w2">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('assets/images/main/x1/x1p007.jpg') }}" alt="★대체텍스트필수" />
                            </span>
                        </div>
                    </div>
                    <div class="w1w1w3">
                        <div class="t1">
                            강좌제목일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십
                        </div>
                        <div class="t2">
                            강사이름
                        </div>
                    </div>
                </div>
                <div class="w1w2">
                    <div class="w1w2w1">
                        <span class="t3">완강률</span>
                        <span class="t4">98%</span>
                    </div>
                    <div class="w1w2w2">
                        <span class="t3">수강생 수</span>
                        <span class="t4">100</span>
                    </div>
                    <div class="w1w2w3">
                        <span class="t3">게시일</span>
                        <span class="t4">2021.03.15</span>
                    </div>
                </div>
            </a>
        </li>
        <li class="li1">
            <a href="?#★" class="w1 a1">
                <div class="w1w1">
                    <div class="w1w1w1">
                        <b class="g1"><span class="g1t1">8</span><span class="g1t2">위</span></b>
                    </div>
                    <div class="w1w1w2">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('assets/images/main/x1/x1p008.jpg') }}" alt="★대체텍스트필수" />
                            </span>
                        </div>
                    </div>
                    <div class="w1w1w3">
                        <div class="t1">
                            강좌제목일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십
                        </div>
                        <div class="t2">
                            강사이름
                        </div>
                    </div>
                </div>
                <div class="w1w2">
                    <div class="w1w2w1">
                        <span class="t3">완강률</span>
                        <span class="t4">98%</span>
                    </div>
                    <div class="w1w2w2">
                        <span class="t3">수강생 수</span>
                        <span class="t4">100</span>
                    </div>
                    <div class="w1w2w3">
                        <span class="t3">게시일</span>
                        <span class="t4">2021.03.15</span>
                    </div>
                </div>
            </a>
        </li>
        <li class="li1">
            <a href="?#★" class="w1 a1">
                <div class="w1w1">
                    <div class="w1w1w1">
                        <b class="g1"><span class="g1t1">9</span><span class="g1t2">위</span></b>
                    </div>
                    <div class="w1w1w2">
                        <div class="f1">
                            <span class="f1p1">
                                <img src="{{ asset('assets/images/main/x1/x1p009.jpg') }}" alt="★대체텍스트필수" />
                            </span>
                        </div>
                    </div>
                    <div class="w1w1w3">
                        <div class="t1">
                            강좌제목일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십
                        </div>
                        <div class="t2">
                            강사이름
                        </div>
                    </div>
                </div>
                <div class="w1w2">
                    <div class="w1w2w1">
                        <span class="t3">완강률</span>
                        <span class="t4">98%</span>
                    </div>
                    <div class="w1w2w2">
                        <span class="t3">수강생 수</span>
                        <span class="t4">100</span>
                    </div>
                    <div class="w1w2w3">
                        <span class="t3">게시일</span>
                        <span class="t4">2021.03.15</span>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <!-- /lst1 -->

    <!-- cp1more1 -->
    <div class="cp1more1">
        <a href="#★" class="more">
            <span class="t1">더보기</span>
            <i class="ic1"></i>
        </a>
    </div>
    <!-- /cp1more1 -->

</div>
<!-- /cp1flist6 -->


<script>/*<![CDATA[*/
    $(function(){

        /** ◇◆ 더보기클릭샘플. 20210315. @m
            * 이건 그냥 보여주기 샘플. 개발자 동작 처리 필요!
            */
        (function(){
            var $my = $('.cp1flist6'),
                $more = $('.more', $my),
                $lst = $('.lst1', $my);
            var html = '';
                html += '<li class="li1">';
                html += '	<a href="?#★" class="w1 a1">';
                html += '		<div class="w1w1">';
                html += '			<div class="w1w1w1">';
                html += '				<b class="g1"><span class="g1t1">-</span><!-- <span class="g1t2">위</span> --></b>'; // 10위 이상 표현하려면.. 디자인 크기 줄여야 한다.
                html += '			</div>';
                html += '			<div class="w1w1w2">';
                html += '				<div class="f1">';
                html += '					<span class="f1p1">';
                html += '						<img src="{{ asset('assets/images/main/x1/x1p010.jpg') }}" alt="★대체텍스트필수" />';
                html += '					</span>';
                html += '				</div>';
                html += '			</div>';
                html += '			<div class="w1w1w3">';
                html += '				<div class="t1">';
                html += '					강좌제목일이삼사오육칠팔구십일이삼사오육칠팔구십일이삼사오육칠팔구십';
                html += '				</div>';
                html += '				<div class="t2">';
                html += '					강사이름';
                html += '				</div>';
                html += '			</div>';
                html += '		</div>';
                html += '		<div class="w1w2">';
                html += '			<div class="w1w2w1">';
                html += '				<span class="t3">완강률</span>';
                html += '				<span class="t4">98%</span>';
                html += '			</div>';
                html += '			<div class="w1w2w2">';
                html += '				<span class="t3">수강생 수</span>';
                html += '				<span class="t4">100</span>';
                html += '			</div>';
                html += '			<div class="w1w2w3">';
                html += '				<span class="t3">게시일</span>';
                html += '				<span class="t4">2021.03.15</span>';
                html += '			</div>';
                html += '		</div>';
                html += '	</a>';
                html += '</li>';

            $more.on('click', function(e){
                e.preventDefault();
                for(var i = 5; i--; ){
                    $lst.append($(html));
                }
            });

        })();

    });
/*]]>*/</script>


</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->
@endsection
