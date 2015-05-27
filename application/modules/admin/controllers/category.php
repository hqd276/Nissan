<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MX_Controller{

	public function __construct(){
		parent::__construct();
		$this->template->set_partial('header','admin-header');
		$this->template->set_partial('footer','admin-footer');

		$user = $this->session->userdata('user'); 
		if ($user['id']){
			#Tải model 
			$this->load->model(array('modelcategory'));

			$this->template->set('user',$user);
		}else{
			redirect(base_url('login'));
		}
		$this->template->set_layout('admin');
	}
	
	public function index($type=0){
		$data = array();
		$data['type'] = $type;

		$category = $this->modelcategory->getCategories(array("type"=>$type,"parent"=>-1));
		if (count($category)>0) {
			foreach ($category as $key => $value) {
				$child_category = $this->modelcategory->getCategories(array("type"=>$type,"parent"=>$value['id']));
				$category[$key]['child'] = $child_category;
			}
		}
		$data['list'] = $category;
		// var_dump($data['list']);die;

		$this->template->build('listcategory',$data);
	}

	public function add($type=0){
		$data = array();
		$data['type'] = $type;
		$data['title'] = "Add new category";

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->helper(array('util')); 

		$category = $this->modelcategory->getCategories(array("type"=>$type));
		// $category = add_array_key("id",$category);

		$dataC = array('name' =>'',
						'slug' =>'',
						'parent' =>'',
						'description' =>'',
						'order' =>'',
						'status' =>'',
						'type' =>'',
						'image' =>'',);
		
		if ($this->input->post('submit') == "ok") {
			$this->load->library(array('form_validation'));

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]'); 

			#Kiểm tra điều kiện validate 
			if($this->form_validation->run() == TRUE){ 
				$dataC['name'] = $this->input->post('name'); 
				$dataC['slug'] = safe_title($this->input->post('name')); 
				$dataC['parent'] = $this->input->post('parent'); 
				$dataC['description'] = $this->input->post('description'); 
				$dataC['order'] = $this->input->post('order'); 
				if ($this->input->post('status'))
					$dataC['status'] = 1;
				else 
					$dataC['status'] = 0;
				$dataC['type'] = $type; 

				if (!empty ($_FILES['image'])) {
					$this->load->model(array('Mgallery'));
					$image_data = $this->Mgallery->do_upload("/categories/");
					if ($image_data) {
						$dataC['image'] = $image_data["file_name"];
					}
				}

				if ($this->modelcategory->insertCategory($dataC)){
					$data['b_Check']= true;
					// redirect(base_url('list-category/'.$type));
				}else{
					$data['b_Check']= false;
				}
			} 
		}

		$data['category_box'] = $this->category_box($category, $dataC);

		$data['item'] = $dataC;
		$this->template->build('addcategory',$data);
	}
	public function edit($type=0,$id=0){
		$data = array();
		if ($id<=0)
			redirect(base_url('list-category/'.$type));

		$data['type'] = $type;
		$data['title'] = "Edit category";

		$category = $this->modelcategory->getCategories(array("type"=>$type));
		$data['category'] = $category;

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 

		$dataC = $this->modelcategory->getCategoryById($id);
		
		if ($this->input->post('submit') == "ok") {
			$this->load->library(array('form_validation'));

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]'); 

			#Kiểm tra điều kiện validate 
			if($this->form_validation->run() == TRUE){ 
				$dataC['name'] = $this->input->post('name'); 
				$dataC['slug'] = safe_title($this->input->post('name')); 
				$dataC['parent'] = $this->input->post('parent'); 
				$dataC['description'] = $this->input->post('description'); 
				$dataC['order'] = $this->input->post('order'); 

				if ($this->input->post('status'))
					$dataC['status'] = 1;
				else 
					$dataC['status'] = 0;
				$dataC['type'] = $type; 

				if (!empty ($_FILES['image'])) {
					$this->load->model(array('Mgallery'));
					$image_data = $this->Mgallery->do_upload("/categories/");
					if ($image_data) {
						$dataC['image'] = $image_data["file_name"];
					}
				}

				if ($this->modelcategory->updateCategory($dataC['id'],$dataC)){
					$data['b_Check']= true;
					// redirect(base_url('list-category/'.$type));
				}else{
					$data['b_Check']= false;
				}
			} 
		}
		$data['item'] = $dataC;

		$data['category_box'] = $this->category_box($category, $dataC);

		$this->template->build('addcategory',$data);
	}
	public function delete($type=0,$id=0){
		$this->db->delete('categories', array('id' => $id)); 
		redirect(base_url('/admin/category/index/'.$type));
	}

	function category_box ($category, $dataC) {
		$category_box = "";
		foreach ($category as $key => $value) {
			if ($value["parent"] == -1) {
				$category_box.= "<option value='".$value['id']."' ";
				$category_box.= ($dataC['parent'] == $value['id'])?'selected':'';
				$category_box.= ">".$value['name']."</option>";
				// $child = array();
				foreach ($category as $k => $v) {
					if ($v["parent"] == $value["id"]){
						$category_box.= "<option value='".$v['id']."' ";
						$category_box.= ($dataC['parent'] == $v['id'])?'selected':'';
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
