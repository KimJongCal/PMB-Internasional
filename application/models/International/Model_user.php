<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_user extends CI_Model {

	public function create($data){
		if($this->db->insert('tbl_international_user',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function read(){
		return $this->db->get('tbl_international_user');
	}

	public function update($id,$data){
		$this->db->where('nik_passport',$id);
		if($this->db->update('tbl_international_user',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($id){
		$this->db->where('nik_passport',$id);
		if($this->db->delete('tbl_international_user')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function whereBiodata($data){
        $this->db->select('*');
        $this->db->from('tbl_international_user a');
        $this->db->join('tbl_international_biodata b', 'a.nik_passport=b.nik_passport', 'left');
        $this->db->join('tbl_international_pilihan d', 'a.nik_passport=d.nik_passport', 'left');
        $this->db->where('a.nik_passport', $data);
        return $this->db->get();
    }

	public function whereAnd($data){
		$this->db->where($data);
		return $this->db->get('tbl_international_user');
	}

    public function whereOr($data){
        $this->db->or_where($data);
        return $this->db->get('tbl_international_user');
    }
}
