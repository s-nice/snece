<?php

$this->breadcrumbs=array(
	'模板列表'=>array('index'),
	'更新：'.$filename,
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">编辑模板 <em><?php echo $filename ?></em></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('index'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form',array('content'=>$content, 'filename'=>$filename))?>

</div>