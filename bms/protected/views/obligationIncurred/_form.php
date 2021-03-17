<?php
/* @var $this ObligationIncurredController */
/* @var $model ObligationIncurred */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'obligation-incurred-form',
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
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'release_date'); ?>
		<?php echo $form->textField($model,'release_date',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'release_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->