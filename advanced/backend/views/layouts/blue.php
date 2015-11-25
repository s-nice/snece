<?php
use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Bootstrap Admin</title>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link rel="stylesheet" type="text/css" href="/lib/bootstrap/css/bootstrap.css">

		<link rel="stylesheet" type="text/css" href="/stylesheets/theme.css">
		<link rel="stylesheet" href="/lib/font-awesome/css/font-awesome.css">

		<script src="/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
		
		<link rel="shortcut icon" href="/assets/ico/favicon.ico">
		
	</head>
	
	<body class="">
		<?php $this->beginBody() ?>
		<div class="navbar">
			<div class="navbar-inner">
                <ul class="nav pull-right">
					
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?= Yii::$app->user->identity->username ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">个人信息</a></li>
							<li class="divider"></li>
							<li><a tabindex="-1" href="#">修改密码</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                            <li class="divider visible-phone"></li>
                            <li><?= Html::a('退出', ['site/logout'], ['data-method' => 'post']) ?></li>
                        </ul>
                    </li>

                </ul>
                <span class="brand">后台管理</span>
			</div>
		</div>
		
		<div class="sidebar-nav">
			<a href="#dashboard-menu" class="nav-header" data-toggle="collapse">Dashboard <i class="icon-chevron-up"></i></a>
			<ul id="dashboard-menu" class="nav nav-list collapse in">
				<li id='menu_2_1'><?= Html::a('HOME', ['site/index']) ?></li>
				<li ><?= Html::a('菜单管理', ['menu/index']) ?></li>
				<li ><a href="user.html">Sample Item</a></li>
				<li ><a href="media.html">Media</a></li>
				<li ><a href="calendar.html">Calendar</a></li>

			</ul>

			<a href="#accounts-menu" class="nav-header" data-toggle="collapse">Account <i class="icon-chevron-up"></i></a>
			<ul id="accounts-menu" class="nav nav-list collapse">
				<li ><?= Html::a('菜单管理', ['menu/index']) ?></li>
				<li ><a href="sign-up.html">Sign Up</a></li>
				<li ><a href="reset-password.html">Reset Password</a></li>
			</ul>

			<a href="#error-menu" class="nav-header collapsed" data-toggle="collapse">Error Pages <i class="icon-chevron-up"></i></a>
			<ul id="error-menu" class="nav nav-list collapse">
				<li id='menu_2_2'><?= Html::a('菜单管理', ['menu/index']) ?></li>
				<li ><a href="404.html">404 page</a></li>
				<li ><a href="500.html">500 page</a></li>
				<li ><a href="503.html">503 page</a></li>
			</ul>

			<a href="#legal-menu" class="nav-header" data-toggle="collapse">Legal <i class="icon-chevron-up"></i></a>
			<ul id="legal-menu" class="nav nav-list collapse">
				<li ><a href="privacy-policy.html">Privacy Policy</a></li>
				<li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>
			</ul>

			<a href="help.html" class="nav-header" >Help</a>
			<a href="faq.html" class="nav-header" >Faq</a>
		</div>

		<div class="content">
			<?= $content ?>
		</div>

		<script src="/lib/bootstrap/js/bootstrap.js"></script>
		<script src="/lib/jquery.cookie.js"></script>
		
		<script>
			
			$('.sidebar-nav li').click(function() {
				$.cookie('menu',$(this).attr('id'),{path:"/"});
			});
			
			$(document).ready(function() {
				var menu=$.cookie('menu');
				var arr=new Array();
				
				if(menu==null){
					menu='menu_2_1';
				}
				
				arr = menu.split("_");
				
				if(arr[1]==1){
					$('#'+menu).parent().addClass('in');
				}else{
					$("ul").removeClass("in"); 
					$('#'+menu).parent().addClass('in');
					$('#'+menu).addClass('active');
				}
			});
			
		</script>
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>
