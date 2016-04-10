<?php
/* @var $this AdverController */
/* @var $model Adver */

$this->breadcrumbs=array(
	'Advers'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 广告位：<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'remark',
		//'create_uid',
		array('name'=>'create_uid', 'value'=>User::getName($model->create_uid) ),
		'create_time',
		//'update_uid',
		//array('name'=>'update_uid', 'value'=>User::getName($model->update_uid) ),
		//'update_time',
	),
)); ?>
