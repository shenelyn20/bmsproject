<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Obligation Incurred Transactions';
$this->breadcrumbs=array(
	'Obligation Incurred Transactions',
);
?>

<?php $this->widget('OIWidget') ?>