<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_get('Asia/Jakarta');
		$this->load->model('International/Model_user');
		$this->load->model('International/Model_pembayaran');
		$this->load->model('International/Model_biodata');
		$this->load->model('International/Model_pilihan');
		$this->load->model('International/Model_kelulusan');
		$this->load->model('Settings/Model_jurusan');
		$this->load->model('Settings/Model_jalur_masuk');
		$this->load->model('Settings/Model_smtp');
	}
	public function index()
	{
		$viewUser = $this->Model_user->whereAnd(array('nik_passport'=>$this->session->userdata('nik')))->row();

		$search = array(
			'nomor_peserta' => $viewUser->nomor_peserta,
			'status_kelulusan' => 'LULUS',
		);
		$kelulusan = $this->Model_kelulusan->whereAnd($search);
		$kelulusan_row = $kelulusan->num_rows();
		$nama = $this->session->userdata('nama');
		if($kelulusan_row > 0){
			$viewKelulusan = $kelulusan->row();
			$data = array(
				'title' 	=> 'PMB UIN SGD BANDUNG | INTERNATIONAL',
				'content' 	=> 'dashboard/dashboard.php',
				'jurusan' 	=> $this->Model_jurusan->read()->result(),
				'kelulusan' => $viewKelulusan,
				'nama'		=> $nama,
			);
			$this->load->view('users/index', $data);
		}else{
			$data = array(
				'title' 	=> 'PMB UIN SGD BANDUNG | INTERNATIONAL',
				'content' 	=> 'dashboard/dashboard.php',
				'jurusan' 	=> $this->Model_jurusan->read()->result(),
				'kelulusan' => '',
				'nama'		=> $nama,
			);
			$this->load->view('users/index', $data);
		}
	}
}
