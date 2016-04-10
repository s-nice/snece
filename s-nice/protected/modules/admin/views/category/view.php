<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'图片分类'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 分类：<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		//'pid',
		array('name'=>'pid', 'value'=>Category::getName($model->pid) ),
		array('name'=>'is_show','value'=>$model->is_show==1?"是":"否",),
		'orderid',
		array('name'=>'create_uid', 'value'=>User::getName($model->create_uid) ),
		'create_time',
	),
)); ?>
