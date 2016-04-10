<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 菜单 <?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		//'pid',
		array('name'=>'pid', 'value'=>Menu::getName($model->pid) ),
		//'url',
		array(
			'name'=>'url',
			'type'=>'raw',
			'value'=>CHtml::link($model->url,$model->url,array("target"=>"_blank")),
		),
		'orderid',
		//'is_show',
		array('name'=>'is_show','value'=>$model->is_show==1?"是":"否",),
		//'create_uid',
		array('name'=>'create_uid', 'value'=>User::getName($model->create_uid) ),
		'create_time',
		//'update_uid',
		array('name'=>'update_uid', 'value'=>User::getName($model->update_uid) ),
		'update_time',
	),
)); ?>
