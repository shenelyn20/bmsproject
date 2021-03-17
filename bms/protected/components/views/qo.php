
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
<input type="hidden" id="quarter" value="<?php echo $models2->year;?>">
<center><b><h3>Year <input type="number" id="year" onchange="updateContents();"> Obligations Incurred</h3></center>
<?php if($models == null): ?>
<table>
	<tr><td>There are no reports.</td></tr>
</table>

<?php else: ?>
<table id="qo_table">
	<tr>
		<th>IMPLEMENTING UNIT</th>
		<th>MFO/PPAS</th>
		<th>1st</th>
		<th>2nd</th>
		<th>3rd</th>
		<th>4th</th>
		<th>Total</th>
	</tr>
	<?php foreach($models as $model): ?>
	<tr>
		<td><?php echo $model->implementing_unit;?></td>
		<td><?php echo $model->mfo_ppas;?></td>
		<td><?php echo number_format($model->first_quarter_oi,2);?></td>
		<td><?php echo number_format($model->second_quarter_oi,2);?></td>
		<td><?php echo number_format($model->third_quarter_oi,2);?></td>
		<td><?php echo number_format($model->fourth_quarter_oi,2);?></td>
		<td><?php echo number_format($model->first_quarter_oi + $model->second_quarter_oi + $model->third_quarter_oi +$model->fourth_quarter_oi,2);?></td>
	</tr>
	<?php endforeach; ?>
</table>

<?php endif; ?>
<script>
	function updateContents(){
		$.ajax({
				type: "POST",
				url: "index.php?r=quarterYear/updatequarteryear3",
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
	});
</script>