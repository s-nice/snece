<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\user */
/* @var $form yii\widgets\ActiveForm */

$this->title = '个人信息';
$this->params['breadcrumbs'][] = ['label' => '修改密码', 'url' => ['pw']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>
	
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '提交' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>