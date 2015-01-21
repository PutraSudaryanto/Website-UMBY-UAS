<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zonecity extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('ZoneCityModel');
		$this->load->model('ZoneProvinceModel');
		$this->load->model('ZoneCountryModel');
	}
	
	function _template($view, $data=null)
	{
		$data['content'] = $this->load->view($view, $data, true);
		$this->load->view('template/admin_default', $data);
	}

	public function Index()
	{
		redirect('admin/zonecity/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/zonecity/manage');
		$config['total_rows'] = $this->ZoneCityModel->count_all();
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
			'content' => $this->ZoneCityModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		$data['contentMenu'] = array(
			'Add Tags' => site_url('admin/zonecity/add'),
		);
		
		/* contoh find all condition
		$data['content'] = $this->ZoneCityModel->findAll(array(
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
		
		$data['pageTitle'] = 'Kelola Zona Kota';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/zone_city/admin_manage', $data);
	}
}