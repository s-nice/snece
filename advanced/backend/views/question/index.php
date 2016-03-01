<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '问题列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pid',
            'relid',
            'question',
            'detail:ntext',
            // 'questioner',
            // 'orderid',
            // 'status',
            // 'is_show',
            // 'source',
            // 'label',
            // 'views',
            // 'answers',
            // 'create_at',
            // 'is_rec',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
