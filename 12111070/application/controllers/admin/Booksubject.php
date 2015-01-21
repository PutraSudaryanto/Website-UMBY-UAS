<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booksubject extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('BookSubjectModel');
	}
	
	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('template/admin_default', $data);
	}

	public function Index()
	{
		redirect('admin/booksubject/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/booksubject/manage');
		$config['total_rows'] = $this->BookSubjectModel->count_all();
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
			'content' => $this->BookSubjectModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		$data['contentMenu'] = array(
			'Add Tags' => site_url('admin/booksubject/add'),
		);
		
		/* contoh find all condition
		$data['content'] = $this->BookSubjectModel->findAll(array(
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
		$this->_template('/admin/book_subject/admin_manage', $data);
	}

	public function Add()
	{		
		$data['form_action'] = 'admin/booksubject/add';
		
		if(isset($_POST['Model'])) {
			if($this->BookSubjectModel->insertData()) {				
				$this->session->set_flashdata('message', 'News Category success created.');
				redirect('admin/booksubject/manage');				
			}
		}
		
		$data['pageTitle'] = 'Tambah Tema Buku';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/book_subject/admin_add', $data);		
	}

	public function Edit($id)
	{
		if(!empty($id)) {		
			$data['form_action'] = 'admin/booksubject/edit/'.$id;
			$data['form_data'] = $this->BookSubjectModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->BookSubjectModel->updateByPk($id)) {
					$this->session->set_flashdata('message', 'News Category success updated.');
					redirect('admin/booksubject/manage');				
				}
			}
			
			$data['pageTitle'] = 'Perbarui Tema Buku';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/book_subject/admin_edit', $data);
			
		} else {
			redirect('admin/booksubject/manage');
		}
	}

	public function Delete($id)
	{
		if(!empty($id)) {
			$data['form_action'] = 'admin/booksubject/delete/'.$id;
			$data['form_data'] = $this->BookSubjectModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->BookSubjectModel->deleteByPk($id)) {				
					$this->session->set_flashdata('message', 'News Category success deleted.');
					redirect('admin/booksubject/manage');					
				}
			}
			
			$data['pageTitle'] = 'Hapus Tema Buku';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/book_subject/admin_delete', $data);
			
		} else {
			redirect('admin/booksubject/manage');
		}		
	}
}