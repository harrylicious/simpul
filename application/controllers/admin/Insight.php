<?php

class Insight extends CI_Controller{
    function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_insight');
        $this->load->model("m_pengguna");
		$this->load->library('upload');
        
    }

    function index(){
       
        $this->load->view('admin/v_insight');
    }

    public function datatables()
    {
      if($this->input->is_ajax_request()){
			$this->load->helper('datatable_column');
            header('Content-Type: application/json');
			$this->datatables->select('id_insight,created_at,judul,gambar,kategori');
            $this->datatables->from('data_insight');
            $this->datatables->where('deleted_at','0000-00-00 00:00:00');
            $this->datatables->add_column('gambar', '$1','photo_insight(gambar)');
			$this->datatables->add_column('action', '$1','action_insight(id_insight)');
            echo $this->datatables->generate();
      } else {
			header('Content-Type: application/json');
			$this->datatables->select('*');
            $this->datatables->from('data_insight');
            echo $this->datatables->generate();
        }
    }

    public function post_insight(){
        $x['data'] = $this->m_insight->get_all_kategori();
        $this->load->view('admin/v_add_insight',$x);
        
        
    }
    public function edit_insight(){
        $kode=$this->uri->segment(4);
        $x['data']=$this->m_insight->get_insight_by_id($kode);
        $x['kat'] = $this->m_insight->get_all_kategori();
        $this->load->view('admin/v_edit_insight',$x);
        
    }

    function save_insight(){
        $config['upload_path'] = './assets/images/insight/'; //path folder
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
                    $config['source_image']='./assets/images/insight/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '60%';
                    $config['width']= 710;
                    $config['height']= 460;
                    $config['new_image']= './assets/images/insight/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar=$gbr['file_name'];
                    $judul=strip_tags($this->input->post('xjudul'));
                    $isi=$this->input->post('xisi');
                    $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
                    $trim     = trim($string);
                    $slug     = strtolower(str_replace(" ", "-", $trim));
                    $kategori_id=strip_tags($this->input->post('xkategori'));
                    //$imgslider=$this->input->post('ximgslider');
                    $kode=$this->session->userdata('idadmin');
                    $user=$this->m_pengguna->get_pengguna_login($kode);
                    $p=$user->row_array();
                    $user_id=$p['pengguna_id'];
                    $data =[
                        "judul"=>$judul,
                        "gambar"=>$gambar,
                        "isi"=>$isi,
                        "slug"=>$slug,
                        "id_pengguna"=>$user_id,
                        "id_kategori_insight"=>$kategori_id

                    ];
                    $this->m_insight->insert_insight($data);
                    echo $this->session->set_flashdata('msg','success');
                    redirect('admin/insight');
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/tulisan');
            }

        }else{
            redirect('admin/tulisan');
        }

}

function update_insight(){

        $config['upload_path'] = './assets/images/insight/'; //path folder
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
                    $config['source_image']='./assets/images/insight/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '60%';
                    $config['width']= 710;
                    $config['height']= 460;
                    $config['new_image']= './assets/images/insight/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar=$gbr['file_name'];
                    $insight_id=$this->input->post('kode');
                    $judul=strip_tags($this->input->post('xjudul'));
                    $isi=$this->input->post('xisi');
                    $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
                    $trim     = trim($string);
                    $slug     = strtolower(str_replace(" ", "-", $trim));
                    $kategori_id=strip_tags($this->input->post('xkategori'));
                    //$imgslider=$this->input->post('ximgslider');
                    $kode=$this->session->userdata('idadmin');
                    $user=$this->m_pengguna->get_pengguna_login($kode);
                    $p=$user->row_array();
                    $user_id=$p['pengguna_id'];
                    $data =[
                        "judul"=>$judul,
                        "gambar"=>$gambar,
                        "isi"=>$isi,
                        "slug"=>$slug,
                        "id_pengguna"=>$user_id,
                        "id_kategori_insight"=>$kategori_id

                    ];
                    $this->m_insight->update_insight($insight_id,$data);
                    echo $this->session->set_flashdata('msg','success');
                    redirect('admin/insight');

            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('admin/pengguna');
            }

            }else{
                    $insight_id=$this->input->post('kode');
                    $judul=strip_tags($this->input->post('xjudul'));
                    $isi=$this->input->post('xisi');
                    $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
                    $trim     = trim($string);
                    $slug     = strtolower(str_replace(" ", "-", $trim));
                    $kategori_id=strip_tags($this->input->post('xkategori'));   
                    //$imgslider=$this->input->post('ximgslider');
                    $kode=$this->session->userdata('idadmin');
                    $user=$this->m_pengguna->get_pengguna_login($kode);
                    $p=$user->row_array();
                    $user_id=$p['pengguna_id'];
                    $data =[
                        "judul"=>$judul,
                        "isi"=>$isi,
                        "slug"=>$slug,
                        "id_pengguna"=>$user_id,
                        "id_kategori_insight"=>$kategori_id

                    ];
                    $this->m_insight->update_insight($insight_id,$data);
                    echo $this->session->set_flashdata('msg','success');
                    redirect('admin/insight');
        }

}
public function delete(){
    $id_insight=$this->uri->segment(4);
    $this->m_insight->deleted_at_insight($id_insight,array('deleted_at'=>date("Y-m-d H:i:s")));
    echo $this->session->set_flashdata('msg','success-hapus');
    redirect('admin/insight');
 }


}
?>