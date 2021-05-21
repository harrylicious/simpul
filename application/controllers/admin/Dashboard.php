<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengunjung');
		$this->load->model('m_datausaha');
	}
	function index(){
		if($this->session->userdata('akses')=='1'){
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
			$x['data']=$this->m_datausaha->get_all_based_kabupaten();
			$x['tot_desa']=$this->db->get('data_desa_terdaftar')->num_rows();
			$x['tot_produk']=$this->db->get('produk')->num_rows();
			$x['tot_usaha']=$this->db->get('data_usaha')->num_rows();
			$x['tot_pemasaran']=$this->db->get('produk')->num_rows();
			$x['jenis_usaha'] = $this->db->select('jenis_usaha, COUNT(id_usaha) as jumlah_jenis_usaha')->group_by('jenis_usaha')->get_where('data_usaha', ['deleted_at' => '0000-00-00 00:00:00'])->result();
			$x['komoditas'] = $this->db->select('komoditas, COUNT(id_usaha) as jumlah_komoditas')->group_by('komoditas')->get_where('data_usaha', ['deleted_at' => '0000-00-00 00:00:00'])->result();
			$this->load->view('admin/v_dashboard',$x);
		}else{
			redirect('administrator');
		}
	
	}
	
}