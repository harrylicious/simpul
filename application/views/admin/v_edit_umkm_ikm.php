<!--Counter Inbox-->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMPUL-NTB | Tambah</title>
  <!-- Tell the browser to be responsive to screen width -->
  
  
  <?php $this->load->view('admin/parsial/v_head'); ?>


</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php
    $this->load->view('admin/parsial/v_header');
    
  ?>
  <link href="<?php echo base_url().'assets/paper-assets/css/paper-bootstrap-wizard.css'?>" rel="stylesheet" />
  <link href="<?php echo base_url().'assets/paper-assets/css/themify-icons.css'?>" rel="stylesheet">
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
          <form action="<?php echo base_url().'admin/usaha/update'?>" method="post" enctype="multipart/form-data">
            <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->


            <div class="wizard-header">
              <h3 class="wizard-title">FORM UPDATE UMKM/IKM</h3>
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
              </ul>
            </div>
            <div class="tab-content" style="magin-top:20px">

             <?php foreach ($profil->result_array() as $i) {
                $id_usaha = $i['id_usaha'];
                $nama_usaha =$i['nama_usaha'];
                $no_izin = $i['no_izin'];
                $tahun_berdiri = $i['tahun_berdiri'];
                $nama_pimpinan = $i['nama_pimpinan'];
                $nik_pimpinan = $i['nik'];
                $luas_lahan = $i['luas_lahan'];
                $telpon = $i['telpon'];
                $alamat = $i['alamat'];
                $kecamatan = $i['kecamatan'];
                $kabupaten = $i['kabupaten'];
                $fax = $i['fax'];
                $email = $i['email'];
                $website = $i['website'];
                $lat = $i['lat'];
                $long =$i['long'];
                $status =$i['status_kepemilikan'];
                $kepemilikan_koperasi =$i['kepemilikan_koperasi'];
                $jenis_usaha =$i['jenis_usaha'];
                $sumber_modal =$i['sumber_modal'];
                $nilai_investasi =$i['nilai_investasi'];
                $nilai_produksi =$i['nilai_produksi'];
                $produk_unggulan =$i['produk_unggulan'];
                $rerata_biaya =$i['rerata_biaya'];
                $nominal_gaji_perbulan =$i['nominal_gaji_perbulan'];
                $nominal_gaji_perhari =$i['nominal_gaji_perhari'];
                $nominal_omzet =$i['nominal_omzet'];
                $pendapatan_bulanan =$i['pendapatan_bulanan'];
                $pendapatan_harian=$i['pendapatan_harian'];
                $nilai_bahan_baku =$i['nilai_bahan_baku'];
                $model_penggajian =$i['model_penggajian'];
                $jumlah_unit_usaha =$i['jml_unit_usaha'];
                $total_modal = $i['total_modal'];
                $jumlah_tenaga_kerja =$i['jumlah_tenaga_kerja'];

                $format_rupiah_rerata_biaya= "Rp.".number_format($rerata_biaya,0,".",".");
                $format_rupiah_nominal_perbulan= "Rp.".number_format($nominal_gaji_perbulan,0,".",".");
                $format_rupiah_nominal_perhari= "Rp.".number_format($nominal_gaji_perhari,0,".",".");
                $format_rupiah_nominal_omzet= "Rp.".number_format($nominal_omzet,0,".",".");
                $format_rupiah_pendapatan_bulanan= "Rp.".number_format($pendapatan_bulanan,0,".",".");
                $format_rupiah_nominal_perhari= "Rp.".number_format($pendapatan_harian,0,".",".");
                $format_rupiah_total_modal= "Rp.".number_format($total_modal,0,".",".");

                $format_rupiah_nilai_produksi= "Rp.".number_format($nilai_produksi,0,".",".");
                $format_rupiah_nilai_bahan_baku= "Rp.".number_format($nilai_bahan_baku,0,".",".");





             } ?>

              <!-- tab profil usaha-->
              <div class="tab-pane" id="profil">
                <div class="col-sm-12">
                  <h5 class="info-text"></h5>
                </div>
                <div class="row">
                  <div class="col-sm-6 ">
                    <div class="form-group">
                      <label>Nama Usaha</label>
                      <input type="hidden" name="id_usaha" value="<?php echo $id_usaha ?>">
                      <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama Usaha" value="<?php echo $nama_usaha ?>"
                        required>
                    </div>
                  </div>

                  <div class="col-sm-6 ">
                    <div class="form-group">
                      <label>Nomer Izin </label>
                      <input type="text" class="form-control" id="no_izin" name="no_izin" placeholder="Nomer Izin" value="<?php echo $no_izin?>"
                        required>
                    </div>
                  </div>
                  

                </div>

                <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tahun berdiri</label>
                      <input type="number" class="form-control" id="tahun_berdiri" name="tahun_berdiri" value="<?php echo $tahun_berdiri ?>"
                        placeholder="Tahun" min="1999" max="<?php echo date("Y")?>" required>
                    </div>
                  </div>

                  <div class="col-sm-6 ">
                    <div class="form-group">
                      <label>Nama pimpinan</label>
                      <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" value="<?php echo $nama_pimpinan ?>"
                        placeholder="Nama pimpinan" required>
                    </div>
                  </div>
                  
                </div>

                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>NIK Pimpinan</label>
                      <input type="text" class="form-control" id="nik_pimpinan" name="nik_pimpinan" value="<?php echo $nik_pimpinan?>"
                        placeholder="Nik pimpinan" required>
                    </div>
                  </div>


                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jenis usaha</label>
                      <select class="form-control" name="jenis_usaha" required>
                        <option value="<?php echo $jenis_usaha; ?>"><?php echo $jenis_usaha; ?></option>
                        <?php foreach ($jenis->result_array() as $item_jenis) { ?>
                        <option value="<?php echo $item_jenis['keterangan'] ?>"<?=$jenis_usaha==$item_jenis['keterangan'] ? "selected" : null ?>><?php echo $item_jenis['keterangan'] ?></option>

                        <?php }?>
                      </select>
                    </div>
                  </div>
                  

                </div>

                <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Luas lahan</label>
                      <input type="text" class="form-control" id="luas_lahan" name="luas_lahan" placeholder="Luas lahan" value="<?php echo $luas_lahan?>"
                        required>
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Status kepemilikan</label>
                      <select class="form-control" name="status_kepemilikan" required>
                        <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                        <?php foreach ($milik->result_array() as $item_milik) { ?>
                        <option value="<?php echo $item_milik['keterangan'] ?>"<?= $status==$item_milik['keterangan'] ? "selected" :null ?>><?php echo $item_milik['keterangan'] ?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>

                </div>
                <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kepemilikan Koperasi</label>
                      <select class="form-control" name="kepemilikan_koperasi" value="<?php echo $kepemilikan_koperasi; ?>" required>
                        <option value=""><?php echo $kepemilikan_koperasi; ?></option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kabupaten</label>
                      <select class="form-control" id="kabupaten" name="kabupaten" required>
                        <option value="<?php echo $kabupaten; ?>"><?php echo $kabupaten; ?></option>
                        <?php foreach ($kab->result_array() as $i2) { ?>
                        <option value="<?php echo $i2['kode']?>-<?php echo $i2['nama'] ?>"><?php echo $i2['nama'] ?>
                        </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  

                </div>

                <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select class=" kecamatan form-control" name="kecamatan" id="kecamatan" required>
                        <option value="">- Pilih kecamatan -</option>

                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Desa</label>
                      <select class="desa form-control" name="desa" required>
                        <option value="">- Pilih desa -</option>

                      </select>
                    </div>
                  </div>
                  
                </div>

                <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo $alamat ?>" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Fax ( opsional )</label>
                      <input type="text" class="form-control" id="fax" name="fax" placeholder="fax" value="<?php echo $fax ?>">
                    </div>
                  </div>

                  

                </div>
                <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                      <label>No, Telpon (Whatsapp)</label>
                      <input type="text" class="form-control" id="nomer_hp" name="no_hp" value="087766644253"
                        placeholder="No, Telpon (Whatsapp)" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $email?>" required>
                    </div>
                  </div>

                 
                </div>

                <div class="row">

                <div class="col-sm-6 ">
                    <div class="form-group">
                      <label>Website (opsional)</label>
                      <input type="text" class="form-control" id="wesite" name="website" value="<?php echo $website?>" placeholder="http://">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Latittude</label>
                      <input type="text" class="form-control" id="lat" name="lat" placeholder="Latittude" value="<?php echo $lat?>" required>
                    </div>
                  </div>
                  
                </div>

                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Longitude</label>
                      <input type="text" class="form-control" id="lng" name="lng" placeholder="Longitude" value="<?php echo $long?>" required>
                    </div>
                  </div>

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
                        <option value="">-Pilih sumber modal-</option>
                        <?php foreach ($modal->result_array() as $s_modal) { ?>
                          <option value="<?php echo $s_modal['keterangan'] ?>"<?=$sumber_modal == $s_modal['keterangan'] ? "selected" :null ?>><?php echo $s_modal['keterangan'] ?></option>

                        </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nilai Investasi</label>
                      <input type="text" class="form-control" id="nilai_investasi" name="nilai_investasi" value="<?php echo $nilai_investasi?>"
                        placeholder="Total modal/nilai investasi" required>
                    </div>
                  </div>
                  

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nilai Produksi</label>
                      <input type="number" class="form-control" id="nilai_produksi" name="nilai_produksi" placeholder="Nilai produksi" value="<?php echo $nilai_produksi?>" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nilai Bahan Baku</label>
                      <input type="text" class="form-control" id="nilai_bahan_baku" name="nilai_bahan_baku" placeholder="Nilai bahan baku" value="<?php echo $nilai_bahan_baku?>" required>
                    </div>
                  </div>

                </div>
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Produk Unggulan</label>
                      <input type="text" class="form-control" id="produk_unggulan" name="produk_unggulan" placeholder="Produk Unggulan" value="<?php echo $produk_unggulan?>"
                        required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jumlah Tenaga Kerja</label>
                      <input type="number" class="form-control" id="jumlah_tenaga_kerja" name="jumlah_tenaga_kerja" placeholder="Jumlah tenaga kerja" value="<?php echo $jumlah_tenaga_kerja?>"
                        required>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Rerata Biaya Tenaga Kerja</label>
                      <input type="text" class="form-control" id="rerata_biaya" name="rerata_biaya" value="<?php echo $format_rupiah_rerata_biaya?>"
                        placeholder="Rerata biaya tenaga kerja" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Model Pengganjian</label>
                      <input type="text" class="form-control" id="model_penggajian" name="model_penggajian" placeholder="Model pengganjian" value="<?php echo $model_penggajian?>"
                        required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Gaji Perbulan</label>
                      <input type="text" class="form-control" id="nominal_gaji_bulan" name="nominal_gaji_perbulan" value="<?php echo $format_rupiah_nominal_perbulan?>"
                        placeholder="Nominal gaji perbulan" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Gaji Perhari</label>
                      <input type="text" class="form-control" id="nominal_gaji_hari" name="nominal_gaji_perhari" value="<?php echo $format_rupiah_nominal_perhari?>"
                        placeholder="Nominal gaji perhari" required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Omzet</label>
                      <input type="text" class="form-control" id="nominal_omzet" name="nominal_omzet" placeholder="Nominal omzet" value="<?php echo $format_rupiah_nominal_omzet?>" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Pendapatan Harian</label>
                      <input type="text" class="form-control" id="pendapatan_harian" name="pendapatan_harian" placeholder="Pendapatan harian" value="<?php echo $format_rupiah_nominal_perhari?>"
                        required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Pendapatan Bulanan</label>
                      <input type="text" class="form-control" id="pendapatan_bulanan" name="pendapatan_bulanan" placeholder="Pendapatan bulanan" value="<?php echo $format_rupiah_nominal_perbulan?>"
                        required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jumlah Unit Usaha</label>
                      <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit_usaha" placeholder="jumlah unit usaha" value="<?php echo $jumlah_unit_usaha?>"
                        required>
                    </div>
                  </div>

                </div>



                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label> Metode Pemasaran</label>
                      <select class="form-control" name="metode_pemasaran" required>
                        <option value="">-Pilih -</option>
                        <option value="Online">Online</option>
                        <option value="Offline">Offline</option>
                      </select>
                    </div>
                  </div>



                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Total Modal</label>
                      <input type="text" class="form-control" id="total_modal" name="total_modal" value="<?php echo $format_rupiah_total_modal?>"
                        placeholder="Total modal/nilai investasi" required>
                    </div>
                  </div>

                </div>

                
              </div>
             
            </div>



            <div class="wizard-footer clearfix">
              <div class="pull-right">
                <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Update' />
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


  <script type="text/javascript">
		
		var rerata_biaya = document.getElementById('rerata_biaya');
    var nominal_gaji_perbulan = document.getElementById('nominal_gaji_bulan');
    var nominal_gaji_perhari = document.getElementById('nominal_gaji_hari');
    var pendapatan_bulanan = document.getElementById('pendapatan_bulanan');
    var pendapatan_harian = document.getElementById('pendapatan_harian');
    var total_modal = document.getElementById('total_modal');
    var nilai_investasi = document.getElementById('nilai_investasi');
    var nilai_produksi = document.getElementById('nilai_produksi');
    var nilai_bahan_baku = document.getElementById('nilai_bahan_baku');

    nilai_produksi.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			nilai_produksi.value = formatRupiah(this.value, 'Rp. ');
		});

    nilai_bahan_baku.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    nilai_bahan_baku.value = formatRupiah(this.value, 'Rp. ');
		});

		rerata_biaya.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rerata_biaya.value = formatRupiah(this.value, 'Rp. ');
		});

    nominal_gaji_perbulan.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			nominal_gaji_perbulan.value = formatRupiah(this.value, 'Rp. ');
		});

    nominal_gaji_perhari.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		nominal_gaji_perhari.value = formatRupiah(this.value, 'Rp. ');

		});

    nominal_omzet.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    nominal_omzet.value = formatRupiah(this.value, 'Rp. ');

		});

    nominal_omzet.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    nominal_omzet.value = formatRupiah(this.value, 'Rp. ');

		});


    pendapatan_bulanan.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    pendapatan_bulanan.value = formatRupiah(this.value, 'Rp. ');

		});

    pendapatan_harian.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    pendapatan_harian.value = formatRupiah(this.value, 'Rp. ');

		});


    total_modal.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    total_modal.value = formatRupiah(this.value, 'Rp. ');

		});


    nilai_investasi.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    nilai_investasi.value = formatRupiah(this.value, 'Rp. ');

		});


 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
  
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
                        data: { kode: id_split },
                        async: false,
                        dataType: 'json',
                        success: function (data) {
                            var html = '<option value="">- Pilih Kecamatan -</option>';
                            var i;

                            for (i = 0; i < data.length; i++) {
                                html += '<option value=' + data[i].kode + '-' + data[i].nama + '>' + data[i].nama +'</option>';                        
                            }

                            $('.kecamatan').html(html);
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
                        data: { kode: id_split },
                        async: false,
                        dataType: 'json',
                        success: function (data) {
                            var html = '<option value="">- Pilih Desa -</option>';
                            var i;
                            for (i = 0; i < data.length; i++) {
                                html += '<option value=' + data[i].nama + '>' + data[i].nama + '</option>';
                            }
                            $('.desa').html(html);
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
      // buat marker baru
          var latDouble = parseFloat(<?php echo $lat?>);
          var longDouble = parseFloat(<?php echo $long?>);

          marker = new google.maps.Marker({
          position: new google.maps.LatLng(latDouble,longDouble),
          map: peta
        });
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