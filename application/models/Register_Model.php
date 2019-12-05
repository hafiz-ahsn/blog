<?php 
class Register_Model extends CI_Model
{
	public function checkEmail($email)
    {
       $this->db->select('*')->from('tbl_user');
       $this ->db-> where('user_email', $email);
       $query = $this ->db-> get();
       return $query->result_array();
    }
	public function insertuser($data)
	{
		  return $this->db->insert('tbl_user',$data);
	}
  public function verifyuser($data)
  {
       $this->db->select('*')->from('tbl_user');
       $this ->db-> where('user_email',$data['user_email']);
       $this ->db-> where('user_password', $data['user_password']);
       $query = $this ->db-> get();
       return $query->result_array();
  }
}