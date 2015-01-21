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
				<th>Profinsi</th>
				<th>Kota</th>
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
						<td><?php echo $this->ZoneProvinceModel->findByPk($val->province_id)->province;?></td>
						<td><?php echo $val->city;?></td>
					</tr>
				<?php }
			} else {?>
				<td colspan="3">Belum ada data zona kota</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>