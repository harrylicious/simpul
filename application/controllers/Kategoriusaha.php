<?php
class Kategoriusaha extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_kategori_usaha');
		$this->load->helper('download');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['agro']=$this->m_kategori_usaha->get_sub_kategori_usaha(1);
		$x['mesin']=$this->m_kategori_usaha->get_sub_kategori_usaha(2);
		$x['kesehatan']=$this->m_kategori_usaha->get_sub_kategori_usaha(3);
		$x['alat']=$this->m_kategori_usaha->get_sub_kategori_usaha(4);
		$x['kerajinan']=$this->m_kategori_usaha->get_sub_kategori_usaha(5);
		$x['furnitur']=$this->m_kategori_usaha->get_sub_kategori_usaha(6);
		$x['produk']=$this->m_kategori_usaha->get_sub_kategori_usaha(7);
		$x['jasa']=$this->m_kategori_usaha->get_sub_kategori_usaha(8);
		$x['olahan']=$this->m_kategori_usaha->get_sub_kategori_usaha(9);
		$x['perlengkapan']=$this->m_kategori_usaha->get_sub_kategori_usaha(10);
		$x['kursus']=$this->m_kategori_usaha->get_sub_kategori_usaha(11);
		$x['olahraga']=$this->m_kategori_usaha->get_sub_kategori_usaha(12);
		$x['properti']=$this->m_kategori_usaha->get_sub_kategori_usaha(13);
		$x['otomotif']=$this->m_kategori_usaha->get_sub_kategori_usaha(14);

		$x['tot_agro']=$this->m_kategori_usaha->get_sub_kategori_usaha(1)->num_rows();
		$x['tot_mesin']=$this->m_kategori_usaha->get_sub_kategori_usaha(2)->num_rows();
		$x['tot_kesehatan']=$this->m_kategori_usaha->get_sub_kategori_usaha(3)->num_rows();
		$x['tot_alat']=$this->m_kategori_usaha->get_sub_kategori_usaha(4)->num_rows();
		$x['tot_kerajinan']=$this->m_kategori_usaha->get_sub_kategori_usaha(5)->num_rows();
		$x['tot_furnitur']=$this->m_kategori_usaha->get_sub_kategori_usaha(6)->num_rows();
		$x['tot_produk']=$this->m_kategori_usaha->get_sub_kategori_usaha(7)->num_rows();
		$x['tot_jasa']=$this->m_kategori_usaha->get_sub_kategori_usaha(8)->num_rows();
		$x['tot_olahan']=$this->m_kategori_usaha->get_sub_kategori_usaha(9)->num_rows();
		$x['tot_perlengkapan']=$this->m_kategori_usaha->get_sub_kategori_usaha(10)->num_rows();
		$x['tot_kursus']=$this->m_kategori_usaha->get_sub_kategori_usaha(11)->num_rows();
		$x['tot_olahraga']=$this->m_kategori_usaha->get_sub_kategori_usaha(12)->num_rows();
		$x['tot_properti']=$this->m_kategori_usaha->get_sub_kategori_usaha(13)->num_rows();
		$x['tot_otomotif']=$this->m_kategori_usaha->get_sub_kategori_usaha(14)->num_rows();
		$this->load->view('depan/v_kategori_usaha',$x); 
	}

	function detail(){
		$this->load->view('depan/v_kategori_usaha'); 
	}


}
