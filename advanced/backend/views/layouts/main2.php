<?php
use backend\assets\AppAsset;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

list($assetsPath, $assetsUrl) = Yii::$app->assetManager->publish('@backend/static');
list($dataPath, $dataUrl) = Yii::$app->assetManager->publish('@backend/data');
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class=" ">
<head>
    <!-- 
     * @Package: Ultra Admin - Responsive Theme
     * @Subpackage: Bootstrap
     * @Version: 2.0
     * This file is part of Ultra Admin Theme.
    -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>Ultra Admin : Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link rel="shortcut icon" href="<?= $assetsUrl ?>/images/favicon.png" type="image/x-icon"/>
    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" href="<?= $assetsUrl ?>/images/apple-touch-icon-57-precomposed.png">
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="<?= $assetsUrl ?>/images/apple-touch-icon-114-precomposed.png">
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?= $assetsUrl ?>/images/apple-touch-icon-72-precomposed.png">
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?= $assetsUrl ?>/images/apple-touch-icon-144-precomposed.png">
    <!-- For iPad Retina display -->

    <?php
    $this->head();

    $this->registerCssFile($assetsUrl . '/plugins/pace/pace-theme-flash.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerCssFile($assetsUrl . '/plugins/bootstrap/css/bootstrap-theme.min.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerCssFile($assetsUrl . '/fonts/font-awesome/css/font-awesome.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerCssFile($assetsUrl . '/css/animate.min.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerCssFile($assetsUrl . '/plugins/perfect-scrollbar/perfect-scrollbar.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerCssFile($assetsUrl . '/css/style.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerCssFile($assetsUrl . '/css/responsive.css', ['depends' => [\yii\web\JqueryAsset::className()]]);

    $this->registerJsFile($assetsUrl . '/js/jquery.easing.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerJsFile($assetsUrl . '/plugins/perfect-scrollbar/perfect-scrollbar.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerJsFile($assetsUrl . '/plugins/pace/pace.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerJsFile($assetsUrl . '/plugins/viewport/viewportchecker.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerJsFile($assetsUrl . '/js/scripts.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerJsFile($assetsUrl . '/plugins/sparkline-chart/jquery.sparkline.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerJsFile($assetsUrl . '/js/chart-sparkline.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    ?>
	<?= Html::csrfMetaTags() ?>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class=" "><!-- START TOPBAR -->
<?php $this->beginBody() ?>
<div class='page-topbar '>
<div class='logo-area'>

</div>
<div class='quick-area'>
<div class='pull-left'>
<ul class="info-menu left-links list-inline list-unstyled">
<li class="sidebar-toggle-wrap">
    <a href="#" data-toggle="sidebar" class="sidebar_toggle">
        <i class="fa fa-bars"></i>
    </a>
</li>

<li class="hidden-sm hidden-xs searchform">
    <div class="">
		<?=
		Breadcrumbs::widget([
			'homeLink' => [
				'label' => Yii::t('app', 'Home'),
//                            'url' => Yii::$app->homeUrl,
				'template' => '<li> <a href="' . Yii::$app->homeUrl . '"><i class="fa fa-home"></i>Home</a></li>'
			],
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]);
		?>
	</div>
</li>
</ul>
</div>
<div class='pull-right'>
    <ul class="info-menu right-links list-inline list-unstyled">
        <li class="profile">
            <a href="javascript:;" data-toggle="dropdown" class="toggle">
                <img src="<?= $dataUrl ?>/profile/profile.png" alt="user-image" class="img-circle img-inline">
                <span><?= Yii::$app->user->identity->username; ?> <i class="fa fa-angle-down"></i></span>
            </a>
            <ul class="dropdown-menu profile animated fadeIn">
                <li>
                    <a href="#settings">
                        <i class="fa fa-wrench"></i>
                        Settings
                    </a>
                </li>
                <li>
                    <a href="#profile">
                        <i class="fa fa-user"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="#help">
                        <i class="fa fa-info"></i>
                        Help
                    </a>
                </li>
                <li class="last">
                    <a href="ui-login.html">
                        <i class="fa fa-lock"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </li>
        <li class="chat-toggle-wrapper">
            <a href="#" data-toggle="chatbar" class="toggle_chat">
                <i class="fa fa-comments"></i>
                <span class="badge badge-warning">9</span>
            </a>
        </li>
    </ul>
</div>
</div>

</div>
<!-- END TOPBAR -->
<!-- START CONTAINER -->
<div class="page-container row-fluid">

<!-- SIDEBAR - START -->
<div class="page-sidebar ">

    <!-- MAIN MENU - START -->
    <div class="page-sidebar-wrapper" id="main-menu-wrapper">

        <!-- USER INFO - START -->
        <div class="profile-info row">

            <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                <a href="ui-profile.html">
                    <img src="<?= $dataUrl ?>/profile/profile.png" class="img-responsive img-circle">
                </a>
            </div>

            <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                <h3>
                    <a href="ui-profile.html"><?= Yii::$app->user->identity->username; ?></a>

                    <!-- Available statuses: online, idle, busy, away and offline -->
                    <span class="profile-status online"></span>
                </h3>

                <p class="profile-title">Web Developer</p>

            </div>

        </div>
        <!-- USER INFO - END -->

        <ul class='wraplist'>
            <li class="">
                <a href="<?= Url::to(['/site/index']) ?>">
					<i class="fa fa-th"></i>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="">
                <a href="<?= Url::to(['/user/admin/index']) ?>">
                    <i class="fa fa-th"></i>
                    <span class="title">用户</span>
                </a>
            </li>
			
            <li class="<?= isset($this->params['menu']['order']) ? 'open' : '' ?>">
                <a href="<?= Url::to(['/post/index']) ?>">
                    <i class="fa fa-th"></i>
                    <span class="title">博客</span>
                </a>
            </li>
            <li class="<?= isset($this->params['menu']['system']) ? 'open' : '' ?>">
                <a href="javascript:;">
                    <i class="fa fa-gift"></i>
                    <span class="title">123</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a class="<?= isset($this->params['sub-menu']['setting']) ? 'active' : '' ?>"
                           href="<?= Url::to(['/system/core/setting/index']) ?>">966</a>
                    </li>
                    <li>
                        <a class="<?= isset($this->params['sub-menu']['system']) ? 'active' : '' ?>"
                           href="<?= Url::to(['/system/core/system/index']) ?>">333</a>
                    </li>
                    <li>
                        <a class="<?= isset($this->params['sub-menu']['tree']) ? 'active' : '' ?>"
                           href="<?= Url::to(['/tree/index']) ?>">777</a>
                    </li>
                    <li>
                        <a class="<?= isset($this->params['sub-menu']['station']) ? 'active' : '' ?>"
                           href="<?= Url::to(['/system/core/station/index']) ?>">666</a>
                    </li>
                </ul>
            </li>
            <li class="<?= isset($this->params['menu']['auth']) ? 'open' : '' ?>">
                <a href="javascript:;">
                    <i class="fa fa-envelope"></i>
                    <span class="title">333</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a class="<?= isset($this->params['sub-menu']['create']) ? 'active' : '' ?>"
                           href="<?= Url::to(['/auth/auth/create']) ?>">333</a>
                    </li>
                    <li>
                        <a class="<?= isset($this->params['sub-menu']['list-role']) ? 'active' : '' ?>"
                           href="<?= Url::to(['/auth/auth/list-role']) ?>">222</a>
                    </li>
                </ul>
            </li>
			
        </ul>

    </div>
    <!-- MAIN MENU - END -->

    <div class="project-info">

        <div class="block1">
            <div class="data">
                <span class='title'>会员数：345</span>
                
            </div>
            
        </div>

        <div class="block2">
            <div class="data">
                <span class='title'>访客数：1000</span>
                
            </div>
            
        </div>

    </div>

</div>
<!--  SIDEBAR - END -->
<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper" style='margin-top:50px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
        <div class="col-lg-12">
            <section class="box ">
                <?= $content; ?>
            </section>
        </div>

    </section>
</section>
<!-- END CONTENT -->
<div class="page-chatapi hideit">

    <div class="search-bar">
        <input type="text" placeholder="Search" class="form-control">
    </div>

    <div class="chat-wrapper">
        <h4 class="group-head">Groups</h4>
        <ul class="group-list list-unstyled">
            <li class="group-row">
                <div class="group-status available">
                    <i class="fa fa-circle"></i>
                </div>
                <div class="group-info">
                    <h4><a href="#">Work</a></h4>
                </div>
            </li>
            <li class="group-row">
                <div class="group-status away">
                    <i class="fa fa-circle"></i>
                </div>
                <div class="group-info">
                    <h4><a href="#">Friends</a></h4>
                </div>
            </li>
        </ul>

        <h4 class="group-head">Favourites</h4>
        <ul class="contact-list">

            <li class="user-row" id='chat_user_1' data-user-id='1'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-1.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Clarine Vassar</a></h4>
                    <span class="status available" data-status="available"> Available</span>
                </div>
                <div class="user-status available">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
            <li class="user-row" id='chat_user_2' data-user-id='2'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-2.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Brooks Latshaw</a></h4>
                    <span class="status away" data-status="away"> Away</span>
                </div>
                <div class="user-status away">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
            <li class="user-row" id='chat_user_3' data-user-id='3'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-3.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Clementina Brodeur</a></h4>
                    <span class="status busy" data-status="busy"> Busy</span>
                </div>
                <div class="user-status busy">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
        </ul>

        <h4 class="group-head">More Contacts</h4>
        <ul class="contact-list">

            <li class="user-row" id='chat_user_4' data-user-id='4'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-4.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Carri Busey</a></h4>
                    <span class="status offline" data-status="offline"> Offline</span>
                </div>
                <div class="user-status offline">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
            <li class="user-row" id='chat_user_5' data-user-id='5'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-5.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Melissa Dock</a></h4>
                    <span class="status offline" data-status="offline"> Offline</span>
                </div>
                <div class="user-status offline">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
            <li class="user-row" id='chat_user_6' data-user-id='6'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-1.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Verdell Rea</a></h4>
                    <span class="status available" data-status="available"> Available</span>
                </div>
                <div class="user-status available">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
            <li class="user-row" id='chat_user_7' data-user-id='7'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-2.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Linette Lheureux</a></h4>
                    <span class="status busy" data-status="busy"> Busy</span>
                </div>
                <div class="user-status busy">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
            <li class="user-row" id='chat_user_8' data-user-id='8'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-3.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Araceli Boatright</a></h4>
                    <span class="status away" data-status="away"> Away</span>
                </div>
                <div class="user-status away">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
            <li class="user-row" id='chat_user_9' data-user-id='9'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-4.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Clay Peskin</a></h4>
                    <span class="status busy" data-status="busy"> Busy</span>
                </div>
                <div class="user-status busy">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
            <li class="user-row" id='chat_user_10' data-user-id='10'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-5.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Loni Tindall</a></h4>
                    <span class="status away" data-status="away"> Away</span>
                </div>
                <div class="user-status away">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
            <li class="user-row" id='chat_user_11' data-user-id='11'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-1.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Tanisha Kimbro</a></h4>
                    <span class="status idle" data-status="idle"> Idle</span>
                </div>
                <div class="user-status idle">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
            <li class="user-row" id='chat_user_12' data-user-id='12'>
                <div class="user-img">
                    <a href="#"><img src="<?= $dataUrl ?>/profile/avatar-2.png" alt=""></a>
                </div>
                <div class="user-info">
                    <h4><a href="#">Jovita Tisdale</a></h4>
                    <span class="status idle" data-status="idle"> Idle</span>
                </div>
                <div class="user-status idle">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="chatapi-windows ">

</div>
</div>
<!-- END CONTAINER -->
<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

<!-- General section box modal start -->
<div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label"
     aria-hidden="true">
    <div class="modal-dialog animated bounceInDown">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Section Settings</h4>
            </div>
            <div class="modal-body">
                Body goes here...
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-success" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- modal end -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script type="text/javascript">

</script>