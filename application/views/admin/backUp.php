
		<?php foreach ($data->result_array() as $i) :
             $id_usaha=$id_usaha['id_usaha'];
             $nama_usaha=$i['nama_usaha'];
             $tahun_berdiri=$i['tahun_berdiri'];
             $nik=$i['nik'];
             $jenis_usaha=$i['jenis_usaha'];
             $alamat=$i['alamat'];
             $desa=$i['desa'];
             $kecamatan=$i['kecamatan'];
             $kabupaten=$i['kabupaten'];
             $id_pelaku_usaha=$i['id_pelaku_usaha'];
             $komoditas=$i['komoditas'];
             $lat=$i['lat'];
             $long=$i['long'];
             $jml_anggota=$i['jml_anggota'];
             $kemampuan_produksi_harian=$i['kemampuan_produksi_harian'];
             $informasi_gizi=$i['informasi_gizi'];
             $metode_pemasaran=$i['metode_pemasaran'];
             $pendapatan_hari=$i['pendapatan_hari'];
             $pendapatan_bulan=$i['pendapatan_bulan'];
             $kondisi_kemasan=$i['kondisi_kemasan'];
             $kualitas_produk=$i['kualitas_produk'];
             $id_relawan=$i['id_relawan'];
             $status_kepemilikan=$i['status_kepemilikan'];
             $kepemilikan_koperasi=$i['kepemilikan_koperasi'];
             $nama_pimpinan=$i['nama_pimpinan'];
             $jml_unit_usaha=$i['jml_unit_usaha'];
             $struktul_kepemilikan=$i['struktul_kepemilikan'];
             $kepemilikan_tempat=$i['kepemilikan_tempat'];
            ?>
	<!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
											<input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/>
                                            <input type="text" name="xnama" class="form-control" id="inputUserName" value="<?php echo $pengguna_nama;?>" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                        <div class="col-sm-7">
                                            <input type="email" name="xemail" class="form-control" value="<?php echo $pengguna_email;?>" id="inputEmail3" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-7">
										<?php if($pengguna_jenkel=='L'):?>
                                           <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
										<?php else:?>
											<div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
										<?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xusername" class="form-control" value="<?php echo $pengguna_username;?>" id="inputUserName" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xkontak" class="form-control" value="<?php echo $pengguna_nohp;?>" id="inputUserName" placeholder="Kontak Person" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xlevel" required>
											<?php if($pengguna_level=='1'):?>
                                                <option value="1" selected>Administrator</option>
                                                <option value="2">Author</option>
											<?php else:?>
												<option value="1">Administrator</option>
                                                <option value="2" selected>Author</option>
											<?php endif;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto"/>
                                        </div>
                                    </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>

	<?php foreach ($data->result_array() as $i) :
               $id_usaha=$id_usaha['id_usaha'];
               $nama_usaha=$i['nama_usaha'];
               $tahun_berdiri=$i['tahun_berdiri'];
               $nik=$i['nik'];
               $jenis_usaha=$i['jenis_usaha'];
               $alamat=$i['alamat'];
               $desa=$i['desa'];
               $kecamatan=$i['kecamatan'];
               $kabupaten=$i['kabupaten'];
               $id_pelaku_usaha=$i['id_pelaku_usaha'];
               $komoditas=$i['komoditas'];
               $lat=$i['lat'];
               $long=$i['long'];
               $jml_anggota=$i['jml_anggota'];
               $kemampuan_produksi_harian=$i['kemampuan_produksi_harian'];
               $informasi_gizi=$i['informasi_gizi'];
               $metode_pemasaran=$i['metode_pemasaran'];
               $pendapatan_hari=$i['pendapatan_hari'];
               $pendapatan_bulan=$i['pendapatan_bulan'];
               $kondisi_kemasan=$i['kondisi_kemasan'];
               $kualitas_produk=$i['kualitas_produk'];
               $id_relawan=$i['id_relawan'];
               $status_kepemilikan=$i['status_kepemilikan'];
               $kepemilikan_koperasi=$i['kepemilikan_koperasi'];
               $nama_pimpinan=$i['nama_pimpinan'];
               $jml_unit_usaha=$i['jml_unit_usaha'];
               $struktul_kepemilikan=$i['struktul_kepemilikan'];
               $kepemilikan_tempat=$i['kepemilikan_tempat'];/*  */
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Pengguna</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/pengguna/hapus_pengguna'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							<input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/>
                            <p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $pengguna_nama;?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>

	<!--Modal Reset Password-->
        <div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
                    </div>

                    <div class="modal-body">

                            <table>
                                <tr>
                                    <th style="width:120px;">Username</th>
                                    <th>:</th>
                                    <th><?php echo $this->session->flashdata('uname');?></th>
                                </tr>
                                <tr>
                                    <th style="width:120px;">Password Baru</th>
                                    <th>:</th>
                                    <th><?php echo $this->session->flashdata('upass');?></th>
                                </tr>
                            </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(). 'assets/paper-assets/img/apple-icon.png'?>" />
	<link rel="icon" type="image/png" href="<?php echo base_url().'assets/paper-assets/img/favicon.png'?>" />
	<title>Paper Bootstrap Wizard by Creative Tim | Free Bootstrap Wizard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Canonical SEO -->
  
   

	<!-- CSS Files -->
  <link href="<?php echo base_url().'assets/paper-assets/css/bootstrap.min.css'?>" rel="stylesheet" />
	<link href="<?php echo base_url().'assets/paper-assets/css/paper-bootstrap-wizard.css'?>" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?php echo base_url().'assets/paper-assets/css/demo.css'?>" rel="stylesheet" />

	<!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	  <link href="<?php echo base_url().'assets/paper-assets/css/themify-icons.css'?>" rel="stylesheet">
	<!-- Google Tag Manager -->
	
	</head>

	<body>
		<!-- Google Tag Manager (noscript) -->
	
	<!-- End Google Tag Manager (noscript) -->
	<div class="image-container set-full-height" style="background-image: url(<?php echo base_url().'assets/paper-assets/img/paper-3.jpeg'?>')">
	

	

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">

		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="azure" id="wizard">
		                    <form action="" method="">
		                <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">Find your next desk</h3>
		                        	<p class="category">Book from thousands of unique work and meeting spaces.</p>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
									</div>
									<ul>
			                            <li>
											<a href="#details" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-list"></i>
												</div>
												Details
											</a>
										</li>
			                            <li>
											<a href="#captain" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-briefcase"></i>
												</div>
												Timetable
											</a>
										</li>
			                            <li>
											<a href="#description" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-pencil"></i>
												</div>
												Description
											</a>
										</li>
			                        </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane" id="details">
		                            	<div class="row">
		                                	<div class="col-sm-12">
		                                    	<h5 class="info-text"> Let's start with the basic details</h5>
		                                	</div>
			                                <div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>What city do you want to work in?</label>
			                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g Silicon Valley">
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Space</label>
			                                        <select class="form-control">
			                                            <option disabled="" selected="">- choose a space -</option>
			                                            <option>Work Space</option>
			                                            <option>Meeting Space</option>
			                                        </select>
			                                    </div>
			                                </div>
			                                <div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>Type of Desk</label>
			                                        <select class="form-control">
			                                            <option disabled="" selected="">- choose an option -</option>
			                                            <option>Private</option>
			                                            <option>Shared</option>
			                                        </select>
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
			                                	<div class="form-group">
			                                        <label>Monthly Budget</label>
		                                        	<div class="input-group">
		                                            	<input type="text" class="form-control">
		                                            	<span class="input-group-addon">$</span>
		                                        	</div>
			                                    </div>
			                                </div>
		                            	</div>
		                        	</div>
		                            <div class="tab-pane" id="captain">
		                                <h5 class="info-text">How do you want to rent the office? </h5>
		                                <div class="row">
		                                    <div class="col-sm-8 col-sm-offset-2">
		                                        <div class="col-sm-4 col-sm-offset-2">
													<div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="checkbox" name="jobb" value="Design">
		                                                <div class="card card-checkboxes card-hover-effect">
		                                                    <i class="ti-time"></i>
															<p>By hour</p>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
													<div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="checkbox" name="jobb" value="Design">
		                                                <div class="card card-checkboxes card-hover-effect">
		                                                    <i class="ti-calendar"></i>
															<p>By day</p>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="description">
		                                <div class="row">
		                                    <h5 class="info-text"> Tell us about your ideal working space. </h5>
		                                    <div class="col-sm-6 col-sm-offset-1">
		                                        <div class="form-group">
		                                            <label>Desk description</label>
		                                            <textarea class="form-control" placeholder="" rows="9"></textarea>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-4">
		                                        <div class="form-group">
		                                            <label>Example</label>
		                                            <p class="description">"If you're heavily armed with a mug, smartphone and a laptop, then our hot desks will provide the pure functionality and space needed to get your work done and move on to the next one."</p>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                        	<div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
		                                <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finish' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->

		
		
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="<?php echo base_url().'assets/paper-assets/js/jquery-2.2.4.min.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/paper-assets/js/bootstrap.min.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/paper-assets/js/jquery.bootstrap.wizard.js'?>" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="<?php echo base_url().'assets/paper-assets/js/demo.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/paper-assets/js/paper-bootstrap-wizard.js'?>" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="<?php echo base_url().'assets/paper-assets/js/jquery.validate.min.js'?>" type="text/javascript"></script>
</html>
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
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
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
  	<!-- CSS Files -->
  <link href="<?php echo base_url().'assets/paper-assets/css/bootstrap.min.css'?>" rel="stylesheet" />
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
    <section class="content-header">
      <h1>
        Tambah UMKM/IKM
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">UMKM/IKM</a></li>
        <li class="active">tambah UMKM/IKM</li>
      </ol>
    </section>

   

  
  <!--   Big container   -->
      <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="azure" id="wizard">
                    <form action="" method="">
                <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->

                      <div class="wizard-header">
                          <h3 class="wizard-title">Find your next desk</h3>
                          <p class="category">Book from thousands of unique work and meeting spaces.</p>
                      </div>

            <div class="wizard-navigation">
              <div class="progress-with-circle">
                   <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
              </div>
              <ul>
                              <li>
                  <a href="#details" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-list"></i>
                    </div>
                    Details
                  </a>
                </li>
                              <li>
                  <a href="#captain" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-briefcase"></i>
                    </div>
                    Timetable
                  </a>
                </li>
                              <li>
                  <a href="#description" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-pencil"></i>
                    </div>
                    Description
                  </a>
                </li>
                          </ul>
            </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="details">
                              <div class="row">
                                  <div class="col-sm-12">
                                      <h5 class="info-text"> Let's start with the basic details</h5>
                                  </div>
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>What city do you want to work in?</label>
                                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g Silicon Valley">
                                      </div>
                                  </div>
                                  <div class="col-sm-5">
                                      <div class="form-group">
                                          <label>Space</label>
                                          <select class="form-control">
                                              <option disabled="" selected="">- choose a space -</option>
                                              <option>Work Space</option>
                                              <option>Meeting Space</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Type of Desk</label>
                                          <select class="form-control">
                                              <option disabled="" selected="">- choose an option -</option>
                                              <option>Private</option>
                                              <option>Shared</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-sm-5">
                                    <div class="form-group">
                                          <label>Monthly Budget</label>
                                          <div class="input-group">
                                              <input type="text" class="form-control">
                                              <span class="input-group-addon">$</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                            <div class="tab-pane" id="captain">
                                <h5 class="info-text">How do you want to rent the office? </h5>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="col-sm-4 col-sm-offset-2">
                      <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="jobb" value="Design">
                                                <div class="card card-checkboxes card-hover-effect">
                                                    <i class="ti-time"></i>
                          <p>By hour</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                      <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="jobb" value="Design">
                                                <div class="card card-checkboxes card-hover-effect">
                                                    <i class="ti-calendar"></i>
                          <p>By day</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="description">
                                <div class="row">
                                    <h5 class="info-text"> Tell us about your ideal working space. </h5>
                                    <div class="col-sm-6 col-sm-offset-1">
                                        <div class="form-group">
                                            <label>Desk description</label>
                                            <textarea class="form-control" placeholder="" rows="9"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Example</label>
                                            <p class="description">"If you're heavily armed with a mug, smartphone and a laptop, then our hot desks will provide the pure functionality and space needed to get your work done and move on to the next one."</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                          <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                                <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finish' />
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
      </div> <!-- row -->
   </div> <!--  big container -->



    </div>
  </div>


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://mfikri.com">M Fikri Setiadi</a>.</strong> All rights reserved.
  </footer>

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
<!--   Core JS Files   -->
<script src="<?php echo base_url().'assets/paper-assets/js/jquery-2.2.4.min.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/paper-assets/js/bootstrap.min.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/paper-assets/js/jquery.bootstrap.wizard.js'?>" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="<?php echo base_url().'assets/paper-assets/js/demo.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/paper-assets/js/paper-bootstrap-wizard.js'?>" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="<?php echo base_url().'assets/paper-assets/js/jquery.validate.min.js'?>" type="text/javascript"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

    CKEDITOR.replace('ckeditor');


  });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
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
<!--      Wizard container        -->
<div class="wizard-container" style="margin:0px; padding:10px">
    <div class="card wizard-card" data-color="red" id="wizard">
    <form action="" method="">
    <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->

          <div class="wizard-header">
              <h3 class="wizard-title">Find your next desk</h3>
              <p class="category">Book from thousands of unique work and meeting spaces.</p>
          </div>

