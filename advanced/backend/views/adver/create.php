<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Adver */

$this->title = 'Create Adver';
$this->params['breadcrumbs'][] = ['label' => 'Advers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adver-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
