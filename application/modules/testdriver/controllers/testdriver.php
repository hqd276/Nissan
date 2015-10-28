<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testdriver extends MX_Controller{
	
	public function __construct(){
		parent::__construct();

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->library(array('form_validation'));

		$data = Modules::run('header','home');
		$this->template->set_partial('header','header',$data );
		$this->template->set_partial('footer','footer',$data );
	}
	
	public function index(){
		$data = array();
		$this->load->model('admin/modelproduct');
		$list_product = $this->modelproduct->getProduct(null,null);

		$data['list_product'] = $list_product;

		$pid  = $this->input->post('p');
		$data['p'] = $pid;
		$list_version = array();
		if ($pid) {
			$product = $this->modelproduct->getProductById($pid);
			$list_version = unserialize($product['version']);

		}
		$data['list_version'] = $list_version;

		$version  = $this->input->post('v');
		$data['v'] = $version;

		$location  = $this->input->post('l');
		$data['l'] = $location;

		$send = $this->input->post('send'); 

		if($send == 'send'){ 
			$data['p'] = $this->input->post('p'); 
			$data['name'] = $this->input->post('name'); 
			$data['gender'] = $this->input->post('gender'); 
			$data['birth'] = $this->input->post('birth'); 
			$data['email'] = $this->input->post('email');
			$data['address'] = $this->input->post('address');  
			$data['city'] = $this->input->post('city'); 
			$data['phone'] = $this->input->post('phone'); 
			$data['job'] = $this->input->post('job'); 

			$product = $this->modelproduct->getProductById($data['p']);

			$this->load->library('email');

			$config['mailtype'] ='html';

			$this->email->initialize($config);

			$this->email->from($this->input->post('email'));
			$this->email->to('kien.nguyen.nissanhadong@gmail.com'); 
			// $this->email->to('dunghq87@gmail.com'); 

			$this->email->subject($data['name'].' - '.$data['phone']);

			$message = '<p>Tên : '.$data['name'].'</p>';
			$message .= '<p>Giới tính : '.($data['gender'])?'Nam':'Nữ'.'</p>';
			$message .= '<p>Ngày sinh : '.$data['birth'].'</p>';
			$message .= '<p>Email : '.$data['email'].'</p>';
			$message .= '<p>Địa chỉ : '.$data['address'].'</p>';
			$message .= '<p>Thành phố : '.$data['city'].'</p>';
			$message .= '<p>Số điện thoại : '.$data['phone'].'</p>';
			$message .= '<p>Nghề nghiệp : '.$data['job'].'</p>';
			$message .= '<p>Đăng ký lái thử xe : '.$product['title'].'</p>';
			$this->email->message($message);	
			$this->email->send();
			$data['b_Check']= true;
		} 

		$this->template->build('testdriver',$data);
	}
}
