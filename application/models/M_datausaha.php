<?php
class M_datausaha extends CI_Model{

    public $tabel ="data_usaha";
    public $id = "id_usaha";
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
        $this->datatables->from('produk');
        return $this->datatables->generate();

    }

    // get all
    function get_all(){
        $this->db->order_by($this->id,$this->order);
        return $this->db->get($this->table)->result(); 

    }


    // get all
    function get_all_based_kabupaten(){
        // $hsl=$this->db->query("SELECT kabupaten, COUNT(*) AS jml FROM data_usaha GROUP BY kabupaten ORDER BY jml desc");   
        $this->db->select('kabupaten , COUNT(*) as jml');
        $this->db->group_by('kabupaten'); 
        $this->db->order_by('jml','desc'); 
        $hsl =  $this->db->get_where('data_usaha', ['deleted_at' => '0000-00-00 00:00:00'])->result();
    
        return $hsl; 
    }

    // get all
    function get_all_per_kabupaten(){
            $this->datatables->select('*');
            $this->datatables->from('data_usaha');
            echo $this->datatables->generate();

    }

    //get some data for home
    function get_produk_home(){
        $hsl= $this->db->select('*')
                        ->from('data_produk')
                        ->order_by('id_produk','DESC')
                        ->limit(4);
		return $hsl;
    }
    
     //get some data for home
     function get_jenis_usaha(){  
		$hsl=$this->db->query("SELECT *FROM data_produk ORDER BY id_produk DESC limit 4");
		return $hsl;
	}

   
    function get_usaha_by_kode($kode){
		$hsl=$this->db->query("SELECT *FROM data_usaha where id_usaha='$kode'");
		return $hsl;
	}

    function get_data_usaha(){
        $hsl=$this->db->query("SELECT * FROM data_usaha limit 8");
        return $hsl;
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