
<?php

class M_profil_pelaku_usaha extends CI_Model{


    public $tabel ="profil_pelaku_usaha";
    public $id = "id_pelaku_usaha";
    public $order ="DESC";


    function __construct()
    {
        parent::__construct();
    }
    

    //datatable

    function json(){
        $this->datatables->select("nama_lengkap,
        ktp,
        jenis_kelamin,
        alamat,
        rt,
        rw,
        desa,
        kecamatan,
        kabupaten,
        tgl_lahir,
        usia,
        no_tlp,
        pendidikan_terakhir,
        npwp,
        email,
        website,
        status_nikah");
        $this->datatables->from('profil_pelaku_usaha');
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