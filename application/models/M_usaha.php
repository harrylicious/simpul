<?php
class M_usaha extends CI_Model{

    public $tabel ="usaha";
    public $tabel_produk ="produk";
    public $tabel_legalitas ="legalitas";
    public $tabel_bantuan ="bantuan";
    public $tabel_target_verifikasi ="target_verifikasi";
    public $view_perkabupaten ="data_usaha_perkabupaten";
    public $view_perkomoditas ="data_usaha_perkomoditas";
    public $view_total_luas_lahan_semua_komoditas ="data_usaha_total_luas_lahan_semua_komoditas";
    public $view_total_kapasitas_produksi_semua_komoditas ="data_usaha_total_kapasitas_produksi_semua_komoditas";
    public $view_data_aktif ="data_document_aktif";
    public $view_data_inaktif ="data_document_inaktif";
    public $id = "id";
    public $kode_user = "kode_user";
    public $nama = "nama_usaha";
    public $tahun_cipta = "tahun_berdiri";
    public $media = "alamat";
    public $jenis = "desa";
    public $kondisi = "kecamatan";
    public $instansi = "kabupaten";
    public $unit_arsip = "provinsi";
    public $kode_uk_up = "sektor_usaha";
    public $kode_klasifikasi = "sub_sektor_usaha";
    public $wilayah = "kabupaten";
    public $komoditas = "komoditas";
    public $order ="DESC"; 


    function __construct()
    {
        parent::__construct(); 
    }
     
 

    // get all
    function get_all(){
        $this->db->order_by($this->id,$this->order);
        return $this->db->get($this->tabel)->result(); 

    }

    // get all
    function get_all_verified_desa($desa){
        $this->db->order_by($this->id,$this->order);
        $this->db->where("desa", urldecode($desa));
        $this->db->where("is_verified", 1);
        return $this->db->get($this->tabel)->result(); 

    }

    
    // get all
    function get_all_non_verified_desa($desa){
        $this->db->order_by($this->id,$this->order);
        $this->db->where("desa", urldecode($desa));
        $this->db->where("is_verified", 0);
        return $this->db->get($this->tabel)->result(); 

        
    }

    // get all
    function get_all_verified_kecamatan($kecamatan){
        $this->db->order_by($this->id,$this->order);
        $this->db->where("kecamatan", urldecode($kecamatan));
        $this->db->where("is_verified", 1);
        return $this->db->get($this->tabel)->result(); 

    }

    
    // get all
    function get_all_non_verified_kecamatan($kecamatan){
        $this->db->order_by($this->id,$this->order);
        $this->db->where("kecamatan", urldecode($kecamatan));
        $this->db->where("is_verified", 0);
        return $this->db->get($this->tabel)->result(); 

    }
    
    
    // get all
    function get_all_perkabupaten($wilayah){
        if ($wilayah != "SEMUA") { 
            $this->db->where($this->wilayah, urldecode($wilayah));
        }
        return $this->db->get($this->view_perkabupaten); 

    }

    // get all
    function get_all_perkomoditas($komoditas){
        if ($komoditas != "SEMUA") { 
            $this->db->where($this->komoditas, urldecode($komoditas));
        }
        return $this->db->get($this->view_perkomoditas)->result(); 

    }

    
    // get all
    function get_all_data_usaha_perkabupaten($wilayah){
        if ($wilayah != "SEMUA") { 
            $this->db->where($this->wilayah, urldecode($wilayah));
        }
        return $this->db->get($this->tabel); 

    }

    // get all
    function get_all_data_usaha_perkomoditas($komoditas){
        if ($komoditas != "SEMUA") { 
            $this->db->where($this->komoditas, urldecode($komoditas));
        }
        return $this->db->get($this->tabel); 

    }
 
    
    // get all
    function get_data_total_luas_lahan_perkabupaten($wilayah, $komoditas){
        if ($wilayah == "SEMUA") { 
            $this->db->where($this->komoditas, urldecode($komoditas));
            return $this->db->get($this->view_total_luas_lahan_semua_komoditas); 
        }
        else {
            return $this->db->query("select kabupaten, sum(luas_lahan) as total from usaha where komoditas='".urldecode($komoditas)."' group by kabupaten"); 
        }

    }

