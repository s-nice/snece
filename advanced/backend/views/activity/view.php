<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Activity */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '活动列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('创建', ['create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'template',
            'link',
            'remark',
            'orderid',
            'create_uid',
            'create_at',
            'update_at',
        ],
    ]) ?>

</div>