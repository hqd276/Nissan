<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Right extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index($type = 0){
		$this->load->model('admin/modelcategory');
		$this->load->model('admin/modelnews');

		$data = array();
		$hot_news = $this->modelnews->getNews(array('hot_news'=>1,'status'=>1),'LIMIT 0,5','id DESC');
		$data['hot_news'] = $hot_news;

		$top_views_news = $this->modelnews->getNews(array('status'=>1),'LIMIT 0,5','views DESC');
		$data['top_views_news'] = $top_views_news;

		return $data;
	}
	
}