<div class="wizard-navigation">
  <div class="progress-with-circle">
       <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
  </div>
  <ul>
    <li>
      <a href="#details" data-toggle="tab">
        <div class="icon-circle">
          <i class="ti-id-badge"></i>
        </div>
        Profil Usaha
      </a>
    </li>
    <li>
      <a href="#captain" data-toggle="tab">
        <div class="icon-circle">
          <i class="ti-briefcase"></i>
        </div>
        Timetable
      </a>
    </li>
    <li>
      <a href="#description" data-toggle="tab">
        <div class="icon-circle">
          <i class="ti-pencil"></i>
        </div>
        Description
      </a>
    </li>
  </ul>
</div>
<div class="tab-content">
                <div class="tab-pane" id="details">
                  <div class="row">
                      <div class="col-sm-12">
                          <h5 class="info-text"> Let's start with the basic details</h5>
                      </div>
                      <div class="col-sm-12 ">
                          <div class="form-group">
                              <label>Nama Usaha</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g Silicon Valley">
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label>Tahun Berdiri</label>
                              <select class="form-control">
                                  <option disabled="" selected="">- Pilih Tahun -</option>
                                  <option>Work Space</option>
                                  <option>Meeting Space</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label>Nomer Izin</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nomer izin">
                          </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                              <label>Nama Pimpinan</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama pimpinan">
                          </div>
                      </div>

                      <div class="col-sm-12">
                          <div class="form-group">
                              <label>Jenis Usaha</label>
                              <select class="form-control">
                                  <option disabled="" selected="">- Pilih Jenis Usana -</option>
                                  <option>Work Space</option>
                                  <option>Meeting Space</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label>Kabupaten</label>
                              <select class="form-control">
                                  <option disabled="" selected="">- Pilih Jenis Usana -</option>
                                  <option>Work Space</option>
                                  <option>Meeting Space</option>
                              </select>
                          </div>
                      </div>
                     
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label>Kecamatan</label>
                              <select class="form-control">
                                  <option disabled="" selected="">- Pilih Jenis Usana -</option>
                                  <option>Work Space</option>
                                  <option>Meeting Space</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label>Desa</label>
                              <select class="form-control">
                                  <option disabled="" selected="">- Pilih Jenis Usana -</option>
                                  <option>Work Space</option>
                                  <option>Meeting Space</option>
                              </select>
                          </div>
                      </div>

                  </div>
                  </div>


                <div class="tab-pane" id="captain">
                    <h5 class="info-text">How do you want to rent the office? </h5>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="col-sm-4 col-sm-offset-2">
                                  <div class="choice" data-toggle="wizard-checkbox">
                                    <input type="checkbox" name="jobb" value="Design">
                                    <div class="card card-checkboxes card-hover-effect">
                                        <i class="ti-time"></i>
                                          <p>By hour</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="choice" data-toggle="wizard-checkbox">
                                    <input type="checkbox" name="jobb" value="Design">
                                    <div class="card card-checkboxes card-hover-effect">
                                        <i class="ti-calendar"></i>
                                          <p>By day</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="description">
                    <div class="row">
                        <h5 class="info-text"> Tell us about your ideal working space. </h5>
                        <div class="col-sm-6 col-sm-offset-1">
                            <div class="form-group">
                                <label>Desk description</label>
                                <textarea class="form-control" placeholder="" rows="9"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Example</label>
                                <p class="description">"If you're heavily armed with a mug, smartphone and a laptop, then our hot desks will provide the pure functionality and space needed to get your work done and move on to the next one."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wizard-footer clearfix">
                <div class="pull-right">
                    <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                    <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finish' />
                </div>
                <div class="pull-left">
                    <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                </div>
            </div>
        </form>
    </div>
