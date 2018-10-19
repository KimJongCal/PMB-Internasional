<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {
	public function createUser($data)
	{
		$this->db->insert('user',$data);
		return $this->db->affected_rows();
	}
	public function readUser()
	{
		return $this->db->get('user');
	}
	public function updateUser($id,$data)
	{	
		$this->db->where('idUser',$id);
		$this->db->update('user',$data);
		return $this->db->affected_rows();
	}
	public function deleteUser($id)
	{
		$this->db->where('idUser',$id);
		$this->db->delete('user');
		return $this->db->affected_rows();
	}
	public function whereUser($id)
	{
		$this->db->where('idUser',$id);
		return $this->db->get('user');
	}
	public function whereLogin($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('user');
	}	
}
