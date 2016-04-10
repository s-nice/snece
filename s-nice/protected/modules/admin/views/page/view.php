<h3 class="title">查看 单页：<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'content',
		array('name'=>'create_uid', 'value'=>User::getName($model->create_uid)),
		'create_time',
	),
)); ?>
