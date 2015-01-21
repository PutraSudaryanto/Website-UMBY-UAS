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
				<?php echo form_label('Grup', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$group_id = isset($form_data->group_id) ? $form_data->group_id : '';
					echo form_dropdown('Model[group_id]', $form_group, $group_id);?>
					<?php echo form_error('group_id'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Nama', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$displayname = isset($form_data->displayname) ? $form_data->displayname : '';
					echo form_input(array(
						'name' => 'Model[displayname]',
						'value' => $displayname,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('displayname'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Username', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php
					$username = isset($form_data->username) ? $form_data->username : '';
					echo form_input(array(
						'name' => 'Model[username]',
						'value' => $username,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('username'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Email', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php
					$email = isset($form_data->email) ? $form_data->email : '';
					echo form_input(array(
						'name' => 'Model[email]',
						'value' => $email,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('email'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Password', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php
					$password = '';
					echo form_password(array(
						'name' => 'password',
						'value' => $password,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('password'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Enabled', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php
					$enabled = isset($form_data->enabled) ? $form_data->enabled : 1;
					echo form_hidden('Model[enabled]', 0);
					if($enabled == 1)
						echo form_checkbox('Model[enabled]', 1, TRUE);
					else
						echo form_checkbox('Model[enabled]', 1);?>
					<?php echo form_error('enabled'); ?>
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