<?php
/* @var $this AllotmentReleasedController */
/* @var $model AllotmentReleased */

$this->breadcrumbs=array(
	'Allotment Releaseds'=>array('index'),
	$model->ar_id=>array('view','id'=>$model->ar_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AllotmentReleased', 'url'=>array('index')),
	array('label'=>'Create AllotmentReleased', 'url'=>array('create')),
	array('label'=>'View AllotmentReleased', 'url'=>array('view', 'id'=>$model->ar_id)),
	array('label'=>'Manage AllotmentReleased', 'url'=>array('admin')),
);
?>

<h1>Update AllotmentReleased <?php echo $model->ar_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>