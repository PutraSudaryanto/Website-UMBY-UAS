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
				<th>Judul</th>
				<th>Penulis</th>
				<th>Penerbit</th>
				<th>Tahun Terbit</th>
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
						<td><?php echo $this->BookSubjectModel->findByPk($val->subject_id)->subject;?></td>
						<td><?php echo $val->title;?></td>
						<td><?php echo $val->author;?></td>
						<td><?php echo $this->BookPublisherModel->findByPk($val->publisher_id)->publisher;?></td>
						<td><?php echo $val->publish_year;?></td>
						<td class="center"><?php echo $this->Utility->dateFormat($val->creation_date, true);?></td>
						<td class="center"><?php echo $this->Utility->getPublish($val->publish);?></td>
						<td class="button-column">
							<?php echo anchor('admin/book/view/'.$val->book_id, 'Lihat', 'title="Lihat" class="view"');?>
							<?php echo anchor('admin/book/edit/'.$val->book_id, 'Perbarui', 'title="Perbarui" class="update"');?>
							<?php echo anchor('admin/book/delete/'.$val->book_id, 'Hapus', 'title="Hapus" class="delete"');?>
						</td>
					</tr>
				<?php }
			} else {?>
				<td colspan="9">Belum ada data buku</td>
			<?php }?>
		</tbody>
	</table>
</div>

<?php echo $paging;?>