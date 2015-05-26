<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class ModelCategory extends CI_Model{ 
	private $_name = 'categories';
	function __construct(){ 
		parent::__construct(); 
	} 

	function getCategories($where = null,$limit = null) {
		$strWhere = "";
		if (is_array($where)) {
			foreach ($where as $key => $value) {
				$strWhere .= " AND $key = $value";
			}
		}
		$strLimit = "";
		if ($limit!=null) 
			$strLimit = $limit;

		$query = $this->db->query("SELECT * FROM $this->_name WHERE 1=1 $strWhere $strLimit ");
		return $query->result_array();
	}

	function insertCategory($data) {
		return $this->db->insert($this->_name, $data); 
	}
	function updateCategory($id,$data) {
		$this->db->where('id', $id);
		return $this->db->update($this->_name, $data); 
	}

	function getCategoryById($id){
		$query = $this->db->query("SELECT * FROM $this->_name WHERE id = ".$id);
		return $query->row_array();
	}
	function getCategoryBy($key,$value){
		if (is_numeric($value)) {
			$strWhere = $key.' = '.$value;
		}else {
			$strWhere = $key." like '".$value."'";
		}
		$query = $this->db->query("SELECT * FROM $this->_name WHERE ".$strWhere);
		return $query->row_array();
	}

}