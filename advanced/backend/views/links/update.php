<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Links */

$this->title = '更新 友情链接: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="page-title">

	<div class="pull-left">
		<h1 class="title"><?= $this->title ?></h1>
	</div>

	<div class="pull-right hidden-xs">
		<?= Html::a('返回', ['index'], ['class' => 'btn btn-primary']) ?>
	</div>

</div>

<div class="links-update content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
