<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);
?>

<h3 class="title">查看用户：<?php echo $model->user_name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_name',
		'real_name',
		//'password',
		//'gender',
		array('name'=>'gender', 'value'=>User::getGender($model->gender) ),
		'phone',
		'email',
		'qq',
		//'status',
		//'avatar',
		array(
			'name' => 'avatar',
			'value' => CHtml::link(CHtml::image($model->avatar,'图片',array('width'=>'150px')),$model->avatar,array("target"=>"_blank")),
			'type' => 'raw',
		),
		array('name'=>'status','value'=>$model->status==1?"活动":"锁定",),
		'login_num',
		'last_login_time',
		'last_login_ip',
		'create_time',
		'update_time',
	),
)); ?>