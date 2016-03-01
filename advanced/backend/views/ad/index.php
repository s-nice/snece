<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>
<p>
	<?= Html::a('创建广告', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="ad-index content-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<?php Pjax::begin(['formSelector' => 'form', 'enablePushState' => false]);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pid',
            'title',
            //'img',
			[
			'label' => '图片',
			'format' => 'raw',
			'value' => function($m) {
				return Html::img('/'.$m->img, ['class' => '',
					'width' => 100]
				);
			}
			],
            //'link',
			[
			'attribute' => 'link',
			'value' => function ($m) {
				return Html::a($m->link);
			},
				'format' => 'raw',
			],
			// 'orderid',
            // 'is_show',
            // 'create_uid',
            // 'create_at',
            // 'update_at',
			[
				'attribute' => 'is_show',
				'value' => function ($model) {
					return $model->is_show == 1 ? '显示' : '不显示';
				},
				//在搜索条件（过滤条件）中使用下拉框来搜索
				'filter' => ['0' => '全部','1' => '显示', '2' => '不显示'],
			],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);Pjax::end(); ?>

</div>
