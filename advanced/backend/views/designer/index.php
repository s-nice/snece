<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DesignerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '设计师列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'uid',
            'name',
            'sentence',
            'auth_type',
            // 'province',
            // 'city',
            // 'avatar',
            // 'label',
            // 'exp',
            // 'feeh',
            // 'feel',
            // 'good_style',
            // 'good_space',
            // 'brief:ntext',
            // 'award:ntext',
            // 'bgimg',
            // 'is_show',
            // 'is_rec',
            // 'orderid',
            // 'level',
            // 'create_uid',
            // 'create_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
