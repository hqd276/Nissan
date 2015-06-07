<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Header extends MX_Controller{
	
	public function __construct(){
		parent::__construct();

	}
	
	public function index($page = null){
		$this->load->model('admin/modelcategory');
		$this->load->model('admin/modelnews');
		$this->load->model('admin/modelproduct');

		$data = array();
		$cat_news = array();
		$categories = $this->modelcategory->getCategories(array('status'=>1));
		foreach ($categories as $key => $value) {
			if($value['parent']==3) {
				$cat_news[] = $value;
			}
		}
		$data['cat_news'] = $cat_news;
		$data['categories'] = $categories;

		$products = $this->modelproduct->getProduct();
		$data['products'] = $products;

		$abouts = $this->modelnews->getNews(array('category_id'=>1)); 
		$data['abouts'] = $abouts;

		$consult = $this->modelnews->getNews(array('category_id'=>2)); 
		$data['consult'] = $consult;

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
