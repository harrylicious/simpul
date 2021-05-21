<?php

class M_galery extends CI_Model{
 
    public $tabel ="galery";
    public $id = "id_galery";
    public $order ="DESC";


    function __construct()
    {
        parent::__construct();
    }
    //datatable

    function json(){
        $this->datatables->select("path,keterangan,id_usaha");
        $this->datatables->from('galery');
        return $this->datatables->generate();

    }

    // get all
    function get_all(){
        $this->db->order_by($this->id,$this->order);
        return $this->db->get($this->table)->result();


    }

    // get by id

    function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

    //insert data
    function insert($data){
        $this->db->insert($this->tabel,$data);
        

    }
    
    //update data
    function update($id,$data){
        $this->db->where($this->id,$id);
        $this->db->update($this->table,$data);

    }
    function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->tabel);
    }

    
}
?>