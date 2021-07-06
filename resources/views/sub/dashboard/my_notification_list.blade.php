@php
    $role = isset($_GET['role']) ? $_GET['role'] : '';
@endphp

@extends('master_sub')

@section('title', '대시보드 - 내 알림')

@section('content')

<!-- #body -->
<div id="body" tabindex="-1">
<!-- container -->
<div class="container clearfix">
<!-- #body_head -->
<div id="body_head">
<!-- container -->
<div class="container clearfix">

@include('inc.common.inc_layer_sitemap')

<!-- body_title -->
<div id="body_title">

	<!-- location1 -->
	<div id="location1">
		<div class="breadcrumb clearfix">
			<strong class="blind">현재페이지 위치:</strong>
			<span class="cont">
				<a href="javascript:void(0);" class="a1"><i class="t1">대시보드</i></a>
			</span>
		</div>
	</div>
	<!-- /location1 -->

	<!-- lnb1 -->
	<div id="lnb1">
		<strong class="h1"><a href="#lnb1c" class="toggle slide" title="현재 위치"><span class="t1">내 알림</span> <i class="ic1"></i></a></strong>
		<!-- lnb1c -->
		<div id="lnb1c">
			<ul>
			<li><a href="{{ route('sub.dashboard.dashboard_main', ['role' => $role]) }}">대시보드</a></li>
			<li><a href="{{ route('notification.my_notification_list', ['role' => $role]) }}">내 알림</a></li>
			</ul>
		</div>
		<!-- /lnb1c -->
	</div>
	<!-- lnb1 -->
	<script>/*<![CDATA[*/
		$(function(){
			/** ◇◆ 목록앵커 클릭하면 활성 메뉴를 제목에 표시. 링크 이동. 20210111. @m
			 */
			(function(){
				var $my = $('#lnb1'),
					$m = $('li>a[href]', $my);
				// 현재활성
				$m.each(function(){
					if( $(this).closest('li').is('.on') ){
						$('.h1 .t1', $my).text( $(this).text() );
					}
				});

				// 클릭
				$m.on('click', function(e){
					//e.preventDefault();
					$('.toggle', $my).triggerHandler('click'); // 토글 닫기
					$('.h1 .t1', $my).text( $(this).text() );
					return; // 링크 이동
				});
			})();
		});

	/*]]>*/</script>

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


<!-- cp1infomenu2 -->
<div class="cp1infomenu2">
	<div class="w1">
		<div class="info1">
			새 알림 <em class="em">{{ $newNotificationCount }}</em>개
		</div>
	</div>
	<div class="w2">
		<a href="{{ route('notification.all_read_notification') }}" class="a1">모두 읽음</a>
	</div>
</div>
<!-- /cp1infomenu2 -->


<!-- cp1bbs3list1 -->
<div class="cp1bbs3list1">
	<ul class="lst1">
        @if (count($myNotificationList)>0)
            @foreach ($myNotificationList as $notification )
                <li class="li1">
                    <div class="w1">

                        <a href="{{ route('notification.read', ['idx'=>$notification->idx, 'route'=>$notification->route]) }}" class="w1w1 a1">
                            @if($notification->status =="active")
                                <i class="new">새 글</i>
                            @endif
                            <div class="t1">
                                {{ $notification->content }}
                            </div>
                            <span class="t2">{{ $notification->title }}</span>
                        </script>
                        <div class="w1w2">
                            <span class="t3">{{ format_date($notification->created_at) }}</span>
                            <a href="{{ route('notification.delete', ['idx'=>$notification->idx]) }}" class="a2">삭제</a>
                        </div>
                    </div>
                </li>
            @endforeach
        @else
            <div>등록된 알림이 없습니다.</div>
        @endif
	</ul>
</div>
<!-- /cp1bbs3list1 -->

{!! $pageIndex['htmlCode'] !!}

</div>
<!-- /container -->
</div>
<!-- /#body_content -->
</div>
<!-- /container -->
</div>
<!-- /#body -->

@endsection
