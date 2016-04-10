<h3 class="title">查看 图片 #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		array('name'=>'pid', 'value'=>Category::getName($model->pid) ),
		array(
			'name' => 'img',
			'value' => CHtml::link(CHtml::image('http://7xssk6.com2.z0.glb.clouddn.com/'.$model->img,'图片',array('width'=>'150px')),'http://7xssk6.com2.z0.glb.clouddn.com/'.$model->img,array("target"=>"_blank")),
			'type' => 'raw',
		),
		'des',
		'orderid',
		array('name'=>'is_show','value'=>$model->is_show==1?"是":"否",),
		'create_at:datetime',
		array('name'=>'create_uid', 'value'=>User::getName($model->create_uid)),
	),
)); ?>
