<?php 

class Search extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('m_pengunjung');
        $this->load->model('m_produk');
        $this->m_pengunjung->count_visitor();
        
	
    }

    function index(){
        $cari = $this->input->post('cari');
        $x['data']= $this->m_produk->get_all();
        $x['produk']=$this->m_produk->cari_produk($cari);
        $x['tot_desa']=$this->db->get('data_desa_terdaftar')->num_rows();
		$x['tot_relawan']=$this->db->get('relawan')->num_rows();
		$x['tot_usaha']=$this->db->get('profil_usaha')->num_rows();
		$x['tot_agenda']=$this->db->get('tbl_agenda')->num_rows();
        $this->load->view('depan/v_search',$x);

    }
    


}