<?php 
if($content->cover != '')
	$media = base_url('public/'.$content->cover);
else
	$media = base_url('public/default.png');
?>
<div class="artcl-main float-width">
	<div class="artcl-prev-nxt float-width">
	</div>
	<div class="artcl-body float-width">
		<h2><?php echo $content->title;?></h2>
		<h5><span><i class="fa fa-user"></i>John Doe</span><span><i class="fa fa-clock-o"></i><?php echo $this->Utility->dateFormat($content->creation_date);?></span></h5>
		<article class="float-width articl-data"><img alt="" src="<?php echo $this->Utility->getTimThumb($media, 740, 355, 1);?>"/>
		<table style="margin: 20px 0 0 0;">
			<tr>
				<td style="padding: 5px 20px 5px 0; font-weight: bold; width: 200px;">Tema</td>
				<td><?php echo $this->BookSubjectModel->findByPk($content->subject_id)->subject;?></td>
			</tr>
			<tr>
				<td style="padding: 5px 20px 5px 0; font-weight: bold; width: 200px;">Sinopsis</td>
				<td><?php echo $content->description != '' ? $content->description : '-';?></td>
			</tr>
			<tr>
				<td style="padding: 5px 20px 5px 0; font-weight: bold; width: 200px;">Penulis</td>
				<td><?php echo $content->author != '' ? $content->author : '-';?></td>
			</tr>
			<tr>
				<td style="padding: 5px 20px 5px 0; font-weight: bold; width: 200px;">Penerjemah</td>
				<td><?php echo $content->translator != '' ? $content->translator : '-';?></td>
			</tr>
			<tr>
				<td style="padding: 5px 20px 5px 0; font-weight: bold; width: 200px;">Penerbit</td>
				<td><?php echo $this->BookPublisherModel->findByPk($content->publisher_id)->publisher;?></td>
			</tr>
			<tr>
				<td style="padding: 5px 20px 5px 0; font-weight: bold; width: 200px;">Tahun Terbit</td>
				<td><?php echo $content->publish_year != '' ? $content->publish_year : '-';?></td>
			</tr>
			<tr>
				<td style="padding: 5px 20px 5px 0; font-weight: bold; width: 200px;">Edisi</td>
				<td><?php echo $content->edition != '' ? $content->edition : '-';?></td>
			</tr>
			<tr>
				<td style="padding: 5px 20px 5px 0; font-weight: bold; width: 200px;">Halaman</td>
				<td><?php echo $content->paging != '' ? $content->paging : '-';?></td>
			</tr>
			<tr>
				<td style="padding: 5px 20px 5px 0; font-weight: bold; width: 200px;">Ukuran</td>
				<td><?php echo $content->sizes != '' ? $content->sizes : '-';?></td>
			</tr>
		</table>
		</article>
	</div>
</div>