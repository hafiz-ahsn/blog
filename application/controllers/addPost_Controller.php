<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class addPost_Controller extends CI_Controller {
	public function addPost()
	{
		$this->load->view('add_post');
	}
	public function submitPost()
	{   
		$this->load->model('AddPost_Model');
		$data = $_POST;
		if (!isset($data['post_heading']) || empty($data['post_heading'])) {
			$result  = array('status' => 'empty', 'message' => 'Post Heading is required');
			echo json_encode($result);
			exit;
		}
		if (!isset($data['post_description']) || empty($data['post_description'])) {
			$result  = array('status' => 'empty', 'message' => 'Post Description is required');
			echo json_encode($result);
			exit;
		}
		if (!isset($_FILES['post_image']['name']) || empty($_FILES['post_image']['name'])) {
			$result  = array('status' => 'empty', 'message' => 'Post Image is required');
			echo json_encode($result);
			exit;
		}
		if (!isset($data['post_author_name']) || empty($data['post_author_name'])) {
			$result  = array('status' => 'empty', 'message' => 'Post Author Name is required');
			echo json_encode($result);
			exit;
		}
		if (!isset($_FILES['post_author_image']['name']) || empty($_FILES['post_author_image']['name'])) {
			$result  = array('status' => 'empty', 'message' => 'Post Author Image is required');
			echo json_encode($result);
			exit;
		}
		
		if(isset($_FILES["post_image"]["name"]))  
	        {   
	        	//Form data sets here 
	         	$data = $_POST;
	         	
		        $config['upload_path'] = 'admin_assets/dist/img/';  
		        $config['allowed_types'] = 'jpg|jpeg|png';  
		        $this->load->library('upload', $config);  
		        if(!$this->upload->do_upload('post_image')){  
			            $error =  $this->upload->display_errors(); 
		        }  
		        else 
		        {  
		            $image = $this->upload->data(); 
		            $data['post_image'] = $image['file_name'];
		            
		        } 

		        if(!$this->upload->do_upload('post_author_image')){  
			            $error =  $this->upload->display_errors(); 
		        }  
		        else 
		        {  
		            $image = $this->upload->data(); 
		            $data['post_author_image'] = $image['file_name'];
		            
		        }  
		        $result = $this->AddPost_Model->insertPost($data);
		        if($result){
					$result  = array('status' => 'success', 'message' => 'Post is Submitted.');
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

}
