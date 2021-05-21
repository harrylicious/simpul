<!--Counter Inbox-->
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMPUL-NTB | Rangkuman Usaha</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/logo.png'?>">
  
  <?php $this->load->view('admin/parsial/v_head'); ?>


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
          Rangkuman profil usaha
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Usaha</a></li>
          <li class="active">Rangkuman</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">


              <!-- /.box-header -->
              <div class="box-body">
              <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Kabupaten</a></li>
                  <li><a data-toggle="tab" href="#menu1">Kecamatan</a></li>
                  <li><a data-toggle="tab" href="#menu2">Desa</a></li>
              </ul>

              <div class="tab-content" style="padding:15px;">
                  <div id="home" class="tab-pane fade in active">
                      <table  class="table table-striped datatable-kab" style="font-size:13px;">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kabupaten</th>
                              <th>Jumlah</th>
                              <th style="text-align:center;">Aksi</th>
                          </thead>
                      </table>
                  </div>
                  <div id="menu1" class="tab-pane fade">
                      <table  class="table table-striped datatable-kec" style="font-size:13px;">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kecamatan</th>
                              <th>Jumlah</th>
                              <th style="text-align:center;">Aksi</th>
                          </thead>
                      </table>
                  </div>
                  <div id="menu2" class="tab-pane fade">
                      <table  class="table table-striped datatable-des" style="font-size:13px;">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Desa</th>
                              <th>Jumlah</th>
                              <th style="text-align:center;">Aksi</th>
                          </thead>
                      </table>
                  </div>
              </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/parsial/v_footer')?>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  



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
        if ($('.datatable-kab').length) {
            datatable = $('.datatable-kab').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [[1,'asc']], //Initial no order.
                "ajax": {
                    "url": '<?= base_url('admin/usaha/datatables_kab') ?>',
                    "type": "POST"
                },
                "columns": [
                    {data: null, width: 10, searchable: false},
                    {data: 'kabupaten'},
                    {data: 'jml'},
                    {data: 'action'}
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

        if ($('.datatable-kec').length) {
            datatable = $('.datatable-kec').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [[1,'asc']], //Initial no order.
                "ajax": {
                    "url": '<?= base_url('admin/usaha/datatables_kec') ?>',
                    "type": "POST"
                },
                "columns": [
                    {data: null, width: 10, searchable: false},
                    {data: 'kecamatan'},
                    {data: 'jml'},
                    {data: 'action'}
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

        if ($('.datatable-des').length) {
            datatable = $('.datatable-des').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [[1,'asc']], //Initial no order.
                "ajax": {
                    "url": '<?= base_url('admin/usaha/datatables_des') ?>',
                    "type": "POST"
                },
                "columns": [
                    {data: null, width: 10, searchable: false},
                    {data: 'desa'},
                    {data: 'jml'},
                    {data: 'action'}
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
  <?php if($this->session->flashdata('msg')=='error'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Error',
      text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
      showHideTransition: 'slide',
      icon: 'error',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FF4859'
    });
  </script>
  <?php elseif($this->session->flashdata('msg')=='warning'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Warning',
      text: "Gambar yang Anda masukan terlalu besar.",
      showHideTransition: 'slide',
      icon: 'warning',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FFC017'
    });
  </script>
  <?php elseif($this->session->flashdata('msg')=='success'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Success',
      text: "Pengguna Berhasil disimpan ke database.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>
  <?php elseif($this->session->flashdata('msg')=='info'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Info',
      text: "Pengguna berhasil di update",
      showHideTransition: 'slide',
      icon: 'info',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#00C9E6'
    });
  </script>
  <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Success',
      text: "Pengguna Berhasil dihapus.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>
  <?php elseif($this->session->flashdata('msg')=='show-modal'):?>
  <script type="text/javascript">
    $('#ModalResetPassword').modal('show');
  </script>
  <?php else:?>

  <?php endif;?>
</body>

</html>