<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Adminuser */

$this->title = '更新: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Adminusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
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

<div class="adminuser-update content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
