<?php 
	$data = array(
		$data['form_action'] = $form_action,
		$data['form_data'] = $form_data,
		$data['form_publisher'] = $form_publisher,
		$data['form_subject'] = $form_subject,
	);
	$this->load->view('/admin/book/_form', $data);
?>