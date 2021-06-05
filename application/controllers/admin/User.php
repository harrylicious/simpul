<?php
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_usaha');
		$this->load->helper('download');
		$this->load->model('m_pengunjung'); 
		$this->m_pengunjung->count_visitor(); 
	}

	function index(){ 
		
		
		$x['data'] = $this->m_user->get_all();  
		
		$this->load->view('admin/v_user', $x);
	}

	function ubah_password(){ 
		
		$x['data'] = "";
		
		$this->load->view('admin/v_ubah_password', $x);
	}
	

	function tambah() {
		$this->load->view('admin/v_tambah_referensi', $x);
	}
	

    function edit($id) {

		$kode_uk_up=$this->session->userdata('kode_uk_up');
		$wilayah = $this->session->userdata('wilayah');
		$nama = $this->session->userdata('nama_lengkap'); 
		
		$x['musnah'] = $this->m_usaha->get_pernasib_berdasarkan_wilayah("Musnah", $wilayah);  
		$x['berkas_perorangan'] = $this->m_usaha->get_pernasib_berdasarkan_wilayah("Berkas Perorangan", $wilayah); 
		$x['dinilai_kembali'] = $this->m_usaha->get_pernasib_berdasarkan_wilayah("Dinilai Kembali", $wilayah); 
		$x['permanen'] = $this->m_usaha->get_pernasib_berdasarkan_wilayah("Permanen", $wilayah); 
		
		$x['total_terima_inaktif'] = $this->m_usaha->get_total_riwayat_pindah_inaktif_per_kode_uk_up($kode_uk_up, 0);
		$x['total_pindah_inaktif'] = $this->m_usaha->get_total_pindah_inaktif_dan_kode_uk_up($kode_uk_up);
		$x['total_riwayat_pindah_inaktif'] = $this->m_usaha->get_total_riwayat_pindah_inaktif($kode_uk_up);

		$x['data'] = $this->m_user->get_detail($id)->row_array();  
		$this->load->view('admin/v_edit_user', $x);
	}

    

    function save_data(){
		
		$config['upload_path']          = 'uploads/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 10000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
        $this->upload->initialize($config);
		

        if (!$this->upload->do_upload('file_berkas')) {
            $error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/referensi', $error);

        } else {
			$filename = $this->upload->data("file_name");
			$judul = $this->input->post('judul');
			// $data['tipe_berkas'] = $this->upload->data('file_ext');
			// $data['ukuran_berkas'] = $this->upload->data('file_size');
			
            $data = $this->upload->data();
			print_r($data);


			//$level=$this->input->post('xlevel');
			$data=array(
				'judul'=>$judul,
				'url'=>$filename
			);
		
	
		
			$this->m_user->insert($data);
			redirect('admin/referensi');

        }


     
    }

        
    function update_data($id){

		$kode_user=$this->input->post('kode_user');
		$kode_uk_up=$this->input->post('kode_uk_up');
		$instansi=$this->input->post('instansi');
		$telpon=$this->input->post('telpon');
		$email=$this->input->post('email');
		$nama_lengkap=$this->input->post('nama_lengkap');
		$wilayah=$this->input->post('wilayah');
		$username=$this->input->post('username'); 
		$password=MD5($this->input->post('password'));
		//$level=$this->input->post('xlevel');
	 
	
		$data=array(
			'kode_uk_up'=>$kode_uk_up,
			'nama_lengkap'=>$nama_lengkap,
			'instansi'=>$instansi,
			'wilayah'=>$wilayah,
			'telp'=> $telpon,
			'email'=>$email,
			'username'=>$username,
			'password'=>$password
		);


        $this->m_user->update($id, $data);
        redirect('admin/user');
    }

	
	function profil($id) {
		$idadmin = $this->session->userdata('idadmin');
		
		$x['data'] = $this->m_user->get_detail($id)->row_array(); 
		$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  
		$this->load->view('admin/v_profil_relawan', $x);
	}


	function delete_data($id) { 
		$this->m_user->delete($id);
        redirect('admin/referensi');
	}



}
