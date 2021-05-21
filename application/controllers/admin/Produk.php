<?php

class Produk extends CI_Controller{
    function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_produk');
        $this->load->model('m_kategori_usaha');
		$this->load->library('upload');
        
    }
    function index(){
       
        $this->load->view('admin/v_produk');
    }

    public function datatables()
    {
      if($this->input->is_ajax_request()){
			$this->load->helper('datatable_column');
            header('Content-Type: application/json');
            
			$this->datatables->select('id_produk,created_at,nama_usaha,photo,nama_produk,jenis_produk,harga,jml_produksi_bulanan,deskripsi');
            $this->datatables->from('data_produk');
            $this->datatables->where('deleted_at','0000-00-00 00:00:00');
            $this->datatables->add_column('photo', '$1','photo_produk(photo)');
            $this->datatables->add_column('harga', '$1','format_rupiah(harga)');
			$this->datatables->add_column('action', '$1','action_produk(id_produk)');
            echo $this->datatables->generate();
      } else {
			header('Content-Type: application/json');
			$this->datatables->select('*');
            $this->datatables->from('data_produk');
            echo $this->datatables->generate();
        }
    }


    function Edit($id){
        $produk = $this->m_produk->get_produk_by_kode($id)->row();

        if(!$produk)
        {
            $this->session->set_flashdata('error_msg','Produk tidak ditemukan');
            redirect('admin/produk');
        }

        $x['produk'] = $produk;
        $x['selected']= $this->m_produk->get_data_usaha();
        $this->load->view('admin/v_edit_produk',$x);
    }

    function tambah(){
        $x['data']= $this->m_produk->get_data_usaha();
        $x['kategori']= $this->m_kategori_usaha->get_all();
        $this->load->view('admin/v_add_produk',$x);
    }


    function simpan_produk(){
        $this->load->library('image_lib');
        $this->load->helper('slug');
        $gambar = '';
        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name']))
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $newSize = 300;
                $imageSize = $this->image_lib->get_image_properties($config['source_image'], TRUE);
                $config['width'] = $newSize;
                $config['height'] = $newSize;
                $config['y_axis'] = ($imageSize['height'] - $newSize) / 2;
                $config['x_axis'] = ($imageSize['width'] - $newSize) / 2;

                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
            }
        }
        
        $id_usaha = $this->input->post("id_usaha");
        $nama_produk = $this->input->post("nama_produk");
        $jenis_produk = $this->input->post("jenis_produk");
        $harga =$this->input->post("harga");
        $jumlah_produksi = $this->input->post("jumlah_produksi_perbulan");
        $deskripsi = $this->input->post("deskripsi");

        $str_rp = str_replace("Rp.","", $harga);
        $replace_dot = str_replace(".","", $str_rp);

        $check_validation = $this->m_produk->check_duplicate($nama_produk);
        
        if($check_validation ==false){
            $data = [
                "id_usaha" => $id_usaha,
                "nama_produk" => $nama_produk,
                "slug" => generateSlug($nama_produk, 'produk', 'slug'),
                "jenis_produk" => $jenis_produk,
                "harga" => $replace_dot,
                "jml_produksi_bulanan" => $jumlah_produksi,
                "deskripsi" => $deskripsi,
                "photo" => $gambar
            ];

            $this->m_produk->insert($data);

            $this->session->set_flashdata('msg','success');

            redirect('admin/produk');
            
        }else{
            $this->session->set_flashdata('msg','info');
            redirect('admin/produk');
        }   
    }


    function update_produk($id){
        $this->load->library('image_lib');
        $this->load->helper('slug');
        $produk = $this->m_produk->get_produk_by_kode($id)->row();

        if(!$produk)
        {
            $this->session->set_flashdata('error_msg','Produk tidak ditemukan');
            redirect('admin/produk');
        }

        $gambar = $produk->photo;

        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name']))
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $newSize = 300;
                $imageSize = $this->image_lib->get_image_properties($config['source_image'], TRUE);
                $config['width'] = $newSize;
                $config['height'] = $newSize;
                $config['y_axis'] = ($imageSize['height'] - $newSize) / 2;
                $config['x_axis'] = ($imageSize['width'] - $newSize) / 2;

                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
            }
        }
        
        $id_usaha = $this->input->post("id_usaha");
        $nama_produk = $this->input->post("nama_produk");
        $jenis_produk = $this->input->post("jenis_produk");
        $harga =$this->input->post("harga");
        $jumlah_produksi = $this->input->post("jumlah_produksi_perbulan");
        $deskripsi = $this->input->post("deskripsi");

        $str_rp = str_replace("Rp.","",$harga);
        $replace_dot = str_replace(".","",$str_rp);

        
        $data = [
                    "id_usaha"=> $id_usaha,
                    "slug" => $produk->slug == null | $produk->slug == '' ? generateSlug($nama_produk, 'produk', 'slug') : $produk->slug,
                    "nama_produk"=> $nama_produk,
                    "jenis_produk"=>$jenis_produk,
                    "harga" => $replace_dot,
                    "jml_produksi_bulanan"=>$jumlah_produksi,
                    "deskripsi"=>$deskripsi,
                    "photo" => $gambar
                ];
        $this->m_produk->update($id, $data);
        $this->session->set_flashdata('msg','success');
        redirect('admin/produk');

    }

    public function delete(){
        $id_produk=$this->uri->segment(4);
        $this->m_produk->update($id_produk,array('deleted_at'=>date("Y-m-d H:i:s")));
        redirect('admin/produk');
    }

}
?>