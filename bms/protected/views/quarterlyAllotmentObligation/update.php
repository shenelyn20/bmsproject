<?php
/* @var $this QuarterlyAllotmentObligationController */
/* @var $model QuarterlyAllotmentObligation */

$this->breadcrumbs=array(
	'Quarterly Allotment Obligations'=>array('index'),
	$model->qao_id=>array('view','id'=>$model->qao_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuarterlyAllotmentObligation', 'url'=>array('index')),
	array('label'=>'Create QuarterlyAllotmentObligation', 'url'=>array('create')),
	array('label'=>'View QuarterlyAllotmentObligation', 'url'=>array('view', 'id'=>$model->qao_id)),
	array('label'=>'Manage QuarterlyAllotmentObligation', 'url'=>array('admin')),
);
?>

<h1>Update QuarterlyAllotmentObligation <?php echo $model->qao_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>