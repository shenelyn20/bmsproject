<?php
/* @var $this QuarterlyFinancialReportController */
/* @var $model QuarterlyFinancialReport */

$this->breadcrumbs=array(
	'Quarterly Financial Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuarterlyFinancialReport', 'url'=>array('index')),
	array('label'=>'Create QuarterlyFinancialReport', 'url'=>array('create')),
	array('label'=>'View QuarterlyFinancialReport', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage QuarterlyFinancialReport', 'url'=>array('admin')),
);
?>

<h1>Update QuarterlyFinancialReport <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>