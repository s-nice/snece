<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cases */

$this->title = '创建案例';
$this->params['breadcrumbs'][] = ['label' => '案例列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-title">

	<div class="pull-left">
		<h1 class="title"><?= Html::encode($this->title) ?></h1>
	</div>

	<div class="pull-right hidden-xs">
		<?= Html::a('返回', ['index'], ['class' => 'btn btn-primary']) ?>
	</div>

</div>

<div class="cases-create content-body">
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
