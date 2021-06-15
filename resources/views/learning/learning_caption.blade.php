<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">자막</h2>
	<a href="{{ route('learning.download_caption', ['uid' => $_GET['uid']]) }}" class="a2 download" title="자막 파일 다운로드"><span class="blind">자막 파일 다운로드</span></a>
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- cp1caption1 -->
<div class="cp1caption1">
<div class="wrap1">
	<div class="hg1">
		<strong class="blind">자막</strong>
	</div>
	<div class="cont fscroll1-xy" tabindex="0">
		<ul class="lst1">
        @if (count($captionList) > 0)
            @foreach ($captionList as $caption)
            <li class="li1">
                <a href="javascript:void(0);" class="a1" onclick="onClickCaptionList('{{ $_GET['uid'] }}', '{{ $caption->timestamp }}')">
                    <div class="tg1">
                        @php
                            if (round($caption->timestamp) > 3600) {
                                $time = gmdate("H:i:s", round($caption->timestamp));
                            } else {
                                $time = gmdate("i:s", round($caption->timestamp));
                            }
                        @endphp
                        <span class="t1">{{ $time }}</span>
                    </div>
                    <div class="tg2">
                        <div class="t2">
                            {{ $caption->paragraph_text }}
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        @else
        <span>해당 영상의 자막이 없습니다.</span>
        @endif
		</ul>
	</div>
</div>
</div>
<!-- /cp1caption1 -->


</div>
<!-- /aside_content -->
