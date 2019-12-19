<?php 
class AddPost_Model extends CI_Model
{
	public function insertPost($data)
	{
		  return $this->db->insert('tbl_post',$data);
	}
}