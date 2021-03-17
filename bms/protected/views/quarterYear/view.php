<?php
/* @var $this QuarterYearController */
/* @var $model QuarterYear */

$this->breadcrumbs=array(
	'Quarter Years'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QuarterYear', 'url'=>array('index')),
	array('label'=>'Create QuarterYear', 'url'=>array('create')),
	array('label'=>'Update QuarterYear', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QuarterYear', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuarterYear', 'url'=>array('admin')),
);
?>

<h1>View QuarterYear #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'quarter',
		'year',
	),
)); ?>
