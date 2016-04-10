<div class="content-body">

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
<?php $form = $this->beginWidget('CActiveForm', array('id' => 'xform', 'htmlOptions' => array('name' => 'xform', 'enctype' => 'multipart/form-data'))); ?>
	<table class="form_table">
		<tr>
			<td class="tb_title">模板内容：</td>
		</tr>
		<tr >
			<td ><label for="content"></label>
				<textarea name="content" id="content" style="width:100%; height:400px"><?php echo $content ?></textarea>
			</td>
		</tr>
	</table>
	<button type="submit" class="btn btn-primary ml100">提交</button>


<?php $form = $this->endWidget(); ?>

</div>