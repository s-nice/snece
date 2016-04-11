<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'分类'=>array('index'),
	'创建',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">创建 分类</h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>
</div>
