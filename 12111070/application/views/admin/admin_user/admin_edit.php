<?php 
	$data = array(
		$data['form_action'] = $form_action,
		$data['form_data'] = $form_data,
		$data['form_group'] = $form_group,
	);
	$this->load->view('/admin/admin_user/_form', $data);
?>