<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ApplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '报名';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-title">

	<div class="pull-left">
		<h1 class="title"><?= Html::encode($this->title) ?></h1>
	</div>

	<div class="pull-right hidden-xs">
		<?= Html::a('新增', ['create'], ['class' => 'btn btn-primary pull-right']) ?>
	</div>

</div>

<div class="apply-index content-body">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<?php Pjax::begin(['formSelector' => 'form', 'enablePushState' => false]);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'aid',
            'mid',
            'name',
            'phone',
            // 'province',
            // 'city',
            // 'property',
            // 'money',
            // 'prize',
            // 'cid',
            // 'did',
            // 'eff',
            // 'status',
            // 'create_time',
            // 'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);Pjax::end(); ?>

</div>
