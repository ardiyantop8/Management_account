<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umum extends CI_Controller {

	

	public function index()
	{
		$data['title'] = 'System Evoting RT005';

		$this->load->view('template/header-umum', $data);
		$this->load->view('template/topbar-umum', $data);
		$this->load->view('umum/home', $data);
		$this->load->view('template/footer-umum', $data);
	}

}