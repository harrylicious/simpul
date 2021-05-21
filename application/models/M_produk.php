<?php
class M_produk extends CI_Model{

    public $table ="data_produk";
    public $produk ="produk";
    public $data_usaha ="data_usaha";
    public $id = "id_produk";
    //public $order ="DESC";

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    
    // get all
    function get_all(){
        return $this->db->get($this->table); 

    }
    function get_data_usaha(){
       return $this->db->get($this->data_usaha);
    }
    
    
    //get some data for home
    function get_produk_home($limit){
		$hsl = $this->db->order_by('id_produk', 'desc')->limit($limit)->get_where('data_produk', ['deleted_at' => '0000-00-00 00:00:00']);
		return $hsl;
    }

     function get_produk_home_byusaha($kode){
        $hsl=$this->db->query("SELECT *FROM data_produk where id_usaha='$kode' AND deleted_at='0000-00-00 00:00:00' ORDER BY id_produk DESC");
        return $hsl; 
    }
    

    function get_produk_page($offset,$limit){
		$hsl=$this->db->query("SELECT *FROM data_produk where deleted_at='0000-00-00 00:00:00' ORDER BY id_produk DESC limit $offset,$limit");
		return $hsl;
    }
    
     //get some data for home
     function get_jenis_usaha(){  
		$hsl=$this->db->query("SELECT *FROM data_produk ORDER BY id_produk DESC limit 4");
		return $hsl;
	}

   
    function get_produk_by_kode($id){
		$hsl = $this->db->get_where('data_produk', ['id_produk' => $id, 'deleted_at' => '0000-00-00 00:00:00']);
		return $hsl;
	}

    //insert data
    function insert($data){
        $this->db->insert($this->produk,$data);
    }

    function get_produk_by_id($id)
    {
        $this->db->where('id_usaha',$id);
        return $this->db->get($this->table);

    }
    
    //update data
    function update($id,$data){
        $this->db->where($this->id,$id);
        $this->db->update($this->produk,$data);

    }
    function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->produk);
    }

    function check_duplicate($nama_produk){
        $this->db->where("nama_produk",$nama_produk);
        $query = $this->db->get($this->table);
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }

    function cari_produk($keyword){
        $this->db->select("*");
        $this->db->from("data_produk");
        if($keyword != '')
          {
              $this->db->like('nama_usaha', $keyword);
              $this->db->or_like('nama_produk', $keyword);
              
          }
          $this->db->order_by('id_usaha', 'DESC');
          return $this->db->get();
          }


   

}
?>