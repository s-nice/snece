<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Designer */

$this->title = '更新设计师: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '设计师列表', 'url' => ['index']];
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

<div class="designer-update content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
