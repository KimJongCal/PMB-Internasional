<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_penghasilan extends CI_Model {

	public function create($data){
		if($this->db->insert('tbl_setting_penghasilan',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function read(){
		return $this->db->get('tbl_setting_penghasilan');
	}

	public function update($id,$data){
		$this->db->where('id_penghasilan',$id);
		if($this->db->update('tbl_setting_penghasilan',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($id){
		$this->db->where('id_penghasilan',$id);
		if($this->db->delete('tbl_setting_penghasilan')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function whereAnd($data){
		$this->db->where($data);
		return $this->db->get('tbl_setting_penghasilan');
	}

    public function whereOr($data){
        $this->db->or_where($data);
        return $this->db->get('tbl_setting_penghasilan');
    }

}
