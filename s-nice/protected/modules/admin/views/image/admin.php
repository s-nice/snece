<?php
/* @var $this ImageController */
/* @var $model Image */

$this->breadcrumbs=array(
	'图片'=>array('index'),
	'管理',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#image-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">图片管理</h1>
	<div class="pull-right">
	<a class="btn btn-primary" href="<?php echo Yii::app()->controller->createUrl('create'); ?>">新增</a>
	<?php echo CHtml::link('搜索','#',array('class'=>'btn btn-primary search-button')); ?>
	</div>
</div>

<div class="col-lg-12">

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'catlist'=>$catlist,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'image-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		//'pid',
		array(
			'name'=>'pid',
			'type'=>'raw',
			'value'=>'Category::getName($data->pid)',
		),
		//'title',
		array(
			'name'=>'img',
			'type'=>'raw',
			'headerHtmlOptions' => array('width' => '10%'),
			'value' => 'CHtml::link(CHtml::image("http://7xssk6.com2.z0.glb.clouddn.com/$data->img","", array("width" => "100px")),"http://7xssk6.com2.z0.glb.clouddn.com/$data->img",array("target" => "_blank"))',
		),
		//'des',
		//'orderid',
		array(
			'name'=>'is_show',
			'type'=>'raw',
			'headerHtmlOptions' => array('width'=>'10%'),
			'value'=>'$data->is_show==1?"是":"否"',
		),
		'create_at:datetime',
		/*
		
		'create_uid',
		*/
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'headerHtmlOptions' => array('width'=>'10%'),
			'template' => ' {view} {update} {delete} ', //

			'buttons'=>array(
				'view'=>array(
					'label'=>'<span class="glyphicon glyphicon-eye-open"></span>',
					'imageUrl'=>NULL,
					'options'=>array( 'style'=>'cursor:pointer;' ), // HTML options for the button tag
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
