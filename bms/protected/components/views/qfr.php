<?php if($models != null):?>
<style>
	table, th, td{
		border: 1px solid #333;
		text-align:center;
	}
	.ra,input {
		text-align: right;
	}
</style>
<link rel="stylesheet" href="assets/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<script src="assets/jquery-ui-1.10.4.custom/js/jquery-1.10.2.js"></script>
<script src="assets/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js"></script>

<input type="hidden" id="quarterFromDb" value="<?php echo $models2->quarter;?>">
<input type="hidden" id="yearFromDb" value="<?php echo $models2->year;?>">
<center><b>QUARTERLY FINANCIAL REPORT OF OPERATIONS </b></center>
<center><b>For the Quarter Ending</b>
	<select id="quarter" onchange="updateContents();">
		<option value="March" selected>March</option>
		<option value="June">June</option>
		<option value="September">September</option>
		<option value="December">December</option>
	</select>
	<input type="number" id="year" onchange="updateContents();">
</center>
<p>GENERAL FUND 101</p>
<table id="qfr_table">
	<tr><th rowspan="3">IMPLEMENTING<br>UNIT</th>
		<th rowspan="3">MFO/PPAS</th>
		<th colspan="4">APPROPRIATION</th>
		<th colspan="3">ALLOTMENT RELEASED</th>
		<th rowspan="3">BALANCE OF<br>APPROPRIATION</th>
		<th colspan="3">OBLIGATION INCURRED</th>
		<th rowspan="3">UNOBLIGATED<br>ALLOTMENT</th>
		<th rowspan="3">REMARKS</th>
	</tr>	
	<tr>
		<th rowspan="2">NEXT YEAR</th>
		<th rowspan="2">CONTINUING</th>
		<th rowspan="2">CURRENT</th>
		<th rowspan="2">TOTAL</th>
		<th rowspan="2">PREVIOUS<br>QUARTER</th>
		<th rowspan="2">THIS<br>QUARTER</th>
		<th rowspan="2">TOTAL</th>
		<th rowspan="2">PREVIOUS<br>QUARTER</th>
		<th rowspan="2">THIS<br>QUARTER</th>
		<th rowspan="2">TOTAL</th>
	</tr>
	<tr></tr>
	<tr><td>General Public Services</td><td colspan="14"></td></tr>
	<td rowspan="52">Office of the Mayor 1011</td>
	<td><b>Personal Services</td>
	<td colspan="13"></td>
	<?php 
		$counter = 0;
		foreach($models as $model): 
			$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
				'id'=>'modal_this_quarter_allotment_released'.$counter,
				'options'=>array(
					'title'=>$model->mfo_ppas,
					'autoOpen'=>false,
					'resizable'=>false,
					'width'=>360,
					'modal'=>true,
					'overlay'=>array(
						'backgroundColor'=>'#000',
						'opacity'=>'0.5'
					),
					'buttons'=>array(
						'Add Amount'=>"js:function(){
							$(this).dialog('close');
							var modal_this_quarter_allotment_released = (parseFloat($('#ar_amount$counter').val()) +  parseFloat($('#this_quarter_allotment_released$counter').text())).toFixed(2);
							$('#this_quarter_allotment_released$counter').text(modal_this_quarter_allotment_released);
							$('#ar_current$counter').html('P'+modal_this_quarter_allotment_released);
							var total_appropriation = parseFloat($('#total_appropriation$counter').html()).toFixed(2);
							var total_allotment_released = (parseFloat($('#this_quarter_allotment_released$counter').text())+parseFloat($('#previous_quarter_allotment_released$counter').val())).toFixed(2);
							var balance_of_appropriation = (total_appropriation - total_allotment_released).toFixed(2);
							var total_obligation_incurred = (parseFloat($('#this_quarter_obligation_incurred$counter').text())+parseFloat($('#previous_quarter_obligation_incurred$counter').val())).toFixed(2);
							var unobligated_allotment = (total_allotment_released-total_obligation_incurred).toFixed(2);
							$('#total_allotment_released$counter').html(total_allotment_released);
							$('#balance_of_appropriation$counter').html(balance_of_appropriation);
							$('#unobligated_allotment$counter').html(unobligated_allotment);
							
							$.ajax({
							  type: 'POST',
							  url: 'index.php?r=allotmentReleased/addallotment',
							  data:  {'implementing_unit':$('#implementing_unit$counter').val(),'mfo_ppas':$('#mfo_ppas$counter').html(),'description':$('#ar_description$counter').val(),'release_date':$('#ar_release_date$counter').val(),'amount':parseFloat($('#ar_amount$counter').val()).toFixed(2)},
							  success: function(msg){},
							  error: function(xhr){}
							});
							$('#ar_amount$counter').val(parseFloat('0.00').toFixed(2));
							$.ajax({
							  type: 'POST',
							  url: 'index.php?r=quarterlyFinancialReport/updateallotment&id='+$('#id$counter').val(),
							  data:  {'this_quarter_allotment_released':modal_this_quarter_allotment_released,'previous_quarter_allotment_released':parseFloat($('#previous_quarter_allotment_released$counter').val()).toFixed(2),'total_allotment_released':total_allotment_released,'balance_of_appropriation':balance_of_appropriation,'unobligated_allotment':unobligated_allotment},
							  success: function(msg){},
							  error: function(xhr){}
							});
							$.ajax({
							  type: 'POST',
							  url: 'index.php?r=quarterlyAllotmentObligation/updateallotmentobligation&id='+$('#id$counter').val(),
							  data:  {'continuing_appropriation':$('#continuing_appropriation$counter').val(),'current_appropriation':$('#current_appropriation$counter').val(),'implementing_unit':$('#implementing_unit$counter').val(),'mfo_ppas':$('#mfo_ppas$counter').html(),'this_quarter_allotment_released':modal_this_quarter_allotment_released,'year':$('#year').val(),'quarter':$('#quarter').val()},
							  success: function(msg){},
							  error: function(xhr){}
							});

							if($counter>=0 && $counter<15){
								var total_personal_services_previous_quarter_allotment_released = parseFloat('0.00');
								var total_personal_services_this_quarter_allotment_released = parseFloat('0.00');
								for(var i=0; i<15; i++){
									total_personal_services_previous_quarter_allotment_released = total_personal_services_previous_quarter_allotment_released+parseFloat($('#previous_quarter_allotment_released'+i).val());
									total_personal_services_this_quarter_allotment_released = total_personal_services_this_quarter_allotment_released+parseFloat($('#this_quarter_allotment_released'+i).text());
								}
								var total_personal_services_total_allotment_released = total_personal_services_previous_quarter_allotment_released + total_personal_services_this_quarter_allotment_released;
								$('#previous_quarter_allotment_released15').html(total_personal_services_previous_quarter_allotment_released.toFixed(2));
								$('#this_quarter_allotment_released15').html(total_personal_services_this_quarter_allotment_released.toFixed(2));
								$('#total_allotment_released15').html(total_personal_services_total_allotment_released.toFixed(2));
								var total_personal_services_balance_of_appropriation = parseFloat($('#total_appropriation15').html()).toFixed(2) - parseFloat($('#total_allotment_released15').html()).toFixed(2);
								$('#balance_of_appropriation15').html(total_personal_services_balance_of_appropriation.toFixed(2));
								var total_personal_services_unobligated_allotment = total_personal_services_total_allotment_released - parseFloat($('#total_obligation_incurred15').html());
								$('#unobligated_allotment15').html(total_personal_services_unobligated_allotment.toFixed(2));
							}
							
							var i=$counter;
							var total_this_quarter_allotment_released = 0;
							while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf('total')==-1){
								total_this_quarter_allotment_released = parseFloat($('#this_quarter_allotment_released'+i).text()) + total_this_quarter_allotment_released;
								i--;
							}
							i=$counter;
							while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf('total')==-1){
								total_this_quarter_allotment_released = parseFloat($('#this_quarter_allotment_released'+i).text()) + total_this_quarter_allotment_released;
								i++;
							}
							total_this_quarter_allotment_released = total_this_quarter_allotment_released - parseFloat($('#this_quarter_allotment_released$counter').text())
							total_previous_quarter_allotment_released = parseFloat($('#previous_quarter_allotment_released'+i).html())
							total_total_allotment_released = total_previous_quarter_allotment_released + total_this_quarter_allotment_released
							total_total_appropriation = parseFloat($('#total_appropriation'+i).html());
							total_balance_of_appropriation = total_total_appropriation - total_total_allotment_released;
							total_total_obligation_incurred = parseFloat($('#total_obligation_incurred'+i).html());
							total_unobligated_allotment = total_total_allotment_released-total_total_obligation_incurred;
							$('#this_quarter_allotment_released'+i).html(total_this_quarter_allotment_released.toFixed(2));
							$('#total_allotment_released'+i).html(total_total_allotment_released.toFixed(2));
							$('#balance_of_appropriation'+i).html(total_balance_of_appropriation.toFixed(2));
							$('#unobligated_allotment'+i).html(total_unobligated_allotment.toFixed(2));
							if(($('#mfo_ppas'+(i+1)).html()).toLowerCase().indexOf('total brought forward')>-1){
								$('#this_quarter_allotment_released'+(i+1)).html(total_this_quarter_allotment_released.toFixed(2));
								$('#total_allotment_released'+(i+1)).html(total_total_allotment_released.toFixed(2));
								$('#balance_of_appropriation'+(i+1)).html(total_balance_of_appropriation.toFixed(2));
								$('#unobligated_allotment'+(i+1)).html(total_unobligated_allotment.toFixed(2));
							}	
							var i=$counter;
							var total_this_quarter_allotment_released = 0;
							while(($('#mfo_ppas'+i).html()).toLowerCase() != 'total'){
								this_quarter_allotment_released = parseFloat($('#this_quarter_allotment_released'+i).text());
								if(isNaN(this_quarter_allotment_released)){
									this_quarter_allotment_released = 0;
								}
								total_this_quarter_allotment_released =  this_quarter_allotment_released + total_this_quarter_allotment_released;
								i--;
								if(i==0) break;
							}
							i=$counter;
							while(($('#mfo_ppas'+i).html()).toLowerCase() != 'total'){
								this_quarter_allotment_released = parseFloat($('#this_quarter_allotment_released'+i).text());
								if(isNaN(this_quarter_allotment_released)){
									this_quarter_allotment_released = 0;
								}
								total_this_quarter_allotment_released =  this_quarter_allotment_released + total_this_quarter_allotment_released;
								i++;
							}
							if((total_this_quarter_allotment_released - parseFloat($('#this_quarter_allotment_released$counter').text()))%2 != 0){
								total_this_quarter_allotment_released = total_this_quarter_allotment_released - parseFloat($('#this_quarter_allotment_released$counter').text())
							}else{
								total_this_quarter_allotment_released = (total_this_quarter_allotment_released - parseFloat($('#this_quarter_allotment_released$counter').text()))/2
							}
							
							total_previous_quarter_allotment_released = parseFloat($('#previous_quarter_allotment_released'+i).html())
							total_total_allotment_released = total_previous_quarter_allotment_released + total_this_quarter_allotment_released
							total_total_appropriation = parseFloat($('#total_appropriation'+i).html());
							total_balance_of_appropriation = total_total_appropriation - total_total_allotment_released;
							total_total_obligation_incurred = parseFloat($('#total_obligation_incurred'+i).html());
							total_unobligated_allotment = total_total_allotment_released-total_total_obligation_incurred;
							$('#this_quarter_allotment_released'+i).html(total_this_quarter_allotment_released.toFixed(2));
							$('#total_allotment_released'+i).html(total_total_allotment_released.toFixed(2));
							$('#balance_of_appropriation'+i).html(total_balance_of_appropriation.toFixed(2));
							$('#unobligated_allotment'+i).html(total_unobligated_allotment.toFixed(2));
						}",
						'Cancel'=>'js:function(){$(this).dialog("close");}',
					)
				),
			));
			echo '<div><b>Current Allotment Released: <div id="ar_current'.$counter.'">P'.$model->this_quarter_allotment_released.'</div></div>';
			echo '<div><b>Description: <input type="text" id="ar_description'.$counter.'"></div>';
			echo '<div><b>Release Date: <input type="text" class="ar_release_date" id="ar_release_date'.$counter.'"></div>';
			echo '<div><b>Amount: P<input type="text" id="ar_amount'.$counter.'"></div>';
			$this->endWidget('zii.widgets.jui.CJuiDialog');
			
			$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
				'id'=>'modal_this_quarter_obligation_incurred'.$counter,
				'options'=>array(
					'title'=>$model->mfo_ppas,
					'autoOpen'=>false,
					'resizable'=>false,
					'width'=>360,
					'modal'=>true,
					'overlay'=>array(
						'backgroundColor'=>'#000',
						'opacity'=>'0.5'
					),
					'buttons'=>array(
						'Add Amount'=>"js:function(){
							$(this).dialog('close');
							var modal_this_quarter_obligation_incurred = (parseFloat($('#oi_amount$counter').val()) +  parseFloat($('#this_quarter_obligation_incurred$counter').text())).toFixed(2);
							$('#this_quarter_obligation_incurred$counter').text(modal_this_quarter_obligation_incurred);
							$('#oi_current$counter').html('P'+modal_this_quarter_obligation_incurred);
							var total_allotment_released = parseFloat($('#total_allotment_released$counter').html()).toFixed(2);
							var total_obligation_incurred = (parseFloat($('#this_quarter_obligation_incurred$counter').text())+parseFloat($('#previous_quarter_obligation_incurred$counter').val())).toFixed(2);
							var unobligated_allotment = (total_allotment_released-total_obligation_incurred).toFixed(2);
							$('#total_obligation_incurred$counter').html(total_obligation_incurred);
							$('#unobligated_allotment$counter').html(unobligated_allotment);
							
							$.ajax({
							  type: 'POST',
							  url: 'index.php?r=obligationIncurred/addobligation',
							  data:  {'implementing_unit':$('#implementing_unit$counter').val(),'mfo_ppas':$('#mfo_ppas$counter').html(),'description':$('#oi_description$counter').val(),'release_date':$('#oi_release_date$counter').val(),'amount':parseFloat($('#oi_amount$counter').val()).toFixed(2)},
							  success: function(msg){},
							  error: function(xhr){}
							});
							$('#oi_amount$counter').val(parseFloat('0.00').toFixed(2));
							$.ajax({
							  type: 'POST',
							  url: 'index.php?r=quarterlyFinancialReport/updateobligation&id='+$('#id$counter').val(),
							  data:  {'this_quarter_obligation_incurred':modal_this_quarter_obligation_incurred,'previous_quarter_obligation_incurred':parseFloat($('#previous_quarter_obligation_incurred$counter').val()).toFixed(2),'total_obligation_incurred':total_obligation_incurred,'unobligated_allotment':unobligated_allotment},
							  success: function(msg){},
							  error: function(xhr){}
							});
							$.ajax({
							  type: 'POST',
							  url: 'index.php?r=quarterlyAllotmentObligation/updateallotmentobligation&id='+$('#id$counter').val(),
							  data:  {'continuing_appropriation':$('#continuing_appropriation$counter').val(),'current_appropriation':$('#current_appropriation$counter').val(),'implementing_unit':$('#implementing_unit$counter').val(),'mfo_ppas':$('#mfo_ppas$counter').html(),'this_quarter_obligation_incurred':modal_this_quarter_obligation_incurred,'year':$('#year').val(),'quarter':$('#quarter').val()},
							  success: function(msg){},
							  error: function(xhr){}
							});

							if($counter>=0 && $counter<15){
								var total_personal_services_previous_quarter_obligation_incurred = parseFloat('0.00');
								var total_personal_services_this_quarter_obligation_incurred = parseFloat('0.00');
								for(var i=0; i<15; i++){
									total_personal_services_previous_quarter_obligation_incurred = total_personal_services_previous_quarter_obligation_incurred+parseFloat($('#previous_quarter_obligation_incurred'+i).val());
									total_personal_services_this_quarter_obligation_incurred = total_personal_services_this_quarter_obligation_incurred+parseFloat($('#this_quarter_obligation_incurred'+i).text());
								}
								var total_personal_services_total_obligation_incurred = total_personal_services_previous_quarter_obligation_incurred + total_personal_services_this_quarter_obligation_incurred;
								$('#previous_quarter_obligation_incurred15').html(total_personal_services_previous_quarter_obligation_incurred.toFixed(2));
								$('#this_quarter_obligation_incurred15').text(total_personal_services_this_quarter_obligation_incurred.toFixed(2));
								$('#total_obligation_incurred15').html(total_personal_services_total_obligation_incurred.toFixed(2));
								
								var total_personal_services_unobligated_allotment = parseFloat($('#total_allotment_released15').html()).toFixed(2) - parseFloat($('#total_obligation_incurred15').html()).toFixed(2);
								$('#unobligated_allotment15').html(total_personal_services_unobligated_allotment.toFixed(2));
							}
							
							var i=$counter;
							var total_this_quarter_obligation_incurred = 0;
							while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf('total')==-1){
								total_this_quarter_obligation_incurred = parseFloat($('#this_quarter_obligation_incurred'+i).text()) + total_this_quarter_obligation_incurred;
								i--;
							}
							i=$counter;
							while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf('total')==-1){
								total_this_quarter_obligation_incurred = parseFloat($('#this_quarter_obligation_incurred'+i).text()) + total_this_quarter_obligation_incurred;
								i++;
							}
							total_this_quarter_obligation_incurred = total_this_quarter_obligation_incurred - parseFloat($('#this_quarter_obligation_incurred$counter').text())
							total_previous_quarter_obligation_incurred = parseFloat($('#previous_quarter_obligation_incurred'+i).html())
							total_total_obligation_incurred = total_previous_quarter_obligation_incurred + total_this_quarter_obligation_incurred
							total_total_allotment_released = parseFloat($('#total_allotment_released'+i).html());
							total_unobligated_allotment = total_total_allotment_released-total_total_obligation_incurred;
							$('#this_quarter_obligation_incurred'+i).html(total_this_quarter_obligation_incurred.toFixed(2));
							$('#total_obligation_incurred'+i).html(total_total_obligation_incurred.toFixed(2));
							$('#unobligated_allotment'+i).html(total_unobligated_allotment.toFixed(2));
							if(($('#mfo_ppas'+(i+1)).html()).toLowerCase().indexOf('total brought forward')>-1){
								$('#this_quarter_obligation_incurred'+(i+1)).html(total_this_quarter_obligation_incurred.toFixed(2));
								$('#total_obligation_incurred'+(i+1)).html(total_total_obligation_incurred.toFixed(2));
								$('#unobligated_allotment'+(i+1)).html(total_unobligated_allotment.toFixed(2));
							}	

							var i=$counter;
							var total_this_quarter_obligation_incurred = 0;
							while(($('#mfo_ppas'+i).html()).toLowerCase() != 'total'){
								this_quarter_obligation_incurred = parseFloat($('#this_quarter_obligation_incurred'+i).text());
								if(isNaN(this_quarter_obligation_incurred)){
									this_quarter_obligation_incurred = 0;
								}
								total_this_quarter_obligation_incurred =  this_quarter_obligation_incurred + total_this_quarter_obligation_incurred;
								i--;
								if(i==0) break;
							}
							i=$counter;
							while(($('#mfo_ppas'+i).html()).toLowerCase() != 'total'){
								this_quarter_obligation_incurred = parseFloat($('#this_quarter_obligation_incurred'+i).text());
								if(isNaN(this_quarter_obligation_incurred)){
									this_quarter_obligation_incurred = 0;
								}
								total_this_quarter_obligation_incurred =  this_quarter_obligation_incurred + total_this_quarter_obligation_incurred;
								i++;
							}
							if((total_this_quarter_obligation_incurred - parseFloat($('#this_quarter_obligation_incurred$counter').text()))%2 != 0){
								total_this_quarter_obligation_incurred = total_this_quarter_obligation_incurred - parseFloat($('#this_quarter_obligation_incurred$counter').text())
							}else{
								total_this_quarter_obligation_incurred = (total_this_quarter_obligation_incurred - parseFloat($('#this_quarter_obligation_incurred$counter').text()))/2
							}
							total_previous_quarter_obligation_incurred = parseFloat($('#previous_quarter_obligation_incurred'+i).html())
							total_total_obligation_incurred = total_previous_quarter_obligation_incurred + total_this_quarter_obligation_incurred
							total_total_allotment_released = parseFloat($('#total_allotment_released'+i).html());
							total_unobligated_allotment = total_total_allotment_released-total_total_obligation_incurred;
							$('#this_quarter_obligation_incurred'+i).html(total_this_quarter_obligation_incurred.toFixed(2));
							$('#total_obligation_incurred'+i).html(total_total_obligation_incurred.toFixed(2));
							$('#unobligated_allotment'+i).html(total_unobligated_allotment.toFixed(2));
						}",
						'Cancel'=>'js:function(){$(this).dialog("close");}',
					)
				),
			));
			echo '<div><b>Current Obligation Incurred: <div id="oi_current'.$counter.'">P'.$model->this_quarter_obligation_incurred.'</div></div>';
			echo '<div><b>Description: <input type="text" id="oi_description'.$counter.'"></div>';
			echo '<div><b>Release Date: <input type="text" class="oi_release_date" id="oi_release_date'.$counter.'"></div>';
			echo '<div><b>Amount: P<input type="text" id="oi_amount'.$counter.'"></div>';
			$this->endWidget('zii.widgets.jui.CJuiDialog');
			
			if($counter==16) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==43) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';

			if($counter==49) echo '<td rowspan="11">Human Resource Mgt Unit 1032</td><td><b>MOOE</td>';
			if($counter==55) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';

			if($counter==58) echo '<td rowspan="10">Office of the Mayor-Purchasing Unit 1011</td><td><b>Personal Services</td>';
			if($counter==60) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==62) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';

			if($counter==65) echo '<td rowspan="5">Office of the Mayor-Los Banos Traffic Mgt. Unit 1013</td><td><b>MOOE</td>';
			
			if($counter==69) echo '<td rowspan="5">Office of the Mayor-Subsidy to DILG Family 1011</td><td><b>MOOE</td>';
			
			if($counter==73) echo '<td rowspan="12">Office of the Mayor-Subsidy to COA Family 1011</td><td><b>MOOE</td>';
			if($counter==79) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';
			
			if($counter==83) echo '<td rowspan="4">Office of the Mayor-Subsidy to COMELEC 1011</td><td><b>MOOE</td>';
			
			if($counter==86) echo '<td rowspan="5">Office of the Mayor-Subsidy to MTC 1011</td><td><b>MOOE</td>';
			
			if($counter==90) echo '<td rowspan="14">Non-Office Expenditures 1999</td><td><b>Personal Services</td>';
			if($counter==92) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==96) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==101) echo '<td rowspan="43">Office of the Vice Mayor 1016</td><td><b>Personal Services</td>';
			if($counter==117) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==136) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==141) echo '<td rowspan="39">Office of the Sanggunian Bayan 1021</td><td><b>Personal Services</td>';
			if($counter==157) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==174) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';	

			if($counter==177) echo '<td rowspan="34">Office of the Sanggunian Bayan Secretary 1022</td><td><b>Personal Services</td>';
			if($counter==194) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==205) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==208) echo '<td rowspan="32">Office of the Municipal Planning and Devt. Coordinator 1041</td><td><b>Personal Services</td>';
			if($counter==224) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==233) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==237) echo '<td rowspan="35">Office of the Municipal Local Civil Registrar 1051</td><td><b>Personal Services</td>';
			if($counter==253) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==266) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==269) echo '<td rowspan="34">Office of the Office of the General Services Officer 1061</td><td><b>Personal Services</td>';
			if($counter==283) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==297) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==300) echo '<td rowspan="33">Office of the Municipal Budget Officer 1071</td><td><b>Personal Services</td>';
			if($counter==315) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==324) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==330) echo '<td rowspan="32">Office of the Municipal Accountant 1081</td><td><b>Personal Services</td>';
			if($counter==347) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==356) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==359) echo '<td rowspan="34">Office of the Municipal Treasurer 1091</td><td><b>Personal Services</td>';
			if($counter==376) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==387) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==390) echo '<td rowspan="34">Office of the Municipal Assessor 1101</td><td><b>Personal Services</td>';
			if($counter==408) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==417) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==421) echo '<td rowspan="2" colspan="1">Total General Public Services</td>';			
			if($counter==422) echo '<tr><td>Social Services</td><td><b>A. Sports Devt. Program</td></tr>';
			if($counter==422) echo '<td rowspan="4">Office of the Mayor-Youth and Sports Devt. Unit 3392</td><td><b>MOOE</td>';
			
			if($counter==425) echo '<tr><td>Social Services</td><td><b>B. Scholarship Program</td></tr>';
			if($counter==425) echo '<td rowspan="7"></td><td><b>MOOE</td>';

			if($counter==431) echo '<td rowspan="31">Office of the Municipal Health Officer 4411</td><td><b>Personal Services</td>';
			if($counter==449) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';

			if($counter==460) echo '<td rowspan="9">Office of the Mayor-Municipal Nutrition Action Unit 1011</td><td><b>Personal Services</td>';
			if($counter==462) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';

			if($counter==467) echo '<td rowspan="16">Office of the Mayor-Public Employment Unit 5999</td><td><b>Personal Services</td>';
			if($counter==469) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==476) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==480) echo '<td rowspan="27">Office of the Mayor-Housing and Community Development Unit 6511</td><td><b>A. Housing Program <br>Personal Services</td>';
			if($counter==482) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==486) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			if($counter==489) echo '<td><b>B. Environmental Mgt. <br> Personal Services</td><td colspan="12"></td>';			
			if($counter==491) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==497) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==501) echo '<td rowspan="29">Office of the Municipal Social Welfare and Devt. Officer 7611</td><td><b>Personal Services</td>';
			if($counter==517) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			
			if($counter==528) echo '<td rowspan="2" colspan="1">Total Social Services</td>';			
			if($counter==529) echo '<tr><td><b>Economic Services</td></tr>';
			if($counter==529) echo '<td rowspan="37">Office of the Municipal Agriculturist 8711</td><td><b>Personal Services</td>';
			if($counter==546) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==560) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==563) echo '<td rowspan="37">Office of the Municipal Engineer 8751</td><td><b>Personal Services</td>';
			if($counter==579) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==592) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==597) echo '<td rowspan="14">Office of the Mayor-Tourism 8852</td><td><b>Personal Services</td>';
			if($counter==599) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==605) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==608) echo '<td rowspan="35">Office of the Market Supervisor 8811</td><td><b>Personal Services</td>';
			if($counter==622) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==637) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==640) echo '<td rowspan="31">Office of the Slaughter-house Master 8812</td><td><b>Personal Services</td>';
			if($counter==654) echo '<td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==665) echo '<td><b>Capital Outlay</td><td colspan="12"></td>';			
			

			if($counter==668) echo '<td rowspan="2" colspan="1">Total Economic Services</td>';
			//if($counter>668) echo '<td>'.$model->implementing_unit.'</td>';
	?>
	<tr>
		<?php if($counter>668) echo '<td>'.$model->implementing_unit.'</td>'; ?>
	<td>
	<?php 
		echo '<input type="hidden" id="implementing_unit'.$counter.'" value="'.$model->implementing_unit.'">';
		if($model->mfo_ppas == "TOTAL" || $model->mfo_ppas == "Total") echo '<b>';
		echo '<div id="mfo_ppas'.$counter.'">'.$model->mfo_ppas.'</div>'; 
		if($model->mfo_ppas == "TOTAL" || $model->mfo_ppas == "Total") echo '</b>';
		
	?>
	</td>
	<?php 
		//echo '<td><input type="text" id="next_year_appropriation'.$counter.'" value="'.$model->next_year_appropriation.'"></td>';
		//if($model->mfo_ppas != "TOTAL PERSONAL SERVICES" && $model->mfo_ppas != "TOTAL CARRIED FORWARD" && $model->mfo_ppas != "TOTAL BROUGHT FORWARD" && $model->mfo_ppas != "TOTAL MOOE" && $model->mfo_ppas != "TOTAL CAPITAL OUTLAY" && $model->mfo_ppas != "TOTAL" && $model->mfo_ppas != "Total"){
		if(stripos($model->mfo_ppas,"TOTAL") !== 0){	
			echo '<td><input type="text" id="next_year_appropriation'.$counter.'" value="'.$model->next_year_appropriation.'"></td>';
			echo '<td><input type="hidden" id="id'.$counter.'" value="'.$model->id.'">';
			//echo '<input type="hidden" class="next_year_appropriation" id="next_year_appropriation'.$counter.'" value="'.$model->next_year_appropriation.'">'; 
			echo '<input class="continuing_appropriation" id="continuing_appropriation'.$counter.'" type="text" value="'.$model->continuing_appropriation.'"></td>
			<td><input class="current_appropriation" id="current_appropriation'.$counter.'" type="text" value="'.$model->current_appropriation.'"></td>
			<td><div class="ra" id="total_appropriation'.$counter.'">'.$model->total_appropriation.'</div></td>
			<td><input id="previous_quarter_allotment_released'.$counter.'" type="text" value="'.$model->previous_quarter_allotment_released.'"></td>
			<td>';
			echo CHtml::link($model->this_quarter_allotment_released, '#', array(
					'id'=>'this_quarter_allotment_released'.$counter,
					'value'=>$model->this_quarter_allotment_released,
					'onclick'=>'$("#modal_this_quarter_allotment_released'.$counter.'").dialog("open"); return false;',));
			echo '</td>
			<td><div class="ra" id="total_allotment_released'.$counter.'">'.$model->total_allotment_released.'</div></td>
			<td><div class="ra" id="balance_of_appropriation'.$counter.'">'.$model->balance_of_appropriation.'</div></td>
			<td><input id="previous_quarter_obligation_incurred'.$counter.'" type="text" value="'.$model->previous_quarter_obligation_incurred.'"></td>
			<td>';
			echo CHtml::link($model->this_quarter_obligation_incurred, '#', array(
					'id'=>'this_quarter_obligation_incurred'.$counter,
					'value'=>$model->this_quarter_obligation_incurred,
					'onclick'=>'$("#modal_this_quarter_obligation_incurred'.$counter.'").dialog("open"); return false;',));
			echo '</td>
			<td><div class="ra" id="total_obligation_incurred'.$counter.'">'.$model->total_obligation_incurred.'</div></td>
			<td><div class="ra" id="unobligated_allotment'.$counter.'">'.$model->unobligated_allotment.'</div></td>
			<td><input id="remarks'.$counter.'" type="text" value="'.$model->remarks.'"></td>';
		} else {
			echo '<td><div class="total_next_year_appropriation ra" id="next_year_appropriation'.$counter.'">'.$model->next_year_appropriation.'</div></td>';
			echo '<td><div class="total_continuing_appropriation ra" id="continuing_appropriation'.$counter.'">'.$model->continuing_appropriation.'</div></td>
			<td><div class="total_current_appropriation ra" id="current_appropriation'.$counter.'">'.$model->current_appropriation.'</div></td>
			<td><div class="total_total_appropriation ra" id="total_appropriation'.$counter.'">'.$model->total_appropriation.'</div></td>
			<td><div class="total_previous_quarter_allotment_released ra" id="previous_quarter_allotment_released'.$counter.'">'.$model->previous_quarter_allotment_released.'</div></td>
			<td><div class="total_this_quarter_allotment_released" id="this_quarter_allotment_released'.$counter.'">'.$model->this_quarter_allotment_released.'</div></td>
			<td><div class="total_total_allotment_released ra" id="total_allotment_released'.$counter.'">'.$model->total_allotment_released.'</div></td>
			<td><div class="total_balance_of_appropriation ra" id="balance_of_appropriation'.$counter.'">'.$model->balance_of_appropriation.'</div></td>
			<td><div class="total_previous_quarter_obligation_incurred ra" id="previous_quarter_obligation_incurred'.$counter.'">'.$model->previous_quarter_obligation_incurred.'</div></td>
			<td><div class="total_this_quarter_obligation_incurred" id="this_quarter_obligation_incurred'.$counter.'">'.$model->this_quarter_obligation_incurred.'</div></td>
			<td><div class="total_total_obligation_incurred ra" id="total_obligation_incurred'.$counter.'">'.$model->total_obligation_incurred.'</div></td>
			<td><div class="total_unobligated_allotment ra" id="unobligated_allotment'.$counter.'">'.$model->unobligated_allotment.'</div></td>
			<td><input id="remarks'.$counter.'" type="text" value="'.$model->remarks.'"></td>';
		}
	?>
	</tr>
    <?php 
		$counter = $counter + 1;
		endforeach; 
	?>
