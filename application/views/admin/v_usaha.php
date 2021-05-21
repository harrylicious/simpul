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
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">



              <!-- /.box-header -->
              <div class="box-body">
                <table  class="table table-striped datatable" style="font-size:13px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Nomer Izin Usaha</th>
                      <th>Nama usaha</th>

                      <th>Tahun </th>
                      <th>Jenis usaha</th>
                      <th>Kabupaten</th>
                      <th>Kecamatan</th>
                      <th>Desa</th>
                      <th>Alamat</th>
                      <th style="text-align:center;">Aksi</th>



                  </thead>
                 
                </table>
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
    
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
  <?php
  foreach ($data->result_array() as $i) :
                
                $tanggal=$i['created_at'];
                $id_usaha=$i['id_usaha'];
                $nama_usaha=$i['nama_usaha'];

                

                
                ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id_usaha;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus data umkm </h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/usaha/hapus_umkm'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?php echo $id_usaha;?>"/>
                            <p>Apakah Anda yakin mau menghapus <b><?php echo $nama_usaha;?></b> ?</p>

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

  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

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
    <?php
        $params = '';

        if($this->input->get('kabupaten')){
            $params = '?kabupaten=' . $this->input->get('kabupaten');
        } 
        elseif($this->input->get('kecamatan')) {
            $params = '?kecamatan=' . $this->input->get('kecamatan');
        }
        elseif($this->input->get('desa')) {
            $params = '?desa=' . $this->input->get('desa');
        }
    ?>
    $(function () {
        if ($('.datatable').length) {
            datatable = $('.datatable').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true,
                "responsive": true, //Feature control DataTables' server-side processing mode.
                "order": [[1,'desc']], //Initial no order.
                "ajax": {
                    "url": '<?= base_url('admin/usaha/datatables/' . $params) ?>',
                    "type": "POST"
                },
                "columns": [
                    {data: null, width: 10, searchable: false},
                    {data: 'created_at'},
                    {data: 'no_izin'},
                    {data: 'nama_usaha'},
                    {data: 'tahun_berdiri'},
                    {data: 'jenis_usaha'},
                    {data: 'kabupaten'},
                    {data: 'kecamatan'},
                    {data: 'desa'},
                    {data: 'alamat'},
                    {data: 'action'}
                ],
                "dom": 'Bfrtip',
                "buttons": [
                
                  { "extend": 'excel', "className": "btn btn-success","text":"Export Excel", },
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
    <?php if($this->session->flashdata('error_msg')):?>
        <script type="text/javascript">
            $.toast({
                heading: 'Error',
                text: "<?= $this->session->flashdata('error_msg') ?>",
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
    <?php elseif($this->session->flashdata('msg')):?>
        <script type="text/javascript">
            $.toast({
                heading: 'Success',
                text: "<?= $this->session->flashdata('msg') ?>",
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
      <?php elseif($this->session->flashdata('error_msg')):?>
        <script type="text/javascript">
          $.toast({
            heading: 'Kesalahan',
            text: "<?= $this->session->flashdata('error_msg') ?>",
            showHideTransition: 'slide',
            icon: 'error',
            hideAfter: false,
            position: 'bottom-right',
            bgColor: '#dd4b39'
          });
        </script>
  <?php endif;?>
</body>

</html>