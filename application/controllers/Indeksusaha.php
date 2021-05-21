<?php
class Indeksusaha extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_files');
		$this->load->helper('download');
		$this->load->model('m_pengunjung');
		$this->load->model('m_profil_usaha');
		$this->load->model('m_produk');
		$this->load->library('pagination');
 
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		 //konfigurasi pagination
		 $config['base_url'] = site_url('Indeksusaha/index'); //site url
		 $config['total_rows'] = $this->db->count_all('data_usaha'); //total row
		 $config['per_page'] = 100;  //show record per halaman
		 $config["uri_segment"] = 3;  // uri parameter
		 $choice = $config["total_rows"] / $config["per_page"];
		 $config["num_links"] = floor($choice);
  
		 // Membuat Style pagination untuk BootStrap v4
	   $config['first_link']       = 'First';
		 $config['last_link']        = 'Last';
		 $config['next_link']        = 'Next';
		 $config['prev_link']        = 'Prev';
		 $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		 $config['full_tag_close']   = '</ul></nav></div>';
		 $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		 $config['num_tag_close']    = '</span></li>';
		 $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		 $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		 $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		 $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		 $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		 $config['prev_tagl_close']  = '</span>Next</li>';
		 $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		 $config['first_tagl_close'] = '</span></li>';
		 $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		 $config['last_tagl_close']  = '</span></li>';
  
		 $this->pagination->initialize($config);
		 $x['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  
		 //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		 $x['data']=$this->db->get('data_usaha',$config["per_page"], $x['page'])->result();       
  
		 $x['pagination'] = $this->pagination->create_links();
	
		$this->load->view('depan/v_indeks_usaha',$x);
	}

	function get_file(){
		$id=$this->uri->segment(3);
		$get_db=$this->m_files->get_file_byid($id);
		$q=$get_db->row_array();
		$file=$q['file_data'];
		$path='./assets/files/'.$file;
		$data = file_get_contents($path);
		$name = $file;
		force_download($name, $data);
	}

	function print($id)
    {
        $usaha = $this->m_profil_usaha->get_by_id($id)->row();

        if(!$usaha)
        {
            $this->session->set_flashdata('error_msg','Usaha tidak ditemukan');
            redirect(base_url('detail/'.$id));
        }

        $produk = $this->m_produk->get_produk_home_byusaha($id);

        $this->load->view('admin/v_print_usaha', ['usaha' => $usaha, 'produk' => $produk]);
    }

}
