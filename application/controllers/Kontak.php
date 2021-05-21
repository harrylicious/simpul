<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Kontak extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //inisialisasi model Produk_model.php dengan nama produk
        $this->load->model('M_produk', 'produk');
    }
    public function index_get()
    {
       $id = $this->get('id_produk');
        if ($id == '') {
            $produk = $this->db->get('produk')->result();
        } else {
            $this->db->where('id_produk', $id);
            $produk = $this->db->get('produk')->result();
        }
        $this->response($produk, REST_Controller::HTTP_OK);
    }
}

