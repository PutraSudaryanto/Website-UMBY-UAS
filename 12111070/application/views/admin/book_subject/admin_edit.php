<?php 
	$data = array(
		$data['form_action'] = $form_action,
		$data['form_data'] = $form_data,
	);
	$this->load->view('/admin/book_subject/_form', $data);
?>