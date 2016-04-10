<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'个人信息',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">个人信息</h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->createUrl('admin/user/pwd'); ?>">修改密码</a>
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
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
		<?php echo $model->user_name; ?>
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
		<?php echo $form->labelEx($model,'avatar'); ?>：
		<?php echo $form->fileField($model,'avatar');
		if($model->id){
		?>
		<div style="margin-left: 100px">
		<img height="100" src="<?php echo $model->avatar; ?>" />
		</div>
		<?php }echo $form->error($model,'avatar'); ?>
	</div>
	
	<button type="submit" class="btn btn-primary ml100">提交</button>
	
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>