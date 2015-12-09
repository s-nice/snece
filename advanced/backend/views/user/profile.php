<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\user */
/* @var $form yii\widgets\ActiveForm */

$this->title = '个人信息';
$this->params['breadcrumbs'][] = ['label' => '修改密码', 'url' => ['pw']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
//提示.
if (Yii::$app->getSession()->hasFlash('success')) {
	echo Alert::widget([
		'options' => [
			'class' => 'alert-success', //这里是提示框的class
		],
		'body' => Yii::$app->getSession()->getFlash('success'), //消息体
	]);
}
if (Yii::$app->getSession()->hasFlash('error')) {
	echo Alert::widget([
		'options' => [
			'class' => 'alert-error',
		],
		'body' => Yii::$app->getSession()->getFlash('error'),
	]);
}
?>

<div class="profile-form content-body">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'avatar')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '提交' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>