<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{     
		// ini untuk session gak boleh akses login kembali
		if ($this->session->userdata('username')){
			redirect('user');
		}

		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false){
			$data_title['title'] = 'Form Login';
			$this->load->view('template/auth-header', $data_title);
			$this->load->view('auth/login');
			$this->load->view('template/auth-footer');	
		} else {
			//validasinya lolos
			$this->_login();
		}
		
	}


	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',['username' => $username])->row_array();
		
		//usernya ada
		if($user) {
			//jika usernya aktif
			if($user['is_active'] == 1 ){
				//cek passwordnya
				if(password_verify($password, $user['password'])){
					$data = [
						'username' 	=> $user['username'],
						'role_id'	=> $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('Admin');	
					} else if ($user['role_id'] == 2) {
						redirect('Maker');	
					} else {
						redirect('pemilih');
					}
					
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password </div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username is not active </div>');
					redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username is not registered </div>');
			redirect('Auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name','Name', 'required',[
			'required'			=>'Nama lengkap harus diisi'
		]);
		$this->form_validation->set_rules('username','Username', 'required|trim|is_unique[user.username]',[
			'is_unique'			=> 'Username sudah terdaftar',
			'required'			=> 'Username harus diisi',
			'trim'				=> 'Spcae tidak diperbolehkan'
		]);
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique'			=> 'Email sudah terdaftar',
			'required'			=> 'Email harus diisi',
			'trim'				=> 'Space tidak diperbolehkan'
		]);
		$this->form_validation->set_rules('role','Role','required',[
			'required'			=> 'User harus diisi'
		]);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|max_length[20]|matches[password2]',[
				'matches' 		=> 'Password dont match !',
				'min_length'	=> 'Password too short',
				'max_length'	=> 'Password too long',
				'required'		=> 'Password harus diisi',
				'trim'			=> 'Space tidak diperbolehkan'
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
		$data['user'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
		if($this->form_validation->run() == false){
			$data['title'] = 'Form Registration';
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('auth/registration', $data);
			$this->load->view('template/footer');	
		} else{
			$data = [
				'username'		=> htmlspecialchars($this->input->post('username', true)),
				'name' 			=> htmlspecialchars($this->input->post('name', true)),
				'email' 		=> htmlspecialchars($this->input->post('email', true)),
				'image' 		=> 'default.jpg',
				'password'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id'		=> htmlspecialchars($this->input->post('role', true)),
				'is_active'		=> 1,
				'date_created'	=> time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Selamat data user telah ditambahkan. </div>');
			redirect('Auth/registration');
		}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You have been logged out </div>');
			redirect('Auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
