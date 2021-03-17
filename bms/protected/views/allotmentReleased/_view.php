<?php
/* @var $this AllotmentReleasedController */
/* @var $data AllotmentReleased */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ar_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ar_id), array('view', 'id'=>$data->ar_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('implementing_unit')); ?>:</b>
	<?php echo CHtml::encode($data->implementing_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mfo_ppas')); ?>:</b>
	<?php echo CHtml::encode($data->mfo_ppas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('release_date')); ?>:</b>
	<?php echo CHtml::encode($data->release_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />


</div>