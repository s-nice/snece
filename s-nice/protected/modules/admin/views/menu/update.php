<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'菜单列表'=>array('admin'),
	//$model->name=>array('view','id'=>$model->id),
	'更新：'.$model->name,
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新  菜单 <?php echo $model->name; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'menulist'=>$menulist,
	)); ?>
</div>