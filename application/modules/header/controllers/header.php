<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Header extends MX_Controller{
	
	public function __construct(){
		parent::__construct();

	}
	
	public function index($page = null){
		$this->load->model('admin/modelcategory');

		$categories = $this->modelcategory->getCategories(array('status'=>1));

		$data = array();

		$data['categories'] = $categories;
		$data['page'] = $page;

		$this->load->model(array('admin/modelsetting'));

		$setting = $this->modelsetting->getSetting(null);
		$setting = add_array_key('key',$setting);
		foreach ($setting as $key => $value) {
			$setting[$key]['data'] = json_decode($value['value']);
		}
		$data['setting'] = $setting;

		return $data;

		// $this->template->load_view('header',$data);

		// $this->template->build('header',$data);
	}
	
}
