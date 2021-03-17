<?php
class OIWidget extends CWidget {
	public function run(){
		$models = ObligationIncurred::model()->findAll(array('order'=>'oi_id'));
		
		$this->render('oi', array(
			'models'=>$models
		));
	}
}
?>