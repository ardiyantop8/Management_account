<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		
	}


	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();
		$data['datapemilih'] =  $this->db->from('user')->where('role_id', '3')->count_all_results();
		$data['datakandidat'] =  $this->db->from('user')->where('role_id', '2')->count_all_results();
		$data['datasubmenu'] =  $this->db->from('user_sub_menu')->where('is_active', '1')->count_all_results();
		$data['datamenupublik'] =  $this->db->from('menu_publik')->where('is_active', '1')->count_all_results();
		
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();
									   
									  // nama table    ambil semua = result
		$data['role']	= $this->db->get('user_role')->result_array();
 
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('template/footer');
	}

	public function roleaccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();
									   
									  // nama table    ambil semua = result
		$data['role']	= $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu']	= $this->db->get('user_menu')->result_array();
 
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('template/footer');
	}

	public function changeAccess()
	{
		$menu_id	= $this->input->post('menuId');
		$role_id	= $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id 
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1 ) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access Change </div>');
	}

	public function datapemilih()
	{
		$data['title'] = 'Data Pemilih'; 
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();

		$this->load->model('Menu_model', 'menu');
		$data['getpemilih'] =$this->menu->getDataPemilih();
		

 
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/data_pemilih', $data);
		$this->load->view('template/footer');
	}

	public function datakandidat()
	{
		$data['title'] = 'Data Kandidat'; 
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();

		$this->load->model('Menu_model', 'menu');
		$data['getkandidat'] =$this->menu->getDataKandidat();
		

 
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/data_kandidat', $data);
		$this->load->view('template/footer');
	}

	public function lihatkandidat($id_user)
	{
		$where = array('id_user =>$id_user');
		$data['lihat'] = $this->menu->lihatkandidat($where,'user')->result();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/lihat_kandidat', $data);
		$this->load->view('template/footer');
	}

	public function hapus_data_pemilih($id_user)
	{
		$where = array ('id_user' => $id_user);
		$this->load->model('Menu_model', 'menu');
		$this->menu->hapus_data_pemilih($where, 'user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data pemilih telah dihapus. </div>');
			redirect('admin/datapemilih');
	}
	public function hapus_data_kandidat($id_user)
	{
		$where = array ('id_user' => $id_user);
		$this->load->model('Menu_model', 'menu');
		$this->menu->hapus_data_kandidat($where, 'user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data kandidat telah dihapus. </div>');
			redirect('admin/datakandidat');
	}

	public function hapus_role($id)
	{
		$where = array ('id' => $id);
		$this->load->model('Menu_model', 'menu');
		$this->menu->hapus_role($where, 'user_role');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data role telah dihapus. </div>');
			redirect('admin/role');
	}

	public function lihat_data_pemilih($id_user)
	{
		$data['title'] = 'Detail data pemilih';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();
		$this->load->model('Menu_model', 'menu');
		$detail 		= $this->menu->detail_data_pemilih($id_user);
		$data['detail'] = $detail;

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/lihat_data_pemilih', $data);
		$this->load->view('template/footer'); 

	}

	
}