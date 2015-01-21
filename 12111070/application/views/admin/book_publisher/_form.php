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
				<?php echo form_label('Penerbit', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$publisher = isset($form_data->publisher) ? $form_data->publisher : '';
					echo form_input(array(
						'name' => 'Model[publisher]',
						'value' => $publisher,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('publisher'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Alamat', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$address = isset($form_data->address) ? $form_data->address : '';
					echo form_textarea(array(
						'name' => 'Model[address]',
						'value' => $address,
						'class'=> 'form-control',
						'required'=> 'true',
					));?>
					<?php echo form_error('address'); ?>
				</div>
			</div>
			<div class="form-group-separator"></div>
			
			<div class="form-group">
				<?php echo form_label('Kota', '', array(
					'class' => 'col-sm-2 control-label',
				)); ?>
				<div class="col-sm-10">
					<?php 
					$city_id = isset($form_data->city_id) ? $form_data->city_id : '';
					echo form_dropdown('Model[city_id]', $form_city, $city_id);?>
					<?php echo form_error('city_id'); ?>
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