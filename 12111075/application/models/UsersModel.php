<?php
class UsersModel extends CI_Model 
{
	var $_table;
        
	function __construct()
	{
		parent::__construct();
		$this->_table = '12111075_users';
	}
	
	function findAll($limit=10, $offset=0, $condition=null)
	{
		if($condition == null) {
			//primary key
			$this->db->order_by('user_id', 'desc');
			
		} else {
			if(!empty($condition['select']))
				$this->db->select($condition['select']);
			if(!empty($condition['condition']))
				$this->db->where($condition['condition']);
			//primary key
			if(!empty($condition['order']))
				$this->db->order_by('user_id', 'desc'); 
			else {
				foreach($condition['order'] as $key => $val)
					$this->db->order_by($key, strtolower($val)); 
			}
		}
		$this->db->limit($limit, $offset);
			
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
		if(!empty($condition['order']))
			$this->db->order_by('user_id', 'desc'); 
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
		$this->db->where('user_id', $id);
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
		if($_POST['password'] != '') {
			$salt = $data['salt'] = $this->getUniqueCode();
			$data['password'] = $this->hashPassword($salt, $_POST['password']);
		}
		return $this->db->insert($this->_table, $data);
	}
	
	function updateByPk($id)
	{
		$data = $_POST['Model'];
		if($_POST['password'] != '') {
			$salt = $this->findByPk($id)->salt;
			$data['password'] = $this->hashPassword($salt, $_POST['password']);
		}
		//primary key
		$this->db->where('user_id', $id);
		return $this->db->update($this->_table, $data);
	}
	
	function deleteByPk($id)
	{
		//primary key
		$this->db->where('user_id', $id);
		return $this->db->delete($this->_table);
	}
	
	/* Other Function */
	function getUniqueCode() {
		$chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		srand((double)microtime()*1000000);
		$i = 0;
		$salt = '' ;

		while ($i <= 15) {
			$num = rand() % 33;
			$tmp = substr($chars, $num, 2);
			$salt = $salt . $tmp; 
			$i++;
		}

		return $salt;
	}
	
	function hashPassword($salt, $password)
	{
		return md5($salt.$password);
	}
	
}
?>