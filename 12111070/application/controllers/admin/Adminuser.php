<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminuser extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('AdminUserModel');
		$this->load->model('AdminGroupModel');
	}
	
	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('template/admin_default', $data);
	}

	public function Index()
	{
		redirect('admin/adminuser/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/adminuser/manage');
		$config['total_rows'] = $this->AdminUserModel->count_all();
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
			'content' => $this->AdminUserModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		/* contoh find all condition
		$data['content'] = $this->AdminUserModel->findAll(array(
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
			'Add User Level' => site_url('admin/adminuser/add'),
		);
		
		$data['pageTitle'] = 'Kelola Admin';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/admin_user/admin_manage', $data);
	}

	public function Add()
	{		
		$data['form_action'] = 'admin/adminuser/add';
		$data['form_group'] = $this->AdminGroupModel->getGroup();
		if(isset($_POST['Model'])) {
			if($this->AdminUserModel->insertData()) {				
				$this->session->set_flashdata('message', 'Admin success created.');
				redirect('admin/adminuser/manage');				
			}
		}
		
		$data['pageTitle'] = 'Tambah Admin';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/admin_user/admin_add', $data);		
	}

	public function Edit($id)
	{
		if(!empty($id)) {		
			$data['form_action'] = 'admin/adminuser/edit/'.$id;
			$data['form_data'] = $this->AdminUserModel->findByPk($id);
			$data['form_group'] = $this->AdminGroupModel->getGroup();
			
			if(isset($_POST['Model'])) {
				if($this->AdminUserModel->updateByPk($id)) {
					$this->session->set_flashdata('message', 'Admin success updated.');
					redirect('admin/adminuser/manage');				
				}
			}
			
			$data['pageTitle'] = 'Perbarui Admin';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/admin_user/admin_edit', $data);
			
		} else {
			redirect('admin/adminuser/manage');
		}
	}

	public function Delete($id)
	{
		if(!empty($id)) {
			$data['form_action'] = 'admin/adminuser/delete/'.$id;
			$data['form_data'] = $this->AdminUserModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->AdminUserModel->deleteByPk($id)) {				
					$this->session->set_flashdata('message', 'Admin success deleted.');
					redirect('admin/adminuser/manage');					
				}
			}
			
			$data['pageTitle'] = 'Hapus Admin';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/admin_user/admin_delete', $data);
			
		} else {
			redirect('admin/adminuser/manage');
		}		
	}
}