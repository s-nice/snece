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

<?php //echo $this->render('_search', ['model' => $searchModel]); ?>

<h2>用户列表</h2>
<p>
	<?= Html::a('创建用户', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="user-index content-body">
	<?php Pjax::begin(['formSelector' => 'form', 'enablePushState' => false]);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
	Pjax::end();
	?>

</div>
