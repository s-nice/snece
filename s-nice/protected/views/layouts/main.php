<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo CHtml::encode($this->pageTitle).$this->_seoTitle; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php echo $this->_seoDes; ?>" />
		<meta name="keywords" content="<?php echo $this->_seoKeyword; ?>" />

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="shortcut icon" href="/static/images/favicon.png">

		<!-- Animate.css -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/icomoon.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/magnific-popup.css">
		<!-- Salvattore -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/salvattore.css">
		<!-- Theme Style -->
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/style.css">
		
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>

		<div id="fh5co-offcanvass">
			<a href="javascript:;" class="fh5co-offcanvass-close js-fh5co-offcanvass-close">菜单<i class="icon-cross"></i> </a>
			<h1 class="fh5co-logo"><a class="navbar-brand" href="index.html">s-nice</a></h1>
			<ul>
				<li class="<?php if(!isset($_GET['pid']) && Yii::app()->getController()->getAction()->id=='index' ){ echo 'active'; } ?>"><a href="/">全部</a></li>
				<?php $cat = Common::getcat(1); foreach ($cat as $one) { ?>
				<li class="<?php if(isset($_GET['pid']) && $_GET['pid']==$one->id){ echo 'active'; } ?>"><a href="<?php echo Yii::app()->createUrl('site/index',array('pid'=>$one->id)); ?>"><?php echo $one->name; ?></a></li>
				<?php } ?>
				<li class="<?php if(Yii::app()->getController()->getAction()->id=='about'){ echo 'active'; } ?>"><a href="<?php echo Yii::app()->createUrl('site/about'); ?>">关于</a></li>
				<li class="<?php if(Yii::app()->getController()->getAction()->id=='contact'){ echo 'active'; } ?>"><a href="<?php echo Yii::app()->createUrl('site/contact'); ?>">留言</a></li>
			</ul>
			<h3 class="fh5co-lead">联系方式</h3>
			<p class="fh5co-social-icons">
				<a href="http://weibo.com/u/2610676063" target="_blank"><i class="icon-sina-weibo"></i></a>
			</p>
		</div>
		<header id="fh5co-header" role="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<a href="javascript:;" class="fh5co-menu-btn js-fh5co-menu-btn">菜单<i class="icon-menu"></i></a>
						<a class="navbar-brand" href="/">s-nice</a>
					</div>
				</div>
			</div>
		</header>
		<!-- END .header -->


		<div id="fh5co-main">
			<div class="container">

				<div class="row">

					<?php echo $content; ?>

				</div>
			</div>
		</div>

		<footer id="fh5co-footer">

			<div class="container">
				<div class="row row-padded">
					<div class="col-md-12 text-center">
						<p class="fh5co-social-icons">
							<a href="http://weibo.com/u/2610676063" target="_blank"><i class="icon-sina-weibo"></i></a>
							<!--
							<a href="#"><i class="icon-qq"></i></a>
							<a href="#"><i class="icon-chat"></i></a>
							
							-->
						</p>
						<p><small>&copy;2016 s-nice. All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</footer>

		<img style='display:none;' id="go_to_top" src="/static/images/toTop.png" />

		<!-- jQuery -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.waypoints.min.js"></script>
		<!-- Magnific Popup -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.magnific-popup.min.js"></script>
		<!-- Salvattore -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/salvattore.min.js"></script>
		<!-- Main JS -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/main.js"></script>
		
		<script>
			(function(){
				$('#go_to_top').on('click',function(){
					$('html,body').animate({
						scrollTop : 0
					},500);
				});
			})();
			$(window).scroll(function(){
				//获取窗口的滚动条的垂直位置 
				var s = $(window).scrollTop(); 
				//当窗口的滚动条的垂直位置大于页面的最小高度时，让返回顶部元素渐现，否则渐隐 
				if( s > 100){
				$("#go_to_top").fadeIn(100); 
				}else{
				$("#go_to_top").fadeOut(200); 
				}; 
			});
		</script>
		
		<?php echo $this->_seoScode; ?>
		
	</body>
</html>

