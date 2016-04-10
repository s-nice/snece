<?php
/* @var $this AdController */
/* @var $model Ad */

$this->breadcrumbs=array(
	'Ads'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 广告：<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'pid',
		array('name'=>'pid', 'value'=>Adver::getName($model->pid) ),
		'name',
		'title',
		'brief',
		//'img',
		array(
			'name' => 'img',
			'value' => CHtml::link(CHtml::image($model->img,'图片',array('width'=>'150px')),$model->img,array("target"=>"_blank")),
			'type' => 'raw',
		),
		//'link',
		array(
			'name' => 'link',
			'type' => 'raw',
			'value' => CHtml::link($model->link, $model->link, array("target" => "_blank")),
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
