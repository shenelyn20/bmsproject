<?php
/* @var $this QuarterYearController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Quarter Years',
);

$this->menu=array(
	array('label'=>'Create QuarterYear', 'url'=>array('create')),
	array('label'=>'Manage QuarterYear', 'url'=>array('admin')),
);
?>

<h1>Quarter Years</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
