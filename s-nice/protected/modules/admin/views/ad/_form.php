<?php
/* @var $this AdController */
/* @var $model Ad */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-form',
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
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>50)); ?>（根据作用命名，不在前台显示）
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->dropDownList($model,'pid',$adverlist,array('class'=>'input-sm')); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>（图片标题，部分前台显示）
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'简介',array('class'=>'fl')); ?>
		<?php echo $form->textArea($model,'brief',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'brief'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->fileField($model,'img');
		if($model->img){
		?>
		<div style="margin-left: 100px">
		<img height="100" src="<?php echo $model->img; ?>" />
		</div>
		<?php }echo $form->error($model,'img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>30,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orderid'); ?>
		<?php echo $form->textField($model,'orderid',array('size'=>6,'maxlength'=>6)); ?>（排序从小到大排列，排序越大越靠后）
		<?php echo $form->error($model,'orderid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_show'); ?>
		<?php echo $form->radioButtonList($model,'is_show',array(1=>'是',2=>'否'),array('class'=>'')); ?>
		<?php echo $form->error($model,'is_show'); ?>
	</div>

	<button type="submit" class="btn btn-primary ml100">提交</button>

<?php $this->endWidget(); ?>

</div>