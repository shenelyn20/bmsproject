<?php
/* @var $this QuarterlyFinancialReportController */
/* @var $model QuarterlyFinancialReport */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'implementing_unit'); ?>
		<?php echo $form->textField($model,'implementing_unit',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mfo_ppas'); ?>
		<?php echo $form->textField($model,'mfo_ppas',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'continuing_appropriation'); ?>
		<?php echo $form->textField($model,'continuing_appropriation',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_appropriation'); ?>
		<?php echo $form->textField($model,'current_appropriation',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_appropriation'); ?>
		<?php echo $form->textField($model,'total_appropriation',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'previous_quarter_allotment_released'); ?>
		<?php echo $form->textField($model,'previous_quarter_allotment_released',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'this_quarter_allotment_released'); ?>
		<?php echo $form->textField($model,'this_quarter_allotment_released',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_allotment_released'); ?>
		<?php echo $form->textField($model,'total_allotment_released',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'balance_of_appropriation'); ?>
		<?php echo $form->textField($model,'balance_of_appropriation',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'previous_quarter_obligation_incurred'); ?>
		<?php echo $form->textField($model,'previous_quarter_obligation_incurred',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'this_quarter_obligation_incurred'); ?>
		<?php echo $form->textField($model,'this_quarter_obligation_incurred',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_obligation_incurred'); ?>
		<?php echo $form->textField($model,'total_obligation_incurred',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unobligated_allotment'); ?>
		<?php echo $form->textField($model,'unobligated_allotment',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->