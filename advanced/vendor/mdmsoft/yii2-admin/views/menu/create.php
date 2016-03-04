<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */

$this->title = Yii::t('rbac-admin', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= Html::encode($this->title) ?></h2>
<p>
<?= Html::a('菜单列表', ['index'], ['class' => 'btn btn-success']) ?>
</p>

<div class="menu-create content-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
