<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'图片分类'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'更新',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新 分类：<?php echo $model->name; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>
</div>