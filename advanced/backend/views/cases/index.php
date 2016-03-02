<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CasesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '案例列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cases-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建案例', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'pid',
            'aid',
            'did',
            // 'bedroom',
            // 'style',
            // 'budget',
            // 'cost',
            // 'cost_range',
            // 'area',
            // 'area_range',
            // 'space',
            // 'img',
            // 'brief:ntext',
            // 'is_rec',
            // 'is_show',
            // 'orderid',
            // 'views',
            // 'create_uid',
            // 'create_at',
            // 'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
