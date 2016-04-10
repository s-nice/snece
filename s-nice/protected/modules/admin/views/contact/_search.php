<?php
/* @var $this ContactController */
/* @var $model Contact */
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
		<?php echo $form->label($model,'name'); ?>：
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'phone'); ?>：
		<?php echo $form->textField($model,'phone',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'message'); ?>：
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'create_time'); ?>：
		<?php echo $form->textField($model,'create_time'); ?>
	</div>

<div class="scbtn">
	<button type="submit" class="btn btn-primary">搜索</button>
</div>
<?php $this->endWidget(); ?>

</div>