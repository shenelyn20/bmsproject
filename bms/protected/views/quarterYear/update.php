<?php
/* @var $this QuarterYearController */
/* @var $model QuarterYear */

$this->breadcrumbs=array(
	'Quarter Years'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuarterYear', 'url'=>array('index')),
	array('label'=>'Create QuarterYear', 'url'=>array('create')),
	array('label'=>'View QuarterYear', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage QuarterYear', 'url'=>array('admin')),
);
?>

<h1>Update QuarterYear <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>