<?php

class ProfilUsaha extends CI_Controller
{
     function __construct(){
		parent::__construct();

        $this->load->model("m_profil_usaha");

    }
    function index()
    {
        $x['data']= $this->m_profil_usaha->get_all();
        return $this->load->view('admin/view_tampil',$x);
    }

    function data_pelaku($id){

        $x['data']=$this->m_profil_usaha->get_by_id($id);
        return $this->load->view('admin/view_tampil',$x);
    }
    
    


}

?>