<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{

	}

	public function Hasilvoting()
	{
		$data['title'] = 'Hasil Voting';
		$data['user'] = $this->db->get_where('user',['nik' => $this->session->userdata('nik')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('laporan/hasilvoting', $data);
		$this->load->view('template/footer');
	}
}