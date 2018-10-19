<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_kabupaten extends CI_Model {

	public function create($data){
		if($this->db->insert('tbl_setting_kabupaten',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function read(){
		return $this->db->get('tbl_setting_kabupaten');
	}

	public function update($id,$data){
		$this->db->where('id_kabupaten',$id);
		if($this->db->update('tbl_setting_kabupaten',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($id){
		$this->db->where('id_kabupaten',$id);
		if($this->db->delete('tbl_setting_kabupaten')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function whereAnd($data){
		$this->db->where($data);
		return $this->db->get('tbl_setting_kabupaten');
	}

    public function whereOr($data){
        $this->db->or_where($data);
        return $this->db->get('tbl_setting_kabupaten');
    }

	public function lastIDKAB(){
		$this->db->select('id_kabupaten');
		$this->db->order_by('id_kabupaten', 'DESC');
		$this->db->limit(1);
		return $this->db->get('tbl_setting_kabupaten');
	}

	public function viewByProvinsi($id_provinsi){
	    $this->db->where('id_provinsi', $id_provinsi);
	    $result = $this->db->get('tbl_setting_kabupaten')->result();
	    
	    return $result; 
  	}

}
