<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ad */

$this->title = '创建广告';
$this->params['breadcrumbs'][] = ['label' => '广告', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<p>
	<?= Html::a('返回', ['index'], ['class' => 'btn btn-success']) ?>
</p>
<div class="ad-create content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
