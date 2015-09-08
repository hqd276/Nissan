<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estimates extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$data = Modules::run('header','home');
		$this->template->set_partial('header','header',$data );
		$this->template->set_partial('footer','footer',$data );
	}
	
	public function index(){
		$data = array();
		$this->load->model('admin/modelproduct');
		$list_product = $this->modelproduct->getProduct(null,null);

		$data['list_product'] = $list_product;

		$pid  = $this->input->get('p');
		$data['p'] = $pid;
		$list_version = array();
		if ($pid) {
			$product = $this->modelproduct->getProductById($pid);
			$list_version = unserialize($product['version']);

		}
		$data['list_version'] = $list_version;

		$version  = $this->input->get('v');
		$data['v'] = $version;

		$location  = $this->input->get('l');
		$data['l'] = $location;

		$this->template->build('estimates',$data);
	}
}