</table>
<center><button onclick="xlsx()">Generate xlsx file</button><button onclick="pdf()">Generate pdf file</button></center>
<?php 
echo '<center><a href="index.php?r=site/downloadxlsx&file='.$models2->quarter.$models2->year.'.xlsx" id="xlsx_file" style="visibility: hidden">Download the xlsx file</a></center>';
echo '<center><a href="index.php?r=site/downloadpdf&file='.$models2->quarter.$models2->year.'.pdf" id="pdf_file" style="visibility: hidden">Download the pdf file</a></center>';
?>
<script>
	function xlsx(){
		$.ajax({
			type: "POST",
			url: "index.php?r=site/generatexlsx",
			data:  {},
			success: function(msg){
				alert('Successfully generated the xlsx file!');
				document.getElementById('xlsx_file').style.visibility="visible";
			},
			error: function(xhr){alert('fail')}
		});
	}
	function pdf(){
		$.ajax({
			type: "POST",
			url: "index.php?r=site/generatepdf",
			data:  {},
			success: function(msg){
				alert('Successfully generated the pdf file!');
				document.getElementById('pdf_file').style.visibility="visible";
			},
			error: function(xhr){alert(JSON.stringify(xhr))}
		});
	}
	function updateContents(){
		$('#xlsx_file').attr('href','index.php?r=site/downloadxlsx&file='+$('#quarter').val()+$('#year').val()+'.xlsx');
		$('#pdf_file').attr('href','index.php?r=site/downloadpdf&file='+$('#quarter').val()+$('#year').val()+'.pdf');
		if($('#year').val()==parseInt($('#yearFromDb').val())+1 && $('#quarter').val()=="March"){
			for(var i=0;i<parseInt("<?php echo $counter;?>");i++){
				if($('#next_year_appropriation'+i).val() == $('#current_appropriation'+i).val()){
					$('#continuing_appropriation'+i).val($('#next_year_appropriation'+i).val());
					$('#current_appropriation'+i).val(parseFloat('0.00').toFixed(2));
					$('#next_year_appropriation'+i).val(parseFloat('0.00').toFixed(2));
				}else{
					$('#current_appropriation'+i).val($('#next_year_appropriation'+i).val());
					$('#continuing_appropriation'+i).val(parseFloat('0.00').toFixed(2));
					$('#next_year_appropriation'+i).val(parseFloat('0.00').toFixed(2));
				}
				var total_appropriation = parseFloat($('#continuing_appropriation'+i).val()) + parseFloat($('#current_appropriation'+i).val());
				var total_allotment_released = parseFloat($('#total_allotment_released'+i).html()).toFixed(2);
				var balance_of_appropriation = (total_appropriation - total_allotment_released).toFixed(2);
				$('#total_appropriation'+i).html(total_appropriation.toFixed(2));
				$('#balance_of_appropriation'+i).html(balance_of_appropriation);
				$('#previous_quarter_allotment_released'+i).val($('#this_quarter_allotment_released'+i).text());
				$('#this_quarter_allotment_released'+i).text(parseFloat('0.00').toFixed(2));
				$('#previous_quarter_obligation_incurred'+i).val($('#this_quarter_obligation_incurred'+i).text());
				$('#this_quarter_obligation_incurred'+i).text(parseFloat('0.00').toFixed(2));
				var total_appropriation = parseFloat($('#total_appropriation'+i).html()).toFixed(2);
				var total_allotment_released = (parseFloat($('#previous_quarter_allotment_released'+i).val())+parseFloat($('#this_quarter_allotment_released'+i).text())).toFixed(2);
				var balance_of_appropriation = (total_appropriation - total_allotment_released).toFixed(2);
				var total_obligation_incurred = (parseFloat($('#this_quarter_obligation_incurred'+i).text())+parseFloat($('#previous_quarter_obligation_incurred'+i).val())).toFixed(2);
				var unobligated_allotment = (total_allotment_released-total_obligation_incurred).toFixed(2);
				$('#total_allotment_released'+i).html(total_allotment_released);
				$('#balance_of_appropriation'+i).html(balance_of_appropriation);
				$('#total_obligation_incurred'+i).html(total_obligation_incurred);
				$('#unobligated_allotment'+i).html(unobligated_allotment);
				$('#ar_current'+i).html('P0.00');
				$('#oi_current'+i).html('P0.00');
			}
		}else{
			if($('#year').val()==parseInt($('#yearFromDb').val()) && (($('#quarter').val()=="June" && $('#quarterFromDb').val()=="March")||($('#quarter').val()=="September" && $('#quarterFromDb').val()=="June")||($('#quarter').val()=="December" && $('#quarterFromDb').val()=="September"))){
				for(var i=0;i<parseInt("<?php echo $counter;?>");i++){
					$('#previous_quarter_allotment_released'+i).val($('#this_quarter_allotment_released'+i).text());
					$('#this_quarter_allotment_released'+i).text(parseFloat('0.00').toFixed(2));
					$('#previous_quarter_obligation_incurred'+i).val($('#this_quarter_obligation_incurred'+i).text());
					$('#this_quarter_obligation_incurred'+i).text(parseFloat('0.00').toFixed(2));
					var total_appropriation = parseFloat($('#total_appropriation'+i).html()).toFixed(2);
					var total_allotment_released = (parseFloat($('#previous_quarter_allotment_released'+i).val())+parseFloat($('#this_quarter_allotment_released'+i).text())).toFixed(2);
					var balance_of_appropriation = (total_appropriation - total_allotment_released).toFixed(2);
					var total_obligation_incurred = (parseFloat($('#this_quarter_obligation_incurred'+i).text())+parseFloat($('#previous_quarter_obligation_incurred'+i).val())).toFixed(2);
					var unobligated_allotment = (total_allotment_released-total_obligation_incurred).toFixed(2);
					$('#total_allotment_released'+i).html(total_allotment_released);
					$('#balance_of_appropriation'+i).html(balance_of_appropriation);
					$('#total_obligation_incurred'+i).html(total_obligation_incurred);
					$('#unobligated_allotment'+i).html(unobligated_allotment);
					$('#ar_current'+i).html('P0.00');
					$('#oi_current'+i).html('P0.00');
				}
				
			} 
		}
			$.ajax({
				type: "POST",
				url: "index.php?r=quarterYear/updatequarteryear",
				data:  {"quarter":$('#quarter').val(),"year":$('#year').val()},
				success: function(msg){
					$('#yearFromDb').val($('#year').val());
					$('#quarterFromDb').val($('#quarter').val());
				},
				error: function(xhr){}
			});
	}
	$(document).ready(function(){
		$('#quarter').val("<?php echo $models2->quarter?>");
		$('#year').val("<?php echo $models2->year?>");
		$('.ar_release_date').datepicker();
		$('.oi_release_date').datepicker();
		$(this).click(function(event){
			var element_id = event.target.id;
			$('#'+element_id).keyup(function(){
				if(element_id.indexOf('continuing_appropriation')!=-1){
					var element_number = element_id.split('continuing_appropriation');
					var total_appropriation = parseFloat($(this).val()).toFixed(2);
					var total_allotment_released = parseFloat($('#total_allotment_released'+element_number[1]).html()).toFixed(2);
					var balance_of_appropriation = (total_appropriation - total_allotment_released).toFixed(2);
					$('#total_appropriation'+element_number[1]).html(total_appropriation);
					$('#current_appropriation'+element_number[1]).val(parseFloat('0.00').toFixed(2));
					$('#balance_of_appropriation'+element_number[1]).html(balance_of_appropriation);
					
					$.ajax({
					  type: "POST",
					  url: "index.php?r=quarterlyFinancialReport/updateappropriation&id="+$('#id'+element_number[1]).val(),
					  data:  {"continuing_appropriation":parseFloat($(this).val()).toFixed(2),"current_appropriation":parseFloat('0.00').toFixed(2),"total_appropriation":total_appropriation,"balance_of_appropriation":balance_of_appropriation},
					  success: function(msg){},
					  error: function(xhr){}
					});
					$.ajax({
						type: 'POST',
						url: 'index.php?r=quarterlyAllotmentObligation/updateallotmentobligation&id='+$('#id'+element_number[1]).val(),
						data:  {"continuing_appropriation":$('#continuing_appropriation'+element_number[1]).val(),"current_appropriation":$('#current_appropriation'+element_number[1]).val(),"implementing_unit":$('#implementing_unit'+element_number[1]).val(),'mfo_ppas':$('#mfo_ppas'+element_number[1]).html(),'year':$('#year').val()},
						success: function(msg){},
						error: function(xhr){}
					});

					if(element_number[1]>=0 && element_number[1]<15){
						var total_personal_services_continuing_appropriation = parseFloat('0.00');
						var total_personal_services_current_appropriation = parseFloat('0.00');
						for(var i=0; i<15; i++){
							total_personal_services_continuing_appropriation = total_personal_services_continuing_appropriation+parseFloat($('#continuing_appropriation'+i).val());
							total_personal_services_current_appropriation = total_personal_services_current_appropriation+parseFloat($('#current_appropriation'+i).val());
						}
						var total_personal_services_total_appropriation = total_personal_services_continuing_appropriation + total_personal_services_current_appropriation;
						$('#continuing_appropriation15').html(total_personal_services_continuing_appropriation.toFixed(2));
						$('#current_appropriation15').html(total_personal_services_current_appropriation.toFixed(2));
						$('#total_appropriation15').html(total_personal_services_total_appropriation.toFixed(2));
						var total_personal_services_balance_of_appropriation = parseFloat($('#total_appropriation15').html()).toFixed(2) - parseFloat($('#total_allotment_released15').html()).toFixed(2);
						$('#balance_of_appropriation15').html(total_personal_services_balance_of_appropriation.toFixed(2));
					}

					var i=element_number[1];
					var total_continuing_appropriation = 0;
					var total_current_appropriation = 0;
					while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf("total")==-1){
						total_continuing_appropriation = parseFloat($('#continuing_appropriation'+i).val()) + total_continuing_appropriation;
						total_current_appropriation = parseFloat($('#current_appropriation'+i).val()) + total_current_appropriation;
						i--;
					}
					var dummy = i;
					i=element_number[1];
					while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf("total")==-1){
						total_continuing_appropriation = parseFloat($('#continuing_appropriation'+i).val()) + total_continuing_appropriation;
						total_current_appropriation = parseFloat($('#current_appropriation'+i).val()) + total_current_appropriation;
						i++;
					}
					total_continuing_appropriation = total_continuing_appropriation - parseFloat($('#continuing_appropriation'+element_number[1]).val())
					total_current_appropriation = total_current_appropriation - parseFloat($('#current_appropriation'+element_number[1]).val())
					total_total_appropriation = total_continuing_appropriation + total_current_appropriation;
					total_total_allotment_released = parseFloat($('#total_allotment_released'+element_number[1]).html());
					total_balance_of_appropriation = total_total_appropriation - total_total_allotment_released;
					$('#continuing_appropriation'+i).html(total_continuing_appropriation.toFixed(2));
					$('#current_appropriation'+i).html(total_current_appropriation.toFixed(2));
					$('#total_appropriation'+i).html(total_total_appropriation.toFixed(2));
					$('#balance_of_appropriation'+i).html(total_balance_of_appropriation.toFixed(2));
					if(($('#mfo_ppas'+(i+1)).html()).toLowerCase().indexOf("total brought forward")>-1){
						$('#continuing_appropriation'+(i+1)).html(total_continuing_appropriation.toFixed(2));
						$('#current_appropriation'+(i+1)).html(total_current_appropriation.toFixed(2));
						$('#total_appropriation'+(i+1)).html(total_total_appropriation.toFixed(2));
						$('#balance_of_appropriation'+(i+1)).html(total_balance_of_appropriation.toFixed(2));
					}

					var i=element_number[1];
					var total_continuing_appropriation = 0;
					var total_current_appropriation = 0;
					while(($('#mfo_ppas'+i).html()).toLowerCase() != "total"){
						continuing_appropriation = parseFloat($('#continuing_appropriation'+i).val());
						current_appropriation = parseFloat($('#current_appropriation'+i).val());
						if(isNaN(continuing_appropriation)){
							continuing_appropriation = 0;
						}
						if(isNaN(current_appropriation)){
							current_appropriation = 0;
						}
						total_continuing_appropriation =  continuing_appropriation + total_continuing_appropriation;
						total_current_appropriation =  current_appropriation + total_current_appropriation;
						i--;
						if(i==0) break;
					}
					i=element_number[1];
					while(($('#mfo_ppas'+i).html()).toLowerCase() != "total"){
						continuing_appropriation = parseFloat($('#continuing_appropriation'+i).val());
						current_appropriation = parseFloat($('#current_appropriation'+i).val());
						if(isNaN(continuing_appropriation)){
							continuing_appropriation = 0;
						}
						if(isNaN(current_appropriation)){
							current_appropriation = 0;
						}
						total_continuing_appropriation =  continuing_appropriation + total_continuing_appropriation;
						total_current_appropriation =  current_appropriation + total_current_appropriation;
						i++;
					}
					total_continuing_appropriation = total_continuing_appropriation - parseFloat($('#continuing_appropriation'+element_number[1]).val())
					total_current_appropriation = total_current_appropriation - parseFloat($('#current_appropriation'+element_number[1]).val())
					
					$('#continuing_appropriation'+i).html(total_continuing_appropriation.toFixed(2));
					$('#current_appropriation'+i).html(total_current_appropriation.toFixed(2));
					
					
				} else if(element_id.indexOf('current_appropriation')!=-1){
					var element_number = element_id.split('current_appropriation');
					var total_appropriation = parseFloat($(this).val()).toFixed(2)
					var total_allotment_released = parseFloat($('#total_allotment_released'+element_number[1]).html()).toFixed(2);
					var balance_of_appropriation = (total_appropriation - total_allotment_released).toFixed(2);
					$('#total_appropriation'+element_number[1]).html(total_appropriation);
					$('#continuing_appropriation'+element_number[1]).val(parseFloat('0.00').toFixed(2));
					$('#balance_of_appropriation'+element_number[1]).html(balance_of_appropriation);

					if(element_number[1]>=0 && element_number[1]<15){
						var total_personal_services_continuing_appropriation = parseFloat('0.00');
						var total_personal_services_current_appropriation = parseFloat('0.00');
						for(var i=0; i<15; i++){
							total_personal_services_continuing_appropriation = total_personal_services_continuing_appropriation+parseFloat($('#continuing_appropriation'+i).val());
							total_personal_services_current_appropriation = total_personal_services_current_appropriation+parseFloat($('#current_appropriation'+i).val());
						}
						var total_personal_services_total_appropriation = total_personal_services_continuing_appropriation + total_personal_services_current_appropriation;
						$('#continuing_appropriation15').html(total_personal_services_continuing_appropriation.toFixed(2));
						$('#current_appropriation15').html(total_personal_services_current_appropriation.toFixed(2));
						$('#total_appropriation15').html(total_personal_services_total_appropriation.toFixed(2));
						var total_personal_services_balance_of_appropriation = parseFloat($('#total_appropriation15').html()).toFixed(2) - parseFloat($('#total_allotment_released15').html()).toFixed(2);
						$('#balance_of_appropriation15').html(total_personal_services_balance_of_appropriation.toFixed(2));
					}
					
					
					$.ajax({
					  type: "POST",
					  url: "index.php?r=quarterlyFinancialReport/updateappropriation&id="+$('#id'+element_number[1]).val(),
					  data:  {"current_appropriation":parseFloat($(this).val()).toFixed(2),"continuing_appropriation":parseFloat('0.00').toFixed(2),"total_appropriation":total_appropriation,"balance_of_appropriation":balance_of_appropriation},
					  success: function(msg){},
					  error: function(xhr){}
					});
					
					$.ajax({
						type: 'POST',
						url: 'index.php?r=quarterlyAllotmentObligation/updateallotmentobligation&id='+$('#id'+element_number[1]).val(),
							data:  {"continuing_appropriation":$('#continuing_appropriation'+element_number[1]).val(),"current_appropriation":$('#current_appropriation'+element_number[1]).val(),"implementing_unit":$('#implementing_unit'+element_number[1]).val(),'mfo_ppas':$('#mfo_ppas'+element_number[1]).html(),'year':$('#year').val()},
						success: function(msg){},
						error: function(xhr){}
					});

					var i=element_number[1];
					var total_continuing_appropriation = 0;
					var total_current_appropriation = 0;
					while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf("total")==-1){
						total_continuing_appropriation = parseFloat($('#continuing_appropriation'+i).val()) + total_continuing_appropriation;
						total_current_appropriation = parseFloat($('#current_appropriation'+i).val()) + total_current_appropriation;
						i--;
					}
					i=element_number[1];
					while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf("total")==-1){
						total_continuing_appropriation = parseFloat($('#continuing_appropriation'+i).val()) + total_continuing_appropriation;
						total_current_appropriation = parseFloat($('#current_appropriation'+i).val()) + total_current_appropriation;
						i++;
					}
					total_continuing_appropriation = total_continuing_appropriation - parseFloat($('#continuing_appropriation'+element_number[1]).val())
					total_current_appropriation = total_current_appropriation - parseFloat($('#current_appropriation'+element_number[1]).val())
					total_total_appropriation = total_continuing_appropriation + total_current_appropriation;
					total_total_allotment_released = parseFloat($('#total_allotment_released'+element_number[1]).html());
					total_balance_of_appropriation = total_total_appropriation - total_total_allotment_released;
					$('#continuing_appropriation'+i).html(total_continuing_appropriation.toFixed(2));
					$('#current_appropriation'+i).html(total_current_appropriation.toFixed(2));
					$('#total_appropriation'+i).html(total_total_appropriation.toFixed(2));
					$('#balance_of_appropriation'+i).html(total_balance_of_appropriation.toFixed(2));
					if(($('#mfo_ppas'+(i+1)).html()).toLowerCase().indexOf("total brought forward")>-1){
						$('#continuing_appropriation'+(i+1)).html(total_continuing_appropriation.toFixed(2));
						$('#current_appropriation'+(i+1)).html(total_current_appropriation.toFixed(2));
						$('#total_appropriation'+(i+1)).html(total_total_appropriation.toFixed(2));
						$('#balance_of_appropriation'+(i+1)).html(total_balance_of_appropriation.toFixed(2));
					}	

					var i=element_number[1];
					var total_continuing_appropriation = 0;
					var total_current_appropriation = 0;
					while(($('#mfo_ppas'+i).html()).toLowerCase() != "total"){
						continuing_appropriation = parseFloat($('#continuing_appropriation'+i).val());
						current_appropriation = parseFloat($('#current_appropriation'+i).val());
						if(isNaN(continuing_appropriation)){
							continuing_appropriation = 0;
						}
						if(isNaN(current_appropriation)){
							current_appropriation = 0;
						}
						total_continuing_appropriation =  continuing_appropriation + total_continuing_appropriation;
						total_current_appropriation =  current_appropriation + total_current_appropriation;
						i--;
						if(i==0) break;
					}
					i=element_number[1];
					while(($('#mfo_ppas'+i).html()).toLowerCase() != "total"){
						continuing_appropriation = parseFloat($('#continuing_appropriation'+i).val());
						current_appropriation = parseFloat($('#current_appropriation'+i).val());
						if(isNaN(continuing_appropriation)){
							continuing_appropriation = 0;
						}
						if(isNaN(current_appropriation)){
							current_appropriation = 0;
						}
						total_continuing_appropriation =  continuing_appropriation + total_continuing_appropriation;
						total_current_appropriation =  current_appropriation + total_current_appropriation;
						i++;
					}
					total_continuing_appropriation = total_continuing_appropriation - parseFloat($('#continuing_appropriation'+element_number[1]).val())
					total_current_appropriation = total_current_appropriation - parseFloat($('#current_appropriation'+element_number[1]).val())
					
					$('#continuing_appropriation'+i).html(total_continuing_appropriation.toFixed(2));
					$('#current_appropriation'+i).html(total_current_appropriation.toFixed(2));
				} else if(element_id.indexOf('previous_quarter_allotment_released')!=-1){
					var element_number = element_id.split('previous_quarter_allotment_released');
					var total_appropriation = parseFloat($('#total_appropriation'+element_number[1]).html()).toFixed(2);
					var total_allotment_released = (parseFloat($(this).val())+parseFloat($('#this_quarter_allotment_released'+element_number[1]).text())).toFixed(2);
					var balance_of_appropriation = (total_appropriation - total_allotment_released).toFixed(2);
					var total_obligation_incurred = (parseFloat($('#this_quarter_obligation_incurred'+element_number[1]).text())+parseFloat($('#previous_quarter_obligation_incurred'+element_number[1]).val())).toFixed(2);
					var unobligated_allotment = (total_allotment_released-total_obligation_incurred).toFixed(2);
					$('#total_allotment_released'+element_number[1]).html(total_allotment_released);
					$('#balance_of_appropriation'+element_number[1]).html(balance_of_appropriation);
					$('#unobligated_allotment'+element_number[1]).html(unobligated_allotment);
										
					if(element_number[1]>=0 && element_number[1]<15){
						var total_personal_services_previous_quarter_allotment_released = parseFloat('0.00');
						var total_personal_services_this_quarter_allotment_released = parseFloat('0.00');
						for(var i=0; i<15; i++){
							total_personal_services_previous_quarter_allotment_released = total_personal_services_previous_quarter_allotment_released+parseFloat($('#previous_quarter_allotment_released'+i).val());
							total_personal_services_this_quarter_allotment_released = total_personal_services_this_quarter_allotment_released+parseFloat($('#this_quarter_allotment_released'+i).text());
						}
						var total_personal_services_total_allotment_released = total_personal_services_previous_quarter_allotment_released + total_personal_services_this_quarter_allotment_released;
						$('#previous_quarter_allotment_released15').html(total_personal_services_previous_quarter_allotment_released.toFixed(2));
						$('#this_quarter_allotment_released15').html(total_personal_services_this_quarter_allotment_released.toFixed(2));
						$('#total_allotment_released15').html(total_personal_services_total_allotment_released.toFixed(2));
						var total_personal_services_balance_of_appropriation = parseFloat($('#total_appropriation15').html()).toFixed(2) - parseFloat($('#total_allotment_released15').html()).toFixed(2);
						$('#balance_of_appropriation15').html(total_personal_services_balance_of_appropriation.toFixed(2));
						var total_personal_services_unobligated_allotment = total_personal_services_total_allotment_released - parseFloat($('#total_obligation_incurred15').html());
						$('#unobligated_allotment15').html(total_personal_services_unobligated_allotment.toFixed(2));
					}

					$.ajax({
					  type: "POST",
					  url: "index.php?r=quarterlyFinancialReport/updateallotment&id="+$('#id'+element_number[1]).val(),
					  data:  {"previous_quarter_allotment_released":parseFloat($(this).val()).toFixed(2),"this_quarter_allotment_released":parseFloat($('#this_quarter_allotment_released'+element_number[1]).text()).toFixed(2),"total_allotment_released":total_allotment_released,"balance_of_appropriation":balance_of_appropriation,"unobligated_allotment":unobligated_allotment},
					  success: function(msg){},
					  error: function(xhr){}
					});

					var i=element_number[1];
					var total_previous_quarter_allotment_released = 0;
					while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf("total")==-1){
						total_previous_quarter_allotment_released = parseFloat($('#previous_quarter_allotment_released'+i).val()) + total_previous_quarter_allotment_released;
						i--;
					}
					i=element_number[1];
					while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf("total")==-1){
						total_previous_quarter_allotment_released = parseFloat($('#previous_quarter_allotment_released'+i).val()) + total_previous_quarter_allotment_released;
						i++;
					}
					total_previous_quarter_allotment_released = total_previous_quarter_allotment_released - parseFloat($('#previous_quarter_allotment_released'+element_number[1]).val())
					total_this_quarter_allotment_released = parseFloat($('#this_quarter_allotment_released'+i).html())
					total_total_allotment_released = total_previous_quarter_allotment_released + total_this_quarter_allotment_released
					total_total_appropriation = parseFloat($('#total_appropriation'+i).html());
					total_balance_of_appropriation = total_total_appropriation - total_total_allotment_released;
					total_total_obligation_incurred = parseFloat($('#total_obligation_incurred'+i).html());
					total_unobligated_allotment = total_total_allotment_released-total_total_obligation_incurred;
					$('#previous_quarter_allotment_released'+i).html(total_previous_quarter_allotment_released.toFixed(2));
					$('#total_allotment_released'+i).html(total_total_allotment_released.toFixed(2));
					$('#balance_of_appropriation'+i).html(total_balance_of_appropriation.toFixed(2));
					$('#unobligated_allotment'+i).html(total_unobligated_allotment.toFixed(2));

					if(($('#mfo_ppas'+(i+1)).html()).toLowerCase().indexOf("total brought forward")>-1){
						$('#previous_quarter_allotment_released'+(i+1)).html(total_previous_quarter_allotment_released.toFixed(2));
						$('#total_allotment_released'+(i+1)).html(total_total_allotment_released.toFixed(2));
						$('#balance_of_appropriation'+(i+1)).html(total_balance_of_appropriation.toFixed(2));
						$('#unobligated_allotment'+(i+1)).html(total_unobligated_allotment.toFixed(2));
					}	

					var i=element_number[1];
					var total_previous_quarter_allotment_released = 0;
					while(($('#mfo_ppas'+i).html()).toLowerCase() != "total"){
						previous_quarter_allotment_released = parseFloat($('#previous_quarter_allotment_released'+i).val());
						if(isNaN(previous_quarter_allotment_released)){
							previous_quarter_allotment_released = 0;
						}
						total_previous_quarter_allotment_released =  previous_quarter_allotment_released + total_previous_quarter_allotment_released;
						i--;
						if(i==0) break;
					}
					i=element_number[1];
					while(($('#mfo_ppas'+i).html()).toLowerCase() != "total"){
						previous_quarter_allotment_released = parseFloat($('#previous_quarter_allotment_released'+i).val());
						if(isNaN(previous_quarter_allotment_released)){
							previous_quarter_allotment_released = 0;
						}
						total_previous_quarter_allotment_released =  previous_quarter_allotment_released + total_previous_quarter_allotment_released;
						i++;
					}
					total_previous_quarter_allotment_released = total_previous_quarter_allotment_released - parseFloat($('#previous_quarter_allotment_released'+element_number[1]).val())
					total_this_quarter_allotment_released = parseFloat($('#this_quarter_allotment_released'+i).html())
					total_total_allotment_released = total_previous_quarter_allotment_released + total_this_quarter_allotment_released
					total_total_appropriation = parseFloat($('#total_appropriation'+i).html());
					total_balance_of_appropriation = total_total_appropriation - total_total_allotment_released;
					total_total_obligation_incurred = parseFloat($('#total_obligation_incurred'+i).html());
					total_unobligated_allotment = total_total_allotment_released-total_total_obligation_incurred;
					$('#previous_quarter_allotment_released'+i).html(total_previous_quarter_allotment_released.toFixed(2));
					$('#total_allotment_released'+i).html(total_total_allotment_released.toFixed(2));
					$('#balance_of_appropriation'+i).html(total_balance_of_appropriation.toFixed(2));
					$('#unobligated_allotment'+i).html(total_unobligated_allotment.toFixed(2));
				} else if(element_id.indexOf('previous_quarter_obligation_incurred')!=-1){
					var element_number = element_id.split('previous_quarter_obligation_incurred');
					var total_allotment_released = parseFloat($('#total_allotment_released'+element_number[1]).html()).toFixed(2);
					var total_obligation_incurred = (parseFloat($(this).val())+parseFloat($('#this_quarter_obligation_incurred'+element_number[1]).text())).toFixed(2);
					var unobligated_allotment = (total_allotment_released-total_obligation_incurred).toFixed(2);
					$('#total_obligation_incurred'+element_number[1]).html(total_obligation_incurred);
					$('#unobligated_allotment'+element_number[1]).html(unobligated_allotment);
					
					if(element_number[1]>=0 && element_number[1]<15){
						var total_personal_services_previous_quarter_obligation_incurred = parseFloat('0.00');
						var total_personal_services_this_quarter_obligation_incurred = parseFloat('0.00');
						for(var i=0; i<15; i++){
							total_personal_services_previous_quarter_obligation_incurred = total_personal_services_previous_quarter_obligation_incurred+parseFloat($('#previous_quarter_obligation_incurred'+i).val());
							total_personal_services_this_quarter_obligation_incurred = total_personal_services_this_quarter_obligation_incurred+parseFloat($('#this_quarter_obligation_incurred'+i).text());
						}
						var total_personal_services_total_obligation_incurred = total_personal_services_previous_quarter_obligation_incurred + total_personal_services_this_quarter_obligation_incurred;
						$('#previous_quarter_obligation_incurred15').html(total_personal_services_previous_quarter_obligation_incurred.toFixed(2));
						$('#this_quarter_obligation_incurred15').html(total_personal_services_this_quarter_obligation_incurred.toFixed(2));
						$('#total_obligation_incurred15').html(total_personal_services_total_obligation_incurred.toFixed(2));
						
						var total_personal_services_unobligated_allotment = parseFloat($('#total_allotment_released15').html()).toFixed(2) - parseFloat($('#total_obligation_incurred15').html()).toFixed(2);
						$('#unobligated_allotment15').html(total_personal_services_unobligated_allotment.toFixed(2));
					}
					
					$.ajax({
					  type: "POST",
					  url: "index.php?r=quarterlyFinancialReport/updateobligation&id="+$('#id'+element_number[1]).val(),
					  data:  {"previous_quarter_obligation_incurred":parseFloat($(this).val()).toFixed(2),"this_quarter_obligation_incurred":parseFloat($('#this_quarter_obligation_incurred'+element_number[1]).text()).toFixed(2),"total_obligation_incurred":total_obligation_incurred,"unobligated_allotment":unobligated_allotment},
					  success: function(msg){},
					  error: function(xhr){}
					});

					var i=element_number[1];
					var total_previous_quarter_obligation_incurred = 0;
					while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf("total")==-1){
						total_previous_quarter_obligation_incurred = parseFloat($('#previous_quarter_obligation_incurred'+i).val()) + total_previous_quarter_obligation_incurred;
						i--;
					}
					i=element_number[1];
					while(($('#mfo_ppas'+i).html()).toLowerCase().indexOf("total")==-1){
						total_previous_quarter_obligation_incurred = parseFloat($('#previous_quarter_obligation_incurred'+i).val()) + total_previous_quarter_obligation_incurred;
						i++;
					}
					total_previous_quarter_obligation_incurred = total_previous_quarter_obligation_incurred - parseFloat($('#previous_quarter_obligation_incurred'+element_number[1]).val())
					total_this_quarter_obligation_incurred = parseFloat($('#this_quarter_obligation_incurred'+i).html())
					total_total_obligation_incurred = total_previous_quarter_obligation_incurred + total_this_quarter_obligation_incurred
					total_total_allotment_released = parseFloat($('#total_allotment_released'+i).html());
					total_unobligated_allotment = total_total_allotment_released-total_total_obligation_incurred;
					$('#previous_quarter_obligation_incurred'+i).html(total_previous_quarter_obligation_incurred.toFixed(2));
					$('#total_obligation_incurred'+i).html(total_total_obligation_incurred.toFixed(2));
					$('#unobligated_allotment'+i).html(total_unobligated_allotment.toFixed(2));
					if(($('#mfo_ppas'+(i+1)).html()).toLowerCase().indexOf("total brought forward")>-1){
						$('#previous_quarter_obligation_incurred'+(i+1)).html(total_previous_quarter_obligation_incurred.toFixed(2));
						$('#total_obligation_incurred'+(i+1)).html(total_total_obligation_incurred.toFixed(2));
						$('#unobligated_allotment'+(i+1)).html(total_unobligated_allotment.toFixed(2));
					}	

					var i=element_number[1];
					var total_previous_quarter_obligation_incurred = 0;
					while(($('#mfo_ppas'+i).html()).toLowerCase() != "total"){
						previous_quarter_obligation_incurred = parseFloat($('#previous_quarter_obligation_incurred'+i).val());
						if(isNaN(previous_quarter_obligation_incurred)){
							previous_quarter_obligation_incurred = 0;
						}
						total_previous_quarter_obligation_incurred =  previous_quarter_obligation_incurred + total_previous_quarter_obligation_incurred;
						i--;
						if(i==0) break;
					}
					i=element_number[1];
					while(($('#mfo_ppas'+i).html()).toLowerCase() != "total"){
						previous_quarter_obligation_incurred = parseFloat($('#previous_quarter_obligation_incurred'+i).val());
						if(isNaN(previous_quarter_obligation_incurred)){
							previous_quarter_obligation_incurred = 0;
						}
						total_previous_quarter_obligation_incurred =  previous_quarter_obligation_incurred + total_previous_quarter_obligation_incurred;
						i++;
					}
					total_previous_quarter_obligation_incurred = total_previous_quarter_obligation_incurred - parseFloat($('#previous_quarter_obligation_incurred'+element_number[1]).val())
					total_this_quarter_obligation_incurred = parseFloat($('#this_quarter_obligation_incurred'+i).html())
					total_total_obligation_incurred = total_previous_quarter_obligation_incurred + total_this_quarter_obligation_incurred
					total_total_allotment_released = parseFloat($('#total_allotment_released'+i).html());
					total_unobligated_allotment = total_total_allotment_released-total_total_obligation_incurred;
					$('#previous_quarter_obligation_incurred'+i).html(total_previous_quarter_obligation_incurred.toFixed(2));
					$('#total_obligation_incurred'+i).html(total_total_obligation_incurred.toFixed(2));
					$('#unobligated_allotment'+i).html(total_unobligated_allotment.toFixed(2));
				} else if(element_id.indexOf('next_year_appropriation')!=-1){
					var element_number = element_id.split('next_year_appropriation');
					$.ajax({
					  type: "POST",
					  url: "index.php?r=quarterlyFinancialReport/updatenextyearappropriation&id="+$('#id'+element_number[1]).val(),
					  data:  {'next_year_appropriation':parseFloat($(this).val()).toFixed(2)},
					  success: function(msg){},
					  error: function(xhr){}
					});
				} else if(element_id.indexOf('remarks')!=-1){
					var element_number = element_id.split('remarks');
					$.ajax({
					  type: "POST",
					  url: "index.php?r=quarterlyFinancialReport/updateremarks&id="+$('#id'+element_number[1]).val(),
					  data:  {'remarks':$(this).val()},
					  success: function(msg){},
					  error: function(xhr){}
					});

					$.ajax({
						type: 'POST',
						url: 'index.php?r=quarterlyAllotmentObligation/updateallotmentobligation&id='+$('#id'+element_number[1]).val(),
						data:  {'remarks':$('#remarks'+element_number[1]).val(),'continuing_appropriation':$('#continuing_appropriation'+element_number[1]).val(),'current_appropriation':$('#current_appropriation'+element_number[1]).val(),'implementing_unit':$('#implementing_unit'+element_number[1]).val(),'mfo_ppas':$('#mfo_ppas'+element_number[1]).html(),'year':$('#year').val(),'quarter':$('#quarter').val()},
						success: function(msg){},
						error: function(xhr){}
					});
				}
			});
		});
	});
</script>
<?php endif; ?>