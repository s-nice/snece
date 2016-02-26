<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; />
        <meta charset="utf-8" />
        <title>Admin</title>
		
        <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon" />
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body>
        
            <div id="login">
                <h1>ADMIN</h1>

				<?php $form = ActiveForm::begin([
				'id' => 'login-form',
				'fieldConfig' => [  
				'template' => "{label}{input}\n{error}",  
				'inputOptions' => ['class' => 'input'],],
				]); ?>

				<?= $form->field($model, 'username') ?>

				<?= $form->field($model, 'password')->passwordInput() ?>

				<div class="form-group">
					<?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
				</div>

				<?php ActiveForm::end(); ?>
				
            </div>
		
    </body>
</html>
<style>
html {

}
body {
	background-color: #f1f2f7;
	font-size: 15px;
	overflow: hidden;
}

#login {
	width: 500px;
	height:500px;
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -250px 0 0 -250px;
}

h1 {
	height: 60px;
	font-family: 'Open Sans', Arial, Helvetica, sans-serif;
	font-weight: 300;
	color: #505458;
	text-align:center;
}

#login-form label {
	color: black;
}

#login-form .input {
	width: 95%;
	padding: 9px;
	margin-top: 10px;
}

.help-block-error {
	margin-top:3px;
	height:12px;
	color: #C00;
}

input,button:focus{
	outline:none;
}

.btn {
	width: 100%;
	padding: 11px 23px;
	font-size: 19px;
	border-radius: 0px;
	border:0px;

	background: rgba(31, 181, 172, 1.0);
	color: #ffffff;
	cursor: pointer;
}
</style>