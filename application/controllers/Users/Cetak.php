<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_get('Asia/Jakarta');
        $this->load->model('International/Model_user');
        $this->load->model('International/Model_pembayaran');
        $this->load->model('International/Model_biodata');
        $this->load->model('International/Model_pilihan');
        $this->load->model('Settings/Model_jurusan');
        $this->load->model('Settings/Model_jalur_masuk');
        $this->load->model('Settings/Model_smtp');
    }

    public function KartuPeserta($nik)
    {
	
		$id = array(
			'nik_passport' => $nik,
		);
		$user    = $this->Model_user->whereAnd($id)->row();
		if($user->status_bayar=="SUDAH BAYAR"){
			$data = array(
				'nomor_peserta' => '4'.substr($this->session->userdata('kd_pembayaran'),4,6).$this->session->userdata('pilihan1').$this->session->userdata('pilihan2').$this->session->userdata('pilihan3'),
			);
			if($this->Model_user->update($nik, $data)){
				
				$search = array(
					'nik_passport' => $nik,
				);

				$pilihan1 = array(
					'kode_jurusan' => $this->session->userdata('pilihan1'),
				);

				$pilihan2 = array(
					'kode_jurusan' => $this->session->userdata('pilihan2'),
				);

				$pilihan3 = array(
					'kode_jurusan' => $this->session->userdata('pilihan3'),
				);

				$tbBiodata = $this->Model_biodata->whereAnd($search)->row();
				$tbUsers = $this->Model_user->whereAnd($search)->row();
				$tbPilihan1 = $this->Model_jurusan->whereAnd($pilihan1)->row();
				$tbPilihan2 = $this->Model_jurusan->whereAnd($pilihan2)->row();
				$tbPilihan3 = $this->Model_jurusan->whereAnd($pilihan3)->row();
				$tbPembayaran = $this->Model_pembayaran->whereAnd($search)->row();

				$data = array(
					'tbBiodata' => $tbBiodata,
					'tbUsers' => $tbUsers,
					'tbPilihan1' => $tbPilihan1,
					'tbPilihan2' => $tbPilihan2,
					'tbPilihan3' => $tbPilihan3,
					'tbPembayaran' => $tbPembayaran,
				);

				$html=$this->load->view('users/print/kartu_peserta', $data, true); 
				$pdfFilePath = "CARD_".$nik.".pdf";
				$this->load->library('m_pdf');
				$pdf = $this->m_pdf->load();
				$pdf->WriteHTML($html);
				$pdf->Output($pdfFilePath, "D");
			}else{
				$this->session->set_flashdata('message','Error. Try again in hour.');
				$this->session->set_flashdata('type_message','danger');
				redirect('Users/Dashboard');
			}
		}else{
			$this->session->set_flashdata('message','Can not print, Have not made payment yet or payment has not been verified by the admin.');
			$this->session->set_flashdata('type_message','danger');
			redirect('Users/Dashboard');
		}
        
    }
}
