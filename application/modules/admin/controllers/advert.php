<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advert extends MX_Controller{

	public function __construct(){
		parent::__construct();
		$this->template->set_partial('header','admin-header');
		$this->template->set_partial('footer','admin-footer');

		$user = $this->session->userdata('user'); 
		if ($user['id']){
			#Tải model 
			$this->load->model(array('modeladvert'));

			$this->template->set('user',$user);
		}else{
			redirect(base_url('login'));
		}
		$this->template->set_layout('admin');
	}
	
	public function index(){
		$data = array();

		$category = $this->modeladvert->getadverts(null," LIMIT 0,10");

		$data['list'] = $category;
		// var_dump($data['list']);die;

		$this->template->build('listadvert',$data);
	}

	public function add(){
		$data = array();
		$data['title'] = "Add new advert";

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->helper(array('util')); 

		$dataC = array('name' =>'',
						'description' =>'',
						'status' =>'',
						'position' =>'',
						'image' =>'',);
		
		if ($this->input->post('submit') == "ok") {
			$this->load->library(array('form_validation'));

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]'); 

			#Kiểm tra điều kiện validate 
			if($this->form_validation->run() == TRUE){ 
				$dataC['name'] = $this->input->post('name'); 
				$dataC['description'] = $this->input->post('description'); 
				$dataC['position'] = $this->input->post('position'); 
				if ($this->input->post('status'))
					$dataC['status'] = 1;
				else 
					$dataC['status'] = 0;

				if (!empty ($_FILES['image'])) {
					$this->load->model(array('Mgallery'));
					$image_data = $this->Mgallery->do_upload("/advert/");
					if ($image_data) {
						$dataC['image'] = $image_data["file_name"];
					}
				}

				if ($this->modeladvert->insertadvert($dataC)){
					$data['b_Check']= true;
				}else{
					$data['b_Check']= false;
				}
			} 
		}

		$data['item'] = $dataC;
		$this->template->build('addadvert',$data);
	}
	public function edit($id=0){
		$data = array();
		if ($id<=0)
			redirect(base_url('admin/advert/index'));

		$data['title'] = "Edit advert";

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 

		$dataC = $this->modeladvert->getadvertById($id);
		
		if ($this->input->post('submit') == "ok") {
			$this->load->library(array('form_validation'));

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]'); 

			#Kiểm tra điều kiện validate 
			if($this->form_validation->run() == TRUE){ 
				$dataC['name'] = $this->input->post('name'); 
				$dataC['description'] = $this->input->post('description'); 
				$dataC['position'] = $this->input->post('position'); 
				if ($this->input->post('status'))
					$dataC['status'] = 1;
				else 
					$dataC['status'] = 0;

				if (!empty ($_FILES['image'])) {
					$this->load->model(array('Mgallery'));
					$image_data = $this->Mgallery->do_upload("/advert/");
					if ($image_data) {
						$dataC['image'] = $image_data["file_name"];
					}
				}

				if ($this->modeladvert->updateadvert($dataC['id'],$dataC)){
					$data['b_Check']= true;
					// redirect(base_url('list-category/'.$type));
				}else{
					$data['b_Check']= false;
				}
			} 
		}
		$data['item'] = $dataC;

		$this->template->build('addadvert',$data);
	}
	public function delete($id=0){
		$this->db->delete('adverts', array('id' => $id)); 
		redirect(base_url('/admin/advert/index'));
	}

}
