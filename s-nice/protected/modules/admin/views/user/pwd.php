<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'修改密码',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">修改密码</h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->createUrl('admin/user/profile'); ?>">个人信息</a>
</div>

<div class="col-lg-12">
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
		<?php echo $form->labelEx($model,'用户名'); ?>：
		<?php echo $model->user_name; ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'oldpwd'); ?>：
		<?php echo $form->passwordField($model,'oldpwd',array('size'=>20,'maxlength'=>20,'class'=>'')); ?>
		<?php echo $form->error($model,'oldpwd'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'newpwd1'); ?>：
		<?php echo $form->passwordField($model,'newpwd1',array('size'=>20,'maxlength'=>15,'class'=>'')); ?>
		<?php echo $form->error($model,'newpwd1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'newpwd2'); ?>：
		<?php echo $form->passwordField($model,'newpwd2',array('size'=>20,'maxlength'=>50,'class'=>'')); ?>
		<?php echo $form->error($model,'newpwd2'); ?>
	</div>
	
	<button type="submit" class="btn btn-primary ml100">提交</button>
	
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>