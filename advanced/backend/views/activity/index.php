<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
	<?= Html::a('创建活动', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="activity-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'template',
            //'link',
			[
				'attribute' => 'link',
				'value' => function ($model) {
					return Html::a($model->link,$model->link,array('target'=>'_blank'));
				},
				'format' => 'raw',
			],
            //'remark',
            // 'orderid',
            // 'create_uid',
            // 'create_at',
            // 'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
