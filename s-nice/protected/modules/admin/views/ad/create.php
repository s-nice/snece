<?php
/* @var $this AdController */
/* @var $model Ad */

$this->breadcrumbs=array(
	'广告列表'=>array('admin'),
	'创建',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">创建 广告</h1>	
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'adverlist'=>$adverlist,
	)); ?>
</div>
