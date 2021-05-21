<?php
class Maps extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("m_profil_usaha");
    }

    function index(){
        $data['profil_usaha'] = $this->db->get_where('data_usaha', ['lat !=' => '', 'long !=' => '', 'deleted_at' => '0000-00-00 00:00:00'])->result();
      
        $this->load->view('depan/v_maps', $data);
    }

}
