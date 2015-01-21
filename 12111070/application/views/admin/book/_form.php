<div class="panel panel-default">
	<?php /*
	<div class="panel-heading">
		<h3 class="panel-title">Default form inputs</h3>                
	</div>
	*/?>

	<div class="panel-body">
		<?php echo form_open($form_action, array(
			'class' => 'form-horizontal',
		));?>
			<div class="form-group">
				<?php echo form_label('Judul', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$title = isset($form_data->title) ? $form_data->title : '';
					echo form_input(array(
						'name' => 'Model[title]',
						'value' => $title,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('title'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Sinopsis', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$description = isset($form_data->description) ? $form_data->description : '';
					echo form_textarea(array(
						'name' => 'Model[description]',
						'value' => $description,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('description'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>			
			
			<div class="form-group">
				<?php echo form_label('Tema', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$subject_id = isset($form_data->subject_id) ? $form_data->subject_id : '';
					echo form_dropdown('Model[subject_id]', $form_subject, $subject_id);?>
					<?php echo form_error('subject_id'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Penulis', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$author = isset($form_data->author) ? $form_data->author : '';
					echo form_input(array(
						'name' => 'Model[author]',
						'value' => $author,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('author'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Penerjemah', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$translator = isset($form_data->translator) ? $form_data->translator : '';
					echo form_input(array(
						'name' => 'Model[translator]',
						'value' => $translator,
						'class'=> 'form-control',
					));?>
					<?php echo form_error('translator'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Penerbit', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$publisher_id = isset($form_data->publisher_id) ? $form_data->publisher_id : '';
					echo form_dropdown('Model[publisher_id]', $form_publisher, $publisher_id);?>
					<?php echo form_error('publisher_id'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Tahun Terbit', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$publish_year = isset($form_data->publish_year) ? $form_data->publish_year : '';
					echo form_input(array(
						'name' => 'Model[publish_year]',
						'value' => $publish_year,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('publish_year'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Edisi', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$edition = isset($form_data->edition) ? $form_data->edition : '';
					echo form_input(array(
						'name' => 'Model[edition]',
						'value' => $edition,
						'class'=> 'form-control',
					));?>
					<?php echo form_error('edition'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Halaman', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$paging = isset($form_data->paging) ? $form_data->paging : '';
					echo form_input(array(
						'name' => 'Model[paging]',
						'value' => $paging,
						'class'=> 'form-control',
					));?>
					<?php echo form_error('paging'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Ukuran', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$sizes = isset($form_data->sizes) ? $form_data->sizes : '';
					echo form_input(array(
						'name' => 'Model[sizes]',
						'value' => $sizes,
						'class'=> 'form-control',
					));?>
					<?php echo form_error('sizes'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Publish', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php
					$publish = isset($form_data->publish) ? $form_data->publish : 1;
					echo form_hidden('Model[publish]', 0);
					if($publish == 1)
						echo form_checkbox('Model[publish]', 1, TRUE);
					else
						echo form_checkbox('Model[publish]', 1);?>
					<?php echo form_error('publish'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>			

			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-2">&nbsp;</label>
				<div class="col-sm-10">
					<?php $submit = empty($form_data) ? 'Create' : 'Save';?>
					<input type="submit" value="<?php echo $submit;?>">
				</div>
			</div>
		<?php echo form_close(); ?>	
	</div>
</div>