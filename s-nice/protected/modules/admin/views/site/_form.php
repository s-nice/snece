<?php
/* @var $this SiteController */
/* @var $model Site */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'site-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<?php if( Yii::app()->user->hasFlash('success')): ?>
	<div class="info"><?php echo Yii::app()->user->getFlash('success'); ?></div>
<?php endif; ?>

<?php //这是一段在显示后定时消失的JQ代码,已集成至Yii中.
	Yii::app()->clientScript->registerScript(
		'myHideEffect',
		'$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");',
		CClientScript::POS_READY
	);
?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domain'); ?>
		<?php echo $form->textField($model,'domain',array('size'=>30,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'domain'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonList($model,'status',array(1=>'正常',0=>'关闭'),array('class'=>'')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remark',array('class'=>'vl')); ?>
		<?php echo $form->textArea($model,'remark',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'remark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>30,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keyword'); ?>
		<?php echo $form->textField($model,'keyword',array('size'=>30,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'keyword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des',array('class'=>'vl')); ?>
		<?php echo $form->textArea($model,'des',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'des'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'version'); ?>
		<?php echo $form->textField($model,'version',array('size'=>30,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'version'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code',array('class'=>'vl')); ?>
		<?php echo $form->textArea($model,'code',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<button type="submit" class="btn btn-primary ml100">提交</button>

<?php $this->endWidget(); ?>

</div>