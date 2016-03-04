<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Adminuser */

$this->title = '创建管理用户';
$this->params['breadcrumbs'][] = ['label' => 'Adminusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-title">

	<div class="pull-left">
		<h1 class="title"><?= $this->title ?></h1>
	</div>

	<div class="pull-right hidden-xs">
		<?= Html::a('返回', ['index'], ['class' => 'btn btn-primary']) ?>
	</div>

</div>

<div class="adminuser-create content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
