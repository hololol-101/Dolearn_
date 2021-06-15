<!-- aside_head -->
<div id="aside_head">
	<h2 class="h1">내용 검색</h2>
	<a href="javascript:void(0);" class="b1 close"><i class="ic1"></i><span class="t1 blind">현재 내용 숨김</span></a>
</div>
<!-- /aside_head -->
<!-- aside_content -->
<div id="aside_content" class="fscroll1-xy">


<!-- cp2search1 -->
<div class="cp2search1">
	<input type="text" value="" placeholder="검색어를 입력하세요." title="검색어" class="text" id="search_keyword">
	<button type="submit" class="button submit search" id="search_btn"><i class="ic1"></i><span class="t1 blind">검색</span></button>
</div>
<!-- /cp2search1 -->


<!-- cp4tag1 -->
<div class="cp4tag1">
	<strong class="h1">인기 검색어</strong>
	<div class="tags">
        @foreach ($popKeywordList as $popKeyword)
            <a href="javascript:void(0);" class="a1" onclick="searchContent('{{ $popKeyword->tag }}')"><span class="a1t1">{{ $popKeyword->tag }}</span></a>
        @endforeach
		{{-- <a href="javascript:void(0);" class="a1" onclick="searchContent('물체')"><span class="a1t1">물체</span></a>
		<a href="javascript:void(0);" class="a1" onclick="searchContent('소리')"><span class="a1t1">소리</span></a>
		<a href="javascript:void(0);" class="a1" onclick="searchContent('시간')"><span class="a1t1">시간</span></a>
		<a href="javascript:void(0);" class="a1" onclick="searchContent('물총')"><span class="a1t1">물총</span></a> --}}
	</div>
</div>
<!-- /cp4tag1 -->


<!-- cp1caption1 -->
<div class="cp1caption1">
    <div class="wrap1">
        <div class="hg1">
            <strong class="blind">자막</strong>
        </div>
        <div class="cont fscroll1-xy" tabindex="0">
            <ul class="lst1" id="search_result">

            </ul>
        </div>
    </div>
</div>
<!-- /cp1caption1 -->


</div>
<!-- /aside_content -->

<script>
// 내용 검색 버튼 클릭
$('#search_btn').click(function() {
    var searchKeyword = $('#search_keyword').val();

    searchContent(searchKeyword);
});

// 해당 키워드로 검색한 자막 데이터 가져옴
function searchContent(searchKeyword) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        dataType: 'json',
        url: '{{ route('learning.search_result') }}',
        data: {
            'uid': '{{ $_GET['uid'] }}',
            'keyword': searchKeyword
        },
        // contentType: false,
        // processData: false,
        success: (data) => {
            if (data.status == 'success') {
                // alert('done!');
                $('#search_result').empty();

                if (data.resData != '') {
                    $('#search_result').append(data.resData);
                } else {
                    $('#search_result').append('해당 내용이 없습니다.');
                }

            } else {
                alert('검색 도중 문제가 발생했습니다.');
                return false;
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
