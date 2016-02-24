<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Adver */

$this->title = 'Update Adver: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Advers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adver-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
