<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_pembayaran extends CI_Model {

	public function create($data){
		if($this->db->insert('tbl_international_pembayaran',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function read(){
		return $this->db->get('tbl_international_pembayaran');
	}

	public function update($id,$data){
		$this->db->where('nik_passport',$id);
		if($this->db->update('tbl_international_pembayaran',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($id){
		$this->db->where('nik_passport',$id);
		if($this->db->delete('tbl_international_pembayaran')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function whereAnd($data){
		$this->db->where($data);
		return $this->db->get('tbl_international_pembayaran');
	}

    public function whereOr($data){
        $this->db->or_where($data);
        return $this->db->get('tbl_international_pembayaran');
    }
}
