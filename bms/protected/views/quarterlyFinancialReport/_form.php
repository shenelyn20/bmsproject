<?php
/* @var $this QuarterlyFinancialReportController */
/* @var $model QuarterlyFinancialReport */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'quarterly-financial-report-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'implementing_unit'); ?>
		<?php echo $form->textField($model,'implementing_unit',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'implementing_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mfo_ppas'); ?>
		<?php echo $form->textField($model,'mfo_ppas',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mfo_ppas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'continuing_appropriation'); ?>
		<?php echo $form->textField($model,'continuing_appropriation',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'continuing_appropriation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_appropriation'); ?>
		<?php echo $form->textField($model,'current_appropriation',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'current_appropriation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_appropriation'); ?>
		<?php echo $form->textField($model,'total_appropriation',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'total_appropriation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'previous_quarter_allotment_released'); ?>
		<?php echo $form->textField($model,'previous_quarter_allotment_released',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'previous_quarter_allotment_released'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'this_quarter_allotment_released'); ?>
		<?php echo $form->textField($model,'this_quarter_allotment_released',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'this_quarter_allotment_released'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_allotment_released'); ?>
		<?php echo $form->textField($model,'total_allotment_released',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'total_allotment_released'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'balance_of_appropriation'); ?>
		<?php echo $form->textField($model,'balance_of_appropriation',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'balance_of_appropriation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'previous_quarter_obligation_incurred'); ?>
		<?php echo $form->textField($model,'previous_quarter_obligation_incurred',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'previous_quarter_obligation_incurred'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'this_quarter_obligation_incurred'); ?>
		<?php echo $form->textField($model,'this_quarter_obligation_incurred',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'this_quarter_obligation_incurred'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_obligation_incurred'); ?>
		<?php echo $form->textField($model,'total_obligation_incurred',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'total_obligation_incurred'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unobligated_allotment'); ?>
		<?php echo $form->textField($model,'unobligated_allotment',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'unobligated_allotment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->