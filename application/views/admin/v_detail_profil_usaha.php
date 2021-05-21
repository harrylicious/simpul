<!--Counter Inbox-->
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMPUL-NTB | Daftar Usaha</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/logo.png'?>">
  
  <?php $this->load->view('admin/parsial/v_head'); ?>


</head>

<?php
    $id_usaha=$this->uri->segment(4);
  
    


?> 

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
          Data profil usaha
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Usaha</a></li>
          <li class="active">Data profil usaha</li>
        </ol>
      </section>

      <!-- Main content -->
         <!-- Main content -->
    <section class="content">

<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
      <?php
        $gbr = $data->gambar;
        if ($gbr == "0") {
            $gbr = base_url().'assets/images/logo_default.png';
        }
        else {
            $gbr = base_url().'assets/images/gambar/'.$data->gambar;
        }
    ?>
        <img src="<?php echo $gbr ?>" class="avatar img-thumbnail" alt="avatar">
        

        <h3 class="profile-username text-center"><?php echo $data->nama_usaha; ?></h3>

       

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Nama Pimpinan  : </b> <a class="pull-right"><?= $data->nama_pimpinan?></a>
          </li>
          <li class="list-group-item">
            <b>Nomer Izin :</b> <a class="pull-right"><?= $data->no_izin?></a>
          </li>
          <li class="list-group-item">
            <b>Alamat : </b><?= $data->alamat?><a class="pull-right"></a>
          </li>
        </ul>

        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Rangkuman</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <ul class="list-group">
            <li class="list-group-item text-muted">Rangkuman: </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Tahun Berdiri : </strong></span> <?= $data->tahun_berdiri?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Nilai Investasi :</strong></span> <?= $data->nilai_investasi?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Nilai Produksi :</strong></span> <?= $data->nilai_produksi?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Nilai Bahan Baku :</strong></span> <?= $data->nilai_bahan_baku?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Kapasitas Produksi :</strong></span> <?= $data->kapasitas_produksi?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Jumlah Unit Usaha :</strong></span> <?= $data->jml_unit_usaha?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Luas Lahan :</strong></span> <?= $data->luas_lahan?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Jumlah Anggota :</strong></span> <?= $data->jml_anggota?></li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">Produk</a></li>
        <li><a href="#timeline" data-toggle="tab">Legalitas</a></li>
        <li><a href="#settings" data-toggle="tab">Bantuan</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
        <div class="box-header with-border">
              <h3 class="box-title">Produk yang dimiliki</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body">
              <ul class="products-list product-list-in-box">
                       <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-striped datatable_produk" style="font-size:13px;">
                <thead>
                <tr>
                <th>No</th>
      					<th>Gambar</th>
                <th>Nama Produk</th>
      					<th>Jenis Produk</th>
      					<th>Harga</th>
      					<th>Jumlah produksi perbulan</th>
                <th>Deskripsi</th>
                </tr>
                </thead>
               
              </table>
            </div>

                </li>
               
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="timeline">
        <table id="table2" class="table table-striped datatable_legalitas" style="font-size:13px;">
                <thead>
                <tr>
                <th>No</th>
      					<th>Nomer Izin</th>
                <th>Nama Izin</th>
      					<th>Tahun Izin</th>
                </tr>
                </thead>
              </table>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
        <table id="table3" class="table table-striped datatable_bantuan" style="font-size:13px;">
                <thead>
                <tr>
                <th>No</th>
      			    <th>Asal Bantuan</th>
                <th>Jenis Bantuan</td>
              
                </tr>
                </thead>
        </table>

      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <a href="<?= base_url('admin/usaha/print/' . $data->id_usaha) ?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Print</a>
  <!-- /.col -->
</div>
<!-- /.row -->

</section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/parsial/v_footer')?>





  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>

  <!-- page script -->



<script>
    $(function(){
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };
    });
</script>
<script>
    $(function () {
        if ($('.datatable_produk').length) {
            datatable = $('.datatable_produk').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "ajax": {
                    "url": '<?= base_url('admin/detailusaha/datatables_produk/'.$id_usaha) ?>',
                    "type": "POST"
                },
                "columns": [
                    {data: null, width: 10, searchable: false},
                    {data: 'photo'},
                    {data: 'nama_produk'},
                    {data: 'jenis_produk'},
                    {data: 'harga'},
                    {data: 'jml_produksi_bulanan'},
                    {data: 'deskripsi'},
                ],
                rowCallback: function (row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            });

            $('.dataTables_filter').addClass('text-right')
        }
    });
</script>


<script>
    $(function () {
        if ($('.datatable_legalitas').length) {
            datatable = $('.datatable_legalitas').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "ajax": {
                    "url": '<?= base_url('admin/detailusaha/datatables_legalitas/'.$id_usaha) ?>',
                    "type": "POST"
                },
                "columns": [
                    {data: null, width: 10, searchable: false},
                    {data: 'no_izin'},
                    {data: 'nama_izin'},
                    {data: 'th_izin'},
                    
                ],
                rowCallback: function (row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            });

            $('.dataTables_filter').addClass('text-right')
        }
    });
</script>

<script>
    $(function () {
        if ($('.datatable_bantuan').length) {
            datatable = $('.datatable_bantuan').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "ajax": {
                    "url": '<?= base_url('admin/detailusaha/datatables_bantuan/'.$id_usaha) ?>',
                    "type": "POST"
                },
                "columns": [
                    {data: null, width: 10, searchable: false},
                    {data: 'asal_bantuan'},
                    {data: 'jenis_bantuan'},
                   
                ],
                rowCallback: function (row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            });

            $('.dataTables_filter').addClass('text-right')
        }
    });
</script>
</body>

</html>