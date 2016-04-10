<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	//'用户列表'=>array('admin'),
	'用户管理',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">用户管理</h1>
	<div class="pull-right">
	<a class="btn btn-primary" href="<?php echo Yii::app()->controller->createUrl('create'); ?>">新增</a>
	<?php echo CHtml::link('搜索','#',array('class'=>'btn btn-primary search-button')); ?>
	</div>
</div>

<div class="col-lg-12">

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'id'=>array(
			'name'=>'id',
			'headerHtmlOptions' => array('width'=>'3%'),
		),
		'user_name',
		'real_name',
		//'password',
		//'gender',
		/*
		array(
			'name'=>'gender',
			'type'=>'raw',
			'value'=>'User::getGender($data->gender)',
		),
		 * 
		 */
		'phone',
		/*
		'email',
		'qq',
		'status',
		'login_num',
		'last_login_time',
		'last_login_ip',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'headerHtmlOptions' => array('width'=>'10%'),
			'template' => ' {view} {update} {delete}', //

			'buttons'=>array(
					
				'view'=>array(
					'label'=>'<span class="glyphicon glyphicon-eye-open"></span>',
					//'url'=>'',
					'imageUrl'=>NULL,

					'options'=>array(
						'style'=>'cursor:pointer;', 
						//'onclick'=>'AjaxModalContent($data->id)',
					),
					'click' => "function(){
						jQuery('#ultraModal-8').modal('show', {backdrop: 'static'});
						jQuery.ajax({
							url: $(this).attr('href'),
							success: function(response)
							{
								jQuery('#ultraModal-8 .modal-body').html(response);
							}
						});
						return false;
					}",
				),
				'update'=>array(
					'label'=>'<span class="glyphicon glyphicon-pencil"></span>',
					'imageUrl'=>NULL,
					'options'=>array( 'style'=>'cursor:pointer;' ), // HTML options for the button tag
				),
				'delete'=>array(
					'label'=>'<span class="glyphicon glyphicon-trash"></span>',
					'imageUrl'=>NULL,
					'options'=>array('style'=>'cursor:pointer;' ), // HTML options for the button tag
				),
			),
			
		),
	),
)); ?>

</div>