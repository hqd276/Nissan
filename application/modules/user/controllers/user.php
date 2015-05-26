<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MX_Controller {
	private $b_Check = true;

	public function __construct(){
		parent::__construct();

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->library(array('form_validation'));

		#Tải model 
		$this->load->model(array('model'));
		
		$data = Modules::run('header','home');
		$this->template->set_partial('header','header',$data );
		$this->template->set_partial('footer','footer');
	}
	
	public function index(){
		
	}

	public function login() {
		if (isset($this->session->userdata['user']['id'])) {
			redirect(base_url('admin'));
		}else{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email'); 
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]'); 
			#Kiểm tra điều kiện validate 
			if($this->form_validation->run() == TRUE){ 
				$a_UserInfo['email'] = $this->input->post('email'); 
				$a_UserInfo['password'] = md5($this->input->post('password')); 

				$a_UserChecking = $this->model->a_fCheckUser( $a_UserInfo ); 
				if($a_UserChecking){ 
					$this->session->set_userdata('user', $a_UserChecking); 
					redirect(base_url('admin')); 
				}else{ 
					$this->b_Check = false; 
				} 
			} 
		}
		$a_Data['b_Check']= $this->b_Check; 
		$this->template->build('user/login',$a_Data);
	}


	public function logout(){ 
		$this->session->unset_userdata('user');	
		// Unset session of user 
		redirect(base_url('login')); 
	}
	
}