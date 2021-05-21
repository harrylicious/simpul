<?php
class M_profil_usaha extends CI_Model{

    public $table ="data_usaha";
    public $tabel_usaha="profil_usaha";
    public $tabel_jenis_usaha ="ket_jenis_usaha";
    public $tabel_kepemilikan ="ket_status_kepemilikan";
    public $tabel_wilayah = "wilayah_2020";
    public $tabel_sumber_modal = "ket_sumber_modal";

    public $id = "id_usaha";
    public $order ="DESC";


    function __construct()
    {
        parent::__construct();
    }
    

   

    // get all
    function get_all(){
        return $this->db->get($this->table);
    }


    // kabupaten
    function get_kabupaten()
    {
        $this->db->where("CHAR_LENGTH(kode)=",5);
        return $this->db->get($this->tabel_wilayah);
    }
    // get kecamatan
    function get_kecamatan($kode)
    {
        $condition=array('LEFT(kode,5)'=>$kode,'CHAR_LENGTH(kode)='=>8);
        $this->db->where($condition);
        return $this->db->get($this->tabel_wilayah)->result();

    }
    
    //get desa
    function get_desa($kode)
    {
        $condition=array('LEFT(kode,8)'=>$kode,'CHAR_LENGTH(kode)='=>13);
        $this->db->where($condition);
        return $this->db->get($this->tabel_wilayah)->result();

    }

    //jenis usaha
    function get_data_jenis_usaha()
    {
        return $this->db->get($this->tabel_jenis_usaha);
    }

    // get sumber modal
    function get_sumber_modal()
    {
      return $this->db->get($this->tabel_sumber_modal);
    }

    // get kepemilikan
    function get_status()
    {
        return $this->db->get($this->tabel_kepemilikan);
    }
    
    //limit
    function get_limit()
    {
    
        $this->db->limit(10);
        return $this->db->get($this->table);
    }

    // get by id

