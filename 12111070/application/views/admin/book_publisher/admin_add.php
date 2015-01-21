<?php
	$data = array(
		$data['form_action'] = $form_action,
		$data['form_city'] = $form_city,
	);
	$this->load->view('/admin/book_publisher/_form', $data);
?>