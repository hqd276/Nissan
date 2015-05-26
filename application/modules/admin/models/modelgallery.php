<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class ModelGallery extends CI_Model{ 
	private $_name = 'gallery';
	function __construct(){ 
		parent::__construct(); 
	} 

	function getGallery($where,$limit = null,$order = null) {
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

	function insertImage($data) {
		return $this->db->insert($this->_name, $data); 
	}
	function updateImage($id,$data) {
		$this->db->where('id', $id);
		return $this->db->update($this->_name, $data); 
	}

	function getImageById($id){
		$query = $this->db->query("SELECT * FROM $this->_name WHERE id = ".$id);
		return $query->row_array();
	}

}