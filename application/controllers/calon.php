<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Home';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('calon/index', $data);
		$this->load->view('template/footer');		
	}

	public function Myprofil()
	{
		

		$data['title'] = 'Profil';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();
		$data['visimisi'] = $this->db->get_where('visimisi',['id_visimisi' => $this->session->userdata('nik')])->row_array();
		
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('calon/Myprofil', $data);
		$this->load->view('template/footer');
	}

	public function editprofil()
	{
		$data['title'] = 'Edit Profil';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
			'required'		=> 'Email tidak boleh kosong',
			'valid_email'	=> 'Email tidak valid',
			'trim'			=> 'Space tidak diperbolehkan'
		]);
		$this->form_validation->set_rules('name', 'Full name', 'required|max_length[25]|min_length[3]',[
			'required'		=> 'Full name tidak boleh kosong',
			'min_length'	=> 'Full name minimal 3 karakter',
			'max_length'	=> 'Full name maksimum 25 karakter'
		]);

		if ($this->form_validation->run() == false)
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('calon/editprofil', $data);
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

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profil kamu sudah diperbarui. </div>');
				redirect('calon/myprofil');

			} 
	}

	public function visimisi()
	{

		$this->form_validation->set_rules('jenis_klmn','Jenis Kelamin', 'required',[
			'required'			=>'Jenis kelamin harus dipilih'
		]);
		$this->form_validation->set_rules('pendidikan','Pendidikan', 'required',[
			'required'			=>'Pendidikan harus dipilih'
		]);
		$this->form_validation->set_rules('visi','Visi', 'required|min_length[10]',[
			'required'			=>'Visi harus diisi',
			'min_length'		=>'Harus lebih dari 10 karakter'
		]);
		$this->form_validation->set_rules('misi','Misi', 'required|min_length[10]',[
			'required'			=>'Misi harus diisi',
			'min_length'		=>'Harus lebih dari 10 karakter'
		]);
		$data['title'] = 'Visi Misi';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();

		$this->form_validation->set_rules('name', 'Full name', 'required');

		if ($this->form_validation->run() == false)
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('calon/visimisi', $data);
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
				$this->db->update('visimisi');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your Profile has been updated </div>');
				redirect('calon');

			} 
		
	}

	public function simpanvisimisi()
	{
		
		$data = [
				'id_user'		=> htmlspecialchars($this->input->post('id_user', true)),
				'name' 			=> htmlspecialchars($this->input->post('name', true)),
				'jenis_klmn' 	=> htmlspecialchars($this->input->post('jenis_klmn', true)),			
				'pendidikan'	=> htmlspecialchars($this->input->post('pendidikan', true)),
				'visi'			=> htmlspecialchars($this->input->post('visi', true)),
				'misi'			=> htmlspecialchars($this->input->post('misi', true)),
				'date_created'	=> time()
			];


		$this->db->insert('visimisi', $data);
		redirect('calon/index');	
		

		
	}

	

} //  Tutup Class