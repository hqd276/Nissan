<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Model extends CI_Model{ 
	private $_name = 'supports';
	function __construct(){ 
		parent::__construct(); 
	} 

	function insertSupport($data) {
		return $this->db->insert($this->_name, $data); 
	}

}