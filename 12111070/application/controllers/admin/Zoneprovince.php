<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zoneprovince extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
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
		redirect('admin/zoneprovince/manage');
	}

	public function Manage()
	{
		$config['base_url'] = site_url('admin/zoneprovince/manage');
		$config['total_rows'] = $this->ZoneProvinceModel->count_all();
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
			'content' => $this->ZoneProvinceModel->findAll(null, $config['per_page'], $offset),
			'paging' => $this->pagination->create_links(),
		);
		$data['total_rows'] = $config['total_rows'];
		$data['per_page'] = $config['per_page'];
		$data['offset'] = $offset;
		
		$data['contentMenu'] = array(
			'Add Tags' => site_url('admin/zoneprovince/add'),
		);
		
		/* contoh find all condition
		$data['content'] = $this->ZoneProvinceModel->findAll(array(
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
		
		$data['pageTitle'] = 'Kelola Zona Profinsi';
		$data['pageDescription'] = '';
		$data['pageMeta'] = '';
		$this->_template('/admin/zone_province/admin_manage', $data);
	}
}