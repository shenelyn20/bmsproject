<?php
class ARWidget extends CWidget {
	public function run(){
		$models = AllotmentReleased::model()->findAll(array('order'=>'ar_id'));
		
		$this->render('ar', array(
			'models'=>$models
		));
	}
}
?>