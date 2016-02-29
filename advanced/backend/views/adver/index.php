<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告位';
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

<div class="adver-index content-body">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<?php Pjax::begin(['formSelector' => 'form', 'enablePushState' => false]);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'remark',
            'create_uid',
            'create_at:datetime',
            // 'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);Pjax::end(); ?>

</div>
