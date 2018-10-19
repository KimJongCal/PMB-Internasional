<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_pembayaran_pbb extends CI_Model {

    public function create($data){
        if($this->db->insert('tbl_setting_pembayaran_pbb',$data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function read() {
        return $this->db->get('tbl_setting_pembayaran_pbb');
    }

    public function update($id,$data){
        $this->db->where('id_pembayaran_pbb',$id);
        if($this->db->update('tbl_setting_pembayaran_pbb',$data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete($id){
        $this->db->where('id_pembayaran_pbb',$id);
        if($this->db->delete('tbl_setting_pembayaran_pbb')){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function whereAnd($data){
        $this->db->where($data);
        return $this->db->get('tbl_setting_pembayaran_pbb');
    }

    public function whereOr($data){
        $this->db->or_where($data);
        return $this->db->get('tbl_setting_pembayaran_pbb');
    }

}
