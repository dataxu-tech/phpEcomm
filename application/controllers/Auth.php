<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('store/templates/header');
		$this->load->view('login');
		$this->load->view('store/templates/footer');
	}

	public function registration()
	{
		$this->load->view('store/templates/header');
		$this->load->view('registration');
		$this->load->view('store/templates/footer');
	}
}
