
<style>
	table, th, td{
		border: 1px solid #333;
		text-align:center;
	}
	input {
		text-align: center;
	}
</style>
<center><b><h3>OBLIGATION INCURRED TRANSACTIONS</h3></center>
<?php if($models == null): ?>
<table>
	<tr><td>There are no transactions.</td></tr>
</table>

<?php else: ?>
<table id="ar_table">
	<tr>
		<th>IMPLEMENTING UNIT</th>
		<th>MFO/PPAS</th>
		<th>DESCRIPTION</th>
		<th>RELEASE DATE</th>
		<th>AMOUNT</th>
	</tr>
	<?php foreach($models as $model): ?>
	<tr>
		<td><?php echo $model->implementing_unit;?></td>
		<td><?php echo $model->mfo_ppas;?></td>
		<td><?php echo $model->description;?></td>
		<td><?php echo $model->release_date;?></td>
		<td><?php echo $model->amount;?></td>
	</tr>
	<?php endforeach; ?>
</table>
<?php endif; ?>