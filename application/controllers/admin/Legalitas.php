<?php

class Legalitas extends CI_Controller{
    function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_legalitas');
		$this->load->library('upload');
        $this->load->library('form_validation');
        
    }
    function index(){
        $x['data'] = $this->m_legalitas->get_data_usaha();
        $x['legalitas'] = $this->m_legalitas->get_ket_legalitas();
        $this->load->view('admin/v_legalitas',$x);
    }


    public function datatables()
    {
      if($this->input->is_ajax_request()){
			$this->load->helper('datatable_column');
      header('Content-Type: application/json');
            
			$this->datatables->select('id_legalitas,created_at,nama_usaha,no_izin,nama_izin,th_izin');
            $this->datatables->from('data_legalitas');
            $this->datatables->where('deleted_at','0000-00-00 00:00:00');
			$this->datatables->add_column('action', '$1','action_legalitas(id_legalitas)');
            echo $this->datatables->generate();
      } else {
			header('Content-Type: application/json');
			$this->datatables->select('*');
            $this->datatables->from('data_legalitas');
            echo $this->datatables->generate();
        }
    }

    public function ajax_add()
    {
        $id_legalitas = $this->input->post("id_legalitas");
        $nama_izin = $this->input->post("nama_izin");
        $no_izin = $this->input->post("no_izin");
        $th_izin =$this->input->post("th_izin");
        $id_usaha =$this->input->post("id_usaha");
        $check_validation = $this->m_legalitas->check_duplicate($nama_izin);
        if($check_validation == false){
            $data = [
                "id_usaha"=>$id_usaha,
                "nama_izin"=>$nama_izin,
                "no_izin"=>$no_izin,
                "th_izin"=>$th_izin
            ];

            $this->m_legalitas->insert($data);
            echo json_encode(array("status"=>TRUE));
        }else {
            echo json_encode(array("status"=>FALSE));
        }

    }

    public function ajax_edit($id){
        $data = $this->m_legalitas->get_legalitas_by_id($id);
        echo json_encode($data);
    }


    public function ajax_update()
    {
        $id_legalitas = $this->input->post("id_legalitas");
        $nama_izin = $this->input->post("nama_izin");
        $no_izin = $this->input->post("no_izin");
        $th_izin =$this->input->post("th_izin");
        $id_usaha =$this->input->post("id_usaha");

        $data = [
            "id_usaha"=>$id_usaha,
            "nama_izin"=>$nama_izin,
            "no_izin"=>$no_izin,
            "th_izin"=>$th_izin
        ];

        $this->m_legalitas->update(array("id_legalitas"=>$id_legalitas),$data);
        echo json_encode(array("status"=>TRUE));

    }


    
    public function delete(){
        $id_legalitas=$this->uri->segment(4);
        $this->m_legalitas->deleted_at($id_legalitas,array('deleted_at'=>date("Y-m-d H:i:s")));
        redirect('admin/legalitas');
     }
           
             
        

       

    

}
?>