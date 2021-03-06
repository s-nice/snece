<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Bootstrap Admin</title>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">

		<link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
		<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

		<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
		
		<style type="text/css">
			.form-group {
				
				margin-top: 20px;
			}
		</style>
		
		<link rel="shortcut icon" href="../assets/ico/favicon.ico">
	</head>
	
	<body> 
        <div class="row-fluid">
			<div class="dialog">
				<div class="block" style="margin-top: 80%;height:300px">
					<p class="block-heading">后台登录</p>
					<div class="block-body">
						<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

							<?= $form->field($model, 'username') ?>

							<?= $form->field($model, 'password')->passwordInput() ?>

						<div style="text-align:center" class="form-group">
								<?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
							</div>

						<?php ActiveForm::end(); ?>
					</div>
				</div>
				
			</div>
		</div>
		
		<script src="lib/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript">
			$("[rel=tooltip]").tooltip();
			$(function () {
				$('.demo-cancel-click').click(function () {
					return false;
				});
			});
		</script>

	</body>
</html>


