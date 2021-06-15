<?php include $_SERVER['DOCUMENT_ROOT']."/_res/default/share/inc/menu_all.php"; ?>
<?php //$commonPath = '/_res/default'; ?>
<?php //$sitePath = '/_res/default'; ?>
<?php //include $_SERVER['DOCUMENT_ROOT']."/_res/default/share/inc/html_head_base.php"; ?>

<!-- html_head -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="<?=$siteName?>" />
<meta name="keywords" content="<?=$metaKeywords?>" />
<meta name="description" content="<?=$metaKeywords?>" />
<title><?=$titleTag?></title>

<link rel="stylesheet" type="text/css" href="<?=$commonPath?>/share/css/font.css?<?=time()?>" />
<link rel="stylesheet" type="text/css" href="<?=$commonPath?>/share/css/base.css?<?=time()?>" /><!-- Do not edit! -->
<link rel="stylesheet" type="text/css" href="<?=$commonPath?>/share/css/all.css?<?=time()?>" />
<?php if($d1n==0){ // MainPage ?>
	<!-- <link rel="stylesheet" type="text/css" href="<?=$sitePath?>/share/css/style.css?<?=time()?>" /> -->
	<link rel="stylesheet" type="text/css" href="<?=$sitePath?>/share/css/main.css?<?=time()?>" />
<?php //}else if(d2n==0){ // SubMain 1차 ?>
	<!-- <link rel="stylesheet" type="text/css" href="<?=$sitePath?>/share/css/style.css?<?=time()?>" /> -->
<?php }else{ // SubPages ?>	
	<link rel="stylesheet" type="text/css" href="<?=$commonPath?>/share/css/sub.css?<?=time()?>" />
	<link rel="stylesheet" type="text/css" href="<?=$commonPath?>/share/css/lib.css?<?=time()?>" />
	<!-- <link rel="stylesheet" type="text/css" href="<?=$commonPath?>/share/css/lib1cp1.css.css?<?=time()?>" /> -->
	<link rel="stylesheet" type="text/css" href="<?=$commonPath?>/share/css/lib2.css?<?=time()?>" />
	<!-- <link rel="stylesheet" type="text/css" href="<?=$sitePath?>/share/css/style.css?<?=time()?>" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?=$sitePath?>/share/css/content.css?<?=time()?>" /> -->
<?php }?>

<!-- ☆ -->
<script src="<?=$commonPath?>/share/vendor/hammer.min.js"></script>
<script src="<?=$commonPath?>/share/vendor/jquery-3.4.1.min.js"></script>
<script src="<?=$commonPath?>/share/vendor/jquery.easing.1.3.js"></script>
<link rel="stylesheet" type="text/css" href="<?=$commonPath?>/share/vendor/OwlCarousel2/owl.carousel.min.css" />
<script src="<?=$commonPath?>/share/vendor/OwlCarousel2/owl.carousel.min.js"></script>
<!-- ☆ -->
<script src="<?=$commonPath?>/share/js/script_base.js?<?=time()?>"></script>
<script src="<?=$sitePath?>/share/js/script.js?<?=time()?>"></script>
<!-- /html_head -->
