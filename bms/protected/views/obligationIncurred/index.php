<?php
/* @var $this ObligationIncurredController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Obligation Incurreds',
);

$this->menu=array(
	array('label'=>'Create ObligationIncurred', 'url'=>array('create')),
	array('label'=>'Manage ObligationIncurred', 'url'=>array('admin')),
);
?>

<h1>Obligation Incurreds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
