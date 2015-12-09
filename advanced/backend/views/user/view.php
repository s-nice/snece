<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\user */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '用户列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2>查看用户 <?= $model->username ?></h2>
<p>
	<?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	<?= Html::a('删除', ['delete', 'id' => $model->id], [
		'class' => 'btn btn-danger',
		'data' => [
			'confirm' => '确定删除？',
			'method' => 'post',
		],
	]) ?>
</p>

<div class="user-view content-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
