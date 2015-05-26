<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends MX_Controller {
	public function __construct(){
		parent::__construct();

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->library(array('form_validation'));

		#Tải model 
		$this->load->model(array('model'));

		$data = Modules::run('header','booking');
		$this->template->set_partial('header','header',$data);
		$this->template->set_partial('footer','footer',$data);
	}
	
	public function index(){
		$data = array();
		// $data['page'] = 'contact';

		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email'); 
		$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|xss_clean'); 
		$this->form_validation->set_rules('content', 'Content', 'required|min_length[5]|xss_clean'); 
		$this->form_validation->set_rules('from',  'From','trim|xss_clean');
		$this->form_validation->set_rules('departure',  'Departure','trim|xss_clean');
		$this->form_validation->set_rules('destination',  'Destination','trim|xss_clean');
		$this->form_validation->set_rules('adult',  'Adult','trim|xss_clean');
		$this->form_validation->set_rules('children',  'Children','trim|xss_clean');

		#Kiểm tra điều kiện validate 
		if($this->form_validation->run() == TRUE){ 
			$data['from'] = $this->input->post('from'); 
			$data['to'] = $this->input->post('to'); 
			$data['departure'] = $this->input->post('departure'); 
			$data['destination'] = $this->input->post('destination'); 
			$data['adult'] = $this->input->post('adult'); 
			$data['children'] = $this->input->post('children'); 
			$data['email'] = $this->input->post('email'); 
			$data['phone'] = $this->input->post('phone'); 
			$data['content'] = $this->input->post('content'); 

			if ($this->model->insertBooking($data)){
				$data['b_Check']= true;
			}else{
				$data['b_Check']= false;
			}
		} 

		$this->template->build('booking',$data);
	}
	
}