<?php
class Komoditas extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('m_pengunjung'); 
		$this->load->model('m_usaha'); 
		$this->m_pengunjung->count_visitor();    
	}
 
	function index(){
		$x['data']=$this->m_usaha->get_all_perkomoditas("SEMUA");  
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['pertanian'] = $this->m_usaha->get_persektor("PERTANIAN")->row_array(); 
		$x['kehutanan'] = $this->m_usaha->get_persektor("KEHUTANAN")->row_array(); 
		$x['budidaya'] = $this->m_usaha->get_persektor("BUDIDAYA")->row_array(); 
		$x['pertambangan'] = $this->m_usaha->get_persektor("PERTAMBANGAN")->row_array(); 
		$x['jasa'] = $this->m_usaha->get_persektor("JASA")->row_array(); 
		$x['industri'] = $this->m_usaha->get_persektor("INDUSTRI")->row_array(); 
		$x['aktif'] = $this->m_usaha->get_perstatus("1")->row_array(); 
		$x['inaktif'] = $this->m_usaha->get_perstatus("0")->row_array();  

		//$x['last_update'] = last_updated();

		
		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_komoditas',$x);
	}

	

	
	function get_perkomoditas($komoditas){


		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['pertanian'] = $this->m_usaha->get_persektor("PERTANIAN")->row_array(); 
		$x['kehutanan'] = $this->m_usaha->get_persektor("KEHUTANAN")->row_array(); 
		$x['budidaya'] = $this->m_usaha->get_persektor("BUDIDAYA")->row_array(); 
		$x['pertambangan'] = $this->m_usaha->get_persektor("PERTAMBANGAN")->row_array(); 
		$x['jasa'] = $this->m_usaha->get_persektor("JASA")->row_array(); 
		$x['industri'] = $this->m_usaha->get_persektor("INDUSTRI")->row_array(); 
		$x['aktif'] = $this->m_usaha->get_perstatus("1")->row_array(); 
		$x['inaktif'] = $this->m_usaha->get_perstatus("0")->row_array();  

		$x['komoditas'] = $komoditas;

		$x['data'] = $this->m_usaha->get_data_perkomoditas($komoditas); 
		$x['data_rangkuman_komoditas'] = $this->m_usaha->get_data_total_luas_lahan_perkabupaten("SEMUA", $komoditas)->row_array(); 
		$x['data_rangkuman_produksi'] = $this->m_usaha->get_data_total_kapasitas_produksi_perkabupaten("SEMUA", $komoditas)->row_array(); 
		

		$this->load->view('depan/v_usaha_komoditas',$x); 
	}

	function get_perkomoditas_perkabupaten($komoditas){


		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['pertanian'] = $this->m_usaha->get_persektor("PERTANIAN")->row_array(); 
		$x['kehutanan'] = $this->m_usaha->get_persektor("KEHUTANAN")->row_array(); 
		$x['budidaya'] = $this->m_usaha->get_persektor("BUDIDAYA")->row_array(); 
		$x['pertambangan'] = $this->m_usaha->get_persektor("PERTAMBANGAN")->row_array(); 
		$x['jasa'] = $this->m_usaha->get_persektor("JASA")->row_array(); 
		$x['industri'] = $this->m_usaha->get_persektor("INDUSTRI")->row_array(); 
		$x['aktif'] = $this->m_usaha->get_perstatus("1")->row_array(); 
		$x['inaktif'] = $this->m_usaha->get_perstatus("0")->row_array();  

		$x['komoditas'] = $komoditas;

		$x['data'] = $this->m_usaha->get_data_total_luas_lahan_perkabupaten("", $komoditas)->result(); 
		$x['data_rangkuman_komoditas'] = $this->m_usaha->get_data_total_luas_lahan_perkabupaten("SEMUA", $komoditas)->row_array(); 
		$x['data_rangkuman_produksi'] = $this->m_usaha->get_data_total_kapasitas_produksi_perkabupaten("SEMUA", $komoditas)->row_array(); 
		

		$this->load->view('depan/v_usaha_komoditas_perkabupaten',$x); 
	}

	

	
	function get_by_jenis($jenis){
		$x['data']=$this->m_usaha->get_all_by_jenis($jenis);
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['tekstual'] = $this->m_usaha->get_perjenis("TEKSTUAL")->row_array(); 
		$x['audio'] = $this->m_usaha->get_perjenis("AUDIO VISUAL")->row_array(); 
		$x['gambar'] = $this->m_usaha->get_perjenis("GAMBAR")->row_array(); 
		$x['alih_media'] = $this->m_usaha->get_perjenis("ALIH MEDIA")->row_array(); 
		$x['aktif'] = $this->m_usaha->get_perstatus_aktif()->row_array(); 
		$x['inaktif'] = $this->m_usaha->get_perstatus_inaktif()->row_array(); 


		$x['jenis'] = $jenis;	

		
		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_detail_jenis_usaha',$x);
	}

	
	function get_by_aktif() {
		
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['tekstual'] = $this->m_usaha->get_perjenis("TEKSTUAL")->row_array(); 
		$x['audio'] = $this->m_usaha->get_perjenis("AUDIO VISUAL")->row_array(); 
		$x['gambar'] = $this->m_usaha->get_perjenis("GAMBAR")->row_array(); 
		$x['alih_media'] = $this->m_usaha->get_perjenis("ALIH MEDIA")->row_array(); 
		$x['aktif'] = $this->m_usaha->get_perstatus_aktif()->row_array(); 
		$x['inaktif'] = $this->m_usaha->get_perstatus_inaktif()->row_array(); 

		$x['data'] = $this->m_usaha->get_all_aktif(); 

		$x['jenis'] = "AKTIF";	

		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_detail_jenis_usaha',$x);
	}


	
	function get_by_inaktif() {
		
		$x['semua']=$this->m_usaha->get_total()->row_array();
		$x['tekstual'] = $this->m_usaha->get_perjenis("TEKSTUAL")->row_array(); 
		$x['audio'] = $this->m_usaha->get_perjenis("AUDIO VISUAL")->row_array(); 
		$x['gambar'] = $this->m_usaha->get_perjenis("GAMBAR")->row_array(); 
		$x['alih_media'] = $this->m_usaha->get_perjenis("ALIH MEDIA")->row_array(); 
		$x['aktif'] = $this->m_usaha->get_perstatus_aktif()->row_array(); 
		$x['inaktif'] = $this->m_usaha->get_perstatus_inaktif()->row_array(); 

		$x['data'] = $this->m_usaha->get_all_inaktif(); 

		$x['jenis'] = "INAKTIF";	

		//$x['last_update'] = $this->db->select('created_at')->order_by('id_usaha', 'desc')->get_where('usahas', ['deleted_at' => '0000-00-00 00:00:00'])->row();

		$this->load->view('depan/v_detail_jenis_usaha',$x);
	}

	public function auto_dapid($dapid){
		// POST data
		$dapid = $this->input->post();
		// Get data
		$data = $this->m_usaha->get_usahas($dapid);
		echo json_encode($data);
	  }

	  function autocomplete_id() { 
        $this->db->limit(10);
        $this->db->like('dap_id', $_GET['term']); 
        $this->db->select('dap_id');
        $data = $this->db->get('data_usahas')->result();
        foreach ($data as $row) {
            $return_arr[] = $row->dap_id;
        }
		
        echo json_encode($return_arr); 
    }

	function autofillusaha(){
		$dap_id = $_GET['dap_id'];
		$doc = $this->m_usaha->get_detail_json($dap_id)->row_array();
		$data = array(
			'uraian' => $doc['uraian'],
			'wilayah' => $doc['wilayah']
			);
		echo json_encode($data);
	   }


}
