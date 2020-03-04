<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|is_unique[user.username]',
												 array(
												 		'required' 		=> 'masukkan username' ,
												 		'min_length' 	=> 'username terlalu pendek',
												 		'is_unique'		=> 'username pernah digunakan'
													  )
		);
		$this->$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]valid_email||is_unique[user.email]',
												 array(
												 		'required' 		=> 'masukkan email' ,
												 		'min_length' 	=> 'email terlalu pendek',
												 		'valid_email'	=> 'email tidak valid',
												 		'is_unique'		=> 'email pernah digunakan'
													  )
		);
		$this->form_validation->set_rules('password1','Password1', 'trim|required|min_length[4]|matches[password2]',
                                            	 array(
		                                                'required'   => 'Masukkan Password..!.',
		                                                'min_length' => 'Minimal 4 huruf/angka/karakter',
		                                                'matches'    => 'password tidak cocok'
                                                	  )
        );
        $this->form_validation->set_rules('password2','Password2', 'trim|required|min_length[4]',
	                                             array(
		                                                'required'   => 'Masukkan Password..!.',
		                                                'min_length' => 'Minimal 4 huruf/angka/karakter',
	                                                  )
	    );

		$this->load->view('login');
		$this->load->view('store/templates/footer');
	}

	public function registration()
	{
		
		$this->load->view('registration');
		$this->load->view('store/templates/footer');
	}

	public function forgetPassword()
	{
		
		$this->load->view('forget_password');
		$this->load->view('store/templates/footer');
	}
}
