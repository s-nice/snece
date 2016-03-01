<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LinksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '友情链接';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-title">

	<div class="pull-left">
		<h1 class="title"><?= Html::encode($this->title) ?></h1>
	</div>

	<div class="pull-right hidden-xs">
		<?= Html::a('创建', ['create'], ['class' => 'btn btn-primary pull-right']) ?>
	</div>

</div>

<div class="links-index content-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<?php Pjax::begin(['formSelector' => 'form', 'enablePushState' => false]);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'img',
            //'link:url',
			[
				'attribute' => 'link',
				'value' => function ($model) {
					return Html::a($model->link,$model->link,array('target'=>'_blank'));
				},
				'format' => 'raw',
			],
			'orderid',
            // 'create_uid',
            // 'create_at',
            // 'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);Pjax::end(); ?>

</div>
