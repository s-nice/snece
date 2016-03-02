<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cases */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cases-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'did')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bedroom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'budget')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'cost_range')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area_range')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'space')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brief')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_rec')->textInput() ?>

    <?= $form->field($model, 'is_show')->textInput() ?>

    <?= $form->field($model, 'orderid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'views')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
