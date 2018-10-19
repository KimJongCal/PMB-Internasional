<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_kelulusan extends CI_Model {

	public function create($data){
		if($this->db->insert('tbl_international_kelulusan',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function read(){
		return $this->db->get('tbl_international_kelulusan');
	}

	public function update($id,$data){
		$this->db->where('nik_passport',$id);
		if($this->db->update('tbl_international_kelulusan',$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($id){
		$this->db->where('nik_passport',$id);
		if($this->db->delete('tbl_international_kelulusan')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function whereAnd($data){
		$this->db->where($data);
		return $this->db->get('tbl_international_kelulusan');
	}

    public function whereOr($data){
        $this->db->or_where($data);
        return $this->db->get('tbl_international_kelulusan');
    }

    public function whereAndJoin($data){
    	$this->db->select('a.no, a.nomor_peserta, b.nik_passport, d.nama, a.status_kelulusan, a.kode_jurusan_kelulusan, c.jurusan, c.fakultas');
    	$this->db->from('tbl_international_kelulusan a');
    	$this->db->join('tbl_international_user b', 'a.nomor_peserta=b.nomor_peserta');
    	$this->db->join('tbl_international_biodata d', 'b.nik_passport=d.nik_passport');
    	$this->db->join('view_setting_fakultas_jurusan c', 'a.kode_jurusan_kelulusan=c.kode_jurusan');
		$this->db->where($data);
		return $this->db->get();
	}
}
