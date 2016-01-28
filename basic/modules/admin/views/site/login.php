<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>登录 - Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="ace/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="ace/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="ace/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="ace/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="ace/css/ace.min.css" />
		<link rel="stylesheet" href="ace/css/ace-rtl.min.css" />

	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="icon-leaf green"></i>
									<span class="red">Ace</span>
									<span class="white">Application</span>
								</h1>
								<h4 class="blue">&copy; Company Name</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												登录
											</h4>

											<div class="space-6"></div>
											<?php
											$form = ActiveForm::begin([
														'id' => 'login-form',
														'options' => ['class' => 'form-horizontal'],
														'fieldConfig' => [
															'template' => "{label}\n<span class=\"block input-icon input-icon-right\">{input}</span>\n<div class=\"col-lgx\">{error}</div>",
															'labelOptions' => ['class' => 'block clearfix'],
														],
											]);
											?>

											<?= $form->field($model, 'username') ?>

											<?= $form->field($model, 'password')->passwordInput() ?>


											<div class="clearfix">

											<?= Html::submitButton('Login', ['class' => 'width-35 pull-right btn btn-sm btn-primary', 'name' => 'login-button']) ?>

											</div>

											<?php ActiveForm::end(); ?>





										</div><!-- /widget-main -->

									</div><!-- /widget-body -->
								</div><!-- /login-box -->

							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

	</body>
</html>
