<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'My Profil';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();
		
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}
	public function edit()
	{
		$data['title'] = 'Edit Profil';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();

		$this->form_validation->set_rules('name', 'Full name', 'required');

		if ($this->form_validation->run() == false)
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('template/footer');	
		}	else
			{
				$name	= $this->input->post('name');
				$email	= $this->input->post('email');

				//cek gambar yang akan diupload
				$upload_image	= $_FILES['image']['name'];

				if ($upload_image) {
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']     = '2048';
					$config['upload_path'] = './assets/img/profile/';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('image')) {
						$old_image = $data['user']['image'];
						if ($old_image != 'default.jpg') {
							unlink(FCPATH . 'assets/img/profile/' . $old_image);
						}

						$new_image = $this->upload->data('file_name');
						$this->db->set('image', $new_image);
					} else {
						echo $this->upload->display_errors();
					}
				}

				$this->db->set('name',$name);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your Profile has been updated </div>');
				redirect('user');

			} 
		
	}

	public function changepassword()
	{
		$data['title'] = 'Ganti Password';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();

			$this->form_validation->set_rules('current_password', 'Current password', 'required|trim');
			$this->form_validation->set_rules('new_password1', 'New password', 'required|trim|min_length[3]|matches[new_password2]',[
				'required'		=> 'New password tidak boleh kosong',
				'trim'			=> 'New password tidak boleh menggunakan space',
				'min_length'	=> 'New password minimal 3 karakter',
				'matches'		=> 'New password tidak sama dengan repeat password' 
			]);
			$this->form_validation->set_rules('new_password2', 'Repeat new password', 'required|trim|min_length[3]|matches[new_password1]',[
				'required'		=> 'Repeat password tidak boleh kosong',
				'trim'			=> 'Repeat password tidak boleh menggunakan space',
				'min_length'	=> 'Repeat password minimal 3 karakter',
			]);

			if ($this->form_validation->run() == false)
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('template/footer');
		} else {
			$current_password   = $this->input->post('current_password');
			$new_password 		= $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong current password ! </div>');
				redirect('user/changepassword');
			} else {
				if($current_password == $new_password){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as current password ! </div>');
				redirect('user/changepassword');
				} else {
					//password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed ! </div>');
				redirect('user');
				}
			}
		}
			

	}//tutup function changepassword

}//tutup Class
