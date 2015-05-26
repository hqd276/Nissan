<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->template->set_partial('header','admin-header');
		$this->template->set_partial('footer','admin-footer');

		$user = $this->session->userdata('user'); 
		if ($user['id']){
			#Tải model 
			$this->load->model(array('modelbanner'));

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
		$banner = $this->modelbanner->getBanner(null," LIMIT ".$begin.",".($item_per_page+1));

		if (count($banner)>$item_per_page){
			$data['next'] = $page + 1;
			array_pop($banner);
		}else 
			$data['next'] = 0;
		
		$data['prev'] = $page - 1;

		$data['list'] = $banner;

		$this->template->build('listbanner',$data);
	}

	public function add(){
		$data = array();
		$data['title'] = "Add new Image";

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->helper(array('util')); 

		$dataC = array(
						// 'position' =>'',
						'title' =>'',
						'image' =>'',
						'order' =>'',
						'status' =>'');
		
		if ($this->input->post('submit') == "ok") {
			$dataC['title'] = $this->input->post('title'); 
			$dataC['order'] = $this->input->post('order'); 
			// $dataC['position'] = $this->input->post('position'); 

			if ($this->input->post('status'))
				$dataC['status'] = 1;
			else 
				$dataC['status'] = 0;
			$data['b_Check']= false;

			if (!empty ($_FILES['image'])) {
				$this->load->model(array('Mgallery'));
				$image_data = $this->Mgallery->do_upload("/banner/");
				if ($image_data) {
					$dataC['image'] = $image_data["file_name"];
					if ($this->modelbanner->insertImage($dataC)){
						$data['b_Check']= true;
						// redirect(base_url('list-category/'.$type));
					}
				}
			}
		}

		$data['item'] = $dataC;
		$this->template->build('addbanner',$data);
	}
	public function edit($id=0){
		$data = array();
		$data['title'] = "Edit Image";
		if ($id<=0)
			redirect(base_url('admin/position/index'));

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->helper(array('util')); 

		$dataC = $this->modelbanner->getImageById($id);
		
		if ($this->input->post('submit') == "ok") {
			$dataC['title'] = $this->input->post('title'); 
			$dataC['order'] = $this->input->post('order'); 
			// $dataC['position'] = $this->input->post('position'); 

			if ($this->input->post('status'))
				$dataC['status'] = 1;
			else 
				$dataC['status'] = 0;
			$data['b_Check']= false;

			if (!empty ($_FILES['image'])) {
				$this->load->model(array('Mgallery'));
				$image_data = $this->Mgallery->do_upload("/banner/");
				if ($image_data) {
					$dataC['image'] = $image_data["file_name"];
				}
			}

			if ($this->modelbanner->updateImage($id,$dataC)){
				$data['b_Check']= true;
				// redirect(base_url('list-category/'.$type));
			}else{
				$data['b_Check']= false;
			}
		}

		$data['item'] = $dataC;
		$this->template->build('addbanner',$data);
	}

	public function delete($id=0){
		$this->db->delete('banner', array('id' => $id)); 
		redirect(base_url('/admin/banner'));
	}
}
