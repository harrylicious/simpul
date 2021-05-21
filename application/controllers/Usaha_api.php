<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Usaha_api extends Rest_Controller{
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database;
    }

    function index()
    {
        //$data = $this->m_profil_usaha->get_all();
        $data = $this->db->get('data_usaha')->result();
        $this->response($data, 200);
    }
    


  
}
?>