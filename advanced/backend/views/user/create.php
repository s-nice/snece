<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\user */

$this->title = '创建用户';
$this->params['breadcrumbs'][] = ['label' => '用户列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
