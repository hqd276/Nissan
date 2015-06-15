<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends MX_Controller {
	public function __construct(){
		parent::__construct();

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->library(array('form_validation'));

		$data = Modules::run('header','home');
		$this->template->set_partial('header','header',$data );
		$this->template->set_partial('footer','footer',$data);
	}
	
	public function index(){
		$data = array();
		$data['page'] = 'map';

		$this->template->build('map',$data);
	}
	
}