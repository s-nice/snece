<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'友情链接',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#links-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">友情链接管理</h1>
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
	'id'=>'links-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'id'=>array(
			'name'=>'id',
			'headerHtmlOptions' => array('width'=>'5%'),
		),
		'name',
		//'link',
		array(
			'name'=>'link',
			'type'=>'raw',
			'headerHtmlOptions' => array('width'=>'20%'),
			'value'=>'CHtml::link("$data->link",$data->link,array("target"=>"_blank"))',
		),
		//'logo',
		array(
			'name'=>'logo',
			'type'=>'raw',
			'headerHtmlOptions' => array('width' => '10%'),
			'value' => 'CHtml::link(CHtml::image("$data->logo","logo", array("width" => "100px")),"$data->logo",array("target"=>"_blank"))',
		),
		'orderid',
		//'is_show',
		array(
			'name'=>'is_show',
			'type'=>'raw',
			'headerHtmlOptions' => array('width'=>'10%'),
			'value'=>'$data->is_show==1?"是":"否"',
		),
		'create_time',
		/*
		'create_uid',
		'update_uid',
		'update_time',
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
