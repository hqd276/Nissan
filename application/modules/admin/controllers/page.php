<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MX_Controller{

	public function __construct(){
		parent::__construct();
		$this->template->set_partial('header','admin-header');
		$this->template->set_partial('footer','admin-footer');

		$user = $this->session->userdata('user'); 
		if ($user['id']){
			#Tải model 
			$this->load->model(array('modelsetting'));

			$this->template->set('user',$user);
		}else{
			redirect(base_url('login'));
		}
		$this->template->set_layout('admin');
	}
	
	public function index(){
		$data = array();

		$setting = $this->modelsetting->getSetting(array('type'=>1));
		if (count($setting)>0) {
			foreach ($setting as $key => $value) {
				$item = json_decode($value['value']);
				$setting[$key]['name'] = $item->name;
				// if ($value['group'])
				// 	$setting[$key]['groupname'] = 'Liên hệ';
				// else
				// 	$setting[$key]['groupname'] = 'Về chúng tôi';
			}
		}
		$data['list'] = $setting;
		// var_dump($data['list']);die;

		$this->template->build('listpage',$data);
	}

	public function edit($id=0){
		$data = array();
		if ($id<=0)
			redirect(base_url('page'));

		$data['title'] = "Edit Page";

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 

		$dataC = $this->modelsetting->getSettingById($id);
		if ($dataC['value']!='') {
			$item = json_decode($dataC['value']);
			$dataC['name'] = $item->name;
			$dataC['image'] = $item->image;
			$dataC['description'] = $item->description;
			$dataC['detail'] = $item->detail;
			$dataC['slug'] = $item->slug;
		}else{
			$dataC['name'] = '';
			$dataC['image'] = '';
			$dataC['description'] = '';
			$dataC['detail'] = '';
			$dataC['slug'] = '';
		}
		
		if ($this->input->post('submit') == "ok") {
			$this->load->library(array('form_validation'));

			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]'); 

			#Kiểm tra điều kiện validate 
			if($this->form_validation->run() == TRUE){ 
				$value = array();
				$value['name'] = $this->input->post('name'); 
				$value['description'] = $this->input->post('description'); 
				$value['detail'] = $this->input->post('detail'); 
				$value['slug'] = $dataC['slug'];

				$value['image'] = $dataC['image'];
				if (!empty ($_FILES['image'])) {
					$this->load->model(array('mgallery'));
					$image_data = $this->mgallery->do_upload("/settings/");
					if ($image_data) {
						$value['image'] = $image_data["file_name"];
					}
				}elseif(isset($dataC['image']) && ($dataC['image']!='')){
					$value['image'] = $dataC['image'];
				}

				$dataC['name'] = $value['name'];
				$dataC['image'] = $value['image'];
				$dataC['description'] = $value['description'];
				$dataC['detail'] = $value['detail'];

				if ($this->modelsetting->updateSetting($dataC['id'],array('value'=>json_encode($value)))){
					$data['b_Check']= true;
					// redirect(base_url('list-category/'.$type));
				}else{
					$data['b_Check']= false;
				}
			} 
		}
		$data['item'] = $dataC;

		$this->template->build('editpage',$data);
	}
}
