<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Ad */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '广告列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pid',
            'title',
            //'img',
			[
				'attribute'=>'img',
				'format' => 'raw',
				'value' => html::img('/'.$model->img,array('width'=>200)),
			],
            'link',
            'orderid',
            //'is_show',
			[
				'attribute'=>'is_show',
				'format' => 'raw',
				'value' => $model->is_show == 1 ? '显示' : '不显示',
			],
            //'create_uid',
			['label'=>'创建者','value'=>User::getName($model->create_uid),],
            'create_at:datetime',
            'update_at:datetime',
        ],
    ]) ?>

</div>
