<?php
/* @var $this QuarterlyAllotmentObligationController */
/* @var $model QuarterlyAllotmentObligation */

$this->breadcrumbs=array(
	'Quarterly Allotment Obligations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuarterlyAllotmentObligation', 'url'=>array('index')),
	array('label'=>'Manage QuarterlyAllotmentObligation', 'url'=>array('admin')),
);
?>

<h1>Create QuarterlyAllotmentObligation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>