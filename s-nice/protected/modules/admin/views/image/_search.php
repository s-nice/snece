<?php
/* @var $this ImageController */
/* @var $model Image */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowSearch">
		<?php echo $form->label($model,'id'); ?>：
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'pid'); ?>：
		<?php echo $form->dropDownList($model,'pid',$catlist,array('class'=>'input-sm')); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'title'); ?>：
		<?php echo $form->textField($model,'title'); ?>
	</div>
	
	<div class="rowSearch">
		<?php echo $form->label($model,'is_show'); ?>：
		<?php echo $form->dropDownList($model,'is_show',array('0'=>'全部','1'=>'是','2'=>'否'),array('class'=>'input-sm')); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'create_at'); ?>：
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'language' => 'zh_cn',
			'model' => $model,
			'attribute' => 'create_at',
			'options' => array(
				'showAnim' => 'fold',
				'showOn' => 'both',
				'dateFormat' => 'yy-mm-dd',
				'changeYear' => true,
				'changeMonth' => true,
			),
			'htmlOptions' => array(
				'style' => 'height:26px;',
				//'value' => date('Y-m-d'),
			),
		));
		?>
	</div>

<div class="scbtn">
	<button type="submit" class="btn btn-primary">搜索</button>
</div>
<?php $this->endWidget(); ?>

</div>