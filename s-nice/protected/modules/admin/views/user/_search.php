<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	
	<div class="rowSearch">
		<?php echo $form->label($model,'user_name'); ?>：
		<?php echo $form->textField($model,'user_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>
	
	<div class="rowSearch">
		<?php echo $form->label($model,'real_name'); ?>：
		<?php echo $form->textField($model,'real_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>
	
	<div class="scbtn">
	<button type="submit" class="btn btn-primary ">搜索</button>
	</div>
<?php $this->endWidget(); ?>

</div>