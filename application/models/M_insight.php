<?php
class M_insight extends CI_Model{

    public $table ="tbl_insight";
    public $table_kategori="tbl_kategori_insight";
   

    function __construct()
    {
        parent::__construct();
    }


    public function get_all_kategori()
    { 
        $this->db->from($this->table_kategori);
        $this->db->where('deleted_at', '0000-00-00 00:00:00');
        return $this->db->get();
        
    }


    public function get_kategori_usaha_by_id($id){
        $this->db->from($this->table_kategori);
        $this->db->where('id_kategori_insight',$id);
        $query = $this->db->get();
        return $query->row();
        
    }

    public function get_insight_by_id($id){
        $this->db->from($this->table);
        $this->db->where('id_insight',$id);
        $query = $this->db->get();
        return $query;
        
    }



    function insert_insight($data)
    {
        $this->db->insert($this->table,$data);
    }

    function update_insight($id,$data)
    {
        $this->db->where("id_insight",$id);
        $this->db->update($this->table,$data);
    }

    function insert($data){
        $this->db->insert($this->table_kategori,$data);
    
    }

    public function update($where,$data){
        
        $this->db->update($this->table_kategori,$data,$where);
        $this->db->affected_rows();
    }

    function deleted_at($id,$data){
        $this->db->where("id_kategori_insight",$id);
        $this->db->update($this->table_kategori,$data);

    }
    function deleted_at_insight($id,$data){
        $this->db->where("id_insight",$id);
        $this->db->update($this->table,$data);

    }



    function check_duplicate($kategori){
        $this->db->where("kategori",$kategori);
        $query = $this->db->get($this->table_kategori);
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }


    

}