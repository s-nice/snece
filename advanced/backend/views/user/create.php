<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\user */

$this->title = '创建账号';
$this->params['breadcrumbs'][] = ['label' => '账号列表', 'url' => ['index']];
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

<div class="user-create content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
