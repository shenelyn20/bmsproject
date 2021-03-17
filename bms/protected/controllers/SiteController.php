<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		/*$models = QuarterlyFinancialReport::model()->findAll(array('order'=>'id'));
		$models2 = QuarterYear::model()->findByPk(1);
		$count = count($models);
		$pdf = Yii::app()->ePdf->HTML2PDF('L');
		try{
			$pdf->WriteHTML($this->renderPartial('generatepdf',array('models'=>$models,'models2'=>$models2,'count'=>$count),true));
			$pdf->Output("output.pdf",EYiiPdf::OUTPUT_TO_DOWNLOAD);
		}catch(HTML2PDF_exception $e){
			echo $e;
			exit;
		}*/
		$this->render('index');
	}

	public function actionGeneratepdf()
	{
		$models = QuarterlyFinancialReport::model()->findAll(array('order'=>'id'));
		$models2 = QuarterYear::model()->findByPk(1);
		$count = count($models);

		
		$pdf = Yii::app()->ePdf->mpdf();
		$pdf->WriteHTML($this->renderPartial('generatepdf',array('models'=>$models,'models2'=>$models2,'count'=>$count),true));	
		$pdf->Output("pdf/".$models2->quarter."".$models2->year.".pdf",'F');
		
	
		/*$pdf = Yii::app()->ePdf->HTML2PDF('L');
		$pdf->WriteHTML($this->renderPartial('generatepdf',array('models'=>$models,'models2'=>$models2,'count'=>$count),true));
		$pdf->Output("pdf/".$models2->quarter."".$models2->year.".pdf",EYiiPdf::OUTPUT_TO_FILE);*/

	}

	public function actionDownloadpdf($file)
	{
		Yii::app()->getRequest()->sendFile( $file , file_get_contents('pdf/'.$file) );
		$this->render('index');	
	}
	
	public function actionGeneratexlsx()
	{
		$models = QuarterlyFinancialReport::model()->findAll(array('order'=>'id'));
		$models2 = QuarterYear::model()->findByPk(1);
		$count = count($models);
		$day = 0;
		if($models2->quarter=="March" || $models2->quarter=="December"){
			$day=31;
		}else{
			$day=30;
		}
		$objPHPExcel = Yii::app()->excel;
		$objPHPExcel->getActiveSheet()->setCellValue('A1','LBAc Form No. 2');
		$objPHPExcel->getActiveSheet()->setCellValue('A3','QUARTERLY FINANCIAL REPORT OF OPERATIONS');
		$objPHPExcel->getActiveSheet()->setCellValue('A4','For the Quarter Ending '.$models2->quarter.' '.$day.', '.$models2->year);
		$objPHPExcel->getActiveSheet()->setCellValue('A5','GENERAL FUND 101');
		$objPHPExcel->getActiveSheet()->setCellValue('A6','IMPLEMENTING');
		$objPHPExcel->getActiveSheet()->setCellValue('A7','UNIT');
		$objPHPExcel->getActiveSheet()->setCellValue('B6','MFO/PPAS');
		$objPHPExcel->getActiveSheet()->setCellValue('C6','APPROPRIATION');
		$objPHPExcel->getActiveSheet()->setCellValue('C7','CONTINUING');
		$objPHPExcel->getActiveSheet()->setCellValue('D7','CURRENT');
		$objPHPExcel->getActiveSheet()->setCellValue('E7','TOTAL');
		$objPHPExcel->getActiveSheet()->setCellValue('F6','ALLOTMENT RELEASED');
		$objPHPExcel->getActiveSheet()->setCellValue('F7','PREVIOUS');
		$objPHPExcel->getActiveSheet()->setCellValue('F8','QUARTER');
		$objPHPExcel->getActiveSheet()->setCellValue('G7','THIS');
		$objPHPExcel->getActiveSheet()->setCellValue('G8','QUARTER');
		$objPHPExcel->getActiveSheet()->setCellValue('H7','TOTAL');
		$objPHPExcel->getActiveSheet()->setCellValue('I6','BALANCE OF');
		$objPHPExcel->getActiveSheet()->setCellValue('I7','APPROPRIATION');
		$objPHPExcel->getActiveSheet()->setCellValue('J6','OBLIGATION INCURRED');
		$objPHPExcel->getActiveSheet()->setCellValue('J7','PREVIOUS');
		$objPHPExcel->getActiveSheet()->setCellValue('J8','QUARTER');
		$objPHPExcel->getActiveSheet()->setCellValue('K7','THIS');
		$objPHPExcel->getActiveSheet()->setCellValue('K8','QUARTER');
		$objPHPExcel->getActiveSheet()->setCellValue('L7','TOTAL');
		$objPHPExcel->getActiveSheet()->setCellValue('M6','UNOBLIGATED');
		$objPHPExcel->getActiveSheet()->setCellValue('M7','ALLOTMENT');
		$objPHPExcel->getActiveSheet()->setCellValue('N6','REMARKS');
		$i = 9;
		$iu = '';
		$previous_i = 9;
		$counter = 0;
		$flag = true;
		$styleThinBlackBorderOutline = array(
			'borders' => array(
				'outline' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => 'FF000000'),
				),
			),
		);
		$styleOutline = array(
			'borders' => array(
				'outline' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => 'FF000000'),
				),
			),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
			),
		);
		foreach($models as $record){
			if($iu != $record->implementing_unit){
					$objPHPExcel->getActiveSheet()->getStyle('A9:A'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('B9:B'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
					$objPHPExcel->getActiveSheet()->getStyle('C9:C'.($i-1))->applyFromArray($styleOutline);
					$objPHPExcel->getActiveSheet()->getStyle('D9:D'.($i-1))->applyFromArray($styleOutline);
					$objPHPExcel->getActiveSheet()->getStyle('E9:E'.($i-1))->applyFromArray($styleOutline);
					$objPHPExcel->getActiveSheet()->getStyle('F9:F'.($i-1))->applyFromArray($styleOutline);
					$objPHPExcel->getActiveSheet()->getStyle('G9:G'.($i-1))->applyFromArray($styleOutline);
					$objPHPExcel->getActiveSheet()->getStyle('H9:H'.($i-1))->applyFromArray($styleOutline);
					$objPHPExcel->getActiveSheet()->getStyle('I9:I'.($i-1))->applyFromArray($styleOutline);
					$objPHPExcel->getActiveSheet()->getStyle('J9:J'.($i-1))->applyFromArray($styleOutline);
					$objPHPExcel->getActiveSheet()->getStyle('K9:K'.($i-1))->applyFromArray($styleOutline);
					$objPHPExcel->getActiveSheet()->getStyle('L9:L'.($i-1))->applyFromArray($styleOutline);
					$objPHPExcel->getActiveSheet()->getStyle('M9:M'.($i-1))->applyFromArray($styleOutline);
					$objPHPExcel->getActiveSheet()->getStyle('N9:N'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
				
				$previous_i = $i;
				$iu = $record->implementing_unit;
				$objPHPExcel->getActiveSheet()->setCellValue('A'. $i,$record->implementing_unit);
				
			}
			if($counter==0) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==16) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==17) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==43) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");$flag = false;}

			if($counter==49) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"MOOE");$flag = false;}
			if($counter==55) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");$flag = false;}

			if($counter==58) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==60) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==61) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==62) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");$flag = false;}

			if($counter==65) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"MOOE");$flag = false;}
			
			if($counter==69) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"MOOE");$flag = false;}
			
			if($counter==73) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"MOOE");$flag = false;}
			if($counter==79) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");$flag = false;}
			
			if($counter==83) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"MOOE");$flag = false;}
			
			if($counter==86) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"MOOE");$flag = false;}
			
			if($counter==90) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==92) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==93) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==96) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");		$flag = false;}
			
			if($counter==101) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==117) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==118) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==136) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");	$flag = false;}
			
			if($counter==141) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==157) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==158) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==174) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");	$flag = false;}

			if($counter==177) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==194) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==195) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==205) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");			$flag = false;}
			
			if($counter==208) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==224) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==225) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==233) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");		$flag = false;}
			
			if($counter==237) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==253) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==254) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==266) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");		$flag = false;}
			
			if($counter==269) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==283) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==284) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==297) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");		$flag = false;}
			
			if($counter==300) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services"); $flag = false;}
			if($counter==315) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==316) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==324) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");			$flag = false;}
			
			if($counter==330) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==347) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==348) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==356) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");		$flag = false;}
			
			if($counter==359) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==376) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==377) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==387) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");		$flag = false;}
			
			if($counter==390) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==408) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==409) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==417) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");		$flag = false;}
			
			if($counter==421) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Total General Public Services");			$flag = false;}
			if($counter==422) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"A. Sports Devt. Program");$flag = false;}
			if($counter==423) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"MOOE");$flag = false;}
			
			if($counter==425) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"B. Scholarship Program");$flag = false;}
			if($counter==426) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"MOOE");$flag = false;}

			if($counter==431) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==449) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==450) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}

			if($counter==460) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services"); $flag = false;}
			if($counter==462) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==463) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}

			if($counter==467) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==469) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==470) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==476) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");		$flag = false;}
			
			if($counter==480) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"A. Housing Program"); $flag = false;}
			if($counter==481) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services"); $flag = false;}
			if($counter==482) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==483) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==486) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");			$flag = false;}
			if($counter==489) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"B. Environmental Mgt.");		$flag = false;}	
			if($counter==490) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");		$flag = false;}	
			if($counter==491) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==492) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==497) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");	$flag = false;}
			
			if($counter==501) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services"); $flag = false;}
			if($counter==517) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==518) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}

			if($counter==528) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Total Social Services");		$flag = false;}
			if($counter==529) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Economic Services");$flag = false;}
			if($counter==529) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==546) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==547) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==560) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");		$flag = false;}
			
			if($counter==563) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==579) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==580) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==592) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");			$flag = false;}
			
			if($counter==597) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==599) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==600) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==605) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");		$flag = false;}
			
			if($counter==608) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==622) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==623) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==637) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");		$flag = false;}
			
			if($counter==640) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Personal Services");$flag = false;}
			if($counter==654) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Maintenance and Other"); $flag = false;}
			if($counter==655) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Operating Expenses"); $flag = false;}
			if($counter==665) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Capital Outlay");			$flag = false;}
			

			if($counter==668) { $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,"Total Economic Services");$flag = false;}
			if($flag == false){
				$objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray(
					array(
						'font'    => array(
							'bold'      => true
						),
					)
				);
			}
			if($flag==true){
				$objPHPExcel->getActiveSheet()->setCellValue('B'. $i,$record->mfo_ppas);
				if(stripos($record->mfo_ppas,"total")===0){
					$objPHPExcel->getActiveSheet()->getStyle('B'.$i.':N'.$i)->applyFromArray($styleThinBlackBorderOutline);
				}
				if(strcmp(strtolower($record->mfo_ppas),"total")==0){
					$objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray(
						array(
							'font'    => array(
								'bold'      => true
							),
						)
					);
				}
				if($record->continuing_appropriation == 0){
					$objPHPExcel->getActiveSheet()->setCellValue('C'. $i,'-');
				}else{
					$objPHPExcel->getActiveSheet()->setCellValue('C'. $i,$record->continuing_appropriation);
				}
				if($record->current_appropriation == 0){
					$objPHPExcel->getActiveSheet()->setCellValue('D'. $i,'-');
				}else{
					$objPHPExcel->getActiveSheet()->setCellValue('D'. $i,$record->current_appropriation);
				}
				if($record->total_appropriation == 0){
					$objPHPExcel->getActiveSheet()->setCellValue('E'. $i,'-');
				}else{
					$objPHPExcel->getActiveSheet()->setCellValue('E'. $i,$record->total_appropriation);
				}
				if($record->previous_quarter_allotment_released == 0){
					$objPHPExcel->getActiveSheet()->setCellValue('F'. $i,'-');
				}else{
					$objPHPExcel->getActiveSheet()->setCellValue('F'. $i,$record->previous_quarter_allotment_released);
				}
				if($record->this_quarter_allotment_released == 0){
					$objPHPExcel->getActiveSheet()->setCellValue('G'. $i,'-');
				}else{
					$objPHPExcel->getActiveSheet()->setCellValue('G'. $i,$record->this_quarter_allotment_released);
				}
				if($record->total_allotment_released == 0){
					$objPHPExcel->getActiveSheet()->setCellValue('H'. $i,'-');
				}else{
					$objPHPExcel->getActiveSheet()->setCellValue('H'. $i,$record->total_allotment_released);
				}
				if($record->balance_of_appropriation == 0){
					$objPHPExcel->getActiveSheet()->setCellValue('I'. $i,'-');
				}else{
					$objPHPExcel->getActiveSheet()->setCellValue('I'. $i,$record->balance_of_appropriation);
				}
				if($record->previous_quarter_obligation_incurred == 0){
					$objPHPExcel->getActiveSheet()->setCellValue('J'. $i,'-');
				}else{
					$objPHPExcel->getActiveSheet()->setCellValue('J'. $i,$record->previous_quarter_obligation_incurred);
				}
				if($record->this_quarter_obligation_incurred == 0){
					$objPHPExcel->getActiveSheet()->setCellValue('K'. $i,'-');
				}else{
					$objPHPExcel->getActiveSheet()->setCellValue('K'. $i,$record->this_quarter_obligation_incurred);
				}
				if($record->total_obligation_incurred == 0){
					$objPHPExcel->getActiveSheet()->setCellValue('L'. $i,'-');
				}else{
					$objPHPExcel->getActiveSheet()->setCellValue('L'. $i,$record->total_obligation_incurred);
				}
				if($record->unobligated_allotment == 0){
					$objPHPExcel->getActiveSheet()->setCellValue('M'. $i,'-');
				}else{
					$objPHPExcel->getActiveSheet()->setCellValue('M'. $i,$record->unobligated_allotment);
				}
				$objPHPExcel->getActiveSheet()->setCellValue('N'. $i,$record->remarks);
				//$counter++;
			}	
			$i++;
			$counter++;
			$flag = true;
		}

		$objPHPExcel->getActiveSheet()->getStyle('A9:A'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('B9:B'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('C9:C'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('D9:D'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('E9:E'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('F9:F'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('G9:G'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('H9:H'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('I9:I'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('J9:J'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('K9:K'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('L9:L'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('M9:M'.($i-1))->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('N9:N'.($i-1))->applyFromArray($styleThinBlackBorderOutline);

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(24);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(24);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
        /*$styleThinBlackBorderOutline = array(
			'borders' => array(
				'outline' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => 'FF000000'),
				),
			),
		);*/
		/*$styleOutline = array(
			'borders' => array(
				'outline' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => 'FF000000'),
				),
			),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
			),
		);*/
		$objPHPExcel->getActiveSheet()->getStyle('A3:N3')->applyFromArray(
				array(
					'font'    => array(
						'bold'      => true
					),
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					),
					
				)
		);
		$objPHPExcel->getActiveSheet()->getStyle('A4:N4')->applyFromArray(
				array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					),
					
				)
		);
		$objPHPExcel->getActiveSheet()->getStyle('A6:N8')->applyFromArray(
				array(
					'font'    => array(
						'bold'      => true
					),
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					),
					
				)
		);
		//$objPHPExcel->getActiveSheet()->getStyle('A6:N'.$i)->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A6:A8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('B6:B8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('C6:E6')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('C7:D8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('D7:E8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('E7:F8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('F6:H6')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('F7:G8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('G7:H8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('I6:I8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('J6:L6')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('J7:K8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('K7:L8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('M6:M8')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('N6:N8')->applyFromArray($styleThinBlackBorderOutline);
		/*$objPHPExcel->getActiveSheet()->getStyle('A9:A'.$i)->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('B9:B'.$i)->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('C9:C'.$i)->applyFromArray($styleOutline);
		$objPHPExcel->getActiveSheet()->getStyle('D9:D'.$i)->applyFromArray($styleOutline);
		$objPHPExcel->getActiveSheet()->getStyle('E9:E'.$i)->applyFromArray($styleOutline);
		$objPHPExcel->getActiveSheet()->getStyle('F9:F'.$i)->applyFromArray($styleOutline);
		$objPHPExcel->getActiveSheet()->getStyle('G9:G'.$i)->applyFromArray($styleOutline);
		$objPHPExcel->getActiveSheet()->getStyle('H9:H'.$i)->applyFromArray($styleOutline);
		$objPHPExcel->getActiveSheet()->getStyle('I9:I'.$i)->applyFromArray($styleOutline);
		$objPHPExcel->getActiveSheet()->getStyle('J9:J'.$i)->applyFromArray($styleOutline);
		$objPHPExcel->getActiveSheet()->getStyle('K9:K'.$i)->applyFromArray($styleOutline);
		$objPHPExcel->getActiveSheet()->getStyle('L9:L'.$i)->applyFromArray($styleOutline);
		$objPHPExcel->getActiveSheet()->getStyle('M9:M'.$i)->applyFromArray($styleOutline);
		$objPHPExcel->getActiveSheet()->getStyle('N9:N'.$i)->applyFromArray($styleOutline);*/

		$objPHPExcel->getActiveSheet()->getStyle('C9:C'.$i)->getNumberFormat()->setFormatCode('0.00');
		$objPHPExcel->getActiveSheet()->getStyle('D9:D'.$i)->getNumberFormat()->setFormatCode('0.00');
		$objPHPExcel->getActiveSheet()->getStyle('E9:E'.$i)->getNumberFormat()->setFormatCode('0.00');
		$objPHPExcel->getActiveSheet()->getStyle('F9:F'.$i)->getNumberFormat()->setFormatCode('0.00');
		$objPHPExcel->getActiveSheet()->getStyle('G9:G'.$i)->getNumberFormat()->setFormatCode('0.00');
		$objPHPExcel->getActiveSheet()->getStyle('H9:H'.$i)->getNumberFormat()->setFormatCode('0.00');
		$objPHPExcel->getActiveSheet()->getStyle('I9:I'.$i)->getNumberFormat()->setFormatCode('0.00');
		$objPHPExcel->getActiveSheet()->getStyle('J9:J'.$i)->getNumberFormat()->setFormatCode('0.00');
		$objPHPExcel->getActiveSheet()->getStyle('K9:K'.$i)->getNumberFormat()->setFormatCode('0.00');
		$objPHPExcel->getActiveSheet()->getStyle('L9:L'.$i)->getNumberFormat()->setFormatCode('0.00');
		$objPHPExcel->getActiveSheet()->getStyle('M9:M'.$i)->getNumberFormat()->setFormatCode('0.00');
		$objPHPExcel->getActiveSheet()->getStyle('N9:N'.$i)->getNumberFormat()->setFormatCode('0.00');

		/*$objPHPExcel->getActiveSheet()->getStyle('A9:N57')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A58:N66')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A67:N73')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A74:N77')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A78:N81')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A82:N91')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A92:N94')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A95:N98')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A99:N109')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A110:N149')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A150:N187')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A188:N219')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A220:N250')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A251:N282')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A283:N313')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A314:N343')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A344:N372')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A373:N373')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A374:N406')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A407:N439')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A440:N448')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A449:N477')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A478:N491')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A492:N504')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A505:N525')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A526:N554')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A555:N555')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A556:N590')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A591:N624')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A625:N635')->applyFromArray($styleThinBlackBorderOutline);
		$objPHPExcel->getActiveSheet()->getStyle('A636:N668')->applyFromArray($styleThinBlackBorderOutline);*/


		$objPHPExcel->getActiveSheet()->mergeCells('A3:N3');
		$objPHPExcel->getActiveSheet()->mergeCells('A4:N4');
		$objPHPExcel->getActiveSheet()->mergeCells('C6:E6');
		$objPHPExcel->getActiveSheet()->mergeCells('F6:H6');
		$objPHPExcel->getActiveSheet()->mergeCells('J6:L6');
		$objPHPExcel->saveExcel2007($objPHPExcel,'xlsx/'.$models2->quarter."".$models2->year.".xlsx");
	}

	public function actionDownloadxlsx($file)
	{
		Yii::app()->getRequest()->sendFile( $file , file_get_contents('xlsx/'.$file) );
		$this->render('index');	
	}
		
	public function actionAllotment_released()
	{
		$this->render('allotment_released');
	}
	
	public function actionObligation_incurred()
	{
		$this->render('obligation_incurred');
	}
	
	public function actionYearAllotment()
	{
		$this->render('yearallotment');
	}
	
	public function actionYearObligation()
	{
		$this->render('yearobligation');
	}

	public function actionHistory()
	{
		$this->render('history');
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}