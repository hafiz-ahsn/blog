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
	public function registerUser()
	{
		$this->load->model('Register_Model');
		$data = $_POST;
		if (!isset($data['user_full_name']) || empty($data['user_full_name'])) {
			$result  = array('status' => 'empty', 'message' => 'User name is required');
			echo json_encode($result);
			exit;
		}
		if (!isset($data['user_email']) || empty($data['user_email'])) {
			$result  = array('status' => 'empty', 'message' => 'Email is required');
			echo json_encode($result);
			exit;
		}
		$email = $data['user_email'];
	    $result = $this->Register_Model->checkEmail($email);
	    if(($result))
	    {
	        $result  = array('status' => 'exist', 'message' => 'Email is already exist');
			echo json_encode($result);
			exit;
	    }
		if (!isset($data['user_password']) || empty($data['user_password']) ) {
			$result  = array('status' => 'empty', 'message' => 'Password is required');
			echo json_encode($result);
			exit;
		}
		if (!isset($data['cuser_password']) || empty($data['cuser_password']) ) {
			$result  = array('status' => 'empty', 'message' => 'Password confirmation is required');
			echo json_encode($result);
			exit;
		}
		if ($data['user_password'] != $data['cuser_password']) {
			$result  = array('status' => 'empty', 'message' => 'Password & Confirmation Password does not match');
			echo json_encode($result);
			exit;
		}
		unset($data['cuser_password']);
		$result = $this->Register_Model->insertuser($data);
		if($result){
			$result  = array('status' => 'success', 'message' => 'You are registered.');
			echo json_encode($result);
			exit;
		}
		else
		{
			$result  = array('status' => 'error', 'message' => 'Something went wrong.');
			echo json_encode($result);
			exit;
		}
	}
}
