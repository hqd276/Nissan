<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class ModelAdvert extends CI_Model{ 
	private $_name = 'advert';
	function __construct(){ 
		parent::__construct(); 
	} 

	function getAdverts($where = null,$limit = null) {
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

	function insertAdvert($data) {
		return $this->db->insert($this->_name, $data); 
	}
	function updateAdvert($id,$data) {
		$this->db->where('id', $id);
		return $this->db->update($this->_name, $data); 
	}

	function getAdvertById($id){
		$query = $this->db->query("SELECT * FROM $this->_name WHERE id = ".$id);
		return $query->row_array();
	}

}