<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$data = Modules::run('header','home');
		$this->template->set_partial('header','header',$data );
		$this->template->set_partial('footer','footer',$data );
	}
	
	public function index(){
		$dataR = Modules::run('right');
		$this->template->set_partial('right','right',$dataR);

		$data = array();
		
		$this->load->model('admin/modelnews');
		$this->load->model('admin/modelbanner');

		$video_news = $this->modelnews->getNews(array('is_video'=>1,'status'=>1),'LIMIT 0,3','id DESC');
		$data['video_news'] = $video_news;

		$this->load->model('admin/modelcategory');
		$categories = $this->modelcategory->getCategories(array('status'=>1));
		foreach ($categories as $key => $value) {
			$list_news = $this->modelnews->getNews(array('category_id'=>$value['id'],'status'=>1),'LIMIT 0,4','id DESC');
			if ($list_news)
				$categories[$key]['list_news'] = $list_news;
			else
				$categories[$key]['list_news'] = array();
		}
		$data['categories'] = $categories;

		$banners = $this->modelbanner->getBanner(array('position'=>0));
		$data['banners'] = $banners;

		$this->template->build('home',$data);
	}
}
