<?php
/* @var $this QuarterlyAllotmentObligationController */
/* @var $model QuarterlyAllotmentObligation */

$this->breadcrumbs=array(
	'Quarterly Allotment Obligations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List QuarterlyAllotmentObligation', 'url'=>array('index')),
	array('label'=>'Create QuarterlyAllotmentObligation', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#quarterly-allotment-obligation-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Quarterly Allotment Obligations</h1>

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
	'id'=>'quarterly-allotment-obligation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'qao_id',
		'id',
		'implementing_unit',
		'mfo_ppas',
		'first_quarter_ar',
		'second_quarter_ar',
		/*
		'third_quarter_ar',
		'fourth_quarter_ar',
		'total_ar',
		'first_quarter_oi',
		'second_quarter_oi',
		'third_quarter_oi',
		'fourth_quarter_oi',
		'total_oi',
		'year',
		'continuing_appropriation',
		'current_appropriation',
		'first_quarter_remarks',
		'second_quarter_remarks',
		'third_quarter_remarks',
		'fourth_quarter_remarks',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
