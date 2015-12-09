<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\Route $model
 * @var ActiveForm $form
 */

$this->title = Yii::t('rbac-admin', 'Create Route');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Routes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= Yii::t('rbac-admin', '创建路由') ?></h2>

<div class="create content-body">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'route', ['labelOptions' => ['label' => '路由','class'=>'control-label']]) ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('rbac-admin', 'Create'), ['class' => 'btn btn-primary']) ?>
		</div>
	<?php ActiveForm::end(); ?>

</div><!-- create -->
