<?php
/* @var $this ObligationIncurredController */
/* @var $model ObligationIncurred */

$this->breadcrumbs=array(
	'Obligation Incurreds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ObligationIncurred', 'url'=>array('index')),
	array('label'=>'Create ObligationIncurred', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#obligation-incurred-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Obligation Incurreds</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'obligation-incurred-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'oi_id',
		'implementing_unit',
		'mfo_ppas',
		'description',
		'release_date',
		'amount',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
