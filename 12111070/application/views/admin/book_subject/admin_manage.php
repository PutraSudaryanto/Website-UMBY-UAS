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
				<th>Tema</th>
				<th>Deskripsi</th>
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
						<td><?php echo $val->subject;?></td>
						<td><?php echo $val->description;?></td>
						<td><?php echo $this->Utility->dateFormat($val->creation_date, true);?></td>
						<td class="button-column">
							<?php echo anchor('admin/booksubject/edit/'.$val->subject_id, 'Perbarui', 'title="Perbarui" class="update"');?>
							<?php echo anchor('admin/booksubject/delete/'.$val->subject_id, 'Hapus', 'title="Hapus" class="delete"');?>
						</td>
					</tr>
				<?php }
			} else {?>
				<td colspan="5">Belum ada data tema buku</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>