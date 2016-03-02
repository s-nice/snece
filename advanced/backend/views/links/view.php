<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Links */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '友情链接列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="links-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('创建', ['create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'name',
            //'img',
			[
				'attribute'=>'img',
				'format' => 'raw',
				'value' => html::img('/'.$model->img,array('width'=>200)),
			],
            //'link',
			[
				'attribute'=>'link',
				'format' => 'raw',
				'value' => Html::a($model->link,$model->link,array('target'=>'_blank')),
			],
            'orderid',
            //'create_uid',
			['label'=>'创建者','value'=>User::getName($model->create_uid),],
            'create_at:datetime',
            'update_at:datetime',
        ],
    ]) ?>

</div>
