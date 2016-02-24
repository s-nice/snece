<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Adver */

$this->title = '创建广告位';
$this->params['breadcrumbs'][] = ['label' => '广告位', 'url' => ['index']];
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

<div class="adver-create content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
