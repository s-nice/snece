<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
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
<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php
		$this->widget('ext.kindeditor.KindEditor', array(
			'model' => $model,
			'attribute' => 'content',
			)
		);
		?>
		<?php echo $form->labelEx($model,'content',array('class'=>'fl')); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>20, 'cols'=>100),array('class'=>'fl')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<button type="submit" class="btn btn-primary ml100">提交</button>

<?php $this->endWidget(); ?>

</div>