<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu` .*, `user_menu` . `menu` 
				  FROM   `user_sub_menu` JOIN  `user_menu`
				  ON 	 `user_sub_menu`. `menu_id` = `user_menu` . `id`
				 ";
		return $this->db->query($query)->result_array();
	}

	public function getDataPemilih()

	{
		$hasil=$this->db->query("SELECT * FROM user WHERE role_id = 3");

            return $hasil;
	}

	public function getDataKandidat()

	{
		$hasil=$this->db->query("SELECT * FROM user WHERE role_id = 2");

            return $hasil;
	}

	public function lihatkandidat($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function hapus_data_pemilih($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function hapus_data_kandidat($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function hapus_role($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function detail_data_pemilih($id_user = NULL)
	{
		$query 			= $this->db->get_where('user', array('id_user' =>$id_user))->row();
		return $query;
	}

	
}