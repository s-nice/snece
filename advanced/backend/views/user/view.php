<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\user */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '账号列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-title">
	<div class="pull-left">
		<h1 class="title">查看账号：<?= $model->username ?></h1>
	</div>
	<div class="pull-right hidden-xs">
		<?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('删除', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => '确定删除？',
				'method' => 'post',
			],
		]) ?>
	</div>
</div>

<div class="user-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
			
			'phone',
           // 'auth_key',
           // 'password_hash',
           // 'password_reset_token',
            'email',
			'type',
            //'status',
			[
				'attribute'=>'status',
				'format' => 'raw',
				'value' => $model->status == 10 ? '正常' : '锁定',
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
