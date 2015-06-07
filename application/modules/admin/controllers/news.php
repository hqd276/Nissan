<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->template->set_partial('header','admin-header');
		$this->template->set_partial('footer','admin-footer');

		$user = $this->session->userdata('user'); 
		if ($user['id']){
			#Tải model 
			$this->load->model(array('modelnews','modelcategory'));

			$this->template->set('user',$user);
		}else{
			redirect(base_url('login'));
		}
		$this->template->set_layout('admin');
	}
	
	public function index($type=0,$page = 1){
		$data = array();
		$data['type'] = $type;

		if($page<1)
			$page=1;
		$item_per_page = 20;
		$begin = ($page-1) * $item_per_page;

		$news = $this->modelnews->getNews(array("type"=>$type)," LIMIT ".$begin.",".($item_per_page+1),"created DESC");
		if (count($news)>0) {
			foreach ($news as $key => $value) {
				$category = $this->modelcategory->getCategoryById($value['category_id']);
				if($category)
					$news[$key]['category'] = $category["name"];
				else
					$news[$key]['category'] = "NISSAN";
			}

		}
		$newer_link = '';
		if(count($news)>$item_per_page){
			$newer_link = base_url().'admin/news/index/0/'.($page+1);
			unset($news[$item_per_page]);
		}
		$older_link = '';
		if ($page>1) {
			$older_link = base_url().'admin/news/index/0/'.($page-1);
		}
		$data['newer_link'] = $newer_link;
		$data['older_link'] = $older_link;
		$data['list'] = $news;
		// var_dump($data['list']);die;

		$this->template->build('listnews',$data);
	}

	public function add($type=0){
		$user = $this->session->userdata('user'); 

		$data = array();
		$data['type'] = $type;
		switch ($type) {
			case 0:
				$data['title'] = 'News';
				break;
			// case 1:
			// 	$data['title'] = 'Theme';
			// 	break;
			// case 2:
			// 	$data['title'] = 'Tour';
			// 	break;
			// case 3:
			// 	$data['title'] = 'Blog';
			// 	break;
			
			default:
				$data['title'] = 'News';
				break;
		}

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->helper(array('util')); 

		$this->load->model(array('modelcategory'));
		$category = $this->modelcategory->getCategories(array("type"=>$type));
		// $category = add_array_key("id",$category);

		$dataC = array('title' =>'',
						'slug' =>'',
						'description' =>'',
						'detail' =>'',
						'info' =>'',
						'tag' =>'',
						'author' =>'',
						'category_id' =>'',
						'created' =>'',
						'hot_news' =>'',
						'home_news' =>'',
						'is_video' =>'',
						'image' =>'',
						'order' =>'',
						'status' =>'');
		
		if ($this->input->post('submit') == "ok") {
			$this->load->library(array('form_validation'));

			$this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|is_unique[news.title]'); 
			$this->form_validation->set_rules('detail', 'Detail', 'required|min_length[5]'); 

			#Kiểm tra điều kiện validate 
			if($this->form_validation->run() == TRUE){ 
				$dataC['title'] = $this->input->post('title'); 
				$dataC['slug'] = safe_title($this->input->post('title')); 
				$dataC['description'] = $this->input->post('description'); 
				$dataC['detail'] = $this->input->post('detail'); 
				$dataC['info'] = $this->input->post('info'); 
				$dataC['tag'] = $this->input->post('tag'); 
				$dataC['author'] = $user['id'];
				$dataC['category_id'] = $this->input->post('category_id'); 
				$dataC['created'] = time();
				$dataC['order'] = $this->input->post('order'); 

				if ($this->input->post('hot_news'))
					$dataC['hot_news'] = 1;
				else 
					$dataC['hot_news'] = 0;

				if ($this->input->post('home_news'))
					$dataC['home_news'] = 1;
				else 
					$dataC['home_news'] = 0;

				if ($this->input->post('is_video'))
					$dataC['is_video'] = 1;
				else 
					$dataC['is_video'] = 0;

				if ($this->input->post('status'))
					$dataC['status'] = 1;
				else 
					$dataC['status'] = 0;

				$dataC['type'] = $type; 

				if (!empty ($_FILES['image'])) {
					$this->load->model(array('Mgallery'));
					$image_data = $this->Mgallery->do_upload("/news/");
					if ($image_data) {
						$dataC['image'] = $image_data["file_name"];
					}
				}
				if ($this->modelnews->insertNews($dataC)){
					$data['b_Check']= true;
					// redirect(base_url('list-category/'.$type));
				}else{
					$data['b_Check']= false;
				}
			} 
		}

		$data['category_box'] = $this->category_box($category, $dataC);

		$data['item'] = $dataC;
		$this->template->build('addnews',$data);
	}
	public function edit($type=0,$id=0){
		$user = $this->session->userdata('user'); 
		$data = array();
		if ($id<=0)
			redirect(base_url('admin/news/index/'.$type));

		$data['type'] = $type;
		$data['title'] = "Edit news";

		$this->load->model(array('modelcategory'));
		$category = $this->modelcategory->getCategories(array("type"=>$type));

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 

		$dataC = $this->modelnews->getNewsById($id);
		
		if ($this->input->post('submit') == "ok") {
			$this->load->library(array('form_validation'));

			$this->form_validation->set_rules('title', 'Title', 'required|min_length[5]'); 
			$this->form_validation->set_rules('detail', 'Detail', 'required|min_length[5]'); 

			#Kiểm tra điều kiện validate 
			if($this->form_validation->run() == TRUE){ 
				$dataC['title'] = $this->input->post('title'); 
				$dataC['slug'] = safe_title($this->input->post('title')); 
				$dataC['description'] = $this->input->post('description'); 
				$dataC['detail'] = $this->input->post('detail'); 
				$dataC['info'] = $this->input->post('info'); 
				$dataC['tag'] = $this->input->post('tag'); 
				// $dataC['author'] = $user['id'];
				$dataC['category_id'] = $this->input->post('category_id'); 
				// $dataC['created'] = time();
				$dataC['order'] = $this->input->post('order'); 

				if ($this->input->post('hot_news'))
					$dataC['hot_news'] = 1;
				else 
					$dataC['hot_news'] = 0;

				if ($this->input->post('home_news'))
					$dataC['home_news'] = 1;
				else 
					$dataC['home_news'] = 0;

				if ($this->input->post('is_video'))
					$dataC['is_video'] = 1;
				else 
					$dataC['is_video'] = 0;

				if ($this->input->post('status'))
					$dataC['status'] = 1;
				else 
					$dataC['status'] = 0;

				$dataC['type'] = $type; 

				if (!empty ($_FILES['image'])) {
					$this->load->model(array('Mgallery'));
					$image_data = $this->Mgallery->do_upload("/news/");
					if ($image_data) {
						$dataC['image'] = $image_data["file_name"];
					}
				}

				if ($this->modelnews->updateNews($id,$dataC)){
					$data['b_Check']= true;
					// redirect(base_url('list-category/'.$type));
				}else{
					$data['b_Check']= false;
				}
			} 
		}
		$data['category_box'] = $this->category_box($category, $dataC);
		$data['item'] = $dataC;

		$this->template->build('addnews',$data);
	}
	public function delete($type=0,$id=0){
		$this->db->delete('news', array('id' => $id)); 
		redirect(base_url('/admin/news/index/'.$type));
	}

	function category_box ($category, $dataC) {
		$category_box = "";
		foreach ($category as $key => $value) {
			if ($value["parent"] == -1) {
				$category_box.= "<option value='".$value['id']."' ";
				$category_box.= ($dataC['category_id'] == $value['id'])?'selected':'';
				$category_box.= ">".$value['name']."</option>";
				// $child = array();
				foreach ($category as $k => $v) {
					if ($v["parent"] == $value["id"]){
						$category_box.= "<option value='".$v['id']."' ";
						$category_box.= ($dataC['category_id'] == $v['id'])?'selected':'';
						$category_box.= "> -- ".$v['name']."</option>";
						// $child[] = $v;
					}
				}
				// $category[$key]["child"]= $child;
			}
		}
		return $category_box;
	}
}
