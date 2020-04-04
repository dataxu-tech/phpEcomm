<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function index()
	{
		$data['user'] 		= $this->user;
		$data['product']	= $this->Product_model->getallproduct();
	
		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/topbar',$data);
		$this->load->view('index',$data);
		$this->load->view('store/templates/footer');
	}

	public function singleProduct($id)
	{
		$data['user']			= $this->user;
		$data['singleProduct'] 	= $this->Product_model->getProductById($id);

		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/topbar',$data);
		$this->load->view('store/single_product',$data);
		$this->load->view('store/templates/single_product_buttom_navbar',$data);
		$this->load->view('store/templates/footer');
	}

	public function myCart()
	{
		$data['user'] 		= $this->user;
		$data['backArrow']	= 'home';
		$data['title']		= 'Keranjang Saya';
		
		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/order_topbar',$data);
		$this->load->view('store/my_cart',$data);
		$this->load->view('store/templates/footer');
	}

	public function addCart()
	{
		
		$data = [
			'id'		=> $this->input->post('id'),
			'name'		=> $this->input->post('name'),
			'qty'		=> htmlspecialchars($this->input->post('qty',true)),
			'price'		=> $this->input->post('price'),
			'image'		=> $this->input->post('image')	
		];
		
	$this->cart->insert($data);
	
	redirect('home/index');
	}

	public function removeCart($rowid)
	{
		$this->cart->remove($rowid);
		redirect('home/detailOrder');
	}

	public function updateCart()
	{
		$data = [
			'rowid'		=> $this->input->post('rowid'),
			'qty'		=> htmlspecialchars($this->input->post('qty', true))
		];
	$this->cart->update($data);
	redirect('home/detailOrder');
	}

	public function checkout()
	{
		$data['user'] 		= $this->user;
		$data['backArrow']	= 'home/myCart';

		$this->load->view('store/templates/header',$data);
		$this->load->view('store/templates/order_topbar',$data);
		$this->load->view('store/checkout',$data);
		$this->load->view('store/templates/footer');
	}
}
