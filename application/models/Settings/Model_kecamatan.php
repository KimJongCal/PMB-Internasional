<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_kecamatan extends CI_Model {

	public function create($data){
		if($this->db->insert('tbl_setting_kecamatan',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function read(){
		return $this->db->get('tbl_setting_kecamatan');
	}

	public function update($id,$data){
		$this->db->where('id_kecamatan',$id);
		if($this->db->update('tbl_setting_kecamatan',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($id){
		$this->db->where('id_kecamatan',$id);
		if($this->db->delete('tbl_setting_kecamatan')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function whereAnd($data){
		$this->db->where($data);
		return $this->db->get('tbl_setting_kecamatan');
	}

    public function whereOr($data){
        $this->db->or_where($data);
        return $this->db->get('tbl_setting_kecamatan');
    }

	public function lastIDKEC(){
		$this->db->select('id_kecamatan');
		$this->db->order_by('id_kecamatan', 'DESC');
		$this->db->limit(1);
		return $this->db->get('tbl_setting_kecamatan');
	}

	public function viewByKabupaten($id_kabupaten){
	    $this->db->where('id_kabupaten', $id_kabupaten);
	    $result = $this->db->get('tbl_setting_kecamatan')->result();
	    
	    return $result; 
  	}

}
