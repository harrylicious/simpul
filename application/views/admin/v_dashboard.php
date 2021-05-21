<?php
    error_reporting(0);
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
    <title>SIMPUL-NTB | Dashboard</title>
    <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/logo.png'?>">
    
    <?php $this->load->view('admin/parsial/v_head'); ?>
    <?php
          /* Mengambil query report*/
          foreach($visitor as $result){
              $bulan[] = $result->tgl; //ambil bulan
              $value[] = (float) $result->jumlah; //ambil nilai
          }
          /* end mengambil query*/
      ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php
            $this->load->view('admin/parsial/v_header');
        ?>
        
        <aside class="main-sidebar">
            <?php $this->load->view('admin/parsial/v_sidebar'); ?>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Dashboard
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $tot_usaha; ?></h3>
                                <p>Usaha Terdaftar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?php echo base_url('admin/usaha') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $tot_desa; ?><sup style="font-size: 20px"></sup></h3>
                                <p>Desa terdaftar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $tot_produk; ?></h3>
                                <p>Produk</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?php echo base_url('admin/produk/')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $tot_pemasaran; ?></h3>
                                <p>Pemasaran</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-chrome"></i></span>
                            <?php
                                $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Chrome'");
                                $jml=$query->num_rows();
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text">Chrome</span>
                                <span class="info-box-number"><?php echo $jml;?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-firefox"></i></span>
                            <?php
                                $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Firefox' OR pengunjung_perangkat='Mozilla'");
                                $jml=$query->num_rows();
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text">Mozilla Firefox</span>
                                <span class="info-box-number"><?php echo $jml;?></span>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-bug"></i></span>
                            <?php
                                $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Googlebot'");
                                $jml=$query->num_rows();
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text">Googlebot</span>
                                <span class="info-box-number"><?php echo $jml;?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-opera"></i></span>
                            <?php
                                $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Opera'");
                                $jml=$query->num_rows();
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text">Opera</span>
                                <span class="info-box-number"><?php echo $jml;?></span>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row">
                    <!-- <div class="col-md-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Pengunjung bulan ini</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <canvas id="canvas" width="1000" height="280"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Usaha Lokal</h3>
                                <h5>Data Usaha Lokal Se-Provinsi Nusa Tenggara Barat</h5>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                            <tr>
                                            <th>NO</th>
                                            <th>Kabupaten</th>
                                            <th>Jumlah</th>
                                            <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach ($data as $row):
                                            ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $row->kabupaten;?></td> 
                                                        <td><?php echo $row->jml;?></td>
                                                        <td style="text-align:right;"><a href="<?php echo site_url('admin/detailusaha/daftar?kab='.$row->kabupaten);?>" class="btn btn-info">Lihat Daftar</a></td>
                                                    </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Usaha Jenis Usaha</h3>
                                <h5>Data Usaha Berdasarkan Jenis Usaha</h5>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Usaha</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach ($jenis_usaha as $row):
                                            ?>
                                                    <tr>
                                                        <td><?php echo $no++;?></td>
                                                        <td><?php echo $row->jenis_usaha;?></td> 
                                                        <td><?php echo $row->jumlah_jenis_usaha;?></td>
                                                        <td style="text-align:right;"><a href="<?php echo site_url('admin/detailusaha/daftar?jenis_usaha='.$row->jenis_usaha);?>" class="btn btn-info">Lihat Daftar</a></td>
                                                    </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                
                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Usaha Komoditas</h3>
                                <h5>Data Usaha Berdasarkan Komoditas</h5>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Komoditas</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach ($komoditas as $row):
                                                    if($row->komoditas != ''):
                                            ?>
                                                        <tr>
                                                            <td><?php echo $no++;?></td>
                                                            <td><?php echo $row->komoditas;?></td> 
                                                            <td><?php echo $row->jumlah_komoditas;?></td>
                                                            <td style="text-align:right;"><a href="<?php echo site_url('admin/detailusaha/daftar?komoditas='.$row->komoditas);?>" class="btn btn-info">Lihat Daftar</a></td>
                                                        </tr>
                                            <?php
                                                    endif;
                                                endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="row">
                    <div class="col-md-8">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Posting Populer</h3>

                                <table class="table">
                                    <?php
                                        $query=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC");
                                        foreach ($query->result_array() as $i) :
                                            $tulisan_id=$i['tulisan_id'];
                                            $tulisan_judul=$i['tulisan_judul'];
                                            $tulisan_views=$i['tulisan_views'];
                                    ?>
                                        <tr>
                                            <td><?php echo $tulisan_judul;?></td>
                                            <td><?php echo $tulisan_views.' Views';?></td>
                                        </tr>
                                    <?php endforeach;?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-safari"></i></span>
                            <?php
                                $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Safari'");
                                $jml=$query->num_rows();
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text">Safari</span>
                                <span class="info-box-number"><?php echo number_format($jml);?></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                Penggunjung
                                </span>
                            </div>
                        </div>

                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-globe"></i></span>
                            <?php
                                $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Other' OR pengunjung_perangkat='Internet Explorer'");
                                $jml=$query->num_rows();
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text">Lainnya</span>
                                <span class="info-box-number"><?php echo number_format($jml);?></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">Pengunjung</span>
                            </div>
                        </div>
                        
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-users"></i></span>
                            <?php
                                $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
                                $jml=$query->num_rows();
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text">Pengunjung Bulan Lalu</span>
                                <span class="info-box-number"><?php echo number_format($jml);?></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">Pengunjung</span>
                            </div>
                        </div>
                    
                        <div class="info-box bg-aqua">
                            <span class="info-box-icon"><i class="fa fa-users"></i></span>
                            <?php
                                $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
                                $jml=$query->num_rows();
                            ?>
                            <div class="info-box-content">
                                <span class="info-box-text">Pengunjung Bulan Ini</span>
                                <span class="info-box-number"><?php echo number_format($jml);?></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                    Pengunjung
                                </span>
                            </div>
                        </div>
                    </div>
                </div> -->
</section>
    <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/parsial/v_footer')?>




</body>
</html>




    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
    <!-- Sparkline -->
    <!-- <script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script> -->
    <!-- jvectormap -->
    <!-- <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script> -->
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?php echo base_url().'assets/dist/js/pages/dashboard2.js'?>"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script> -->

    </script>
    </div>

</body>
</html>
