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
				<?php echo form_label('Nama Grup', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$group_name = isset($form_data->group_name) ? $form_data->group_name : '';
					echo form_input(array(
						'name' => 'Model[group_name]',
						'value' => $group_name,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('group_name'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Keterangan Grup', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php
					$group_desc = isset($form_data->group_desc) ? $form_data->group_desc : '';
					echo form_textarea(array(
						'name' => 'Model[group_desc]',
						'value' => $group_desc,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('group_desc'); ?>
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