<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('BookModel');
		$this->load->model('BookSubjectModel');
		$this->load->model('BookPublisherModel');
	}
	
	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('template/admin_default', $data);
	}

	public function Index()
	{
		redirect('admin/book/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/book/manage');
		$config['total_rows'] = $this->BookModel->count_all();
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
			'content' => $this->BookModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		/* contoh find all condition
		$data['content'] = $this->BookModel->findAll(array(
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
			'Add User Level' => site_url('admin/book/add'),
		);
		
		$data['pageTitle'] = 'Kelola Admin';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/book/admin_manage', $data);
	}

	public function View($id)
	{		
		if(!empty($id)) {
			$data['content'] = $this->BookModel->findByPk($id);
			
			$data['pageTitle'] = 'Detail Buku';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/book/admin_view', $data);
			
		} else {
			redirect('admin/book/manage');
		}
	}

	public function Add()
	{		
		$data['form_action'] = 'admin/book/add';
		$data['form_publisher'] = $this->BookPublisherModel->getPublisher();
		$data['form_subject'] = $this->BookSubjectModel->getSubject();
		
		if(isset($_POST['Model'])) {
			if($this->BookModel->insertData()) {				
				$this->session->set_flashdata('message', 'Admin success created.');
				redirect('admin/book/manage');				
			}
		}
		
		$data['pageTitle'] = 'Tambah Admin';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/book/admin_add', $data);		
	}

	public function Edit($id)
	{
		if(!empty($id)) {		
			$data['form_action'] = 'admin/book/edit/'.$id;
			$data['form_data'] = $this->BookModel->findByPk($id);
			$data['form_publisher'] = $this->BookPublisherModel->getPublisher();
			$data['form_subject'] = $this->BookSubjectModel->getSubject();
			
			if(isset($_POST['Model'])) {
				if($this->BookModel->updateByPk($id)) {
					$this->session->set_flashdata('message', 'Admin success updated.');
					redirect('admin/book/manage');				
				}
			}
			
			$data['pageTitle'] = 'Perbarui Admin';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/book/admin_edit', $data);
			
		} else {
			redirect('admin/book/manage');
		}
	}

	public function Delete($id)
	{
		if(!empty($id)) {
			$data['form_action'] = 'admin/book/delete/'.$id;
			$data['form_data'] = $this->BookModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->BookModel->deleteByPk($id)) {				
					$this->session->set_flashdata('message', 'Admin success deleted.');
					redirect('admin/book/manage');					
				}
			}
			
			$data['pageTitle'] = 'Hapus Admin';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/book/admin_delete', $data);
			
		} else {
			redirect('admin/book/manage');
		}		
	}
}