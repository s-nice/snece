<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Designer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '设计师列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'uid',
            'name',
            'sentence',
            'auth_type',
            'province',
            'city',
            'avatar',
            'label',
            'exp',
            'feeh',
            'feel',
            'good_style',
            'good_space',
            'brief:ntext',
            'award:ntext',
            'bgimg',
            'is_show',
            'is_rec',
            'orderid',
            'level',
            'create_uid',
            'create_at',
        ],
    ]) ?>

</div>
