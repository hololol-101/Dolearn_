<h3 class="hb1 h1">강좌소개</h3>

@php
$whatInfoArr = explode("|", $lectureDetail->add_info_1);
$whoInfoArr = explode("|", $lectureDetail->add_info_2);
$needInfoArr = explode("|", $lectureDetail->add_info_3);
@endphp

<!-- cp1lecture1 -->
<div class="cp1lecture1">
    <strong class="h1 what"><span class="h1t1">무엇을 배울 수 있나요?</span></strong>
    <div class="cont">
        <ul class="bu">
            @foreach ($whatInfoArr as $whatInfo)
            <li>{{ $whatInfo }}</li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /cp1lecture1 -->

<!-- cp1lecture1 -->
<div class="cp1lecture1">
    <strong class="h1 who"><span class="h1t1">누가 배우면 좋을까요?</span></strong>
    <div class="cont">
        <ul class="bu">
            @foreach ($whoInfoArr as $whoInfo)
            <li>{{ $whoInfo }}</li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /cp1lecture1 -->

<!-- cp1lecture1 -->
@if ($needInfoArr[0] != '')
<div class="cp1lecture1">
    <strong class="h1 backknow"><span class="h1t1">필요한 배경 지식이 있나요?</span></strong>
    <div class="cont">
        <ul class="bu">
            @foreach ($needInfoArr as $needInfo)
            <li>{{ $needInfo }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<!-- /cp1lecture1 -->


<div class="block-center mgt4em mgb4em cve wbka" style="width:100%;max-width:600px;">
    {{-- <p class="fw5 fsB10">
        OO, 강좌가 왜 필요할까요?
    </p>
    <div class="clearfix mgt3em mgb3em">
        <img src="{{ asset('assets/images/lib/p1/p1p001@2x.png') }}" alt="" style="width:100%;" />
    </div>
    <p class="fw5 fsB2">
        OO은 실제 기업, 학습에 있어서 활용빈도가 높습니다.
    </p>
    <p class="fsB2">
        코로나 19로 인해 업무, 학습 등 재택생활이 늘어나고 프로그램에 대한 수요도 높아져, 편의점 cu에 국내 최초 ‘OOOOO 사용권’이 판매가 되고 있습니다.
    </p> --}}
    {!! $lectureDetail->introduction !!}
</div>


<hr class="bdt1px mgt125em mgb125em" />


<h3 class="hb1 h1">강사소개</h3>

<!-- cp1teacher1 -->
<div class="cp1teacher1">
    <div class="w1">
        <div class="w1w1">
            <div class="f1">
                <span class="f1p1">
                    <!-- <img src="../../img/main/x1/x1p601.jpg" alt="★대체텍스트필수" /> -->
                    @if (isset($instructorInfo->save_profile_image))
					<img src="{{ asset('storage/uploads/profile/'.$instructorInfo->save_profile_image) }}" alt="{{ $instructorInfo->nickname }}" />
                    @else
                    <img src="{{ asset('assets/images/lib/noimg1face1d800.png') }}" alt="이미지 없음" />
                    @endif
                </span>
            </div>
        </div>
        <div class="w1w2">
            <div class="tg1">
                <strong class="t1">{{ $instructorInfo->nickname }}</strong>
            </div>
            <div class="tg2">
                <pre>{{ $instructorInfo->introduction }}</pre>

                {{-- <span class="t2">학력 및 활동</span>
                <ul class="bu">
                <li>(주)데이터에듀 대표</li>
                <li>동국대 응용통계학과 겸임교수</li>
                <li>빅데이터/AI 강의(삼성SDS, LG-CNS, 삼성전자, POSCOENC, 아모레퍼시픽, 멀티캠퍼스 외 다수)</li>
                <li>빅데이터 분석 및 AI 프로젝트(외환은행, 신한은행, CJ, LS산전 외 다수)</li>
                <li>빅데이터 활용 창업 강좌 및 멘토링(연세대, 성균관대, 동국대, 아주대 외 다수)</li>
                <li>빅데이터 전문가 협회 정회원</li>
                <li>중소기업청, 창조경제타운 심사평가단</li>
                </ul> --}}
            </div>
        </div>
    </div>
</div>
<!-- /cp1teacher1 -->


<h3 class="hb1 h1">크리에이터 소개</h3>

<!-- cp1creator1 -->
<div class="cp1creator1">
<div class="wrap1">
    <div class="mControl">
        <button type="button" class="m prev"><i class="ic1"></i><span class="blind">크리에이터. 이전 보기</span></button>
        <button type="button" class="m next"><i class="ic1"></i><span class="blind">크리에이터. 다음 보기</span></button>
    </div>
    <!-- owl-carousel -->
    <div class="owl-carousel owl-theme">
        @foreach ($youtuberInfoList as $youtuberInfo)
        <div class="item">
            <div class="w1">
                <a href="{{ route('etc.user_introduction', ['type' => $youtuberInfo->role, 'user_idx' => $youtuberInfo->id]) }}" class="a1">
                    <div class="f1">
                        <span class="f1p1">
                            @if (isset($youtuberInfo->save_profile_image))
                            <img src="{{ asset('storage/uploads/profile/'.$youtuberInfo->save_profile_image) }}" alt="{{ $youtuberInfo->nickname }}" />
                            @else
                            <img src="{{ asset('assets/images/lib/noimg1face1d800.png') }}" alt="이미지 없음" />
                            @endif
                        </span>
                    </div>
                    <div class="tg1">
                        <strong class="t1">{{ $youtuberInfo->nickname }}</strong>
                        <div class="t2">
                            {{-- TODO: 구독자 수 --}}
                            <span class="t2t1">구독자</span> <span class="t2t2">24.6만명</span>
                        </div>
                    </div>
                </a>
                <div class="tg2">
                    <a href="javascript:void(0);" class="b1">구독</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /owl-carousel -->
</div>
</div>
<!-- /cp1creator1 -->
<script>/*<![CDATA[*/
    $(function(){
        // 20210112
        $('.cp1creator1').jQmCarousel1({
            autoplay: false,
            autoplayTimeout: 6000,
            margin: 22,
            responsive: {
                000: { items: 2 },
                640: { items: 4 },
                960: { items: 6 },
                1260: {
                    items: 6,
                    margin: 39
                }
            }
        });
    });

    $('.tg2 .b1').click(function() {
        alert('구독이 완료되었습니다.');
    });
/*]]>*/</script>
