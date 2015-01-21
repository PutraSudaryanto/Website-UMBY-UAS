<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('BookModel');
		$this->load->model('BookPublisherModel');
		$this->load->model('BookSubjectModel');
		$this->load->model('ContactModel');
	}
	
	function _template($view, $data = NULL)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('template/front_default', $data);
	}
	
	public function index()
	{
		$data['book'] = $this->BookModel->findAll(array(
			//'select' => 'publish',
			'condition' => array(
				'publish' => 1,
			),
			'order' => array(
				'book_id' => 'desc',
			),
		), 10, 0);
		
		$data['pageTitle'] = 'Home';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/home/front_index', $data);
	}
	
	public function view($id)
	{
		$data['content'] = $this->BookModel->findByPk($id);
		
		$data['pageTitle'] = '';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/home/front_view', $data);
	}
	
	public function search()
	{
		$data['pageTitle'] = 'Pencarian Buku';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/home/front_search', $data);
	}
	
	public function subject()
	{
		$data['subject'] = $this->BookSubjectModel->findAll(array(
			//'select' => 'publish',
			'order' => array(
				'subject_id' => 'desc',
			),
		), 10, 0);
		
		$data['pageTitle'] = 'Tema Buku';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/home/front_index', $data);
	}
	
	public function publisher()
	{
		$data['subject'] = $this->BookPublisherModel->findAll(array(
			//'select' => 'publish',
			'order' => array(
				'publisher_id' => 'desc',
			),
		), 10, 0);
		
		$data['pageTitle'] = 'Penerbit';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/home/front_index', $data);
	}
	
	public function contact()
	{
		$data['form_action'] = 'home/contact';
		
		if(isset($_POST['Model'])) {
			if($this->ContactModel->insertData()) {				
				$this->session->set_flashdata('message', 'Kontak success created.');
				redirect('home/contact');				
			}
		}
		
		$data['pageTitle'] = 'Kontak';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/home/front_contact', $data);
	}
}