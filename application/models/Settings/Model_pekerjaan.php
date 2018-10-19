<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_pekerjaan extends CI_Model {

	public function create($data){
		if($this->db->insert('tbl_setting_pekerjaan',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function read() {
		return $this->db->get('tbl_setting_pekerjaan');
	}

	public function update($id,$data){
		$this->db->where('id_pekerjaan',$id);
		if($this->db->update('tbl_setting_pekerjaan',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($id){
		$this->db->where('id_pekerjaan',$id);
		if($this->db->delete('tbl_setting_pekerjaan')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function whereAnd($data){
		$this->db->where($data);
		return $this->db->get('tbl_setting_pekerjaan');
	}

    public function whereOr($data){
        $this->db->or_where($data);
        return $this->db->get('tbl_setting_pekerjaan');
    }

}
