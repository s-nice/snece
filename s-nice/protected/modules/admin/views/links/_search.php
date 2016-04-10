<?php
/* @var $this LinksController */
/* @var $model Links */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowSearch">
		<?php echo $form->label($model,'id'); ?>：
		<?php echo $form->textField($model,'id',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'name'); ?>：
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>50)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'is_show'); ?>：
		<?php echo $form->dropDownList($model,'is_show',array('1'=>'是','0'=>'否'),array('class'=>'input-sm')); ?>
	</div>

<div>
	<button type="submit" class="btn btn-primary">搜索</button>
</div>
<?php $this->endWidget(); ?>

</div>