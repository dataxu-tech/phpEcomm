<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function index()
	{
		$data['user'] = $this->user;
		
		$this->load->view('store/templates/header');
		$this->load->view('store/templates/navbar', $data);
		$this->load->view('index',$data);
		$this->load->view('store/templates/footer');
	}
}
