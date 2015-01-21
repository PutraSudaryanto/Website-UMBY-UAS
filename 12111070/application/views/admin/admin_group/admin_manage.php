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
				<th>Grup</th>
				<th>Keterangan</th>
				<th>Tanggal Buat</th>
				<th>Publish</th>
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
						<td><?php echo $val->group_name;?></td>
						<td><?php echo $val->group_desc;?></td>
						<td class="center"><?php echo $this->Utility->dateFormat($val->creation_date, true);?></td>
						<td class="center"><?php echo $this->Utility->getPublish($val->publish);?></td>
						<td class="button-column">
							<?php echo anchor('admin/admingroup/edit/'.$val->group_id, 'Perbarui', 'title="Perbarui" class="update"');?>
							<?php echo anchor('admin/admingroup/delete/'.$val->group_id, 'Hapus', 'title="Hapus" class="delete"');?>
						</td>
					</tr>
				<?php }
			} else {?>
				<td colspan="6">Belum ada data admin grup</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>