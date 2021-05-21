<?php

class Bantuan extends CI_Controller{
    function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_bantuan');
		$this->load->library('upload');
        $this->load->library('form_validation');
        
    }
    function index(){
        $x['data'] = $this->m_bantuan->get_data_usaha();
        $this->load->view('admin/v_bantuan',$x);
    }


    public function datatables()
    {
    if($this->input->is_ajax_request()){
            $this->load->helper('datatable_column');
            header('Content-Type: application/json');
            
            $this->datatables->select('id_bantuan,created_at,nama_usaha,asal_bantuan,jenis_bantuan');
            $this->datatables->from('data_bantuan');
            $this->datatables->where('deleted_at','0000-00-00 00:00:00');
            $this->datatables->add_column('action', '$1','action_bantuan(id_bantuan)');
            echo $this->datatables->generate();
    } else {
            header('Content-Type: application/json');
            $this->datatables->select('*');
            $this->datatables->from('data_bantuan');
            echo $this->datatables->generate();
        }
    }


    

    public function ajax_edit($id){
        $data= $this->m_bantuan->get_bantuan_by_id($id);
        echo json_encode($data);
    }


    function ajax_delete($id){
        $this->m_bantuan->delete($id);
        echo json_encode(array("status"=>TRUE));
    }



    public function ajax_add()
    {
        $id_bantuan = $this->input->post("id_bantuan");
        $asal_bantuan = $this->input->post("asal_bantuan");
        $jenis_bantuan = $this->input->post("jenis_bantuan");
        $id_usaha =$this->input->post("id_usaha");

        $data = [
            "id_usaha"=>$id_usaha,
            "asal_bantuan"=>$asal_bantuan,
            "jenis_bantuan"=>$jenis_bantuan,
        ];

        $this->m_bantuan->insert($data);
        echo json_encode(array("status"=>TRUE));
        

    }
    

    public function ajax_update()
    {
        $id_bantuan = $this->input->post("id_bantuan");
        $asal_bantuan = $this->input->post("asal_bantuan");
        $jenis_bantuan = $this->input->post("jenis_bantuan");
        $id_usaha =$this->input->post("id_usaha");

        $data = [
            "id_usaha"=>$id_usaha,
            "asal_bantuan"=>$asal_bantuan,
            "jenis_bantuan"=>$jenis_bantuan
        ];

        $this->m_bantuan->update(array("id_bantuan"=>$id_bantuan),$data);
        echo json_encode(array("status"=>TRUE));

    }


    public function delete(){
        $id_bantuan=$this->uri->segment(4);
        $this->m_bantuan->deleted_at($id_bantuan,array('deleted_at'=>date("Y-m-d H:i:s")));
        redirect('admin/bantuan');
     }

    
   
        
         
        
    

           
             
        

       

    

}
?>