<?php
/* @var $this ImageController */
/* @var $model Image */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'image-form',
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
<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->dropDownList($model,'pid',$catlist,array('class'=>'input-sm')); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>30,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php
		if($model->img){
		?>
		<div style="margin-left: 100px">
		<img height="100" src="<?php echo 'http://7xssk6.com2.z0.glb.clouddn.com/'.$model->img; ?>" />
		</div>
		<?php } ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des'); ?>
		<?php echo $form->textField($model,'des',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'des'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'orderid'); ?>
		<?php echo $form->textField($model,'orderid'); ?>
		<?php echo $form->error($model,'orderid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_show'); ?>
		<?php echo $form->textField($model,'is_show'); ?>
		<?php echo $form->error($model,'is_show'); ?>
	</div>
-->
	<button type="submit" class="btn btn-primary ml100">提交</button>

<?php $this->endWidget(); ?>

</div>