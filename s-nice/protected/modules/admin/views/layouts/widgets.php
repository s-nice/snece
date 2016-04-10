<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html" />
        <meta charset="utf-8" />
        <title>S-NICE ADMIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
        <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
		
        <!-- CORE CSS FRAMEWORK - START -->
        <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->
		
        <!-- CORE CSS TEMPLATE - START -->
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" "><!-- START TOPBAR -->
        <div class='page-topbar '>
            <div class='logo-area'>

            </div>
            <div class='quick-area'>
                <div class='pull-left'>
                    <ul class="info-menu left-links list-inline list-unstyled breadcrumb">
						<?php if (isset($this->breadcrumbs)):
						$this->widget('zii.widgets.CBreadcrumbs', array(
							'homeLink'=>CHtml::link('<i class="fa fa-home"> Home</i>',Yii::app()->createUrl('admin/default/index')),
							'links' => $this->breadcrumbs,
						));endif ?>
                    </ul>
					
                </div>		
                <div class='pull-right'>
                    <ul class="info-menu right-links list-inline list-unstyled">
                        <li class="profile">
                            <a href="<?php echo Yii::app()->createUrl('admin/user/profile'); ?>" data-toggle="dropdown" class="toggle">
                                <img src="<?php echo User::getAvatar(); ?>" alt="user-image" class="img-circle img-inline">
                                <span><?php echo Yii::app()->user->user_name;?> <i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul class="dropdown-menu profile animated fadeIn">
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('admin/user/pwd'); ?>">
                                        <i class="fa fa-wrench"></i>
                                        修改密码
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('admin/user/profile'); ?>">
                                        <i class="fa fa-user"></i>
                                        个人信息
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('admin/public/logout'); ?>">
                                        <i class="fa fa-lock"></i>
                                        退出
                                    </a>
                                </li>
								
								
                            </ul>
                        </li>
						|
						<li>
							<a href="<?php echo Yii::app()->homeUrl; ?>" target="_blank"><i class="fa fa-home"> 前台首页</i></a>
						</li>
                    </ul>			
                </div>		
            </div>

        </div>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <div style='height:1000px' class="page-sidebar">
                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper">
                    <!-- USER INFO - END -->
                    <ul class='wraplist'>
                        
						<?php $menu1 = Menu::getList(0); if($menu1){ foreach ($menu1 as $one){ ?>
                        <li class=""> 
							<a <?php if($one->url){ echo "id='menu_1_$one->id' href='$one->url'"; }else{ echo 'href="javascript:;"'; } ?> >
                                
                                <span class="title"><?php echo $one->name; ?></span>
								<?php if(!$one->url){ ?>
                                <span class="arrow"></span>
								<?php } ?>
                            </a>
							<?php $menu2 = Menu::getList($one->id); if($menu2){	 ?>
                            <ul class="sub-menu">
								<?php foreach ($menu2 as $two){ ?>
                                <li>
                                    <a id="menu_2_<?php echo $two->id; ?>" class="" href="<?php echo $two->url; ?>"><?php echo $two->name; ?></a>
                                </li>
								<?php } ?>
                            </ul>
							<?php } ?>
                        </li>
						<?php }} ?>
						
                    </ul>

                </div>
                <!-- MAIN MENU - END -->

            </div>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper">
                    <?php echo $content; ?>
                </section>
            </section>
            <!-- END CONTENT -->
            
		</div>
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        
        <script src="/assets/js/jquery.easing.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        
        <script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
		
        <!-- CORE TEMPLATE JS - START --> 
        <script src="/assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END -->
		
		<?php Yii::app()->clientScript->registerCoreScript('cookie'); ?>
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
		
		<!-- modal start -->
		<div class="modal fade" id="ultraModal-8">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-body">

						Content is loading...

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
					</div>
				</div>
			</div>
		</div>
		
    </body>
</html>