<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class ModelProduct extends CI_Model{ 
	private $_name = 'product';
	function __construct(){ 
		parent::__construct(); 
	} 

	function getProduct($where,$limit = null,$order = null) {
		$strWhere = "";
		if (is_array($where)) {
			foreach ($where as $key => $value) {
				$strWhere .= " AND $key = $value";
			}
		}
		$strLimit = "";
		if ($limit!=null) 
			$strLimit = $limit;

		$strOrder = "";
		if ($order!=null) 
			$strOrder = " ORDER BY ".$order; 

		$query = $this->db->query("SELECT * FROM $this->_name WHERE 1=1 $strWhere $strOrder $strLimit ");
		return $query->result_array();
	}

	function insertProduct($data) {
		return $this->db->insert($this->_name, $data); 
	}
	function updateProduct($id,$data) {
		$this->db->where('id', $id);
		return $this->db->update($this->_name, $data); 
	}
	function updateProductBy($key,$value,$data) {
		$this->db->where($key, $value);
		return $this->db->update($this->_name, $data); 
	}

	function getProductById($id){
		$query = $this->db->query("SELECT * FROM $this->_name WHERE id = ".$id);
		return $query->row_array();
	}
	function getProductBy($str,$key){
		if (is_numeric($str))
			$query = $this->db->query("SELECT * FROM $this->_name WHERE ".$key." = ".$str);
		else 
			$query = $this->db->query("SELECT * FROM $this->_name WHERE ".$key." like '".$str."'");
		return $query->row_array();
	}
}