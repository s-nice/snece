<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Designer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="designer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sentence')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_type')->textInput() ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'feeh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'feel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'good_style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'good_space')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brief')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'award')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bgimg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_show')->textInput() ?>

    <?= $form->field($model, 'is_rec')->textInput() ?>

    <?= $form->field($model, 'orderid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
