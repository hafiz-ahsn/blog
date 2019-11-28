<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_Index_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('store_index_view');
	}
}
