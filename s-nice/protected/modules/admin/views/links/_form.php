<?php
/* @var $this LinksController */
/* @var $model Links */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'links-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
		<?php echo $form->labelEx($model,'name'); ?>：
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>：
		<?php echo $form->textField($model,'link',array('size'=>30,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo'); ?>：
		<?php echo $form->fileField($model,'logo');
		if($model->logo){
		?>
		<div style="margin-left: 100px">
		<img height="100" src="<?php echo $model->logo; ?>" />
		</div>
		<?php }echo $form->error($model,'logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orderid'); ?>：
		<?php echo $form->textField($model,'orderid',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'orderid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_show'); ?>：
		<?php echo $form->radioButtonList($model,'is_show',array(1=>'是',0=>'否'),array('class'=>'')); ?>
		<?php echo $form->error($model,'is_show'); ?>
	</div>

	<button type="submit" class="btn btn-primary ml100">提交</button>

<?php $this->endWidget(); ?>

</div>