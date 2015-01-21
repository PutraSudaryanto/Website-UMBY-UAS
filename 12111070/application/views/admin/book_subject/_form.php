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
				<?php echo form_label('Tema', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$subject = isset($form_data->subject) ? $form_data->subject : '';
					echo form_input(array(
						'name' => 'Model[subject]',
						'value' => $subject,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('subject'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Deskripsi', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$description = isset($form_data->description) ? $form_data->description : '';
					echo form_textarea	(array(
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
				<label class="col-sm-2 control-label" for="field-2">&nbsp;</label>
				<div class="col-sm-10">
					<?php $submit = empty($form_data) ? 'Create' : 'Save';?>
					<input type="submit" value="<?php echo $submit;?>">
				</div>
			</div>
		<?php echo form_close(); ?>	
	</div>
</div>