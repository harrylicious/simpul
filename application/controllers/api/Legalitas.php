<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Legalitas extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //inisialisasi model Produk_model.php dengan nama produk
        $this->load->model('M_legalitas', 'legalitas');
    }
    public function index_get($id)
    {
        
         if ($id == 'all') {
             $legalitas = $this->db->get('data_legalitas')->result();
         } else {
             $this->db->where('id_legalitas', $id);
             $legalitas = $this->db->get('data_legalitas')->result();
         }
         $this->response($legalitas, REST_Controller::HTTP_OK);
    }

}

