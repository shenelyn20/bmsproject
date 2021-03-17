
<style>
	table, th, td{
		border: 1px solid #333;
		text-align:center;
	}
	input {
		text-align: center;
	}
</style>
<input type="hidden" id="count" value="<?php echo $count;?>">
<input type="hidden" id="quarterFromDb" value="<?php echo $models2->quarter;?>">
<input type="hidden" id="yearFromDb" value="<?php echo $models2->year;?>">
<center><b>QUARTERLY FINANCIAL REPORT OF OPERATIONS</b></center>
<center><b>For the Quarter Ending</b>
	<select id="quarter" onchange="updateContents();">
		<option value="March" selected>March</option>
		<option value="June">June</option>
		<option value="September">September</option>
		<option value="December">December</option>
	</select>
	<input type="number" id="year" onchange="updateContents();">
	<!--<select id="year" onchange="updateContents();">
		<option value="2014" selected>2014</option>
		<option value="2015">2015</option>
		<option value="2016">2016</option>
	</select>-->
</center>
<?php if($models != null): ?>
<p>GENERAL FUND 101</p>
<table id="qfr_table">
	<tr><th rowspan="3">IMPLEMENTING<br>UNIT</th>
		<th rowspan="3">MFO/PPAS</th>
		<th colspan="3">APPROPRIATION</th>
		<th colspan="3">ALLOTMENT RELEASED</th>
		<th rowspan="3">BALANCE OF<br>APPROPRIATION</th>
		<th colspan="3">OBLIGATION INCURRED</th>
		<th rowspan="3">UNOBLIGATED<br>ALLOTMENT</th>
		<th rowspan="3">REMARKS</th>
	</tr>	
	<tr>
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
	<!--<td rowspan="52">Office of the Mayor 1011</td>
	<td><b>Personal Services</b></td>
	<td colspan="12"></td>-->
	<?php 
		$counter = 0;
		foreach($models as $model): 
				
			/*if($counter==16) echo '<td><b>Maintenance and Other <br>Operating Expenses</b></td><td colspan="12"></td>';
			if($counter==43) echo '<td><b>Capital Outlay</b></td><td colspan="12"></td>';
			if($counter==49) echo '<td rowspan="10">Human Resource Mgt Unit 1032</td><td><b>MOOE</b></td>';
			if($counter==58) echo '<td rowspan="8">Office of the Mayor-Purchasing Unit 1011</td><td><b>Personal Services</b></td>';*/

	?>
	<tr>

	
	<?php 
		//echo '<input type="hidden" id="implementing_unit'.$counter.'" value="'.$model->implementing_unit.'">';
		echo '<td><div>'.$model->implementing_unit.'</div></td>';
		if($model->mfo_ppas == "TOTAL" || $model->mfo_ppas == "Total") echo '<b>';
		echo '<td><div>'.$model->mfo_ppas.'</div>'; 
		echo '<input type="hidden" id="first_quarter_ar'.$counter.'" value="'.$model->first_quarter_ar.'"><input type="hidden" id="second_quarter_ar'.$counter.'" value="'.$model->second_quarter_ar.'"><input type="hidden" id="third_quarter_ar'.$counter.'" value="'.$model->third_quarter_ar.'"><input type="hidden" id="fourth_quarter_ar'.$counter.'" value="'.$model->fourth_quarter_ar.'">';
		echo '<input type="hidden" id="first_quarter_oi'.$counter.'" value="'.$model->first_quarter_oi.'"><input type="hidden" id="second_quarter_oi'.$counter.'" value="'.$model->second_quarter_oi.'"><input type="hidden" id="third_quarter_oi'.$counter.'" value="'.$model->third_quarter_oi.'"><input type="hidden" id="fourth_quarter_oi'.$counter.'" value="'.$model->fourth_quarter_oi.'">';
		echo '<input type="hidden" id="first_quarter_remarks'.$counter.'" value="'.$model->first_quarter_remarks.'"><input type="hidden" id="second_quarter_remarks'.$counter.'" value="'.$model->second_quarter_remarks.'"><input type="hidden" id="third_quarter_remarks'.$counter.'" value="'.$model->third_quarter_remarks.'"><input type="hidden" id="fourth_quarter_remarks'.$counter.'" value="'.$model->fourth_quarter_remarks.'">';
	?>
	</td>
	<?php 
			echo '<td>'.$model->continuing_appropriation.'</td>';
			echo '<td>'.$model->current_appropriation.'</td>';
			echo '<td><div id="total_appropriation'.$counter.'">'.($model->continuing_appropriation + $model->current_appropriation).'</div></td>';
			echo '<td><div id="previous_quarter_allotment_released'.$counter.'"></div></td>';
			echo '<td><div id="this_quarter_allotment_released'.$counter.'"></div></td>';
			echo '<td><div id="total_allotment_released'.$counter.'"></div></td>';
			echo '<td><div id="balance_of_appropriation'.$counter.'"></div></td>';

			echo '<td><div id="previous_quarter_obligation_incurred'.$counter.'"></div></td>';
			echo '<td><div id="this_quarter_obligation_incurred'.$counter.'"></div></td>';
			echo '<td><div id="total_obligation_incurred'.$counter.'"></div></td>';
			echo '<td><div id="unobligated_allotment'.$counter.'"></div></td>';
			echo '<td><div id="remarks'.$counter.'"></div></td>';
	?>
	</tr>
    <?php 
		$counter = $counter + 1;
		endforeach; 
	?>
