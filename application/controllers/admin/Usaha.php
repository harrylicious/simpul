<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Usaha extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_usaha');
		$this->load->model('m_user');
		$this->load->library('upload'); 
		$this->load->library('form_validation');
	}


	function index(){  
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');
		
		$cek = $this->m_usaha->get_target_verifikasi($idadmin)->row_array();  

		$level = $this->session->userdata('level');
		//$x['user']=$this->m_usaha->get_pengguna_login($kode);
		
		if($this->session->userdata('akses')=='1'){  
			
			if ($this->session->userdata('level') == "superadmin") {
				$x['data']=$this->m_usaha->get_all();  
			}
			else if ($this->session->userdata('level') == "admin") {
				$x['data'] = $this->m_usaha->get_all();  
			}
			else if ($this->session->userdata('level') == "relawan") {
				$x['data']=$this->m_usaha->get_all_non_verified_kecamatan($cek['kecamatan']);  
			}
			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_all_perkabupaten("Provinsi NTB")->row_array();
			$x['lotim'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Timur")->row_array();
			$x['loteng'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Tengah")->row_array();
			$x['lobar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Barat")->row_array();
			$x['lout'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Utara")->row_array();
			$x['sumbawa'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa")->row_array();
			$x['sumbar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa Barat")->row_array();
			$x['bima'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Bima")->row_array();
			$x['kota_bima'] = $this->m_usaha->get_all_perkabupaten("Kota Bima")->row_array();
			$x['mataram'] = $this->m_usaha->get_all_perkabupaten("Kota Mataram")->row_array();
			$x['dompu'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Dompu")->row_array();
			
			$x['musnah'] = $this->m_usaha->get_data_perkomoditas("Musnah", $wilayah);  
			$x['berkas_perorangan'] = $this->m_usaha->get_data_perkomoditas("Berkas Perorangan", $wilayah); 
			$x['dinilai_kembali'] = $this->m_usaha->get_data_perkomoditas("Dinilai Kembali", $wilayah); 
			$x['permanen'] = $this->m_usaha->get_data_perkomoditas("Permanen", $wilayah); 
			
			$this->load->view('admin/v_usaha',$x);
		}else{
			redirect('administrator');
		}

	}

	
	function verifikasi(){  
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');

		$cek = $this->m_usaha->get_target_verifikasi($idadmin)->row_array();  
		
		if($this->session->userdata('akses')=='1'){  
			
			
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  
			$x['data_non_verifikasi']=$this->m_usaha->get_all_non_verified_kecamatan($cek['kecamatan']);  
			$x['data_verifikasi']=$this->m_usaha->get_all_verified_kecamatan($cek['kecamatan']);  

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_all_perkabupaten("Provinsi NTB")->row_array();
			$x['lotim'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Timur")->row_array();
			$x['loteng'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Tengah")->row_array();
			$x['lobar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Barat")->row_array();
			$x['lout'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Utara")->row_array();
			$x['sumbawa'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa")->row_array();
			$x['sumbar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa Barat")->row_array();
			$x['bima'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Bima")->row_array();
			$x['kota_bima'] = $this->m_usaha->get_all_perkabupaten("Kota Bima")->row_array();
			$x['mataram'] = $this->m_usaha->get_all_perkabupaten("Kota Mataram")->row_array();
			$x['dompu'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Dompu")->row_array();
			
			$x['musnah'] = $this->m_usaha->get_data_perkomoditas("Musnah", $wilayah);  
			$x['berkas_perorangan'] = $this->m_usaha->get_data_perkomoditas("Berkas Perorangan", $wilayah); 
			$x['dinilai_kembali'] = $this->m_usaha->get_data_perkomoditas("Dinilai Kembali", $wilayah); 
			$x['permanen'] = $this->m_usaha->get_data_perkomoditas("Permanen", $wilayah); 
			
			$this->load->view('admin/v_verifikasi_usaha',$x);
		}else{
			redirect('administrator');
		}
	}

	function get_data_usaha_target_verifikasi($desa){  
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');

		
		if($this->session->userdata('akses')=='1'){  
			
			
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  
			$x['data_non_verifikasi']=$this->m_usaha->get_all_non_verified_desa($desa);  
			$x['data_verifikasi']=$this->m_usaha->get_all_verified_desa($desa);  

			$x['total']=$this->m_usaha->get_total()->row_array();   
			$x['total_semua']=$this->m_usaha->get_total()->row_array();  
 
			$x['ntb'] = $this->m_usaha->get_all_perkabupaten("Provinsi NTB")->row_array();
			$x['lotim'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Timur")->row_array();
			$x['loteng'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Tengah")->row_array();
			$x['lobar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Barat")->row_array();
			$x['lout'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Lombok Utara")->row_array();
			$x['sumbawa'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa")->row_array();
			$x['sumbar'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Sumbawa Barat")->row_array();
			$x['bima'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Bima")->row_array();
			$x['kota_bima'] = $this->m_usaha->get_all_perkabupaten("Kota Bima")->row_array();
			$x['mataram'] = $this->m_usaha->get_all_perkabupaten("Kota Mataram")->row_array();
			$x['dompu'] = $this->m_usaha->get_all_perkabupaten("Kabupaten Dompu")->row_array();
			
			$x['musnah'] = $this->m_usaha->get_data_perkomoditas("Musnah", $wilayah);  
			$x['berkas_perorangan'] = $this->m_usaha->get_data_perkomoditas("Berkas Perorangan", $wilayah); 
			$x['dinilai_kembali'] = $this->m_usaha->get_data_perkomoditas("Dinilai Kembali", $wilayah); 
			$x['permanen'] = $this->m_usaha->get_data_perkomoditas("Permanen", $wilayah); 
			
			$this->load->view('admin/v_verifikasi_usaha',$x);
		}else{
			redirect('administrator');
		}
	}

	function edit($id){ 
		//$kode=$this->session->userdata('idadmin');
		//$x['user']=$this->m_usaha->get_pengguna_login($kode);

		$x['data'] = $this->m_usaha->get_detail($id)->row_array(); 
		$this->session->set_flashdata('msg', 'Berhasil');
		$this->load->view('admin/v_edit_usaha',$x);
	}

	

	function tambah($id) {

		
		$idadmin = $this->session->userdata('idadmin');
		$bidang=$this->session->userdata('bidang');
		$wilayah = $this->session->userdata('wilayah');

		$level = $this->session->userdata('level');
		//$x['user']=$this->m_usaha->get_pengguna_login($kode);
		
		if($this->session->userdata('akses')=='1'){  
			
			
			$x['data'] = $this->m_user->get_detail($id)->row_array(); 
			$x['data_target_verifikasi']=$this->m_usaha->get_target_verifikasi($idadmin)->result();  
			
			
			$this->load->view('admin/v_tambah_usaha',$x);
		}else{
			redirect('administrator');
		}
	}



	

   function check_data(){
	   $this->form_validation->set_rules('username', 'Username', 'is_unique[relawan.username]');
	   if ($this->form_validation->run() == FALSE) {
		echo $this->session->set_flashdata('msg','exist');
		redirect('admin/relawan');
	   } else {
		   $this->save_data();
	   }
   }


	function save_data(){

		$nomor_berkas=$this->input->post('nomor_berkas');
		$nomor_arsip=$this->input->post('nomor_arsip');
		$unit_arsip=$this->session->kode_uk_up;
		$kode_klasifikasi=$this->input->post('kode_klasifikasi');
		$uraian=$this->input->post('uraian');
		$pencipta=$this->input->post('pencipta');
		$tgl_cipta=$this->input->post('tgl_cipta');
		$media=$this->input->post('media');
		$jenis=$this->input->post('jenis');
		$jumlah_satuan=$this->input->post('jumlah_satuan');
		$kondisi=$this->input->post('kondisi');
		$lokasi_simpan=$this->input->post('lokasi_simpan');
		$tingkat_perkembangan=$this->input->post('tingkat_perkembangan');
		$nasib_akhir=$this->input->post('nasib_akhir');
		$arsip_vital=$this->input->post('arsip_vital');
		$keamanan=$this->input->post('keamanan');
		$tgl_akhir_aktif=$this->input->post('tgl_akhir_aktif');
		$tgl_akhir_inaktif=$this->input->post('tgl_akhir_inaktif');
		$deskripsi=$this->input->post('deskripsi');
		//$level=$this->input->post('xlevel');




		$data=array(
			'nomor_berkas'=>$nomor_berkas,
			'nomor_arsip'=>$nomor_arsip,
			'unit_arsip'=>$unit_arsip,
			'kode_klasifikasi'=>$kode_klasifikasi,
			'uraian'=> $uraian,
			'pencipta'=>$pencipta,
			'tgl_cipta'=>$tgl_cipta,
			'media'=>$media,
			'jenis'=>$jenis,
			'jumlah_satuan'=>$jumlah_satuan,
			'kondisi'=>$kondisi,
			'lokasi_simpan'=>$lokasi_simpan,
			'tingkat_perkembangan'=>$tingkat_perkembangan,
			'nasib_akhir'=>$nasib_akhir,
			'arsip_vital'=>$arsip_vital,
			'keamanan'=>$keamanan,
			'tgl_akhir_aktif'=>$tgl_akhir_aktif,
			'tgl_akhir_inaktif'=>$tgl_akhir_inaktif,
			'deskripsi'=>$deskripsi
		);

	
		$this->m_usaha->insert($data);
		redirect('admin/usaha');
}

	
function update_data(){

	$dap_id=$this->input->post('dap_id');
	$nomor_berkas=$this->input->post('nomor_berkas');
	$nomor_arsip=$this->input->post('nomor_arsip');
	$unit_arsip=$this->session->kode_uk_up;
	$kode_klasifikasi=$this->input->post('kode_klasifikasi');
	$uraian=$this->input->post('uraian');
	$pencipta=$this->input->post('pencipta');
	$tgl_cipta=$this->input->post('tgl_cipta');
	$media=$this->input->post('media');
	$jenis=$this->input->post('jenis');
	$jumlah_satuan=$this->input->post('jumlah_satuan');
	$kondisi=$this->input->post('kondisi');
	$lokasi_simpan=$this->input->post('lokasi_simpan');
	$tingkat_perkembangan=$this->input->post('tingkat_perkembangan');
	$nasib_akhir=$this->input->post('nasib_akhir');
	$arsip_vital=$this->input->post('arsip_vital');
	$keamanan=$this->input->post('keamanan');
	$tgl_akhir_aktif=$this->input->post('tgl_akhir_aktif');
	$tgl_akhir_inaktif=$this->input->post('tgl_akhir_inaktif');
	$deskripsi=$this->input->post('deskripsi');
	//$level=$this->input->post('xlevel');
 


	$data=array(
		'nomor_berkas'=>$nomor_berkas,
		'nomor_arsip'=>$nomor_arsip,
		'unit_arsip'=>$unit_arsip,
		'kode_klasifikasi'=>$kode_klasifikasi,
		'uraian'=> $uraian,
		'pencipta'=>$pencipta,
		'tgl_cipta'=>$tgl_cipta,
		'media'=>$media,
		'jenis'=>$jenis,
		'jumlah_satuan'=>$jumlah_satuan,
		'kondisi'=>$kondisi,
		'lokasi_simpan'=>$lokasi_simpan,
		'tingkat_perkembangan'=>$tingkat_perkembangan,
		'nasib_akhir'=>$nasib_akhir,
		'arsip_vital'=>$arsip_vital,
		'keamanan'=>$keamanan,
		'tgl_akhir_aktif'=>$tgl_akhir_aktif,
		'tgl_akhir_inaktif'=>$tgl_akhir_inaktif,
		'deskripsi'=>$deskripsi
	);


	$this->m_usaha->update($dap_id, $data);
	redirect('admin/usaha');
}


function terima_inaktif($id)
{
	
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

	$this->m_usaha->set_setujui_terima_inaktif($id);
	redirect('admin/dashboard/get_terima_pindah_inaktif_wilayah');
}


function tolak_inaktif($id){

	$data_riwayat_pindah = $this->m_usaha->get_daftar_riwayat_pindah_inaktif_per_dap_id($id);  


	foreach ($data_riwayat_pindah as $row):
		$dap_id = $row->dap_id;
		$unit_arsip = $row->unit_arsip_lama;
		$lokasi_simpan = $row->lokasi_simpan_lama;

		$data = array(
			'dap_id' => $dap_id,
			'unit_arsip' => $unit_arsip,
			'lokasi_simpan' => $lokasi_simpan
		);
		
		$this->m_usaha->update($dap_id, $data);
		$this->m_usaha->delete_riwayat_pindah($dap_id);
		

    endforeach;
	redirect('admin/dashboard/get_terima_pindah_inaktif_wilayah');
}


function update_data_random(){

	$dap_id=$this->input->post('dap_id');
	$nomor_berkas=$this->input->post('nomor_berkas');
	$nomor_arsip=$this->input->post('nomor_arsip');
	$unit_arsip=$this->session->kode_uk_up;
	$kode_klasifikasi=$this->input->post('kode_klasifikasi');
	$uraian=$this->input->post('uraian');
	$pencipta=$this->input->post('pencipta');
	$tgl_cipta=$this->input->post('tgl_cipta'); 
	$media=$this->input->post('media');
	$jenis=$this->input->post('jenis');
	$jumlah_satuan=$this->input->post('jumlah_satuan');
	$kondisi=$this->input->post('kondisi');
	$lokasi_simpan=$this->input->post('lokasi_simpan');
	$tingkat_perkembangan=$this->input->post('tingkat_perkembangan');
	$nasib_akhir=$this->input->post('nasib_akhir');
	$arsip_vital=$this->input->post('arsip_vital');
	$keamanan=$this->input->post('keamanan');
	$tgl_akhir_aktif=$this->input->post('tgl_akhir_aktif');
	$tgl_akhir_inaktif=$this->input->post('tgl_akhir_inaktif');
	$deskripsi=$this->input->post('deskripsi');
	//$level=$this->input->post('xlevel');
 

	echo $dap_id;
	echo "<script>console.log('".$dap_id."');</script>";

	$cek = $this->m_usaha->get_detail($dap_id)->row_array();
	
	$get_unit_arsip = $cek['kode_uk_up'];
	echo $get_unit_arsip; 

	if ($get_unit_arsip != $_SESSION['kode_uk_up']) {
		echo "Tidak diizinkan mengubah arsip dari unit arsip lain.";
		return;
	}

	$data=array(
		'nomor_berkas'=>$nomor_berkas,
		'nomor_arsip'=>$nomor_arsip,
		'unit_arsip'=>$unit_arsip,
		'kode_klasifikasi'=>$kode_klasifikasi,
		'uraian'=> $uraian,
		'pencipta'=>$pencipta,
		'tgl_cipta'=>$tgl_cipta,
		'media'=>$media,
		'jenis'=>$jenis,
		'jumlah_satuan'=>$jumlah_satuan,
		'kondisi'=>$kondisi,
		'lokasi_simpan'=>$lokasi_simpan,
		'tingkat_perkembangan'=>$tingkat_perkembangan,
		'nasib_akhir'=>$nasib_akhir,
		'arsip_vital'=>$arsip_vital,
		'keamanan'=>$keamanan,
		'tgl_akhir_aktif'=>$tgl_akhir_aktif,
		'tgl_akhir_inaktif'=>$tgl_akhir_inaktif,
		'deskripsi'=>$deskripsi
	);


	$this->m_usaha->update($dap_id, $data);
	redirect('admin/usaha/edit_random');
}


function pindahkan_semua(){

	$kode_uk_up=$this->session->userdata('kode_uk_up');
	$data_inaktif = $this->m_usaha->get_daftar_pindah_inaktif_dan_wilayah($kode_uk_up);  

	$kode_user = $_SESSION['idadmin'];
	
	$data_uk = $this->m_usaha->get_kode_uk_perkabupaten($kode_uk_up)->row_array(); 

	foreach ($data_inaktif as $row):
		$dap_id = $row->dap_id;
		$unit_arsip = $row->unit_arsip;
		$lokasi_simpan = $row->lokasi_simpan;

		$data = array(
			'dap_id' => $dap_id,
			'unit_arsip_lama' => $kode_uk_up,
			'lokasi_simpan_lama' => $lokasi_simpan,
			'kode_user' => $kode_user
		);
		
		$this->m_usaha->insert_into_riwayat_pindah($data);

		$data_update = array(
			'unit_arsip' => $data_uk['kode_uk_up'],
			'lokasi_simpan' => str_replace("UP", "UK", $lokasi_simpan)
		);

		$this->m_usaha->update($dap_id, $data_update);
		

    endforeach;
	redirect('admin/dashboard');
}


public function import_excel(){
		$unit_arsip=$this->session->kode_uk_up; 
	

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 
		'text/csv','text/xls','text/xlsx', 'application/csv', 'application/excel', 'application/vnd.msexcel', 
		'application/vnd.openxmlformats-officeusaha.spreadsheetml.sheet');

			if(isset($_FILES['file']['name']) || in_array($_FILES['file']['type'], $file_mimes)) {

			 
			    $arr_file = explode('.', $_FILES['file']['name']); 
			    $extension = end($arr_file);
			 
			    if('csv' == $extension) {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			    } else if('xls' == $extension) {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			    }
				else {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

				}
			 
			    $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			     
			    $rowData = $spreadsheet->getActiveSheet()->toArray();

			    for($i = 1;$i < count($rowData);$i++) 
			    {	
					$unit_arsip_excel = $rowData[$i][0];
					$tgl_akhir_aktif = $rowData[$i][16];
					$tgl_akhir_inaktif = $rowData[$i][17];
					$deskripsi = $rowData[$i][18];


				if ($unit_arsip != "SEKPROV") {
					if ($unit_arsip != $unit_arsip_excel) {
						
						echo "Kode unit arsip tidak sesuai untuk ".$unit_arsip." dengan ".$unit_arsip_excel."</br>";
						continue;
					}
				}
				

				    $data = array(						
							"unit_arsip"=> $unit_arsip_excel,
							"nomor_berkas"=> $rowData[$i][1],
							"nomor_arsip"=> $rowData[$i][2],
							"kode_klasifikasi"=> $rowData[$i][3],
							"uraian"=> str_replace("'"," ", $rowData[$i][4]),
							"tgl_cipta"=> $rowData[$i][5],
							"jumlah_satuan"=> $rowData[$i][6],
							"jenis"=> $rowData[$i][7],
							"pencipta"=> $rowData[$i][8],
							"media"=> $rowData[$i][9],
							"kondisi"=> $rowData[$i][10],
							"lokasi_simpan"=> $rowData[$i][11],
							"tingkat_perkembangan"=> $rowData[$i][12],
							"nasib_akhir"=> $rowData[$i][13],
							"arsip_vital"=> $rowData[$i][14],
							"keamanan"=> $rowData[$i][15],
							"tgl_akhir_aktif"=> $tgl_akhir_aktif,
							"tgl_akhir_inaktif"=> $tgl_akhir_inaktif,
							"deskripsi"=>$deskripsi
				    	);
						$this->m_usaha->insert($data);
				   
			    }
				echo $this->session->set_flashdata('Import berhasil.','success-success');
				redirect('admin/usaha');
			  
			}
			
}


public function import_update_excel(){
	$unit_arsip=$this->session->kode_uk_up;
			  
	$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 
	'text/csv','text/xls','text/xlsx', 'application/csv', 'application/excel', 'application/vnd.msexcel', 
	'application/vnd.openxmlformats-officeusaha.spreadsheetml.sheet');

		if(isset($_FILES['file']['name']) || in_array($_FILES['file']['type'], $file_mimes)) {

		 
			$arr_file = explode('.', $_FILES['file']['name']); 
			$extension = end($arr_file);
		 
			if('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else if('xls' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

			}
		 
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			 
			$rowData = $spreadsheet->getActiveSheet()->toArray();

			for($i = 1;$i < count($rowData);$i++)
			{	
				$dap_id = $rowData[$i][0];
				$unit_arsip_excel = $rowData[$i][1];
				$tgl_akhir_aktif = $rowData[$i][17];
				$tgl_akhir_inaktif = $rowData[$i][18];
				$deskripsi = $rowData[$i][19];

				if ($unit_arsip != "SEKPROV") {
					if ($unit_arsip != $unit_arsip_excel) {

						echo "Kode unit arsip tidak sesuai untuk ".$unit_arsip." dengan ".$unit_arsip_excel."</br>";
						continue;

					}
				}



				$data = array(						
						"unit_arsip"=> $unit_arsip_excel,
						"nomor_berkas"=> $rowData[$i][2],
						"nomor_arsip"=> $rowData[$i][3],
						"kode_klasifikasi"=> $rowData[$i][4],
						"uraian"=> str_replace("'"," ", $rowData[$i][5]),
						"tgl_cipta"=> $rowData[$i][6],
						"jumlah_satuan"=> $rowData[$i][7],
						"jenis"=> $rowData[$i][8],
						"pencipta"=> $rowData[$i][9],
						"media"=> $rowData[$i][10],
						"kondisi"=> $rowData[$i][11],
						"lokasi_simpan"=> $rowData[$i][12],
						"tingkat_perkembangan"=> $rowData[$i][13],
						"nasib_akhir"=> $rowData[$i][14],
						"arsip_vital"=> $rowData[$i][15],
						"keamanan"=> $rowData[$i][16],
						"tgl_akhir_aktif"=> $tgl_akhir_aktif,
						"tgl_akhir_inaktif"=> $tgl_akhir_inaktif,
						"deskripsi"=>$deskripsi
					);
					$this->m_usaha->update($dap_id, $data);
			   
			}

			$this->session->set_flashdata('Import berhasil.','success-success');
			redirect('admin/usaha');
		  
		}
		
}


function delete_data($dap_id){
	 $data =array(
		 'is_activated'=>1
	 );
	 $this->m_usaha->update($dap_id,$data);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/usaha');
}




}