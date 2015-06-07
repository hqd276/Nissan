<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Left extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index($type = 0){
		$this->load->model('admin/modelcategory');
		$this->load->model('admin/modelnews');

		$data = array();

		return $data;
	}
	
}
