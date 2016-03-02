<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CasesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cases-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'pid') ?>

    <?= $form->field($model, 'aid') ?>

    <?= $form->field($model, 'did') ?>

    <?php // echo $form->field($model, 'bedroom') ?>

    <?php // echo $form->field($model, 'style') ?>

    <?php // echo $form->field($model, 'budget') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'cost_range') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'area_range') ?>

    <?php // echo $form->field($model, 'space') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'brief') ?>

    <?php // echo $form->field($model, 'is_rec') ?>

    <?php // echo $form->field($model, 'is_show') ?>

    <?php // echo $form->field($model, 'orderid') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'create_uid') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
