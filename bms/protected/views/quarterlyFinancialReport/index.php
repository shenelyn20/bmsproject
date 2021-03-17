<?php
/* @var $this QuarterlyFinancialReportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Quarterly Financial Reports',
);

$this->menu=array(
	array('label'=>'Create QuarterlyFinancialReport', 'url'=>array('create')),
	array('label'=>'Manage QuarterlyFinancialReport', 'url'=>array('admin')),
);
?>

<h1>Quarterly Financial Reports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
