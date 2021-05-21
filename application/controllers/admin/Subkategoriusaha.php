<?php
class Subkategoriusaha extends CI_Controller{
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
		$x['kategori']=$this->m_kategori_usaha->get_all();
		$this->load->view('admin/v_sub_kategori_usaha',$x);
    }
    

    public function datatables()
    {
      if($this->input->is_ajax_request()){
			$this->load->helper('datatable_column');
      header('Content-Type: application/json');
            
			$this->datatables->select('id,created_at,nama_sub');
            $this->datatables->from('ket_sub_kategori_usaha');
            $this->datatables->where('deleted_at','0000-00-00 00:00:00');
			$this->datatables->add_column('action', '$1','action_sub_kategori(id)');
            echo $this->datatables->generate();
      } else {
			header('Content-Type: application/json');
			$this->datatables->select('*');
            $this->datatables->from('ket_sub_kategori_usaha');
            echo $this->datatables->generate();
        }
    }

    public function ajax_add()
    {
        $nama_sub = $this->input->post("nama_sub");
        $kategori = $this->input->post('kategori');
        $check_validation = $this->m_kategori_usaha->check_duplicate_sub($nama_sub);
        if($check_validation == false){
            $data = [
               
                "nama_sub"=>$nama_sub,
                "id_kategori_usaha"=>$kategori
            ];

            $this->m_kategori_usaha->insert_sub($data);
            echo json_encode(array("status"=>TRUE));
        }else {
            echo json_encode(array("status"=>FALSE));
        }

    }

    public function ajax_edit($id){
        $data = $this->m_kategori_usaha->get_sub_kategori_usaha_by_id($id);
        echo json_encode($data);
    }


    public function ajax_update(){
        $id_kategori = $this->input->post("id_kategori");
        $nama_kategori = $this->input->post("sub_kategori");
        

        $data = ["nama_sub"=>$nama_kategori];

        $this->m_kategori_usaha->update_sub(array($id_kategori=>$id_kategori),$data);
        echo json_encode(array("status"=>TRUE));

    }


    
    public function delete(){
        $id_kategori=$this->uri->segment(4);
        $this->m_kategori_usaha->deleted_at_sub($id_kategori,array('deleted_at'=>date("Y-m-d H:i:s")));
        redirect('admin/legalitas');
     }

}
