<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admingroup extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('AdminGroupModel');
	}
	
	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('template/admin_default', $data);
	}

	public function Index()
	{
		redirect('admin/admingroup/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/admingroup/manage');
		$config['total_rows'] = $this->AdminGroupModel->count_all();
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
			'content' => $this->AdminGroupModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		/* contoh find all condition
		$data['content'] = $this->AdminGroupModel->findAll(array(
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
		
		$data['contentMenu'] = array(
			'Add User Level' => site_url('admin/admingroup/add'),
		);
		
		$data['pageTitle'] = 'Kelola Admin Group';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/admin_group/admin_manage', $data);
	}

	public function Add()
	{		
		$data['form_action'] = 'admin/admingroup/add';
		if(isset($_POST['Model'])) {
			if($this->AdminGroupModel->insertData()) {				
				$this->session->set_flashdata('message', 'Admin Group success created.');
				redirect('admin/admingroup/manage');				
			}
		}
		
		$data['pageTitle'] = 'Tambah Admin Group';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/admin_group/admin_add', $data);		
	}

	public function Edit($id)
	{
		if(!empty($id)) {		
			$data['form_action'] = 'admin/admingroup/edit/'.$id;
			$data['form_data'] = $this->AdminGroupModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->AdminGroupModel->updateByPk($id)) {
					$this->session->set_flashdata('message', 'Admin Group success updated.');
					redirect('admin/admingroup/manage');				
				}
			}
			
			$data['pageTitle'] = 'Perbarui Admin Group';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/admin_group/admin_edit', $data);
			
		} else {
			redirect('admin/admingroup/manage');
		}
	}

	public function Delete($id)
	{
		if(!empty($id)) {
			$data['form_action'] = 'admin/admingroup/delete/'.$id;
			$data['form_data'] = $this->AdminGroupModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->AdminGroupModel->deleteByPk($id)) {				
					$this->session->set_flashdata('message', 'Admin Group success deleted.');
					redirect('admin/admingroup/manage');					
				}
			}
			
			$data['pageTitle'] = 'Hapus Admin Group';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/admin_group/admin_delete', $data);
			
		} else {
			redirect('admin/admingroup/manage');
		}		
	}
}