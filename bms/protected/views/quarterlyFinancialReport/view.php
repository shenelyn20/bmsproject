<?php
/* @var $this QuarterlyFinancialReportController */
/* @var $model QuarterlyFinancialReport */

$this->breadcrumbs=array(
	'Quarterly Financial Reports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QuarterlyFinancialReport', 'url'=>array('index')),
	array('label'=>'Create QuarterlyFinancialReport', 'url'=>array('create')),
	array('label'=>'Update QuarterlyFinancialReport', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QuarterlyFinancialReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuarterlyFinancialReport', 'url'=>array('admin')),
);
?>

<h1>View QuarterlyFinancialReport #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'implementing_unit',
		'mfo_ppas',
		'continuing_appropriation',
		'current_appropriation',
		'total_appropriation',
		'previous_quarter_allotment_released',
		'this_quarter_allotment_released',
		'total_allotment_released',
		'balance_of_appropriation',
		'previous_quarter_obligation_incurred',
		'this_quarter_obligation_incurred',
		'total_obligation_incurred',
		'unobligated_allotment',
		'remarks',
	),
)); ?>
