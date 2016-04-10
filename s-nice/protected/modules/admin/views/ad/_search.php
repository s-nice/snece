<?php
/* @var $this AdController */
/* @var $model Ad */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowSearch">
		<?php echo $form->label($model,'pid'); ?>：
		<?php echo $form->dropDownList($model,'pid',$adverlist,array('class'=>'input-sm')); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'name'); ?>：
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>50)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'is_show'); ?>：
		<?php echo $form->dropDownList($model,'is_show',array('0'=>'全部','1'=>'是','2'=>'否'),array('class'=>'input-sm')); ?>
	</div>

<div class="scbtn">
	<button type="submit" class="btn btn-primary">搜索</button>
</div>
<?php $this->endWidget(); ?>

</div>