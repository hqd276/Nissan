<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$data = Modules::run('header','home');
		$this->template->set_partial('header','header',$data );
		$this->template->set_partial('footer','footer',$data);
	}
	
	public function index($id = 0 ){
		$data = array();
		$data['page'] = 'about';
		$this->load->model(array('admin/modelsetting'));
		switch ($id) {
			case '10':
				$key = 'tragop';
				break;
			case '11':
				$key = 'tuyendung';
				break;
			
			default:
				$key = 'about';
				break;
		}
		$about = $this->modelsetting->getSettingByKey($key);
		$about['data'] = json_decode($about['value']);
		// var_dump($about['data']);die;
		$data['about'] = $about;

		$this->template->build('about',$data);
	}
	
}
