<?php
/* @var $this ObligationIncurredController */
/* @var $model ObligationIncurred */

$this->breadcrumbs=array(
	'Obligation Incurreds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ObligationIncurred', 'url'=>array('index')),
	array('label'=>'Manage ObligationIncurred', 'url'=>array('admin')),
);
?>

<h1>Create ObligationIncurred</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>