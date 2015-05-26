<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$data = Modules::run('header','home');
		$this->template->set_partial('header','header',$data );
		$this->template->set_partial('footer','footer',$data);
	}
	
	public function index(){
		$data = array();
		$data['page'] = 'about';
		$this->load->model(array('admin/modelsetting'));
		$about = $this->modelsetting->getSettingByKey('about');
		$about['data'] = json_decode($about['value']);
		$data['about'] = $about;

		$this->template->build('about',$data);
	}
	
}
