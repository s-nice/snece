<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ad */

$this->title = '更新广告: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '广告列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
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

<div class="ad-update content-body">

    <?= $this->render('_form', [
        'model' => $model,
		'adverlist'=>$adverlist,
    ]) ?>

</div>
