<!--Counter Inbox-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMPUL-NTB | Daftar kategori</title>
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
        List Kategori
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kategori</a></li>
        <li><a href="#">Sub Kategori</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
            <a class="btn btn-success btn-flat" data-toggle="modal" onClick="add_kategori()"><span class="fa fa-user-plus"></span> Tambah Kategori</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-striped datatable" style="font-size:13px;">
                <thead>
                <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th style="text-align:right;">Aksi</th>
                </tr>
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





<!--Modal Add Pengguna-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Kategori</h4>
                    </div>
                    <form class="form-horizontal" action="" id="form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Kategori</label>
                        <div class="col-sm-7">
                            <input type="text" name="kategori" class="form-control" id="inputEmail3" placeholder="Nama Kategori" required>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnSave" onClick="save()" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
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
        if ($('.datatable').length) {
            datatable = $('.datatable').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "ajax": {
                    "url": '<?= base_url('admin/kategoriusaha/datatables/') ?>',
                    "type": "POST"
                },
                "columns": [
                    {data: null, width: 10, searchable: false},
                    {data: 'kategori'},
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

<script>
function add_kategori() {
    save_method ='save';
    $('#form')[0].reset();
    $('#myModal').modal('show');
    $('#btnSave').text("Simpan");
    $('#myModalLabel').text("Tambah Kategori");
}
 
 function edit_kategori(id) {
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('#btnSave').text("update");


    $.ajax({
        url :"<?php echo site_url('admin/kategoriusaha/ajax_edit') ?>/"+id,
        type:"GET",
        dataType :"JSON",
        success :function(data) {
            $('[name="kategori"]').val(data.kategori);
            $('#myModal').modal('show');
            
        },
        error: function(jqXHR,textStatus,errorThrown){
        alert("error data")
        }

    });
} 


function save() {
    var url;

    if(save_method=="save"){
        url="<?php echo site_url('admin/kategoriusaha/ajax_add') ?>"
    }else{
        url="<?php echo site_url('admin/kategoriusaha/ajax_update') ?>"
        
    }

    $.ajax({
        url : url,
        type :"POST",
        data : $('#form').serialize(),
        dataType:"JSON",
        success : function (data) {
            if (data.status ){
                alert("Data berhasil tersimpan ");
            }else{
                alert("Nomer izin yang anda input Sudah di input sebelumnya");
            }
            
        }
    });


}
</script>


<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Nama produk yang anda masukan sudah ada",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>

    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Produk Berhasil disimpan ke database.",
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
                    text: "Nama produk yang anda masukan sudah ada",
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
                    text: "Berita Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
