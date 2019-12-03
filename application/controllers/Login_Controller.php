<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function login()
	{
		$this->load->view('login_view');
	}
	public function register()
	{
		$this->load->view('register_view');
	}
}
