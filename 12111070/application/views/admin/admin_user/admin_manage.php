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
				<th>Nama</th>
				<th>Username</th>
				<th>Email</th>
				<th>Created Date</th>
				<th>Enable</th>
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
						<td><?php echo $this->AdminGroupModel->findByPk($val->group_id)->group_name;?></td>
						<td><?php echo $val->displayname;?></td>
						<td><?php echo $val->username;?></td>
						<td><?php echo $val->email;?></td>
						<td class="center"><?php echo $this->Utility->dateFormat($val->creation_date, true);?></td>
						<td class="center"><?php echo $this->Utility->getPublish($val->enabled);?></td>
						<td class="button-column">
							<?php echo anchor('admin/adminuser/edit/'.$val->admin_id, 'Perbarui', 'title="Perbarui" class="update"');?>
							<?php echo anchor('admin/adminuser/delete/'.$val->admin_id, 'Hapus', 'title="Hapus" class="delete"');?>
						</td>
					</tr>
				<?php }
			} else {?>
				<td colspan="8">Belum ada data admin user</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>