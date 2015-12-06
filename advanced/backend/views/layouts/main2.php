<?php
use backend\assets\AppAsset;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use mdm\admin\models\searchs\Menu as MenuSearch;

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

    <?php
    $this->head();
	$this->registerCssFile($assetsUrl . '/css/style.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerCssFile($assetsUrl . '/fonts/font-awesome/css/font-awesome.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
	
	$this->registerJsFile($assetsUrl . '/plugins/bootstrap/js/bootstrap.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
	$this->registerJsFile($assetsUrl . '/plugins/perfect-scrollbar/perfect-scrollbar.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
	
	$this->registerJsFile($assetsUrl . '/js/scripts.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
	$this->registerJsFile($assetsUrl . '/js/jquery.cookie.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    ?>
	<?= Html::csrfMetaTags() ?>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class=" "><!-- START TOPBAR -->
<?php $this->beginBody() ?>
<div class='page-topbar '>
<div style="width:150px" class='logo-area'>

</div>
<div class='quick-area'>
<div class='pull-left'>
<ul class="info-menu left-links list-inline list-unstyled">
<li>
    <div class="">
		<?=
		Breadcrumbs::widget([
			'homeLink' => [
				'label' => Yii::t('app', 'Home'),
				'url' => Yii::$app->homeUrl,
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
        <li class="profile showopacity">
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
                    <a href="<?= Url::to('/site/logout') ?>">
                        <i class="fa fa-lock"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
</div>

</div>
<!-- END TOPBAR -->
<!-- START CONTAINER -->
<div class="page-container row-fluid">

<!-- SIDEBAR - START -->
<div style="width:150px;height:800px;" class="page-sidebar ">

    <!-- MAIN MENU - START -->
    <div class="page-sidebar-wrapper" id="main-menu-wrapper">
		<?php
		$searchModel = new MenuSearch;
		$menus = $searchModel->getMenus();
		?>
        <ul class='wraplist'>
			<?php foreach ($menus as $i => $menu) { ?>
            <li class="">
                <a <?php if($menu->route){ echo "id='menu_1_$menu->id' href='$menu->route'"; }else{ echo 'href="javascript:;"'; } ?> href="<?= Url::to($menu->route) ?>">
					
                    <span class="title"><?php echo $menu->name; ?></span>
					<?php if(!$menu->route){ ?>
					<span class="arrow"></span>
					<?php } ?>
                </a>
				<?php $menu2 = $searchModel->getMenus($menu->id); if($menu2){	 ?>
				<ul class="sub-menu">
					<?php foreach ($menu2 as $two){ ?>
					<li>
						<a id="menu_2_<?php echo $two->id; ?>" class="" href="<?php echo $two->route; ?>"><?php echo $two->name; ?></a>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>
            </li>
			<?php } ?>
           
        </ul>

    </div>
    <!-- MAIN MENU - END -->
</div>
<!--  SIDEBAR - END -->
<!-- START CONTENT -->
<section style="margin-left: 150px;" id="main-content" class=" ">
    <section class="wrapper" style='margin-top:50px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
        <div class="col-lg-12">
            <section class="box ">
                <?= $content; ?>
            </section>
        </div>

    </section>
</section>
<!-- END CONTENT -->

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

<script>
	$('.wraplist a').click(function() {
		$.cookie('menu',$(this).attr('id'),{path:"/"});
	});

	$(document).ready(function() {
		var menu=$.cookie('menu');
		var arr=new Array();

		if(menu==null){
			menu='menu_1_1';
		}

		arr = menu.split("_");

		if(arr[1]==1){
			$('#'+menu).parent().addClass('open');
		}else{

			$('#'+menu).parents('.sub-menu').parent().addClass('open');
			$('#'+menu).addClass('active');
			$('#'+menu).parents('.sub-menu').show();
		}
	});
</script>