</table>
<?php 
	if($models3 != null){
		$counter2 = 0;
		foreach($models3 as $model3):
			echo '<input type="hidden" id="pq_ar'.$counter2.'" value="'.$model3->fourth_quarter_ar.'">';
			echo '<input type="hidden" id="pq_oi'.$counter2.'" value="'.$model3->fourth_quarter_oi.'">';
			$counter2 = $counter2 + 1;
		endforeach;
	}else{
		for($i=0;$i<$counter;$i++){
			echo '<input type="hidden" id="pq_ar'.$i.'" value="0.00">';
			echo '<input type="hidden" id="pq_oi'.$i.'" value="0.00">';
		}
	}
else:
	echo '<br><table><tr><td>Sorry there is no history for this quarter.</td></tr></table>';
endif;?>
<script>
	function updateContents(){
		$.ajax({
				type: "POST",
				url: "index.php?r=quarterYear/updatequarteryear2",
				data:  {"quarter":$('#quarter').val(),"year":$('#year').val()},
				success: function(msg){
					$('#yearFromDb').val($('#year').val());
					$('#quarterFromDb').val($('#quarter').val());
					location.reload();
				},
				error: function(xhr){}
			});

	}	
	$(document).ready(function(){
	$('#quarter').val("<?php echo $models2->quarter?>");
	$('#year').val("<?php echo $models2->year?>");
	if($('#quarter').val()=="March"){
		for(var i=0;i<parseInt($('#count').val());i++){
			$('#previous_quarter_allotment_released'+i).html($('#pq_ar'+i).val());
			$('#previous_quarter_obligation_incurred'+i).html($('#pq_oi'+i).val());
		}	
	}
	for(var i=0;i<parseInt($('#count').val());i++){
		if($('#quarter').val()=="March"){
			$('#this_quarter_allotment_released'+i).html($('#first_quarter_ar'+i).val());
			$('#total_allotment_released'+i).html((parseFloat($('#first_quarter_ar'+i).val()) + parseFloat($('#pq_ar'+i).val())).toFixed(2));
			var balance_of_appropriation = (parseFloat($('#total_appropriation'+i).html()) - parseFloat($('#total_allotment_released'+i).html())).toFixed(2);
			$('#balance_of_appropriation'+i).html(balance_of_appropriation);
			$('#this_quarter_obligation_incurred'+i).html($('#first_quarter_oi'+i).val());
			$('#total_obligation_incurred'+i).html((parseFloat($('#first_quarter_oi'+i).val()) + parseFloat($('#pq_oi'+i).val())).toFixed(2));
			var unobligated_allotment = (parseFloat($('#total_allotment_released'+i).html()) - parseFloat($('#total_obligation_incurred'+i).html())).toFixed(2);
			$('#unobligated_allotment'+i).html(unobligated_allotment);
			$('#remarks'+i).html($('#first_quarter_remarks'+i).val());
		} else if($('#quarter').val()=="June"){
			$('#previous_quarter_allotment_released'+i).html($('#first_quarter_ar'+i).val());
			$('#this_quarter_allotment_released'+i).html($('#second_quarter_ar'+i).val());
			$('#total_allotment_released'+i).html((parseFloat($('#first_quarter_ar'+i).val()) + parseFloat($('#second_quarter_ar'+i).val())).toFixed(2));
			var balance_of_appropriation = (parseFloat($('#total_appropriation'+i).html()) - parseFloat($('#total_allotment_released'+i).html())).toFixed(2);
			$('#balance_of_appropriation'+i).html(balance_of_appropriation);
			$('#previous_quarter_obligation_incurred'+i).html($('#first_quarter_oi'+i).val());
			$('#this_quarter_obligation_incurred'+i).html($('#second_quarter_oi'+i).val());
			$('#total_obligation_incurred'+i).html((parseFloat($('#first_quarter_oi'+i).val()) + parseFloat($('#second_quarter_oi'+i).val())).toFixed(2));
			var unobligated_allotment = (parseFloat($('#total_allotment_released'+i).html()) - parseFloat($('#total_obligation_incurred'+i).html())).toFixed(2);
			$('#unobligated_allotment'+i).html(unobligated_allotment);
			$('#remarks'+i).html($('#second_quarter_remarks'+i).val());
		} else if($('#quarter').val()=="September"){
			$('#previous_quarter_allotment_released'+i).html($('#second_quarter_ar'+i).val());
			$('#this_quarter_allotment_released'+i).html($('#third_quarter_ar'+i).val());
			$('#total_allotment_released'+i).html((parseFloat($('#second_quarter_ar'+i).val()) + parseFloat($('#third_quarter_ar'+i).val())).toFixed(2));
			var balance_of_appropriation = (parseFloat($('#total_appropriation'+i).html()) - parseFloat($('#total_allotment_released'+i).html())).toFixed(2);
			$('#balance_of_appropriation'+i).html(balance_of_appropriation);
			$('#previous_quarter_obligation_incurred'+i).html($('#second_quarter_oi'+i).val());
			$('#this_quarter_obligation_incurred'+i).html($('#third_quarter_oi'+i).val());
			$('#total_obligation_incurred'+i).html((parseFloat($('#second_quarter_oi'+i).val()) + parseFloat($('#third_quarter_oi'+i).val())).toFixed(2));
			var unobligated_allotment = (parseFloat($('#total_allotment_released'+i).html()) - parseFloat($('#total_obligation_incurred'+i).html())).toFixed(2);
			$('#unobligated_allotment'+i).html(unobligated_allotment);
			$('#remarks'+i).html($('#third_quarter_remarks'+i).val());
		} else if($('#quarter').val()=="December"){
			$('#previous_quarter_allotment_released'+i).html($('#third_quarter_ar'+i).val());
			$('#this_quarter_allotment_released'+i).html($('#fourth_quarter_ar'+i).val());
			$('#total_allotment_released'+i).html((parseFloat($('#third_quarter_ar'+i).val()) + parseFloat($('#fourth_quarter_ar'+i).val())).toFixed(2));
			var balance_of_appropriation = (parseFloat($('#total_appropriation'+i).html()) - parseFloat($('#total_allotment_released'+i).html())).toFixed(2);
			$('#balance_of_appropriation'+i).html(balance_of_appropriation);
			$('#previous_quarter_obligation_incurred'+i).html($('#third_quarter_oi'+i).val());
			$('#this_quarter_obligation_incurred'+i).html($('#fourth_quarter_oi'+i).val());
			$('#total_obligation_incurred'+i).html((parseFloat($('#third_quarter_oi'+i).val()) + parseFloat($('#fourth_quarter_oi'+i).val())).toFixed(2));
			var unobligated_allotment = (parseFloat($('#total_allotment_released'+i).html()) - parseFloat($('#total_obligation_incurred'+i).html())).toFixed(2);
			$('#unobligated_allotment'+i).html(unobligated_allotment);
			$('#remarks'+i).html($('#fourth_quarter_remarks'+i).val());
		}
	}
});
</script>