    function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table);
    }

    //insert data
    function insert(){
        /* DATA PROFIL USAHA */
        $nama_usaha = $this->input->post("nama_usaha"); 
        $no_izin = $this->input->post("no_izin");
        $tahun_berdiri = $this->input->post("tahun_berdiri");
        $nama_pimpinan = $this->input->post("nama_pimpinan");
        $nik_pimpinan = $this->input->post("nik_pimpinan");
        $jenis_usaha = $this->input->post("jenis_usaha");
        $komoditas = $this->input->post("komoditas");
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
        // $ubah_format_nilai_investasi= preg_replace('/[Rp.]/','',$nilai_investasi);
        $ubah_format_nilai_produksi = preg_replace('/[Rp.]/','',$nilai_produksi);
        $ubah_format_nilai_bahan_baku = preg_replace('/[Rp.]/','',$nilai_bahan_baku);


        /* MULAI DATABASE TRANSACTION */
        $this->db->trans_begin();

        if($this->cek($no_izin)== FALSE){
            $data_profil = [
                'nama_usaha' => $nama_usaha,
                'no_izin' => $no_izin,
                'tahun_berdiri' => $tahun_berdiri,
                'nama_pimpinan' => $nama_pimpinan,
                'nik' => $nik_pimpinan,
                'jenis_usaha' => $jenis_usaha,
                'komoditas' => $komoditas,
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
                "sumber_modal" => $sumber_modal,
                "total_modal"=> $ubah_format_total_modal,
                "nilai_produksi"=> $ubah_format_nilai_produksi,
                "nilai_bahan_baku"=>$ubah_format_nilai_bahan_baku,
                "produk_unggulan"=>$produk_unggulan ,
                "jumlah_tenaga_kerja"=>$jumlah_tenaga_kerja ,
                "rerata_biaya"=>$ubah_format_rupiah,
                "model_penggajian"=>$model_penggajian ,
                "nominal_gaji_perbulan"=>$ubah_format_nominal_gaji_perbulan,
                "nominal_gaji_perhari"=>$ubah_format_nominal_gaji_perhari,
                "nominal_omzet"=>$ubah_format_nominal_omzet ,
                "pendapatan_harian"=>$ubah_format_pendapatan_hari ,
                "pendapatan_bulanan"=>$ubah_format_pendapatan_perbulan,
                "jumlah_unit_usaha"=>$jumlah_unit_usaha ,
                "metode_pemasaran"=>$metode_pemesaran 
            ];
                
            $this->db->insert($this->tabel_usaha, $data_profil);
            $id_profile = $this->db->insert_id();

            /* INSERT BATCH LEGALITAS */
            $izin_legalitas = $this->input->post("id_izin_legalitas");
            $nama_izin_legalitas = $this->input->post("nama_izin_legalitas");
            $no_izin_legalitas = $this->input->post("no_izin_legalitas");
            $th_izin_legalitas = $this->input->post("th_izin_legalitas");
            $data_legalitas = [];

            if($izin_legalitas != null){
                for($i = 0; $i < count($izin_legalitas); $i++)
                {
                    $data_legalitas[] = [
                        'id_usaha' => $id_profile,
                        'nama_izin' => $nama_izin_legalitas[$i],
                        'no_izin' => $no_izin_legalitas[$i],
                        'th_izin' => $th_izin_legalitas[$i]
                    ];
                }
                
                $this->db->insert_batch('legalitas', $data_legalitas);
            }

            /* INSERT BATCH BANTUAN */
            $asal_bantuan = $this->input->post("asal_bantuan");
            $jenis_bantuan = $this->input->post("jenis_bantuan");
            $data_bantuan = [];

            if($asal_bantuan != null){
                for($i = 0; $i < count($asal_bantuan); $i++)
                {
                    $data_bantuan[] = [
                        'id_usaha' => $id_profile,
                        'asal_bantuan' => $asal_bantuan[$i],
                        'jenis_bantuan' => $jenis_bantuan[$i]
                    ];
                }
                
                $this->db->insert_batch('bantuan', $data_bantuan);
            }

            /* INSERT BATCH PRODUCTS */
            $nama_produk = $this->input->post("nama_produk");
            $jenis_produk = $this->input->post("jenis_produk");
            $harga = $this->input->post("harga");
            $deskripsi = $this->input->post("deskripsi");
            $jml_produksi_bulanan = $this->input->post("jml_produksi_bulanan");

            $data_produk = [];

            $upload_path = 'assets/images/products/'; //path folder
            $thumbnail_path = 'assets/images/products/thumbnail'; //thumbnail folder

            /* make dir upload path */
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, TRUE);
            }
    
            /* make dir upload thumbnail path */
            if (!is_dir($thumbnail_path)) {
                mkdir($thumbnail_path, 0777, TRUE);
            }

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);
            $this->load->library('image_lib');

            for($i = 0; $i < count($nama_produk); $i++){
                $_FILES['file']['name'] = $_FILES['photo']['name'][$i];
                $_FILES['file']['type'] = $_FILES['photo']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['photo']['error'][$i];
                $_FILES['file']['size'] = $_FILES['photo']['size'][$i];

                if(!empty($_FILES['file']['name']))
                {
                    if ($this->upload->do_upload('file'))
                    {
                        $gbr = $this->upload->data();

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $upload_path.$gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = TRUE;
                        $config['quality'] = '60%';
                        $config['width'] = 420;
                        $config['height'] = 420;
                        $config['new_image'] = $thumbnail_path . '/' . $gbr['file_name'];
                        $this->image_lib->clear();
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                    } else {
                        // echo $this->upload->display_errors(); die;
                    }
                }
                        
                $data_produk[] = [
                    "id_usaha" => $id_profile,
                    "nama_produk" => $nama_produk[$i],
                    "jenis_produk" => $jenis_produk[$i],
                    "harga" => preg_replace('/[Rp.]/','',$harga[$i]),
                    "slug" => $this->slug->create_uri($nama_produk[$i]),
                    "deskripsi" => $deskripsi[$i],
                    "photo" => isset($gbr['file_name']) ? $gbr['file_name'] : '',
                    "jml_produksi_bulanan" => $jml_produksi_bulanan[$i]
                ];
            }
            
            $this->db->insert_batch('produk',  $data_produk);
            
        } else {
            $this->session->set_flashdata('error_msg', 'Nomor izin sudah digunakan');
            return redirect("admin/usaha");
        }

        /* DATABASE TRANSACTION SELESAI, ROLLBACK JIKA TERJADI KESALAHAN, COMMIT JIKA TIDAK ADA KESALAHAN */
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('msg','Data UMKM/IKM berhasil ditambahkan');
        }
                
    }

    //update data
    function update($id,$data){
        $this->db->where($this->id,$id);
        $this->db->update($this->tabel_usaha,$data);
    }

    //delete
    function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->table);
    }

    function cek($no_izin){
        $this->db->where('no_izin', $no_izin);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }










   


}

?>