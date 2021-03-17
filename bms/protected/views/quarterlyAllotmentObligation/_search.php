<?php
/* @var $this QuarterlyAllotmentObligationController */
/* @var $model QuarterlyAllotmentObligation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'qao_id'); ?>
		<?php echo $form->textField($model,'qao_id'); ?>
	</div>

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
		<?php echo $form->label($model,'first_quarter_ar'); ?>
		<?php echo $form->textField($model,'first_quarter_ar',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'second_quarter_ar'); ?>
		<?php echo $form->textField($model,'second_quarter_ar',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'third_quarter_ar'); ?>
		<?php echo $form->textField($model,'third_quarter_ar',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fourth_quarter_ar'); ?>
		<?php echo $form->textField($model,'fourth_quarter_ar',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_ar'); ?>
		<?php echo $form->textField($model,'total_ar',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_quarter_oi'); ?>
		<?php echo $form->textField($model,'first_quarter_oi',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'second_quarter_oi'); ?>
		<?php echo $form->textField($model,'second_quarter_oi',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'third_quarter_oi'); ?>
		<?php echo $form->textField($model,'third_quarter_oi',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fourth_quarter_oi'); ?>
		<?php echo $form->textField($model,'fourth_quarter_oi',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_oi'); ?>
		<?php echo $form->textField($model,'total_oi',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
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
		<?php echo $form->label($model,'first_quarter_remarks'); ?>
		<?php echo $form->textField($model,'first_quarter_remarks',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'second_quarter_remarks'); ?>
		<?php echo $form->textField($model,'second_quarter_remarks',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'third_quarter_remarks'); ?>
		<?php echo $form->textField($model,'third_quarter_remarks',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fourth_quarter_remarks'); ?>
		<?php echo $form->textField($model,'fourth_quarter_remarks',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->