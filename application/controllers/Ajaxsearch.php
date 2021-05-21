<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function format_hari_tanggal($waktu)
{
    $hari_array = array(
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    );
    $hr = date('w', strtotime($waktu));
    $hari = $hari_array[$hr];
    $tanggal = date('j', strtotime($waktu));
    $bulan_array = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    );
    $bl = date('n', strtotime($waktu));
    $bulan = $bulan_array[$bl];
    $tahun = date('Y', strtotime($waktu));
    $jam = date( 'H:i:s', strtotime($waktu));
    
    //untuk menampilkan hari, tanggal bulan tahun jam
    //return "$hari, $tanggal $bulan $tahun $jam";

    //untuk menampilkan hari, tanggal bulan tahun
    return "$hari, $tanggal $bulan $tahun";
}


class Ajaxsearch extends CI_Controller {

 function index()
 {
  $this->load->view('ajaxsearch');
 }

 function fetch()
 {
  $output = '';
  $query = 'xxxxxx';
  $this->load->model('ajaxsearch_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->ajaxsearch_model->load_data_usaha($query);
  $output .= '
  <div class="table">
     <table class="table table-bordered table-striped">
      
  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
       $no=0;
    $output .= '
    <div class="table">
               
                  <tbody>
                    <?php
                      $no=1;
                      
                    ?>
                    <tr>
                      <td>'.$no++.'</td>
                      <td>'.$row->nama_usaha.'</td>
                      <td>'.$row->tahun_berdiri.'</td>
                      <td>'.$row->desa.'</td>
                      <td>'.$row->kecamatan.'</td>
                    </tr>
                    
                  </tbody>
              </div>

                               
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>


  ';
  echo $output;
 }
 
}
