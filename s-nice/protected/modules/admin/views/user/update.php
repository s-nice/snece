<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户列表'=>array('admin'),
	//$model->user_name=>array('view','id'=>$model->id),
	'更新：'.$model->user_name,
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新 用户：<?php echo $model->user_name; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>