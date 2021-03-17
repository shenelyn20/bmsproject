<?php
/* @var $this QuarterlyAllotmentObligationController */
/* @var $model QuarterlyAllotmentObligation */

$this->breadcrumbs=array(
	'Quarterly Allotment Obligations'=>array('index'),
	$model->qao_id,
);

$this->menu=array(
	array('label'=>'List QuarterlyAllotmentObligation', 'url'=>array('index')),
	array('label'=>'Create QuarterlyAllotmentObligation', 'url'=>array('create')),
	array('label'=>'Update QuarterlyAllotmentObligation', 'url'=>array('update', 'id'=>$model->qao_id)),
	array('label'=>'Delete QuarterlyAllotmentObligation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->qao_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuarterlyAllotmentObligation', 'url'=>array('admin')),
);
?>

<h1>View QuarterlyAllotmentObligation #<?php echo $model->qao_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'qao_id',
		'id',
		'implementing_unit',
		'mfo_ppas',
		'first_quarter_ar',
		'second_quarter_ar',
		'third_quarter_ar',
		'fourth_quarter_ar',
		'total_ar',
		'first_quarter_oi',
		'second_quarter_oi',
		'third_quarter_oi',
		'fourth_quarter_oi',
		'total_oi',
		'year',
		'continuing_appropriation',
		'current_appropriation',
		'first_quarter_remarks',
		'second_quarter_remarks',
		'third_quarter_remarks',
		'fourth_quarter_remarks',
	),
)); ?>
