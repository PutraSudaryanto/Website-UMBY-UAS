<?php
class AdminGroupModel extends CI_Model 
{
	var $_table;
        
	function __construct()
	{
		parent::__construct();
		$this->_table = '12111070_admin_group';
	}
	
	function findAll($condition=null, $limit=null, $offset=null)
	{
		if($condition == null) {
			//primary key
			$this->db->order_by('group_id', 'desc');
			
		} else {
			if(!empty($condition['select']))
				$this->db->select($condition['select']);
			if(!empty($condition['condition']))
				$this->db->where($condition['condition']);
			//primary key
			if(empty($condition['order']))
				$this->db->order_by('group_id', 'desc'); 
			else {
				foreach($condition['order'] as $key => $val)
					$this->db->order_by($key, strtolower($val)); 
			}
		}
		if($this->uri->segment(3) == 'manage' && $this->uri->segment(4) == null) {
			$this->db->limit($limit, $offset);
		} else {
			if($limit != null && $offset != null)
				$this->db->limit($limit, $offset);
		}
			
		$model = $this->db->get($this->_table);
		return $model->result();
	}
	
	function find($condition=null)
	{
		if(!empty($condition['select']))
			$this->db->select($condition['select']);
		if(!empty($condition['condition']))
			$this->db->where($condition['condition']);
		//primary key
		if(empty($condition['order']))
			$this->db->order_by('group_id', 'desc'); 
		else {
			foreach($condition['order'] as $key => $val)
				$this->db->order_by($key, strtolower($val)); 
		}
		$this->db->limit(1);
		$model = $this->db->get($this->_table);
		return $model->row();
	}
	
	function findByPk($id, $condition=null)
	{
		if(!empty($condition['select']))
			$this->db->select($condition['select']);
		//primary key
		$this->db->where('group_id', $id);
		$model = $this->db->get($this->_table);
		return $model->row();
	}
	
	function count_all()
	{
		$model = $this->db->count_all($this->_table);
		return $model;
	}
	
	function insertData()
	{
		$data = $_POST['Model'];
		$data['creation_date'] = date('Y-m-d H:i:s');
		return $this->db->insert($this->_table, $data);
	}
	
	function updateByPk($id, $attr)
	{
		if(!empty($attr)) {
			foreach($attr as $key => $val)
				$data[$key] = $val;
		} else {
			$data = $_POST['Model'];			
			$data['modified_date'] = date('Y-m-d H:i:s');
		}
		//primary key
		$this->db->where('group_id', $id);
		return $this->db->update($this->_table, $data);
	}
	
	function deleteByPk($id)
	{
		//primary key
		$this->db->where('group_id', $id);
		return $this->db->delete($this->_table);
	}
	
	/* Other Function */
	function getGroup($publish=null)
	{
		if($publish == null) {
			$model = $this->findAll();
		} else {
			$model = $this->findAll(array(
				'condition' => array(
					'publish' => $publish,
				),		
			));
		}
		$items = array();
		if($model != null) {
			foreach($model as $key => $val) {
				$items[$val->group_id] = $val->group_name;
			}
			return $items;
		} else {
			return false;
		}
	}
	
}
?>