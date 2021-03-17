<?php
/* @var $this QuarterlyAllotmentObligationController */
/* @var $model QuarterlyAllotmentObligation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'quarterly-allotment-obligation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'first_quarter_ar'); ?>
		<?php echo $form->textField($model,'first_quarter_ar',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'first_quarter_ar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'second_quarter_ar'); ?>
		<?php echo $form->textField($model,'second_quarter_ar',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'second_quarter_ar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'third_quarter_ar'); ?>
		<?php echo $form->textField($model,'third_quarter_ar',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'third_quarter_ar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fourth_quarter_ar'); ?>
		<?php echo $form->textField($model,'fourth_quarter_ar',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'fourth_quarter_ar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_ar'); ?>
		<?php echo $form->textField($model,'total_ar',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'total_ar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_quarter_oi'); ?>
		<?php echo $form->textField($model,'first_quarter_oi',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'first_quarter_oi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'second_quarter_oi'); ?>
		<?php echo $form->textField($model,'second_quarter_oi',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'second_quarter_oi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'third_quarter_oi'); ?>
		<?php echo $form->textField($model,'third_quarter_oi',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'third_quarter_oi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fourth_quarter_oi'); ?>
		<?php echo $form->textField($model,'fourth_quarter_oi',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'fourth_quarter_oi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_oi'); ?>
		<?php echo $form->textField($model,'total_oi',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'total_oi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
		<?php echo $form->error($model,'year'); ?>
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
		<?php echo $form->labelEx($model,'first_quarter_remarks'); ?>
		<?php echo $form->textField($model,'first_quarter_remarks',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'first_quarter_remarks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'second_quarter_remarks'); ?>
		<?php echo $form->textField($model,'second_quarter_remarks',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'second_quarter_remarks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'third_quarter_remarks'); ?>
		<?php echo $form->textField($model,'third_quarter_remarks',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'third_quarter_remarks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fourth_quarter_remarks'); ?>
		<?php echo $form->textField($model,'fourth_quarter_remarks',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'fourth_quarter_remarks'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->