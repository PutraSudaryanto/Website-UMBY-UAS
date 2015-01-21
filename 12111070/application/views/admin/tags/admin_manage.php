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
				<th>Tag</th>
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
						<td><?php echo $val->tag_name;?></td>
						<td><?php echo $this->Utility->dateFormat($val->creation_date, true);?></td>
						<td class="button-column">
							<?php echo anchor('admin/tags/edit/'.$val->tag_id, 'Perbarui', 'title="Perbarui" class="update"');?>
							<?php echo anchor('admin/tags/delete/'.$val->tag_id, 'Hapus', 'title="Hapus" class="delete"');?>
						</td>
					</tr>
				<?php }
			} else {?>
				<td colspan="4">Belum ada data tag</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>