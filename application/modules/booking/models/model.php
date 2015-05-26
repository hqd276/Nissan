<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Model extends CI_Model{ 
	private $_name = 'booking';
	function __construct(){ 
		parent::__construct(); 
	} 

	function insertBooking($data) {
		return $this->db->insert($this->_name, $data); 
	}

}