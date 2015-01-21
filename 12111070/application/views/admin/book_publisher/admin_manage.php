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
				<th>Penerbit</th>
				<th>Alamat</th>
				<th>Kota</th>
				<th>Created Date</th>
				<th class="button-column">Pilihan</th>
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
						<td><?php echo $val->publisher;?></td>
						<td><?php echo $val->address;?></td>
						<td><?php echo $val->city_id != 0 ? $this->ZoneCityModel->findByPk($val->city_id)->city : '-';?></td>
						<td><?php echo $this->Utility->dateFormat($val->creation_date, true);?></td>
						<td class="button-column">
							<?php echo anchor('admin/bookpublisher/edit/'.$val->publisher_id, 'Perbarui', 'title="Perbarui" class="update"');?>
							<?php echo anchor('admin/bookpublisher/delete/'.$val->publisher_id, 'Hapus', 'title="Hapus" class="delete"');?>
						</td>
					</tr>
				<?php }
			} else {?>
				<td colspan="6">Belum ada data penerbit</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>