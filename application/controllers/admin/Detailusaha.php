<?php
class Detailusaha extends CI_Controller{
    function __construct(){
        parent::__construct();
        
        if($this->session->userdata('masuk') !=TRUE){
                $url=base_url('administrator');
                redirect($url);
        };

        $this->load->model('m_profil_usaha');
        $this->load->model('m_produk');
        $this->load->model('m_datausaha');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

    function daftar(){
        $where = [];
        $where['deleted_at'] = '0000-00-00 00:00:00';
        $where_kecamatan = [];
        $where_kecamatan['deleted_at'] = '0000-00-00 00:00:00';

        if($this->input->get('kab')){
            $kabupaten = str_replace("%20", " ", $this->input->get('kab'));
            $where['kabupaten'] = $this->input->get('kab') ?? $kabupaten;
            $where_kecamatan['kabupaten'] = $this->input->get('kab') ?? $kabupaten;
        }

        if($this->input->get('kecamatan'))
        {
            $kecamatan = str_replace("%20", " ", $this->input->get('kecamatan'));
            $where_kecamatan['kecamatan'] = $this->input->get('kecamatan') ?? $kecamatan;
        }

        $kabupaten = $this->db->select('kabupaten')->group_by('kabupaten')->get_where('data_usaha', ['deleted_at' => '0000-00-00 00:00:00'])->result();
        $kecamatan = $this->db->select('kecamatan')->group_by('kecamatan')->get_where('data_usaha', $where)->result();
        $desa = $this->db->select('desa')->group_by('desa')->get_where('data_usaha', $where_kecamatan)->result();
        $jenis_usaha = $this->db->select('jenis_usaha')->group_by('jenis_usaha')->get_where('data_usaha', ['deleted_at' => '0000-00-00 00:00:00'])->result();
        $komoditas = $this->db->select('komoditas')->group_by('komoditas')->get_where('data_usaha', ['deleted_at' => '0000-00-00 00:00:00'])->result();

        $this->load->view('admin/v_detail_usaha', ['kabupaten' => $kabupaten , 'kecamatan' => $kecamatan, 'desa' => $desa, 'jenis_usaha' => $jenis_usaha, 'komoditas' => $komoditas]);
    }

    function detail($kode){
        $x['data'] = $this->m_datausaha->get_usaha_by_kode($kode)->row();
        $x['produk']=$this->m_produk->get_produk_home_byusaha($kode);
        $this->load->view('admin/v_detail_profil_usaha',$x); 
    }

    public function datatables($kab = null){
        if($this->input->is_ajax_request()){
            $this->load->helper('datatable_column');
            header('Content-Type: application/json');
            
            $where['deleted_at'] = '0000-00-00 00:00:00';
            
            if($this->input->get('kabupaten')) 
            {
                $where['kabupaten'] = str_replace([['%20', '+'], '+'], ' ',$kab);
            }

            if($this->input->get('kecamatan')){
                $where['kecamatan'] = str_replace(['%20', '+'], ' ', $this->input->get('kecamatan'));
            }

            if($this->input->get('desa'))
            {
                $where['desa'] = str_replace(['%20', '+'], ' ', $this->input->get('desa'));
            }

            if($this->input->get('jenis_usaha'))
            {
                $where['jenis_usaha'] = str_replace(['%20', '+'], ' ', $this->input->get('jenis_usaha'));
            }

            if($this->input->get('komoditas'))
            {
                $where['komoditas'] = str_replace(['%20', '+'], ' ', $this->input->get('komoditas'));
            }

            $this->datatables->select('id_usaha,created_at,no_izin,nama_usaha,tahun_berdiri,jenis_usaha,kabupaten,kecamatan,desa,alamat,komoditas');
            $this->datatables->from('data_usaha');
            $this->datatables->where($where);
            $this->datatables->add_column('action', '$1','action_profil(id_usaha)');
            echo $this->datatables->generate();
        } else {
            header('Content-Type: application/json');

            $this->datatables->select('*');
            $this->datatables->from('data_usaha');
            echo $this->datatables->generate();
        }
    }

    public function datatables_produk($id_usaha){
        if($this->input->is_ajax_request()){
            $this->load->helper('datatable_column');
            header('Content-Type: application/json');
            $this->datatables->select('id_produk,id_usaha,photo,nama_produk,jenis_produk,harga,jml_produksi_bulanan,deskripsi');
            $this->datatables->from('data_produk');
            $array = array('deleted_at' => '0000-00-00 00:00:00', 'id_usaha' => $id_usaha);
            $this->datatables->where($array);
            $this->datatables->add_column('photo', '$1','photo_produk(photo)');
            $this->datatables->add_column('harga', '$1','format_rupiah(harga)');
            echo $this->datatables->generate();
        } else {
            header('Content-Type: application/json');
            $this->datatables->select('*');
            $this->datatables->from('data_produk');
            echo $this->datatables->generate();
        }
    }

    public function datatables_legalitas($id_usaha){
        if($this->input->is_ajax_request()){
            $this->load->helper('datatable_column');
            header('Content-Type: application/json');
                  
            $this->datatables->select('id_legalitas,no_izin,nama_izin,th_izin');
            $this->datatables->from('data_legalitas');
            $array = array('deleted_at' => '0000-00-00 00:00:00', 'id_usaha' => $id_usaha);
            $this->datatables->where($array);
            echo $this->datatables->generate();
        } else {
            header('Content-Type: application/json');
            $this->datatables->select('*');
            $this->datatables->from('data_legalitas');
            echo $this->datatables->generate();
        }
    }

    public function datatables_bantuan($id_usaha)
    {
        if($this->input->is_ajax_request()){
            $this->load->helper('datatable_column');
            header('Content-Type: application/json');
            
            $this->datatables->select('id_bantuan,asal_bantuan,jenis_bantuan');
            $this->datatables->from('data_bantuan');
            $array = array('deleted_at' => '0000-00-00 00:00:00', 'id_usaha' => $id_usaha);
            $this->datatables->where($array);
            echo $this->datatables->generate();
        } else {
            header('Content-Type: application/json');
            $this->datatables->select('*');
            $this->datatables->from('data_bantuan');
            echo $this->datatables->generate();
        }
    }
}

?>