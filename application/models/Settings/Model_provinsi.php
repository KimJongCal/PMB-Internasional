<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_provinsi extends CI_Model {

	public function create($data){
		if($this->db->insert('tbl_setting_provinsi',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function read(){
		return $this->db->get('tbl_setting_provinsi');
	}

	public function update($id,$data){
		$this->db->where('id_provinsi',$id);
		if($this->db->update('tbl_setting_provinsi',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($id){
		$this->db->where('id_provinsi',$id);
		if($this->db->delete('tbl_setting_provinsi')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function whereAnd($data){
		$this->db->where($data);
		return $this->db->get('tbl_setting_provinsi');
	}

    public function whereOr($data){
        $this->db->or_where($data);
        return $this->db->get('tbl_setting_provinsi');
    }

	public function lastID(){
		$this->db->select('id_provinsi');
		$this->db->order_by('id_provinsi', 'DESC');
		$this->db->limit(1);
		return $this->db->get('tbl_setting_provinsi');
	}

}
