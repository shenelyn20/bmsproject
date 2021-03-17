<?php
/* @var $this QuarterYearController */
/* @var $model QuarterYear */

$this->breadcrumbs=array(
	'Quarter Years'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuarterYear', 'url'=>array('index')),
	array('label'=>'Manage QuarterYear', 'url'=>array('admin')),
);
?>

<h1>Create QuarterYear</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>