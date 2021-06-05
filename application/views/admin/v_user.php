
<!DOCTYPE html>
<html>
<head>
<style>

tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>

    
    <?php $this->load->view('admin/parsial/v_head'); ?>

</head>
<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
        <?php
            $this->load->view('admin/parsial/v_header');
        ?>
        
        <aside class="main-sidebar">
            <?php $this->load->view('admin/parsial/v_sidebar'); ?>
        </aside>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            Data Pengguna
            <small></small>
        </h1>
        </section>
            

    <!-- Main content -->
    <section class="content">
            

      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
           
              </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="dtHorizontalExample" class="display" style="width:100%"> 
                  <thead>
                      <tr>
                          <th width="20px">No.</th>
                          <th>Nama Lengkap</th>
                          <th>Alamat</th>
                          <th>Telpon</th>
                          <th>Username</th>
                          <th>Level</th>
                          <th>Tanggal Terdaftar</th>
                          <th width="180px">Aksi</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach ($data as $row) : 
                      ?> 
                      <tr>
                          <td width="20px"><?= $no++; ?></td>
                          <td><?= $row->nama_lengkap; ?></td>
                          <td><?= $row->alamat; ?></td>
                          <td><?= $row->telp; ?></td>
                          <td><?= $row->username; ?></td>
                          <td><?= $row->level; ?></td>
                          <td><?= $row->created_at; ?></td>
                          <td>
                            <a href="<?= base_url('admin/user/edit/').$row->kode_user; ?>" class="btn btn-warning">Edit</a>
                          </td>
                      </tr>

                      <?php
                      endforeach;
                      
                    
                    ?>
                
                  </tbody>
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

               
                
            
            </section>
        </div>

        <?php $this->load->view('admin/parsial/v_footer')?>

    </div>

    
<script>
  $(document).ready(function () {
  $('#dtHorizontalExample').DataTable({
  "scrollX": true
  });
  $('.dataTables_length').addClass('bs-select');
  });
</script>
<script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );
</script>

</body>

</html>
