<?php
/* @var $this QuarterlyAllotmentObligationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Quarterly Allotment Obligations',
);

$this->menu=array(
	array('label'=>'Create QuarterlyAllotmentObligation', 'url'=>array('create')),
	array('label'=>'Manage QuarterlyAllotmentObligation', 'url'=>array('admin')),
);
?>

<h1>Quarterly Allotment Obligations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
