<?php
class QFRWidget extends CWidget {
	public function run(){
		$models = QuarterlyFinancialReport::model()->findAll(array('order'=>'id'));
		$models2 = QuarterYear::model()->findByPk(1);

		$this->render('qfr', array(
			'models'=>$models,
			'models2'=>$models2
		));
	}
}
?>