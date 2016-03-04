<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Adminuser */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '后台用户列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adminuser-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
			'realname',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email',
            //'status',
            //'avatar',
			[
				'attribute'=>'avatar',
				'format' => 'raw',
				'value' => html::img('/'.$model->avatar,array('width'=>200)),
			],
            'phone',
            'type',
			[
				'attribute'=>'status',
				'format' => 'raw',
				'value' => $model->status == 1 ? '正常' : '锁定',
			],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
