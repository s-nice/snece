<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="text-align: center;margin-top: 100px;" class="site-login">
    <h2><?= Html::encode($this->title) ?></h2>

    <div class="row">
        <div class="">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username', ['labelOptions' => ['label' => '帐号：','class' => 'your own class']]) ?><br>

                <?= $form->field($model, 'password', ['labelOptions' => ['label' => '密码：','class' => 'your own class']])->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<style>
	.form-control {
		display: inline;
		width: 20%;
	}
</style>
