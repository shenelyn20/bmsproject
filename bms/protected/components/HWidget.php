<?php
class HWidget extends CWidget {
	public function run(){
		$models2 = QuarterYear::model()->findByPk(2);
		$models = QuarterlyAllotmentObligation::model()->findAll(array('order'=>'id','condition'=>'year=:year','params'=> array(':year'=>$models2->year)));
		$year = (int)$models2->year;
		$models3 = QuarterlyAllotmentObligation::model()->findAll(array('order'=>'id','condition'=>'year=:year','params'=> array(':year'=>$year-1)));
		$count = count($models);


		$this->render('h', array(
			'models'=>$models,
			'models2'=>$models2,
			'models3'=>$models3,
			'count'=>$count
		));
	}
}
?>