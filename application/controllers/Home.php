<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');  
		$this->load->model('m_produk');
		$this->load->model('m_datausaha');
		$this->load->model('m_galeri');
		$this->load->model('m_pengumuman');
		$this->load->model('m_agenda');
		$this->load->model('m_files');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
			$x['berita']=$this->m_tulisan->get_berita_home();
			$x['sambutan']=$this->m_tulisan->get_sambutan_home();
			$x['produk']=$this->m_produk->get_produk_home(4);
			$x['usaha']=$this->m_datausaha->get_data_usaha();
			$x['pengumuman']=$this->m_pengumuman->get_pengumuman_home();
			$x['agenda']=$this->m_agenda->get_agenda_home();
			$x['tot_desa']=$this->db->get('data_desa_terdaftar')->num_rows();
			$x['tot_relawan']=$this->db->get('relawan')->num_rows();
			$x['tot_usaha']=$this->db->get('profil_usaha')->num_rows();
			$x['tot_agenda']=$this->db->get('tbl_agenda')->num_rows();

			//Get Count of Kategori Usaha
			
			$x['tot_agribisnis']=$this->db->query('select *from data_kategori_usaha where id=1')->num_rows();
			$x['tot_mesin']=$this->db->query('select *from data_kategori_usaha where id=2')->num_rows();
			$x['tot_kesehatan']=$this->db->query('select *from data_kategori_usaha where id=3')->num_rows();

			$this->load->view('depan/v_home',$x);
	}

}
