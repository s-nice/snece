<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Adver */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '广告位', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-title">
	<div class="pull-left">
		<h1 class="title">查看广告位 <?= $model->name ?></h1>
	</div>
	<div class="pull-right hidden-xs">
		<?= Html::a('创建', ['create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('删除', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => '确定删除？',
				'method' => 'post',
			],
		]) ?>
	</div>
</div>

<div class="adver-view content-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'remark',
            'create_uid',
            'create_at:datetime',
            'update_at:datetime',
        ],
    ]) ?>

</div>
