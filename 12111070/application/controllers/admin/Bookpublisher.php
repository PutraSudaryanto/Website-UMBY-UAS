<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookpublisher extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('BookPublisherModel');
		$this->load->model('ZoneCityModel');
	}
	
	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('template/admin_default', $data);
	}

	public function Index()
	{
		redirect('admin/bookpublisher/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/bookpublisher/manage');
		$config['total_rows'] = $this->BookPublisherModel->count_all();
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
			'content' => $this->BookPublisherModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		$data['contentMenu'] = array(
			'Add Tags' => site_url('admin/bookpublisher/add'),
		);
		
		/* contoh find all condition
		$data['content'] = $this->BookPublisherModel->findAll(array(
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
		
		$data['pageTitle'] = 'Kelola Penerbit Buku';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/book_publisher/admin_manage', $data);
	}

	public function Add()
	{		
		$data['form_action'] = 'admin/bookpublisher/add';
		$data['form_city'] = $this->ZoneCityModel->getCity();
		if(isset($_POST['Model'])) {
			if($this->BookPublisherModel->insertData()) {				
				$this->session->set_flashdata('message', 'News Category success created.');
				redirect('admin/bookpublisher/manage');				
			}
		}
		
		$data['pageTitle'] = 'Tambah Penerbit Buku';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/book_publisher/admin_add', $data);		
	}

	public function Edit($id)
	{
		if(!empty($id)) {		
			$data['form_action'] = 'admin/bookpublisher/edit/'.$id;
			$data['form_data'] = $this->BookPublisherModel->findByPk($id);
			$data['form_city'] = $this->ZoneCityModel->getCity();
			
			if(isset($_POST['Model'])) {
				if($this->BookPublisherModel->updateByPk($id)) {
					$this->session->set_flashdata('message', 'News Category success updated.');
					redirect('admin/bookpublisher/manage');				
				}
			}
			
			$data['pageTitle'] = 'Perbarui Penerbit Buku';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/book_publisher/admin_edit', $data);
			
		} else {
			redirect('admin/bookpublisher/manage');
		}
	}

	public function Delete($id)
	{
		if(!empty($id)) {
			$data['form_action'] = 'admin/bookpublisher/delete/'.$id;
			$data['form_data'] = $this->BookPublisherModel->findByPk($id);
			
			if(isset($_POST['Model'])) {
				if($this->BookPublisherModel->deleteByPk($id)) {				
					$this->session->set_flashdata('message', 'News Category success deleted.');
					redirect('admin/bookpublisher/manage');					
				}
			}
			
			$data['pageTitle'] = 'Hapus Penerbit Buku';
			$data['pageDescription'] = '';
			$data['pageMeta'] = '';
			$this->_template('/admin/book_publisher/admin_delete', $data);
			
		} else {
			redirect('admin/bookpublisher/manage');
		}		
	}
}