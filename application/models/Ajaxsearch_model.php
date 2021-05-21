<?php
class Ajaxsearch_model extends CI_Model
{
    public function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("data_produk");
        if ($query != '') {
            $this->db->like('nama_usaha', $query);
            $this->db->or_like('nama_produk', $query);
        }
        $this->db->order_by('id_usaha', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }


    public function load_data_usaha($query)
    {
        $this->db->select("*");
        $this->db->from("data_usaha");
        if ($query != '') {
            $this->db->like('nama_usaha', $query);
            $this->db->or_like('kecamatan', $query);
        }
        $this->db->order_by('id_usaha', 'DESC');
        return $this->db->get();
    }
}
?>
