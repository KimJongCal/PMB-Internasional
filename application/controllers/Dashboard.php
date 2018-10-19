<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_get('Asia/Jakarta');
		$this->load->model('Settings/Model_jurusan');
		$this->load->model('Settings/Model_negara');
	}

	public function index()
	{
		$data = array(
			'title' 	=> 'PMB UIN SGD BANDUNG | INTERNATIONAL',
			'content' 	=> 'dashboard/dashboard.php',
			'jurusan' 	=> $this->Model_jurusan->read()->result(),
			'negara' 	=> $this->Model_negara->read()->result(),
		);
		$this->load->view('index', $data);
	}

	public function SuccessPage()
	{
		$data = array(
			'title' 	=> 'PMB UIN SGD BANDUNG | INTERNATIONAL',
		);
		$this->load->view('page/sukses', $data);
	}

	public function ErrorPage()
	{
		$data = array(
			'title' 	=> 'PMB UIN SGD BANDUNG | INTERNATIONAL',
		);
		$this->load->view('page/error', $data);
	}
}
