<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-title">

	<div class="pull-left">
		<h1 class="title">用户列表</h1>
	</div>

	<div class="pull-right hidden-xs">
		<?= Html::a('创建用户', ['create'], ['class' => 'btn btn-primary pull-right']) ?>
	</div>

</div>

<div class="user-index">
	<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<?php Pjax::begin(['formSelector' => 'form', 'enablePushState' => false]);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
			'phone',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email',
            //'status',
			[
				'attribute' => 'status',
				'value' => function ($model) {
					return $model->status == 10 ? '正常' : '锁定';
				},
			],
			'type',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
	Pjax::end();
	?>

</div>
