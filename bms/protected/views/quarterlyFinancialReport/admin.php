<?php
/* @var $this QuarterlyFinancialReportController */
/* @var $model QuarterlyFinancialReport */

$this->breadcrumbs=array(
	'Quarterly Financial Reports'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List QuarterlyFinancialReport', 'url'=>array('index')),
	array('label'=>'Create QuarterlyFinancialReport', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#quarterly-financial-report-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Quarterly Financial Reports</h1>

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
	'id'=>'quarterly-financial-report-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'implementing_unit',
		'mfo_ppas',
		'continuing_appropriation',
		'current_appropriation',
		'total_appropriation',
		
		'previous_quarter_allotment_released',
		'this_quarter_allotment_released',
		'total_allotment_released',
		'balance_of_appropriation',
		'previous_quarter_obligation_incurred',
		'this_quarter_obligation_incurred',
		'total_obligation_incurred',
		'unobligated_allotment',
		'remarks',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
