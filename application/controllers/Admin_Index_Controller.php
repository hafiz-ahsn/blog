<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Index_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('admin_index_view');
	}
	public function addPost()
	{
		$this->load->view('add_post');
	}
	public function viewPost()
	{
		$this->load->view('view_post');
	}
}
