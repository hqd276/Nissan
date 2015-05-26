<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class ModelBooking extends CI_Model{ 
	private $_name = 'booking';
	function __construct(){ 
		parent::__construct(); 
	} 

	function getBookings($begin,$limit) {
		$query = $this->db->get($this->_name, $limit, $begin);
		return $query->result();
	}

}