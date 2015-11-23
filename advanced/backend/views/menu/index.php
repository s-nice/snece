<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="header">
	<h1 class="page-title">菜单管理</h1>
</div>

<ul class="breadcrumb">
	<li><?= Html::a('菜单管理', ['index']) ?> <span class="divider">/</span></li>
	<li class="active">菜单列表</li>
</ul>

<div class="container-fluid">
   
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建菜单', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'pid',
            'url:url',
            'level',
            // 'path',
            // 'orderid',
            // 'is_show',
            // 'create_uid',
            // 'create_time',
            // 'update_uid',
            // 'update_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
