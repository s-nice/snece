<?php
/* @var $this AdverController */
/* @var $model Adver */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowSearch">
		<?php echo $form->label($model,'id'); ?>：
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'name'); ?>：
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>50)); ?>
	</div>

<div>
	<button type="submit" class="btn btn-primary">搜索</button>
</div>
<?php $this->endWidget(); ?>

</div>