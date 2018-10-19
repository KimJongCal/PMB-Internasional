<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_jurusan extends CI_Model {

	public function create($data){
		if($this->db->insert('tbl_setting_jurusan',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function read() {
		return $this->db->get('tbl_setting_jurusan');
	}

	public function update($id,$data){
		$this->db->where('kode_jurusan',$id);
		if($this->db->update('tbl_setting_jurusan',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($id){
		$this->db->where('kode_jurusan',$id);
		if($this->db->delete('tbl_setting_jurusan')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function whereAnd($data){
		$this->db->where($data);
		return $this->db->get('tbl_setting_jurusan');
	}

	public function whereOr($data){
    	$this->db->or_where($data);
    	return $this->db->get('tbl_setting_jurusan');
    }

    public function UKT($kategori,$kode_jurusan){
        $this->db->select("$kategori as ukt");
        $this->db->where('kode_jurusan', $kode_jurusan);
        return $this->db->get('tbl_setting_jurusan');
    }

}
