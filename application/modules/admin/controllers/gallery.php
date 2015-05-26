<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->template->set_partial('header','admin-header');
		$this->template->set_partial('footer','admin-footer');

		$user = $this->session->userdata('user'); 
		if ($user['id']){
			#Tải model 
			$this->load->model(array('modelgallery'));

			$this->template->set('user',$user);
		}else{
			redirect(base_url('login'));
		}
		$this->template->set_layout('admin');
	}
	
	public function index($page = 1){
		$data = array();

		$item_per_page = 10;
		$begin = 0;
		if ($page>1) {
			$begin = ($page-1) * $item_per_page ;
		}
		$this->load->model(array('modelcategory'));
		$gallery = $this->modelgallery->getGallery(null," LIMIT ".$begin.",".($item_per_page+1));
		if (count($gallery)>0) {
			foreach ($gallery as $key => $value) {
				if ($value['category_id']>0){
					$category = $this->modelcategory->getCategoryById($value['category_id']);
					$gallery[$key]['category'] = $category['name'];
				}else {
					$gallery[$key]['category'] = '';
				}
			}
		}

		if (count($gallery)>$item_per_page){
			$data['next'] = $page + 1;
			array_pop($gallery);
		}else 
			$data['next'] = 0;
		
		$data['prev'] = $page - 1;

		$data['list'] = $gallery;

		$this->template->build('listgallery',$data);
	}

	public function add(){
		$data = array();
		$data['title'] = "Add new Image";

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->helper(array('util')); 

		$dataC = array('category_id' =>'',
						'title' =>'',
						'image' =>'',
						'order' =>'',
						'status' =>'');
		
		if ($this->input->post('submit') == "ok") {
			$dataC['title'] = $this->input->post('title'); 
			$dataC['order'] = $this->input->post('order'); 
			$dataC['category_id'] = $this->input->post('category_id'); 

			if ($this->input->post('status'))
				$dataC['status'] = 1;
			else 
				$dataC['status'] = 0;
			$data['b_Check']= false;

			if (!empty ($_FILES['image'])) {
				$this->load->model(array('Mgallery'));
				$image_data = $this->Mgallery->do_upload("/gallery/");
				if ($image_data) {
					$dataC['image'] = $image_data["file_name"];
					if ($this->modelgallery->insertImage($dataC)){
						$data['b_Check']= true;
						// redirect(base_url('list-category/'.$type));
					}
				}
			}
		}
		$this->load->model(array('modelcategory'));

		$category = $this->modelcategory->getCategories();

		$data['category_box'] = $this->category_box($category, $dataC);

		$data['item'] = $dataC;
		$this->template->build('addgallery',$data);
	}
	public function edit($id=0){
		$data = array();
		$data['title'] = "Edit Image";
		if ($id<=0)
			redirect(base_url('admin/gallery/index'));

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->helper(array('util')); 

		$dataC = $this->modelgallery->getImageById($id);
		
		if ($this->input->post('submit') == "ok") {
			$dataC['title'] = $this->input->post('title'); 
			$dataC['order'] = $this->input->post('order'); 
			$dataC['category_id'] = $this->input->post('category_id'); 

			if ($this->input->post('status'))
				$dataC['status'] = 1;
			else 
				$dataC['status'] = 0;
			$data['b_Check']= false;

			if (!empty ($_FILES['image'])) {
				$this->load->model(array('Mgallery'));
				$image_data = $this->Mgallery->do_upload("/gallery/");
				if ($image_data) {
					$dataC['image'] = $image_data["file_name"];
				}
			}

			if ($this->modelgallery->updateImage($id,$dataC)){
				$data['b_Check']= true;
				// redirect(base_url('list-category/'.$type));
			}else{
				$data['b_Check']= false;
			}
		}
		$this->load->model(array('modelcategory'));

		$category = $this->modelcategory->getCategories(array("type"=>0));

		$data['category_box'] = $this->category_box($category, $dataC);

		$data['item'] = $dataC;
		$this->template->build('addgallery',$data);
	}

	public function delete($id=0){
		$this->db->delete('gallery', array('id' => $id)); 
		redirect(base_url('/admin/gallery'));
	}

	function category_box ($category, $dataC) {
		$category_box = "";
		foreach ($category as $k => $v) {
			$category_box.= "<option value='".$v['id']."' ";
			$category_box.= ($dataC['category_id'] == $v['id'])?'selected':'';
			$root = ($v['parent']==1)?'Đã thực hiện':'Đang thực hiện';
			$category_box.= "> [" . $root . "] ".$v['name']."</option>";

		}
		// $category[$key]["child"]= $child;
		return $category_box;
	}
}
