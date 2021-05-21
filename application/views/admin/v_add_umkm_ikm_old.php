<!--Counter Inbox-->
<?php
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $query2=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
    $jum_comment=$query2->num_rows();
    $jum_pesan=$query->num_rows();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Post</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/logo.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/all.css'?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/colorpicker/bootstrap-colorpicker.min.css'?>">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css'?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">

  <link href="<?php echo base_url().'assets/paper-assets/css/paper-bootstrap-wizard.css'?>" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url().'assets/paper-assets/css/demo.css'?>" rel="stylesheet" />

  <!-- Fonts and Icons -->
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
  <link href="<?php echo base_url().'assets/paper-assets/css/themify-icons.css'?>" rel="stylesheet">
  <!-- Google Tag Manager -->


</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php
    $this->load->view('admin/parsial/v_header');
  ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php
    $this->load->view('admin/parsial/v_sidebar');
    ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->


      <!--      Wizard container        -->
      <div class="wizard-container container-fluid" style="margin:0px; padding:10px">
        <div class="card wizard-card" data-color="red" id="wizard">
          <form action="<?php echo base_url().'admin/addumkm/save_data'?>" method="post" enctype="multipart/form-data">
            <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->

            <button class="btn btn-success" style="margin:10px" data-toggle="modal" data-target="#modal-default"><i class="fa fa-upload"> Import data</i></button>

            <div class="wizard-header">
              <h3 class="wizard-title">FORM UMKM/IKM</h3>
              <p class="category"></p>
            </div>

            <div class="wizard-navigation">
              <div class="progress-with-circle">
                <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3"
                  style="width: 21%;"></div>
              </div>
              <ul>
                <li>
                  <a href="#profil" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-id-badge"></i>
                    </div>
                    Profil Usaha
                  </a>
                </li>
                <li>
                  <a href="#aktivitas" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-agenda"></i>
                    </div>
                    Aktivitas
                  </a>
                </li>
                <li>
                  <a href="#produk" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-gift"></i>
                    </div>
                    Produk
                  </a>
                </li>
                <li>
                  <a href="#legalitas" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-receipt"></i>
                    </div>
                    Legalitas
                  </a>
                </li>
                <li>
                  <a href="#bantuan" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-package"></i>
                    </div>
                    Bantuan
                  </a>
                </li>
              </ul>
            </div>
            <div class="tab-content" style="magin-top:20px">

              <!-- tab profil usaha-->
              <div class="tab-pane" id="profil">
                <div class="col-sm-12">
                  <h5 class="info-text"></h5>
                </div>
                <div class="row">
                  <div class="col-sm-6 ">
                    <div class="form-group">
                      <label>Nama Usaha</label>
                      <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama Usaha" value="tesnama"
                        required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tahun berdiri</label>
                      <input type="number" class="form-control" id="tahun_berdiri" name="tahun_berdiri" value="2020"
                        placeholder="Tahun" min="1999" max="<?php echo date("Y")?>" required>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-6 ">
                    <div class="form-group">
                      <label>Nama pimpinan</label>
                      <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" value="tesnama"
                        placeholder="Nama pimpinan" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>NIK Pimpinan</label>
                      <input type="text" class="form-control" id="nik_pimpinan" name="nik_pimpinan" value="tesnama"
                        placeholder="Nik pimpinan" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jenis usaha</label>
                      <select class="form-control" name="jenis_usaha" required>
                        <option value="">-Pilih -</option>
                        <?php foreach ($jenis->result_array() as $i) { ?>
                        <option value="<?php echo $i['keterangan'] ?>"><?php echo $i['keterangan'] ?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Luas lahan</label>
                      <input type="text" class="form-control" id="luas_lahan" name="luas_lahan" placeholder="Luas lahan" value="tesnama"
                        required>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Status kepemilikan</label>
                      <select class="form-control" name="status_kepemilikan" required>
                        <option value="">- Pilih -</option>
                        <?php foreach ($milik->result_array() as $i) { ?>
                        <option value="<?php echo $i['keterangan'] ?>"><?php echo $i['keterangan'] ?></option>
                        <?php }?>

                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kepemilikan Koperasi</label>
                      <select class="form-control" name="kepemilikan_koperasi" value="tesnama" required>
                        <option value="">- Pilih -</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kabupaten</label>
                      <select class="form-control" id="kabupaten" name="kabupaten" required>
                        <option value="0">- Pilih Kabupaten -</option>
                        <?php foreach ($kab->result_array() as $i2) { ?>
                        <option value="<?php echo $i2['kode']?>-<?php echo $i2['nama'] ?>"><?php echo $i2['nama'] ?>
                        </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select class=" kecamatan form-control" name="kecamatan" id="kecamatan" required>
                        <option value="">- Pilih kecamatan -</option>

                      </select>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Desa</label>
                      <select class=" desa form-control" name="desa" required>
                        <option value="">- Pilih desa -</option>

                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="tesnama" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Fax ( opsional )</label>
                      <input type="text" class="form-control" id="fax" name="fax" placeholder="fax" value="tesnama">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>No, Telpon (Whatsapp)</label>
                      <input type="text" class="form-control" id="nomer_hp" name="no_hp" value="087766644253"
                        placeholder="No, Telpon (Whatsapp)" required>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="email" value="tesnama" required>
                    </div>
                  </div>

                  <div class="col-sm-6 ">
                    <div class="form-group">
                      <label>Website (opsional)</label>
                      <input type="text" class="form-control" id="wesite" name="website" value="tesnama" placeholder="http://">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Latittude</label>
                      <input type="text" class="form-control" id="lat" name="lat" placeholder="Latittude" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Longitude</label>
                      <input type="text" class="form-control" id="lng" name="lng" placeholder="Longitude" required>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div id="googleMap" style="width:100%;height:380px;"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end tab profil usaha-->

              <!--- tab aktivitas -->
              <div class="tab-pane" id="aktivitas">
                <h5 class="info-text"> </h5>
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Sumber Modal</label>
                      <select class="form-control" name="sumber_modal" required>
                        <option value="">- Pilih sumber modal-</option>
                        <?php foreach ($modal->result_array() as $i2) { ?>
                        <option value="<?php echo $i2['keterangan'] ?>"><?php echo $i2['keterangan'] ?>
                        </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Total Modal/Nilai Investasi</label>
                      <input type="number" class="form-control" id="nilai_investasi" name="total_investasi" value="4"
                        placeholder="Total modal/nilai investasi" required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nilai Produksi</label>
                      <input type="number" class="form-control" id="nilai_produksi" placeholder="Nilai produksi" value="1" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nilai Bahan Baku</label>
                      <input type="number" class="form-control" id="nilai_bahan_baku" placeholder="Nilai bahan baku" value="9" required>
                    </div>
                  </div>

                </div>
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Produk Unggulan</label>
                      <input type="text" class="form-control" id="produk_unggulan" placeholder="Produk Unggulan" value="tesnama"
                        required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jumlah Tenaga Kerja</label>
                      <input type="number" class="form-control" id="jumlah_tenaga_kerja" placeholder="Jumlah tenaga kerja" value="9"
                        required>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Rerata Biaya Tenaga Kerja</label>
                      <input type="number" class="form-control" id="rerata_biaya" value="9"
                        placeholder="Rerata biaya tenaga kerja" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Model Pengganjian</label>
                      <input type="text" class="form-control" id="model_penggajian" placeholder="Model pengganjian" value="tesnama"
                        required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Gaji Perbulan</label>
                      <input type="number" class="form-control" id="nominal_gaji_bulan" value="9"
                        placeholder="Nominal gaji perbulan" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Gaji Perhari</label>
                      <input type="number" class="form-control" id="nominal_gaji_hari" value="9"
                        placeholder="Nominal gaji perhari" required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Omzet</label>
                      <input type="number" class="form-control" id="nominal_omzet" placeholder="Nominal omzet" value="9" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Pendapatan Harian</label>
                      <input type="number" class="form-control" id="pendapatan_harian" placeholder="Pendapatan harian" value="899"
                        required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Pendapatan Bulanan</label>
                      <input type="number" class="form-control" id="pendapatan_bulanan" placeholder="Pendapatan bulanan" value="89999"
                        required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jumlah Unit Usaha</label>
                      <input type="number" class="form-control" id="jumlah_unit" placeholder="jumlah unit usaha" value="12"
                        required>
                    </div>
                  </div>

                </div>



                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label> Metode Pemasaran</label>
                      <select class="form-control" required>
                        <option>- Pilih -</option>
                        <option>Online</option>
                        <option>Offline</option>
                      </select>
                    </div>
                  </div>

                </div>
              </div>
              <!-- end tab aktivitas -->

              <!-- tab produk -->
              <div class="tab-pane" id="produk">
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Komoditas</label>
                      <input type="text" class="form-control" id="komoditas" placeholder="Komoditas" value="tes" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nama Produk</label>
                      <input type="text" class="form-control" id="nama_produk" placeholder="Nama produk" value="tesnama" required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jenis Produk</label>
                      <input type="text" class="form-control" id="jenis_produk" placeholder="Nilai produksi" value="tesnama" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="number" class="form-control" id="harga" placeholder="Nilai bahan baku" value="80000" required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kapasitas produksi</label>
                      <input type="number" class="form-control" id="kapasitas_produksi" placeholder="Kapasitas produksi" value="10"
                        required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Informasi gizi</label>
                      <input type="text" class="form-control" id="informasi_gizi" placeholder="Informasi gizi" value="tesnama" required>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kondisi kemasan</label>
                      <input type="text" class="form-control" id="kondisi_kemasan" placeholder="Kondisi kemasan" value="tesnama"
                        required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kualitas Produk</label>
                      <input type="text" class="form-control" id="kualitas_produuk" placeholder="Kualitas produk" value="tesnama"
                        required>
                    </div>
                  </div>

                </div>


                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Gambar produk</label>
                      <input type="file" class="form-control" id="gambar_produk" placeholder="Kondisi kemasan" required>
                    </div>
                  </div>


                </div>

              </div>
              <!-- end tab produk -->

              <!-- tab legalitas-->
              <div class="tab-pane" id="legalitas">
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nama izin</label>
                      <input type="text" class="form-control" id="nama_izin" placeholder="Nama izin" value="tesnama" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nomer izin</label>
                      <input type="text" class="form-control" id="no_izin" placeholder="Nomer izin" value="tesnama" required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tanggal buat</label>
                      <input type="text" class="form-control" id="tanggal_buat" placeholder="Nilai produksi" value="tesnama" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tanggla kadaluarsa</label>
                      <input type="number" class="form-control" id="tgl_kadaluarsa" placeholder="Tanggal kadaluarsa" value="tesnama" required>
                    </div>
                  </div>

                </div>
            
              </div>
              <!-- end tab legalitas -->


              <!-- tab bantuan-->
              <div class="tab-pane" id="bantuan">
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Asal Bantuan</label>
                      <select class="form-control" required>
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jenis Bantuan</label>
                      <input type="text" class="form-control" id="jenis" placeholder="Nama produk" value="tesnama" required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nilai Bantuan</label>
                      <input type="text" class="form-control" id="nilai_bantuan" placeholder="Nilai produksi" value="tesnama" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Waktu Bantuan</label>
                      <input type="number" class="form-control" id="harga" placeholder="Nilai bahan baku" value="tesnama" required>
                    </div>
                  </div>

                </div>

               

              </div>
              <!-- end tab bantuan -->
            </div>



            <div class="wizard-footer clearfix">
              <div class="pull-right">
                <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finish' />
              </div>
              <div class="pull-left">
                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
              </div>
            </div>
          </form>
        </div>
      </div> <!-- wizard container -->


    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/parsial/v_footer')?>

    <!-- modal -->
    <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Import Data UMKM/IKM</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url().'admin/addumkm/import_data'?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="file" class="btn" name="file" required>
                NB: file harus bertype xls|csv
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>

              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url().'assets/plugins/select2/select2.full.min.js'?>"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.js'?>"></script>
  <script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.date.extensions.js'?>"></script>
  <script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.extensions.js'?>"></script>
  <!-- date-range-picker -->
  <script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
  <!-- bootstrap datepicker -->
  <script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
  <!-- bootstrap color picker -->
  <script src="<?php echo base_url().'assets/plugins/colorpicker/bootstrap-colorpicker.min.js'?>"></script>
  <!-- bootstrap time picker -->
  <script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
  <script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
  <!-- Page script -->
  <script>
    $(document).ready(function () {
      $('#kabupaten').change(function () {
        var id = $(this).val();
        var split = id.split("-");
        var id_split = split[0];
        //var nama = split[1];
      
        $.ajax({
          url: "<?php echo base_url();?>admin/addumkm/get_kecamatan",
          method: "POST",
          data: {
            kode: id_split
          },
          async: false,
          dataType: 'json',
          success: function (data) {
            var html = '';
            var i;

            for (i = 0; i < data.length; i++) {
            
                html += '<option value=' + data[i].kode + '-' + data[i].nama + '>' + data[i].nama +'</option>';
              
             
            }
            $('.kecamatan').html(html);
            //console.log(html);
          }
        });
      });
    

      $('#kecamatan').change(function () {
        var id = $(this).val();
        var split = id.split("-");
        var id_split = split[0];
        $.ajax({
          url: "<?php echo base_url();?>admin/addumkm/get_desa",
          method: "POST",
          data: {
            kode: id_split
          },
          async: false,
          dataType: 'json',
          success: function (data) {
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
              html += '<option value=' + data[i].kode + '>' + data[i].nama + '</option>';
            }
            $('.desa').html(html);
            //console.log(html);
          }
        });
      });


    });
  </script>



  <script src="<?php echo base_url().'assets/paper-assets/js/jquery.bootstrap.wizard.js'?>" type="text/javascript">
  </script>

  <!--  Plugin for the Wizard -->
  <script src="<?php echo base_url().'assets/paper-assets/js/demo.js'?>" type="text/javascript"></script>
  <script src="<?php echo base_url().'assets/paper-assets/js/paper-bootstrap-wizard.js'?>" type="text/javascript">
  </script>

  <!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
  <script src="<?php echo base_url().'assets/paper-assets/js/jquery.validate.min.js'?>" type="text/javascript"></script>

  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyArQzHX2ODczAlJ_4iQwMqb8R4ey44ZhqY"></script>
  <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.

      CKEDITOR.replace('ckeditor');


    });
  </script>

  <script>
    // fungsi initialize untuk mempersiapkan peta
    var marker;

    function taruhMarker(peta, posisiTitik) {

      if (marker) {
        // pindahkan marker
        marker.setPosition(posisiTitik);
      } else {
        // buat marker baru
        marker = new google.maps.Marker({
          position: posisiTitik,
          map: peta
        });
      }

      // isi nilai koordinat ke form
      document.getElementById("lat").value = posisiTitik.lat();
      document.getElementById("lng").value = posisiTitik.lng();

    }

    function initialize() {
      var propertiPeta = {
        center: new google.maps.LatLng(-8.5830695, 116.3202515),
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

      // even listner ketika peta diklik
      google.maps.event.addListener(peta, 'click', function (event) {
        taruhMarker(this, event.latLng);
      });

    }


    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>

  <script>
    $(function () {
      //Initialize Select2 Elements
      $(".select2").select2();

      //Datemask dd/mm/yyyy
      $("#datemask").inputmask("dd/mm/yyyy", {
        "placeholder": "dd/mm/yyyy"
      });
      //Datemask2 mm/dd/yyyy
      $("#datemask2").inputmask("mm/dd/yyyy", {
        "placeholder": "mm/dd/yyyy"
      });
      //Money Euro
      $("[data-mask]").inputmask();

      //Date range picker
      $('#reservation').daterangepicker();
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        format: 'MM/DD/YYYY h:mm A'
      });
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
              'month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
      );

      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      });

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
      });
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
      });

      //Colorpicker
      $(".my-colorpicker1").colorpicker();
      //color picker with addon
      $(".my-colorpicker2").colorpicker();

      //Timepicker
      $(".timepicker").timepicker({
        showInputs: false
      });
    });
  </script>
</body>

</html>