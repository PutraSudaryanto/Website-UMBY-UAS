<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller
{	
	function _template($view, $data = NULL)
	{
		$this->load->view('layouts/header', $data);
		$this->load->view($view, $data);
		$this->load->view('layouts/footer', $data);
	}

	public function index()
	{
		$data['pageTitle'] = '';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/site/front_index', $data);
	}
}