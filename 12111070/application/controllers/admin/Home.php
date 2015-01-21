<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('AdminUserModel');
	}

	function _template($view, $data = NULL)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('template/admin_default', $data);
	}
	
	public function index()
	{
		$data['pageTitle'] = 'Dashboard';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/home/admin_index', $data);
	}
	
	public function login()
	{
		if(isset($_POST['LoginFormAdmin'])) {
			//print_r($_POST['LoginFormAdmin']);
			$username = $_POST['LoginFormAdmin']['username'];
			$password = $_POST['LoginFormAdmin']['password'];
			
			$result = $this->AdminUserModel->login($username, $password);
			//print_r($result);
			//exit();
			if($result) {
				$sess_array = array();
				foreach($result as $key => $row) {
					$sess_array[$key] = $row;
				}
				//print_r($sess_array);
				$this->session->set_userdata('logged_in', $sess_array);
				redirect('admin/home/index');
			} else {
				redirect('admin/home/login');
			}
		}
		
		$data['pageTitle'] = 'Masuk';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/home/admin_login', $data);
	}

	public function logout()
	{
		//remove all session data
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('admin/home/login');
	}
}