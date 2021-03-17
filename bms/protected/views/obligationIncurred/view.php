<?php
/* @var $this ObligationIncurredController */
/* @var $model ObligationIncurred */

$this->breadcrumbs=array(
	'Obligation Incurreds'=>array('index'),
	$model->oi_id,
);

$this->menu=array(
	array('label'=>'List ObligationIncurred', 'url'=>array('index')),
	array('label'=>'Create ObligationIncurred', 'url'=>array('create')),
	array('label'=>'Update ObligationIncurred', 'url'=>array('update', 'id'=>$model->oi_id)),
	array('label'=>'Delete ObligationIncurred', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->oi_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ObligationIncurred', 'url'=>array('admin')),
);
?>

<h1>View ObligationIncurred #<?php echo $model->oi_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'oi_id',
		'implementing_unit',
		'mfo_ppas',
		'description',
		'release_date',
		'amount',
	),
)); ?>
