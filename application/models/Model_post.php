<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_post extends CI_Model {
	public function create($data)
	{
		$this->db->insert('post',$data);
		return $this->db->affected_rows();
	}
	public function read()
	{
		return $this->db->get('post');
	}
	public function update($id,$data)
	{	
		$this->db->where('idPost',$id);
		$this->db->update('post',$data);
		return $this->db->affected_rows();
	}
	public function delete($id)
	{
		$this->db->where('idPost',$id);
		$this->db->delete('post');
		return $this->db->affected_rows();
	}
	public function where($id)
	{
		$this->db->where('idPost',$id);
		return $this->db->get('post');
	}
}
