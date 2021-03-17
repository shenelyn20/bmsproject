<?php
/* @var $this AllotmentReleasedController */
/* @var $model AllotmentReleased */

$this->breadcrumbs=array(
	'Allotment Releaseds'=>array('index'),
	$model->ar_id,
);

$this->menu=array(
	array('label'=>'List AllotmentReleased', 'url'=>array('index')),
	array('label'=>'Create AllotmentReleased', 'url'=>array('create')),
	array('label'=>'Update AllotmentReleased', 'url'=>array('update', 'id'=>$model->ar_id)),
	array('label'=>'Delete AllotmentReleased', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ar_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AllotmentReleased', 'url'=>array('admin')),
);
?>

<h1>View AllotmentReleased #<?php echo $model->ar_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ar_id',
		'implementing_unit',
		'mfo_ppas',
		'description',
		'release_date',
		'amount',
	),
)); ?>
