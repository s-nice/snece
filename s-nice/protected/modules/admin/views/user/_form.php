<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="content-body">
	
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php if( Yii::app()->user->hasFlash('success')): ?>
		<div class="info"><?php echo Yii::app()->user->getFlash('success'); ?></div>
	<?php endif; ?>
	<?php //这是一段,在显示后定里消失的JQ代码,已集成至Yii中.
	Yii::app()->clientScript->registerScript(
		'myHideEffect',
		'$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");',
		CClientScript::POS_READY
		);
	?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'user_name'); ?>：
		<?php if($model->isNewRecord){ echo $form->textField($model,'user_name',array('size'=>20,'maxlength'=>20,'class'=>''));}else{
			
			echo $model->user_name;
		} ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>：
		<?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>20,'class'=>'')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'real_name'); ?>：
		<?php echo $form->textField($model,'real_name',array('size'=>20,'maxlength'=>20,'class'=>'')); ?>
		<?php echo $form->error($model,'real_name'); ?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>：
		<?php echo $form->radioButtonList($model,'gender',array(1=>'男',2=>'女'),array('class'=>'')); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>：
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>15,'class'=>'')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>：
		<?php echo $form->textField($model,'email',array('size'=>20,'maxlength'=>50,'class'=>'')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qq'); ?>：
		<?php echo $form->textField($model,'qq',array('class'=>'')); ?>
		<?php echo $form->error($model,'qq'); ?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>：
		<?php echo $form->dropDownList($model,'status',array('1'=>'活动','0'=>'锁定'),array('class'=>'input-sm')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	
	<button type="submit" class="btn btn-primary ml100">提交</button>
	
<?php $this->endWidget(); ?>

</div><!-- form -->