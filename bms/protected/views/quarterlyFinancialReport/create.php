<?php
/* @var $this QuarterlyFinancialReportController */
/* @var $model QuarterlyFinancialReport */

$this->breadcrumbs=array(
	'Quarterly Financial Reports'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List QuarterlyFinancialReport', 'url'=>array('index')),
	array('label'=>'Manage QuarterlyFinancialReport', 'url'=>array('admin')),
);*/
?>

<h1>Add Data</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>