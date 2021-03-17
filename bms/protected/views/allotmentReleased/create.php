<?php
/* @var $this AllotmentReleasedController */
/* @var $model AllotmentReleased */

$this->breadcrumbs=array(
	'Allotment Releaseds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AllotmentReleased', 'url'=>array('index')),
	array('label'=>'Manage AllotmentReleased', 'url'=>array('admin')),
);
?>

<h1>Create AllotmentReleased</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>