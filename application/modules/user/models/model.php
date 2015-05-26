<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Model extends CI_Model{ 
	private $_name = 'users';
	function __construct(){ 
		parent::__construct(); 
	} 

	/** 
	* Get all users in DB 
	* @param null 
	* @return array 
	*/ 
	function a_fCheckUser( $a_UserInfo ){ 
		$a_User	=	$this->db->select() 
							->where('email', $a_UserInfo['email']) 
							->where('password', $a_UserInfo['password']) 
							->get($this->_name) ->row_array(); 
					
		if(count($a_User) >0){
		 	return $a_User; 
		} else { 
			return false; 
		} 
	} 

}