</div> <!-- wizard container -->

<div class="tab-pane" id="captain">
                <h5 class="info-text">How do you want to rent the office? </h5>
                <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                      <label>Sumber Modal</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Usaha">
                    </div>
                </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label>Total Modal/Nilai Investasi</label>
                      <select class="form-control">
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                      <label>Nilai Produksi</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Usaha">
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label>Nilai Bahan Baku</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nik pimpinan">
                    </div>
                  </div>
                  <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                      <label>Produk Unggulan</label>
                      <select class="form-control">
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                  </div>
                  </div>
                  <div class="col-sm-5 ">
                    <div class="form-group">
                      <label>Jumlah Tenaga Kerja</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Alamat">
                    </div>
                  </div>



                  <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                      <label>Rerata Biaya Tenaga Kerja</label>
                      <select class="form-control">
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-5 ">
                    <div class="form-group">
                      <label>Model Pengganjian</label>
                      <select class="form-control">
                        <option disabled="" selected="">- Pilih -</option>
                        <option>Ya</option>
                        <option>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                      <label>Nominal Gaji Perbulan</label>
                      <select class="form-control">
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-5 ">
                    <div class="form-group">
                      <label>Nominal Gaji Perhari</label>
                      <select class="form-control">
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                      <label>Nominal Omzet</label>
                      <select class="form-control">
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-5 ">
                    <div class="form-group">
                      <label>Pendapatan Harian</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Alamat">
                    </div>
                  </div>
                </div>
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                      <label>Pendapatan Bulanan</label>
                      <select class="form-control">
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-5 ">
                    <div class="form-group">
                      <label>Jumlah Unit Usaha</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Alamat">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                      <label> Metode Pemasaran</label>
                      <select class="form-control">
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                    </div>
              </div>



               <!--      Wizard container        -->
      <div class="wizard-container container-fluid" style="margin:0px; padding:10px">
        <div class="card wizard-card" data-color="red" id="wizard">
          <form action="" method="">
            <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->
            
              <button class="btn btn-success" style="margin:10px"><i class="fa fa-upload"> Import data</i></button>
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
                  <a href="#details" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-id-badge"></i>
                    </div>
                    Profil Usaha
                  </a>
                </li>
                <li>
                  <a href="#captain" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-agenda"></i>
                    </div>
                    Aktivitas
                  </a>
                </li>
                <li>
                  <a href="#description" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-gift"></i>
                    </div>
                    Produk
                  </a>
                </li>
                <li>
                  <a href="#description" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-receipt"></i>
                    </div>
                    Legalitas
                  </a>
                </li>
                <li>
                  <a href="#description" data-toggle="tab">
                    <div class="icon-circle">
                      <i class="ti-package"></i>
                    </div>
                    Bantuan
                  </a>
                </li>
              </ul>
            </div>
            <div class="tab-content">
              <div class="tab-pane" id="details">
                <div class="row">

                  <div class="col-sm-12">
                    <h5 class="info-text"></h5>
                  </div>


                  <div class="col-sm-6 ">
                    <div class="form-group">
                      <label>Nama Usaha</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_usaha" placeholder="Nama Usaha" required>
                    </div>
                  </div>
                  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tahun berdiri</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" name="tahun_berdiri" placeholder="Tahun" min="1999" max="<?php echo date("Y")?>" required >
                    </div>
                  </div>

                  <div class="col-sm-6 ">
                    <div class="form-group">
                      <label>Nama Pimpinan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_pimpinan" placeholder="Nama pimpinan"required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>NIK Pimpinan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nik_pimpinan" placeholder="Nik pimpinan" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jenis Usaha</label>
                      <select class="form-control" name="jenis_usaha">
                        <option disabled="" selected="">-Pilih -</option>
                        <?php foreach ($jenis->result_array() as $i) { ?>
                        <option value="<?php echo $i['keterangan'] ?>"><?php echo $i['keterangan'] ?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Luas Lahan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="luas_lahan" placeholder="Alamat"required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Status Kepemilikan</label>
                      <select class="form-control" name="status_kepemilikan">
                        <option disabled="" selected="">- Pilih -</option>
                        <?php foreach ($milik->result_array() as $i) { ?>
                        <option value="<?php echo $i['keterangan'] ?>"><?php echo $i['keterangan'] ?></option>
                        <?php }?>
                        
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kepemilikan Koperasi</label>
                      <select class="form-control"name="kepemilikan_koperasi">
                        <option disabled="" selected="">- Pilih -</option>
                        <option>Ya</option>
                        <option>Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kabupaten</label>
                      <select class="form-control" id="kabupaten" name="kabupaten">
                      <option>- Pilih Kabupaten -</option>
                        <?php foreach ($kab->result_array() as $i2) { ?>
                        <option value="<?php echo $i2['kode']?>-<?php echo $i2['nama'] ?>"><?php echo $i2['nama'] ?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select class=" kecamatan form-control" name="kecamatan" id="kecamatan">
                        <option value="0">- Pilih kecamatan -</option>
                       
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Desa</label>
                      <select class=" desa form-control" name="desa">
                        <option value="0">- Pilih desa -</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="alamat" placeholder="Alamat" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Fax ( opsional )</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="fax" placeholder="fax">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>No, Telpon (Whatsapp)</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="no_hp" placeholder="No, Telpon (Whatsapp)"required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="email"required>
                    </div>
                  </div>

                  <div class="col-sm-6 ">
                    <div class="form-group">
                      <label>Website (opsional)</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="website" placeholder="http://">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Latittude</label>
                      <input type="text" class="form-control" id="lat" name="lat" placeholder="Latittude"required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Longitude</label>
                      <input type="text" class="form-control" id="lng" name="lng" placeholder="Longitude"required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div id="googleMap" style="width:100%;height:380px;"></div>
                    </div>
                  </div>


                </div>
              </div>

              <div class="tab-pane" id="captain">
                <h5 class="info-text"> </h5>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Sumber Modal</label>
                      <select class="form-control">
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Total Modal/Nilai Investasi</label>
                      <input type="text" class="form-control" id="exampleInputEmail1"
                        placeholder="Total modal/nilai investasi">
                    </div>

                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nilai Produksi</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nilai produksi">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nilai Bahan Baku</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nilai bahan baku">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Produk Unggulan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Produk Unggulan">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jumlah Tenaga Kerja</label>
                      <input type="number" class="form-control" id="exampleInputEmail1"
                        placeholder="Jumlah tenaga kerja">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Rerata Biaya Tenaga Kerja</label>
                      <input type="number" class="form-control" id="exampleInputEmail1"
                        placeholder="Rerata biaya tenaga kerja">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Model Pengganjian</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Model pengganjian">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Gaji Perbulan</label>
                      <input type="number" class="form-control" id="exampleInputEmail1"
                        placeholder="Nominal gaji perbulan">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Gaji Perhari</label>
                      <input type="number" class="form-control" id="exampleInputEmail1"
                        placeholder="Nominal gaji perhari">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Omzet</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Nominal omzet">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Pendapatan Harian</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Pendapatan harian">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Pendapatan Bulanan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Pendapatan bulanan">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jumlah Unit Usaha</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="jumlah unit usaha">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label> Metode Pemasaran</label>
                      <select class="form-control">
                        <option disabled="" selected="">- Pilih -</option>
                        <option>Online</option>
                        <option>Offline</option>
                      </select>
                    </div>
                  </div>

                </div>
              </div>


              <div class="tab-pane" id="description">
                <div class="row">
                  <h5 class="info-text"> Tell us about your ideal working space. </h5>
                  <div class="col-sm-6 col-sm-offset-1">
                    <div class="form-group">
                      <label>Desk description</label>
                      <textarea class="form-control" placeholder="" rows="9"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Example</label>
                      <p class="description">"If you're heavily armed with a mug, smartphone and a laptop, then our hot
                        desks will provide the pure functionality and space needed to get your work done and move on to
                        the next one."</p>
                    </div>
                  </div>
                </div>
              </div>


            </div>
            <div class="wizard-footer clearfix">
              <div class="pull-right">
                <input type='submit' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finish' />
              </div>
              <div class="pull-left">
                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
              </div>
            </div>
          </form>
        </div>
      </div> <!-- wizard container -->




                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Sumber Modal</label>
                      <select class="form-control">
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Total Modal/Nilai Investasi</label>
                      <input type="text" class="form-control" id="exampleInputEmail1"
                        placeholder="Total modal/nilai investasi">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nilai Produksi</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nilai produksi">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nilai Bahan Baku</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nilai bahan baku">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Produk Unggulan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Produk Unggulan">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jumlah Tenaga Kerja</label>
                      <input type="number" class="form-control" id="exampleInputEmail1"
                        placeholder="Jumlah tenaga kerja">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Rerata Biaya Tenaga Kerja</label>
                      <input type="number" class="form-control" id="exampleInputEmail1"
                        placeholder="Rerata biaya tenaga kerja">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Model Pengganjian</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Model pengganjian">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Gaji Perbulan</label>
                      <input type="number" class="form-control" id="exampleInputEmail1"
                        placeholder="Nominal gaji perbulan">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Gaji Perhari</label>
                      <input type="number" class="form-control" id="exampleInputEmail1"
                        placeholder="Nominal gaji perhari">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nominal Omzet</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Nominal omzet">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Pendapatan Harian</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Pendapatan harian">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Pendapatan Bulanan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Pendapatan bulanan">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jumlah Unit Usaha</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="jumlah unit usaha">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label> Metode Pemasaran</label>
                      <select class="form-control">
                        <option disabled="" selected="">- Pilih -</option>
                        <option>Online</option>
                        <option>Offline</option>
                      </select>
                    </div>
                  </div>




              <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Komoditas</label>
                      <select class="form-control" required>
                        <option disabled="" selected="">- choose a space -</option>
                        <option>Work Space</option>
                        <option>Meeting Space</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nama Produk</label>
                      <input type="text" class="form-control" id="nama_produk"
                        placeholder="Nama produk" required>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jenis Produk</label>
                      <input type="text" class="form-control" id="jenis_produk" placeholder="Nilai produksi" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="number" class="form-control" id="harga" placeholder="Nilai bahan baku" required>
                    </div>
                  </div>

                </div>
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kapasitas produksi</label>
                      <input type="number" class="form-control" id="kapasitas_produksi" placeholder="Kapasitas produksi"
                        required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Informasi gizi</label>
                      <input type="text" class="form-control" id="informasi_gizi" placeholder="Informasi gizi"
                        required>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kondisi kemasan</label>
                      <input type="text" class="form-control" id="kondisi_kemasan"
                        placeholder="Kondisi kemasan" required>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kualitas Produk</label>
                      <input type="text" class="form-control" id="kualitas_produuk" placeholder="Kualitas produk"
                        required>
                    </div>
                  </div>

                </div>

               
                </div>