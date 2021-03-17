
<style>
	table, th, td{
		border: 1px solid #333;
		border-collapse: collapse;
		text-align:center;
		font-size:20px;
	}
	h6{
		text-align:center;
	}
	input {
		text-align: center;
	}
</style>
<font size="1">LBAc Form No. 2</font>
<h6><b>QUARTERLY FINANCIAL REPORT OF OPERATIONS <br>
For the Quarter Ending <?php 
	echo $models2->quarter;
	if($models2->quarter=="March" || $models2->quarter=="December"){
		echo " 31, ";
	}else{
		echo " 30, ";
	}
	echo $models2->year;

?></b></h6>
<?php if($models != null): ?>
<font size="1">GENERAL FUND 101</font>
<table id="qfr_table">
	<tr><th rowspan="2">IMPLEMENTING<br>UNIT</th>
		<th rowspan="2">MFO/PPAS</th>
		<th colspan="3">APPROPRIATION</th>
		<th colspan="3">ALLOTMENT RELEASED</th>
		<th rowspan="2">BALANCE OF APPROPRIATION</th>
		<th colspan="3">OBLIGATION INCURRED</th>
		<th rowspan="2">UNOBLIGATED ALLOTMENT</th>
		<th rowspan="2">REMARKS</th>
	</tr>	
	<tr>
		<th>CONTINUING</th>
		<th>CURRENT</th>
		<th>TOTAL</th>
		<th>PREVIOUS QUARTER</th>
		<th>THIS QUARTER</th>
		<th>TOTAL</td>
		<th>PREVIOUS QUARTER</th>
		<th>THIS QUARTER</th>
		<th>TOTAL</th>
	</tr>
	
	<?php 
		$counter = 0;
		foreach($models as $model): 
			if($counter==0) echo '<tr><td rowspan="52">Office of the Mayor 1011</td><td><b>Personal Services</b></td><td colspan="12"></td>';
			if($counter==16) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==43) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';

			if($counter==49) echo '<tr><td rowspan="11">Human Resource Mgt Unit 1032</td><td><b>MOOE</td>';
			if($counter==55) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';

			if($counter==58) echo '<tr><td rowspan="10">Office of the Mayor-Purchasing Unit 1011</td><td><b>Personal Services</td>';
			if($counter==60) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==62) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';

			if($counter==65) echo '<tr><td rowspan="5">Office of the Mayor-Los Banos Traffic Mgt. Unit 1013</td><td><b>MOOE</td>';
			
			if($counter==69) echo '<tr><td rowspan="5">Office of the Mayor-Subsidy to DILG Family 1011</td><td><b>MOOE</td>';
			
			if($counter==73) echo '<tr><td rowspan="12">Office of the Mayor-Subsidy to COA Family 1011</td><td><b>MOOE</td>';
			if($counter==79) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';
			
			if($counter==83) echo '<tr><td rowspan="4">Office of the Mayor-Subsidy to COMELEC 1011</td><td><b>MOOE</td>';
			
			if($counter==86) echo '<tr><td rowspan="5">Office of the Mayor-Subsidy to MTC 1011</td><td><b>MOOE</td>';
			
			if($counter==90) echo '<tr><td rowspan="14">Non-Office Expenditures 1999</td><td><b>Personal Services</td>';
			if($counter==92) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==96) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==101) echo '<tr><td rowspan="43">Office of the Vice Mayor 1016</td><td><b>Personal Services</td>';
			if($counter==117) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==136) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==141) echo '<tr><td rowspan="39">Office of the Sanggunian Bayan 1021</td><td><b>Personal Services</td>';
			if($counter==157) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==174) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';	

			if($counter==177) echo '<tr><td rowspan="34">Office of the Sanggunian Bayan Secretary 1022</td><td><b>Personal Services</td>';
			if($counter==194) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==205) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==208) echo '<tr><td rowspan="32">Office of the Municipal Planning and Devt. Coordinator 1041</td><td><b>Personal Services</td>';
			if($counter==224) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==233) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==237) echo '<tr><td rowspan="35">Office of the Municipal Local Civil Registrar 1051</td><td><b>Personal Services</td>';
			if($counter==253) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==266) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==269) echo '<tr><td rowspan="34">Office of the Office of the General Services Officer 1061</td><td><b>Personal Services</td>';
			if($counter==283) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==297) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==300) echo '<tr><td rowspan="33">Office of the Municipal Budget Officer 1071</td><td><b>Personal Services</td>';
			if($counter==315) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==324) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==330) echo '<tr><td rowspan="32">Office of the Municipal Accountant 1081</td><td><b>Personal Services</td>';
			if($counter==347) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==356) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==359) echo '<tr><td rowspan="34">Office of the Municipal Treasurer 1091</td><td><b>Personal Services</td>';
			if($counter==376) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==387) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';			
			
			if($counter==390) echo '<tr><td rowspan="34">Office of the Municipal Assessor 1101</td><td><b>Personal Services</td>';
			if($counter==408) echo '<tr><td><b>Maintenance and Other <br>Operating Expenses</td><td colspan="12"></td>';
			if($counter==417) echo '<tr><td><b>Capital Outlay</td><td colspan="12"></td>';			
			
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

			echo '<tr><td>'.$model->mfo_ppas.'</td>';
			echo '<td>'.$model->continuing_appropriation.'</td>
			<td>'.$model->current_appropriation.'</td>
			<td>'.$model->total_appropriation.'</td>
			<td>'.$model->previous_quarter_allotment_released.'</td>
			<td>'.$model->this_quarter_allotment_released.'</td>
			<td>'.$model->total_allotment_released.'</td>
			<td>'.$model->balance_of_appropriation.'</td>
			<td>'.$model->previous_quarter_obligation_incurred.'</td>
			<td>'.$model->this_quarter_obligation_incurred.'</td>
			<td>'.$model->total_obligation_incurred.'</td>
			<td>'.$model->unobligated_allotment.'</td>
			<td>'.$model->remarks.'</td></tr>'; 
    	
    		if($counter==0) echo '</tr>';
    		if($counter==16) echo '</tr>';
			if($counter==43) echo '</tr>';

			if($counter==49) echo '</tr>';
			if($counter==55) echo '</tr>';

			if($counter==58) echo '</tr>';
			if($counter==60) echo '</tr>';
			if($counter==62) echo '</tr>';

			if($counter==65) echo '</tr>';
			
			if($counter==69) echo '</tr>';
			
			if($counter==73) echo '</tr>';
			if($counter==79) echo '</tr>';
			
			if($counter==83) echo '</tr>';
			
			if($counter==86) echo '</tr>';
			
			if($counter==90) echo '</tr>';
			if($counter==92) echo '</tr>';
			if($counter==96) echo '</tr>';			
			
			if($counter==101) echo '</tr>';
			if($counter==117) echo '</tr>';
			if($counter==136) echo '</tr>';			
			
			if($counter==141) echo '</tr>';
			if($counter==157) echo '</tr>';
			if($counter==174) echo '</tr>';	

			if($counter==177) echo '</tr>';
			if($counter==194) echo '</tr>';
			if($counter==205) echo '</tr>';			
			
			if($counter==208) echo '</tr>';
			if($counter==224) echo '</tr>';
			if($counter==233) echo '</tr>';			
			
			if($counter==237) echo '</tr>';
			if($counter==253) echo '</tr>';
			if($counter==266) echo '</tr>';			
			
			if($counter==269) echo '</tr>';
			if($counter==283) echo '</tr>';
			if($counter==297) echo '</tr>';			
			
			if($counter==300) echo '</tr>';
			if($counter==315) echo '</tr>';
			if($counter==324) echo '</tr>';			
			
			if($counter==330) echo '</tr>';
			if($counter==347) echo '</tr>';
			if($counter==356) echo '</tr>';			
			
			if($counter==359) echo '</tr>';
			if($counter==376) echo '</tr>';
			if($counter==387) echo '</tr>';			
			
			if($counter==390) echo '</tr>';
			if($counter==408) echo '</tr>';
			if($counter==417) echo '</tr>';	
		$counter = $counter + 1;
		if($counter == 100) break;
		endforeach; 
	?>
</table>
<?php endif;?>
