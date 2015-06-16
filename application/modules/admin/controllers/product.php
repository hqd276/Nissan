<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->template->set_partial('header','admin-header');
		$this->template->set_partial('footer','admin-footer');

		$user = $this->session->userdata('user'); 
		if ($user['id']){
			#Tải model 
			$this->load->model(array('modelproduct'));
			$this->load->model(array('modelcategory'));

			$this->template->set('user',$user);
		}else{
			redirect(base_url('login'));
		}
		$this->template->set_layout('admin');
	}
	
	public function index($page = 1){
		$data = array();
		$type = 1;
		$data['type'] = $type;

		if($page<1)
			$page=1;
		$item_per_page = 20;
		$begin = ($page-1) * $item_per_page;

		$product = $this->modelproduct->getproduct(array("type"=>$type)," LIMIT ".$begin.",".($item_per_page+1),"created DESC");
		if (count($product)>0) {
			foreach ($product as $key => $value) {
				$category = $this->modelcategory->getCategoryById($value['category_id']);
				if($category)
					$product[$key]['category'] = $category["name"];
				else
					$product[$key]['category'] = "NISSAN";
			}

		}
		$newer_link = '';
		if(count($product)>$item_per_page){
			$newer_link = base_url().'admin/product/index/0/'.($page+1);
			unset($product[$item_per_page]);
		}
		$older_link = '';
		if ($page>1) {
			$older_link = base_url().'admin/product/index/0/'.($page-1);
		}
		$data['newer_link'] = $newer_link;
		$data['older_link'] = $older_link;
		$data['list'] = $product;
		// var_dump($data['list']);die;

		$this->template->build('listproduct',$data);
	}

	public function add(){
		$user = $this->session->userdata('user'); 

		$data = array();
		$type = 1;
		$data['type'] = $type;
		switch ($type) {
			case 0:
				$data['title'] = 'product';
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
				$data['title'] = 'product';
				break;
		}

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->helper(array('util')); 

		$dataC = array('title' =>'',
						'slug' =>'',
						'description' =>'',
						'detail' =>'',
						'tag' =>'',
						'price' =>'',
						'author' =>'',
						'created' =>'',
						'hot_product' =>'',
						'home_product' =>'',
						'image' =>'',
						'order' =>'',
						'status' =>'');
		
		if ($this->input->post('submit') == "ok") {
			$this->load->library(array('form_validation'));

			$this->form_validation->set_rules('title', 'Title', 'required|is_unique[product.title]'); 
			$this->form_validation->set_rules('detail', 'Detail', 'required|min_length[5]'); 

			$data['b_Check']= false;
			#Kiểm tra điều kiện validate 
			
			$dataC['title'] = $this->input->post('title'); 
			$dataC['slug'] = safe_title($this->input->post('title')); 
			$dataC['description'] = $this->input->post('description'); 
			$dataC['detail'] = $this->input->post('detail'); 
			$dataC['price'] = $this->input->post('price'); 
			$dataC['tag'] = $this->input->post('tag'); 
			$dataC['author'] = $user['id'];
			$dataC['created'] = time();
			$dataC['order'] = $this->input->post('order'); 

			if ($this->input->post('hot_product'))
				$dataC['hot_product'] = 1;
			else 
				$dataC['hot_product'] = 0;

			if ($this->input->post('home_product'))
				$dataC['home_product'] = 1;
			else 
				$dataC['home_product'] = 0;

			if ($this->input->post('status'))
				$dataC['status'] = 1;
			else 
				$dataC['status'] = 0;

			$dataC['type'] = $type; 

			if($this->form_validation->run() == TRUE){ 
				if (!empty ($_FILES['image'])) {
					$this->load->model(array('Mgallery'));
					$image_data = $this->Mgallery->do_upload("/product/");
					if ($image_data) {
						$dataC['image'] = $image_data["file_name"];
					}
				}

				if ($this->modelproduct->insertproduct($dataC)){
					$data['b_Check']= true;
					// redirect(base_url('list-category/'.$type));
				}
			}

		}


		$data['item'] = $dataC;
		$this->template->build('addproduct',$data);
	}
	public function edit($id=0){
		$user = $this->session->userdata('user'); 
		$data = array();
		if ($id<=0)
			redirect(base_url('admin/product/index/'.$type));
		$type =  1;
		$data['type'] = $type;
		$data['title'] = "Edit product";

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 

		$dataC = $this->modelproduct->getproductById($id);
		
		if ($this->input->post('submit') == "ok") {
			$this->load->library(array('form_validation'));

			$this->form_validation->set_rules('title', 'Title', 'required'); 
			$this->form_validation->set_rules('detail', 'Detail', 'required|min_length[5]'); 

			$data['b_Check']= false;
			#Kiểm tra điều kiện validate 
			
			$dataC['title'] = $this->input->post('title'); 
			$dataC['slug'] = safe_title($this->input->post('title')); 
			$dataC['description'] = $this->input->post('description'); 
			$dataC['detail'] = $this->input->post('detail'); 
			$dataC['price'] = $this->input->post('price'); 
			$dataC['tag'] = $this->input->post('tag'); 
			// $dataC['author'] = $user['id'];
			// $dataC['created'] = time();
			$dataC['order'] = $this->input->post('order'); 

			if ($this->input->post('hot_product'))
				$dataC['hot_product'] = 1;
			else 
				$dataC['hot_product'] = 0;

			if ($this->input->post('home_product'))
				$dataC['home_product'] = 1;
			else 
				$dataC['home_product'] = 0;

			if ($this->input->post('status'))
				$dataC['status'] = 1;
			else 
				$dataC['status'] = 0;

			$dataC['type'] = $type; 

			if($this->form_validation->run() == TRUE){ 
				if (!empty ($_FILES['image'])) {
					$this->load->model(array('Mgallery'));
					$image_data = $this->Mgallery->do_upload("/product/");
					if ($image_data) {
						$dataC['image'] = $image_data["file_name"];
					}
				}

				if ($this->modelproduct->updateproduct($id,$dataC)){
					$data['b_Check']= true;
				}
			} 
		}elseif($this->input->post('submit') == "ok_version"){
			$titles = $this->input->post('titles'); 
			$prices = $this->input->post('prices'); 
			$details = $this->input->post('details'); 
			$version = array();
			foreach ($titles as $k => $v) {
				if ($v != '')
					$version[] = array('title'=>$titles[$k],'price'=>$prices[$k],'detail'=>$details[$k]);	
			}

			$dataC['version'] = serialize($version);

			if ($this->modelproduct->updateproduct($id,$dataC)){
				$data['b_Check']= true;
			}
		}

		if ($dataC['version']!='') {
			$dataC['versions'] = unserialize($dataC['version']);
		}else{
			$dataC['versions'] = null;
		}

		$data['item'] = $dataC;

		$this->template->build('addproduct',$data);
	}
	public function delete($id=0){
		$this->db->delete('product', array('id' => $id)); 
		redirect(base_url('/admin/product/index/'));
	}
}
