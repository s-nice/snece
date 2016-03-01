<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Basic */

$this->title = '创建'.$parent->name;
$this->params['breadcrumbs'][] = ['label' => $parent->name, 'url' => ['index', 'pid' => $parent->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-title">

	<div class="pull-left">
		<h1 class="title"><?= Html::encode($this->title) ?></h1>
	</div>

	<div class="pull-right hidden-xs">
		<?= Html::a('返回', ['index', 'pid' => $parent->id], ['class' => 'btn btn-primary']) ?>
	</div>

</div>

<div class="basic-create content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
