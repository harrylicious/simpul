<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Datausaha extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //inisialisasi model Produk_model.php dengan nama produk
        $this->load->model('M_datausaha', 'usaha');
    }
    public function index_get($id)
    {
        if ($id == 'all') {
            $usaha = $this->db->get('data_usaha')->result();
        } else {
            $this->db->where('id_usaha', $id);
            $usaha = $this->db->get('data_usaha')->result();
        }
        $this->response($usaha, REST_Controller::HTTP_OK);
    }


  
}

