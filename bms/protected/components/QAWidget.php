<?php
class QAWidget extends CWidget {
	public function run(){
		$models2 = QuarterYear::model()->findByPk(3);
		$models = QuarterlyAllotmentObligation::model()->findAll(array('order'=>'id','condition'=>'year=:year','params'=> array(':year'=>$models2->year)));
		$count = count($models);
		$this->render('qa', array(
			'models'=>$models,
			'models2'=>$models2,
			'count'=>$count
		));
	}
}
?>