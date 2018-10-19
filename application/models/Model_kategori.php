<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {
	public function create($data)
	{
		$this->db->insert('kategori',$data);
		return $this->db->affected_rows();
	}
	public function read()
	{
		return $this->db->get('kategori');
	}
	public function update($id,$data)
	{	
		$this->db->where('idKategori',$id);
		$this->db->update('kategori',$data);
		return $this->db->affected_rows();
	}
	public function delete($id)
	{
		$this->db->where('idKategori',$id);
		$this->db->delete('kategori');
		return $this->db->affected_rows();
	}
	public function where($id)
	{
		$this->db->where('idKategori',$id);
		return $this->db->get('kategori');
	}
}
