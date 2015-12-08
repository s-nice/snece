<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="site-login">
    <h3>登录</h3>
	<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

		<?= $form->field($model, 'username') ?>

		<?= $form->field($model, 'password')->passwordInput() ?>

		<div class="form-group">
			<?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
		</div>

	<?php ActiveForm::end(); ?>
</div>

<style>
	html, body {
		height: auto;
	}
	
	.site-login {
		width: 400px;
		height: 260px;
		text-align: center;
		border: 1px solid #ccc;
		position: absolute;
		top:50%;
		left:50%;
		margin-top:-130px;
		margin-left:-200px;
	}
	
	.help-block {
		height:10px;
		margin-left: 0px;
	}
	
	form label {
		width: 50px;
		padding-right: 5px;
	}
	
	.form-group .btn {
		margin-left: 20px;
	}
	
	h3 {
		margin-bottom: 20px;
	}
</style>