      // get all
      function get_data_total_luas_lahan_perkecamatan($wilayah, $komoditas){
        if ($wilayah == "SEMUA") { 
            return $this->db->query("select kecamatan, sum(luas_lahan) from usaha where komoditas = '".urldecode($komoditas)."' group by kecamatan"); 
        }
        else {
            return $this->db->query("select kecamatan, sum(luas_lahan) from usaha where komoditas = '".urldecode($komoditas)."' and kabupaten='".urldecode($wilayahs)."'  group by kecamatan"); 
        }

    }

   


    // get all
    function get_data_total_kapasitas_produksi_perkabupaten($wilayah, $komoditas){
        if ($wilayah == "SEMUA") { 
            $this->db->where($this->komoditas, urldecode($komoditas));
            return $this->db->get($this->view_total_kapasitas_produksi_semua_komoditas); 
        }
        else {
            $this->db->select('kabupaten');
            $this->db->select_sum("luas_lahan");
            $this->db->group_by('kabupaten');
            $this->db->where($this->wilayah, urldecode($wilayah));
            $this->db->where($this->komoditas, urldecode($komoditas));
            return $this->db->get($this->tabel); 
        }
    
    }
    

    // get all
    function get_data_perkomoditas($komoditas){
        if ($komoditas != "SEMUA") {
            $this->db->where($this->komoditas, urldecode($komoditas));
        }
        return $this->db->get($this->tabel)->result(); 

    }

    
    // get all
    function get_target_verifikasi($id){
        $this->db->where($this->kode_user, $id);
        return $this->db->get($this->tabel_target_verifikasi); 

    }

    
    // get all
    function get_all_by_jenis($jenis){
        $this->db->order_by($this->id,$this->order);
        $this->db->where($this->jenis, urldecode($jenis));
        return $this->db->get($this->view)->result(); 

    }

    
    // get all
    function get_all_aktif(){
        $this->db->order_by($this->id,$this->order);
        return $this->db->get($this->view_data_aktif)->result(); 

    }

        
    // get all
    function get_all_inaktif(){
        $this->db->order_by($this->id,$this->order);
        return $this->db->get($this->view_data_inaktif)->result(); 

    }


   // get all
    function get_total(){
        return $this->db->get("total_data_usaha"); 
    }

     // get all
     function get_all_pengelola(){
        $this->db->order_by($this->id,$this->order);
        $this->db->where($this->jenis_media, "Video");
        return $this->db->get($this->view)->result(); 

    }

    // get detail 
    function get_detail($id){
        $this->db->where($this->id, $id); 
        return $this->db->get($this->tabel);  

    }


    // get detail
    function get_produk_by_id($id){  
        $this->db->where("id_usaha", urldecode($id));
        $this->db->order_by($this->id,$this->order);
        return $this->db->get($this->tabel_produk); 
    }

    // get detail
    function get_bantuan_by_id($id){  
        $this->db->where("id_usaha", urldecode($id));
        $this->db->order_by($this->id,$this->order);
        return $this->db->get($this->tabel_bantuan); 
    }

    
    // get detail
    function get_legalitas_by_id($id){    
        $this->db->where("id_usaha", urldecode($id));
        $this->db->order_by($this->id,$this->order);
        return $this->db->get($this->tabel_legalitas); 
    }



    function get_last_updated() {
        return $this->db->get("last_updated")->result();
    }

    // get all
    function get_persektor($sektor){
        $this->db->where("sektor_usaha", $sektor);
        return $this->db->get("jml_data_persektor"); 
    }

    // get all
    function get_perstatus($status){
        $this->db->where("is_activated", $status);
        return $this->db->get("jml_data_perstatus"); 
    }
 

    //insert data
    function insert($data){
        $this->db->insert($this->tabel,$data);
    }

  
    
    //update data
    function update($id,$data){
        $this->db->where($this->id,$id);
        $this->db->update($this->tabel,$data);

    }
    
    function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->tabel);
    }   
    
    
}

?>