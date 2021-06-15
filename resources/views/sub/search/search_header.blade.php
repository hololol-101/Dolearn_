<!-- width2wrap2 -->
<div class="width2wrap2">
<!-- cp1search2 wrap1 -->
<div class="cp1search2 wrap1">
<!-- container -->
<div class="container clearfix">


<!-- even-grid -->
<div class="even-grid gap0 vgap00">
    <div class="small-12 medium-12 large-2 xlarge-3 column">


        <!-- <a href="?" onclick="history.go(-1); return false;" class="cp1b1back1"><i class="ic1"></i><span class="t1">돌아가기</span></a> -->
        <h2 class="hb1 h1 mgt025em mgb025em">통합검색</h2>


    </div>
    <div class="small-12 medium-12 large-8 xlarge-6 column">


        <!-- form -->
        <form action="{{ route('sub.search.integrated_search') }}" method="POST">
            @csrf
            <fieldset class="mg0">
                <legend class="blind"><strong class="h1">검색</strong></legend>
                <!-- even-grid -->
                <div class="even-grid float-left gap4pct vgap00">
                    <div class="small-12 medium-3 column">

                        <select class="select w100" name="type" title="분류">
                            <option value="all">전체</option>
                            <option value="video">영상</option>
                            <option value="lecture">강좌</option>
                            <option value="insight">인사이트</option>
                            <option value="instructor">강사</option>
                            <option value="youtuber">유튜버</option>
                        </select>

                    </div>
                    <div class="small-12 medium-9 column">

                        <!-- cp1search1 -->
                        <div class="cp1search1">
                            <input type="text" value="" name="keyword" placeholder="영상 내용 또는 제목으로 검색이 가능합니다." title="검색어"
                                onfocus="if( this.value == this.defaultValue ) this.value=''; this.select();"
                                onblur="if( this.value=='' ) this.value=this.defaultValue;"
                                class="text" />
                            <button type="submit" class="button submit search"><i class="ic1"></i><span class="t1 blind">검색</span></button>
                        </div>
                        <!-- /cp1search1 -->

                        <div class="clearfix">
                            <span class="dpib mgr1em">
                                <input type="radio" name="order-accuracy" id="★1radio0e0" /> <label for="★1radio0e0">정확도</label>
                            </span>
                            <span class="dpib mgr1em">
                                <input type="radio" name="order-word" id="★1radio0e1" /> <label for="★1radio0e1">가나다순</label>
                            </span>
                            <span class="dpib mgr1em">
                                <input type="radio" name="order-latest" id="★1radio0e2" /> <label for="★1radio0e2">최신순</label>
                            </span>
                        </div>

                    </div>
                </div>
                <!-- /even-grid -->
            </fieldset>
        </form>
        <!-- /form -->

        <script>/*<![CDATA[*/
			$(function(){
				/** ◇◆ select 값 변경하면 input type="text" placeholder 값 변경. 20210312. @m.
				 */
				(function(){
					var my = '.w1search1',
						$s = $('.select', $(my)),
						$t = $('.text', $(my)),
						vs = vt = '';
						$s.on('change', function(){
							vs = $(this).find("option:selected").text();
							switch(vs){
								case '영상': vt = '영상 내용 또는 제목으로 검색이 가능합니다.'; break;
								case '강좌': vt = '제목 또는 주제로 검색이 가능합니다.'; break;
								default: vt = '검색어를 입력하세요.'; break;
							}
							$t.attr({placeholder: vt});
						});
				})();
			});
		/*]]>*/</script>

    </div>
    <div class="small-12 medium-0 large-2 xlarge-3 column">
    </div>
</div>
<!-- /even-grid -->


</div>
<!-- /container -->
</div>
<!-- /cp1search2 wrap1 -->
</div>
<!-- /width2wrap2 -->


<!-- cp1tabs2 -->
<div class="cp1tabs2">
    <ul>
    <li class="m1 column"><a href="{{ route('sub.search.integrated_search', ['type' => 'all', 'keyword' => '']) }}"><span class="t1">전체</span><i class="ic1"></i></a></li>
    <li class="m2 column"><a href="{{ route('sub.search.integrated_search', ['type' => 'video', 'keyword' => '']) }}"><span class="t1">영상</span><i class="ic1"></i></a></li>
    <li class="m3 column"><a href="{{ route('sub.search.integrated_search', ['type' => 'lecture', 'keyword' => '']) }}"><span class="t1">강좌</span><i class="ic1"></i></a></li>
    <li class="m4 column"><a href="{{ route('sub.search.integrated_search', ['type' => 'insight', 'keyword' => '']) }}"><span class="t1">인사이트</span><i class="ic1"></i></a></li>
    <li class="m5 column"><a href="{{ route('sub.search.integrated_search', ['type' => 'instructor', 'keyword' => '']) }}"><span class="t1">강사</span><i class="ic1"></i></a></li>
    <li class="m6 column"><a href="{{ route('sub.search.integrated_search', ['type' => 'youtuber', 'keyword' => '']) }}"><span class="t1">유튜버</span><i class="ic1"></i></a></li>
    </ul>
</div>
<!-- /cp1tabs2 -->
