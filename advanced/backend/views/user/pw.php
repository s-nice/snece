<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\user */

$this->title = '修改密码';
$this->params['breadcrumbs'][] = ['label' => '个人信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <div class="user-form">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'password_hash', ['labelOptions' => ['label' => '旧密码']])->passwordInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'newpw')->passwordInput(['maxlength' => true]) ?>
		
		<?= $form->field($model, 'repeat')->passwordInput(['maxlength' => true]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? '提交' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>

</div>
