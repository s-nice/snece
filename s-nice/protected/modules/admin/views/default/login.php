<?php
/* @var $this PublicController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<!DOCTYPE html>
<html class=" ">
    <head>
        <!-- 
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 2.0
         * This file is part of Ultra Admin Theme.
        -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Ultra Admin : Login Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="/assets/images/apple-touch-icon-57-precomposed.png">	<!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->
		
        <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
		
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" login_page">

        <div class="login-wrapper">
            <div style="padding-top: 100px" id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
                <h1><a href="#" title="Login Page" tabindex="-1">Ultra Admin</a></h1>

				<?php
				$form = $this->beginWidget('CActiveForm', array(
					'id' => 'login-form',
					'enableClientValidation' => true,
					'clientOptions' => array(
						'validateOnSubmit' => true,
					),
				));
				?>

				
				<p>
					<?php echo $form->labelEx($model,'账号：', array('for'=>'username') ); ?>
					<?php echo $form->textField($model,'username', array('class'=>'input') ); ?>
					<?php echo $form->error($model,'username', array('class'=>'tipText tipError'), true ); ?>
				</p>
				<p>
					<?php echo $form->labelEx($model,'密码：', array('for'=>'user_pass') ); ?>
					<?php echo $form->passwordField($model,'password', array('class'=>'input') ); ?>
					<?php echo $form->error($model,'password', array('class'=>'tipText tipError'), false); ?>
				</p>
				
				<p class="submit">
					<input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="登录">
				</p>
				
				<?php $this->endWidget(); ?>
				
            </div>
			
        </div>
		
    </body>
</html>