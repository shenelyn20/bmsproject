<?php
/* @var $this QuarterlyFinancialReportController */
/* @var $data QuarterlyFinancialReport */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('implementing_unit')); ?>:</b>
	<?php echo CHtml::encode($data->implementing_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mfo_ppas')); ?>:</b>
	<?php echo CHtml::encode($data->mfo_ppas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('continuing_appropriation')); ?>:</b>
	<?php echo CHtml::encode($data->continuing_appropriation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_appropriation')); ?>:</b>
	<?php echo CHtml::encode($data->current_appropriation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_appropriation')); ?>:</b>
	<?php echo CHtml::encode($data->total_appropriation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('previous_quarter_allotment_released')); ?>:</b>
	<?php echo CHtml::encode($data->previous_quarter_allotment_released); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('this_quarter_allotment_released')); ?>:</b>
	<?php echo CHtml::encode($data->this_quarter_allotment_released); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_allotment_released')); ?>:</b>
	<?php echo CHtml::encode($data->total_allotment_released); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('balance_of_appropriation')); ?>:</b>
	<?php echo CHtml::encode($data->balance_of_appropriation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('previous_quarter_obligation_incurred')); ?>:</b>
	<?php echo CHtml::encode($data->previous_quarter_obligation_incurred); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('this_quarter_obligation_incurred')); ?>:</b>
	<?php echo CHtml::encode($data->this_quarter_obligation_incurred); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_obligation_incurred')); ?>:</b>
	<?php echo CHtml::encode($data->total_obligation_incurred); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unobligated_allotment')); ?>:</b>
	<?php echo CHtml::encode($data->unobligated_allotment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	*/ ?>

</div>