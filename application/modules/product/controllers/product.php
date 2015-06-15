<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MX_Controller {
	private $b_Check = true;

	public function __construct(){
		parent::__construct();

		#Tải thư viện và helper của Form trên CodeIgniter 
		$this->load->helper(array('form')); 
		$this->load->library(array('form_validation'));

		#Tải model 
		$this->load->model('admin/modelproduct');
		$this->load->model('admin/modelcategory');

		$data = Modules::run('header','home');
		$this->template->set_partial('header','header',$data);

		$this->template->set_partial('footer','footer',$data);
	}
	
	public function index(){
		// $dataR = Modules::run('right',$type);
		// $this->template->set_partial('right','right',$dataR);

		$data = array();
		$data['title'] = "Product";
		$data['page'] = "product";

		$list_product = $this->modelproduct->getProduct(null,null);

		$data['list_product'] = $list_product;
		$this->template->build('product',$data);
	}
	public function index_t($slug = ''){
		$dataR = Modules::run('right',0);
		$this->template->set_partial('right','right',$dataR);

		$data['title'] = "Sản phẩm";
		$data = array();
		$list_product = array();
		if ($slug!='') {
			$category = $this->modelcategory->getCategoryBy('slug',$slug);
			if ($category){
				$data['cat'] = $category;
				$data['title'] = $category['name'];
				$data['description'] = $category['description'];
				$list_product = $this->modelproduct->getProduct(array('category_id'=>$category['id']),' LIMIT 0,5');
			}
		}

		$data['list_product'] = $list_product;
		$this->template->build('product',$data);
	}
	public function detail($id=0) {
		if ($id<=0) 
			redirect(base_url().'product');

		$detail_product = $this->modelproduct->getProductById($id);
		if (!$detail_product)
			redirect(base_url().'product');

		$this->modelproduct->updateProductBy('id',$id,array('views'=>$detail_product['views']+1));

		$data['item'] = $detail_product;
		$this->template->build('product-detail',$data);
	}

	public function detail_t($slug='') {
		if ($slug == '') 
			redirect(base_url().'product');

		$detail_product = $this->modelproduct->getProductBy($slug,'slug');
		if (!$detail_product)
			redirect(base_url().'product');
		if ($detail_product['version'] != '') {
			$detail_product['versions'] = unserialize($detail_product['version']);
		}else{
			$detail_product['versions'] = null;
		}

		$this->modelproduct->updateProductBy('slug',$slug,array('views'=>$detail_product['views']+1));

		$data['title'] = $detail_product['title'] ;
		$data['item'] = $detail_product;
		$this->template->build('product-detail',$data);
	}
}