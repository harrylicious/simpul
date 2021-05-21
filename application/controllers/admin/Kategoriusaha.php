<?php
class Kategoriusaha extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_kategori_usaha');
		$this->load->library('upload');
	}


	function index(){
		
		$this->load->view('admin/v_kategori_usaha');
    }
    

    public function datatables()
    {
      if($this->input->is_ajax_request()){
          $this->load->helper('datatable_column');
          header('Content-Type: application/json');
                
          $this->datatables->select('id,kategori');
          $this->datatables->from('ket_kategori_usaha');
          $this->datatables->where('deleted_at','0000-00-00 00:00:00');
          $this->datatables->add_column('action', '$1','action_kategori(id)');
          echo $this->datatables->generate();
      } else {
          header('Content-Type: application/json');
          $this->datatables->select('*');
          $this->datatables->from('ket_kategori_usaha');
          echo $this->datatables->generate();
        }
    }



    public function ajax_add()
    {
        $nama_kategori = $this->input->post("kategori");
        $check_validation = $this->m_kategori_usaha->check_duplicate($nama_kategori);
        if($check_validation == false){
            $data = [
               
                "kategori"=>$nama_kategori,
            ];

            $this->m_kategori_usaha->insert($data);
            echo json_encode(array("status"=>TRUE));
        }else {
            echo json_encode(array("status"=>FALSE));
        }

    }

    public function ajax_edit($id){
        $data = $this->m_kategori_usaha->get_kategori_usaha_by_id($id);
        echo json_encode($data);
    }


    public function ajax_update(){
        $id_kategori = $this->input->post("id_kategori");
        $nama_kategori = $this->input->post("kategori");
        

        $data = ["kategori"=>$nama_kategori];

        $this->m_kategori_usaha->update(array($id_kategori=>$id_kategori),$data);
        echo json_encode(array("status"=>TRUE));

    }


    
    public function delete(){
        $id_legalitas=$this->uri->segment(4);
        $this->m_kategori_usaha->deleted_at($id_kategori,array('deleted_at'=>date("Y-m-d H:i:s")));
        redirect('admin/legalitas');
     }

	

}
