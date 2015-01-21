<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('ContactModel');
	}
	
	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('template/admin_default', $data);
	}

	public function Index()
	{
		redirect('admin/contact/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/contact/manage');
		$config['total_rows'] = $this->ContactModel->count_all();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		if($page != 0)
			$offset = $config['per_page']*($page-1);
		else
			$offset = $page;
		
		$data = array(
			'content' => $this->ContactModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		$data['contentMenu'] = array(
			'Add Tags' => site_url('admin/contact/add'),
		);
		
		/* contoh find all condition
		$data['content'] = $this->ContactModel->findAll(array(
			'select' => 'publish',
			'condition' => array(
				'publish' => 0,
				'parent' => 1,
			),
			'order' => array(
				'cat_id' => 'desc',
			),
		));
		*/
		
		$data['pageTitle'] = 'Kelola Tema Buku';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/contact/admin_manage', $data);
	}

	public function Delete($id)
	{
		if(!empty($id)) {
			$data['form_action'] = 'admin/contact/delete/'.$id;
			$data['form_data'] = $this->ContactModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->ContactModel->deleteByPk($id)) {				
					$this->session->set_flashdata('message', 'News Category success deleted.');
					redirect('admin/contact/manage');					
				}
			}
			
			$data['pageTitle'] = 'Hapus Tema Buku';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/contact/admin_delete', $data);
			
		} else {
			redirect('admin/contact/manage');
		}		
	}
}