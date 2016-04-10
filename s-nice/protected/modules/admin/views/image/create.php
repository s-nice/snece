<?php
/* @var $this ImageController */
/* @var $model Image */

$this->breadcrumbs=array(
	'图片'=>array('index'),
	'创建',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">创建 图片</h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_create_form', array(
	'model'=>$model,
	'catlist'=>$catlist,
)); ?>
</div>
