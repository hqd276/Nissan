<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class ModelSupport extends CI_Model{ 
	private $_name = 'supports';
	function __construct(){ 
		parent::__construct(); 
	} 

	function getSupports($begin,$limit) {
		$query = $this->db->get($this->_name, $limit, $begin);
		return $query->result();
	}

}