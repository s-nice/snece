<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DesignerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="designer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'sentence') ?>

    <?= $form->field($model, 'auth_type') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'label') ?>

    <?php // echo $form->field($model, 'exp') ?>

    <?php // echo $form->field($model, 'feeh') ?>

    <?php // echo $form->field($model, 'feel') ?>

    <?php // echo $form->field($model, 'good_style') ?>

    <?php // echo $form->field($model, 'good_space') ?>

    <?php // echo $form->field($model, 'brief') ?>

    <?php // echo $form->field($model, 'award') ?>

    <?php // echo $form->field($model, 'bgimg') ?>

    <?php // echo $form->field($model, 'is_show') ?>

    <?php // echo $form->field($model, 'is_rec') ?>

    <?php // echo $form->field($model, 'orderid') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'create_uid') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
