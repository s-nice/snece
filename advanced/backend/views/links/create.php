<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Links */

$this->title = '创建友情链接';
$this->params['breadcrumbs'][] = ['label' => '友情链接', 'url' => ['index']];
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

<div class="links-create content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
