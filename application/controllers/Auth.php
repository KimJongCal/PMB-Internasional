<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
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
	public function index()
	{
		$this->load->view('Login');
	}
	public function Login()
	{
		$this->load->view('Login');
	}
	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('Auth/Login');
	}
	public function actionLogin(){
		/*$rules = [
			['field' => 'email',	'label' => 'Username', 'rules' => 'required'],
			['field' => 'password', 'label' => 'Password', 'rules' => 'required'],
		];
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('message',validation_errors());
			$this->session->set_flashdata('type_message','danger');
			redirect('Auth/Login');
		}else{*/
			$username 		= $this->input->post('email');
			$password 		= md5(md5($this->input->post('password')));
			$search = array(
				'username' => $username,
				'password' => $this->input->post('password'),
			);
			$tbUserLogin	= $this->Model_user->whereAnd($search);
			$login_num 		= $tbUserLogin->num_rows();
			if ($login_num > 0) {
				$login_row		= $tbUserLogin->row();
				$search2 = array(
					'nik_passport' => $tbUserLogin->nik_passport,
				);
				$tbUserBiodata	= $this->Model_biodata->whereAnd($search2);
				$biodata_row		= $tbUserBiodata->row();

				$search3 = array(
					'nik_passport' => $login_row->nik_passport,
				);
				$tbPilihan	= $this->Model_pilihan->whereAnd($search3);
				$pilihan_row		= $tbPilihan->row();

				$data = array(
					'nik'			=> $login_row->nik_passport,
					'kd_pembayaran'			=> $login_row->kd_pembayaran,
					'username'			=> $login_row->username,
					'nama'			=> $biodata_row->nama,
					'pilihan1'		=> $pilihan_row->jurusan_1,
					'pilihan2'		=> $pilihan_row->jurusan_2,
					'pilihan3'		=> $pilihan_row->jurusan_3,
				);
				$this->session->set_userdata($data);
            	redirect('Users/Dashboard');
			}else{
				$this->session->set_flashdata('message','Username, Password, Atau Jalur Masuk Salah');
				$this->session->set_flashdata('type_message','danger');
				redirect('Auth/Login');
			}
		/*}*/
	}

	public function Register(){
		/*$rules = [
			['field'	=> 'passport',			'label' => 'Passport',		'rules' => 'required'],
			['field'	=> 'nama',				'label' => 'Name',			'rules' => 'required'],
			['field'	=> 'tempat',			'label' => 'Place',			'rules' => 'required'],
			['field'	=> 'tglLahir',			'label' => 'Date of Birth',	'rules' => 'required'],
			['field'	=> 'jenisKelamin',		'label' => 'Gender',		'rules' => 'required'],
			['field'	=> 'alamat',			'label' => 'Address',		'rules' => 'required'],
			['field'	=> 'kebangsaan',		'label' => 'Nationality', 	'rules' => 'required'],
            ['field'	=> 'asalSekolah',		'label' => 'The Origin of The School', 	'rules' => 'required'],
			['field'	=> 'email',				'label' => 'Email', 		'rules' => 'required'],
			['field'	=> 'rekomendasi',		'label' => 'Recommendation'],
			['field'	=> 'dari',				'label' => 'From'],
			['field'	=> 'rekomendasiFile',	'label' => 'Recommended File'],
			['field'	=> 'pilihan1',			'label' => 'First Majors Selecion', 'rules' => 'required'],
			['field'	=> 'pilihan2',			'label' => 'Second Majors Selecion','rules' => 'required'],
			['field'	=> 'pilihan3',			'label' => 'Third Majors Selecion', 'rules' => 'required'],
		];
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('message', "ERROR VALIDATION");
			$this->session->set_flashdata('type_message','danger');
			redirect('Dashboard');
		}else{*/
			$idjurusan1 = array(
				'kode_jurusan' => $this->input->post('jurusan1'),
			);

			$idjurusan2 = array(
				'kode_jurusan' => $this->input->post('jurusan2'),
			);

			$idjurusan3 = array(
				'kode_jurusan' => $this->input->post('jurusan3'),
			);

			$jurusan1 	= $this->Model_jurusan->whereAnd($idjurusan1)->row();
			$jurusan2 	= $this->Model_jurusan->whereAnd($idjurusan2)->row();
			$jurusan3 	= $this->Model_jurusan->whereAnd($idjurusan3)->row();

			if($jurusan1->id_fakultas==$jurusan2->id_fakultas || $jurusan1->id_fakultas==$jurusan3->id_fakultas || $jurusan2->id_fakultas==$jurusan3->id_fakultas){
				$this->session->set_flashdata('message','may not choose majors in the same faculty.');
				$this->session->set_flashdata('type_message','warning');
				redirect('Dashboard/ErrorPage');
			}else{
				$passport 		= $this->input->post('noPassport');
				$nama 			= str_replace('\'', '`', strtoupper($this->input->post('nama')));
				$search = array(
					'nik_passport' => $passport,
				);
				$search2 = array(
					'id_jlr_msk' => 6,
				);
				$search3 = array(
					'id_smtp' => 1,
				);
				$User 	= $this->Model_user->whereAnd($search);
				$User2 	= $this->Model_user->whereAnd($search);
				$jalur_masuk 	= $this->Model_jalur_masuk->whereAnd($search2)->row();
				$waktu_kini 	= "".date("Y-m-d H:i:s");
						$User 	= $User->row();
						if ($User2->num_rows() > 0) {
							$this->session->set_flashdata('message','The data is already registered.');
							$this->session->set_flashdata('type_message','danger');
							redirect('Dashboard/ErrorPage');
						}else{
							$tbSMTP	= $this->Model_smtp->whereAnd($search3)->row();
							if ($tbSMTP->quota > 0) {
								if(!empty($this->input->post('fileRekom'))){
	 								$config['upload_path']          = './uploads/file/';
									$config['allowed_types']        = 'gif|jpg|png|GIF|JPG|PNG|doc|docx|pdf|PDF|DOC|DOCX';
									$config['max_size']             = 2000;

									$this->load->library('upload', $config);
		 							$this->upload->initialize($config);
									if ($this->upload->do_upload('fileRekom')) {
										$file = $this->upload->data();
										if($this->upload->do_upload('foto')){
											$foto = $this->upload->data();

											$this->db->select('RIGHT(tbl_international_user.kd_pembayaran,4) as kode', FALSE);
										  	$this->db->order_by('kd_pembayaran','DESC');    
										  	$this->db->limit(1);    
										  	$query = $this->db->get('tbl_international_user');
										  	if($query->num_rows() <> 0){      
										   		$data = $query->row();      
										   		$kode = intval($data->kode) + 1;    
										  	}
										  	else {      
										   		$kode = 1;    
										  	}
											$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
											$kodejadi = "40".$kodemax;

											$data5 = array(
												'nik_passport' 	=> $passport,
												'kd_pembayaran' => $kodejadi,
												'nomor_peserta' => "",
												'username' 		=> $this->input->post('email'),
												'password' 		=> substr(md5(md5($this->input->post('nik_passport'))),2, 7),
												'verifikasi' 	=> 'BELUM VERIFIKASI',
												'status' 		=> 'SUDAH DAFTAR',
												'status_bayar' 	=> 'BELUM BAYAR',
												'cetak'			=> 0,
												'foto'			=> $foto['file_name'],
												'date_created'	=> date('Y-m-d H:i:s'),
											);

											$data3 = array(
												'nik_passport'	=> $passport,
												'nama'			=> strtoupper($nama),
												'tempat'		=> strtoupper($this->input->post('tempat')),
												'tgl_lhr'		=> $this->input->post('tglLahir'),
												'jenis_kelamin'	=> $this->input->post('jenisKelamin'),
												'alamat'		=> strtoupper($this->input->post('alamat')),
												'warga_negara'	=> "WNA",
												'kebangsaan'	=> strtoupper($this->input->post('kebangsaan')),
												'asal_sekolah'	=> strtoupper($this->input->post('asalSekolah')),
												'rekomendasi'	=> $this->input->post('rekomendasi'),
												'rekomendasi_dari'	=> strtoupper($this->input->post('rekomendasi_dari')),
												'rekomendasi_file'	=> $file['file_name'],
												'noHp'			=> $this->input->post('phone'),
											);

											$data4 = array(
												'nik_passport'	=> $passport,
												'jurusan_1'		=> $this->input->post('jurusan1'),
												'jurusan_2'		=> $this->input->post('jurusan2'),
												'jurusan_3'		=> $this->input->post('jurusan3'),
											);

											if ($this->Model_user->create($data5)) {
				                            	if($this->Model_biodata->create($data3)){
				                            		if($this->Model_pilihan->create($data4)){
				                            			$tbUser = $this->Model_user->whereBiodata($passport)->row();
														$data 			= array(
															'kd_pembayaran' => $tbUser->kd_pembayaran, 
															'nik_passport' 	=> $tbUser->nik_passport, 
															'nama' 			=> $tbUser->nama, 
															'jenis_kelamin' 	=> $tbUser->jenis_kelamin, 
															'password'		=> $tbUser->password,
															'tempat' 	=> $tbUser->tempat, 
															'tgl_lahir' 	=> $tbUser->tgl_lhr, 
															'email' 		=> $tbUser->username, 
															'kebangsaan' 	=> $tbUser->kebangsaan, 
															'status' 		=> $tbUser->status,
														);												
														$html = $this->load->view('users/email/email', $data, TRUE);
														/* SMTP GOOGLE */
														$config = array(
															'protocol' 		=> 'smtp',
															'smtp_host' 	=> 'ssl://smtp.gmail.com',
															'smtp_port' 	=> 465,
															'smtp_timeout' 	=> 400,
															'smtp_user' 	=> $tbSMTP->username,
															'smtp_pass' 	=> $tbSMTP->password,
															'charset' 		=> 'utf-8',
															'newline' 		=> "\r\n",
															'mailtype' 		=> 'html',
															'validation' 	=> TRUE,
														);
														$this->email->initialize($config);
														$this->email->from($config['smtp_user'],'PMB UIN SGD BANDUNG');
														$this->email->to($this->input->post('email'));
														$this->email->subject('Penerimaan Mahasiswa Baru Jalur Ujian Mandiri');
														$this->email->message($html);
														if (!$this->email->send()) {
															$this->session->set_flashdata('message',$this->email->print_debugger());
															$this->session->set_flashdata('type_message','danger');
															redirect('Dashboard/ErrorPage');
														}else{
															$email_quota = array('quota' => $tbSMTP->quota - 1);
															if ($this->Model_smtp->update($tbSMTP->id_email,$email_quota)) {
																$this->session->set_flashdata('message',"Registration Success <br> Check on Inbox or SPAM in your Email. ");
																$this->session->set_flashdata('type_message','success');
																redirect('Dashboard/SuccessPage');
															}else{
																$this->session->set_flashdata('message','Error Update Email');
																$this->session->set_flashdata('type_message','danger');
																redirect('Dashboard/ErrorPage');
															}
														}
				                            		}else{
						                                $this->session->set_flashdata('message','An error occurred in the data input 1.');
						                                $this->session->set_flashdata('type_message','danger');
						                                redirect('Dashboard/ErrorPage');
						                            }
				                            	}else{
					                                $this->session->set_flashdata('message','An error occurred in the data input 2.');
					                                $this->session->set_flashdata('type_message','danger');
					                                redirect('Dashboard/ErrorPage');
					                            }
											}else{
												$this->session->set_flashdata('message','An error occurred in the data input 4.');
												$this->session->set_flashdata('type_message','danger');
												redirect('Dashboard/ErrorPage');
											}
										}else{
											$this->session->set_flashdata('message','An error occurred in the upload file.');
											$this->session->set_flashdata('type_message','danger');
											redirect('Dashboard/ErrorPage');
										}
							        } else {
							            $this->session->set_flashdata('message','An error occurred in the upload foto.');
										$this->session->set_flashdata('type_message','danger');
										redirect('Dashboard/ErrorPage');
							        }
	 							}else{
	 								$config['upload_path']          = './uploads/file/';
									$config['allowed_types']        = 'gif|jpg|png|GIF|JPG|PNG|doc|docx|pdf|PDF|DOC|DOCX|JPEG|jpeg';
									$config['max_size']             = 2000;

									$this->load->library('upload', $config);
		 							$this->upload->initialize($config);
									if($this->upload->do_upload('foto')){
										$foto = $this->upload->data();

										$this->db->select('RIGHT(tbl_international_user.kd_pembayaran,4) as kode', FALSE);
									  	$this->db->order_by('kd_pembayaran','DESC');    
									  	$this->db->limit(1);    
									  	$query = $this->db->get('tbl_international_user');
									  	if($query->num_rows() <> 0){      
									   		$data = $query->row();      
									   		$kode = intval($data->kode) + 1;    
									  	}
									  	else {      
									   		$kode = 1;    
									  	}
										$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
										$kodejadi = "40".$kodemax;

										$data5 = array(
											'nik_passport' 	=> $passport,
											'kd_pembayaran' => $kodejadi,
											'nomor_peserta' => "",
											'username' 		=> $this->input->post('email'),
											'password' 		=> substr(md5(md5($this->input->post('nik_passport'))),2, 7),
											'verifikasi' 	=> 'BELUM VERIFIKASI',
											'status' 		=> 'SUDAH DAFTAR',
											'status_bayar' 	=> 'BELUM BAYAR',
											'cetak'			=> 0,
											'foto'			=> $foto['file_name'],
											'date_created'	=> date('Y-m-d H:i:s'),
										);

										$data3 = array(
											'nik_passport'	=> $passport,
											'nama'			=> strtoupper($nama),
											'tempat'		=> strtoupper($this->input->post('tempat')),
											'tgl_lhr'		=> $this->input->post('tglLahir'),
											'jenis_kelamin'	=> $this->input->post('jenisKelamin'),
											'alamat'		=> strtoupper($this->input->post('alamat')),
											'warga_negara'	=> "WNA",
											'kebangsaan'	=> strtoupper($this->input->post('kebangsaan')),
											'asal_sekolah'	=> strtoupper($this->input->post('asalSekolah')),
											'rekomendasi'	=> $this->input->post('rekomendasi'),
											'rekomendasi_dari'	=> strtoupper($this->input->post('rekomendasi_dari')),
											'noHp'			=> $this->input->post('phone'),
										);

										$data4 = array(
											'nik_passport'	=> $passport,
											'jurusan_1'		=> $this->input->post('jurusan1'),
											'jurusan_2'		=> $this->input->post('jurusan2'),
											'jurusan_3'		=> $this->input->post('jurusan3'),
										);

										if ($this->Model_user->create($data5)) {
			                            	if($this->Model_biodata->create($data3)){
			                            		if($this->Model_pilihan->create($data4)){
			                            			$tbUser = $this->Model_user->whereBiodata($passport)->row();
													$data 			= array(
														'kd_pembayaran' => $tbUser->kd_pembayaran, 
														'nik_passport' 	=> $tbUser->nik_passport, 
														'nama' 			=> $tbUser->nama, 
														'jenis_kelamin' 	=> $tbUser->jenis_kelamin, 
														'password'		=> $tbUser->password,
														'tempat' 	=> $tbUser->tempat, 
														'tgl_lahir' 	=> $tbUser->tgl_lhr, 
														'email' 		=> $tbUser->username, 
														'kebangsaan' 	=> $tbUser->kebangsaan, 
														'status' 		=> $tbUser->status,
													);												
													$html = $this->load->view('users/email/email', $data, TRUE);
													/* SMTP GOOGLE */
													$config = array(
														'protocol' 		=> 'smtp',
														'smtp_host' 	=> 'ssl://smtp.gmail.com',
														'smtp_port' 	=> 465,
														'smtp_timeout' 	=> 400,
														'smtp_user' 	=> $tbSMTP->username,
														'smtp_pass' 	=> $tbSMTP->password,
														'charset' 		=> 'utf-8',
														'newline' 		=> "\r\n",
														'mailtype' 		=> 'html',
														'validation' 	=> TRUE,
													);
													$this->email->initialize($config);
													$this->email->from($config['smtp_user'],'PMB UIN SGD BANDUNG');
													$this->email->to($this->input->post('email'));
													$this->email->subject('Penerimaan Mahasiswa Baru Jalur Ujian Mandiri');
													$this->email->message($html);
													if (!$this->email->send()) {
														$this->session->set_flashdata('message',$this->email->print_debugger());
														$this->session->set_flashdata('type_message','danger');
														redirect('Dashboard/ErrorPage');
													}else{
														$email_quota = array('quota' => $tbSMTP->quota - 1);
														if ($this->Model_smtp->update($tbSMTP->id_email,$email_quota)) {
															$this->session->set_flashdata('message',"Registration Success <br> Check on Inbox or SPAM in your Email. ");
															$this->session->set_flashdata('type_message','success');
															redirect('Dashboard/SuccessPage');
														}else{
															$this->session->set_flashdata('message','Error Update Email');
															$this->session->set_flashdata('type_message','danger');
															redirect('Dashboard/ErrorPage');
														}
													}
			                            		}else{
					                                $this->session->set_flashdata('message','An error occurred in the data input 1.');
					                                $this->session->set_flashdata('type_message','danger');
					                                redirect('Dashboard/ErrorPage');
					                            }
			                            	}else{
				                                $this->session->set_flashdata('message','An error occurred in the data input 2.');
				                                $this->session->set_flashdata('type_message','danger');
				                                redirect('Dashboard/ErrorPage');
				                            }
										}else{
											$this->session->set_flashdata('message','An error occurred in the data input 4.');
											$this->session->set_flashdata('type_message','danger');
											redirect('Dashboard/ErrorPage');
										}
									}else{
										$this->session->set_flashdata('message','An error occurred in the upload file.');
										$this->session->set_flashdata('type_message','danger');
										redirect('Dashboard/ErrorPage');
									}
	 							}
							}
						}
			}

			
		/*}*/
	}

	public function get_client_ip(){
		$ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}
}
