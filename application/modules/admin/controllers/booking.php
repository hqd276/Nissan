<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->template->set_partial('header','admin-header');
		$this->template->set_partial('footer','admin-footer');

		$user = $this->session->userdata('user'); 
		if ($user['id']){
			#Tải model 
			$this->load->model(array('modelbooking'));

			$this->template->set('user',$user);
		}else{
			redirect(base_url('login'));
		}

		$this->template->set_layout('admin');
	}
	
	public function index(){
		$data = array();
		$data['list'] = $this->modelbooking->getBookings(0,10);
		// var_dump($data['list']);die;

		$this->template->build('listbooking',$data);
	}
	public function delete($id=0){
		$this->db->delete('booking', array('id' => $id)); 
		redirect(base_url('/admin/booking'));
	}
}
