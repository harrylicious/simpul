<?php

class Usaha extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_profil_usaha');
        $this->load->model('m_produk');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

    function index()
    {
        $x['data']= $this->m_profil_usaha->get_all();
        $this->load->view('admin/v_usaha',$x);
    }
    
    function hapus_umkm(){
        $kode=$this->input->post('kode');
        $this->m_profil_usaha->delete($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('admin/usaha');
    }

    function print($id)
    {
        $usaha = $this->m_profil_usaha->get_by_id($id)->row();

        if(!$usaha)
        {
            $this->session->set_flashdata('error_msg','Usaha tidak ditemukan');
            redirect('admin/usaha');
        }

        $produk = $this->m_produk->get_produk_home_byusaha($id);

        $this->load->view('admin/v_print_usaha', ['usaha' => $usaha, 'produk' => $produk]);
    }

    function rangkuman()
    {
        $x['data']= $this->m_profil_usaha->get_all();
        $this->load->view('admin/v_rangkuman_usaha',$x);
    }
  
    public function datatables()
    {
        if($this->input->is_ajax_request()){
            $this->load->helper('datatable_column');
            header('Content-Type: application/json');
            $this->datatables->select('id_usaha, created_at, no_izin,nama_usaha,tahun_berdiri,jenis_usaha,kabupaten,kecamatan,desa,alamat,komoditas');
            $this->datatables->from('data_usaha');

            if($this->input->get('kabupaten'))
            {
                $this->datatables->where('kabupaten', $this->input->get('kabupaten'));
            }

            elseif($this->input->get('kecamatan'))
            {
                $this->datatables->where('kecamatan', $this->input->get('kecamatan'));
            }

            elseif($this->input->get('desa'))
            {
                $this->datatables->where('desa', $this->input->get('desa'));
            }

            $this->datatables->where('deleted_at','0000-00-00 00:00:00');
            
            $this->datatables->add_column('action', '$1','actionUmkm(id_usaha)');
            echo $this->datatables->generate();
        } else {
            header('Content-Type: application/json');
            $this->datatables->select('*');
            $this->datatables->from('data_usaha');
            
            echo $this->datatables->generate();
        }
    }

    public function datatables_kab()
    {
        if($this->input->is_ajax_request()){
            $this->load->helper('datatable_column');
            header('Content-Type: application/json');

            $this->datatables->select('kabupaten , COUNT(*) as jml');
            $this->datatables->from('data_usaha');
            $this->datatables->group_by('kabupaten'); 
            $this->datatables->where('deleted_at','0000-00-00 00:00:00');
            
            $this->datatables->add_column('action', '$1', 'action_usaha_kabupaten(kabupaten)')<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function users_get()
    {
        // Users from a data store e.g. database
        $users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
        ];

        $id = $this->get( 'id' );

        if ( $id === null )
        {
            // Check if the users data store contains users
            if ( $users )
            {
                // Set the response and exit
                $this->response( $users, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No users were found'
                ], 404 );
            }
        }
        else
        {
            if ( array_key_exists( $id, $users ) )
            {
                $this->response( $users[$id], 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No such user found'
                ], 404 );
            }
        }
    }
}
;
            echo $this->datatables->generate();
        }
    }

    public function datatables_kec()
    {
        if($this->input->is_ajax_request()){
            $this->load->helper('datatable_column');
            header('Content-Type: application/json');

            $this->datatables->select('kecamatan , COUNT(*) as jml');
            $this->datatables->from('data_usaha');
            $this->datatables->group_by('kecamatan'); 
            $this->datatables->where('deleted_at','0000-00-00 00:00:00');
            
            $this->datatables->add_column('action', '$1', 'action_usaha_kecamatan(kecamatan)');
            echo $this->datatables->generate();
        }
    }

    public function datatables_des()
    {
        if($this->input->is_ajax_request()){
            $this->load->helper('datatable_column');
            header('Content-Type: application/json');

            $this->datatables->select('desa , COUNT(*) as jml');
            $this->datatables->from('data_usaha');
            $this->datatables->group_by('desa'); 
            $this->datatables->where('deleted_at','0000-00-00 00:00:00');
            
            $this->datatables->add_column('action', '$1', 'action_usaha_desa(desa)');
            echo $this->datatables->generate();
        }
    }

    public function Edit()
    {
          $kode=$this->uri->segment(4);
          $x['kab']= $this->m_profil_usaha->get_kabupaten();
          $x['jenis']= $this->m_profil_usaha->get_data_jenis_usaha();
          $x['milik']= $this->m_profil_usaha->get_status();
          $x['modal'] =$this->m_profil_usaha->get_sumber_modal();
          $x['profil'] = $this->m_profil_usaha->get_by_id($kode);
          $x['produk'] = $this->m_produk->get_produk_by_id($kode);
          $this->load->view('admin/v_edit_umkm_ikm',$x);
    }

    public function update(){
        $id_usaha = $this->input->post("id_usaha");
        $nama_usaha = $this->input->post("nama_usaha"); 
        $no_izin = $this->input->post("no_izin");
        $tahun_berdiri = $this->input->post("tahun_berdiri");
        $nama_pimpinan = $this->input->post("nama_pimpinan");
        $nik_pimpinan = $this->input->post("nik_pimpinan");
        $jenis_usaha = $this->input->post("jenis_usaha");
        $luas_lahan = $this->input->post("luas_lahan");
        $status_kepemilikan = $this->input->post("status_kepemilikan");
        $kepemilikan_koperasi = $this->input->post("kepemilikan_koperasi");
        $kabupaten = $this->input->post("kabupaten");
        $kecamatan = $this->input->post("kecamatan");
        $desa = $this->input->post("desa");
        $alamat = $this->input->post("alamat");
        $fax = $this->input->post("fax");
        $no_hp =$this->input->post("no_hp");
        $email =$this->input->post("email");
        $website = $this->input->post("website");
        $lat = $this->input->post("lat");
        $lng = $this->input->post("lng"); 
        $sumber_modal = $this->input->post("sumber_modal");
        $total_modal= $this->input->post("total_modal");
        $nilai_produksi =$this->input->post("nilai_produksi");
        $nilai_investasi =$this->input->post("nilai_investasi");
        $nilai_bahan_baku = $this->input->post("nilai_bahan_baku");
        $produk_unggulan = $this->input->post("produk_unggulan");
        $jumlah_tenaga_kerja = $this->input->post("jumlah_tenaga_kerja");
        $rerata_biaya = $this->input->post("rerata_biaya");
        $model_penggajian = $this->input->post("model_penggajian");
        $nominal_gaji_perbulan = $this->input->post("nominal_gaji_perbulan");
        $nominal_gaji_perhari = $this->input->post("nominal_gaji_perhari");
        $nominal_omzet = $this->input->post("nominal_omzet");
        $pendapatan_harian = $this->input->post("pendapatan_harian");
        $pendapatan_bulanan = $this->input->post("pendapatan_bulanan");
        $jumlah_unit_usaha = $this->input->post("jumlah_unit_usaha");
        $metode_pemesaran = $this->input->post("metode_pemasaran");

        $split_kab = explode("-",$kabupaten);
        $hasil_split_kabupaten = $split_kab[1];

        $split_kec = explode("-",$kecamatan);
        $hasil_split_kecamatan = $split_kec[1]; 

        $ubah_format_rupiah = preg_replace('/[Rp.]/','',$rerata_biaya);
        $ubah_format_nominal_gaji_perbulan = preg_replace('/[Rp.]/','',$nominal_gaji_perbulan);
        $ubah_format_nominal_gaji_perhari= preg_replace('/[Rp.]/','',$nominal_gaji_perhari);
        $ubah_format_pendapatan_perbulan = preg_replace('/[Rp.]/','',$pendapatan_bulanan);
        $ubah_format_pendapatan_hari = preg_replace('/[Rp.]/','',$pendapatan_harian);
        $ubah_format_nominal_omzet = preg_replace('/[Rp.]/','',$nominal_omzet);
        $ubah_format_total_modal= preg_replace('/[Rp.]/','',$total_modal);
        $ubah_format_nilai_investasi= preg_replace('/[Rp.]/','',$nilai_investasi);
        $ubah_format_nilai_produksi= preg_replace('/[Rp.]/','',$nilai_produksi);
        $ubah_format_nilai_bahan_baku= preg_replace('/[Rp.]/','',$nilai_bahan_baku);



        $data_profil =[
            'nama_usaha' => $nama_usaha,
            'no_izin'=>$no_izin,
            'tahun_berdiri' => $tahun_berdiri,
            'nama_pimpinan' => $nama_pimpinan,
            'nik' => $nik_pimpinan,
            'jenis_usaha' => $jenis_usaha,
            'luas_lahan' => $luas_lahan,
            'status_kepemilikan' => $status_kepemilikan,
            'kepemilikan_koperasi' => $kepemilikan_koperasi,
            'kabupaten' => $hasil_split_kabupaten,
            'kecamatan' => $hasil_split_kecamatan,
            'desa' => $desa,
            'alamat'=> $alamat,
            'fax' => $fax,
            'telpon' =>$no_hp,
            'email' =>$email,
            'website' => $website,
            'lat' => $lat,
            'long' => $lng,
            "sumber_modal" =>$sumber_modal,
            "total_modal"=> $ubah_format_total_modal,
            "nilai_produksi"=> $ubah_format_nilai_produksi,
            "nilai_investasi"=> $ubah_format_nilai_investasi,
            "nilai_bahan_baku"=>$ubah_format_nilai_bahan_baku,
            "produk_unggulan"=>$produk_unggulan ,
            "jumlah_tenaga_kerja"=>$jumlah_tenaga_kerja ,
            "rerata_biaya"=>$ubah_format_rupiah,
            "model_penggajian"=>$model_penggajian ,
            "nominal_gaji_perbulan"=>$ubah_format_nominal_gaji_perbulan,
            "nominal_gaji_perhari"=>$ubah_format_nominal_gaji_perhari,
            "nominal_omzet"=>$ubah_format_nominal_omzet ,
            "pendapatan_harian"=>$ubah_format_pendapatan_hari,
            "pendapatan_bulanan"=>$ubah_format_pendapatan_perbulan,
            "jumlah_unit_usaha"=>$jumlah_unit_usaha ,
            "metode_pemasaran"=>$metode_pemesaran 
        ];
      
        $this->m_profil_usaha->update($id_usaha,$data_profil);

        redirect('admin/usaha');
    }


    public function delete(){
        $id_usaha=$this->uri->segment(4);
        $this->m_profil_usaha->update($id_usaha,array('deleted_at'=>date("Y-m-d H:i:s")));
        redirect('admin/usaha');
    }
}
?>