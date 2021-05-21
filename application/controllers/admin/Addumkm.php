<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
class Addumkm extends CI_Controller{
    function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_profil_usaha');
		$this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->helper('download');
    }
    function index()
    { 
        $x['kab']= $this->m_profil_usaha->get_kabupaten();
        $x['jenis']= $this->m_profil_usaha->get_data_jenis_usaha();
        $x['milik']= $this->m_profil_usaha->get_status();
        $x['modal'] =$this->m_profil_usaha->get_sumber_modal();
        $x['komoditas'] = $this->db->order_by('keterangan', 'asc')->get('ket_komoditas')->result();
        $x['legalitas'] = $this->db->get('ket_legalitas')->result();
       
        $this->load->view('admin/v_add_umkm_ikm',$x); 
    }

    public function download(){				
		force_download('assets/format-excel/profil_usaha.csv',NULL);
	}

    public function get_kecamatan(){
        $kode = $this->input->post('kode');
        $data = $this->m_profil_usaha->get_kecamatan($kode);
        echo json_encode($data);
    }

    public function get_desa(){
        $kode = $this->input->post('kode');
        $data = $this->m_profil_usaha->get_desa($kode);
        echo json_encode($data);
    }
    
    public function save_data(){
       
        log_message('error','message');
        $this->m_profil_usaha->insert();
        redirect("admin/usaha");

    }

    function import_excel(){

        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
        $arr_file = explode('.', $_FILES['file']['name']);
        $extension = end($arr_file);
        if('csv' == $extension){
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
        $sheetData =$spreadsheet->getActiveSheet()->toArray(null, true, true, true);
         // array Count
         $arrayCount = count($sheetData);
         $flag = 0;
         $createArray = array(
            /* 'created_at','updated_at','deleted_at' ,*/'nama_usaha','tahun_berdiri','no_izin','nama_pimpinan',
            'nik','jenis_usaha','alamat','desa','kecamatan','kabupaten','komoditas','gambar','lat','long','jml_anggota',
            'kapasitas_produksi','informasi_gizi','metode_pemasaran','pendapatan_hari','pendapatan_bulan',
            'kondisi_kemasan','kualitas_produk','status_kepemilikan','kepemilikan_koperasi','jml_unit_usaha',
            'struktul_kepemilikan','kepemilikan_tempat','sumber_modal','model_penggajian','nilai_investasi','nilai_produksi','nilai_bahan_baku','nilai_tenaga_kerja','gaji_perbulan','gaji_perhari','luas_lahan',
            'fax','telpon','email','website','total_modal','produk_unggulan','jumlah_tenaga_kerja','rerata_biaya'
            ,'nominal_gaji_perbulan','nominal_gaji_perhari','nominal_omzet','pendapatan_harian','pendapatan_bulanan','jumlah_unit_usaha');

         $makeArray = array(/* 'created_at'=> 'created_at','updated_at'=>'updated_at','deleted_at'=>'deleted_at', */
         'nama_usaha'=>'nama_usaha','tahun_berdiri'=>'tahun_berdiri','no_izin'=>'no_izin','nama_pimpinan'=>'nama_pimpinan',
         'nik'=>'nik','jenis_usaha'=>'jenis_usaha','alamat'=> 'alamat','desa'=>'desa','kecamatan'=>'kecamatan',
         'kabupaten'=>'kabupaten','komoditas'=>'komoditas','gambar'=>'gambar','lat'=>'lat','long'=>'long',
         'jml_anggota'=>'jml_anggota','kapasitas_produksi'=>'kapasitas_produksi','informasi_gizi'=>'informasi_gizi',
         'metode_pemasaran'=>'metode_pemasaran','pendapatan_hari'=>'pendapatan_hari','pendapatan_bulan'=>'pendapatan_bulan',
         'kondisi_kemasan'=>'kondisi_kemasan','kualitas_produk'=>'kualitas_produk','status_kepemilikan'=>'status_kepemilikan',
         'kepemilikan_koperasi'=>'kepemilikan_koperasi','jml_unit_usaha'=>'jml_unit_usaha','struktul_kepemilikan'=>'struktul_kepemilikan',
         'kepemilikan_tempat'=>'kepemilikan_tempat','sumber_modal'=>'sumber_modal','model_penggajian'=>'model_penggajian','nilai_investasi'=>'nilai_investasi','nilai_produksi'=>'nilai_produksi',
         'nilai_bahan_baku'=>'nilai_bahan_baku','nilai_tenaga_kerja'=>'nilai_tenaga_kerja','gaji_perbulan'=>'gaji_perbulan','gaji_perhari'=>'gaji_perhari','luas_lahan'=>'luas_lahan',
         'fax' =>'fax','telpon'=>'telpon','email'=>'email','website'=>'website','total_modal'=>'total_modal','produk_unggulan'=>'produk_unggulan','jumlah_tenaga_kerja'=>'jumlah_tenaga_kerja','rerata_biaya'=>'rerata_biaya'
         ,'nominal_gaji_perbulan'=>'nominal_gaji_perbulan','nominal_gaji_perhari'=>'nominal_gaji_perhari','nominal_omzet'=>'nominal_omzet',
         'pendapatan_harian'=>'pendapatan_harian','pendapatan_bulanan'=>'pendapatan_bulanan',
         'jumlah_unit_usaha'=>'jumlah_unit_usaha');
      
         $SheetDataKey = array();
         foreach ($sheetData as $dataInSheet) {
             foreach ($dataInSheet as $key => $value) {
                 if (in_array(trim($value), $createArray)) {
                     $value = preg_replace('/\s+/', '', $value);
                     $SheetDataKey[trim($value)] = $key;
                 }
             }
         }
         $dataDiff = array_diff_key($makeArray, $SheetDataKey);
         if (empty($dataDiff)) {
             $flag = 1;
         }

          // match excel sheet column
        if ($flag == 1) {
            for ($i = 2; $i <= $arrayCount; $i++) {
                /* $created_at = $SheetDataKey['created_at'];
                $updated_at = $SheetDataKey['updated_at'];
                $deleted_at = $SheetDataKey['deleted_at']; */
                $nama_usaha = $SheetDataKey['nama_usaha'];
                $tahun_berdiri = $SheetDataKey['tahun_berdiri'];
                $no_izin = $SheetDataKey['no_izin'];
                $nama_pimpinan = $SheetDataKey['nama_pimpinan'];
                $nik = $SheetDataKey['nik'];
                $jenis_usaha = $SheetDataKey['jenis_usaha'];
                $alamat = $SheetDataKey['alamat'];
                $desa = $SheetDataKey['desa'];
                $kecamatan = $SheetDataKey['kecamatan'];
                $kabupaten = $SheetDataKey['kabupaten'];
                $komoditas = $SheetDataKey['komoditas'];
                $gambar = $SheetDataKey['gambar'];
                $lat = $SheetDataKey['lat'];
                $long = $SheetDataKey['long'];
                $jml_anggota = $SheetDataKey['jml_anggota'];
                $kapasitas_produksi = $SheetDataKey['kapasitas_produksi'];
                $informasi_gizi = $SheetDataKey['informasi_gizi'];
                $metode_pemasaran = $SheetDataKey['metode_pemasaran'];
                $pendapatan_hari = $SheetDataKey['pendapatan_hari'];
                $pendapatan_bulan = $SheetDataKey['pendapatan_bulan'];
                $kondisi_kemasan = $SheetDataKey['kondisi_kemasan'];
                $kualitas_produk = $SheetDataKey['kualitas_produk'];
                $status_kepemilikan = $SheetDataKey['status_kepemilikan'];
                $kepemilikan_koperasi = $SheetDataKey['kepemilikan_koperasi'];
                $jml_unit_usaha = $SheetDataKey['jml_unit_usaha'];
                $struktul_kepemilikan = $SheetDataKey['struktul_kepemilikan'];
                $kepemilikan_tempat = $SheetDataKey['kepemilikan_tempat'];
                $sumber_modal  = $SheetDataKey['sumber_modal'];
                $model_penggajian  = $SheetDataKey['model_penggajian'];
                $nilai_investasi = $SheetDataKey['nilai_investasi'];
                $nilai_produksi = $SheetDataKey['nilai_produksi'];
                $nilai_bahan_baku = $SheetDataKey['nilai_bahan_baku'];
                $nilai_tenaga_kerja = $SheetDataKey['nilai_tenaga_kerja'];
                $gaji_perbulan = $SheetDataKey['gaji_perbulan'];
                $gaji_perhari = $SheetDataKey['gaji_perhari'];
                $luas_lahan = $SheetDataKey['luas_lahan'];
                $fax = $SheetDataKey['fax'];
                $telpon = $SheetDataKey['telpon'];
                $email = $SheetDataKey['email'];
                $website = $SheetDataKey['website'];
                $total_modal = $SheetDataKey['total_modal'];
                $produk_unggulan = $SheetDataKey['produk_unggulan'];
                $jumlah_tenaga_kerja = $SheetDataKey['jumlah_tenaga_kerja'];
                $rerata_biaya = $SheetDataKey['rerata_biaya'];
                $nominal_gaji_perbulan = $SheetDataKey['nominal_gaji_perbulan'];
                $nominal_gaji_perhari = $SheetDataKey['nominal_gaji_perhari'];
                $nominal_omzet = $SheetDataKey['nominal_omzet'];
                $pendapatan_harian = $SheetDataKey['pendapatan_harian'];
                $pendapatan_bulanan = $SheetDataKey['pendapatan_bulanan'];
                $jumlah_unit_usaha = $SheetDataKey['jumlah_unit_usaha'];

             
                /* $created_at = filter_var(trim($sheetData[$i][$created_at]), FILTER_SANITIZE_STRING);
                $updated_at = filter_var(trim($sheetData[$i][$updated_at]), FILTER_SANITIZE_STRING);
                $deleted_at = filter_var(trim($sheetData[$i][$deleted_at]), FILTER_SANITIZE_STRING); */
                $nama_usaha = filter_var(trim($sheetData[$i][$nama_usaha]), FILTER_SANITIZE_STRING);
                $tahun_berdiri = filter_var(trim($sheetData[$i][$tahun_berdiri]), FILTER_SANITIZE_STRING);
                $no_izin = filter_var(trim($sheetData[$i][$no_izin]), FILTER_SANITIZE_STRING);
                $nama_pimpinan = filter_var(trim($sheetData[$i][$nama_pimpinan]), FILTER_SANITIZE_STRING);
                $nik = filter_var(trim($sheetData[$i][$nik]), FILTER_SANITIZE_STRING);
                $jenis_usaha = filter_var(trim($sheetData[$i][$jenis_usaha]), FILTER_SANITIZE_STRING);
                $alamat = filter_var(trim($sheetData[$i][$alamat]), FILTER_SANITIZE_STRING);
                $desa = filter_var(trim($sheetData[$i][$desa]), FILTER_SANITIZE_STRING);
                $kecamatan = filter_var(trim($sheetData[$i][$kecamatan]), FILTER_SANITIZE_STRING);
                $kabupaten = filter_var(trim($sheetData[$i][$kabupaten]), FILTER_SANITIZE_STRING);
                $komoditas = filter_var(trim($sheetData[$i][$komoditas]), FILTER_SANITIZE_STRING);
                $gambar = filter_var(trim($sheetData[$i][$gambar]), FILTER_SANITIZE_STRING);
                $lat = filter_var(trim($sheetData[$i][$lat]), FILTER_SANITIZE_STRING);
                $long = filter_var(trim($sheetData[$i][$long]), FILTER_SANITIZE_STRING);
                $jml_anggota = filter_var(trim($sheetData[$i][$jml_anggota]), FILTER_SANITIZE_STRING);
                $kapasitas_produksi = filter_var(trim($sheetData[$i][$kapasitas_produksi]), FILTER_SANITIZE_STRING);
                $informasi_gizi = filter_var(trim($sheetData[$i][$informasi_gizi]), FILTER_SANITIZE_STRING);
                $metode_pemasaran = filter_var(trim($sheetData[$i][$metode_pemasaran]), FILTER_SANITIZE_STRING);
                $pendapatan_hari = filter_var(trim($sheetData[$i][$pendapatan_hari]), FILTER_SANITIZE_STRING);
                $pendapatan_bulan = filter_var(trim($sheetData[$i][$pendapatan_bulan]), FILTER_SANITIZE_STRING);
                $kondisi_kemasan = filter_var(trim($sheetData[$i][$kondisi_kemasan]), FILTER_SANITIZE_STRING);
                $status_kepemilikan = filter_var(trim($sheetData[$i][$status_kepemilikan]), FILTER_SANITIZE_STRING);
                $kepemilikan_koperasi = filter_var(trim($sheetData[$i][$kepemilikan_koperasi]), FILTER_SANITIZE_STRING);
                $sumber_modal = filter_var(trim($sheetData[$i][$sumber_modal]), FILTER_SANITIZE_STRING);
                $jml_unit_usaha = filter_var(trim($sheetData[$i][$jml_unit_usaha]), FILTER_SANITIZE_STRING);
                $struktul_kepemilikan = filter_var(trim($sheetData[$i][$struktul_kepemilikan]), FILTER_SANITIZE_STRING);
                //$kepemilikan_tempat = filter_var(trim($sheetData[$i][$kepemilikan_tempat]), FILTER_SANITIZE_STRING);
                $status_kepemilikan = filter_var(trim($sheetData[$i][$status_kepemilikan]), FILTER_SANITIZE_STRING);
                $model_penggajian = filter_var(trim($sheetData[$i][$model_penggajian]), FILTER_SANITIZE_STRING);
                $nilai_investasi = filter_var(trim($sheetData[$i][$nilai_investasi]), FILTER_SANITIZE_STRING);
                $nilai_produksi = filter_var(trim($sheetData[$i][$nilai_produksi]), FILTER_SANITIZE_STRING);
                $nilai_bahan_baku = filter_var(trim($sheetData[$i][$nilai_bahan_baku]), FILTER_SANITIZE_STRING);
                $nilai_tenaga_kerja = filter_var(trim($sheetData[$i][$nilai_tenaga_kerja]), FILTER_SANITIZE_STRING);
                $gaji_perbulan = filter_var(trim($sheetData[$i][$gaji_perbulan]), FILTER_SANITIZE_STRING);
                $gaji_perhari = filter_var(trim($sheetData[$i][$gaji_perhari]), FILTER_SANITIZE_STRING);
                $luas_lahan = filter_var(trim($sheetData[$i][$luas_lahan]), FILTER_SANITIZE_STRING);
                $fax = filter_var(trim($sheetData[$i][$fax]), FILTER_SANITIZE_STRING);
                $telpon = filter_var(trim($sheetData[$i][$telpon]), FILTER_SANITIZE_STRING);
                $email = filter_var(trim($sheetData[$i][$email]), FILTER_SANITIZE_STRING);
                $website = filter_var(trim($sheetData[$i][$website]), FILTER_SANITIZE_STRING);
                $total_modal = filter_var(trim($sheetData[$i][$total_modal]), FILTER_SANITIZE_STRING);
                $produk_unggulan = filter_var(trim($sheetData[$i][$produk_unggulan]), FILTER_SANITIZE_STRING);
                $jumlah_tenaga_kerja = filter_var(trim($sheetData[$i][$jumlah_tenaga_kerja]), FILTER_SANITIZE_STRING);
                $rerata_biaya = filter_var(trim($sheetData[$i][$rerata_biaya]), FILTER_SANITIZE_STRING);
                $nominal_gaji_perhari = filter_var(trim($sheetData[$i][$nominal_gaji_perhari]), FILTER_SANITIZE_STRING);
                $nominal_omzet = filter_var(trim($sheetData[$i][$nominal_omzet]), FILTER_SANITIZE_STRING);
                $pendapatan_harian = filter_var(trim($sheetData[$i][$pendapatan_harian]), FILTER_SANITIZE_STRING);
                $pendapatan_bulanan = filter_var(trim($sheetData[$i][$pendapatan_bulanan]), FILTER_SANITIZE_STRING);
                $jumlah_unit_usaha = filter_var(trim($sheetData[$i][$jumlah_unit_usaha]), FILTER_SANITIZE_STRING);
                

               
               
                //fetch data to array
                $fetchData[] = array(/* 'created_at'=> $created_at,'updated_at'=>$updated_at,'deleted_at'=> $deleted_at, */
                'nama_usaha'=> $nama_usaha,'tahun_berdiri'=> $tahun_berdiri,'no_izin'=> $no_izin,'nama_pimpinan'=>$nama_pimpinan,
                'nik'=>$nik,'jenis_usaha'=>$jenis_usaha,'alamat'=>$alamat,'desa'=>$desa,'kecamatan'=>$kecamatan,
                'kabupaten'=>$kabupaten,'komoditas'=>$komoditas,'gambar'=>$gambar,'lat'=>$lat,'long'=>$long,
                'jml_anggota'=>$jml_anggota,'kapasitas_produksi'=>$kapasitas_produksi,'informasi_gizi'=>$informasi_gizi,
                'metode_pemasaran'=>$metode_pemasaran,'pendapatan_hari'=>$pendapatan_hari,'pendapatan_bulan'=>$pendapatan_bulan,
                'kondisi_kemasan'=>$kondisi_kemasan,'kualitas_produk'=>$kualitas_produk,'status_kepemilikan'=>$status_kepemilikan,
                'kepemilikan_koperasi'=>$kepemilikan_koperasi,'jml_unit_usaha'=>$jml_unit_usaha,'struktul_kepemilikan'=>$struktul_kepemilikan,
                'kepemilikan_tempat'=>$kepemilikan_tempat,'sumber_modal'=>$sumber_modal,
                'model_penggajian'=>$model_penggajian,'nilai_investasi'=>$nilai_investasi,'nilai_produksi'=> $nilai_produksi,
                'nilai_bahan_baku'=>$nilai_bahan_baku,'nilai_tenaga_kerja'=>$nilai_tenaga_kerja,'gaji_perbulan'=>$gaji_perbulan,
                'gaji_perhari'=>$gaji_perhari,'luas_lahan'=>$luas_lahan,
                'fax' =>$fax,'telpon'=>$telpon,'email'=>$email,'website'=>$website,'total_modal'=> $total_modal,
                'produk_unggulan'=>$produk_unggulan,'jumlah_tenaga_kerja'=>$jumlah_tenaga_kerja,'rerata_biaya'=>$rerata_biaya
                ,'nominal_gaji_perbulan'=>$nominal_gaji_perbulan,'nominal_gaji_perhari'=>$nominal_gaji_perhari,'nominal_omzet'=>$nominal_omzet,
                'pendapatan_harian'=>$pendapatan_harian,'pendapatan_bulanan'=> $pendapatan_bulanan,
                'jumlah_unit_usaha'=>$jumlah_unit_usaha);
            }
            $data['dataInfo'] = $fetchData;
            $this->db->insert_batch('profil_usaha', $fetchData);
            redirect("admin/usaha");

        // print_r($sheetData);
        }
        }


    





    }


    


    
        
        
    
   
    


}
?>