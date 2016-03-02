<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Cases */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '案例列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cases-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('创建', ['create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'name',
            'pid',
            'aid',
            'did',
            'bedroom',
            'style',
            'budget',
            'cost',
            'cost_range',
            'area',
            'area_range',
            'space',
            'img',
            'brief:ntext',
            'is_rec',
            'is_show',
            'orderid',
            'views',
            'create_uid',
            'create_at',
            'update_at',
        ],
    ]) ?>

</div>
