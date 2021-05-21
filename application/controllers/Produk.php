<?php
class Produk extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_pengunjung');
		$this->load->model('m_produk');
		$this->m_pengunjung->count_visitor();
	}
	
	function index(){
		$jum=$this->db->get_where('data_produk', ['deleted_at' => '0000-00-00 00:00:00']);
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
		endif;
		
        $limit = 4;
        $config['base_url'] = base_url() . 'produk/index/';
		$config['total_rows'] = $jum->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		//Tambahan untuk styling
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next >>';
		$config['prev_link'] = '<< Prev';
		
		$this->pagination->initialize($config);
		
		$x['page'] = $this->pagination->create_links();
		$x['tot_desa'] = $this->db->get('data_desa_terdaftar')->num_rows();
		$x['tot_relawan'] = $this->db->get('relawan')->num_rows();
		$x['tot_usaha'] = $this->db->get('profil_usaha')->num_rows();
		$x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
		$x['produk'] = $this->m_produk->get_produk_page($offset,$limit);
		$x['category'] = $this->db->get('tbl_kategori');
		$x['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
		$this->load->view('depan/v_produk',$x);
	}
	
	function detail($slugs){ 
		$slug = htmlspecialchars($slugs, ENT_QUOTES);
		$select = [
					'a.kategori',
					'count(a.id) as Total'
				];

		$x['kategori']=$this->db->select($select)
								->from('data_kategori_usaha a')
								->group_by('a.id')
								->get()
								->result();
									
		$query = $this->db->get_where('data_produk', array('slug' => $slug));
		if($query->num_rows() > 0){
			$b = $query->row_array();
			$kode = $b['id_produk'];
			$this->db->query("UPDATE data_produk SET produk_views=produk_views+1 WHERE id_produk='$kode'");
			$data = $this->m_produk->get_produk_by_kode($kode);
			$row = $data->row_array();
			$x['id'] = $row['id_produk'];
			$x['nama'] = $row['nama_produk'];
			$x['nama_usaha'] = $row['nama_usaha'];
			$x['id_usaha'] = $row['id_usaha'];
			$x['deskripsi'] = $row['deskripsi'];
			$x['usaha'] = $row['nama_usaha'];
			$x['image'] = $row['photo'];
			$x['jenis'] = $row['jenis_produk'];
			$x['tanggal'] = $row['created_at'];
			$x['slug'] = $row['slug'];
			$x['show_komentar'] = $this->m_tulisan->show_komentar_by_tulisan_id($kode);
			$x['category'] = $this->db->get('tbl_kategori');
			$x['populer'] = $this->db->query("SELECT * FROM data_produk ORDER BY produk_views DESC LIMIT 2");
			$this->load->view('depan/v_produk_detail',$x);
		}else{
			redirect('produk');
		}
	}
	
	function kategori(){
		 $kategori=str_replace("-"," ",$this->uri->segment(3));
		 $query = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_kategori_nama LIKE '%$kategori%' ORDER BY tulisan_views DESC LIMIT 5");
		 if($query->num_rows() > 0){
			 $x['data']=$query;
			 $x['category']=$this->db->get('tbl_kategori');
 			 $x['populer']=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
			 $this->load->view('depan/v_produk',$x);
		 }else{
			 echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak Ada artikel untuk kategori <b>'.$kategori.'</b></div>');
			 redirect('produk');
		 }
	}

    function search(){
        $keyword = str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
		$query = $this->m_tulisan->cari_berita($keyword);
		
		if($query->num_rows() > 0){
			$x['data']=$query;
			$x['category']=$this->db->get('tbl_kategori');
			$x['populer']=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
			$this->load->view('depan/v_produk',$x);
		}else{
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak dapat menemukan artikel dengan kata kunci <b>'.$keyword.'</b></div>');
			redirect('produk');
		}
    }

	function komentar(){
		$kode = htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);
		$data=$this->m_tulisan->get_berita_by_kode($kode);
		$row=$data->row_array();
		$slug=$row['tulisan_slug'];
		$nama = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		$email = htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$komentar = nl2br(htmlspecialchars($this->input->post('komentar',TRUE),ENT_QUOTES));

		if(empty($nama) || empty($email)){
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Masukkan input dengan benar.</div>');
			redirect('produk/'.$slug);
		}else{
			$data = array(
			'komentar_nama' 			=> $nama,
			'komentar_email' 			=> $email,
			'komentar_isi' 				=> $komentar,
					'komentar_status' 		=> 0,
					'komentar_tulisan_id' => $kode
			);

			$this->db->insert('tbl_komentar', $data);
			$this->session->set_flashdata('msg','<div class="alert alert-info">Komentar Anda akan tampil setelah moderasi.</div>');
			redirect('produk/'.$slug);
		}
	}

}
