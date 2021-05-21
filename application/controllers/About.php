<?php
class About extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		
		$x['tot_desa']=$this->db->get('data_desa_terdaftar')->num_rows();
		$x['tot_relawan']=$this->db->get('relawan')->num_rows();
		$x['tot_usaha']=$this->db->get('profil_usaha')->num_rows();
		$x['tot_agenda']=$this->db->get('tbl_agenda')->num_rows();
		$this->load->view('depan/v_about',$x);
	}
}
