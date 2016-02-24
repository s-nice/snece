<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\user */
/* @var $form yii\widgets\ActiveForm */

$this->title = '修改密码';
$this->params['breadcrumbs'][] = ['label' => '个人信息', 'url' => ['profile']];
$this->params['breadcrumbs'][] = $this->title;
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

<div class="pw-form content-body">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'password_hash', ['labelOptions' => ['label' => '旧密码','class'=>'control-label']])->passwordInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'newpw')->passwordInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'repeat')->passwordInput(['maxlength' => true]) ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? '提交' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>