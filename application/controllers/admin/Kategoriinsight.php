<?php

class Kategoriinsight extends CI_Controller{
    function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_produk');
        $this->load->model('m_insight');
		$this->load->library('upload');
        
    }
    function index(){
       
        $this->load->view('admin/v_kategori_insight');
    }


    public function datatables_kategori()
    {
      if($this->input->is_ajax_request()){
			$this->load->helper('datatable_column');
            header('Content-Type: application/json');
			$this->datatables->select('id_kategori_insight,created_at,kategori');
            $this->datatables->from("tbl_kategori_insight");
            $this->datatables->where('deleted_at','0000-00-00 00:00:00');
			$this->datatables->add_column('action', '$1','action_kategori_insight(id_kategori_insight)');
            echo $this->datatables->generate();
      } else {
			header('Content-Type: application/json');
			$this->datatables->select('*');
            $this->datatables->from('tbl_kategori_insight');
            echo $this->datatables->generate();
        }
    }
    public function ajax_add()
    {
        $nama_kategori = $this->input->post("kategori");
        $check_validation = $this->m_insight->check_duplicate($nama_kategori);
        if($check_validation == false){
            $data = [
               
                "kategori"=>$nama_kategori,
            ];

            $this->m_insight->insert($data);
            echo json_encode(array("status"=>TRUE));
        }else {
            echo json_encode(array("status"=>FALSE));
        }

    }

    public function ajax_edit($id){
        $data = $this->m_insight->get_kategori_usaha_by_id($id);
        echo json_encode($data);
    }


    public function ajax_update(){
        $id_kategori = $this->input->post("id_kategori_insight");
        $nama_kategori = $this->input->post("kategori");
    
        $data = ["kategori"=>$nama_kategori];

        $this->m_insight->update(array("id_kategori_insight"=>$id_kategori),$data);
        echo json_encode(array("status"=>TRUE));

    }


    
    public function delete(){
        $id_kategori=$this->uri->segment(4);
        $this->m_insight->deleted_at($id_kategori,array('deleted_at'=>date("Y-m-d H:i:s")));
        redirect('admin/kategoriinsight');
     }





}
?>