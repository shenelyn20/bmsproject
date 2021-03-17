<?php
/* @var $this AllotmentReleasedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Allotment Releaseds',
);

$this->menu=array(
	array('label'=>'Create AllotmentReleased', 'url'=>array('create')),
	array('label'=>'Manage AllotmentReleased', 'url'=>array('admin')),
);
?>

<h1>Allotment Releaseds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
