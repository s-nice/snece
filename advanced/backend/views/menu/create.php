<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\menu */

$this->title = 'Create Menu';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="header">
	<h1 class="page-title">菜单管理</h1>
</div>

<ul class="breadcrumb">
	<li><?= Html::a('菜单管理', ['index']) ?> <span class="divider">/</span></li>
	<li class="active">创建菜单</li>
</ul>

<div class="container-fluid">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
