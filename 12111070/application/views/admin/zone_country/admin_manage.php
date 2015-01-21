<div class="panel panel-default">
	<?php /*
	<div class="panel-heading">
		<h3 class="panel-title">Table Inside Panel</h3>
	</div>
	*/?>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Negara</th>
				<th>Kode Negara</th>
			</tr>
		</thead>
		<tbody>
			<?php if($content != null) {
				$i = $offset+0;
				foreach($content as $key => $val) {
					$i++;
				?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $val->country;?></td>
						<td><?php echo $val->code;?></td>
					</tr>
				<?php }
			} else {?>
				<td colspan="3">Belum ada data zona negara</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>