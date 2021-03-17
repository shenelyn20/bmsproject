<?php
/* @var $this ObligationIncurredController */
/* @var $model ObligationIncurred */

$this->breadcrumbs=array(
	'Obligation Incurreds'=>array('index'),
	$model->oi_id=>array('view','id'=>$model->oi_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ObligationIncurred', 'url'=>array('index')),
	array('label'=>'Create ObligationIncurred', 'url'=>array('create')),
	array('label'=>'View ObligationIncurred', 'url'=>array('view', 'id'=>$model->oi_id)),
	array('label'=>'Manage ObligationIncurred', 'url'=>array('admin')),
);
?>

<h1>Update ObligationIncurred <?php echo $model->oi_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>