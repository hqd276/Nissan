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

		$home_news = $this->modelnews->getNews(array('home_news'=>1,'status'=>1),'LIMIT 0,5','id DESC');
		$data['home_news_big'] = $home_news[0];
		unset($home_news[0]);
		$data['home_news'] = $home_news;

		$new_news = $this->modelnews->getNews(array('status'=>1),'LIMIT 0,8','created DESC');
		$new_news_img[] = $new_news[0];
		unset($new_news[0]);
		$new_news_img[] = $new_news[1];
		unset($new_news[1]);
		$data['new_news_img'] = $new_news_img;
		$data['new_news'] = $new_news;

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

		$this->template->build('home',$data);
	}
}
