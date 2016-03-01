<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Adver */

$this->title = '更新广告位: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '广告位', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

<div class="page-title">

	<div class="pull-left">
		<h1 class="title"><?= $this->title ?></h1>
	</div>

	<div class="pull-right hidden-xs">
		<?= Html::a('返回', ['index'], ['class' => 'btn btn-primary']) ?>
	</div>

</div>

<div class="adver-update content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
