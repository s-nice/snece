<?php
/* @var $this ImageController */
/* @var $data Image */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pid')); ?>:</b>
	<?php echo CHtml::encode($data->pid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('des')); ?>:</b>
	<?php echo CHtml::encode($data->des); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orderid')); ?>:</b>
	<?php echo CHtml::encode($data->orderid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_show')); ?>:</b>
	<?php echo CHtml::encode($data->is_show); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_at')); ?>:</b>
	<?php echo CHtml::encode($data->create_at); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('create_uid')); ?>:</b>
	<?php echo CHtml::encode($data->create_uid); ?>
	<br />

	*/ ?>

</div>