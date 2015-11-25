<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="header">
	<h1 class="page-title">菜单管理</h1>
</div>

<ul class="breadcrumb">
	<li><?= Html::a('菜单管理', ['index']) ?> <span class="divider">/</span></li>
	<li class="active">查看菜单菜单 <?= $model->name; ?></li>
</ul>

<div class="container-fluid">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'pid',
            'url:url',
            'level',
            'path',
            'orderid',
            'is_show',
            'create_uid',
            'create_time',
            'update_uid',
            'update_time',
        ],
    ]) ?>

</div>
