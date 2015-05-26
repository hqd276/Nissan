<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->template->set_partial('header','admin-header');
		$this->template->set_partial('footer','admin-footer');

		$user = $this->session->userdata('user'); 
		if ($user['id']){
			#Tải model 
			$this->load->model(array('modelsupport'));

			$this->template->set('user',$user);
		}else{
			redirect(base_url('login'));
		}

		$this->template->set_layout('admin');
	}
	
	public function index(){
		$data = array();
		$data['list'] = $this->modelsupport->getSupports(0,10);
		// var_dump($data['list']);die;

		$this->template->build('listsupport',$data);
	}
	public function delete($id=0){
		$this->db->delete('supports', array('id' => $id)); 
		redirect(base_url('/admin/support'));
	}
}
