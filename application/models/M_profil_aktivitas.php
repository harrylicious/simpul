<?php
class M_profil_aktivitas extends CI_Model{
 
    public $tabel ="profil_aktivitas";
    public $id = "id_profil_aktivitas";
    public $order ="DESC";


    function __construct()
    {
        parent::__construct();
    }
    

    //datatable

    function json(){
        $this->datatables->select("sumber_modal,
        total_modal,
        produk_unggulan,
        avg_biaya_tenaga_harian,
        model_penggajian,
        gaji_perbulan,
        gaji_perhari,
        jml_omzet,
        klasifikasi_usaha,
        id_usaha");
        $this->datatables->from('profil_aktivitas');
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