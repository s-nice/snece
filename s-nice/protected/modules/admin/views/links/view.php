<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'Links'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 友情链接：<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		//'link',
		array(
			'name'=>'link',
			'type'=>'raw',
			'value'=>CHtml::link($model->link,$model->link,array("target"=>"_blank")),
		),
		//'logo',
		array(
			'name' => 'logo',
			'value' => CHtml::link(CHtml::image($model->logo,'logo',array('width'=>'150px')),$model->logo,array("target"=>"_blank")),
			'type' => 'raw',
		),
		'orderid',
		//'is_show',
		array('name'=>'is_show', 'value'=>$model->is_show?"是":"否" ),
		//'create_uid',
		array('name'=>'create_uid', 'value'=>User::getName($model->create_uid) ),
		'create_time',
		//'update_uid',
		array('name'=>'update_uid', 'value'=>User::getName($model->update_uid) ),
		'update_time',
	),
)); ?>
